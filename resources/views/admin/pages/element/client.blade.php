@extends('admin.layouts.vertical', ['title' => 'Client Management'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Element', 'title' => 'Client'])

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
                        <h4 class="card-title mb-1">Client Management</h4>
                        <p class="small mb-0 text-info">Manage all your clients here. Create new clients, edit existing ones, or remove outdated entries.</p>
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
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Organization</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-client">
                            @foreach ($client_list as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>
                                        <i class="ti ti-arrows-move fs-lg"></i>
                                    </td>
                                    <td>
                                        <img class="img-thumbnail rounded" width="50px" src="{{ $item->client_picture_url }}"
                                            alt="client-picture">
                                    </td>
                                    <td>
                                        <strong>{{ $item->client_name }}</strong><br>
                                        <small>{{ $item->client_designation ? $item->client_designation : 'N/A' }}</small>
                                    </td>
                                    <td>
                                        {{ $item->client_email }}<br>
                                        <small>{{ $item->client_mobile ? $item->client_mobile : 'N/A' }}</small>
                                    </td>
                                    <td>
                                        {{ $item->client_organization ? $item->client_organization : 'N/A' }}
                                    </td>
                                    <td>
                                        @if ($item->client_status === true)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-icon btn-sm btn-edit"
                                            data-client_id="{{ $item->id }}">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </button>
                                        <button class="btn btn-danger btn-icon btn-sm btn-delete"
                                            data-client_id="{{ $item->id }}">
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

    <form action="{{ route('element.client.store') }}" method="POST" id="create_update_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
        <input type="hidden" name="client_id" id="client_id">
        <div aria-hidden="true" aria-labelledby="scrollableModalTitle" class="modal fade" id="create_update_modal"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="create_update_modal_title">Create client info</h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label class="form-label" for="client_name">Client Name
                                    <span class="badge badge-soft-danger">required</span>
                                </label>
                                <input class="form-control" placeholder="e.g., John Doe, Sarah Smith" value="{{ old('client_name') }}"
                                    name="client_name" id="client_name" type="text" required />
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="client_designation">Client Designation</label>
                                <input class="form-control" placeholder="e.g., Project Manager, CEO, Marketing Director" value="{{ old('client_designation') }}"
                                    name="client_designation" id="client_designation" type="text" />
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="client_email">Client Email
                                    <span class="badge badge-soft-danger">required</span>
                                </label>
                                <input class="form-control" placeholder="e.g., john@example.com" value="{{ old('client_email') }}"
                                    name="client_email" id="client_email" type="email" required />
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="client_mobile">Client Mobile</label>
                                <input class="form-control" placeholder="e.g., +1 (555) 000-0000 or +88 01700 000000" value="{{ old('client_mobile') }}"
                                    name="client_mobile" id="client_mobile" type="text" />
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="client_organization">Client Organization</label>
                                <input class="form-control" placeholder="e.g., Tech Innovations Inc., Digital Solutions Ltd." value="{{ old('client_organization') }}"
                                    name="client_organization" id="client_organization" type="text" />
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="client_address">Client Address</label>
                                <input class="form-control" placeholder="e.g., 123 Main Street, New York, NY 10001" value="{{ old('client_address') }}"
                                    name="client_address" id="client_address" type="text" />
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="organization_website">Organization Website</label>
                                <input class="form-control" placeholder="e.g., https://example.com" value="{{ old('organization_website') }}"
                                    name="organization_website" id="organization_website" type="url" />
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="client_picture">Client Picture</label>
                                <div class="filepond-uploader">
                                    <input accept="image/jpeg,image/png,image/gif,image/webp" class="filepond"
                                        name="client_picture" type="file" />
                                </div>
                                <div class="d-flex align-items-center gap-2 mt-2 d-none" id="current_client_picture">
                                    <img alt="Current client picture" class="img-thumbnail rounded" height="48"
                                        id="current_client_picture_image" src="" width="48">
                                    <div class="small text-muted">
                                        <span class="d-block fw-semibold text-body">Current picture</span>
                                        Choose a new image to replace it, or remove it.
                                    </div>
                                    <button class="btn btn-sm btn-soft-danger ms-auto" id="current_client_picture_remove"
                                        type="button">
                                        <i class="ti ti-trash fs-lg"></i> Remove
                                    </button>
                                </div>
                                <div class="small text-danger mt-2 d-none" id="current_client_picture_removed">
                                    The picture will be removed when you save.
                                    <button class="btn btn-link btn-sm p-0 align-baseline" id="current_client_picture_undo"
                                        type="button">Undo</button>
                                </div>
                                <input id="remove_client_picture" name="remove_client_picture" type="hidden" value="0">
                                <div class="form-text">JPEG, PNG, GIF or WebP — up to 10 MB.</div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="organization_logo">Organization Logo</label>
                                <div class="filepond-uploader">
                                    <input accept="image/jpeg,image/png,image/gif,image/webp" class="filepond"
                                        name="organization_logo" type="file" />
                                </div>
                                <div class="d-flex align-items-center gap-2 mt-2 d-none" id="current_organization_logo">
                                    <img alt="Current organization logo" class="img-thumbnail rounded" height="48"
                                        id="current_organization_logo_image" src="" width="48">
                                    <div class="small text-muted">
                                        <span class="d-block fw-semibold text-body">Current logo</span>
                                        Choose a new image to replace it, or remove it.
                                    </div>
                                    <button class="btn btn-sm btn-soft-danger ms-auto" id="current_organization_logo_remove"
                                        type="button">
                                        <i class="ti ti-trash fs-lg"></i> Remove
                                    </button>
                                </div>
                                <div class="small text-danger mt-2 d-none" id="current_organization_logo_removed">
                                    The logo will be removed when you save.
                                    <button class="btn btn-link btn-sm p-0 align-baseline" id="current_organization_logo_undo"
                                        type="button">Undo</button>
                                </div>
                                <input id="remove_organization_logo" name="remove_organization_logo" type="hidden" value="0">
                                <div class="form-text">JPEG, PNG, GIF or WebP — up to 10 MB. Without a logo the listing shows the placeholder.</div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="client_status">Status</label>
                                <select aria-label="Select Status" class="form-select" name="client_status"
                                    id="client_status">
                                    <option selected value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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
    @vite(['resources/js/pages/element-client.js'])
@endsection
