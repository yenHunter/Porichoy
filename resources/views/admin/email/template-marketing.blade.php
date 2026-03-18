@extends('layouts.base')

@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto&amp;display=swap" rel="stylesheet" />
@endsection

@section('content')
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <a href="#"><img alt="UBold" src="/images/logo.png" /></a>
                <span>Exciting New Features Just Launched!</span>
            </div>
            <div class="email-body">
                <h2>Introducing Smart Reports, Faster Dashboards &amp; More</h2>
                <p>We're thrilled to bring you our latest product update packed with powerful new features designed to
                    improve your productivity and streamline your workflow.</p>
                <div class="features">
                    <div class="feature">
                        <svg class="bi bi-lightning-charge-fill" fill="currentColor" viewbox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.251 0a.5.5 0 0 1 .47.676L9.989 5H14.5a.5.5 0 0 1 .41.79l-9 12a.5.5 0 0 1-.91-.29L6.01 11H1.5a.5.5 0 0 1-.41-.79l9-12A.5.5 0 0 1 11.25 0z">
                            </path>
                        </svg>
                        <div>
                            <strong>Lightning Performance</strong>
                            <p>Experience 2x faster dashboard loads with our upgraded engine.</p>
                        </div>
                    </div>
                    <div class="feature">
                        <svg class="bi bi-bar-chart-fill" fill="currentColor" viewbox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 13.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zm2-2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H3.5a.5.5 0 0 1-.5-.5zm4-2a.5.5 0 0 1 .5-.5H9a.5.5 0 0 1 0 1H7.5a.5.5 0 0 1-.5-.5zm4-2a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H11.5a.5.5 0 0 1-.5-.5z">
                            </path>
                        </svg>
                        <div>
                            <strong>Advanced Reports</strong>
                            <p>Build detailed reports with new chart types and export options.</p>
                        </div>
                    </div>
                    <div class="feature">
                        <svg class="bi bi-people-fill" fill="currentColor" viewbox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13 7a2 2 0 1 0-4 0 2 2 0 0 0 4 0zM9.5 7a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0zM3 6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 7c0-1.104-.896-2-2-2H2c-1.104 0-2 .896-2 2v.5h9V14zm1 0c0-1.105.672-2 1.5-2h2c.828 0 1.5.895 1.5 2v.5H10v-.5z">
                            </path>
                        </svg>
                        <div>
                            <strong>Team Collaboration</strong>
                            <p>Invite users, assign roles, and collaborate in real-time.</p>
                        </div>
                    </div>
                </div>
                <p style="text-align: center;">
                    <a class="btn" href="#">Explore the Update</a>
                </p>
                <p>Thank you for being a valued member of the <strong>UBold</strong> community!</p>
            </div>
            <div class="email-footer">
                <a href="#">Unsubscribe</a> or <a href="#">Contact Support</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
