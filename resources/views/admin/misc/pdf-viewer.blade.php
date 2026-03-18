@extends('layouts.vertical', ['title' => 'PDF Viewer'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['title' => 'PDF Viewer', 'subtitle' => 'Miscellaneous'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <div class="btn-group text-nowrap">
                            <button class="btn btn-dark" id="prev">
                                <i class="ti ti-arrow-left"></i>
                                <span class="d-none d-sm-inline ms-2">Previous</span>
                            </button>
                            <button class="btn btn-dark" id="next">
                                <i class="ti ti-arrow-right"></i>
                                <span class="d-none d-sm-inline ms-2">Next</span>
                            </button>
                            <button class="btn btn-dark" id="zoomin">
                                <i class="ti ti-zoom-in"></i>
                                <span class="d-none d-sm-inline ms-2">Zoom In</span>
                            </button>
                            <button class="btn btn-dark" id="zoomout">
                                <i class="ti ti-zoom-out"></i>
                                <span class="d-none d-sm-inline ms-2">Zoom Out</span>
                            </button>
                            <button class="btn btn-dark rounded-end-3" id="zoomfit">
                                100%
                            </button>
                            <input class="form-control rounded-end-0 ms-1" id="page_num" style="width: 50px;"
                                type="text" />
                            <span class="input-group-text rounded-start-0 border-start-0" id="page_count">/ 00</span>
                        </div>
                    </div>
                    <div class="text-center overflow-auto mt-3">
                        <canvas class="pdfcanvas border rounded-3" id="the-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/misc-pdf-viewer.js'])
@endsection
