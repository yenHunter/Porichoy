@extends('layouts.vertical', ['title' => 'Dashboard 2'])

@section('css')
    @vite(['node_modules/jsvectormap/dist/jsvectormap.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['title' => 'Dashboard 2'])

    <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1 g-3 align-items-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="avatar avatar-lg flex-shrink-0">
                            <span class="avatar-title bg-info-subtle text-info rounded fs-24">
                                <i class="ti ti-clipboard-list"></i>
                            </span>
                        </div>
                        <div class="text-end">
                            <h4 class="mb-0">28</h4>
                            <p class="mb-0 text-muted">Active Projects</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted fs-xs fw-semibold">PROGRESS</span>
                            <span class="text-muted">75%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-info" style="width: 75%;"></div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="avatar avatar-lg flex-shrink-0">
                            <span class="avatar-title bg-success-subtle text-success rounded fs-24">
                                <i class="ti ti-checklist"></i>
                            </span>
                        </div>
                        <div class="text-end">
                            <h4 class="mb-0">124</h4>
                            <p class="mb-0 text-muted">Tasks Completed</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted fs-xs fw-semibold">TARGET</span>
                            <span class="text-muted">88%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 88%;"></div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="avatar avatar-lg flex-shrink-0">
                            <span class="avatar-title bg-warning-subtle text-warning rounded fs-24">
                                <i class="ti ti-clock-hour-4"></i>
                            </span>
                        </div>
                        <div class="text-end">
                            <h4 class="mb-0">16</h4>
                            <p class="mb-0 text-muted">Pending Tasks</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted fs-xs fw-semibold">DEADLINES</span>
                            <span class="text-muted">42%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-warning" style="width: 42%;"></div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="avatar avatar-lg flex-shrink-0">
                            <span class="avatar-title bg-danger-subtle text-danger rounded fs-24">
                                <i class="ti ti-user-cog"></i>
                            </span>
                        </div>
                        <div class="text-end">
                            <h4 class="mb-0">9</h4>
                            <p class="mb-0 text-muted">Project Managers</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted fs-xs fw-semibold">ALLOCATED</span>
                            <span class="text-muted">100%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-danger" style="width: 100%;"></div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header border-dashed card-tabs d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Project Overview</h4>
                    </div>
                    <ul class="nav nav-tabs nav-justified card-header-tabs nav-bordered">
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#today-ct">
                                <i class="ti ti-home d-md-none d-block"></i>
                                <span class="d-none d-md-block">Today</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="true" class="nav-link active" data-bs-toggle="tab" href="#monthly-ct">
                                <i class="ti ti-user-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">Monthly</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#annual-ct">
                                <i class="ti ti-settings d-md-none d-block"></i>
                                <span class="d-none d-md-block">Annual</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="project-overview-chart"></div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header border-dashed card-tabs d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Task Progress</h4>
                    </div>
                    <ul class="nav nav-tabs nav-justified card-header-tabs nav-bordered">
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#today-ct">
                                <i class="ti ti-home d-md-none d-block"></i>
                                <span class="d-none d-md-block">Today</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="true" class="nav-link active" data-bs-toggle="tab" href="#monthly-ct">
                                <i class="ti ti-user-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">Monthly</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#annual-ct">
                                <i class="ti ti-settings d-md-none d-block"></i>
                                <span class="d-none d-md-block">Annual</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div dir="ltr">
                        <div class="apex-charts" id="task-progress-chart"></div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Chat</h4>
                </div> <!-- end card-header-->
                <div class="card-body py-0" data-simplebar="" id="chat-container" style="height: 380px;">
                    <!-- Message 1 -->
                    <div class="d-flex align-items-start gap-2 my-3 chat-item">
                        <img alt="User" class="avatar-md rounded-circle" src="/images/users/user-5.jpg" />
                        <div>
                            <div class="chat-message py-2 px-3 bg-warning-subtle rounded">
                                Hey! Are you available for a quick call? 📞
                            </div>
                            <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 08:55 am</div>
                        </div>
                    </div>
                    <!-- Message 2 -->
                    <div class="d-flex align-items-start gap-2 my-3 text-end chat-item justify-content-end">
                        <div>
                            <div class="chat-message py-2 px-3 bg-info-subtle rounded">
                                Sure, give me 5 minutes. Just wrapping something up.
                            </div>
                            <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 08:57 am</div>
                        </div>
                        <img alt="User" class="avatar-md rounded-circle" src="/images/users/user-2.jpg" />
                    </div>
                    <!-- Message 3 -->
                    <div class="d-flex align-items-start gap-2 my-3 chat-item">
                        <img alt="User" class="avatar-md rounded-circle" src="/images/users/user-5.jpg" />
                        <div>
                            <div class="chat-message py-2 px-3 bg-warning-subtle rounded">
                                Perfect. Let me know when you're ready 👍
                            </div>
                            <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 08:58 am</div>
                        </div>
                    </div>
                    <!-- Message 4 -->
                    <div class="d-flex align-items-start gap-2 my-3 text-end chat-item justify-content-end">
                        <div>
                            <div class="chat-message py-2 px-3 bg-info-subtle rounded">
                                Ready now. Calling you!
                            </div>
                            <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 09:00 am</div>
                        </div>
                        <img alt="User" class="avatar-md rounded-circle" src="/images/users/user-2.jpg" />
                    </div>
                    <!-- Message 5 -->
                    <div class="d-flex align-items-start gap-2 my-3 chat-item">
                        <img alt="User" class="avatar-md rounded-circle" src="/images/users/user-5.jpg" />
                        <div>
                            <div class="chat-message py-2 px-3 bg-warning-subtle rounded">
                                Thanks for your time earlier!
                            </div>
                            <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 09:45 am</div>
                        </div>
                    </div>
                    <!-- Message 6 -->
                    <div class="d-flex align-items-start gap-2 my-3 text-end chat-item justify-content-end">
                        <div>
                            <div class="chat-message py-2 px-3 bg-info-subtle rounded">
                                Of course! It was a productive discussion.
                            </div>
                            <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 09:46 am</div>
                        </div>
                        <img alt="User" class="avatar-md rounded-circle" src="/images/users/user-2.jpg" />
                    </div>
                    <!-- Message 7 -->
                    <div class="d-flex align-items-start gap-2 my-3 chat-item">
                        <img alt="User" class="avatar-md rounded-circle" src="/images/users/user-5.jpg" />
                        <div>
                            <div class="chat-message py-2 px-3 bg-warning-subtle rounded">
                                I’ll send over the updated files by noon.
                            </div>
                            <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 09:50 am</div>
                        </div>
                    </div>
                </div> <!-- end card-body -->
                <div class="card-footer bg-body-secondary border-top border-dashed border-bottom-0">
                    <div class="d-flex gap-2">
                        <div class="app-search flex-grow-1">
                            <input class="form-control bg-light-subtle border-light" placeholder="Enter message..."
                                type="text" />
                            <i class="app-search-icon text-muted" data-lucide="message-square"></i>
                        </div>
                        <a class="btn btn-primary btn-icon" href="#!"><i class="ti ti-send-2 fs-xl"></i></a>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xxl-4 col-lg-6">
            <div class="card">
                <div class="card-header justify-content-between align-items-center">
                    <h5 class="card-title">Active Projects Overview</h5>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                        <a class="card-action-item" data-action="card-refresh" href="#!"><i
                                class="ti ti-refresh"></i></a>
                        <a class="card-action-item" data-action="card-close" href="#!"><i class="ti ti-x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-lg">
                            <h3 class="mb-2 fw-bold"><span data-target="4,852">0</span></h3>
                            <p class="mb-2 fw-semibold text-muted">Projects in Progress</p>
                        </div><!--end col-->
                        <div class="col-lg-auto align-self-center">
                            <ul class="list-unstyled mb-0 lh-lg">
                                <li>
                                    <i class="ti ti-caret-right-filled fs-lg align-middle text-primary"></i>
                                    <span class="text-muted">Web Development</span>
                                </li>
                                <li>
                                    <i class="ti ti-caret-right-filled fs-lg align-middle text-success"></i>
                                    <span class="text-muted">Mobile Apps</span>
                                </li>
                                <li>
                                    <i class="ti ti-caret-right-filled fs-lg align-middle text-info"></i>
                                    <span class="text-muted">UI/UX Design</span>
                                </li>
                            </ul>
                        </div><!--end col-->
                    </div><!--end row-->
                    <div class="progress mb-3" style="height: 10px;">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" class="progress-bar"
                            role="progressbar" style="width: 40%"></div>
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" class="progress-bar bg-success"
                            role="progressbar" style="width: 35%"></div>
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar bg-info"
                            role="progressbar" style="width: 25%"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-custom table-nowrap table-hover table-centered mb-0">
                            <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                                <tr class="text-uppercase fs-xxs">
                                    <th class="text-muted">Project</th>
                                    <th class="text-muted text-end">Tasks Completed</th>
                                    <th class="text-muted text-end">Deadline</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-decoration-underline">E-Commerce Redesign</td>
                                    <td class="text-end">45/60</td>
                                    <td class="text-end">15 Aug 2025</td>
                                </tr>
                                <tr>
                                    <td class="text-decoration-underline">Mobile Banking App</td>
                                    <td class="text-end">28/40</td>
                                    <td class="text-end">20 Sep 2025</td>
                                </tr>
                                <tr>
                                    <td class="text-decoration-underline">Corporate Website</td>
                                    <td class="text-end">18/25</td>
                                    <td class="text-end">05 Aug 2025</td>
                                </tr>
                                <tr>
                                    <td class="text-decoration-underline">POS System Upgrade</td>
                                    <td class="text-end">32/50</td>
                                    <td class="text-end">01 Oct 2025</td>
                                </tr>
                                <tr>
                                    <td class="text-decoration-underline">Inventory Management Tool</td>
                                    <td class="text-end">12/20</td>
                                    <td class="text-end">12 Aug 2025</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- ed .table-responsive-->
                    <div class="text-center mt-3">
                        <a class="link-reset text-decoration-underline fw-semibold link-offset-3" href="#!">
                            View all Projects <i class="ti ti-link"></i>
                        </a>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xxl-4 col-lg-6">
            <div class="card">
                <div class="card-header justify-content-between align-items-center">
                    <h4 class="card-title">Top Projects by Country</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                        <a class="card-action-item" data-action="card-refresh" href="#!"><i
                                class="ti ti-refresh"></i></a>
                        <a class="card-action-item" data-action="card-close" href="#!"><i class="ti ti-x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img alt="India" class="avatar-xxs rounded" src="/images/flags/in.svg" />
                        <h5 class="mb-0 fw-medium">
                            <a class="link-reset" href="#!">India</a> <small class="text-muted">8 Active
                                Projects</small>
                        </h5>
                        <div class="ms-auto">
                            <div class="d-flex align-items-center gap-3 text-end">
                                <p class="mb-0 fw-medium">E-Commerce Revamp</p>
                                <p class="badge badge-label fs-xxs badge-soft-success mb-0">+3.2%</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img alt="Germany" class="avatar-xxs rounded" src="/images/flags/de.svg" />
                        <h5 class="mb-0 fw-medium">
                            <a class="link-reset" href="#!">Germany</a> <small class="text-muted">5 Active
                                Projects</small>
                        </h5>
                        <div class="ms-auto">
                            <div class="d-flex align-items-center gap-3 text-end">
                                <p class="mb-0 fw-medium">POS Upgrade</p>
                                <p class="badge badge-label fs-xxs badge-soft-success mb-0">+1.5%</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img alt="France" class="avatar-xxs rounded" src="/images/flags/fr.svg" />
                        <h5 class="mb-0 fw-medium">
                            <a class="link-reset" href="#!">France</a> <small class="text-muted">4 Active
                                Projects</small>
                        </h5>
                        <div class="ms-auto">
                            <div class="d-flex align-items-center gap-3 text-end">
                                <p class="mb-0 fw-medium">Mobile App</p>
                                <p class="badge badge-label fs-xxs badge-soft-danger mb-0">-0.8%</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img alt="United States" class="avatar-xxs rounded" src="/images/flags/us.svg" />
                        <h5 class="mb-0 fw-medium">
                            <a class="link-reset" href="#!">United States</a> <small class="text-muted">10 Active
                                Projects</small>
                        </h5>
                        <div class="ms-auto">
                            <div class="d-flex align-items-center gap-3 text-end">
                                <p class="mb-0 fw-medium">SaaS Dashboard</p>
                                <p class="badge badge-label fs-xxs badge-soft-success mb-0">+2.1%</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img alt="United Kingdom" class="avatar-xxs rounded" src="/images/flags/gb.svg" />
                        <h5 class="mb-0 fw-medium">
                            <a class="link-reset" href="#!">United Kingdom</a> <small class="text-muted">3 Active
                                Projects</small>
                        </h5>
                        <div class="ms-auto">
                            <div class="d-flex align-items-center gap-3 text-end">
                                <p class="mb-0 fw-medium">CRM System</p>
                                <p class="badge badge-label fs-xxs badge-soft-danger mb-0">-1.2%</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img alt="Canada" class="avatar-xxs rounded" src="/images/flags/ca.svg" />
                        <h5 class="mb-0 fw-medium">
                            <a class="link-reset" href="#!">Canada</a> <small class="text-muted">4 Active
                                Projects</small>
                        </h5>
                        <div class="ms-auto">
                            <div class="d-flex align-items-center gap-3 text-end">
                                <p class="mb-0 fw-medium">Inventory Tool</p>
                                <p class="badge badge-label fs-xxs badge-soft-success mb-0">+0.9%</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img alt="Japan" class="avatar-xxs rounded" src="/images/flags/jp.svg" />
                        <h5 class="mb-0 fw-medium">
                            <a class="link-reset" href="#!">Japan</a> <small class="text-muted">6 Active
                                Projects</small>
                        </h5>
                        <div class="ms-auto">
                            <div class="d-flex align-items-center gap-3 text-end">
                                <p class="mb-0 fw-medium">Retail App</p>
                                <p class="badge badge-label fs-xxs badge-soft-warning mb-0">0.0%</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img alt="Australia" class="avatar-xxs rounded" src="/images/flags/au.svg" />
                        <h5 class="mb-0 fw-medium">
                            <a class="link-reset" href="#!">Australia</a> <small class="text-muted">2 Active
                                Projects</small>
                        </h5>
                        <div class="ms-auto">
                            <div class="d-flex align-items-center gap-3 text-end">
                                <p class="mb-0 fw-medium">HR Platform</p>
                                <p class="badge badge-label fs-xxs badge-soft-success mb-0">+1.1%</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a class="link-reset text-decoration-underline fw-semibold link-offset-3" href="projects.html">
                            View all Projects <i class="ti ti-briefcase"></i>
                        </a>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')
    @vite(['resources/js/pages/dashboard-2.js'])
@endsection
