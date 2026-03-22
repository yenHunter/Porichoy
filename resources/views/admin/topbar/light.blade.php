@extends('layouts.vertical', ['title' => 'Topbar Topbar'])

@section('html_attribute')
    data-topbar-color="light"
@endsection

@section('content')
    @include('layouts.partials/page-title', ['title' => 'Light Topbar'])

    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning alert-bordered border-start border-warning d-flex align-items-start gap-2">
                <i class="ti ti-info-circle fs-xxl"></i>
                <div>
                    To enable the dark topbar, add
                    <code>data-topbar-color="light"</code> to the
                    <code>&lt;html&gt;</code> tag in your layout.
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="m-0">Your custom content here</h4>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
@endsection

@section('scripts')
@endsection
