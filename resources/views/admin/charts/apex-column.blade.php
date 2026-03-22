@extends('layouts.vertical', ['title' => 'Apex Column Charts'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Charts', 'title' => 'Column Apexchart'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Column Charts</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="basic-column"></div>
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
                    <h4 class="card-title">Column Chart with Datalabels</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="datalabels-column"></div>
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
                    <h4 class="card-title">Stacked Column Charts</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="stacked-column"></div>
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
                    <h4 class="card-title">100% Stacked Column Chart</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="full-stacked-column"></div>
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
                    <h4 class="card-title">Grouped Stacked Columns Chart</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="grouped-stacked-column"></div>
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
                    <h4 class="card-title">Dumbbell Chart</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="dumbbell-chart"></div>
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
                    <h4 class="card-title">Column with Markers</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="column-with-markers"></div>
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
                    <h4 class="card-title">Column with Group Label</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="column-with-group-label"></div>
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
                    <h4 class="card-title">Column Chart with rotated labels &amp; Annotations</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="rotate-labels-column"></div>
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
                    <h4 class="card-title">Column Chart with negative values</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="negative-value-column"></div>
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
                    <h4 class="card-title">Distributed Column Charts</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="distributed-column"></div>
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
                    <h4 class="card-title">Range Column Charts</h4>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="range-column"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between border-dashed">
                    <h4 class="card-title">Dynamic Loaded Chart</h4>
                    <div class="flex-shrink-0">
                        <select class="form-select form-select-sm" id="model">
                            <option value="iphone5">iPhone 5</option>
                            <option value="iphone6">iPhone 6</option>
                            <option value="iphone7">iPhone 7</option>
                        </select>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <h4 class="header-title"></h4>
                    <div dir="ltr">
                        <div class="row">
                            <div class="col-sm-6">
                                <div id="chart-year"></div>
                            </div>
                            <div class="col-sm-6">
                                <div id="chart-quarter"></div>
                            </div>
                        </div> <!-- end row-->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/dayjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/plugin/quarterOfYear.min.js"></script>
    @vite(['resources/js/pages/chart-apex-column.js'])
@endsection
