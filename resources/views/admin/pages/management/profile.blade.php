@extends('admin.layouts.vertical', ['title' => 'Profile Management'])

@section('css')
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Settings', 'title' => 'Portfolio Profile Management'])

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="d-flex">
                <div>
                    <h6 class="alert-heading">Error!</h6>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="d-flex">
                <div>
                    <h6 class="alert-heading">Success!</h6>
                    <p class="mb-0">{{ session('success') }}</p>
                </div>
            </div>
            <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-3">
            <!-- Profile Info Card -->
            <div class="card card-top-sticky mb-3">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img alt="Portfolio" class="rounded-circle" height="80" src="/images/portfolios/portfolio-default.jpg" width="80" />
                    </div>
                    <h5 class="card-title">Portfolio Profile</h5>
                    <p class="text-muted mb-3">Manage portfolio information displayed on your website.</p>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-sm" data-bs-target="#categoryNav" data-bs-toggle="pill" type="button">
                            View All Sections
                        </button>
                    </div>
                    <hr class="my-3" />
                    <div class="text-start">
                        <h6 class="mb-2 fw-bold text-uppercase fs-xs">Quick Links</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a class="text-decoration-none nav-link-tab" data-category="basic" href="#basicInfo">
                                    <i class="ti ti-user me-2"></i> Basic Info
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="text-decoration-none nav-link-tab" data-category="personal" href="#personalInfo">
                                    <i class="ti ti-user-circle me-2"></i> Personal Info
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="text-decoration-none nav-link-tab" data-category="address" href="#addressInfo">
                                    <i class="ti ti-map-pin me-2"></i> Address
                                </a>
                            </li>
                            <li>
                                <a class="text-decoration-none nav-link-tab" data-category="social" href="#socialInfo">
                                    <i class="ti ti-world me-2"></i> Social Links
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-9">
            <!-- Profile Information Form -->
            <form action="{{ route('management.settings.profile.update') }}" method="POST">
                @csrf

                <!-- Basic Information Section -->
                <div class="card mb-3">
                    <div class="card-header bg-light-subtle border-bottom">
                        <h5 class="card-title mb-0">
                            <i class="ti ti-user me-2"></i> Basic Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            @foreach ($profileData['basic'] ?? [] as $field)
                                <div class="col-md-6">
                                    <label class="form-label text-capitalize">
                                        {{ str_replace('_', ' ', $field['column_name']) }}
                                    </label>
                                    @if (in_array($field['column_name'], ['bio', 'about', 'description']))
                                        <textarea 
                                            class="form-control" 
                                            name="basic[{{ $field['id'] }}]"
                                            placeholder="Enter {{ str_replace('_', ' ', $field['column_name']) }}"
                                            rows="3">{{ $field['column_value'] }}</textarea>
                                    @else
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="basic[{{ $field['id'] }}]"
                                            placeholder="Enter {{ str_replace('_', ' ', $field['column_name']) }}"
                                            value="{{ $field['column_value'] }}" />
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Personal Information Section -->
                <div class="card mb-3">
                    <div class="card-header bg-light-subtle border-bottom">
                        <h5 class="card-title mb-0">
                            <i class="ti ti-user-circle me-2"></i> Personal Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            @foreach ($profileData['personal'] ?? [] as $field)
                                <div class="col-md-6">
                                    <label class="form-label text-capitalize">
                                        {{ str_replace('_', ' ', $field['column_name']) }}
                                    </label>
                                    @if (in_array($field['column_name'], ['date_of_birth', 'birthday']))
                                        <input 
                                            type="date" 
                                            class="form-control" 
                                            name="personal[{{ $field['id'] }}]"
                                            value="{{ $field['column_value'] }}" />
                                    @elseif (in_array($field['column_name'], ['bio', 'about', 'description']))
                                        <textarea 
                                            class="form-control" 
                                            name="personal[{{ $field['id'] }}]"
                                            placeholder="Enter {{ str_replace('_', ' ', $field['column_name']) }}"
                                            rows="3">{{ $field['column_value'] }}</textarea>
                                    @else
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="personal[{{ $field['id'] }}]"
                                            placeholder="Enter {{ str_replace('_', ' ', $field['column_name']) }}"
                                            value="{{ $field['column_value'] }}" />
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Address Information Section -->
                <div class="card mb-3">
                    <div class="card-header bg-light-subtle border-bottom">
                        <h5 class="card-title mb-0">
                            <i class="ti ti-map-pin me-2"></i> Address Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            @foreach ($profileData['address'] ?? [] as $field)
                                <div class="col-md-6">
                                    <label class="form-label text-capitalize">
                                        {{ str_replace('_', ' ', $field['column_name']) }}
                                    </label>
                                    @if (in_array($field['column_name'], ['bio', 'about', 'description']))
                                        <textarea 
                                            class="form-control" 
                                            name="address[{{ $field['id'] }}]"
                                            placeholder="Enter {{ str_replace('_', ' ', $field['column_name']) }}"
                                            rows="3">{{ $field['column_value'] }}</textarea>
                                    @else
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="address[{{ $field['id'] }}]"
                                            placeholder="Enter {{ str_replace('_', ' ', $field['column_name']) }}"
                                            value="{{ $field['column_value'] }}" />
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Social Information Section -->
                <div class="card mb-3">
                    <div class="card-header bg-light-subtle border-bottom">
                        <h5 class="card-title mb-0">
                            <i class="ti ti-world me-2"></i> Social Links
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            @foreach ($profileData['social'] ?? [] as $field)
                                <div class="col-md-6">
                                    <label class="form-label text-capitalize">
                                        {{ str_replace('_', ' ', $field['column_name']) }}
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="ti ti-link"></i>
                                        </span>
                                        <input 
                                            type="url" 
                                            class="form-control" 
                                            name="social[{{ $field['id'] }}]"
                                            placeholder="https://example.com"
                                            value="{{ $field['column_value'] }}" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto ms-auto">
                                <button class="btn btn-light" type="reset">
                                    <i class="ti ti-rotate-clockwise me-1"></i> Reset
                                </button>
                                <button class="btn btn-primary ms-2" type="submit">
                                    <i class="ti ti-device-floppy me-1"></i> Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle quick link navigation
        document.querySelectorAll('.nav-link-tab').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const target = this.getAttribute('href');
                const element = document.querySelector(target);
                if (element) {
                    element.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    element.classList.add('border-primary');
                    setTimeout(() => {
                        element.classList.remove('border-primary');
                    }, 2000);
                }
            });
        });
    });
</script>
@endsection
