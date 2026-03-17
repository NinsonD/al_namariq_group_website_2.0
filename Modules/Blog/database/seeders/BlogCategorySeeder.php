<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Blog\Models\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Top-level categories
         $categories = [
            'en' => [
                ['title' => 'Marketing'],
                ['title' => 'Technology'],
                ['title' => 'Lifestyle'],
                ['title' => 'Travel'],
                ['title' => 'Health'],
                ['title' => 'Business'],
                ['title' => 'Finance'],
                ['title' => 'Education'],
                ['title' => 'Food'],
                ['title' => 'Sports'],
                ['title' => 'Gaming'],
                ['title' => 'Science'],
                ['title' => 'Politics'],
                ['title' => 'Environment'],
                ['title' => 'History'],
                ['title' => 'Parenting'],
                ['title' => 'Fashion'],
            ],
            'hi' => [
                ['title' => 'मार्केटिंग'],
                ['title' => 'तकनीक'],
                ['title' => 'जीवनशैली'],
                ['title' => 'यात्रा'],
                ['title' => 'स्वास्थ्य'],
                ['title' => 'व्यापार'],
                ['title' => 'वित्त'],
                ['title' => 'शिक्षा'],
                ['title' => 'खाना'],
                ['title' => 'खेल'],
                ['title' => 'गेमिंग'],
                ['title' => 'विज्ञान'],
                ['title' => 'राजनीति'],
                ['title' => 'पर्यावरण'],
                ['title' => 'इतिहास'],
                ['title' => 'पालन-पोषण'],
                ['title' => 'फैशन'],
            ],
            'ar' => [
                ['title' => 'التسويق'],
                ['title' => 'التكنولوجيا'],
                ['title' => 'أسلوب الحياة'],
                ['title' => 'السفر'],
                ['title' => 'الصحة'],
                ['title' => 'الأعمال'],
                ['title' => 'المالية'],
                ['title' => 'التعليم'],
                ['title' => 'الطعام'],
                ['title' => 'الرياضة'],
                ['title' => 'الألعاب'],
                ['title' => 'العلوم'],
                ['title' => 'السياسة'],
                ['title' => 'البيئة'],
                ['title' => 'التاريخ'],
                ['title' => 'تربية الأطفال'],
                ['title' => 'الموضة'],
            ],
        ];

        $count = count($categories['en']);

        for ($i = 0; $i < $count; $i++) {
            $enTitle = $categories['en'][$i]['title'];

            $category = BlogCategory::create([
                'slug' => Str::slug($enTitle),
                'status' => 1,
            ]);

            foreach (['en', 'hi', 'ar'] as $locale) {
                $category->translations()->create([
                    'locale' => $locale,
                    'title' => $categories[$locale][$i]['title'],
                ]);
            }
        }
    }
}
