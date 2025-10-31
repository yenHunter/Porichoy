@extends('admin.layout.empty')

@section('title', 'Register')

@section('page_head')
    <!-- ================== Google reCaptcha ================== -->
    <script src="https://www.google.com/recaptcha/enterprise.js?render={{ config('services.recaptcha.site_key') }}"></script>
@endsection

@section('content')
    <!-- BEGIN register -->
    <div class="register">
        <!-- BEGIN register-content -->
        <div class="register-content">
            <form action="{{ route('register.attempt') }}" method="POST" id="register_form">
                {{ csrf_field() }}
                <h1 class="text-center">Sign Up</h1>
                <p class="text-muted text-center">One Admin ID is all you need to access all the Admin services.</p>
                @if (session('status'))
                    <div class="alert alert-success text-center mb-2">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger text-center mb-2">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label mb-2">First Name <span class="text-danger">*</span></label>
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="text" class="form-control form-control-lg fs-15px" placeholder="John"
                        value="{{ old('first_name') }}" name="first_name" required>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label mb-2">Last Name <span class="text-danger">*</span></label>
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="text" class="form-control form-control-lg fs-15px" placeholder="Smith"
                        value="{{ old('last_name') }}" name="last_name" required>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label mb-2">Email Address <span class="text-danger">*</span></label>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="email" class="form-control form-control-lg fs-15px" placeholder="email@address.com"
                        value="{{ old('email') }}" name="email" required>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label mb-2">Password <span class="text-danger">*</span></label>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="password" class="form-control form-control-lg fs-15px" name="password" id="password"
                        placeholder="***************">
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control form-control-lg fs-15px" id="password_confirmation"
                        placeholder="***************" name="password_confirmation">
                    <span class="text-danger" id="password_error"></span>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-theme btn-lg fs-15px fw-500 d-block w-100 g-recaptcha"
                        id="submit_button" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" data-callback="onSubmit"
                        data-action="submit">Sign Up</button>
                </div>
                <div class="text-muted text-center">
                    Already have an Admin ID? <a href="{{ route('login.view') }}">Sign In</a>
                </div>
            </form>
        </div>
        <!-- END register-content -->
    </div>
    <!-- END register -->
@endsection
{{-- Page Script Start --}}
@section('page_script')
    <script>
        function onSubmit(token) {
            document.getElementById("register_form").submit();
        }
    </script>
@endsection
{{-- Page Script End --}}
