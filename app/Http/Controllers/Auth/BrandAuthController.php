<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class BrandAuthController extends Controller
{
    /**
     * Show the brand login form.
     */
    public function showLoginForm()
    {
        return view('auth.brand.login');
    }

    /**
     * Handle brand login attempt.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('brand')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            return redirect()->intended(route('brand.dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => __('The provided credentials do not match our records.'),
        ]);
    }

    /**
     * Show the brand registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.brand.register');
    }

    /**
     * Handle brand registration.
     */
    public function register(Request $request)
    {
        $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:brands'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contact_person' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'industry' => ['required', 'string', 'max:255'],
        ]);

        // Generate verification code
        $verificationCode = sprintf('%06d', mt_rand(0, 999999));

        $brand = \App\Models\Brand::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'contact_person' => $request->contact_person,
            'phone' => $request->phone,
            'industry' => $request->industry,
            'status' => 'pending',
            'verification_code' => $verificationCode,
            'verification_code_expires_at' => now()->addMinutes(30),
        ]);

        // Send verification code email
        $this->sendVerificationCode($brand, $verificationCode);

        Auth::guard('brand')->login($brand);

        return redirect()->route('brand.verification.notice')->with('status', 'verification-code-sent');
    }

    /**
     * Handle brand logout.
     */
    public function logout(Request $request)
    {
        Auth::guard('brand')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('brand.login');
    }

    /**
     * Verify email address with code.
     */
    public function verifyEmail(Request $request)
    {
        $request->validate([
            'verification_code' => ['required', 'string', 'size:6'],
        ]);

        $brand = Auth::guard('brand')->user();
        
        if (!$brand) {
            return redirect()->route('brand.login')->with('error', 'Please login first.');
        }

        if ($brand->hasVerifiedEmail()) {
            return redirect()->route('brand.dashboard')->with('success', 'Email already verified!');
        }

        if ($brand->verification_code !== $request->verification_code) {
            return back()->withErrors(['verification_code' => 'Invalid verification code.']);
        }

        if ($brand->verification_code_expires_at < now()) {
            return back()->withErrors(['verification_code' => 'Verification code has expired. Please request a new one.']);
        }

        $brand->markEmailAsVerified();
        $brand->update([
            'verification_code' => null,
            'verification_code_expires_at' => null,
        ]);
        
        return redirect()->route('brand.dashboard')->with('success', 'Email verified successfully!');
    }

    /**
     * Resend verification code.
     */
    public function resendVerificationEmail(Request $request)
    {
        $brand = Auth::guard('brand')->user();
        
        if (!$brand) {
            return redirect()->route('brand.login')->with('error', 'Please login first.');
        }
        
        if ($brand->hasVerifiedEmail()) {
            return redirect()->route('brand.dashboard');
        }
        
        // Generate new verification code
        $verificationCode = sprintf('%06d', mt_rand(0, 999999));
        
        $brand->update([
            'verification_code' => $verificationCode,
            'verification_code_expires_at' => now()->addMinutes(30),
        ]);

        // Send verification code email
        $this->sendVerificationCode($brand, $verificationCode);
        
        return back()->with('status', 'verification-code-sent');
    }

    /**
     * Send verification code email.
     */
    private function sendVerificationCode($brand, $verificationCode)
    {
        $data = [
            'verification_code' => $verificationCode,
            'company_name' => $brand->company_name,
            'expires_at' => $brand->verification_code_expires_at->format('H:i'),
        ];

        \Mail::send('emails.brand-verification-code', $data, function($message) use ($brand) {
            $message->to($brand->email, $brand->company_name)
                    ->subject('Verify Your Brand Account - Verification Code');
        });
    }
}
