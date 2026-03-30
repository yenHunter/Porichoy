@extends('admin.layouts.vertical', ['title' => 'Research Management'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Module', 'title' => 'Research'])

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
                    <h4 class="card-title"> Research Management <code>create update delete all in here</code> </h4>
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
                                <th>Source</th>
                                <th>Title</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-research">
                            @foreach ($research_list as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>
                                        <i class="ti ti-arrows-move fs-42"></i>
                                    </td>
                                    <td>
                                        <img class="img-thumbnail rounded" width="50px"
                                            src="{{ asset($item->source->details) }}" alt="source-logo">
                                    </td>
                                    <td>
                                        <a href="{{ $item->link }}" class="text-dark"
                                            target="_blank">{{ $item->research_title }}</a>
                                        <br>
                                        <small>{{ $item->research_category }}</small>
                                    </td>
                                    <td>
                                        {{ $item->research_role }}<br>
                                        <small>{{ $item->published_formatted }}</small>
                                    </td>
                                    <td>
                                        @if ($item->research_status === true)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-icon btn-sm btn-edit"
                                            data-research_id="{{ $item->id }}">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </button>
                                        <button class="btn btn-danger btn-icon btn-sm btn-delete"
                                            data-research_id="{{ $item->id }}">
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
    <form action="{{ route('module.research.store') }}" method="POST" id="create_update_form"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
        <input type="hidden" name="research_id" id="research_id">
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
                                    <select class="form-select" name="research_source" id="research_source" required>
                                        <option selected disabled>Choose...</option>
                                        @foreach ($research_source as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('research_source') == $item->id ? 'selected' : '' }}>
                                                {{ $item->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="research_source">Source
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control"
                                        placeholder="Sustained benefits of long-term biochar application for food security and climate change mitigation"
                                        value="{{ old('research_title') }}" name="research_title" id="research_title"
                                        required>
                                    <label for="research_title">Title
                                        <span class="badge badge-soft-danger">required</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <select class="form-select" name="research_category" id="research_category">
                                                <option selected disabled>Choose...</option>
                                                <option {{ old('category') == 'National' ? 'selected' : '' }}>
                                                    National
                                                </option>
                                                <option {{ old('category') == 'International' ? 'selected' : '' }}>
                                                    International
                                                </option>
                                            </select>
                                            <label for="research_category">Category</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input class="form-control" value="{{ old('published_date') }}"
                                                name="published_date" id="published_date" type="date">
                                            <label for="published_date">Published date</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <select class="form-select" name="research_role" id="research_role">
                                                <option selected disabled>Choose...</option>
                                                <option {{ old('research_role') == 'Author' ? 'selected' : '' }}>
                                                    Author
                                                </option>
                                                <option {{ old('research_role') == 'Co-author' ? 'selected' : '' }}>
                                                    Co-author
                                                </option>
                                            </select>
                                            <label for="research_role">Role</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" value="{{ old('research_authors') }}"
                                        placeholder="Jingrui Yang, Longlong Xia, Kees Jan van Groenigen, Xu Zhao"
                                        name="research_authors" id="research_authors" type="text">
                                    <label for="research_authors">Authors</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input class="form-control" value="{{ old('research_link') }}"
                                        placeholder="https://www.researchgate.net/" name="research_link"
                                        id="research_link" type="text" />
                                    <label for="research_link">Link</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="details">Details</label>
                                <div id="research-details-editor" style="height: 300px;"></div>
                                <input type="hidden" name="research_details" id="research_details_hidden">
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <select aria-label="Select Status" class="form-select" name="research_status"
                                        id="research_status">
                                        <option selected disabled>Choose...</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <label for="research_status">Status</label>
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
    @vite(['resources/js/pages/module-research.js'])
@endsection
