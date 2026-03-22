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
                <h2>Thanks for using UBold</h2>
                <div class="invoice-info">
                    <strong>Coderthemes</strong>
                    <div>Invoice #98765</div>
                    <div>July 17, 2025</div>
                </div>
                <table class="invoice-table">
                    <tr>
                        <td>Regular Licence</td>
                        <td class="text-right">$ 12.00</td>
                    </tr>
                    <tr>
                        <td>6 months Support</td>
                        <td class="text-right">$ 7.20</td>
                    </tr>
                    <tr>
                        <td>6 months Extended Support</td>
                        <td class="text-right">$ 7.20</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td class="text-right">$ 26.40</td>
                    </tr>
                </table>
                <p class="text-center"><a href="#" style="color: #00bcd4; text-decoration: underline;">View in
                        browser</a></p>
                <p class="text-center">Coderthemes Inc., 456 Example Ave, Demo City, DemoLand</p>
            </div>
            <div class="email-footer">
                Questions? Email <a href="mailto:support@example.com">support@example.com</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
