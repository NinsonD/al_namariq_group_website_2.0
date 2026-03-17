<?php

namespace Modules\Shop\Traits;

use Illuminate\Support\Facades\Auth;
use Modules\Order\Models\ShippingMethod;
use Modules\Shop\Models\Cart;
use Modules\Shop\Models\CartItem;
use Modules\Shop\Models\Product;


trait CartTrait
{
    // Current user's cart items
    protected function getCart()
    {
        if (!Auth::check() || Auth::user()->type !== 'user') {
            return ['items' => collect([]), 'cart' => null];
        }

        $cart = Cart::with(['coupon'])->firstOrCreate(['user_id' => Auth::id()]);

        $items = CartItem::with(['product', 'product.translations'])
            ->where('cart_id', $cart->id)
            ->get();

        return [
            'items' => $items,
            'cart' => $cart
        ];
    }

    public static function getUserCart()
    {
        return (new static)->getCart();
    }

    // Get subtotal and total including shipping
    protected function getCartAmounts($cart)
    {
        if(empty($cart)){
            return [
                'subtotal' => 0,
                'total' => 0,
                'subtotalDiscounted' => 0,
                'discountType' => null,
                'discountRaw' => 0,
                'discountAmount' => 0,
                'tax' => 0,
                'taxPercent' => 0
            ];
        }

        $subtotal = $cart['items']->sum(fn($item) => ($item->product->sale_price ?? $item->product->price) * $item->qty);
        $shippingCost = 0;

        $methods = getAllActiveShippingMethods();
        $shippingMethodId = session('shipping_method_id') ?? $methods->firstWhere('default', true)?->id;

        if ($shippingMethodId) {
            $shippingMethod = $methods->firstWhere('id', $shippingMethodId);
            if ($shippingMethod && validateShippingMethod($shippingMethod, $subtotal)['eligible']) {
                $shippingCost = $shippingMethod->fee;
            }
        }

        // here check if coupon is applied and adjust subtotal if needed
        $subtotalDiscounted = 0;
        $discountType = null;
        $discountRaw = null;
        $discountAmount = 0;
        if($cart['cart']){
            $coupon = $cart['cart']->coupon;

            if($coupon){
                $isValidCoupon = $this->validateCoupon($coupon->coupon_code, $subtotal);
                if($isValidCoupon['success']){
                    $discountAmount = $coupon->discount_type === 'percentage'
                                    ? ($subtotal * ($coupon->discount / 100))
                                    : $coupon->discount;
                    $discountType = $coupon->discount_type;
                    $discountRaw = $coupon->discount;

                    $subtotalDiscounted += floatval($discountAmount); // Apply discount


                }else{
                    // if not valid then remove coupon
                    $cart['cart']->update([
                        'coupon_id' => null
                    ]);
                }
            }
        }

        $taxPercent = 10;

        $tax = $subtotal * ($taxPercent / 100);

        $total = ($subtotal - $subtotalDiscounted) + $shippingCost;

        return [
            'subtotal' => $subtotal,
            'total' => $total,
            'subtotalDiscounted' => $subtotalDiscounted,
            'discountType' => $discountType,
            'discountRaw' => $discountRaw,
            'discountAmount' => $discountAmount,
            'tax' => $tax,
            'taxPercent' => $taxPercent,
        ];
    }

    protected function renderMiniCart($cart, $subtotal)
    {
        return view('frontend.products.cartmini-content', [
            'cart' => $cart,
            'subtotal' => themeCurrency($subtotal),
        ])->render();
    }

    protected function renderCart($cart, $amounts, $shippingMethods)
    {
        return view('frontend.ecommerce.partials.cart-content', [
            'cart' => $cart,
            'amounts' => $amounts,
            'shippingMethods' => $shippingMethods,
        ])->render();
    }

    protected function renderCheckout($cart, $amounts, $shippingMethods)
    {
        return view('frontend.ecommerce.partials.checkout-content', [
            'cart' => $cart,
            'amounts' => $amounts,
            'shippingMethods' => $shippingMethods,
        ])->render();
    }

    protected function addToCart(int $productId, int $qty = 1, $position = null): array
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $product = Product::find($productId);

        if (!$product) return ['success' => false, 'message' => __('notification.product_not_found')];
        if ($product->qty <= 0) return ['success' => false, 'message' => __('notification.out_of_stock')];

