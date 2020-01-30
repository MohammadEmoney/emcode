<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'short_description', 'image', 'file', 'content', 'approved', 'user_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function liked()
    {
        return $this->hasMany(Like::class)->where('liked', true);
    }

    public function view()
    {
        return $this->hasOne(ArticleView::class);
    }

    public function approvedComments()
    {
        return $this->hasMany(Comment::class)->where('approved', true);
    }

    /**
     * Get count of likes
     *
     * @return int
     */
    public function likesCount()
    {
        return $this->liked()->count();
    }

    /**
     * Get Liked User.
     *
     * @param int $user_id
     * @return Like
     */
    public function likedUser($user_id)
    {
        return $this->like()->where('user_id', $user_id)->first();
    }

    /**
     * Get a Random Liked User of article
     *
     * @return User
     */
    public function randomLikedUser()
    {
        return $this->like()->inRandomOrder()->first()->user;
    }
}
