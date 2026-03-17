<?php

namespace Modules\Payment\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Payment\Http\Requests\PaymentRequest;
use Modules\Payment\Models\Payment;

class PaymentController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware('permission:payment_method-show', ['index']),
            new Middleware('permission:payment_method-update', ['update']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentMethods = Payment::all();
        return view('payment::index', compact('paymentMethods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, $id)
    {
        $payment = Payment::find($id);

        $data = $payment->value; // stored as array in DB

        // Update common fields
        $data['gateway_charge'] = $request->gateway_charge;
        $data['status'] = $request->has('status') ? 1 : 0;

        // Upload image if provided
        if ($request->hasFile('image')) {
            $data['image'] =  updateMedia($request->file('image'), $data['image'] ?? null, 'website');
        }

        // Payment-specific updates
        if ($payment->key === 'stripe') {
            $data['stripe_client'] = $request->stripe_client;
            $data['stripe_secret'] = $request->stripe_secret;
        } elseif ($payment->key === 'paypal') {
            $data['paypal_client_id'] = $request->paypal_client_id;
            $data['paypal_secret_key'] = $request->paypal_secret_key;
            $data['paypal_account_mode'] = $request->paypal_account_mode;
        } elseif ($payment->key === 'bank_transfer') {
            $data['bank_information'] = $request->bank_information;
        }


        // Save back to DB
        $payment->update([
            'value' => $data
        ]);

        return redirect()->route('admin.payments.index')->with('success', __('notification.updated', ['field' => __('admin.payment')]));


    }

}
