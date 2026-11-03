@extends('admin.layouts.vertical', ['title' => 'Theme Management'])

@section('css')

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
                    $currentColor = config('themes.default_color');
                @endphp

                @foreach ($themes as $key => $theme)
                    @php
                        $themeColors = $theme['colors'] ?? ['light'];
                    @endphp
                    <div class="col-xl-6 col-md-6 col-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-0 fs-xl">{{ $theme['name'] }}</h5>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    @foreach ($themeColors as $color)
                                        <span class="badge
                                            {{ $currentColor === $color ? 'bg-' . $color . ' text-white' : 'badge-soft-' . $color . ' text-' . $color }}
                                            fs-xxs
                                            {{ $currentColor === $color ? '' : 'opacity-50' }}">
                                            <i class="ti ti-{{ $color === 'light' ? 'sun' : 'moon' }} me-1"></i>{{ ucfirst($color) }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <img src="{{ asset('visitor/' . $key . '/img/preview_image.jpg') }}"
                                     alt="{{ $theme['name'] }} Preview"
                                     class="w-100 rounded"
                                     style="height: 320px; object-fit: cover; border-radius: calc(0.5rem - 1px);"
                                     onerror="this.src='{{ asset('visitor/antux/img/preview_image.jpg') }}';">
                            </div>
                            <div class="card-footer border-0 bg-transparent d-flex justify-content-between align-items-center px-4 py-3">
                                <a href="{{ route('configuration.view') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="ti ti-eye me-1"></i> Preview
                                </a>
                                @if ($key === $currentTheme)
                                    <button class="btn btn-success btn-sm disabled">
                                        <i class="ti ti-check me-1"></i> Activated
                                    </button>
                                @else
                                    <button class="btn btn-primary btn-sm btn-activate"
                                        data-theme="{{ $key }}"
                                        data-theme-name="{{ $theme['name'] }}"
                                        data-colors='@json($themeColors)'
                                        data-url="{{ route('configuration.update', ':theme') }}"
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
    @vite(['resources/js/pages/configuration-theme.js'])
@endsection
