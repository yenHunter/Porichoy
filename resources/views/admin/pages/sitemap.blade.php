@extends('layouts.vertical', ['title' => 'Sitemap'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Pages', 'title' => 'Sitemap'])

    <div class="row">
        <!-- Column 1: Dashboard & Pages -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="fw-bold text-uppercase">
                        <i class="ti ti-circle-dot me-1"></i> Dashboard &amp; Pages
                    </h5>
                    <ul class="list-unstyled sitemap-list mt-3">
                        <li>
                            <a class="link-reset fw-semibold" href="    #"><i
                                    class="ti ti-layout-dashboard me-1 text-muted"></i> Dashboards</a>
                            <ul>
                                <li><a class="link-reset" href="#">Analytics</a></li>
                                <li><a class="link-reset" href="#">CRM</a></li>
                                <li><a class="link-reset" href="#">Sales</a></li>
                                <li><a class="link-reset" href="#">Minimal</a></li>
                                <li><a class="link-reset" href="#">eCommerce</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="link-reset fw-semibold" href="#"><i class="ti ti-user me-1 text-muted"></i>
                                Profile</a>
                            <ul>
                                <li><a class="link-reset" href="#">Overview</a></li>
                                <li><a class="link-reset" href="#">Edit</a></li>
                                <li><a class="link-reset" href="#">Security</a></li>
                            </ul>
                        </li>
                        <li><a class="link-reset fw-semibold" href="#"><i class="ti ti-help me-1 text-muted"></i> Help
                                Center</a></li>
                        <li><a class="link-reset fw-semibold" href="#"><i class="ti ti-lock me-1 text-muted"></i>
                                Login</a></li>
                        <li><a class="link-reset fw-semibold" href="#"><i class="ti ti-user-plus me-1 text-muted"></i>
                                Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Column 2: Apps & Management -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="fw-bold text-uppercase">
                        <i class="ti ti-circle-dot me-1"></i> Applications
                    </h5>
                    <ul class="list-unstyled sitemap-list mt-3">
                        <li>
                            <a class="link-reset fw-semibold" href="#"><i class="ti ti-calendar me-1 text-muted"></i>
                                Calendar</a>
                        </li>
                        <li>
                            <a class="link-reset fw-semibold" href="#"><i class="ti ti-mail me-1 text-muted"></i>
                                Email</a>
                            <ul>
                                <li><a class="link-reset" href="#">Inbox</a></li>
                                <li><a class="link-reset" href="#">Read</a></li>
                                <li><a class="link-reset" href="#">Compose</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="link-reset fw-semibold" href="#"><i class="ti ti-users me-1 text-muted"></i>
                                Users</a>
                            <ul>
                                <li><a class="link-reset" href="#">List</a></li>
                                <li><a class="link-reset" href="#">Add User</a></li>
                                <li><a class="link-reset" href="#">Roles</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="link-reset fw-semibold" href="#"><i class="ti ti-notebook me-1 text-muted"></i>
                                Projects</a>
                            <ul>
                                <li><a class="link-reset" href="#">Overview</a></li>
                                <li><a class="link-reset" href="#">Create</a></li>
                                <li><a class="link-reset" href="#">Tasks</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Column 3: Settings & Reports -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="fw-bold text-uppercase">
                        <i class="ti ti-circle-dot me-1"></i> Reports &amp; Settings
                    </h5>
                    <ul class="list-unstyled sitemap-list mt-3">
                        <li>
                            <a class="link-reset fw-semibold" href="#"><i class="ti ti-chart-bar me-1 text-muted"></i>
                                Reports</a>
                            <ul>
                                <li><a class="link-reset" href="#">Sales</a></li>
                                <li><a class="link-reset" href="#">Users</a></li>
                                <li><a class="link-reset" href="#">Performance</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="link-reset fw-semibold" href="#"><i class="ti ti-wallet me-1 text-muted"></i>
                                Billing</a>
                            <ul>
                                <li><a class="link-reset" href="#">Invoices</a></li>
                                <li><a class="link-reset" href="#">Payments</a></li>
                                <li><a class="link-reset" href="#">Methods</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="link-reset fw-semibold" href="#"><i class="ti ti-settings me-1 text-muted"></i>
                                Settings</a>
                            <ul>
                                <li><a class="link-reset" href="#">General</a></li>
                                <li><a class="link-reset" href="#">Appearance</a></li>
                                <li><a class="link-reset" href="#">Integrations</a></li>
                                <li><a class="link-reset" href="#">Audit Logs</a></li>
                            </ul>
                        </li>
                        <li><a class="link-reset fw-semibold" href="#"><i class="ti ti-logout me-1 text-muted"></i>
                                Logout</a></li>
                    </ul>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
@endsection

@section('scripts')
@endsection
