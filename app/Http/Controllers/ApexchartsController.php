<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\MonthlyUsersChart;

class ApexchartsController extends Controller
{
    public function index(MonthlyUsersChart $chart)
    {
        return view('apexcharts', ['chart' => $chart->build()]);
    }
}
