<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;

class HomeController extends Controller
{
    /**
     * Return Main page of the Website view.
     */
    public function home()
    {
        $articles = Article::with(['comments', 'categories', 'user'])->orderBy('id', 'DESC')->paginate(10);
        return view('front.home', compact('articles'));
    }

    /**
     * Return Single page of the Article view
     */
    public function single(Article $article)
    {
        return view('front.single', compact('article'));
    }

    /**
     * Return List of Categories page view.
     */
    public function categories()
    {
        $categories = Category::paginate(12);
        return view('front.categories', compact('categories'));
    }

    /**
     * Return Single page of the Category view.
     */
    public function singleCategory(Category $category)
    {
        $articles = $category->articles()->paginate(12);
        return view('front.single-category', compact('category', 'articles'));
    }

    /**
     * Return Contact page view.
     */
    public function contact()
    {
        return view('front.contact');
    }

    /**
     * Subscribtion form submit.
     *
     * @param Request $request
     * @return string
     */
    public function subscribe(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email|unique:subscribers,email'
        ]);

        Subscriber::create([ 'email' => $request->email ]);

        return redirect('/')->with('success', "Your Email Successfully Saved.");
    }
}
