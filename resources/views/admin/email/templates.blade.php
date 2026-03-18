@extends('layouts.vertical', ['title' => 'Email Templates'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Email', 'title' => 'Email Templates'])

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4 col-sm-6">
                            <h4 class="header-title mb-3">Basic Action</h4>
                            <img alt="" class="img-fluid" src="/images/emails/confirm.png" />
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h4 class="header-title mb-3">Activated Account</h4>
                            <img alt="" class="img-fluid" src="/images/emails/activated.png" />
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h4 class="header-title mb-3">Marketing</h4>
                            <img alt="" class="img-fluid" src="/images/emails/marketing.png" />
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h4 class="header-title mb-3">Invoice</h4>
                            <img alt="" class="img-fluid" src="/images/emails/invoice.png" />
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h4 class="header-title mb-3">Reports</h4>
                            <img alt="" class="img-fluid" src="/images/emails/reports.png" />
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h4 class="header-title mb-3">Reset Password</h4>
                            <img alt="" class="img-fluid" src="/images/emails/reset-password.png" />
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h4 class="header-title mb-3">Warning</h4>
                            <img alt="" class="img-fluid" src="/images/emails/warning-mail.png" />
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end card -->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
@endsection

@section('scripts')
@endsection
