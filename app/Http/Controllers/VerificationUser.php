<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class VerificationUser extends Controller
{
    public function requestVerificationPage()
    {
        $userRequest = User::all();
        return view('layouts.dashboard.verification.request', ['usersRequest' => $userRequest]);
    }
}
