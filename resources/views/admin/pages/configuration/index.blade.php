@extends('admin.layout.default')

@section('title', 'Configuration Management')

@section('content')
    <!-- BEGIN container -->
    <div class="container">
        <!-- BEGIN row -->
        <div class="row justify-content-center">
            <!-- BEGIN col-10 -->
            <div class="col-xl-12">
                <!-- BEGIN row -->
                <div class="row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item text-uppercase"><a href="#">DASHBOARD</a></li>
                        <li class="breadcrumb-item text-uppercase active">Configuration Management</li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="page-header">
                            Configuration Management <small>create update delete all in here</small>
                        </h1>
                    </div>

                    <hr class="mb-4">

                    <div class="col-md-12">
                        <h4>General</h4>
                        <h6 class="text-muted">view</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card" style="cursor: pointer;" onclick="window.location='{{ route('configuration.theme') }}'">
                                            <!-- BEGIN card-body -->
                                            <div class="card-body">
                                                <div class="row mb-1">
                                                    <div class="col-lg-12 position-relative">
                                                        <h1 class="mb-0 d-flex align-items-center text-theme">
                                                            Theme
                                                        </h1>
                                                        <div class="fs-13px mt-1"><span
                                                                class="badge bg-theme bg-opacity-15 text-theme py-5px me-1">+12%</span>
                                                            compare to last week</div>
                                                        <i
                                                            class="fa-brands fa-figma display-3 lh-1 mt-n2 text-body text-opacity-20 me-3 position-absolute end-0 top-0"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END card-body -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card" style="cursor: pointer;" onclick="window.location='{{ route('configuration.theme') }}'">
                                            <!-- BEGIN card-body -->
                                            <div class="card-body">
                                                <div class="row mb-1">
                                                    <div class="col-lg-12 position-relative">
                                                        <h1 class="mb-0 d-flex align-items-center text-theme">
                                                            Theme
                                                        </h1>
                                                        <div class="fs-13px mt-1"><span
                                                                class="badge bg-theme bg-opacity-15 text-theme py-5px me-1">+12%</span>
                                                            compare to last week</div>
                                                        <i
                                                            class="fab fa-google-wallet display-3 lh-1 mt-n2 text-body text-opacity-20 me-3 position-absolute end-0 top-0"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END card-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END row -->
            </div>
            <!-- END col-10 -->
        </div>
        <!-- END row -->
    </div>
    <!-- END container -->
@endsection
