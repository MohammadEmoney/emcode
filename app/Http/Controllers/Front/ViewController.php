<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ArticleView;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function view(Request $request)
    {
        $articleExists = ArticleView::where('article_id', $request->article_id)->first();
        if($articleExists){
            $incCount = $articleExists->count + 1;
            $articleExists->update(['count' => $incCount]);
        }else{
            ArticleView::create(['article_id' => $request->article_id, 'count' => 1]);
        }
    }
}
