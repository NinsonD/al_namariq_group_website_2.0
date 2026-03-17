<?php

namespace Modules\Frontend\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Frontend\Models\Section;

class HomeTwoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //////////////
        // HERO AREA
        $sourcePath = public_path('admin/img/files/home-two/hero');
        copyFilesToStorage($sourcePath, 'web');

        $content = [
                    'title'           => 'Hero Area',
                    'slug'            => 'hero',
                    'default_content' => [
                        'main_image' => 'uploads/web/h2-hero-thumb.png',
                        'thumb_shape' => 'uploads/web/h2-hero-thumb-shape.png',
                        'bg_shape' => 'uploads/web/h2-hero-bg-shape.png',
                        'title_shape_1' => 'uploads/web/h2-hero-title-shape1.png',
                        'title_shape_2' => 'uploads/web/h2-hero-title-shape2.png',
                        'btn_url' => '#',
                        'btn_url_2' => '#',
                    ],
                    'translations'   => [
                        'en' => [
                            'title'     => 'Reliable & [shape_1] \ Secure Managed \ [shape_2] IT Services.',
                            'subtitle' => 'Get Solid Solution',
                            'description' => 'Best solutions for big data & Technology services',
                            'btn_text' => 'Our All Services',
                            'btn_text_2' => 'Contact Us',
                        ],
                        'hi' => [
                            'title'     => 'विश्वसनीय & [shape_1] \ सुरक्षित प्रबंधित \ [shape_2] आईटी सेवाएँ।',
                            'subtitle' => 'ठोस समाधान प्राप्त करें',
                            'description' => 'बिग डेटा और प्रौद्योगिकी सेवाओं के लिए सर्वश्रेष्ठ समाधान',
                            'btn_text' => 'हमारी सभी सेवाएँ',
                            'btn_text_2' => 'हमसे संपर्क करें',
                        ],
                        'ar' => [
                            'title'     => 'خدمات تكنولوجيا المعلومات المدارة الموثوقة و [shape_1] \ الآمنة \ [shape_2].',
                            'subtitle' => 'احصل على حل قوي',
                            'description' => 'أفضل الحلول لبيانات كبيرة وخدمات التكنولوجيا',
                            'btn_text' => 'جميع خدماتنا',
                            'btn_text_2' => 'اتصل بنا',
                        ]
                    ],
                ];

        $hero = Section::create([
            'title' => $content['title'],
            'slug' => $content['slug'],
            'default_content' => $content['default_content'],
            'status' => 1,
            'site_page_id' => 2,
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
        // Step AREA
        $sourcePath = public_path('admin/img/files/home-two/step');
        copyFilesToStorage($sourcePath, 'web');

        $stepContent = [
                    'title'           => 'Step Area',
                    'slug'            => 'step',
                    'default_content' => [
                        'main_image' => 'uploads/web/h2-step-thumb.jpg',
                        'thumb_shape_1' => 'uploads/web/h2-step-shape1.jpg',
                        'thumb_shape_2' => 'uploads/web/h2-step-shape2.png',
                        'bg_shape_1' => 'uploads/web/h2-step-bg-shape1.png',
                        'bg_shape_2' => 'uploads/web/h2-step-bg-shape2.png',
                    ],
                    'translations'   => [
                        'en' => [
                            'title'     => 'Transforming IT, One Step at a Time',
                            'subtitle' => 'How We Work',
                            'description' => 'Every business is unique, and so are our solutions. Here\'s how we tailor \ our expertise to your needs',
                            'step_subtitle_1' => 'Step 1',
                            'step_title_1' => 'Discovery',
                            'step_description_1' => 'Leveraging our findings, we craft a comprehensive IT plan. This involves designing systems, networks, and software that align with your business goals.',
                            'step_subtitle_2' => 'Step 2',
                            'step_title_2' => 'Design & Planning',
                            'step_description_2' => 'We create a detailed blueprint for your IT infrastructure, including hardware, software, and network components. This ensures that your IT systems are efficient, scalable, and secure.',
                            'step_subtitle_3' => 'Step 3',
                            'step_title_3' => 'Implementation',
                            'step_description_3' => 'We execute the IT plan, deploying the necessary hardware, software, and network solutions. This phase involves configuring systems, installing software, and ensuring everything works seamlessly.',
                            'step_subtitle_4' => 'Step 4',
                            'step_title_4' => 'Support & Maintenance',
                            'step_description_4' => 'After implementation, we provide ongoing support and maintenance to ensure your IT systems run smoothly. This includes troubleshooting, updates, and enhancements as needed.',
                        ],
                        'hi' => [
                            'title'     => 'आईटी को एक कदम में बदलना',
                            'subtitle' => 'हम कैसे काम करते हैं',
                            'description' => 'हर व्यवसाय अद्वितीय है, और हमारी समाधान भी। यहाँ हम \ अपनी विशेषज्ञता को आपकी आवश्यकताओं के अनुसार कैसे अनुकूलित करते हैं',
                            'step_subtitle_1' => 'चरण 1',
                            'step_title_1' => 'खोज',
                            'step_description_1' => 'हमारी खोजों का लाभ उठाते हुए, हम एक व्यापक आईटी योजना तैयार करते हैं। इसमें सिस्टम, नेटवर्क और सॉफ्टवेयर का डिज़ाइन शामिल है जो आपके व्यवसाय के लक्ष्यों के अनुरूप है।',
                            'step_subtitle_2' => 'चरण 2',
                            'step_title_2' => 'डिज़ाइन और योजना',
                            'step_description_2' => 'हम आपकी आईटी अवसंरचना के लिए एक विस्तृत ब्लूप्रिंट बनाते हैं, जिसमें हार्डवेयर, सॉफ्टवेयर और नेटवर्क घटक शामिल होते हैं। यह सुनिश्चित करता है कि आपके आईटी सिस्टम कुशल, स्केलेबल और सुरक्षित हों।',
                            'step_subtitle_3' => 'चरण 3',
                            'step_title_3' => 'कार्यान्वयन',
                            'step_description_3' => 'हम आईटी योजना को लागू करते हैं, आवश्यक हार्डवेयर, सॉफ्टवेयर और नेटवर्क समाधान तैनात करते हैं। इस चरण में सिस्टम कॉन्फ़िगर करना, सॉफ़्टवेयर स्थापित करना और सुनिश्चित करना शामिल है कि सब कुछ सुचारू रूप से काम करे।',
                            'step_subtitle_4' => 'चरण 4',
                            'step_title_4' => 'समर्थन और रखरखाव',
                            'step_description_4' => 'कार्यान्वयन के बाद, हम आपके आईटी सिस्टम को सुचारू रूप से चलाने के लिए निरंतर समर्थन और रखरखाव प्रदान करते हैं। इसमें समस्या निवारण, अपडेट और आवश्यकतानुसार सुधार शामिल हैं।',
                        ],
                        'ar' => [
                            'title'     => 'تحويل تكنولوجيا المعلومات، خطوة بخطوة',
                            'subtitle' => 'كيف نعمل',
                            'description' => 'كل عمل فريد من نوعه، وكذلك حلولنا. إليك كيف نخصص \ خبرتنا لاحتياجاتك',
                            'step_subtitle_1' => 'الخطوة 1',
                            'step_title_1' => 'الاكتشاف',
                            'step_description_1' => 'من خلال نتائجنا، نقوم بإعداد خطة شاملة لتكنولوجيا المعلومات. يتضمن ذلك تصميم الأنظمة والشبكات والبرمجيات التي تتماشى مع أهداف عملك.',
                            'step_subtitle_2' => 'الخطوة 2',
                            'step_title_2' => 'التصميم والتخطيط',
                            'step_description_2' => 'نقوم بإنشاء مخطط تفصيلي لبنيتك التحتية لتكنولوجيا المعلومات، بما في ذلك الأجهزة والبرمجيات ومكونات الشبكة. يضمن ذلك أن أنظمة تكنولوجيا المعلومات الخاصة بك فعالة وقابلة للتوسع وآمنة.',
                            'step_subtitle_3' => 'الخطوة 3',
                            'step_title_3' => 'التنفيذ',
                            'step_description_3' => 'نقوم بتنفيذ خطة تكنولوجيا المعلومات، ونشر الحلول اللازمة من الأجهزة والبرمجيات والشبكات. تشمل هذه المرحلة تكوين الأنظمة وتثبيت البرمجيات والتأكد من أن كل شيء يعمل بسلاسة.',
                            'step_subtitle_4' => 'الخطوة 4',
                            'step_title_4' => 'الدعم والصيانة',
                            'step_description_4' => 'بعد التنفيذ، نقدم الدعم المستمر والصيانة لضمان تشغيل أنظمة تكنولوجيا المعلومات بسلاسة. يشمل ذلك استكشاف الأخطاء وإصلاحها والتحديثات والتحسينات حسب الحاجة.',
                        ]
                    ],
                ];

        $step = Section::create([
            'title' => $stepContent['title'],
            'slug' => $stepContent['slug'],
            'default_content' => $stepContent['default_content'],
            'status' => 1,
            'site_page_id' => 2,
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
        // BRAND AREA

        $brandContent = [
                    'title'           => 'Brand Area',
                    'slug'            => 'brand',
                    'default_content' => [
                        'brands' => json_encode(["7", "8", "9", "10", "11"]),
                    ],
                    'translations'   => [
                        'en' => [
                            'title' => 'Trusted by worldwide companies'
                        ],
                        'hi' => [
                            'title' => 'विश्वसनीय ब्रांड जो विश्वव्यापी कंपनियों द्वारा समर्थित है'
                        ],
                        'ar' => [
                            'title' => 'موثوق به من قبل الشركات العالمية',
                        ]
                    ],
                ];

        $brand = Section::create([
            'title' => $brandContent['title'],
            'slug' => $brandContent['slug'],
            'default_content' => $brandContent['default_content'],
            'status' => 1,
            'site_page_id' => 2,
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
        // SERVICES AREA
        $sourcePath = public_path('admin/img/files/home-two/services');
        copyFilesToStorage($sourcePath, 'web');

        $serviceContent = [
            'title'           => 'Services Area',
            'slug'            => 'services',
            'default_content' => [
                'services' => json_encode(["1", "2", "3", "4", "5"]),
                'bg_image' => 'uploads/web/h2-services-box.png',
                'shape' => 'uploads/web/h2-services-shape.png',
            ],
            'translations'   => [
                'en' => [
                    'subtitle' => 'Core Expertise',
                    'title' => 'Services',
                    'box_title' => 'Schedule a Call \ With a Client Success \ Expert Now.',
                    'btn_text' => 'Our All Services',
                ],
                'hi' => [
                    'subtitle' => 'हमारी विशेषज्ञता',
                    'title' => 'सेवाएँ',
                    'box_title' => 'एक ग्राहक सफलता \ विशेषज्ञ के साथ \ कॉल शेड्यूल करें।',
                    'btn_text' => 'हमारी सभी सेवाएँ',
                ],
                'ar' => [
                    'subtitle' => 'خبرتنا الأساسية',
                    'title' => 'الخدمات',
                    'box_title' => 'جدولة مكالمة \ مع خبير نجاح \ العملاء الآن.',
                    'btn_text' => 'جميع خدماتنا',
                ]
            ],
        ];

        $service = Section::create([
            'title' => $serviceContent['title'],
            'slug' => $serviceContent['slug'],
            'default_content' => $serviceContent['default_content'],
            'status' => 1,
            'site_page_id' => 2,
        ]);

        $service->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $serviceContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $serviceContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $serviceContent['translations']['ar'],
            ],
        ]);

        //////////////
        // ABOUT AREA
        $sourcePath = public_path('admin/img/files/home-two/about');
        copyFilesToStorage($sourcePath, 'web');
        $aboutContent = [
            'title'           => 'About Area',
            'slug'            => 'about',
            'default_content' => [
                'image_1' => 'uploads/web/h2-about1.jpg',
                'image_2' => 'uploads/web/h2-about2.jpg',
                'image_3' => 'uploads/web/h2-about3.jpg',
                'bg_shape_1' => 'uploads/web/h2-about-bg-shape1.png',
                'bg_shape_2' => 'uploads/web/h2-about-bg-shape2.png',
                'btn_url' => '#',
                'counter_number_1' => '15',
                'counter_number_2' => '61',
                'counter_unit_1' => '+',
                'counter_unit_2' => '+',
            ],
            'translations'   => [
                'en' => [
                    'subtitle' => 'Our company',
                    'title' => 'More About Our Success Stories',
                    'description' => 'That\'s why we\'re dedicated to providing innovative, reliable, and responsive IT solutions that keep your operations running smoothly and securely',
                    'btn_text' => 'More About Us',
                    'counter_title_1' => 'Years of \ Experience',
                    'counter_title_2' => 'Projects \ Worldwide',
                ],
                'hi' => [
                    'subtitle' => 'हमारी कंपनी',
                    'title' => 'हमारी सफलता की कहानियों के बारे में अधिक',
                    'description' => 'इसलिए हम आपके संचालन को सुचारू और सुरक्षित रखने के लिए नवीन, विश्वसनीय और उत्तरदायी आईटी समाधान प्रदान करने के लिए समर्पित हैं',
                    'btn_text' => 'हमारे बारे में अधिक',
                    'counter_title_1' => 'वर्षों का \ अनुभव',
                    'counter_title_2' => 'प्रोजेक्ट्स \ विश्वभर में',
                ],
                'ar' => [
                    'subtitle' => 'شركتنا',
                    'title' => 'المزيد عن قصص نجاحنا',
                    'description' => 'لذلك نحن ملتزمون بتقديم حلول تكنولوجيا المعلومات المبتكرة والموثوقة والاستجابة التي تحافظ على سير عملياتك بسلاسة وأمان',
                    'btn_text' => 'المزيد عنا',
                    'counter_title_1' => 'سنوات من \ الخبرة',
                    'counter_title_2' => 'مشاريع \ حول العالم',
                ]
            ],
        ];

        $about = Section::create([
            'title' => $aboutContent['title'],
            'slug' => $aboutContent['slug'],
            'default_content' => $aboutContent['default_content'],
            'status' => 1,
            'site_page_id' => 2,
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
        // PORTFOLIO AREA
        $portfolioContent = [
            'title'           => 'Portfolio Area',
            'slug'            => 'portfolio',
            'default_content' => [
                'portfolios' => json_encode(["1", "2", "3", "4", "5", "6"]),
            ],
            'translations'   => [
                'en' => [
                    'subtitle' => 'Proud projects that make us stand out',
                    'title' => 'Case Studies',
                ],
                'hi' => [
                    'subtitle' => 'हमारे गर्व के प्रोजेक्ट जो हमें अलग बनाते हैं',
                    'title' => 'केस स्टडीज',
                ],
                'ar' => [
                    'subtitle' => 'المشاريع التي نفخر بها والتي تجعلنا نبرز',
                    'title' => 'دراسات الحالة',
                ]
            ],
        ];

        $portfolio = Section::create([
            'title' => $portfolioContent['title'],
            'slug' => $portfolioContent['slug'],
            'default_content' => $portfolioContent['default_content'],
            'status' => 1,
            'site_page_id' => 2,
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
        // TEXT SLIDER AREA
        $textSliderContent = [
                    'title'           => 'Text Slider Area',
                    'slug'            => 'text-slider',
                    'default_content' => [],
                    'translations'   => [
                        'en' => [
                            'slider_content_1' => 'Website Development, Cyber Security, Cloud Service, Networking Security, Data Analytics, IT Consultation, DSA Solutions',
                            'slider_content_2' => 'Website Development, Cyber Security, Cloud Service, Networking Security, Data Analytics, IT Consultation, DSA Solutions',

                        ],
                        'hi' => [
                            'slider_content_1' => 'आईटी परामर्श, आईटी सेवाएँ, आईटी समाधान, आईटी समर्थन, आईटी प्रबंधन, आईटी परामर्श, आईटी रणनीति',
                            'slider_content_2' => 'आईटी परामर्श, आईटी सेवाएँ, आईटी समाधान, आईटी समर्थन, आईटी प्रबंधन, आईटी परामर्श, आईटी रणनीति',
                        ],
                        'ar' => [
                            'slider_content_1' => 'استشارة تكنولوجيا المعلومات، خدمات تكنولوجيا المعلومات، حلول تكنولوجيا المعلومات، دعم تكنولوجيا المعلومات، إدارة تكنولوجيا المعلومات، استشارات تكنولوجيا المعلومات، استراتيجية تكنولوجيا المعلومات',
                            'slider_content_2' => 'استشارة تكنولوجيا المعلومات، خدمات تكنولوجيا المعلومات، حلول تكنولوجيا المعلومات، دعم تكنولوجيا المعلومات، إدارة تكنولوجيا المعلومات، استشارات تكنولوجيا المعلومات، استراتيجية تكنولوجيا المعلومات',
                        ],
                    ],
                ];

        $textSlider = Section::create([
            'title' => $textSliderContent['title'],
            'slug' => $textSliderContent['slug'],
            'default_content' => $textSliderContent['default_content'],
            'status' => 1,
            'site_page_id' => 2,
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
        // TESTIMONIAL AREA

        $testimonialContent = [
                    'title'           => 'Testimonial Area',
                    'slug'            => 'testimonial',
                    'default_content' => [
                        'testimonials' => json_encode(["1", "2", "3", "4", "5", "6"]),
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle'     => 'Feedbacks',
                            'title'     => 'Trusted by the World\'s Fastest Growing Companies.',
                        ],
                        'hi' => [
                            'subtitle'     => 'साक्षात्कार',
                            'title'     => 'हमें विश्व की सबसे तेजी से बढ़ती कंपनियों द्वारा विश्वसनीय माना जाता है।',
                        ],
                        'ar' => [
                            'subtitle'     => 'الشهادات',
                            'title'     => 'ماذا يقول عملاؤنا عنا؟',
                        ]
                    ],
                ];

        $testimonial = Section::create([
            'title' => $testimonialContent['title'],
            'slug' => $testimonialContent['slug'],
            'default_content' => $testimonialContent['default_content'],
            'status' => 1,
            'site_page_id' => 2,
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
        // APP BRAND AREA
        $sourcePath = public_path('admin/img/files/home-two/app-brand');
        copyFilesToStorage($sourcePath, 'web');

        $appBrandContent = [
                    'title'           => 'App Brand Area',
                    'slug'            => 'app-brand',
                    'default_content' => [
                        'image_1' => 'uploads/web/h2-app-brand1.png',
                        'image_2' => 'uploads/web/h2-app-brand2.png',
                        'image_3' => 'uploads/web/h2-app-brand3.png',
                    ],
                    'translations'   => [
                        'en' => [
                            'title_1'     => 'Project management - {285% Growth} ',
                            'title_2'     => 'Customer support - {200% Growth} ',
                            'title_3'     => 'Sales - {150% Growth} ',
                        ],
                        'hi' => [
                            'title_1'     => 'प्रोजेक्ट प्रबंधन - {285% वृद्धि} ',
                            'title_2'     => 'ग्राहक समर्थन - {200% वृद्धि} ',
                            'title_3'     => 'बिक्री - {150% वृद्धि} ',
                        ],
                        'ar' => [
                            'title_1'     => 'إدارة المشاريع - {285% نمو} ',
                            'title_2'     => 'دعم العملاء - {200% نمو} ',
                            'title_3'     => 'المبيعات - {150% نمو} ',
                        ]
                    ],
                ];

        $appBrand = Section::create([
            'title' => $appBrandContent['title'],
            'slug' => $appBrandContent['slug'],
            'default_content' => $appBrandContent['default_content'],
            'status' => 1,
            'site_page_id' => 2,
        ]);

        $appBrand->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $appBrandContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $appBrandContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $appBrandContent['translations']['ar'],
            ],
        ]);

        //////////////
        // Benefit AREA
        $sourcePath = public_path('admin/img/files/home-two/benefit');
        copyFilesToStorage($sourcePath, 'web');

        $benefitContent = [
                    'title'           => 'Benefit Area',
                    'slug'            => 'benefit',
                    'default_content' => [
                        'icon_1' => 'uploads/web/h2-benefit1.png',
                        'icon_2' => 'uploads/web/h2-benefit2.png',
                        'icon_3' => 'uploads/web/h2-benefit3.png',
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle'     => 'Benefits',
                            'title'     => 'Delivering more Than Just Solutions',
                            'benefit_title_1'     => 'Grow your business',
                            'benefit_description_1' => 'We believe in challenges and so we have made challenges.',
                            'benefit_title_2'     => 'Cost savings ideas',
                            'benefit_description_2' => 'Our solutions are designed to meet the needs of your customers.',
                            'benefit_title_3'     => 'Boost performance',
                            'benefit_description_3' => 'We provide the tools you need to succeed in sales.'
                        ],
                        'hi' => [
                            'subtitle'     => 'लाभ',
                            'title'     => 'सिर्फ समाधान से अधिक प्रदान करना',
                            'benefit_title_1'     => 'अपने व्यवसाय को बढ़ाएं',
                            'benefit_description_1' => 'हम चुनौतियों में विश्वास करते हैं और इसलिए हमने चुनौतियाँ बनाई हैं।',
                            'benefit_title_2'     => 'लागत बचत विचार',
                            'benefit_description_2' => 'हमारे समाधान आपके ग्राहकों की आवश्यकताओं को पूरा करने के लिए डिज़ाइन किए गए हैं।',
                            'benefit_title_3'     => 'प्रदर्शन बढ़ाएं',
                            'benefit_description_3' => 'हम बिक्री में सफल होने के लिए आवश्यक उपकरण प्रदान करते हैं।'
                        ],
                        'ar' => [
                            'subtitle'     => 'المزايا',
                            'title'     => 'تقديم أكثر من مجرد حلول',
                            'benefit_title_1'     => 'تنمية أعمالك',
                            'benefit_description_1' => 'نحن نؤمن بالتحديات ولذلك قمنا بإنشاء تحديات.',
                            'benefit_title_2'     => 'أفكار توفير التكاليف',
                            'benefit_description_2' => 'تم تصميم حلولنا لتلبية احتياجات عملائك.',
                            'benefit_title_3'     => 'تعزيز الأداء',
                            'benefit_description_3' => 'نحن نقدم الأدوات التي تحتاجها للنجاح في المبيعات.'
                        ]
                    ],
                ];

        $benefit = Section::create([
            'title' => $benefitContent['title'],
            'slug' => $benefitContent['slug'],
            'default_content' => $benefitContent['default_content'],
            'status' => 1,
            'site_page_id' => 2,
        ]);

        $benefit->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $benefitContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $benefitContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $benefitContent['translations']['ar'],
            ],
        ]);
        //////////////
        // FAQ AREA
        $sourcePath = public_path('admin/img/files/home-two/faq');
        copyFilesToStorage($sourcePath, 'web');

        $faqContent = [
                    'title'           => 'FAQ Area',
                    'slug'            => 'faq',
                    'default_content' => [
                        'image' => 'uploads/web/h2-faq-thumb.png',
                        'shape' => 'uploads/web/h2-faq-shape.png',
                        'faqs' => json_encode(["1", "2", "3", "4", "5"]),
                    ],
                    'translations'   => [
                        'en' => [
                            'subtitle'     => 'FAQ',
                            'title' => 'Got Any \ Questions?',
                        ],
                        'hi' => [
                            'subtitle'     => 'सामान्य प्रश्न',
                            'title' => 'क्या आपके पास कोई \ प्रश्न है?',
                        ],
                        'ar' => [
                            'subtitle'     => 'الأسئلة الشائعة',
                            'title' => 'هل لديك أي \ أسئلة؟',
                        ]
                    ],
                ];

        $faq = Section::create([
            'title' => $faqContent['title'],
            'slug' => $faqContent['slug'],
            'default_content' => $faqContent['default_content'],
            'status' => 1,
            'site_page_id' => 2,
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
    }
}
