<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like(Request $request)
    {
        $this->validate(request(), [
            'like' => 'required',
            'article_id' => 'required|numeric'
        ]);
        $user = auth()->user();

        $like = Like::create([
            'user_id' => $user->id,
            'article_id' => $request->article_id,
            'liked' => true
        ]);

        return response()->json($like);
    }

    public function updateLike(Request $request, Like $like)
    {
        $this->validate(request(), [
            'like' => 'required',
            'article_id' => 'required|numeric'
        ]);
        $bool = $request->like == "false" ? false : true;
        $like->update(['liked' => $bool]);
        return response()->json(["bool" => $bool, "request" => $request->like, "obj" => $like]);
    }
}
