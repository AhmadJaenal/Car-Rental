<?php

namespace App\Http\Controllers;

use App\Models\Mobil;

class PricingController extends Controller
{

    public function pricing()
    {
        $carsData = Mobil::all()->where('status', 'Tersedia');
        return view('layouts.landingpage.pricing.pricing', ['cars' => $carsData]);
    }
}
