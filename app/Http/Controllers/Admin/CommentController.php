<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Notifications\NewComment;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'body' => 'required',
            'email' => 'required|email',
            'article_id' => 'required|integer',
            'comment_id' => 'sometimes|integer'
        ]);

        $user = auth()->user();

        $data = [
            'title' => $request->title,
            'body' => $request->body,
            'email' => $request->email,
            'name' => $request->name,
            'user_id' => isset($user->id) ? $user->id : null,
            'article_id' => $request->article_id,
            'comment_id' => $request->has('comment_id') ? $request->comment_id : null
        ];

        $comment = Comment::create($data);

        $admins = User::where('role_id', 1)->orWhere('role_id', 2)->get();
        foreach($admins as $admin){
            $admin->notify(new NewComment($comment));
        }


        return redirect()->back()->with('success', ['Your comment saved.']); ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        $unreadNotifications = Auth()->user()->unreadNotifications;
        foreach($unreadNotifications as $notification){
            if($notification->type == NewComment::class && $notification->data['id'] == $comment->id){
                $notification->markAsRead();
            }
        }
        return view('admin.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function approve(Request $request, Comment $comment)
    {
        $comment->update(['approved' => !$request->approve]);
        return response()->json(["approve" => $comment->approved]);
    }
}
