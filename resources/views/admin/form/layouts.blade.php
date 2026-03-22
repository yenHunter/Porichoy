@extends('layouts.vertical', ['title' => 'Forms Layout'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Forms', 'title' => 'Layouts'])

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Form</h4>
                </div>
                <div class="card-body">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-6 border-end border-dashed">
                            <div class="p-4">
                                <h4 class="mb-1 fw-bold text-uppercase">Sign in</h4>
                                <p class="text-muted mb-4">Let’s get you signed in. Enter your email and password to
                                    continue.</p>
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label" for="userEmail">Email address <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control" id="userEmail" placeholder="you@example.com"
                                                required="" type="email" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="userPassword">Password <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control" id="userPassword" placeholder="••••••••"
                                                required="" type="password" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <div class="form-check fs-sm">
                                            <input class="form-check-input form-check-input-light" id="rememberMe1"
                                                type="checkbox" />
                                            <label class="form-check-label fw-semibold fst-italic text-muted fs-base"
                                                for="rememberMe1">Keep me signed in</label>
                                        </div>
                                        <button class="btn btn-primary rounded-pill" type="submit"><strong>Log
                                                in</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6 text-center">
                            <div class="avatar avatar-xl mx-auto">
                                <span class="avatar-title bg-purple-subtle text-purple rounded-circle fw-bold">
                                    <i class="text-purple fs-28 fill-purple" data-lucide="shield-user"></i>
                                </span>
                            </div>
                            <h4 class="mt-3">Don't Have an Account Yet?</h4>
                            <p class="text-muted mb-3">Join us today and unlock access to personalized features, updates,
                                and more!</p>
                            <a class="link-primary text-decoration-underline fw-semibold link-offset-3"
                                href="{{ route('second', ['auth', 'sign-up']) }}">Create Your Account</a>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Modal Form</h4>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#modal-form">Form in simple modal box</a>
                    </div>
                    <div aria-hidden="true" class="modal fade" id="modal-form">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-sm-6 border-end border-dashed">
                                            <div class="p-4">
                                                <h4 class="mb-1 fw-bold text-uppercase">Sign in</h4>
                                                <p class="text-muted mb-4">Let’s get you signed in. Enter your email and
                                                    password to continue.</p>
                                                <form>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="userEmail1">Email address <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <input class="form-control" id="userEmail1"
                                                                placeholder="you@example.com" required=""
                                                                type="email" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="userPassword1">Password <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <input class="form-control" id="userPassword1"
                                                                placeholder="••••••••" required="" type="password" />
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-wrap justify-content-between">
                                                        <div class="form-check fs-sm">
                                                            <input class="form-check-input form-check-input-light"
                                                                id="rememberMe" type="checkbox" />
                                                            <label
                                                                class="form-check-label fw-semibold fst-italic text-muted fs-base"
                                                                for="rememberMe">Keep me signed in</label>
                                                        </div>
                                                        <button class="btn btn-primary rounded-pill"
                                                            type="submit"><strong>Log in</strong></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-center">
                                            <div class="avatar avatar-xl mx-auto">
                                                <span
                                                    class="avatar-title bg-purple-subtle text-purple rounded-circle fw-bold">
                                                    <i class="text-purple fs-28 fill-purple"
                                                        data-lucide="shield-user"></i>
                                                </span>
                                            </div>
                                            <h4 class="mt-3">Don't Have an Account Yet?</h4>
                                            <p class="text-muted mb-3">Join us today and unlock access to personalized
                                                features, updates, and more!</p>
                                            <a class="link-primary text-decoration-underline fw-semibold link-offset-3"
                                                href="{{ route('second', ['auth', 'sign-up']) }}">Create Your Account</a>
                                        </div>
                                    </div> <!-- end row-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Example</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">Email address</label>
                            <input aria-describedby="emailHelp" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email" type="email" />
                            <small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputPassword1">Password</label>
                            <input class="form-control" id="exampleInputPassword1" placeholder="Password"
                                type="password" />
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" id="checkmeout0" type="checkbox" />
                                <label class="form-check-label" for="checkmeout0">Check me out !</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Horizontal Form</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal">
                        <div class="row mb-3">
                            <label class="col-3 col-form-label" for="inputEmail3">Email</label>
                            <div class="col-9">
                                <input class="form-control" id="inputEmail3" placeholder="Email" type="email" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label" for="inputPassword3">Password</label>
                            <div class="col-9">
                                <input class="form-control" id="inputPassword3" placeholder="Password"
                                    type="password" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label" for="inputPassword5">Re Password</label>
                            <div class="col-9">
                                <input class="form-control" id="inputPassword5" placeholder="Retype Password"
                                    type="password" />
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-end">
                            <div class="col-9">
                                <div class="form-check">
                                    <input class="form-check-input" id="checkmeout" type="checkbox" />
                                    <label class="form-check-label" for="checkmeout">Check me out !</label>
                                </div>
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button class="btn btn-info" type="submit">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Horizontal Form Label Sizing</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control-sm" id="colFormLabelSm"
                                    placeholder="col-form-label-sm" type="email" />
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label" for="colFormLabel">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="colFormLabel" placeholder="col-form-label"
                                    type="email" />
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label col-form-label-lg" for="colFormLabelLg">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control-lg" id="colFormLabelLg"
                                    placeholder="col-form-label-lg" type="email" />
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Inline Form</h4>
                </div>
                <div class="card-body">
                    <form class="row row-cols-lg-auto g-3 align-items-center">
                        <div class="col-12">
                            <label class="visually-hidden" for="staticEmail2">Email</label>
                            <input class="form-control-plaintext" id="staticEmail2" readonly="" type="text"
                                value="email@example.com" />
                        </div>
                        <div class="col-12">
                            <label class="visually-hidden" for="inputPassword2">Password</label>
                            <input class="form-control" id="inputPassword2" placeholder="Password" type="password" />
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Confirm identity</button>
                        </div>
                    </form>
                    <h6 class="fs-base mt-3">Auto-sizing</h6>
                    <form>
                        <div class="row gy-2 gx-2 align-items-center">
                            <div class="col-auto">
                                <label class="visually-hidden" for="inlineFormInput">Name</label>
                                <input class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe"
                                    type="text" />
                            </div>
                            <div class="col-auto">
                                <label class="visually-hidden" for="inlineFormInputGroup">Username</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-text">@</div>
                                    <input class="form-control" id="inlineFormInputGroup" placeholder="Username"
                                        type="text" />
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" id="autoSizingCheck" type="checkbox" />
                                    <label class="form-check-label" for="autoSizingCheck">Remember me</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary mb-2" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Row</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">Email</label>
                                <input class="form-control" id="inputEmail4" placeholder="Email" type="email" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputPassword4">Password</label>
                                <input class="form-control" id="inputPassword4" placeholder="Password"
                                    type="password" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputAddress">Address</label>
                            <input class="form-control" id="inputAddress" placeholder="1234 Main St" type="text" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputAddress2">Address 2</label>
                            <input class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"
                                type="text" />
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputCity">City</label>
                                <input class="form-control" id="inputCity" type="text" />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputState">State</label>
                                <select class="form-select" id="inputState">
                                    <option>Choose</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-2">
                                <label class="form-label" for="inputZip">Zip</label>
                                <input class="form-control" id="inputZip" type="text" />
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" id="customCheck11" type="checkbox" />
                                <label class="form-check-label" for="customCheck11">Check this custom checkbox</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Sign in</button>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Floating Labels</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="#">
                        <div class="row g-3">
                            <!-- Username -->
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input class="form-control" id="usernameInput" placeholder="Enter username"
                                        type="text" />
                                    <label for="usernameInput">Username</label>
                                </div>
                            </div>
                            <!-- Full Name -->
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input class="form-control" id="fullnameInput" placeholder="Enter full name"
                                        type="text" />
                                    <label for="fullnameInput">Full Name</label>
                                </div>
                            </div>
                            <!-- Phone Number -->
                            <div class="col-lg-4">
                                <div class="form-floating">
                                    <input class="form-control" id="phoneInput" placeholder="Enter phone number"
                                        type="tel" />
                                    <label for="phoneInput">Phone Number</label>
                                </div>
                            </div>
                            <!-- Date of Birth -->
                            <div class="col-lg-4">
                                <div class="form-floating">
                                    <input class="form-control" id="dobInput" type="date" />
                                    <label for="dobInput">Date of Birth</label>
                                </div>
                            </div>
                            <!-- Gender -->
                            <div class="col-lg-4">
                                <div class="form-floating">
                                    <select aria-label="Select gender" class="form-select" id="genderSelect">
                                        <option selected="">Choose...</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                    <label for="genderSelect">Gender</label>
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="col-lg-8">
                                <div class="form-floating">
                                    <input class="form-control" id="addressInput" placeholder="Enter your address"
                                        type="text" />
                                    <label for="addressInput">Street Address</label>
                                </div>
                            </div>
                            <!-- State -->
                            <div class="col-lg-4">
                                <div class="form-floating">
                                    <select aria-label="Select state" class="form-select" id="stateSelect">
                                        <option selected="">Choose...</option>
                                        <option value="1">California</option>
                                        <option value="2">Texas</option>
                                        <option value="3">Florida</option>
                                    </select>
                                    <label for="stateSelect">State</label>
                                </div>
                            </div>
                            <!-- Website -->
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input class="form-control" id="websiteInput" placeholder="Enter website URL"
                                        type="url" />
                                    <label for="websiteInput">Website (optional)</label>
                                </div>
                            </div>
                            <!-- Bio -->
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <textarea class="form-control" id="bioTextarea" placeholder="Tell us about yourself" style="height: 100px"></textarea>
                                    <label for="bioTextarea">Short Bio</label>
                                </div>
                            </div>
                            <!-- Submit -->
                            <div class="col-lg-12">
                                <button class="btn btn-success" type="submit">Create Account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
