@extends('layouts.vertical', ['title' => 'Icon View Sidebar Layout'])

@section('html_attribute')
    data-sidenav-size="condensed"
@endsection

@section('content')
    @include('layouts.partials/page-title', ['title' => 'Icon View'])

    <div class="row">
        <div class="col-12">
            <div class="alert alert-info alert-bordered border-start border-info d-flex align-items-start gap-2">
                <i class="ti ti-info-circle fs-xxl"></i>
                <div>
                    To enable icon view menu scrolling and see all content, add
                    <code>data-sidenav-size="condensed"</code> to the
                    <code>&lt;html&gt;</code> tag.
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
