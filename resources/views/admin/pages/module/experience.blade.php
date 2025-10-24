@extends('admin.layout.default')

@section('title', 'Experience Management')

@push('css')
    <link href="{{ asset('admin/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/summernote/dist/summernote-lite.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/bootstrap4-toggle/css/bootstrap4-toggle.min.css') }}" rel="stylesheet">
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
                        <li class="breadcrumb-item text-uppercase active">Experience Management</li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="page-header">
                            Experience Management <small>create update delete all in here</small>
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
                                            <h4 class="card-title m-0">Experience Management</h4>
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
                                            <h4 class="card-title m-0">Experience Management</h4>
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
                    <div class="col-xl-9">
                        <!-- BEGIN #datatable -->
                        <div id="datatable" class="mb-5">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatableDefault" class="table text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Logo</th>
                                                <th>Position</th>
                                                <th>Organization</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($experience_list as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        @if (isset($item->organization_logo))
                                                            <img class="img-thumbnail rounded" width="50px"
                                                                src="{{ asset('storage/' . $item->organization_logo) }}"
                                                                alt="organization-logo">
                                                        @else
                                                            <img class="img-thumbnail rounded" width="50px"
                                                                src="{{ asset('admin/image/logo/experience.png') }}"
                                                                alt="organization-logo">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $item->position }}<br>
                                                        <small>{{ $item->department }}</small>
                                                    </td>
                                                    <td>
                                                        {{ $item->organization }}<br>
                                                        <small>{{ $item->organization_address }}</small>
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
                                                            data-experience_id="{{ $item->id }}">
                                                            <i class="fas fa-pencil"></i> edit
                                                        </button>
                                                        <button class="btn btn-danger btn-sm btn-delete"
                                                            data-experience_id="{{ $item->id }}">
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
                    <!-- BEGIN col-3 -->
                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <h4>Column Visibility Status</h4>
                                <h6 class="text-muted mb-3">Only column with <span class="text-success">ON</span> status
                                    will visible in website</h6>
                                <form action="{{ route('module.experience.settings.update') }}" method="POST"
                                    id="user-create-update">
                                    @method('PUT')
                                    @csrf
                                    @foreach ($experience_settings as $item)
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <label>{{ $item->column_title }}</label>
                                            <input type="checkbox" name="{{ $item->column_name }}"
                                                {{ $item->visibility ? 'checked' : '' }} data-toggle="toggle"
                                                data-on="ON" data-off="OFF" data-onstyle="success"
                                                data-offstyle="secondary" data-size="mini">
                                        </div>
                                    @endforeach
                                    <div class="form-group mb-3 mt-3">
                                        <button class="btn btn-success btn-sm" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END col-3 -->
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
                    <h3 class="modal-title">Create new experience info</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('module.experience.store') }}" method="POST" id="create_update_form"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
                        <input type="hidden" name="experience_id" id="experience_id">
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label mb-2">Position <span class="text-danger">*</span></label>
                                @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="text" class="form-control" placeholder="Software Engineer"
                                value="{{ old('position') }}" name="position" id="position" required>
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label mb-2">Employment Type <span class="text-danger">*</span></label>
                                @error('department')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <select class="form-control" name="employment_type" id="employment_type">
                                <option value="0" selected disabled>Select type</option>
                                @foreach ($employment_type as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('employment_type') == $item->id ? 'selected' : '' }}>{{ $item->value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label mb-2">Department </label>
                                @error('department')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="text" class="form-control" placeholder="Software Development"
                                value="{{ old('department') }}" name="department" id="department">
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label mb-2">Organization <span class="text-danger">*</span></label>
                                @error('organization')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="text" class="form-control" placeholder="Microsoft Corporation"
                                value="{{ old('organization') }}" name="organization" id="organization" required>
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label mb-2">Organization Logo</label>
                                @error('organization_logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="file" class="form-control" name="organization_logo" accept="image/*">
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label mb-2">Organization Address</label>
                                @error('organization_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="text" class="form-control" placeholder="United States"
                                name="organization_address" id="organization_address">
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="current_position">
                                <label class="form-check-label" for="current_position">I am currently working in this
                                    role</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label mb-2">Start Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="start_date" id="start_date"
                                    value="{{ old('start_date') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label mb-2">End Date</label>
                                <input type="date" class="form-control" name="end_date" id="end_date"
                                    value="{{ old('end_date') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label mb-2">Location Type</label>
                                <select class="form-control" name="location_type" id="location_type">
                                    <option value="0" selected disabled>Please Select</option>
                                    @foreach ($location_type as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('location_type') == $item->id ? 'selected' : '' }}>
                                            {{ $item->value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="details" class="form-label mb-2">Experience Details</label>
                                @error('details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <textarea class="summernote" name="details" id="details"></textarea>
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
        $(document).ready(function() {
            $('.summernote').summernote();
        });

        document.getElementById('current_position').addEventListener('change', function() {
            let endDate = document.getElementById('end_date');
            if (this.checked) {
                endDate.disabled = true;
            } else {
                endDate.disabled = false;
            }
        });

        $('#create_update_modal').on('hidden.bs.modal', function() {
            $('#create_update_form')[0].reset();
            $('#create_update_form').attr('action', '{{ route('module.experience.store') }}');
            $('#end_date').prop('disabled', false);
            $('#current_position').prop('checked', false);
            $('#create_update_form_method').val('POST');
            $('#experience_id').val('');
        });


        $(document).on('click', '.btn-edit', function() {
            let experience_id = $(this).data('experience_id');

            $.ajax({
                url: "{{ route('module.experience.edit', ':id') }}".replace(':id', experience_id),
                type: 'GET',
                success: function(response) {
                    // Fill the form fields
                    $('#experience_id').val(response.id);
                    $('#position').val(response.position);
                    $('#employment_type').val(response.employment_type);
                    $('#department').val(response.department);
                    $('#organization').val(response.organization);
                    $('#organization_address').val(response.organization_address);
                    $('#start_date').val(response.start_date.split('T')[0]);
                    if (response.end_date === null) {
                        $('#current_position').prop('checked', true);
                        $('#end_date').prop('disabled', true);
                    } else {
                        $('#end_date').val(response.end_date.split('T')[0]);
                    }
                    $('#location_type').val(response.location_type);
                    $('#details').summernote('code', response.details);
                    $('#status').val(response.status);

                    const form = document.getElementById('create_update_form');
                    form.action = "{{ route('module.experience.update') }}";
                    document.getElementById('create_update_form_method').value = 'PUT';

                    // Show modal
                    $('#create_update_modal').modal('show');
                }
            });
        });


        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {
                    const experience_id = this.getAttribute('data-experience_id');

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
                                "{{ route('module.experience.delete', ':id') }}"
                                .replace(':id', experience_id);

                        }
                    });
                });
            });
        });
    </script>
@endsection
{{-- Page Script End --}}
