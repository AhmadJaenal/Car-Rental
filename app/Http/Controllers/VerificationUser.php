<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class VerificationUser extends Controller
{
    public function requestVerificationPage()
    {
        return view('layouts.dashboard.verification.request');
    }
}
