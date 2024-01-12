<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function payment()
    {
        return view('layouts.dashboard.transaction.payment');
    }

    public function transaction(Request $request)
    {
        $transactionData = $request->validate([
            'tgl_rental' => 'required',
            'tgl_kembali' => 'required',
            'biaya_sewa' => 'required',
            'total' => 'required',
            'denda' => 'nullable',
            'status_sewa' => 'nullable',
            'tgl_pengembalian' => 'nullable',
            'status_pengembalian' => 'nullable',
            'id_mobil' => 'required',
            'id_user' => 'required',
            'id_admin' => 'nullable'
        ]);
        Transaction::create($transactionData);
    }

    public function modalPayment(Request $request)
    {
        return view('layouts.landingpage.partials.modalTransaction');
    }

    public function formTransaction(Request $model)
    {
        return view('layouts.landingpage.pricing.formTransaction', ['model' => $model]);
    }
}
