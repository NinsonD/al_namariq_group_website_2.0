<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Artisan;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Modules\Core\Database\Seeders\AdminSeeder;
use Modules\Coupon\Database\Seeders\CouponDatabaseSeeder;
use Modules\Currency\Database\Seeders\CurrencyDatabaseSeeder;
use Modules\Frontend\Database\Seeders\ContactSeeder;
use Modules\Blog\Database\Seeders\BlogDatabaseSeeder;
use Modules\Core\Database\Seeders\CoreDatabaseSeeder;
use Modules\Faqs\Database\Seeders\FaqsDatabaseSeeder;
use Modules\Language\Database\Seeders\LanguageDatabaseSeeder;
use Modules\Menu\Database\Seeders\MenuDatabaseSeeder;
use Modules\Order\Database\Seeders\OrderDatabaseSeeder;
use Modules\Page\Database\Seeders\PageDatabaseSeeder;
use Modules\Payment\Database\Seeders\PaymentDatabaseSeeder;
use Modules\Shop\Database\Seeders\ShopDatabaseSeeder;
use Modules\Team\Database\Seeders\TeamDatabaseSeeder;
use Modules\Brand\Database\Seeders\BrandDatabaseSeeder;
use Modules\Social\Database\Seeders\SocialDatabaseSeeder;
use Modules\Pricing\Database\Seeders\PricingDatabaseSeeder;
use Modules\Service\Database\Seeders\ServiceDatabaseSeeder;
use Modules\Settings\Database\Seeders\SettingsDatabaseSeeder;
use Modules\Installer\Database\Seeders\InstallerDatabaseSeeder;
use Modules\Portfolio\Database\Seeders\PortfolioDatabaseSeeder;
use Modules\NewsLetter\Database\Seeders\NewsLetterDatabaseSeeder;
use Modules\Testimonial\Database\Seeders\TestimonialDatabaseSeeder;
use Modules\Frontend\Database\Seeders\FrontendDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if (session()->has('fresh_install') && session()->get('fresh_install') == true) {
            Log::info('Running fresh install seeders');

            $this->call([
                InstallerDatabaseSeeder::class,
                FreshDatabaseSeeder::class,

            ]);
        }else{
            Log::info('Running seeders');

            $this->call([
                InstallerDatabaseSeeder::class,
                AdminSeeder::class,
                CoreDatabaseSeeder::class,
                ContactSeeder::class,
                BlogDatabaseSeeder::class,
                BrandDatabaseSeeder::class,
                FaqsDatabaseSeeder::class,
                MenuDatabaseSeeder::class,
                PageDatabaseSeeder::class,
                PortfolioDatabaseSeeder::class,
                PricingDatabaseSeeder::class,
                ServiceDatabaseSeeder::class,
                SettingsDatabaseSeeder::class,
                SocialDatabaseSeeder::class,
                NewsLetterDatabaseSeeder::class,
                TeamDatabaseSeeder::class,
                TestimonialDatabaseSeeder::class,
                FrontendDatabaseSeeder::class,
                LanguageDatabaseSeeder::class,
                CurrencyDatabaseSeeder::class,
                PaymentDatabaseSeeder::class,
                CouponDatabaseSeeder::class,
                ShopDatabaseSeeder::class,
                OrderDatabaseSeeder::class
            ]);
        }

        Artisan::call('cache:clear');
        Artisan::call('config:clear');
    }
}
