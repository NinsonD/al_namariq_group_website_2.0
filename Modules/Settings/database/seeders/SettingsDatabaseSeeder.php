<?php

namespace Modules\Settings\Database\Seeders;

use App\Enums\ThemeList;
use Illuminate\Database\Seeder;
use Modules\Settings\Models\Setting;
use Modules\Settings\Database\Seeders\EmailTemplateSeeder;
use Modules\Settings\Database\Seeders\RolePermissionSeeder;

class SettingsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('admin/img/files/settings');
        copyFilesToStorage($sourcePath, 'website');

        $settings_data = [
            'app_name' => 'Agntix',
            'version' => '1.0.0',
            'logo' => 'uploads/website/logo.png',
            'logo_white' => 'uploads/website/logo-white.png',
            'logo_shop' => 'uploads/website/logo-shop.png',
            'favicon' => 'uploads/website/favicon.png',
            'timezone' => 'Asia/Dhaka',
            'date_format' => 'M d, Y',
            'copyright_text' => '© 2025 Agntix. All Rights Reserved.',

            // credintials
            'recaptcha_site_key' => 'recaptcha_site_key',
            'recaptcha_secret_key' => 'recaptcha_secret_key',
            'recaptcha_status' => 0,

            'tawk_status' => 0,
            'tawk_property_id' => 'tawk_property_id',
            'tawk_widget_id' => 'tawk_widget_id',

            'google_analytic_id' => 'google_analytic_id',
            'google_analytic_status' => 0,

            'google_tagmanager_id' => 'google_tagmanager_id',
            'google_tagmanager_status' => 0,

            'search_engine_indexing' => 0,

            // common
            'default_avatar' => 'uploads/website/avatar-default.png',
            'no_image' => 'uploads/website/no-image.jpg',

            // mail
            'mail_host' => 'mail_host',
            'mail_username' => 'mail_username',
            'mail_password' => 'mail_password',
            'mail_port' => 2525,
            'mail_encryption' => 'ssl',
            'mail_sender_email' => 'sender@gmail.com',
            'mail_sender_name' => 'Agntix',
            'contact_message_receiver_mail' => 'receiver@gmail.com',
            'is_mail_queable' => 1,
            'is_queueable' => 1,

            // maintenance
            'maintenance_status' => 0,
            'maintenance_title' => 'Website Under maintenance',
            'maintenance_image' => 'uploads/website/maintenance.png',
            'maintenance_description' => '<p>We are currently performing maintenance on our website to<br>improve your experience. Please check back later.</p>',

            'site_address' => ' 785 6h Street, Office 400, Berlin, De 81566',
            'site_address_link' => 'https://shorturl.at/OIyGX',
            'site_email' => 'info@agntix.com',
            'site_phone' => '+9 123 456 789',
            'site_theme' => ThemeList::MAIN->value,
            'show_all_homepage' => 1,

            // interface
            'primary_color' => '#FF5722',
            'secondary_color' => '#FF4851',
            'third_color' => '#C1ED00',
            'shop_theme_color' => '#453528',
            'preloader_status' => 0,
            'backtotop_status' => 0,
            'magic_cursor_status' => 0,

            // cookie consent
            'cookie_status' => 1,
            'cookie_border' => 'normal',
            'cookie_corners' => 'thin',
            'cookie_background_color' => '#4260FF',
            'cookie_text_color' => '#fafafa',
            'cookie_border_color' => '#4260FF',
            'cookie_btn_bg_color' => '#fffceb',
            'cookie_btn_text_color' => '#0C1338',
            'cookie_link_text' => 'Read Our Privacy Policy',
            'cookie_link' => '/privacy-policy',
            'cookie_btn_text' => 'Yes',
            'cookie_message' => 'This website uses essential cookies to ensure its proper operation and tracking cookies to understand how you interact with it. The latter will be set only upon approval.',

            'comments_auto_approved' => 1,

            // shop settings
            'tax' => 10,
            'cart_empty_image' => 'uploads/website/cart-empty.png',
            'cartmini_empty_image' => 'uploads/website/cartmini-empty.png',
            'order_success_image' => 'uploads/website/order-success.png',
            'order_failed_image' => 'uploads/website/order-failed.png',
            'reviews_auto_approved' => 1,
            'enable_shop' => 1,

        ];

        foreach ($settings_data as $key => $value) {
            Setting::create([
                'key' => $key,
                'value' => $value,
            ]);
        }

        $this->call([
            RolePermissionSeeder::class,
            SeoSettingSeeder::class,
            EmailTemplateSeeder::class,
        ]);
    }
}
