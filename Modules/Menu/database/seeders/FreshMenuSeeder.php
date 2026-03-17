<?php

namespace Modules\Menu\Database\Seeders;

use Modules\Menu\Models\Menu;
use Illuminate\Database\Seeder;

class FreshMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $menus = [
            [
                'location' => 'header',
                'translations' => [
                    'en' => [
                        'title' => 'Header Menu',
                        'menu_items' => '[
                                {
                                    "href": "/about",
                                    "icon": "empty",
                                    "text": "About",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/products",
                                    "icon": "empty",
                                    "text": "Shop",
                                    "title": "",
                                    "target": "_self",
                                    "children": [
                                        {
                                            "href": "/products",
                                            "text": "Shop",
                                            "title": "",
                                            "target": "_self"
                                        }
                                    ]
                                },
                                {
                                    "href": "#",
                                    "icon": "empty",
                                    "text": "Pages",
                                    "title": "",
                                    "target": "_self",
                                    "children": [
                                        {
                                            "href": "/services",
                                            "text": "Our Services",
                                            "title": "",
                                            "target": "_self"
                                        },
                                        {
                                            "href": "/portfolios",
                                            "text": "Our Portfolios",
                                            "title": "",
                                            "target": "_self"
                                        },
                                        {
                                            "href": "/faqs",
                                            "text": "FAQs",
                                            "title": "",
                                            "target": "_self"
                                        },
                                        {
                                            "href": "/team",
                                            "text": "Our Team",
                                            "title": "",
                                            "target": "_self"
                                        },
                                        {
                                            "href": "/pricing",
                                            "text": "Pricing",
                                            "title": "",
                                            "target": "_self"
                                        },
                                        {
                                            "href": "/terms-and-conditions",
                                            "text": "Terms and Conditions",
                                            "title": "",
                                            "target": "_self"
                                        },
                                        {
                                            "href": "/terms-of-service",
                                            "text": "Terms of Service",
                                            "title": "",
                                            "target": "_self"
                                        },
                                        {
                                            "href": "/privacy-policy",
                                            "text": "Privacy Policy",
                                            "title": "",
                                            "target": "_self"
                                        }
                                    ]
                                },
                                {
                                    "href": "/blog",
                                    "icon": "empty",
                                    "text": "Blogs",
                                    "title": "",
                                    "target": "_self",
                                    "children": [
                                        {
                                            "href": "/blog",
                                            "text": "Our Blog",
                                            "title": "",
                                            "target": "_self"
                                        }
                                    ]
                                },
                                {
                                    "href": "/contact",
                                    "icon": "empty",
                                    "text": "Contact Us",
                                    "title": "",
                                    "target": "_self"
                                }
                        ]',
                    ],
                    'hi' => [
                        'title' => 'हैडर मेनू',
                        'menu_items' => '[
                            {
                                "href": "/about",
                                "icon": "empty",
                                "text": "हमारे बारे में",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/products",
                                "icon": "empty",
                                "text": "दुकान",
                                "title": "",
                                "target": "_self",
                                "children": [
                                    {
                                        "href": "/products",
                                        "text": "हमारे उत्पाद",
                                        "title": "",
                                        "target": "_self"
                                    }
                                ]
                            },
                            {
                                "href": "#",
                                "icon": "empty",
                                "text": "पेजेस",
                                "title": "",
                                "target": "_self",
                                "children": [
                                    {
                                        "href": "/services",
                                        "text": "हमारी सेवाएं",
                                        "title": "",
                                        "target": "_self"
                                    },
                                    {
                                        "href": "/portfolios",
                                        "text": "हमारे पोर्टफोलियो",
                                        "title": "",
                                        "target": "_self"
                                    },
                                    {
                                        "href": "/faqs",
                                        "text": "सामान्य प्रश्न",
                                        "title": "",
                                        "target": "_self"
                                    },
                                    {
                                        "href": "/team",
                                        "text": "हमारी टीम",
                                        "title": "",
                                        "target": "_self"
                                    },
                                    {
                                        "href": "/pricing",
                                        "text": "मूल्य निर्धारण",
                                        "title": "",
                                        "target": "_self"
                                    },
                                    {
                                        "href": "/terms-and-conditions",
                                        "text": "नियम और शर्तें",
                                        "title": "",
                                        "target": "_self"
                                    },
                                    {
                                        "href": "/terms-of-service",
                                        "text": "सेवा की शर्तें",
                                        "title": "",
                                        "target": "_self"
                                    },
                                    {
                                        "href": "/privacy-policy",
                                        "text": "गोपनीयता नीति",
                                        "title": "",
                                        "target": "_self"
                                    }
                                ]
                            },
                            {
                                "href": "/blog",
                                "icon": "empty",
                                "text": "ब्लॉग्स",
                                "title": "",
                                "target": "_self",
                                "children": [
                                        {
                                            "href": "/blog",
                                            "text": "हमारा ब्लॉग",
                                            "title": "",
                                            "target": "_self"
                                        }
                                    ]
                                },
                                {
                                    "href": "/contact",
                                    "icon": "empty",
                                    "text": "संपर्क करें",
                                    "title": "",
                                    "target": "_self"
                                }
                            ]',
                    ],
                    'ar' => [
                        'title' => 'القائمة الرئيسية',
                        'menu_items' => '[
                                {
                                    "href": "/about",
                                    "icon": "empty",
                                    "text": "من نحن",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/products",
                                    "icon": "empty",
                                    "text": "المنتجات",
                                    "title": "",
                                    "target": "_self",
                                    "children": [
                                        {
                                            "href": "/products",
                                            "text": "منتجاتنا",
                                            "title": "",
                                            "target": "_self"
                                        }
                                    ]
                                },
                                {
                                    "href": "#",
                                    "icon": "empty",
                                    "text": "الصفحات",
                                    "title": "",
                                    "target": "_self",
                                    "children": [
                                        {
                                            "href": "/services",
                                            "text": "خدماتنا",
                                            "title": "",
                                            "target": "_self"
                                        },
                                        {
                                            "href": "/portfolios",
                                            "text": "محافظاتنا",
                                            "title": "",
                                            "target": "_self"
                                        },
                                        {
                                            "href": "/faqs",
                                            "text": "الأسئلة الشائعة",
                                            "title": "",
                                            "target": "_self"
                                        },
                                        {
                                            "href": "/team",
                                            "text": "فريقنا",
                                            "title": "",
                                            "target": "_self"
                                        },
                                        {
                                            "href": "/pricing",
                                            "text": "التسعير",
                                            "title": "",
                                            "target": "_self"
                                        },
                                        {
                                            "href": "/terms-and-conditions",
                                            "text": "الأحكام والشروط",
                                            "title": "",
                                            "target": "_self"
                                        },
                                        {
                                            "href": "/terms-of-service",
                                            "text": "شروط الخدمة",
                                            "title": "",
                                            "target": "_self"
                                        },
                                        {
                                            "href": "/privacy-policy",
                                            "text": "سياسة الخصوصية",
                                            "title": "",
                                            "target": "_self"
                                        }
                                    ]
                                },
                                {
                                    "href": "/blog",
                                    "icon": "empty",
                                    "text": "المدونة",
                                    "title": "",
                                    "target": "_self",
                                    "children": [
                                        {
                                            "href": "/blog",
                                            "text": "مدونتنا",
                                            "title": "",
                                            "target": "_self"
                                        }
                                    ]
                                },
                                {
                                    "href": "/contact",
                                    "icon": "empty",
                                    "text": "اتصل بنا",
                                    "title": "",
                                    "target": "_self"
                                }
                        ]',
                    ],
                ]
            ],
            [
                'location' => 'footer_col_1',
                'translations' => [
                    'en' => [
                        'title' => 'Footer Menu 1',
                        'menu_items' => '[
                                {
                                    "href": "/",
                                    "icon": "empty",
                                    "text": "Home",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/about",
                                    "icon": "empty",
                                    "text": "About Us",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/portfolios",
                                    "icon": "empty",
                                    "text": "Our Portfolios",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/services",
                                    "icon": "empty",
                                    "text": "Our Services",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/contact",
                                    "icon": "empty",
                                    "text": "Contact Us",
                                    "title": "",
                                    "target": "_self"
                                }
                            ]',
                    ],
                    'hi' => [
                        'title' => 'फुटर मेनू 1',
                        'menu_items' => '[
                                {
                                    "href": "/",
                                    "icon": "empty",
                                    "text": "होम",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/about",
                                    "icon": "empty",
                                    "text": "हमारे बारे में",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/portfolios",
                                    "icon": "empty",
                                    "text": "हमारे पोर्टफोलियो",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/services",
                                    "icon": "empty",
                                    "text": "हमारी सेवाएं",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/contact",
                                    "icon": "empty",
                                    "text": "संपर्क करें",
                                    "title": "",
                                    "target": "_self"
                                }
                            ]',
                    ],
                    'ar' => [
                        'title'=> 'القائمة السفلية 1',
                        'menu_items' => '[
                            {
                                "href": "/",
                                "icon": "empty",
                                "text": "الصفحة الرئيسية",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/about",
                                "icon": "empty",
                                "text": "معلومات عنا",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/portfolios",
                                "icon": "empty",
                                "text": "محافظاتنا",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/services",
                                "icon": "empty",
                                "text": "خدماتنا",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/contact",
                                "icon": "empty",
                                "text": "اتصل بنا",
                                "title": "",
                                "target": "_self"
                            }
                        ]',
                    ],
                ]
            ],
            [
                'location'=> 'footer_col_2',
                'translations' => [
                    'en' => [
                        'title' => 'Footer Menu 2',
                        'menu_items' => '[
                                {
                                    "href": "/blog",
                                    "icon": "empty",
                                    "text": "Blog",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/faqs",
                                    "icon": "empty",
                                    "text": "FAQs",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/team",
                                    "icon": "empty",
                                    "text": "Team",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/pricing",
                                    "icon": "empty",
                                    "text": "Pricing",
                                    "title": "",
                                    "target": "_self"
                                }
                            ]',
                    ],
                    'hi' => [
                        'title' => 'फुटर मेनू 2',
                        'menu_items' => '[
                                {
                                    "href": "/blog",
                                    "icon": "empty",
                                    "text": "ब्लॉग",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/faqs",
                                    "icon": "empty",
                                    "text": "सामान्य प्रश्न",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/team",
                                    "icon": "empty",
                                    "text": "टीम",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/pricing",
                                    "icon": "empty",
                                    "text": "मूल्य निर्धारण",
                                    "title": "",
                                    "target": "_self"
                                }
                            ]',
                    ],
                    'ar' => [
                        'title' => 'القائمة السفلية 2',
                        'menu_items' => '[
                                {
                                    "href": "/blog",
                                    "icon": "empty",
                                    "text": "المدونة",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/faqs",
                                    "icon": "empty",
                                    "text": "الأسئلة الشائعة",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/team",
                                    "icon": "empty",
                                    "text": "الفريق",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/pricing",
                                    "icon": "empty",
                                    "text": "التسعير",
                                    "title": "",
                                    "target": "_self"
                                }
                        ]',
                    ]
                ]
            ],
            [
                'location'=> 'footer_col_3',
                'translations' => [
                    'en' => [
                            'title' => 'Footer Menu 3',
                            'menu_items' => '[
                                    {
                                        "href": "/products?category=3",
                                        "icon": "empty",
                                        "text": "Sofas",
                                        "title": "",
                                        "target": "_self"
                                    },
                                    {
                                        "href": "/products?category=5",
                                        "icon": "empty",
                                        "text": "Dining Table",
                                        "title": "",
                                        "target": "_self"
                                    },
                                    {
                                        "href": "/products?category=9",
                                        "icon": "empty",
                                        "text": "Bookshelves",
                                        "title": "",
                                        "target": "_self"
                                    },
                                    {
                                        "href": "/products?category=11",
                                        "icon": "empty",
                                        "text": "Outdoor Furniture",
                                        "title": "",
                                        "target": "_self"
                                    }
                                ]',
                    ],
                    'hi' => [
                        'title' => 'फुटर मेनू 3',
                        'menu_items' => '[
                                {
                                    "href": "/products?category=3",
                                    "icon": "empty",
                                    "text": "सोफे",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/products?category=5",
                                    "icon": "empty",
                                    "text": "डाइनिंग टेबल",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/products?category=9",
                                    "icon": "empty",
                                    "text": "बुकशेल्फ़",
                                    "title": "",
                                    "target": "_self"
                                },
                                {
                                    "href": "/products?category=11",
                                    "icon": "empty",
                                    "text": "आउटडोर फर्नीचर",
                                    "title": "",
                                    "target": "_self"
                                }
                            ]',
                    ],
                    'ar' => [
                        'title' => 'القائمة السفلية 3',
                        'menu_items' => '[
                            {
                                "href": "/products?category=3",
                                "icon": "empty",
                                "text": "الأرائك",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/products?category=5",
                                "icon": "empty",
                                "text": "طاولة الطعام",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/products?category=9",
                                "icon": "empty",
                                "text": "رفوف الكتب",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/products?category=11",
                                "icon": "empty",
                                "text": "الأثاث الخارجي",
                                "title": "",
                                "target": "_self"
                            }
                        ]',
                    ]
                ]
            ],
            [
                'location'=> 'footer_col_4',
                'translations' => [
                    'en' => [
                        'title' => 'Footer Menu 4',
                        'menu_items' => '[
                            {
                                "href": "/contact",
                                "icon": "empty",
                                "text": "Contact",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/login",
                                "icon": "empty",
                                "text": "My Account",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/privacy-policy",
                                "icon": "empty",
                                "text": "Privacy Policy",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/terms-and-conditions",
                                "icon": "empty",
                                "text": "Terms & Conditions",
                                "title": "",
                                "target": "_self"
                            }
                        ]',
                    ],
                    'hi' => [
                        'title' => 'फुटर मेनू 4',
                        'menu_items' => '[
                            {
                                "href": "/contact",
                                "icon": "empty",
                                "text": "संपर्क करें",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/login",
                                "icon": "empty",
                                "text": "मेरा खाता",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/privacy-policy",
                                "icon": "empty",
                                "text": "गोपनीयता नीति",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/terms-and-conditions",
                                "icon": "empty",
                                "text": "नियम और शर्तें",
                                "title": "",
                                "target": "_self"
                            }
                        ]',
                    ],
                    'ar' => [
                        'title' => 'القائمة السفلية 4',
                        'menu_items' => '[
                            {
                                "href": "/contact",
                                "icon": "empty",
                                "text": "اتصل بنا",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/login",
                                "icon": "empty",
                                "text": "حسابي",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/privacy-policy",
                                "icon": "empty",
                                "text": "سياسة الخصوصية",
                                "title": "",
                                "target": "_self"
                            },
                            {
                                "href": "/terms-and-conditions",
                                "icon": "empty",
                                "text": "الشروط والأحكام",
                                "title": "",
                                "target": "_self"
                            }
                        ]',
                    ],
                ]
            ]
        ];

        foreach ($menus as $menu) {

            $menu_item = Menu::create([
                'location' => $menu['location'],
            ]);

            $translations = [];

            foreach ($menu['translations'] as $locale => $translation) {
                $translations[] = [
                    'locale' => $locale,
                    'title' => $translation['title'],
                    'menu_items' => json_decode($translation['menu_items'], true),
                ];
            }

            $menu_item->translations()->createMany($translations);
        }

    }
}
