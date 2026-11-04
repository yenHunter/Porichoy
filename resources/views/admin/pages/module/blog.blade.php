@extends('admin.layouts.vertical', ['title' => 'Blog Management'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Module', 'title' => 'Blog'])

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
                    <h4 class="card-title"> Blog Management <code>create update delete all in here</code> </h4>
                    <a class="icon-link icon-link-hover link-primary fw-semibold" href="#"
                        data-bs-target="#create_update_modal" data-bs-toggle="modal">Create
                        <i class="ti ti-plus bi align-middle fs-lg"></i>
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped dt-responsive align-middle mb-0" data-tables="basic">
                        <thead class="thead-sm text-uppercase fs-xxs">
                            <tr>
                                <th>Order</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Published</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-blog">
                            @foreach ($blog_list as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>
                                        <i class="ti ti-arrows-move fs-42"></i>
                                    </td>
                                    <td>
                                        <img class="img-thumbnail rounded" width="50px" src="{{ $item->blog_image_url }}"
                                            alt="blog-image">
                                    </td>
                                    <td>
                                        {{ $item->blog_title }}<br>
                                        <small>{{ $item->blog_excerpt }}</small>
                                    </td>
                                    <td>
                                        {{ $item->category?->category_name ?? 'No Category' }}
                                    </td>
                                    <td>
                                        {{ $item->blog_published?->format('j M, Y') ?? 'Not published' }}
                                    </td>
                                    <td>
                                        @if ($item->blog_status === true)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-icon btn-sm btn-edit"
                                            data-blog_id="{{ $item->id }}">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </button>
                                        <button class="btn btn-danger btn-icon btn-sm btn-delete"
                                            data-blog_id="{{ $item->id }}">
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
    <form action="{{ route('module.blog.store') }}" method="POST" id="create_update_form"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
        <input type="hidden" name="blog_id" id="blog_id">
        <div aria-hidden="true" aria-labelledby="create_update_modal_title" class="modal fade" id="create_update_modal"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="create_update_modal_title">Create blog post</h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="Why clean architecture matters"
                                        value="{{ old('blog_title') }}" name="blog_title" id="blog_title" type="text" />
                                    <label for="blog_title">Blog Title
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Short summary shown on the listing page"
                                        name="blog_excerpt" id="blog_excerpt">{{ old('blog_excerpt') }}</textarea>
                                    <label for="blog_excerpt">Blog Excerpt</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="blog-content-editor">Content</label>
                                <div id="blog-content-editor" style="height: 300px;"></div>
                                <input type="hidden" name="blog_content" id="blog_content_hidden">
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="laravel, php, architecture"
                                        value="{{ old('keywords') }}" name="keywords" id="keywords" type="text" />
                                    <label for="keywords">Tags
                                        <span class="text-muted fs-xs">(comma separated)</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="filepond-uploader form-floating">
                                    <input class="filepond" name="blog_image" type="file" />
                                    <label for="blog_image">Blog Image</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="filepond-uploader form-floating">
                                    <input class="filepond" name="blog_featured_image" type="file" />
                                    <label for="blog_featured_image">Featured Image</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <select aria-label="Select Category" class="form-select" name="category_id"
                                        id="category_id">
                                        <option value="" selected>Choose Category...</option>
                                        @foreach ($blog_categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="category_id">Category</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" value="{{ old('blog_published') }}"
                                        name="blog_published" id="blog_published" type="datetime-local" />
                                    <label for="blog_published">Publish Date</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <select aria-label="Select Status" class="form-select" name="blog_status"
                                        id="blog_status">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <label for="blog_status">Status</label>
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
    @vite(['resources/js/pages/module-blog.js'])
@endsection
