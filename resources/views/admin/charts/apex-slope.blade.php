@extends('layouts.vertical', ['title' => 'Slope Apexcharts'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Charts', 'title' => 'Slope Apexcharts'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Slope</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="basic-slope"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Multi Slope</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="multi-slope"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->
    </div>
    <!-- end row-->
@endsection

@section('scripts')
    @vite(['resources/js/pages/chart-apex-slope.js'])
@endsection
