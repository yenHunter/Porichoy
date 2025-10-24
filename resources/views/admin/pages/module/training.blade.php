@extends('admin.layout.default')

@section('title', 'Training Management')

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
                        <li class="breadcrumb-item text-uppercase active">Training Management</li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="page-header">
                            Training Management <small>create update delete all in here</small>
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
                                            <h4 class="card-title m-0">Training Management</h4>
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
                                            <h4 class="card-title m-0">Training Management</h4>
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
                                                <th>Certificate</th>
                                                <th>Title</th>
                                                <th>Institute</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($training_list as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        @if (\Illuminate\Support\Str::contains($item->certificate, 'uploads/training/'))
                                                            <img class="img-thumbnail rounded" width="50px"
                                                                src="{{ asset('storage/' . $item->certificate) }}"
                                                                alt="source-logo">
                                                        @else
                                                            <a href="{{ $item->certificate }}" target="_blank">
                                                                <img class="img-thumbnail rounded" width="50px"
                                                                    src="{{ asset('admin/image/logo/training.png') }}"
                                                                    alt="source-logo">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $item->title }}
                                                        <br>
                                                        <small>{{ $item->category->value }}</small>
                                                    </td>
                                                    <td>
                                                        {{ $item->institute }}<br>
                                                        <small>{{ \Carbon\Carbon::parse($item->start_date)->format('d-M-Y') }}
                                                            to
                                                            {{ \Carbon\Carbon::parse($item->end_date)->format('d-M-Y') }}</small>
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
                                                            data-training_id="{{ $item->id }}">
                                                            <i class="fas fa-pencil"></i> edit
                                                        </button>
                                                        <button class="btn btn-danger btn-sm btn-delete"
                                                            data-id="{{ $item->id }}">
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
                                <form action="{{ route('module.training.settings.update') }}" method="POST"
                                    id="user-create-update">
                                    @method('PUT')
                                    @csrf
                                    @foreach ($training_settings as $item)
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
                    <h3 class="modal-title">Create new training info</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('module.training.store') }}" method="POST" id="create_update_form"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
                        <input type="hidden" name="training_id" id="training_id">
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="category_id" class="form-label mb-2">Category <span
                                        class="text-danger">*</span></label>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <select class="form-select" name="category_id" id="category_id">
                                <option value="0">Please select</option>
                                @foreach ($training_category as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('source_id') == $item->id ? 'selected' : '' }}>{{ $item->value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="title" class="form-label mb-2">Title <span
                                        class="text-danger">*</span></label>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="text" class="form-control" placeholder="Introduction to Data Science"
                                value="{{ old('title') }}" name="title" id="title" required>
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="institute" class="form-label mb-2">Institute <span
                                        class="text-danger">*</span></label>
                                @error('institute')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="text" class="form-control" placeholder="Cisco Networking Academy"
                                value="{{ old('institute') }}" name="institute" id="institute" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="start_date" class="form-label mb-2">Start Date</label>
                                    @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="date" class="form-control" name="start_date" id="start_date"
                                    value="{{ old('start_date') }}" max="{{ now()->toDateString() }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="end_date" class="form-label mb-2">End Date</label>
                                    @error('end_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="date" class="form-control" name="end_date" id="end_date"
                                    value="{{ old('end_date') }}" max="{{ now()->toDateString() }}">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="location" class="form-label mb-2">Location</label>
                                @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input class="form-control" type="text" name="location" id="location"
                                placeholder="San Francisco, California, United States" value="{{ old('location') }}">
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="isFile">
                                <label class="form-check-label" for="isFile">Upload certificate</label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="certificate" class="form-label mb-2">Certificate</label>
                                @error('certificate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input class="form-control" type="text" name="certificate" id="certificate_text"
                                placeholder="https://www.netacad.com/courses/introduction-data-science"
                                value="{{ old('certificate') }}">
                            <input class="form-control" type="file" name="certificate" id="certificate_file" hidden
                                disabled accept="image/*">
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="details" class="form-label mb-2">Training details</label>
                                @error('details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <textarea class="summernote" name="details" id="details"
                                placeholder="This introductory course takes you inside the world of data science. You will learn..."></textarea>
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
            $('.summernote').summernote({
                inheritPlaceholder: true,
            });
        });

        document.getElementById('isFile').addEventListener('change', function() {
            let certificate_text = document.getElementById('certificate_text');
            let certificate_file = document.getElementById('certificate_file');
            if (this.checked) {
                certificate_text.hidden = true;
                certificate_text.disabled = true;
                certificate_file.hidden = false;
                certificate_file.disabled = false;
            } else {
                certificate_text.hidden = false;
                certificate_text.disabled = false;
                certificate_file.hidden = true;
                certificate_file.disabled = true;
            }
        });

        $('#create_update_modal').on('hidden.bs.modal', function() {
            $('#create_update_form')[0].reset();
            $('#create_update_form').attr('action', '{{ route('module.training.store') }}');
            $('#certificate_file').prop('disabled', true);
            $('#certificate_file').prop('hidden', true);
            $('#certificate_text').prop('disabled', false);
            $('#certificate_text').prop('hidden', false);
            $('#isFile').prop('checked', false);
            $('#create_update_form_method').val('POST');
            $('#training_id').val('');
        });

        $(document).on('click', '.btn-edit', function() {
            let training_id = $(this).data('training_id');

            $.ajax({
                url: "{{ route('module.training.edit', ':id') }}".replace(':id', training_id),
                type: 'GET',
                success: function(response) {
                    // Fill the form fields
                    $('#training_id').val(response.id);
                    $('#title').val(response.title);
                    $('#category_id').val(response.category_id);
                    $('#institute').val(response.institute);
                    $('#start_date').val(response.start_date);
                    $('#end_date').val(response.end_date);
                    $('#location').val(response.location);
                    if (!response.certificate.includes('uploads/training/')) {
                        $('#certificate_text').val(response.certificate);
                        $('#certificate_text').prop('disabled', false);
                        $('#certificate_text').prop('hidden', false);
                        $('#certificate_file').prop('disabled', true);
                        $('#certificate_file').prop('hidden', true);
                        $('#isFile').prop('checked', false);
                    }
                    $('#details').summernote('code', response.details);
                    $('#status').val(response.status);

                    const form = document.getElementById('create_update_form');
                    form.action = "{{ route('module.training.update') }}";
                    document.getElementById('create_update_form_method').value = 'PUT';

                    // Show modal
                    $('#create_update_modal').modal('show');
                }
            });
        });


        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {
                    const training_id = this.getAttribute('data-id');

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
                            window.location.href = "{{ route('module.training.delete', ':id') }}"
                                .replace(':id', training_id);

                        }
                    });
                });
            });
        });
    </script>
@endsection
{{-- Page Script End --}}
