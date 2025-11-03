@extends('admin.layout.empty')

@section('title', 'Look Screen')

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
            <form action="{{ route('unlock.screen') }}" method="POST" id="lock-form">
                @csrf
                <div class="text-center">
                    @if (isset($user_info->profile_picture))
                        <img class="text-center" width="150px" src="{{ asset('storage/' . $user_info->profile_picture) }}"
                            alt="Profile Picture">
                    @else
                        <img class="text-center" width="150px" src="{{ asset('static/user.png') }}" alt="Profile Picture">
                    @endif
                </div>
                <h3 class="text-center">{{ $user_info->first_name . ' ' . $user_info->last_name }}</h3>
                <div class="text-muted text-center mb-4">
                    Please enter your password to unlock the screen.
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
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control form-control-lg fs-15px" name="password"
                        placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-theme btn-lg d-block w-100 fw-500 mb-3 g-recaptcha"
                    data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" data-callback="onSubmit" data-action="submit">
                    Unlock
                </button>
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
            document.getElementById("lock-form").submit();
        }
    </script>
@endsection
{{-- Page Script End --}}
