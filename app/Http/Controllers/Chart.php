<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Chart extends Controller
{
    public function index()
    {
        $pdf = \PDF::loadView('chartjs');
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        return $pdf->download('chart.pdf');
    }
}
