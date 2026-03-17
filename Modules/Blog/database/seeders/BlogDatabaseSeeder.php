<?php

namespace Modules\Blog\Database\Seeders;

use App\Models\User;
use Modules\Blog\Models\Blog;
use Illuminate\Database\Seeder;
use Modules\Blog\Models\BlogCategory;

class BlogDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('admin/img/files/blog');
        copyFilesToStorage($sourcePath, 'blog');
        $description_en = '<h4><strong>Building a Memorable Brand Identity: A Creative Agency\'s Approach</strong></h4>
                            <p>In a crowded marketplace, a strong brand identity is what sets a business apart. At our creative agency, we specialize in transforming ideas into powerful visual stories that connect emotionally and leave lasting impressions.</p>

                            <h4><strong>Why Brand Identity Matters</strong></h4>
                            <ul>
                                <li>Establishes trust and credibility with your audience</li>
                                <li>Creates consistency across all marketing channels</li>
                                <li>Enhances recognition and memorability</li>
                                <li>Increases perceived value of products or services</li>
                            </ul>

                            <h4><strong>Core Elements of a Strong Brand Identity</strong></h4>
                            <ol>
                                <li>
                                    <p><strong>Logo Design</strong><br>We craft timeless and versatile logos that reflect your brand’s essence and speak to your target audience.</p>
                                </li>
                                <li>
                                    <p><strong>Typography & Color Palette</strong><br>Fonts and colors are carefully chosen to support your brand tone and improve visual harmony.</p>
                                </li>
                                <li>
                                    <p><strong>Brand Voice & Messaging</strong><br>We help define your voice to ensure consistent communication across all platforms — from taglines to content.</p>
                                </li>
                                <li>
                                    <p><strong>Visual Assets</strong><br>Custom icons, graphics, and patterns are designed to enrich your brand toolkit and support your storytelling.</p>
                                </li>
                                <li>
                                    <p><strong>Brand Guidelines</strong><br>We develop easy-to-follow guidelines to ensure your brand remains cohesive across all mediums and teams.</p>
                                </li>
                            </ol>

                            <h4><strong>Final Thoughts</strong></h4>
                            <p>Your brand is more than a logo — it\'s an experience. Our creative agency partners with you to build a complete brand system that resonates and performs. Whether you\'re launching a new venture or refreshing an existing one, we help you stand out and stay remembered.</p>
                            ';
            $description_hi = '<h4><strong>एक यादगार ब्रांड पहचान बनाना: एक क्रिएटिव एजेंसी का दृष्टिकोण</strong></h4>
                                <p>एक भीड़-भरे बाजार में, एक मजबूत ब्रांड पहचान ही व्यवसाय को अलग बनाती है। हमारी क्रिएटिव एजेंसी विचारों को प्रभावशाली दृश्य कहानियों में बदलने में माहिर है जो भावनात्मक रूप से जुड़ती हैं और स्थायी प्रभाव छोड़ती हैं।</p>

                                <h4><strong>ब्रांड पहचान क्यों महत्वपूर्ण है</strong></h4>
                                <ul>
                                    <li>आपके दर्शकों के साथ विश्वास और विश्वसनीयता स्थापित करती है</li>
                                    <li>सभी मार्केटिंग चैनलों में स्थिरता लाती है</li>
                                    <li>पहचान और याददाश्त को बेहतर बनाती है</li>
                                    <li>उत्पादों या सेवाओं के मूल्य को बढ़ाती है</li>
                                </ul>

                                <h4><strong>मजबूत ब्रांड पहचान के मुख्य तत्व</strong></h4>
                                <ol>
                                    <li>
                                        <p><strong>लोगो डिज़ाइन</strong><br>हम ऐसे लोगो डिज़ाइन करते हैं जो समय के साथ टिके रहें और आपके ब्रांड की आत्मा को दर्शाएँ।</p>
                                    </li>
                                    <li>
                                        <p><strong>टाइपोग्राफी और रंग योजना</strong><br>फॉन्ट्स और रंग सावधानीपूर्वक चुने जाते हैं ताकि वे ब्रांड के टोन को सपोर्ट करें।</p>
                                    </li>
                                    <li>
                                        <p><strong>ब्रांड वॉयस और मैसेजिंग</strong><br>हम आपकी आवाज़ को परिभाषित करने में मदद करते हैं ताकि सभी प्लेटफार्मों पर एक समान संचार सुनिश्चित हो सके।</p>
                                    </li>
                                    <li>
                                        <p><strong>विज़ुअल एसेट्स</strong><br>कस्टम आइकॉन्स, ग्राफिक्स और पैटर्न आपकी ब्रांड स्टोरी को सपोर्ट करने के लिए डिज़ाइन किए जाते हैं।</p>
                                    </li>
                                    <li>
                                        <p><strong>ब्रांड गाइडलाइन्स</strong><br>हम सरल गाइडलाइन्स तैयार करते हैं ताकि आपकी ब्रांड हर माध्यम में एक समान दिखे और महसूस हो।</p>
                                    </li>
                                </ol>

                                <h4><strong>अंतिम विचार</strong></h4>
                                <p>आपका ब्रांड सिर्फ एक लोगो नहीं है — यह एक अनुभव है। हमारी क्रिएटिव एजेंसी आपके साथ मिलकर एक संपूर्ण ब्रांड सिस्टम तैयार करती है जो प्रभाव छोड़ता है। नया ब्रांड लॉन्च करना हो या पुराना रीफ्रेश करना, हम आपको भीड़ में सबसे अलग बनाते हैं।</p>
                                ';
            $description_ar = '<h4><strong>بناء هوية علامة تجارية لا تُنسى: نهج وكالة إبداعية</strong></h4>
                                <p>في سوق مزدحم، تُعد هوية العلامة التجارية القوية ما يميز الأعمال عن غيرها. نحن في وكالتنا الإبداعية نُحول الأفكار إلى قصص بصرية قوية تخلق اتصالاً عاطفيًا وتترك انطباعًا دائمًا.</p>

                                <h4><strong>لماذا هوية العلامة التجارية مهمة</strong></h4>
                                <ul>
                                    <li>تعزز الثقة والمصداقية لدى الجمهور</li>
                                    <li>تضمن الاتساق عبر جميع قنوات التسويق</li>
                                    <li>تحسن التميّز وسهولة التذكر</li>
                                    <li>ترفع القيمة المتصورة للمنتجات أو الخدمات</li>
                                </ul>

                                <h4><strong>عناصر هوية العلامة التجارية القوية</strong></h4>
                                <ol>
                                    <li>
                                        <p><strong>تصميم الشعار</strong><br>نصمم شعارات خالدة ومتنوعة تعكس جوهر علامتك التجارية وتتحدث إلى جمهورك المستهدف.</p>
                                    </li>
                                    <li>
                                        <p><strong>الخطوط ولوحة الألوان</strong><br>نختار الخطوط والألوان بعناية لدعم نغمة العلامة التجارية وتحقيق الانسجام البصري.</p>
                                    </li>
                                    <li>
                                        <p><strong>نبرة العلامة التجارية والرسائل</strong><br>نساعدك على تحديد صوت علامتك التجارية لضمان اتساق التواصل عبر جميع المنصات.</p>
                                    </li>
                                    <li>
                                        <p><strong>العناصر البصرية</strong><br>نقوم بتصميم رموز ورسومات وأنماط مخصصة لدعم رواية قصتك البصرية.</p>
                                    </li>
                                    <li>
                                        <p><strong>دليل العلامة التجارية</strong><br>نُعد إرشادات بسيطة لضمان الحفاظ على هوية متماسكة عبر جميع الوسائط والفرق.</p>
                                    </li>
                                </ol>

                                <h4><strong>أفكار ختامية</strong></h4>
                                <p>علامتك التجارية ليست مجرد شعار — إنها تجربة كاملة. نحن نعمل معك لبناء نظام علامة تجارية متكامل يحقق التأثير ويضمن تميزك في السوق. سواء كنت تبدأ من جديد أو تعيد إطلاق علامتك، نحن هنا لنُبرزك.</p>
                                ';

        $allTags = [
            ['value' => 'Technology'],
            ['value' => 'Envato'],
            ['value' => 'SEO'],
            ['value' => 'UX / UI'],
            ['value' => 'Marketing'],
            ['value' => 'WordPress'],
            ['value' => 'SEO Report'],
            ['value' => 'Ecommerce'],
            ['value' => 'Marketing'],
            ['value' => 'Audit'],
            ['value' => 'On-Page'],
            ['value' => 'Keywords'],
            ['value' => 'Website'],
        ];

       $blogs = [
        [
            'slug' => 'future-of-ui-ux-design',

            'translations' => [
                'en' => [
                    'title' => 'The Future of UI/UX Design in 2025',
                    'short_description' => 'A journey of self-discovery and exploration that allows us to align our values, interests, and skills with our professional pursuitsplatea dictumst',
                    'description' => $description_en,
                    'seo_title' => 'UI/UX Design Trends 2025',
                    'seo_description' => 'Explore the future of UI/UX design with upcoming trends and strategies in 2025.',
                ],
                'hi' => [
                    'title' => '2025 में UI/UX डिज़ाइन का भविष्य',
                    'short_description' => 'एक ऐसी यात्रा जो हमें आत्म-खोज और अन्वेषण के ज़रिए हमारे मूल्यों, रुचियों और कौशल को पेशेवर लक्ष्यों से जोड़ने में मदद करती है।',
                    'description' => $description_hi,
                    'seo_title' => 'UI/UX डिज़ाइन रुझान 2025',
                    'seo_description' => '2025 में UI/UX डिज़ाइन के भविष्य को जानिए और रणनीतियों की खोज करें।',
                ],
                'ar' => [
                    'title' => 'مستقبل تصميم UI/UX في عام 2025',
                    'short_description' => 'رحلة لاكتشاف الذات تسمح لنا بمحاذاة القيم والاهتمامات والمهارات مع مساعينا المهنية في عالم التصميم الرقمي المتغير.',
                    'description' => $description_ar,
                    'seo_title' => 'اتجاهات تصميم UI/UX في 2025',
                    'seo_description' => 'استكشف مستقبل تصميم UI/UX واستراتيجياته في عام 2025.',
                ],
            ],
        ],
        [
            'slug' => 'ai-and-digital-marketing',
            'translations' => [
                'en' => [
                    'title' => 'How AI is Revolutionizing Digital Marketing',
                    'short_description' => 'Artificial intelligence is reshaping digital marketing through personalization, automation, and smart insights that increase performance and engagement.',
                    'description' => $description_en,
                    'seo_title' => 'AI in Digital Marketing',
                    'seo_description' => 'Explore the role of AI in transforming modern digital marketing strategies.',
                ],
                'hi' => [
                    'title' => 'डिजिटल मार्केटिंग में एआई का क्रांतिकारी प्रभाव',
                    'short_description' => 'आर्टिफिशियल इंटेलिजेंस अब डिजिटल मार्केटिंग को निजीकृत अनुभवों, स्वचालन और स्मार्ट रणनीतियों के माध्यम से नई ऊंचाई पर ले जा रहा है।',
                    'description' => $description_hi,
                    'seo_title' => 'डिजिटल मार्केटिंग में एआई',
                    'seo_description' => 'आधुनिक डिजिटल मार्केटिंग रणनीतियों में एआई की भूमिका की खोज करें।',
                ],
                'ar' => [
                    'title' => 'كيف تُحدث الذكاء الاصطناعي ثورة في التسويق الرقمي',
                    'short_description' => 'الذكاء الاصطناعي يعيد تشكيل التسويق الرقمي من خلال التخصيص والأتمتة والرؤى الذكية لتحسين الأداء وزيادة التفاعل.',
                    'description' => $description_ar,
                    'seo_title' => 'الذكاء الاصطناعي في التسويق الرقمي',
                    'seo_description' => 'استكشف دور الذكاء الاصطناعي في تحويل استراتيجيات التسويق الرقمي الحديثة.',
                ],
            ],
        ],
        [
            'slug' => 'website-speed-optimization',
            'translations' => [
                'en' => [
                    'title' => 'Top Techniques to Speed Up Your Website in 2025',
                    'short_description' => 'Website performance is crucial—implement advanced optimization strategies to improve speed, user experience, and SEO ranking significantly.',
                    'description' => $description_en,
                    'seo_title' => 'Website Speed Optimization',
                    'seo_description' => 'Boost performance with advanced website speed optimization tips.',
                ],
                'hi' => [
                    'title' => '2025 में अपनी वेबसाइट को तेज़ बनाने की शीर्ष तकनीकें',
                    'short_description' => 'वेबसाइट की गति और प्रदर्शन को बेहतर बनाने के लिए आधुनिक अनुकूलन तकनीकों का उपयोग करें, जिससे UX और SEO में सुधार हो सके।',
                    'description' => $description_hi,
                    'seo_title' => 'वेबसाइट स्पीड अनुकूलन',
                    'seo_description' => 'वेबसाइट की गति बढ़ाने के लिए उन्नत युक्तियों का पालन करें।',
                ],
                'ar' => [
                    'title' => 'أفضل تقنيات تسريع مواقع الويب في عام 2025',
                    'short_description' => 'تحسين سرعة الموقع أمر ضروري لتعزيز تجربة المستخدم والترتيب في محركات البحث باستخدام تقنيات متقدمة وفعالة.',
                    'description' => $description_ar,
                    'seo_title' => 'تحسين سرعة الموقع',
                    'seo_description' => 'عزز الأداء باستخدام تقنيات متقدمة لتسريع المواقع.',
                ],
            ],
        ],
        [
            'slug' => 'social-media-brand-building',
            'translations' => [
                'en' => [
                    'title' => 'Building a Powerful Brand Through Social Media',
                    'short_description' => 'Harness the power of top social platforms to build meaningful brand identity, foster loyal communities, and increase overall engagement online.',
                    'description' => $description_en,
                    'seo_title' => 'Social Media Branding Guide',
                    'seo_description' => 'Tips and tools for building a strong brand presence on social media.',
                ],
                'hi' => [
                    'title' => 'सोशल मीडिया के ज़रिए ब्रांड की ताकत बनाएं',
                    'short_description' => 'सोशल मीडिया प्लेटफॉर्म्स का उपयोग करके ब्रांड पहचान बनाएं, वफादार समुदायों को बढ़ाएं और ऑनलाइन सहभागिता को सशक्त करें।',
                    'description' => $description_hi,
                    'seo_title' => 'सोशल मीडिया ब्रांडिंग गाइड',
                    'seo_description' => 'सोशल मीडिया पर मजबूत ब्रांड उपस्थिति के लिए सुझाव और उपकरण।',
                ],
                'ar' => [
                    'title' => 'بناء علامة تجارية قوية من خلال وسائل التواصل الاجتماعي',
                    'short_description' => 'استخدم منصات التواصل الاجتماعي الرائدة لبناء هوية قوية للعلامة التجارية وتعزيز التفاعل والمجتمعات المخلصة.',
                    'description' => $description_ar,
                    'seo_title' => 'دليل العلامة التجارية عبر وسائل التواصل',
                    'seo_description' => 'أدوات ونصائح لبناء حضور قوي على وسائل التواصل الاجتماعي.',
                ],
            ],
        ],
        [
            'slug' => 'content-marketing-strategy',
            'translations' => [
                'en' => [
                    'title' => 'Winning Content Marketing Strategy for Agencies',
                    'short_description' => 'Content marketing drives conversions—crafting strategy, understanding audience needs, and delivering value leads to scalable digital success.',
                    'description' => $description_en,
                    'seo_title' => 'Content Marketing Strategy for Growth',
                    'seo_description' => 'Craft powerful content strategies that bring measurable results.',
                ],
                'hi' => [
                    'title' => 'एजेंसियों के लिए विजयी कंटेंट मार्केटिंग रणनीति',
                    'short_description' => 'कंटेंट रणनीति रूपांतरण को बढ़ावा देती है—सही योजना, दर्शकों की समझ और मूल्य प्रदान करना डिजिटल सफलता की कुंजी है।',
                    'description' => $description_hi,
                    'seo_title' => 'ग्रोथ के लिए कंटेंट मार्केटिंग रणनीति',
                    'seo_description' => 'मापनीय परिणामों के लिए शक्तिशाली कंटेंट रणनीतियाँ बनाएं।',
                ],
                'ar' => [
                    'title' => 'استراتيجية تسويق المحتوى الناجحة للوكالات',
                    'short_description' => 'يؤدي تسويق المحتوى الفعال إلى نتائج—التخطيط، وفهم الجمهور، وتقديم قيمة حقيقية تساعدك على النجاح في البيئة الرقمية الحديثة.',
                    'description' => $description_ar,
                    'seo_title' => 'استراتيجية تسويق المحتوى للنمو',
                    'seo_description' => 'اصنع استراتيجيات محتوى قوية تحقق نتائج قابلة للقياس.',
                ],
            ],
        ],
        [
            'slug' => 'email-marketing-best-practices',
            'is_popular' => 1,
            'translations' => [
                'en' => [
                    'title' => 'Best Practices for High-Conversion Email Marketing',
                    'short_description' => 'Drive results with email marketing by crafting compelling content, using A/B testing, automating flows, and optimizing for deliverability.',
                    'description' => $description_en,
                    'seo_title' => 'Email Marketing Tips for Agencies',
                    'seo_description' => 'Boost conversion with effective email marketing practices.',
                ],
                'hi' => [
                    'title' => 'उच्च रूपांतरण ईमेल मार्केटिंग के लिए सर्वोत्तम प्रथाएं',
                    'short_description' => 'ईमेल अभियानों में सफलता के लिए विषय पंक्तियों, A/B परीक्षण, स्वचालन और मोबाइल प्रतिक्रिया पर ध्यान देना आवश्यक है।',
                    'description' => $description_hi,
                    'seo_title' => 'एजेंसियों के लिए ईमेल मार्केटिंग टिप्स',
                    'seo_description' => 'प्रभावी ईमेल मार्केटिंग प्रथाओं से रूपांतरण बढ़ाएं।',
                ],
                'ar' => [
                    'title' => 'أفضل الممارسات للتسويق عبر البريد الإلكتروني عالي التحويل',
                    'short_description' => 'حقق نتائج ملموسة من خلال محتوى جذاب، تجارب A/B، تحسين قابلية التسليم، والتخصيص في حملات التسويق عبر البريد الإلكتروني.',
                    'description' => $description_ar,
                    'seo_title' => 'نصائح التسويق عبر البريد الإلكتروني للوكالات',
                    'seo_description' => 'عزز التحويل باستخدام ممارسات فعالة في التسويق عبر البريد الإلكتروني.',
                ],
            ],
        ],
        [
            'slug' => 'ecommerce-trends-2025',
            'is_popular' => 1,
            'translations' => [
                'en' => [
                    'title' => 'Top E-Commerce Trends to Watch in 2025',
                    'short_description' => 'Stay competitive in 2025 with insights into AI-driven commerce, seamless mobile experiences, personalized shopping, and sustainability focus.',
                    'description' => $description_en,
                    'seo_title' => '2025 E-Commerce Trends',
                    'seo_description' => 'Key insights into the future of e-commerce and retail technology.',
                ],
                'hi' => [
                    'title' => '2025 में प्रमुख ई-कॉमर्स रुझान',
                    'short_description' => 'AI, पर्सनलाइज़ेशन, मोबिलिटी और स्थिरता के रुझान 2025 के ई-कॉमर्स में निर्णायक भूमिका निभाएंगे। इन पर ध्यान देना ज़रूरी है।',
                    'description' => $description_hi,
                    'seo_title' => '2025 ई-कॉमर्स ट्रेंड्स',
                    'seo_description' => 'ई-कॉमर्स और रिटेल टेक्नोलॉजी के भविष्य में अंतर्दृष्टि।',
                ],
                'ar' => [
                    'title' => 'اتجاهات التجارة الإلكترونية في عام 2025',
                    'short_description' => 'ابقَ متقدماً من خلال تتبع تطورات التجارة الإلكترونية مثل الذكاء الاصطناعي، التجارب المحمولة، التخصيص، والاستدامة في تجربة العملاء.',
                    'description' => $description_ar,
                    'seo_title' => 'اتجاهات التجارة الإلكترونية 2025',
                    'seo_description' => 'رؤى حول مستقبل التجارة الإلكترونية وتقنية البيع بالتجزئة.',
                ],
            ],
        ],
        [
            'slug' => 'google-ranking-factors-2025',
            'translations' => [
                'en' => [
                    'title' => 'Top 10 Google Ranking Factors for 2025',
                    'short_description' => 'Understand 2025 SEO: page speed, user intent, content quality, mobile UX, backlinks, Core Web Vitals, structured data, and engagement metrics.',
                    'description' => $description_en,
                    'seo_title' => 'Google SEO Ranking Signals 2025',
                    'seo_description' => 'Uncover the SEO factors that will impact your rankings in 2025.',
                ],
                'hi' => [
                    'title' => '2025 के लिए टॉप 10 गूगल रैंकिंग फैक्टर्स',
                    'short_description' => 'SEO में सफलता के लिए पृष्ठ गति, कंटेंट गुणवत्ता, मोबाइल UX, बैकलिंक्स, डेटा संरचना और उपयोगकर्ता उद्देश्य महत्वपूर्ण हैं।',
                    'description' => $description_hi,
                    'seo_title' => 'गूगल SEO रैंकिंग सिग्नल्स 2025',
                    'seo_description' => '2025 में आपकी रैंकिंग को प्रभावित करने वाले SEO कारक खोजें।',
                ],
                'ar' => [
                    'title' => 'أفضل 10 عوامل ترتيب في جوجل لعام 2025',
                    'short_description' => 'فهم عوامل SEO 2025 يشمل سرعة الصفحات، جودة المحتوى، تجربة الهاتف المحمول، الباك لينك، البيانات المنظمة والمشاركة.',
                    'description' => $description_ar,
                    'seo_title' => 'إشارات تصنيف Google SEO 2025',
                    'seo_description' => 'اكتشف عوامل تحسين محركات البحث التي ستؤثر على ترتيبك في عام 2025.',
                ],
            ],
        ],
        [
            'slug' => 'remote-agency-success-tips',
            'is_popular' => 1,
            'translations' => [
                'en' => [
                    'title' => 'How to Run a Successful Remote Agency',
                    'short_description' => 'Build a thriving remote agency with tools for communication, project management, trust-building, and high-performance team culture.',
                    'description' => $description_en,
                    'seo_title' => 'Remote Agency Growth Tips',
                    'seo_description' => 'Learn to scale your agency with remote workflows and collaboration tools.',
                ],
                'hi' => [
                    'title' => 'एक सफल रिमोट एजेंसी कैसे चलाएं',
                    'short_description' => 'संचार, कार्य प्रबंधन और विश्वास निर्माण के सही टूल्स से एक सफल रिमोट टीम और संस्कृति बनाना संभव है।',
                    'description' => $description_hi,
                    'seo_title' => 'रिमोट एजेंसी ग्रोथ टिप्स',
                    'seo_description' => 'रिमोट कार्यप्रवाह और सहयोग टूल्स के साथ अपनी एजेंसी को बढ़ाएं।',
                ],
                'ar' => [
                    'title' => 'كيفية تشغيل وكالة عن بُعد ناجحة',
                    'short_description' => 'أنشئ وكالة عن بُعد ناجحة باستخدام أدوات فعالة لإدارة المشاريع، التواصل، بناء الثقة، وتحفيز الفرق على الأداء العالي.',
                    'description' => $description_ar,
                    'seo_title' => 'نصائح نمو الوكالة عن بُعد',
                    'seo_description' => 'تعلم كيفية توسيع وكالتك باستخدام أدوات التعاون عن بُعد.',
                ],
            ],
        ],
    ];




        $this->call([
            BlogCategorySeeder::class,
        ]);


        foreach ($blogs as $index => $blog) {
            $index++;
            // 1. Prepare Tags
            $tagCount = rand(2, 3);
            $shuffled = $allTags;
            shuffle($shuffled);
            $randomTags = array_slice($shuffled, 0, $tagCount);

            // 2. Prepare Category and User IDs
            $blogCategoryIds = BlogCategory::pluck('id')->toArray();
            $userId = User::active()->pluck('id')->random();

            // 3. Create the blog entry
            $newBlog = Blog::create([
                'user_id' => $userId,
                'blog_category_id' => $blogCategoryIds[array_rand($blogCategoryIds)],
                'slug' => $blog['slug'],
                'image' => "uploads/blog/blog-{$index}.jpg",
                'tags' => $randomTags,
                'status' => $blog['status'] ?? 1,
                'show_homepage' => 1,
                'is_popular' => $blog['is_popular'] ?? 0,
            ]);

            // 4. Prepare translations
            $translations = [];
            foreach ($blog['translations'] as $locale => $trans) {
                $translations[] = [
                    'locale' => $locale,
                    'title' => $trans['title'],
                    'short_description' => $trans['short_description'] ?? null,
                    'description' => $trans['description'] ?? null,
                    'seo_title' => $trans['seo_title'] ?? null,
                    'seo_description' => $trans['seo_description'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // 5. Insert translations in bulk
            $newBlog->translations()->createMany($translations);
        }


        $this->call([
            BlogCommentSeeder::class,
        ]);
    }
}

