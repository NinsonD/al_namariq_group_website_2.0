<?php

namespace Modules\Shop\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Shop\Database\Seeders\ProductCategorySeeder;
use Modules\Shop\Database\Seeders\ProductSeeder;
use Modules\Shop\Database\Seeders\AddressSeeder;
use Modules\Shop\Database\Seeders\InstagramSeeder;

class ShopDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ProductCategorySeeder::class,
            ProductSeeder::class,
            AddressSeeder::class,
            InstagramSeeder::class,
        ]);
    }
}
