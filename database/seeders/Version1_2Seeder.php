<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Brand\Models\Brand;
use Modules\Frontend\Database\Seeders\HomeFiveSeeder;
use Modules\Frontend\Database\Seeders\HomeSixSeeder;
use Modules\Frontend\Database\Seeders\SitePageSeederV12;
use Modules\Portfolio\Models\Portfolio;

class Version1_2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $this->call([
            SitePageSeederV12::class,
            HomeFiveSeeder::class,
            HomeSixSeeder::class,
        ]);

        $tagGroups = [
            [
                ['value' => 'Branding'],
                ['value' => 'Logo Design'],
                ['value' => 'Visual Identity'],
            ],
        ];

        $sourcePath = public_path('admin/img/files/portfolios');
        copyFilesToStorage($sourcePath, 'portfolios');

         $description = '<h3>Project Overview</h3>
                        <p>The client approached us seeking a bold and cohesive brand identity to elevate their presence in a saturated market. Our objective was to craft a brand system that reflected their mission, values, and modern aesthetic — all while ensuring adaptability across digital and print platforms.</p>
                        <p>&nbsp;</p>

                        <h4>Services Provided</h4>
                        <ul>
                            <li>Brand Discovery Workshop</li>
                            <li>Logo Design &amp; Visual Identity System</li>
                            <li>Color Palette &amp; Typography Guidelines</li>
                            <li>Brand Messaging &amp; Voice Development</li>
                            <li>Business Card &amp; Stationery Design</li>
                            <li>Social Media Branding Assets</li>
                        </ul>
                        <p>&nbsp;</p>

                        <h4>Strategy Breakdown</h4>
                        <p>We started with a collaborative discovery session to understand the client’s story, target audience, and unique positioning. Our design team then explored multiple creative directions, testing iconography, typography, and brand tone. Once finalized, we built a comprehensive brand guide to maintain consistency across platforms.</p>
                        <p>&nbsp;</p>

                        <h4>Results Achieved</h4>
                        <ul>
                            <li>Stronger brand recognition across digital and physical channels</li>
                            <li>Improved customer trust and perceived professionalism</li>
                            <li>Increased social media engagement by 60% within 2 months</li>
                            <li>Enabled successful product launch with cohesive branding</li>
                        </ul>
                        <p>&nbsp;</p>

                        <h4>Client Feedback</h4>
                        “From the very first call, the team understood our vision and transformed it into a brand identity we’re truly proud of. Every detail was intentional, and the results speak for themselves.”
                        <h4>&nbsp;</h4>

                        <h4>Tools &amp; Technologies Used</h4>
                        <ul>
                            <li>Adobe Illustrator &amp; Photoshop</li>
                            <li>Figma for collaborative prototyping</li>
                            <li>Notion for brand documentation</li>
                            <li>Google Slides for brand presentation decks</li>
                        </ul>
                        <h3>&nbsp;</h3>

                        <h3>Next Steps</h3>
                        <p>We\'re continuing to support the client with branded marketing materials and packaging design, while also preparing for a phase-two website redesign aligned with the new brand system.</p>
                        <h4>&nbsp;</h4>

                        <h4>Want Similar Results?</h4>
                        <p>If your business needs a strategic and visually stunning brand transformation, <a href="#">contact our team</a> for a discovery session.</p>';

        $description_hi = '<h3>प्रोजेक्ट अवलोकन</h3>
                            <p>क्लाइंट ने एक बोल्ड और एकीकृत ब्रांड पहचान के लिए हमसे संपर्क किया ताकि वह भीड़भाड़ वाले बाजार में अपनी उपस्थिति को बढ़ा सके। हमारा उद्देश्य था कि उनके मिशन, मूल्यों और आधुनिक दृष्टिकोण को दर्शाते हुए एक ऐसा ब्रांड सिस्टम तैयार किया जाए जो डिजिटल और प्रिंट प्लेटफ़ॉर्म दोनों पर काम करे।</p>
                            <p>&nbsp;</p>

                            <h4>प्रदान की गई सेवाएँ</h4>
                            <ul>
                                <li>ब्रांड डिस्कवरी वर्कशॉप</li>
                                <li>लोगो डिज़ाइन और विज़ुअल आइडेंटिटी सिस्टम</li>
                                <li>कलर पैलेट और टाइपोग्राफी गाइडलाइंस</li>
                                <li>ब्रांड मैसेजिंग और टोन ऑफ़ वॉइस विकास</li>
                                <li>बिज़नेस कार्ड और स्टेशनरी डिज़ाइन</li>
                                <li>सोशल मीडिया ब्रांडिंग एसेट्स</li>
                            </ul>
                            <p>&nbsp;</p>

                            <h4>रणनीति का विवरण</h4>
                            <p>हमने एक सहयोगात्मक डिस्कवरी सत्र के साथ शुरुआत की ताकि क्लाइंट की कहानी, लक्षित दर्शकों और उनकी विशिष्ट स्थिति को समझा जा सके। इसके बाद हमारी डिज़ाइन टीम ने विभिन्न रचनात्मक दिशाओं का परीक्षण किया जिसमें आइकनोग्राफी, टाइपोग्राफी और ब्रांड टोन शामिल था। अंतिम रूप मिलने के बाद, हमने ब्रांड की निरंतरता सुनिश्चित करने के लिए एक व्यापक ब्रांड गाइड तैयार किया।</p>
                            <p>&nbsp;</p>

                            <h4>प्राप्त परिणाम</h4>
                            <ul>
                                <li>डिजिटल और भौतिक चैनलों में मजबूत ब्रांड पहचान</li>
                                <li>ग्राहकों का विश्वास और पेशेवर छवि में सुधार</li>
                                <li>2 महीनों में सोशल मीडिया एंगेजमेंट में 60% की वृद्धि</li>
                                <li>सुसंगत ब्रांडिंग के साथ सफल उत्पाद लॉन्च</li>
                            </ul>
                            <p>&nbsp;</p>

                            <h4>ग्राहक प्रतिक्रिया</h4>
                            “पहली कॉल से ही टीम ने हमारी सोच को समझा और उसे एक ऐसी ब्रांड पहचान में बदला जिस पर हमें गर्व है। हर विवरण विचारपूर्वक था और परिणाम शानदार रहे।”
                            <h4>&nbsp;</h4>

                            <h4>उपयोग किए गए टूल और तकनीकें</h4>
                            <ul>
                                <li>Adobe Illustrator और Photoshop</li>
                                <li>सहयोगी प्रोटोटाइप के लिए Figma</li>
                                <li>ब्रांड दस्तावेज़ीकरण के लिए Notion</li>
                                <li>ब्रांड प्रेजेंटेशन के लिए Google Slides</li>
                            </ul>
                            <h3>&nbsp;</h3>

                            <h3>अगले कदम</h3>
                            <p>हम क्लाइंट को मार्केटिंग सामग्री और पैकेजिंग डिज़ाइन में सपोर्ट देना जारी रखेंगे और नए ब्रांड सिस्टम के अनुरूप वेबसाइट रीडिज़ाइन की तैयारी कर रहे हैं।</p>
                            <h4>&nbsp;</h4>

                            <h4>क्या आप भी ऐसे परिणाम चाहते हैं?</h4>
                            <p>अगर आप भी अपने व्यवसाय के लिए एक रणनीतिक और शानदार ब्रांड ट्रांसफॉर्मेशन चाहते हैं, तो <a href="#">हमसे संपर्क करें</a> और एक डिस्कवरी सेशन बुक करें।</p>';

        $description_ar = '<h3>نظرة عامة على المشروع</h3>
        <p>تواصل معنا العميل بهدف إنشاء هوية تجارية جريئة ومتسقة تعكس رسالته وقيمه وتعزز حضوره في سوق مزدحم. هدفنا كان بناء نظام علامة تجارية قابل للتطبيق عبر المنصات الرقمية والمطبوعة.</p>
        <p>&nbsp;</p>

        <h4>الخدمات المقدمة</h4>
        <ul>
            <li>ورشة اكتشاف العلامة التجارية</li>
            <li>تصميم الشعار ونظام الهوية البصرية</li>
            <li>دليل الألوان والخطوط</li>
            <li>صياغة الرسائل ونبرة العلامة التجارية</li>
            <li>تصميم بطاقات العمل والمطبوعات</li>
            <li>تصميم أصول العلامة التجارية لوسائل التواصل</li>
        </ul>
        <p>&nbsp;</p>

        <h4>تفصيل الاستراتيجية</h4>
        <p>بدأنا بجلسة اكتشاف لفهم قصة العميل والجمهور المستهدف والموقع التنافسي. قام فريق التصميم باستكشاف اتجاهات إبداعية متعددة، بما في ذلك الرموز والخطوط ونبرة العلامة. بعد اعتماد الهوية النهائية، أنشأنا دليل علامة تجارية شامل لضمان التناسق.</p>
        <p>&nbsp;</p>

        <h4>النتائج المحققة</h4>
        <ul>
            <li>زيادة الوعي بالعلامة التجارية عبر القنوات المختلفة</li>
            <li>تحسين الثقة من العملاء والانطباع المهني</li>
            <li>زيادة التفاعل في وسائل التواصل بنسبة 60% خلال شهرين</li>
            <li>إطلاق منتج ناجح بفضل الهوية البصرية المتماسكة</li>
        </ul>
        <p>&nbsp;</p>

        <h4>رأي العميل</h4>
        “منذ أول مكالمة، فهم الفريق رؤيتنا وحوّلوها إلى هوية تجارية نفتخر بها. كل التفاصيل كانت مدروسة، والنتائج كانت ملموسة ومبهرة.”
        <h4>&nbsp;</h4>

        <h4>الأدوات والتقنيات المستخدمة</h4>
        <ul>
            <li>Adobe Illustrator و Photoshop</li>
            <li>Figma للنماذج التفاعلية التعاونية</li>
            <li>Notion لتوثيق العلامة التجارية</li>
            <li>Google Slides لعروض العلامة التجارية</li>
        </ul>
        <h3>&nbsp;</h3>

        <h3>الخطوات التالية</h3>
        <p>نواصل دعم العميل من خلال تصميم مواد تسويقية وتغليف المنتجات، مع التحضير لمرحلة إعادة تصميم الموقع بما يتوافق مع الهوية الجديدة.</p>
        <h4>&nbsp;</h4>

        <h4>هل ترغب في نتائج مماثلة؟</h4>
        <p>إذا كنت تبحث عن تحول استراتيجي لهويتك التجارية، <a href="#">تواصل معنا اليوم</a> لحجز جلسة اكتشاف مجانية.</p>';

        $projects = [
            [
                'slug' => 'electro-hub',
                'website' => 'ElectroHub.com',
                'client' => 'Electro Hub',

                'translation' => [
                    'en' => [
                        'title' => 'Electro Hub',
                        'short_description' => 'Strategy and naming for new startups.',
                        'description' => $description,
                        'service' => 'Brand Strategy',
                        'duration' => '2 Months',
                        'seo_title' => 'Electro Hub - Brand Strategy Case Study',
                        'seo_keywords' => 'Brand Strategy, Naming, Identity',
                        'seo_description' => 'Electro Hub project focused on positioning, naming, and identity systems for startups.',
                    ],
                    'hi' => [
                        'title' => 'इलेक्ट्रो हब',
                        'short_description' => 'नई स्टार्टअप्स के लिए रणनीति और नामकरण।',
                        'description' => $description_hi,
                        'service' => 'ब्रांड रणनीति',
                        'duration' => '3 महीने',
                        'seo_title' => 'इलेक्ट्रो हब - ब्रांड रणनीति केस स्टडी',
                        'seo_keywords' => 'ब्रांड रणनीति, नामकरण, पहचान',
                        'seo_description' => 'स्टार्टअप्स के लिए इलेक्ट्रो हब रणनीति, नाम और पहचान प्रणाली परियोजना।',
                    ],
                    'ar' => [
                        'title' => 'براند أوربت',
                        'short_description' => 'الاستراتيجية والتسمية للشركات الناشئة الجديدة.',
                        'description' => $description_ar,
                        'service' => 'استراتيجية العلامة التجارية',
                        'duration' => '3 أشهر',
                        'seo_title' => 'براند أوربت - دراسة حالة استراتيجية العلامة التجارية',
                        'seo_keywords' => 'الاستراتيجية، التسمية، الهوية',
                        'seo_description' => 'مشروع براند أوربت يركز على التسمية والهوية للشركات الناشئة.',
                    ],
                ],
            ],
            [
                'slug' => 'acme-studio',
                'website' => 'AcmeStudio.com',
                'client' => 'Acme Studio',

                'translation' => [
                    'en' => [
                        'title' => 'Acme Studio',
                        'short_description' => 'Strategy and naming for new startups.',
                        'description' => $description,
                        'service' => 'Brand Strategy',
                        'duration' => '2 Months',
                        'seo_title' => 'Acme Studio - Brand Strategy Case Study',
                        'seo_keywords' => 'Brand Strategy, Naming, Identity',
                        'seo_description' => 'Acme Studio project focused on positioning, naming, and identity systems for startups.',
                    ],
                    'hi' => [
                        'title' => 'एक्मे स्टूडियो',
                        'short_description' => 'नई स्टार्टअप्स के लिए रणनीति और नामकरण।',
                        'description' => $description_hi,
                        'service' => 'ब्रांड रणनीति',
                        'duration' => '3 महीने',
                        'seo_title' => 'एक्मे स्टूडियो - ब्रांड रणनीति केस स्टडी',
                        'seo_keywords' => 'ब्रांड रणनीति, नामकरण, पहचान',
                        'seo_description' => 'स्टार्टअप्स के लिए एक्मे स्टूडियो रणनीति, नाम और पहचान प्रणाली परियोजना।',
                    ],
                    'ar' => [
                        'title' => 'براند أوربت',
                        'short_description' => 'الاستراتيجية والتسمية للشركات الناشئة الجديدة.',
                        'description' => $description_ar,
                        'service' => 'استراتيجية العلامة التجارية',
                        'duration' => '3 أشهر',
                        'seo_title' => 'براند أوربت - دراسة حالة استراتيجية العلامة التجارية',
                        'seo_keywords' => 'الاستراتيجية، التسمية، الهوية',
                        'seo_description' => 'مشروع براند أوربت يركز على التسمية والهوية للشركات الناشئة.',
                    ],
                ],
            ],
            [
                'slug' => 'digital-farming',
                'website' => 'DigitalFarming.com',
                'client' => 'Digital Farming',

                'translation' => [
                    'en' => [
                        'title' => 'Digital Farming',
                        'short_description' => 'Strategy and naming for new startups.',
                        'description' => $description,
                        'service' => 'Brand Strategy',
                        'duration' => '2 Months',
                        'seo_title' => 'Digital Farming - Brand Strategy Case Study',
                        'seo_keywords' => 'Brand Strategy, Naming, Identity',
                        'seo_description' => 'Acme Studio project focused on positioning, naming, and identity systems for startups.',
                    ],
                    'hi' => [
                        'title' => 'एक्मे स्टूडियो',
                        'short_description' => 'नई स्टार्टअप्स के लिए रणनीति और नामकरण।',
                        'description' => $description_hi,
                        'service' => 'ब्रांड रणनीति',
                        'duration' => '3 महीने',
                        'seo_title' => 'एक्मे स्टूडियो - ब्रांड रणनीति केस स्टडी',
                        'seo_keywords' => 'ब्रांड रणनीति, नामकरण, पहचान',
                        'seo_description' => 'स्टार्टअप्स के लिए एक्मे स्टूडियो रणनीति, नाम और पहचान प्रणाली परियोजना।',
                    ],
                    'ar' => [
                        'title' => 'براند أوربت',
                        'short_description' => 'الاستراتيجية والتسمية للشركات الناشئة الجديدة.',
                        'description' => $description_ar,
                        'service' => 'استراتيجية العلامة التجارية',
                        'duration' => '3 أشهر',
                        'seo_title' => 'براند أوربت - دراسة حالة استراتيجية العلامة التجارية',
                        'seo_keywords' => 'الاستراتيجية، التسمية، الهوية',
                        'seo_description' => 'مشروع براند أوربت يركز على التسمية والهوية للشركات الناشئة.',
                    ],
                ],
            ],
            [
                'slug' => 'grace-clinic',
                'website' => 'GraceClinic.com',
                'client' => 'Grace Clinic',

                'translation' => [
                    'en' => [
                        'title' => 'Grace Clinic',
                        'short_description' => 'Strategy and naming for new startups.',
                        'description' => $description,
                        'service' => 'Brand Strategy',
                        'duration' => '2 Months',
                        'seo_title' => 'Grace Clinic - Brand Strategy Case Study',
                        'seo_keywords' => 'Brand Strategy, Naming, Identity',
                        'seo_description' => 'Acme Studio project focused on positioning, naming, and identity systems for startups.',
                    ],
                    'hi' => [
                        'title' => 'एक्मे स्टूडियो',
                        'short_description' => 'नई स्टार्टअप्स के लिए रणनीति और नामकरण।',
                        'description' => $description_hi,
                        'service' => 'ब्रांड रणनीति',
                        'duration' => '3 महीने',
                        'seo_title' => 'एक्मे स्टूडियो - ब्रांड रणनीति केस स्टडी',
                        'seo_keywords' => 'ब्रांड रणनीति, नामकरण, पहचान',
                        'seo_description' => 'स्टार्टअप्स के लिए एक्मे स्टूडियो रणनीति, नाम और पहचान प्रणाली परियोजना।',
                    ],
                    'ar' => [
                        'title' => 'براند أوربت',
                        'short_description' => 'الاستراتيجية والتسمية للشركات الناشئة الجديدة.',
                        'description' => $description_ar,
                        'service' => 'استراتيجية العلامة التجارية',
                        'duration' => '3 أشهر',
                        'seo_title' => 'براند أوربت - دراسة حالة استراتيجية العلامة التجارية',
                        'seo_keywords' => 'الاستراتيجية، التسمية، الهوية',
                        'seo_description' => 'مشروع براند أوربت يركز على التسمية والهوية للشركات الناشئة.',
                    ],
                ],
            ],
            [
                'slug' => 'virtual-reality',
                'website' => 'VirtualReality.com',
                'client' => 'Virtual Reality',

                'translation' => [
                    'en' => [
                        'title' => 'Virtual Reality',
                        'short_description' => 'Strategy and naming for new startups.',
                        'description' => $description,
                        'service' => 'Brand Strategy',
                        'duration' => '2 Months',
                        'seo_title' => 'Grace Clinic - Brand Strategy Case Study',
                        'seo_keywords' => 'Brand Strategy, Naming, Identity',
                        'seo_description' => 'Acme Studio project focused on positioning, naming, and identity systems for startups.',
                    ],
                    'hi' => [
                        'title' => 'एक्मे स्टूडियो',
                        'short_description' => 'नई स्टार्टअप्स के लिए रणनीति और नामकरण।',
                        'description' => $description_hi,
                        'service' => 'ब्रांड रणनीति',
                        'duration' => '3 महीने',
                        'seo_title' => 'एक्मे स्टूडियो - ब्रांड रणनीति केस स्टडी',
                        'seo_keywords' => 'ब्रांड रणनीति, नामकरण, पहचान',
                        'seo_description' => 'स्टार्टअप्स के लिए एक्मे स्टूडियो रणनीति, नाम और पहचान प्रणाली परियोजना।',
                    ],
                    'ar' => [
                        'title' => 'براند أوربت',
                        'short_description' => 'الاستراتيجية والتسمية للشركات الناشئة الجديدة.',
                        'description' => $description_ar,
                        'service' => 'استراتيجية العلامة التجارية',
                        'duration' => '3 أشهر',
                        'seo_title' => 'براند أوربت - دراسة حالة استراتيجية العلامة التجارية',
                        'seo_keywords' => 'الاستراتيجية، التسمية، الهوية',
                        'seo_description' => 'مشروع براند أوربت يركز على التسمية والهوية للشركات الناشئة.',
                    ],
                ],
            ],
            [
                'slug' => 'smart-cities',
                'website' => 'SmartCities.com',
                'client' => 'Smart Cities',

                'translation' => [
                    'en' => [
                        'title' => 'Smart Cities',
                        'short_description' => 'Strategy and naming for new startups.',
                        'description' => $description,
                        'service' => 'Brand Strategy',
                        'duration' => '2 Months',
                        'seo_title' => 'Smart Cities - Brand Strategy Case Study',
                        'seo_keywords' => 'Brand Strategy, Naming, Identity',
                        'seo_description' => 'Acme Studio project focused on positioning, naming, and identity systems for startups.',
                    ],
                    'hi' => [
                        'title' => 'एक्मे स्टूडियो',
                        'short_description' => 'नई स्टार्टअप्स के लिए रणनीति और नामकरण।',
                        'description' => $description_hi,
                        'service' => 'ब्रांड रणनीति',
                        'duration' => '3 महीने',
                        'seo_title' => 'एक्मे स्टूडियो - ब्रांड रणनीति केस स्टडी',
                        'seo_keywords' => 'ब्रांड रणनीति, नामकरण, पहचान',
                        'seo_description' => 'स्टार्टअप्स के लिए एक्मे स्टूडियो रणनीति, नाम और पहचान प्रणाली परियोजना।',
                    ],
                    'ar' => [
                        'title' => 'براند أوربت',
                        'short_description' => 'الاستراتيجية والتسمية للشركات الناشئة الجديدة.',
                        'description' => $description_ar,
                        'service' => 'استراتيجية العلامة التجارية',
                        'duration' => '3 أشهر',
                        'seo_title' => 'براند أوربت - دراسة حالة استراتيجية العلامة التجارية',
                        'seo_keywords' => 'الاستراتيجية، التسمية، الهوية',
                        'seo_description' => 'مشروع براند أوربت يركز على التسمية والهوية للشركات الناشئة.',
                    ],
                ],
            ],
            [
                'slug' => 'cloud-computing',
                'website' => 'CloudComputing.com',
                'client' => 'Cloud Computing',

                'translation' => [
                    'en' => [
                        'title' => 'Cloud Computing',
                        'short_description' => 'Strategy and naming for new startups.',
                        'description' => $description,
                        'service' => 'Brand Strategy',
                        'duration' => '2 Months',
                        'seo_title' => 'Cloud Computing - Brand Strategy Case Study',
                        'seo_keywords' => 'Brand Strategy, Naming, Identity',
                        'seo_description' => 'Acme Studio project focused on positioning, naming, and identity systems for startups.',
                    ],
                    'hi' => [
                        'title' => 'एक्मे स्टूडियो',
                        'short_description' => 'नई स्टार्टअप्स के लिए रणनीति और नामकरण।',
                        'description' => $description_hi,
                        'service' => 'ब्रांड रणनीति',
                        'duration' => '3 महीने',
                        'seo_title' => 'एक्मे स्टूडियो - ब्रांड रणनीति केस स्टडी',
                        'seo_keywords' => 'ब्रांड रणनीति, नामकरण, पहचान',
                        'seo_description' => 'स्टार्टअप्स के लिए एक्मे स्टूडियो रणनीति, नाम और पहचान प्रणाली परियोजना।',
                    ],
                    'ar' => [
                        'title' => 'براند أوربت',
                        'short_description' => 'الاستراتيجية والتسمية للشركات الناشئة الجديدة.',
                        'description' => $description_ar,
                        'service' => 'استراتيجية العلامة التجارية',
                        'duration' => '3 أشهر',
                        'seo_title' => 'براند أوربت - دراسة حالة استراتيجية العلامة التجارية',
                        'seo_keywords' => 'الاستراتيجية، التسمية، الهوية',
                        'seo_description' => 'مشروع براند أوربت يركز على التسمية والهوية للشركات الناشئة.',
                    ],
                ],
            ],
        ];


        // portfolio seeder
        $projectFileIndex = 11;
        foreach ($projects as $index => $project) {
            $portfolio = Portfolio::firstOrCreate(
                ['slug' => $project['slug']],
                [
                    'website' => $project['website'],
                    'website_url' => "#",
                    'client' => $project['client'],
                    'year' => 2025,
                    'image' => 'uploads/portfolios/project-' . $projectFileIndex . '.jpg',
                    'tags' => $tagGroups[0],
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            $projectFileIndex++;

            foreach ($project['translation'] as $locale => $trans) {
                $exists = $portfolio->translations()
                    ->where('locale', $locale)
                    ->exists();

                if (!$exists) {
                    $portfolio->translations()->create([
                        'locale' => $locale,
                        'title' => $trans['title'],
                        'short_description' => $trans['short_description'],
                        'description' => $trans['description'],
                        'service' => $trans['service'],
                        'duration' => $trans['duration'],
                        'seo_title' => $trans['seo_title'],
                        'seo_keywords' => $trans['seo_keywords'],
                        'seo_description' => $trans['seo_description'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        $sourcePath = public_path('admin/img/files/brands');
        copyFilesToStorage($sourcePath, 'brand');

        $index = 12;

        for ($i = 0; $i < 6; $i++) {

            $translations = [
                'en' => [
                    'title' => 'Brand ' . ($index),
                ],
                'hi' => [
                    'title' => 'ब्रांड ' . ($index),
                ],
                'ar' => [
                    'title' => 'العلامة التجارية ' . ($index),
                ],
            ];

            Brand::create([
                'url' => "#",
                'image' => "uploads/brand/brand-" . ($index) . ".png",
                'status' => 1,
            ])->translations()->createMany([
                [
                    'locale' => 'en',
                    'title' => $translations['en']['title'],
                ],
                [
                    'locale' => 'hi',
                    'title' => $translations['hi']['title'],
                ],
                [
                    'locale' => 'ar',
                    'title' => $translations['ar']['title'],
                ],
            ]);
        }
    }
}
