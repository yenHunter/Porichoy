@extends('layouts.base')

@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto&amp;display=swap" rel="stylesheet" />
@endsection

@section('content')
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <a href="#"><img alt="UBold" src="/images/logo.png" /></a>
                <span>Reset your password quickly and securely.</span>
            </div>
            <div class="email-body">
                <p>Hi,</p>
                <p>We received a request to reset your UBold account password. Click the button below to continue.</p>
                <p style="text-align: center;">
                    <a class="btn" href="#">Reset Password</a>
                </p>
                <p>This link will expire in 30 minutes. If you didn't request a password reset, you can safely ignore this
                    email.</p>
                <p>Thanks,<br /><b>UBold Security Team</b></p>
            </div>
            <div class="email-footer">
                <a href="#">Need help?</a> Contact our support.
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
