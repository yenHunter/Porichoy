@extends('admin.layouts.vertical', ['title' => 'Project Management'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Element', 'title' => 'Project'])

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
                    <div>
                        <h4 class="card-title mb-1">Project Management</h4>
                        <p class="small mb-0 text-info">Manage all your projects here. Create new projects, edit existing
                            ones, or remove outdated entries.</p>
                    </div>
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
                                <th>Client</th>
                                <th>Duration</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-project">
                            @foreach ($project_list as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>
                                        <i class="ti ti-arrows-move fs-lg"></i>
                                    </td>
                                    <td>
                                        <img alt="Project Image" class="avatar-lg rounded"
                                            src="{{ $item->project_profile_image_url }}">
                                    </td>
                                    <td>
                                        {{ $item->project_title }}
                                        <br>
                                        <small>{{ $item->service?->service_title ?? 'N/A' }}</small>
                                    </td>
                                    <td>
                                        <img class="avatar-sm rounded-circle me-2" src="{{ $item->client?->client_picture_url }}"
                                            alt="">
                                        {{ $item->client?->client_name ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $item->project_date_range }}
                                    </td>
                                    <td>
                                        @if ($item->project_status === true)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-icon btn-sm btn-edit"
                                            data-project_id="{{ $item->id }}">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </button>
                                        <button class="btn btn-danger btn-icon btn-sm btn-delete"
                                            data-project_id="{{ $item->id }}">
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
    <form action="{{ route('element.project.store') }}" method="POST" id="create_update_form"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
        <input type="hidden" name="project_id" id="project_id">
        <div aria-hidden="true" aria-labelledby="scrollableModalTitle" class="modal fade" id="create_update_modal"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="create_update_modal_title">Create project info</h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="e.g., Personal Portfolio Website Design"
                                        value="{{ old('project_title') }}" name="project_title" id="project_title"
                                        type="text" required />
                                    <label for="project_title">Title
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <select aria-label="Select Client" class="form-select" name="client_id" id="client_id">
                                        <option value="">Select a client</option>
                                        @forelse ($client_list as $client)
                                            <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                                        @empty
                                            <option disabled>No clients available</option>
                                        @endforelse
                                    </select>
                                    <label for="client_id">Client</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <select aria-label="Select Service" class="form-select" name="service_id" id="service_id">
                                        <option value="">Select a service</option>
                                        @forelse ($service_list as $service)
                                            <option value="{{ $service->id }}">{{ $service->service_title }}</option>
                                        @empty
                                            <option disabled>No services available</option>
                                        @endforelse
                                    </select>
                                    <label for="service_id">Service</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="e.g., 2024-01-15"
                                        value="{{ old('start_date') }}" name="start_date" id="start_date" type="date"
                                        required />
                                    <label for="start_date">Start date
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="e.g., 2024-06-30 (leave empty if ongoing)"
                                        value="{{ old('end_date') }}" name="end_date" id="end_date" type="date" />
                                    <label for="end_date">End date</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="profile_image">Profile image</label>
                                <div class="filepond-uploader">
                                    <input accept="image/jpeg,image/png,image/gif,image/webp" class="filepond"
                                        name="profile_image" type="file" />
                                </div>
                                <div class="d-flex align-items-center gap-2 mt-2 d-none" id="current_profile_image">
                                    <img alt="Current profile image" class="avatar-lg rounded"
                                        id="current_profile_image_preview" src="">
                                    <div class="small text-muted">
                                        <span class="d-block fw-semibold text-body">Current profile image</span>
                                        Choose a new file to replace it, or remove it.
                                    </div>
                                    <button class="btn btn-sm btn-soft-danger ms-auto"
                                        id="current_profile_image_remove" type="button">
                                        <i class="ti ti-trash fs-lg"></i> Remove
                                    </button>
                                </div>
                                <div class="small text-danger mt-2 d-none" id="current_profile_image_removed">
                                    The profile image will be removed when you save.
                                    <button class="btn btn-link btn-sm p-0 align-baseline"
                                        id="current_profile_image_undo" type="button">Undo</button>
                                </div>
                                <input id="remove_profile_image" name="remove_profile_image" type="hidden" value="0">
                                <div class="form-text">JPEG, PNG, GIF or WebP — up to 10 MB.</div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="cover_image">Cover image</label>
                                <div class="filepond-uploader">
                                    <input accept="image/jpeg,image/png,image/gif,image/webp" class="filepond"
                                        name="cover_image" type="file" />
                                </div>
                                <div class="d-flex align-items-center gap-2 mt-2 d-none" id="current_cover_image">
                                    <img alt="Current cover image" class="avatar-lg rounded"
                                        id="current_cover_image_preview" src="">
                                    <div class="small text-muted">
                                        <span class="d-block fw-semibold text-body">Current cover image</span>
                                        Choose a new file to replace it, or remove it.
                                    </div>
                                    <button class="btn btn-sm btn-soft-danger ms-auto" id="current_cover_image_remove"
                                        type="button">
                                        <i class="ti ti-trash fs-lg"></i> Remove
                                    </button>
                                </div>
                                <div class="small text-danger mt-2 d-none" id="current_cover_image_removed">
                                    The cover image will be removed when you save.
                                    <button class="btn btn-link btn-sm p-0 align-baseline" id="current_cover_image_undo"
                                        type="button">Undo</button>
                                </div>
                                <input id="remove_cover_image" name="remove_cover_image" type="hidden" value="0">
                                <div class="form-text">JPEG, PNG, GIF or WebP — up to 10 MB.</div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" value="{{ old('project_location') }}"
                                        placeholder="e.g., GitHub, Figma, Live URL, or deployment platform"
                                        name="project_location" id="project_location" type="text" />
                                    <label for="project_location">Location</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="project-details-editor">Details</label>
                                <div id="project-details-editor" style="height: 300px;"></div>
                                <input type="hidden" name="project_details" id="project_details_hidden">
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="e.g., Client needed a modern e-commerce solution to increase online sales..."
                                        name="project_background" id="project_background" style="height: 120px">{{ old('project_background') }}</textarea>
                                    <label for="project_background">Background</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="e.g., Legacy checkout, no mobile support, slow catalogue pages..."
                                        name="project_challenges" id="project_challenges" style="height: 120px">{{ old('project_challenges') }}</textarea>
                                    <label for="project_challenges">Challenges</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="e.g., Built with React, Node.js, and MongoDB. Implemented features like product catalog, checkout, and admin dashboard..."
                                        name="project_solution" id="project_solution" style="height: 120px">{{ old('project_solution') }}</textarea>
                                    <label for="project_solution">Solution</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <select aria-label="Select Status" class="form-select" name="project_status"
                                        id="project_status">
                                        <option selected value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <label for="project_status">Status</label>
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
    @vite(['resources/js/pages/element-project.js'])
@endsection
