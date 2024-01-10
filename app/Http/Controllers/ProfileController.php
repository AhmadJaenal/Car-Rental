<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){
        return view('layouts.dashboard.profile.profile');
    }
    public function editprofileuser(Request $request,$id_peminjam){
        $data = User::where('id_peminjam',$id_peminjam)->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return redirect()->route('profile')->with('success','Data Berhasil Di Update');
    }
    public function editprofileadmin(Request $request,$id_admin){
        $data = Admin::where('id_admin',$id_admin)->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return redirect()->route('profile')->with('success','Data Berhasil Di Update');
    }
}
