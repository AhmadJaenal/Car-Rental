<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{

    public function contact()
    {
        return view('layouts.landingpage.contact.contact');
    }
}
