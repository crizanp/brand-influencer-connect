@extends('layouts.auth')

@section('title', 'Brand Login')

@section('content')
<div class="auth-header">
    <h2>Brand Login</h2>
    <p>Sign in to your brand account</p>
</div>

<form method="POST" action="{{ route('brand.login.submit') }}">
    @csrf

    <!-- Email Address -->
    <div class="form-group">
        <label for="email" class="form-label">Email Address</label>
        <input id="email" 
               type="email" 
               name="email" 
               value="{{ old('email') }}" 
               required 
               autofocus 
               class="form-input @error('email') error @enderror"
               placeholder="Enter your email address">
        @error('email')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <!-- Password -->
    <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <input id="password" 
               type="password" 
               name="password" 
               required 
               class="form-input @error('password') error @enderror"
               placeholder="Enter your password">
        @error('password')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <!-- Remember Me -->
    <div class="checkbox-group">
        <label for="remember" class="checkbox-label">
            <input id="remember" type="checkbox" name="remember">
            Remember me
        </label>
        <a href="{{ route('brand.password.request') }}" class="forgot-link">
            Forgot password?
        </a>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn-primary">
        Sign In
    </button>
</form>

<!-- Footer -->
<div class="auth-footer">
    <p>
        Don't have an account? 
        <a href="{{ route('brand.register') }}">
            Register as Brand
        </a>
    </p>
    
    <div class="auth-links">
        <a href="{{ route('influencer.login') }}">Login as Influencer</a>
        <a href="{{ route('admin.login') }}">Login as Admin</a>
    </div>
</div>
@endsection