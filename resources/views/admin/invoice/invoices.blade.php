@extends('layouts.vertical', ['title' => 'Invoice Management'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Invoices', 'title' => 'Invoice List'])

    <div class="row">
        <div class="col-12">
            <div class="card" data-table="" data-table-rows-per-page="8">
                <div class="card-header border-light justify-content-between">
                    <div class="d-flex gap-2">
                        <div class="app-search">
                            <input class="form-control" data-table-search="" placeholder="Search invoices..."
                                type="text" />
                            <i class="app-search-icon text-muted" data-lucide="search"></i>
                        </div>
                        <button class="btn btn-danger d-none" data-table-delete-selected="">Delete</button>
                        <a class="btn btn-secondary" href="{{ route('second', ['invoice', 'create']) }}"><i
                                class="ti ti-plus fs-lg me-1"></i> Create Invoice</a>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="me-2 fw-semibold">Filter By:</span>
                        <!-- Invoice Status Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="status">
                                <option value="All">Status</option>
                                <option value="Paid">Paid</option>
                                <option value="Pending">Pending</option>
                                <option value="Overdue">Overdue</option>
                                <option value="Draft">Draft</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="check-circle"></i>
                        </div>
                        <!-- Records Per Page -->
                        <div>
                            <select class="form-select form-control my-1 my-md-0" data-table-set-rows-per-page="">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-custom table-centered table-select table-hover w-100 mb-0">
                        <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                            <tr class="text-uppercase fs-xxs">
                                <th class="ps-3" style="width: 1%;">
                                    <input class="form-check-input form-check-input-light fs-14 mt-0"
                                        data-table-select-all="" id="select-all-files" type="checkbox" value="option" />
                                </th>
                                <th>ID</th>
                                <th>Create &amp; End Date</th>
                                <th data-table-sort="name">Clients Name</th>
                                <th data-table-sort="">Purchase</th>
                                <th data-table-sort="">Amount</th>
                                <th data-column="status" data-table-sort="">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead><!-- end table-head -->
                        <tbody>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 file-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="m-0">
                                        <span class="ti ti-file-invoice text-success fs-lg"></span>
                                        <a class="link-reset fw-semibold"
                                            href="{{ route('second', ['invoice', 'details']) }}">#INV-0120010</a>
                                    </h5>
                                </td>
                                <td>Feb 2 - Feb 10, 2025</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-7" class="img-fluid rounded-circle"
                                                src="/images/users/user-7.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base"><a class="link-reset"
                                                    data-sort="name"
                                                    href="{{ route('second', ['users', 'profile']) }}">Emily
                                                    Parker</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">emily@startupwave.io</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Template - Extended License</td>
                                <td>$999.00 USD</td>
                                <td>
                                    <span class="badge bg-success-subtle text-success badge-label">Paid</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm"
                                            href="{{ route('second', ['invoice', 'details']) }}"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" href="javascript:void(0);"> <i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" data-table-delete-row=""
                                            href="javascript:void(0);"> <i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 file-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="m-0">
                                        <span class="ti ti-file-invoice text-warning fs-lg"></span>
                                        <a class="link-reset fw-semibold"
                                            href="{{ route('second', ['invoice', 'details']) }}">#INV-0120009</a>
                                    </h5>
                                </td>
                                <td>Feb 5 - Feb 12, 2025</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title text-bg-info fw-bold rounded-circle">
                                                MS
                                            </span>
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base"><a class="link-reset"
                                                    data-sort="name"
                                                    href="{{ route('second', ['users', 'profile']) }}">Michael
                                                    Scott</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">michael@dundermifflin.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>CRM Dashboard - Regular License</td>
                                <td>$249.00 USD</td>
                                <td>
                                    <span class="badge bg-warning-subtle text-warning badge-label">Pending</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm"
                                            href="{{ route('second', ['invoice', 'details']) }}"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" href="javascript:void(0);"> <i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" data-table-delete-row=""
                                            href="javascript:void(0);"> <i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 file-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="m-0">
                                        <span class="ti ti-file-invoice text-danger fs-lg"></span>
                                        <a class="link-reset fw-semibold"
                                            href="{{ route('second', ['invoice', 'details']) }}">#INV-0120008</a>
                                    </h5>
                                </td>
                                <td>Jan 10 - Jan 15, 2025</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-3" class="img-fluid rounded-circle"
                                                src="/images/users/user-3.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base"><a class="link-reset"
                                                    data-sort="name"
                                                    href="{{ route('second', ['users', 'profile']) }}">Samantha
                                                    Reed</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">samantha@alphatech.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Landing Page - Agency Pack</td>
                                <td>$349.00 USD</td>
                                <td>
                                    <span class="badge bg-danger-subtle text-danger badge-label">Overdue</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm"
                                            href="{{ route('second', ['invoice', 'details']) }}"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" href="javascript:void(0);"> <i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" data-table-delete-row=""
                                            href="javascript:void(0);"> <i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 file-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="m-0">
                                        <span class="ti ti-file-invoice text-primary fs-lg"></span>
                                        <a class="link-reset fw-semibold"
                                            href="{{ route('second', ['invoice', 'details']) }}">#INV-0120007</a>
                                    </h5>
                                </td>
                                <td>Mar 1 - Mar 5, 2025</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-2" class="img-fluid rounded-circle"
                                                src="/images/users/user-2.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base"><a class="link-reset"
                                                    data-sort="name"
                                                    href="{{ route('second', ['users', 'profile']) }}">Jonathan
                                                    Lee</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">jonathan@zenflow.io</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Task Manager - SaaS Version</td>
                                <td>$799.00 USD</td>
                                <td>
                                    <span class="badge bg-info-subtle text-info badge-label">Draft</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm"
                                            href="{{ route('second', ['invoice', 'details']) }}"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" href="javascript:void(0);"> <i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" data-table-delete-row=""
                                            href="javascript:void(0);"> <i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 file-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="m-0">
                                        <span class="ti ti-file-invoice text-success fs-lg"></span>
                                        <a class="link-reset fw-semibold"
                                            href="{{ route('second', ['invoice', 'details']) }}">#INV-0120006</a>
                                    </h5>
                                </td>
                                <td>Mar 10 - Mar 15, 2025</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title text-bg-primary fw-bold rounded-circle">
                                                CD
                                            </span>
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base"><a class="link-reset"
                                                    data-sort="name"
                                                    href="{{ route('second', ['users', 'profile']) }}">Carlos
                                                    Diaz</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">carlos@themeverse.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Admin Panel - Developer License</td>
                                <td>$1,199.00 USD</td>
                                <td>
                                    <span class="badge bg-success-subtle text-success badge-label">Paid</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm"
                                            href="{{ route('second', ['invoice', 'details']) }}"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" href="javascript:void(0);"> <i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" data-table-delete-row=""
                                            href="javascript:void(0);"> <i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 file-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="m-0">
                                        <span class="ti ti-file-invoice text-warning fs-lg"></span>
                                        <a class="link-reset fw-semibold"
                                            href="{{ route('second', ['invoice', 'details']) }}">#INV-0120005</a>
                                    </h5>
                                </td>
                                <td>Mar 20 - Mar 25, 2025</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-4" class="img-fluid rounded-circle"
                                                src="/images/users/user-4.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base"><a class="link-reset"
                                                    data-sort="name"
                                                    href="{{ route('second', ['users', 'profile']) }}">Lisa
                                                    Brown</a></h5>
                                            <p class="text-muted fs-xs mb-0">lisa@digitize.io</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Analytics Suite - Enterprise</td>
                                <td>$1,499.00 USD</td>
                                <td>
                                    <span class="badge bg-warning-subtle text-warning badge-label">Pending</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm"
                                            href="{{ route('second', ['invoice', 'details']) }}"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" href="javascript:void(0);"> <i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" data-table-delete-row=""
                                            href="javascript:void(0);"> <i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 file-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="m-0">
                                        <span class="ti ti-file-invoice text-primary fs-lg"></span>
                                        <a class="link-reset fw-semibold"
                                            href="{{ route('second', ['invoice', 'details']) }}">#INV-0120004</a>
                                    </h5>
                                </td>
                                <td>Apr 1 - Apr 7, 2025</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title text-bg-success fw-bold rounded-circle">
                                                RM
                                            </span>
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base"><a class="link-reset"
                                                    data-sort="name"
                                                    href="{{ route('second', ['users', 'profile']) }}">Ryan
                                                    Mitchell</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">ryan@bizsol.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Sales App - Regular License</td>
                                <td>$499.00 USD</td>
                                <td>
                                    <span class="badge bg-info-subtle text-info badge-label">Draft</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm"
                                            href="{{ route('second', ['invoice', 'details']) }}"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" href="javascript:void(0);"> <i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" data-table-delete-row=""
                                            href="javascript:void(0);"> <i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 file-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="m-0">
                                        <span class="ti ti-file-invoice text-success fs-lg"></span>
                                        <a class="link-reset fw-semibold"
                                            href="{{ route('second', ['invoice', 'details']) }}">#INV-0120003</a>
                                    </h5>
                                </td>
                                <td>Apr 8 - Apr 12, 2025</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-8" class="img-fluid rounded-circle"
                                                src="/images/users/user-8.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base"><a class="link-reset"
                                                    data-sort="name"
                                                    href="{{ route('second', ['users', 'profile']) }}">Nina
                                                    Hughes</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">nina@creativelabs.io</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Marketing Kit - Extended License</td>
                                <td>$899.00 USD</td>
                                <td>
                                    <span class="badge bg-success-subtle text-success badge-label">Paid</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm"
                                            href="{{ route('second', ['invoice', 'details']) }}"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" href="javascript:void(0);"> <i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" data-table-delete-row=""
                                            href="javascript:void(0);"> <i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 file-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="m-0">
                                        <span class="ti ti-file-invoice text-warning fs-lg"></span>
                                        <a class="link-reset fw-semibold"
                                            href="{{ route('second', ['invoice', 'details']) }}">#INV-0120002</a>
                                    </h5>
                                </td>
                                <td>Apr 10 - Apr 14, 2025</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-9" class="img-fluid rounded-circle"
                                                src="/images/users/user-9.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base"><a class="link-reset"
                                                    data-sort="name"
                                                    href="{{ route('second', ['users', 'profile']) }}">Oliver
                                                    Grant</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">oliver@nextgenapps.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Mobile Kit - Standard Plan</td>
                                <td>$599.00 USD</td>
                                <td>
                                    <span class="badge bg-warning-subtle text-warning badge-label">Pending</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm"
                                            href="{{ route('second', ['invoice', 'details']) }}"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" href="javascript:void(0);"> <i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" data-table-delete-row=""
                                            href="javascript:void(0);"> <i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 file-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="m-0">
                                        <span class="ti ti-file-invoice text-danger fs-lg"></span>
                                        <a class="link-reset fw-semibold"
                                            href="{{ route('second', ['invoice', 'details']) }}">#INV-0120001</a>
                                    </h5>
                                </td>
                                <td>Apr 15 - Apr 20, 2025</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-10" class="img-fluid rounded-circle"
                                                src="/images/users/user-10.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base"><a class="link-reset"
                                                    data-sort="name"
                                                    href="{{ route('second', ['users', 'profile']) }}">Sophia
                                                    Kim</a></h5>
                                            <p class="text-muted fs-xs mb-0">sophia@pixelhub.io</p>
                                        </div>
                                    </div>
                                </td>
                                <td>UI Kit - Commercial License</td>
                                <td>$749.00 USD</td>
                                <td>
                                    <span class="badge bg-danger-subtle text-danger badge-label">Overdue</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm"
                                            href="{{ route('second', ['invoice', 'details']) }}"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" href="javascript:void(0);"> <i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm" data-table-delete-row=""
                                            href="javascript:void(0);"> <i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- end table-body -->
                    </table><!-- end table -->
                </div>
                <div class="card-footer border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div data-table-pagination-info="invoices"></div>
                        <div data-table-pagination=""></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
@endsection

@section('scripts')
    @vite(['resources/js/pages/custom-table.js'])
@endsection
