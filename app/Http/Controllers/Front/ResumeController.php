<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Info;
use App\Models\Portfolio;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use PDF;

class ResumeController extends Controller
{
    public function index(Request $request)
    {
        $request->validate(['lan' => 'sometimes|in:fa,en']);
        $lan = $request->has('lan') ? strtolower($request->lan) : 'fa';
        $info = Info::where('lan' , $lan)->first();
        $portfolios = Portfolio::where('lan' , $lan)->get();
        $experiences = Experience::where('lan' , $lan)->orderBy('id', 'DESC')->get();
        $educations = Education::where('lan' , $lan)->orderBy('id', 'DESC')->get();
        $skills = Skills::get();
        $socials = json_decode($info->socials);
        App::setLocale($lan);
        return view('resume.index', compact('info', 'portfolios', 'experiences', 'skills', 'socials', 'educations', 'lan'));
    }

    public function downloadResume(Request $request)
    {
        $request->validate(['lan' => 'sometimes|in:fa,en']);
        $lan = $request->has('lan') ? strtolower($request->lan) : 'fa';
        $info = Info::where('lan' , $lan)->first();
        $portfolios = Portfolio::where('lan' , $lan)->get();
        $experiences = Experience::where('lan' , $lan)->orderBy('id', 'DESC')->get();
        $educations = Education::where('lan' , $lan)->orderBy('id', 'DESC')->get();
        $skills = Skills::get();
        $socials = json_decode($info->socials);
        App::setLocale($lan);
        $pdf = PDF::loadView('resume.resume_download',  compact('info', 'portfolios', 'experiences', 'skills', 'socials', 'educations', 'lan'));
        // $pdf = PDF::loadView('resume.index',  compact('info', 'portfolios', 'experiences', 'skills', 'socials', 'educations', 'lan'));
        return $pdf->download('resume.pdf');
    }

