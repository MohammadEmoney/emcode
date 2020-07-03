<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;

class WordsController extends Controller
{
    public function index($day)
    {
        return auth()->user()->words->where('day', $day)->where('learnt', false);
    }
}
