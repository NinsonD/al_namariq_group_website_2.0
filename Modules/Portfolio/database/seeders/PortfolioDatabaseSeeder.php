<?php

namespace Modules\Portfolio\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Portfolio\Models\Portfolio;

class PortfolioDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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



        $tagGroups = [
            // Branding & Identity Projects
            [
                ['value' => 'Branding'],
                ['value' => 'Logo Design'],
                ['value' => 'Visual Identity'],
            ],
            // Digital Marketing Campaigns
            [
                ['value' => 'Marketing'],
                ['value' => 'SEO'],
                ['value' => 'Content Strategy'],
            ],
            // UI/UX Design Projects
            [
                ['value' => 'UX / UI'],
                ['value' => 'Wireframing'],
                ['value' => 'Prototyping'],
            ],
            // Website Design & Development
            [
                ['value' => 'Web Design'],
                ['value' => 'Development'],
                ['value' => 'Responsive Design'],
            ],
            // E-commerce Projects
            [
                ['value' => 'Ecommerce'],
                ['value' => 'UX / UI'],
                ['value' => 'Conversion Optimization'],
            ],
            // Research and Strategy Projects
            [
                ['value' => 'Research'],
                ['value' => 'Analytics'],
                ['value' => 'Strategy'],
            ],
            // Creative Content Production
            [
                ['value' => 'Copywriting'],
                ['value' => 'Video Production'],
                ['value' => 'Storytelling'],
            ],
            // Performance Audit Projects
            [
                ['value' => 'Audit'],
                ['value' => 'Performance'],
                ['value' => 'SEO'],
            ],
            // Social Media Campaigns
            [
                ['value' => 'Social Media'],
                ['value' => 'Content Creation'],
                ['value' => 'Engagement'],
            ],
            // Startup Launch Projects
            [
                ['value' => 'Startup'],
                ['value' => 'MVP Design'],
                ['value' => 'Pitch Deck'],
            ],
            // Agency Identity
            [
                ['value' => 'Agency'],
                ['value' => 'Creative Direction'],
            ],
            // Product UI/UX Cases
            [
                ['value' => 'Product Design'],
                ['value' => 'UX / UI'],
                ['value' => 'User Testing'],
            ],
            // SEO-Focused Campaigns
            [
                ['value' => 'SEO'],
                ['value' => 'Content'],
                ['value' => 'Analytics'],
            ],
            // B2B Marketing Projects
            [
                ['value' => 'B2B'],
                ['value' => 'Lead Generation'],
                ['value' => 'Email Campaign'],
            ],
            // Full-service Campaigns
            [
                ['value' => 'Marketing'],
                ['value' => 'Strategy'],
                ['value' => 'Execution'],
            ],
        ];


       $projects = [
        [
            'slug' => 'echo-studio',
            'website' => 'EchoStudioDesigns.com',
            'client' => 'Echo Studio',
            'tags' => $tagGroups[0],
            'translation' => [
                'en' => [
                    'title' => 'Echo Studio',
                    'short_description' => 'This is for motion graphics and animation design.',
                    'description' => $description,
                    'service' => 'Motion Graphics',
                    'duration' => '2 Months',
                    'seo_title' => 'Echo Studio - Motion Graphics Case Study',
                    'seo_keywords' => 'Motion Design, Animation, Visual Effects',
                    'seo_description' => 'Case study of Echo Studio showcasing animation, visual storytelling, and motion branding.',
                ],
                'hi' => [
                    'title' => 'इको स्टूडियो',
                    'short_description' => 'यह मोशन ग्राफिक्स और एनीमेशन डिज़ाइन के लिए है।',
                    'description' => $description_hi,
                    'service' => 'मोशन ग्राफिक्स',
                    'duration' => '2 महीने',
                    'seo_title' => 'इको स्टूडियो - मोशन ग्राफिक्स केस स्टडी',
                    'seo_keywords' => 'मोशन डिज़ाइन, एनीमेशन, विज़ुअल इफेक्ट्स',
                    'seo_description' => 'इको स्टूडियो का केस स्टडी जो एनीमेशन और ब्रांडिंग को दर्शाता है।',
                ],
                'ar' => [
                    'title' => 'استوديو إيكو',
                    'short_description' => 'هذا لتصميم الرسوم المتحركة والحركة.',
                    'description' => $description_ar,
                    'service' => 'الرسوم المتحركة',
                    'duration' => 'شهرين',
                    'seo_title' => 'استوديو إيكو - دراسة حالة الرسوم المتحركة',
                    'seo_keywords' => 'تصميم الحركة، الرسوم المتحركة، المؤثرات البصرية',
                    'seo_description' => 'دراسة حالة استوديو إيكو توضح الرسوم المتحركة وسرد القصص البصري.',
                ],
            ],
        ],
        [
            'slug' => 'neon-agency',
            'website' => 'NeonCreativeHub.com',
            'client' => 'Neon Agency',
            'tags' => $tagGroups[1],
            'translation' => [
                'en' => [
                    'title' => 'Neon Agency',
                    'short_description' => 'Focused on brand identity and creative direction.',
                    'description' => $description,
                    'service' => 'Brand Identity',
                    'duration' => '3 Months',
                    'seo_title' => 'Neon Agency - Brand Identity Case Study',
                    'seo_keywords' => 'Branding, Creative Direction, Logo Design',
                    'seo_description' => 'Explore how Neon Agency reshaped identity with bold and modern branding.',
                ],
                'hi' => [
                    'title' => 'निऑन एजेंसी',
                    'short_description' => 'ब्रांड पहचान और क्रिएटिव डायरेक्शन पर केंद्रित।',
                    'description' => $description_hi,
                    'service' => 'ब्रांड पहचान',
                    'duration' => '3 महीने',
                    'seo_title' => 'निऑन एजेंसी - ब्रांड पहचान केस स्टडी',
                    'seo_keywords' => 'ब्रांडिंग, रचनात्मक दिशा, लोगो डिज़ाइन',
                    'seo_description' => 'कैसे निऑन एजेंसी ने आधुनिक ब्रांडिंग से पहचान बनाई।',
                ],
                'ar' => [
                    'title' => 'وكالة نيون',
                    'short_description' => 'تركز على هوية العلامة التجارية والإبداع.',
                    'description' => $description_ar,
                    'service' => 'هوية العلامة التجارية',
                    'duration' => '3 أشهر',
                    'seo_title' => 'وكالة نيون - دراسة حالة هوية العلامة التجارية',
                    'seo_keywords' => 'العلامة التجارية، التوجيه الإبداعي، تصميم الشعار',
                    'seo_description' => 'كيف أعادت وكالة نيون تشكيل الهوية بعلامة جريئة وحديثة.',
                ],
            ],
        ],
        [
            'slug' => 'pixel-spark',
            'website' => 'PixelSparkStudio.com',
            'client' => 'Pixel Spark',
            'tags' => $tagGroups[2],
            'translation' => [
                'en' => [
                    'title' => 'Pixel Spark',
                    'short_description' => 'A UI/UX revamp for a productivity app.',
                    'description' => $description,
                    'service' => 'UI/UX Design',
                    'duration' => '4 Months',
                    'seo_title' => 'Pixel Spark - UX Overhaul Case Study',
                    'seo_keywords' => 'UX Design, Wireframes, User Testing',
                    'seo_description' => 'Pixel Spark UX case study on intuitive user interface design and usability.',
                ],
                'hi' => [
                    'title' => 'पिक्सेल स्पार्क',
                    'short_description' => 'एक उत्पादकता ऐप के लिए UI/UX रीडिज़ाइन।',
                    'description' => $description_hi,
                    'service' => 'UI/UX डिज़ाइन',
                    'duration' => '4 महीने',
                    'seo_title' => 'पिक्सेल स्पार्क - UX केस स्टडी',
                    'seo_keywords' => 'UX डिज़ाइन, वायरफ्रेम, यूजर टेस्टिंग',
                    'seo_description' => 'UI/UX सुधार और उपयोगकर्ता अनुभव के लिए केस स्टडी।',
                ],
                'ar' => [
                    'title' => 'بيكسل سبارك',
                    'short_description' => 'إعادة تصميم UX / UI لتطبيق إنتاجية.',
                    'description' => $description_ar,
                    'service' => 'تصميم UX / UI',
                    'duration' => '4 أشهر',
                    'seo_title' => 'بيكسل سبارك - دراسة حالة تجربة المستخدم',
                    'seo_keywords' => 'تصميم UX، النماذج الأولية، اختبار المستخدم',
                    'seo_description' => 'دراسة حالة بيكسل سبارك لتحسين تصميم واجهة المستخدم وتجربة المستخدم.',
                ],
            ],
        ],
        // Repeat similar format for:
        [
            'slug' => 'nova-commerce',
            'website' => 'NovaCommerceHub.com',
            'client' => 'Nova Commerce',
            'tags' => $tagGroups[3],
            'translation' => [
                'en' => [
                    'title' => 'Nova Commerce',
                    'short_description' => 'Custom Shopify eCommerce theme for a fashion brand.',
                    'description' => $description,
                    'service' => 'E-commerce Design',
                    'duration' => '6 Months',
                    'seo_title' => 'Nova Commerce - Shopify Design Case Study',
                    'seo_keywords' => 'Ecommerce, Shopify, Conversion',
                    'seo_description' => 'Study on increasing conversions with UX-first Shopify theme for Nova.',
                ],
                'hi' => [
                    'title' => 'नोवा कॉमर्स',
                    'short_description' => 'फैशन ब्रांड के लिए कस्टम Shopify डिज़ाइन।',
                    'description' => $description_hi,
                    'service' => 'ई-कॉमर्स डिज़ाइन',
                    'duration' => '6 महीने',
                    'seo_title' => 'नोवा कॉमर्स - Shopify डिज़ाइन केस स्टडी',
                    'seo_keywords' => 'ई-कॉमर्स, Shopify, रूपांतरण',
                    'seo_description' => 'नोवा के लिए UX-प्रथम Shopify डिज़ाइन पर केस स्टडी।',
                ],
                'ar' => [
                    'title' => 'نوفا كوميرس',
                    'short_description' => 'قالب Shopify مخصص لعلامة أزياء.',
                    'description' => $description_ar,
                    'service' => 'تصميم التجارة الإلكترونية',
                    'duration' => '6 أشهر',
                    'seo_title' => 'نوفا كوميرس - دراسة حالة Shopify',
                    'seo_keywords' => 'التجارة الإلكترونية، Shopify، التحويلات',
                    'seo_description' => 'دراسة حول تحسين التحويلات باستخدام تصميم UX لعلامة Nova.',
                ],
            ],
        ],
        [
            'slug' => 'zen-media',
            'website' => 'ZenMedia.com',
            'client' => 'Zen Media Group',
            'tags' => $tagGroups[0],
            'translation' => [
                'en' => [
                    'title' => 'Zen Media',
                    'short_description' => 'Brand identity and media content for digital engagement.',
                    'description' => $description,
                    'service' => 'Branding & Media',
                    'duration' => '3 Months',
                    'seo_title' => 'Zen Media - Digital Branding Case Study',
                    'seo_keywords' => 'Branding, Media, Digital Presence',
                    'seo_description' => 'Zen Media branding and media content creation project for online engagement.',
                ],
                'hi' => [
                    'title' => 'ज़ेन मीडिया',
                    'short_description' => 'डिजिटल एंगेजमेंट के लिए ब्रांड पहचान और मीडिया कंटेंट।',
                    'description' => $description_hi,
                    'service' => 'ब्रांडिंग और मीडिया',
                    'duration' => '3 महीने',
                    'seo_title' => 'ज़ेन मीडिया - डिजिटल ब्रांडिंग केस स्टडी',
                    'seo_keywords' => 'ब्रांडिंग, मीडिया, डिजिटल उपस्थिति',
                    'seo_description' => 'ज़ेन मीडिया ब्रांडिंग और मीडिया कंटेंट निर्माण परियोजना।',
                ],
                'ar' => [
                    'title' => 'زين ميديا',
                    'short_description' => 'هوية العلامة التجارية ومحتوى الوسائط للتفاعل الرقمي.',
                    'description' => $description_ar,
                    'service' => 'العلامة التجارية والوسائط',
                    'duration' => '3 أشهر',
                    'seo_title' => 'زين ميديا - دراسة حالة العلامة التجارية الرقمية',
                    'seo_keywords' => 'العلامة التجارية، الوسائط، الوجود الرقمي',
                    'seo_description' => 'مشروع زين ميديا لإنشاء العلامة التجارية والمحتوى الرقمي.',
                ],
            ],
        ],
        [
            'slug' => 'visionary-studios',
            'website' => 'VisionaryStudios.io',
            'client' => 'Visionary Studios',
            'tags' => $tagGroups[1],
            'translation' => [
                'en' => [
                    'title' => 'Visionary Studios',
                    'short_description' => 'Creative visual storytelling and animation.',
                    'description' => $description,
                    'service' => 'Animation & Visual Design',
                    'duration' => '4 Months',
                    'seo_title' => 'Visionary Studios - Creative Animation Project',
                    'seo_keywords' => 'Animation, Motion Graphics, Storytelling',
                    'seo_description' => 'Visionary Studios project covering animation and visual storytelling design.',
                ],
                'hi' => [
                    'title' => 'विज़नरी स्टूडियोज़',
                    'short_description' => 'रचनात्मक दृश्य कहानी और एनीमेशन।',
                    'description' => $description_hi,
                    'service' => 'एनीमेशन और दृश्य डिज़ाइन',
                    'duration' => '4 महीने',
                    'seo_title' => 'विज़नरी स्टूडियोज़ - क्रिएटिव एनीमेशन प्रोजेक्ट',
                    'seo_keywords' => 'एनीमेशन, मोशन ग्राफिक्स, कहानी कहने की कला',
                    'seo_description' => 'एनीमेशन और कहानी कहने के डिज़ाइन के लिए विज़नरी स्टूडियोज़ प्रोजेक्ट।',
                ],
                'ar' => [
                    'title' => 'استوديوهات فيجنري',
                    'short_description' => 'سرد بصري إبداعي ورسوم متحركة.',
                    'description' => $description_ar,
                    'service' => 'الرسوم المتحركة والتصميم المرئي',
                    'duration' => '4 أشهر',
                    'seo_title' => 'استوديوهات فيجنري - مشروع الرسوم المتحركة الإبداعي',
                    'seo_keywords' => 'الرسوم المتحركة، الرسوم المتحركة، سرد القصص',
                    'seo_description' => 'مشروع استوديوهات فيجنري لتغطية الرسوم المتحركة وسرد القصص البصري.',
                ],
            ],
        ],
        [
            'slug' => 'bytecraft-labs',
            'website' => 'BytecraftLabs.dev',
            'client' => 'Bytecraft Labs',
            'tags' => $tagGroups[2],
            'translation' => [
                'en' => [
                    'title' => 'Bytecraft Labs',
                    'short_description' => 'Development of custom web applications.',
                    'description' => $description,
                    'service' => 'Web App Development',
                    'duration' => '5 Months',
                    'seo_title' => 'Bytecraft Labs - Web App Case Study',
                    'seo_keywords' => 'Web Development, Laravel, Custom Apps',
                    'seo_description' => 'Bytecraft Labs custom web application case study using modern frameworks.',
                ],
                'hi' => [
                    'title' => 'बाइटक्राफ्ट लैब्स',
                    'short_description' => 'कस्टम वेब एप्लिकेशन का विकास।',
                    'description' => $description_hi,
                    'service' => 'वेब एप्लिकेशन विकास',
                    'duration' => '5 महीने',
                    'seo_title' => 'बाइटक्राफ्ट लैब्स - वेब एप्लिकेशन केस स्टडी',
                    'seo_keywords' => 'वेब विकास, लारवेल, कस्टम ऐप्स',
                    'seo_description' => 'मॉडर्न फ्रेमवर्क का उपयोग करके बाइटक्राफ्ट लैब्स वेब ऐप परियोजना।',
                ],
                'ar' => [
                    'title' => 'بايت كرافت لابز',
                    'short_description' => 'تطوير تطبيقات الويب المخصصة.',
                    'description' => $description_ar,
                    'service' => 'تطوير تطبيقات الويب',
                    'duration' => '5 أشهر',
                    'seo_title' => 'بايت كرافت لابز - دراسة حالة تطبيق ويب',
                    'seo_keywords' => 'تطوير الويب، لارافيل، تطبيقات مخصصة',
                    'seo_description' => 'دراسة حالة تطبيق الويب المخصص من بايت كرافت لابز باستخدام تقنيات حديثة.',
                ],
            ],
        ],
        [
            'slug' => 'skyline-digital',
            'website' => 'SkylineDigital.co',
            'client' => 'Skyline Digital Agency',
            'tags' => $tagGroups[3],
            'translation' => [
                'en' => [
                    'title' => 'Skyline Digital',
                    'short_description' => 'Social media campaign and ad creatives.',
                    'description' => $description,
                    'service' => 'Social Media Marketing',
                    'duration' => '2 Months',
                    'seo_title' => 'Skyline Digital - Social Media Case Study',
                    'seo_keywords' => 'Social Media, Ad Creatives, Campaigns',
                    'seo_description' => 'Skyline Digital’s campaign design and social content performance strategy.',
                ],
                'hi' => [
                    'title' => 'स्काईलाइन डिजिटल',
                    'short_description' => 'सोशल मीडिया अभियान और विज्ञापन क्रिएटिव्स।',
                    'description' => $description_hi,
                    'service' => 'सोशल मीडिया मार्केटिंग',
                    'duration' => '2 महीने',
                    'seo_title' => 'स्काईलाइन डिजिटल - सोशल मीडिया केस स्टडी',
                    'seo_keywords' => 'सोशल मीडिया, विज्ञापन, अभियान',
                    'seo_description' => 'स्काईलाइन डिजिटल का अभियान डिज़ाइन और कंटेंट परफॉर्मेंस रणनीति।',
                ],
                'ar' => [
                    'title' => 'سكاي لاين ديجيتال',
                    'short_description' => 'حملات وسائل التواصل الاجتماعي وتصميم الإعلانات.',
                    'description' => $description_ar,
                    'service' => 'تسويق عبر وسائل التواصل الاجتماعي',
                    'duration' => 'شهرين',
                    'seo_title' => 'سكاي لاين ديجيتال - دراسة حالة وسائل التواصل الاجتماعي',
                    'seo_keywords' => 'وسائل التواصل الاجتماعي، الإعلانات، الحملات',
                    'seo_description' => 'استراتيجية تصميم الحملات والأداء لمحتوى سكاي لاين ديجيتال.',
                ],
            ],
        ],
        [
            'slug' => 'digital-leap',
            'website' => 'DigitalLeap.net',
            'client' => 'Digital Leap Corp',
            'tags' => $tagGroups[4],
            'translation' => [
                'en' => [
                    'title' => 'Digital Leap',
                    'short_description' => 'Corporate rebranding and website overhaul.',
                    'description' => $description,
                    'service' => 'Rebranding & Web Design',
                    'duration' => '4 Months',
                    'seo_title' => 'Digital Leap - Rebranding Case Study',
                    'seo_keywords' => 'Rebranding, Corporate Identity, Web Design',
                    'seo_description' => 'Rebranding and website revamp for Digital Leap to modernize identity.',
                ],
                'hi' => [
                    'title' => 'डिजिटल लीप',
                    'short_description' => 'कॉर्पोरेट रीब्रांडिंग और वेबसाइट ओवरहॉल।',
                    'description' => $description_hi,
                    'service' => 'रीब्रांडिंग और वेब डिज़ाइन',
                    'duration' => '4 महीने',
                    'seo_title' => 'डिजिटल लीप - रीब्रांडिंग केस स्टडी',
                    'seo_keywords' => 'रीब्रांडिंग, कॉर्पोरेट पहचान, वेब डिज़ाइन',
                    'seo_description' => 'डिजिटल लीप के लिए रीब्रांडिंग और वेबसाइट रीडिज़ाइन परियोजना।',
                ],
                'ar' => [
                    'title' => 'التحول الرقمي',
                    'short_description' => 'إعادة تصميم العلامة التجارية وتجديد الموقع.',
                    'description' => $description_ar,
                    'service' => 'إعادة العلامة التجارية وتصميم المواقع',
                    'duration' => '4 أشهر',
                    'seo_title' => 'التحول الرقمي - دراسة حالة إعادة العلامة التجارية',
                    'seo_keywords' => 'إعادة العلامة التجارية، الهوية، تصميم المواقع',
                    'seo_description' => 'مشروع التحول الرقمي لإعادة تصميم العلامة وتحديث الموقع.',
                ],
            ],
        ],
        [
            'slug' => 'brandorbit',
            'website' => 'BrandOrbit.org',
            'client' => 'BrandOrbit Inc.',
            'tags' => $tagGroups[5],
            'translation' => [
                'en' => [
                    'title' => 'BrandOrbit',
                    'short_description' => 'Strategy and naming for new startups.',
                    'description' => $description,
                    'service' => 'Brand Strategy',
                    'duration' => '3 Months',
                    'seo_title' => 'BrandOrbit - Brand Strategy Case Study',
                    'seo_keywords' => 'Brand Strategy, Naming, Identity',
                    'seo_description' => 'BrandOrbit project focused on positioning, naming, and identity systems for startups.',
                ],
                'hi' => [
                    'title' => 'ब्रांडऑर्बिट',
                    'short_description' => 'नई स्टार्टअप्स के लिए रणनीति और नामकरण।',
                    'description' => $description_hi,
                    'service' => 'ब्रांड रणनीति',
                    'duration' => '3 महीने',
                    'seo_title' => 'ब्रांडऑर्बिट - ब्रांड रणनीति केस स्टडी',
                    'seo_keywords' => 'ब्रांड रणनीति, नामकरण, पहचान',
                    'seo_description' => 'स्टार्टअप्स के लिए ब्रांडऑर्बिट रणनीति, नाम और पहचान प्रणाली परियोजना।',
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
            'slug' => 'techwave-solutions',
            'website' => 'TechWaveSolutions.com',
            'client' => 'TechWave Solutions Inc.',
            'tags' => $tagGroups[5],
            'translation' => [
                'en' => [
                    'title' => 'Innovative Works',
                    'short_description' => 'Strategy and naming for new startups.',
                    'description' => $description,
                    'service' => 'Brand Strategy',
                    'duration' => '2 Months',
                    'seo_title' => 'TechWave Solutions - Brand Strategy Case Study',
                    'seo_keywords' => 'Brand Strategy, Naming, Identity',
                    'seo_description' => 'TechWave Solutions project focused on positioning, naming, and identity systems for startups.',
                ],
                'hi' => [
                    'title' => 'ब्रांडऑर्बिट',
                    'short_description' => 'नई स्टार्टअप्स के लिए रणनीति और नामकरण।',
                    'description' => $description_hi,
                    'service' => 'ब्रांड रणनीति',
                    'duration' => '3 महीने',
                    'seo_title' => 'ब्रांडऑर्बिट - ब्रांड रणनीति केस स्टडी',
                    'seo_keywords' => 'ब्रांड रणनीति, नामकरण, पहचान',
                    'seo_description' => 'स्टार्टअप्स के लिए ब्रांडऑर्बिट रणनीति, नाम और पहचान प्रणाली परियोजना।',
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
            'slug' => 'zenvatech',
            'website' => 'ZenvaTech.com',
            'client' => 'Zenva Tech',
            'tags' => $tagGroups[5],
            'translation' => [
                'en' => [
                    'title' => 'Design Essence',
                    'short_description' => 'Strategy and naming for new startups.',
                    'description' => $description,
                    'service' => 'Brand Strategy',
                    'duration' => '2 Months',
                    'seo_title' => 'Zenva Tech - Brand Strategy Case Study',
                    'seo_keywords' => 'Brand Strategy, Naming, Identity',
                    'seo_description' => 'Zenva Tech project focused on positioning, naming, and identity systems for startups.',
                ],
                'hi' => [
                    'title' => 'ब्रांडऑर्बिट',
                    'short_description' => 'नई स्टार्टअप्स के लिए रणनीति और नामकरण।',
                    'description' => $description_hi,
                    'service' => 'ब्रांड रणनीति',
                    'duration' => '3 महीने',
                    'seo_title' => 'ब्रांडऑर्बिट - ब्रांड रणनीति केस स्टडी',
                    'seo_keywords' => 'ब्रांड रणनीति, नामकरण, पहचान',
                    'seo_description' => 'स्टार्टअप्स के लिए ब्रांडऑर्बिट रणनीति, नाम और पहचान प्रणाली परियोजना।',
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
            'slug' => 'create-vision',
            'website' => 'CreateVision.com',
            'client' => 'Create Vision',
            'tags' => $tagGroups[5],
            'translation' => [
                'en' => [
                    'title' => 'Create Vision',
                    'short_description' => 'Strategy and naming for new startups.',
                    'description' => $description,
                    'service' => 'Brand Strategy',
                    'duration' => '2 Months',
                    'seo_title' => 'Create Vision - Brand Strategy Case Study',
                    'seo_keywords' => 'Brand Strategy, Naming, Identity',
                    'seo_description' => 'Create Vision project focused on positioning, naming, and identity systems for startups.',
                ],
                'hi' => [
                    'title' => 'ब्रांडऑर्बिट',
                    'short_description' => 'नई स्टार्टअप्स के लिए रणनीति और नामकरण।',
                    'description' => $description_hi,
                    'service' => 'ब्रांड रणनीति',
                    'duration' => '3 महीने',
                    'seo_title' => 'ब्रांडऑर्बिट - ब्रांड रणनीति केस स्टडी',
                    'seo_keywords' => 'ब्रांड रणनीति, नामकरण, पहचान',
                    'seo_description' => 'स्टार्टअप्स के लिए ब्रांडऑर्बिट रणनीति, नाम और पहचान प्रणाली परियोजना।',
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
            'slug' => 'electro-hub',
            'website' => 'ElectroHub.com',
            'client' => 'Electro Hub',
            'tags' => $tagGroups[5],
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
            'tags' => $tagGroups[5],
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
            'tags' => $tagGroups[5],
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
            'tags' => $tagGroups[5],
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
            'tags' => $tagGroups[5],
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
            'tags' => $tagGroups[5],
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
            'tags' => $tagGroups[5],
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



    foreach ($projects as $index => $project) {
        $portfolio = Portfolio::create([
            'slug' => $project['slug'],
            'website' => $project['website'],
            'website_url' => "#",
            'client' => $project['client'],
            'year' => 2025,
            'image' => 'uploads/portfolios/project-' . ($index + 1) . '.jpg',
            'tags' => $project['tags'],
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $translations = [];
        foreach ($project['translation'] as $locale => $trans) {
            $translations[] = [
                'portfolio_id' => $portfolio->id,
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
            ];
        }

        $portfolio->translations()->createMany($translations);

        }
    }
}
