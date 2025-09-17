@extends('layouts.auth')

@section('title', 'Email Verification')

@section('content')
<div class="auth-header">
    <h2>Verify Your Email</h2>
    <p>We've sent a verification link to your email address</p>
</div>

<div style="margin-bottom: 25px;">
    <div style="background: #f0f9ff; border: 1px solid #0ea5e9; border-radius: 8px; padding: 20px; margin-bottom: 20px;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <div style="background: #0ea5e9; color: white; width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 10px; font-size: 14px;">ℹ</div>
            <h3 style="color: #0c4a6e; margin: 0; font-size: 16px;">Email Verification Required</h3>
        </div>
        <p style="color: #0c4a6e; margin: 0; font-size: 14px; line-height: 1.5;">
            Before getting started, please verify your email address by clicking on the link we just emailed to you. 
            If you didn't receive the email, we will gladly send you another.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div style="background: #f0fdf4; border: 1px solid #22c55e; border-radius: 8px; padding: 15px; margin-bottom: 20px;">
            <div style="display: flex; align-items: center;">
                <div style="background: #22c55e; color: white; width: 20px; height: 20px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 10px; font-size: 12px;">✓</div>
                <p style="color: #15803d; margin: 0; font-size: 14px;">
                    A new verification link has been sent to your email address.
                </p>
            </div>
        </div>
    @endif
</div>

<div style="display: flex; gap: 10px; margin-bottom: 20px;">
    <form method="POST" action="{{ route('brand.verification.send') }}" style="flex: 1;">
        @csrf
        <button type="submit" class="btn-primary" style="width: 100%;">
            Resend Verification Email
        </button>
    </form>
</div>

<div class="auth-footer" style="border-top: none; padding-top: 0;">
    <p>Already verified? <a href="{{ route('brand.dashboard') }}">Go to Dashboard</a></p>
    
    <form method="POST" action="{{ route('brand.logout') }}" style="margin-top: 15px;">
        @csrf
        <button type="submit" style="background: none; border: none; color: #667eea; text-decoration: underline; cursor: pointer; font-size: 14px;">
            Log Out
        </button>
    </form>
</div>
@endsection