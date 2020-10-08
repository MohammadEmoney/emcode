<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportCard extends Model
{
    protected $fillable = [
        'student_id', 'month_id', 'grades'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function month()
    {
        return $this->belongsTo(Month::class);
    }

    public function courses()
    {
        return $this->belongsToMany(course::class);
    }
}
