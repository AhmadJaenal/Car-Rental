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
            if ($request->hasFile('selfFoto')) {
                $selfFoto = $request->file('selfFoto');
                $selfFoto->move('images/foto_diri/', $selfFoto->getClientOriginalName());
                $userData->selfFoto = $selfFoto->getClientOriginalName();
            }

            if ($request->hasFile('ktpImage')) {
                $ktpImage = $request->file('ktpImage');
                $ktpImage->move('images/foto_ktp/', $ktpImage->getClientOriginalName());
                $userData->ktpImage = $ktpImage->getClientOriginalName();
            }

            $userData->update([
                'nik' => $request->nik,
                'no_hp' => $request->nohp,
                'foto_diri' => $request->file('foto_diri')->getClientOriginalName(),
                'foto_ktp' =>  $request->file('foto_ktp')->getClientOriginalName(),
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'jalan' => $request->jalan,
            ]);

            return redirect()->route('formRequest')->with('success', 'Pengajuan verifikasi data diri berhasil. Harap menunggu 1x24 jam');
        } catch (QueryException $e) {
            return redirect()->route('formRequest')->with('error', $e->getMessage());
        }
    }
}
