@extends('layouts.auth')

@section('title', 'Brand Registration')

@section('content')
<div class="auth-header">
    <h2>Brand Registration</h2>
    <p>Create your brand account</p>
</div>

<!-- Google OAuth -->
<div style="margin-bottom: 25px;">
    <a href="{{ route('brand.google.redirect') }}" class="btn-primary" style="background: #4285f4; display: flex; align-items: center; justify-content: center; gap: 10px; text-decoration: none;">
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

<form method="POST" action="{{ route('brand.register.submit') }}">
    @csrf

    <!-- Company Name -->
    <div class="form-group">
        <label for="company_name" class="form-label">Company Name</label>
        <input id="company_name" 
               type="text" 
               name="company_name" 
               value="{{ old('company_name') }}" 
               required 
               autofocus 
               class="form-input @error('company_name') error @enderror"
               placeholder="Enter your company name">
        @error('company_name')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <!-- Contact Person -->
    <div class="form-group">
        <label for="contact_person" class="form-label">Contact Person</label>
        <input id="contact_person" 
               type="text" 
               name="contact_person" 
               value="{{ old('contact_person') }}" 
               required 
               class="form-input @error('contact_person') error @enderror"
               placeholder="Enter contact person name">
        @error('contact_person')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <!-- Email Address -->
    <div class="form-group">
        <label for="email" class="form-label">Email Address</label>
        <input id="email" 
               type="email" 
               name="email" 
               value="{{ old('email') }}" 
               required 
               class="form-input @error('email') error @enderror"
               placeholder="Enter your email address">
        @error('email')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <!-- Phone -->
    <div class="form-group">
        <label for="phone" class="form-label">Phone Number</label>
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

        <!-- Industry -->
        <div class="mb-4">
            <label for="industry" class="block text-sm font-medium text-gray-700 mb-2">Industry</label>
            <select id="industry" 
                    name="industry" 
                    required 
                    class="form-input @error('industry') border-red-500 @enderror">
                <option value="">Select Industry</option>
                <option value="fashion" {{ old('industry') == 'fashion' ? 'selected' : '' }}>Fashion</option>
                <option value="technology" {{ old('industry') == 'technology' ? 'selected' : '' }}>Technology</option>
                <option value="food" {{ old('industry') == 'food' ? 'selected' : '' }}>Food & Beverage</option>
                <option value="beauty" {{ old('industry') == 'beauty' ? 'selected' : '' }}>Beauty & Cosmetics</option>
                <option value="fitness" {{ old('industry') == 'fitness' ? 'selected' : '' }}>Fitness & Health</option>
                <option value="travel" {{ old('industry') == 'travel' ? 'selected' : '' }}>Travel & Tourism</option>
                <option value="other" {{ old('industry') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('industry')
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
            <button type="submit" class="btn-primary w-full">
                Create Account
            </button>
        </div>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Already have an account? 
                <a href="{{ route('brand.login') }}" class="text-primary-600 hover:text-primary-500 font-medium">
                    Sign In
                </a>
            </p>
        </div>
    </form>
</div>
@endsection