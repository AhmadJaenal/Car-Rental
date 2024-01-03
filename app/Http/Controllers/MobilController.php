<?php

namespace App\Http\Controllers;

class MobilController
{
    public function tampilmobil()
    {
        return view('layouts.dashboard.mobil.tampil');
    }

    public function tambahmobil()
    {
        return view('layouts.dashboard.mobil.tambah');
    }

    public function updatemobil()
    {
        return view('layouts.dashboard.mobil.update');
    }
}
