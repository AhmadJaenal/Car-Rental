<?php

namespace App\Http\Controllers;

class ServicesController extends Controller
{

    public function services()
    {
        return view('layouts.landingpage.services.services');
    }
}
