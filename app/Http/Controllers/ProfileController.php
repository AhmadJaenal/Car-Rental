<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){
        return view('layouts.dashboard.profile.profile');
    }
    public function editprofile(Request $request,$id_user){
        $data = User::where('id',$id_user)->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return redirect()->route('profile')->with('success','Data Berhasil Di Update');
    }
}
