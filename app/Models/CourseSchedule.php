<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSchedule extends Model
{
    protected $fillable = [
        'day',
        'sort_order',
        'break',
        'class_first',
        'class_second',
        'class_third',
        'class_forth',
        'class_fifth',
        'class_first_time',
        'class_second_time',
        'class_third_time',
        'class_forth_time',
        'class_fifth_time',
        'day_type'
    ];


}
