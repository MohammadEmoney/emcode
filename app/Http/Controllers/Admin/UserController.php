<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Uploads;
use App\Models\Role;
use App\Notifications\NewRegisteredUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use Uploads;

    public function __construct()
    {
        $this->middleware('super.admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
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
            'name' => 'required',
            'email' => 'required|email|string|max:255|unique:users,email',
            'password' => 'required',
            'role_id' => 'required|numeric',
        ]);

        $image = null;
        if($request->has('image')){
            $image = $this->uploadImage($request->image, User::class);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'image' => $image,
        ];

        User::create($data);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $unreadNotifications = Auth()->user()->unreadNotifications;
        foreach($unreadNotifications as $notification){
            if($notification->type == NewRegisteredUser::class && $notification->data['id'] == $user->id){
                $notification->markAsRead();
            }
        }
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        $image = null;
        if($request->has('image')){
            $image = $this->uploadImage($request->image, User::class);
            if($user->image){
                $imagePath = public_path($user->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        $data = $request->all();
        $data['image'] = $image;

        $user->update($data);
        return redirect()->back()->with(['success' => "Your profile has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->image){
            $imagePath = public_path($user->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $user->delete();
        return redirect()->route('users.index');
    }

    public function profile(User $user)
    {
        return view('admin.users.profile', compact('user'));
    }
}
