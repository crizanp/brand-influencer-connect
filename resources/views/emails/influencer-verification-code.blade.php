<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Influencer Account Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #e74c3c;
            margin-bottom: 10px;
        }
        .verification-code {
            background-color: #e74c3c;
            color: white;
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            letter-spacing: 4px;
            margin: 20px 0;
        }
        .info-box {
            background-color: #f8f9fa;
            border-left: 4px solid #e74c3c;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #666;
        }
        .warning {
            color: #e74c3c;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Brand & Influencer Connect</div>
            <h2>Verify Your Influencer Account</h2>
        </div>

        <p>Hello {{ $full_name }},</p>

        <p>Welcome to Brand & Influencer Connect! To complete your influencer profile setup and start collaborating with brands, please verify your email address using the verification code below:</p>

        <div class="verification-code">
            {{ $verification_code }}
        </div>

        <div class="info-box">
            <p><strong>Important:</strong></p>
            <ul>
                <li>This code will expire at {{ $expires_at }} today</li>
                <li>Enter this code on the verification page to activate your account</li>
                <li>If you didn't create this account, please ignore this email</li>
            </ul>
        </div>

        <p>Once verified, you'll be able to:</p>
        <ul>
            <li>Browse brand collaboration opportunities</li>
            <li>Showcase your content and portfolio</li>
            <li>Apply to brand campaigns</li>
            <li>Manage your influencer profile</li>
        </ul>

        <p>If you have any questions or need assistance, please don't hesitate to contact our support team.</p>

        <div class="footer">
            <p class="warning">This is an automated email. Please do not reply to this message.</p>
            <p>&copy; 2025 Brand & Influencer Connect. All rights reserved.</p>
        </div>
    </div>
</body>
</html>