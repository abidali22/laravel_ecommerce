<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo ='/';
    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 5; // Default is 1

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /** 
    * @author       Abid 
    * date          20-10-2021
    * Detail        Delete the session
    * BladeFile     account/sub_account/index
    * @param        Request
    * @return       Login Page
    */
    public function logout(Request $request) {
      Auth::logout();
      return redirect('home');
    }

    // public function showLoginForm() {
    //   return view('auth.login');
    // }

    // public function login() {
    //   // return redirect('/login');
    //   return view('auth.login');
    // }

}