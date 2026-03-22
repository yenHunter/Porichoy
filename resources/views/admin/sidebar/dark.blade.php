@extends('layouts.vertical', ['title' => 'Dark Menu'])

@section('html_attribute')
    data-menu-color="dark" data-topbar-color="light"
@endsection

@section('content')
    @include('layouts.partials/page-title', ['title' => 'Dark Menu'])

    <div class="row">
        <div class="col-12">
            <div class="alert alert-info alert-bordered border-start border-info d-flex align-items-start gap-2">
                <i class="ti ti-info-circle fs-xxl"></i>
                <div>
                    To switch to a dark sidebar, add
                    <code>data-menu-color="dark"</code> to the
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
