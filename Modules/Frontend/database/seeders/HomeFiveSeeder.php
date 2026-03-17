<?php

namespace Modules\Frontend\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Frontend\Models\Section;
use Modules\Frontend\Models\SitePage;

class HomeFiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pageID = SitePage::where('slug', 'home_five')->first()->id;
        //////////////
        // HERO AREA
        $sourcePath = public_path('admin/img/files/home-five');
        copyFilesToStorage($sourcePath, 'web');

        $heroContent = [
                    'title'           => 'Hero Area',
                    'slug'            => 'hero',
                    'default_content' => [
                        'title_image' => 'uploads/web/h5-hero-title.jpg',
                        'bg_image' => 'uploads/web/h5-hero-bg.jpg',
                        'quote_image' => 'uploads/web/h5-hero-quote.jpg',
                        'btn_url' => '#',
                        'quote_btn_url' => '#',
                    ],
                    'translations'   => [
                        'en' => [
                            'title'     => 'Digital \ [title_image] Design \ Experience',
                            'description' => 'Hey! is the ultimate Agntix Agency template for professionals in the design industry.',
                            'quote' => '“The depth of exploration and quality of the work was great”',
                            'quote_author' => 'Juan Manuel',
                            'quote_btn_text' => 'More',
                        ],
                        'hi' => [
                            'title'     => 'डिजिटल \ [title_image] डिजाइन \ अनुभव',
                            'description' => 'हे! डिजाइन उद्योग में पेशेवरों के लिए अंतिम Agntix एजेंसी टेम्पलेट है।',
                            'quote' => '“अन्वेषण की गहराई और काम की गुणवत्ता महान थी”',
                            'quote_author' => 'जुआन मैनुअल',
                            'quote_btn_text' => 'अधिक',
                        ],
                        'ar' => [
                            'title'     => 'الرقمية \ [title_image] تصميم \ تجربة',
                            'description' => 'مرحبًا! هي القالب النهائي لوكالة Agntix للمهنيين في صناعة التصميم.',
                            'quote' => '“كان عمق الاستكشاف وجودة العمل رائعين”',
                            'quote_author' => 'خوان مانويل',
                            'quote_btn_text' => 'المزيد',
                        ],
                    ],
                ];

        $hero = Section::create([
            'title' => $heroContent['title'],
            'slug' => $heroContent['slug'],
            'default_content' => $heroContent['default_content'],
            'status' => 1,
            'site_page_id' => $pageID,
        ]);

        $hero->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $heroContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $heroContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $heroContent['translations']['ar'],
            ],
        ]);

        /*
        * ABOUT AREA
        */

        $aboutContent = [
                    'title'           => 'About Area',
                    'slug'            => 'about',
                    'default_content' => [
                        'main_image' => 'uploads/web/h5-about-main.jpg',
                        'people_image' => 'uploads/web/h5-about-people.png',
                        'shape' => 'uploads/web/h5-about-shape.png',
                        'counter_number_1' => 98,
                        'counter_number_2' => 25,
                        'counter_unit_1' => '%',
                        'counter_unit_2' => '+',
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle'  => 'WHO WE ARE',
                            'title'     => 'An independent web design and branding agency in Manchester set up in 2010 who care, build relationships, have industry experience, and win awards.',
                            'description' => 'Driven by a passion for innovation, we specialize in \ delivering top-quality design solutions',
                            'counter_title_1' => 'Clients Satisfied and \ Repeating',
                            'counter_title_2' => 'Projects Completed \ in 24 Countries',
                        ],
                        'hi' => [
                            'subtitle'  => 'हम कौन हैं',
                            'title'     => 'मैनचेस्टर में एक स्वतंत्र वेब डिजाइन और ब्रांडिंग एजेंसी जो 2010 में स्थापित हुई, जो परवाह करती है, संबंध बनाती है, उद्योग का अनुभव रखती है, और पुरस्कार जीतती है।',
                            'description' => 'नवाचार के प्रति जुनून से प्रेरित, हम शीर्ष-गुणवत्ता डिजाइन समाधानों में विशेषज्ञता रखते हैं।',
                            'counter_title_1' => 'ग्राहक संतुष्ट और \ पुनरावृत्ति',
                            'counter_title_2' => '24 देशों में \ पूरे किए गए परियोजनाएं',
                        ],
                        'ar' => [
                            'subtitle'  => 'من نحن',
                            'title'     => 'وكالة مستقلة لتصميم الويب والعلامات التجارية في مانشستر تأسست في عام 2010 تهتم، تبني العلاقات، لديها خبرة في الصناعة، وتفوز بالجوائز.',
                            'description' => 'مدفوعون بشغف للابتكار، نحن متخصصون في تقديم حلول تصميم عالية الجودة',
                            'counter_title_1' => 'العملاء راضون و \ يكررون',
                            'counter_title_2' => 'المشاريع المكتملة \ في 24 دولة',
                        ],
                    ],
                ];

        $about = Section::create([
            'title' => $aboutContent['title'],
            'slug' => $aboutContent['slug'],
            'default_content' => $aboutContent['default_content'],
            'status' => 1,
            'site_page_id' => $pageID,
        ]);

        $about->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $aboutContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $aboutContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $aboutContent['translations']['ar'],
            ],
        ]);

        /*
        * BANNER AREA
        */

        $bannerContent = [
                    'title'           => 'Banner Area',
                    'slug'            => 'banner',
                    'default_content' => [
                        'main_image' => 'uploads/web/h5-banner-main.jpg',
                    ],
                    'translations'   => [
                        'en' => [],
                        'hi' => [],
                        'ar' => [],
                    ],
                ];

        $banner = Section::create([
            'title' => $bannerContent['title'],
            'slug' => $bannerContent['slug'],
            'default_content' => $bannerContent['default_content'],
            'status' => 1,
            'site_page_id' => $pageID,
        ]);

        $banner->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $bannerContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $bannerContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $bannerContent['translations']['ar'],
            ],
        ]);

        /*
        * TEXT Slider AREA
        */

        $textSliderContent = [
                    'title'           => 'Text Slider Area',
                    'slug'            => 'text-slider',
                    'default_content' => [],
                    'translations'   => [
                        'en' => [
                            'slider_content' => 'UI Design, Design Agency, Strategy, Digital Solution, Business Growth, Development, IT Company, SEO Agency, Consulting, Branding, Lifetime Updates',

                        ],
                        'hi' => [
                            'slider_content' => 'क्रिएटिव एजेंसी, वेब मार्केटिंग, डिजिटल मार्केटिंग, प्रोडक्ट मार्केटिंग, रिसर्च मार्केटिंग, वेब मार्केटिंग, लाइफटाइम अपडेट्स',
                        ],
                        'ar' => [
                            'slider_content' => 'وكالة إبداعية، تسويق الويب، التسويق الرقمي، تسويق المنتج، أبحاث التسويق، تسويق الويب، تحديثات مدى الحياة',
                        ],
                    ],
                ];

        $textSlider = Section::create([
            'title' => $textSliderContent['title'],
            'slug' => $textSliderContent['slug'],
            'default_content' => $textSliderContent['default_content'],
            'status' => 1,
            'site_page_id' => $pageID,
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

        /*
        * SERVICES AREA
        */

        $servicesContent = [
                    'title'           => 'Services Area',
                    'slug'            => 'services',
                    'default_content' => [
                        'services' => json_encode(["4", "5", "6", "8"]),
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle' => 'Services',
                        ],
                        'hi' => [
                            'subtitle' => 'सेवाएँ',
                        ],
                        'ar' => [
                            'subtitle' => 'الخدمات',
                        ],
                    ],
                ];

        $services = Section::create([
            'title' => $servicesContent['title'],
            'slug' => $servicesContent['slug'],
            'default_content' => $servicesContent['default_content'],
            'status' => 1,
            'site_page_id' => $pageID,
        ]);

        $services->translations()->createMany([
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

        /*
        * Gallery AREA
        */

        $galleryContent = [
            'title'           => 'Gallery Area',
            'slug'            => 'gallery',
            'default_content' => [
                'image_1' => 'uploads/web/h5-gallery-1.jpg',
                'image_2' => 'uploads/web/h5-gallery-2.jpg',
                'image_3' => 'uploads/web/h5-gallery-3.jpg',
                'image_4' => 'uploads/web/h5-gallery-4.jpg',
                'image_5' => 'uploads/web/h5-gallery-5.jpg',
                'image_6' => 'uploads/web/h5-gallery-6.jpg',
                'video_url' => 'https://html.aqlova.com/videos/liko/liko.mp4',
            ],
            'translations'   => [
                'en' => [],
                'hi' => [],
                'ar' => [],
            ],
        ];

        $gallery = Section::create([
            'title' => $galleryContent['title'],
            'slug' => $galleryContent['slug'],
            'default_content' => $galleryContent['default_content'],
            'status' => 1,
            'site_page_id' => $pageID,
        ]);

        $gallery->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $galleryContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $galleryContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $galleryContent['translations']['ar'],
            ],
        ]);

        /*
        * PORTFOLIO AREA
        */

        $portfolioContent = [
            'title'           => 'Portfolio Area',
            'slug'            => 'portfolio',
            'default_content' => [
                'portfolios' => json_encode(["15", "16", "17", "18", "19", "20"]),
                'btn_url' => '#',
            ],
            'translations'   => [
                'en' => [
                    'subtitle' => 'Featured Projects',
                    'btn_text' => 'View All Works',
                    'view_demo' => 'View \ Demo',
                ],
                'hi' => [
                    'subtitle' => 'फ़ीचर्ड प्रोजेक्ट्स',
                    'btn_text' => 'सभी कार्य देखें',
                    'view_demo' => 'डेमो \ देखें',
                ],
                'ar' => [
                    'subtitle' => 'المشاريع المميزة',
                    'btn_text' => 'عرض جميع الأعمال',
                    'view_demo' => 'عرض العرض \ التجريبي',
                ],
            ],
        ];

        $portfolio = Section::create([
            'title' => $portfolioContent['title'],
            'slug' => $portfolioContent['slug'],
            'default_content' => $portfolioContent['default_content'],
            'status' => 1,
            'site_page_id' => $pageID,
        ]);

        $portfolio->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $portfolioContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $portfolioContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $portfolioContent['translations']['ar'],
            ],
        ]);

        /*
        * FUN FACT AREA
        */

        $funFactContent = [
            'title'           => 'Fun Fact Area',
            'slug'            => 'fun-fact',
            'default_content' => [
                'fact_icon_1' => 'uploads/web/h5-funfact-icon-1.png',
                'fact_icon_2' => 'uploads/web/h5-funfact-icon-2.png',
                'fact_number_1' => 106,
                'fact_number_2' => 96,
                'image_1' => 'uploads/web/h5-funfact-1.png',
                'image_2' => 'uploads/web/h5-funfact-2.png',
                'image_3' => 'uploads/web/h5-funfact-3.png',
                'image_4' => 'uploads/web/h5-funfact-4.png',
                'image_5' => 'uploads/web/h5-funfact-5.png',
                'image_6' => 'uploads/web/h5-funfact-6.png',
                'image_7' => 'uploads/web/h5-funfact-7.png',
                'image_8' => 'uploads/web/h5-funfact-8.png',
                'image_9' => 'uploads/web/h5-funfact-9.png',
                'image_10' => 'uploads/web/h5-funfact-10.png',
                'image_11' => 'uploads/web/h5-funfact-11.png',
                'image_12' => 'uploads/web/h5-funfact-12.png',
                'image_13' => 'uploads/web/h5-funfact-13.png',
                'image_14' => 'uploads/web/h5-funfact-14.png',
                'image_15' => 'uploads/web/h5-funfact-15.png',
            ],
            'translations'   => [
                'en' => [
                    'fact_subtitle_1' => '( Nice! )',
                    'fact_title_1' => 'projects \ completed \ in 24 countries',
                    'fact_subtitle_2' => '( Ho Ho! )',
                    'fact_title_2' => 'Clients \ satisfied and \ repeating',
                    'fact_subtitle_3' => '( Holy Moly! )',
                    'fact_title_3' => 'Performing video',
                    'fact_text' => '_#_1TOP',
                ],
                'hi' => [
                    'fact_subtitle_1' => '( अच्छा! )',
                    'fact_title_1' => '24 देशों में \ पूरे किए गए परियोजनाएं',
                    'fact_subtitle_2' => '( हो हो! )',
                    'fact_title_2' => 'ग्राहक संतुष्ट और \ पुनरावृत्ति',
                    'fact_subtitle_3' => '( होली मोल्ली! )',
                    'fact_title_3' => 'प्रदर्शन वीडियो',
                    'fact_text' => '_#_1TOP',
                ],
                'ar' => [
                    'fact_subtitle_1' => '( جميل! )',
                    'fact_title_1' => 'المشاريع المكتملة \ في 24 دولة',
                    'fact_subtitle_2' => '( هو هو! )',
                    'fact_title_2' => 'العملاء راضون و \ يكررون',
                    'fact_subtitle_3' => '( هولي مولي! )',
                    'fact_title_3' => 'فيديو الأداء',
                    'fact_text' => '_#_1TOP',
                ],
            ],
        ];

        $funfact = Section::create([
            'title' => $funFactContent['title'],
            'slug' => $funFactContent['slug'],
            'default_content' => $funFactContent['default_content'],
            'status' => 1,
            'site_page_id' => $pageID,
        ]);

        $funfact->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $funFactContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $funFactContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $funFactContent['translations']['ar'],
            ],
        ]);

         /*
        * PROCESS AREA
        */

        $processContent = [
            'title'           => 'Process Area',
            'slug'            => 'process',
            'default_content' => [
                'process_number_1' => "01",
                'process_number_2' => "02",
                'process_number_3' => "03",
                'process_number_4' => "04",
            ],
            'translations'   => [
                'en' => [
                    'subtitle' => 'How we Work',
                    'title'     => 'Our \ design thinking process',
                    'process_title_1' => 'Research',
                    'process_title_2' => 'Ideation & design',
                    'process_title_3' => 'Development',
                    'process_title_4' => 'Testing',
                    'process_description_1' => 'We listen stories of user to understand pain points and give a rough estimate about cost and time-frame',
                    'process_description_2' => 'We discuss your goals to identify challenges and outline possible solutions with a clear timeline and budget',
                    'process_description_3' => 'We explore your vision, understand the core problem, and provide an honest overview of time and pricing.',
                    'process_description_4' => 'Through open discussion, we uncover your needs, define priorities, and suggest a realistic plan with estimates',
                ],
                'hi' => [
                    'subtitle' => 'हम कैसे काम करते हैं',
                    'title'     => 'हमारी \ डिजाइन सोच प्रक्रिया',
                    'process_title_1' => 'अनुसंधान',
                    'process_title_2' => 'विचार और डिजाइन',
                    'process_title_3' => 'विकास',
                    'process_title_4' => 'परीक्षण',
                    'process_description_1' => 'हम उपयोगकर्ताओं की कहानियाँ सुनते हैं ताकि उनकी समस्याओं को समझ सकें और लागत व समय सीमा का एक अनुमान दे सकें।',
                    'process_description_2' => 'हम आपके लक्ष्यों पर चर्चा करते हैं ताकि चुनौतियों की पहचान कर सकें और एक स्पष्ट समयरेखा और बजट के साथ संभावित समाधान प्रस्तुत कर सकें।',
                    'process_description_3' => 'हम आपके विज़न का पता लगाते हैं, मुख्य समस्या को समझते हैं और समय व लागत का ईमानदार आकलन प्रदान करते हैं।',
                    'process_description_4' => 'खुले संवाद के माध्यम से, हम आपकी आवश्यकताओं को समझते हैं, प्राथमिकताएँ तय करते हैं और यथार्थवादी योजना और अनुमान सुझाते हैं।',

                ],
                'ar' => [
                    'subtitle' => 'كيف نعمل',
                    'title'     => 'عملية \ التفكير التصميمي لدينا',
                    'process_title_1' => 'بحث',
                    'process_title_2' => 'التفكير والتصميم',
                    'process_title_3' => 'تطوير',
                    'process_title_4' => 'اختبار',
                    'process_description_1' => 'نستمع إلى قصص المستخدمين لفهم نقاط الألم وتقديم تقدير تقريبي للتكلفة والإطار الزمني.',
                    'process_description_2' => 'نناقش أهدافك لتحديد التحديات ووضع حلول محتملة بجدول زمني وميزانية واضحة.',
                    'process_description_3' => 'نستكشف رؤيتك ونفهم المشكلة الأساسية ونقدم نظرة صادقة حول الوقت والتكلفة.',
                    'process_description_4' => 'من خلال النقاش المفتوح، نكتشف احتياجاتك ونحدد الأولويات ونقترح خطة واقعية مع التقديرات.',

                ],
            ],
        ];

        $process = Section::create([
            'title' => $processContent['title'],
            'slug' => $processContent['slug'],
            'default_content' => $processContent['default_content'],
            'status' => 1,
            'site_page_id' => $pageID,
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


         $testimonialContent = [
            'title'           => 'Testimonial Area',
            'slug'            => 'testimonial',
            'default_content' => [
                'bg_image' => 'uploads/web/h5-testimonial-bg.png',
                'bg_shape' => 'uploads/web/h5-testimonial-shape.png',
                'image_1' => 'uploads/web/h5-award-1.png',
                'image_2' => 'uploads/web/h5-award-2.png',
                'image_3' => 'uploads/web/h5-award-3.png',
                'review_image' => 'uploads/web/h5-review.png',
                'testimonials' => json_encode(["1", "2", "3", "4", "5"]),
            ],
            'translations'   => [
                'en' => [
                    'title'     => 'Client Reviews',
                ],
                'hi' => [
                    'title'     => 'ग्राहक समीक्षा',
                ],
                'ar' => [
                    'title'     => 'مراجعات العملاء',
                ],
            ],
        ];

        $testimonial = Section::create([
            'title' => $testimonialContent['title'],
            'slug' => $testimonialContent['slug'],
            'default_content' => $testimonialContent['default_content'],
            'status' => 1,
            'site_page_id' => $pageID,
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
    }
}
