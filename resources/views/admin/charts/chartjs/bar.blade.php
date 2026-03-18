@extends('layouts.vertical', ['title' => 'Bar Charts'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Charts', 'title' => 'Bar Charts'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Basic Bar</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="basic-bar-chart"></canvas>
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
                    <h5 class="card-title">Border Radius</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="border-radius-bar-chart"></canvas>
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
                    <h5 class="card-title">Floating</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="floating-bar-chart"></canvas>
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
                    <h5 class="card-title">Horizontal</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="horizontal-bar-chart"></canvas>
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
                    <h5 class="card-title">Stacked</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="stacked-bar-chart"></canvas>
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
                    <h5 class="card-title">Stacked with Groups</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="stacked-groups-bar-chart"></canvas>
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
                    <h5 class="card-title">Vertical</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="vertical-bar-chart"></canvas>
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
    @vite(['resources/js/pages/chartjs-bar.js'])
@endsection
