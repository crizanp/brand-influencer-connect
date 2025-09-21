@extends('layouts.auth')

@section('title', 'Email Verification')

@section('content')
<div class="auth-header">
    <h2>Verify Your Email</h2>
    <p>Enter the 6-digit verification code sent to your email</p>
</div>

<div style="margin-bottom: 25px;">
    <div style="background: #fef7f0; border: 1px solid #f97316; border-radius: 8px; padding: 20px; margin-bottom: 20px;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <div style="background: #f97316; color: white; width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 10px; font-size: 14px;">ℹ</div>
            <h3 style="color: #9a3412; margin: 0; font-size: 16px;">Email Verification Required</h3>
        </div>
        <p style="color: #9a3412; margin: 0; font-size: 14px; line-height: 1.5;">
            We've sent a 6-digit verification code to your email address. Please enter the code below to verify your account.
            The code will expire in 30 minutes.
        </p>
    </div>

    @if (session('status') == 'verification-code-sent')
        <div style="background: #f0fdf4; border: 1px solid #22c55e; border-radius: 8px; padding: 15px; margin-bottom: 20px;">
            <div style="display: flex; align-items: center;">
                <div style="background: #22c55e; color: white; width: 20px; height: 20px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 10px; font-size: 12px;">✓</div>
                <p style="color: #15803d; margin: 0; font-size: 14px;">
                    A new verification code has been sent to your email address.
                </p>
            </div>
        </div>
    @endif

    @if ($errors->has('verification_code'))
        <div style="background: #fef2f2; border: 1px solid #ef4444; border-radius: 8px; padding: 15px; margin-bottom: 20px;">
            <div style="display: flex; align-items: center;">
                <div style="background: #ef4444; color: white; width: 20px; height: 20px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 10px; font-size: 12px;">!</div>
                <p style="color: #dc2626; margin: 0; font-size: 14px;">
                    {{ $errors->first('verification_code') }}
                </p>
            </div>
        </div>
    @endif
</div>

<form method="POST" action="{{ route('influencer.verification.verify') }}" style="margin-bottom: 20px;">
    @csrf
    <div class="form-group">
        <label for="verification_code">Verification Code</label>
        <input type="text" 
               id="verification_code" 
               name="verification_code" 
               class="form-control @error('verification_code') is-invalid @enderror" 
               placeholder="Enter 6-digit code"
               maxlength="6"
               pattern="[0-9]{6}"
               required
               style="text-align: center; font-size: 18px; letter-spacing: 2px; font-weight: bold;">
    </div>
    
    <button type="submit" class="btn-primary" style="width: 100%;">
        Verify Email
    </button>
</form>

<div style="display: flex; gap: 10px; margin-bottom: 20px;">
    <form method="POST" action="{{ route('influencer.verification.send') }}" style="flex: 1;">
        @csrf
        <button type="submit" class="btn-secondary" style="width: 100%;">
            Resend Code
        </button>
    </form>
</div>

<div class="auth-footer" style="border-top: none; padding-top: 0;">
    <p>Already verified? <a href="{{ route('influencer.dashboard') }}">Go to Dashboard</a></p>
    
    <form method="POST" action="{{ route('influencer.logout') }}" style="margin-top: 15px;">
        @csrf
        <button type="submit" style="background: none; border: none; color: #667eea; text-decoration: underline; cursor: pointer; font-size: 14px;">
            Log Out
        </button>
    </form>
</div>
@endsection