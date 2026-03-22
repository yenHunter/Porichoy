@extends('layouts.vertical', ['title' => 'CRM Estimations'])

@section('css')
@vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'CRM', 'title' => 'Estimations'])

    <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-2">
        <!-- Total Estimations Widget -->
        <div class="col">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <h5 class="fs-xl mb-0">52</h5>
                        <span>+15.7% <i class="ti ti-arrow-up text-success"></i></span>
                    </div>
                    <p class="text-muted mb-0">Total estimations created</p>
                </div>
            </div>
        </div>
        <!-- Approved Estimations Widget -->
        <div class="col">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <h5 class="fs-xl mb-0">24</h5>
                        <span>+10.2% <i class="ti ti-arrow-up text-success"></i></span>
                    </div>
                    <p class="text-muted mb-0">Approved estimations</p>
                </div>
            </div>
        </div>
        <!-- Declined Estimations Widget -->
        <div class="col">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <h5 class="fs-xl mb-0">8</h5>
                        <span>-3.9% <i class="ti ti-arrow-down text-danger"></i></span>
                    </div>
                    <p class="text-muted mb-0">Declined estimations</p>
                </div>
            </div>
        </div>
        <!-- Highest Estimation Value Widget -->
        <div class="col">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <h5 class="fs-xl mb-0">$138,500</h5>
                        <span>Top value <i class="ti ti-currency-dollar text-success"></i></span>
                    </div>
                    <p class="text-muted mb-0">Highest estimation value</p>
                </div>
            </div>
        </div>
        <!-- Avg. Estimation Review Time Widget -->
        <div class="col-lg col-md-auto">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <h5 class="fs-xl mb-0">2.8 <small class="fs-6">days</small></h5>
                        <span>+1.1% <i class="ti ti-clock text-warning"></i></span>
                    </div>
                    <p class="text-muted mb-0">Avg. review time</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card" data-table="" data-table-rows-per-page="8">
                <div class="card-header border-light justify-content-between">
                    <div class="d-flex gap-2">
                        <div class="app-search">
                            <input class="form-control" data-table-search="" placeholder="Search deals..." type="search" />
                            <i class="app-search-icon text-muted" data-lucide="search"></i>
                        </div>
                        <button class="btn btn-primary" data-bs-target="#createEstimationModal" data-bs-toggle="modal">
                            <i class="ti ti-plus me-1"></i> New Estimation
                        </button>
                        <button class="btn btn-danger d-none" data-table-delete-selected="">Delete</button>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="me-2 fw-semibold">Filter By:</span>
                        <!-- Status Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="status">
                                <option value="">Status</option>
                                <option value="Approved">Approved</option>
                                <option value="Pending">Pending</option>
                                <option value="Declined">Declined</option>
                                <option value="Sent">Sent</option>
                                <option value="In Review">In Review</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="shuffle"></i>
                        </div>
                        <!-- Value Range Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-range-filter="value">
                                <option value="">Value Range</option>
                                <option value="0-5000">$0 - $5,000</option>
                                <option value="5001-10000">$5,001 - $10,000</option>
                                <option value="10001-20000">$10,001 - $20,000</option>
                                <option value="20001-50000">$20,001 - $50,000</option>
                                <option value="50000+">$50,000+</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="dollar-sign"></i>
                        </div>
                        <!-- Records Per Page -->
                        <div>
                            <select class="form-select form-control my-1 my-md-0" data-table-set-rows-per-page="">
                                <option value="5">5</option>
                                <option selected="" value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-custom table-centered table-select table-hover w-100 mb-0">
                            <thead class="bg-light align-middle bg-opacity-25 thead-sm text-nowrap">
                                <tr class="text-uppercase fs-xxs">
                                    <th class="ps-3" style="width: 1%;">
                                        <input class="form-check-input form-check-input-light fs-14 mt-0"
                                            data-table-select-all="" id="select-all-estimations" type="checkbox"
                                            value="option" />
                                    </th>
                                    <th data-table-sort="">Estimate ID</th>
                                    <th>Project</th>
                                    <th>Client</th>
                                    <th data-column="value" data-table-sort="">Estimated Value</th>
                                    <th>Estimated By</th>
                                    <th data-table-sort="">Created</th>
                                    <th data-table-sort="">Expected Close</th>
                                    <th data-column="status" data-table-sort="">Status</th>
                                    <th class="text-center" style="width: 1%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-nowrap">
                                <!-- Row 1 -->
                                <tr>
                                    <td class="ps-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 estimation-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td><a class="fw-semibold link-reset" href="#!">#EST00042</a></td>
                                    <td>CRM System Redesign</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Salesforce" height="20" src="/images/logos/airbnb.svg" />
                                            </div>
                                            <a class="link-reset" href="#!">Airbnb</a>
                                        </div>
                                    </td>
                                    <td>$25,000</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Jason Miller" class="avatar-xs rounded-circle"
                                                src="/images/users/user-5.jpg" />
                                            <a class="link-reset" href="#!">Jason Miller</a>
                                        </div>
                                    </td>
                                    <td>15 Jul, 2025 <small class="text-muted">09:30 AM</small></td>
                                    <td>05 Aug, 2025 <small class="text-muted">06:00 PM</small></td>
                                    <td><span class="badge badge-label bg-info-subtle text-info fs-xs">In Review</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-eye fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-edit fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Row 2 -->
                                <tr>
                                    <td class="ps-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 estimation-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td><a class="fw-semibold link-reset" href="#!">#EST00043</a></td>
                                    <td>Lead Tracking Module</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Zendesk" height="20" src="/images/logos/amazon.svg" />
                                            </div>
                                            <a class="link-reset" href="#!">Amazon</a>
                                        </div>
                                    </td>
                                    <td>$14,200</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Ava Green" class="avatar-xs rounded-circle"
                                                src="/images/users/user-4.jpg" />
                                            <a class="link-reset" href="#!">Ava Green</a>
                                        </div>
                                    </td>
                                    <td>17 Jul, 2025 <small class="text-muted">10:15 AM</small></td>
                                    <td>02 Aug, 2025 <small class="text-muted">04:30 PM</small></td>
                                    <td><span
                                            class="badge badge-label bg-success-subtle text-success fs-xs">Approved</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-eye fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-edit fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Row 3 -->
                                <tr>
                                    <td class="ps-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 estimation-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td><a class="fw-semibold link-reset" href="#!">#EST00044</a></td>
                                    <td>Marketing Automation</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                <img alt="HubSpot" height="20" src="/images/logos/apple.svg" />
                                            </div>
                                            <a class="link-reset" href="#!">Apple Inc.</a>
                                        </div>
                                    </td>
                                    <td>$32,000</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Liam Scott" class="avatar-xs rounded-circle"
                                                src="/images/users/user-2.jpg" />
                                            <a class="link-reset" href="#!">Liam Scott</a>
                                        </div>
                                    </td>
                                    <td>18 Jul, 2025 <small class="text-muted">01:40 PM</small></td>
                                    <td>10 Aug, 2025 <small class="text-muted">01:00 PM</small></td>
                                    <td><span class="badge badge-label bg-warning-subtle text-warning fs-xs">Pending</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-eye fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-edit fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Row 4 -->
                                <tr>
                                    <td class="ps-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 estimation-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td><a class="fw-semibold link-reset" href="#!">#EST00045</a></td>
                                    <td>Sales Pipeline Setup</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Pipedrive" height="16" src="/images/logos/asana.svg" />
                                            </div>
                                            <a class="link-reset" href="#!">Asana Studio</a>
                                        </div>
                                    </td>
                                    <td>$21,800</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Noah Carter" class="avatar-xs rounded-circle"
                                                src="/images/users/user-3.jpg" />
                                            <a class="link-reset" href="#!">Noah Carter</a>
                                        </div>
                                    </td>
                                    <td>19 Jul, 2025 <small class="text-muted">03:00 PM</small></td>
                                    <td>08 Aug, 2025 <small class="text-muted">05:45 PM</small></td>
                                    <td><span class="badge badge-label bg-danger-subtle text-danger fs-xs">Declined</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-eye fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-edit fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Row 5 -->
                                <tr>
                                    <td class="ps-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 estimation-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td><a class="fw-semibold link-reset" href="#!">#EST00046</a></td>
                                    <td>Support Portal Development</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Intercom" height="20" src="/images/logos/dropbox.svg" />
                                            </div>
                                            <a class="link-reset" href="#!">Dropbox Inc.</a>
                                        </div>
                                    </td>
                                    <td>$27,500</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Emily Stone" class="avatar-xs rounded-circle"
                                                src="/images/users/user-1.jpg" />
                                            <a class="link-reset" href="#!">Emily Stone</a>
                                        </div>
                                    </td>
                                    <td>20 Jul, 2025 <small class="text-muted">11:20 AM</small></td>
                                    <td>15 Aug, 2025 <small class="text-muted">09:00 AM</small></td>
                                    <td><span class="badge badge-label bg-info-subtle text-info fs-xs">In Review</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-eye fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-edit fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Row 6 -->
                                <tr>
                                    <td class="ps-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 estimation-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td><a class="fw-semibold link-reset" href="#!">#EST00047</a></td>
                                    <td>Client Onboarding System</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Freshdesk" height="20" src="/images/logos/figma.svg" />
                                            </div>
                                            <a class="link-reset" href="#!">Figma Design</a>
                                        </div>
                                    </td>
                                    <td>$16,600</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Sophia White" class="avatar-xs rounded-circle"
                                                src="/images/users/user-6.jpg" />
                                            <a class="link-reset" href="#!">Sophia White</a>
                                        </div>
                                    </td>
                                    <td>21 Jul, 2025 <small class="text-muted">02:00 PM</small></td>
                                    <td>06 Aug, 2025 <small class="text-muted">12:00 PM</small></td>
                                    <td><span
                                            class="badge badge-label bg-secondary-subtle text-secondary fs-xs">Sent</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-eye fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-edit fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Row 7 -->
                                <tr>
                                    <td class="ps-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 estimation-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td><a class="fw-semibold link-reset" href="#!">#EST00048</a></td>
                                    <td>Customer Insights Dashboard</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 d-flex justify-content-center align-items-center">
                                                <img alt="SAP" height="14" src="/images/logos/meta.svg" />
                                            </div>
                                            <a class="link-reset" href="#!">Meta</a>
                                        </div>
                                    </td>
                                    <td>$29,900</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Mason Lee" class="avatar-xs rounded-circle"
                                                src="/images/users/user-7.jpg" />
                                            <a class="link-reset" href="#!">Mason Lee</a>
                                        </div>
                                    </td>
                                    <td>22 Jul, 2025 <small class="text-muted">11:00 AM</small></td>
                                    <td>10 Aug, 2025 <small class="text-muted">04:00 PM</small></td>
                                    <td><span class="badge badge-label bg-info-subtle text-info fs-xs">In Review</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-eye fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-edit fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Row 8 -->
                                <tr>
                                    <td class="ps-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 estimation-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td><a class="fw-semibold link-reset" href="#!">#EST00049</a></td>
                                    <td>Workflow Automation Engine</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 d-flex justify-content-center align-items-center">
                                                <img alt="Slack" height="20" src="/images/logos/slack.svg" />
                                            </div>
                                            <a class="link-reset" href="#!">Slack</a>
                                        </div>
                                    </td>
                                    <td>$33,750</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Olivia James" class="avatar-xs rounded-circle"
                                                src="/images/users/user-8.jpg" />
                                            <a class="link-reset" href="#!">Olivia James</a>
                                        </div>
                                    </td>
                                    <td>23 Jul, 2025 <small class="text-muted">09:30 AM</small></td>
                                    <td>14 Aug, 2025 <small class="text-muted">11:30 AM</small></td>
                                    <td><span
                                            class="badge badge-label bg-success-subtle text-success fs-xs">Approved</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-eye fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-edit fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Row 9 -->
                                <tr>
                                    <td class="ps-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 estimation-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td><a class="fw-semibold link-reset" href="#!">#EST00050</a></td>
                                    <td>Partner API Integration</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 d-flex justify-content-center align-items-center">
                                                <img alt="Zoom" height="16" src="/images/logos/microsoft.svg" />
                                            </div>
                                            <a class="link-reset" href="#!">Microsoft</a>
                                        </div>
                                    </td>
                                    <td>$17,600</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Ella Kim" class="avatar-xs rounded-circle"
                                                src="/images/users/user-9.jpg" />
                                            <a class="link-reset" href="#!">Ella Kim</a>
                                        </div>
                                    </td>
                                    <td>24 Jul, 2025 <small class="text-muted">10:45 AM</small></td>
                                    <td>12 Aug, 2025 <small class="text-muted">03:15 PM</small></td>
                                    <td><span class="badge badge-label bg-warning-subtle text-warning fs-xs">Pending</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-eye fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-edit fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Row 10 -->
                                <tr>
                                    <td class="ps-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 estimation-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td><a class="fw-semibold link-reset" href="#!">#EST00051</a></td>
                                    <td>Mobile CRM App Build</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 d-flex justify-content-center align-items-center">
                                                <img alt="Airtable" height="20" src="/images/logos/openai.svg" />
                                            </div>
                                            <a class="link-reset" href="#!">ChatGPT</a>
                                        </div>
                                    </td>
                                    <td>$40,000</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Daniel Park" class="avatar-xs rounded-circle"
                                                src="/images/users/user-10.jpg" />
                                            <a class="link-reset" href="#!">Daniel Park</a>
                                        </div>
                                    </td>
                                    <td>25 Jul, 2025 <small class="text-muted">02:30 PM</small></td>
                                    <td>20 Aug, 2025 <small class="text-muted">05:00 PM</small></td>
                                    <td><span
                                            class="badge badge-label bg-secondary-subtle text-secondary fs-xs">Sent</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-eye fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-edit fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Row 11 -->
                                <tr>
                                    <td class="ps-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 estimation-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td><a class="fw-semibold link-reset" href="#!">#EST00052</a></td>
                                    <td>Smart Contact Syncing</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 d-flex justify-content-center align-items-center">
                                                <img alt="Zoho" height="20" src="/images/logos/shell.svg" />
                                            </div>
                                            <a class="link-reset" href="#!">Shell Petro.</a>
                                        </div>
                                    </td>
                                    <td>$13,250</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Chloe Nguyen" class="avatar-xs rounded-circle"
                                                src="/images/users/user-4.jpg" />
                                            <a class="link-reset" href="#!">Chloe Nguyen</a>
                                        </div>
                                    </td>
                                    <td>26 Jul, 2025 <small class="text-muted">01:10 PM</small></td>
                                    <td>16 Aug, 2025 <small class="text-muted">11:00 AM</small></td>
                                    <td><span class="badge badge-label bg-danger-subtle text-danger fs-xs">Declined</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-eye fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                    class="ti ti-edit fs-lg"></i></a>
                                            <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table-respo.-->
                </div> <!-- end card-body-->
                <div class="card-footer border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div data-table-pagination-info="proposals"></div>
                        <div data-table-pagination=""></div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
    <!-- Create Estimation Modal -->
    <div aria-hidden="true" aria-labelledby="createEstimationModalLabel" class="modal fade" id="createEstimationModal"
        tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createEstimationModalLabel">Create New Estimation</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <form id="createEstimationForm">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="estimationTitle">Project Name</label>
                                <input class="form-control" id="estimationTitle" placeholder="Enter project name"
                                    required="" type="text" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="clientName">Client</label>
                                <input class="form-control" id="clientName" placeholder="Enter client name"
                                    required="" type="text" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="estimatedValue">Estimated Value (USD)</label>
                                <input class="form-control" id="estimatedValue" placeholder="e.g. 25000" required=""
                                    type="number" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="estimator">Estimated By</label>
                                <input class="form-control" id="estimator" placeholder="Enter team member name"
                                    required="" type="text" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="estimationStatus">Status</label>
                                <select class="form-select" id="estimationStatus" required="">
                                    <option value="">Select status</option>
                                    <option value="Approved">Approved</option>
                                    <option value="In Review">In Review</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Declined">Declined</option>
                                    <option value="Sent">Sent</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="estimationTags">Tags</label>
                                <input class="form-control" id="estimationTags" placeholder="e.g. CRM, Mobile, API"
                                    type="text" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="createdDate">Created Date</label>
                                <input class="form-control" data-date-format="d M, Y" data-provider="flatpickr"
                                    id="createdDate" required="" type="date" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="expectedCloseDate">Expected Close</label>
                                <input class="form-control" data-date-format="d M, Y" data-provider="flatpickr"
                                    id="expectedCloseDate" required="" type="date" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save Estimation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/custom-table.js'])
@endsection
