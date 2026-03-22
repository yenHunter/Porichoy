@extends('layouts.vertical', ['title' => 'Other Charts'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Charts', 'title' => 'Other Charts'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Bubble</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="bubble-chart"></canvas>
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
                    <h5 class="card-title">Combo Bar &amp; Line</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="combo-bar-line-chart"></canvas>
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
                    <h5 class="card-title">Stacked Bar &amp; Line</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="stacked-bar-line-chart"></canvas>
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
                    <h5 class="card-title">Doughnut</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="doughnut-chart"></canvas>
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
                    <h5 class="card-title">Multi Series Pie</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="multi-pie-chart"></canvas>
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
                    <h5 class="card-title">Pie</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="pie-chart"></canvas>
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
                    <h5 class="card-title">Polar Area</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="polar-chart"></canvas>
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
                    <h5 class="card-title">Radar</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="radar-chart"></canvas>
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
                    <h5 class="card-title">Scatter</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="scatter-chart"></canvas>
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
    @vite(['resources/js/pages/chartjs-other.js'])
@endsection
