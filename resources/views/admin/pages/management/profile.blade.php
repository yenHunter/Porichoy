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
                            <img alt="avatar" class="rounded-circle" height="72"
                                src="{{ asset($profile_data['basic']['profile_picture']['column_value']) ?? '/images/users/user-1.jpg' }}"
                                width="72" />
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
                                    {{ $profile_data['address']['city']['column_value'] . ', ' . $profile_data['address']['country']['column_value'] ?? 'San Francisco, CA' }}
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
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="firstname">First Name</label>
                                            <input class="form-control" id="firstname" placeholder="Enter first name"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="lastname">Last Name</label>
                                            <input class="form-control" id="lastname" placeholder="Enter last name"
                                                type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="jobtitle">Professional Headline</label>
                                    <input class="form-control" id="jobtitle" placeholder="e.g. UI Developer, Designer"
                                        type="text" />
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="firstname">Designation</label>
                                            <input class="form-control" id="firstname" placeholder="Enter designation"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="lastname">Organization</label>
                                            <input class="form-control" id="lastname" placeholder="Enter organization"
                                                type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="userbio">Bio</label>
                                    <textarea class="form-control" id="userbio" placeholder="Write something about yourself..." rows="4"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="useremail">Email Address</label>
                                            <input class="form-control" id="useremail" placeholder="Enter email"
                                                type="email" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Mobile Number</label>
                                            <input class="form-control" id="userpassword"
                                                placeholder="Enter mobile number" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="profilephoto">Profile Photo</label>
                                    <input class="form-control" id="profilephoto" type="file" />
                                </div>
                                <div class="text-end mt-4">
                                    <button class="btn btn-success" type="submit"><i
                                            class="ti ti-device-floppy me-1"></i> Save Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="personal-info">

                        </div>
                        <!-- end About Me data-->
                        <div class="tab-pane" id="address-info">
                            <!-- comment box -->
                            <form action="#" class="mb-3">
                                <textarea class="form-control" placeholder="Write something..." rows="3"></textarea>
                                <div class="d-flex py-2 justify-content-between">
                                    <div>
                                        <a class="btn btn-sm btn-icon btn-light" href="#"><i
                                                class="ti ti-user fs-md"></i></a>
                                        <a class="btn btn-sm btn-icon btn-light" href="#"><i
                                                class="ti ti-map-pin fs-md"></i></a>
                                        <a class="btn btn-sm btn-icon btn-light" href="#"><i
                                                class="ti ti-camera fs-md"></i></a>
                                        <a class="btn btn-sm btn-icon btn-light" href="#"><i
                                                class="ti ti-mood-smile fs-md"></i></a>
                                    </div>
                                    <button class="btn btn-sm btn-dark" type="submit">Post</button>
                                </div>
                            </form>
                            <!-- end comment box -->
                            <!-- Story Box-->
                            <div class="border border-light border-dashed rounded p-2 mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <img alt="Generic placeholder image" class="me-2 avatar-md rounded-circle"
                                        src="/images/users/user-3.jpg" />
                                    <div class="w-100">
                                        <h5 class="m-0">Jeremy Tomlinson</h5>
                                        <p class="text-muted mb-0"><small>about 2 minutes ago</small></p>
                                    </div>
                                </div>
                                <p>Story based around the idea of time lapse, animation to post soon!</p>
                                <img alt="post-img" class="rounded me-1" height="60" src="/images/stock/small-1.jpg">
                                <img alt="post-img" class="rounded me-1" height="60" src="/images/stock/small-2.jpg">
                                <img alt="post-img" class="rounded" height="60" src="/images/stock/small-3.jpg">
                                <div class="mt-2">
                                    <a class="btn btn-sm btn-link text-muted" href="javascript: void(0);"><i
                                            class="ti ti-arrow-back-up fs-sm me-1"></i> Reply</a>
                                    <a class="btn btn-sm btn-link text-muted" href="javascript: void(0);"><i
                                            class="ti ti-heart fs-sm me-1"></i> Like</a>
                                    <a class="btn btn-sm btn-link text-muted" href="javascript: void(0);"><i
                                            class="ti ti-share-3 fs-sm me-1"></i> Share</a>
                                </div>
                                </img></img></img>
                            </div>
                            <!-- Story Box-->
                            <div class="border border-light border-dashed rounded p-2 mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <img alt="Generic placeholder image" class="me-2 avatar-sm rounded-circle"
                                        src="/images/users/user-4.jpg" />
                                    <div class="w-100">
                                        <h5 class="m-0">Sophia Martinez</h5>
                                        <p class="text-muted mb-0"><small>about 30 minutes ago</small></p>
                                    </div>
                                </div>
                                <div class="fs-16 text-center mt-3 mb-4 fst-italic">
                                    <i class="ti ti-quote fs-20"></i>
                                    Just finished a weekend project! Built a small weather app using React and
                                    OpenWeather API.
                                    Feeling excited to share the results with everyone soon. 🚀
                                </div>
                                <div class="bg-light-subtle m-n2 p-2 border-top border-bottom border-dashed">
                                    <div class="d-flex align-items-start">
                                        <img alt="Generic placeholder image" class="me-2 avatar-sm rounded-circle"
                                            src="/images/users/user-1.jpg" />
                                        <div class="w-100">
                                            <h5 class="mt-0 mb-1">
                                                Liam Johnson <small class="text-muted">10 minutes ago</small>
                                            </h5>
                                            That sounds awesome! Can't wait to see how you designed the UI.
                                            <br />
                                            <a class="text-muted font-13 d-inline-block mt-2" href="javascript:void(0);">
                                                <i class="ti ti-arrow-back-up"></i> Reply
                                            </a>
                                            <div class="d-flex align-items-start mt-3">
                                                <a class="pe-2" href="#">
                                                    <img alt="Generic placeholder image" class="avatar-sm rounded-circle"
                                                        src="/images/users/user-2.jpg" />
                                                </a>
                                                <div class="w-100">
                                                    <h5 class="mt-0 mb-1">
                                                        Olivia Carter <small class="text-muted">15 minutes ago</small>
                                                    </h5>
                                                    I recently built something similar with Vue. Let's collaborate
                                                    sometime!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start mt-2">
                                        <a class="pe-2" href="#">
                                            <img alt="Generic placeholder image" class="rounded-circle" height="31"
                                                src="/images/users/user-3.jpg" />
                                        </a>
                                        <div class="w-100">
                                            <input class="form-control form-control-sm" id="simpleinput"
                                                placeholder="Add a comment..." type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-sm btn-link text-danger" href="javascript:void(0);">
                                        <i class="ti ti-heart me-1 fs-sm"></i> Like (45)
                                    </a>
                                    <a class="btn btn-sm btn-link text-muted" href="javascript:void(0);">
                                        <i class="ti ti-share-3 me-1 fs-sm"></i> Share
                                    </a>
                                </div>
                            </div>
                            <!-- Story Box -->
                            <div class="border border-light border-dashed rounded p-2 mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <img alt="Profile photo of Anika Roy" class="me-2 avatar-sm rounded-circle"
                                        src="/images/users/user-2.jpg" />
                                    <div class="w-100">
                                        <h5 class="m-0">Anika Roy</h5>
                                        <p class="text-muted mb-0"><small>2 hours ago</small></p>
                                    </div>
                                </div>
                                <p>Sharing a couple of timelapses from my recent Iceland trip. Let me know which one you
                                    like most!</p>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <div class="ratio ratio-16x9 rounded overflow-hidden">
                                            <iframe allowfullscreen=""
                                                src="https://player.vimeo.com/video/1084537"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ratio ratio-16x9 rounded overflow-hidden">
                                            <iframe allowfullscreen=""
                                                src="https://player.vimeo.com/video/76979871"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center gap-2 p-3">
                                <strong>Loading...</strong>
                                <div aria-hidden="true" class="spinner-border spinner-border-sm text-danger"
                                    role="status"></div>
                            </div>
                        </div>
                        <!-- end timeline tabs data-->
                        <div class="tab-pane" id="social-info">
                            <form>
                                <!-- Personal Info -->
                                <h5
                                    class="mb-3 text-uppercase bg-light-subtle p-1 border-dashed border rounded border-light text-center">
                                    <i class="ti ti-user-circle me-1"></i> Personal Info
                                </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="firstname">First Name</label>
                                            <input class="form-control" id="firstname" placeholder="Enter first name"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="lastname">Last Name</label>
                                            <input class="form-control" id="lastname" placeholder="Enter last name"
                                                type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="jobtitle">Job Title</label>
                                            <input class="form-control" id="jobtitle"
                                                placeholder="e.g. UI Developer, Designer" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="phone">Phone Number</label>
                                            <input class="form-control" id="phone" placeholder="+1 234 567 8901"
                                                type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="userbio">Bio</label>
                                    <textarea class="form-control" id="userbio" placeholder="Write something about yourself..." rows="4"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="useremail">Email Address</label>
                                            <input class="form-control" id="useremail" placeholder="Enter email"
                                                type="email" />
                                            <span class="form-text fs-xs fst-italic text-muted"><a class="link-reset"
                                                    href="#">Click here to change your email</a></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input class="form-control" id="userpassword"
                                                placeholder="Enter new password" type="password" />
                                            <span class="form-text fs-xs fst-italic text-muted"><a class="link-reset"
                                                    href="#">Click here to change your password</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="profilephoto">Profile Photo</label>
                                    <input class="form-control" id="profilephoto" type="file" />
                                </div>
                                <!-- Address Info -->
                                <h5
                                    class="mb-3 text-uppercase bg-light-subtle p-1 border-dashed border rounded border-light text-center">
                                    <i class="ti ti-map-pin me-1"></i> Address Info
                                </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="address-line1">Address Line 1</label>
                                            <input class="form-control" id="address-line1"
                                                placeholder="Street, Apartment, Unit, etc." type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="address-line2">Address Line 2</label>
                                            <input class="form-control" id="address-line2" placeholder="Optional"
                                                type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="city">City</label>
                                            <input class="form-control" id="city" placeholder="City"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="state">State / Province</label>
                                            <input class="form-control" id="state" placeholder="State or Province"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="zipcode">Postal / ZIP Code</label>
                                            <input class="form-control" id="zipcode" placeholder="Postal Code"
                                                type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="country">Country</label>
                                            <input class="form-control" id="country" placeholder="Country"
                                                type="text" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Company Info -->
                                <h5
                                    class="mb-3 text-uppercase bg-light-subtle p-1 border-dashed border rounded border-light text-center">
                                    <i class="ti ti-building-skyscraper me-1"></i> Company Info
                                </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="companyname">Company Name</label>
                                            <input class="form-control" id="companyname" placeholder="Enter company name"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="cwebsite">Website</label>
                                            <input class="form-control" id="cwebsite"
                                                placeholder="https://yourcompany.com" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Social -->
                                <h5
                                    class="mb-3 text-uppercase bg-light-subtle p-1 border-dashed border rounded border-light text-center">
                                    <i class="ti ti-world me-1"></i> Social
                                </h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="social-fb">Facebook</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="ti ti-brand-facebook"></i></span>
                                            <input class="form-control" id="social-fb" placeholder="Facebook URL"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="social-tw">Twitter X</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="ti ti-brand-x"></i></span>
                                            <input class="form-control" id="social-tw" placeholder="@username"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="social-insta">Instagram</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="ti ti-brand-instagram"></i></span>
                                            <input class="form-control" id="social-insta" placeholder="Instagram URL"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="social-lin">LinkedIn</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="ti ti-brand-linkedin"></i></span>
                                            <input class="form-control" id="social-lin" placeholder="LinkedIn Profile"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="social-gh">GitHub</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="ti ti-brand-github"></i></span>
                                            <input class="form-control" id="social-gh" placeholder="GitHub Username"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="social-sky">Skype</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="ti ti-brand-skype"></i></span>
                                            <input class="form-control" id="social-sky" placeholder="@username"
                                                type="text" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Submit -->
                                <div class="text-end mt-4">
                                    <button class="btn btn-success" type="submit"><i
                                            class="ti ti-device-floppy me-1"></i> Save Changes</button>
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
@endsection
