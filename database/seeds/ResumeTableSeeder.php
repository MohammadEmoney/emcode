<?php

use App\Models\Experience;
use App\Models\Info;
use App\Models\Portfolio;
use App\Models\Skills;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResumeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infos')->truncate();
        DB::table('portfolios')->truncate();
        DB::table('experiences')->truncate();
        DB::table('skills')->truncate();

        Info::insert([
            ['name' => 'Mohammad Imani', 'email' => 'memoney026@gmail.com', 'title' => 'back-end developer', 'image' => '/img/user.png', 'age' => 29, 'phone' => '+98 935 420 9109', 'address' => 'Bahar St - Karaj - Alborz, Iran', 'languages' => json_encode(['Persian', 'English']), 'socials' => json_encode(['facebook' => 'https://www.facebook.com/mohammad.eminay.3', 'google' => '', 'linkedin' => 'https://www.linkedin.com/in/mohammad-imani-08402417b/', 'instagram' => 'https://www.instagram.com/eminay_mandi/', 'twitter' => 'https://twitter.com/Eminay_mandi', 'telegram' => 'https://t.me/Oct29_1991']), 'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem perspiciatis quas necessitatibus quos delectus sint eaque alias fugit. Soluta numquam nulla eos commodi consectetur laboriosam, autem aliquam incidunt explicabo sunt?', 'lan' => 'en'],

            ['name' => 'محمد ایمانی', 'email' => 'memoney026@gmail.com', 'title' => 'توسعه دهنده وب - لاراول', 'image' => '/img/user.png', 'age' => 29, 'phone' => '+98 935 420 9109', 'address' => 'ایران - البرز - کرج - خیابان بهار', 'languages' => json_encode(['فارسی', 'انگلیسی']), 'socials' => json_encode(['facebook' => 'https://www.facebook.com/mohammad.eminay.3', 'google' => '', 'linkedin' => 'https://www.linkedin.com/in/mohammad-imani-08402417b/', 'instagram' => 'https://www.instagram.com/eminay_mandi/', 'twitter' => 'https://twitter.com/Eminay_mandi', 'telegram' => 'https://t.me/Oct29_1991']), 'about' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.'],
        ]);

        Portfolio::insert([
            ['link' => 'https://betabattle.net/', 'image' => 'https://picsum.photos/200/300', 'title' => 'Betabattle', 'work' => 'Web Development', 'lan' => 'en' ],
            ['link' => 'https://partylifter.com/', 'image' => 'https://picsum.photos/200/300', 'title' => 'Party Lifter', 'work' => 'Web Development', 'lan' => 'en' ],
            ['link' => 'http://jalizan.com/', 'image' => 'https://picsum.photos/200/300', 'title' => 'Jalizan', 'work' => 'Web Development', 'lan' => 'en' ],
            // ['link' => 'https://betabattle.net/', 'image' => 'https://picsum.photos/200/300', 'title' => 'بتابتل', 'work' => 'اپلیکیشن موبایل'],
            // ['link' => 'https://partylifter.com/', 'image' => 'https://picsum.photos/200/300', 'title' => 'پارتی لیفتر', 'work' => 'وبسایت'],
            // ['link' => 'http://jalizan.com/', 'image' => 'https://picsum.photos/200/300', 'title' => 'جالیزان', 'work' => 'اپلیکیشن موبایل'],
        ]);

        Experience::insert([
            ['years' => 'DECEMBER 2018 - MARCH 2020', 'company' => 'Azadeh', 'job_title' => 'Backend-developer', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem perspiciatis quas necessitatibus quos delectus sint eaque alias fugit. Soluta numquam nulla eos commodi consectetur laboriosam, autem aliquam incidunt explicabo sunt?', 'lan' => 'en'],
            ['years' => 'MARCH 2020 - PRESENT', 'company' => 'Serico', 'job_title' => 'Backend-developer', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem perspiciatis quas necessitatibus quos delectus sint eaque alias fugit. Soluta numquam nulla eos commodi consectetur laboriosam, autem aliquam incidunt explicabo sunt?', 'lan' => 'en'],
            // ['years' => 'دی ماه 98 - اسفند 99', 'company' => 'شرکت هواپیمایی آزاده', 'job_title' => 'توسعه دهنده لاراول', 'description' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.'],
            // ['years' => 'MARCH 2020 - PRESENT', 'company' => 'Serico', 'job_title' => 'Backend-developer', 'description' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.'],
        ]);

        Skills::insert([
            ['title' => 'HTML', 'percentage' => 80],
            ['title' => 'CSS', 'percentage' => 75],
            ['title' => 'BOOTSTRAP', 'percentage' => 80],
            ['title' => 'JAVASCRIPT', 'percentage' => 65],
            ['title' => 'PHP', 'percentage' => 65],
            ['title' => 'LARAVEL', 'percentage' => 75],
        ]);
    }
}
