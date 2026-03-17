<?php

namespace Modules\Testimonial\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Testimonial\Models\Testimonial;

class TestimonialDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('admin/img/files/testimonial');
        copyFilesToStorage($sourcePath, 'testimonials');

        $testimonials = [
            [
                'image' => 'uploads/testimonials/1.jpg',
                'rating' => 5,
                'translations' => [
                    'en' => [
                        'name' => 'Emma Roberts',
                        'designation' => 'Marketing Manager, WebCore Ltd.',
                        'comment' => 'Their SEO strategy took our traffic to the next level. We saw results within the first month!',
                    ],
                    'hi' => [
                        'name' => 'एम्मा रॉबर्ट्स',
                        'designation' => 'मार्केटिंग प्रबंधक, वेबकोर लिमिटेड',
                        'comment' => 'उनकी एसईओ रणनीति ने हमारे ट्रैफ़िक को अगले स्तर तक पहुंचा दिया। हमें पहले महीने में ही परिणाम मिले!',
                    ],
                    'ar' => [
                        'name' => 'إيما روبرتس',
                        'designation' => 'مديرة التسويق، ويبكور المحدودة',
                        'comment' => 'استراتيجية تحسين محركات البحث الخاصة بهم أخذت حركة المرور لدينا إلى المستوى التالي. رأينا النتائج في الشهر الأول!',
                    ],
                ],
            ],
            [
                'image' => 'uploads/testimonials/2.jpg',
                'rating' => 5,
                'translations' => [
                    'en' => [
                        'name' => 'Liam Turner',
                        'designation' => 'Founder, StartupSync',
                        'comment' => 'Amazing branding work. They captured our vision perfectly and delivered a stunning identity.',
                    ],
                    'hi' => [
                        'name' => 'लियाम टर्नर',
                        'designation' => 'संस्थापक, स्टार्टअपसिंक',
                        'comment' => 'शानदार ब्रांडिंग कार्य। उन्होंने हमारी सोच को पूरी तरह से समझा और एक सुंदर पहचान प्रदान की।',
                    ],
                    'ar' => [
                        'name' => 'ليام تورنر',
                        'designation' => 'مؤسس، ستارت أب سينك',
                        'comment' => 'عمل رائع في بناء العلامة التجارية. فهموا رؤيتنا تمامًا وقدموا هوية مذهلة.',
                    ],
                ],
            ],
            [
                'image' => 'uploads/testimonials/3.jpg',
                'rating' => 4,
                'translations' => [
                    'en' => [
                        'name' => 'Sophia Bennett',
                        'designation' => 'Product Manager, NextGen Apps',
                        'comment' => 'Their UI/UX design improved our user engagement significantly. Smooth process from start to finish.',
                    ],
                    'hi' => [
                        'name' => 'सोफिया बेनेट',
                        'designation' => 'प्रोडक्ट मैनेजर, नेक्स्टजेन ऐप्स',
                        'comment' => 'उनके UI/UX डिज़ाइन ने हमारे उपयोगकर्ता जुड़ाव को काफी बढ़ा दिया। शुरुआत से अंत तक प्रक्रिया सुचारू रही।',
                    ],
                    'ar' => [
                        'name' => 'صوفيا بينيت',
                        'designation' => 'مديرة المنتج، نكست جن آبس',
                        'comment' => 'تصميم واجهة المستخدم وتجربة المستخدم الخاص بهم حسن تفاعل المستخدمين بشكل كبير. عملية سلسة من البداية للنهاية.',
                    ],
                ],
            ],
            [
                'image' => 'uploads/testimonials/4.jpg',
                'rating' => 5,
                'translations' => [
                    'en' => [
                        'name' => 'Ava Clarke',
                        'designation' => 'CEO, DigitalGlow',
                        'comment' => 'From web development to SEO, their full-service approach helped us grow fast. Highly recommended!',
                    ],
                    'hi' => [
                        'name' => 'एवा क्लार्क',
                        'designation' => 'सीईओ, डिजिटलग्लो',
                        'comment' => 'वेब विकास से लेकर एसईओ तक, उनकी सेवाओं ने हमारी कंपनी को तेजी से बढ़ाने में मदद की। अत्यधिक अनुशंसित!',
                    ],
                    'ar' => [
                        'name' => 'آفا كلارك',
                        'designation' => 'المديرة التنفيذية، ديجيتال جلو',
                        'comment' => 'من تطوير المواقع إلى تحسين محركات البحث، ساعدنا نهجهم الشامل في النمو بسرعة. أوصي بهم بشدة!',
                    ],
                ],
            ],
            [
                'image' => 'uploads/testimonials/5.jpg',
                'rating' => 4,
                'translations' => [
                    'en' => [
                        'name' => 'Noah Scott',
                        'designation' => 'CMO, Brandify Studio',
                        'comment' => 'They helped us refine our brand message. Professional, creative, and always on time.',
                    ],
                    'hi' => [
                        'name' => 'नोआ स्कॉट',
                        'designation' => 'मुख्य विपणन अधिकारी, ब्रांडिफाई स्टूडियो',
                        'comment' => 'उन्होंने हमारी ब्रांड संदेश को बेहतर बनाने में मदद की। पेशेवर, रचनात्मक और समयनिष्ठ।',
                    ],
                    'ar' => [
                        'name' => 'نواه سكوت',
                        'designation' => 'مدير التسويق، برانديفاي ستوديو',
                        'comment' => 'ساعدونا في تحسين رسالتنا التسويقية. محترفون، مبدعون، ودائمًا في الموعد.',
                    ],
                ],
            ],
            [
                'image' => 'uploads/testimonials/6.jpg',
                'rating' => 5,
                'translations' => [
                    'en' => [
                        'name' => 'Olivia Carter',
                        'designation' => 'Creative Head, VisionSpark',
                        'comment' => 'The video campaign was powerful and emotionally engaging. A brilliant creative team!',
                    ],
                    'hi' => [
                        'name' => 'ओलिविया कार्टर',
                        'designation' => 'क्रिएटिव हेड, विजनस्पार्क',
                        'comment' => 'वीडियो अभियान प्रभावशाली और भावनात्मक रूप से जुड़ाव वाला था। एक शानदार क्रिएटिव टीम!',
                    ],
                    'ar' => [
                        'name' => 'أوليفيا كارتر',
                        'designation' => 'رئيسة الإبداع، فيجن سبارك',
                        'comment' => 'كانت الحملة المرئية قوية ومؤثرة. فريق إبداعي رائع!',
                    ],
                ],
            ],
            [
                'image' => 'uploads/testimonials/7.jpg',
                'rating' => 5,
                'translations' => [
                    'en' => [
                        'name' => 'Mason Lee',
                        'designation' => 'CTO, CloudBridge',
                        'comment' => 'The website they built is fast, responsive, and aligns perfectly with our tech vision.',
                    ],
                    'hi' => [
                        'name' => 'मेसन ली',
                        'designation' => 'सीटीओ, क्लाउडब्रिज',
                        'comment' => 'उन्होंने जो वेबसाइट बनाई है वह तेज, उत्तरदायी और हमारी तकनीकी दृष्टि से मेल खाती है।',
                    ],
                    'ar' => [
                        'name' => 'مايسون لي',
                        'designation' => 'مدير التكنولوجيا، كلاود بريدج',
                        'comment' => 'الموقع الذي بنوه سريع ومتجاوب ويتماشى تمامًا مع رؤيتنا التقنية.',
                    ],
                ],
            ],
            [
                'image' => 'uploads/testimonials/8.jpg',
                'rating' => 4,
                'translations' => [
                    'en' => [
                        'name' => 'Chloe Adams',
                        'designation' => 'Founder, EcoWave',
                        'comment' => 'They crafted a sustainable brand image for us. Beautiful work with deep meaning.',
                    ],
                    'hi' => [
                        'name' => 'क्लोए एडम्स',
                        'designation' => 'संस्थापक, ईकोवेव',
                        'comment' => 'उन्होंने हमारे लिए एक स्थायी ब्रांड छवि बनाई। सुंदर और अर्थपूर्ण कार्य।',
                    ],
                    'ar' => [
                        'name' => 'كلوي آدامز',
                        'designation' => 'مؤسسة، إيكو ويف',
                        'comment' => 'صمموا لنا هوية علامة تجارية مستدامة. عمل جميل وعميق المعنى.',
                    ],
                ],
            ],
            [
                'image' => 'uploads/testimonials/9.jpg',
                'rating' => 5,
                'translations' => [
                    'en' => [
                        'name' => 'James Mitchell',
                        'designation' => 'Growth Consultant, SparkEdge',
                        'comment' => 'Very strategic and data-driven. Their analytics helped us pivot faster.',
                    ],
                    'hi' => [
                        'name' => 'जेम्स मिशेल',
                        'designation' => 'ग्रोथ सलाहकार, स्पार्कएज',
                        'comment' => 'बहुत रणनीतिक और डेटा-आधारित। उनके विश्लेषण ने हमें तेजी से आगे बढ़ने में मदद की।',
                    ],
                    'ar' => [
                        'name' => 'جيمس ميتشل',
                        'designation' => 'استشاري نمو، سبارك إيدج',
                        'comment' => 'استراتيجي جدًا ومبني على البيانات. ساعدتنا تحليلاتهم على التحول بسرعة.',
                    ],
                ],
            ],
            [
                'image' => 'uploads/testimonials/10.jpg',
                'rating' => 4,
                'translations' => [
                    'en' => [
                        'name' => 'Isabella Moore',
                        'designation' => 'UI Designer, FlowDesign',
                        'comment' => 'Their creative direction inspired our entire design team. Loved the experience!',
                    ],
                    'hi' => [
                        'name' => 'इसाबेला मूर',
                        'designation' => 'UI डिज़ाइनर, फ्लोडिज़ाइन',
                        'comment' => 'उनकी रचनात्मक दिशा ने हमारी पूरी डिज़ाइन टीम को प्रेरित किया। अनुभव शानदार था!',
                    ],
                    'ar' => [
                        'name' => 'إيزابيلا مور',
                        'designation' => 'مصممة واجهة المستخدم، فلو ديزاين',
                        'comment' => 'أفكارهم الإبداعية ألهمت فريق التصميم بأكمله. كانت تجربة رائعة!',
                    ],
                ],
            ],
        ];


        foreach ($testimonials as $t) {
            $testimonial = Testimonial::create([
                'image' => $t['image'],
                'rating' => $t['rating'],
                'status' => 1,
            ]);

            foreach ($t['translations'] as $locale => $translation) {
                $testimonial->translations()->create([
                    'locale' => $locale,
                    'name' => $translation['name'],
                    'designation' => $translation['designation'],
                    'comment' => $translation['comment'],
                ]);
            }
        }
    }
}
