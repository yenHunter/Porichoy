@extends('layouts.vertical', ['title' => 'Area Charts'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Charts', 'title' => 'Area Charts'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Basic Area</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="basic-area-chart"></canvas>
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
                    <h5 class="card-title">Different Dataset</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="different-dataset-area-chart"></canvas>
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
                            <canvas id="stacked-area-chart"></canvas>
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
                    <h5 class="card-title">Boundaries</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="boundaries-area-chart"></canvas>
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
                    <h5 class="card-title">Draw Time</h5>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="mt-3" style="height: 300px;">
                            <canvas id="draw-time-chart"></canvas>
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
    @vite(['resources/js/pages/chartjs-area.js'])
@endsection
