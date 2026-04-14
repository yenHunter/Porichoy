<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Set Your Password</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 40px 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }
        .email-header p {
            margin: 5px 0 0;
            font-size: 14px;
            font-weight: 400;
            opacity: 0.8;
            letter-spacing: 5px;
        }
        .email-body {
            padding: 40px;
        }
        .greeting {
            font-size: 18px;
            font-weight: 500;
            color: #333;
            margin-bottom: 20px;
        }
        .content-text {
            font-size: 14px;
            line-height: 1.8;
            color: #666;
            margin-bottom: 15px;
        }
        .highlight {
            background-color: #f0f3fa;
            padding: 20px;
            border-left: 4px solid #667eea;
            border-radius: 4px;
            margin: 25px 0;
            font-size: 14px;
            color: #555;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 14px 40px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            margin: 30px 0;
            border: none;
            cursor: pointer;
            text-align: center;
            transition: transform 0.2s;
        }
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(102, 126, 234, 0.4);
        }
        .button-container {
            text-align: center;
        }
        .alternative-link {
            font-size: 12px;
            color: #999;
            text-align: center;
            margin-top: 20px;
            word-break: break-all;
        }
        .alternative-link a {
            color: #667eea;
            text-decoration: none;
        }
        .alternative-link a:hover {
            text-decoration: underline;
        }
        .email-footer {
            background-color: #f8f9fa;
            padding: 30px 40px;
            text-align: center;
            border-top: 1px solid #e8e8e8;
            font-size: 12px;
            color: #999;
        }
        .footer-links {
            margin-top: 15px;
        }
        .footer-links a {
            color: #667eea;
            text-decoration: none;
            margin: 0 10px;
            font-size: 12px;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }
        .logo-text {
            font-size: 12px;
            color: #ccc;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Porichoy</h1>
            <p>LET THEM KNOW</p>
        </div>

        <!-- Body -->
        <div class="email-body">
            <div class="greeting">
                Hello {{ $user->first_name }} {{ $user->last_name }},
            </div>

            <p class="content-text">
                Welcome! Your account has been created successfully. To get started, you need to set your password.
            </p>

            <div class="highlight">
                <strong>🔐 Account Created</strong><br>
                Your admin account is ready to use. Please set a secure password to access your dashboard.
            </div>

            <p class="content-text">
                Click the button below to set your password. This link will expire in 60 minutes for security reasons.
            </p>

            <!-- CTA Button -->
            <div class="button-container">
                <a href="{{ $resetUrl }}" class="cta-button">Set Your Password</a>
            </div>

            <p class="content-text">
                Once you've set your password, you'll be able to log in to your dashboard and start managing your content.
            </p>

            <!-- Alternative Link -->
            <div class="alternative-link">
                If the button above doesn't work, copy and paste this link in your browser:<br>
                <a href="{{ $resetUrl }}">{{ $resetUrl }}</a>
            </div>

            <p class="content-text" style="margin-top: 30px;">
                <strong>Need help?</strong> If you didn't request this account or have any questions, please contact our support team.
            </p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>
                <strong>Important:</strong> For your security, never share your password with anyone. <br>We will never ask for it via email.
            </p>
            {{-- <div class="footer-links">
                <a href="{{ url('/') }}">Visit Site</a> •
                <a href="{{ url('/') }}">Support</a> •
                <a href="{{ url('/') }}">Privacy Policy</a>
            </div> --}}
            <div class="logo-text">
                © {{ date('Y') }} Porichoy. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html>
