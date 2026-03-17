<?php

namespace Modules\Shop\Traits;

use Illuminate\Support\Facades\Auth;
use Modules\Coupon\Models\Coupon;
use Modules\Coupon\Models\CouponHistory;
use Modules\Shop\Models\Cart;

trait CouponTrait
{
    use CartTrait;

    /**
     * Validate The Coupon
    */

    public function validateCoupon(string $code, float|int $amount = 0)
    {
        $coupon = Coupon::where('coupon_code', $code)->first();

        if (!$coupon) {
            return ['success' => false, 'message' => __('notification.invalid_coupon')];
        }

        // Validate coupon status & date
        if (!$coupon->status) {
            return ['success' => false, 'message' => __('notification.coupon_inactive')];
        }

        $today = now()->toDateString();
        if ($today < $coupon->start_date || $today > $coupon->end_date) {
            return ['success' => false, 'message' => __('notification.coupon_expired')];
        }

        // Get cart amount
        if ($amount < $coupon->min_price) {
            return ['success' => false, 'message' => __('notification.coupon_minimum_order_amount', ['amount' => themeCurrency($coupon->min_price)])];
        }

        // Check per-user limit if logged in
        if (Auth::check()) {
            $usageCount = CouponHistory::where('coupon_id', $coupon->id)
                ->where('user_id', Auth::id())
                ->count();

            if ($usageCount >= $coupon->per_user_limit) {
                return ['success' => false, 'message' => __('notification.you_have_already_used_this_coupon')];
            }
        }

        return ['success'=> true, 'coupon' => $coupon];
    }


    /**
     * Apply a coupon to current cart
     */
    public function applyCouponToCart(string $code, float|int $subtotal = 0): array
    {

        $checkCoupon = $this->validateCoupon($code, $subtotal);

        if(!$checkCoupon['success']) {
            return ['success'=> false, 'message'=> $checkCoupon['message']];
        }

        $coupon = $checkCoupon['coupon'];

        // Apply coupon to session or DB
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();

            if ($cart) {
                $cart->update([
                    'coupon_id' => $coupon->id,
                ]);
            }
        } else {
            return [
                'success' => false,
                'message' => __('notification.unauthorized')
            ];
        }

        return [
            'success' => true,
            'message' => __('notification.coupon_applied'),
        ];
    }

    /**
     * Remove coupon from cart
     */
    public function removeCouponFromCart(): array
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();

            if ($cart) {
                $cart->update([
                    'coupon_id' => null,
                ]);

                return [
                    'success' => true,
                    'message' => __('notification.coupon_removed')
                ];
            }else{
                return [
                    'success' => false,
                    'message' => __('notification.cart_not_found')
                ];
            }
        }else{
            return [
                'success' => false,
                'message' => __('notification.unauthorized')
            ];
        }
    }

}
