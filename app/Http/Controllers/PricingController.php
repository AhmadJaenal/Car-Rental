<?php

namespace App\Http\Controllers;

use App\Models\Mobil;

class PricingController extends Controller
{

    public function pricing()
    {
        $carsData = Mobil::where('status','Tersedia')->get();
        return view('layouts.landingpage.pricing.pricing', ['cars' => $carsData]);
    }
}
