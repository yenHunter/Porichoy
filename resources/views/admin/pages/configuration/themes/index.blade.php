@extends('admin.layout.default')

@section('title', 'Theme Management')

@section('page_head')
    <!-- ================== Sweet Alert 2 ================== -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <!-- BEGIN container -->
    <div class="container">
        <!-- BEGIN row -->
        <div class="row justify-content-center">
            <!-- BEGIN col-10 -->
            <div class="col-xl-12">
                <!-- BEGIN row -->
                <div class="row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item text-uppercase">
                            <a href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-uppercase">
                            <a href="{{ route('configuration.view') }}">Configuration</a>
                        </li>
                        <li class="breadcrumb-item text-uppercase active">Theme Management</li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="page-header">
                            Theme Management <small>create update delete all in here</small>
                        </h1>
                    </div>

                    <hr class="mb-4">

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('visitor/antux/img/logo.png') }}" width="100px" alt="Antux">
                                        <ul class="h6 mt-3">
                                            <li>Light & Dark</li>
                                            <li>GSAP Animation</li>
                                        </ul>
                                        <div class="mt-2">
                                            <i class="h1 fa-brands fa-bootstrap"></i>
                                            <i class="h1 fa-brands fa-laravel"></i>
                                            <i class="h1 fa-brands fa-js"></i>
                                        </div>
                                        <div class="d-flex justify content between">
                                            <button class="btn btn-info btn-sm">Preview</button>
                                            <button class="btn btn-success btn-sm btn-active" data-theme="antux">Active</button>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <img src="{{ asset('visitor/antux/img/banner.webp') }}"
                                            class="img-fluid w-100 rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END row -->
            </div>
            <!-- END col-10 -->
        </div>
        <!-- END row -->
    </div>
    <!-- END container -->
@endsection
{{-- Page Script Start --}}
@section('page_script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.btn-active').forEach(button => {
                button.addEventListener('click', function() {
                    const theme = this.getAttribute('data-theme');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This action cannot be undone!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, change it!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('configuration.update', ':theme') }}"
                                .replace(':theme', theme);

                        }
                    });
                });
            });
        });
    </script>
@endsection
{{-- Page Script End --}}
