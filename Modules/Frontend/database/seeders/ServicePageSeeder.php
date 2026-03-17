<?php

namespace Modules\Frontend\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Frontend\Models\Section;
use Modules\Frontend\Models\SitePage;

class ServicePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicesPageID = SitePage::where('slug', 'services')->first()->id;
        //////////////
        // HERO AREA
        $sourcePath = public_path('admin/img/files/services');
        copyFilesToStorage($sourcePath, 'web');

        $content = [
                    'title'           => 'Hero Area',
                    'slug'            => 'hero',
                    'default_content' => [
                        'image' => 'uploads/web/services-page-hero.jpg',
                        'bg_image' => 'uploads/web/services-page-hero-bg.png',
                    ],
                    'translations'   => [
                        'en' => [
                            'title'     => 'We Provide Smart \ Solutions.',
                            'description' => 'We craft digital experiences that engage, \ convert, and grow your business. From branding \ to development, we provide end-to-end \ solutions tailored to your needs.',
                        ],
                        'hi' => [
                            'title'     => 'डिजिटल मार्केटिंग एजेंसी',
                            'description' => 'हम डिजिटल अनुभव बनाते हैं जो संलग्न होते हैं, \ परिवर्तित होते हैं, और आपके व्यवसाय को बढ़ाते हैं। ब्रांडिंग से लेकर विकास तक, हम आपकी आवश्यकताओं के अनुसार अंत-से-अंत \ समाधान प्रदान करते हैं।',
                        ],
                        'ar' => [
                            'title'     => 'وكالة التسويق الرقمي',
                            'description' => 'نحن نصنع تجارب رقمية تشارك وتتحول وتنمو عملك. من العلامة التجارية إلى التطوير، نقدم حلولاً شاملة مصممة خصيصًا لاحتياجاتك.',
                        ],
                    ],
                ];

        $hero = Section::create([
            'title' => $content['title'],
            'slug' => $content['slug'],
            'default_content' => $content['default_content'],
            'status' => 1,
            'site_page_id' => $servicesPageID,
        ]);

        $hero->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $content['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $content['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $content['translations']['ar'],
            ],
        ]);
        //////////////
        // SERVICES AREA
        $servicesContent = [
                    'title'           => 'Services Area',
                    'slug'            => 'services',
                    'default_content' => [],
                    'translations'   => [
                        'en' => [
                            'subtitle'     => 'Our Smart Solutions',
                            'title'  => 'From branding to funding, we \ provide the tools & strategies \ startups need to succeed in a \ competitive market.',
                        ],
                        'hi' => [
                            'subtitle'     => 'हमारी स्मार्ट समाधान',
                            'title'  => 'ब्रांडिंग से लेकर फंडिंग तक, हम \ स्टार्टअप्स को प्रतिस्पर्धी बाजार में \ सफल होने के लिए आवश्यक उपकरण और रणनीतियाँ प्रदान करते हैं।',
                        ],
                        'ar' => [
                            'subtitle'     => 'حلولنا الذكية',
                            'title'  => 'من العلامة التجارية إلى التمويل، نقدم الأدوات والاستراتيجيات التي تحتاجها الشركات الناشئة للنجاح في سوق تنافسية.',
                        ],
                    ],
                ];

        $service = Section::create([
            'title' => $servicesContent['title'],
            'slug' => $servicesContent['slug'],
            'default_content' => $servicesContent['default_content'],
            'status' => 1,
            'site_page_id' => $servicesPageID,
        ]);

        $service->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $servicesContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $servicesContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $servicesContent['translations']['ar'],
            ],
        ]);

        //////////////
        // TEXT SLIDER AREA

        $textSliderContent = [
                    'title'           => 'Text Slider Area',
                    'slug'            => 'text-slider',
                    'default_content' => [],
                    'translations'   => [
                        'en' => [
                            'slider_content_1' => 'Creative agency, Website marketing, Digital marketing, Product marketing, Research marketing, Website marketing, Lifetime Update',
                            'slider_content_2' => 'Creative agency, Website marketing, Digital marketing, Product marketing, Research marketing, Website marketing, Lifetime Update',

                        ],
                        'hi' => [
                            'slider_content_1' => 'क्रिएटिव एजेंसी, वेबसाइट मार्केटिंग, डिजिटल मार्केटिंग, उत्पाद विपणन, अनुसंधान विपणन, वेबसाइट मार्केटिंग, जीवनभर अपडेट',
                            'slider_content_2' => 'क्रिएटिव एजेंसी, वेबसाइट मार्केटिंग, डिजिटल मार्केटिंग, उत्पाद विपणन, अनुसंधान विपणन, वेबसाइट मार्केटिंग, जीवनभर अपडेट',
                        ],
                        'ar' => [
                            'slider_content_1' => 'وكالة إبداعية، تسويق مواقع الويب، تسويق رقمي، تسويق منتجات، تسويق أبحاث، تسويق مواقع الويب، تحديث مدى الحياة',
                            'slider_content_2' => 'وكالة إبداعية، تسويق مواقع الويب، تسويق رقمي، تسويق منتجات، تسويق أبحاث، تسويق مواقع الويب، تحديث مدى الحياة',
                        ],
                    ],
                ];

        $textSlider = Section::create([
            'title' => $textSliderContent['title'],
            'slug' => $textSliderContent['slug'],
            'default_content' => $textSliderContent['default_content'],
            'status' => 1,
            'site_page_id' => $servicesPageID,
        ]);

        $textSlider->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $textSliderContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $textSliderContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $textSliderContent['translations']['ar'],
            ],
        ]);

        //////////////
        // PRICING AREA

        $pricingContent = [
                    'title'           => 'Pricing Area',
                    'slug'            => 'pricing',
                    'default_content' => [
                        'bg_image' => 'uploads/web/services-page-price-shape.png',
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle' => ' Affordable pricing',
                            'title'  => 'Special offer! choose \ your pack today',
                        ],
                        'hi' => [
                            'subtitle' => 'सस्ती मूल्य निर्धारण',
                            'title'  => 'विशेष प्रस्ताव! आज ही अपना पैक चुनें',
                        ],
                        'ar' => [
                            'subtitle' => 'أسعار معقولة',
                            'title'  => 'عرض خاص! اختر حزمتك اليوم',
                        ]
                    ],
                ];

        $pricing = Section::create([
            'title' => $pricingContent['title'],
            'slug' => $pricingContent['slug'],
            'default_content' => $pricingContent['default_content'],
            'status' => 1,
            'site_page_id' => $servicesPageID,
        ]);

        $pricing->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $pricingContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $pricingContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $pricingContent['translations']['ar'],
            ],
        ]);

        //////////////
        // PROCESS AREA

        $processContent = [
                    'title'           => 'Process Area',
                    'slug'            => 'process',
                    'default_content' => [
                        'image' => 'uploads/web/services-page-process-img.png',
                        'video_url' => 'https://www.youtube.com/watch?v=VCPGMjCW0is',
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle' => 'Services',
                            'title'  => 'We think out of the box \ and follow the [working] \ process ',
                            'description' => 'Our design system energy comes from a natural source \ such as wind power, water power, or the heat of the sun. \ They are more friendly.',
                            'process_title_1' => 'Thinking \ and research',
                            'process_title_2' => 'Discovering the \ problem',
                            'process_title_3' => 'Scratch, design, \ and wireframing',
                            'process_title_4' => 'Implementation \ and solution',
                        ],
                        'hi' => [
                            'subtitle' => 'सेवाएं',
                            'title'  => 'हम बॉक्स से बाहर सोचते हैं \ और [कार्य] प्रक्रिया का पालन करते हैं',
                            'description' => 'हमारी डिज़ाइन प्रणाली ऊर्जा एक प्राकृतिक स्रोत से आती है \ जैसे पवन ऊर्जा, जल ऊर्जा, या सूर्य की गर्मी। \ वे अधिक मित्रवत हैं।',
                            'process_title_1' => 'सोचना \ और अनुसंधान',
                            'process_title_2' => 'समस्या की खोज',
                            'process_title_3' => 'स्क्रैच, डिज़ाइन, \ और वायरफ्रेमिंग',
                            'process_title_4' => 'कार्यान्वयन \ और समाधान',
                        ],
                        'ar' => [
                            'subtitle' => 'الخدمات',
                            'title'  => 'نفكر خارج الصندوق \ ونتبع [العملية] \ العملية',
                            'description' => 'تأتي طاقة نظام التصميم لدينا من مصدر طبيعي \ مثل طاقة الرياح، طاقة المياه، أو حرارة الشمس. \ إنها أكثر ودية.',
                            'process_title_1' => 'التفكير \ والبحث',
                            'process_title_2' => 'اكتشاف \ المشكلة',
                            'process_title_3' => 'الخدش، التصميم، \ والتخطيط',
                            'process_title_4' => 'التنفيذ \ والحل',
                        ]
                    ],
                ];

        $process = Section::create([
            'title' => $processContent['title'],
            'slug' => $processContent['slug'],
            'default_content' => $processContent['default_content'],
            'status' => 1,
            'site_page_id' => $servicesPageID,
        ]);

        $process->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $processContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $processContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $processContent['translations']['ar'],
            ],
        ]);

        //////////////
        // BRAND AREA

        $brandContent = [
                    'title'           => 'Brand Area',
                    'slug'            => 'brand',
                    'default_content' => [
                        'brands' => json_encode(["1", "2", "3", "4", "5", "6"]),
                    ],
                    'translations'   => [
                        'en' => [],
                        'hi' => [],
                        'ar' => [],
                    ],
                ];

        $brand = Section::create([
            'title' => $brandContent['title'],
            'slug' => $brandContent['slug'],
            'default_content' => $brandContent['default_content'],
            'status' => 1,
            'site_page_id' => $servicesPageID,
        ]);

        $brand->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $brandContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $brandContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $brandContent['translations']['ar'],
            ],
        ]);
    }
}
