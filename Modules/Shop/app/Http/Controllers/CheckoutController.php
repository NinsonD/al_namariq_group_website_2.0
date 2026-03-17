<?php

namespace Modules\Shop\Http\Controllers;

use Exception;
use App\Traits\MailTrait;
use App\Traits\GlobalInfoTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Coupon\Models\CouponHistory;
use Modules\Order\Models\Order;
use Modules\Order\Models\OrderAddress;
use Modules\Order\Models\OrderProduct;
use Modules\Order\Models\ShippingMethod;
use Modules\Payment\Enums\PaymentMethodEnum;
use Modules\Payment\Models\Payment;
use Modules\Payment\Traits\PaymentInfoTrait;
use Modules\Shop\Http\Requests\UserOrderRequest;
use Modules\Shop\Models\Address;
use Modules\Shop\Models\Product;
use Modules\Shop\Traits\CartTrait;
use Modules\Shop\Traits\CouponTrait;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CheckoutController extends Controller
{
    use CartTrait, CouponTrait, PaymentInfoTrait, MailTrait, GlobalInfoTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billing_address = Address::where('user_id', auth()->id())->get();
        if ($billing_address->isEmpty()) {
            return redirect()->route('user.address.index')->with('error', __('notification.please_add_billing_address') );
        }
        $cart = $this->getCart();
        $amounts = $this->getCartAmounts($cart);

        $shippingMethods = getAllActiveShippingMethods();

        if(!session()->has('shipping_method_id')) {
            $shippingMethodDefault = $shippingMethods->firstWhere('default', true);
            if ($shippingMethodDefault) {
                session()->put('shipping_method_id', $shippingMethodDefault->id);
            }
        }

        return view('frontend.ecommerce.checkout', compact('billing_address', 'cart', 'amounts', 'shippingMethods'));
    }

    public function placeOrder(UserOrderRequest $request)
    {
        $payment_method = Payment::where('id', $request->payment_method)->first();
        if ($payment_method->value['status'] != 1) {
            return redirect()->back()->with('error', __('notification.selected_payment_method_is_not_available'));
        }

        $shipping_method = ShippingMethod::where('id', $request->shipping)->first();
        if ($shipping_method->status != 1) {
            return redirect()->back()->with('error', __('notification.selected_shipping_method_is_not_active'));
        }



        if ($this->isCurrencySupported($payment_method)) {
            return redirect()->back()->with('error', __('notification.selected_payment_method_does_not_support_current_currency'));
        }

        $user = auth()->user();
        $cart = $this->getCart();
        $amounts = $this->getCartAmounts($cart);
        $mainCart = $cart['cart'] ?? null;

        // check if cart is empty
        if (empty($cart) || $cart['items']->isEmpty()) {
            return redirect()->back()->with('error', __('notification.your_cart_is_empty'));
        }

        foreach ($cart['items'] as $item) {
            $product = Product::find($item['product_id']);
            if (!$product || $product->qty < $item['qty']) {
                return redirect()->back()->with('error', __('notification.product_is_out_of_stock_checkout', ['product' => $product?->title]));
            }
        }

        if ($mainCart && $mainCart->coupon) {
            $coupon = $mainCart->coupon;
            if ($coupon->isLimitExceeded($user->id)) {
                return redirect()->back()->with('error', __('notification.coupon_usage_limit_exceeded'));
            }
        }

        $cartTotal = $amounts['total'] + $amounts['tax'];
        $getPayableAmount = $this->calculatePaymentSummary($payment_method, $cartTotal);

        DB::beginTransaction();

        try {
            $paid_amount = $getPayableAmount?->payable_amount + $getPayableAmount?->gateway_charge;

            if ($payment_method->key == 'stripe') {
                $paid_amount = $this->normalizePaidAmount($paid_amount, $getPayableAmount?->currency_code);
            }

            $order = new Order();
            $order->user_id = $user->id;
            $order->order_no = 'ORD-' . strtoupper(uniqid());

            $order->subtotal_default = $amounts['subtotal'];
            $order->tax_default = $amounts['tax'];
            $order->discount_default = $amounts['discountAmount'];
            $order->shipping_charge_default = $shipping_method->fee;
            $order->amount_default = $cartTotal;

            $order->subtotal = themeCurrency($amounts['subtotal'], false);
            $order->tax = themeCurrency($amounts['tax'], false);
            $order->discount = themeCurrency($amounts['discountAmount'], false);
            $order->shipping_charge = themeCurrency($shipping_method->fee, false);
            $order->paid_amount = themeCurrency($cartTotal, false);

            $order->gateway_charge = $getPayableAmount?->gateway_charge;
            $order->payable_with_charge = $getPayableAmount?->payable_with_charge;
            $order->paid_currency = $getPayableAmount?->currency_code;

            $order->payment_method = $payment_method->id;
            $order->transaction_id = null;
            $order->payment_status = 'pending';
            $order->order_status = 'draft';
            $order->payment_details = null;
            $order->order_note = $request->order_note ?? null;
            $order->save();

            // Save order address
            $this->saveOrderAddress($order->id, $user, $request);

            foreach ($cart['items'] as $item) {
                $product = Product::with('translations')->find($item['product_id']);
                $price = $product->sale_price ?? $product->price;

                OrderProduct::create([
                    'order_id'       => $order->id,
                    'product_id'     => $product->id,
                    'product_title'  => $product->title,
                    'qty'            => $item['qty'],
                    'price_default'  => $price,
                    'price'          => (float) str_replace(',', '', themeCurrency($price, false)),
                ]);

                // Deduct stock
                $product->decrement('qty', $item['qty']);
            }

            if ($mainCart && $mainCart->coupon) {
                $coupon = $mainCart->coupon;

                $couponHistory = new CouponHistory();
                $couponHistory->coupon_id = $coupon->id;
                $couponHistory->user_id = $user->id;
                $couponHistory->order_id = $order->id;
                $couponHistory->coupon_code = $coupon->coupon_code;
                $couponHistory->discount_amount = $amounts['discountAmount'];
                $couponHistory->save();
            }

            DB::commit();

            try {
                $order_details = "<table class='product-details'>
                    <tr>
                        <th>". __('admin.product_name') ."</th>
                        <th>". __('admin.qty') ."</th>
                        <th>". __('admin.unit_price') ."</th>
                        <th>". __('admin.total') ."</th>
                    </tr>";

            foreach ($order?->orderProducts as $orderProduct) {
                $total = $orderProduct->price_default * $orderProduct->qty;
                $order_details .= "
                <tr>
                    <td>" . $orderProduct->product_title . "</td>
                    <td class='qty'>" . $orderProduct->qty . "</td>
                    <td class='price'>" . getCurrencyWithSymbol($order->paid_currency, $orderProduct->price_default) . "</td>
                    <td class='total'>" . getCurrencyWithSymbol($order->paid_currency, $total) . "</td>
                </tr>";
            }

            $order_details .= "</table>";


                $str_replace = [
                    'user_name'         => auth()->user()->name,
                    'order_id'          => $order->order_no,
                    'email'             => auth()->user()->email,
                    'subtotal'          => getCurrencyWithSymbol($order->paid_currency, $order->subtotal),
                    'discount'          => getCurrencyWithSymbol($order->paid_currency, $order->discount),
                    'tax'               => getCurrencyWithSymbol($order->paid_currency, $order->tax),
                    'shipping_charge'   => getCurrencyWithSymbol($order->paid_currency, $order->shipping_charge),
                    'total_amount'      => getCurrencyWithSymbol($order->paid_currency, $order->paid_amount),
                    'payment_method'    => $order->get_payment_method?->key,
                    'payment_status'    => ucwords($order->payment_status),
                    'order_date'        => $order?->created_at?->format('d-m-Y'),
                    'order_status'      => ucwords($order->order_status),
                    'order_detail'      => $order_details,
                    'company_name'      => cache()->get('setting')->app_name,
                ];

                $this->set_mail_config();
                [$mail_subject, $mail_message] = $this->buildEmail('order_confirmation_mail', $str_replace);

                $this->send(auth()->user()->email, $mail_subject, $mail_message);

            } catch (Exception $e) {
                info($e->getMessage());
            }

            return redirect()->route('user.checkout.make-payment', ['order_id' => $order->id])->with('success', __('notification.order_placed_successfully'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', __('notification.failed_to_place_order', ['error' => $e->getMessage()]));
        }
    }


    public function saveOrderAddress($order_id, $user, $request)
    {
        $billing_address = $user->address()->findOrFail($request->billing_address);

        $orderAddress = new OrderAddress();

        $orderAddress->order_id = $order_id;
        $orderAddress->billing_first_name = $billing_address->first_name;
        $orderAddress->billing_last_name = $billing_address->last_name;
        $orderAddress->billing_email = $billing_address->email;
        $orderAddress->billing_phone = $billing_address->phone;
        $orderAddress->billing_address = $billing_address->address;
        $orderAddress->billing_city = $billing_address->city;
        $orderAddress->billing_province = $billing_address->province;
        $orderAddress->billing_zip_code = $billing_address->zip_code;
        $orderAddress->billing_country = $billing_address->country;


        if($request->ship_to_diff_address == 'on'){
            $orderAddress->shipping_first_name = $request->first_name;
            $orderAddress->shipping_last_name = $request->last_name;
            $orderAddress->shipping_email = $request->email;
            $orderAddress->shipping_phone = $request->phone;
            $orderAddress->shipping_address = $request->address;
            $orderAddress->shipping_city = $request->city;
            $orderAddress->shipping_province = $request->province;
            $orderAddress->shipping_zip_code = $request->zip_code;
            $orderAddress->shipping_country = $request->country;
        }else{
            $orderAddress->shipping_first_name = $billing_address->first_name;
            $orderAddress->shipping_last_name = $billing_address->last_name;
            $orderAddress->shipping_email = $billing_address->email;
            $orderAddress->shipping_phone = $billing_address->phone;
            $orderAddress->shipping_address = $billing_address->address;
            $orderAddress->shipping_city = $billing_address->city;
            $orderAddress->shipping_province = $billing_address->province;
            $orderAddress->shipping_zip_code = $billing_address->zip_code;
            $orderAddress->shipping_country = $billing_address->country;
        }

        if ($orderAddress->save()) {
            return true;
        } else {
            throw new Exception(__('notification.failed_to_save_address'));
        }

    }

    public function makePayment(Request $request)
    {
        $order_id = $request->order_id;
        $user = auth()->user();

        $order = $user->orders()->where('id', $order_id)->first();

        if(!$order) {
            return redirect()->route('order-failed')->with('error', __('notification.payment_failed'));
        }

        $payment_method = Payment::where('id', $order->payment_method)->first();
        if($payment_method->value['status'] != 1) {
            return redirect()->route('order-failed')->with('error', __('notification.selected_payment_method_is_not_available'));
        }

        $getPayableAmount = $this->calculatePaymentSummary($payment_method, $order->amount_default, $order->paid_currency);

        session()->put('order', $order);
        session()->put('paid_currency', $order->paid_currency);
        session()->put('paid_amount', $getPayableAmount->payable_with_charge);

        $view = $this->getPaymentBladeView($payment_method->key);

        return view($view, compact('order', 'payment_method', 'getPayableAmount'));
    }

    public function payment_success() {
        $order = session()->get('order');
        $after_success_transaction = session()->get('after_success_transaction', null);
        $payment_details = session()->get('payment_details', null);

        try {

            $order->transaction_id = $after_success_transaction;
            $order->payment_status = 'success';
            $order->order_status = 'pending';
            $order->payment_details = json_encode($payment_details);
            $order->save();

            $this->removePaymentSessions();

            return redirect()->route('order-success')->with('success', __('notification.payment_successful'));

        } catch (Exception $e) {

            return redirect()->route('order-failed')->with('error', __('notification.failed_to_place_order', ['error' => $e->getMessage()]));
        }
    }

    public function payment_failed() {
        return redirect()->route('order-failed')->with('error', __('notification.payment_failed'));
    }

    public function payWithStripe()
    {
        $stripeData = Payment::where('key', 'stripe')->first();

        \Stripe\Stripe::setApiKey($stripeData->value['stripe_secret']);

        $after_failed_url = route('payment-failed');

        session()->put('after_failed_url', $after_failed_url);

        $paid_currency = session()->get('paid_currency');
        $paid_amount = session()->get('paid_amount');

        $payableAmount = $this->normalizePaidAmount($paid_amount, $paid_currency);

        // Create a checkout session
        $checkoutSession = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'           => [[
                'price_data' => [
                    'currency'     => $paid_currency,
                    'unit_amount'  => $payableAmount,
                    'product_data' => [
                        'name' => cache()->get('setting')->app_name,
                    ],
                ],
                'quantity'   => 1,
            ]],
            'mode'                 => 'payment',
            'success_url'          => url('/pay-with-stripe') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'           => $after_failed_url,
        ]);

        // Redirect to the checkout session URL
        return redirect()->away($checkoutSession->url);
    }

    public function stripeSuccess(Request $request) {
        $after_success_url = route('payment-success');
        $stripeData = Payment::where('key', 'stripe')->first();

        // Assuming the Checkout Session ID is passed as a query parameter
        $session_id = $request->query('session_id');
        if ($session_id) {
            \Stripe\Stripe::setApiKey($stripeData->value['stripe_secret']);

            $session = \Stripe\Checkout\Session::retrieve($session_id);

            $paymentDetails = [
                'transaction_id' => $session->payment_intent,
                'amount'         => $session->amount_total,
                'currency'       => $session->currency,
                'payment_status' => $session->payment_status,
                'created'        => $session->created,
            ];
            session()->put('after_success_url', $after_success_url);
            session()->put('after_success_transaction', $session->payment_intent);
            session()->put('payment_details', $paymentDetails);

            return redirect($after_success_url);
        }

        $after_failed_url = session()->get('after_failed_url');
        return redirect($after_failed_url);
    }


    public function payWithPaypal()
    {
        $paypalData = Payment::where('key', 'paypal')->first();
        $paypal = (object) $paypalData->value;

        $afterSuccessUrl = route('payment-success');
        $afterFailedUrl  = route('payment-failed');

        // Setup PayPal config
        $this->configurePaypal($paypal);

        $paidCurrency = session('paid_currency');
        $paidAmount   = session('paid_amount');

        try {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();

            $response = $provider->createOrder([
                'intent'              => 'CAPTURE',
                'application_context' => [
                    'return_url' => route('paypal-success'),
                    'cancel_url' => $afterFailedUrl,
                ],
                'purchase_units'      => [
                    [
                        'amount' => [
                            'currency_code' => $paidCurrency,
                            'value'         => $paidAmount,
                        ],
                    ],
                ],
            ]);
        } catch (Exception $ex) {
            return back()->with('error', __('notification.payment_failed'));
        }

        if (!empty($response['id'])) {
            session([
                'after_success_url' => $afterSuccessUrl,
                'after_failed_url'  => $afterFailedUrl,
                'paypal_credentials'=> $paypal,
            ]);

            // Redirect user to approval link
            $approvalUrl = collect($response['links'])->firstWhere('rel', 'approve')['href'] ?? null;
            return $approvalUrl ? redirect()->away($approvalUrl) : back()->with('error', __('notification.payment_approval_link_not_found'));
        }

        return back()->with('error', __('notification.payment_failed'));
    }

    public function paypalSuccess(Request $request)
    {
        $paypal = session('paypal_credentials');
        $this->configurePaypal($paypal);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->get('token'));

        if (data_get($response, 'status') === 'COMPLETED') {
            session([
                'after_success_transaction' => $request->get('PayerID'),
                'paid_amount'               => data_get($response, 'purchase_units.0.payments.captures.0.amount.value'),
                'payment_details'           => [
                    'capture_id' => data_get($response, 'purchase_units.0.payments.captures.0.id'),
                    'amount'     => data_get($response, 'purchase_units.0.payments.captures.0.amount.value'),
                    'currency'   => data_get($response, 'purchase_units.0.payments.captures.0.amount.currency_code'),
                    'paid'       => data_get($response, 'purchase_units.0.payments.captures.0.seller_receivable_breakdown.gross_amount.value'),
                    'paypal_fee' => data_get($response, 'purchase_units.0.payments.captures.0.seller_receivable_breakdown.paypal_fee.value'),
                    'net_amount' => data_get($response, 'purchase_units.0.payments.captures.0.seller_receivable_breakdown.net_amount.value'),
                    'status'     => data_get($response, 'purchase_units.0.payments.captures.0.status'),
                ],
            ]);

            return redirect(session('after_success_url'));
        }

        return redirect(session('after_failed_url'));
    }

    private function configurePaypal(object $paypal): void
    {
        config(['paypal.mode' => $paypal->paypal_account_mode]);

        if ($paypal->paypal_account_mode === 'sandbox') {
            config([
                'paypal.sandbox.client_id'     => $paypal->paypal_client_id,
                'paypal.sandbox.client_secret' => $paypal->paypal_secret_key,
            ]);
        } else {
            config([
                'paypal.live.client_id'     => $paypal->paypal_client_id,
                'paypal.live.client_secret' => $paypal->paypal_secret_key,
                'paypal.live.app_id'        => $paypal->paypal_app_id,
            ]);
        }
    }

    // cash on delivery
    public function payWithCod() {
        session()->put('after_success_transaction', 'hand_cash');
        return $this->payment_success();
    }

}
