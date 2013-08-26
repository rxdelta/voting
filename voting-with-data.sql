-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: voting
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.13.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidate` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `description` varchar(10000) COLLATE utf8_persian_ci DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidate`
--

LOCK TABLES `candidate` WRITE;
/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
INSERT INTO `candidate` VALUES (1,'محمد ابراهیمی','<h2>سوابق تحصیلی:</h2>\n<ul>\n<li>دانش اموخته سال ١٣٧٩ سمپاد یزد</li>\n<li>مدرک کارشناسی: مهندسی عمران از دانشگاه یزد</li>\n</ul>\n<h2>برخی از سوابق و فعالیت های انجمنی</h2>\n<ul><li> همکاری مستمر با کانون علمی و فرهنگی سمپاد دانشگاه یزد از سال ١٣٧٩ الی ١٣٨٥ (از بدو تأسیس تا آخر) و یک دوره حضور در هیأت مدیره این کانون.\n</li><li> همکاری مستمر با انجمن دانش آموختگان استعدادهای درخشان از بدو تاسیس.\n</li><li> عضو علی‌البدل هیأت مدیره انجمن سال ١٣٩٠ الی ١٣٩٢.\n</li><li> مدیرعامل انجمن دانش آموختگان استعدادهای درخشان سال ١٣٩٠ الی ١٣٩٢\n</li><li> دبیر همایش ١١ فروردین سال ١٣٩١.\n</li></ul>\n<h2>مهم ترین اهداف در صورت انتخاب دوستان و عضویت در هیئت مدیره جدید:</h2>\n<ul><li> تلاش در جهت ارتقا و افزایش ارتباط انجمن و اعضا.\n</li><li> تکمیل بانک اطلاعاتی دانش‌آموختگان سمپاد و فراهم آوردن شرایط لازم برای ارتباط موثر سمپادی ها، اعضا و انجمن. (این بانک در مدت یک ماهی که انجمن دارای منشی بود به شکل قابل توجهی مورد بازبینی و بروزرسانی قرار گرفت.)\n</li><li> تلاش در جهت بررسی نیازها، تمایلات و جاذبه های مورد نظر سمپادی‌های سالهای مختلف(۱۳۷۳ الی ۱۳۹۲) و ایجاد جذابیت های ممکن (در قالب اساس‌نامه انجمن) و در نتیجه جذب اعضای موثر جدید.\n</li><li> تلاش و رایزنی برای احیاء سازمان ملی پرورش استعدادهای درخشان.\n</li><li> ایجاد ارتباط دائم و مستمر انجمن با مدرسه و استفاده از تجربیات دانش‌آموختگان جهت کمک به داشن آموزان در مسائل مختلف علمی.\n</li><li> پشتیبانی از اعضا جهت ایجاد گروه‌های مختلف در قالب انجمن و پیگیری امور گروه‌های موجود و تعامل با آنها.\n</li><li> کسب نظرات اعضا در زمینه‌های مختلف و بررسی انتقادات و پیشنهادات ایشان.\n</li><li> راه اندازی مجدد جلسات مشورتی اعضا با انجمن.\n</li><li> تلاش در جهت ارتقای نقش انجمن و اعضا در جامعه از جنبه های فرهنگی و اجتماعی که از اهداف اصلی انجمن در جهت پیشرفت جامعه می‌باشد.\n</li></ul>\nدر پایان امیدوارم درصورتی‌که مورد لطف و اعتماد اعضای محترم انجمن قرار گرفته و انتخاب شوم، با همراهی شما دوستان عزیز بتوانم با پیگیری اهداف یاد شده و دیگر پیشنهادات مطرح شده توسط دوستان و کسب کمک از دوستانی که پیشینه و تجربه بیشتری در انجمن دارند، قدم‌های مثبتی در جهت پویایی و پیشرفت فرهنگی اجتماعی انجمن و اعضا بردارم.\n<br/><br/>\nبا تشکر از اهتمام شما دوستان گرامی.',NULL),(2,'محمود بافقی','کاندیدای انتخابات چهارم',NULL),(3,'علی بحری زاده','<p>\n<ul><li>متولد ۲۸ مهر ۱۳۶۴\n</li><li>فارغ التحصیل سال ۸۲ از مدرسه تیزهوشان یزد.\n</li><li>فارغ التحصیل سال ۸۷ از دانشگاه تهران (داشکده فنی) در رشته متالورژی و مواد{کارشناسی}.\n</li><li>فارغ التحصیل سال ۹۰ از دانشگاه تهران (دانشکده فنی) در گرایش ریخته گری{کارشناسی ارشد}.\n</li><li>اشتغال به کار در شرکت کویر ذوب یزد از سال ۸۸ تا به اکنون در قسمت R&D {تحقیق و توسعه}.\n</li><li>عضو انجمن سمپاد بصورت رسمی از سال ۸۴.\n</li><li>موسس گروه ورزش و سرگرمی انجمن سمپاد در سال ۸۹.\n</li><li>عضو علی البدل هیئت مدیره انجمن سمپاد از سال ۹۰ تا به اکنون.\n</li><li>دبیر نمایشگاه جشن یازده فروردین در سال ۹۱.\n</li><li>دبیر نمایشگاه جشن یازده فروردین در سال ۹۲.\n</li><li>تشکیل گروه پشتیبانی برای انتخاب رشته و دانشگاه فارغ التحصیلان ۹۲ .\n</li></ul>\n</p>\n<h2>مهمترین اهداف</h2>\n<p>\n<ol type=\"I\"><li>رسیدن به خودباوری:\nاین که ما سمپادی ها بصورت قطب های گسسته در کل شهر یزد(حتی ایران) پخش شدیم و اینکه وصل شدن این قطب ها و وجود ارتباط موثر توسط یک هسته مرکزی{انجمن} بین اون ها چقدر به پیشرفت و پیشبرد اهدافمون در زندگی تک تک این اعضا کمک می کند باید نهادینه بشه.با تشکیل بانک اطلاعاتی کامل از تمامی اعضا و ارتباط پیوسته انجمن با اعضا این هدف تحقق پیداخواهد کرد.\n</li><li>زنده بودن انجمن:\nجذب اعضا یکی از مهمترین قسمت های هر انجمن هست ولی مهمتر از این مسله نگهداری این اعضاست که احتیاج به برنامه ریزی دارد. برای حصول به این هدف در سه زمینه اشتغال٬ تفریح-سرگرمی و علمی برنامه های خاصی وجود خواهد داشت.\n</li><li>استقلال مالی انجمن:\nیکی از دغدغه های اصلی انجمن هست که می شود با برنامه ریزی و استفاده از پتانسیل های اعضا به این هدف رسید. برگزاری کلاس های آموزشی و برنامه های تفریحی یکی از ساده ترین و بی دقدقه ترین این راه هاست. انجام پروژه های صنعتی با تشکیل گروه های کاری و متشکل از اعضا نیز در مراحل بعدی بسیار نتیجه بخش خواهد بود.\n</li><li>تشکیل / احیای گروه های انجمن:\nانجمن به تنهایی کاریی خاصی نخواهد داشت مگر اینکه گروه های فعالی در شاخه های خود داشته باشد. با احیای بسیاری از گروه ها مانند: گروه خیریه٬ گروه نقد فیلم و کتاب٬ گروه همایش و نشست های تخصصی و... می توان به این هدف رسید.از گروه هایی که باید تاسیس شود گروه کار آفرینی/یابی و تشکیل گروه پشتیبانی و انتخاب رشته تحصیلی برای سمپادی های تازه فارغ التحصیل شده می باشد.\n</li></ol>\n</p>\n<p>\nپی‌نوشت: امیدوارم با کمک شما اعضای انجمن بتوانم وارد هیئت مدیره شوم و در مرحله بعد با پشتیبانی مضاعف شما دوستان اهداف اصلی خود را برای هرچه پویاتر کردن انجمن به نتیجه برسانم.\n</p>\n<p>\nبا تشکر<br/>\nعلی بحری زاده\n</p>',NULL),(4,'حامد بهادرزاده','<ul><li> متولد ۱/۹/۱۳۶۶\n</li><li>دانش آموخته سال ۱۳۸۴ از مدرسه و سال ۱۳۸۹ از دانشگاه تهران (کارشناسی مهندسی متالورژی و مواد)\n</li></ul>\n\n<h2>سوابق کار انجمنی:</h2>\n<p>\n<ul><li>کمک در برگزاری برنامه ها ۱۱ فروردین از سال ۱۳۸۵ در سمت های مختلف:\n</li>\n<ul><li>آماده سازی مجله انجمن\n</li><li>حضور در بخش صوت تصویر در پشت سن\n</li><li>کمک به مسئول سالن برای هماهنگی اجرای برنامه ها\n</li><li>اماده سازی کلیپ یادها و خاطره ها\n</li><li>اماده سازی تدارکات و پذیرایی\n</li><li>مشارکت در بخش اطلاع رسانی\n</li><li>پیاده سازی و پشتیبانی سیستم جدید فروش الکترنیکی بلیط\n</li><li>مسئول قسمت بلیط و اطلاع رسانی مراسم ۱۱ فروردین ۱۳۹۲\n</li><li>حمایت مالی از مراسم\n</li><li>پخش انلاین مراسم ۱۱ فروردین ۱۳۹۲\n</li><li>ایده پردازی و آماده سازی دست بند های یادگاری مراسم ۱۱ فروردین ۱۳۹۲\n</li><li>اماده سازی بلیط مراسم ۱۳۹۲ در کمتر ۴ روز\n</li></ul>\n<li>حضور فعال و مستمر در پاتوق های تهران و یزد\n</li><li>حضور برنامه های گردشگری\n</li><li>ایده و پیگیری برگزاری مسابقات تخته نرد در انجمن\n</li><li>اجرا و راه اندازی سیستم رای گیری آنلاین برای انتخابات هیئت مدیره و بازرس هیئت مدیره\n</li></ul>\n</p>\n<h2>انجمن اسلامی دانشکده مهندسی مواد و متالورژی دانشگاه تهران:</h2>\n<p>\n<ul><li>عضو هیت مدیره\n</li><li>دبیر فرهنگی انجمن\n</li><li>برگزاری ۳ جشن در دانشکده\n</li><li>راه اندازی سینما متال و نمایش فیلم های بروز سینمای جهان\n</li><li>و ...\n</li></ul>\n</p>\n<p>\nعمده اهداف و برنامه ها-علاوه بر وظایف اعضا هیئت مدیره که در آیین نامه و اساسنامه اومده و دوستان در برنامه هاشون ذکر کردن چند هدف عمده دارم:\n<ul><li>پیگیری تغییر ساختار انجمن جهت تعامل بیشتر اعضا و دخیل نمودن اعضا در تصمیم گیری های انجمن\n</li><li>پیگیری راه اندازی آموزشگاه انجمن برای استفاده از پتانسیل موجود در اعضا و درآمدزای برای انجمن\n</li><li>تلاش برای خودکفایی مالی انجمن\n</li><li>برنامه های ویژه فرهنگی برای اعضا انجمن\n</li><li>و ...\n</li></ul>\n<p>\nبه امید انجمنی پویا و مفید برای همه اعضاء\n</p>',NULL),(5,'سمانه جعفری زاده','<p align=\"center\">\n<span style=\"font-size:9pt\">بسمه تعالی</span>\n</p>\n<p>\nنام و نام خانوادگی : سمانه جعفری زاده مالمیری <br/>\nخروجی سال 1378 و فارغ التحصیل رشته مهندسی برق از دانشگاه یزد <br/>\n</p>\n<h2>شرح فعالیتها</h2>\n<p>\nاز سال 86 رابطه من و همسرم و فرزندم با سمپاد به واسطه شرکت در پاتوقهای یزد پایدار گردید و در سال 87 به علت نقل مکان به تهران حوزه ارتباطی ما گسترده تر شد. با جمع سمپاد جفت و جور بودیم و روز به روز ارتباطمون با 021 یی ها عمیق تر و بیشتر می شد. در طول چهار سالی که در تهران ساکن بودیم 90 درصد خوشی ها و تفریحاتمون با 021 و سمپاد بود. هر جا که دلمون تنگ می شد یا دوستانمون از درس خسته می شدند، در کمترین زمان ممکن ساده ترین تفریح برنامه ریزی می شد و ساعاتی را در کنار هم به گپ و گفت و بازی می گذراندیم. به صورت سرفصلی و خلاصه به جز شرکت در پاتوقهای تهران، کمک در برگزاری اردوها در هر چهار فصل سال ،کمک در برگزاری گردشهای عصرانه در پارکهای تهران که اصولانه به شب منتهی می شد، کمک در برگزاری دو شب یلدا 40 نفره، کمک در برگزاری جشنهای تولد دوستان، کمک در برگزاری برنامه های سینما، کمک در برگزاری برنامه های کوه نوردی، شرکت در برنامه های حلقه یاد از اهم برنامه هایی هست که مستقیم یا غیر مستقیم در آنها شریک بودم. البته قابل ذکر است که تا به حال سمت اجرایی نداشتم و همیشه وقتی بهم پیشنهاد می شده پاسخم این بوده که ترجیح می دهم بدون سمت برای دل خودم برنامه بگذارم تا به خاطر سمتی که به دوشم گذاشته شده.\n</p>\n<h2>دلیل کاندیداتوری</h2>\n<p>\nوقتی بحث انتخابات به میون اومد، تعدادی از دوستان دلسوز سمپادی بهم پیشنهاد دادند و ناسپاسی بود اگر به لطف و محبتشون پاسخ منفی می دادم، از طرفی با مشورت دوستان متقاعد شدم که وارد این مرحله جدید از کارهایی بشم که با نام فعالیتهای NGO معروف است.\n</p>\n<h2>قابلیت ها</h2>\n<p>\nاین بخش را بالاجبار برای دوستانی می نویسم که با من آشنا نیستند وگرنه دوستانی که نسبت به من شناخت اندکی دارند در همان شناخت کم خیلی از خصوصیات جمعیم را متوجه می شوند.\nنسبتا پر انرژی و فعال هستم، به همین دلیل علی رغم مشغله کاری، توانایی برنامه ریزی و انجام فعالیتهای متعدد را دارم. به گستردگی روابط دوستانه بسیار مشتاقم و دایره دوستانم محدود نیست چون معتقدم \"هزار دوست برای آدمی کم و یک دشمن زیاد است.\" در 90 درصد برنامه های گروهی شرکت می کنم چون در هر برنامه ای روحیه تازه ای می گیرم و سعی می کنم به دوستانم انرژی و روحیه بدهم. ایمان دارم که شرکت در جمعی که همه از سطح درک خاصی برخوردار هستند باعث تعاملات و تفاهماتی می شود که برای پیشبرد اهدافم چه از نظر روحی و چه اجتماعی بسیار موثر و مفید خواهد بود. تجربه کرده ام که فارغ از روابط مالی و مادی، همصحبتی، همنشینی، تبادل افکار و اطلاعات و در مجموع ساعاتی را فارغ از دغدغه های زندگی گذراندن ( البته بدون حاشیه سازی و حاشیه پردازی ) برای همه افراد جمع موثر و مفید و انرژی بخش است و به چنین جمعی پایبند و امیدوارم.\n</p>\n<h2>برنامه ها</h2>\n<ul><li>انتخاب مدیر عامل کارآمد،کوشا، پیگیر همراه با پشتیبانی کامل هیات مدیره\n</li><li> برگزاری منظم و حداکثر ماهیانه جلسات هیات مدیره به منظور دستیابی به اهداف ذیل:\n</li>\n<ul><li> پویایی و نشاط انجمن و بالطبع اعضا\n</li><li> برنامه ریزی اهداف خرد و کلان با زمانبندی\n</li><li> بررسی ایده های نو\n</li></ul>\n<li> مشارکت اعضا مشتاق در تصمیم سازی ها و برنامه های انجمن\n</li><li> برگزاری جلسات مشورتی با پیشکسوتان انجمن\n</li><li> حمایت از گروه های وابسته به انجمن (021، 0311، گردشگری و ...) و افزایش تعاملات فی مابین\n</li><li> برنامه ریزی برای گردهمایی بیشتر دوستان سمپادی\n</li><li> گزارش منظم فعالیت های انجمن به اعضا\n</li><li> ترغیب سمپادی ها به عضویت، و تشویق اعضا به فعالیت.\n</li><li> برقراری ارتباط با سمپادی های مؤثر در جامعه\n</li></ul>\nو در نهایت<br>\nامیدوارم بتوانم سودمند باشم و انتظارات دوستان را برآورده کنم و با کمک و همراهی و همیاری تک تک اعضا، انجمنی باشیم که نه تنها برای همدیگر مفید و موثر باشیم که به جامعه نیز سود برسانیم.',NULL),(6,'محمد هادی خبیری','<h2>سوابق تحصیلی:</h2>\n<p>\n<ul><li>دانش اموخته سال 1382 سمپاد یزد\n</li><li>کارشناسی: مهندسی نساجی از دانشگاه یزد\n</li><li>کارشناسی ارشد: حسابداری از دانشگاه علوم و تحقیقات\n</li></ul>\n</p>\n<p>\n<h2>برخی از سوابق کاری و فعالیت ها:</h2>\n<ol>\n<li>دبیر کانون علمی و فرهنگی سمپاد دانشگاه یزد سال 84 الی 86</li>\n<li>مدیر مسئول نشریه دانشجویی سمپاد دانشگاه یزدسال 83 ای 86</li>\n<li>مدیر عامل انجمن دانش آموختگان استعدادهای درخشان سال 1388 الی 1390</li>\n<li>عضو هیوت مدیره انجمن سال 1388 ای 1390</li>\n<li>بازرس علی البدل هیئت مدیره از سال 1390 الی 1392</li>\n</ol>\n</p>\n<p>\n<h2>شماری از مهم ترین اهداف و برنامه ها در صورت انتخاب و عضویت در هیئت مدیره جدید:</h2>\n<ul><li>پیگری تشکیل مستمر و موثر جلسات هیئت مدیره\n</li><li>تلاش در جهت هماهنگی و همدلی اعضای هیئت مدیره به منظور اثر بخشی و کارایی بیشتر\n</li><li>تلاش در جهت اجرای کامل اساسنامه و آیین نامه و نیل به اهداف پیش بینی شده در اساسنامه برای انجمن و اعضا\n</li><li>ایجاد سامانه انتقاد ها و پیشنهاد ها به نحوی که برای اعضا قابلیت پیگیری و ردیابی داشته باشد\n</li><li>ایجاد اتاق فکر مشورتی انجمن متشکل از اعضای هیئت امنا,اعضای هیئت مدیره و مدیر عامل سابق انجمن وسایر افراد تاثیر گذار\n</li><li>ایجاد بستر مناسب برای فعالیت و تعامل گروه ها با انجمن(شاخه تهران ,اصفهان ,گردشگری ,همایش ها و...) و تشویق برای ایجاد گروه های جدید\n</li><li>ارتباط دائم با مدرسه و معرفی انجمن به دانش آموزان پیش دانشگاهی\n</li><li>حفظ و ارتقا بستر فبزیکی انجمن(فضا,اموال و ...),قرارد با پارک غلم و فناوری وتمدید مجوز نیروی انتظامی\n</li><li>تکمیل بانک اطلاعاتی دانش آموختگان سمپاد و ایجاد سامانه برای ارتباط موثر سمپادی ها و اعضا\n</li><li>کمک به تشکیل مستمرمراسم هایی مانند پاتوق و مراسم 11 فروردین و باز بودن درب انجمن برای حضور اعضا و علاقه مندان\n</li><li>تهیه و ارئه گزارش مالی و گزارش فعالیت به اعضا و به صورت کلی اطلاع رسانی حد اکثری در مورد فعالیت های انجمن\n</li><li>تلاش در جهت ارتقای نقش انجمن در تاثیر روی جامعه از جنبه های فرهنگی و اجتماعی\n</li></ul>\n</p>\nدرپایان امیدوارم در صورتی که مورد اعتماد اعضای محترم انجمن قرار گرفته و انتخاب شدم بتوانم پیگیر اهداف و برنامه های مذکور و سایر مطالبات به حق اعضای محترم انجمن باشم.\n<p>\nمحمد هادی خبیری<br/>\nچهارم شهریور ماه نود و دو\n</p>',NULL),(7,'علی رفیع‌فر','<p align=\"center\" style=\"font-size:10pt\">به نام خداوند بخشنده مهربان</p>\n<p>\n<ul><li>دانش‌آموخته سمپاد ۸۳\n</li><li>کارشناس مهندسی نرم‌افزار\n</li><li>کارشناس ارشد مهندسی فناوری اطلاعات(شبکه)\n</li></ul>\n</p>\n<p>آشنایی من با انجمن به سال ۱۳۸۶ برمیگرده که عضو انجمن شدم. سال ۸۷ رفت‌ وآمدم به انجمن بیشتر شد و از همون سال به طور مرتب در برگزاری همایش یازده فروردین مشارکت داشتم. در سال ۸۸ به عنوان دبیر گروه گردشگری فعالیتم رو آغاز کردم و تا اوایل سال ۸۹ که این سمت رو داشتم سه برنامه خارج استانی و بیش از ۱۵ برنامه درون استانی برگزار شد. در سال ۹۰ وارد هیئت مدیره انجمن شدم و فک کنم جز معدود افرادی بودم که بدون تاخیر در جلسات حاضر میشدم!:دی<br/>\nدر سال‌های ۹۱ و ۹۲ مسئول برنامه‌های سالن جشن یازده فروردین بودم که با کمک بچه‌های خوب گروه که به گرنج معروف شد تلاش خودمون رو کردیم با کمترین بودجه برنامه‌هایی در شان بچه‌های سمپاد برگزار کنیم که امیدوارم موفق بوده باشیم. البته اینجا جا داره بازم از همشون و همینطور بچه‌های گروه نمایشگاه و تدارکات تشکر کنم. و در نهایت مسئول برگزاری برنامه یکصدمین پاتوق سمپاد که در همین ماه برگزار می‌شود هستم.\n<br/> <br/>\nو اما میرسیم به برنامه‌ها!\n</p>\n<p>\nمن به عنوان عضوی از انجمن انتظاراتی از انجمن دارم که در صورت انتخاب شدن تمام سعیم رو در رسیدن به اونا قرار میدم:\n</p><p>\n<ul><li>برگزاری منظم جلسات هیئت‌مدیره و ارائه گزارش‌های مالی و فعالیت‌ها بر اساس آیین‌نامه انجمن.\n</li><li>ایجاد بستری برای انتقاد مستقیم اعضا از هیئت مدیره و ارائه پیشنهادات به طوری که اعضا در جریان پیگیری مطالبات خود باشند.\n</li><li>تلاش در جهت ترغیب اعضا برای همکاری و فعالیت هرچه بیشتر در انجمن که به نظرم تنها با ایجاد بستر مناسب برای فعالیت و جذاب کردن محیط انجمن به دست میاد.\n</li><li>تعامل بیشتر هیئت مدیره با گروه‌های انجمن که می‌تواند باعث هم‌افزایی بیشتر شود.\n</li><li>تلاش برای ایجاد زمینه و همچنین ترغیب اعضا برای استفاده از فضای انجمن\n</li><li>برنامه‌ریزی میان مدت برای استقلال مالی انجمن\n</li><li>احیای مجدد جلسات هم‌اندیشی در موضوعات مختلف، و همچنین برگزاری جلسات مشورتی\n</li><li>برنامه‌ریزی و رایزنی برای احیای سازمان ملی پرورش استعداد‌های درخشان و در وهله اول مرکز یزد که با توجه به تغییر دولت امری دور از دسترس نیست.\n</li><li>برنامه ریزی برای ارتباط بیشتر دانش‌آموختگان با مدرسه که نه تنها باعث آشنایی بیشتر دانش‌آموزان با انجمن می‌شود بلکه فواید زیادی برا دانش‌آموزان خواهد داشت.\n</li></ul>\n</p>\n<p>\nدرنهایت امیدوارم کسانی که برای هیئت مدیره انتخاب میشن با برنامه ریزی و تلاش خودشون باعث پویایی بیشتر انجمن بشن.\n</p>',NULL),(8,'محمد مهدی روشنی','کاندیدای انتخابات چهارم',NULL),(9,'سید محمدعلی مدرسی','کاندیدای انتخابات چهارم',NULL),(10,'منیره منتظری','<p>\n<ul><li>خروجی سال ۸۴\n</li><li>ورودی سال ۸۴ ریاضی دانشگاه صنعتی اصفهان – ورودی سال ۸۹ نقاشی دانشگاه یزد\n</li><li>آغاز فعالیت و همکاری با انجمن از آبان ۸۴\n</li></ul>\n</p>\n<h2>فعالیت های انجمنی :</h2>\n<p>\n<ul><li>همکاری در ۱۱ فروردین (سال ۸۶-۹۲) مسئول سمعی بصری جشن سال ۸۹\n</li><li>همکاری در مجله انجمن دانش آموختگان سمپاد (شماره‌ی ۳)\n</li><li>مسئول گروه عکاسی (برگزاری کلاس آموزشی و جلسات نقد عکس و گردش عکاسی)\n</li><li>سردبیر لوتوس (از آذر ماه سال ۸۸)\n</li><li>منشی انجمن سمپاد (به صورت پراکنده سالهای ۸۸ و ۸۹)\n</li><li>همکاری در برگزاری همایش ها و کارگاه مدیریت استراتژی\n</li><li>همکاری در برگزاری مسابقات دومینوی سمپاد (دو دوره)\n</li><li>همکاری در برگزاری کلاس های فوق برنامه مدرسه\n</li></ul>\n</p>\n<h2>سایر فعالیت های انجمنی :</h2>\n<p>\n<ul><li>عضو شورای مرکزی مدید (مجمع دانشجویان یزدی دانشگاه صنعتی اصفهان)\n</li><li>برگزاری نمایشگاه های سوغات کویر در دانشگاه صنعتی اصفهان (۳ نمایشگاه)\n</li><li>همکاری در مجله دانشجویی (سال ۸۴-۸۷)\n</li><li>همکاری در برگزاری مشاوره انتخاب رشته (سال ۸۵-۹۱)\n</li><li>دبیر انجمن علمی نقاشی (دو دوره)\n</li></ul>\n</p>\n<h2>برنامه‌ها :</h2>\n<p>\nبه نظر خودم عامل اصلی‌ای که میتونه تشویق کننده‌ی سمپادی‌ها برای نگه‌داشتن انجمن باشه، ارتباطاتی‌ست که انجمن باعثش میشه. انجمن باید جایی باشه که اعضاش بتونن کسایی که هم‌فکر و هم‌تخصص خودشون هستن رو پیدا کنن ... به همین دلیل جذب و شناسایی افرادی که تازه فارغ التحصیل شدن و نیرو و انگیزه‌ی کافی برای فعالیت اجتماعی رو دارن جزو اولویت‌ها قرار میگیره. کسایی که میتونن اولین تجربه‌های کاری و اجتماعی‌شون رو تو انجمن داشته باشن و به مرور راهی رو انتخاب کنن که شایستگی‌شو دارن. همچنین میتونن تو این مدت افراد هم‌فکر با خودشون رو هم همراه کنن.p\nدر این راستا سعی دارم حداقل یه سری از برنامه‌های سابق انجمن رو دوباره پیگیری کنم شاید راهی باشه برای ادامه‌دار شدن سایر فعالیت‌هایی که در چارچوب اساس‌نامه‌ی انجمن میگنجه.\n</p>\n<p>\n<ol><li>شناسایی و جذب اعضای جدید. تکمیل دیتابیس انجمن\n</li><li>پیگیری و راه‌اندازی مجدد گروه‌های تخصصی\n</li><li>پیگیری و راه‌اندازی مجدد مجله\n</li><li>ارتقاء وضعیت انجمن در فضای مجازی\n</li><li>پیگیری و اجرا برنامه‌های تفریحی و فوق برنامه\n</li><li>پیگیری پروژه تعاونی مسکن\n</li><li>راه‌اندازی گروه کوهنوردی (در کنار گردشگری)\n</li><li>ارتباط و لینک بیشتر با مدرسه\n</li></ol>\n</p>\n<p>\nتوضیح اینکه : برنامه ی تفریحی رو فقط گردشگری نمیدونم. هرنوع برنامه ای که باعث پویایی انجمن و فعالیت اعضا و برخوردشون با هم بشه؛ همین مسابقات دومینو و تخته نرد، برنامه‌های گردش عکاسی، کلاس‌های فوق‌برنامه و کارگاه‌های آموزشی، کتابخانه‌ی مجازی، جلسات نقد فیلم و عکس، حلقه‌ی ادبی، حلقه‌ی فلسفه و .... حتی شاید شب شعر. که هرکدوم از اینا شاید باعث بشه هر فردی استعدادی در خودش کشف کنه و بستر لازم برای پروشش رو بیابه. که به نظرم این امر خودش بسیار وابستگی زیادی داره به گروه‌ها!\nاین توانایی رو در خودم دیدم (روابط عمومی بالا و حضور در جامعه‌ی مجازی) که بتونم اعضای منفعل و یا حتی سمپادی‌های غیر عضو رو مشتاق حضور در چنین انجمنی بکنم. آدم آرمان‌گرایی نیستم (میدونم همه‌ی این اهداف حاصل نمیشه مگر با همراهی بقیه دوستان) ولی حداقل میشه یه ایده‌الی از انجمن آرمانی رو تو ذهنمون تداعی کنیم و برای رسیدن بهش تلاش کنیم. انجمنی که وابسته به اعضاشه، نه فقط از نظر مالی بلکه بیشتر از طریق حضورشون.<br/>\nدر همین راستا به نظرم ارتباطاتی که هیئت مدیره با اعضا میتونن داشته باشن یکی از اصول اولیه‌ای هست که باید در نظر گرفته بشه ... پس هدف صفرم رو میذارم:\n</p>\n<p>\n۰. ثبت و مستندسازی جلسات و تصمیمات هیئت مدیره و اطلاع رسانی منظم\n</p>',NULL),(11,'محسن شریفی','کاندیدای انتخابات چهارم (بازرس)',NULL),(12,'امیرحسین عطائیان','کاندیدای انتخابات چهارم (بازرس)',NULL);
/*!40000 ALTER TABLE `candidate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidatedata`
--

DROP TABLE IF EXISTS `candidatedata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidatedata` (
  `CandidateID` int(11) NOT NULL,
  `type` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `data` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`CandidateID`,`type`,`data`),
  CONSTRAINT `FK_DATA_Candidate` FOREIGN KEY (`CandidateID`) REFERENCES `candidate` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidatedata`
--

LOCK TABLES `candidatedata` WRITE;
/*!40000 ALTER TABLE `candidatedata` DISABLE KEYS */;
INSERT INTO `candidatedata` VALUES (1,'تحصیلات','کارشناسی/ مهندسی عمران'),(1,'سال دانش‌آموختگی','1379'),(3,'تحصیلات','کارشناسی ارشد/ مهندسی متالوژی و مواد'),(3,'سال دانش‌آموختگی','1382'),(4,'تحصیلات','کارشناسی/ مهندسی متالوژی و مواد'),(4,'سال دانش‌آموختگی','1384'),(5,'تحصیلات','کارشناسی/ مهندسی برق'),(5,'سال دانش‌آموختگی','1378'),(6,'ایمیل','mohamadhadi.khabiri@gmail.com'),(6,'تحصیلات','کارشناسی ارشد / حسابداری'),(6,'سال دانش‌آموختگی','1382'),(7,'تحصیلات','کارشناسی/ مهندسی نرم‌افزار'),(7,'سال دانش‌آموختگی','1383'),(10,'تحصیلات','کارشناسی/ ریاضی و نقاشی'),(10,'سال دانش‌آموختگی','1384');
/*!40000 ALTER TABLE `candidatedata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `election`
--

DROP TABLE IF EXISTS `election`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `election` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `electingNumber` int(10) DEFAULT NULL,
  `name` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL,
  `description` varchar(4000) COLLATE utf8_persian_ci DEFAULT NULL,
  `startTime` timestamp NULL DEFAULT NULL,
  `endTime` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `election`
--

LOCK TABLES `election` WRITE;
/*!40000 ALTER TABLE `election` DISABLE KEYS */;
INSERT INTO `election` VALUES (1,5,'انتخابات هیئت مدیره انجمن','چهارمین دوره انتخابات هیئت مدیره <br/> انجمن دانش‌آموختگان استعدادهای درخشان','2013-08-26 13:53:00','2013-09-26 14:13:00',NULL),(2,1,'انتخابات بازرس هیئت مدیره انجمن','چهارمین دوره انتخابات بازرس هیئت مدیره <br/> انجمن دانش‌آموختگان استعدادهای درخشان','2013-08-27 02:30:00','2013-08-27 06:30:00',NULL);
/*!40000 ALTER TABLE `election` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmppasschange`
--

DROP TABLE IF EXISTS `tmppasschange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmppasschange` (
  `userID` int(10) NOT NULL,
  `electionID` int(10) NOT NULL,
  `candidateID` int(10) NOT NULL,
  `vote` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`userID`,`electionID`,`candidateID`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmppasschange`
--

LOCK TABLES `tmppasschange` WRITE;
/*!40000 ALTER TABLE `tmppasschange` DISABLE KEYS */;
INSERT INTO `tmppasschange` VALUES (1,1,1,'616f074347c329a4629c1d7dd85b3723'),(1,1,2,'e4c5598222b09b8e5ea7f3d510967b9e'),(1,1,3,'7a5646a3afd303415725a12a863e1101'),(1,1,4,'8d02ece7a692f2365644fdf81600c359'),(1,1,5,'a14df4e243c792fb9dd6a7bff834d7b9'),(1,1,6,'f8e81b6dbb9e25ef00008e1c954082e5'),(1,1,7,'5c5e9e9ef8432cffd80bf6f7aa7038eb'),(1,1,8,'fda41ee807d465096c6db4b2449571be'),(1,1,9,'bd57a160c53d49be245eb02d5c11e859'),(1,1,10,'55c5cc50dd53ea48325c9ae8cf0d76e5'),(1,2,11,'873c650feb833fa048c561ea247aa93c'),(1,2,12,'67bcd670e53e89d6ccdaa42f30804e24');
/*!40000 ALTER TABLE `tmppasschange` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `username` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `roll` enum('admin','user') COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin','c02c79a6c68e1fb42b56b23c436e7507','admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdata`
--

DROP TABLE IF EXISTS `userdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userdata` (
  `userID` int(11) NOT NULL,
  `type` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `data` varchar(2000) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `unique` (`userID`,`type`),
  KEY `fk_userdata_1` (`userID`),
  CONSTRAINT `fk_userdata_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdata`
--

LOCK TABLES `userdata` WRITE;
/*!40000 ALTER TABLE `userdata` DISABLE KEYS */;
/*!40000 ALTER TABLE `userdata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uservote`
--

DROP TABLE IF EXISTS `uservote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uservote` (
  `userID` int(11) NOT NULL,
  `electionID` int(11) NOT NULL,
  `vote` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  KEY `fk_uservote_1` (`userID`),
  KEY `fk_uservote_2` (`electionID`),
  CONSTRAINT `fk_uservote_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_uservote_2` FOREIGN KEY (`electionID`) REFERENCES `election` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uservote`
--

LOCK TABLES `uservote` WRITE;
/*!40000 ALTER TABLE `uservote` DISABLE KEYS */;
/*!40000 ALTER TABLE `uservote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vote` (
  `electionID` int(10) NOT NULL,
  `candidateID` int(10) NOT NULL,
  `vote` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`electionID`,`candidateID`),
  KEY `fk_vote_1` (`electionID`),
  KEY `fk_vote_2` (`candidateID`),
  CONSTRAINT `fk_vote_1` FOREIGN KEY (`electionID`) REFERENCES `election` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_vote_2` FOREIGN KEY (`candidateID`) REFERENCES `candidate` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vote`
--

LOCK TABLES `vote` WRITE;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
INSERT INTO `vote` VALUES (1,1,0),(1,2,0),(1,3,0),(1,4,0),(1,5,0),(1,6,0),(1,7,0),(1,8,0),(1,9,0),(1,10,0),(2,11,0),(2,12,0);
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'voting'
--
/*!50003 DROP FUNCTION IF EXISTS `updatepass` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `updatepass`(
      userID int(10),  
      oldpass VARCHAR(45),
      newpass VARCHAR(45)
) RETURNS tinyint(1)
    READS SQL DATA
BEGIN
  DECLARE no_more_rows BOOLEAN;
  DECLARE oldvote VARCHAR(45);
  DECLARE votes_cur CURSOR FOR
    SELECT
        `vote`
    FROM `uservote`
    WHERE `userID` = userID;

  if @@error_count!=0 or @@warning_count!=0 then
    return 0;
  end if;

  delete from `tmppasschange` where `userID` = userID;
  if @@error_count!=0 or @@warning_count!=0 then
    return 1;
  end if;
  
  set @check=(select count(`ID`) from `user` where `ID`=userID and `password`=md5(concat(`username`,oldpass)));     
  if @check>0 then
    set @check=(select `ID` from `user` where `ID`=userID and `password`=md5(concat(`username`,oldpass)));  
  end if;  
  if @@error_count!=0 or @@warning_count!=0  or @check <=0 then
    return 2;
  end if;
  set @check=(select count(*) from vote);
  if @check>0 then
    insert into `tmppasschange` (select userID,`electionID`,`candidateID`,md5(concat(`electionID`,`candidateID`,oldpass)) from vote);
  end if;
  if @@error_count!=0 or @@warning_count!=0 then
    return 3;
  end if;
  set @votescount=(SELECT
        count(`vote`)
    FROM `uservote`
    WHERE `userID` = userID);
  
  if @votescount>0 then  
      OPEN votes_cur;
      the_loop: LOOP
        FETCH  votes_cur    INTO   oldvote;
        IF no_more_rows THEN
            CLOSE votes_cur;
            LEAVE the_loop;
        END IF;
        set @num=(select count(*) from tmppasschange where `vote` = oldvote);
            if @num>0 then 
                set @newvote = (select md5(concat(`electionID`,`candidateID`,newpass)) from tmppasschange where `vote` = oldvote);
                update `uservote` set `vote` = @newvote where `vote`=oldvote;
            end if;    
        if @@error_count!=0 or @@warning_count!=0 then
          return 4;
        end if;
      END LOOP the_loop;  
  end if;
  
  delete from `tmppasschange` where `userID` = userID;
  if @@error_count!=0 or @@warning_count!=0 then
    return 5;
  end if;

  update user set `password` = md5(concat(`username`,newpass)) where `ID` =userID;
  if @@error_count!=0 or @@warning_count!=0 then
    return 6;
  end if;
   
  return 7; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-08-27  3:38:09
