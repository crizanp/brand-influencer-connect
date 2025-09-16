<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

        $credentials = $request->only('email', 'password');

        if (Auth::guard('influencer')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            return redirect()->intended(route('influencer.dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => __('The provided credentials do not match our records.'),
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
            'username' => ['required', 'string', 'max:255', 'unique:influencers'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:influencers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['nullable', 'string', 'max:20'],
            'bio' => ['nullable', 'string'],
        ]);

        $influencer = \App\Models\Influencer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'bio' => $request->bio,
            'status' => 'pending',
        ]);

        Auth::guard('influencer')->login($influencer);

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
