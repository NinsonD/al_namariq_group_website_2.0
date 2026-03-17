<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Modules\Currency\Models\Currency;
use Illuminate\Support\Collection;

// Cache all currencies
if (!function_exists("getAllCurrencies")) {
    function getAllCurrencies(): Collection
    {
        return Cache::rememberForever('allCurrencies', fn () => Currency::all());
    }
}

// Format currency
if (!function_exists('themeCurrency')) {
    function themeCurrency($amount, $withSymbol = true, $withDecimal = true): string
    {

        $currency = getSessionCurrency();

        $converted = $amount * $currency['rate'];
        $formatted = $withDecimal
            ? number_format($converted, 2, '.', ',')
            : (float) $converted;

        if (!$withSymbol) {
            return $formatted;
        }

        $currencyPosition = array_key_exists('position', $currency) ? $currency['position'] : 'before_price';

        return match ($currencyPosition) {
            'before_price'             => $currency['symbol'] . $formatted,
            'before_price_space'       => $currency['symbol'] . ' ' . $formatted,
            'after_price'              => $formatted . $currency['symbol'],
            'after_price_space'        => $formatted . ' ' . $currency['symbol'],
            default                    => $currency['symbol'] . $formatted,
        };
    }
}

if (!function_exists('getCurrencyWithSymbol')) {
    function getCurrencyWithSymbol($amount, $code){
        return "{$amount} ({$code})";
    }
}


// format amount with site default currency (using session like getSessionCurrency)
if (!function_exists('getSiteDefaultCurrency')) {
    function getSiteDefaultCurrency($amount, $withSymbol = true, $withDecimal = true): string
    {
        $currency = getSessionCurrency();

        $converted = $amount * ($currency['rate'] ?? 1);

        $formatted = $withDecimal
            ? number_format($converted, 2, '.', ',')
            : (int) $converted;

        if (!$withSymbol) {
            return $formatted;
        }

        return match ($currency['position']) {
            'before_price'        => $currency['symbol'] . $formatted,
            'before_price_space'  => $currency['symbol'] . ' ' . $formatted,
            'after_price'         => $formatted . $currency['symbol'],
            'after_price_space'   => $formatted . ' ' . $currency['symbol'],
            default               => $currency['symbol'] . $formatted,
        };
    }
}


if (!function_exists('getSiteDefaultCurrencyDetails')) {
    function getSiteDefaultCurrencyDetails(): array
    {
        $currency = getAllCurrencies()
            ->where('is_default', true)
            ->first();

        if (!$currency) {
            $currency = (object) [
                'code'     => 'USD',
                'symbol'   => '$',
                'exchange_rate'     => 1,
                'position' => 'before_price',
            ];
        }

        return [
            'code' => $currency->code,
            'symbol' => $currency->symbol,
            'exchange_rate' => $currency->exchange_rate,
            'position' => $currency->position,
        ];
    }
}


// Get session currency or set default
if (!function_exists('getSessionCurrency')) {
    function getSessionCurrency(): array
    {
        static $cachedCurrency = null;

        if ($cachedCurrency !== null) {
            return $cachedCurrency;
        }

        if (!Session::has('currency')) {
            $default = getAllCurrencies()->where('is_default', true)->first();

            if ($default) {
                Session::put('currency', [
                    'symbol' => $default->symbol,
                    'rate' => $default->exchange_rate,
                    'position' => $default->position,
                    'code' => $default->code,
                ]);
            }
        }

        $cachedCurrency = Session::get('currency', [
            'symbol' => '$',
            'rate' => 1,
            'position' => 'before_price',
            'code' => 'USD',
        ]);

        return $cachedCurrency;
    }
}


// forgot currency session
if (!function_exists('forgetCurrencySession')) {
    function forgetCurrencySession(): void
    {
        if (Session::has('currency')) {
            Session::forget('currency');
        }
    }
}

// Set site currency
if (!function_exists('setSiteCurrency')) {
    function setSiteCurrency(string $code): void
    {
        $currency = getAllCurrencies()->where('code', $code)->first();
        if ($currency) {
            Session::put('currency', [
                'symbol' => $currency->symbol,
                'rate' => $currency->exchange_rate,
                'position' => $currency->position,
                'code' => $currency->code,
            ]);
        } else {
            forgetCurrencySession();
        }
    }
}

// get currency by code
if (!function_exists('getUserCurrency')) {
    function getUserCurrency($currency_code = null) {


        if(is_null($currency_code)){
            $currency_code = getSessionCurrency();
        }

        if(is_array($currency_code)){
            $newCode = $currency_code['code'];
        }else{
            $newCode = $currency_code;
        }


        $gateway_currency = getAllCurrencies()->where('code', $newCode)->first();

        return [
            'code' => $gateway_currency->code,
            'rate' => $gateway_currency->exchange_rate,
            'id'   => $gateway_currency->id,
        ];
    }
}
