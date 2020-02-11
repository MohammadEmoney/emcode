<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleView extends Model
{
    protected $fillable = [
        'article_id', 'count'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public static function mostPopularArticles($count)
    {
        return self::with('article')->orderBy('count', 'DESC')->take($count)->get();
    }
}
