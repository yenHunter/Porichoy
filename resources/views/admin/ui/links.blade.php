@extends('layouts.vertical', ['title' => 'Links'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Links'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Colored Links</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">You can use the <code>.link-*</code> classes to colorize links. Unlike the <a
                            href="{{ route('second', ['ui', 'utilities']) }}"><code>.text-*</code> classes</a>, these
                        classes have a <code>:hover</code> and <code>:focus</code> state. Some of the link styles use a
                        relatively light foreground color, and should only be used on a dark background in order to have
                        sufficient contrast.</p>
                    <p><a class="link-primary" href="#">Primary link</a></p>
                    <p><a class="link-secondary" href="#">Secondary link</a></p>
                    <p><a class="link-success" href="#">Success link</a></p>
                    <p><a class="link-danger" href="#">Danger link</a></p>
                    <p><a class="link-warning" href="#">Warning link</a></p>
                    <p><a class="link-info" href="#">Info link</a></p>
                    <p><a class="link-light" href="#">Light link</a></p>
                    <p><a class="link-dark" href="#">Dark link</a></p>
                    <p class="mb-0"><a class="link-body-emphasis" href="#">Emphasis link</a></p>
                </div><!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Link Utilities</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted"><a href="{{ route('second', ['ui', 'utilities']) }}">Colored link helpers</a> have
                        been updated to pair with our link utilities. Use the new utilities to modify the link opacity,
                        underline opacity, and underline offset.</p>
                    <p><a class="link-primary text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                            href="#">Primary link</a></p>
                    <p><a class="link-secondary text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                            href="#">Secondary link</a></p>
                    <p><a class="link-success text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                            href="#">Success link</a></p>
                    <p><a class="link-danger text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                            href="#">Danger link</a></p>
                    <p><a class="link-warning text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                            href="#">Warning link</a></p>
                    <p><a class="link-info text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                            href="#">Info link</a></p>
                    <p><a class="link-light text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                            href="#">Light link</a></p>
                    <p><a class="link-dark text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                            href="#">Dark link</a></p>
                    <p><a class="link-body-emphasis text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover"
                            href="#">Emphasis link</a></p>
                </div><!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Link Opacity</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Change the alpha opacity of the link <code>rgba()</code> color value with
                        utilities. Please be aware that changes to a color’s opacity can lead to links with
                        <em>insufficient</em> contrast.</p>
                    <p><a class="link-opacity-10" href="#">Link opacity 10</a></p>
                    <p><a class="link-opacity-25" href="#">Link opacity 25</a></p>
                    <p><a class="link-opacity-50" href="#">Link opacity 50</a></p>
                    <p><a class="link-opacity-75" href="#">Link opacity 75</a></p>
                    <p class="mb-0"><a class="link-opacity-100" href="#">Link opacity 100</a></p>
                </div><!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Link Hover Opacity</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">You can even change the opacity level on hover.</p>
                    <p><a class="link-opacity-10-hover" href="#">Link hover opacity 10</a></p>
                    <p><a class="link-opacity-25-hover" href="#">Link hover opacity 25</a></p>
                    <p><a class="link-opacity-50-hover" href="#">Link hover opacity 50</a></p>
                    <p><a class="link-opacity-75-hover" href="#">Link hover opacity 75</a></p>
                    <p class="mb-0"><a class="link-opacity-100-hover" href="#">Link hover opacity 100</a></p>
                </div><!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Underline Color</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Change the underline’s color independent of the link text color.</p>
                    <p><a class="text-decoration-underline link-underline-primary" href="#">Primary underline</a>
                    </p>
                    <p><a class="text-decoration-underline link-underline-secondary" href="#">Secondary
                            underline</a></p>
                    <p><a class="text-decoration-underline link-underline-success" href="#">Success underline</a>
                    </p>
                    <p><a class="text-decoration-underline link-underline-danger" href="#">Danger underline</a></p>
                    <p><a class="text-decoration-underline link-underline-warning" href="#">Warning underline</a>
                    </p>
                    <p><a class="text-decoration-underline link-underline-info" href="#">Info underline</a></p>
                    <p><a class="text-decoration-underline link-underline-light" href="#">Light underline</a></p>
                    <p class="mb-0"><a class="text-decoration-underline link-underline-dark" href="#">Dark
                            underline</a></p>
                </div><!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Underline Opacity</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Change the underline’s opacity. Requires adding <code>.link-underline</code> to
                        first set an <code>rgba()</code> color we use to then modify the alpha opacity.</p>
                    <p><a class="text-decoration-underline link-offset-2 link-underline link-underline-opacity-0"
                            href="#">Underline opacity 0</a></p>
                    <p><a class="text-decoration-underline link-offset-2 link-underline link-underline-opacity-10"
                            href="#">Underline opacity 10</a></p>
                    <p><a class="text-decoration-underline link-offset-2 link-underline link-underline-opacity-25"
                            href="#">Underline opacity 25</a></p>
                    <p><a class="text-decoration-underline link-offset-2 link-underline link-underline-opacity-50"
                            href="#">Underline opacity 50</a></p>
                    <p><a class="text-decoration-underline link-offset-2 link-underline link-underline-opacity-75"
                            href="#">Underline opacity 75</a></p>
                    <p class="mb-0"><a
                            class="text-decoration-underline link-offset-2 link-underline link-underline-opacity-100"
                            href="#">Underline opacity 100</a></p>
                </div><!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Underline Offset</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Change the underline’s opacity. Requires adding <code>.link-underline</code> to
                        first set an <code>rgba()</code> color we use to then modify the alpha opacity.</p>
                    <p><a href="#">Default link</a></p>
                    <p><a class="text-decoration-underline link-offset-1" href="#">Offset 1 link</a></p>
                    <p><a class="text-decoration-underline link-offset-2" href="#">Offset 2 link</a></p>
                    <p class="mb-0"><a class="text-decoration-underline link-offset-3" href="#">Offset 3 link</a>
                    </p>
                </div><!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Hover Variants</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Just like the <code>.link-opacity-*-hover</code> utilities,
                        <code>.link-offset</code> and <code>.link-underline-opacity</code> utilities include
                        <code>:hover</code> variants by default. Mix and match to create unique link styles.</p>
                    <a class="link-offset-2 link-offset-3-hover text-decoration-underline link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="#">
                        Underline opacity 0
                    </a>
                </div><!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div><!--end row-->
@endsection

@section('scripts')
@endsection
