<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mobil;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function payment(Request $request)
    {   
        if ($request->has('search')) {
            $id_user = User::where('username', 'LIKE', "%$request->search%")->value('id_peminjam');
            $id_mobil = Mobil::where('no_plat', 'LIKE', "%$request->search%")->value('id_mobil');
            if ($id_user === null) {
                $id_user = 'false';
            } 
            if ($id_mobil === null) {
                $id_mobil = 'false';
            } 
            $transactions = Transaction::query()
                            ->where('id_mobil', 'LIKE', "%$id_mobil%")
                            ->orWhere('id_user', 'LIKE', "%$id_user%")
                            ->orWhere('tgl_rental', 'LIKE', "%$request->search%")
                            ->orWhere('tgl_kembali', 'LIKE', "%$request->search%")
                            ->orWhere('status_pembayaran', 'LIKE', "%$request->search%")
                            ->orWhere('status_sewa', 'LIKE', "%$request->search%")
                            ->orWhere('status_pengembalian', 'LIKE', "%$request->search%")
                            ->get();
        } else {
            $transactions = Transaction::all();
        }
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
            $transactionData['status_pembayaran'] = 'Tidak';
            $transactionData['status_sewa'] = 'Diproses';
            $transactionData['status_pengembalian'] = 'Belum diambil';


            $data = Mobil::where('id_mobil', $id_mobil)->update([
                'status' => 'Dipesan',
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
            'status_pembayaran' => 'Belum Lunas',
        ]);
        return back();
    }

    public function acceptSewa($id)
    {
        $transactionData = Transaction::find($id);
        $transactionData->update([
            'status_sewa' => 'Diterima',
        ]);
        $id_mobil = $transactionData->id_mobil;
        $data = Mobil::where('id_mobil', $id_mobil)->update([
            'status' => 'Disewa',
        ]);
        return back();
    }

    public function rejectSewa($id)
    {
        $transactionData = Transaction::find($id);
        $transactionData->update([
            'status_sewa' => 'Ditolak',
        ]);
        $id_mobil = $transactionData->id_mobil;
        $data = Mobil::where('id_mobil', $id_mobil)->update([
            'status' => 'Tersedia',
        ]);
        return back();
    }

    public function acceptPengembalian($id)
    {
        $transactionData = Transaction::find($id);
        $transactionData->update([
            'status_pengembalian' => 'Sudah',
        ]);
        $id_mobil = $transactionData->id_mobil;
        $data = Mobil::where('id_mobil', $id_mobil)->update([
            'status' => 'Tersedia',
        ]);
        return back();
    }

    public function rejectPengembalian($id)
    {
        $transactionData = Transaction::find($id);
        $transactionData->update([
            'status_pengembalian' => 'Belum',
        ]);
        $id_mobil = $transactionData->id_mobil;
        $data = Mobil::where('id_mobil', $id_mobil)->update([
            'status' => 'Disewa',
        ]);
        return back();
    }

    public function historyTransactions()
    {
        $id_user = Auth::user()->id_peminjam;
        $transactions = Transaction::where('id_user', $id_user)->get();
        return view('layouts.landingpage.history-transaction.history', compact('transactions'));
    }
}
