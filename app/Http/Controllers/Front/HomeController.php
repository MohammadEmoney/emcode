<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;

class HomeController extends Controller
{
    public function home()
    {
        $articles = Article::paginate(10);
        return view('front.home', compact('articles'));
    }

    public function single(Article $article)
    {
        return view('front.single', compact('article'));
    }

    public function categories()
    {
        $categories = Category::paginate(12);
        return view('front.categories', compact('categories'));
    }

    public function singleCategory(Category $category)
    {
        $articles = $category->articles()->paginate(12);
        return view('front.single-category', compact('category', 'articles'));
    }

    public function contact()
    {
        return view('front.contact');
    }
}
