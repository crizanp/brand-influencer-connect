<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Influencer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

        // Generate verification code
        $verificationCode = sprintf('%06d', mt_rand(0, 999999));

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
            'verification_code' => $verificationCode,
            'verification_code_expires_at' => now()->addMinutes(30),
        ]);

        // Send verification code email
        $this->sendVerificationCode($influencer, $verificationCode);

        Auth::guard('influencer')->login($influencer);

        return redirect()->route('influencer.verification.notice')->with('status', 'verification-code-sent');
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
     * Verify email address with code.
     */
    public function verifyEmail(Request $request)
    {
        $request->validate([
            'verification_code' => ['required', 'string', 'size:6'],
        ]);

        $influencer = Auth::guard('influencer')->user();
        
        if (!$influencer) {
            return redirect()->route('influencer.login')->with('error', 'Please login first.');
        }

        if ($influencer->hasVerifiedEmail()) {
            return redirect()->route('influencer.dashboard')->with('success', 'Email already verified!');
        }

        if ($influencer->verification_code !== $request->verification_code) {
            return back()->withErrors(['verification_code' => 'Invalid verification code.']);
        }

        if ($influencer->verification_code_expires_at < now()) {
            return back()->withErrors(['verification_code' => 'Verification code has expired. Please request a new one.']);
        }

        $influencer->markEmailAsVerified();
        $influencer->update([
            'verification_code' => null,
            'verification_code_expires_at' => null,
        ]);
        
        return redirect()->route('influencer.dashboard')->with('success', 'Email verified successfully!');
    }

    /**
     * Resend verification code.
     */
    public function resendVerificationEmail(Request $request)
    {
        $influencer = Auth::guard('influencer')->user();
        
        if (!$influencer) {
            return redirect()->route('influencer.login')->with('error', 'Please login first.');
        }
        
        if ($influencer->hasVerifiedEmail()) {
            return redirect()->route('influencer.dashboard');
        }
        
        // Generate new verification code
        $verificationCode = sprintf('%06d', mt_rand(0, 999999));
        
        $influencer->update([
            'verification_code' => $verificationCode,
            'verification_code_expires_at' => now()->addMinutes(30),
        ]);

        // Send verification code email
        $this->sendVerificationCode($influencer, $verificationCode);
        
        return back()->with('status', 'verification-code-sent');
    }

    /**
     * Send verification code email.
     */
    private function sendVerificationCode($influencer, $verificationCode)
    {
        $data = [
            'verification_code' => $verificationCode,
            'full_name' => $influencer->first_name . ' ' . $influencer->last_name,
            'expires_at' => $influencer->verification_code_expires_at->format('H:i'),
        ];

        Mail::send('emails.influencer-verification-code', $data, function($message) use ($influencer) {
            $message->to($influencer->email, $influencer->first_name . ' ' . $influencer->last_name)
                    ->subject('Verify Your Influencer Account - Verification Code');
        });
    }
}
