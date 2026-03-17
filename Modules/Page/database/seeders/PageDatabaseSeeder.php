<?php

namespace Modules\Page\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Page\Models\Page;

class PageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $privacy_page = [
            'slug' => 'privacy-policy',
            'status' => 1,
            'translations' => [
                'en' => [
                    'title' => 'Privacy & Policy',
                    'content' => '<h2 class="title">Who we are</h2>
                            <p><b>Example text:</b> The official address of our website is: https://yourwebsite.com</p>
                            <h6 class="title">Comments</h6>
                            <p><b>Example text:</b> When visitors post comments, we collect the information entered in the comment form, along with the visitor\'s IP address and browser user agent, to aid in spam prevention.</p>
                            <p>A hashed version of your email address might be shared with the Gravatar service to check if you\'re registered there. The Gravatar privacy policy can be found at: https://automattic.com/privacy/. Once your comment is approved, your profile image becomes visible to the public beside your comment.</p>
                            <h6 class="title">Media</h6>
                            <p><b>Example text:</b> When uploading images to this site, it\'s advisable to avoid including location data (EXIF GPS) in the files. Others can download and extract that data from publicly available images.</p>
                            <h6 class="title">Cookies</h6>
                            <p><b>Example text:</b> If you leave a comment, you may choose to save your name, email, and website in cookies. These are for your convenience, so you won\'t need to retype your information for future comments. These cookies are set to last for one year.</p>
                            <p>When visiting our login page, we set a temporary cookie to check whether your browser supports cookies. It doesn\'t contain personal information and is removed when you close your browser.</p>
                            <p>Upon logging in, we use cookies to store login status and display preferences. Login cookies last for two days; display preference cookies last for a year. If you select "Remember Me", your login will remain for two weeks. Logging out removes the login cookies.</p>
                            <p>When editing or publishing an article, a cookie is saved in your browser containing the post ID of the edited article. This cookie contains no personal info and expires after 24 hours.</p>
                            <h6 class="title">Embedded content from other websites</h6>
                            <p><b>Example text:</b> Articles on our site may include embedded elements like videos, images, or external articles. These behave as though the visitor had visited the third-party site directly.</p>
                            <p>Such external websites might collect data about you, utilize cookies, embed third-party tracking, and track your interaction with the embedded item, particularly if you\'re logged into those external sites.</p>
                            <p>Registered users (if registration is available) have their provided data saved in their user profiles. Users may view, update, or delete their personal info at any time (except for their username). Site admins can also view and edit that information.</p>',
                    ],
                'hi' => [
                    'title' => 'गोपनीयता और नीति',
                    'content' => '<h2 class="title">हम कौन हैं</h2>
                            <p><b>उदाहरण पाठ:</b> हमारी वेबसाइट का आधिकारिक पता है: https://yourwebsite.com</p>

                            <h6 class="title">टिप्पणियाँ</h6>
                            <p><b>उदाहरण पाठ:</b> जब आगंतुक टिप्पणियाँ पोस्ट करते हैं, तो हम स्पैम रोकथाम में सहायता के लिए टिप्पणी फॉर्म में दर्ज जानकारी, आगंतुक का IP पता और ब्राउज़र यूज़र एजेंट एकत्र करते हैं।</p>
                            <p>आपके ईमेल पते का हैश संस्करण Gravatar सेवा के साथ साझा किया जा सकता है यह जांचने के लिए कि आप वहाँ पंजीकृत हैं या नहीं। Gravatar की गोपनीयता नीति यहाँ देखी जा सकती है: https://automattic.com/privacy/. आपकी टिप्पणी स्वीकृत होने के बाद, आपकी प्रोफ़ाइल छवि सार्वजनिक रूप से आपकी टिप्पणी के पास प्रदर्शित की जाएगी।</p>

                            <h6 class="title">मीडिया</h6>
                            <p><b>उदाहरण पाठ:</b> जब आप इस साइट पर चित्र अपलोड करते हैं, तो यह सलाह दी जाती है कि आप फ़ाइलों में स्थान डेटा (EXIF GPS) शामिल न करें। अन्य लोग सार्वजनिक छवियों से यह डेटा डाउनलोड और निकाल सकते हैं।</p>

                            <h6 class="title">कुकीज़</h6>
                            <p><b>उदाहरण पाठ:</b> यदि आप कोई टिप्पणी छोड़ते हैं, तो आप अपना नाम, ईमेल और वेबसाइट कुकीज़ में सहेजने का विकल्प चुन सकते हैं। यह आपकी सुविधा के लिए है ताकि अगली बार टिप्पणी करते समय आपको जानकारी फिर से टाइप न करनी पड़े। ये कुकीज़ एक वर्ष तक बनी रहती हैं।</p>
                            <p>जब आप हमारे लॉगिन पेज पर जाते हैं, तो हम एक अस्थायी कुकी सेट करते हैं यह जांचने के लिए कि आपका ब्राउज़र कुकीज़ का समर्थन करता है या नहीं। इसमें कोई व्यक्तिगत जानकारी नहीं होती और जब आप ब्राउज़र बंद करते हैं तो यह हट जाती है।</p>
                            <p>लॉग इन करने के बाद, हम लॉगिन स्थिति और प्रदर्शन प्राथमिकताओं को सहेजने के लिए कुकीज़ का उपयोग करते हैं। लॉगिन कुकीज़ दो दिन तक रहती हैं; प्रदर्शन कुकीज़ एक वर्ष तक। यदि आपने "मुझे याद रखें" चुना है, तो आपका लॉगिन दो सप्ताह तक रहेगा। लॉगआउट करने पर लॉगिन कुकीज़ हटा दी जाती हैं।</p>
                            <p>जब आप कोई लेख संपादित या प्रकाशित करते हैं, तो आपके ब्राउज़र में एक कुकी सहेजी जाती है जिसमें संपादित लेख का पोस्ट ID होता है। यह कुकी कोई व्यक्तिगत जानकारी नहीं रखती और 24 घंटे में समाप्त हो जाती है।</p>

                            <h6 class="title">अन्य वेबसाइटों से एम्बेड की गई सामग्री</h6>
                            <p><b>उदाहरण पाठ:</b> हमारी साइट पर लेखों में वीडियो, चित्र या अन्य वेबसाइटों के लेख जैसे एम्बेडेड तत्व हो सकते हैं। ये ऐसे व्यवहार करते हैं जैसे आगंतुक ने सीधे उस तीसरे पक्ष की साइट पर दौरा किया हो।</p>
                            <p>ऐसी बाहरी साइटें आपके बारे में डेटा एकत्र कर सकती हैं, कुकीज़ का उपयोग कर सकती हैं, तृतीय-पक्ष ट्रैकिंग को एम्बेड कर सकती हैं, और यदि आप लॉग इन हैं तो आपके इंटरैक्शन को ट्रैक कर सकती हैं।</p>
                            <p>पंजीकृत उपयोगकर्ताओं (यदि पंजीकरण उपलब्ध है) की प्रदान की गई जानकारी उनके उपयोगकर्ता प्रोफ़ाइल में सहेजी जाती है। उपयोगकर्ता अपनी व्यक्तिगत जानकारी कभी भी देख, अपडेट या हटा सकते हैं (यूज़रनेम को छोड़कर)। साइट व्यवस्थापक भी उस जानकारी को देख और संपादित कर सकते हैं।</p>'
                ],
                'ar' => [
                    'title' => 'من نحن',
                    'content' => '<h2 class="title">من نحن</h2>
                                <p><b>نص توضيحي:</b> العنوان الرسمي لموقعنا هو: https://yourwebsite.com</p>

                                <h6 class="title">التعليقات</h6>
                                <p><b>نص توضيحي:</b> عندما يترك الزوار تعليقات، نقوم بجمع المعلومات المدخلة في نموذج التعليق، بالإضافة إلى عنوان IP الخاص بالزائر ووكيل مستخدم المتصفح، للمساعدة في اكتشاف الرسائل المزعجة (سبام).</p>
                                <p>قد يتم تقديم نسخة مشفرة من بريدك الإلكتروني إلى خدمة Gravatar للتحقق مما إذا كنت مسجلاً لديهم. يمكنك الاطلاع على سياسة الخصوصية الخاصة بـ Gravatar هنا: https://automattic.com/privacy/. بعد الموافقة على تعليقك، ستظهر صورة ملفك الشخصي للعامة بجوار تعليقك.</p>

                                <h6 class="title">الوسائط</h6>
                                <p><b>نص توضيحي:</b> عند رفع صور إلى الموقع، يُنصح بعدم تضمين بيانات الموقع (EXIF GPS) في الملفات. يمكن للآخرين تنزيل هذه الصور واستخراج تلك البيانات منها.</p>

                                <h6 class="title">ملفات تعريف الارتباط (الكوكيز)</h6>
                                <p><b>نص توضيحي:</b> إذا تركت تعليقًا، يمكنك حفظ اسمك وبريدك الإلكتروني وموقعك الإلكتروني في ملفات تعريف الارتباط. هذا لراحتك حتى لا تضطر إلى إعادة إدخالها عند ترك تعليق آخر. تستمر هذه الكوكيز لمدة عام واحد.</p>
                                <p>عند زيارة صفحة تسجيل الدخول، نقوم بتعيين ملف تعريف ارتباط مؤقت للتحقق مما إذا كان متصفحك يدعم الكوكيز. لا يحتوي على أي معلومات شخصية ويتم حذفه عند إغلاق المتصفح.</p>
                                <p>بعد تسجيل الدخول، نستخدم الكوكيز لحفظ حالة تسجيل الدخول وتفضيلات العرض. تدوم كوكيز تسجيل الدخول لمدة يومين؛ وتستمر تفضيلات العرض لمدة عام. إذا اخترت "تذكرني"، سيظل تسجيل الدخول لمدة أسبوعين. عند تسجيل الخروج، يتم حذف كوكيز تسجيل الدخول.</p>
                                <p>عند تعديل أو نشر مقال، يتم حفظ ملف تعريف ارتباط في متصفحك يحتوي على معرف المقال المعدل. لا يحتوي هذا الملف على معلومات شخصية وينتهي بعد 24 ساعة.</p>

                                <h6 class="title">المحتوى المضمّن من مواقع أخرى</h6>
                                <p><b>نص توضيحي:</b> قد تحتوي مقالات موقعنا على عناصر مضمنة مثل الفيديوهات أو الصور أو المقالات من مواقع خارجية. تتصرف هذه العناصر كما لو أن الزائر قد زار الموقع الخارجي مباشرةً.</p>
                                <p>قد تقوم تلك المواقع بجمع بيانات عنك، واستخدام الكوكيز، وتضمين تتبع من طرف ثالث، وتتبع تفاعلك مع المحتوى المضمّن، خصوصًا إذا كنت مسجلاً الدخول في تلك المواقع.</p>
                                <p>يتم حفظ البيانات المقدمة من المستخدمين المسجلين (إذا كان التسجيل متاحًا) في ملفاتهم الشخصية. يمكن للمستخدمين الاطلاع على معلوماتهم الشخصية وتحديثها أو حذفها في أي وقت (باستثناء اسم المستخدم). يمكن لمشرفي الموقع أيضًا رؤية وتعديل هذه المعلومات.</p>',
                ]

            ],

        ];

        $terms_page = [
            'slug' => 'terms-of-service',
            'status' => 1,
            'translations' => [
                'en' => [
                    'title' => 'Terms of Service',
                    'content' => '<h2 class="title">Terms of Service</h2>
                        <p><b>Effective Date:</b> April 29, 2025</p>
                        <h6 class="title">1. Acceptance of Terms</h6>
                        <p><b>Example text:</b> By accessing or using our website located at https://yourwebsite.com, you agree to be bound by these Terms of Service and all applicable laws and regulations. If you do not agree with any of these terms, you are prohibited from using or accessing this site.</p>
                        <h6 class="title">2. Use License</h6>
                        <p><b>Example text:</b> Permission is granted to temporarily download one copy of the materials on this website for personal, non-commercial viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
                        <ul>
                            <li>modify or copy the materials;</li>
                            <li>use the materials for any commercial purpose;</li>
                            <li>attempt to decompile or reverse engineer any software contained on our website;</li>
                            <li>remove any copyright or other proprietary notations from the materials; or</li>
                            <li>transfer the materials to another person or mirror the materials on any other server.</li>
                        </ul>
                        <p>This license shall automatically terminate if you violate any of these restrictions and may be terminated by us at any time.</p>
                        <h6 class="title">3. Disclaimer</h6>
                        <p><b>Example text:</b> The materials on this website are provided "as is". We make no warranties, expressed or implied, and hereby disclaim and negate all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property.</p>
                        <h6 class="title">4. Limitations</h6>
                        <p><b>Example text:</b> In no event shall we or our suppliers be liable for any damages arising out of the use or inability to use the materials on this website, even if we or an authorized representative has been notified orally or in writing of the possibility of such damage.</p>
                        <h6 class="title">5. Accuracy of Materials</h6>
                        <p><b>Example text:</b> The content on our website may include technical, typographical, or photographic errors. We do not warrant that any of the materials are accurate, complete, or current. We may make changes to the content at any time without notice.</p>
                        <h6 class="title">6. Links</h6>
                        <p><b>Example text:</b> We are not responsible for the contents of any linked websites. The inclusion of any link does not imply endorsement. Use of any linked site is at the user’s own risk.</p>
                        <h6 class="title">7. Modifications</h6>
                        <p><b>Example text:</b> We may revise these Terms of Service at any time without notice. By using this website you agree to be bound by the current version of these terms.</p>
                        <h6 class="title">8. Governing Law</h6>
                        <p><b>Example text:</b> These terms and conditions are governed by and construed in accordance with the laws of [Your Country/State] and you irrevocably submit to the exclusive jurisdiction of the courts in that location.</p>',
                ],
                'hi' => [
                    'title' => 'सेवा की शर्तें',
                    'content' => '<h2 class="title">सेवा की शर्तें</h2>
                        <p><b>प्रभावी तिथि:</b> 29 अप्रैल, 2025</p>
                        <h6 class="title">1. शर्तों की स्वीकृति</h6>
                        <p><b>उदाहरण पाठ:</b> हमारी वेबसाइट https://yourwebsite.com का उपयोग करके, आप इन सेवा शर्तों और सभी लागू नियमों से बाध्य होने के लिए सहमत होते हैं। यदि आप इनमें से किसी भी शर्त से सहमत नहीं हैं, तो इस साइट का उपयोग करना मना है।</p>
                        <h6 class="title">2. उपयोग लाइसेंस</h6>
                        <p><b>उदाहरण पाठ:</b> इस वेबसाइट की सामग्री की एक प्रति अस्थायी रूप से डाउनलोड करने की अनुमति केवल व्यक्तिगत, गैर-व्यावसायिक उपयोग के लिए दी जाती है। यह एक लाइसेंस है, स्वामित्व का हस्तांतरण नहीं। इस लाइसेंस के तहत आप निम्नलिखित नहीं कर सकते:</p>
                        <ul>
                            <li>सामग्री को संशोधित या कॉपी करना;</li>
                            <li>सामग्री का व्यावसायिक उद्देश्य के लिए उपयोग करना;</li>
                            <li>साइट पर किसी सॉफ़्टवेयर को डी-कंपाइल या रिवर्स इंजीनियर करने का प्रयास करना;</li>
                            <li>कॉपीराइट या अन्य स्वामित्व नोटिस हटाना;</li>
                            <li>सामग्री को किसी अन्य व्यक्ति को ट्रांसफर करना या किसी अन्य सर्वर पर मिरर करना।</li>
                        </ul>
                        <p>यदि आप इनमें से किसी भी प्रतिबंध का उल्लंघन करते हैं तो यह लाइसेंस स्वतः समाप्त हो जाएगी, और हम किसी भी समय इसे समाप्त कर सकते हैं।</p>
                        <h6 class="title">3. अस्वीकरण</h6>
                        <p><b>उदाहरण पाठ:</b> इस वेबसाइट की सामग्री "जैसी है" के आधार पर दी जाती है। हम कोई स्पष्ट या परोक्ष वारंटी नहीं देते हैं और अन्य सभी वारंटी से इनकार करते हैं।</p>
                        <h6 class="title">4. सीमाएं</h6>
                        <p><b>उदाहरण पाठ:</b> इस वेबसाइट की सामग्री के उपयोग या उपयोग में असमर्थता के कारण उत्पन्न किसी भी क्षति के लिए हम या हमारे आपूर्तिकर्ता जिम्मेदार नहीं होंगे, भले ही हमें मौखिक या लिखित रूप में सूचित किया गया हो।</p>
                        <h6 class="title">5. सामग्री की सटीकता</h6>
                        <p><b>उदाहरण पाठ:</b> हमारी साइट की सामग्री में तकनीकी, टाइपोग्राफिकल या फ़ोटोग्राफिक त्रुटियाँ हो सकती हैं। हम इसकी सटीकता या पूर्णता की गारंटी नहीं देते। बिना किसी सूचना के सामग्री को बदला जा सकता है।</p>
                        <h6 class="title">6. लिंक</h6>
                        <p><b>उदाहरण पाठ:</b> किसी भी लिंक की गई वेबसाइट की सामग्री के लिए हम जिम्मेदार नहीं हैं। लिंक का शामिल होना किसी समर्थन का संकेत नहीं है। लिंक की गई साइट का उपयोग पूरी तरह से उपयोगकर्ता के जोखिम पर है।</p>
                        <h6 class="title">7. संशोधन</h6>
                        <p><b>उदाहरण पाठ:</b> हम कभी भी इन सेवा शर्तों को संशोधित कर सकते हैं। इस वेबसाइट का उपयोग करके आप वर्तमान शर्तों से बाध्य होने के लिए सहमत होते हैं।</p>
                        <h6 class="title">8. विधिक अधिकार</h6>
                        <p><b>उदाहरण पाठ:</b> ये शर्तें [आपका देश/राज्य] के कानूनों द्वारा नियंत्रित होती हैं, और आप उस क्षेत्र के न्यायालयों के विशेष क्षेत्राधिकार में सहमति देते हैं।</p>',
                ],
                'ar' => [
                    'title' => 'شروط الخدمة',
                    'content' => '<h2 class="title">شروط الخدمة</h2>
                        <p><b>تاريخ السريان:</b> 29 أبريل 2025</p>
                        <h6 class="title">1. قبول الشروط</h6>
                        <p><b>نص توضيحي:</b> من خلال الوصول إلى موقعنا https://yourwebsite.com أو استخدامه، فإنك توافق على الالتزام بشروط الخدمة هذه وجميع القوانين واللوائح المعمول بها. إذا كنت لا توافق على أي من هذه الشروط، يُحظر عليك استخدام الموقع.</p>
                        <h6 class="title">2. رخصة الاستخدام</h6>
                        <p><b>نص توضيحي:</b> يُسمح لك بتنزيل نسخة مؤقتة واحدة من المواد على هذا الموقع للاستخدام الشخصي وغير التجاري فقط. هذا ترخيص، وليس نقل ملكية، وبموجب هذا الترخيص لا يجوز لك:</p>
                        <ul>
                            <li>تعديل أو نسخ المواد؛</li>
                            <li>استخدام المواد لأغراض تجارية؛</li>
                            <li>محاولة تفكيك أو عكس هندسة أي برنامج موجود على الموقع؛</li>
                            <li>إزالة حقوق النشر أو الإشعارات الملكية من المواد؛</li>
                            <li>نقل المواد إلى شخص آخر أو نسخها على أي خادم آخر.</li>
                        </ul>
                        <p>ينتهي هذا الترخيص تلقائيًا إذا انتهكت أيًا من هذه القيود، وقد نقوم بإنهائه في أي وقت.</p>
                        <h6 class="title">3. إخلاء المسؤولية</h6>
                        <p><b>نص توضيحي:</b> يتم تقديم المواد على هذا الموقع "كما هي". لا نقدم أي ضمانات صريحة أو ضمنية، وننفي جميع الضمانات الأخرى.</p>
                        <h6 class="title">4. الحدود</h6>
                        <p><b>نص توضيحي:</b> لن نكون نحن أو موردونا مسؤولين عن أي أضرار ناتجة عن استخدام أو عدم القدرة على استخدام المواد، حتى إذا تم إخطارنا بذلك.</p>
                        <h6 class="title">5. دقة المواد</h6>
                        <p><b>نص توضيحي:</b> قد تحتوي المحتويات على أخطاء تقنية أو مطبعية أو فوتوغرافية. لا نضمن دقة أو اكتمال المواد. يمكننا تعديلها في أي وقت دون إشعار.</p>
                        <h6 class="title">6. الروابط</h6>
                        <p><b>نص توضيحي:</b> نحن غير مسؤولين عن محتوى المواقع المرتبطة. وجود رابط لا يعني أننا نؤيد الموقع. استخدام أي موقع مرتبط يكون على مسؤوليتك الخاصة.</p>
                        <h6 class="title">7. التعديلات</h6>
                        <p><b>نص توضيحي:</b> يجوز لنا تعديل شروط الخدمة هذه في أي وقت. باستخدام هذا الموقع، فإنك توافق على النسخة الحالية من الشروط.</p>
                        <h6 class="title">8. القانون الحاكم</h6>
                        <p><b>نص توضيحي:</b> تخضع هذه الشروط وتُفسر وفقًا لقوانين [بلدك/ولايتك]، وتوافق على الاختصاص القضائي الحصري لمحاكم تلك المنطقة.</p>',
                ],
            ],
        ];

        $terms_and_conditions = [
            'slug' => 'terms-and-conditions',
            'status' => 1,
            'translations' => [
                'en' => [
                    'title' => 'Terms and Conditions',
                    'content' => '<h2 class="title">Terms and Conditions</h2>
                        <p><b>Last Updated:</b> April 29, 2025</p>

                        <h6 class="title">1. Introduction</h6>
                        <p><b>Example text:</b> Welcome to https://yourwebsite.com. By accessing this website, you agree to comply with and be bound by the following terms and conditions. If you disagree with any part, please do not use our website.</p>

                        <h6 class="title">2. Intellectual Property Rights</h6>
                        <p><b>Example text:</b> All content on this website, including text, graphics, logos, and images, is the property of the website owner and is protected by intellectual property laws. You may not reuse, reproduce, or distribute any content without prior written consent.</p>

                        <h6 class="title">3. User Obligations</h6>
                        <p><b>Example text:</b> You agree to use the website only for lawful purposes. You must not use the website in any way that causes, or may cause, damage to the website or impairment of the availability or accessibility of the website.</p>

                        <h6 class="title">4. Limitation of Liability</h6>
                        <p><b>Example text:</b> We are not liable for any direct, indirect, or consequential loss or damage arising under these terms or in connection with our website, whether arising in tort, contract, or otherwise.</p>

                        <h6 class="title">5. External Links</h6>
                        <p><b>Example text:</b> Our website may contain links to third-party websites. We are not responsible for the content or privacy practices of these external sites.</p>

                        <h6 class="title">6. Changes to Terms</h6>
                        <p><b>Example text:</b> We reserve the right to modify these terms at any time. Changes will take effect immediately upon being posted on this page.</p>

                        <h6 class="title">7. Governing Law</h6>
                        <p><b>Example text:</b> These terms shall be governed and construed in accordance with the laws of [Your Country/State]. You agree to submit to the exclusive jurisdiction of the courts of that location.</p>',
                ],
                'hi' => [
                    'title' => 'नियम और शर्तें',
                    'content' => '<h2 class="title">नियम और शर्तें</h2>
                        <p><b>अंतिम अद्यतन:</b> 29 अप्रैल, 2025</p>

                        <h6 class="title">1. परिचय</h6>
                        <p><b>उदाहरण पाठ:</b> https://yourwebsite.com में आपका स्वागत है। इस वेबसाइट का उपयोग करके, आप इन नियमों और शर्तों से सहमत होते हैं। यदि आप किसी भी भाग से असहमत हैं, तो कृपया वेबसाइट का उपयोग न करें।</p>

                        <h6 class="title">2. बौद्धिक संपदा अधिकार</h6>
                        <p><b>उदाहरण पाठ:</b> इस वेबसाइट की सभी सामग्री, जैसे कि टेक्स्ट, ग्राफिक्स, लोगो और छवियाँ, वेबसाइट के स्वामी की संपत्ति हैं और बौद्धिक संपदा कानूनों द्वारा संरक्षित हैं। बिना अनुमति के सामग्री का पुनः उपयोग या वितरण नहीं किया जा सकता।</p>

                        <h6 class="title">3. उपयोगकर्ता की जिम्मेदारियां</h6>
                        <p><b>उदाहरण पाठ:</b> आप वेबसाइट का उपयोग केवल कानूनी उद्देश्यों के लिए करने के लिए सहमत होते हैं। आप वेबसाइट को किसी भी तरह से नुकसान नहीं पहुंचाएंगे या इसकी उपलब्धता या पहुंच को बाधित नहीं करेंगे।</p>

                        <h6 class="title">4. देयता की सीमा</h6>
                        <p><b>उदाहरण पाठ:</b> हम किसी भी प्रत्यक्ष, अप्रत्यक्ष या परिणामी हानि या क्षति के लिए उत्तरदायी नहीं हैं जो इन शर्तों के अंतर्गत या वेबसाइट के उपयोग के संबंध में उत्पन्न होती है।</p>

                        <h6 class="title">5. बाहरी लिंक</h6>
                        <p><b>उदाहरण पाठ:</b> हमारी वेबसाइट में तृतीय-पक्ष वेबसाइटों के लिंक हो सकते हैं। हम उन साइटों की सामग्री या गोपनीयता नीतियों के लिए जिम्मेदार नहीं हैं।</p>

                        <h6 class="title">6. शर्तों में परिवर्तन</h6>
                        <p><b>उदाहरण पाठ:</b> हम किसी भी समय इन शर्तों को संशोधित करने का अधिकार सुरक्षित रखते हैं। परिवर्तन इस पृष्ठ पर पोस्ट किए जाने के तुरंत बाद प्रभावी हो जाएंगे।</p>

                        <h6 class="title">7. शासकीय कानून</h6>
                        <p><b>उदाहरण पाठ:</b> ये शर्तें [आपका देश/राज्य] के कानूनों के अधीन होंगी। आप उस स्थान की अदालतों के विशेष क्षेत्राधिकार के अंतर्गत आने के लिए सहमत होते हैं।</p>',
                ],
                'ar' => [
                    'title' => 'الشروط والأحكام',
                    'content' => '<h2 class="title">الشروط والأحكام</h2>
                        <p><b>آخر تحديث:</b> 29 أبريل 2025</p>

                        <h6 class="title">1. المقدمة</h6>
                        <p><b>نص توضيحي:</b> مرحبًا بك في https://yourwebsite.com. باستخدامك لهذا الموقع، فإنك توافق على الالتزام بهذه الشروط والأحكام. إذا كنت لا توافق على أي جزء منها، يُرجى عدم استخدام الموقع.</p>

                        <h6 class="title">2. حقوق الملكية الفكرية</h6>
                        <p><b>نص توضيحي:</b> جميع المحتويات على هذا الموقع، بما في ذلك النصوص والرسومات والشعارات والصور، هي ملك لصاحب الموقع ومحميّة بموجب قوانين الملكية الفكرية. لا يجوز إعادة استخدام أو إعادة نشر أي محتوى بدون إذن كتابي مسبق.</p>

                        <h6 class="title">3. التزامات المستخدم</h6>
                        <p><b>نص توضيحي:</b> توافق على استخدام الموقع لأغراض قانونية فقط. يجب ألا تستخدم الموقع بطريقة تسبب أو قد تسبب ضررًا للموقع أو تقلل من توفره أو إمكانية الوصول إليه.</p>

                        <h6 class="title">4. تحديد المسؤولية</h6>
                        <p><b>نص توضيحي:</b> نحن غير مسؤولين عن أي خسارة أو ضرر مباشر أو غير مباشر أو تبعي ينشأ بموجب هذه الشروط أو فيما يتعلق باستخدام الموقع.</p>

                        <h6 class="title">5. الروابط الخارجية</h6>
                        <p><b>نص توضيحي:</b> قد يحتوي موقعنا على روابط لمواقع خارجية. نحن غير مسؤولين عن محتوى تلك المواقع أو ممارسات الخصوصية الخاصة بها.</p>

                        <h6 class="title">6. التعديلات على الشروط</h6>
                        <p><b>نص توضيحي:</b> نحتفظ بالحق في تعديل هذه الشروط في أي وقت. تدخل التعديلات حيز التنفيذ فور نشرها على هذه الصفحة.</p>

                        <h6 class="title">7. القانون المعمول به</h6>
                        <p><b>نص توضيحي:</b> تخضع هذه الشروط لقوانين [بلدك/ولايتك]، وتوافق على الخضوع للاختصاص القضائي الحصري لمحاكم ذلك الموقع.</p>',
                ],
            ],

        ];

        $pages = [
            $privacy_page,
            $terms_page,
            $terms_and_conditions,
        ];

        foreach ($pages as $pageData) {
            $page = Page::updateOrCreate(
                ['slug' => $pageData['slug']],
                ['status' => $pageData['status']]
            );

            $translations = [];

            foreach ($pageData['translations'] as $locale => $trans) {
                $translations[] = [
                    'locale' => $locale,
                    'title' => $trans['title'],
                    'content' => $trans['content'],
                ];
            }

            $page->translations()->delete();
            $page->translations()->createMany($translations);
        }
    }
}
