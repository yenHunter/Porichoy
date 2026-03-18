@extends('layouts.vertical', ['title' => 'Breadcrumb'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Breadcrumb'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Basic</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 py-2">
                            <li aria-current="page" class="breadcrumb-item active">Home</li>
                        </ol>
                    </nav>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 py-2">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Library</li>
                        </ol>
                    </nav>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 py-2">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Library</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Data</li>
                        </ol>
                    </nav>
                </div> <!-- end code body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">With Icons</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light bg-opacity-50 p-2 mb-2">
                            <li aria-current="page" class="breadcrumb-item active"><i class="ti ti-smart-home me-1"></i>Home
                            </li>
                        </ol>
                    </nav>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light bg-opacity-50 p-2 mb-2">
                            <li class="breadcrumb-item"><a href="#"><i class="ti ti-smart-home"></i>
                                    Home</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Library</li>
                        </ol>
                    </nav>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light bg-opacity-50 p-2 mb-0">
                            <li class="breadcrumb-item"><a href="#"><i class="ti ti-smart-home"></i>
                                    Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Library</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Data</li>
                        </ol>
                    </nav>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
