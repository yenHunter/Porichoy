@extends('layouts.vertical', ['title' => 'Line Charts'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Charts', 'title' => 'Line Charts'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Basic Line</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="basic-line-chart"></canvas>
                        </div>
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
                    <h5 class="card-title">Interpolation</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="interpolation-chart"></canvas>
                        </div>
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
                    <h5 class="card-title">Multi-Axes</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="multi-axes-chart"></canvas>
                        </div>
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
                    <h5 class="card-title">Point Styling</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="point-styling-chart"></canvas>
                        </div>
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
                    <h5 class="card-title">Line Segment</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="line-segment-chart"></canvas>
                        </div>
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
                    <h5 class="card-title">Stepped</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="stepped-line-chart"></canvas>
                        </div>
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
    @vite(['resources/js/pages/chartjs-line.js'])
@endsection
