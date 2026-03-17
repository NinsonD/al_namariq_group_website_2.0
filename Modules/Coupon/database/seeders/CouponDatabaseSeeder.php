<?php

namespace Modules\Coupon\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Coupon\Models\Coupon;

class CouponDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authorId = User::where('type', 'admin')->where('username', 'super_admin')->first()->id;

        $coupons = [
            [
                'author_id' => $authorId,
                'coupon_code' => 'DEMO10',
                'min_price' => 100,
                'discount' => 10,
                'discount_type' => 'percentage',
                'per_user_limit' => 20,
                'start_date' => now()->subDays(2)->toDateString(),
                'end_date' => now()->addDays(20)->toDateString(),
                'status' => true,
                'image' => 'uploads/coupons/demo10.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => $authorId,
                'coupon_code' => 'SHIPFREE',
                'min_price' => 50,
                'discount' => 0,
                'discount_type' => 'amount',
                'per_user_limit' => 20,
                'start_date' => now()->toDateString(),
                'end_date' => now()->addDays(50)->toDateString(),
                'status' => true,
                'image' => 'uploads/coupons/shipfree.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => $authorId,
                'coupon_code' => 'FLAT50',
                'min_price' => 500,
                'discount' => 50,
                'discount_type' => 'percentage',
                'per_user_limit' => 20,
                'start_date' => now()->subDay()->toDateString(),
                'end_date' => now()->addDays(90)->toDateString(),
                'status' => true,
                'image' => 'uploads/coupons/flat50.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($coupons as $coupon) {
            Coupon::create($coupon);
        }
    }
}
