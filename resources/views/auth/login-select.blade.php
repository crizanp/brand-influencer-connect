<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login to Tribe</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #1a1a1a;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 60px;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: white;
            margin-bottom: 24px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 20px;
        }

        .logo-text {
            font-size: 28px;
            font-weight: 800;
        }

        .header h1 {
            font-size: 48px;
            font-weight: 700;
            color: white;
            margin-bottom: 16px;
        }

        .header p {
            font-size: 20px;
            color: rgba(255,255,255,0.9);
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            margin-bottom: 32px;
        }

        .selection-card {
            background: white;
            border-radius: 20px;
            padding: 32px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            color: #1a1a1a;
        }

        .selection-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(0,0,0,0.15);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }

        .brand-card .card-icon {
            background: linear-gradient(135deg, #ff4081, #9c27b0);
        }

        .influencer-card .card-icon {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }

        .admin-card .card-icon {
            background: linear-gradient(135deg, #4caf50, #8bc34a);
        }

        .selection-card h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .selection-card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .btn {
            width: 100%;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-block;
            text-align: center;
        }

        .btn-brand {
            background: #ff4081;
            color: white;
        }

        .btn-brand:hover {
            background: #e91e63;
            transform: translateY(-1px);
        }

        .btn-influencer {
            background: #4facfe;
            color: white;
        }

        .btn-influencer:hover {
            background: #2196f3;
            transform: translateY(-1px);
        }

        .btn-admin {
            background: #4caf50;
            color: white;
        }

        .btn-admin:hover {
            background: #45a049;
            transform: translateY(-1px);
        }

        .admin-section {
            text-align: center;
            margin-top: 40px;
        }

        .admin-card {
            background: white;
            border-radius: 15px;
            padding: 24px;
            display: inline-block;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-decoration: none;
            color: #1a1a1a;
            transition: transform 0.3s ease;
        }

        .admin-card:hover {
            transform: translateY(-3px);
        }

        .back-link {
            text-align: center;
            margin-top: 40px;
        }

        .back-link a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .back-link a:hover {
            color: white;
        }

        .register-link {
            text-align: center;
            margin-top: 32px;
        }

        .register-link a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            padding: 12px 24px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .register-link a:hover {
            background: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.5);
        }

        @media (max-width: 768px) {
            .cards-container {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 36px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <a href="{{ url('/') }}" class="logo">
                <div class="logo-icon">T</div>
                <span class="logo-text">tribe</span>
            </a>
            <h1>Welcome Back</h1>
            <p>Sign in to your account</p>
        </div>

        <div class="cards-container">
            <!-- Brand Login Card -->
            <a href="{{ route('brand.login') }}" class="selection-card brand-card">
                <div class="card-icon">🏢</div>
                <h2>Brand Login</h2>
                <p>Access your brand dashboard and manage campaigns</p>
                <div class="btn btn-brand">Login as Brand</div>
            </a>

            <!-- Influencer Login Card -->
            <a href="{{ route('influencer.login') }}" class="selection-card influencer-card">
                <div class="card-icon">🎬</div>
                <h2>Creator Login</h2>
                <p>Access your creator dashboard and manage partnerships</p>
                <div class="btn btn-influencer">Login as Creator</div>
            </a>
        </div>

        <!-- Admin Login Section -->
        <div class="admin-section">
            <a href="{{ route('admin.login') }}" class="admin-card">
                <div class="card-icon">⚙️</div>
                <h2>Admin Access</h2>
                <p>Platform administration</p>
                <div class="btn btn-admin" style="margin-top: 12px;">Admin Login</div>
            </a>
        </div>

        <div class="register-link">
            <a href="{{ route('register') }}">Don't have an account? Register here</a>
        </div>

        <div class="back-link">
            <a href="{{ url('/') }}">← Back to Home</a>
        </div>
    </div>
</body>
</html>