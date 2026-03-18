@extends('layouts.vertical', ['title' => 'Tour'])

@section('css')
@vite(['node_modules/@sjmc11/tourguidejs/dist/css/tour.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Miscellaneous', 'title' => 'Tour'])

    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="text-center mt-4 mb-5">
                <div class="auth-brand text-center mb-4">
                    <a class="logo-dark" href="{{ route('second', ['dashboard', 'index']) }}">
                        <img alt="dark logo" height="32" src="/images/logo-black.png" />
                    </a>
                    <a class="logo-light" href="{{ route('second', ['dashboard', 'index']) }}">
                        <img alt="logo" height="32" src="/images/logo.png" />
                    </a>
                </div>
                <h5 class="fs-lg mb-2">Versatile &amp; Scalable Admin Panel Template</h5>
                <p class="text-muted fs-sm">
                    Build modern web applications faster with our feature-rich admin panel. Compatible with multiple
                    frameworks and packed with diverse demos, it offers seamless customization and a consistent UI across
                    all your projects.
                </p>
                <!-- Buttons -->
                <div class="d-flex justify-content-center mt-4 flex-wrap gap-2">
                    <button class="btn btn-primary" id="tourTrigger" onclick="startTour()">
                        <i class="ti ti-player-play me-1"></i> Start Guided Tour
                    </button>
                    <a class="btn btn-dark" data-tg-order="1" data-tg-title="Getting Started"
                        data-tg-tour="Click here to get started and explore our framework-rich admin panel. 🚀"
                        href="#">
                        <i class="ti ti-compass me-1"></i> Discover Features
                    </a>
                    <a class="btn btn-danger" data-tg-order="2" data-tg-title="Buy Now"
                        data-tg-tour="Ready to supercharge your project? Click here to purchase the template!"
                        href="#!">
                        <i class="ti ti-shopping-cart me-1"></i> Get the Template
                    </a>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <div class="container" data-tg-order="3" data-tg-title="Core Features"
        data-tg-tour="Learn more about the versatile services and modules we provide to enhance development.">
        <div class="row">
            <div class="col-xl-3">
                <div class="card border-0 p-2 card-h-100">
                    <div class="card-body pb-0">
                        <div class="avatar-xl mb-3">
                            <span class="avatar-title text-bg-secondary rounded-circle fs-22">
                                <i class="ti ti-device-desktop"></i>
                            </span>
                        </div>
                        <h4 class="fw-semibold mb-2">Multiple Frameworks</h4>
                        <p class="text-muted mb-3">Support for Bootstrap, Tailwind, React, Vue, Angular, Laravel, and more —
                            use what suits your stack.</p>
                    </div>
                    <div class="card-footer border-0 pt-0">
                        <a class="link-primary fw-semibold" href="#">Know more<i
                                class="ti ti-arrow-right ms-2 align-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card border-0 p-2 card-h-100">
                    <div class="card-body pb-0">
                        <div class="avatar-xl mb-3">
                            <span class="avatar-title text-bg-secondary rounded-circle fs-22">
                                <i class="ti ti-layout"></i>
                            </span>
                        </div>
                        <h4 class="fw-semibold mb-2">Multiple Demos</h4>
                        <p class="text-muted mb-3">Choose from a variety of pre-built demos to match your use case — from
                            CRM to SaaS dashboards.</p>
                    </div>
                    <div class="card-footer border-0 pt-0">
                        <a class="link-primary fw-semibold" href="#">Know more<i
                                class="ti ti-arrow-right ms-2 align-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card border-0 p-2 card-h-100">
                    <div class="card-body pb-0">
                        <div class="avatar-xl mb-3">
                            <span class="avatar-title text-bg-secondary rounded-circle fs-22">
                                <i class="ti ti-brush"></i>
                            </span>
                        </div>
                        <h4 class="fw-semibold mb-2">Customizable UI</h4>
                        <p class="text-muted mb-3">Easily tailor colors, layouts, and components to match your branding and
                            requirements.</p>
                    </div>
                    <div class="card-footer border-0 pt-0">
                        <a class="link-primary fw-semibold" href="#">Know more<i
                                class="ti ti-arrow-right ms-2 align-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card border-0 p-2 card-h-100">
                    <div class="card-body pb-0">
                        <div class="avatar-xl mb-3">
                            <span class="avatar-title text-bg-secondary rounded-circle fs-22">
                                <i class="ti ti-rocket"></i>
                            </span>
                        </div>
                        <h4 class="fw-semibold mb-2">High Performance</h4>
                        <p class="text-muted mb-3">Optimized for speed and efficiency, our admin panel ensures a seamless
                            experience for developers and users alike.</p>
                    </div>
                    <div class="card-footer border-0 pt-0">
                        <a class="link-primary fw-semibold" href="#">Know more<i
                                class="ti ti-arrow-right ms-2 align-middle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
@endsection

@section('scripts')
    @vite(['resources/js/pages/misc-tour.js'])
@endsection
