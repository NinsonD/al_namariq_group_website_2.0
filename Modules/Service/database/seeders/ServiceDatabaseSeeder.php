<?php

namespace Modules\Service\Database\Seeders;


use Illuminate\Database\Seeder;
use Modules\Service\Models\Service;

class ServiceDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('admin/img/files/services');
        copyFilesToStorage($sourcePath, 'services');

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

        $services = [
            [
                'slug' => 'seo-marketing',
                'status' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'SEO Marketing',
                        'short_description' => 'Boost your search visibility and rank higher on Google.',
                        'description' => $description,
                        'category' => 'Marketing',
                        'seo_title' => 'SEO Marketing Service',
                        'seo_keywords' => 'seo, marketing, visibility',
                        'seo_description' => 'Improve your search engine ranking with expert SEO strategies.'
                    ],
                    'hi' => [
                        'title' => 'एसईओ मार्केटिंग',
                        'short_description' => 'अपनी खोज दृश्यता बढ़ाएं और Google पर उच्च रैंक करें।',
                        'description' => $description_hi,
                        'category' => 'मार्केटिंग',
                        'seo_title' => 'एसईओ मार्केटिंग सेवा',
                        'seo_keywords' => 'एसईओ, मार्केटिंग, दृश्यता',
                        'seo_description' => 'विशेषज्ञ रणनीतियों के साथ अपनी वेबसाइट की रैंकिंग सुधारें।'
                    ],
                    'ar' => [
                        'title' => 'تسويق SEO',
                        'short_description' => 'عزز ظهورك في محركات البحث واحتل المراتب الأولى.',
                        'description' => $description_ar,
                        'category' => 'تسويق',
                        'seo_title' => 'خدمة تسويق SEO',
                        'seo_keywords' => 'seo، تسويق، ظهور',
                        'seo_description' => 'قم بتحسين ترتيب موقعك باستخدام استراتيجيات SEO الفعالة.'
                    ],
                ]
            ],
            [
                'slug' => 'branding-strategy',
                'status' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Branding Strategy',
                        'short_description' => 'Shape a unique identity that speaks your brand’s voice.',
                        'description' => $description,
                        'category' => 'Branding',
                        'seo_title' => 'Professional Branding Strategy',
                        'seo_keywords' => 'branding, strategy, identity',
                        'seo_description' => 'Develop a powerful branding strategy to stand out in your industry.'
                    ],
                    'hi' => [
                        'title' => 'ब्रांडिंग रणनीति',
                        'short_description' => 'अपने ब्रांड की पहचान बनाएं जो आपकी आवाज़ को दर्शाए।',
                        'description' => $description_hi,
                        'category' => 'ब्रांडिंग',
                        'seo_title' => 'पेशेवर ब्रांडिंग रणनीति',
                        'seo_keywords' => 'ब्रांडिंग, रणनीति, पहचान',
                        'seo_description' => 'अपने उद्योग में अलग दिखने के लिए एक शक्तिशाली ब्रांडिंग रणनीति विकसित करें।'
                    ],
                    'ar' => [
                        'title' => 'استراتيجية العلامة التجارية',
                        'short_description' => 'صمم هوية فريدة تنقل صوت علامتك التجارية.',
                        'description' => $description_ar,
                        'category' => 'العلامة التجارية',
                        'seo_title' => 'استراتيجية العلامة التجارية الاحترافية',
                        'seo_keywords' => 'العلامة التجارية، الاستراتيجية، الهوية',
                        'seo_description' => 'قم بتطوير استراتيجية علامة تجارية قوية لتمييزك في السوق.'
                    ],
                ]
            ],
            [
                'slug' => 'web-development',
                'status' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Web Development',
                        'short_description' => 'Custom websites tailored to your business needs.',
                        'description' => $description,
                        'category' => 'Development',
                        'seo_title' => 'Custom Web Development',
                        'seo_keywords' => 'web development, websites, custom solutions',
                        'seo_description' => 'Build modern websites tailored to your brand’s goals.'
                    ],
                    'hi' => [
                        'title' => 'वेब विकास',
                        'short_description' => 'आपके व्यवसाय की आवश्यकताओं के अनुसार कस्टम वेबसाइट्स।',
                        'description' => $description_hi,
                        'category' => 'विकास',
                        'seo_title' => 'कस्टम वेब विकास',
                        'seo_keywords' => 'वेब विकास, वेबसाइट्स, समाधान',
                        'seo_description' => 'अपने ब्रांड के लक्ष्यों के अनुसार आधुनिक वेबसाइट बनाएं।'
                    ],
                    'ar' => [
                        'title' => 'تطوير المواقع',
                        'short_description' => 'مواقع إلكترونية مخصصة وفقًا لاحتياجات عملك.',
                        'description' => $description_ar,
                        'category' => 'تطوير',
                        'seo_title' => 'تطوير مواقع مخصصة',
                        'seo_keywords' => 'تطوير المواقع، المواقع، حلول مخصصة',
                        'seo_description' => 'أنشئ مواقع حديثة مخصصة لأهداف علامتك التجارية.'
                    ],
                ]
            ],
            [
                'slug' => 'ui-ux-design',
                'status' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'UI/UX Design',
                        'short_description' => 'User-centric designs for better engagement and experience.',
                        'description' => $description,
                        'category' => 'Design',
                        'seo_title' => 'UI/UX Design Services',
                        'seo_keywords' => 'ui, ux, design, user experience',
                        'seo_description' => 'Enhance usability and satisfaction with our UI/UX design services.',
                    ],
                    'hi' => [
                        'title' => 'यूआई/यूएक्स डिज़ाइन',
                        'short_description' => 'बेहतर अनुभव और सहभागिता के लिए उपयोगकर्ता-केंद्रित डिज़ाइन।',
                        'description' => $description_hi,
                        'category' => 'डिज़ाइन',
                        'seo_title' => 'यूआई/यूएक्स डिज़ाइन सेवाएँ',
                        'seo_keywords' => 'यूआई, यूएक्स, डिज़ाइन, उपयोगकर्ता अनुभव',
                        'seo_description' => 'हमारी यूआई/यूएक्स सेवाओं के साथ उपयोगिता और अनुभव में सुधार करें।',
                    ],
                    'ar' => [
                        'title' => 'تصميم UI/UX',
                        'short_description' => 'تصاميم تركز على المستخدم لتحسين التفاعل والتجربة.',
                        'description' => $description_ar,
                        'category' => 'تصميم',
                        'seo_title' => 'خدمات تصميم UI/UX',
                        'seo_keywords' => 'ui، ux، التصميم، تجربة المستخدم',
                        'seo_description' => 'حسّن تجربة المستخدم من خلال خدمات تصميم UI/UX الخاصة بنا.',
                    ],
                ],
            ],
            [
                'slug' => 'content-strategy',
                'status' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Content Strategy',
                        'short_description' => 'Build compelling narratives that resonate with your audience.',
                        'description' => $description,
                        'category' => 'Marketing',
                        'seo_title' => 'Content Strategy Services',
                        'seo_keywords' => 'content, strategy, digital marketing',
                        'seo_description' => 'Deliver impactful messages with our comprehensive content strategy services.',
                    ],
                    'hi' => [
                        'title' => 'सामग्री रणनीति',
                        'short_description' => 'ऐसी कहानियाँ बनाएं जो आपके दर्शकों से जुड़ें।',
                        'description' =>  $description_hi,
                        'category' => 'मार्केटिंग',
                        'seo_title' => 'सामग्री रणनीति सेवाएँ',
                        'seo_keywords' => 'सामग्री, रणनीति, डिजिटल मार्केटिंग',
                        'seo_description' => 'हमारी सेवाओं के साथ प्रभावशाली संदेश पहुँचाएँ।',
                    ],
                    'ar' => [
                        'title' => 'استراتيجية المحتوى',
                        'short_description' => 'أنشئ محتوى يلامس جمهورك ويحقق أهدافك.',
                        'description' => $description_ar,
                        'category' => 'تسويق',
                        'seo_title' => 'خدمات استراتيجية المحتوى',
                        'seo_keywords' => 'المحتوى، استراتيجية، التسويق الرقمي',
                        'seo_description' => 'قدّم رسائل مؤثرة من خلال خدمات استراتيجية المحتوى لدينا.',
                    ],
                ],
            ],
            [
                'slug' => 'social-media-management',
                'status' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Social Media Management',
                        'short_description' => 'Connect, engage, and grow your online presence.',
                        'description' => $description,
                        'category' => 'Marketing',
                        'seo_title' => 'Social Media Management Services',
                        'seo_keywords' => 'social media, engagement, growth',
                        'seo_description' => 'Boost brand engagement and awareness with expert social media management.',
                    ],
                    'hi' => [
                        'title' => 'सोशल मीडिया प्रबंधन',
                        'short_description' => 'कनेक्ट करें, जुड़ाव बढ़ाएं, और ऑनलाइन मौजूदगी मजबूत करें।',
                        'description' => $description_hi,
                        'category' => 'मार्केटिंग',
                        'seo_title' => 'सोशल मीडिया प्रबंधन सेवाएँ',
                        'seo_keywords' => 'सोशल मीडिया, जुड़ाव, विकास',
                        'seo_description' => 'सोशल मीडिया प्रबंधन से ब्रांड को नई ऊँचाइयों पर पहुँचाएँ।',
                    ],
                    'ar' => [
                        'title' => 'إدارة وسائل التواصل الاجتماعي',
                        'short_description' => 'تواصل، تفاعل، وانمو مع جمهورك.',
                        'description' => $description_ar,
                        'category' => 'تسويق',
                        'seo_title' => 'خدمات إدارة وسائل التواصل الاجتماعي',
                        'seo_keywords' => 'وسائل التواصل، التفاعل، النمو',
                        'seo_description' => 'عزز التفاعل والوعي بالعلامة التجارية من خلال إدارة وسائل التواصل الاجتماعي.',
                    ],
                ],
            ],
            [
                'slug' => 'email-marketing',
                'status' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Email Marketing',
                        'short_description' => 'Nurture leads and boost conversions through targeted campaigns.',
                        'description' => $description,
                        'category' => 'Marketing',
                        'seo_title' => 'Email Marketing Solutions',
                        'seo_keywords' => 'email marketing, campaigns, conversions',
                        'seo_description' => 'Drive engagement with impactful email campaigns.',
                    ],
                    'hi' => [
                        'title' => 'ईमेल मार्केटिंग',
                        'short_description' => 'लक्ष्यित अभियानों के माध्यम से लीड को पोषित करें और रूपांतरण बढ़ाएं।',
                        'description' => $description_hi,
                        'category' => 'मार्केटिंग',
                        'seo_title' => 'ईमेल मार्केटिंग समाधान',
                        'seo_keywords' => 'ईमेल मार्केटिंग, अभियान, रूपांतरण',
                        'seo_description' => 'प्रभावशाली ईमेल अभियानों से जुड़ाव बढ़ाएँ।',
                    ],
                    'ar' => [
                        'title' => 'التسويق عبر البريد الإلكتروني',
                        'short_description' => 'قم برعاية العملاء المحتملين وزيادة التحويلات من خلال الحملات المستهدفة.',
                        'description' => $description_ar,
                        'category' => 'تسويق',
                        'seo_title' => 'حلول التسويق عبر البريد الإلكتروني',
                        'seo_keywords' => 'البريد الإلكتروني، الحملات، التحويلات',
                        'seo_description' => 'عزز التفاعل من خلال حملات بريد إلكتروني مؤثرة.',
                    ],
                ],
            ],
            [
                'slug' => 'ecommerce-solutions',
                'status' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'E-commerce Solutions',
                        'short_description' => 'Launch and scale your online store seamlessly.',
                        'description' => $description,
                        'category' => 'Development',
                        'seo_title' => 'Complete E-commerce Services',
                        'seo_keywords' => 'ecommerce, online store, development',
                        'seo_description' => 'Grow your online business with reliable e-commerce solutions.',
                    ],
                    'hi' => [
                        'title' => 'ई-कॉमर्स समाधान',
                        'short_description' => 'अपने ऑनलाइन स्टोर को आसानी से लॉन्च और स्केल करें।',
                        'description' => $description_hi,
                        'category' => 'विकास',
                        'seo_title' => 'पूर्ण ई-कॉमर्स सेवाएँ',
                        'seo_keywords' => 'ई-कॉमर्स, ऑनलाइन स्टोर, विकास',
                        'seo_description' => 'विश्वसनीय ई-कॉमर्स समाधानों के साथ अपने व्यवसाय को बढ़ाएँ।',
                    ],
                    'ar' => [
                        'title' => 'حلول التجارة الإلكترونية',
                        'short_description' => 'أطلق متجرك الإلكتروني ووسعه بسهولة.',
                        'description' => $description_ar,
                        'category' => 'تطوير',
                        'seo_title' => 'خدمات التجارة الإلكترونية الكاملة',
                        'seo_keywords' => 'تجارة إلكترونية، متجر إلكتروني، تطوير',
                        'seo_description' => 'نمِ أعمالك عبر الإنترنت من خلال حلول التجارة الإلكترونية الموثوقة.',
                    ],
                ],
            ],
            [
                'slug' => 'creative-copywriting',
                'status' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Creative Copywriting',
                        'short_description' => 'Words that sell, stories that stick.',
                        'description' => $description,
                        'category' => 'Content',
                        'seo_title' => 'Creative Copywriting Services',
                        'seo_keywords' => 'copywriting, storytelling, branding',
                        'seo_description' => 'Craft powerful copy that drives results.',
                    ],
                    'hi' => [
                        'title' => 'क्रिएटिव कॉपीराइटिंग',
                        'short_description' => 'बिकने वाले शब्द, यादगार कहानियाँ।',
                        'description' => $description_hi,
                        'category' => 'सामग्री',
                        'seo_title' => 'क्रिएटिव कॉपीराइटिंग सेवाएँ',
                        'seo_keywords' => 'कॉपीराइटिंग, कहानी, ब्रांडिंग',
                        'seo_description' => 'ऐसी कॉपी बनाएं जो परिणाम लाए।',
                    ],
                    'ar' => [
                        'title' => 'كتابة إبداعية',
                        'short_description' => 'كلمات تبيع وقصص لا تُنسى.',
                        'description' => $description_ar,
                        'category' => 'المحتوى',
                        'seo_title' => 'خدمات كتابة إبداعية',
                        'seo_keywords' => 'كتابة المحتوى، رواية القصص، العلامة التجارية',
                        'seo_description' => 'اكتب نصوصًا قوية تحقق النتائج.',
                    ],
                ],
            ],
            [
                'slug' => 'performance-audits',
                'status' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Performance Audits',
                        'short_description' => 'Optimize website speed, SEO, and user experience.',
                        'description' => $description,
                        'category' => 'Audit',
                        'seo_title' => 'Website Performance Audit',
                        'seo_keywords' => 'audit, performance, optimization',
                        'seo_description' => 'Identify and resolve performance bottlenecks through professional audits.',
                    ],
                    'hi' => [
                        'title' => 'प्रदर्शन ऑडिट',
                        'short_description' => 'वेबसाइट गति, एसईओ और उपयोगकर्ता अनुभव को अनुकूलित करें।',
                        'description' => $description_hi,
                        'category' => 'ऑडिट',
                        'seo_title' => 'वेबसाइट प्रदर्शन ऑडिट',
                        'seo_keywords' => 'ऑडिट, प्रदर्शन, अनुकूलन',
                        'seo_description' => 'पेशेवर ऑडिट के माध्यम से प्रदर्शन समस्याओं का समाधान करें।',
                    ],
                    'ar' => [
                        'title' => 'تدقيق الأداء',
                        'short_description' => 'قم بتحسين سرعة الموقع، وتحسين محركات البحث، وتجربة المستخدم.',
                        'description' => $description_ar,
                        'category' => 'تدقيق',
                        'seo_title' => 'تدقيق أداء الموقع',
                        'seo_keywords' => 'تدقيق، الأداء، التحسين',
                        'seo_description' => 'حدد مشكلات الأداء وحلها من خلال تدقيق احترافي.',
                    ],
                ],
            ],
        ];


       foreach ($services as $index => $service) {
            $serviceModel = Service::create([
                'slug' => $service['slug'],
                'image' => 'uploads/services/service-' . ($index + 1) . '.jpg',
                'icon' => 'uploads/services/icon-' . ($index + 1) . '.png',
                'tags' => $tagGroups[$index % count($tagGroups)],
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $translations = [];
            foreach ($service['translations'] as $locale => $trans) {
                $translations[] = [
                    'service_id' => $serviceModel->id,
                    'locale' => $locale,
                    'title' => $trans['title'],
                    'short_description' => $trans['short_description'],
                    'description' => $trans['description'],
                    'category' => $trans['category'],
                    'seo_title' => $trans['seo_title'],
                    'seo_keywords' => $trans['seo_keywords'],
                    'seo_description' => $trans['seo_description'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            $serviceModel->translations()->createMany($translations);
        }

    }
}
