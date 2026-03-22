@extends('layouts.vertical', ['title' => 'Inbox'])

@section('css')
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
        <div class="card h-100 mb-0 rounded-start-0 flex-grow-1 border-start-0" data-table=""
            data-table-rows-per-page="15">
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
                <div class="d-flex flex-wrap align-items-center gap-1">
                    <input class="form-check-input form-check-input-light fs-14 mt-0 me-3" id="select-all-email"
                        type="checkbox" />
                    <!-- Delete -->
                    <button class="btn btn-default btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        title="Delete" type="button">
                        <i class="ti ti-trash fs-lg"></i>
                    </button>
                    <!-- Mark as Read -->
                    <button class="btn btn-default btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        title="Mark as Read" type="button">
                        <i class="ti ti-mail-opened fs-lg"></i>
                    </button>
                    <!-- Tag -->
                    <button class="btn btn-default btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        title="Tag" type="button">
                        <i class="ti ti-tag fs-lg"></i>
                    </button>
                    <!-- Archive -->
                    <button class="btn btn-default btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        title="Archive" type="button">
                        <i class="ti ti-archive fs-lg"></i>
                    </button>
                    <!-- Move to Folder -->
                    <button class="btn btn-default btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        title="Move to Folder" type="button">
                        <i class="ti ti-folder fs-lg"></i>
                    </button>
                    <!-- Forward -->
                    <button class="btn btn-default btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        title="Forward" type="button">
                        <i class="ti ti-arrow-forward-up fs-lg"></i>
                    </button>
                    <!-- Snooze -->
                    <button class="btn btn-default btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        title="Snooze" type="button">
                        <i class="ti ti-clock-pause fs-lg"></i>
                    </button>
                    <!-- Important -->
                    <button class="btn btn-default btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        title="Mark as Important" type="button">
                        <i class="ti ti-alert-circle fs-lg"></i>
                    </button>
                </div>
                <div class="app-search d-none d-lg-inline-flex">
                    <input class="form-control" data-table-search="" placeholder="Search mails..." type="text" />
                    <i class="app-search-icon text-muted" data-lucide="search"></i>
                </div>
            </div>
            <div class="card-body p-0" data-simplebar="" data-simplebar-md="" style="height: calc(100% - 100px);">
                <div class="table-responsive">
                    <table class="table table-hover table-select mb-0">
                        <tbody>
                            <tr class="position-relative">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-warning fs-xl">
                                            <i class="ti ti-star-filled"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img alt="user avatar" class="avatar-xs rounded-circle"
                                            src="/images/users/user-5.jpg" />
                                        <h5 class="fs-base mb-0 fw-medium">
                                            Amanda Reyes
                                        </h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Design Review &amp; Feedback
                                    </a>
                                    <span class="d-xl-inline-block d-none">
                                        —
                                    </span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        I’ve reviewed the updated UI mockups. Great work overall—just a few...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">3</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 20, 10:12 AM</p>
                                </td>
                            </tr>
                            <tr class="position-relative">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-warning fs-xl">
                                            <i class="ti ti-star-filled"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img alt="user avatar" class="avatar-xs rounded-circle"
                                            src="/images/users/user-2.jpg" />
                                        <h5 class="fs-base mb-0 fw-medium">George Thomas</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Request for Meeting
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        Are you available for a quick sync-up this week regarding the roadmap?
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">1</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 19, 4:45 PM</p>
                                </td>
                            </tr>
                            <tr class="position-relative mark-as-read">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-muted fs-xl">
                                            <i class="ti ti-star"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-xs">
                                            <span class="avatar-title text-bg-primary rounded-circle">
                                                L
                                            </span>
                                        </div>
                                        <h5 class="fs-base mb-0 fw-medium">Lucas Martin</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Q2 Marketing Strategy
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        Here's the proposed outline for our Q2 campaign and goals...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">2</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 19, 11:30 AM</p>
                                </td>
                            </tr>
                            <tr class="position-relative mark-as-read">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-warning fs-xl">
                                            <i class="ti ti-star-filled"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img alt="user avatar" class="avatar-xs rounded-circle"
                                            src="/images/users/user-6.jpg" />
                                        <h5 class="fs-base mb-0 fw-medium">Sophia Lee</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Final Invoice Attached
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        Attached is the invoice for the April sprint deliverables. Let me know...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">1</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 18, 6:05 PM</p>
                                </td>
                            </tr>
                            <tr class="position-relative mark-as-read">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-muted fs-xl">
                                            <i class="ti ti-star"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-xs">
                                            <span class="avatar-title text-bg-danger fw-bold rounded-circle">
                                                D
                                            </span>
                                        </div>
                                        <h5 class="fs-base mb-0 fw-medium">Daniel Kim</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Team Offsite Agenda
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        Here’s a rough outline for the team offsite activities next month...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1 opacity-25">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">0</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 18, 1:20 PM</p>
                                </td>
                            </tr>
                            <tr class="position-relative mark-as-read">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-muted fs-xl">
                                            <i class="ti ti-star"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-xs">
                                            <span
                                                class="avatar-title bg-secondary-subtle text-secondary fw-bold rounded-circle">
                                                C
                                            </span>
                                        </div>
                                        <h5 class="fs-base mb-0 fw-medium">Chloe Bennett</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Welcome to the Project!
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        Excited to have you on board. Let’s have a quick intro call tomorrow...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1 opacity-25">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">0</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 17, 9:18 AM</p>
                                </td>
                            </tr>
                            <tr class="position-relative">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-warning fs-xl">
                                            <i class="ti ti-star-filled"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img alt="user avatar" class="avatar-xs rounded-circle"
                                            src="/images/users/user-6.jpg" />
                                        <h5 class="fs-base mb-0 fw-medium">James Carter</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Meeting Follow-up Notes
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        Thanks for the insights today. Please find the summary and action points...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">1</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 17, 2:45 PM</p>
                                </td>
                            </tr>
                            <tr class="position-relative mark-as-read">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-muted fs-xl">
                                            <i class="ti ti-star"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img alt="user avatar" class="avatar-xs rounded-circle"
                                            src="/images/users/user-7.jpg" />
                                        <h5 class="fs-base mb-0 fw-medium">Sophia Allen</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Project Files Delivered
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        The final batch of designs and documentation has been uploaded to the drive...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">2</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 16, 11:05 AM</p>
                                </td>
                            </tr>
                            <tr class="position-relative">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-muted fs-xl">
                                            <i class="ti ti-star"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img alt="user avatar" class="avatar-xs rounded-circle"
                                            src="/images/users/user-8.jpg" />
                                        <h5 class="fs-base mb-0 fw-medium">Michael Chen</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Re: Budget Estimate
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        The budget looks good overall, but we might need to adjust the Q3 allocations...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">1</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 15, 6:28 PM</p>
                                </td>
                            </tr>
                            <tr class="position-relative mark-as-read">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-muted fs-xl">
                                            <i class="ti ti-star"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-xs">
                                            <span class="avatar-title text-bg-dark fw-bold rounded-circle">
                                                E
                                            </span>
                                        </div>
                                        <h5 class="fs-base mb-0 fw-medium">Emma Watson</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Collaboration Opportunity
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        I’d love to chat about a possible partnership on our upcoming launch event...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1 opacity-25">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">0</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 14, 3:59 PM</p>
                                </td>
                            </tr>
                            <tr class="position-relative mark-as-read">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-warning fs-xl">
                                            <i class="ti ti-star-filled"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img alt="user avatar" class="avatar-xs rounded-circle"
                                            src="/images/users/user-10.jpg" />
                                        <h5 class="fs-base mb-0 fw-medium">Daniel White</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Reschedule Request
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        Can we move our call to Friday afternoon instead? Something urgent came up...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1 opacity-25">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">0</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 13, 10:20 AM</p>
                                </td>
                            </tr>
                            <tr class="position-relative mark-as-read">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-warning fs-xl">
                                            <i class="ti ti-star-filled"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img alt="user avatar" class="avatar-xs rounded-circle"
                                            src="/images/users/user-3.jpg" />
                                        <h5 class="fs-base mb-0 fw-medium">James Walker</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Monthly Report Submission
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        Please find the attached monthly performance report for your review...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">1</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 16, 11:42 AM</p>
                                </td>
                            </tr>
                            <tr class="position-relative">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-muted fs-xl">
                                            <i class="ti ti-star"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-xs">
                                            <span class="avatar-title text-bg-warning fw-bold rounded-circle">
                                                E
                                            </span>
                                        </div>
                                        <h5 class="fs-base mb-0 fw-medium">Emma Johnson</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Design Assets Update
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        I’ve uploaded the latest illustrations and icons to the shared folder...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1 opacity-25">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">0</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 16, 8:09 AM</p>
                                </td>
                            </tr>
                            <tr class="position-relative mark-as-read">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-warning fs-xl">
                                            <i class="ti ti-star-filled"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img alt="user avatar" class="avatar-xs rounded-circle"
                                            src="/images/users/user-9.jpg" />
                                        <h5 class="fs-base mb-0 fw-medium">Noah Patel</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Updated Meeting Schedule
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        Please review the adjusted times for next week's client meetings...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">2</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 15, 4:55 PM</p>
                                </td>
                            </tr>
                            <tr class="position-relative mark-as-read">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-muted fs-xl">
                                            <i class="ti ti-star"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img alt="user avatar" class="avatar-xs rounded-circle"
                                            src="/images/users/user-3.jpg" />
                                        <h5 class="fs-base mb-0 fw-medium">Ava Thompson</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Client Feedback Notes
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        Attached is the client feedback from last week’s demo session...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">1</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 15, 9:32 AM</p>
                                </td>
                            </tr>
                            <tr class="position-relative mark-as-read">
                                <td class="ps-3" style="width: 1%;">
                                    <div class="d-flex gap-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 position-relative z-2 mt-0 email-item-check"
                                            type="checkbox" />
                                        <button class="btn p-0 text-muted fs-xl">
                                            <i class="ti ti-star"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img alt="user avatar" class="avatar-xs rounded-circle"
                                            src="/images/users/user-1.jpg" />
                                        <h5 class="fs-base mb-0 fw-medium">Liam Garcia</h5>
                                    </div>
                                </td>
                                <td>
                                    <a class="link-reset fs-base fw-medium stretched-link"
                                        href="{{ route('second', ['email', 'details']) }}">
                                        Weekly Sync Meeting
                                    </a>
                                    <span class="d-xl-inline-block d-none">—</span>
                                    <span class="fs-base text-muted d-xl-inline-block d-none mb-0">
                                        Let’s discuss blockers and updates on the current sprints in our sync...
                                    </span>
                                </td>
                                <td style="width: 1%;">
                                    <div class="d-flex align-items-center gap-1 opacity-25">
                                        <i class="ti ti-paperclip"></i>
                                        <span class="fw-semibold">0</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fs-xs text-muted mb-0 text-end pe-2">Apr 14, 3:30 PM</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end table responsive-->
                <div class="d-flex align-items-center justify-content-center gap-2 p-3">
                    <strong>Loading...</strong>
                    <div aria-hidden="true" class="spinner-border spinner-border-sm text-danger" role="status"></div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end row-->
@endsection

@section('scripts')
    @vite(['resources/js/pages/custom-table.js'])
@endsection
