@extends('layouts.base')

@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto&amp;display=swap" rel="stylesheet" />
@endsection

@section('content')
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <a href="#"><img alt="UBold" src="/images/logo.png" /></a>
            </div>
            <div class="email-body">
                <h2>Confirm Your Email</h2>
                <p>Please confirm your email address by clicking the button below.</p>
                <p>We may need to send you critical updates, so it’s important that we have an accurate email address.</p>
                <p style="text-align: center;">
                    <a class="btn" href="#">Confirm Email Address</a>
                </p>
                <p>— <b>UBold</b> Admin Dashboard Team</p>
            </div>
            <div class="email-footer">
                If you did not request this, please ignore this email. <br />
                <a href="#">Unsubscribe</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
