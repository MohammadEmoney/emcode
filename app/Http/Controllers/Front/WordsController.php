<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Services\WordService;
use App\Models\Word;
use Illuminate\Http\Request;

class WordsController extends Controller
{
    public function index($day)
    {
        return auth()->user()->words->where('day', $day)->where('learnt', false);
    }

    public function search(Request $request, WordService $dic)
    {
        return $dic->grab_json_definition($request->word, "learners", "8f10ea6b-a266-4853-9485-b57d4cf9cf25");
    }
}
