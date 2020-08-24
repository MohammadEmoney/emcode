<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_schedules')->truncate();
        DB::table('course_schedules')->insert([
            ['day' => 'شنبه', 'break' => 10,'class_first' => 'Science', 'class_second' => 'math', 'class_third' => 'Farsi', 'class_forth' => 'Physics', 'class_fifth' => 'Gym', 'class_first_time' => '8-8:45', 'class_second_time' => '8-8:45', 'class_third_time' => '8-8:45', 'class_forth_time' => '8-8:45', 'class_fifth_time' => '8-8:45', 'day_type' => 'even', 'sort_order' => 1],
            ['day' => 'یکشنبه', 'break' => 10,'class_first' => 'Science', 'class_second' => 'math', 'class_third' => 'Farsi', 'class_forth' => 'Physics', 'class_fifth' => 'Gym', 'class_first_time' => '8-8:45', 'class_second_time' => '8-8:45', 'class_third_time' => '8-8:45', 'class_forth_time' => '8-8:45', 'class_fifth_time' => '8-8:45', 'day_type' => 'even', 'sort_order' => 2],
            ['day' => 'دوشنبه', 'break' => 10,'class_first' => 'Science', 'class_second' => 'math', 'class_third' => 'Farsi', 'class_forth' => 'Physics', 'class_fifth' => 'Gym', 'class_first_time' => '8-8:45', 'class_second_time' => '8-8:45', 'class_third_time' => '8-8:45', 'class_forth_time' => '8-8:45', 'class_fifth_time' => '8-8:45', 'day_type' => 'even', 'sort_order' => 3],
            ['day' => 'سه شنبه', 'break' => 10,'class_first' => 'Science', 'class_second' => 'math', 'class_third' => 'Farsi', 'class_forth' => 'Physics', 'class_fifth' => 'Gym', 'class_first_time' => '8-8:45', 'class_second_time' => '8-8:45', 'class_third_time' => '8-8:45', 'class_forth_time' => '8-8:45', 'class_fifth_time' => '8-8:45', 'day_type' => 'even', 'sort_order' => 4],
            ['day' => 'چهارشنبه', 'break' => 10,'class_first' => 'Science', 'class_second' => 'math', 'class_third' => 'Farsi', 'class_forth' => 'Physics', 'class_fifth' => 'Gym', 'class_first_time' => '8-8:45', 'class_second_time' => '8-8:45', 'class_third_time' => '8-8:45', 'class_forth_time' => '8-8:45', 'class_fifth_time' => '8-8:45', 'day_type' => 'even', 'sort_order' => 5],
            ['day' => 'شنبه', 'break' => 10,'class_first' => 'Science', 'class_second' => 'math', 'class_third' => 'Farsi', 'class_forth' => 'Physics', 'class_fifth' => 'Gym', 'class_first_time' => '8-8:45', 'class_second_time' => '8-8:45', 'class_third_time' => '8-8:45', 'class_forth_time' => '8-8:45', 'class_fifth_time' => '8-8:45', 'day_type' => 'odd', 'sort_order' => 1],
            ['day' => 'یکشنبه', 'break' => 10,'class_first' => 'Science', 'class_second' => 'math', 'class_third' => 'Farsi', 'class_forth' => 'Physics', 'class_fifth' => 'Gym', 'class_first_time' => '8-8:45', 'class_second_time' => '8-8:45', 'class_third_time' => '8-8:45', 'class_forth_time' => '8-8:45', 'class_fifth_time' => '8-8:45', 'day_type' => 'odd', 'sort_order' => 2],
            ['day' => 'دوشنبه', 'break' => 10,'class_first' => 'Science', 'class_second' => 'math', 'class_third' => 'Farsi', 'class_forth' => 'Physics', 'class_fifth' => 'Gym', 'class_first_time' => '8-8:45', 'class_second_time' => '8-8:45', 'class_third_time' => '8-8:45', 'class_forth_time' => '8-8:45', 'class_fifth_time' => '8-8:45', 'day_type' => 'odd', 'sort_order' => 3],
            ['day' => 'سه شنبه', 'break' => 10,'class_first' => 'Science', 'class_second' => 'math', 'class_third' => 'Farsi', 'class_forth' => 'Physics', 'class_fifth' => 'Gym', 'class_first_time' => '8-8:45', 'class_second_time' => '8-8:45', 'class_third_time' => '8-8:45', 'class_forth_time' => '8-8:45', 'class_fifth_time' => '8-8:45', 'day_type' => 'odd', 'sort_order' => 4],
            ['day' => 'چهارشنبه', 'break' => 10,'class_first' => 'Science', 'class_second' => 'math', 'class_third' => 'Farsi', 'class_forth' => 'Physics', 'class_fifth' => 'Gym', 'class_first_time' => '8-8:45', 'class_second_time' => '8-8:45', 'class_third_time' => '8-8:45', 'class_forth_time' => '8-8:45', 'class_fifth_time' => '8-8:45', 'day_type' => 'odd', 'sort_order' => 5],
        ]);
    }
}
