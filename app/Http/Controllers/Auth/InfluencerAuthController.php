<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Influencer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class InfluencerAuthController extends Controller
{
    /**
     * Show the influencer login form.
     */
    public function showLoginForm()
    {
        return view('auth.influencer.login');
    }

    /**
     * Handle influencer login attempt.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('influencer')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('influencer.dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    /**
     * Show the influencer registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.influencer.register');
    }

    /**
     * Handle influencer registration.
     */
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:influencers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'niche' => ['required', 'string', 'in:fashion,beauty,fitness,technology,travel,food,lifestyle,gaming,music,other'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'instagram_handle' => ['nullable', 'string', 'max:255'],
            'youtube_channel' => ['nullable', 'string', 'max:255'],
            'tiktok_handle' => ['nullable', 'string', 'max:255'],
            'twitter_handle' => ['nullable', 'string', 'max:255'],
            'followers_count' => ['nullable', 'integer', 'min:0'],
        ]);

        $influencer = Influencer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'niche' => $request->niche,
            'bio' => $request->bio,
            'instagram_handle' => $request->instagram_handle,
            'youtube_channel' => $request->youtube_channel,
            'tiktok_handle' => $request->tiktok_handle,
            'twitter_handle' => $request->twitter_handle,
            'followers_count' => $request->followers_count,
            'status' => 'pending',
        ]);

        Auth::guard('influencer')->login($influencer);

        // Send email verification if not verified
        if (!$influencer->hasVerifiedEmail()) {
            event(new Registered($influencer));
            return redirect()->route('influencer.verification.notice');
        }

        return redirect()->route('influencer.dashboard');
    }

    /**
     * Handle influencer logout.
     */
    public function logout(Request $request)
    {
        Auth::guard('influencer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('influencer.login');
    }
}
