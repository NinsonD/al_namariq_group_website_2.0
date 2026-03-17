<?php

namespace Modules\Brand\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Brand\Models\Brand;

class BrandDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('admin/img/files/brands');
        copyFilesToStorage($sourcePath, 'brand');

        for ($i = 0; $i < 20; $i++) {

            $translations = [
                'en' => [
                    'title' => 'Brand ' . ($i + 1),
                ],
                'hi' => [
                    'title' => 'ब्रांड ' . ($i + 1),
                ],
                'ar' => [
                    'title' => 'العلامة التجارية ' . ($i + 1),
                ],
            ];

            Brand::create([
                'url' => "#",
                'image' => "uploads/brand/brand-" . ($i + 1) . ".png",
                'status' => 1,
            ])->translations()->createMany([
                [
                    'locale' => 'en',
                    'title' => $translations['en']['title'],
                ],
                [
                    'locale' => 'hi',
                    'title' => $translations['hi']['title'],
                ],
                [
                    'locale' => 'ar',
                    'title' => $translations['ar']['title'],
                ],
            ]);
        }

    }
}
