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
    Route::middleware(['auth:brand', 'brand.verified'])->group(function () {
        Route::get('/dashboard', [BrandDashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [BrandAuthController::class, 'logout'])->name('logout');
    });
    
    // Google OAuth routes
    Route::get('/google/redirect', [BrandAuthController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/google/callback', [BrandAuthController::class, 'handleGoogleCallback'])->name('google.callback');
    
    // Email verification routes
    Route::get('/email/verify', function () {
        return view('auth.brand.verify-email');
    })->middleware('auth:brand')->name('verification.notice');
    
    Route::get('/email/verify/{id}/{hash}', [BrandAuthController::class, 'verifyEmail'])
        ->middleware(['auth:brand', 'signed'])->name('verification.verify');
    
    Route::post('/email/verification-notification', [BrandAuthController::class, 'resendVerificationEmail'])
        ->middleware(['auth:brand', 'throttle:6,1'])->name('verification.send');
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
    
    // Google OAuth routes
    Route::get('/google/redirect', [InfluencerAuthController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/google/callback', [InfluencerAuthController::class, 'handleGoogleCallback'])->name('google.callback');
    Route::get('/complete-profile', [InfluencerAuthController::class, 'showCompleteProfileForm'])->name('complete.profile');
    Route::post('/complete-profile', [InfluencerAuthController::class, 'completeProfile'])->name('complete.profile.submit');
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
    
    // Google OAuth routes
    Route::get('/google/redirect', [AdminAuthController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/google/callback', [AdminAuthController::class, 'handleGoogleCallback'])->name('google.callback');
});
