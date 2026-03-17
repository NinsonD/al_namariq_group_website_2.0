<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\AdminSeeder;
use Modules\Currency\Database\Seeders\CurrencyDatabaseSeeder;
use Modules\Frontend\Database\Seeders\ContactSeeder;
use Modules\Frontend\Database\Seeders\SectionSeeder;
use Modules\Frontend\Database\Seeders\SitePageSeeder;
use Modules\Language\Database\Seeders\LanguageDatabaseSeeder;
use Modules\Menu\Database\Seeders\FreshMenuSeeder;
use Modules\Page\Database\Seeders\PageDatabaseSeeder;
use Modules\Payment\Database\Seeders\PaymentDatabaseSeeder;
use Modules\Settings\Database\Seeders\SettingsDatabaseSeeder;

class FreshDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            ContactSeeder::class,
            SitePageSeeder::class,
            FreshMenuSeeder::class,
            ContactSeeder::class,
            PageDatabaseSeeder::class,
            SettingsDatabaseSeeder::class,
            LanguageDatabaseSeeder::class,
            CurrencyDatabaseSeeder::class,
            PaymentDatabaseSeeder::class,
            SectionSeeder::class,
        ]);
    }
}
