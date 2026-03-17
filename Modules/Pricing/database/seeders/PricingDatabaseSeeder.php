<?php

namespace Modules\Pricing\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Pricing\Models\Pricing;

class PricingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('admin/img/files/pricing');
        copyFilesToStorage($sourcePath, 'pricing');

        $pricings = [
            [
                'price' => 0,
                'serial' => 1,
                'expiration' => 'monthly',
                'btn_url' => route('contact'),
                'status' => 1,
                'show_on_home' => 1,
                'is_popular' => 0,
                'translations' => [
                    'en' => [
                        'title' => 'Free',
                        'short_description' => 'Organize your daily task for free without any cost',
                        'description' => '<ul>
                                            <li>Unlimited cards</li>
                                            <li>Automated management</li>
                                            <li>SOX compliance</li>
                                            <li>Local video issuance</li>
                                            <li>Limited tools</li>
                                        </ul>',
                        'btn_text' => 'Join This Plan',
                    ],
                    'hi' => [
                        'title' => 'स्टार्टर प्लान',
                        'short_description' => 'अपने दैनिक कार्य को मुफ्त में व्यवस्थित करें',
                        'description' => '<ul>
                                            <li>असीमित कार्ड</li>
                                            <li>स्वचालित प्रबंधन</li>
                                            <li>SOX अनुपालन</li>
                                            <li>स्थानीय वीडियो जारी करना</li>
                                            <li>सीमित उपकरण</li>
                                        </ul>',
                        'btn_text' => 'इस में शामिल हों',
                    ],
                    'ar' => [
                        'title' => 'خطة البداية',
                        'short_description' => 'نظم مهامك اليومية مجانًا',
                        'description' => '<ul>
                                            <li>بطاقات غير محدودة</li>
                                            <li>إدارة مؤتمتة</li>
                                            <li>امتثال SOX</li>
                                            <li>إصدار فيديو محلي</li>
                                            <li>أدوات محدودة</li>
                                        </ul>',
                        'btn_text' => 'انضم إلى هذه الخطة',
                    ],
                ]
            ],
            [
                'price' => 48,
                'serial' => 2,
                'expiration' => 'monthly',
                'btn_url' => route('contact'),
                'status' => 1,
                'show_on_home' => 1,
                'is_popular' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Pro',
                        'short_description' => 'Best for organizing your daily creative tasks',
                        'description' => '<ul>
                                            <li>Unlimited project boards</li>
                                            <li>Task & asset collaboration</li>
                                            <li>Custom brand templates</li>
                                            <li>Email support</li>
                                            <li>Access to free design tools</li>
                                        </ul>',
                        'btn_text' => 'Join This Plan',
                    ],
                    'hi' => [
                        'title' => 'स्टार्टर प्लान',
                        'short_description' => 'अपने क्रिएटिव कार्यों को मुफ्त में व्यवस्थित करें',
                        'description' => '<ul>
                                            <li>असीमित प्रोजेक्ट बोर्ड</li>
                                            <li>टास्क और एसेट सहयोग</li>
                                            <li>कस्टम ब्रांड टेम्पलेट्स</li>
                                            <li>ईमेल समर्थन</li>
                                            <li>फ्री डिज़ाइन टूल्स की पहुँच</li>
                                        </ul>',
                        'btn_text' => 'इस में शामिल हों',
                    ],
                    'ar' => [
                        'title' => 'خطة البداية',
                        'short_description' => 'نظم مهامك الإبداعية اليومية مجانًا',
                        'description' => '<ul>
                                            <li>لوحات مشاريع غير محدودة</li>
                                            <li>تعاون في المهام والمحتوى</li>
                                            <li>قوالب علامة تجارية مخصصة</li>
                                            <li>دعم عبر البريد الإلكتروني</li>
                                            <li>الوصول إلى أدوات التصميم المجانية</li>
                                        </ul>',
                        'btn_text' => 'انضم إلى هذه الخطة',
                    ],
                ]

            ],
            [
                'price' => 140,
                'serial' => 3,
                'expiration' => 'monthly',
                'btn_url' => route('contact'),
                'status' => 1,
                'show_on_home' => 1,
                'is_popular' => 0,
                'translations' => [
                    'en' => [
                        'title' => 'Business',
                        'short_description' => 'Perfect for freelancers and small creative teams',
                        'description' => '<ul>
                                            <li>5 active projects</li>
                                            <li>Basic brand kit support</li>
                                            <li>Client feedback portal</li>
                                            <li>Simple task assignment</li>
                                            <li>Email & ticket support</li>
                                        </ul>',
                        'btn_text' => 'Join This Plan',
                    ],
                    'hi' => [
                        'title' => 'स्टार्टर प्लान',
                        'short_description' => 'फ्रीलांसरों और छोटे क्रिएटिव टीमों के लिए उपयुक्त',
                        'description' => '<ul>
                                            <li>5 सक्रिय प्रोजेक्ट्स</li>
                                            <li>बेसिक ब्रांड किट समर्थन</li>
                                            <li>क्लाइंट फीडबैक पोर्टल</li>
                                            <li>सरल कार्य असाइनमेंट</li>
                                            <li>ईमेल और टिकट समर्थन</li>
                                        </ul>',
                        'btn_text' => 'इस में शामिल हों',
                    ],
                    'ar' => [
                        'title' => 'خطة البداية',
                        'short_description' => 'مثالية للمستقلين والفرق الإبداعية الصغيرة',
                        'description' => '<ul>
                                            <li>5 مشاريع نشطة</li>
                                            <li>دعم حزمة العلامة التجارية الأساسية</li>
                                            <li>بوابة ملاحظات العملاء</li>
                                            <li>توزيع مهام بسيط</li>
                                            <li>دعم عبر البريد الإلكتروني والتذاكر</li>
                                        </ul>',
                        'btn_text' => 'انضم إلى هذه الخطة',
                    ],
                ]

            ],
        ];

        $yearlyPricings = [
            [
                'price' => 0,
                'serial' => 4,
                'expiration' => 'yearly',
                'btn_url' => route('contact'),
                'status' => 1,
                'show_on_home' => 1,
                'is_popular' => 0,
                'translations' => [
                    'en' => [
                        'title' => 'Free',
                        'short_description' => 'Stay organized all year at no cost',
                        'description' => '<ul>
                                            <li>Unlimited cards</li>
                                            <li>Automated management</li>
                                            <li>SOX compliance</li>
                                            <li>Local video issuance</li>
                                            <li>Limited tools</li>
                                        </ul>',
                        'btn_text' => 'Join This Plan',
                    ],
                    'hi' => [
                        'title' => 'स्टार्टर प्लान',
                        'short_description' => 'पूरे साल के लिए मुफ़्त में व्यवस्थित रहें',
                        'description' => '<ul>
                                            <li>असीमित कार्ड</li>
                                            <li>स्वचालित प्रबंधन</li>
                                            <li>SOX अनुपालन</li>
                                            <li>स्थानीय वीडियो जारी करना</li>
                                            <li>सीमित उपकरण</li>
                                        </ul>',
                        'btn_text' => 'इस में शामिल हों',
                    ],
                    'ar' => [
                        'title' => 'خطة البداية',
                        'short_description' => 'نظم مهامك السنوية مجانًا',
                        'description' => '<ul>
                                            <li>بطاقات غير محدودة</li>
                                            <li>إدارة مؤتمتة</li>
                                            <li>امتثال SOX</li>
                                            <li>إصدار فيديو محلي</li>
                                            <li>أدوات محدودة</li>
                                        </ul>',
                        'btn_text' => 'انضم إلى هذه الخطة',
                    ],
                ]
            ],
            [
                'price' => 480,
                'serial' => 5,
                'expiration' => 'yearly',
                'btn_url' => route('contact'),
                'status' => 1,
                'show_on_home' => 1,
                'is_popular' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Pro',
                        'short_description' => 'Year-round creative collaboration for professionals',
                        'description' => '<ul>
                                            <li>Unlimited project boards</li>
                                            <li>Task & asset collaboration</li>
                                            <li>Custom brand templates</li>
                                            <li>Email support</li>
                                            <li>Access to free design tools</li>
                                        </ul>',
                        'btn_text' => 'Join This Plan',
                    ],
                    'hi' => [
                        'title' => 'प्रो प्लान',
                        'short_description' => 'क्रिएटिव कार्यों में पूरे साल सहयोग करें',
                        'description' => '<ul>
                                            <li>असीमित प्रोजेक्ट बोर्ड</li>
                                            <li>टास्क और एसेट सहयोग</li>
                                            <li>कस्टम ब्रांड टेम्पलेट्स</li>
                                            <li>ईमेल समर्थन</li>
                                            <li>फ्री डिज़ाइन टूल्स की पहुँच</li>
                                        </ul>',
                        'btn_text' => 'इस में शामिल हों',
                    ],
                    'ar' => [
                        'title' => 'خطة البداية',
                        'short_description' => 'تعاون إبداعي على مدار العام',
                        'description' => '<ul>
                                            <li>لوحات مشاريع غير محدودة</li>
                                            <li>تعاون في المهام والمحتوى</li>
                                            <li>قوالب علامة تجارية مخصصة</li>
                                            <li>دعم عبر البريد الإلكتروني</li>
                                            <li>الوصول إلى أدوات التصميم المجانية</li>
                                        </ul>',
                        'btn_text' => 'انضم إلى هذه الخطة',
                    ],
                ]
            ],
            [
                'price' => 1390,
                'serial' => 6,
                'expiration' => 'yearly',
                'btn_url' => route('contact'),
                'status' => 1,
                'show_on_home' => 1,
                'is_popular' => 0,
                'translations' => [
                    'en' => [
                        'title' => 'Business',
                        'short_description' => 'Advanced support for your team’s yearly goals',
                        'description' => '<ul>
                                            <li>5 active projects</li>
                                            <li>Basic brand kit support</li>
                                            <li>Client feedback portal</li>
                                            <li>Simple task assignment</li>
                                            <li>Email & ticket support</li>
                                        </ul>',
                        'btn_text' => 'Join This Plan',
                    ],
                    'hi' => [
                        'title' => 'बिजनेस प्लान',
                        'short_description' => 'आपकी टीम के वार्षिक लक्ष्यों के लिए उन्नत समर्थन',
                        'description' => '<ul>
                                            <li>5 सक्रिय प्रोजेक्ट्स</li>
                                            <li>बेसिक ब्रांड किट समर्थन</li>
                                            <li>क्लाइंट फीडबैक पोर्टल</li>
                                            <li>सरल कार्य असाइनमेंट</li>
                                            <li>ईमेल और टिकट समर्थन</li>
                                        </ul>',
                        'btn_text' => 'इस में शामिल हों',
                    ],
                    'ar' => [
                        'title' => 'خطة الأعمال',
                        'short_description' => 'دعم متقدم لأهداف فريقك السنوية',
                        'description' => '<ul>
                                            <li>5 مشاريع نشطة</li>
                                            <li>دعم حزمة العلامة التجارية الأساسية</li>
                                            <li>بوابة ملاحظات العملاء</li>
                                            <li>توزيع مهام بسيط</li>
                                            <li>دعم عبر البريد الإلكتروني والتذاكر</li>
                                        </ul>',
                        'btn_text' => 'انضم إلى هذه الخطة',
                    ],
                ]
            ],
        ];

        $pricings = array_merge($pricings, $yearlyPricings);

        foreach ($pricings as $pricing) {
            $createdPricing = Pricing::create([
                'price' => $pricing['price'],
                'serial' => $pricing['serial'],
                'expiration' => $pricing['expiration'],
                'btn_url' => $pricing['btn_url'],
                'status' => $pricing['status'],
                'show_on_home' => $pricing['show_on_home'],
                'is_popular' => $pricing['is_popular'],
            ]);

            foreach ($pricing['translations'] as $locale => $translation) {
                $createdPricing->translations()->create([
                    'locale' => $locale,
                    'title' => $translation['title'],
                    'short_description' => $translation['short_description'],
                    'description' => $translation['description'],
                    'btn_text' => $translation['btn_text'],
                ]);
            }
        }

    }
}
