@extends('admin.layouts.vertical', ['title' => 'Testimonial'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css', 'node_modules/nouislider/dist/nouislider.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Element', 'title' => 'Testimonial'])

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
                        <h4 class="card-title mb-1">Testimonials Management</h4>
                        <p class="small mb-0 text-info">Manage all your skills here. Create new skills, edit existing ones,
                            or remove outdated entries.</p>
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
                                <th>Client</th>
                                <th>Title</th>
                                <th>Review</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-testimonial">
                            @foreach ($testimonial_list as $testimonial)
                                <tr data-id="{{ $testimonial->id }}">
                                    <td>
                                        <i class="ti ti-arrows-move cursor-grab"></i>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">
                                            {{ $testimonial->client?->client_name ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-truncate">{{ $testimonial->title ?? 'Untitled' }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $testimonial->review)
                                                    <i class="ti ti-star-filled text-warning"></i>
                                                @else
                                                    <i class="ti ti-star text-muted"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </td>
                                    <td>
                                        @if ($testimonial->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-icon btn-sm btn-edit"
                                            data-testimonial_id="{{ $testimonial->id }}" title="Edit">
                                            <i class="ti ti-edit"></i>
                                        </button>
                                        <button class="btn btn-icon btn-sm btn-delete"
                                            data-testimonial_id="{{ $testimonial->id }}" title="Delete">
                                            <i class="ti ti-trash text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
                        <h5 class="modal-title" id="create_update_modal_title">Create testimonial info</h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <label class="form-label" for="client_id">Client
                                    <span class="badge badge-soft-danger">required</span>
                                </label>
                                <select class="form-select @error('client_id') is-invalid @enderror" id="client_id"
                                    name="client_id" required>
                                    <option selected disabled>Choose a client</option>
                                    @foreach ($client_list as $client)
                                        <option value="{{ $client->id }}">
                                            {{ $client->client_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('client_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="skill_logo">Skill Logo</label>
                                <div class="filepond-uploader">
                                    <input class="filepond @error('skill_logo') is-invalid @enderror" name="skill_logo"
                                        type="file" />
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
                                    class="form-select @error('skill_status') is-invalid @enderror" name="skill_status"
                                    id="skill_status" required>
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

    <!-- Create/Update Modal -->
    <div class="modal fade" id="create_update_modall" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create_update_modal_title">Create Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="create_update_form" method="POST" action="{{ route('element.testimonial.store') }}">
                    @csrf
                    <input type="hidden" name="_method" id="create_update_form_method" value="POST" />
                    <input type="hidden" name="testimonial_id" id="testimonial_id" />

                    <div class="modal-body">
                        <!-- Client Selection -->
                        <div class="mb-3">
                            <label class="form-label" for="client_id">Client <span class="text-danger">*</span></label>
                            <select class="form-select @error('client_id') is-invalid @enderror" id="client_id"
                                name="client_id" required>
                                <option selected disabled>Choose a client</option>
                                @foreach ($client_list as $client)
                                    <option value="{{ $client->id }}">
                                        {{ $client->client_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div class="mb-3">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                id="title" name="title" placeholder="e.g. Amazing Service" />
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Review Rating -->
                        <div class="mb-3">
                            <label class="form-label" for="review">Rating <span class="text-danger">*</span></label>
                            <div class="rating-stars">
                                <div id="slider-review"></div>
                                <div class="mt-2">
                                    <span id="review-display" class="badge bg-warning">★★★★★</span>
                                    <input type="hidden" id="review" name="review" value="5" />
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial Details -->
                        <div class="mb-3">
                            <label class="form-label" for="testimonial-details-editor">Testimonial <span
                                    class="text-danger">*</span></label>
                            <div id="testimonial-details-editor"></div>
                            <textarea id="details_hidden" name="details" hidden></textarea>
                            @error('details')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="status" name="status"
                                    value="1" checked />
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/element-skill.js'])
@endsection
