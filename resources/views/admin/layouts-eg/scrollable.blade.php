@extends('layouts.vertical', ['title' => 'Scrollable Layout'])

@section('html_attribute')
 data-layout-position="scrollable"
 
@endsection

@section('content')
    @include('layouts.partials/page-title', ['title' => 'Scrollable'])

    <div class="row">
        <div class="col-12">
            <div class="alert alert-info alert-bordered border-start border-info d-flex align-items-start gap-2">
                <i class="ti ti-info-circle fs-xxl"></i>
                <div>
                    To enable full scrolling and view all content, please add
                    <code>data-layout-position="scrollable"</code> to the
                    <code>&lt;html&gt;</code> tag.
                </div>
            </div>
        </div>
    </div>
    <div style="min-height: 100vh;"></div>
@endsection

@section('scripts')
@endsection
