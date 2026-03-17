<?php

namespace Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Order\Http\Requests\RefundRequest;
use Modules\Order\Models\Order;

class RefundController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(RefundRequest $request)
    {
        $order = Order::where('id', $request->order_id)->first();

        if (!$order) {
            return redirect()->back()->with('error', __('notification.not_found', ['field' => __('admin.order')]));
        }

        if ($order->payment_status !== 'success') {
            return redirect()->back()->with('error', __('notification.you_cannot_send_refund'));
        }elseif ($order->refund) {
            return redirect()->back()->with('error', __('notification.a_refund_request_has_already_been_sent'));
        }

        $refund = $order->refund()->create([
            'user_id' => auth()->user()->id,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        if ($refund) {
            return redirect()->back()->with('success', __('notification.request_submitted_successfully'));
        } else {
            return redirect()->back()->with('error', __('notification.something_went_wrong'));
        }
    }
}
