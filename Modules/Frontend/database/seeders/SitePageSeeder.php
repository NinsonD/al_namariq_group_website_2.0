<?php

namespace Modules\Frontend\Database\Seeders;

use App\Enums\ThemeList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Frontend\Models\SitePage;

class SitePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $pages = [
            [
                'title' => 'Digital Marketing',
                'slug' => ThemeList::MAIN->value,
                'status' => 1,
            ],
            [
                'title' => 'It Solutions',
                'slug' => ThemeList::TWO->value,
                'status' => 1,
            ],
            [
                'title' => 'Mobile App',
                'slug' => ThemeList::THREE->value,
                'status' => 1,
            ],
            [
                'title' => 'Modern Shop',
                'slug' => ThemeList::SHOP->value,
                'status' => 1,
            ],
            [
                'title' => 'Modern Agency',
                'slug' => ThemeList::FIVE->value,
                'status' => 1,
            ],
            [
                'title' => 'Design Studio',
                'slug' => ThemeList::SIX->value,
                'status' => 1,
            ],
            [
                'title' => 'About',
                'slug' => 'about',
                'status' => 1,
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact',
                'status' => 1,
            ],
            [
                'title' => 'Blog',
                'slug' => 'blog',
                'status' => 1,
            ],
            [
                'title' => 'Portfolio',
                'slug' => 'portfolio',
                'status' => 1,
            ],
            [
                'title' => 'Services',
                'slug' => 'services',
                'status' => 1,
            ],
            [
                'title' => 'Pricing',
                'slug' => 'pricing',
                'status' => 1,
            ],
            [
                'title' => 'FAQ',
                'slug' => 'faq',
                'status' => 1,
            ],
            [
                'title' => 'Team',
                'slug' => 'team',
                'status' => 1,
            ],
        ];

        foreach ($pages as $page) {
            SitePage::create($page);
        }
    }
}
