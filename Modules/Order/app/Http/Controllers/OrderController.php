<?php

namespace Modules\Order\Http\Controllers;

use App\Traits\GlobalInfoTrait;
use App\Traits\MailTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Order\Http\Requests\OrderPaymentRequest;
use Modules\Order\Http\Requests\OrderStatusRequest;
use Modules\Order\Models\Order;

class OrderController extends Controller implements HasMiddleware
{

    use MailTrait, GlobalInfoTrait;

    public static function middleware()
    {
        return [
            new Middleware('permission:order-show', ['index']),
            new Middleware('permission:order-edit', ['edit', 'status', 'paymentStatus']),
            new Middleware('permission:order-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Order::query();

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->get('payment_status'));
        }


        if ($request->filled('status')) {
            $query->where('order_status', $request->get('status'));
        }

        if ($request->filled('order_by')) {
            $order = $request->get('order_by') === 'asc' ? 'asc' : 'desc';
            $query->orderBy('created_at', $order);
        } else {
            $query->latest();
        }


        $perPage = $request->get('per_page', 15);
        if ($perPage === 'all') {
            $orders = $query->get();
        } else {
            $orders = $query->paginate((int) $perPage);
        }

        return view('order::orders.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::with('orderProducts')->findOrFail($id);
        return view('order::orders.edit', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        if($order->order_status != 'success'){
            $order->orderProducts()->delete();
            $order->address()->delete();
            $order->delete();
            return redirect()->route('admin.orders.index')->with('success', __('notification.deleted', ['field' => __('admin.order')]));
        }

        return redirect()->back()->with('error', __('notification.cannot_delete_order_success_status'));

    }

    public function status(OrderStatusRequest $request, $id)
    {
        $order = Order::with('user')->findOrFail($id);
        $order->update(['order_status' => $request->order_status]);


        $str_replace = [
            'user_name' => auth()->user()->name,
            'order_id' => $order->order_no,
            'order_status' => $order->order_status,
            'company_name' => cache()->get('setting')->app_name ?? config('app.name'),
        ];

        $this->set_mail_config();
        [$mail_subject, $mail_message] = $this->buildEmail('order_status', $str_replace);

        $this->send($order->user->email, $mail_subject, $mail_message);
        // try {

        //     $this->send(auth()->user()->email, $mail_subject, $mail_message);

        // } catch (\Exception $e) {
        //     info($e->getMessage());
        // }

        return redirect()->back()->with('success', __('notification.status_updated', ['field' => __('admin.order_status')]));
    }

    public function paymentStatus(OrderPaymentRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['payment_status' => $request->payment_status]);
        try {
            $str_replace = [
                'user_name' => auth()->user()->name,
                'order_id' => $order->order_no,
                'payment_status' => $order->payment_status,
                'company_name' => cache()->get('setting')->app_name ?? config('app.name'),
            ];

            $this->set_mail_config();
            [$mail_subject, $mail_message] = $this->buildEmail('payment_status', $str_replace);

            $this->send(auth()->user()->email, $mail_subject, $mail_message);

        } catch (\Exception $e) {
            info($e->getMessage());
        }
        return redirect()->back()->with('success', __('notification.status_updated', ['field' => __('admin.payment_status')]));
    }
}
