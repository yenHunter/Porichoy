@extends('admin.layouts.vertical', ['title' => 'Training Management'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Module', 'title' => 'Training'])

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
                    <h4 class="card-title"> Training Management <code>create update delete all in here</code> </h4>
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
                                <th>Certificate</th>
                                <th>Title</th>
                                <th>Institute</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-training">
                            @foreach ($training_list as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>
                                        <i class="ti ti-arrows-move fs-lg"></i>
                                    </td>
                                    <td>
                                        @if ($item->certificate_url)
                                            <a href="{{ $item->certificate_url }}" rel="noopener" target="_blank">
                                                <img class="img-thumbnail rounded" width="50px"
                                                    src="{{ asset('static/module/training.png') }}" alt="certificate">
                                            </a>
                                        @else
                                            <img class="img-thumbnail rounded opacity-50" width="50px"
                                                src="{{ asset('static/module/training.png') }}" alt="no certificate">
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->training_title }}
                                        <br>
                                        <small>{{ $item->category->value }}</small>
                                    </td>
                                    <td>
                                        {{ $item->training_institute }}<br>
                                        <small>
                                            {{ $item->date_range }}
                                        </small>
                                    </td>
                                    <td>
                                        @if ($item->training_status === true)
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
                                        <button class="btn btn-danger btn-sm btn-delete" data-training_id="{{ $item->id }}">
                                            <i class="fas fa-trash"></i> delete
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
    <form action="{{ route('module.training.store') }}" method="POST" id="create_update_form"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
        <input type="hidden" name="training_id" id="training_id">
        <div aria-hidden="true" aria-labelledby="scrollableModalTitle" class="modal fade" id="create_update_modal"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="create_update_modal_title">Create training info</h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <select class="form-select" name="training_category" id="training_category" required>
                                        <option disabled value="">Choose a category...</option>
                                        @foreach ($training_category as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('training_category') == $item->id ? 'selected' : '' }}>
                                                {{ $item->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="training_category">Category
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Introduction to Data Science"
                                        value="{{ old('training_title') }}" name="training_title" id="training_title"
                                        required>
                                    <label for="training_title">Title
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Cisco Networking Academy"
                                        value="{{ old('training_institute') }}" name="training_institute"
                                        id="training_institute" required>
                                    <label for="training_institute">Institute
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input class="form-control" value="{{ old('start_date') }}"
                                                name="start_date" id="start_date" type="date">
                                            <label for="start_date">Start date</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input class="form-control" value="{{ old('end_date') }}" name="end_date"
                                                id="end_date" type="date">
                                            <label for="end_date">End date</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" value="{{ old('training_location') }}"
                                        placeholder="San Francisco, California, United States" name="training_location"
                                        id="training_location" type="text">
                                    <label for="training_location">Location</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Certificate</label>
                                <div class="filepond-uploader">
                                    <input accept="application/pdf,image/jpeg,image/png" class="filepond"
                                        name="training_certificate" type="file" />
                                </div>
                                <div class="d-flex align-items-center gap-2 mt-2 d-none" id="current_training_certificate">
                                    <i class="ti ti-file-certificate fs-2 text-primary"></i>
                                    <div class="small text-muted">
                                        <a class="d-block fw-semibold text-body text-decoration-underline"
                                            href="" id="current_training_certificate_link" rel="noopener"
                                            target="_blank">Current certificate</a>
                                        Choose a new file or link to replace it, or remove it.
                                    </div>
                                    <button class="btn btn-sm btn-soft-danger ms-auto"
                                        id="current_training_certificate_remove" type="button">
                                        <i class="ti ti-trash fs-lg"></i> Remove
                                    </button>
                                </div>
                                <div class="small text-danger mt-2 d-none" id="current_training_certificate_removed">
                                    The certificate will be removed when you save.
                                    <button class="btn btn-link btn-sm p-0 align-baseline"
                                        id="current_training_certificate_undo" type="button">Undo</button>
                                </div>
                                <input id="remove_training_certificate" name="remove_training_certificate"
                                    type="hidden" value="0">
                                <div class="form-floating mt-2">
                                    <input class="form-control" value="{{ old('training_certificate') }}"
                                        placeholder="https://www.netacad.com/certificates/example"
                                        name="training_certificate" id="training_certificate_link" type="url" />
                                    <label for="training_certificate_link">Certificate link</label>
                                </div>
                                <div class="form-text">PDF, JPG or PNG — up to 10 MB. A picked file replaces the
                                    link, and a link replaces a stored file.</div>
                            </div>
                            <div class="col-lg-12">
                                <label for="details">Details</label>
                                <div id="training-details-editor" style="height: 300px;"></div>
                                <input type="hidden" name="training_details" id="training_details_hidden">
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <select aria-label="Select Status" class="form-select" name="training_status"
                                        id="training_status">
                                        <option selected value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <label for="training_status">Status</label>
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
    @vite(['resources/js/pages/module-training.js'])
@endsection
