@extends('layouts.vertical', ['title' => 'ApexTree Apexcharts'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Charts', 'title' => 'ApexTree'])

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Right to left</h4>
        </div>
        <div class="card-body">
            <div dir="ltr">
                <div id="right-to-left" style="margin: 0 auto;"></div>
            </div>
        </div>
        <!-- end card body-->
    </div>
    <!-- end card -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Bottom</h4>
        </div>
        <div class="card-body">
            <div dir="ltr">
                <div id="bottom-tree" style="margin: 0 auto;"></div>
            </div>
        </div>
        <!-- end card body-->
    </div>
    <!-- end card -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Top to bottom</h4>
        </div>
        <div class="card-body">
            <div dir="ltr">
                <div id="top-tree" style="margin: 0 auto;"></div>
            </div>
        </div>
        <!-- end card body-->
    </div>
    <!-- end card -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Collapse Expand</h4>
        </div>
        <div class="card-body">
            <div dir="ltr">
                <div id="collapse-expand" style="margin: 0 auto;"></div>
            </div>
        </div>
        <!-- end card body-->
    </div>
    <!-- end card -->
@endsection

@section('scripts')
    @vite(['resources/js/pages/chart-apextree.js'])
@endsection
