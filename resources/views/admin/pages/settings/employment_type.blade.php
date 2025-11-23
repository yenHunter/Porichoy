@extends('admin.layout.default')

@section('title', 'Employment Type Management')

@push('css')
    <link href="{{ asset('admin/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/summernote/dist/summernote-lite.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/bootstrap4-toggle/css/bootstrap4-toggle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css') }}" rel="stylesheet">
@endpush

@push('js')
    <script src="{{ asset('admin/assets/js/demo/highlight.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/demo/highlightjs.demo.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables.net/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}">
    </script>
    <script src="{{ asset('admin/assets/plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/demo/table-plugins.demo.js') }}"></script>
    <script src="{{ asset('admin/assets/js/demo/sidebar-scrollspy.demo.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/summernote/dist/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap4-toggle/js/bootstrap4-toggle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap-slider/dist/bootstrap-slider.min.js') }}"></script>
@endpush

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
                        <li class="breadcrumb-item text-uppercase active">Employment Type Management</li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="page-header">
                            Employment Type Management <small>create update delete all in here</small>
                        </h1>
                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#create_update_modal">Create</button>
                    </div>

                    <hr class="mb-4">

                    @if (session('success'))
                        <div class="col-xl-12">
                            <div class="card border-success bg-success bg-opacity-25 mb-4">
                                <div class="card-header border-success fw-bold small text-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="card-title m-0">Employment Type Management</h4>
                                        </div>
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-tool"
                                                onclick="this.closest('.card').remove();">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Operation Successful</h5>
                                    <p class="card-text text-body text-opacity-75">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('error') || $errors->any())
                        <div class="col-xl-12">
                            <div class="card border-danger bg-danger bg-opacity-25 mb-4">
                                <div class="card-header border-danger fw-bold small text-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="card-title m-0">Employment Type Management</h4>
                                        </div>
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-tool"
                                                onclick="this.closest('.card').remove();">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Operation Failed</h5>
                                    <p class="card-text text-body text-opacity-75">{{ session('error') }}</p>
                                    <ul class="text-body text-opacity-75 mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- BEGIN col-9 -->
                    <div class="col-xl-12">
                        <!-- BEGIN #datatable -->
                        <div id="datatable" class="mb-5">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatableDefault" class="table text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employment_type_list as $item)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>
                                                        {{ $item->value }}<br>
                                                        <small>{{ $item->details }}</small>
                                                    </td>
                                                    <td>
                                                        @if ($item->status === 1)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm btn-edit"
                                                            data-employment_type_id="{{ $item->id }}">
                                                            <i class="fas fa-pencil"></i> edit
                                                        </button>
                                                        <button class="btn btn-danger btn-sm btn-delete"
                                                            data-employment_type_id="{{ $item->id }}">
                                                            <i class="fas fa-trash"></i> delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END #datatable -->
                    </div>
                    <!-- END col-9-->
                </div>
                <!-- END row -->
            </div>
            <!-- END col-10 -->
        </div>
        <!-- END row -->
    </div>
    <!-- END container -->
@endsection
@section('outter_content')
    <div class="modal modal-cover fade" id="create_update_modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Create new employment type info</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('settings.employment_type.store') }}" method="POST" id="create_update_form"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
                        <input type="hidden" name="employment_type_id" id="employment_type_id">
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label mb-2" for="title">Title <span
                                        class="text-danger">*</span></label>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="text" class="form-control" placeholder="Full-time"
                                value="{{ old('title') }}" name="title" id="title" required>
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label mb-2" for="details">Details</label>
                                @error('details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <textarea class="form-control" name="details" id="details" placeholder="Full-time opportunity in Bangladesh office"></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Page Script Start --}}
@section('page_script')
    <script>
        $('#create_update_modal').on('hidden.bs.modal', function() {
            $('#create_update_form')[0].reset();
            $('#create_update_form').attr('action', '{{ route('settings.employment_type.store') }}');
            $('#create_update_form_method').val('POST');
            $('#employment_type_id').val('');
        });

        $(document).on('click', '.btn-edit', function() {
            let employment_type_id = $(this).data('employment_type_id');

            $.ajax({
                url: "{{ route('settings.employment_type.edit', ':id') }}".replace(':id', employment_type_id),
                type: 'GET',
                success: function(response) {
                    // Fill the form fields
                    $('#employment_type_id').val(response.id);
                    $('#title').val(response.value);
                    $('#details').val(response.details);
                    $('#status').val(response.status);

                    const form = document.getElementById('create_update_form');
                    form.action = "{{ route('settings.employment_type.update') }}";
                    document.getElementById('create_update_form_method').value = 'PUT';

                    // Show modal
                    $('#create_update_modal').modal('show');
                }
            });
        });


        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {
                    const employment_type_id = this.getAttribute('data-employment_type_id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This action cannot be undone!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href =
                                "{{ route('settings.employment_type.delete', ':id') }}"
                                .replace(':id', employment_type_id);

                        }
                    });
                });
            });
        });
    </script>
@endsection
{{-- Page Script End --}}
