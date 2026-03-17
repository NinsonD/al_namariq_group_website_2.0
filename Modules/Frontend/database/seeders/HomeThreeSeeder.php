<?php

namespace Modules\Frontend\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Frontend\Models\Section;

class HomeThreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //////////////
        // HERO AREA
        $sourcePath = public_path('admin/img/files/home-three/hero');
        copyFilesToStorage($sourcePath, 'web');

        $content = [
                    'title'           => 'Hero Area',
                    'slug'            => 'hero',
                    'default_content' => [
                        'bg_image' => 'uploads/web/h3-hero-bg.png',
                        'bg_image_2' => 'uploads/web/h3-hero-bg-2.png',
                        'main_image' => 'uploads/web/h3-hero-thumb.png',
                        'main_image_bg' => 'uploads/web/h3-hero-thumb-bg.png',
                        'app_image' => 'uploads/web/h3-hero-app.png',
                        'shape_1' => 'uploads/web/h3-hero-bg-shape1.png',
                        'shape_2' => 'uploads/web/h3-hero-bg-shape2.png',
                        'shape_3' => 'uploads/web/h3-hero-bg-shape3.png',
                        'shape_4' => 'uploads/web/h3-hero-bg-shape4.png',
                        'shape_5' => 'uploads/web/h3-hero-bg-shape5.png',
                        'btn_icon' => 'uploads/web/h3-hero-btn-icon.png',
                        'btn_url' => '#',
                        'btn_url_2' => '#',
                        'rating' => 4.8,

                    ],
                    'translations'   => [
                        'en' => [
                            'title'     => 'One global \ plan. No hassle.',
                            'subtitle' => 'Heyo ! We launched our Alpha!',
                            'description' => 'Your ultimate travel partner. \ Carries the information you need \ while travelling.',
                            'btn_text' => 'Download App',
                            'btn_text_2' => 'Based on 204 Reviews',
                            'app_title' => 'App Store rating',
                        ],
                        'hi' => [
                            'title'     => 'एक वैश्विक योजना। कोई परेशानी नहीं।',
                            'subtitle' => 'हेयो! हमने अपना अल्फा लॉन्च किया!',
                            'description' => 'आपका अंतिम यात्रा साथी। यात्रा करते समय आपको \ आवश्यक जानकारी ले जाता है।',
                            'btn_text' => 'ऐप डाउनलोड करें',
                            'btn_text_2' => '204 समीक्षाओं पर आधारित',
                            'app_title' => 'ऐप स्टोर रेटिंग',
                        ],
                        'ar' => [
                            'title'     => 'خطة عالمية واحدة. لا متاعب.',
                            'subtitle' => 'مرحبًا! أطلقنا الإصدار التجريبي!',
                            'description' => 'شريكك النهائي في السفر. يحمل المعلومات التي تحتاجها أثناء السفر.',
                            'btn_text' => 'تنزيل التطبيق',
                            'btn_text_2' => 'استنادًا إلى 204 مراجعات',
                            'app_title' => 'تقييم متجر التطبيقات',
                        ],
                    ],
                ];

        $hero = Section::create([
            'title' => $content['title'],
            'slug' => $content['slug'],
            'default_content' => $content['default_content'],
            'status' => 1,
            'site_page_id' => 3,
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
        // BRAND AREA
        $brandContent = [
                    'title'           => 'Brand Area',
                    'slug'            => 'brand',
                    'default_content' => [
                        'brands' => json_encode(["1", "2", "3", "4", "5", "6"]),
                    ],
                    'translations'   => [
                        'en' => [
                            'title' => 'Trusted by these amazing companies'
                        ],
                        'hi' => [
                            'title' => 'इन अद्भुत कंपनियों द्वारा विश्वसनीय'
                        ],
                        'ar' => [
                            'title' => 'موثوق به من قبل هذه الشركات الرائعة'
                        ]
                    ],
                ];

        $brand = Section::create([
            'title' => $brandContent['title'],
            'slug' => $brandContent['slug'],
            'default_content' => $brandContent['default_content'],
            'status' => 1,
            'site_page_id' => 3,
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

        //////////////
        // FEATURES AREA
        $sourcePath = public_path('admin/img/files/home-three/features');
        copyFilesToStorage($sourcePath, 'web');

        $featuresContent = [
            'title'           => 'Features Area',
            'slug'            => 'features',
            'default_content' => [
                    'icon_1' => 'uploads/web/h3-features-icon-1.png',
                    'icon_2' => 'uploads/web/h3-features-icon-2.png',
                    'icon_3' => 'uploads/web/h3-features-icon-3.png',
                    ],
            'translations'   => [
                'en' => [
                    'subtitle' => 'Easy to solution',
                    'title' => 'Unlock All \ Features in Our App',
                    'description' => 'Powerful features to help you manage money smarter.',
                    'feature_title_1' => 'Guaranteed safety',
                    'feature_description_1' => 'Your data is protected with the highest security standards.',
                    'feature_title_2' => 'Fast performance',
                    'feature_description_2' => 'Quick and efficient performance to ensure smooth operation.',
                    'feature_title_3' => 'Awesome design',
                    'feature_description_3' => 'A visually stunning interface that enhances user experience.',
                ],
                'hi' => [
                    'subtitle' => 'समाधान में आसान',
                    'title' => 'हमारे ऐप में सभी सुविधाओं को अनलॉक करें',
                    'description' => 'पैसे को समझदारी से प्रबंधित करने में मदद करने के लिए शक्तिशाली सुविधाएँ।',
                    'feature_title_1' => 'गारंटीकृत सुरक्षा',
                    'feature_description_1' => 'आपके डेटा की सुरक्षा उच्चतम सुरक्षा मानकों के साथ की जाती है।',
                    'feature_title_2' => 'तेज प्रदर्शन',
                    'feature_description_2' => 'स्मूद ऑपरेशन सुनिश्चित करने के लिए त्वरित और कुशल प्रदर्शन।',
                    'feature_title_3' => 'शानदार डिज़ाइन',
                    'feature_description_3' => 'एक दृश्य रूप से आश्चर्यजनक इंटरफ़ेस जो उपयोगकर्ता अनुभव को बढ़ाता है।',
                ],
                'ar' => [
                    'subtitle' => 'حل سهل',
                    'title' => 'فتح جميع الميزات في تطبيقنا',
                    'description' => 'ميزات قوية لمساعدتك في إدارة الأموال بشكل أذكى.',
                    'feature_title_1' => 'أمان مضمون',
                    'feature_description_1' => 'بياناتك محمية بأعلى معايير الأمان.',
                    'feature_title_2' => 'أداء سريع',
                    'feature_description_2' => 'أداء سريع وفعال لضمان تشغيل سلس.',
                    'feature_title_3' => 'تصميم رائع',
                    'feature_description_3' => 'واجهة بصرية مذهلة تعزز تجربة المستخدم.',
                ],
            ],
        ];

        $features = Section::create([
            'title' => $featuresContent['title'],
            'slug' => $featuresContent['slug'],
            'default_content' => $featuresContent['default_content'],
            'status' => 1,
            'site_page_id' => 3,
        ]);

        $features->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $featuresContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $featuresContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $featuresContent['translations']['ar'],
            ],
        ]);

        //////////////
        // HOW IT WORKS AREA
        $sourcePath = public_path('admin/img/files/home-three/how');
        copyFilesToStorage($sourcePath, 'web');

        $howItWorksContent = [
            'title'           => 'How It Works',
            'slug'            => 'how-it-works',
            'default_content' => [
                    'bg_image' => 'uploads/web/h3-hiw-bg.png',
                    'main_image' => 'uploads/web/h3-hiw-thumb.png',
                    'shape_1' => 'uploads/web/h3-hiw-shape-1.png',
                    'shape_2' => 'uploads/web/h3-hiw-shape-2.png',
                    'shape_3' => 'uploads/web/h3-hiw-shape-3.png',
                    ],
            'translations'   => [
                'en' => [
                    'subtitle' => 'How it works',
                    'title' => 'what can you \ do with it?',
                    'title_2' => 'Explore your Travel Interests.',
                    'title_3' => 'Powerful features to help you manage \ money smarter.',
                ],
                'hi' => [
                    'subtitle' => 'यह कैसे काम करता है',
                    'title' => 'आप इसके साथ क्या कर सकते हैं?',
                    'title_2' => 'अपने यात्रा रुचियों का अन्वेषण करें।',
                    'title_3' => 'पैसे को समझदारी से प्रबंधित करने में मदद करने \ के लिए  शक्तिशाली सुविधाएँ।',
                ],
                'ar' => [
                    'subtitle' => 'كيف يعمل',
                    'title' => 'ماذا يمكنك \ فعله به؟',
                    'title_2' => 'استكشف اهتماماتك في السفر.',
                    'title_3' => 'ميزات قوية لمساعدتك \ في إدارة الأموال بشكل أذكى.',
                ],
            ],
        ];

        $howItWorks = Section::create([
            'title' => $howItWorksContent['title'],
            'slug' => $howItWorksContent['slug'],
            'default_content' => $howItWorksContent['default_content'],
            'status' => 1,
            'site_page_id' => 3,
        ]);

        $howItWorks->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $howItWorksContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $howItWorksContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $howItWorksContent['translations']['ar'],
            ],
        ]);

        //////////////
        // APP Review AREA
        $sourcePath = public_path('admin/img/files/home-three/app-review');
        copyFilesToStorage($sourcePath, 'web');

        $appReviewContent = [
            'title'           => 'App Review',
            'slug'            => 'app-review',
            'default_content' => [
                    'main_image' => 'uploads/web/h3-ar-thumb.png',
                    'image_2' => 'uploads/web/h3-ar-thumb-2.png',
                    'icon_1' => 'uploads/web/h3-ar-icon-1.png',
                    'icon_2' => 'uploads/web/h3-ar-icon-2.png',
                    ],
            'translations'   => [
                'en' => [
                    'subtitle' => 'Over {150,0000} client',
                    'title' => 'All the \ Experience in the \ new Application',
                    'title_2' => '1M+ tasks tackled by to-doers!',
                    'item_title_1' => '4.1M+',
                    'item_subtitle_1' => 'Downloaded & Installation',
                    'item_title_2' => '4.8/5',
                    'item_subtitle_2' => 'Based on 1,258 reviews',
                ],
                'hi' => [
                    'subtitle' => '{150,0000} से अधिक ग्राहक',
                    'title' => 'नए एप्लिकेशन में \ सभी अनुभव',
                    'title_2' => '1M+ कार्यों को हल किया गया!',
                    'item_title_1' => '4.1M+',
                    'item_subtitle_1' => 'डाउनलोड और इंस्टॉलेशन',
                    'item_title_2' => '4.8/5',
                    'item_subtitle_2' => '1,258 समीक्षाओं पर आधारित',
                ],
                'ar' => [
                    'subtitle' => 'أكثر من {150,0000} عميل',
                    'title' => 'كل التجارب في التطبيق الجديد',
                    'title_2' => 'تم التعامل مع 1M+ مهمة بواسطة المنجزين!',
                    'item_title_1' => '4.1M+',
                    'item_subtitle_1' => 'تم التنزيل والتثبيت',
                    'item_title_2' => '4.8/5',
                    'item_subtitle_2' => 'استنادًا إلى 1,258 مراجعة',
                ],
            ],
        ];

        $appReview = Section::create([
            'title' => $appReviewContent['title'],
            'slug' => $appReviewContent['slug'],
            'default_content' => $appReviewContent['default_content'],
            'status' => 1,
            'site_page_id' => 3,
        ]);

        $appReview->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $appReviewContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $appReviewContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $appReviewContent['translations']['ar'],
            ],
        ]);

        //////////////
        // Dashboard AREA
        $sourcePath = public_path('admin/img/files/home-three/dashboard');
        copyFilesToStorage($sourcePath, 'web');
        $dashboardContent = [
            'title'           => 'Dashboard',
            'slug'            => 'dashboard',
            'default_content' => [
                    'image_1' => 'uploads/web/h3-dh-thumb.png',
                    'image_2' => 'uploads/web/h3-dh-thumb-2.png',
                    'image_3' => 'uploads/web/h3-dh-thumb-3.png',
                    'shape_1' => 'uploads/web/h3-dh-shape-1.png',
                    'shape_2' => 'uploads/web/h3-dh-shape-2.png',
                    'shape_3' => 'uploads/web/h3-dh-shape-3.png',
                    'shape_4' => 'uploads/web/h3-dh-shape-4.png',
                    'shape_5' => 'uploads/web/h3-dh-shape-5.png',
                    'shape_6' => 'uploads/web/h3-dh-shape-6.png',
                    'shape_7' => 'uploads/web/h3-dh-shape-7.png',
                    'shape_8' => 'uploads/web/h3-dh-shape-8.png',
                    'shape_9' => 'uploads/web/h3-dh-shape-9.png',
                    'btn_url_1' => '#',
                    'btn_url_2' => '#',
                    'btn_url_3' => '#',
            ],
            'translations'   => [
                'en' => [
                    'subtitle_1' => 'Data dashboard',
                    'title_1' => 'Easy to manage \ your all app data.',
                    'description_1' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
                    'btn_text_1' => 'Read More',
                    'subtitle_2' => 'More features',
                    'title_2' => 'Easy book trips \ easy payment.',
                    'description_2' => 'Readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.',
                    'btn_text_2' => 'Read More',
                    'subtitle_3' => 'Interesting features',
                    'title_3' => 'Your all data \ in one place.',
                    'description_3' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
                    'btn_text_3' => 'Read More',
                ],
                'hi' => [
                    'subtitle_1' => 'डेटा डैशबोर्ड',
                    'title_1' => 'अपने सभी ऐप डेटा को प्रबंधित करना आसान है।',
                    'description_1' => 'यह एक लंबे समय से स्थापित तथ्य है कि एक पाठक पृष्ठ के लेआउट को देखते समय पठनीय सामग्री से विचलित हो जाएगा।',
                    'btn_text_1' => 'और पढ़ें',
                    'subtitle_2' => 'अधिक सुविधाएँ',
                    'title_2' => 'बुकिंग यात्रा आसान \ आसान भुगतान।',
                    'description_2' => 'पाठक सामग्री का उपयोग करने का बिंदु यह है कि इसमें अक्षरों का सामान्य वितरण है।',
                    'btn_text_2' => 'और पढ़ें',
                    'subtitle_3' => 'दिलचस्प विशेषताएँ',
                    'title_3' => 'आपका सारा डेटा \ एक ही जगह पर।',
                    'description_3' => 'यह एक लंबे समय से स्थापित तथ्य है कि एक पाठक पृष्ठ के लेआउट को देखते समय पठनीय सामग्री से विचलित हो जाएगा।',
                    'btn_text_3' => 'और पढ़ें',
                ],
                'ar' => [
                    'subtitle_1' => 'لوحة بيانات البيانات',
                    'title_1' => 'إدارة بيانات تطبيقك بسهولة.',
                    'description_1' => 'من المعروف منذ فترة طويلة أن القارئ سوف يتشتت انتباهه عن المحتوى القابل للقراءة للصفحة عند النظر إلى تخطيطها.',
                    'btn_text_1' => 'اقرأ المزيد',
                    'subtitle_2' => 'المزيد من الميزات',
                    'title_2' => 'حجز الرحلات بسهولة \ دفع سهل.',
                    'description_2' => 'النقطة في استخدام لوريم إيبسوم هي أنه يحتوي على توزيع طبيعي أكثر أو أقل للحروف.',
                    'btn_text_2' => 'اقرأ المزيد',
                    'subtitle_3' => 'ميزات مثيرة للاهتمام',
                    'title_3' => 'كل بياناتك \ في مكان واحد.',
                    'description_3' => 'من المعروف منذ فترة طويلة أن القارئ سوف يتشتت انتباهه عن المحتوى القابل للقراءة للصفحة عند النظر إلى تخطيطها.',
                    'btn_text_3' => 'اقرأ المزيد',
                ],
            ],
        ];

        $dashboard = Section::create([
            'title' => $dashboardContent['title'],
            'slug' => $dashboardContent['slug'],
            'default_content' => $dashboardContent['default_content'],
            'status' => 1,
            'site_page_id' => 3,
        ]);

        $dashboard->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $dashboardContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $dashboardContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $dashboardContent['translations']['ar'],
            ],
        ]);

        //////////////
        // PRICING AREA
        $sourcePath = public_path('admin/img/files/home-three/pricing');
        copyFilesToStorage($sourcePath, 'web');
        $pricingContent = [
            'title'           => 'Pricing',
            'slug'            => 'pricing',
            'default_content' => [
                    'bg_image' => 'uploads/web/h3-pricing-bg.png',
            ],
            'translations'   => [
                'en' => [
                    'subtitle' => 'Affordable pricing',
                    'title' => 'Start With \ Affordable Price',
                    'description' => 'Unlock the full potential of Agntix app with our \ flexible pricing options.',
                ],
                'hi' => [
                    'subtitle' => 'सस्ती कीमत',
                    'title' => 'सस्ती कीमत से शुरू करें',
                    'description' => 'हमारे लचीले मूल्य निर्धारण विकल्पों के साथ Agntix ऐप की पूरी क्षमता को अनलॉक करें।',
                ],
                'ar' => [
                    'subtitle' => 'أسعار معقولة',
                    'title' => 'ابدأ بسعر معقول',
                    'description' => 'افتح الإمكانات الكاملة لتطبيق Agntix مع خيارات التسعير المرنة لدينا.',
                ],
            ],
        ];

        $pricing = Section::create([
            'title' => $pricingContent['title'],
            'slug' => $pricingContent['slug'],
            'default_content' => $pricingContent['default_content'],
            'status' => 1,
            'site_page_id' => 3,
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
        // TESTIMONIAL AREA
        $sourcePath = public_path('admin/img/files/home-three/testimonial');
        copyFilesToStorage($sourcePath, 'web');
        $testimonialContent = [
            'title'           => 'Testimonial',
            'slug'            => 'testimonial',
            'default_content' => [
                    'bg_shape' => 'uploads/web/h3-testimonial-bg.png',
                    'shape_1' => 'uploads/web/h3-testimonial-shape1.png',
                    'shape_2' => 'uploads/web/h3-testimonial-shape2.png',
                    'brand_image' => 'uploads/web/h3-testimonial-brand.png',
            ],
            'translations'   => [
                'en' => [
                    'subtitle' => 'Testimonials',
                    'title' => 'Trusted by 21,000+ customers',
                    'bg_rating' => '4.86',
                    'rating_text' => '4.9/5',
                    'rating_description' => 'Based on 1,258 reviews',
                ],
                'hi' => [
                    'subtitle' => 'प्रशंसापत्र',
                    'title' => '21,000+ ग्राहकों द्वारा विश्वसनीय',
                    'bg_rating' => '4.86',
                    'rating_text' => '4.9/5',
                    'rating_description' => '1,258 समीक्षाओं पर आधारित',
                ],
                'ar' => [
                    'subtitle' => 'الشهادات',
                    'title' => 'موثوق به من قبل 21,000+ عميل',
                    'bg_rating' => '4.86',
                    'rating_text' => '4.9/5',
                    'rating_description' => 'استنادًا إلى 1,258 مراجعة',
                ]
            ],
        ];

        $testimonial = Section::create([
            'title' => $testimonialContent['title'],
            'slug' => $testimonialContent['slug'],
            'default_content' => $testimonialContent['default_content'],
            'status' => 1,
            'site_page_id' => 3,
        ]);

        $testimonial->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $testimonialContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $testimonialContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $testimonialContent['translations']['ar'],
            ],
        ]);


        //////////////
        // FAQ AREA
        $sourcePath = public_path('admin/img/files/home-three/faq');
        copyFilesToStorage($sourcePath, 'web');

        $faqContent = [
                    'title'           => 'FAQ Area',
                    'slug'            => 'faq',
                    'default_content' => [
                        'shape' => 'uploads/web/h3-faq-shape.png',
                        'faqs' => json_encode(["1", "2", "3", "4", "5"]),
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle'     => 'FAQ',
                            'title' => 'Got Any \ Questions?',
                        ],
                        'hi' => [
                            'subtitle'     => 'अक्सर पूछे जाने वाले प्रश्न',
                            'title' => 'कोई प्रश्न है?',
                        ],
                        'ar' => [
                            'subtitle'     => 'الأسئلة الشائعة',
                            'title' => 'هل لديك أي أسئلة؟',
                        ],
                    ],
                ];

        $faq = Section::create([
            'title' => $faqContent['title'],
            'slug' => $faqContent['slug'],
            'default_content' => $faqContent['default_content'],
            'status' => 1,
            'site_page_id' => 3,
        ]);

        $faq->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $faqContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $faqContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $faqContent['translations']['ar'],
            ],
        ]);

        //////////////
        // APP DOWNLOAD AREA
        $sourcePath = public_path('admin/img/files/home-three/app-download');
        copyFilesToStorage($sourcePath, 'web');

        $appDownloadContent = [
            'title'           => 'App Download Area',
            'slug'            => 'app-download',
                    'default_content' => [
                        'image_1' => 'uploads/web/h3-app-download1.png',
                        'image_2' => 'uploads/web/h3-app-download2.png',
                        'btn_url_1' => '#',
                        'btn_url_2' => '#',
                        'btn_icon_1' => 'uploads/web/h3-app-download-btn-1.png',
                        'btn_icon_2' => 'uploads/web/h3-app-download-btn-2.png',
                    ],
                    'translations'   => [
                        'en' => [
                            'title' => 'Ready To \ Download',
                            'description' => 'Your ultimate travel partner. Carries the information \ you need while travelling.',
                            'btn_text_1'     => 'Play Store',
                            'btn_text_2'     => 'App Store',
                        ],
                        'hi' => [
                            'title' => 'डाउनलोड करने \ के लिए तैयार',
                            'description' => 'आपका अंतिम यात्रा साथी। यात्रा करते समय आपको \ आवश्यक जानकारी ले जाता है।',
                            'btn_text_1'     => 'प्ले स्टोर',
                            'btn_text_2'     => 'ऐप स्टोर',
                        ],
                        'ar' => [
                            'title' => 'جاهز \ للتنزيل',
                            'description' => 'شريكك النهائي في السفر. يحمل \ المعلومات التي تحتاجها أثناء السفر.',
                            'btn_text_1'     => 'متجر جوجل بلاي',
                            'btn_text_2'     => 'متجر التطبيقات',
                        ],
                    ],
                ];

        $appDownload = Section::create([
            'title' => $appDownloadContent['title'],
            'slug' => $appDownloadContent['slug'],
            'default_content' => $appDownloadContent['default_content'],
            'status' => 1,
            'site_page_id' => 3,
        ]);

        $appDownload->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $appDownloadContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $appDownloadContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $appDownloadContent['translations']['ar'],
            ],
        ]);
    }
}
