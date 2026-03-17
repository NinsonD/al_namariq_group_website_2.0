<?php

namespace Modules\Settings\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'super_admin',
            'admin',
            'editor',
            'author',
            'contributor',
            'subscriber',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // permissions
        $permissions = [
            'user-show',
            'user-create',
            'user-edit',
            'user-delete',
            'user-password_update',
            'user-send_bulk_mail_show',
            'user-send_bulk_mail_update',

            // appearance
            'appearance-theme-show',
            'appearance-theme-update',
            'appearance-show_all_homepage_update',
            'appearance-theme_colors_show',
            'appearance-theme_colors_update',

            // blog
            'blog-show',
            'blog-create',
            'blog-edit',
            'blog-delete',
            'blog-status',

            // blog category
            'blog_category-show',
            'blog_category-create',
            'blog_category-edit',
            'blog_category-delete',
            'blog_category-status',

            // blog comment
            'blog_comment-show',
            'blog_comment-delete',
            'blog_comment-status',

            // brands
            'brands-show',
            'brands-create',
            'brands-edit',
            'brands-delete',

            // instagram
            'instagram-show',
            'instagram-create',
            'instagram-edit',
            'instagram-delete',

            // slider
            'slider-show',
            'slider-create',
            'slider-edit',
            'slider-delete',

            // contact message
            'contact_message-show',
            'contact_message-delete',
            'contact_message-receiver_mail_update',

            // faqs
            'faqs-show',
            'faqs-create',
            'faqs-edit',
            'faqs-delete',

            // footer settings
            'footer_settings-show',
            'footer_settings-edit',

            // frontend settings
            'frontend-about_page_show',
            'frontend-about_page_update',
            'frontend-contact_page_show',
            'frontend-contact_page_update',
            'frontend-home_page_show',

            // menu settings
            'menu-show',
            'menu-edit',

            // newsletter
            'newsletter-show',
            'newsletter-delete',
            'newsletter-delete_unverified_delete',
            'newsletter-send_bulk_mail_show',
            'newsletter-send_bulk_mail_send',

            // page
            'page-show',
            'page-create',
            'page-edit',
            'page-delete',
            'page-status',

            // portfolio
            'portfolio-show',
            'portfolio-create',
            'portfolio-edit',
            'portfolio-delete',

            // pricing
            'pricing-show',
            'pricing-create',
            'pricing-edit',
            'pricing-delete',

            // services
            'services-show',
            'services-create',
            'services-edit',
            'services-delete',

            // admin
            'admin-show',
            'admin-create',
            'admin-edit',
            'admin-delete',

            // mail
            'mail-show',
            'mail-update',
            'mail-template_show',
            'mail-template_update',

            // role
            'role-show',
            'role-create',
            'role-edit',
            'role-delete',

            // seo_settings
            'seo_settings-show',
            'seo_settings-update',

            // settings
            'settings-show',
            'settings-general_show',
            'settings-general_update',
            'settings-logo_update',
            'settings-cookie_update',
            'settings-breadcrumb_update',
            'settings-copyright_update',
            'settings-auto_approve_comments_update',
            'settings-maintenance_settings_update',

            // credentials
            'credentials_settings-show',
            'credentials_settings-google_recaptcha_update',
            'credentials_settings-google_tag_manager_update',
            'credentials_settings-google_analytics_update',
            'credentials_settings-tawk_chat_update',
            'credentials_settings-search_engine_update',


            // sitemap
            'sitemap-show',
            'sitemap-create',

            // social
            'social-show',
            'social-create',
            'social-edit',
            'social-delete',

            // team
            'team-show',
            'team-create',
            'team-edit',
            'team-delete',

            // testimonial
            'testimonial-show',
            'testimonial-create',
            'testimonial-edit',
            'testimonial-delete',

            // translation
            'translation-show',
            'translation-edit',

            // ecommerce permissions
            'product-show',
            'product-create',
            'product-edit',
            'product-delete',

            'product_category-show',
            'product_category-create',
            'product_category-edit',
            'product_category-delete',
            'product_category-status',

            'product_review-show',
            'product_review-update',
            'product_review-delete',
            'product_review-status_update',

            'coupon-show',
            'coupon-create',
            'coupon-edit',
            'coupon-delete',
            'coupon-history',
            'coupon-history_delete',

            'order-show',
            'order-edit',
            'order-delete',

            'shop_settings-show',
            'shop_settings-update',

            'shipping_method-show',
            'shipping_method-edit',
            'shipping_method-create',
            'shipping_method-delete',

            'payment_method-show',
            'payment_method-update',

            'currency-show',
            'currency-create',
            'currency-edit',
            'currency-delete',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }



        // assign permissions to roles
        $super_role = Role::where('name', 'super_admin')->first();

        $super_role->syncPermissions($permissions);

        $super_admin = User::where('username', 'super_admin')->first();

        if ($super_admin) {
            $super_admin->assignRole('super_admin');
        }
    }
}
