@extends('layouts.auth')

@section('title', 'Brand Registration')

@section('content')
<div class="auth-header">
    <h2>Brand Registration</h2>
    <p>Create your brand account</p>
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