@extends('layouts.base', ['title' => 'Lock Screen'])

@section('css')
@endsection

@section('content')
    <div class="auth-box overflow-hidden align-items-center d-flex">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-md-6 col-sm-8">
                    <div class="card p-4">
                        <div class="auth-brand text-center mb-3">
                            <a class="logo-dark" href="{{ route('second', ['dashboard', 'index']) }}">
                                <img alt="dark logo" height="28" src="/images/logo-black.png" />
                            </a>
                            <a class="logo-light" href="{{ route('second', ['dashboard', 'index']) }}">
                                <img alt="logo" height="28" src="/images/logo.png" />
                            </a>
                        </div>
                        <div class="text-center mb-4">
                            <img alt="thumbnail" class="rounded-circle img-thumbnail avatar-xxl mb-2"
                                src="/images/users/user-1.jpg" />
                            <h5 class="fs-md">Geneva D.</h5>
                        </div>
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="userPassword">Password <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input class="form-control" id="userPassword" placeholder="••••••••" required=""
                                        type="password" />
                                </div>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary fw-semibold py-2" type="submit">Unlock</button>
                            </div>
                        </form>
                        <p class="text-muted text-center mt-4 mb-0">
                            Not you? Return to <a class="text-decoration-underline link-offset-3 fw-semibold"
                                href="{{ route('second', ['auth', 'sign-in']) }}">Sign in</a>
                        </p>
                    </div>
                    <p class="text-center text-muted mt-4 mb-0">
                        © UBold — by <span class="fw-semibold">Coderthemes</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end auth-fluid-->
@endsection

@section('scripts')
@endsection
