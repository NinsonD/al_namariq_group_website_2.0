<?php

namespace Modules\Frontend\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Frontend\Models\Section;

class HomeShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       //////////////
        // HERO AREA
        $sourcePath = public_path('admin/img/files/shop/home');
        copyFilesToStorage($sourcePath, 'web');

        $content = [
                    'title'           => 'Hero Area',
                    'slug'            => 'hero',
                    'default_content' => [
                        'sliders' => json_encode([1,2,3]),
                    ],
                    'translations'   => [
                        'en' => [
                            'title'     => 'Zonspace',
                        ],
                        'hi' => [
                            'title'     => 'ज़ोनस्पेस',
                        ],
                        'ar' => [
                            'title'     => 'زونسبيس',
                        ],
                    ],
                ];

        $hero = Section::create([
            'title' => $content['title'],
            'slug' => $content['slug'],
            'default_content' => $content['default_content'],
            'status' => 1,
            'site_page_id' => 4,
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
        // Text Slider AREA
        $textSliderContent = [
            'title'           => 'Text Slider Area',
            'slug'            => 'text-slider',
            'default_content' => [],
            'translations'   => [
                'en' => [
                    'slider_content' => 'Free Shipping for all orders over $500, Free Shipping for all orders over $500, Free Shipping for all orders over $500, Free Shipping for all orders over $500, Free Shipping for all orders over $500, Free Shipping for all orders over $500, Free Shipping for all orders over $500, Free Shipping for all orders over $500, Free Shipping for all orders over $500, Free Shipping for all orders over $500',
                ],
                'hi' => [
                    'slider_content' => '500 डॉलर से अधिक के सभी आदेशों पर मुफ्त शिपिंग, 500 डॉलर से अधिक के सभी आदेशों पर मुफ्त शिपिंग, 500 डॉलर से अधिक के सभी आदेशों पर मुफ्त शिपिंग, 500 डॉलर से अधिक के सभी आदेशों पर मुफ्त शिपिंग, 500 डॉलर से अधिक के सभी आदेशों पर मुफ्त शिपिंग, 500 डॉलर से अधिक के सभी आदेशों पर मुफ्त शिपिंग, 500 डॉलर से अधिक के सभी आदेशों पर मुफ्त शिपिंग, 500 डॉलर से अधिक के सभी आदेशों पर मुफ्त शिपिंग, 500 डॉलर से अधिक के सभी आदेशों पर मुफ्त शिपिंग, 500 डॉलर से अधिक के सभी आदेशों पर मुफ्त शिपिंग',
                ],
                'ar' => [
                    'slider_content' => 'شحن مجاني لجميع الطلبات التي تزيد عن 500 دولار, شحن مجاني لجميع الطلبات التي تزيد عن 500 دولار, شحن مجاني لجميع الطلبات التي تزيد عن 500 دولار, شحن مجاني لجميع الطلبات التي تزيد عن 500 دولار, شحن مجاني لجميع الطلبات التي تزيد عن 500 دولار, شحن مجاني لجميع الطلبات التي تزيد عن 500 دولار, شحن مجاني لجميع الطلبات التي تزيد عن 500 دولار, شحن مجاني لجميع الطلبات التي تزيد عن 500 دولار, شحن مجاني لجميع الطلبات التي تزيد عن 500 دولار, شحن مجاني لجميع الطلبات التي تزيد عن 500 دولار',
                ],
            ],
        ];



        $textSlider = Section::create([
            'title' => $textSliderContent['title'],
            'slug' => $textSliderContent['slug'],
            'default_content' => $textSliderContent['default_content'],
            'status' => 1,
            'site_page_id' => 4,
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
        // Category AREA
        $categoryContent = [
            'title'           => 'Category Area',
            'slug'            => 'category',
            'default_content' => [
                'categories' => json_encode([2,3,4,5]),
                'big_category' => 1,
            ],
            'translations'   => [
                        'en' => [],
                        'hi' => [],
                        'ar' => [],
            ],
        ];

        $category = Section::create([
            'title' => $categoryContent['title'],
            'slug' => $categoryContent['slug'],
            'default_content' => $categoryContent['default_content'],
            'status' => 1,
            'site_page_id' => 4,
        ]);

        $category->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $categoryContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $categoryContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $categoryContent['translations']['ar'],
            ],
        ]);


       //////////////
        // Product Trending AREA
        $productTrendingContent = [
            'title'           => 'Product Trending Area',
            'slug'            => 'product-trending',
            'default_content' => [
                'products' => json_encode([1,2,3,4]),
            ],
            'translations'   => [
                    'en' => [
                        'subtitle' => '[Hot Deal]',
                        'title' => 'Trending This Season',
                    ],
                    'hi' => [
                        'subtitle' => '[हॉट डील]',
                        'title' => 'इस सीजन में ट्रेंडिंग',
                    ],
                    'ar' => [
                        'subtitle' => '[عرض ساخن]',
                        'title' => 'الرائجة هذا الموسم',
                    ],
            ],
        ];

        $productTrending = Section::create([
            'title' => $productTrendingContent['title'],
            'slug' => $productTrendingContent['slug'],
            'default_content' => $productTrendingContent['default_content'],
            'status' => 1,
            'site_page_id' => 4,
        ]);

        $productTrending->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $productTrendingContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $productTrendingContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $productTrendingContent['translations']['ar'],
            ],
        ]);


       //////////////
        // About AREA
        $aboutContent = [
            'title'           => 'About Area',
            'slug'            => 'about',
            'default_content' => [
                'image_1' => 'uploads/web/shop-about-img1.jpg',
                'image_2' => 'uploads/web/shop-about-img2.jpg',
                'image_3' => 'uploads/web/shop-about-img3.jpg',
                'image_4' => 'uploads/web/shop-about-img4.jpg',
                'image_5' => 'uploads/web/shop-about-img5.jpg',
                'image_6' => 'uploads/web/shop-about-img6.jpg',
                'shape' => 'uploads/web/shop-about-shape.jpg',
                'btn_url' => '#',
            ],
            'translations'   => [
                    'en' => [
                        'title' => 'Furniture inspired by our land & resources, clear lines that reflect a patient & mastered gesture.',
                        'btn_text' => 'More About Us',
                    ],
                    'hi' => [
                        'title' => 'हमारी भूमि और संसाधनों से प्रेरित फर्नीचर, स्पष्ट रेखाएं जो एक धैर्यवान और निपुण इशारे को दर्शाती हैं।',
                        'btn_text' => 'हमारे बारे में अधिक',
                    ],
                    'ar' => [
                        'title' => 'الأثاث المستوحى من أرضنا ومواردنا، خطوط واضحة تعكس إيماءة صبورة ومتقنة.',
                        'btn_text' => 'المزيد عنا',
                    ],
            ],
        ];

        $about = Section::create([
            'title' => $aboutContent['title'],
            'slug' => $aboutContent['slug'],
            'default_content' => $aboutContent['default_content'],
            'status' => 1,
            'site_page_id' => 4,
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
        // Products AREA
        $productsContent = [
            'title'           => 'Products Area',
            'slug'            => 'products',
            'default_content' => [
                'image' => 'uploads/web/shop-product-side-img.jpg',
                'products' => json_encode([1,2,3,4,5,6,7,8]),
            ],
            'translations'   => [
                    'en' => [],
                    'hi' => [],
                    'ar' => [],
            ],
        ];

        $products = Section::create([
            'title' => $productsContent['title'],
            'slug' => $productsContent['slug'],
            'default_content' => $productsContent['default_content'],
            'status' => 1,
            'site_page_id' => 4,
        ]);

        $products->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $productsContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $productsContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $productsContent['translations']['ar'],
            ],
        ]);

       //////////////
        // Showcase AREA
        $showcaseContent = [
            'title'           => 'Showcase Area',
            'slug'            => 'showcase',
            'default_content' => [
                'image_1' => 'uploads/web/shop-showcase-img1.jpg',
                'image_2' => 'uploads/web/shop-showcase-img2.jpg',
            ],
            'translations'   => [
                    'en' => [],
                    'hi' => [],
                    'ar' => [],
            ],
        ];

        $showcase = Section::create([
            'title' => $showcaseContent['title'],
            'slug' => $showcaseContent['slug'],
            'default_content' => $showcaseContent['default_content'],
            'status' => 1,
            'site_page_id' => 4,
        ]);

        $showcase->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $showcaseContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $showcaseContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $showcaseContent['translations']['ar'],
            ],
        ]);

       //////////////
        // Newsletter AREA
        $newsletterContent = [
            'title'           => 'Newsletter Area',
            'slug'            => 'newsletter',
            'default_content' => [
                'image_1' => 'uploads/web/shop-newsletter-img1.jpg',
                'image_2' => 'uploads/web/shop-newsletter-img2.jpg',
                'image_3' => 'uploads/web/shop-newsletter-img3.jpg',
                'image_4' => 'uploads/web/shop-newsletter-img4.jpg',
            ],
            'translations'   => [
                    'en' => [
                        'title' => 'NEWSLETTER',
                        'subtitle' => '-10% OFF YOUR 1ST ORDER',
                        'description' => 'Sign up for our newsletter to find out all about us, our news, our offers. We\'re not too chatty and we\'ll protect your email like the apple of our eye.',
                        'btn_text' => 'Subscribe',
                    ],
                    'hi' => [
                        'title' => 'न्यूज़लेटर',
                        'subtitle' => '-10% आपकी पहली ऑर्डर पर',
                        'description' => 'हमारे बारे में, हमारे समाचार, हमारे ऑफ़र के बारे में जानने के लिए हमारे न्यूज़लेटर के लिए साइन अप करें। हम बहुत बातूनी नहीं हैं और हम आपकी ईमेल की रक्षा अपनी आंख के सेब की तरह करेंगे।',
                        'btn_text' => 'सदस्यता लें',
                    ],
                    'ar' => [
                        'title' => 'النشرة الإخبارية',
                        'subtitle' => '-10% على طلبك الأول',
                        'description' => 'اشترك في نشرتنا الإخبارية لمعرفة كل شيء عنا، وأخبارنا، وعروضنا. نحن لسنا ثرثارة جدًا وسنحمي بريدك الإلكتروني مثل تفاحة عيننا.',
                        'btn_text' => 'الإشتراك',
                    ],
            ],
        ];

        $newsletter = Section::create([
            'title' => $newsletterContent['title'],
            'slug' => $newsletterContent['slug'],
            'default_content' => $newsletterContent['default_content'],
            'status' => 1,
            'site_page_id' => 4,
        ]);

        $newsletter->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $newsletterContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $newsletterContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $newsletterContent['translations']['ar'],
            ],
        ]);

       //////////////
        // Reviews AREA
        $reviewsContent = [
            'title'           => 'Reviews Area',
            'slug'            => 'reviews',
            'default_content' => [],
            'translations'   => [
                    'en' => [
                        'title' => 'CUSTOMER REVIEWS',
                    ],
                    'hi' => [
                        'title' => 'ग्राहक समीक्षा',
                    ],
                    'ar' => [
                        'title' => 'مراجعات العملاء',
                    ],
            ],
        ];

        $reviews = Section::create([
            'title' => $reviewsContent['title'],
            'slug' => $reviewsContent['slug'],
            'default_content' => $reviewsContent['default_content'],
            'status' => 1,
            'site_page_id' => 4,
        ]);

        $reviews->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $reviewsContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $reviewsContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $reviewsContent['translations']['ar'],
            ],
        ]);

       //////////////
        // Features AREA
        $featuresContent = [
            'title'           => 'Features Area',
            'slug'            => 'features',
            'default_content' => [
                'icon_1' => 'uploads/web/shop-features-icon1.png',
                'icon_2' => 'uploads/web/shop-features-icon2.png',
                'icon_3' => 'uploads/web/shop-features-icon3.png',
            ],
            'translations'   => [
                    'en' => [
                        'feature_title_1' => 'Fast & free shipping',
                        'feature_description_1' => 'Every single order ships for free. No minimums, no tiers, no fine print whatsoever.',
                        'feature_title_2' => 'Secure payment',
                        'feature_description_2' => 'We take your security seriously. Your payment information is never stored and is always encrypted during transfer.',
                        'feature_title_3' => 'Flexible & Easy Return',
                        'feature_description_3' => 'If you\'re not satisfied with your purchase, we offer hassle-free returns within 30 days.'
                    ],
                    'hi' => [
                        'feature_title_1' => 'तेज़ और मुफ्त शिपिंग',
                        'feature_description_1' => 'हर एक आदेश मुफ्त में जहाज। कोई न्यूनतम, कोई स्तर, कोई बारीक प्रिंट बिल्कुल नहीं।',
                        'feature_title_2' => 'सुरक्षित भुगतान',
                        'feature_description_2' => 'हम आपकी सुरक्षा को गंभीरता से लेते हैं। आपका भुगतान जानकारी कभी संग्रहीत नहीं है और हमेशा स्थानांतरण के दौरान एन्क्रिप्ट किया जाता है।',
                        'feature_title_3' => 'लचीला और आसान वापसी',
                        'feature_description_3' => 'यदि आप अपनी खरीद से संतुष्ट नहीं हैं, तो हम 30 दिनों के भीतर परेशानी मुक्त रिटर्न की पेशकश करते हैं।'
                    ],
                    'ar' => [
                        'feature_title_1' => 'شحن سريع ومجاني',
                        'feature_description_1' => 'كل طلب يشحن مجانًا. لا حد أدنى، لا مستويات، لا طباعة دقيقة على الإطلاق.',
                        'feature_title_2' => 'دفع آمن',
                        'feature_description_2' => 'نحن نأخذ أمانك على محمل الجد. معلومات الدفع الخاصة بك لا يتم تخزينها أبدًا ويتم دائمًا تشفيرها أثناء النقل.',
                        'feature_title_3' => 'إرجاع مرن وسهل',
                        'feature_description_3' => 'إذا لم تكن راضيًا عن عملية الشراء الخاصة بك، فإننا نقدم عمليات إرجاع خالية من المتاعب خلال 30 يومًا.'
                    ],
            ],
        ];

        $features = Section::create([
            'title' => $featuresContent['title'],
            'slug' => $featuresContent['slug'],
            'default_content' => $featuresContent['default_content'],
            'status' => 1,
            'site_page_id' => 4,
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
        // Instagram AREA
        $instagramContent = [
            'title'           => 'Instagram Area',
            'slug'            => 'instagram',
            'default_content' => [
                'instagrams' => json_encode([1,2,3,4,5,6,7]),
            ],
            'translations'   => [
                'en' => [
                    'title' => 'Shop Gram',
                    'subtitle' => 'Here’s some of our most popular products people are in love with.',
                ],
                'hi' => [
                    'title' => 'शॉप ग्राम',
                    'subtitle' => 'यहाँ हमारे कुछ सबसे लोकप्रिय उत्पाद हैं जिनसे लोग प्यार करते हैं।',
                ],
                'ar' => [
                    'title' => 'شوب غرام',
                    'subtitle' => 'إليك بعض من أكثر منتجاتنا شعبية التي يعشقها الناس.',
                ],
            ],
        ];

        $instagram = Section::create([
            'title' => $instagramContent['title'],
            'slug' => $instagramContent['slug'],
            'default_content' => $instagramContent['default_content'],
            'status' => 1,
            'site_page_id' => 4,
        ]);

        $instagram->translations()->createMany([
            [
                'locale' => 'en',
                'content' => $instagramContent['translations']['en'],
            ],
            [
                'locale' => 'hi',
                'content' => $instagramContent['translations']['hi'],
            ],
            [
                'locale' => 'ar',
                'content' => $instagramContent['translations']['ar'],
            ],
        ]);
    }
}
