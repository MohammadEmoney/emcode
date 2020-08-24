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

    public function searchPage()
    {
        return view('front.search');
    }

    public function search(Request $request, WordService $dic)
    {
        $data = [];
        $words = $dic->grab_json_definition($request->word, "learners", "8f10ea6b-a266-4853-9485-b57d4cf9cf25");
        $response = json_decode($words);
        dd($response);
        if(count($response)){

            foreach($response as $word){
                if(isset($word->meta)){
                    $data[] = [
                        'word' => $request->word,
                        'word_id' => $word->meta->id,
                        'uuid' => $word->meta->uuid,
                        'stems' => json_encode($word->meta->stems),
                        'app_shortdef' => json_encode($word->meta->{"app-shortdef"}),
                        'offensive' => $word->meta->offensive,
                        'hwi' => json_encode($word->hwi),
                        'fl' => isset($word->fl) ? $word->fl : null,
                        'ins' => json_encode(isset($word->ins) ? $word->ins : (isset($word->uros) ? $word->uros : null)),
                        'def' => json_encode(isset($word->def) ? $word->def : null),
                        'shortdef' => json_encode($word->shortdef),
                    ];
                }else{
                    $data[] = $word;
                }
            }
            return back()->with(['data' => $data]);
        }
        return back()->with(['data' => "Word not Found."]);
    }
}
