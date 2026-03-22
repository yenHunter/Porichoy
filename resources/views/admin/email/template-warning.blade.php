@extends('layouts.base')

@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto&amp;display=swap" rel="stylesheet" />
@endsection

@section('content')
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <a href="#"><img alt="UBold" src="/images/logo.png" /></a>
                <span>Warning: You're approaching your limit. Please upgrade.</span>
            </div>
            <div class="email-body">
                <p>You have <strong>1 free report</strong> remaining.</p>
                <p>Add your credit card now to upgrade your account to a premium plan to ensure you don't miss out on any
                    reports.</p>
                <p style="text-align: center;">
                    <a class="btn" href="#">Upgrade My Account</a>
                </p>
                <p>Thanks for choosing <b>UBold</b> Admin.</p>
            </div>
            <div class="email-footer">
                <a href="#">Unsubscribe</a> from these alerts.
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