    public function seed()
    {
        DB::table('infos')->truncate();
        DB::table('portfolios')->truncate();
        DB::table('experiences')->truncate();
        DB::table('skills')->truncate();
        DB::table('education')->truncate();

        $info = [
            ['name' => 'Mohammad Imani', 'email' => 'memoney026@gmail.com', 'title' => 'back-end developer', 'image' => '/img/profile2.jpg', 'age' => 29, 'phone' => '+98 935 420 9109', 'address' => 'Bahar St - Karaj - Alborz, Iran', 'languages' => json_encode(['Persian', 'English']), 'socials' => json_encode(['facebook' => 'https://www.facebook.com/mohammad.eminay.3', 'google' => '', 'linkedin' => 'https://www.linkedin.com/in/mohammad-imani-08402417b/', 'instagram' => 'https://www.instagram.com/eminay_mandi/', 'twitter' => 'https://twitter.com/Eminay_mandi', 'telegram' => 'https://t.me/Oct29_1991', 'github' => 'https://github.com/MohammadEmoney', 'gitlab' => 'https://gitlab.com/Eminay']), 'about' => 'Detail-oriented, certified, and organized \'PHP Programmer\' with 2+ years of experience in designing and developing dynamic web application/software. Capable of understanding client requirements and translating into code to add new features or modifications for existing products. Adept in coordinating with testers to perform acceptance testing as well as maintain technical documents. Ability to work with the team, and have excellent problem-solving, and interpersonal skills.', 'lan' => 'en'],

            ['name' => 'محمد ایمانی', 'email' => 'memoney026@gmail.com', 'title' => 'توسعه دهنده وب - لاراول', 'image' => '/img/profile.jpg', 'age' => 29, 'phone' => '+98 935 420 9109', 'address' => 'ایران - البرز - کرج - خیابان بهار', 'languages' => json_encode(['فارسی', 'انگلیسی']), 'socials' => json_encode(['facebook' => 'https://www.facebook.com/mohammad.eminay.3', 'google' => '', 'linkedin' => 'https://www.linkedin.com/in/mohammad-imani-08402417b/', 'instagram' => 'https://www.instagram.com/eminay_mandi/', 'twitter' => 'https://twitter.com/Eminay_mandi', 'telegram' => 'https://t.me/Oct29_1991', 'github' => 'https://github.com/MohammadEmoney', 'gitlab' => 'https://gitlab.com/Eminay']), 'about' => 'برنامه نویس مسلط به Php، و فریمورک لاراول با توانایی ارتباط خوب با همکاران و کار کردن در شرایط سخت. تجربه کاری به صورت دورکاری با شرکت های داخل و خارج از کشور.'],
        ];

        foreach($info as $inf)
            Info::create($inf);

        $porfs = [
            ['link' => 'https://betabattle.net/', 'image' => '/img/portfolios/betabattle.jpg', 'title' => 'Betabattle', 'work' => 'Web Development', 'lan' => 'en' ],
            ['link' => 'https://partylifter.com/', 'image' => '/img/portfolios/partylifter.jpeg', 'title' => 'Party Lifter', 'work' => 'Web Development', 'lan' => 'en' ],
            ['link' => 'http://jalizan.com/', 'image' => '/img/portfolios/Jalizan.jpg', 'title' => 'Jalizan', 'work' => 'Web Development', 'lan' => 'en' ],
            ['link' => 'http://takeyourhotel.com/', 'image' => '/img/portfolios/takeyourhotel.PNG', 'title' => 'Take Your Hotel', 'work' => 'Web Development', 'lan' => 'en' ],
            ['link' => 'https://betabattle.net/', 'image' => '/img/portfolios/betabattle.jpg', 'title' => 'بتابتل', 'work' => 'اپلیکیشن موبایل'],
            ['link' => 'https://partylifter.com/', 'image' => '/img/portfolios/partylifter.jpeg', 'title' => 'پارتی لیفتر', 'work' => 'وبسایت'],
            ['link' => 'http://jalizan.com/', 'image' => '/img/portfolios/Jalizan.jpg', 'title' => 'جالیزان', 'work' => 'اپلیکیشن موبایل'],
            ['link' => 'http://takeyourhotel.com/', 'image' => '/img/portfolios/takeyourhotel.PNG', 'title' => 'عمو هتل', 'work' => 'وبسایت'],
        ];

        foreach($porfs as $por)
            Portfolio::create($por);

        $exs = [
            ['years' => 'DECEMBER 2018 - MARCH 2020', 'company' => 'Azadeh', 'job_title' => 'Backend-developer', 'description' => 'Developed client websites and applications based on design hand off-provided by lead designers .
            Create new tables within MySQL.
            Test and document code.
            Provide feedback to the development group to improve Agile Project management methods.', 'lan' => 'en'],
            ['years' => 'MARCH 2020 - PRESENT', 'company' => 'Serico', 'job_title' => 'Backend-developer', 'description' => 'Collaborated with product and engineering team members to define and develop new product concepts.
            Drove continual improvement to system architecture by refactoring old legacy code.
            Coordinated with QA testers for end-to-end unit testing and post-production testing.
            Coded user-customizable applications that converted raw data from design engine to easily understandable graphical formats.', 'lan' => 'en'],
            ['years' => 'دی ماه 98 - اسفند 99', 'company' => 'شرکت هواپیمایی آزاده', 'job_title' => 'توسعه دهنده لاراول', 'description' => 'توسعه وبسایت سمت سرور و وبسایت سمت مشتری طبق طراحی ارائه شده توسط تیم طراحی.
            طراحی ساختار جداول پایگاه داده با مای اس کیو ال.
            تست نویسی و داکیومنت گذاری کدها.
            '],
            ['years' => 'فروردین 99 - حال حاضر', 'company' => 'سرایکو', 'job_title' => 'توسعه دهنده لاراول', 'description' => 'تعامل با اعضای تیم توسعه و مهندسین نرم افزار برای تعریف و توسعه مفهوم محصول جدید.
            سوق داده به معماری سیستم برای تداوم بهبودی با ریفکتور کردن کد های قدیمی.
            همکاری با QA تستر ها برای واحد تست end-to-end .
            طراحی اپلیکشن های شخصی سازی شده کاربر برای تبدیل داده خام از موتور طراحی به فرمت های قابل فهم گرافیکی'],
        ];

        foreach($exs as $ex)
            Experience::create($ex);

        $educs = [
            ['years' => '2005 - 2009', 'organization' => 'SCHOOL OF Shahid Sayad Shirazi', 'title' => 'Science and Mathematics', 'degree' => 'High School', 'description' => 'Mathematics is the key to opportunity. No longer just the language of science, mathematics now contributes in direct and fundamental ways to business, finance, health, and defense. For students, it opens doors to careers. For citizens, it enables informed decisions. For nations, it provides knowledge to compete in a technological community. To participate fully in the world of the future, we must tap the power of mathematics.
            I have studied Mathematic and my favorite subjects were Math and Physics.', 'lan' => 'en'],

            ['years' => '2010 - 2015', 'organization' => 'UNIVERSITY OF Payam nour Qazvin', 'title' => 'Bachelor of Computer Science', 'degree' => 'Bachelor\'s Degree', 'description' => 'I am an undergraduate student studying Computer Science at the University of Payam Nour – Qazvin. I am interested in developing new technology that will help people learn to design, experiment, build, communicate, and collaborate! Currently, I am developing tools for people with visual impairments to learn how to code.', 'lan' => 'en'],

            ['years' => '1384 - 1388', 'organization' => 'مدرسه شهید صیادشیرازی', 'title' => 'ریاضی فیزیک', 'degree' => 'دبیرستان','description' => 'ریاضیات کلیدی برای فرصت هاست. دیگر نمی توان آن را یک زبان دانست بلکه امروزه با تجارت های اساسی، مالی، ، سلامت و دفاع رابطه مستقیم دارد. برای دانشجویان، در را به سوی مشاغل باز می کند. برای شهروندان، تصمیمات شکل گرفته را قادر می سازد.  برای ملت، دانش رقابت در جامعه تکنولوژیکال را فراهم می سازد. برای مشارکت کامل در جهان آینده، ما باید از قدرت ریاضیات بهره ببریم.
            من 4 سال در دبیرستان ریاضی فیزیک تحصیل کرده ام و مهم ترین درس های مورد علاقه من ریاضی و فیزیک بوده است.'],
            ['years' => '1390 - 1395', 'organization' => 'دانشگاه پیام نور قزوین', 'title' => 'کارشناسی مهندسی نرم افزار', 'degree' => 'کارشناسی', 'description' => 'من مدرک کارشناسی خود را در سال 1395 در رشته کامپیوتر ، مهندسی نرم افزار از دانشکاه پیام نور قزوین اخذ نموده ام. من علاقه زیادی به توسعه اپلیکیشن و طراحی سایت دارم و در حال حالضر روی پروژه ای در یک تیم برنامه نویسی مشغول به کار هستم.'],

        ];

        foreach($educs as $edu)
            Education::create($edu);

        $skills = [
            ['title' => 'HTML', 'percentage' => 80],
            ['title' => 'CSS', 'percentage' => 75],
            ['title' => 'BOOTSTRAP', 'percentage' => 80],
            ['title' => 'JAVASCRIPT', 'percentage' => 65],
            ['title' => 'PHP', 'percentage' => 65],
            ['title' => 'LARAVEL', 'percentage' => 75],
        ];
        foreach($skills as $sk)
            Skills::create($sk);

        return redirect()->route('resume');
    }
}
