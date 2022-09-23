<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //protected $redirectTo;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
        // $role = auth()->user()->role;

        // if ($role == '1') {
        //     $this->redirectTo = route('manager_dashboard');
        //     return   $this->redirectTo;
        // } else if ($role == '2') {

        //     $this->redirectTo = route('developer_dashboard');
        //     return   $this->redirectTo;
        // } else if ($role == '3') {

        //     $this->redirectTo = route('tester_dashboard');
        //     return   $this->redirectTo;
        // }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}