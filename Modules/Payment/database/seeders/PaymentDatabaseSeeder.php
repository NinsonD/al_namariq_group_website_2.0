<?php

namespace Modules\Payment\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Currency\Models\Currency;
use Modules\Payment\Models\Payment;

class PaymentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $sourcePath = public_path('admin/img/icons/payment');
        copyFilesToStorage($sourcePath, 'website');


       $payments = [
            [
                'key' => 'cash_on_delivery',
                'value' => [
                    'status' => 1,
                    'image' => 'uploads/website/cash-on-delivery.png',
                ],
            ],
            [
                'key' => 'stripe',
                'value' => [
                    'stripe_secret' => 'your_stripe_secret_key_here',
                    'stripe_client' => 'your_stripe_client_key_here',
                    'currency' => Currency::first()?->id,
                    'gateway_charge' => 0,
                    'status' => 1,
                    'image' => 'uploads/website/stripe.png',
                ],
            ],
            [
                'key' => 'paypal',
                'value' => [
                    'paypal_app_id' => 'your_paypal_app_id_here',
                    'paypal_client_id' => 'your_paypal_client_id_here',
                    'paypal_secret_key' => 'your_paypal_secret_key_here',
                    'paypal_account_mode' => 'sandbox',
                    'currency' => Currency::first()?->id,
                    'gateway_charge' => 5,
                    'status' => 1,
                    'image' => 'uploads/website/paypal.png',
                ]
            ]
        ];

        foreach ($payments as $payment) {
            Payment::updateOrCreate(
                ['key' => $payment['key']],
                ['value' => $payment['value']]
            );
        }
    }
}
