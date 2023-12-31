<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Symfony\Component\HttpFoundation\Request;

class MobilController
{
    public function tampilmobil()
    {
        $cars = Mobil::paginate(5);
        return view('layouts.dashboard.mobil.tampil', ['cars' => $cars]);
    }

    public function tampilusermobil()
    {
        $cars = Mobil::paginate(5);
        return view('layouts.dashboard.mobil.tampil_user', ['cars' => $cars]);
    }

    public function tambahmobil()
    {
        return view('layouts.dashboard.mobil.tambah');
    }

    public function updatemobil()
    {
        return view('layouts.dashboard.mobil.update');
    }

    public function tambahdatamobil(Request $request)
    {
        $data = Mobil::create([
            'no_plat' => $request->no_plat,
            'merk' => $request->merk,
            'warna' => $request->warna,
            'tahun' => $request->tahun,
            'harga_sewa' => $request->harga_sewa,
            'status' => $request->status,
            'id_kategori' => $request->id_kategori
        ]);

        if ($request->hasFile('foto_mobil')) {
            $file = $request->file('foto_mobil');
            $file->move('images/mobil/', $file->getClientOriginalName());
            $data->gambar = $file->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('tambahmobil')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function hapusmobil($id_mobil)
    {
        $data = Mobil::where('id', $id_mobil);
        $data->delete();

        return redirect()->route('tampilmobil')->with('successdelete', 'Data Berhasil Di Delete');
    }

    public function editmobil($id_mobil)
    {
        $data = Mobil::where('id', $id_mobil)->first();
        return view('layouts.dashboard.mobil.edit', compact('data'));
    }

    public function editdatamobil(Request $request, $id_mobil)
    {
        $data = Mobil::where('id', $id_mobil)->update([
            'no_plat' => $request->no_plat,
            'merk' => $request->merk,
            'warna' => $request->warna,
            'tahun' => $request->tahun,
            'harga_sewa' => $request->harga_sewa,
            'status' => $request->status,
            'id_kategori' => $request->id_kategori
        ]);

        if ($request->hasFile('foto_mobil')) {
            $file = $request->file('foto_mobil');
            $file->move('images/mobil/', $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();
            $data = Mobil::where('id', $id_mobil)->update(['gambar' => $filename]);
        }

        return redirect()->route('tampilmobil')->with('success', 'Data Berhasil Di Update');
    }
}
