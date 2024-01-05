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

    public function requestVerificationAction(Request $request)
    {
        return $request->file('image')->store('userprofile-images', 'public');
        // $userData = User::find(auth()->user()->id);
        // try {
        //     $userData->update([
        //         'nik' => $request->nik,
        //         'no_hp' => $request->nohp,
        //         'foto_ktp' => $request->fotoktp,
        //         'no_hp' => $request->nohp,
        //         'provinsi' => $request->provinsi,
        //         'kota' => $request->kota,
        //         'jalan' => $request->jalan,

        //     ]);
        //     return redirect()->route('formRequest')->with('success', 'Pengajuan verifikasi data diri berhasil. Harap menunggu 1x24 jam');
        // } catch (QueryException $e) {
        //     return redirect()->route('formRequest')->with('error', $e->getMessage());
        // }
    }
}


// public function updateTransaction(Request $request, $id)
// {
//     $transaction = Transactions::find($id);

//     if (!$transaction) {
//         return redirect()->route('viewThankYouPage')->with('error', 'Transaksi tidak ditemukan.');
//     }

//     $product = Product::find($transaction->id_product);
//     $userData = auth()->user();

//     try {
//         $transaction->update([
//             'fullname' => $request->name,
//             'detail_address' => $request->detail_address,
//             'postal_code' => $request->postal_code,
//             'address' => $request->address,
//             'state' => $request->state,
//             'phone' => $request->phone,
//             'notes' => $request->notes,
//         ]);

//         return redirect()->route('viewThankYouPage')->with('success', 'Transaksi berhasil diperbarui.');
//     } catch (QueryException $e) {
//         return redirect()->route('viewThankYouPage')->with('error', $e->getMessage());
//     }
// }