<?php

namespace Modules\Order\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Order\Database\Seeders\ShippingMethodSeeder;
use Modules\Order\Database\Seeders\UserOrderSeeder;

class OrderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ShippingMethodSeeder::class,
            UserOrderSeeder::class,
        ]);
    }
}
