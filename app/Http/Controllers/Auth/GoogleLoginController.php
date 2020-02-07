<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Notifications\NewRegisteredUser;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

class GoogleLoginController extends Controller
{
    protected const ROLE_SUPER_ADMIN = 1;
    protected const ROLE_ADMIN = 2;
    protected const ROLE_AUTHOR = 3;
    protected const ROLE_USER = 4;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->email)->first();

        if($existingUser){
            auth()->login($existingUser, true);
        }else{
            $newUser = User::create([
                'name' => $user->getName(),
                'email' =>  $user->getEmail(),
                'image' => $user->getAvatar(),
                'role_id' => self::ROLE_USER
            ]);
            auth()->login($newUser, true);

            $superadmins = User::where('role_id', 1)->get();
            foreach($superadmins as $admin){
                $admin->notify(new NewRegisteredUser($user));
            }
        }
        return redirect()->route('home');
    }
}
