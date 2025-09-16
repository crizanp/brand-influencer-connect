<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandDashboardController extends Controller
{
    /**
     * Show the brand dashboard.
     */
    public function index()
    {
        $brand = Auth::guard('brand')->user();
        
        return view('brand.dashboard', compact('brand'));
    }
}
