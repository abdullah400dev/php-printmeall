<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Events\UserLogInEvent;
use Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //event(new UserLogInEvent('Hi'));
    }
    
     public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }
    
    
    public function handleGoogleCallback()
    {
        $users = Socialite::driver('google')->stateless()->user();
        // $user->token;
        // $this->login($user);
           $user = User::where('email', $users->email)->first();
       if($user){
           Auth::login($user);
            return redirect('/');
       }else{
             return redirect('/login')->with('error', 'User Not Found');
           
       }
         return redirect('/');
    }
    
    
    
    
     public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    public function handleFacebookCallback()
    {
        $users = Socialite::driver('facebook')->user();
 
           $user = User::where('email', $users->email)->first();
       if($user){
           Auth::login($user);
            return redirect('/');
       }else{
             return redirect('/login')->with('error', 'User Not Found');
           
       }
         return redirect('/');
         
        // $user->token;
    }
    
    
    
     public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }
    
    public function handleGithubCallback()
    {
        $users = Socialite::driver('github')->user();
        
          $user = User::where('email', $users->email)->first();
       if($user){
           Auth::login($user);
            return redirect('/');
       }else{
             return redirect('/login')->with('error', 'User Not Found');
           
       }
         return redirect('/');
 
        // $user->token;
    }
    
    public function loginWithFunctions($users){
        
    }
    
    
}
