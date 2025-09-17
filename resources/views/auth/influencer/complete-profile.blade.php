@extends('layouts.auth')

@section('title', 'Complete Your Profile')

@section('content')
<div class="auth-header">
    <h2>Complete Your Profile</h2>
    <p>Just a few more details to get started</p>
</div>

<div style="background: #fef7ff; border: 1px solid #ec4899; border-radius: 8px; padding: 20px; margin-bottom: 25px;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <div style="background: #ec4899; color: white; width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 10px; font-size: 14px;">✓</div>
        <h3 style="color: #be185d; margin: 0; font-size: 16px;">Google Account Connected</h3>
    </div>
    <p style="color: #be185d; margin: 0; font-size: 14px;">
        <strong>Email:</strong> {{ $googleUser['email'] }} (verified)<br>
        <strong>Name:</strong> {{ $googleUser['name'] }}
    </p>
</div>

<form method="POST" action="{{ route('influencer.complete.profile.submit') }}">
    @csrf

    <!-- First Name -->
    <div class="form-group">
        <label for="first_name" class="form-label">First Name</label>
        <input id="first_name" 
               type="text" 
               name="first_name" 
               value="{{ old('first_name', explode(' ', $googleUser['name'])[0] ?? '') }}" 
               required 
               class="form-input @error('first_name') error @enderror"
               placeholder="Enter your first name">
        @error('first_name')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <!-- Last Name -->
    <div class="form-group">
        <label for="last_name" class="form-label">Last Name</label>
        <input id="last_name" 
               type="text" 
               name="last_name" 
               value="{{ old('last_name', explode(' ', $googleUser['name'])[1] ?? '') }}" 
               required 
               class="form-input @error('last_name') error @enderror"
               placeholder="Enter your last name">
        @error('last_name')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <!-- Niche -->
    <div class="form-group">
        <label for="niche" class="form-label">Niche/Category</label>
        <select id="niche" 
                name="niche" 
                required 
                class="form-input @error('niche') error @enderror">
            <option value="">Select your niche</option>
            <option value="fashion" {{ old('niche') == 'fashion' ? 'selected' : '' }}>Fashion</option>
            <option value="beauty" {{ old('niche') == 'beauty' ? 'selected' : '' }}>Beauty</option>
            <option value="lifestyle" {{ old('niche') == 'lifestyle' ? 'selected' : '' }}>Lifestyle</option>
            <option value="fitness" {{ old('niche') == 'fitness' ? 'selected' : '' }}>Fitness</option>
            <option value="food" {{ old('niche') == 'food' ? 'selected' : '' }}>Food</option>
            <option value="travel" {{ old('niche') == 'travel' ? 'selected' : '' }}>Travel</option>
            <option value="technology" {{ old('niche') == 'technology' ? 'selected' : '' }}>Technology</option>
            <option value="gaming" {{ old('niche') == 'gaming' ? 'selected' : '' }}>Gaming</option>
            <option value="music" {{ old('niche') == 'music' ? 'selected' : '' }}>Music</option>
            <option value="art" {{ old('niche') == 'art' ? 'selected' : '' }}>Art</option>
            <option value="education" {{ old('niche') == 'education' ? 'selected' : '' }}>Education</option>
            <option value="business" {{ old('niche') == 'business' ? 'selected' : '' }}>Business</option>
            <option value="other" {{ old('niche') == 'other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('niche')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <!-- Bio -->
    <div class="form-group">
        <label for="bio" class="form-label">Bio (Optional)</label>
        <textarea id="bio" 
                  name="bio" 
                  class="form-input @error('bio') error @enderror"
                  placeholder="Tell us about yourself and your content..."
                  rows="4">{{ old('bio') }}</textarea>
        @error('bio')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn-primary">
        Complete Registration
    </button>
</form>

<div class="auth-footer">
    <p>Want to use a different email? <a href="{{ route('influencer.register') }}">Register manually</a></p>
</div>
@endsection