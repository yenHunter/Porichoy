@extends('admin.layouts.vertical', ['title' => 'Experience Management'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Module', 'title' => 'Experience'])

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
                    <h4 class="card-title"> Experience Management <code>create update delete all in here</code> </h4>
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
                                <th>Logo</th>
                                <th>Position</th>
                                <th>Organization</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-experience">
                            @foreach ($experience_list as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>
                                        <i class="ti ti-arrows-move fs-42"></i>
                                    </td>
                                    <td>
                                        <img class="img-thumbnail rounded" width="50px"
                                            src="{{ asset($item->organization_logo_url) }}"
                                            alt="organization-logo">
                                    </td>
                                    <td>
                                        {{ $item->employment_position }}<br>
                                        <small>{{ $item->employment_department }}</small>
                                    </td>
                                    <td>
                                        {{ $item->employment_organization }}<br>
                                        <small>{{ $item->organization_address }}</small>
                                    </td>
                                    <td>
                                        @if ($item->employment_status === true)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-icon btn-sm btn-edit"
                                            data-experience_id="{{ $item->id }}">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </button>
                                        <button class="btn btn-danger btn-icon btn-sm btn-delete"
                                            data-experience_id="{{ $item->id }}">
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
    <form action="{{ route('module.experience.store') }}" method="POST" id="create_update_form"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
        <input type="hidden" name="experience_id" id="experience_id">
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
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="Software Engineer"
                                        value="{{ old('employment_position') }}" name="employment_position"
                                        id="employment_position" type="text" />
                                    <label for="employment_position">Position
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <select aria-label="Select Employment Type" class="form-select" name="employment_type"
                                        id="employment_type">
                                        <option value="0" selected disabled>Select type</option>
                                        @foreach ($employment_type as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('employment_type') == $item->id ? 'selected' : '' }}>
                                                {{ $item->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="employment_type">Employment Type</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="Software Development"
                                        value="{{ old('employment_department') }}" name="employment_department"
                                        id="employment_department" type="text" />
                                    <label for="employment_department">Department
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="Google Inc."
                                        value="{{ old('employment_organization') }}" name="employment_organization"
                                        id="employment_organization" type="text" />
                                    <label for="employment_organization">Organization
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="filepond-uploader form-floating">
                                    <input class="filepond" name="organization_logo" type="file" />
                                    <label for="organization_logo">Organization Logo</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="United States"
                                        value="{{ old('organization_address') }}" name="organization_address"
                                        id="organization_address" type="text">
                                    <label for="organization_address">Organization Address</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" id="current_position" type="checkbox" />
                                    <label class="form-check-label" for="current_position">
                                        I am currently working in this role
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input class="form-control" placeholder="Start Date"
                                                value="{{ old('start_date') }}" name="start_date" id="start_date"
                                                type="date">
                                            <label for="start_date">Start Date
                                                <span class="badge badge-soft-danger">required</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input class="form-control" placeholder="End Date"
                                                value="{{ old('end_date') }}" name="end_date" id="end_date"
                                                type="date">
                                            <label for="end_date">End Date</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <select aria-label="Select Status" class="form-select" name="location_type"
                                                id="location_type">
                                                <option value="0" selected disabled>Please Select</option>
                                                @foreach ($location_type as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('location_type') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                            <label for="location_type">Location Type</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="details">Details</label>
                                <div id="employment-details-editor" style="height: 300px;"></div>
                                <input type="hidden" name="employment_details" id="employment_details_hidden">
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <select aria-label="Select Status" class="form-select" name="employment_status"
                                        id="employment_status">
                                        <option selected disabled>Choose...</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <label for="employment_status">Status</label>
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
    @vite(['resources/js/pages/module-experience.js'])
@endsection
