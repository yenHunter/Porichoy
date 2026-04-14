@extends('admin.layouts.vertical', ['title' => 'User Management'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Management', 'title' => 'User'])

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
                        <h4 class="card-title mb-1">User Management</h4>
                        <p class="small mb-0 text-info">Manage all system users here. Create new users, edit existing ones, or remove users from the system.</p>
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
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_list as $item)
                                <tr>
                                    <td>
                                        <img class="img-thumbnail rounded-circle" width="40px" 
                                            src="{{ $item->profile_picture_url }}" alt="user-picture">
                                    </td>
                                    <td>
                                        <span class="fw-semibold">{{ $item->first_name }} {{ $item->last_name }}</span>
                                    </td>
                                    <td>
                                        {{ $item->email }}<br>
                                        <small class="text-muted">{{ $item->email_verified_at ? 'Verified' : 'Not verified' }}</small>
                                    </td>
                                    <td>
                                        @if ($item->user_status === true)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $item->created_at->format('M d, Y') }}</small>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-icon btn-sm btn-edit"
                                            data-user_id="{{ $item->id }}">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </button>
                                        <button class="btn btn-danger btn-icon btn-sm btn-delete"
                                            data-user_id="{{ $item->id }}">
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

    <form action="{{ route('management.user.store') }}" method="POST" id="create_update_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="create_update_form_method" value="POST">
        <input type="hidden" name="user_id" id="user_id">
        <div aria-hidden="true" aria-labelledby="scrollableModalTitle" class="modal fade" id="create_update_modal"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="create_update_modal_title">Create User</h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label class="form-label" for="first_name">First Name
                                    <span class="badge badge-soft-danger">required</span>
                                </label>
                                <input class="form-control @error('first_name') is-invalid @enderror"
                                    placeholder="e.g., John" value="{{ old('first_name') }}"
                                    name="first_name" id="first_name" type="text" required />
                                <div class="invalid-feedback">
                                    @error('first_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="last_name">Last Name
                                    <span class="badge badge-soft-danger">required</span>
                                </label>
                                <input class="form-control @error('last_name') is-invalid @enderror"
                                    placeholder="e.g., Doe" value="{{ old('last_name') }}"
                                    name="last_name" id="last_name" type="text" required />
                                <div class="invalid-feedback">
                                    @error('last_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="email">Email Address
                                    <span class="badge badge-soft-danger">required</span>
                                </label>
                                <input class="form-control @error('email') is-invalid @enderror"
                                    placeholder="e.g., john.doe@example.com" value="{{ old('email') }}"
                                    name="email" id="email" type="email" required />
                                <div class="invalid-feedback">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="profile_picture">Profile Picture</label>
                                <div class="filepond-uploader">
                                    <input class="filepond @error('profile_picture') is-invalid @enderror" 
                                        name="profile_picture" type="file" accept="image/*" />
                                </div>
                                <small class="text-muted">Supported formats: JPEG, PNG, GIF, WebP (Max 10MB)</small>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="user_status">Status
                                    <span class="badge badge-soft-danger">required</span>
                                </label>
                                <select aria-label="Select Status"
                                    class="form-select @error('user_status') is-invalid @enderror"
                                    name="user_status" id="user_status" required>
                                    <option selected disabled>Choose a status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <div class="invalid-feedback">
                                    @error('user_status')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="alert alert-info border-2" role="alert">
                                    <i class="ti ti-info-circle me-2"></i>
                                    <strong>Note:</strong> A random password will be generated and the user will receive a welcome email to set their own password.
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
    @vite(['resources/js/pages/management-user.js'])
@endsection
