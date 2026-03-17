<?php

namespace Modules\Shop\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Shop\Models\Cart;
use Modules\Shop\Traits\CartTrait;
use Modules\Shop\Traits\CouponTrait;

class CartController extends Controller
{

    use CartTrait, CouponTrait;

    // Show cart page
    public function show()
    {
        $shippingMethods = getAllActiveShippingMethods();

        if(!session()->has('shipping_method_id')) {
            $shippingMethodDefault = $shippingMethods->firstWhere('default', true);
            if ($shippingMethodDefault) {
                session()->put('shipping_method_id', $shippingMethodDefault->id);
            }
        }


        $cart = auth()->check() && auth()->user()->type !== 'admin' ? $this->getCart() : null;
        $amounts = $this->getCartAmounts($cart);

        return view('frontend.ecommerce.cart', [
            'cart' => $cart,
            'amounts' => $amounts,
            'shippingMethods' => $shippingMethods,
        ]);
    }

    // Add product to cart
    public function add(Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['success' => false, 'message' => __('notification.please_login_first')], 401);
        }

        if (auth()->user()->type === 'admin') {
            return response()->json([
                'success' => false,
                'message' => __('notification.this_action_is_disabled_for_admin')
            ], 403);
        }

        $request->validate(['product_id' => 'required|exists:products,id']);

        $qty = $request->has('quantity') ? (int)$request->quantity : 1;

        $isAvailableQty = $this->validateProductQtyWithCart((int)$request->product_id, $qty);

        $position = $request->has('position') ? $request->position : null;

        if($qty < 1) {
            return response()->json(['success' => false, 'message' => __('notification.quantity_must_be_at_least_1')], 422);
        }
        elseif(!$isAvailableQty['status']) {

            // if available is 0 then return error message
            if($isAvailableQty['available'] == 0) {
                return response()->json(['success' => false, 'message' => __('notification.product_is_out_of_stock')], 422);
            }

            return response()->json(['success' => false, 'message' => __('notification.max_quantity_exceeded', ['available' => $isAvailableQty['available']])], 422);
        }

        $res = $this->addToCart((int)$request->product_id, $qty, $position);

        return response()->json($res, $res['success'] ? 200 : 422);
    }

    // Update cart quantity
    public function updateQty(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
        ]);

        $res = $this->updateCartQty((int)$request->product_id, (int)$request->qty);
        return response()->json($res, $res['success'] ? 200 : 422);
    }

    // Remove product from cart
    public function remove(Request $request, $item)
    {
        $res = $this->removeFromCart((int)$item);
        return response()->json($res, $res['success'] ? 200 : 422);
    }

    // Get cart item count
    public function getCartCount()
    {
        return response()->json(['count' => $this->getCartItemsCount()]);
    }

    public function applyShippingMethod(Request $request)
    {
        $request->validate(['shipping_method_id' => 'required|exists:shipping_methods,id']);

        $page = $request->page ?? null;


        $cart = $this->getCart();

        if ($cart['items']->isEmpty()) {
            return response()->json(['success' => false, 'message' => __('notification.your_cart_is_empty')], 422);
        }

        $amounts = $this->getCartAmounts($cart);

        $shippingMethod = getShippingMethodDetails((int)$request->shipping_method_id);

        $isEligible = validateShippingMethod($shippingMethod, $amounts['subtotal']);



        if($isEligible['eligible']){
            session()->put('shipping_method_id', $shippingMethod->id);

            $newAmounts = $this->getCartAmounts($cart);

            // return response based on state

            if($page == 'checkout'){

                return response()->json([
                    'success' => true,
                    'message' => __('notification.shipping_method_applied'),
                    'page' => 'checkout',
                    'checkout_html' => $this->renderCheckout($cart, $newAmounts, getAllActiveShippingMethods()),
                ]);

            }else{
                return response()->json([
                    'success' => true,
                    'message' => __('notification.shipping_method_applied'),
                    'cart' => $this->renderCart($cart, $newAmounts, getAllActiveShippingMethods()),
                ]);
            }

        }

        // if not eligible, set default shipping method
        setDefaultShippingMethod();
        $amounts = $this->getCartAmounts($cart);


         if($page == 'checkout'){

            return response()->json([
                'success' => false,
                'message' =>  $isEligible['message'],
                'page' => 'checkout',
                'checkout_html' => $this->renderCheckout($cart, $amounts, getAllActiveShippingMethods()),
            ]);

        }else{
            return response()->json([
                'success' => false,
                'message' => $isEligible['message'],
                'cart' => $this->renderCart($cart, $amounts, getAllActiveShippingMethods()),
            ], 422);
        }


    }

    public function applyCoupon(Request $request)
    {
        $request->validate(['coupon_code' => 'required|string|exists:coupons,coupon_code']);

        if(auth()->check() && auth()->user()->type == 'admin'){
            return response()->json(['
                success'=> false,
                'message'=> __('notification.this_action_is_disabled_for_admin')
            ], 401);
        }

        $cart = $this->getCart();

        if ($cart['items']->isEmpty()) {
            return response()->json(['success' => false, 'message' => __('notification.your_cart_is_empty')], 422);
        }

        $amounts = $this->getCartAmounts($cart);

        $coupon = $this->applyCouponToCart($request->coupon_code, $amounts['subtotal']);


        if ($coupon['success']) {
            $cart = $this->getCart();
            $amounts = $this->getCartAmounts($cart);
            return response()->json([
                'success' => true,
                'message' => __('notification.coupon_applied'),
                'cart' => $this->renderCart($cart, $amounts, getAllActiveShippingMethods()),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $coupon['message'],
            'cart' => $this->renderCart($cart, $amounts, getAllActiveShippingMethods()),
        ], 422);
    }

    public function removeCoupon(Request $request)
    {
        if(auth()->check() && auth()->user()->type == 'admin'){
            return response()->json(['
                success'=> false,
                'message'=> __('notification.this_action_is_disabled_for_admin')
            ], 401);
        }

        $this->removeCouponFromCart();

        $cartItems = $this->getCart();
        $amounts = $this->getCartAmounts($cartItems);
        $shippingMethods = getAllActiveShippingMethods();


        if($request->page == 'checkout'){
            $res = [
                'success' => true,
                'message' => __('notification.coupon_removed'),
                'page' => 'checkout',
                'checkout_html' => $this->renderCheckout($cartItems, $amounts, $shippingMethods),
            ];

            return response()->json($res, $res['success'] ? 200 : 422);
        }else{
            $res = [
                'success' => true,
                'message' => __('notification.coupon_removed'),
                'count' => $cartItems['items']->count(),
                'cart_mini' => $this->renderMiniCart($cartItems, $amounts['subtotal']),
                'cart' => $this->renderCart($cartItems, $amounts, $shippingMethods),
            ];

            return response()->json($res, $res['success'] ? 200 : 422);
        }
    }

}
