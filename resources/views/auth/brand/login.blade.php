@extends('layouts.auth')

@section('title', 'Brand Login')

@section('content')
<div>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Brand Login</h2>
        <p class="mt-2 text-sm text-gray-600">Sign in to your brand account</p>
    </div>

    <form method="POST" action="{{ route('brand.login.submit') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
            <input id="email" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autofocus 
                   class="form-input @error('email') border-red-500 @enderror"
                   placeholder="Enter your email address">
            @error('email')
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

        <!-- Remember Me -->
        <div class="flex items-center justify-between mb-6">
            <label for="remember" class="flex items-center">
                <input id="remember" type="checkbox" name="remember" class="rounded border-gray-300 text-primary-600 shadow-sm focus:ring-primary-500">
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>

            <a href="#" class="text-sm text-primary-600 hover:text-primary-500">
                Forgot password?
            </a>
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
            <button type="submit" class="btn-primary w-full">
                Sign In
            </button>
        </div>

        <!-- Register Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Don't have an account? 
                <a href="{{ route('brand.register') }}" class="text-primary-600 hover:text-primary-500 font-medium">
                    Register as Brand
                </a>
            </p>
        </div>

        <!-- Other Login Options -->
        <div class="mt-6 pt-6 border-t border-gray-200">
            <div class="text-center space-y-2">
                <p class="text-sm text-gray-600">Login as:</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('influencer.login') }}" class="text-sm text-secondary-600 hover:text-secondary-500">
                        Influencer
                    </a>
                    <span class="text-gray-400">|</span>
                    <a href="{{ route('admin.login') }}" class="text-sm text-gray-600 hover:text-gray-500">
                        Admin
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection