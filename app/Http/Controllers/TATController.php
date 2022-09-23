<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TATController extends Controller
{

    public function index()
    {

        return view('front_end.home.home');
    }
    public function userRegister()
    {
        return view('front_end.register.register');
    }

    public function userLogin()
    {
        return view('front_end.login.login');
    }
}