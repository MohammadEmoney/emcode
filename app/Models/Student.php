<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [];

    protected $appends = [
        'name'
    ];

    public function getNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function reports()
    {
        return $this->hasMany(ReportCard::class);
    }
}
