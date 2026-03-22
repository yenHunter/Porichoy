@extends('layouts.vertical', ['title' => 'Ajax Datatables'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'DataTables', 'title' => 'Ajax'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Example </h4>
                    <a class="icon-link icon-link-hover link-primary fw-semibold" href="https://datatables.net/examples/ajax/"
                        target="_blank">View Docs <i class="ti ti-arrow-right bi align-middle fs-lg"></i></a>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                        <strong>Note:</strong> This is a jQuery-based plugin, so you need to include jQuery for it to work.
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
                    </div>
                    <table class="table table-striped dt-responsive align-middle mb-0" id="datatables-ajax">
                        <thead class="thead-sm text-uppercase fs-xxs">
                            <tr>
                                <th>Company</th>
                                <th>Symbol</th>
                                <th>Price</th>
                                <th>Change</th>
                                <th>Volume</th>
                                <th>Market Cap</th>
                                <th>Rating</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/datatables-ajax.js'])
@endsection
