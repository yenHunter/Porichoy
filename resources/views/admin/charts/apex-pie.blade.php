@extends('layouts.vertical', ['title' => 'Pie Apexhcharts'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Charts', 'title' => 'Pie Apexchart'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Simple Pie Chart
                    </h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="simple-pie"></div>
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
                    <h4 class="card-title"> Simple Donut Chart</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="simple-donut"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->
    </div>
    <!-- end row-->
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Monochrome Pie Chart</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="monochrome-pie"></div>
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
                    <h4 class="card-title">Gradient Donut Chart</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="gradient-donut"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->
    </div>
    <!-- end row-->
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Patterned Donut Chart</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="patterned-donut"></div>
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
                    <h4 class="card-title">Pie Chart with Image fill</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="image-pie"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->
    </div>
    <!-- end row-->
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Donut Update</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="update-donut"></div>
                    </div>
                    <div class="text-center mt-2">
                        <button class="btn btn-sm btn-primary" id="randomize">RANDOMIZE</button>
                        <button class="btn btn-sm btn-primary" id="add">ADD</button>
                        <button class="btn btn-sm btn-primary" id="remove">REMOVE</button>
                        <button class="btn btn-sm btn-primary" id="reset">RESET</button>
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
    @vite(['resources/js/pages/chart-apex-pie.js'])
@endsection
