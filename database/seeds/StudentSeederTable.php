<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('months')->truncate();
        DB::table('courses')->truncate();
        DB::table('students')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('months')->insert([
            ['name' => 'شهریور'],
            ['name' => 'مهر'],
            ['name' => 'آبان'],
            ['name' => 'آذر'],
            ['name' => 'دی'],
            ['name' => 'بهمن'],
            ['name' => 'اسفند'],
            ['name' => 'فروردین'],
            ['name' => 'اردیبهشت'],
            ['name' => 'خرداد'],
            ['name' => 'تیر'],
            ['name' => 'مرداد'],
        ]);

        DB::table('courses')->insert([
            ['name' => 'قرآن'],
            ['name' => 'فارسی'],
            ['name' => 'ریاضی'],
            ['name' => 'علوم'],
            ['name' => 'هنر'],
            ['name' => 'ورزش'],
            ['name' => 'عملکرد تربیتی'],
        ]);

        DB::table('students')->insert([
            ['first_name' => 'آرمین', 'last_name' => 'سالم', 'gender' => 'boy'],
            ['first_name' => 'امیرعلی', 'last_name' => 'مدیحی', 'gender' => 'boy'],
            ['first_name' => 'پارسا', 'last_name' => 'اشرفی', 'gender' => 'boy'],
            ['first_name' => 'پارسا', 'last_name' => 'غلامی', 'gender' => 'boy'],
            ['first_name' => 'پوریا', 'last_name' => 'قلخانباز', 'gender' => 'boy'],
            ['first_name' => 'پوریا', 'last_name' => 'عبدی', 'gender' => 'boy'],
            ['first_name' => 'حسین', 'last_name' => 'نجفی', 'gender' => 'boy'],
            ['first_name' => 'رادین', 'last_name' => 'علی یاری', 'gender' => 'boy'],
            ['first_name' => 'شایان', 'last_name' => 'فیضی', 'gender' => 'boy'],
            ['first_name' => 'عرشیا', 'last_name' => 'دینی', 'gender' => 'boy'],
            ['first_name' => 'علیرضا', 'last_name' => 'محمدپور', 'gender' => 'boy'],
            ['first_name' => 'کیان', 'last_name' => 'انصاری', 'gender' => 'boy'],
            ['first_name' => 'محمدامین', 'last_name' => 'ترک', 'gender' => 'boy'],
            ['first_name' => 'محمد', 'last_name' => 'بیگدلو', 'gender' => 'boy'],
            ['first_name' => 'محمد پارسا', 'last_name' => 'رحیمی', 'gender' => 'boy'],
            ['first_name' => 'محمد', 'last_name' => 'حسن پور', 'gender' => 'boy'],
            ['first_name' => 'محمد متین', 'last_name' => 'گلمحمدی', 'gender' => 'boy'],
            ['first_name' => 'محمد مهدی', 'last_name' => 'پاشایی', 'gender' => 'boy'],
            ['first_name' => 'محمد یاسین', 'last_name' => 'جهان بین', 'gender' => 'boy'],
            ['first_name' => 'محمد رضا', 'last_name' => 'محمدی', 'gender' => 'boy'],
            ['first_name' => 'آزیتا', 'last_name' => 'محمدی', 'gender' => 'girl'],
            ['first_name' => 'النا', 'last_name' => 'بیگدلی', 'gender' => 'girl'],
            ['first_name' => 'الهام', 'last_name' => 'یوسفی', 'gender' => 'girl'],
            ['first_name' => 'بهناز', 'last_name' => 'حیدری', 'gender' => 'girl'],
            ['first_name' => 'ریتا', 'last_name' => 'شفیعی', 'gender' => 'girl'],
            ['first_name' => 'زهرا', 'last_name' => 'رحمتی', 'gender' => 'girl'],
            ['first_name' => 'زینب', 'last_name' => 'پاییزه', 'gender' => 'girl'],
            ['first_name' => 'زینب', 'last_name' => 'سعیدی', 'gender' => 'girl'],
            ['first_name' => 'ستایش', 'last_name' => 'تسلط', 'gender' => 'girl'],
            ['first_name' => 'سدنا', 'last_name' => 'امامیان', 'gender' => 'girl'],
            ['first_name' => 'سما', 'last_name' => 'اصغری', 'gender' => 'girl'],
            ['first_name' => 'سوگند', 'last_name' => 'بیات', 'gender' => 'girl'],
            ['first_name' => 'غزل', 'last_name' => 'ابراهیمی', 'gender' => 'girl'],
            ['first_name' => 'فاطمه', 'last_name' => 'ایرج', 'gender' => 'girl'],
            ['first_name' => 'فاطمه سما', 'last_name' => 'نصیری', 'gender' => 'girl'],
            ['first_name' => 'فاطمه', 'last_name' => 'غفاری', 'gender' => 'girl'],
            ['first_name' => 'فاطمه', 'last_name' => 'حسن آبادی', 'gender' => 'girl'],
            ['first_name' => 'مائده', 'last_name' => 'پورنژادیان', 'gender' => 'girl'],
            ['first_name' => 'ملینا', 'last_name' => 'نریمانی', 'gender' => 'girl'],
            ['first_name' => 'نیکا', 'last_name' => 'اسمعیلی', 'gender' => 'girl'],
            ['first_name' => 'هانیه', 'last_name' => 'لراوند', 'gender' => 'girl'],
            ['first_name' => 'هستی', 'last_name' => 'احمدی', 'gender' => 'girl'],
            ['first_name' => 'یسنا', 'last_name' => 'نطری', 'gender' => 'girl'],
            ['first_name' => 'یسنا', 'last_name' => 'قاطع', 'gender' => 'girl'],
        ]);
    }
}
