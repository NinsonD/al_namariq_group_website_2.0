<?php

namespace Modules\Frontend\Database\Seeders;

use App\Enums\ThemeList;
use Illuminate\Database\Seeder;
use Modules\Frontend\Models\SitePage;

class SitePageSeederV12 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
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
        ];

        foreach ($pages as $page) {
            SitePage::updateOrCreate(
                ['slug' => $page['slug']],
                ['title' => $page['title'], 'status' => $page['status']]
            );
        }
    }
}
