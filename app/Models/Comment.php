<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'title', 'email', 'body', 'user_id', 'name', 'approved', 'comment_id', 'article_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function children()
    {
        return $this->hasMany('App\Models\Comment', 'comment_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Comment');
    }
}
