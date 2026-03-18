@extends('layouts.vertical', ['title' => 'Flags'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Icons', 'title' => 'Flags'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <div>
                        <h4 class="card-title mb-1 d-flex align-items-center gap-2">
                            Flags Listing (SVG)
                        </h4>
                        <p class="mb-0 text-muted">We offer a set of scalable SVG flags, perfect for language selectors and
                            international content.</p>
                    </div>
                    <div class="app-search">
                        <input class="form-control" id="countrySearch" placeholder="Search country..." type="search" />
                        <i class="app-search-icon text-muted" data-lucide="search"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center w-100" id="flagTable">
                            <thead>
                                <tr>
                                    <th>Flag</th>
                                    <th>Country Name</th>
                                    <th>Path</th>
                                    <th>Flag</th>
                                    <th>Country Name</th>
                                    <th>Path</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')
    @vite(['resources/js/pages/flags-listing.js'])
@endsection
