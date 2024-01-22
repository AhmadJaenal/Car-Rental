<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;


use App\Models\Transaction;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $now = Carbon::now();

        // $monthNumber = $now->month;

        $transaction_day = Transaction::whereDate('created_at', Carbon::today())->count();
        $transaction_month = Transaction::whereMonth('created_at', Carbon::now()->month)->count();

        return view('layouts.dashboard.main.index', compact('transaction_day', 'transaction_month'));
    }
}
