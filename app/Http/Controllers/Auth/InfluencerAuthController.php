<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Influencer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

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

    /**
     * Redirect to Google OAuth.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google OAuth callback for influencers.
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Check if influencer already exists
            $influencer = Influencer::where('email', $googleUser->getEmail())->first();
            
            if ($influencer) {
                // Mark email as verified since it's from Google
                if (!$influencer->hasVerifiedEmail()) {
                    $influencer->markEmailAsVerified();
                }
                Auth::guard('influencer')->login($influencer);
                return redirect()->route('influencer.dashboard');
            } else {
                // Store Google user data in session for completion
                session([
                    'google_user' => [
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'avatar' => $googleUser->getAvatar(),
                    ]
                ]);
                
                return redirect()->route('influencer.complete.profile');
            }
            
        } catch (\Exception $e) {
            return redirect()->route('influencer.login')->with('error', 'Google authentication failed.');
        }
    }

    /**
     * Show profile completion form for Google users.
     */
    public function showCompleteProfileForm()
    {
        if (!session('google_user')) {
            return redirect()->route('influencer.register');
        }
        
        return view('auth.influencer.complete-profile', [
            'googleUser' => session('google_user')
        ]);
    }

    /**
     * Complete profile for Google users.
     */
    public function completeProfile(Request $request)
    {
        if (!session('google_user')) {
            return redirect()->route('influencer.register');
        }

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'niche' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:1000'],
        ]);

        $googleUser = session('google_user');
        
        // Create influencer account with Google data
        $influencer = Influencer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $googleUser['email'],
            'niche' => $request->niche,
            'bio' => $request->bio,
            'password' => Hash::make(str()->random(16)), // Random password
            'email_verified_at' => now(), // Auto-verify Google accounts
            'status' => 'active'
        ]);
        
        // Clear Google user data from session
        session()->forget('google_user');
        
        Auth::guard('influencer')->login($influencer);
        
        return redirect()->route('influencer.dashboard');
    }
}
