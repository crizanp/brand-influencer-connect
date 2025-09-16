<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfluencerDashboardController extends Controller
{
    /**
     * Show the influencer dashboard.
     */
    public function index()
    {
        $influencer = Auth::guard('influencer')->user();
        
        return view('influencer.dashboard', compact('influencer'));
    }
}
