<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function login()
    {
        return  view('layouts.dashboard.samples.login');
    }

    public function register()
    {
        return view('layouts.dashboard.samples.register');
    }
}
