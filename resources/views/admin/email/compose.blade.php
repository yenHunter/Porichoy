@extends('layouts.vertical', ['title' => 'New Email (Compose)'])

@section('css')
    @vite(['node_modules/quill/dist/quill.core.css', 'node_modules/quill/dist/quill.snow.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Apps', 'title' => 'Email'])

    <div class="outlook-box gap-1 email-app">
        <div class="offcanvas-lg offcanvas-start outlook-left-menu outlook-left-menu-sm" id="emailSidebaroffcanvas"
            tabindex="-1">
            <div class="card h-100 mb-0 rounded-end-0" data-simplebar="">
                <div class="card-body">
                    <a class="btn btn-danger fw-medium w-100" href="{{ route('second', ['email', 'compose']) }}">Compose</a>
                    <div class="list-group list-group-flush list-custom mt-3">
                        <a class="list-group-item list-group-item-action active" href="{{ route('any', 'email') }}">
                            <i class="ti ti-inbox me-1 opacity-75 fs-lg align-middle"></i>
                            <span class="align-middle">Inbox</span>
                            <span class="badge align-middle bg-danger-subtle fs-xxs text-danger float-end">21</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-send align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Sent</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-star align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Starred</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-clock align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Scheduled</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-pencil align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Drafts</span>
                            <span class="badge align-middle bg-secondary-subtle text-secondary fs-xxs float-end">9</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-alert-circle align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Important</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-ban me-1 align-middle opacity-75 fs-lg"></i>
                            <span class="align-middle">Spam</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-trash me-1 align-middle opacity-75 fs-lg"></i>
                            <span class="align-middle">Trash</span>
                        </a>
                        <div class="list-group-item mt-2">
                            <span class="align-middle">Labels</span>
                        </div>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-chart-donut-filled me-1 align-middle fs-sm text-primary"></i>
                            <span class="align-middle">Business</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-chart-donut-filled me-1 align-middle fs-sm text-secondary"></i>
                            <span class="align-middle">Personal</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-chart-donut-filled me-1 align-middle fs-sm text-info"></i>
                            <span class="align-middle">Friends</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-chart-donut-filled me-1 align-middle fs-sm text-warning"></i>
                            <span class="align-middle">Family</span>
                        </a>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="card h-100 mb-0 rounded-start-0 flex-grow-1 border-start-0">
            <div class="card-header d-lg-none d-flex gap-2">
                <button aria-controls="emailSidebaroffcanvas" class="btn btn-default btn-icon"
                    data-bs-target="#emailSidebaroffcanvas" data-bs-toggle="offcanvas" type="button">
                    <i class="ti ti-menu-2 fs-lg"></i>
                </button>
                <div class="app-search">
                    <input class="form-control" placeholder="Search mails..." type="text" />
                    <i class="app-search-icon text-muted" data-lucide="search"></i>
                </div>
            </div>
            <div class="card-header card-bg justify-content-between">
                <h4 class="card-title">Compose Message</h4>
            </div>
            <div class="card-body p-0" data-simplebar="" data-simplebar-md="" style="height: calc(100% - 120px);">
                <div class="app-search input-group border-bottom border-dashed ps-2 pe-4">
                    <input class="form-control py-3 border-0" placeholder="Enter emails.." type="text" />
                    <span class="app-search-icon fw-semibold fs-sm">To:</span>
                    <button aria-controls="email-cc" aria-expanded="false"
                        class="btn btn-link fs-sm px-2 text-decoration-underline text-reset fw-semibold"
                        data-bs-target="#email-cc" data-bs-toggle="collapse" type="button">Cc</button>
                    <button aria-controls="email-bcc" aria-expanded="false"
                        class="btn btn-link fs-sm px-2 text-decoration-underline text-reset fw-semibold"
                        data-bs-target="#email-bcc" data-bs-toggle="collapse" type="button">Bcc</button>
                </div>
                <div class="collapse" id="email-cc">
                    <div class="app-search input-group border-bottom border-dashed ps-2 pe-4">
                        <input class="form-control py-3 border-0" placeholder="Enter emails.." type="text" />
                        <span class="app-search-icon fw-semibold fs-sm">Cc:</span>
                        <button aria-controls="email-cc" aria-expanded="false"
                            class="btn btn-link px-2 text-muted fw-semibold" data-bs-target="#email-cc"
                            data-bs-toggle="collapse" type="button"><i class="ti ti-x fs-xl"></i></button>
                    </div>
                </div>
                <div class="collapse" id="email-bcc">
                    <div class="app-search input-group border-bottom border-dashed ps-2 pe-4">
                        <input class="form-control py-3 border-0" placeholder="Enter emails.." type="text" />
                        <span class="app-search-icon fw-semibold fs-sm">Bcc:</span>
                        <button aria-controls="email-bcc" aria-expanded="false"
                            class="btn btn-link px-2 text-muted fw-semibold" data-bs-target="#email-bcc"
                            data-bs-toggle="collapse" type="button"><i class="ti ti-x fs-xl"></i></button>
                    </div>
                </div>
                <div class="border-bottom border-dashed ps-2 pe-4">
                    <input class="form-control py-3 fs-sm fw-semibold border-0" placeholder="Subject" type="text" />
                </div>
                <div class="email-editor">
                    <div id="snow-editor">
                        <p>Hi <strong><em>James</em></strong>,</p>
                        <p>I hope you're doing well.</p>
                        <p>I'm reaching out regarding the latest updates on our project. Please find the summary below:</p>
                        <ul>
                            <li>All UI components have been reviewed and finalized.</li>
                            <li>The mobile responsiveness is now optimized across all breakpoints.</li>
                            <li>We’re awaiting final client feedback before deployment.</li>
                        </ul>
                        <p>Let me know if you need anything else or if there's anything you'd like us to adjust.</p>
                        <p><br /></p>
                        <p>Best regards,</p>
                        <p><em>Damian</em></p>
                    </div><!-- end Snow-editor -->
                </div>
                <div class="bg-light-subtle p-2 border-light border-bottom">
                    <div class="d-flex gap-1 align-items-center">
                        <div class="btn-group">
                            <button class="btn btn-primary" type="button">
                                <i class="ti ti-send-2 me-2"></i> Send
                            </button>
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn btn-primary dropdown-toggle dropdown-toggle-split drop-arrow-none"
                                data-bs-toggle="dropdown" type="button">
                                <i class="ti ti-chevron-down align-middle"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Send &amp; Archive</a>
                                <a class="dropdown-item" href="#">Schedule Send</a>
                                <a class="dropdown-item" href="#">Save as Draft</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Discard</a>
                            </div>
                        </div><!-- /btn-group -->
                        <button class="btn btn-sm btn-icon btn-light ms-auto" data-bs-placement="top"
                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Settings" type="button"><i
                                class="ti ti-settings"></i></button>
                        <button class="btn btn-sm btn-icon btn-soft-danger" data-bs-placement="top"
                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Delete" type="button"><i
                                class="ti ti-trash"></i></button>
                    </div>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end row-->
@endsection

@section('scripts')
    @vite(['resources/js/pages/email-compose.js'])
@endsection
