@extends('layouts.vertical', ['title' => 'CRM Pipeline'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'CRM', 'title' => 'Pipeline'])

    <div class="outlook-box kanban-app">
        <div class="card h-100 mb-0 flex-grow-1">
            <div class="card-header d-none d-lg-flex border-light align-items-center gap-2">
                <!-- Search Bar -->
                <div class="app-search">
                    <input class="form-control" placeholder="Search deals..." type="search" />
                    <i class="app-search-icon text-muted" data-lucide="search"></i>
                </div>
                <!-- Filter Controls -->
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <!-- Stage Filter -->
                    <div class="app-search">
                        <select class="form-select form-control">
                            <option selected="">Stage</option>
                            <option value="Qualification">Qualification</option>
                            <option value="Proposal Sent">Proposal Sent</option>
                            <option value="Negotiation">Negotiation</option>
                            <option value="Won">Won</option>
                            <option value="Lost">Lost</option>
                        </select>
                        <i class="app-search-icon text-muted" data-lucide="shuffle"></i>
                    </div>
                    <!-- Closing Date Filter -->
                    <div class="app-search">
                        <select class="form-select form-control">
                            <option selected="">Closing Date</option>
                            <option value="Today">Today</option>
                            <option value="This Week">This Week</option>
                            <option value="This Month">This Month</option>
                        </select>
                        <i class="app-search-icon text-muted" data-lucide="calendar-check"></i>
                    </div>
                </div>
                <!-- Add Deal Button -->
                <button class="btn btn-secondary ms-lg-auto" type="button">
                    <i class="ti ti-plus me-1"></i> Add New Deal
                </button>
            </div>
            <div class="card-body p-0">
                <div class="kanban-content">
                    <!-- Lead Data-->
                    <div class="kanban-board bg-warning bg-opacity-10">
                        <div class="kanban-item py-2 px-3 d-flex align-items-center">
                            <h5 class="m-0">Lead (4)</h5>
                            <a class="ms-auto btn btn-sm btn-icon rounded-circle btn-primary" href="#!"><i
                                    class="ti ti-plus fs-md"></i></a>
                        </div>
                        <div class="kanban-board-group px-2" data-simplebar="" data-simplebar-md="">
                            <ul data-plugins="sortable">
                                <li class="kanban-item">
                                    <div class="card shadow mb-2">
                                        <div class="card-body p-3">
                                            <!-- Title + Actions -->
                                            <div class="d-flex align-items-start mb-2">
                                                <div>
                                                    <h5 class="mb-0 fw-semibold">
                                                        <a class="link-reset" href="#!">AI Analytics Dashboard</a>
                                                    </h5>
                                                    <small class="text-muted">Amazon Web Services</small>
                                                </div>
                                                <div class="ms-auto dropdown">
                                                    <a class="btn btn-icon btn-sm btn-ghost-light text-muted"
                                                        data-bs-toggle="dropdown" href="#">
                                                        <i class="ti ti-dots-vertical fs-lg"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-share me-2"></i>Share</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-edit me-2"></i>Edit</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-user-check me-2"></i>Assign</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                                    class="ti ti-trash me-2"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Team + Closing Date -->
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-1">
                                                    <img alt="Mark Allen" class="rounded-circle avatar-xs"
                                                        src="/images/users/user-4.jpg" />
                                                    <span class="fw-medium text-muted fs-sm">Mark Allen</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <i class="ti ti-calendar-time text-muted fs-lg"></i>
                                                    <h5 class="fs-base mb-0 fw-medium">30 May, 2025</h5>
                                                </div>
                                            </div>
                                            <!-- Deal Amount -->
                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center gap-2 fs-sm">
                                                        <span class="d-flex align-items-center gap-1">
                                                            <i class="ti ti-message-dots text-muted fs-lg"></i> 2
                                                        </span>
                                                        <span class="d-flex align-items-center gap-1">
                                                            <i class="ti ti-checklist text-muted fs-lg"></i> 3
                                                        </span>
                                                    </div>
                                                    <span class="fw-semibold">$95,000</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="kanban-item">
                                    <div class="card shadow mb-2">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-start mb-2">
                                                <div>
                                                    <h5 class="mb-0 fw-semibold">
                                                        <a class="link-reset" href="#!">Mobile App Redesign</a>
                                                    </h5>
                                                    <small class="text-muted">ByteCraft Studios</small>
                                                </div>
                                                <div class="ms-auto dropdown">
                                                    <a class="btn btn-icon btn-sm btn-ghost-light text-muted"
                                                        data-bs-toggle="dropdown" href="#">
                                                        <i class="ti ti-dots-vertical fs-lg"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-share me-2"></i>Share</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-edit me-2"></i>Edit</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-user-check me-2"></i>Assign</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                                    class="ti ti-trash me-2"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-1">
                                                    <img alt="Alex Carter" class="rounded-circle avatar-xs"
                                                        src="/images/users/user-2.jpg" />
                                                    <span class="fw-medium text-muted fs-sm">Alex Carter</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <i class="ti ti-calendar-time text-muted fs-lg"></i>
                                                    <h5 class="fs-base mb-0 fw-medium">12 Jun, 2025</h5>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center gap-2 fs-sm">
                                                        <span class="d-flex align-items-center gap-1">
                                                            <i class="ti ti-message-dots text-muted fs-lg"></i> 1
                                                        </span>
                                                        <span class="d-flex align-items-center gap-1">
                                                            <i class="ti ti-checklist text-muted fs-lg"></i> 5
                                                        </span>
                                                    </div>
                                                    <span class="fw-semibold">$72,000</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="kanban-item">
                                    <div class="card shadow mb-2">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-start mb-2">
                                                <div>
                                                    <h5 class="mb-0 fw-semibold">
                                                        <a class="link-reset" href="#!">Website Revamp</a>
                                                    </h5>
                                                    <small class="text-muted">NextGen UI</small>
                                                </div>
                                                <div class="ms-auto dropdown">
                                                    <a class="btn btn-icon btn-sm btn-ghost-light text-muted"
                                                        data-bs-toggle="dropdown" href="#">
                                                        <i class="ti ti-dots-vertical fs-lg"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-share me-2"></i>Share</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-edit me-2"></i>Edit</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-user-check me-2"></i>Assign</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                                    class="ti ti-trash me-2"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-1">
                                                    <img alt="Emily Rose" class="rounded-circle avatar-xs"
                                                        src="/images/users/user-5.jpg" />
                                                    <span class="fw-medium text-muted fs-sm">Emily Rose</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <i class="ti ti-calendar-time text-muted fs-lg"></i>
                                                    <h5 class="fs-base mb-0 fw-medium">18 Jun, 2025</h5>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center gap-2 fs-sm">
                                                        <span class="d-flex align-items-center gap-1">
                                                            <i class="ti ti-message-dots text-muted fs-lg"></i> 4
                                                        </span>
                                                        <span class="d-flex align-items-center gap-1">
                                                            <i class="ti ti-checklist text-muted fs-lg"></i> 2
                                                        </span>
                                                    </div>
                                                    <span class="fw-semibold">$45,500</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="kanban-item">
                                    <div class="card shadow mb-2">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-start mb-2">
                                                <div>
                                                    <h5 class="mb-0 fw-semibold">
                                                        <a class="link-reset" href="#!">Campaign Strategy</a>
                                                    </h5>
                                                    <small class="text-muted">Visionary Labs</small>
                                                </div>
                                                <div class="ms-auto dropdown">
                                                    <a class="btn btn-icon btn-sm btn-ghost-light text-muted"
                                                        data-bs-toggle="dropdown" href="#">
                                                        <i class="ti ti-dots-vertical fs-lg"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-share me-2"></i>Share</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-edit me-2"></i>Edit</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-user-check me-2"></i>Assign</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                                    class="ti ti-trash me-2"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-1">
                                                    <img alt="Ryan King" class="rounded-circle avatar-xs"
                                                        src="/images/users/user-6.jpg" />
                                                    <span class="fw-medium text-muted fs-sm">Ryan King</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <i class="ti ti-calendar-time text-muted fs-lg"></i>
                                                    <h5 class="fs-base mb-0 fw-medium">5 Jul, 2025</h5>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center gap-2 fs-sm">
                                                        <span class="d-flex align-items-center gap-1">
                                                            <i class="ti ti-message-dots text-muted fs-lg"></i> 0
                                                        </span>
                                                        <span class="d-flex align-items-center gap-1">
                                                            <i class="ti ti-checklist text-muted fs-lg"></i> 1
                                                        </span>
                                                    </div>
                                                    <span class="fw-semibold">$23,000</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end Lead Data-->
                    <!-- Negotiation Data-->
                    <div class="kanban-board bg-info bg-opacity-10">
                        <div class="py-2 px-3 d-flex align-items-center">
                            <h5 class="m-0">Negotiation (2)</h5>
                            <a class="ms-auto btn btn-sm btn-icon rounded-circle btn-primary" href="#!"><i
                                    class="ti ti-plus fs-md"></i></a>
                        </div>
                        <div class="kanban-board-group px-2" data-simplebar="" data-simplebar-md="">
                            <ul data-plugins="sortable">
                                <li class="kanban-item">
                                    <div class="card shadow mb-2">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-start mb-2">
                                                <div>
                                                    <h5 class="mb-0 fw-semibold">
                                                        <a class="link-reset" href="#!">Product Demo Scheduling</a>
                                                    </h5>
                                                    <small class="text-muted">Innovexa</small>
                                                </div>
                                                <div class="ms-auto dropdown">
                                                    <a class="btn btn-icon btn-sm btn-ghost-light text-muted"
                                                        data-bs-toggle="dropdown" href="#">
                                                        <i class="ti ti-dots-vertical fs-lg"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-share me-2"></i>Share</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-edit me-2"></i>Edit</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-user-check me-2"></i>Assign</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                                    class="ti ti-trash me-2"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-1">
                                                    <img alt="Nina White" class="rounded-circle avatar-xs"
                                                        src="/images/users/user-8.jpg" />
                                                    <span class="fw-medium text-muted fs-sm">Nina White</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <i class="ti ti-calendar-time text-muted fs-lg"></i>
                                                    <h5 class="fs-base mb-0 fw-medium">15 Jul, 2025</h5>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center gap-2 fs-sm">
                                                        <span class="d-flex align-items-center gap-1">
                                                            <i class="ti ti-message-dots text-muted fs-lg"></i> 3
                                                        </span>
                                                        <span class="d-flex align-items-center gap-1">
                                                            <i class="ti ti-checklist text-muted fs-lg"></i> 4
                                                        </span>
                                                    </div>
                                                    <span class="fw-semibold">$18,750</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="kanban-item">
                                    <div class="card shadow mb-2">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-start mb-2">
                                                <div>
                                                    <h5 class="mb-0 fw-semibold">
                                                        <a class="link-reset" href="#!">CRM Integration Task</a>
                                                    </h5>
                                                    <small class="text-muted">CoreSync Ltd.</small>
                                                </div>
                                                <div class="ms-auto dropdown">
                                                    <a class="btn btn-icon btn-sm btn-ghost-light text-muted"
                                                        data-bs-toggle="dropdown" href="#">
                                                        <i class="ti ti-dots-vertical fs-lg"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-share me-2"></i>Share</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-edit me-2"></i>Edit</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-user-check me-2"></i>Assign</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                                    class="ti ti-trash me-2"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-1">
                                                    <img alt="Amit Rao" class="rounded-circle avatar-xs"
                                                        src="/images/users/user-9.jpg" />
                                                    <span class="fw-medium text-muted fs-sm">Amit Rao</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <i class="ti ti-calendar-time text-muted fs-lg"></i>
                                                    <h5 class="fs-base mb-0 fw-medium">22 Jul, 2025</h5>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center gap-2 fs-sm">
                                                        <span class="d-flex align-items-center gap-1">
                                                            <i class="ti ti-message-dots text-muted fs-lg"></i> 1
                                                        </span>
                                                        <span class="d-flex align-items-center gap-1">
                                                            <i class="ti ti-checklist text-muted fs-lg"></i> 2
                                                        </span>
                                                    </div>
                                                    <span class="fw-semibold">$39,900</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end Negotiation Data-->
                    <!-- Won Data-->
                    <div class="kanban-board bg-success bg-opacity-10">
                        <div class="kanban-item py-2 px-3 d-flex align-items-center">
                            <h5 class="m-0">Won (5)</h5>
                            <a class="ms-auto btn btn-sm btn-icon rounded-circle btn-primary" href="#!"><i
                                    class="ti ti-plus fs-md"></i></a>
                        </div>
                        <div class="kanban-board-group px-2" data-simplebar="" data-simplebar-md="">
                            <ul data-plugins="sortable">
                                <li class="kanban-item">
                                    <div class="card shadow mb-2">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-start mb-2">
                                                <div>
                                                    <h5 class="mb-0 fw-semibold"><a class="link-reset"
                                                            href="#!">Enterprise License Upgrade</a></h5>
                                                    <small class="text-muted">Zentrix Corp</small>
                                                </div>
                                                <div class="ms-auto dropdown">
                                                    <a class="btn btn-icon btn-sm btn-ghost-light text-muted"
                                                        data-bs-toggle="dropdown" href="#">
                                                        <i class="ti ti-dots-vertical fs-lg"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-share me-2"></i>Share</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="ti ti-edit me-2"></i>Edit</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                                    class="ti ti-trash me-2"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-1">
                                                    <img alt="Sophia Lee" class="rounded-circle avatar-xs"
                                                        src="/images/users/user-1.jpg" />
                                                    <span class="fw-medium text-muted fs-sm">Sophia Lee</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <i class="ti ti-calendar-check text-success fs-lg"></i>
                                                    <h5 class="fs-base mb-0 fw-medium">01 Jul, 2025</h5>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center gap-2 fs-sm">
                                                        <i class="ti ti-award text-success fs-lg"></i> Won
                                                    </div>
                                                    <span class="fw-semibold">$120,000</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="kanban-item">
                                    <div class="card shadow mb-2">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-start mb-2">
                                                <div>
                                                    <h5 class="mb-0 fw-semibold"><a class="link-reset"
                                                            href="#!">Custom CRM Implementation</a></h5>
                                                    <small class="text-muted">DeltaSoft</small>
                                                </div>
                                                <div class="ms-auto dropdown">
                                                    <a class="btn btn-icon btn-sm btn-ghost-light text-muted"
                                                        data-bs-toggle="dropdown" href="#">
                                                        <i class="ti ti-dots-vertical fs-lg"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-1">
                                                    <img alt="Mark J." class="rounded-circle avatar-xs"
                                                        src="/images/users/user-2.jpg" />
                                                    <span class="fw-medium text-muted fs-sm">Mark J.</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <i class="ti ti-calendar-check text-success fs-lg"></i>
                                                    <h5 class="fs-base mb-0 fw-medium">28 Jun, 2025</h5>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center gap-2 fs-sm">
                                                        <i class="ti ti-award text-success fs-lg"></i> Won
                                                    </div>
                                                    <span class="fw-semibold">$89,500</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="kanban-item">
                                    <div class="card shadow mb-2">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-start mb-2">
                                                <div>
                                                    <h5 class="mb-0 fw-semibold"><a class="link-reset" href="#!">API
                                                            Subscription Expansion</a></h5>
                                                    <small class="text-muted">Netwise Solutions</small>
                                                </div>
                                                <div class="ms-auto dropdown">
                                                    <a class="btn btn-icon btn-sm btn-ghost-light text-muted"
                                                        data-bs-toggle="dropdown" href="#">
                                                        <i class="ti ti-dots-vertical fs-lg"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-1">
                                                    <img alt="Raj Patel" class="rounded-circle avatar-xs"
                                                        src="/images/users/user-3.jpg" />
                                                    <span class="fw-medium text-muted fs-sm">Raj Patel</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <i class="ti ti-calendar-check text-success fs-lg"></i>
                                                    <h5 class="fs-base mb-0 fw-medium">25 Jun, 2025</h5>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center gap-2 fs-sm">
                                                        <i class="ti ti-award text-success fs-lg"></i> Won
                                                    </div>
                                                    <span class="fw-semibold">$58,000</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="kanban-item">
                                    <div class="card shadow mb-2">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-start mb-2">
                                                <div>
                                                    <h5 class="mb-0 fw-semibold"><a class="link-reset"
                                                            href="#!">Annual Cloud Retainer</a></h5>
                                                    <small class="text-muted">SkyVault Inc.</small>
                                                </div>
                                                <div class="ms-auto dropdown">
                                                    <a class="btn btn-icon btn-sm btn-ghost-light text-muted"
                                                        data-bs-toggle="dropdown" href="#">
                                                        <i class="ti ti-dots-vertical fs-lg"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-1">
                                                    <img alt="Tina Ray" class="rounded-circle avatar-xs"
                                                        src="/images/users/user-5.jpg" />
                                                    <span class="fw-medium text-muted fs-sm">Tina Ray</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <i class="ti ti-calendar-check text-success fs-lg"></i>
                                                    <h5 class="fs-base mb-0 fw-medium">21 Jun, 2025</h5>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center gap-2 fs-sm">
                                                        <i class="ti ti-award text-success fs-lg"></i> Won
                                                    </div>
                                                    <span class="fw-semibold">$135,000</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="kanban-item">
                                    <div class="card shadow mb-2">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-start mb-2">
                                                <div>
                                                    <h5 class="mb-0 fw-semibold"><a class="link-reset"
                                                            href="#!">Marketing Automation Deal</a></h5>
                                                    <small class="text-muted">CloudReach</small>
                                                </div>
                                                <div class="ms-auto dropdown">
                                                    <a class="btn btn-icon btn-sm btn-ghost-light text-muted"
                                                        data-bs-toggle="dropdown" href="#">
                                                        <i class="ti ti-dots-vertical fs-lg"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-1">
                                                    <img alt="Mohit Chauhan" class="rounded-circle avatar-xs"
                                                        src="/images/users/user-6.jpg" />
                                                    <span class="fw-medium text-muted fs-sm">Mohit Chauhan</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <i class="ti ti-calendar-check text-success fs-lg"></i>
                                                    <h5 class="fs-base mb-0 fw-medium">18 Jun, 2025</h5>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center gap-2 fs-sm">
                                                        <i class="ti ti-award text-success fs-lg"></i> Won
                                                    </div>
                                                    <span class="fw-semibold">$62,500</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end Won Data-->
                    <!-- Lost Data-->
                    <div class="kanban-board bg-danger bg-opacity-10">
                        <div class="py-2 px-3 d-flex align-items-center">
                            <h5 class="m-0">Lost (2)</h5>
                            <a class="ms-auto btn btn-sm btn-icon rounded-circle btn-primary" href="#!"><i
                                    class="ti ti-plus fs-md"></i></a>
                        </div>
                        <div class="kanban-board-group px-2" data-simplebar="" data-simplebar-md="">
                            <ul data-plugins="sortable">
                                <li class="kanban-item">
                                    <div class="card shadow mb-2 border-danger-subtle">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-start mb-2">
                                                <div>
                                                    <h5 class="mb-0 fw-semibold">
                                                        <a class="link-reset" href="#!">E-commerce Platform
                                                            Proposal</a>
                                                    </h5>
                                                    <small class="text-muted">QuickCart</small>
                                                </div>
                                                <div class="ms-auto dropdown">
                                                    <a class="btn btn-icon btn-sm btn-ghost-light text-muted"
                                                        data-bs-toggle="dropdown" href="#">
                                                        <i class="ti ti-dots-vertical fs-lg"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-1">
                                                    <img alt="Julia Mason" class="rounded-circle avatar-xs"
                                                        src="/images/users/user-7.jpg" />
                                                    <span class="fw-medium text-muted fs-sm">Julia Mason</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <i class="ti ti-calendar-x text-danger fs-lg"></i>
                                                    <h5 class="fs-base mb-0 fw-medium">14 Jul, 2025</h5>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center gap-2 fs-sm">
                                                        <i class="ti ti-x text-danger fs-lg"></i> Lost
                                                    </div>
                                                    <span class="fw-semibold text-danger">$55,000</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="kanban-item">
                                    <div class="card shadow mb-2 border-danger-subtle">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-start mb-2">
                                                <div>
                                                    <h5 class="mb-0 fw-semibold">
                                                        <a class="link-reset" href="#!">Social Media Integration
                                                            Deal</a>
                                                    </h5>
                                                    <small class="text-muted">BuzzPro Media</small>
                                                </div>
                                                <div class="ms-auto dropdown">
                                                    <a class="btn btn-icon btn-sm btn-ghost-light text-muted"
                                                        data-bs-toggle="dropdown" href="#">
                                                        <i class="ti ti-dots-vertical fs-lg"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-1">
                                                    <img alt="Ethan Cruz" class="rounded-circle avatar-xs"
                                                        src="/images/users/user-8.jpg" />
                                                    <span class="fw-medium text-muted fs-sm">Ethan Cruz</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <i class="ti ti-calendar-x text-danger fs-lg"></i>
                                                    <h5 class="fs-base mb-0 fw-medium">10 Jul, 2025</h5>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center gap-2 fs-sm">
                                                        <i class="ti ti-x text-danger fs-lg"></i> Lost
                                                    </div>
                                                    <span class="fw-semibold text-danger">$38,400</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end Done Data-->
                </div> <!-- End Kanban-content-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end row-->
@endsection

@section('scripts')
    @vite(['resources/js/pages/crm-pipeline.js'])
@endsection
