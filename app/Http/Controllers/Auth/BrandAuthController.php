<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        $brand = \App\Models\Brand::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'contact_person' => $request->contact_person,
            'phone' => $request->phone,
            'industry' => $request->industry,
            'status' => 'pending',
        ]);

        Auth::guard('brand')->login($brand);

        // Send email verification if not verified
        if (!$brand->hasVerifiedEmail()) {
            event(new Registered($brand));
            return redirect()->route('brand.verification.notice');
        }

        return redirect()->route('brand.dashboard');
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
     * Verify email address.
     */
    public function verifyEmail(Request $request)
    {
        $brand = Brand::findOrFail($request->route('id'));
        
        if (!hash_equals((string) $request->route('hash'), sha1($brand->getEmailForVerification()))) {
            abort(403);
        }
        
        $brand->markEmailAsVerified();
        
        return redirect()->route('brand.dashboard')->with('success', 'Email verified successfully!');
    }

    /**
     * Resend verification email.
     */
    public function resendVerificationEmail(Request $request)
    {
        $brand = Auth::guard('brand')->user();
        
        if ($brand->hasVerifiedEmail()) {
            return redirect()->route('brand.dashboard');
        }
        
        $brand->sendEmailVerificationNotification();
        
        return back()->with('status', 'verification-link-sent');
    }
}
