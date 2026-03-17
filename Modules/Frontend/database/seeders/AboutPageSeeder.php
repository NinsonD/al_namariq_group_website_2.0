<?php

namespace Modules\Frontend\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Frontend\Models\Section;
use Modules\Frontend\Models\SitePage;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aboutPageID = SitePage::where('slug', 'about')->first()->id;


        //////////////
        // HERO AREA
        $sourcePath = public_path('admin/img/files/about');
        copyFilesToStorage($sourcePath, 'web');

        $content = [
                    'title'           => 'Hero Area',
                    'slug'            => 'hero',
                    'default_content' => [
                        'image' => 'uploads/web/about-page-hero.jpg',
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle'     => 'About Us',
                            'title'     => 'Fueling Minds (shape) \ Inspiring Designs',
                            'description' => 'An independent web design and branding agency \ in Manchester set up in 2012 who care, build relationships, \ have industry experience, and win awards.',
                            'slider_text' => 'about us, about us, about us, about us',
                        ],
                        'hi' => [
                            'subtitle'     => 'हमारे बारे में',
                            'title'     => 'मस्तिष्क को ईंधन देना (आकार) \ प्रेरणादायक डिज़ाइन',
                            'description' => 'मैनचेस्टर में स्थापित एक स्वतंत्र वेब डिज़ाइन और ब्रांडिंग एजेंसी जो देखभाल करती है, संबंध बनाती है, \ उद्योग का अनुभव रखती है, और पुरस्कार जीतती है।',
                            'slider_text' => 'हमारे बारे में, हमारे बारे में, हमारे बारे में, हमारे बारे में',
                        ],
                        'ar' => [
                            'subtitle'     => 'معلومات عنا',
                            'title'     => 'تغذية العقول (شكل) \ تصميمات ملهمة',
                            'description' => 'وكالة تصميم مواقع إلكترونية وبناء علامة تجارية مستقلة تأسست في مانشستر في عام 2012 تهتم ببناء العلاقات ، \ لديها خبرة في الصناعة ، وتفوز بالجوائز.',
                            'slider_text' => 'معلومات عنا، معلومات عنا، معلومات عنا، معلومات عنا',
                        ],
                    ],
                ];

        $hero = Section::create([
            'title' => $content['title'],
            'slug' => $content['slug'],
            'default_content' => $content['default_content'],
            'status' => 1,
            'site_page_id' => $aboutPageID,
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
        $sourcePath = public_path('admin/img/files/about');
        copyFilesToStorage($sourcePath, 'web');

        $aboutContent = [
                    'title'           => 'About Area',
                    'slug'            => 'about',
                    'default_content' => [
                        'image' => 'uploads/web/about-page-about.jpg',
                        'shape' => 'uploads/web/about-page-shape.png',
                        'people_image' => 'uploads/web/about-page-people.png',
                        'counter_number_1' => 98,
                        'counter_number_2' => 25,
                        'counter_unit_1' => '%',
                        'counter_unit_2' => '+',
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle'     => 'WHO WE ARE',
                            'title'     => 'An independent web design and branding agency in Manchester set up in 2010 who care, build relationships, have industry experience, and win awards.',
                            'description' => 'Driven by a passion for innovation, we specialize in \ delivering top-quality design solutions',
                            'counter_title_1' => 'Clients Satisfied and \ Repeating',
                            'counter_title_2' => 'Projects Completed \ in 24 Countries',
                        ],
                        'hi' => [
                            'subtitle'     => 'हम कौन हैं',
                            'title'     => 'मैनचेस्टर में स्थापित एक स्वतंत्र वेब डिज़ाइन और ब्रांडिंग एजेंसी जो देखभाल करती है, संबंध बनाती है, \ उद्योग का अनुभव रखती है, और पुरस्कार जीतती है।',
                            'description' => 'नवाचार के प्रति जुनून से प्रेरित, हम \ उच्च गुणवत्ता वाले डिज़ाइन समाधान प्रदान करने में विशेषज्ञता रखते हैं',
                            'counter_title_1' => 'संतुष्ट ग्राहक और \ दोहराना',
                            'counter_title_2' => '24 देशों में पूर्ण परियोजनाएँ',
                        ],
                        'ar' => [
                            'subtitle'     => 'من نحن',
                            'title'     => 'وكالة تصميم مواقع إلكترونية وبناء علامة تجارية مستقلة تأسست في مانشستر في عام 2010 تهتم ببناء العلاقات ، \ لديها خبرة في الصناعة ، وتفوز بالجوائز.',
                            'description' => 'مدفوعة بشغف الابتكار ، نحن متخصصون في \ تقديم حلول تصميم عالية الجودة',
                            'counter_title_1' => 'العملاء راضون و \ يتكررون',
                            'counter_title_2' => 'المشاريع المكتملة \ في 24 دولة',
                        ],

                    ],
                ];

        $about = Section::create([
            'title' => $aboutContent['title'],
            'slug' => $aboutContent['slug'],
            'default_content' => $aboutContent['default_content'],
            'status' => 1,
            'site_page_id' => $aboutPageID,
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
        // SERVICES AREA
        $servicesContent = [
                    'title'           => 'Services Area',
                    'slug'            => 'services',
                    'default_content' => [
                        'services' => json_encode(["1", "2", "3"]),
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle'     => 'Our Services',
                            'title'     => 'How we take your \ business to the next level',
                            'description' => 'We are a digital marketing agency with expertise, and we\'re on a mission to help you take the next step in your business.',
                        ],
                        'hi' => [
                            'subtitle'     => 'हमारी सेवाएँ',
                            'title'     => 'हम आपके \ व्यवसाय को अगले स्तर पर कैसे ले जाते हैं',
                            'description' => 'हम एक डिजिटल मार्केटिंग एजेंसी हैं जिसमें विशेषज्ञता है, और हम आपके व्यवसाय में अगला कदम उठाने में मदद करने के लिए मिशन पर हैं।',
                        ],
                        'ar' => [
                            'subtitle'     => 'خدماتنا',
                            'title'     => 'كيف نأخذ عملك إلى المستوى التالي',
                            'description' => 'نحن وكالة تسويق رقمي ذات خبرة ، ونحن في مهمة لمساعدتك في اتخاذ الخطوة التالية في عملك.',
                        ],
                    ],
                ];

        $services = Section::create([
            'title' => $servicesContent['title'],
            'slug' => $servicesContent['slug'],
            'default_content' => $servicesContent['default_content'],
            'status' => 1,
            'site_page_id' => $aboutPageID,
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
        // STEP AREA
        $stepContent = [
                    'title'           => 'Step Area',
                    'slug'            => 'step',
                    'default_content' => [],
                    'translations'   => [
                        'en' => [
                            'title'     => 'Our design thinking process',
                            'subtitle' => 'How We Work',
                            'step_title_1' => 'User Research',
                            'step_description_1' => 'We listen stories of user to understand pain points and give a rough estimate about cost and time-frame.',
                            'step_title_2' => 'Wireframe',
                            'step_description_2' => 'We create a wireframe to visualize the user journey and identify potential issues before development begins.',
                            'step_title_3' => 'Design',
                            'step_description_3' => 'We design the user interface and user experience, ensuring it is intuitive and user-friendly.',
                            'step_title_4' => 'Development',
                            'step_description_4' => 'We develop the product, ensuring it is functional, scalable, and meets the requirements of the user.',
                        ],
                        'hi' => [
                            'title'     => 'आईटी को एक कदम में बदलना',
                            'subtitle' => 'हम कैसे काम करते हैं',
                            'step_title_1' => 'उपयोगकर्ता अनुसंधान',
                            'step_description_1' => 'हम उपयोगकर्ता की कहानियों को सुनते हैं ताकि दर्द बिंदुओं को समझ सकें और लागत और समय-सीमा के बारे में एक मोटे अनुमान दे सकें।',
                            'step_title_2' => 'वायरफ़्रेम',
                            'step_description_2' => 'हम उपयोगकर्ता यात्रा को दृश्य बनाने और विकास शुरू होने से पहले संभावित मुद्दों की पहचान करने के लिए एक वायरफ़्रेम बनाते हैं।',
                            'step_title_3' => 'डिज़ाइन',
                            'step_description_3' => 'हम उपयोगकर्ता इंटरफ़ेस और उपयोगकर्ता अनुभव को डिज़ाइन करते हैं, यह सुनिश्चित करते हुए कि यह सहज और उपयोगकर्ता के अनुकूल है।',
                            'step_title_4' => 'विकास',
                            'step_description_4' => 'हम उत्पाद का विकास करते हैं, यह सुनिश्चित करते हुए कि यह कार्यात्मक, स्केलेबल है, और उपयोगकर्ता की आवश्यकताओं को पूरा करता है।',
                        ],
                        'ar' => [
                            'title'     => 'تحويل تكنولوجيا المعلومات ، خطوة بخطوة',
                            'subtitle' => 'كيف نعمل',
                            'step_title_1' => 'بحث المستخدم',
                            'step_description_1' => 'نستمع إلى قصص المستخدم لفهم نقاط الألم وتقديم تقدير تقريبي للتكلفة والإطار الزمني.',
                            'step_title_2' => 'إطار سلكي',
                            'step_description_2' => 'نقوم بإنشاء إطار سلكي لتصور رحلة المستخدم وتحديد المشكلات المحتملة قبل بدء التطوير.',
                            'step_title_3' => 'تصميم',
                            'step_description_3' => 'نقوم بتصميم واجهة المستخدم وتجربة المستخدم ، مع التأكد من أنها بديهية وسهلة الاستخدام.',
                            'step_title_4' => 'تطوير',
                            'step_description_4' => 'نقوم بتطوير المنتج ، مع التأكد من أنه وظيفي وقابل للتوسع ويلبي متطلبات المستخدم.',
                        ],
                    ],
                ];

        $step = Section::create([
            'title' => $stepContent['title'],
            'slug' => $stepContent['slug'],
            'default_content' => $stepContent['default_content'],
            'status' => 1,
            'site_page_id' => $aboutPageID,
        ]);

        $step->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $stepContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $stepContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $stepContent['translations']['ar'],
            ],
        ]);

        //////////////
        // TEAM AREA
        $teamContent = [
            'title'           => 'Our Team',
            'slug'            => 'team',
            'default_content' => [
                'teams' => json_encode(["4", "5", "6", "7", "8", "9", "10"]),
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
            'site_page_id' => $aboutPageID,
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
