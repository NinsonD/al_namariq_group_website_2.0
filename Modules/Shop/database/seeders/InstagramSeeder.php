<?php

namespace Modules\Shop\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Shop\Models\Instagram;

class InstagramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('admin/img/files/instagram');
        copyFilesToStorage($sourcePath, 'instagram');

        $data = [
            [
                'image' => 'uploads/instagram/instragram-thumb-1.jpg',
                'link' => '#',
                'status' => true,
            ],
            [
                'image' => 'uploads/instagram/instragram-thumb-2.jpg',
                'link' => '#',
                'status' => true,
            ],
            [
                'image' => 'uploads/instagram/instragram-thumb-3.jpg',
                'link' => '#',
                'status' => true,
            ],
            [
                'image' => 'uploads/instagram/instragram-thumb-4.jpg',
                'link' => '#',
                'status' => true,
            ],
            [
                'image' => 'uploads/instagram/instragram-thumb-5.jpg',
                'link' => '#',
                'status' => true,
            ],
            [
                'image' => 'uploads/instagram/instragram-thumb-6.jpg',
                'link' => '#',
                'status' => true,
            ],
            [
                'image' => 'uploads/instagram/instragram-thumb-7.jpg',
                'link' => '#',
                'status' => true,
            ],
        ];

        foreach ($data as $item) {
            Instagram::create($item);
        }
    }
}
