<?php

namespace Modules\Frontend\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Frontend\Models\Section;
use Modules\Frontend\Models\SitePage;


class HomeSixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pageID = SitePage::where('slug', 'home_six')->first()->id;

        //////////////
        // HERO AREA
        $sourcePath = public_path('admin/img/files/home-six');
        copyFilesToStorage($sourcePath, 'web');

        $heroContent = [
            'title'           => 'Hero Area',
            'slug'            => 'hero',
            'default_content' => [
                'bg_image' => 'uploads/web/h6-hero-bg.jpg',
                'image_1' => 'uploads/web/h6-hero-sm-1.jpg',
                'image_2' => 'uploads/web/h6-hero-sm-2.jpg',
                'image_3' => 'uploads/web/h6-hero-sm-3.png',
                'image_4' => 'uploads/web/h6-hero-sm-4.jpg',
                'image_5' => 'uploads/web/h6-hero-sm-5.jpg',
                'image_6' => 'uploads/web/h6-hero-sm-6.png',
                'image_7' => 'uploads/web/h6-hero-sm-7.jpg',
                'image_8' => 'uploads/web/h6-hero-sm-8.jpg',
                'people_image' => 'uploads/web/h6-hero-people.png',
                'btn_url' => '#',
            ],
            'translations'   => [
                'en' => [
                    'subtitle'     => 'Best-in-class local \ benefits for everyone, everywhere',
                    'title'     => 'Design Agency',
                    'btn_text' => 'Explore Our Projects',
                    'people_title' => 'Engaged and counting',
                    'people_number' => '2500+',
                ],
                'hi' => [
                    'subtitle'     => 'सर्वश्रेष्ठ-इन-क्लास स्थानीय \ लाभ सभी के लिए, हर जगह',
                    'title'     => 'डिज़ाइन एजेंसी',
                    'btn_text' => 'हमारे करें',
                    'people_title' => 'संलग्न और गिनती',
                    'people_number' => '2500+',
                ],
                'ar' => [
                    'subtitle'     => 'أفضل الفوائد المحلية في فئتها للجميع، في كل مكان',
                    'title'     => 'وكالة تصميم',
                    'btn_text' => 'استكشف مشاريعنا',
                    'people_title' => 'المشاركة والعد',
                    'people_number' => '2500+',
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
        * TEXT SLIDER AREA
        */

        $textSliderContent = [
            'title'           => 'Text Slider Area',
            'slug'            => 'text-slider',
            'default_content' => [],
            'translations'   => [
                'en' => [
                    'slider_content_1'     => 'Digital Experience, Digital Experience',
                    'slider_content_2'     => 'Creative Design, Creative Design',
                ],
                'hi' => [
                    'slider_content_1'     => 'डिजिटल अनुभव, डिजिटल अनुभव',
                    'slider_content_2'     => 'रचनात्मक डिज़ाइन, रचनात्मक डिज़ाइन',
                ],
                'ar' => [
                    'slider_content_1'     => 'تجربة رقمية، تجربة رقمية',
                    'slider_content_2'     => 'تصميم إبداعي، تصميم إبداعي',
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
        * ABOUT AREA
        */

        $aboutContent = [
            'title'           => 'About Area',
            'slug'            => 'about',
            'default_content' => [
                'btn_url' => '#',
            ],
            'translations'   => [
                'en' => [
                    'description'     => 'With over 10 years of experience as a versatile Front-End and Full-Stack Developer, I excel in crafting a wide range of solutions, from dynamic web applications and interactive configurators to robust backend automation software, ensuring innovative and effective outcomes for any project.',
                    'btn_text'     => 'More About Us',
                ],
                'hi' => [
                    'description'     => '10 से अधिक वर्षों के अनुभव के साथ एक बहुमुखी फ्रंट-एंड और फुल-स्टैक डेवलपर के रूप में, मैं गतिशील वेब अनुप्रयोगों और इंटरैक्टिव कॉन्फ़िगरेटर से लेकर मजबूत बैकएंड ऑटोमेशन सॉफ़्टवेयर तक, समाधानों की एक विस्तृत श्रृंखला तैयार करने में उत्कृष्ट हूं, जो किसी भी परियोजना के लिए नवीन और प्रभावी परिणाम सुनिश्चित करता है।',
                    'btn_text'     => 'हमारे बारे में अधिक',
                ],
                'ar' => [
                    'description'     => 'مع أكثر من 10 سنوات من الخبرة كمطور متعدد الجوانب في الواجهة الأمامية والكامل، أتفوق في صياغة مجموعة واسعة من الحلول، من تطبيقات الويب الديناميكية والمكوِّنات التفاعلية إلى برامج أتمتة الخلفية القوية، مما يضمن نتائج مبتكرة وفعالة لأي مشروع.',
                    'btn_text'     => 'المزيد عنا',
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
        * PORTFOLIO AREA
        */

        $portfolioContent = [
            'title'           => 'Portfolio Area',
            'slug'            => 'portfolio',
            'default_content' => [
                'portfolios' => json_encode(["11", "12", "13", "14"]),
            ],
            'translations'   => [
                'en' => [
                    'view_demo' => 'View \ Demo',
                ],
                'hi' => [
                    'view_demo' => 'डेमो \ देखें',
                ],
                'ar' => [
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
        * SERVICES AREA
        */

        $servicesContent = [
                    'title'           => 'Services Area',
                    'slug'            => 'services',
                    'default_content' => [
                        'service_image_1' => 'uploads/web/h6-service-1.png',
                        'service_image_2' => 'uploads/web/h6-service-2.png',
                        'service_image_3' => 'uploads/web/h6-service-3.png',
                        'service_image_4' => 'uploads/web/h6-service-4.png',
                        'service_url_1' => '#',
                        'service_url_2' => '#',
                        'service_url_3' => '#',
                        'service_url_4' => '#',
                    ],
                    'translations'   => [
                        'en' => [
                            'title' => 'We can help you with',
                            'description' => 'Check out some of my projects by area of expertise',
                            'info_text' => 'Click to view Services',
                            'service_title_1' => 'Product Design',
                            'service_title_2' => 'Brand Design',
                            'service_title_3' => 'Motion Design',
                            'service_title_4' => 'Web Development',
                        ],
                        'hi' => [
                            'title' => 'हम आपकी मदद कर सकते हैं',
                            'description' => 'विशेषज्ञता के क्षेत्र द्वारा मेरे कुछ प्रोजेक्ट देखें',
                            'info_text' => 'सेवाओं को देखने के लिए क्लिक करें',
                            'service_title_1' => 'उत्पाद डिजाइन',
                            'service_title_2' => 'ब्रांड डिजाइन',
                            'service_title_3' => 'मोशन डिजाइन',
                            'service_title_4' => 'वेब विकास',
                        ],
                        'ar' => [
                            'title' => 'يمكننا مساعدتك في',
                            'description' => 'تحقق من بعض مشاريعي حسب مجال الخبرة',
                            'info_text' => 'انقر لعرض الخدمات',
                            'service_title_1' => 'تصميم المنتج',
                            'service_title_2' => 'تصميم العلامة التجارية',
                            'service_title_3' => 'تصميم الحركة',
                            'service_title_4' => 'تطوير الويب',
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
        * BANNER AREA
        */

        $bannerContent = [
                    'title'           => 'Banner Area',
                    'slug'            => 'banner',
                    'default_content' => [
                        'main_image' => 'uploads/web/h6-banner-main.jpg',
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
        * FUN FACT AREA
        */

        $funFactContent = [
            'title'           => 'Fun Fact Area',
            'slug'            => 'fun-fact',
            'default_content' => [
                'fact_number_1' => 120,
                'fact_number_2' => 16,
                'fact_number_3' => 185,
                'fact_unit_1' => '+',
                'fact_unit_2' => '+',
                'fact_unit_3' => '%',
            ],
            'translations'   => [
                'en' => [
                    'subtitle' => 'Fun Facts',
                    'title' => 'Numbers that Speak Volumes',
                    'description' => 'We are a team of passionate and crazy individuals dedicated to bringing your ideas to life. With a keen eye for aesthetics, attention to detail, & a deep understanding of design principles, we strive to deliver exceptional results that exceed your expectations! ',
                    'fact_subtitle_1' => '[ Nice! ]',
                    'fact_title_1' => 'Projects Completed',
                    'fact_subtitle_2' => '[ Holy Moly! ]',
                    'fact_title_2' => 'Years of Experience',
                    'fact_subtitle_3' => '[ Ho Ho! ]',
                    'fact_title_3' => 'Growing Agency',
                ],
                'hi' => [
                    'subtitle' => 'मज़ेदार तथ्य',
                    'title' => 'संख्या जो मात्रा बोलती है',
                    'description' => 'हम जुनूनी और पागल व्यक्तियों की एक टीम हैं जो आपके विचारों को जीवन में लाने के लिए समर्पित हैं। सौंदर्यशास्त्र के लिए एक तेज नजर, विवरण पर ध्यान, और डिजाइन सिद्धांतों की गहरी समझ के साथ, हम असाधारण परिणाम प्रदान करने का प्रयास करते हैं जो आपकी अपेक्षाओं से परे हैं!',
                    'fact_subtitle_1' => '[ अच्छा! ]',
                    'fact_title_1' => 'प्रोजेक्ट पूरे हुए',
                    'fact_subtitle_2' => '[ होली मोलि! ]',
                    'fact_title_2' => 'अनुभव के वर्ष',
                    'fact_subtitle_3' => '[ हो हो! ]',
                    'fact_title_3' => 'एजेंसी बढ़ रही है',
                ],
                'ar' => [
                    'subtitle' => 'حقائق ممتعة',
                    'title' => 'أرقام تتحدث بصوت عالٍ',
                    'description' => 'نحن فريق من الأفراد المتحمسين والمجنونين المكرسين لجلب أفكارك إلى الحياة. مع عين ثاقبة للجماليات، والانتباه للتفاصيل، وفهم عميق لمبادئ التصميم، نسعى جاهدين لتقديم نتائج استثنائية تتجاوز توقعاتك!',
                    'fact_subtitle_1' => '[ لطيف! ]',
                    'fact_title_1' => 'المشاريع المكتملة',
                    'fact_subtitle_2' => '[ يا إلهي! ]',
                    'fact_title_2' => 'سنوات من الخبرة',
                    'fact_subtitle_3' => '[ هو هو! ]',
                    'fact_title_3' => 'وكالة نامية',
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


        $brandContent = [
                    'title'           => 'Brand Area',
                    'slug'            => 'brand',
                    'default_content' => [
                        'brands_top' => json_encode(["12", "13", "14", "15", "3", "4", "6"]),
                        'brands_bottom' => json_encode(["12", "13", "14", "15", "3", "4", "6"]),
                    ],
                    'translations'   => [
                        'en' => [
                            'title' => 'Collaborators'
                        ],
                        'hi' => [
                            'title' => 'सहयोगी'
                        ],
                        'ar' => [
                            'title' => 'المتعاونين'
                        ],
                    ],
                ];

        $brand = Section::create([
            'title' => $brandContent['title'],
            'slug' => $brandContent['slug'],
            'default_content' => $brandContent['default_content'],
            'status' => 1,
            'site_page_id' => $pageID,
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
        // TEAM AREA
        $teamContent = [
            'title'           => 'Our Team',
            'slug'            => 'team',
            'default_content' => [
                'teams' => json_encode(["4", "5", "6", "7", "8"]),
            ],
            'translations'   => [
                        'en' => [
                            'title'     => 'meet \ our team',
                        ],
                        'hi' => [
                            'title'     => 'हमारी टीम से मिलें',
                        ],
                        'ar' => [
                            'title'     => 'تعرف على فريقنا',
                        ],
                    ],
                ];

        $team = Section::create([
            'title' => $teamContent['title'],
            'slug' => $teamContent['slug'],
            'default_content' => $teamContent['default_content'],
            'status' => 1,
            'site_page_id' => $pageID,
        ]);

        $team->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $teamContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $teamContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $teamContent['translations']['ar'],
            ],
        ]);
    }
}
