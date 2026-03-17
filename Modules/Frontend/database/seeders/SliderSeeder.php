<?php

namespace Modules\Frontend\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Frontend\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('admin/img/files/slider');
        copyFilesToStorage($sourcePath, 'sliders');

        $data = [
            [
                'image' => 'uploads/sliders/slider-1.png',
                'nav_image' => 'uploads/sliders/slider-nav-1.png',
                'btn_link' => '/products',
                'translations' => [
                    'en' => [
                        'subtitle' => 'Shop Collection',
                        'title' => 'Form Dining \ Chairs',
                        'btn_text' => 'Shop Now'
                    ],
                    'hi' => [
                        'subtitle' => 'दुकान संग्रह',
                        'title' => 'आधुनिक डाइनिंग \ कुर्सियाँ',
                        'btn_text' => 'अभी खरीदें'
                    ],
                    'ar' => [
                        'subtitle' => 'مجموعة المتجر',
                        'title' => 'كراسي طعام حديثة',
                        'btn_text' => 'تسوق الآن'
                    ]
                ]
            ],
            [
                'image' => 'uploads/sliders/slider-2.png',
                'nav_image' => 'uploads/sliders/slider-nav-2.png',
                'btn_link' => '/products',
                'translations' => [
                    'en' => [
                        'subtitle' => 'New Arrival',
                        'title' => 'Elegant Dining \ Chair',
                        'btn_text' => 'Shop Now'
                    ],
                    'hi' => [
                        'subtitle' => 'नया आगमन',
                        'title' => 'आधुनिक डाइनिंग \ कुर्सी',
                        'btn_text' => 'अभी खरीदें'
                    ],
                    'ar' => [
                        'subtitle' => 'وصول جديد',
                        'title' => 'كرسي أنيق',
                        'btn_text' => 'تسوق الآن'
                    ]
                ]
            ],
            [
                'image' => 'uploads/sliders/slider-3.png',
                'nav_image' => 'uploads/sliders/slider-nav-3.png',
                'btn_link' => '/products',
                'translations' => [
                    'en' => [
                        'subtitle' => 'Best Furniture',
                        'title' => 'Stylish Dinner \ Chairs',
                        'btn_text' => 'Shop Now'
                    ],
                    'hi' => [
                        'subtitle' => 'सबसे अच्छा फर्नीचर',
                        'title' => 'स्टाइलिश डिनर \ कुर्सियाँ',
                        'btn_text' => 'अभी खरीदें'
                    ],
                    'ar' => [
                        'subtitle' => 'أفضل الأثاث',
                        'title' => 'كراسي عشاء أنيقة',
                        'btn_text' => 'تسوق الآن'
                    ]
                ]
            ],
        ];

        foreach ($data as $item) {

            $slider = Slider::create([
                'image' => $item['image'],
                'nav_image' => $item['nav_image'],
                'btn_link' => $item['btn_link'],
            ]);

            $slider->translations()->createMany([
                [
                    'locale' => 'en',
                    'title' => $item['translations']['en']['title'],
                    'subtitle' => $item['translations']['en']['subtitle'],
                    'btn_text' => $item['translations']['en']['btn_text'],
                ],
                [
                    'locale' => 'hi',
                    'title' => $item['translations']['hi']['title'],
                    'subtitle' => $item['translations']['hi']['subtitle'],
                    'btn_text' => $item['translations']['hi']['btn_text'],
                ],
                [
                    'locale' => 'ar',
                    'title' => $item['translations']['ar']['title'],
                    'subtitle' => $item['translations']['ar']['subtitle'],
                    'btn_text' => $item['translations']['ar']['btn_text'],
                ]
            ]);

        }

    }
}
