<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Join Tribe - Choose Your Path</title>
    
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
            max-width: 800px;
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
            gap: 32px;
        }

        .selection-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
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
            width: 80px;
            height: 80px;
            border-radius: 20px;
            margin: 0 auto 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: white;
        }

        .brand-card .card-icon {
            background: linear-gradient(135deg, #ff4081, #9c27b0);
        }

        .influencer-card .card-icon {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }

        .selection-card h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .selection-card p {
            font-size: 16px;
            color: #666;
            margin-bottom: 24px;
            line-height: 1.6;
        }

        .card-features {
            list-style: none;
            text-align: left;
            margin-bottom: 32px;
        }

        .card-features li {
            padding: 8px 0;
            font-size: 14px;
            color: #666;
            position: relative;
            padding-left: 24px;
        }

        .card-features li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #4caf50;
            font-weight: bold;
        }

        .btn {
            width: 100%;
            padding: 16px 32px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
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

        @media (max-width: 768px) {
            .cards-container {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .header h1 {
                font-size: 36px;
            }

            .selection-card {
                padding: 32px 24px;
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
            <h1>Join Our Community</h1>
            <p>Choose your path and start your journey with us today</p>
        </div>

        <div class="cards-container">
            <!-- Brand Registration Card -->
            <a href="{{ route('brand.register') }}" class="selection-card brand-card">
                <div class="card-icon">🏢</div>
                <h2>I'm a Brand</h2>
                <p>Connect with talented creators and influencers to grow your brand through authentic partnerships.</p>
                <ul class="card-features">
                    <li>Access to 50K+ verified creators</li>
                    <li>Campaign management tools</li>
                    <li>Performance analytics</li>
                    <li>Direct messaging with creators</li>
                    <li>Content approval workflow</li>
                </ul>
                <div class="btn btn-brand">Register as Brand</div>
            </a>

            <!-- Influencer Registration Card -->
            <a href="{{ route('influencer.register') }}" class="selection-card influencer-card">
                <div class="card-icon">🎬</div>
                <h2>I'm a Creator</h2>
                <p>Monetize your content and collaborate with amazing brands that align with your values and audience.</p>
                <ul class="card-features">
                    <li>Partner with premium brands</li>
                    <li>Flexible collaboration terms</li>
                    <li>Fair compensation</li>
                    <li>Creative freedom</li>
                    <li>Growth opportunities</li>
                </ul>
                <div class="btn btn-influencer">Register as Creator</div>
            </a>
        </div>

        <div class="back-link">
            <a href="{{ url('/') }}">← Back to Home</a>
        </div>
    </div>
</body>
</html>