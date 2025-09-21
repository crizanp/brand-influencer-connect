<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Influencer Account</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Reset Password</h2>
                <p>Enter the 6-digit code sent to your email and create a new password</p>
            </div>

            @if (session('status') == 'password-reset-code-sent')
                <div class="alert alert-success">
                    <strong>Code Sent!</strong> We've sent a 6-digit code to your email address. Please check your inbox.
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('influencer.password.update') }}" class="auth-form">
                @csrf

                <input type="hidden" name="email" value="{{ request('email') ?? session('email') }}">

                <div class="form-group">
                    <label for="email_display">Email Address</label>
                    <input 
                        type="email" 
                        id="email_display" 
                        value="{{ request('email') ?? session('email') }}" 
                        readonly
                        class="form-control readonly"
                    >
                </div>

                <div class="form-group">
                    <label for="reset_code">Reset Code</label>
                    <input 
                        type="text" 
                        id="reset_code" 
                        name="reset_code" 
                        value="{{ old('reset_code') }}" 
                        required 
                        maxlength="6"
                        class="form-control code-input @error('reset_code') error @enderror"
                        placeholder="Enter 6-digit code"
                    >
                    @error('reset_code')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        minlength="8"
                        class="form-control @error('password') error @enderror"
                        placeholder="Enter new password"
                    >
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        required 
                        minlength="8"
                        class="form-control"
                        placeholder="Confirm new password"
                    >
                </div>

                <button type="submit" class="auth-btn primary">Reset Password</button>
            </form>

            <div class="auth-links">
                <a href="{{ route('influencer.password.request') }}">Request New Code</a>
                <span>|</span>
                <a href="{{ route('influencer.login') }}">Back to Login</a>
            </div>
        </div>
    </div>

    <script>
        // Auto-format the reset code input
        document.getElementById('reset_code').addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/[^0-9]/g, '').slice(0, 6);
        });
    </script>
</body>
</html>