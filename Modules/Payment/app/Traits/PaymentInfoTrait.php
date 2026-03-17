<?php

namespace Modules\Payment\Traits;

use Illuminate\Support\Str;
use Modules\Payment\Enums\PaymentMethodEnum;
use Modules\Payment\Models\Payment;

trait PaymentInfoTrait
{
    use PaymentCurrency;

    public function getPaymentDetails()
    {
        $allPayments = Payment::all();

        $info = [];

        foreach ($allPayments as $payment) {
            $info[$payment->key] = $payment->value;
        }

        return $info;
    }

    public function getPaymentGatewayDetails($method)
    {
        $allMethods = $this->getPaymentDetails();

        $stripe = $allMethods[PaymentMethodEnum::STRIPE->value] ?? null;
        $paypal = $allMethods[PaymentMethodEnum::PAYPAL->value] ?? null;
        $cod = $allMethods[PaymentMethodEnum::COD->value] ?? null;

        return match ($method){
            PaymentMethodEnum::STRIPE => (object) [
                'stripe_client' => $stripe['stripe_client'] ?? null,
                'stripe_secret' => $stripe['stripe_secret'] ?? null,
                'currency' => $stripe['currency'] ?? null,
                'gateway_charge' => $stripe['gateway_charge'] ?? null,
                'status' => $stripe['status'] ?? null,
                'image' => $stripe['image'] ?? null,
            ],
            PaymentMethodEnum::PAYPAL => (object) [
                'paypal_app_id' => $paypal['paypal_app_id'] ?? null,
                'paypal_client_id' => $paypal['paypal_client_id'] ?? null,
                'paypal_secret_key' => $paypal['paypal_secret_key'] ?? null,
                'paypal_account_mode' => $paypal['paypal_account_mode'] ?? null,
                'currency' => $paypal['currency'] ?? null,
                'gateway_charge' => $paypal['gateway_charge'] ?? null,
                'status' => $paypal['status'] ?? null,
                'image' => $paypal['image'] ?? null,
            ],
            PaymentMethodEnum::COD => (object) [
                'status' => $cod['status'] ?? null,
                'image' => $cod['image'] ?? null,
            ],
            default => (object) false,
        };
    }

    public function isCurrencySupported($method, $currencyCode = null)
    {
        $currencyCode = $currencyCode ?: getSessionCurrency()['code'];

        return match ($method) {
            PaymentMethodEnum::STRIPE => $this->supportsStripe($currencyCode),
            PaymentMethodEnum::PAYPAL => $this->supportsPaypal($currencyCode),
            PaymentMethodEnum::COD => true,
            default => false,
        };
    }

    public function calculatePaymentSummary(string $gateway, float|int $amount, ?string $currencyCode = null): object
    {
        // Get gateway charge percentage
        $gatewayDetails = $this->getPaymentGatewayDetails($gateway);
        $chargePercent = $gatewayDetails->gateway_charge ?? 0;

        // Get user currency details (fallback if null)
        $currency = getUserCurrency($currencyCode);
        $currencyCode = $currency['code'] ?? 'USD';
        $currencyRate = $currency['rate'] ?? 1;
        $currencyId   = $currency['id'] ?? 1;

        // Convert payable amount
        $convertedAmount = $amount * $currencyRate;

        // Calculate charges
        $gatewayCharge = $convertedAmount * ($chargePercent / 100);
        $totalPayable  = round($convertedAmount + $gatewayCharge, 2);

        // Store in session
        $payableData = [
            'payable_with_charge' => $totalPayable,
            'gateway_charge'      => $gatewayCharge,
            'payable_currency'    => $currencyCode,
        ];
        session()->put('payment_summary', $payableData);

        // Return as object
        return (object) [
            'currency_code'       => $currencyCode,
            'currency_id'         => $currencyId,
            'payable_amount'      => $convertedAmount,
            'gateway_charge'      => $gatewayCharge,
            'payable_with_charge' => $totalPayable,
        ];
    }

    public function getPaymentBladeView($method): string
    {
        return match ($method) {
            PaymentMethodEnum::STRIPE->value => 'payment::method-actions.stripe',
            PaymentMethodEnum::PAYPAL->value => 'payment::method-actions.paypal',
            PaymentMethodEnum::COD->value => 'payment::method-actions.cod',
            default => '',
        };
    }

    public function removePaymentSessions()
    {
        session()->forget(
            [
            'order',
            'paid_currency',
            'paid_amount',
            'after_success_url',
            'after_failed_url',
            'after_success_transaction',
            'payment_details',
        ]);
    }

}
