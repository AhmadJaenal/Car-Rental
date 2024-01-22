<?php

namespace App\Http\Controllers;

use App\Models\Mobil;

class CarController extends Controller
{

    public function car()
    {
        $cars = Mobil::all()->where('status', 'Tersedia');
        return view('layouts.landingpage.car.car', compact('cars'));
    }
}
