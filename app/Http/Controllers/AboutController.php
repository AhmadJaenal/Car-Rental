<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{

    public function about()
    {
        return view('layouts.landingpage.about.about');
    }
}
