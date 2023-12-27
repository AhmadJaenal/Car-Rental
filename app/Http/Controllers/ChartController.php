<?php

namespace App\Http\Controllers;

class ChartController extends Controller
{
    public function chart()
    {
        return view('layouts.dashboard.charts.chartjs');
    }
}
