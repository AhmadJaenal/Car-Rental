<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Transaction;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function payment()
    {
        $transactions = Transaction::all();
        return view('layouts.dashboard.transaction.payment', compact('transactions'));
    }

    public function transaction(Request $request, $id_mobil)
    {
        $id_user = Auth()->user()->id_peminjam;
        try {
            $transactionData = $request->validate([
                'tgl_rental' => 'required',
                'tgl_kembali' => 'nullable',
                'biaya_sewa' => 'required',
                'total' => 'required',
                'denda' => 'nullable',
                'jam_mulai' => 'required',
                'status_sewa' => 'nullable',
                'tgl_pengembalian' => 'nullable',
                'status_pengembalian' => 'nullable',
                'id_admin' => 'nullable'
            ]);
            $transactionData['id_mobil'] = $id_mobil;
            $transactionData['id_user'] = $id_user;

            Transaction::create($transactionData);
            Session::flash('success', 'Transaksi berhasil');
            return back();
        } catch (QueryException $e) {
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

    public function formTransaction(Request $request)
    {
        $car = Mobil::where('id_mobil', $request->input('id_mobil'))->first();
        return view('layouts.landingpage.pricing.formTransaction', compact('car'));
    }
}
