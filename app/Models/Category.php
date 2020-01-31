<?php

namespace App\Models;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title', 'image', 'description', 'parent_id', 'user_id'
    ];

    public function path()
    {
        return url("/categories/{$this->id}-" . Str::slug($this->title));
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
