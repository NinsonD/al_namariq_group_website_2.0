<?php

namespace Modules\Currency\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\Currency\Models\Currency;

class CurrencyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            [
                'title' => 'US Dollar',
                'code' => 'USD',
                'symbol' => '$',
                'exchange_rate' => 1,
                'is_default' => true,
                'status' => true,
                'symbol_position' => 'before_price',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Euro',
                'code' => 'EUR',
                'symbol' => '€',
                'exchange_rate' => 0.92,
                'is_default' => false,
                'status' => true,
                'symbol_position' => 'before_price',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'British Pound',
                'code' => 'GBP',
                'symbol' => '£',
                'exchange_rate' => 0.78,
                'is_default' => false,
                'status' => true,
                'symbol_position' => 'before_price',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Japanese Yen',
                'code' => 'JPY',
                'symbol' => '¥',
                'exchange_rate' => 142.5,
                'is_default' => false,
                'status' => true,
                'symbol_position' => 'before_price',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Bangladeshi Taka',
                'code' => 'BDT',
                'symbol' => '৳',
                'exchange_rate' => 109.5,
                'is_default' => false,
                'status' => true,
                'symbol_position' => 'before_price_space',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Indian Rupee',
                'code' => 'INR',
                'symbol' => '₹',
                'exchange_rate' => 82.5,
                'is_default' => false,
                'status' => true,
                'symbol_position' => 'before_price_space',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        Currency::insert($currencies);
    }
}
