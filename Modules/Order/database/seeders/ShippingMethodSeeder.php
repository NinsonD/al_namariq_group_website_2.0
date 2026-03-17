<?php

namespace Modules\Order\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Order\Models\ShippingMethod;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shippingMethods = [
            [
                'fee' => 50,
                'min_amount' => 0,
                'min_days' => 2,
                'max_days' => 5,
                'default' => true,
                'is_free' => false,
                'status' => true,
                'translations' => [
                    ['locale' => 'en', 'title' => 'Standard Shipping'],
                    ['locale' => 'hi', 'title' => 'मानक शिपिंग'],
                    ['locale' => 'ar', 'title' => 'الشحن العادي'],
                ],
            ],
            [
                'fee' => 0,
                'min_amount' => 500,
                'min_days' => 3,
                'max_days' => 7,
                'default' => false,
                'is_free' => true,
                'status' => true,
                'translations' => [
                    ['locale' => 'en', 'title' => 'Free Shipping'],
                    ['locale' => 'hi', 'title' => 'मुफ़्त शिपिंग'],
                    ['locale' => 'ar', 'title' => 'شحن مجاني'],
                ],
            ],
            [
                'fee' => 100,
                'min_amount' => 0,
                'min_days' => 1,
                'max_days' => 3,
                'default' => false,
                'is_free' => false,
                'status' => true,
                'translations' => [
                    ['locale' => 'en', 'title' => 'Express Shipping'],
                    ['locale' => 'hi', 'title' => 'एक्सप्रेस शिपिंग'],
                    ['locale' => 'ar', 'title' => 'الشحن السريع'],
                ],
            ],
            // Cash on Delivery
            [
                'fee' => 0,
                'min_amount' => 0,
                'min_days' => 0,
                'max_days' => 0,
                'default' => false,
                'is_free' => true,
                'status' => true,
                'translations' => [
                    ['locale' => 'en', 'title' => 'Cash on Delivery'],
                    ['locale' => 'hi', 'title' => 'कैश ऑन डिलीवरी'],
                    ['locale' => 'ar', 'title' => 'الدفع عند الاستلام'],
                ],
            ],
        ];

        foreach ($shippingMethods as $methodData) {
            $translations = $methodData['translations'];
            unset($methodData['translations']); // remove translations from main array

            $shipping = ShippingMethod::create($methodData);

            // create translations using the relation
            $shipping->translations()->createMany($translations);
        }
    }
}
