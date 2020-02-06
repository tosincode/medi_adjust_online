<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use App\Socialmediaprofile;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
     public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
       $userSocial = Socialite::driver('facebook')->user();
          
         $user = User::where('email',$userSocial->user['email'])->first();
        if( $user){
            if(Auth::loginUsingId( $user->id)){
                return redirect()->route('home');
            }
        }
       
       
       
    
      $socialmediaprofile = Socialmediaprofile::create([
             
          'name' => $userSocial->user['name'],
          'email' => $userSocial->user['email']
          
          
          ]);
          
          $fbuser = Socialmediaprofile::where('email',$userSocial->user['email'])->first();
          
          if($fbuser){
               
                return view('completesignup',compact('fbuser'));
            }
       
     // return dd($userSocial);
        
        //return redirect()->route('completesignup');

        // return $userSocial->name;
    }
    
    
     public function googleredirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function googlehandleProviderCallback()
    {
       $userSocial = Socialite::driver('google')->user();
          
     $user = User::where('email',$userSocial->user['email'])->first();
        if( $user){
            if(Auth::loginUsingId( $user->id)){
                return redirect()->route('home');
            }
        }
        
         $socialmediaprofile = Socialmediaprofile::create([
             
          'name' => $userSocial->user['name'],
          'email' => $userSocial->user['email']
          
          
          ]);
        
         $fbuser = Socialmediaprofile::where('email',$userSocial->user['email'])->first();
          
          if($fbuser){
               
                return view('completesignup',compact('fbuser'));
            }
    }
}
