<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
public function username()
{
    return 'username';
}
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //if(auth()->user()->level=='admin-ti'){
        $this->redirectTo = route('home');
        // }
        // elseif(auth()->user()->level=='admin-si'){
        // $this->redirectTo = route('home.si');
        // }
        // elseif(auth()->user()->level=='admin-tk'){
        // $this->redirectTo = route('home.tk');
        // }
        // elseif(auth()->user()->level=='admin-mi'){
        // $this->redirectTo = route('home.mi');
        // }
        // elseif(auth()->user()->level=='admin-ka'){
        // $this->redirectTo = route('home.ka');
        // }
        toast('Signed in successfully','success')->timerProgressBar();
        $this->middleware('guest')->except('logout');
        
    }
}