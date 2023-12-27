<?php

namespace App\Http\Controllers;

class TransactionController extends Controller
{
    public function payment()
    {
        return view('layouts.dashboard.transaction.payment');
    }
}
