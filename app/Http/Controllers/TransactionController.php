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

    public function transaction(Request $request, $id_mobil, $jenis_sewa)
    {
        $id_user = Auth()->user()->id_peminjam;
        try {

            $transactionData = $request->validate([
                'tgl_rental' => 'required',
                'biaya_sewa' => 'required',
                'total' => 'required',
                'denda' => 'nullable',
                'jam_mulai' => 'required',
                'status_sewa' => 'nullable',
                'status_pengembalian' => 'nullable',
                'id_admin' => 'nullable'
            ]);
            if ($jenis_sewa == 'day') {
                $transactionData['jam_selesai'] = $request->jam_mulai;
                $transactionData['tgl_kembali'] = $request->tgl_kembali;
            } else {
                $transactionData['jam_selesai'] = $request->jam_selesai;
                $transactionData['tgl_kembali'] = $request->tgl_rental;
            }

            $transactionData['id_mobil'] = $id_mobil;
            $transactionData['id_user'] = $id_user;
            $transactionData['status_pembayaran'] = 'Diproses';

            // penting
            $data = Mobil::where('id_mobil', $id_mobil)->update([
                'status' => 'rental',
            ]);

            Transaction::create($transactionData);
            Session::flash('success', 'Transaksi berhasil');
            return back();
        } catch (QueryException $e) {
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

    public function formTransactionHour(Request $request)
    {
        $car = Mobil::where('id_mobil', $request->input('id_mobil'))->first();
        return view('layouts.landingpage.pricing.formTransactionHour', compact('car'));
    }

    public function formTransactionDay(Request $request)
    {
        $car = Mobil::where('id_mobil', $request->input('id_mobil'))->first();
        return view('layouts.landingpage.pricing.formTransactionDay', compact('car'));
    }


    public function acceptPayment($id)
    {
        $transactionData = Transaction::find($id);
        $transactionData->update([
            'status_pembayaran' => 'Lunas',
        ]);
        return back();
    }

    public function rejectPayment($id)
    {
        $transactionData = Transaction::find($id);
        $transactionData->update([
            'verifikasi' => 'Belum Lunas',
        ]);
        return back();
    }
}
