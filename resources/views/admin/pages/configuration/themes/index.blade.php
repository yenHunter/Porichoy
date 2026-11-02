@extends('admin.layouts.vertical', ['title' => 'Theme Management'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Configuration', 'title' => 'Theme Management'])

    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success border-2 d-flex align-items-center p-3 mb-2" role="alert">
                    <i class="ti ti-circle-dashed-check text-success fs-2 me-3"></i>
                    <div class="col-11">
                        <h4 class="alert-heading">Operation Successful</h4>
                        <p class="m-0">{{ session('success') }}</p>
                    </div>
                    <div class="col-1">
                        <button aria-label="Close" class="ms-auto btn btn-sm btn-success btn-icon rounded-circle"
                            data-bs-dismiss="alert" type="button">
                            <i class="ti ti-x fs-lg"></i>
                        </button>
                    </div>
                </div>
            @endif
            @if (session('error') || $errors->any())
                <div class="alert alert-danger border-2 d-flex align-items-center p-3 mb-2" role="alert">
                    <i class="ti ti-circle-dashed-x text-danger fs-2 me-3"></i>
                    <div class="col-11">
                        <h4 class="alert-heading">Operation Failed</h4>
                        @foreach ($errors->all() as $error)
                            <p class="m-0">{{ $error }}</p>
                        @endforeach
                    </div>
                    <div class="col-1">
                        <button aria-label="Close" class="ms-auto btn btn-sm btn-danger btn-icon rounded-circle"
                            data-bs-dismiss="alert" type="button">
                            <i class="ti ti-x fs-lg"></i>
                        </button>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Theme Management <code>activate available visitor themes</code> </h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped dt-responsive align-middle mb-0" data-tables="basic">
                        <thead class="thead-sm text-uppercase fs-xxs">
                            <tr>
                                <th>Theme</th>
                                <th>Preview</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $themes      = config('themes.available');
                                $currentTheme = config('themes.default_theme');
                            @endphp
                            @foreach ($themes as $key => $theme)
                                <tr>
                                    <td>
                                        <strong>{{ $theme['name'] }}</strong><br>
                                        <small class="text-muted">{{ $key }}</small>
                                    </td>
                                    <td>
                                        @if (file_exists(public_path('visitor/' . $key . '/img/logo.png')))
                                            <img class="img-thumbnail rounded" width="60px"
                                                src="{{ asset('visitor/' . $key . '/img/logo.png') }}"
                                                alt="{{ $theme['name'] }} logo">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center"
                                                style="width: 60px; height: 60px;">
                                                <i class="ti ti-palette text-muted fs-4"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($key === $currentTheme)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($key !== $currentTheme)
                                            <button class="btn btn-primary btn-icon btn-sm btn-activate"
                                                data-theme="{{ $key }}"
                                                data-theme-name="{{ $theme['name'] }}">
                                                <i class="ti ti-check fs-lg"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-light btn-icon btn-sm disabled">
                                                <i class="ti ti-check text-success fs-lg"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.btn-activate').forEach(button => {
                button.addEventListener('click', function() {
                    const theme    = this.getAttribute('data-theme');
                    const themeName = this.getAttribute('data-theme-name');

                    Swal.fire({
                        title: 'Activate ' + themeName + '?',
                        text: "This will change the visitor-facing theme for the entire site.",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#198754',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, activate it!',
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
