<?php

namespace App\Http\Controllers;

class VerificationUser extends Controller
{
    public function requestVerification()
    {
        return view('layouts.dashboard.verification.request');
    }
}
