@extends('layouts.base')

@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto&amp;display=swap" rel="stylesheet" />
@endsection

@section('content')
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <a href="#"><img alt="UBold" src="/images/logo.png" /></a>
                <span>Welcome! Your account has been successfully activated.</span>
            </div>
            <div class="email-body">
                <p>Hi there,</p>
                <p>We're excited to have you on board. Your <strong>UBold account</strong> is now active and ready to use.
                </p>
                <p>Click the button below to access your dashboard and start exploring the features.</p>
                <p style="text-align: center;">
                    <a class="btn" href="#">Go to Dashboard</a>
                </p>
                <p>If you need any help, feel free to reach out to our support team anytime.</p>
                <p>Cheers,<br /><b>UBold Team</b></p>
            </div>
            <div class="email-footer">
                <a href="#">Contact Support</a> for assistance.
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
