<?php

namespace Modules\Frontend\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Frontend\Database\Seeders\HomeMainSeeder;
use Modules\Frontend\Database\Seeders\HomeThreeSeeder;
use Modules\Frontend\Database\Seeders\HomeTwoSeeder;
use Modules\Frontend\Database\Seeders\HomeFiveSeeder;
use Modules\Frontend\Database\Seeders\HomeSixSeeder;
use Modules\Frontend\Database\Seeders\HomeShopSeeder;
use Modules\Frontend\Database\Seeders\ServicePageSeeder;
use Modules\Frontend\Database\Seeders\AboutPageSeeder;
use Modules\Frontend\Database\Seeders\SliderSeeder;
use Modules\Frontend\Database\Seeders\SitePageSeeder;
use Modules\Frontend\Database\Seeders\ContactSeeder;

class FrontendDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            SitePageSeeder::class,
            HomeMainSeeder::class,
            HomeTwoSeeder::class,
            HomeThreeSeeder::class,
            HomeShopSeeder::class,
            HomeFiveSeeder::class,
            HomeSixSeeder::class,
            SliderSeeder::class,


            // Page Seeders
            ServicePageSeeder::class,
            ContactSeeder::class,
            AboutPageSeeder::class,
        ]);
    }
}
