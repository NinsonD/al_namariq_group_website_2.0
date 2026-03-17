<?php

namespace Modules\Settings\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Settings\Models\SeoSetting;

class SeoSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $description = 'Agntix is a Multipurpose Laravel CMS for Business, Portfolio & Creative Agencies. It is a powerful, responsive, and high-performance SEO & Digital Marketing Agency Laravel Script. Agntix is built with the latest web technologies (Laravel Framework, Bootstrap, jQuery, etc.) with the best SEO practices. It is a complete package for your next digital agency website.';

        // home page
        $data = [
            [
                'page_name' => 'home',
                'seo_title' => 'Home | Digital Agency & Creative Portfolio Laravel Script',
                'seo_description' => $description,
                'seo_keywords' => 'agntix, digital marketing, seo agency, laravel script, seo services, online growth',
            ],
            [
                'page_name' => 'about',
                'seo_title' => 'About | Digital Agency & Creative Portfolio Laravel Script',
                'seo_description' => $description,
                'seo_keywords' => 'about, page',
            ],
            [
                'page_name' => 'services',
                'seo_title' => 'Services | Digital Agency & Creative Portfolio Laravel Script',
                'seo_description' => $description,
                'seo_keywords' => 'services, page',
            ],
            [
                'page_name' => 'blog',
                'seo_title' => 'Blog | Digital Agency & Creative Portfolio Laravel Script',
                'seo_description' => $description,
                'seo_keywords' => 'blog, page',
            ],
            [
                'page_name' => 'portfolio',
                'seo_title' => 'Portfolio | Digital Agency & Creative Portfolio Laravel Script',
                'seo_description' => $description,
                'seo_keywords' => 'portfolio, page',
            ],
            [
                'page_name' => 'team',
                'seo_title' => 'Team | Digital Agency & Creative Portfolio Laravel Script',
                'seo_description' => $description,
                'seo_keywords' => 'team, page',
            ],
            [
                'page_name' => 'faq',
                'seo_title' => 'FAQ | Digital Agency & Creative Portfolio Laravel Script',
                'seo_description' => $description,
                'seo_keywords' => 'faq, page',
            ],
            [
                'page_name' => 'pricing',
                'seo_title' => 'Pricing | Digital Agency & Creative Portfolio Laravel Script',
                'seo_description' => $description,
                'seo_keywords' => 'pricing, page',
            ],
            [
                'page_name' => 'contact',
                'seo_title' => 'Contact | Digital Agency & Creative Portfolio Laravel Script',
                'seo_description' => $description,
                'seo_keywords' => 'contact, page',
            ],
            [
                'page_name' => 'shop',
                'seo_title' => 'Shop | Digital Agency & Creative Portfolio Laravel Script',
                'seo_description' => $description,
                'seo_keywords' => 'shop, page',
            ],
            [
                'page_name' => 'login',
                'seo_title' => 'Login | Digital Agency & Creative Portfolio Laravel Script',
                'seo_description' => $description,
                'seo_keywords' => 'login, page',
            ],
            [
                'page_name' => 'register',
                'seo_title' => 'Register | Digital Agency & Creative Portfolio Laravel Script',
                'seo_description' => $description,
                'seo_keywords' => 'register, page',
            ],
        ];

        foreach ($data as $item) {
            SeoSetting::create($item);
        }
    }
}
