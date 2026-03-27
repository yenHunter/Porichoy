@extends('admin.layouts.vertical', ['title' => 'Education Management'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Module', 'title' => 'Education'])

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
                    <h4 class="card-title"> Education Management <code>create update delete all in here</code> </h4>
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
                                <th>Degree</th>
                                <th>Institute</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-education">
                            @foreach ($education_list as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>
                                        <i class="ti ti-arrows-move fs-42"></i>
                                    </td>
                                    <td>
                                        <img class="img-thumbnail rounded" width="50px" src="{{ $item->logo_url }}"
                                            alt="institute-logo">
                                    </td>
                                    <td>
                                        {{ $item->education_degree }}<br>
                                        <small>{{ $item->education_subject }}</small>
                                    </td>
                                    <td>
                                        {{ $item->education_institute }}<br>
                                        <small>{{ $item->institute_address }}</small>
                                    </td>
                                    <td>
                                        @if ($item->education_status === true)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-icon btn-sm btn-edit"
                                            data-education_id="{{ $item->id }}">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </button>
                                        <button class="btn btn-danger btn-icon btn-sm btn-delete"
                                            data-education_id="{{ $item->id }}">
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
    <form action="{{ route('module.education.store') }}" method="POST" id="create_update_form"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
        <input type="hidden" name="education_id" id="education_id">
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
                                    <input class="form-control" placeholder="Bachelor of Science (BSc)"
                                        value="{{ old('education_degree') }}" name="education_degree" id="education_degree"
                                        type="text" />
                                    <label for="education_degree">Degree
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="Computer Engineering"
                                        value="{{ old('education_subject') }}" name="education_subject"
                                        id="education_subject" type="text" />
                                    <label for="education_subject">Subject
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="Cambridge University"
                                        value="{{ old('education_institute') }}" name="education_institute"
                                        id="education_institute" type="text" />
                                    <label for="education_institute">Institute
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="filepond-uploader form-floating">
                                    <input class="filepond" name="institute_logo" type="file" />
                                    <label for="institute_logo">Institute Logo</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" placeholder="United Kingdom"
                                        value="{{ old('institute_address') }}" name="institute_address"
                                        id="institute_address" type="text">
                                    <label for="institute_address">Institute Address</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" id="current_degree" type="checkbox" />
                                    <label class="form-check-label" for="current_degree">I am currently studing in this
                                        degree</label>
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
                                            <input class="form-control" placeholder="CGPA 3.75"
                                                value="{{ old('education_result') }}" name="education_result"
                                                id="education_result" type="text">
                                            <label for="education_result">Result</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="details">Details</label>
                                <div id="education-details-editor" style="height: 300px;"></div>
                                <input type="hidden" name="education_details" id="education_details_hidden">
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <select aria-label="Select Status" class="form-select" name="education_status"
                                        id="education_status">
                                        <option selected disabled>Choose...</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <label for="education_status">Status</label>
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
    @vite(['resources/js/pages/module-education.js'])
@endsection
