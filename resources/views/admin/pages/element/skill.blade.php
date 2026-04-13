@extends('admin.layouts.vertical', ['title' => 'Skill Management'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css', 'node_modules/nouislider/dist/nouislider.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Module', 'title' => 'Skill'])

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
                        <h4 class="card-title mb-1">Skill Management</h4>
                        <p class="small mb-0 text-info">Manage all your skills here. Create new skills, edit existing ones, or remove outdated entries.</p>
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
                                <th>Logo</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-skill">
                            @foreach ($skill_list as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>
                                        <i class="ti ti-arrows-move fs-42"></i>
                                    </td>
                                    <td>
                                        <img class="img-thumbnail rounded" width="50px" src="{{ $item->skill_logo_url }}"
                                            alt="skill-logo">
                                    </td>
                                    <td>
                                        {{ $item->skill_title }}<br>
                                        <small>{{ $item->skill_score ? $item->skill_score . '%' : '' }}</small>
                                    </td>
                                    <td>
                                        @if ($item->skill_status === true)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-icon btn-sm btn-edit"
                                            data-skill_id="{{ $item->id }}">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </button>
                                        <button class="btn btn-danger btn-icon btn-sm btn-delete"
                                            data-skill_id="{{ $item->id }}">
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
    <form action="{{ route('element.skill.store') }}" method="POST" id="create_update_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
        <input type="hidden" name="skill_id" id="skill_id">
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
                                <label class="form-label" for="skill_title">Skill Title
                                    <span class="badge badge-soft-danger">required</span>
                                </label>
                                <input class="form-control @error('skill_title') is-invalid @enderror"
                                    placeholder="e.g., Python, JavaScript, UI Design" value="{{ old('skill_title') }}"
                                    name="skill_title" id="skill_title" type="text" required />
                                <div class="invalid-feedback">
                                    @error('skill_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="skill_logo">Skill Logo</label>
                                <div class="filepond-uploader">
                                    <input class="filepond @error('skill_logo') is-invalid @enderror" name="skill_logo" type="file" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label pb-3" for="skill_score">Skill Score (Proficiency Level)</label>
                                <div id="slider-vertical-tooltip"></div>
                                <input type="hidden" id="skill_score" name="skill_score">
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="skill_details">Details & Description</label>
                                <div id="skill-details-editor" style="height: 300px;"></div>
                                <input type="hidden" name="skill_details" id="skill_details_hidden">
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="skill_status">Status</label>
                                <select aria-label="Select Status"
                                    class="form-select @error('skill_status') is-invalid @enderror"
                                    name="skill_status" id="skill_status" required>
                                    <option selected disabled>Choose a status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <div class="invalid-feedback">
                                    @error('skill_status')
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
    @vite(['resources/js/pages/element-skill.js'])
@endsection
