<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        
        return view('admin.dashboard', compact('admin'));
    }
}
