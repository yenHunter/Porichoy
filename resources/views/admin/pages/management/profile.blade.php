@extends('admin.layouts.vertical', ['title' => 'Profile'])

@section('css')
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Users', 'title' => 'Profile'])
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="me-3 position-relative">
                            @php
                                $profilePicPath = $profile_data['basic']['profile_picture']['column_value'] ?? '/images/users/user-1.jpg';
                                // Check if it's a storage path
                                if (str_starts_with($profilePicPath, 'uploads/profile/')) {
                                    $imgSrc = \Illuminate\Support\Facades\Storage::url($profilePicPath);
                                } else {
                                    $imgSrc = asset($profilePicPath);
                                }
                            @endphp
                            <img alt="avatar" class="rounded-circle" height="72" width="72" src="{{ $imgSrc }}" />
                        </div>
                        <div>
                            <h5 class="mb-0 d-flex align-items-center">
                                <a class="link-reset"
                                    href="#!">{{ $profile_data['basic']['first_name']['column_value'] ?? 'Geneva' }}
                                    {{ $profile_data['basic']['last_name']['column_value'] ?? 'Lee' }}</a>
                                <img alt="BD" class="ms-2 rounded-circle" height="16"
                                    src="{{ asset($profile_data['basic']['country_flag']['column_value']) ?? '/images/flags/bd.svg' }}" />
                            </h5>
                            <p class="text-muted mb-0">
                                {{ $profile_data['basic']['headline']['column_value'] ?? 'Senior Developer' }}</p>
                        </div>
                        <div class="ms-auto">
                            <div class="dropdown">
                                <a class="btn btn-icon btn-ghost-light text-muted" data-bs-toggle="dropdown" href="#">
                                    <i class="ti ti-dots-vertical fs-xl"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                    <li><a class="dropdown-item text-danger" href="#">Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <div
                                class="avatar-sm text-bg-light bg-opacity-75 d-flex align-items-center justify-content-center rounded-circle">
                                <i class="ti ti-briefcase fs-xl"></i>
                            </div>
                            <p class="mb-0 fs-sm">Works at
                                <span class="text-dark fw-semibold">
                                    {{ $profile_data['experience']['employment_organization'] ?? 'Government of Bangladesh' }}
                                </span>
                            </p>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <div
                                class="avatar-sm text-bg-light bg-opacity-75 d-flex align-items-center justify-content-center rounded-circle">
                                <i class="ti ti-school fs-xl"></i>
                            </div>
                            <p class="mb-0 fs-sm">Studied at
                                <span class="text-dark fw-semibold">
                                    {{ $profile_data['education']['education_institute'] ?? 'University of Rajshahi' }}
                                </span>
                            </p>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <div
                                class="avatar-sm text-bg-light bg-opacity-75 d-flex align-items-center justify-content-center rounded-circle">
                                <i class="ti ti-map-pin fs-xl"></i>
                            </div>
                            <p class="mb-0 fs-sm">Lives in
                                <span class="text-dark fw-semibold">
                                    {{ ($profile_data['present_address']['present_city']['column_value'] ?? '') . ', ' . ($profile_data['present_address']['present_country']['column_value'] ?? '') ?: 'San Francisco, CA' }}
                                </span>
                            </p>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <div
                                class="avatar-sm text-bg-light bg-opacity-75 d-flex align-items-center justify-content-center rounded-circle">
                                <i class="ti ti-users fs-xl"></i>
                            </div>
                            <p class="mb-0 fs-sm">Followed by
                                <span class="text-dark fw-semibold">
                                    25.3k People
                                </span>
                            </p>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <div
                                class="avatar-sm text-bg-light bg-opacity-75 d-flex align-items-center justify-content-center rounded-circle">
                                <i class="ti ti-mail fs-xl"></i>
                            </div>
                            <p class="mb-0 fs-sm">Email
                                <a class="text-primary fw-semibold"
                                    href="mailto:{{ $profile_data['basic']['email']['column_value'] ?? 'hello@example.com' }}">
                                    {{ $profile_data['basic']['email']['column_value'] ?? 'hello@example.com' }}
                                </a>
                            </p>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <div
                                class="avatar-sm text-bg-light bg-opacity-75 d-flex align-items-center justify-content-center rounded-circle">
                                <i class="ti ti-link fs-xl"></i>
                            </div>
                            <p class="mb-0 fs-sm">Website
                                <a class="text-primary fw-semibold"
                                    href="{{ $profile_data['basic']['website']['column_value'] ?? 'https://www.example.dev' }}"
                                    target="_blank">
                                    {{ $profile_data['basic']['website']['column_value'] ?? 'www.example.dev' }}
                                </a>
                            </p>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <div
                                class="avatar-sm text-bg-light bg-opacity-75 d-flex align-items-center justify-content-center rounded-circle">
                                <i class="ti ti-world fs-xl"></i>
                            </div>
                            <p class="mb-0 fs-sm">Languages
                                <span class="text-dark fw-semibold">
                                    {{ $profile_data['personal']['languages']['column_value'] ?? 'English, Hindi, Japanese' }}
                                </span>
                            </p>
                        </div>
                        <div class="d-flex justify-content-center gap-2 mt-4 mb-2">
                            <a href="{{ $profile_data['social']['facebook']['column_value'] ?? '#' }}" target="_blank">
                                <img src="{{ asset('static/social/facebook.png') }}" alt="Facebook" width="36" />
                            </a>
                            <a href="{{ $profile_data['social']['twitter']['column_value'] ?? '#' }}" target="_blank">
                                <img src="{{ asset('static/social/twitter.png') }}" alt="Twitter" width="36" />
                            </a>
                            <a href="{{ $profile_data['social']['instagram']['column_value'] ?? '#' }}" target="_blank">
                                <img src="{{ asset('static/social/instagram.png') }}" alt="Instagram" width="36" />
                            </a>
                            <a href="{{ $profile_data['social']['whatsapp']['column_value'] ?? '#' }}" target="_blank">
                                <img src="{{ asset('static/social/whatsapp.png') }}" alt="WhatsApp" width="36" />
                            </a>
                            <a href="{{ $profile_data['social']['linkedin']['column_value'] ?? '#' }}" target="_blank">
                                <img src="{{ asset('static/social/linkedin.png') }}" alt="LinkedIn" width="36" />
                            </a>
                            <a href="{{ $profile_data['social']['youtube']['column_value'] ?? '#' }}" target="_blank">
                                <img src="{{ asset('static/social/youtube.png') }}" alt="YouTube" width="36" />
                            </a>
                            <a href="{{ $profile_data['social']['github']['column_value'] ?? '#' }}" target="_blank">
                                <img src="{{ asset('static/social/github.png') }}" alt="GitHub" width="36" />
                            </a>
                            <a href="{{ $profile_data['social']['researchgate']['column_value'] ?? '#' }}"
                                target="_blank">
                                <img src="{{ asset('static/social/researchgate.png') }}" alt="ResearchGate"
                                    width="36" />
                            </a>
                        </div>
                    </div> <!-- -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header card-tabs d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h4 class="card-title">My Account</h4>
                    </div>
                    <ul class="nav nav-tabs card-header-tabs nav-bordered">
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link active" data-bs-toggle="tab" href="#basic-info">
                                <i class="ti ti-home d-md-none d-block"></i>
                                <span class="d-none d-md-block fw-bold">Basic</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#personal-info">
                                <i class="ti ti-home d-md-none d-block"></i>
                                <span class="d-none d-md-block fw-bold">Personal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="true" class="nav-link" data-bs-toggle="tab" href="#address-info">
                                <i class="ti ti-user-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block fw-bold">Address</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#social-info">
                                <i class="ti ti-settings d-md-none d-block"></i>
                                <span class="d-none d-md-block fw-bold">Social</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="basic-info">
                            <form action="{{ route('management.settings.profile.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- First Name and Last Name Row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="firstname">First Name</label>
                                            <input
                                                class="form-control @error('basic.' . $profile_data['basic']['first_name']['id']) is-invalid @enderror"
                                                id="firstname"
                                                name="basic[{{ $profile_data['basic']['first_name']['id'] }}]"
                                                placeholder="Enter first name" type="text"
                                                value="{{ $profile_data['basic']['first_name']['column_value'] ?? '' }}" />
                                            @error('basic.' . $profile_data['basic']['first_name']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="lastname">Last Name</label>
                                            <input
                                                class="form-control @error('basic.' . $profile_data['basic']['last_name']['id']) is-invalid @enderror"
                                                id="lastname"
                                                name="basic[{{ $profile_data['basic']['last_name']['id'] }}]"
                                                placeholder="Enter last name" type="text"
                                                value="{{ $profile_data['basic']['last_name']['column_value'] ?? '' }}" />
                                            @error('basic.' . $profile_data['basic']['last_name']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Professional Headline --}}
                                <div class="mb-3">
                                    <label class="form-label" for="headline">Professional Headline</label>
                                    <input
                                        class="form-control @error('basic.' . $profile_data['basic']['headline']['id']) is-invalid @enderror"
                                        id="headline" name="basic[{{ $profile_data['basic']['headline']['id'] }}]"
                                        placeholder="e.g. Senior Developer, UI Designer" type="text"
                                        value="{{ $profile_data['basic']['headline']['column_value'] ?? '' }}" />
                                    @error('basic.' . $profile_data['basic']['headline']['id'])
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Email and Phone Row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email Address</label>
                                            <input
                                                class="form-control @error('basic.' . $profile_data['basic']['email']['id']) is-invalid @enderror"
                                                id="email" name="basic[{{ $profile_data['basic']['email']['id'] }}]"
                                                placeholder="Enter email address" type="email"
                                                value="{{ $profile_data['basic']['email']['column_value'] ?? '' }}" />
                                            @error('basic.' . $profile_data['basic']['email']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="phone">Phone Number</label>
                                            <input
                                                class="form-control @error('basic.' . $profile_data['basic']['phone']['id']) is-invalid @enderror"
                                                id="phone" name="basic[{{ $profile_data['basic']['phone']['id'] }}]"
                                                placeholder="Enter phone number" type="tel"
                                                value="{{ $profile_data['basic']['phone']['column_value'] ?? '' }}" />
                                            @error('basic.' . $profile_data['basic']['phone']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Website --}}
                                <div class="mb-3">
                                    <label class="form-label" for="website">Website</label>
                                    <input
                                        class="form-control @error('basic.' . $profile_data['basic']['website']['id']) is-invalid @enderror"
                                        id="website" name="basic[{{ $profile_data['basic']['website']['id'] }}]"
                                        placeholder="https://www.example.com" type="url"
                                        value="{{ $profile_data['basic']['website']['column_value'] ?? '' }}" />
                                    @error('basic.' . $profile_data['basic']['website']['id'])
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Country Flag --}}
                                <div class="mb-3">
                                    <label class="form-label" for="countryFlag">Country Flag</label>
                                    <div class="d-flex gap-2 align-items-center">
                                        <select
                                            class="form-select @error('basic.' . $profile_data['basic']['country_flag']['id']) is-invalid @enderror"
                                            id="countryFlag"
                                            name="basic[{{ $profile_data['basic']['country_flag']['id'] }}]">
                                            <option value="">-- Select a country --</option>
                                            @foreach($available_flags as $flag)
                                                <option value="{{ $flag['path'] }}"
                                                    @selected($profile_data['basic']['country_flag']['column_value'] === $flag['path'])>
                                                    {{ $flag['name'] }} ({{ strtoupper($flag['code']) }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($profile_data['basic']['country_flag']['column_value'])
                                            <img src="{{ asset($profile_data['basic']['country_flag']['column_value']) }}"
                                                alt="Flag Preview" height="24" class="rounded" />
                                        @endif
                                    </div>
                                    @error('basic.' . $profile_data['basic']['country_flag']['id'])
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Bio --}}
                                <div class="mb-3">
                                    <label class="form-label" for="bio">Bio</label>
                                    <textarea class="form-control @error('basic.' . $profile_data['basic']['bio']['id']) is-invalid @enderror"
                                        id="bio" name="basic[{{ $profile_data['basic']['bio']['id'] }}]"
                                        placeholder="Write something about yourself..." rows="4">{{ $profile_data['basic']['bio']['column_value'] ?? '' }}</textarea>
                                    @error('basic.' . $profile_data['basic']['bio']['id'])
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Profile Photo --}}
                                <div class="mb-4">
                                    <label class="form-label" for="profilephoto">
                                        Profile Photo
                                        <code>(Transparent Background)</code>
                                    </label>
                                    <div class="mb-2">
                                        @if ($profile_data['basic']['profile_picture']['column_value'])
                                            @php
                                                $profilePicPath = $profile_data['basic']['profile_picture']['column_value'];
                                                if (str_starts_with($profilePicPath, 'uploads/profile/')) {
                                                    $imgSrc = \Illuminate\Support\Facades\Storage::url($profilePicPath);
                                                } else {
                                                    $imgSrc = asset($profilePicPath);
                                                }
                                            @endphp
                                            <img src="{{ $imgSrc }}"
                                                alt="Current Profile Picture" class="rounded-circle" width="80" height="80" />
                                        @endif
                                    </div>
                                    <input
                                        class="form-control @error('basic.' . $profile_data['basic']['profile_picture']['id']) is-invalid @enderror"
                                        id="profilephoto"
                                        name="basic[{{ $profile_data['basic']['profile_picture']['id'] }}]"
                                        type="file" accept="image/*" />
                                    <small class="form-text text-muted">Accepted formats: JPG, PNG, GIF, WebP (Max:
                                        5MB)</small>
                                    @error('basic.' . $profile_data['basic']['profile_picture']['id'])
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Submit Button --}}
                                <div class="text-end mt-4">
                                    <button class="btn btn-success" type="submit">
                                        <i class="ti ti-device-floppy me-1"></i> Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="personal-info">
                            <form action="{{ route('management.settings.profile.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                
                                {{-- Father's Name and Mother's Name Row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="fatherName">Father's Name</label>
                                            <input
                                                class="form-control @error('personal.' . $profile_data['personal']['father_name']['id']) is-invalid @enderror"
                                                id="fatherName"
                                                name="personal[{{ $profile_data['personal']['father_name']['id'] }}]"
                                                placeholder="Enter father's name" type="text"
                                                value="{{ $profile_data['personal']['father_name']['column_value'] ?? '' }}" />
                                            @error('personal.' . $profile_data['personal']['father_name']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="motherName">Mother's Name</label>
                                            <input
                                                class="form-control @error('personal.' . $profile_data['personal']['mother_name']['id']) is-invalid @enderror"
                                                id="motherName"
                                                name="personal[{{ $profile_data['personal']['mother_name']['id'] }}]"
                                                placeholder="Enter mother's name" type="text"
                                                value="{{ $profile_data['personal']['mother_name']['column_value'] ?? '' }}" />
                                            @error('personal.' . $profile_data['personal']['mother_name']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Date of Birth --}}
                                <div class="mb-3">
                                    <label class="form-label" for="dateOfBirth">Date of Birth</label>
                                    <input
                                        class="form-control @error('personal.' . $profile_data['personal']['date_of_birth']['id']) is-invalid @enderror"
                                        id="dateOfBirth"
                                        name="personal[{{ $profile_data['personal']['date_of_birth']['id'] }}]"
                                        type="date"
                                        value="{{ $profile_data['personal']['date_of_birth']['column_value'] ?? '' }}" />
                                    @error('personal.' . $profile_data['personal']['date_of_birth']['id'])
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Nationality and Gender Row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="nationality">Nationality</label>
                                            <input
                                                class="form-control @error('personal.' . $profile_data['personal']['nationality']['id']) is-invalid @enderror"
                                                id="nationality"
                                                name="personal[{{ $profile_data['personal']['nationality']['id'] }}]"
                                                placeholder="Enter nationality" type="text"
                                                value="{{ $profile_data['personal']['nationality']['column_value'] ?? '' }}" />
                                            @error('personal.' . $profile_data['personal']['nationality']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="gender">Gender</label>
                                            <select
                                                class="form-select @error('personal.' . $profile_data['personal']['gender']['id']) is-invalid @enderror"
                                                id="gender"
                                                name="personal[{{ $profile_data['personal']['gender']['id'] }}]">
                                                <option value="">-- Select Gender --</option>
                                                <option value="Male" @selected($profile_data['personal']['gender']['column_value'] === 'Male')>Male</option>
                                                <option value="Female" @selected($profile_data['personal']['gender']['column_value'] === 'Female')>Female</option>
                                                <option value="Other" @selected($profile_data['personal']['gender']['column_value'] === 'Other')>Other</option>
                                            </select>
                                            @error('personal.' . $profile_data['personal']['gender']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Marital Status and Spouse Name Row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="maritalStatus">Marital Status</label>
                                            <select
                                                class="form-select @error('personal.' . $profile_data['personal']['marital_status']['id']) is-invalid @enderror"
                                                id="maritalStatus"
                                                name="personal[{{ $profile_data['personal']['marital_status']['id'] }}]">
                                                <option value="">-- Select Status --</option>
                                                <option value="Single" @selected($profile_data['personal']['marital_status']['column_value'] === 'Single')>Single</option>
                                                <option value="Married" @selected($profile_data['personal']['marital_status']['column_value'] === 'Married')>Married</option>
                                                <option value="Divorced" @selected($profile_data['personal']['marital_status']['column_value'] === 'Divorced')>Divorced</option>
                                                <option value="Widowed" @selected($profile_data['personal']['marital_status']['column_value'] === 'Widowed')>Widowed</option>
                                            </select>
                                            @error('personal.' . $profile_data['personal']['marital_status']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="spouseName">Spouse Name</label>
                                            <input
                                                class="form-control @error('personal.' . $profile_data['personal']['spouse_name']['id']) is-invalid @enderror"
                                                id="spouseName"
                                                name="personal[{{ $profile_data['personal']['spouse_name']['id'] }}]"
                                                placeholder="Enter spouse name (if married)" type="text"
                                                value="{{ $profile_data['personal']['spouse_name']['column_value'] ?? '' }}" />
                                            @error('personal.' . $profile_data['personal']['spouse_name']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Languages --}}
                                <div class="mb-3">
                                    <label class="form-label" for="languages">Languages</label>
                                    <input
                                        class="form-control @error('personal.' . $profile_data['personal']['languages']['id']) is-invalid @enderror"
                                        id="languages"
                                        name="personal[{{ $profile_data['personal']['languages']['id'] }}]"
                                        placeholder="e.g. English, Bengali, Hindi" type="text"
                                        value="{{ $profile_data['personal']['languages']['column_value'] ?? '' }}" />
                                    <small class="form-text text-muted">Separate languages with commas</small>
                                    @error('personal.' . $profile_data['personal']['languages']['id'])
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Submit Button --}}
                                <div class="text-end mt-4">
                                    <button class="btn btn-success" type="submit">
                                        <i class="ti ti-device-floppy me-1"></i> Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- end Personal Info data-->
                        <div class="tab-pane" id="address-info">
                            <form action="{{ route('management.settings.profile.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                
                                <!-- Present Address Section -->
                                <h5 class="mb-3 fw-semibold">Present Address</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Street Address</label>
                                        <input type="text" class="form-control" name="present_address[{{ $profile_data['present_address']['present_street_address']['id'] ?? '' }}]"
                                            value="{{ $profile_data['present_address']['present_street_address']['column_value'] ?? '' }}" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" name="present_address[{{ $profile_data['present_address']['present_city']['id'] ?? '' }}]"
                                            value="{{ $profile_data['present_address']['present_city']['column_value'] ?? '' }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">State/Province</label>
                                        <input type="text" class="form-control" name="present_address[{{ $profile_data['present_address']['present_state_province']['id'] ?? '' }}]"
                                            value="{{ $profile_data['present_address']['present_state_province']['column_value'] ?? '' }}" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Postal Code</label>
                                        <input type="text" class="form-control" name="present_address[{{ $profile_data['present_address']['present_postal_code']['id'] ?? '' }}]"
                                            value="{{ $profile_data['present_address']['present_postal_code']['column_value'] ?? '' }}" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Country</label>
                                    <input type="text" class="form-control" name="present_address[{{ $profile_data['present_address']['present_country']['id'] ?? '' }}]"
                                        value="{{ $profile_data['present_address']['present_country']['column_value'] ?? '' }}" />
                                </div>

                                <hr class="my-4" />

                                <!-- Permanent Address Section -->
                                <h5 class="mb-3 fw-semibold">Permanent Address</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Street Address</label>
                                        <input type="text" class="form-control" name="permanent_address[{{ $profile_data['permanent_address']['permanent_street_address']['id'] ?? '' }}]"
                                            value="{{ $profile_data['permanent_address']['permanent_street_address']['column_value'] ?? '' }}" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" name="permanent_address[{{ $profile_data['permanent_address']['permanent_city']['id'] ?? '' }}]"
                                            value="{{ $profile_data['permanent_address']['permanent_city']['column_value'] ?? '' }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">State/Province</label>
                                        <input type="text" class="form-control" name="permanent_address[{{ $profile_data['permanent_address']['permanent_state_province']['id'] ?? '' }}]"
                                            value="{{ $profile_data['permanent_address']['permanent_state_province']['column_value'] ?? '' }}" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Postal Code</label>
                                        <input type="text" class="form-control" name="permanent_address[{{ $profile_data['permanent_address']['permanent_postal_code']['id'] ?? '' }}]"
                                            value="{{ $profile_data['permanent_address']['permanent_postal_code']['column_value'] ?? '' }}" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Country</label>
                                    <input type="text" class="form-control" name="permanent_address[{{ $profile_data['permanent_address']['permanent_country']['id'] ?? '' }}]"
                                        value="{{ $profile_data['permanent_address']['permanent_country']['column_value'] ?? '' }}" />
                                </div>

                                {{-- Submit Button --}}
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        <!-- end timeline tabs data-->
                        <div class="tab-pane" id="social-info">
                            <form action="{{ route('management.settings.profile.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                
                                {{-- LinkedIn and GitHub Row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="linkedin">
                                                <i class="ti ti-brand-linkedin text-primary"></i> LinkedIn
                                            </label>
                                            <input
                                                class="form-control @error('social.' . $profile_data['social']['linkedin']['id']) is-invalid @enderror"
                                                id="linkedin"
                                                name="social[{{ $profile_data['social']['linkedin']['id'] }}]"
                                                placeholder="https://linkedin.com/in/your-profile" type="url"
                                                value="{{ $profile_data['social']['linkedin']['column_value'] ?? '' }}" />
                                            @error('social.' . $profile_data['social']['linkedin']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="github">
                                                <i class="ti ti-brand-github text-dark"></i> GitHub
                                            </label>
                                            <input
                                                class="form-control @error('social.' . $profile_data['social']['github']['id']) is-invalid @enderror"
                                                id="github"
                                                name="social[{{ $profile_data['social']['github']['id'] }}]"
                                                placeholder="https://github.com/your-username" type="url"
                                                value="{{ $profile_data['social']['github']['column_value'] ?? '' }}" />
                                            @error('social.' . $profile_data['social']['github']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Twitter and Instagram Row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="twitter">
                                                <i class="ti ti-brand-twitter text-info"></i> Twitter
                                            </label>
                                            <input
                                                class="form-control @error('social.' . $profile_data['social']['twitter']['id']) is-invalid @enderror"
                                                id="twitter"
                                                name="social[{{ $profile_data['social']['twitter']['id'] }}]"
                                                placeholder="https://twitter.com/your-handle" type="url"
                                                value="{{ $profile_data['social']['twitter']['column_value'] ?? '' }}" />
                                            @error('social.' . $profile_data['social']['twitter']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="instagram">
                                                <i class="ti ti-brand-instagram text-danger"></i> Instagram
                                            </label>
                                            <input
                                                class="form-control @error('social.' . $profile_data['social']['instagram']['id']) is-invalid @enderror"
                                                id="instagram"
                                                name="social[{{ $profile_data['social']['instagram']['id'] }}]"
                                                placeholder="https://instagram.com/your-username" type="url"
                                                value="{{ $profile_data['social']['instagram']['column_value'] ?? '' }}" />
                                            @error('social.' . $profile_data['social']['instagram']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Facebook and YouTube Row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="facebook">
                                                <i class="ti ti-brand-facebook text-primary"></i> Facebook
                                            </label>
                                            <input
                                                class="form-control @error('social.' . $profile_data['social']['facebook']['id']) is-invalid @enderror"
                                                id="facebook"
                                                name="social[{{ $profile_data['social']['facebook']['id'] }}]"
                                                placeholder="https://www.facebook.com/your-profile" type="url"
                                                value="{{ $profile_data['social']['facebook']['column_value'] ?? '' }}" />
                                            @error('social.' . $profile_data['social']['facebook']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="youtube">
                                                <i class="ti ti-brand-youtube text-danger"></i> YouTube
                                            </label>
                                            <input
                                                class="form-control @error('social.' . $profile_data['social']['youtube']['id']) is-invalid @enderror"
                                                id="youtube"
                                                name="social[{{ $profile_data['social']['youtube']['id'] }}]"
                                                placeholder="https://youtube.com/your-channel" type="url"
                                                value="{{ $profile_data['social']['youtube']['column_value'] ?? '' }}" />
                                            @error('social.' . $profile_data['social']['youtube']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- ResearchGate and WhatsApp Row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="researchgate">
                                                <i class="ti ti-world text-success"></i> ResearchGate
                                            </label>
                                            <input
                                                class="form-control @error('social.' . $profile_data['social']['researchgate']['id']) is-invalid @enderror"
                                                id="researchgate"
                                                name="social[{{ $profile_data['social']['researchgate']['id'] }}]"
                                                placeholder="https://researchgate.net/profile/your-profile" type="url"
                                                value="{{ $profile_data['social']['researchgate']['column_value'] ?? '' }}" />
                                            @error('social.' . $profile_data['social']['researchgate']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="whatsapp">
                                                <i class="ti ti-brand-whatsapp text-success"></i> WhatsApp
                                            </label>
                                            <input
                                                class="form-control @error('social.' . $profile_data['social']['whatsapp']['id']) is-invalid @enderror"
                                                id="whatsapp"
                                                name="social[{{ $profile_data['social']['whatsapp']['id'] }}]"
                                                placeholder="https://wa.me/1234567890" type="url"
                                                value="{{ $profile_data['social']['whatsapp']['column_value'] ?? '' }}" />
                                            @error('social.' . $profile_data['social']['whatsapp']['id'])
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Info Alert --}}
                                <div class="alert alert-info alert-dismissible fade show mb-3" role="alert">
                                    <strong><i class="ti ti-info-circle me-2"></i>Tip:</strong>
                                    Enter complete URLs including the protocol (https://) for social media profiles. Leave blank to hide unused links.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                {{-- Submit Button --}}
                                <div class="text-end mt-4">
                                    <button class="btn btn-success" type="submit">
                                        <i class="ti ti-device-floppy me-1"></i> Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings Data-->
                    </div> <!-- end tab content-->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')
    <script>
        // Country flag dropdown with live preview
        document.getElementById('countryFlag')?.addEventListener('change', function() {
            const flagPath = this.value;
            let preview = this.parentElement.querySelector('img');
            
            if (flagPath) {
                if (!preview) {
                    preview = document.createElement('img');
                    preview.className = 'rounded';
                    preview.height = 24;
                    this.parentElement.appendChild(preview);
                }
                preview.src = "{{ asset('') }}" + flagPath;
                preview.alt = 'Flag Preview';
            } else if (preview) {
                preview.remove();
            }
        });
    </script>
@endsection
