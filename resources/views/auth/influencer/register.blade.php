@extends('layouts.auth')

@section('title', 'Influencer Registration')

@section('content')
<div class="auth-header">
    <h2>Influencer Registration</h2>
    <p>Create your influencer account</p>
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