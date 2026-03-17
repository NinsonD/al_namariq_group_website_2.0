<?php

namespace Modules\Social\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Social\Models\Social;

class SocialDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socials = [
            [
                'icon' => 'fa-brands fa-facebook-f',
                'link' => '#',
                'status' => 1,
            ],
            [
                'icon' => 'fa-brands fa-x-twitter',
                'link' => '#',
                'status' => 1,
            ],
            [
                'icon' => 'fa-brands fa-linkedin-in',
                'link' => '#',
                'status' => 1,
            ],
            [
                'icon' => 'fa-brands fa-instagram',
                'link' => '#',
                'status' => 1,
            ],
        ];

        foreach ($socials as $social) {
            Social::create($social);
        }
    }
}
