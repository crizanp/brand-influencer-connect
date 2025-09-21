<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Brand Account</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Forgot Password</h2>
                <p>Enter your email address and we'll send you a code to reset your password</p>
            </div>

            @if (session('status') == 'password-reset-code-sent')
                <div class="alert alert-success">
                    <strong>Code Sent!</strong> We've sent a 6-digit code to your email address. Please check your inbox and enter the code on the next page.
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('brand.password.email') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus
                        class="form-control @error('email') error @enderror"
                        placeholder="Enter your email address"
                    >
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="auth-btn primary">Send Reset Code</button>
            </form>

            <div class="auth-links">
                <a href="{{ route('brand.login') }}">Back to Login</a>
                <span>|</span>
                <a href="{{ route('brand.register') }}">Create Account</a>
            </div>
        </div>
    </div>
</body>
</html>