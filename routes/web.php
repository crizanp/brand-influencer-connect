<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\BrandAuthController;
use App\Http\Controllers\Auth\InfluencerAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\BrandDashboardController;
use App\Http\Controllers\InfluencerDashboardController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Brand Authentication Routes
Route::prefix('brand')->name('brand.')->group(function () {
    // Guest routes (not authenticated)
    Route::middleware('guest:brand')->group(function () {
        Route::get('/login', [BrandAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [BrandAuthController::class, 'login'])->name('login.submit');
        Route::get('/register', [BrandAuthController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [BrandAuthController::class, 'register'])->name('register.submit');
    });
    
    // Authenticated routes
    Route::middleware('auth:brand')->group(function () {
        Route::get('/dashboard', [BrandDashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [BrandAuthController::class, 'logout'])->name('logout');
    });
});

// Influencer Authentication Routes
Route::prefix('influencer')->name('influencer.')->group(function () {
    // Guest routes (not authenticated)
    Route::middleware('guest:influencer')->group(function () {
        Route::get('/login', [InfluencerAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [InfluencerAuthController::class, 'login'])->name('login.submit');
        Route::get('/register', [InfluencerAuthController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [InfluencerAuthController::class, 'register'])->name('register.submit');
    });
    
    // Authenticated routes
    Route::middleware('auth:influencer')->group(function () {
        Route::get('/dashboard', [InfluencerDashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [InfluencerAuthController::class, 'logout'])->name('logout');
    });
});

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes (not authenticated)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });
    
    // Authenticated routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});
