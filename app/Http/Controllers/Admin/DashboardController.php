<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleView;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Dashboard view.
     */
    public function index()
    {
        $articles = Article::with(['view', 'liked'])->get();

        $likes = 0;
        $viewCounts = 0;

        foreach($articles as $article){
            $viewCounts += $article->view->count;
            $likes += $article->liked->count();
        }

        return view('admin.dashboard', compact('articles','viewCounts', 'likes'));
    }
}