        $item = CartItem::firstOrCreate(['cart_id' => $cart->id, 'product_id' => $productId]);
        $item->qty = min($item->qty + $qty, $product->qty);
        $item->save();

        $cartItems = $this->getCart();
        $amounts = $this->getCartAmounts($cartItems);
        $shippingMethods = getAllActiveShippingMethods();


        if($position == 'details_page')
        {
            return [
                'success' => true,
                'message' => 'Product added to cart',
                'count' => $cartItems['items']->count(),
                'cart_mini' => $this->renderMiniCart($cartItems, $amounts['subtotal']),
            ];
        }

        return [
            'success' => true,
            'message' => 'Product added to cart',
            'count' => $cartItems['items']->count(),
            'cart_mini' => $this->renderMiniCart($cartItems, $amounts['subtotal']),
            'cart' => $this->renderCart($cartItems, $amounts, $shippingMethods),
            'subtotal' => themeCurrency($amounts['subtotal']),
        ];
    }

    protected function updateCartQty(int $productId, int $qty): array
    {
        $cartItems = $this->getCart();
        $product = Product::find($productId);
        if (!$product) return ['success' => false, 'message' => __('notification.product_not_found')];

        $item = $cartItems['items']->firstWhere('product_id', $productId);
        if (!$item) return ['success' => false, 'message' => __('notification.product_not_in_cart')];

        $item->qty = min(max($qty, 1), $product->qty);
        $item->save();

        $cartItems = $this->getCart();
        $amounts = $this->getCartAmounts($cartItems);

        $shippingMethods = getAllActiveShippingMethods();

        // Validate current shipping method
        $shippingMethodId = session('shipping_method_id');
        if ($shippingMethodId) {
            $shippingMethod = $shippingMethods->firstWhere('id', $shippingMethodId);
            if ($shippingMethod && !validateShippingMethod($shippingMethod, $amounts['subtotal'])['eligible']) {
                setDefaultShippingMethod();
                $amounts = $this->getCartAmounts($cartItems); // recalc after default shipping applied
            }
        }


        return [
            'success' => true,
            'message' => 'Quantity updated',
            'count' => $cartItems['items']->count(),
            'cart_mini' => $this->renderMiniCart($cartItems, $amounts['subtotal']),
            'cart' => $this->renderCart($cartItems, $amounts, $shippingMethods),
            'subtotal' => themeCurrency($amounts['subtotal']),
            'max_reached' => $qty > $product->qty,
        ];
    }

    protected function removeFromCart(int $productId): array
    {
        $cartItems = $this->getCart();
        $item = $cartItems['items']->firstWhere('product_id', $productId);
        if (!$item) return ['success' => false, 'message' => __('notification.product_not_in_cart')];

        $item->delete();

        $cartItems = $this->getCart();
        $amounts = $this->getCartAmounts($cartItems);
        $shippingMethods = getAllActiveShippingMethods();

        // Validate current shipping method
        $shippingMethodId = session('shipping_method_id');
        if ($shippingMethodId) {
            $shippingMethod = $shippingMethods->firstWhere('id', $shippingMethodId);
            if ($shippingMethod && !validateShippingMethod($shippingMethod, $amounts['subtotal'])['eligible']) {
                setDefaultShippingMethod();
                $amounts = $this->getCartAmounts($cartItems);
            }
        }

        return [
            'success' => true,
            'message' => __('notification.product_removed'),
            'count' => $cartItems['items']->count(),
            'cart_mini' => $this->renderMiniCart($cartItems, $amounts['subtotal']),
            'cart' => $this->renderCart($cartItems, $amounts, $shippingMethods),
        ];
    }

    protected function getCartItemsCount(): int
    {
        return $this->getCart()['items']->count();
    }

    protected function validateProductQtyWithCart($productId, $desiredQty): array
    {
        $cartItems = $this->getCart();
        $item = $cartItems['items']->firstWhere('product_id', $productId);
        $product = Product::find($productId);
        if (!$product) return ['status' => false, 'available' => 0];

        $currentQtyInCart = $item ? $item->qty : 0;
        $status = ($currentQtyInCart + $desiredQty) <= $product->qty;
        $availableQty = $product->qty - $currentQtyInCart;

        return [
            'status' => $status,
            'available' => $availableQty,
        ];
    }
}
