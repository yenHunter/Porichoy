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
                    <h4 class="card-title"> Client Management <code>create update delete all in here</code> </h4>
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
                                        <i class="ti ti-arrows-move fs-42"></i>
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
                                <div class="form-floating">
                                    <input class="form-control" placeholder="John Doe" value="{{ old('client_name') }}"
                                        name="client_name" id="client_name" type="text" />
                                    <label for="client_name">Client Name
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="john@example.com" value="{{ old('client_email') }}"
                                        name="client_email" id="client_email" type="email" />
                                    <label for="client_email">Client Email
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="+1 (555) 000-0000" value="{{ old('client_mobile') }}"
                                        name="client_mobile" id="client_mobile" type="text" />
                                    <label for="client_mobile">Client Mobile</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="Senior Manager" value="{{ old('client_designation') }}"
                                        name="client_designation" id="client_designation" type="text" />
                                    <label for="client_designation">Client Designation</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="ABC Corporation" value="{{ old('client_organization') }}"
                                        name="client_organization" id="client_organization" type="text" />
                                    <label for="client_organization">Client Organization</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="123 Main Street, City, Country" value="{{ old('client_address') }}"
                                        name="client_address" id="client_address" type="text" />
                                    <label for="client_address">Client Address</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="https://example.com" value="{{ old('organization_website') }}"
                                        name="organization_website" id="organization_website" type="url" />
                                    <label for="organization_website">Organization Website</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filepond-uploader form-floating">
                                    <input class="filepond" name="client_picture" type="file" accept="image/*" />
                                    <label for="client_picture">Client Picture</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filepond-uploader form-floating">
                                    <input class="filepond" name="organization_logo" type="file" accept="image/*" />
                                    <label for="organization_logo">Organization Logo
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <select aria-label="Select Status" class="form-select" name="client_status"
                                        id="client_status">
                                        <option selected disabled>Choose...</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <label for="client_status">Status</label>
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
    @vite(['resources/js/pages/element-client.js'])
@endsection
