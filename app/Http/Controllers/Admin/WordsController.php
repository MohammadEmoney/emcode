<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\WordService;
use App\Models\Word;

class WordsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dic = new WordService();
        // return $dic->grab_json_definition($request->word, "learners", "8f10ea6b-a266-4853-9485-b57d4cf9cf25");

        $words = auth()->user()->words()->paginate(10);
        return view('admin.words.index', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.words.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dic = new WordService();
        $jdef = $dic->grab_json_definition($request->word, "learners", "8f10ea6b-a266-4853-9485-b57d4cf9cf25");
        $response = json_decode($jdef);
        if(count($response)){
            foreach($response as $word){
                $data = [
                    'word' => $request->word,
                    'user_id' => auth()->id(),
                    'word_id' => $word->meta->id,
                    'uuid' => $word->meta->uuid,
                    'stems' => json_encode($word->meta->stems),
                    'app_shortdef' => json_encode($word->meta->{"app-shortdef"}),
                    'offensive' => $word->meta->offensive,
                    'hwi' => json_encode($word->hwi),
                    'fl' => $word->fl,
                    'ins' => json_encode(isset($word->ins) ? $word->ins : $word->uros),
                    'def' => json_encode($word->def),
                    'shortdef' => json_encode($word->shortdef),
                ];
                Word::create($data);
            }
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
