@extends('admin.layout.empty')

@section('title', 'Reset Password')

@section('page_head')
    <!-- ================== Google reCaptcha ================== -->
    <script src="https://www.google.com/recaptcha/enterprise.js?render={{ config('services.recaptcha.site_key') }}">
    </script>
@endsection

@section('content')
    <!-- BEGIN login -->
    <div class="login">
        <!-- BEGIN login-content -->
        <div class="login-content">
            <form action="{{ route('reset.password.attempt') }}" method="POST" name="forgot-password-form"
                id="forgot-password-form">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <h1 class="text-center">Forgot Password</h1>
                <div class="text-muted text-center mb-4">
                    For your protection, please verify your identity.
                </div>
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
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control form-control-lg fs-15px" value="{{ old('email', request('email')) }}"
                        name="email" placeholder="email@address.com">
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
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="termAndPolicy" id="termAndPolicy">
                        <label class="form-check-label fw-500" for="termAndPolicy">Agree the Terms & Policy</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-theme btn-lg d-block w-100 fw-500 mb-3 g-recaptcha" id="submitButton"
                    disabled>Send Request</button>
                <div class="text-center text-muted">
                    Return to <a href="{{ route('login.view') }}">Sign in</a>.
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
        document.getElementById('termAndPolicy').addEventListener('change', function() {
            document.getElementById('submitButton').disabled = !this.checked;
        });

        function onSubmit(token) {
            document.getElementById("forgot-password-form").submit();
        }
    </script>
@endsection
{{-- Page Script End --}}
