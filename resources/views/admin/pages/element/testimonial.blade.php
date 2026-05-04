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
                            @foreach ($testimonial_list as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>
                                        <i class="ti ti-arrows-move fs-42"></i>
                                    </td>
                                    <td>
                                        {{ $item->client?->client_name ?? 'N/A' }}
                                        <br>
                                        <small>{{ $item->client?->client_designation ?? 'N/A' }}</small>
                                    </td>
                                    <td>
                                        <span
                                            class="text-truncate">{{ $item->testimonial_title ?? 'Untitled' }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1">
                                            @for ($i = 1; $i <= $item->testimonial_review; $i++)
                                                <i class="ti ti-star text-warning"></i>
                                            @endfor
                                        </div>
                                    </td>
                                    <td>
                                        @if ($item->testimonial_status === true)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-icon btn-sm btn-edit"
                                            data-testimonial_id="{{ $item->id }}">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </button>
                                        <button class="btn btn-danger btn-icon btn-sm btn-delete"
                                            data-testimonial_id="{{ $item->id }}">
                                            <i class="ti ti-trash fs-lg"></i>
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

    <form action="{{ route('element.testimonial.store') }}" method="POST" id="create_update_form"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
        <input type="hidden" name="testimonial_id" id="testimonial_id">
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
                                <label class="form-label" for="testimonial_title">
                                    Title
                                    <span class="badge badge-soft-danger">required</span>
                                </label>
                                <input class="form-control @error('testimonial_title') is-invalid @enderror"
                                    id="testimonial_title" name="testimonial_title" type="text"
                                    placeholder="Enter testimonial title" value="{{ old('testimonial_title') }}"
                                    required>
                                @error('testimonial_title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="testimonial_review">
                                    Review Rating
                                    <span class="badge badge-soft-danger">required</span>
                                </label>
                                <div class="input-group" data-touchspin="">
                                    <button class="btn btn-light floating" data-minus="" type="button"><i
                                            class="ti ti-minus"></i></button>
                                    <input class="form-control form-control-sm border-0" max="5" type="number"
                                        value="0" required name="testimonial_review" id="testimonial_review" />
                                    <button class="btn btn-light floating" data-plus="" type="button"><i
                                            class="ti ti-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="testimonial_details">
                                    Details & Description
                                    <span class="badge badge-soft-danger">required</span>
                                </label>
                                <textarea class="form-control @error('testimonial_details') is-invalid @enderror" name="testimonial_details"
                                    id="testimonial_details" placeholder="Enter testimonial details" required>{{ old('testimonial_details') }}</textarea>
                                @error('testimonial_details')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="testimonial_status">Status</label>
                                <select aria-label="Select Status"
                                    class="form-select @error('testimonial_status') is-invalid @enderror"
                                    name="testimonial_status" id="testimonial_status" required>
                                    <option selected disabled>Choose a status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <div class="invalid-feedback">
                                    @error('testimonial_status')
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
    @vite(['resources/js/pages/element-testimonial.js'])
@endsection
