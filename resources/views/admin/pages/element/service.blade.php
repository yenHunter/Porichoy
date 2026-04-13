@extends('admin.layouts.vertical', ['title' => 'Service Management'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Module', 'title' => 'Service'])

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
                        <h4 class="card-title mb-1">Service Management</h4>
                        <p class="small mb-0 text-info">Manage all your services here. Create new services, edit existing ones, or remove outdated entries.</p>
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
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-service">
                            @foreach ($service_list as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>
                                        <i class="ti ti-arrows-move fs-42"></i>
                                    </td>
                                    <td>
                                        <img class="img-thumbnail rounded" width="50px"
                                            src="{{ $item->service_icon_url }}" alt="service-icon">
                                    </td>
                                    <td>
                                        {{ $item->service_title }}
                                        <br>
                                        <small>{{ $item->service_subtitle ?? '' }}</small>
                                    </td>
                                    <td>
                                        @if ($item->service_status === true)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-icon btn-sm btn-edit"
                                            data-service_id="{{ $item->id }}">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </button>
                                        <button class="btn btn-danger btn-icon btn-sm btn-delete"
                                            data-service_id="{{ $item->id }}">
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
    <form action="{{ route('element.service.store') }}" method="POST" id="create_update_form"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
        <input type="hidden" name="service_id" id="service_id">
        <div aria-hidden="true" aria-labelledby="scrollableModalTitle" class="modal fade" id="create_update_modal"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="create_update_modal_title">Create service info</h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <label class="form-label" for="service_title">Service Title
                                    <span class="badge badge-soft-danger">required</span>
                                </label>
                                <input class="form-control @error('service_title') is-invalid @enderror"
                                    placeholder="e.g., Web Development, UI/UX Design, Mobile App Development" value="{{ old('service_title') }}" name="service_title" id="service_title"
                                    type="text" required />
                                <div class="invalid-feedback">
                                    @error('service_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="service_subtitle">Service Subtitle</label>
                                <input class="form-control @error('service_subtitle') is-invalid @enderror"
                                    placeholder="e.g., Professional web solutions, Creative design approach, Fast & scalable apps"
                                    value="{{ old('service_subtitle') }}" name="service_subtitle" id="service_subtitle"
                                    type="text" />
                                <div class="invalid-feedback">
                                    @error('service_subtitle')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="service_icon">Service Icon</label>
                                <div class="filepond-uploader">
                                    <input class="filepond @error('service_icon') is-invalid @enderror" name="service_icon" type="file" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="profile_image">Profile Image</label>
                                <div class="filepond-uploader">
                                    <input class="filepond @error('profile_image') is-invalid @enderror" name="profile_image" type="file" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="cover_image">Cover Image</label>
                                <div class="filepond-uploader">
                                    <input class="filepond @error('cover_image') is-invalid @enderror" name="cover_image" type="file" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="service_details">Details & Description</label>
                                <div id="service-details-editor" style="height: 300px;"></div>
                                <input type="hidden" name="service_details" id="service_details_hidden">
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="service_skills">Skills</label>
                                <select class="form-select @error('service_skills') is-invalid @enderror" id="service_skills" name="service_skills[]" multiple>
                                    <option selected="" value="0" disabled>Select skills related to this service</option>
                                    @forelse ($skill_list as $skill)
                                        <option value="{{ $skill->id }}">{{ $skill->skill_title }}</option>
                                    @empty
                                        <option disabled>No skills available</option>
                                    @endforelse
                                </select>
                                <div class="invalid-feedback">
                                    @error('service_skills')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="service_status">Status</label>
                                <select aria-label="Select Status"
                                    class="form-select @error('service_status') is-invalid @enderror" name="service_status"
                                    id="service_status" required>
                                    <option selected disabled>Choose a status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <div class="invalid-feedback">
                                    @error('service_status')
                                        {{ $message }}
                                    @enderror
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
    @vite(['resources/js/pages/element-service.js'])
@endsection
