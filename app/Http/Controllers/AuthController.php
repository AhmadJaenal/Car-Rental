<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // START Code Login 
    public function login()
    {
        return view('layouts.dashboard.samples.login');
    }

    public function actionLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Login Failed!');
        }
    }
    // START Code Login 

    // START Code Logout 
    public function actionLogout()
    {
        Auth::logout();
        request()->session()->invalidate();
        return redirect('login');
    }
    // END Code Logout 

    // START Code Register 
    public function register()
    {
        return view('layouts.dashboard.samples.register');
    }

    public function actionRegister(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'username' => 'required|min:5|max:255',
                'nik' => 'nullable',
                'no_hp' => 'nullable',
                'jalan' => 'nullable',
                'provinsi' => 'nullable',
                'kota' => 'nullable',
                'foto_diri' => 'nullable',
                'foto_ktp' => 'nullable',
                'email' => 'required|email:dns|unique:users',
                'password' => 'required|min:5|max:255',
                'verifikasi' => 'false'
            ]);

            $validatedData['password'] = Hash::make($validatedData['password']);

            User::create($validatedData);

            Session::flash('success', 'Register Berhasil');
            return redirect('register');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1062) {
                Session::flash('error', 'Gagal melakukan register. Email sudah terdaftar.');
            } else {
                Session::flash('error', 'Gagal melakukan register. Terjadi kesalahan.');
            }

            Session::flash('error', 'Register Gagal');
        }
    }
    // END Code Register 
}
