<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Reset Code</title>
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
        .email-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #e74c3c;
            margin: 0;
        }
        .code-box {
            background-color: #fdf2f2;
            border: 2px solid #e74c3c;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin: 20px 0;
        }
        .code {
            font-size: 36px;
            font-weight: bold;
            color: #2c3e50;
            letter-spacing: 5px;
            margin: 10px 0;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #7f8c8d;
            font-size: 14px;
        }
        .warning {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Password Reset Code</h1>
            <p>Hello {{ $full_name }},</p>
        </div>

        <p>You have requested to reset your password for your Influencer account. Please use the verification code below to reset your password:</p>

        <div class="code-box">
            <p style="margin: 0; font-size: 18px; color: #2c3e50;">Your Password Reset Code is:</p>
            <div class="code">{{ $reset_code }}</div>
            <p style="margin: 10px 0 0 0; color: #7f8c8d;">This code expires at {{ $expires_at }} today</p>
        </div>

        <div class="warning">
            <strong>Important:</strong> This code will expire in 30 minutes. If you did not request a password reset, please ignore this email or contact our support team.
        </div>

        <p>To reset your password:</p>
        <ol>
            <li>Go to the password reset page</li>
            <li>Enter your email address</li>
            <li>Enter the 6-digit code above</li>
            <li>Create your new password</li>
        </ol>

        <div class="footer">
            <p>This is an automated email. Please do not reply to this message.</p>
            <p>If you're having trouble, please contact our support team.</p>
            <p>&copy; {{ date('Y') }} Brand & Influencer Connect. All rights reserved.</p>
        </div>
    </div>
</body>
</html>