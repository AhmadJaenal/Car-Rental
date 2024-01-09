<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FormRequestController
{
    public function formRequest()
    {
        return view('layouts.dashboard.verification.formrequest');
    }

    public function requestVerificationAction(Request $request)
    {
        $userData = User::find(auth()->user()->id);
        try {
            $selfFoto = '';
            $ktpImage = '';
            if ($request->hasFile('foto_diri')) {
                $selfFoto = $request->file('foto_diri');
                $selfFoto->move('images/foto_diri/', $selfFoto->getClientOriginalName());
            }

            if ($request->hasFile('foto_ktp')) {
                $ktpImage = $request->file('foto_ktp');
                $ktpImage->move('images/foto_ktp/', $ktpImage->getClientOriginalName());
            }

            if ($selfFoto != '' && $ktpImage != '') {
                $userData->update([
                    'nik' => $request->nik,
                    'no_hp' => $request->nohp,
                    'foto_diri' => $selfFoto->getClientOriginalName(),
                    'foto_ktp' => $ktpImage->getClientOriginalName(),
                    'verifikasi' => false,
                    'provinsi' => $request->provinsi,
                    'kota' => $request->kota,
                    'jalan' => $request->jalan,
                ]);
                return redirect()->route('formRequest')->with('success', 'Pengajuan verifikasi data diri berhasil. Harap menunggu 1x24 jam');
            }
        } catch (QueryException $e) {
            return redirect()->route('formRequest')->with('error', $e->getMessage());
        }
    }
}
