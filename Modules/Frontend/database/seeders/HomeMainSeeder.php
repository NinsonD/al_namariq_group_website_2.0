<?php

namespace Modules\Frontend\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Blog\Models\Blog;
use Modules\Brand\Models\Brand;
use Modules\Frontend\Models\Section;
use Modules\Service\Models\Service;
use Modules\Team\Models\Team;
use Modules\Testimonial\Models\Testimonial;


class HomeMainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //////////////
        // HERO AREA
        $sourcePath = public_path('admin/img/files/home-main/hero');
        copyFilesToStorage($sourcePath, 'web');

        $content = [
                    'title'           => 'Hero Area',
                    'slug'            => 'hero',
                    'default_content' => [
                        'main_image' => 'uploads/web/hero-img.jpg',
                        'bg_image' => 'uploads/web/hero-bg-shape.png',
                        'say_hi_image' => 'uploads/web/hi-shape.png',
                        'counter_number_1' => 98,
                        'counter_number_2' => 25,
                        'counter_unit_1' => '%',
                        'counter_unit_2' => '+',
                        'btn_url' => '#',
                    ],
                    'translations'   => [
                        'en' => [
                            'title'     => 'Digital marketing agency',
                            'subtitle' => ' 🔥 BEST MARKETING AGENCY ',
                            'say_hi_title' => 'World-class digital media agency.',
                            'counter_title_1' => 'Clients Satisfied and \ Repeating',
                            'counter_title_2' => 'Projects Completed \ in 24 Countries',
                            'btn_text' => 'Get Started',
                        ],
                        'hi' => [
                            'title'     => 'डिजिटल मार्केटिंग एजेंसी',
                            'subtitle' => '🔥 बेस्ट मार्केटिंग एजेंसी',
                            'say_hi_title' => 'विश्व-स्तरीय डिजिटल मीडिया एजेंसी',
                            'counter_title_1' => 'संतुष्ट और दोबारा आने \ वाले ग्राहक',
                            'counter_title_2'=> 'प्रोजेक्ट्स पूरे \ 24 देशों में',
                            'btn_text'=> 'शुरू करें',
                        ],
                        'ar' => [
                            'title'     => 'وكالة التسويق الرقمي',
                            'subtitle' => '🔥 أفضل وكالة تسويق',
                            'say_hi_title' => 'وكالة وسائط رقمية من الطراز العالمي',
                            'counter_title_1' => 'سنوات \ من الخبرة',
                            'counter_title_2' => 'مشاريع مكتملة \ في 24 دولة',
                            'btn_text'=> 'ابدأ الآن',
                        ],
                    ],
                ];

        $hero = Section::create([
            'title' => $content['title'],
            'slug' => $content['slug'],
            'default_content' => $content['default_content'],
            'status' => 1,
            'site_page_id' => 1,
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
        // ABOUT AREA

        $sourcePath = public_path('admin/img/files/home-main/about');
        copyFilesToStorage($sourcePath, 'web');

        $aboutContent = [
                    'title'           => 'About Area',
                    'slug'            => 'about',
                    'default_content' => [
                        'image' => 'uploads/web/about-1.jpg',
                        'image_2' => 'uploads/web/about-2.jpg',
                        'btn_url' => '#',
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle'     => 'About our Agency',
                            'title'     => 'Social [marketing] & advertising.',
                            'description' => '<p>We provide digital experience services to start up and small businesses. We help our clients succeed by creating brand identities, digital experiences, and print materials. Install any demo, plugin or template in a matter of seconds.</p>',
                            'btn_text' => 'More About Us',
                        ],
                        'hi' => [
                            'subtitle'  => 'हमारी एजेंसी के बारे में',
                            'title'     => 'सोशल [मार्केटिंग] और विज्ञापन।',
                            'description' => '<p>हम स्टार्टअप और छोटे व्यवसायों को डिजिटल अनुभव सेवाएं प्रदान करते हैं। हम अपने ग्राहकों को ब्रांड पहचान, डिजिटल अनुभव और प्रिंट सामग्री बनाकर सफल होने में मदद करते हैं। किसी भी डेमो, प्लगइन या टेम्पलेट को कुछ ही सेकंड में इंस्टॉल करें।</p>',
                            'btn_text' => 'हमारे बारे में अधिक',
                        ],
                        'ar' => [
                            'subtitle'     => 'عن وكالتنا',
                            'title'     => 'التسويق [الاجتماعي] والإعلان.',
                            'description' => '<p>نحن نقدم خدمات تجربة رقمية للشركات الناشئة والشركات الصغيرة. نساعد عملائنا على النجاح من خلال إنشاء هويات العلامة التجارية والتجارب الرقمية والمواد المطبوعة. قم بتثبيت أي عرض توضيحي أو مكون إضافي أو قالب في ثوانٍ.</p>',
                            'btn_text'=> 'المزيد عنّا',
                        ],
                    ],
                ];

        $about = Section::create([
            'title' => $aboutContent['title'],
            'slug' => $aboutContent['slug'],
            'default_content' => $aboutContent['default_content'],
            'status' => 1,
            'site_page_id' => 1,
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

        //////////////
        // PROCESS AREA

        $processContent = [
            'title'           => 'Process Area',
            'slug'            => 'process',
            'default_content' => [
                'btn_url' => '#',
            ],
            'translations'   => [
                'en' => [
                    'title'     => 'Explore the \ creative process',
                    'btn_text' => 'Call For Joining',
                    'process_title_1' => 'Research',
                    'process_title_2' => 'Ideation & design',
                    'process_title_3' => 'Development',
                    'process_description_1' => 'Focussed on understanding your business requirements, users and problems',
                    'process_description_2' => 'In this stage we work closely to come up with lots of solutions & finalize design ',
                    'process_description_3' => 'I develop your product in Webflow and help you with maintaining it. ',
                ],
                'hi' => [
                    'title'     => 'रचनात्मक प्रक्रिया \ का अन्वेषण करें',
                    'btn_text' => 'कॉल करें',
                    'process_title_1' => 'अनुसंधान',
                    'process_title_2' => 'विचार और डिज़ाइन',
                    'process_title_3' => 'विकास',
                    'process_description_1' => 'आपके व्यवसाय की आवश्यकताओं, उपयोगकर्ताओं और समस्याओं को समझने पर ध्यान केंद्रित किया गया',
                    'process_description_2' => 'इस चरण में हम बहुत सारे समाधान निकालने और डिज़ाइन को अंतिम रूप देने के लिए निकटता से काम करते हैं',
                    'process_description_3' => 'मैं आपके उत्पाद को वेबफ़्लो में विकसित करता हूं और आपको इसे बनाए रखने में मदद करता हूं।',
                ],
                'ar' => [
                    'title'     => 'استكشف العملية \ الإبداعية',
                    'btn_text' => 'ابدأ الآن',
                    'process_title_1' => 'البحث',
                    'process_title_2' => 'التفكير والتصميم',
                    'process_title_3' => 'التطوير',
                    'process_description_1' => 'مركز على فهم متطلبات عملك والمستخدمين والمشاكل',
                    'process_description_2' => 'في هذه المرحلة نعمل عن كثب للخروج بالعديد من الحلول وتحديد التصميم',
                    'process_description_3' => 'أقوم بتطوير منتجك في Webflow وأساعدك في صيانته.',
                ],
            ],
        ];

        $process = Section::create([
            'title' => $processContent['title'],
            'slug' => $processContent['slug'],
            'default_content' => $processContent['default_content'],
            'status' => 1,
            'site_page_id' => 1,
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
        // SERVICES AREA

        $sourcePath = public_path('admin/img/files/home-main/services');
        copyFilesToStorage($sourcePath, 'web');

        $servicesContent = [
                    'title'           => 'Services Area',
                    'slug'            => 'services',
                    'default_content' => [
                        'services_item_bg' => 'uploads/web/service-bg.jpg',
                        'services' => json_encode(Service::pluck('id')->take(4)->toArray()),
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle'     => 'Services',
                            'title'     => 'Growing sales through exceptional [services]',
                        ],
                        'hi' => [
                            'subtitle'  => 'हमारी एजेंसी के बारे में',
                            'title'     => 'सोशल [मार्केटिंग] और विज्ञापन।',
                        ],
                        'ar' => [
                            'subtitle'     => 'عن وكالتنا',
                            'title'     => 'التسويق [الاجتماعي] والإعلان.',
                        ],
                    ],
                ];

        $services = Section::create([
            'title' => $servicesContent['title'],
            'slug' => $servicesContent['slug'],
            'default_content' => $servicesContent['default_content'],
            'status' => 1,
            'site_page_id' => 1,
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
            'site_page_id' => 1,
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
        // PORTFOLIO AREA

        $portfolioContent = [
                    'title'           => 'Portfolio Area',
                    'slug'            => 'portfolio',
                    'default_content' => [
                        'portfolios' => json_encode(["1", "2", "3"]),
                    ],
                    'translations'   => [
                        'en' => [
                            'title'     => 'Our exclusive [Case] studies',
                            'description' => 'Our design services starts and ends with a best-in class experience strategy that builds to provide you with an informed response.',
                        ],
                        'hi' => [
                            'title'     => 'हमारे विशेष [केस] अध्ययन',
                            'description' => 'हमारी डिज़ाइन सेवाएँ एक सर्वश्रेष्ठ-क्लास अनुभव रणनीति के साथ शुरू और समाप्त होती हैं जो आपको एक सूचित प्रतिक्रिया प्रदान करती है।',
                        ],
                        'ar' => [
                            'title'=> 'دراسات الحالة [الحصرية] لدينا',
                            'description' => 'تبدأ خدمات التصميم لدينا وتنتهي باستراتيجية تجربة من الطراز العالمي تهدف إلى تزويدك باستجابة مستنيرة.',
                        ],
                    ],
                ];

        $portfolio = Section::create([
            'title' => $portfolioContent['title'],
            'slug' => $portfolioContent['slug'],
            'default_content' => $portfolioContent['default_content'],
            'status' => 1,
            'site_page_id' => 1,
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

        //////////////
        // TEAM AREA

        $teamContent = [
                    'title'           => 'Team Area',
                    'slug'            => 'team',
                    'default_content' => [
                        'teams' => json_encode(Team::active()->pluck('id')->take(4)->toArray()),
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle'     => 'Team member',
                            'title'     => 'Meet the \ [talented] team',
                            'btn_text' => 'All Team Members',
                        ],
                        'hi' => [
                            'subtitle'  => 'टीम सदस्य',
                            'title'     => 'हमारे [प्रतिभाशाली] टीम से मिलें',
                            'btn_text' => 'सभी टीम सदस्य',
                        ],
                        'ar' => [
                            'subtitle'     => 'أعضاء الفريق',
                            'title'     => 'تعرف على فريقنا [الموهوب]',
                            'btn_text' => 'جميع أعضاء الفريق',
                        ],
                    ],
                ];

        $team = Section::create([
            'title' => $teamContent['title'],
            'slug' => $teamContent['slug'],
            'default_content' => $teamContent['default_content'],
            'status' => 1,
            'site_page_id' => 1,
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
            'site_page_id' => 1,
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
        // TESTIMONIAL AREA

        $sourcePath = public_path('admin/img/files/home-main/testimonial');
        copyFilesToStorage($sourcePath, 'web');

        $testimonialContent = [
                    'title'           => 'Testimonial Area',
                    'slug'            => 'testimonial',
                    'default_content' => [
                        'video_thumbnail' => 'uploads/web/test-bg.jpg',
                        'bg_shape' => 'uploads/web/test-bg-shape.jpg',
                        'video_url' => 'https://www.youtube.com/watch?v=VCPGMjCW0is',
                        'testimonials' => json_encode(Testimonial::active()->pluck('id')->take(4)->toArray()),
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle'     => 'Testimonials',
                            'title'     => 'What our [clients say] \ about us',
                        ],
                        'hi' => [
                            'subtitle'  => 'साक्षात्कार',
                            'title'     => 'हमारे [ग्राहक] हमारे बारे में क्या \ कहते हैं',
                        ],
                        'ar' => [
                            'subtitle'     => 'الشهادات',
                            'title'     => 'ماذا \ يقول [عملاؤنا] عنا',
                        ],
                    ],
                ];

        $testimonial = Section::create([
            'title' => $testimonialContent['title'],
            'slug' => $testimonialContent['slug'],
            'default_content' => $testimonialContent['default_content'],
            'status' => 1,
            'site_page_id' => 1,
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
        // BLOG AREA

        $blogContent = [
                    'title'           => 'Blog Area',
                    'slug'            => 'blog',
                    'default_content' => [
                        'blogs' => json_encode(Blog::active()->pluck('id')->take(3)->toArray()),
                    ],
                    'translations'   => [
                        'en' => [
                            'title'     => 'The latest \ [industry] trends',
                            'btn_text' => 'Read All Posts',
                        ],
                        'hi' => [
                            'title'     => 'उद्योग [प्रवृत्तियों] की नवीनतम',
                            'btn_text' => 'सभी पोस्ट पढ़ें',
                        ],
                        'ar' => [
                            'title'     => 'أحدث \ [اتجاهات] الصناعة',
                            'btn_text' => 'قراءة جميع المقالات',
                        ],
                    ],
                ];

        $blog = Section::create([
            'title' => $blogContent['title'],
            'slug' => $blogContent['slug'],
            'default_content' => $blogContent['default_content'],
            'status' => 1,
            'site_page_id' => 1,
        ]);

        $blog->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $blogContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $blogContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $blogContent['translations']['ar'],
            ],
        ]);
    }
}
