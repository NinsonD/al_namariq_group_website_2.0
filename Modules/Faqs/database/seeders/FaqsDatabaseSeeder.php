<?php

namespace Modules\Faqs\Database\Seeders;

use Modules\Faqs\Models\Faq;
use Illuminate\Database\Seeder;

class FaqsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $faqs = [
            [
                'status' => 1,
                'show_on_homepage' => true,
                'translations' => [
                    'en' => [
                        'question' => 'How long does it take to get started?',
                        'answer' => 'It usually takes about 24-48 hours to get started after you sign up.',
                    ],
                    'hi' => [
                        'question' => 'शुरू करने में कितना समय लगता है?',
                        'answer' => 'साइन अप करने के बाद आमतौर पर 24-48 घंटे लगते हैं।',
                    ],
                    'ar' => [
                        'question' => 'كم من الوقت يستغرق البدء؟',
                        'answer' => 'عادةً ما يستغرق الأمر من 24 إلى 48 ساعة بعد التسجيل.',
                    ],
                ]
            ],
            [
                'status' => 1,
                'show_on_homepage' => true,
                'translations' => [
                    'en' => [
                        'question' => 'Do you offer custom solutions?',
                        'answer' => 'Yes, we tailor every project based on your business goals and requirements.',
                    ],
                    'hi' => [
                        'question' => 'क्या आप कस्टम समाधान प्रदान करते हैं?',
                        'answer' => 'हाँ, हम आपके व्यवसाय के लक्ष्यों और आवश्यकताओं के अनुसार प्रत्येक प्रोजेक्ट को अनुकूलित करते हैं।',
                    ],
                    'ar' => [
                        'question' => 'هل تقدمون حلولاً مخصصة؟',
                        'answer' => 'نعم، نقوم بتخصيص كل مشروع حسب أهداف ومتطلبات عملك.',
                    ],
                ]
            ],
            [
                'status' => 1,
                'show_on_homepage' => true,
                'translations' => [
                    'en' => [
                        'question' => 'What industries do you serve?',
                        'answer' => 'We serve a wide range of industries including healthcare, finance, e-commerce, and more.',
                    ],
                    'hi' => [
                        'question' => 'आप किन उद्योगों को सेवाएँ प्रदान करते हैं?',
                        'answer' => 'हम स्वास्थ्य सेवा, वित्त, ई-कॉमर्स और अन्य कई उद्योगों को सेवाएँ प्रदान करते हैं।',
                    ],
                    'ar' => [
                        'question' => 'ما هي القطاعات التي تخدمونها؟',
                        'answer' => 'نخدم مجموعة واسعة من القطاعات بما في ذلك الرعاية الصحية والمالية والتجارة الإلكترونية وغيرها.',
                    ],
                ]
            ],
            [
                'status' => 1,
                'show_on_homepage' => true,
                'translations' => [
                    'en' => [
                        'question' => 'Can you work with international clients?',
                        'answer' => 'Absolutely! We work with clients across the globe.',
                    ],
                    'hi' => [
                        'question' => 'क्या आप अंतरराष्ट्रीय ग्राहकों के साथ काम करते हैं?',
                        'answer' => 'बिलकुल! हम दुनिया भर के ग्राहकों के साथ काम करते हैं।',
                    ],
                    'ar' => [
                        'question' => 'هل تعملون مع عملاء دوليين؟',
                        'answer' => 'بالتأكيد! نحن نعمل مع عملاء من جميع أنحاء العالم.',
                    ],
                ]
            ],
            [
                'status' => 1,
                'show_on_homepage' => false,
                'translations' => [
                    'en' => [
                        'question' => 'What is your pricing model?',
                        'answer' => 'We offer flexible pricing based on project size and complexity.',
                    ],
                    'hi' => [
                        'question' => 'आपका मूल्य निर्धारण मॉडल क्या है?',
                        'answer' => 'हम प्रोजेक्ट के आकार और जटिलता के आधार पर लचीली मूल्य निर्धारण पेश करते हैं।',
                    ],
                    'ar' => [
                        'question' => 'ما هو نموذج التسعير الخاص بكم؟',
                        'answer' => 'نحن نقدم تسعيراً مرناً بناءً على حجم وتعقيد المشروع.',
                    ],
                ]
            ],
            [
                'status' => 1,
                'show_on_homepage' => false,
                'translations' => [
                    'en' => [
                        'question' => 'Do you provide post-launch support?',
                        'answer' => 'Yes, we offer ongoing support and maintenance packages.',
                    ],
                    'hi' => [
                        'question' => 'क्या आप लॉन्च के बाद समर्थन प्रदान करते हैं?',
                        'answer' => 'हाँ, हम निरंतर समर्थन और रखरखाव पैकेज प्रदान करते हैं।',
                    ],
                    'ar' => [
                        'question' => 'هل تقدمون الدعم بعد الإطلاق؟',
                        'answer' => 'نعم، نحن نقدم الدعم والصيانة المستمرة.',
                    ],
                ]
            ],
            [
                'status' => 1,
                'show_on_homepage' => false,
                'translations' => [
                    'en' => [
                        'question' => 'Can you redesign an existing website?',
                        'answer' => 'Yes, we specialize in website redesigns that improve performance and user experience.',
                    ],
                    'hi' => [
                        'question' => 'क्या आप मौजूदा वेबसाइट को फिर से डिज़ाइन कर सकते हैं?',
                        'answer' => 'हाँ, हम प्रदर्शन और उपयोगकर्ता अनुभव को बेहतर बनाने के लिए वेबसाइट री-डिज़ाइन में विशेषज्ञ हैं।',
                    ],
                    'ar' => [
                        'question' => 'هل يمكنكم إعادة تصميم موقع ويب موجود؟',
                        'answer' => 'نعم، نحن متخصصون في إعادة تصميم المواقع لتحسين الأداء وتجربة المستخدم.',
                    ],
                ]
            ],
            [
                'status' => 1,
                'show_on_homepage' => false,
                'translations' => [
                    'en' => [
                        'question' => 'Do you use the latest technologies?',
                        'answer' => 'We stay up-to-date with the latest trends and technologies in the industry.',
                    ],
                    'hi' => [
                        'question' => 'क्या आप नवीनतम तकनीकों का उपयोग करते हैं?',
                        'answer' => 'हम उद्योग में नवीनतम रुझानों और तकनीकों के साथ अपडेट रहते हैं।',
                    ],
                    'ar' => [
                        'question' => 'هل تستخدمون أحدث التقنيات؟',
                        'answer' => 'نحن نتابع أحدث الاتجاهات والتقنيات في هذا المجال.',
                    ],
                ]
            ],
            [
                'status' => 1,
                'show_on_homepage' => true,
                'translations' => [
                    'en' => [
                        'question' => 'How do you communicate during a project?',
                        'answer' => 'We provide regular updates via email, calls, and project management tools.',
                    ],
                    'hi' => [
                        'question' => 'प्रोजेक्ट के दौरान आप कैसे संवाद करते हैं?',
                        'answer' => 'हम ईमेल, कॉल और प्रोजेक्ट टूल्स के माध्यम से नियमित अपडेट प्रदान करते हैं।',
                    ],
                    'ar' => [
                        'question' => 'كيف تتواصلون أثناء تنفيذ المشروع؟',
                        'answer' => 'نقدم تحديثات منتظمة عبر البريد الإلكتروني والمكالمات وأدوات إدارة المشاريع.',
                    ],
                ]
            ],
            [
                'status' => 1,
                'show_on_homepage' => true,
                'translations' => [
                    'en' => [
                        'question' => 'Is there a refund policy?',
                        'answer' => 'Yes, we offer a satisfaction guarantee and a fair refund policy.',
                    ],
                    'hi' => [
                        'question' => 'क्या रिफंड नीति उपलब्ध है?',
                        'answer' => 'हाँ, हम संतुष्टि की गारंटी और एक उचित रिफंड नीति प्रदान करते हैं।',
                    ],
                    'ar' => [
                        'question' => 'هل لديكم سياسة استرجاع؟',
                        'answer' => 'نعم، نقدم ضمان رضا العملاء وسياسة استرجاع عادلة.',
                    ],
                ]
            ],
        ];



        foreach ($faqs as $faqData) {

            $faq = Faq::create([
                'status' => $faqData['status'],
                'show_on_homepage' => $faqData['show_on_homepage'] ?? 0,
            ]);

            $translations = [];

            foreach ($faqData['translations'] as $locale => $fields) {
                $translations[] = [
                    'locale' => $locale,
                    'question' => $fields['question'],
                    'answer' => $fields['answer'],
                ];
            }

            $faq->translations()->createMany($translations);
        }
    }
}
