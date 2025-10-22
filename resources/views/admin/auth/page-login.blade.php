@extends('admin.layout.empty')

@section('title', 'Login')

@section('page_head')
    <!-- ================== Google reCaptcha ================== -->
    <script src="https://www.google.com/recaptcha/enterprise.js?render={{ config('services.recaptcha.site_key') }}"></script>
@endsection

@section('content')
    <!-- BEGIN login -->
    <div class="login">
        <!-- BEGIN login-content -->
        <div class="login-content">
            <form action="{{ route('login.attempt') }}" method="POST" name="login_form" id="login_form">
                @csrf
                <h1 class="text-center">Sign In</h1>
                <div class="text-muted text-center mb-4">
                    For your protection, please verify your identity.
                </div>
                @error('error')
                    <div class="text-danger text-center mb-4">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control form-control-lg fs-15px" value="{{ old('email') }}"
                        name="email" placeholder="email@address.com">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control form-control-lg fs-15px" name="password"
                        placeholder="Enter your password">
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember">
                        <label class="form-check-label fw-500" for="remember">Remember me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-theme btn-lg d-block w-100 fw-500 mb-3 g-recaptcha"
                    data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" data-callback="onSubmit" data-action="submit">Sign
                    In</button>
                <div class="text-center text-muted">
                    Don't have an account yet? <a href="{{ route('register.view') }}">Sign up</a>.
                </div>
            </form>
        </div>
        <!-- END login-content -->
    </div>
    <!-- END login -->
@endsection
{{-- Page Script Start --}}
@section('page_script')
    <script>
        function onSubmit(token) {
            document.getElementById("login_form").submit();
        }
    </script>
@endsection
{{-- Page Script End --}}
