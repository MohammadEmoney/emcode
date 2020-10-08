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

    public function next(){
        return Student::where('id', '>', $this->id)->orderBy('id','asc')->first();
    }

    public  function previous(){
        return Student::where('id', '<', $this->id)->orderBy('id','desc')->first();
    }

    public function reports()
    {
        return $this->hasMany(ReportCard::class);
    }
}
