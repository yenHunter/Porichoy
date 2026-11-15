@extends('admin.layouts.vertical', ['title' => 'Blog Category Management'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Configuration', 'title' => 'Blog Category Management'])

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
                        @if (session('error'))
                            <p class="m-0">{{ session('error') }}</p>
                        @endif
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
                    <h4 class="card-title"> Blog Category Management <code>create update delete all in here</code> </h4>
                    <a class="icon-link icon-link-hover link-primary fw-semibold" href="#"
                        data-bs-target="#create_update_modal" data-bs-toggle="modal">Create
                        <i class="ti ti-plus bi align-middle fs-lg"></i>
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped dt-responsive align-middle mb-0" data-tables="basic">
                        <thead class="thead-sm text-uppercase fs-xxs">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Posts</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blog_category_list as $item)
                                <tr>
                                    <td>
                                        {{ $item->category_name }}
                                    </td>
                                    <td>
                                        {{ $item->category_description ?: '—' }}
                                    </td>
                                    <td>
                                        {{ $item->blogs_count }}
                                    </td>
                                    <td>
                                        @if ($item->category_status === true)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-icon btn-sm btn-edit"
                                            data-blog_category_id="{{ $item->id }}">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </button>
                                        <button class="btn btn-danger btn-icon btn-sm btn-delete"
                                            data-blog_category_id="{{ $item->id }}"
                                            data-post_count="{{ $item->blogs_count }}">
                                            <i class="ti ti-trash fs-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>
    <form action="{{ route('settings.blog_category.store') }}" method="POST" id="create_update_form"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
        <input type="hidden" name="blog_category_id" id="blog_category_id">
        <div aria-hidden="true" aria-labelledby="scrollableModalTitle" class="modal fade" id="create_update_modal"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="create_update_modal_title">Create Blog Category</h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="Web Development"
                                        value="{{ old('category_name') }}" name="category_name" id="category_name"
                                        type="text" />
                                    <label for="category_name">Name
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Blog category description"
                                        name="category_description" id="category_description">{{ old('category_description') }}</textarea>
                                    <label for="category_description">Description</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <select class="form-select" name="category_status" id="category_status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <label for="category_status">Status</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-light" data-bs-dismiss="modal" href="javascript:void(0);">Close</a>
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $('#create_update_modal').on('hidden.bs.modal', function() {
            $('#create_update_form')[0].reset();
            $('#create_update_form').attr('action', '{{ route('settings.blog_category.store') }}');
            $('#create_update_form_method').val('POST');
            $('#blog_category_id').val('');
        });

        $(document).on('click', '.btn-edit', function() {
            let blog_category_id = $(this).data('blog_category_id');

            $.ajax({
                url: "{{ route('settings.blog_category.edit', ':id') }}".replace(':id', blog_category_id),
                type: 'GET',
                success: function(response) {
                    $('#blog_category_id').val(response.id);
                    $('#category_name').val(response.category_name);
                    $('#category_description').val(response.category_description);
                    $('#category_status').val(response.category_status ? '1' : '0');

                    const form = document.getElementById('create_update_form');
                    form.action = "{{ route('settings.blog_category.update') }}";
                    document.getElementById('create_update_form_method').value = 'PUT';

                    $('#create_update_modal').modal('show');
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {
                    const blog_category_id = this.getAttribute('data-blog_category_id');
                    const post_count = parseInt(this.getAttribute('data-post_count'), 10) || 0;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: post_count > 0 ?
                            `This category is used by ${post_count} post(s). Reassign them before deleting it.` :
                            "This action cannot be undone!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href =
                                "{{ route('settings.blog_category.delete', ':id') }}"
                                .replace(':id', blog_category_id);
                        }
                    });
                });
            });
        });
    </script>
@endsection
