<?php

namespace Modules\Shop\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Shop\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('admin/img/files/shop/category');
        copyFilesToStorage($sourcePath, 'product-categories');

        $categories = [
            [
                'slug' => 'sofas',
                'image' => 'uploads/product-categories/sofas.jpg',
                'parent_id' => null,
                'translations' => [
                    'en' => ['title' => 'Sofas'],
                    'hi' => ['title' => 'सोफे'],
                    'ar' => ['title' => 'أرائك'],
                ],
            ],
            [
                'slug' => 'tables',
                'image' => 'uploads/product-categories/tables.jpg',
                'parent_id' => null,
                'translations' => [
                    'en' => ['title' => 'Tables'],
                    'hi' => ['title' => 'टेबल्स'],
                    'ar' => ['title' => 'طاولات'],
                ],
            ],
            [
                'slug' => 'decor-items',
                'image' => 'uploads/product-categories/decor-items.jpg',
                'parent_id' => null,
                'translations' => [
                    'en' => ['title' => 'Decor Items'],
                    'hi' => ['title' => 'सजावट के सामान'],
                    'ar' => ['title' => 'أغراض الديكور'],
                ],
            ],
            [
                'slug' => 'chairs',
                'image' => 'uploads/product-categories/chairs.jpg',
                'parent_id' => null,
                'translations' => [
                    'en' => ['title' => 'Chairs'],
                    'hi' => ['title' => 'कुर्सियाँ'],
                    'ar' => ['title' => 'كراسي'],
                ],
            ],
            [
                'slug' => 'floor-lamps',
                'image' => 'uploads/product-categories/floor-lamps.jpg',
                'parent_id' => null,
                'translations' => [
                    'en' => ['title' => 'Floor Lamps'],
                    'hi' => ['title' => 'फ्लोर लैंप'],
                    'ar' => ['title' => 'مصابيح أرضية'],
                ],
            ],

            [
                'slug' => 'beds',
                'image' => 'uploads/product-categories/beds.jpg',
                'parent_id' => null,
                'translations' => [
                    'en' => ['title' => 'Beds'],
                    'hi' => ['title' => 'बिस्तर'],
                    'ar' => ['title' => 'أسرة'],
                ],
            ],
            [
                'slug' => 'wardrobes',
                'image' => 'uploads/product-categories/wardrobes.jpg',
                'parent_id' => null,
                'translations' => [
                    'en' => ['title' => 'Wardrobes'],
                    'hi' => ['title' => 'अलमारी'],
                    'ar' => ['title' => 'خزائن'],
                ],
            ],
            [
                'slug' => 'coffee-tables',
                'image' => 'uploads/product-categories/coffee-tables.jpg',
                'parent_id' => null,
                'translations' => [
                    'en' => ['title' => 'Coffee Tables'],
                    'hi' => ['title' => 'कॉफी टेबल'],
                    'ar' => ['title' => 'طاولات القهوة'],
                ],
            ],
            [
                'slug' => 'bookshelves',
                'image' => 'uploads/product-categories/bookshelves.jpg',
                'parent_id' => null,
                'translations' => [
                    'en' => ['title' => 'Bookshelves'],
                    'hi' => ['title' => 'बुकशेल्व्स'],
                    'ar' => ['title' => 'رفوف الكتب'],
                ],
            ],
            [
                'slug' => 'recliners',
                'image' => 'uploads/product-categories/recliners.jpg',
                'parent_id' => null,
                'translations' => [
                    'en' => ['title' => 'Recliners'],
                    'hi' => ['title' => 'रीक्लाइनर्स'],
                    'ar' => ['title' => 'كرسي استرخاء'],
                ],
            ],
            [
                'slug' => 'outdoor-furniture',
                'image' => 'uploads/product-categories/outdoor-furniture.jpg',
                'parent_id' => null,
                'translations' => [
                    'en' => ['title' => 'Outdoor Furniture'],
                    'hi' => ['title' => 'बाहरी फर्नीचर'],
                    'ar' => ['title' => 'أثاث خارجي'],
                ],
            ],
            [
                'slug' => 'kids-furniture',
                'image' => 'uploads/product-categories/kids-furniture.jpg',
                'parent_id' => null,
                'translations' => [
                    'en' => ['title' => 'Kids Furniture'],
                    'hi' => ['title' => 'बच्चों का फर्नीचर'],
                    'ar' => ['title' => 'أثاث الأطفال'],
                ],
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::create([
                'slug' => $category['slug'],
                'image' => $category['image'],
                'parent_id' => $category['parent_id'],
                'status' => true,
            ])->translations()->createMany([
                 [
                     'locale' => 'en',
                     'title' => $category['translations']['en']['title'],
                 ],
                 [
                     'locale' => 'hi',
                     'title' => $category['translations']['hi']['title'],
                 ],
                 [
                     'locale' => 'ar',
                     'title' => $category['translations']['ar']['title'],
                 ],
            ]);
        }

    }
}
