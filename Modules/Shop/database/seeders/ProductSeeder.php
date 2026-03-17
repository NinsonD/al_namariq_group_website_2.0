<?php

namespace Modules\Shop\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Modules\Shop\Models\Product;
use Modules\Shop\Models\ProductCategory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryIds = ProductCategory::pluck("id")->toArray();

        $tagGroups = [
            // 'Furniture' group
            [
                ['value' => 'Sofa'],
                ['value' => 'Chair'],
                ['value' => 'Table'],
            ],
            // 'Office' group
            [
                ['value' => 'Branding'],
                ['value' => 'Logo Design'],
                ['value' => 'Business Card'],
            ],
            // 'Sofas' group
            [
                ['value' => 'Leather Sofa'],
                ['value' => 'Fabric Sofa'],
                ['value' => 'Recliner Sofa'],
            ],
            // 'Beds' group
            [
                ['value' => 'King Size Bed'],
                ['value' => 'Queen Size Bed'],
                ['value' => 'Single Bed'],
            ],
            // 'Dining Tables' group
            [
                ['value' => 'Round Dining Table'],
                ['value' => 'Rectangular Dining Table'],
                ['value' => 'Extendable Dining Table'],
            ],
            // 'Chairs' group
            [
                ['value' => 'Office Chair'],
                ['value' => 'Dining Chair'],
                ['value' => 'Recliner Chair'],
            ],
            // 'Desks' group
            [
                ['value' => 'Writing Desk'],
                ['value' => 'Computer Desk'],
                ['value' => 'Standing Desk'],
            ],
            // 'Cabinets' group
            [
                ['value' => 'Wooden Cabinet'],
                ['value' => 'Metal Cabinet'],
                ['value' => 'Glass Cabinet'],
            ],
            // 'Lighting' group
            [
                ['value' => 'Table Lamp'],
                ['value' => 'Floor Lamp'],
                ['value' => 'Pendant Light'],
            ],
            // 'Decor' group
            [
                ['value' => 'Wall Art'],
                ['value' => 'Vase'],
                ['value' => 'Cushion'],
            ],
            // 'Accessories' group
            [
                ['value' => 'Throw Blanket'],
                ['value' => 'Curtains'],
                ['value' => 'Rug'],
            ],
        ];

        $sourcePath = public_path('admin/img/files/shop/product');
        copyFilesToStorage($sourcePath, 'products');

        $add_info = [
            'en' => [
                        [
                            "key" => "Brand",
                            "value" => "Comfort Pointe "
                        ],
                        [
                            "key" => "Color",
                            "value" => "red"
                        ],
                        [
                            "key" => "Product Dimensions",
                            "value" => "34\"D x 30\"W x 42.5\"H"
                        ],
                        [
                            "key" => "Finish Type",
                            "value" => "Matte"
                        ],
                        [
                            "key" => "Product Care Instructions",
                            "value" => "Wipe Clean"
                        ],
                        [
                            "key" => "Arm Style",
                            "value" => "Contoured"
                        ],
                        [
                            "key" => "Surface Recommendation",
                            "value" => "Hard Floor"
                        ],
                        [
                            "key" => "Furniture base movement",
                            "value" => "Rock"
                        ],
                        [
                            "key" => "Item Weight",
                            "value" => "59 Pounds"
                        ]
                    ],
            'ar' => [
                        [
                            "key" => "العلامة التجارية",
                            "value" => "Comfort Pointe "
                        ],
                        [
                            "key" => "اللون",
                            "value" => "red"
                        ],
                        [
                            "key" => "أبعاد المنتج",
                            "value" => "34\"D x 30\"W x 42.5\"H"
                        ],
                        [
                            "key" => "نوع التشطيب",
                            "value" => "Matte"
                        ],
                        [
                            "key" => "إرشادات العناية بالمنتج",
                            "value" => "Wipe Clean"
                        ],
                        [
                            "key" => "نمط الذراع",
                            "value" => "Contoured"
                        ],
                        [
                            "key" => "سطح التوصية",
                            "value" => "Hard Floor"
                        ],
                        [
                            "key" => "حركة قاعدة الأثاث",
                            "value" => "Rock"
                        ],
                        [
                            "key" => "وزن المنتج",
                            "value" => "59 Pounds"
                        ]
                    ],
            'hi' => [
                        [
                            "key" => "ब्रांड",
                            "value" => "Comfort Pointe "
                        ],
                        [
                            "key" => "रंग",
                            "value" => "red"
                        ],
                        [
                            "key" => "उत्पाद आयाम",
                            "value" => "34\"D x 30\"W x 42.5\"H"
                        ],
                        [
                            "key" => "फ़िनिश प्रकार",
                            "value" => "Matte"
                        ],
                        [
                            "key" => "उत्पाद देखभाल निर्देश",
                            "value" => "Wipe Clean"
                        ],
                        [
                            "key" => "आर्म स्टाइल",
                            "value" => "Contoured"
                        ],
                        [
                            "key" => "सतह अनुशंसा",
                            "value" => "Hard Floor"
                        ],
                        [
                            "key" => "फ़र्नीचर बेस मूवमेंट",
                            "value" => "Rock"
                        ],
                        [
                            "key" => "वस्तु का वजन",
                            "value" => "59 Pounds"
                        ]
                    ]
                ];



        $products = [
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-1.jpg',
                'gallery' => [],
                'slug' => 'elegant-sofa',
                'qty' => 10,
                'price' => 100.00,
                'sale_price' => 80.00,
                'sku' => 'SKU-001',
                'is_new' => true,
                'is_popular' => false,
                'views' => 0,
                'tags' => json_encode($tagGroups[0]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Elegant Sofa',
                        'description' => 'A comfortable and stylish sofa for your living room.',
                        'short_description' => 'Elegant Sofa - Perfect for your living room.',
                        'seo_title' => 'Elegant Sofa - Stylish Living Room Furniture',
                        'seo_description' => 'Discover our Elegant Sofa, designed for comfort and style. Perfect for your living room. Available now at an affordable price.',
                        'additional_information' => $add_info['en']

                    ],
                    'hi' => [
                        'title' => 'शानदार सोफा',
                        'description' => 'आपके लिविंग रूम के लिए एक आरामदायक और स्टाइलिश सोफा।',
                        'short_description' => 'शानदार सोफा - आपके लिविंग रूम के लिए परफेक्ट।',
                        'seo_title' => 'शानदार सोफा - स्टाइलिश लिविंग रूम फर्नीचर',
                        'seo_description' => 'हमारा शानदार सोफा खोजें, जो आराम और शैली के लिए डिज़ाइन किया गया है। आपके लिविंग रूम के लिए परफेक्ट। अब किफायती मूल्य पर उपलब्ध।',
                        'additional_information' => $add_info['hi']

                    ],
                    'ar' => [
                        'title'=> 'أريكة أنيقة',
                        'description' => 'أريكة مريحة وأنيقة لغرفة المعيشة الخاصة بك.',
                        'short_description' => 'أريكة أنيقة - مثالية لغرفة المعيشة الخاصة بك.',
                        'seo_title' => 'أريكة أنيقة - أثاث غرفة معيشة أنيق',
                        'seo_description' => 'اكتشف أريكتنا الأنيقة، المصممة للراحة والأناقة. مثالية لغرفة المعيشة الخاصة بك. متوفرة الآن بسعر معقول.',
                        'additional_information' => $add_info['ar']
                    ]
                ]
            ],
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-2.jpg',
                'gallery' => [],
                'slug' => 'modern-office-chair',
                'qty' => 5,
                'price' => 150.00,
                'sale_price' => null,
                'sku' => 'SKU-002',
                'is_new' => false,
                'is_popular' => true,
                'views' => 0,
                'tags' => json_encode($tagGroups[1]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Modern Office Chair',
                        'description' => 'An ergonomic office chair designed for comfort and productivity.',
                        'short_description' => 'Modern Office Chair - Ergonomic and Stylish.',
                        'seo_title' => 'Modern Office Chair - Ergonomic Design for Comfort',
                        'seo_description' => 'Upgrade your workspace with our Modern Office Chair, designed for comfort and productivity. Perfect for long hours at the desk.',
                        'additional_information' => $add_info['en']

                    ],
                    'hi' => [
                        'title' => 'आधुनिक ऑफिस चेयर',
                        'description' => 'आराम और उत्पादकता के लिए डिज़ाइन किया गया एक एर्गोनोमिक ऑफिस चेयर।',
                        'short_description' => 'आधुनिक ऑफिस चेयर - एर्गोनोमिक और स्टाइलिश।',
                        'seo_title' => 'आधुनिक ऑफिस चेयर - आराम के लिए एर्गोनोमिक डिज़ाइन',
                        'seo_description' => 'हमारे आधुनिक ऑफिस चेयर के साथ अपने कार्यक्षेत्र को अपग्रेड करें, जो आराम और उत्पादकता के लिए डिज़ाइन किया गया है। डेस्क पर लंबे समय तक काम करने के लिए परफेक्ट।',
                        'additional_information' => $add_info['hi']
                    ],
                    'ar' => [
                        'title' => 'كرسي مكتب عصري',
                        'description' => 'كرسي مكتب مريح مصمم للراحة والإنتاجية.',
                        'short_description' => 'كرسي مكتب عصري - مريح وأنيق.',
                        'seo_title' => 'كرسي مكتب عصري - تصميم مريح للراحة',
                        'seo_description' => 'قم بترقية مساحة عملك مع كرسي المكتب العصري، المصمم للراحة والإنتاجية. مثالي لساعات طويلة على المكتب.',
                        'additional_information' => $add_info['ar']
                    ]
                ]
            ],
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-3.jpg',
                'gallery' => [],
                'slug' => 'glass-coffee-table',
                'qty' => 12,
                'price' => 95.00,
                'sale_price' => 85.00,
                'sku' => 'SKU-003',
                'is_new' => false,
                'is_popular' => false,
                'views' => 0,
                'tags' => json_encode($tagGroups[2]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Glass Coffee Table',
                        'description' => 'A stylish glass-top coffee table perfect for modern living rooms.',
                        'short_description' => 'Elegant glass coffee table.',
                        'seo_title' => 'Stylish Glass Coffee Table for Living Room',
                        'seo_description' => 'Add elegance to your space with our glass coffee table. Sleek and functional.',
                        'additional_information' => $add_info['en']
                    ],
                    'hi' => [
                        'title' => 'ग्लास कॉफी टेबल',
                        'description' => 'आधुनिक लिविंग रूम के लिए एक स्टाइलिश ग्लास-टॉप कॉफी टेबल।',
                        'short_description' => 'आकर्षक ग्लास कॉफी टेबल।',
                        'seo_title' => 'लिविंग रूम के लिए स्टाइलिश ग्लास कॉफी टेबल',
                        'seo_description' => 'ग्लास टेबल से अपने स्पेस को दें एक नया लुक। सुरुचिपूर्ण और मजबूत।',
                        'additional_information' => $add_info['hi']
                    ],
                    'ar' => [
                        'title' => 'طاولة قهوة زجاجية',
                        'description' => 'طاولة قهوة بزجاج أنيق مثالية لغرف المعيشة العصرية.',
                        'short_description' => 'طاولة قهوة زجاجية أنيقة.',
                        'seo_title' => 'طاولة قهوة زجاجية أنيقة لغرفة المعيشة',
                        'seo_description' => 'أضف لمسة أنيقة لمساحتك بطاولتنا الزجاجية. أنيقة وعملية.',
                        'additional_information' => $add_info['ar']
                    ],
                ],
            ],
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-4.jpg',
                'gallery' => [],
                'slug' => 'leather-sofa-3-seater',
                'qty' => 3,
                'price' => 950.00,
                'sale_price' => 899.00,
                'sku' => 'SKU-004',
                'is_new' => true,
                'is_popular' => true,
                'views' => 0,
                'tags' => json_encode($tagGroups[3]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Leather Sofa - 3 Seater',
                        'description' => 'Premium leather sofa with cushioned support and elegant design.',
                        'short_description' => 'Luxury 3-seater leather sofa.',
                        'seo_title' => 'Premium Leather Sofa - 3 Seater Comfort',
                        'seo_description' => 'Relax in style with our 3-seater leather sofa. Durable, elegant, and comfortable.',
                        'additional_information' => $add_info['en']
                    ],
                    'hi' => [
                        'title' => 'लेदर सोफा - 3 सीटर',
                        'description' => 'आरामदायक कुशनिंग और आकर्षक डिज़ाइन के साथ प्रीमियम लेदर सोफा।',
                        'short_description' => 'लक्ज़री 3 सीटर लेदर सोफा।',
                        'seo_title' => 'प्रीमियम लेदर सोफा - 3 सीटर कम्फर्ट',
                        'seo_description' => 'आराम और स्टाइल का संगम - 3 सीटर लेदर सोफा। टिकाऊ और आरामदायक।',
                        'additional_information' => $add_info['hi']
                    ],
                    'ar' => [
                        'title' => 'أريكة جلدية - 3 مقاعد',
                        'description' => 'أريكة جلدية فاخرة بدعم مبطن وتصميم أنيق.',
                        'short_description' => 'أريكة جلدية فاخرة بثلاثة مقاعد.',
                        'seo_title' => 'أريكة جلدية فاخرة - راحة بثلاثة مقاعد',
                        'seo_description' => 'استرخِ بأناقة مع أريكتنا الجلدية. متينة وأنيقة ومريحة.',
                        'additional_information' => $add_info['ar']
                    ],
                ],
            ],
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-5.jpg',
                'gallery' => [],
                'slug' => 'bunk-bed-metal-frame',
                'qty' => 4,
                'price' => 370.00,
                'sale_price' => 349.00,
                'sku' => 'SKU-005',
                'is_new' => false,
                'is_popular' => true,
                'views' => 0,
                'tags' => json_encode($tagGroups[4]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Bunk Bed with Metal Frame',
                        'description' => 'Durable bunk bed with a sturdy metal frame, perfect for kids and dorms.',
                        'short_description' => 'Sturdy metal bunk bed.',
                        'seo_title' => 'Durable Metal Bunk Bed for Kids & Dorms',
                        'seo_description' => 'Maximize sleeping space with our metal frame bunk bed. Safe, strong, and space-saving.',
                        'additional_information' => $add_info['en']
                    ],
                    'hi' => [
                        'title' => 'मेटल फ्रेम बंक बेड',
                        'description' => 'मजबूत मेटल फ्रेम वाला टिकाऊ बंक बेड, बच्चों और हॉस्टल के लिए परफेक्ट।',
                        'short_description' => 'मजबूत मेटल बंक बेड।',
                        'seo_title' => 'बच्चों और हॉस्टल के लिए टिकाऊ मेटल बंक बेड',
                        'seo_description' => 'मेटल फ्रेम बंक बेड के साथ अपनी जगह को अधिकतम करें। सुरक्षित, मजबूत और जगह बचाने वाला।',
                        'additional_information' => $add_info['hi']
                    ],
                    'ar' => [
                        'title' => 'سرير بطابقين بإطار معدني',
                        'description' => 'سرير بطابقين متين بإطار معدني قوي، مثالي للأطفال والسكنات.',
                        'short_description' => 'سرير بطابقين معدني قوي.',
                        'seo_title' => 'سرير بطابقين معدني متين للأطفال والسكنات',
                        'seo_description' => 'استفد من المساحة بأقصى قدر ممكن مع سريرنا المعدني بطابقين. آمن وقوي ويوفر المساحة.',
                        'additional_information' => $add_info['ar']
                    ],
                ],
            ],
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-6.jpg',
                'gallery' => [],
                'slug' => 'recliner-armchair',
                'qty' => 6,
                'price' => 310.00,
                'sale_price' => 280.00,
                'sku' => 'SKU-006',
                'is_new' => true,
                'is_popular' => true,
                'views' => 0,
                'tags' => json_encode($tagGroups[0]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Recliner Armchair',
                        'description' => 'Comfortable recliner armchair with plush cushioning and reclining function.',
                        'short_description' => 'Comfort recliner for your living space.',
                        'seo_title' => 'Luxury Recliner Armchair for Relaxation',
                        'seo_description' => 'Sink into comfort with our recliner armchair. Ideal for your living or reading room.',
                        'additional_information' => $add_info['en']
                    ],
                    'hi' => [
                        'title' => 'रीक्लाइनर आर्मचेयर',
                        'description' => 'आरामदायक रीक्लाइनर चेयर जिसमें नरम कुशनिंग और रीक्लाइनिंग फ़ंक्शन है।',
                        'short_description' => 'आपके लिविंग स्पेस के लिए आरामदायक रीक्लाइनर।',
                        'seo_title' => 'आराम के लिए लक्ज़री रीक्लाइनर आर्मचेयर',
                        'seo_description' => 'हमारे रीक्लाइनर आर्मचेयर के साथ आराम में डूब जाएं। पढ़ने या आराम करने के लिए आदर्श।',
                        'additional_information' => $add_info['hi']
                    ],
                    'ar' => [
                        'title' => 'كرسي استرخاء بذراعين',
                        'description' => 'كرسي مريح مع توسيد فاخر ووظيفة الاستلقاء.',
                        'short_description' => 'كرسي استرخاء مريح لمساحة المعيشة.',
                        'seo_title' => 'كرسي استرخاء فاخر للراحة',
                        'seo_description' => 'استمتع بالراحة مع كرسي الاسترخاء لدينا. مثالي لغرفة المعيشة أو القراءة.',
                        'additional_information' => $add_info['ar']
                    ],
                ],
            ],
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-7.jpg',
                'gallery' => [],
                'slug' => 'bookshelf-ladder-style',
                'qty' => 10,
                'price' => 130.00,
                'sale_price' => null,
                'sku' => 'SKU-007',
                'is_new' => false,
                'is_popular' => false,
                'views' => 0,
                'tags' => json_encode($tagGroups[1]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Ladder Style Bookshelf',
                        'description' => 'A space-saving ladder-style bookshelf perfect for books, plants, and decor.',
                        'short_description' => 'Stylish ladder bookshelf for compact spaces.',
                        'seo_title' => 'Modern Ladder Bookshelf for Small Rooms',
                        'seo_description' => 'Organize and decorate with this sleek ladder-style bookshelf. Great for apartments.',
                        'additional_information' => $add_info['en']
                    ],
                    'hi' => [
                        'title' => 'लैडर स्टाइल बुकशेल्फ',
                        'description' => 'बुक्स, प्लांट्स और डेकोर के लिए एक जगह बचाने वाला लैडर स्टाइल बुकशेल्फ।',
                        'short_description' => 'कॉम्पैक्ट स्पेस के लिए स्टाइलिश बुकशेल्फ।',
                        'seo_title' => 'छोटे कमरों के लिए मॉडर्न लैडर बुकशेल्फ',
                        'seo_description' => 'अपने अपार्टमेंट को व्यवस्थित और सजाएं इस स्टाइलिश बुकशेल्फ के साथ।',
                        'additional_information' => $add_info['hi']
                    ],
                    'ar' => [
                        'title' => 'رف كتب بنمط السلم',
                        'description' => 'رف كتب موفر للمساحة بنمط السلم مثالي للكتب والنباتات والديكور.',
                        'short_description' => 'رف كتب عصري للمساحات الصغيرة.',
                        'seo_title' => 'رف كتب عصري بنمط السلم للغرف الصغيرة',
                        'seo_description' => 'نظم وزين مساحتك بهذا الرف الأنيق. مثالي للشقق الصغيرة.',
                        'additional_information' => $add_info['ar']
                    ],
                ],
            ],
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-8.jpg',
                'gallery' => [],
                'slug' => 'dining-table-set-4-seater',
                'qty' => 2,
                'price' => 560.00,
                'sale_price' => 499.00,
                'sku' => 'SKU-008',
                'is_new' => true,
                'is_popular' => false,
                'views' => 0,
                'tags' => json_encode($tagGroups[2]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => '4-Seater Dining Table Set',
                        'description' => 'Elegant dining table set with 4 chairs, perfect for family meals.',
                        'short_description' => 'Dining table set for 4 people.',
                        'seo_title' => 'Elegant 4-Seater Dining Table with Chairs',
                        'seo_description' => 'Upgrade your dining area with our stylish 4-seater dining table set.',
                        'additional_information' => $add_info['en']
                    ],
                    'hi' => [
                        'title' => '4 सीटर डाइनिंग टेबल सेट',
                        'description' => '4 कुर्सियों के साथ एक सुरुचिपूर्ण डाइनिंग टेबल सेट, पारिवारिक भोजन के लिए आदर्श।',
                        'short_description' => '4 लोगों के लिए डाइनिंग टेबल सेट।',
                        'seo_title' => '4 कुर्सियों वाला एलीगेंट डाइनिंग टेबल सेट',
                        'seo_description' => 'हमारे स्टाइलिश डाइनिंग टेबल सेट से अपने डाइनिंग क्षेत्र को अपग्रेड करें।',
                        'additional_information' => $add_info['hi']
                    ],
                    'ar' => [
                        'title' => 'طقم طاولة طعام لأربعة أشخاص',
                        'description' => 'طقم طاولة طعام أنيق مع 4 كراسي، مثالي للعائلات.',
                        'short_description' => 'طاولة طعام لأربعة أشخاص.',
                        'seo_title' => 'طاولة طعام أنيقة لأربعة مع كراسي',
                        'seo_description' => 'قم بترقية منطقة الطعام بطقم الطاولة الأنيق لدينا لأربعة أشخاص.',
                        'additional_information' => $add_info['ar']
                    ],
                ],
            ],
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-9.jpg',
                'gallery' => [],
                'slug' => 'folding-study-table',
                'qty' => 15,
                'price' => 75.00,
                'sale_price' => null,
                'sku' => 'SKU-009',
                'is_new' => false,
                'is_popular' => true,
                'views' => 0,
                'tags' => json_encode($tagGroups[3]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Folding Study Table',
                        'description' => 'A lightweight and portable study table that folds flat for easy storage.',
                        'short_description' => 'Compact folding study desk.',
                        'seo_title' => 'Portable Folding Study Table for Students',
                        'seo_description' => 'Perfect for limited spaces. A foldable table ideal for studying and working from home.',
                        'additional_information' => $add_info['en']
                    ],
                    'hi' => [
                        'title' => 'फोल्डिंग स्टडी टेबल',
                        'description' => 'एक हल्की और पोर्टेबल स्टडी टेबल जो आसानी से फोल्ड हो जाती है।',
                        'short_description' => 'कॉम्पैक्ट फोल्डिंग स्टडी डेस्क।',
                        'seo_title' => 'छात्रों के लिए पोर्टेबल फोल्डिंग स्टडी टेबल',
                        'seo_description' => 'छोटी जगहों के लिए परफेक्ट। पढ़ाई और घर से काम करने के लिए आदर्श टेबल।',
                        'additional_information' => $add_info['hi']
                    ],
                    'ar' => [
                        'title' => 'طاولة دراسة قابلة للطي',
                        'description' => 'طاولة دراسة خفيفة الوزن ومحمولة تطوى بسهولة للتخزين.',
                        'short_description' => 'مكتب دراسة قابل للطي وصغير الحجم.',
                        'seo_title' => 'طاولة دراسة قابلة للطي للطلاب',
                        'seo_description' => 'مثالية للمساحات المحدودة. طاولة قابلة للطي مثالية للدراسة والعمل من المنزل.',
                        'additional_information' => $add_info['ar']
                    ],
                ],
            ],
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-10.jpg',
                'gallery' => [],
                'slug' => 'shoe-rack-5-tier',
                'qty' => 20,
                'price' => 60.00,
                'sale_price' => 55.00,
                'sku' => 'SKU-010',
                'is_new' => false,
                'is_popular' => false,
                'views' => 0,
                'tags' => json_encode($tagGroups[4]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => '5-Tier Shoe Rack',
                        'description' => 'Organize your footwear with this 5-tier metal shoe rack. Ideal for homes and dorms.',
                        'short_description' => 'Space-saving 5-layer shoe rack.',
                        'seo_title' => 'Durable 5-Tier Shoe Rack Organizer',
                        'seo_description' => 'Keep your shoes neat and tidy with our compact shoe rack design.',
                        'additional_information' => $add_info['en']
                    ],
                    'hi' => [
                        'title' => '5-लेयर शू रैक',
                        'description' => 'अपने जूते व्यवस्थित रखें इस 5-लेयर मेटल शू रैक के साथ। घर और हॉस्टल के लिए आदर्श।',
                        'short_description' => 'जगह बचाने वाला शू रैक।',
                        'seo_title' => 'टिकाऊ 5-लेयर शू रैक आयोजक',
                        'seo_description' => 'हमारे कॉम्पैक्ट डिज़ाइन के साथ अपने जूतों को व्यवस्थित और साफ-सुथरा रखें।',
                        'additional_information' => $add_info['hi']
                    ],
                    'ar' => [
                        'title' => 'رف أحذية من 5 طبقات',
                        'description' => 'نظم أحذيتك بهذا الرف المعدني المكون من 5 طبقات. مثالي للمنازل والسكنات.',
                        'short_description' => 'رف أحذية من 5 طبقات موفر للمساحة.',
                        'seo_title' => 'منظم رف أحذية متين 5 طبقات',
                        'seo_description' => 'حافظ على أحذيتك منظمة ومرتبة مع رف الأحذية المدمج لدينا.',
                        'additional_information' => $add_info['ar']
                    ],
                ],
            ],
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-11.jpg',
                'gallery' => [],
                'slug' => 'tv-stand-with-storage',
                'qty' => 6,
                'price' => 220.00,
                'sale_price' => 199.00,
                'sku' => 'SKU-011',
                'is_new' => true,
                'is_popular' => true,
                'views' => 0,
                'tags' => json_encode($tagGroups[0]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => 'TV Stand with Storage',
                        'description' => 'A sleek wooden TV stand with shelves and cabinets for organized media setup.',
                        'short_description' => 'Modern TV unit with ample storage.',
                        'seo_title' => 'Wooden TV Stand with Shelves and Cabinets',
                        'seo_description' => 'Keep your entertainment setup tidy with this stylish TV stand with storage.',
                        'additional_information' => $add_info['en']
                    ],
                    'hi' => [
                        'title' => 'स्टोरेज के साथ टीवी स्टैंड',
                        'description' => 'शेल्फ और कैबिनेट्स वाला एक स्टाइलिश लकड़ी का टीवी स्टैंड, जो आपके मीडिया सेटअप को व्यवस्थित रखता है।',
                        'short_description' => 'आधुनिक टीवी यूनिट भरपूर स्टोरेज के साथ।',
                        'seo_title' => 'शेल्फ और कैबिनेट्स वाला लकड़ी का टीवी स्टैंड',
                        'seo_description' => 'अपने एंटरटेनमेंट सेटअप को स्टाइलिश टीवी स्टैंड के साथ व्यवस्थित रखें।',
                        'additional_information' => $add_info['hi']
                    ],
                    'ar' => [
                        'title' => 'طاولة تلفاز مع تخزين',
                        'description' => 'طاولة تلفاز أنيقة من الخشب مزودة بأرفف وخزائن لتنظيم وسائل الإعلام.',
                        'short_description' => 'وحدة تلفاز عصرية بمساحة تخزين كافية.',
                        'seo_title' => 'طاولة تلفاز خشبية مع أرفف وخزائن',
                        'seo_description' => 'حافظ على تنظيم معدات الترفيه مع طاولة التلفاز الأنيقة هذه المزودة بتخزين.',
                        'additional_information' => $add_info['ar']
                    ],
                ],
            ],
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-12.jpg',
                'gallery' => [],
                'slug' => 'kids-plastic-study-chair',
                'qty' => 20,
                'price' => 35.00,
                'sale_price' => null,
                'sku' => 'SKU-012',
                'is_new' => false,
                'is_popular' => false,
                'views' => 0,
                'tags' => json_encode($tagGroups[1]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Kids Plastic Study Chair',
                        'description' => 'Colorful plastic chair for kids, lightweight and safe for daily use.',
                        'short_description' => 'Bright and durable kids chair.',
                        'seo_title' => 'Colorful Plastic Study Chair for Kids',
                        'seo_description' => 'Perfect for kids’ study rooms – lightweight, durable, and safe.',
                        'additional_information' => $add_info['en']
                    ],
                    'hi' => [
                        'title' => 'बच्चों की प्लास्टिक स्टडी चेयर',
                        'description' => 'बच्चों के लिए हल्की और रंगीन प्लास्टिक चेयर, रोजमर्रा के उपयोग के लिए सुरक्षित।',
                        'short_description' => 'चमकदार और टिकाऊ बच्चों की चेयर।',
                        'seo_title' => 'बच्चों के लिए रंगीन प्लास्टिक स्टडी चेयर',
                        'seo_description' => 'बच्चों के स्टडी रूम के लिए परफेक्ट – हल्की, टिकाऊ और सुरक्षित।',
                        'additional_information' => $add_info['hi']
                    ],
                    'ar' => [
                        'title' => 'كرسي دراسة بلاستيكي للأطفال',
                        'description' => 'كرسي بلاستيكي ملون للأطفال، خفيف وآمن للاستخدام اليومي.',
                        'short_description' => 'كرسي أطفال مشرق ومتين.',
                        'seo_title' => 'كرسي دراسة بلاستيكي ملون للأطفال',
                        'seo_description' => 'مثالي لغرف دراسة الأطفال – خفيف الوزن ومتين وآمن.',
                        'additional_information' => $add_info['ar']
                    ],
                ],
            ],
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-13.jpg',
                'gallery' => [
                    'uploads/products/product-13-1.jpg',
                    'uploads/products/product-13-2.jpg',
                    'uploads/products/product-13-3.jpg',
                    'uploads/products/product-13-4.jpg',
                    'uploads/products/product-13-5.jpg',
                ],
                'slug' => 'ottoman-storage-bench',
                'qty' => 7,
                'price' => 120.00,
                'sale_price' => 105.00,
                'sku' => 'SKU-013',
                'is_new' => true,
                'is_popular' => false,
                'views' => 0,
                'tags' => json_encode($tagGroups[2]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Ottoman Storage Bench',
                        'description' => 'Multifunctional bench with hidden storage and cushioned seat.',
                        'short_description' => 'Stylish bench with storage space.',
                        'seo_title' => 'Storage Ottoman Bench for Bedroom or Hallway',
                        'seo_description' => 'Elegant ottoman bench perfect for storing blankets, shoes, or toys.',
                        'additional_information' => $add_info['en']
                    ],
                    'hi' => [
                        'title' => 'स्टोरेज ओटोमन बेंच',
                        'description' => 'छिपे हुए स्टोरेज और कुशन वाली सीट के साथ मल्टीफंक्शनल बेंच।',
                        'short_description' => 'स्टोरेज के साथ स्टाइलिश बेंच।',
                        'seo_title' => 'बैडरूम या हॉलवे के लिए स्टोरेज ओटोमन बेंच',
                        'seo_description' => 'कम्फर्ट और स्टोरेज – रजाई, जूते या खिलौनों के लिए परफेक्ट।',
                        'additional_information' => $add_info['hi']
                    ],
                    'ar' => [
                        'title' => 'مقعد تخزين عثماني',
                        'description' => 'مقعد متعدد الوظائف مع تخزين مخفي ومقعد مبطن.',
                        'short_description' => 'مقعد أنيق بمساحة تخزين.',
                        'seo_title' => 'مقعد عثماني مع تخزين لغرفة النوم أو الممر',
                        'seo_description' => 'مقعد مثالي لتخزين البطانيات أو الأحذية أو الألعاب.',
                        'additional_information' => $add_info['ar']
                    ],
                ],
            ],
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-14.jpg',
                'gallery' => [
                    'uploads/products/product-14-2.jpg',
                    'uploads/products/product-14-3.jpg',
                    'uploads/products/product-14-4.jpg',
                ],
                'slug' => 'wall-mounted-bookshelf',
                'qty' => 9,
                'price' => 65.00,
                'sale_price' => 59.00,
                'sku' => 'SKU-014',
                'is_new' => false,
                'is_popular' => true,
                'views' => 0,
                'tags' => json_encode($tagGroups[3]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Wall Mounted Bookshelf',
                        'description' => 'Space-saving bookshelf mounted on the wall with a geometric design.',
                        'short_description' => 'Modern wall bookshelf.',
                        'seo_title' => 'Wall Mounted Bookshelf for Stylish Storage',
                        'seo_description' => 'Decorate your wall and organize your books with this floating shelf.',
                        'additional_information' => $add_info['en']
                    ],
                    'hi' => [
                        'title' => 'वॉल माउंटेड बुकशेल्फ',
                        'description' => 'जगह बचाने वाला बुकशेल्फ जो दीवार पर लगाया जाता है, ज्यामितीय डिज़ाइन के साथ।',
                        'short_description' => 'आधुनिक वॉल बुकशेल्फ।',
                        'seo_title' => 'स्टाइलिश स्टोरेज के लिए वॉल माउंटेड बुकशेल्फ',
                        'seo_description' => 'दीवार को सजाएं और किताबें व्यवस्थित रखें इस फ्लोटिंग शेल्फ के साथ।',
                        'additional_information' => $add_info['hi']
                    ],
                    'ar' => [
                        'title' => 'رف كتب جداري',
                        'description' => 'رف كتب موفر للمساحة مثبت على الحائط بتصميم هندسي.',
                        'short_description' => 'رف كتب جداري عصري.',
                        'seo_title' => 'رف كتب جداري للتخزين الأنيق',
                        'seo_description' => 'زين الحائط ونظم كتبك مع هذا الرف العائم.',
                        'additional_information' => $add_info['ar']
                    ],
                ],
            ],
            [
                'user_id' => 1,
                'product_category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'uploads/products/product-15.jpg',
                'gallery' => [
                    'uploads/products/product-15-2.jpg',
                    'uploads/products/product-15-3.jpg',
                    'uploads/products/product-15-4.jpg',
                    'uploads/products/product-15-5.jpg',
                    'uploads/products/product-15-6.jpg',
                    'uploads/products/product-15-7.jpg',
                    'uploads/products/product-15-8.jpg',
                ],
                'slug' => 'bedside-table-drawer',
                'qty' => 10,
                'price' => 85.00,
                'sale_price' => 79.00,
                'sku' => 'SKU-015',
                'is_new' => true,
                'is_popular' => false,
                'views' => 0,
                'tags' => json_encode($tagGroups[4]),
                'status' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Bedside Table with Drawer',
                        'description' => 'Compact bedside table with a single drawer and open shelf.',
                        'short_description' => 'Minimalist nightstand with storage.',
                        'seo_title' => 'Modern Bedside Table with Drawer and Shelf',
                        'seo_description' => 'Keep your essentials within reach with this compact and stylish nightstand.',
                        'additional_information' => $add_info['en']
                    ],
                    'hi' => [
                        'title' => 'ड्रॉअर के साथ बेडसाइड टेबल',
                        'description' => 'एक ड्रॉअर और ओपन शेल्फ के साथ कॉम्पैक्ट बेडसाइड टेबल।',
                        'short_description' => 'स्टोरेज वाला मिनिमलिस्ट नाइटस्टैंड।',
                        'seo_title' => 'ड्रॉअर और शेल्फ वाला मॉडर्न बेडसाइड टेबल',
                        'seo_description' => 'अपने जरूरी सामान पास रखें इस स्टाइलिश नाइटस्टैंड के साथ।',
                        'additional_information' => $add_info['hi']
                    ],
                    'ar' => [
                        'title' => 'طاولة جانبية بسرير مع درج',
                        'description' => 'طاولة جانبية صغيرة مع درج واحد ورف مفتوح.',
                        'short_description' => 'طاولة نوم بسيطة مع تخزين.',
                        'seo_title' => 'طاولة جانبية عصرية مع درج ورف',
                        'seo_description' => 'احتفظ بأغراضك الأساسية في متناول اليد مع هذه الطاولة الجانبية المدمجة والأنيقة.',
                        'additional_information' => $add_info['ar']
                    ],
                ],
            ],
            [
            'user_id' => 1,
            'product_category_id' => $categoryIds[array_rand($categoryIds)],
            'image' => 'uploads/products/product-16.jpg',
            'gallery' => [
                'uploads/products/product-16-2.jpg',
                'uploads/products/product-16-3.jpg',
                'uploads/products/product-16-4.jpg',
                'uploads/products/product-16-5.jpg',
                'uploads/products/product-16-6.jpg',
                'uploads/products/product-16-7.jpg',
            ],
            'slug' => 'elegant-bed-frame',
            'qty' => 7,
            'price' => 550.00,
            'sale_price' => 500.00,
            'sku' => 'SKU-016',
            'is_new' => true,
            'is_popular' => false,
            'views' => 0,
            'tags' => json_encode($tagGroups[2]),
            'status' => true,
            'translations' => [
                'en' => [
                    'title' => 'Elegant Bed Frame',
                    'description' => 'A beautifully crafted bed frame for luxurious sleeping experience.',
                    'short_description' => 'Stylish and sturdy bed frame.',
                    'seo_title' => 'Elegant Bed Frame - Premium Design',
                    'seo_description' => 'Elevate your bedroom style with this elegant and durable bed frame.',
                    'additional_information' => $add_info['en']
                ],
                'hi' => [
                    'title' => 'एलीगेंट बेड फ्रेम',
                    'description' => 'लक्जरी नींद के अनुभव के लिए खूबसूरती से तैयार किया गया बेड फ्रेम।',
                    'short_description' => 'स्टाइलिश और मजबूत बेड फ्रेम।',
                    'seo_title' => 'एलीगेंट बेड फ्रेम - प्रीमियम डिज़ाइन',
                    'seo_description' => 'इस एलीगेंट और टिकाऊ बेड फ्रेम के साथ अपने बेडरूम की शैली को बढ़ाएँ।',
                    'additional_information' => $add_info['hi']
                ],
                'ar' => [
                    'title' => 'إطار سرير أنيق',
                    'description' => 'إطار سرير مصمم بأناقة لتجربة نوم فاخرة.',
                    'short_description' => 'إطار سرير أنيق وقوي.',
                    'seo_title' => 'إطار سرير أنيق - تصميم فاخر',
                    'seo_description' => 'ارتق بغرفة نومك مع إطار السرير الأنيق والمتين هذا.',
                    'additional_information' => $add_info['ar']
                ],
            ]
        ],
        [
            'user_id' => 1,
            'product_category_id' => $categoryIds[array_rand($categoryIds)],
            'image' => 'uploads/products/product-17.jpg',
            'gallery' => [
                'uploads/products/product-17-2.jpg',
                'uploads/products/product-17-3.jpg',
                'uploads/products/product-17-4.jpg',
                'uploads/products/product-17-5.jpg',
            ],
            'slug' => 'folding-dining-table',
            'qty' => 9,
            'price' => 300.00,
            'sale_price' => 270.00,
            'sku' => 'SKU-017',
            'is_new' => false,
            'is_popular' => true,
            'views' => 0,
            'tags' => json_encode($tagGroups[0]),
            'status' => true,
            'translations' => [
                'en' => [
                    'title' => 'Folding Dining Table',
                    'description' => 'A compact and space-saving dining solution.',
                    'short_description' => 'Foldable and convenient dining table.',
                    'seo_title' => 'Folding Dining Table - Space Saver',
                    'seo_description' => 'Perfect for small apartments, this folding dining table is practical and elegant.',
                    'additional_information' => $add_info['en']
                ],
                'hi' => [
                    'title' => 'फोल्डिंग डाइनिंग टेबल',
                    'description' => 'एक कॉम्पैक्ट और जगह बचाने वाला डाइनिंग समाधान।',
                    'short_description' => 'फोल्डेबल और सुविधाजनक डाइनिंग टेबल।',
                    'seo_title' => 'फोल्डिंग डाइनिंग टेबल - जगह बचाएं',
                    'seo_description' => 'छोटे अपार्टमेंट के लिए परफेक्ट, यह फोल्डिंग टेबल व्यावहारिक और स्टाइलिश है।',
                    'additional_information' => $add_info['hi']
                ],
                'ar' => [
                    'title' => 'طاولة طعام قابلة للطي',
                    'description' => 'حل مدمج لتناول الطعام يوفر المساحة.',
                    'short_description' => 'طاولة طعام قابلة للطي ومريحة.',
                    'seo_title' => 'طاولة طعام قابلة للطي - موفرة للمساحة',
                    'seo_description' => 'مثالية للشقق الصغيرة، هذه الطاولة القابلة للطي عملية وأنيقة.',
                    'additional_information' => $add_info['ar']
                ],
            ]
        ],
        [
            'user_id' => 1,
            'product_category_id' => $categoryIds[array_rand($categoryIds)],
            'image' => 'uploads/products/product-18.jpg',
            'gallery' => [
                'uploads/products/product-18-2.jpg',
                'uploads/products/product-18-3.jpg',
                'uploads/products/product-18-4.jpg',
                'uploads/products/product-18-5.jpg',
                'uploads/products/product-18-6.jpg',
                'uploads/products/product-18-7.jpg',
            ],
            'slug' => 'kitchen-storage-rack',
            'qty' => 15,
            'price' => 60.00,
            'sale_price' => null,
            'sku' => 'SKU-018',
            'is_new' => false,
            'is_popular' => false,
            'views' => 0,
            'tags' => json_encode($tagGroups[3]),
            'status' => true,
            'translations' => [
                'en' => [
                    'title' => 'Kitchen Storage Rack',
                    'description' => 'Multi-layer rack for organizing kitchen essentials.',
                    'short_description' => 'Durable and practical kitchen storage rack.',
                    'seo_title' => 'Kitchen Storage Rack - Multi-Tier Organizer',
                    'seo_description' => 'Keep your kitchen tidy with this multi-tier metal rack for all essentials.',
                    'additional_information' => $add_info['en']
                ],
                'hi' => [
                    'title' => 'किचन स्टोरेज रैक',
                    'description' => 'किचन की वस्तुओं को व्यवस्थित करने के लिए मल्टी-लेयर रैक।',
                    'short_description' => 'टिकाऊ और व्यावहारिक किचन स्टोरेज रैक।',
                    'seo_title' => 'किचन स्टोरेज रैक - मल्टी-टियर आयोजक',
                    'seo_description' => 'इस मल्टी-टियर मेटल रैक से अपने किचन को व्यवस्थित रखें।',
                    'additional_information' =>
                        [
                            'material' => 'स्टील',
                            'dimensions' => '40x30x90 सेमी',
                            'color' => 'सफेद',
                            'features' => 'जंग प्रतिरोधी, 4-टियर',
                        ]
                ],
                'ar' => [
                    'title' => 'رف تخزين المطبخ',
                    'description' => 'رف متعدد الطبقات لتنظيم أدوات المطبخ.',
                    'short_description' => 'رف تخزين مطبخ متين وعملي.',
                    'seo_title' => 'رف تخزين المطبخ - منظم متعدد الطبقات',
                    'seo_description' => 'حافظ على مطبخك مرتبًا باستخدام هذا الرف المعدني متعدد الطبقات.',
                    'additional_information' => $add_info['ar']
                ],
            ]
        ],
        [
            'user_id' => 1,
            'product_category_id' => $categoryIds[array_rand($categoryIds)],
            'image' => 'uploads/products/product-19.jpg',
            'gallery' => [],
            'slug' => 'adjustable-bookshelf',
            'qty' => 12,
            'price' => 110.00,
            'sale_price' => null,
            'sku' => 'SKU-019',
            'is_new' => true,
            'is_popular' => true,
            'views' => 0,
            'tags' => json_encode($tagGroups[1]),
            'status' => true,
            'translations' => [
                'en' => [
                    'title' => 'Adjustable Bookshelf',
                    'description' => 'Bookshelf with adjustable compartments for flexible storage.',
                    'short_description' => 'Customize your storage with adjustable bookshelf.',
                    'seo_title' => 'Adjustable Bookshelf - Customizable Storage',
                    'seo_description' => 'Perfect for books, décor, or files. Adjust shelves as needed.',
                    'additional_information' => $add_info['en']
                ],
                'hi' => [
                    'title' => 'एडजस्टेबल बुकशेल्फ़',
                    'description' => 'लचीले भंडारण के लिए एडजस्टेबल कम्पार्टमेंट के साथ बुकशेल्फ़।',
                    'short_description' => 'एडजस्टेबल बुकशेल्फ़ के साथ अपना भंडारण कस्टमाइज़ करें।',
                    'seo_title' => 'एडजस्टेबल बुकशेल्फ़ - कस्टमाइज़ेबल स्टोरेज',
                    'seo_description' => 'पुस्तकों, सजावट, या फ़ाइलों के लिए आदर्श। शेल्फ को आवश्यकतानुसार समायोजित करें।',
                    'additional_information' => $add_info['hi']
                ],
                'ar' => [
                    'title' => 'رف كتب قابل للتعديل',
                    'description' => 'رف كتب مع حجيرات قابلة للتعديل لتخزين مرن.',
                    'short_description' => 'خصص التخزين باستخدام رف الكتب القابل للتعديل.',
                    'seo_title' => 'رف كتب قابل للتعديل - تخزين مخصص',
                    'seo_description' => 'مثالي للكتب أو الزينة أو الملفات. عدّل الرفوف حسب الحاجة.',
                    'additional_information' => $add_info['ar']
                ],
            ]
        ],
        [
            'user_id' => 1,
            'product_category_id' => $categoryIds[array_rand($categoryIds)],
            'image' => 'uploads/products/product-20.jpg',
            'gallery' => [
                'uploads/products/product-20-2.jpg',
                'uploads/products/product-20-3.jpg',
                'uploads/products/product-20-4.jpg',
                'uploads/products/product-20-5.jpg',
            ],
            'slug' => 'outdoor-patio-set',
            'qty' => 6,
            'price' => 650.00,
            'sale_price' => 600.00,
            'sku' => 'SKU-020',
            'is_new' => true,
            'is_popular' => true,
            'views' => 0,
            'tags' => json_encode($tagGroups[4]),
            'status' => true,
            'translations' => [
                'en' => [
                    'title' => 'Outdoor Patio Set',
                    'description' => 'Stylish outdoor furniture set for patios and gardens.',
                    'short_description' => 'Weather-resistant patio furniture set.',
                    'seo_title' => 'Outdoor Patio Set - Garden Ready',
                    'seo_description' => 'Enhance your outdoor living space with this premium patio set.',
                    'additional_information' => $add_info['en']
                ],
                'hi' => [
                    'title' => 'आउटडोर पैटियो सेट',
                    'description' => 'पैटियो और बागानों के लिए स्टाइलिश आउटडोर फर्नीचर सेट।',
                    'short_description' => 'मौसम प्रतिरोधी पैटियो फर्नीचर सेट।',
                    'seo_title' => 'आउटडोर पैटियो सेट - गार्डन के लिए परफेक्ट',
                    'seo_description' => 'इस प्रीमियम पैटियो सेट के साथ अपने आउटडोर स्पेस को बढ़ाएँ।',
                    'additional_information' => $add_info['hi']
                ],
                'ar' => [
                    'title' => 'طقم فناء خارجي',
                    'description' => 'طقم أثاث خارجي أنيق للفناء والحدائق.',
                    'short_description' => 'طقم أثاث فناء مقاوم للطقس.',
                    'seo_title' => 'طقم فناء خارجي - جاهز للحديقة',
                    'seo_description' => 'عزز مساحة المعيشة الخارجية الخاصة بك مع هذا الطقم الفاخر.',
                    'additional_information' => $add_info['ar']
                ],
            ]
        ],
        ];


        foreach ($products as $product) {
            // generate a random 8 letter word uppercase for sku
            $sku = Str::upper(Str::random(8));

            $productNew = Product::create([
                'user_id' => $product['user_id'],
                'product_category_id' => $product['product_category_id'],
                'image' => $product['image'],
                'slug' => $product['slug'],
                'qty' => 350,
                'price' => $product['price'],
                'sale_price' => $product['sale_price'],
                'sku' => $sku,
                'is_new' => $product['is_new'],
                'is_popular' => $product['is_popular'],
                'views' => $product['views'],
                'tags' => json_decode($product['tags'], true),
                'status' => $product['status'],
            ]);

            $productNew->gallery()->createMany(
                array_map(function ($image) {
                    return ['image' => $image];
                }, $product['gallery'])
            );

            $productNew->translations()->createMany([
                [
                    'locale' => 'en',
                    'title' => $product['translations']['en']['title'],
                    'description' => $product['translations']['en']['description'],
                    'short_description' => $product['translations']['en']['short_description'],
                    'seo_title' => $product['translations']['en']['seo_title'],
                    'seo_description' => $product['translations']['en']['seo_description'],
                    'additional_information' => $product['translations']['en']['additional_information'],
                ],
                [
                    'locale' => 'hi',
                    'title' => $product['translations']['hi']['title'],
                    'description' => $product['translations']['hi']['description'],
                    'short_description' => $product['translations']['hi']['short_description'],
                    'seo_title' => $product['translations']['hi']['seo_title'],
                    'seo_description' => $product['translations']['hi']['seo_description'],
                    'additional_information' => $product['translations']['hi']['additional_information'],
                ],
                [
                    'locale' => 'ar',
                    'title' => $product['translations']['ar']['title'],
                    'description' => $product['translations']['ar']['description'],
                    'short_description' => $product['translations']['ar']['short_description'],
                    'seo_title' => $product['translations']['ar']['seo_title'],
                    'seo_description' => $product['translations']['ar']['seo_description'],
                    'additional_information' => $product['translations']['ar']['additional_information'],
                ],
            ]);
        }
    }
}
