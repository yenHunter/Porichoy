@extends('layouts.vertical', ['title' => 'Data Rendering Datatables'])

@section('css')
    <link href="/plugins/datatables/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Datatables', 'title' => 'Data Rendering'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Example </h4>
                    <a class="icon-link icon-link-hover link-primary fw-semibold"
                        href="https://datatables.net/examples/basic_init/data_rendering.html" target="_blank">View Docs <i
                            class="ti ti-arrow-right bi align-middle fs-lg"></i></a>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                        <strong>Note:</strong> This is a jQuery-based plugin, so you need to include jQuery for it to work.
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
                    </div>
                    <table class="table table-striped dt-responsive align-middle mb-0" id="datatable-rendering">
                        <thead class="thead-sm text-uppercase fs-xxs">
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Progress</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                    </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/datatables-rendering.js'])
@endsection
