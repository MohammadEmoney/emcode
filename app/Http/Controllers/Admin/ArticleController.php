<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Traits\Uploads;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    use Uploads;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'short_description' => 'required',
            'image' => 'nullable|image',
            'content' => 'required'
        ]);

        $user = auth()->user();

        $image = null;
        $file = null;
        if($request->has('image')){
            $image = $this->uploadImage($request->image, Article::class);
        }

        if($request->has('zip_files')){
            $file = $this->uploadeFilesAndZip($request->zip_files, Article::class);
        }

        $data = [
            'title' => $request->title,
            'short_description' => $request->short_description,
            'content' => $request->content,
            'user_id' => $user->id,
            'image' => $image,
            'file' => $file,
            'approved' => $user->role->id == 1 ? true : false
        ];

        $article = Article::create($data);
        $article->categories()->attach($request->categories);

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $response = Gate::inspect('update', $article);

        if ($response->allowed()) {
            $this->validate(request(), [
                'title' => 'required',
                'short_description' => 'required',
                'image' => 'nullable|image',
                'content' => 'required'
            ]);

            $user = auth()->user();

            $image = null;
            $file = null;
            if($request->has('image')){
                $image = $this->uploadImage($request->image, Article::class);
            }else{
                $image = $article->image;
            }

            if($request->has('zip_files')){
                $file = $this->uploadeFilesAndZip($request->zip_files, Article::class);
            }else{
                $file = $article->file;
            }

            $data = [
                'title' => $request->title,
                'short_description' => $request->short_description,
                'content' => $request->content,
                'user_id' => $user->id,
                'image' => $image,
                'file' => $file,
                'approved' => $user->role->id == 1 ? true : false
            ];

            $article->update($data);
            $article->categories()->sync($request->categories);

            return redirect()->route('articles.index');
        } else {
            return redirect()->back()->withErrors(['error' => $response->message()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $response = Gate::inspect('delete', $article);
        if ($response->allowed()) {

            if($article->image){
                $imagePath = public_path($article->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            if($article->file){
                $filePath = public_path($article->file);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $article->delete();
            return redirect()->route('articles.index');

        }else{

            return redirect()->back()->withErrors(['error' => $response->message()]);

        }
    }

    /**
     * CKEditor Image save in public storage.
     *
     * @param Request $request
     *
     * @return string
     */
    public function attachImage(Request $request)
    {
        $this->validate(request(), [
            'upload' => 'mimes:jpeg,jpg,gif,png'
        ]);

        $url = $this->uploadImage($request->upload, Article::class);

        echo "<script>window.parent.CKEDITOR.tools.callFunction('{$request->CKEditorFuncNum}','{$url}','')</script>";

    }
}
