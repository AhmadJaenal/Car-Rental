<?php

namespace App\Http\Controllers;

use App\Models\Mobil;

class HomeController extends Controller
{

    public function index()
    {
        $cars = Mobil::all();
        return view('layouts.landingpage.homepage.index', compact('cars'));
    }
}
