@extends('layouts.auth')

@section('title', 'Influencer Registration')

@section('content')
<div class="auth-header">
    <h2>Influencer Registration</h2>
    <p>Create your influencer account</p>
</div>

<!-- Google OAuth -->
<div style="margin-bottom: 25px;">
    <a href="{{ route('influencer.google.redirect') }}" class="btn-primary" style="background: #ec4899; display: flex; align-items: center; justify-content: center; gap: 10px; text-decoration: none;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
        </svg>
        Continue with Google
    </a>
</div>

<div style="text-align: center; margin-bottom: 25px; color: #64748b; position: relative;">
    <span style="background: white; padding: 0 15px;">or register with email</span>
    <div style="position: absolute; top: 50%; left: 0; right: 0; height: 1px; background: #e2e8f0; z-index: -1;"></div>
</div>

<form method="POST" action="{{ route('influencer.register.submit') }}">
    @csrf

    <!-- First Name -->
    <div class="form-group">
        <label for="first_name" class="form-label">First Name</label>
        <input id="first_name" 
               type="text" 
               name="first_name" 
               value="{{ old('first_name') }}" 
               required 
               autofocus 
               class="form-input @error('first_name') error @enderror"
               placeholder="Enter your first name">
        @error('first_name')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

        <!-- Last Name -->
        <div class="mb-4">
            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
            <input id="last_name" 
                   type="text" 
                   name="last_name" 
                   value="{{ old('last_name') }}" 
                   required 
                   class="form-input @error('last_name') border-red-500 @enderror"
                   placeholder="Enter your last name">
            @error('last_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Username -->
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
            <input id="username" 
                   type="text" 
                   name="username" 
                   value="{{ old('username') }}" 
                   required 
                   class="form-input @error('username') border-red-500 @enderror"
                   placeholder="Choose a unique username">
            @error('username')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
            <input id="email" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   class="form-input @error('email') border-red-500 @enderror"
                   placeholder="Enter your email address">
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Phone -->
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
            <input id="phone" 
                   type="text" 
                   name="phone" 
                   value="{{ old('phone') }}" 
                   class="form-input @error('phone') border-red-500 @enderror"
                   placeholder="Enter your phone number">
            @error('phone')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Bio -->
        <div class="mb-4">
            <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
            <textarea id="bio" 
                      name="bio" 
                      rows="3" 
                      class="form-input @error('bio') border-red-500 @enderror"
                      placeholder="Tell us about yourself...">{{ old('bio') }}</textarea>
            @error('bio')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <input id="password" 
                   type="password" 
                   name="password" 
                   required 
                   class="form-input @error('password') border-red-500 @enderror"
                   placeholder="Enter your password">
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
            <input id="password_confirmation" 
                   type="password" 
                   name="password_confirmation" 
                   required 
                   class="form-input"
                   placeholder="Confirm your password">
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
            <button type="submit" class="btn-secondary w-full">
                Create Account
            </button>
        </div>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Already have an account? 
                <a href="{{ route('influencer.login') }}" class="text-secondary-600 hover:text-secondary-500 font-medium">
                    Sign In
                </a>
            </p>
        </div>
    </form>
</div>
@endsection