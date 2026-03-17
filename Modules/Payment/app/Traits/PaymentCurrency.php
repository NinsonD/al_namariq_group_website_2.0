<?php

namespace Modules\Payment\Traits;

use Illuminate\Support\Str;

trait PaymentCurrency
{
    // Stripe
    public static function stripeCurrencies(): array
    {
        $all = [
            'USD', 'AED', 'AFN', 'ALL', 'AMD', 'ANG', 'AOA', 'ARS', 'AUD', 'AWG', 'AZN',
            'BAM', 'BBD', 'BDT', 'BGN', 'BIF', 'BMD', 'BND', 'BOB', 'BRL', 'BSD',
            'BWP', 'BYN', 'BZD', 'CAD', 'CDF', 'CHF', 'CLP', 'CNY', 'COP', 'CRC',
            'CVE', 'CZK', 'DJF', 'DKK', 'DOP', 'DZD', 'EGP', 'ETB', 'EUR', 'FJD',
            'FKP', 'GBP', 'GEL', 'GIP', 'GMD', 'GNF', 'GTQ', 'GYD', 'HKD', 'HNL',
            'HTG', 'HUF', 'IDR', 'ILS', 'INR', 'ISK', 'JMD', 'JPY', 'KES', 'KGS',
            'KHR', 'KMF', 'KRW', 'KYD', 'KZT', 'LAK', 'LBP', 'LKR', 'LRD', 'LSL',
            'MAD', 'MDL', 'MGA', 'MKD', 'MMK', 'MNT', 'MOP', 'MUR', 'MVR', 'MWK',
            'MXN', 'MYR', 'MZN', 'NAD', 'NGN', 'NIO', 'NOK', 'NPR', 'NZD', 'PAB',
            'PEN', 'PGK', 'PHP', 'PKR', 'PLN', 'PYG', 'QAR', 'RON', 'RSD', 'RUB',
            'RWF', 'SAR', 'SBD', 'SCR', 'SEK', 'SGD', 'SHP', 'SLE', 'SOS', 'SRD',
            'STD', 'SZL', 'THB', 'TJS', 'TOP', 'TRY', 'TTD', 'TWD', 'TZS', 'UAH',
            'UGX', 'UYU', 'UZS', 'VND', 'VUV', 'WST', 'XAF', 'XCD', 'XOF', 'XPF',
            'YER', 'ZAR', 'ZMW', 'BIF', 'CLP', 'DJF', 'GNF', 'JPY', 'KMF', 'KRW',
            'MGA', 'PYG', 'RWF', 'UGX', 'VND', 'VUV', 'XAF', 'XOF', 'XPF', 'BHD',
            'JOD', 'KWD', 'OMR', 'TND',
        ];

        $nonZero = [
            'BIF', 'CLP', 'DJF', 'GNF', 'JPY', 'KMF', 'KRW', 'MGA',
            'PYG', 'RWF', 'UGX', 'VND', 'VUV', 'XAF', 'XOF', 'XPF'
        ];

        $threeDigit = ['BHD', 'JOD', 'KWD', 'OMR', 'TND'];

        $smallestUnit = array_diff($all, $nonZero, $threeDigit);

        return [
            'all' => $all,
            'smallest_unit' => $smallestUnit,
            'non_zero' => $nonZero,
            'three_digit' => $threeDigit,
        ];
    }

    public static function supportsStripe(string $code): bool
    {
        return in_array(Str::upper($code), self::stripeCurrencies()['all']);
    }

    // PayPal
    public static function paypalCurrencies(): array
    {
        return [
            'AUD', 'BRL', 'CAD', 'CNY', 'CZK', 'DKK', 'EUR', 'HKD',
            'HUF', 'ILS', 'JPY', 'MYR', 'MXN', 'TWD', 'NZD', 'NOK',
            'PHP', 'PLN', 'GBP', 'SGD', 'SEK', 'CHF', 'THB', 'USD'
        ];
    }

    public static function supportsPaypal(string $code): bool
    {
        return in_array(Str::upper($code), self::paypalCurrencies());
    }

    public static function normalizePaidAmount(float|int $amount, string $currencyCode): int
    {
        $currencyCode = Str::upper($currencyCode);
        $currencies   = self::stripeCurrencies();

        if (in_array($currencyCode, $currencies['non_zero'])) {
            return (int) round($amount);
        }

        if (in_array($currencyCode, $currencies['three_digit'])) {
            return (int) round($amount * 1000);
        }

        return (int) round($amount * 100);
    }


}
