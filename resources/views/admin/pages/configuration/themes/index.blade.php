@extends('admin.layouts.vertical', ['title' => 'Theme Management'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Configuration', 'title' => 'Theme Management'])

    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success border-2 d-flex align-items-center p-3 mb-2" role="alert">
                    <i class="ti ti-circle-dashed-check text-success fs-2 me-3"></i>
                    <div class="col-11">
                        <h4 class="alert-heading">Operation Successful</h4>
                        <p class="m-0">{{ session('success') }}</p>
                    </div>
                    <div class="col-1">
                        <button aria-label="Close" class="ms-auto btn btn-sm btn-success btn-icon rounded-circle"
                            data-bs-dismiss="alert" type="button">
                            <i class="ti ti-x fs-lg"></i>
                        </button>
                    </div>
                </div>
            @endif
            @if (session('error') || $errors->any())
                <div class="alert alert-danger border-2 d-flex align-items-center p-3 mb-2" role="alert">
                    <i class="ti ti-circle-dashed-x text-danger fs-2 me-3"></i>
                    <div class="col-11">
                        <h4 class="alert-heading">Operation Failed</h4>
                        @foreach ($errors->all() as $error)
                            <p class="m-0">{{ $error }}</p>
                        @endforeach
                    </div>
                    <div class="col-1">
                        <button aria-label="Close" class="ms-auto btn btn-sm btn-danger btn-icon rounded-circle"
                            data-bs-dismiss="alert" type="button">
                            <i class="ti ti-x fs-lg"></i>
                        </button>
                    </div>
                </div>
            @endif

            <div class="row">
                @php
                    $themes      = config('themes.available');
                    $currentTheme = config('themes.default_theme');
                @endphp
                @foreach ($themes as $key => $theme)
                    <div class="col-xl-6 col-md-6 col-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <!-- Left 30%: Theme Information & Features -->
                                    <div class="col-xl-3 col-md-3 border-end bg-light p-4 d-flex flex-column">
                                        <div class="mb-3">
                                            <h5 class="card-title fs-xl mb-1">{{ $theme['name'] }}</h5>
                                            <span class="badge badge-soft-primary text-primary fw-semibold">{{ $key }}</span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="fs-xxs fw-semibold text-muted text-uppercase mb-3">Features</h6>
                                            <ul class="list-unstyled theme-features">
                                                @php
                                                    $features = match($key) {
                                                        'antux' => ['Light & Dark Mode', 'GSAP Animation', 'Bootstrap 5', 'Laravel Ready'],
                                                        'dorbesh' => ['Minimal Design', 'Clean Typography', 'Fast Loading', 'Mobile First'],
                                                        'flixta' => ['Modern Layout', 'Color Accents', 'Responsive Grid', 'SEO Optimized'],
                                                        'reeni' => ['Creative Layout', 'Bold Colors', 'Interactive UI', 'Portfolio Focused'],
                                                        default => ['Responsive Design', 'Modern UI', 'Fast Performance'],
                                                    };
                                                @endphp
                                                @foreach ($features as $feature)
                                                    <li class="mb-2 d-flex align-items-start">
                                                        <i class="ti ti-check text-success fs-xl mt-1 me-2"></i>
                                                        <span class="fs-xxs">{{ $feature }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Right 70%: Theme Design Preview -->
                                    <div class="col-xl-9 col-md-9 p-4 position-relative">
                                        <div class="theme-preview h-100 d-flex align-items-center justify-content-center rounded-3 overflow-hidden"
                                             style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                                            @if (file_exists(public_path('visitor/' . $key . '/img/banner.webp')))
                                                <img src="{{ asset('visitor/' . $key . '/img/banner.webp') }}"
                                                     alt="{{ $theme['name'] }} Preview"
                                                     class="img-fluid w-100 h-100 object-fit-cover rounded-3"
                                                     style="height: 200px;">
                                            @elseif (file_exists(public_path('visitor/' . $key . '/img/preview_image.jpg')))
                                                <img src="{{ asset('visitor/' . $key . '/img/preview_image.jpg') }}"
                                                     alt="{{ $theme['name'] }} Preview"
                                                     class="img-fluid w-100 h-100 object-fit-cover rounded-3"
                                                     style="height: 200px;">
                                            @else
                                                <div class="text-center p-4">
                                                    <i class="ti ti-layout text-muted fs-xl mb-3"></i>
                                                    <p class="text-muted fs-xxs mb-0">Preview not available</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-0 bg-transparent d-flex justify-content-between align-items-center px-4 py-3">
                                <a href="{{ route('configuration.view') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="ti ti-eye me-1"></i> Preview
                                </a>
                                @if ($key === $currentTheme)
                                    <button class="btn btn-success btn-sm disabled">
                                        <i class="ti ti-check me-1"></i> Active
                                    </button>
                                @else
                                    <button class="btn btn-primary btn-sm btn-activate"
                                        data-theme="{{ $key }}"
                                        data-theme-name="{{ $theme['name'] }}">
                                        <i class="ti ti-check me-1"></i> Activate
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.btn-activate').forEach(button => {
                button.addEventListener('click', function() {
                    const theme    = this.getAttribute('data-theme');
                    const themeName = this.getAttribute('data-theme-name');

                    Swal.fire({
                        title: 'Activate ' + themeName + '?',
                        text: "This will change the visitor-facing theme for the entire site.",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#198754',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, activate it!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('configuration.update', ':theme') }}"
                                .replace(':theme', theme);
                        }
                    });
                });
            });
        });
    </script>
@endsection
