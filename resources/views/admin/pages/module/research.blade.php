@extends('admin.layout.default')

@section('title', 'Research Management')

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
                        <li class="breadcrumb-item text-uppercase active">Research Management</li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="page-header">
                            Research Management <small>create update delete all in here</small>
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
                                            <h4 class="card-title m-0">Research Management</h4>
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
                                            <h4 class="card-title m-0">Research Management</h4>
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
                                                <th>Order</th>
                                                <th>Source</th>
                                                <th>Degree</th>
                                                <th>Institute</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sortable-research">
                                            @foreach ($research_list as $item)
                                                <tr data-id="{{ $item->id }}">
                                                    <td>
                                                        <i class="fas fa-up-down-left-right"></i>
                                                    </td>
                                                    <td>
                                                        @if (isset($item->source->details))
                                                            <img class="img-thumbnail rounded" width="50px"
                                                                src="{{ asset('storage/' . $item->source->details) }}"
                                                                alt="source-logo">
                                                        @else
                                                            <img class="img-thumbnail rounded" width="50px"
                                                                src="{{ asset('static/logo/research.png') }}"
                                                                alt="source-logo">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ $item->link }}" class="text-dark"
                                                            target="_blank">{{ $item->title }}</a>
                                                        <br>
                                                        <small>{{ $item->category }}</small>
                                                    </td>
                                                    <td>
                                                        {{ $item->role }}<br>
                                                        <small>{{ $item->published?->format('d-M-Y') }}</small>
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
                                                            data-research_id="{{ $item->id }}">
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
                                <form action="{{ route('module.research.settings.update') }}" method="POST"
                                    id="user-create-update">
                                    @method('PUT')
                                    @csrf
                                    @foreach ($research_settings as $item)
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
                    <h3 class="modal-title">Create new research info</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('module.research.store') }}" method="POST" id="create_update_form">
                        @csrf
                        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
                        <input type="hidden" name="research_id" id="research_id">
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label mb-2">Source <span class="text-danger">*</span></label>
                                @error('source_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <select class="form-select" name="source_id" id="source_id">
                                <option value="0">Please select</option>
                                @foreach ($research_source as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('source_id') == $item->id ? 'selected' : '' }}>{{ $item->value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label mb-2">Title <span class="text-danger">*</span></label>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="text" class="form-control"
                                placeholder="Sustained benefits of long-term biochar application for food security and climate change mitigation"
                                value="{{ old('title') }}" name="title" id="title" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label mb-2">Category <span class="text-danger">*</span></label>
                                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <select class="form-select" name="category" id="category">
                                    <option {{ old('category') == 'National' ? 'selected' : '' }}>National</option>
                                    <option {{ old('category') == 'International' ? 'selected' : '' }}>International
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="published" class="form-label mb-2">Published date</label>
                                    @error('published')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="date" class="form-control" name="published" id="published"
                                    value="{{ old('published') }}">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="role" class="form-label mb-2">Role</label>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <select class="form-select" name="role" id="role">
                                <option {{ old('role') == 'Author' ? 'selected' : '' }}>Author</option>
                                <option {{ old('role') == 'Co-author' ? 'selected' : '' }}>Co-author</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="authors" class="form-label mb-2">Authors</label>
                                @error('authors')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input class="form-control" name="authors" id="authors"
                                placeholder="Jingrui Yang, Longlong Xia, Kees Jan van Groenigen, Xu Zhao"
                                value="{{ old('authors') }}">
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="link" class="form-label mb-2">Link</label>
                                @error('link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input class="form-control" type="text" name="link" id="link"
                                placeholder="https://www.researchgate.net/" value="{{ old('link') }}">
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="details" class="form-label mb-2">Research Details</label>
                                @error('details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <textarea class="summernote" name="details" id="details" cols="30" rows="10">{{ old('details') }}</textarea>
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

        $('#create_update_modal').on('hidden.bs.modal', function() {
            $('#create_update_form')[0].reset();
            $('#create_update_form').attr('action', '{{ route('module.research.store') }}');
            $('#end_date').prop('disabled', false);
            $('#current_degree').prop('checked', false);
            $('#create_update_form_method').val('POST');
            $('#research_id').val('');
        });

        $(document).on('click', '.btn-edit', function() {
            let research_id = $(this).data('research_id');

            $.ajax({
                url: "{{ route('module.research.edit', ':id') }}".replace(':id', research_id),
                type: 'GET',
                success: function(response) {
                    // Fill the form fields
                    $('#research_id').val(response.id);
                    $('#source_id').val(response.source_id);
                    $('#category').val(response.category);
                    $('#title').val(response.title);
                    $('#published').val(response.published);
                    $('#role').val(response.role);
                    $('#link').val(response.link);
                    $('#details').summernote('code', response.details);
                    $('#status').val(response.status);

                    const form = document.getElementById('create_update_form');
                    form.action = "{{ route('module.research.update') }}";
                    document.getElementById('create_update_form_method').value = 'PUT';

                    // Show modal
                    $('#create_update_modal').modal('show');
                }
            });
        });


        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {
                    const research_id = this.getAttribute('data-id');

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
                            window.location.href = "{{ route('module.research.delete', ':id') }}"
                                .replace(':id', research_id);

                        }
                    });
                });
            });
        });

        // Change sequence of research
        $(function() {
            $("#sortable-research").sortable({
                handle: '.fa-up-down-left-right', // Only drag by the icon
                update: function(event, ui) {
                    let order = [];
                    $('#sortable-research tr').each(function(index, element) {
                        order.push({
                            id: $(element).data('id'),
                            sequence: index + 1 // sequence starts from 1
                        });
                    });
                    // Send AJAX to update order
                    $.ajax({
                        url: '{{ route('module.research.sequence') }}',
                        method: 'POST',
                        data: {
                            order: order,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Optionally show a success message
                            Swal.fire('Updated!', 'Research order updated.', 'success');
                        },
                        error: function(xhr) {
                            Swal.fire('Error!', 'Could not update order.', 'error');
                        }
                    });
                }
            });
        });
    </script>
@endsection
{{-- Page Script End --}}
