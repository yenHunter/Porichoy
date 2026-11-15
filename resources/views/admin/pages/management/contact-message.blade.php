@extends('admin.layouts.vertical', ['title' => 'Contact Request'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'Management', 'title' => 'Contact Request'])

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
                        <h4 class="card-title mb-1">Contact Request</h4>
                        <p class="small mb-0 text-info">Every message submitted through the public contact form.
                            @if ($message_list->isNotEmpty())
                                @if ($unread_count > 0)
                                    <span class="badge bg-danger ms-1">{{ $unread_count }} unread</span>
                                @else
                                    <span class="badge bg-success ms-1">All read</span>
                                @endif
                            @endif
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped dt-responsive align-middle mb-0" data-tables="basic">
                        <thead class="thead-sm text-uppercase fs-xxs">
                            <tr>
                                <th>From</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Received</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message_list as $item)
                                <tr>
                                    <td>
                                        <span class="fw-semibold">{{ $item->name }}</span><br>
                                        <a class="small" href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                    </td>
                                    <td>
                                        @if ($item->phone)
                                            <a href="tel:{{ $item->phone }}">{{ $item->phone }}</a>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td style="min-width: 280px; max-width: 480px; white-space: pre-line;">{{ $item->message }}</td>
                                    <td>
                                        @if ($item->is_read)
                                            <span class="badge bg-secondary">Read</span>
                                        @else
                                            <span class="badge bg-warning">Unread</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $item->created_at?->format('M d, Y H:i') }}</small>
                                    </td>
                                    <td style="white-space: nowrap;">
                                        <div class="d-flex gap-1">
                                            @if (! $item->is_read)
                                                <a class="btn btn-info btn-icon btn-sm"
                                                    href="{{ route('management.contact_message.read', $item->id) }}"
                                                    title="Mark as read">
                                                    <i class="ti ti-mail-opened fs-lg"></i>
                                                </a>
                                            @endif
                                            <button class="btn btn-danger btn-icon btn-sm btn-delete"
                                                data-contact_message_id="{{ $item->id }}" title="Delete">
                                                <i class="ti ti-trash fs-lg"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/management-contact-message.js'])
@endsection
