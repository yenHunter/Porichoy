@extends('layouts.base')

@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto&amp;display=swap" rel="stylesheet" />
@endsection

@section('content')
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <a href="#"><img alt="UBold" src="/images/logo.png" /></a>
                <span>Your monthly summary is ready.</span>
            </div>
            <div class="email-body">
                <h2>UBold Monthly Report - June 2025</h2>
                <p>Here’s a quick summary of your activity this month:</p>
                <ul>
                    <li><strong>Reports Generated:</strong> 12</li>
                    <li><strong>Team Members Added:</strong> 3</li>
                    <li><strong>Upgraded Plan:</strong> Pro Tier</li>
                </ul>
                <p style="text-align: center;">
                    <a class="btn" href="#">View Full Report</a>
                </p>
                <p>We appreciate your continued trust in <b>UBold</b>.</p>
            </div>
            <div class="email-footer">
                <a href="#">Update Preferences</a> or <a href="#">Unsubscribe</a>.
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
