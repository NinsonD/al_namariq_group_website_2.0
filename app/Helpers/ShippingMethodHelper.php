<?php

use Illuminate\Support\Facades\Cache;
use Modules\Order\Models\ShippingMethod;

if (!function_exists('getAllShippingMethods')) {
    function getAllShippingMethods()
    {
        static $memoized = null;

        if ($memoized !== null) {
            return $memoized;
        }

        $memoized = Cache::rememberForever('shipping_methods', function () {
            return ShippingMethod::with(['translations'])->get();
        });

        return $memoized;
    }
}

if (!function_exists('getAllActiveShippingMethods')) {
    function getAllActiveShippingMethods()
    {
        return getAllShippingMethods()->where('status', true);
    }
}

if (!function_exists('getShippingMethodDetails')) {
    function getShippingMethodDetails($id)
    {
        return getAllShippingMethods()->firstWhere('id', (int)$id) ?? null;
    }
}

if (!function_exists('isAvailableForFreeShipping')) {
    function isAvailableForFreeShipping($subtotal)
    {
        $free = getAllActiveShippingMethods()
            ->where('is_free', true)
            ->sortBy('min_amount')
            ->first();

        if (!$free) {
            return [
                'available'  => false,
                'min_amount' => 0,
                'remaining'  => 0,
                'percentage' => 0,
                'message'    => null,
                'eligible'   => false,
                'method_id'  => null,
            ];
        }

        $min  = (float) $free->min_amount;    // allow 0
        $rem  = max(0, $min - $subtotal);
        $perc = $min > 0 ? min(100, round(($subtotal / $min) * 100)) : 100;
        $ok   = $subtotal >= $min;

        $msg = $rem > 0
            ? "Add " . themeCurrency($rem) . " more to get free shipping."
            : "Congratulations! You have qualified for free shipping.";

        return [
            'available'  => true,
            'min_amount' => $min,
            'remaining'  => $rem,
            'percentage' => $perc,
            'message'    => $msg,
            'eligible'   => $ok,
            'method_id'  => $free->id,
        ];
    }
}

if(!function_exists('validateShippingMethod')) {

    function validateShippingMethod($method, $amount)
    {
        if (!$method || !$method->status) {
            return [
                'eligible' => false,
                'message' => 'Invalid shipping method.',
            ];
        }

        if ($method->min_amount > 0 && $amount < $method->min_amount) {
            $remaining = $method->min_amount - $amount;
            $message = $method->is_free
                ? "Add " . themeCurrency($remaining) . " more to get free shipping."
                : "Add " . themeCurrency($remaining) . " more to use this shipping method.";

            return [
                'eligible' => false,
                'message' => $message,
            ];
        }

        return [
            'eligible' => true,
            'message' => null,
        ];
    }
}

if(!function_exists('setDefaultShippingMethod')) {

    function setDefaultShippingMethod()
    {

        if (session()->has('shipping_method_id')) {
            session()->forget('shipping_method_id');
        }

        $defaultMethod = getAllActiveShippingMethods()->firstWhere('default', true);

        if ($defaultMethod) {
            session()->put('shipping_method_id', $defaultMethod->id);
        } else {
            session()->forget('shipping_method_id');
        }
    }
}

