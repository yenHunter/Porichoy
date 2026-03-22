@extends('layouts.vertical', ['title' => 'Badges'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Badges'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Badges</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Use the <code>.badge</code> &amp; <code>.text-bg-*</code> classes to make badges.
                    </p>
                    <span class="badge badge-default">Default</span>
                    <span class="badge text-bg-primary">Primary</span>
                    <span class="badge text-bg-secondary">Secondary</span>
                    <span class="badge text-bg-success">Success</span>
                    <span class="badge text-bg-danger">Danger</span>
                    <span class="badge text-bg-warning">Warning</span>
                    <span class="badge text-bg-info">Info</span>
                    <span class="badge text-bg-light">Light</span>
                    <span class="badge text-bg-dark">Dark</span>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Pill Badges</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Use the <code>.rounded-pill</code> modifier class to make badges more rounded.
                    </p>
                    <span class="badge badge-default rounded-pill">Default</span>
                    <span class="badge text-bg-primary rounded-pill">Primary</span>
                    <span class="badge text-bg-secondary rounded-pill">Secondary</span>
                    <span class="badge text-bg-success rounded-pill">Success</span>
                    <span class="badge text-bg-danger rounded-pill">Danger</span>
                    <span class="badge text-bg-warning rounded-pill">Warning</span>
                    <span class="badge text-bg-info rounded-pill">Info</span>
                    <span class="badge text-bg-light rounded-pill">Light</span>
                    <span class="badge text-bg-dark rounded-pill">Dark</span>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Outline Badges</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Using the <code>.badge-outline-*</code> to quickly create a bordered badges.
                    </p>
                    <span class="badge badge-outline-primary">Primary</span>
                    <span class="badge badge-outline-secondary">Secondary</span>
                    <span class="badge badge-outline-success">Success</span>
                    <span class="badge badge-outline-danger">Danger</span>
                    <span class="badge badge-outline-warning">Warning</span>
                    <span class="badge badge-outline-info">Info</span>
                    <span class="badge badge-outline-dark">Dark</span>
                </div> <!-- end card body -->
            </div>
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Outline Pill Badges</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Use the <code>.rounded-pill</code> modifier class to make badges more rounded.
                    </p>
                    <span class="badge badge-outline-primary rounded-pill">Primary</span>
                    <span class="badge badge-outline-secondary rounded-pill">Secondary</span>
                    <span class="badge badge-outline-success rounded-pill">Success</span>
                    <span class="badge badge-outline-danger rounded-pill">Danger</span>
                    <span class="badge badge-outline-warning rounded-pill">Warning</span>
                    <span class="badge badge-outline-info rounded-pill">Info</span>
                    <span class="badge badge-outline-dark rounded-pill">Dark</span>
                </div> <!-- end card body-->
            </div>
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lighten Badges</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Use the <code>.badge-soft--*</code> modifier class to make badges lighten.
                    </p>
                    <span class="badge badge-soft-primary">Primary</span>
                    <span class="badge badge-soft-secondary">Secondary</span>
                    <span class="badge badge-soft-success">Success</span>
                    <span class="badge badge-soft-danger">Danger</span>
                    <span class="badge badge-soft-warning">Warning</span>
                    <span class="badge badge-soft-info">Info</span>
                    <span class="badge badge-soft-dark">Dark</span>
                </div> <!-- end card body-->
            </div>
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lighten Pill Badges</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Use the <code>.badge-soft--*</code> modifier class to make badges lighten.
                    </p>
                    <span class="badge badge-soft-primary rounded-pill">Primary</span>
                    <span class="badge badge-soft-secondary rounded-pill">Secondary</span>
                    <span class="badge badge-soft-success rounded-pill">Success</span>
                    <span class="badge badge-soft-danger rounded-pill">Danger</span>
                    <span class="badge badge-soft-warning rounded-pill">Warning</span>
                    <span class="badge badge-soft-info rounded-pill">Info</span>
                    <span class="badge badge-soft-dark rounded-pill">Dark</span>
                </div> <!-- end card body -->
            </div>
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Label Badges</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Using the <code>.badge-label</code> to quickly create a square based badges.
                    </p>
                    <span class="badge badge-label badge-default">Default</span>
                    <span class="badge badge-label text-bg-primary">Primary</span>
                    <span class="badge badge-label text-bg-secondary">Secondary</span>
                    <span class="badge badge-label text-bg-success">Success</span>
                    <span class="badge badge-label text-bg-danger">Danger</span>
                    <span class="badge badge-label text-bg-warning">Warning</span>
                    <span class="badge badge-label text-bg-info">Info</span>
                    <span class="badge badge-label text-bg-light">Light</span>
                    <span class="badge badge-label text-bg-dark">Dark</span>
                </div> <!-- end card body -->
            </div>
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Square Badges</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Using the <code>.badge-square</code> to quickly create a square based badges.
                    </p>
                    <span class="badge badge-square badge-default">0</span>
                    <span class="badge badge-square text-bg-primary">1</span>
                    <span class="badge badge-square text-bg-secondary">2</span>
                    <span class="badge badge-square text-bg-success">3</span>
                    <span class="badge badge-square text-bg-danger">4</span>
                    <span class="badge badge-square text-bg-warning">5</span>
                    <span class="badge badge-square text-bg-info">6</span>
                    <span class="badge badge-square text-bg-light">7</span>
                    <span class="badge badge-square text-bg-dark">8</span>
                </div> <!-- end  card body-->
            </div>
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Circle Badges</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Using the <code>.badge-circle</code> to quickly create a circle based badges.
                    </p>
                    <span class="badge badge-circle badge-default">0</span>
                    <span class="badge badge-circle text-bg-primary">1</span>
                    <span class="badge badge-circle text-bg-secondary">2</span>
                    <span class="badge badge-circle text-bg-success">3</span>
                    <span class="badge badge-circle text-bg-danger">4</span>
                    <span class="badge badge-circle text-bg-warning">5</span>
                    <span class="badge badge-circle text-bg-info">6</span>
                    <span class="badge badge-circle text-bg-light">7</span>
                    <span class="badge badge-circle text-bg-dark">8</span>
                </div> <!-- end card body -->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Positioned</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Use utilities to modify a <code>.badge</code> and position it in the corner of a
                        link or button.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <button class="btn btn-primary position-relative" type="button">
                            Inbox
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                        <button class="btn btn-primary position-relative" type="button">
                            Profile
                            <span
                                class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </button>
                        <button class="btn btn-success" type="button">
                            Notifications <span class="badge text-bg-light ms-1">4</span>
                        </button>
                    </div>
                </div> <!-- end card body -->
            </div>
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Headings with Badges</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <h1>h1.Example heading <span class="badge text-bg-primary">New</span></h1>
                    <h2>h2.Example heading <span class="badge text-bg-primary">New</span></h2>
                    <h3>h3.Example heading <span class="badge text-bg-primary">New</span></h3>
                    <h4>h4.Example heading <span class="badge text-bg-primary">New</span></h4>
                    <h5>h5.Example heading <span class="badge text-bg-primary">New</span></h5>
                    <h6>h6.Example heading <span class="badge text-bg-primary">New</span></h6>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')
@endsection
