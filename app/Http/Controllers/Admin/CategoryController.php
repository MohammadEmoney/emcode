<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Traits\Uploads;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use Uploads;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.categories.create', compact('categories'));
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
            'parent_id' => 'nullable|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        $user = auth()->user();

        if($request->hasFile('image')){
            $className = Category::class;
            $image = $this->UploadImage($request->image, $className);
        }else{
            $image = null;
        }

        $data = [
            'title' => $request->title,
            'user_id' => $user->id,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'image' => $image
        ];

        Category::create($data);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate(request(), [
            'title' => 'required',
            'parent_id' => 'nullable|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        $user = auth()->user();

        if($request->hasFile('image')){
            $className = Category::class;
            $image = $this->UploadImage($request->image, $className);
        }else{
            $image = $category->image;
        }

        $data = [
            'title' => $request->title,
            'user_id' => $user->id,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'image' => $image
        ];

        $category->update($data);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->image){
            $imagePath = public_path($category->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $category->delete();
        return redirect()->route('categories.index');
    }
}
