@extends('layouts.vertical', ['title' => 'Spinners'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Spinners'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Border Spinner</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use border spinners as lightweight loading indicators.</p>
                    <div class="spinner-border m-2" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Colors</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use text color utilities like <code>.text-primary</code>,
                        <code>.text-success</code>, or <code>.text-danger</code> to style the spinner, which inherits its
                        color from <code>currentColor</code>.</p>
                    <div>
                        <div class="spinner-border text-primary m-2" role="status"></div>
                        <div class="spinner-border text-secondary m-2" role="status"></div>
                        <div class="spinner-border text-success m-2" role="status"></div>
                        <div class="spinner-border text-danger m-2" role="status"></div>
                        <div class="spinner-border text-warning m-2" role="status"></div>
                        <div class="spinner-border text-info m-2" role="status"></div>
                        <div class="spinner-border text-light m-2" role="status"></div>
                        <div class="spinner-border text-dark m-2" role="status"></div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Alignment</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Bootstrap spinners use <code>rem</code>, <code>currentColor</code>, and
                        <code>inline-flex</code> for easy sizing and alignment.</p>
                    <div class="d-flex align-items-center">
                        <strong>Loading...</strong>
                        <div aria-hidden="true" class="spinner-border ms-auto" role="status"></div>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <div class="spinner-border" role="status"></div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Buttons Spinner</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-primary btn-icon" disabled="" type="button">
                                    <span aria-hidden="true" class="spinner-border spinner-border-sm"
                                        role="status"></span><span class="visually-hidden">Loading...</span>
                                </button>
                                <button class="btn btn-primary btn-icon rounded-circle" disabled="" type="button">
                                    <span aria-hidden="true" class="spinner-border spinner-border-sm"
                                        role="status"></span><span class="visually-hidden">Loading...</span>
                                </button>
                                <button class="btn btn-primary" disabled="" type="button">
                                    <span aria-hidden="true" class="spinner-border spinner-border-sm"
                                        role="status"></span><span class="visually-hidden">Loading...</span>
                                </button>
                                <button class="btn btn-primary" disabled="" type="button">
                                    <span aria-hidden="true" class="spinner-border spinner-border-sm me-2"
                                        role="status"></span>
                                    Loading...
                                </button>
                            </div>
                        </div><!-- end col -->
                        <div class="col-lg-6">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-primary btn-icon" disabled="" type="button">
                                    <span aria-hidden="true" class="spinner-grow spinner-grow-sm"
                                        role="status"></span><span class="visually-hidden">Loading...</span>
                                </button>
                                <button class="btn btn-primary btn-icon rounded-circle" disabled="" type="button">
                                    <span aria-hidden="true" class="spinner-grow spinner-grow-sm"
                                        role="status"></span><span class="visually-hidden">Loading...</span>
                                </button>
                                <button class="btn btn-primary" disabled="" type="button">
                                    <span aria-hidden="true" class="spinner-grow spinner-grow-sm"
                                        role="status"></span><span class="visually-hidden">Loading...</span>
                                </button>
                                <button class="btn btn-primary" disabled="" type="button">
                                    <span aria-hidden="true" class="spinner-grow spinner-grow-sm me-2"
                                        role="status"></span>
                                    Loading...
                                </button>
                            </div>
                        </div><!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Growing Spinner</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Bootstrap spinners use <code>rem</code>, <code>currentColor</code>, and
                        <code>inline-flex</code> for easy resizing, coloring, and alignment.</p>
                    <div class="spinner-grow m-2" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Color Growing Spinner</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">The grow spinner also uses <code>currentColor</code>, so apply classes like
                        <code>.text-primary</code>, <code>.text-warning</code>, or <code>.text-info</code> to customize its
                        color.</p>
                    <div>
                        <div class="spinner-grow text-primary m-2" role="status"></div>
                        <div class="spinner-grow text-secondary m-2" role="status"></div>
                        <div class="spinner-grow text-success m-2" role="status"></div>
                        <div class="spinner-grow text-danger m-2" role="status"></div>
                        <div class="spinner-grow text-warning m-2" role="status"></div>
                        <div class="spinner-grow text-info m-2" role="status"></div>
                        <div class="spinner-grow text-light m-2" role="status"></div>
                        <div class="spinner-grow text-dark m-2" role="status"></div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Size</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="spinner-border avatar-lg text-primary m-2" role="status"></div>
                            <div class="spinner-grow avatar-lg text-secondary m-2" role="status"></div>
                        </div><!-- end col -->
                        <div class="col-lg-6">
                            <div class="spinner-border avatar-md text-primary m-2" role="status"></div>
                            <div class="spinner-grow avatar-md text-secondary m-2" role="status"></div>
                        </div><!-- end col -->
                        <div class="col-lg-6">
                            <div class="spinner-border avatar-sm text-primary m-2" role="status"></div>
                            <div class="spinner-grow avatar-sm text-secondary m-2" role="status"></div>
                        </div><!-- end col -->
                        <div class="col-lg-6">
                            <div class="spinner-border spinner-border-sm m-2" role="status"></div>
                            <div class="spinner-grow spinner-grow-sm m-2" role="status"></div>
                        </div><!-- end col -->
                    </div><!--end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
