@extends('layouts.vertical', ['title' => 'CRM Campaign'])

@section('css')
@vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'CRM', 'title' => 'Campaign'])

    <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-2">
        <!-- Total Campaigns Widget -->
        <div class="col">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <h5 class="fs-xl mb-0">11</h5>
                        <span>+22.2% <i class="ti ti-arrow-up text-success"></i></span>
                       </div>
                    <p class="text-muted mb-0">Total campaigns launched</p>
                </div>
            </div>
        </div>
        <!-- Successful Campaigns Widget -->
        <div class="col">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <h5 class="fs-xl mb-0">4</h5>
                        <span>+36.3% <i class="ti ti-arrow-up text-success"></i></span>
                    </div>
                    <p class="text-muted mb-0">Successful campaigns</p>
                </div>
            </div>
        </div>
        <!-- Failed Campaigns Widget -->
        <div class="col">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <h5 class="fs-xl mb-0">2</h5>
                        <span>-18.1% <i class="ti ti-arrow-down text-danger"></i></span>
                    </div>
                    <p class="text-muted mb-0">Failed campaigns</p>
                </div>
            </div>
        </div>
        <!-- Highest Campaign Budget Widget -->
        <div class="col">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <h5 class="fs-xl mb-0">$85,000</h5>
                        <span>Top spend <i class="ti ti-currency-dollar text-success"></i></span>
                    </div>
                    <p class="text-muted mb-0">Highest campaign budget</p>
                </div>
            </div>
        </div>
        <!-- Avg. Campaign Duration Widget -->
        <div class="col-lg col-md-auto">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <h5 class="fs-xl mb-0">5.7 <small class="fs-6">days</small></h5>
                        <span>+1.4% <i class="ti ti-clock text-warning"></i></span>
                    </div>
                    <p class="text-muted mb-0">Avg. campaign duration</p>
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
                            <input class="form-control" data-table-search="" placeholder="Search campaign..."
                                type="search" />
                            <i class="app-search-icon text-muted" data-lucide="search"></i>
                        </div>
                        <button class="btn btn-primary" data-bs-target="#createCampaignModal" data-bs-toggle="modal">
                            <i class="ti ti-plus me-1"></i> Create Campaign
                        </button>
                        <button class="btn btn-danger d-none" data-table-delete-selected="">Delete</button>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="me-2 fw-semibold">Filter By:</span>
                        <!-- Status Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="status">
                                <option value="">Status</option>
                                <option value="Success">Success</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Scheduled">Scheduled</option>
                                <option value="Failed">Failed</option>
                                <option value="Ongoing">Ongoing</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="shuffle"></i>
                        </div>
                        <!-- Budget Range Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-range-filter="budget">
                                <option value="">Budget Range</option>
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
                                            data-table-select-all="" id="select-all-products" type="checkbox"
                                            value="option" />
                                    </th>
                                    <th data-table-sort="">Campaign Name</th>
                                    <th>Creator</th>
                                    <th data-column="budget" data-table-sort="">Budget</th>
                                    <th data-table-sort="">Goals</th>
                                    <th data-column="status" data-table-sort="">Status</th>
                                    <th style="width: 15%;">Tags</th>
                                    <th data-table-sort="">Date Created</th>
                                    <th class="text-center" style="width: 1%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-nowrap">
                                <!-- Row 1 -->
                                <tr>
                                    <td class="ps-3">
                                        <input
                                            class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td>Q4 Lead Nurture Campaign</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Jason Miller" class="avatar-xs rounded-circle"
                                                src="/images/users/user-5.jpg" />
                                            <a class="link-reset" href="#!">Jason Miller</a>
                                        </div>
                                    </td>
                                    <td>$12,500</td>
                                    <td>$80,000</td>
                                    <td><span class="badge bg-warning-subtle text-warning">In Progress</span></td>
                                    <td>
                                        <span class="badge badge-label text-bg-light">Email</span>
                                        <span class="badge badge-label text-bg-light">Retargeting</span>
                                        <span class="badge badge-label text-bg-light">Automation</span>
                                    </td>
                                    <td>21 Aug, 2025 <small class="text-muted">2:45 PM</small></td>
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
                                            class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td>Holiday Flash Sale</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Sandra Walton" class="avatar-xs rounded-circle"
                                                src="/images/users/user-7.jpg" />
                                            <a class="link-reset" href="#!">Sandra Walton</a>
                                        </div>
                                    </td>
                                    <td>$6,000</td>
                                    <td>$30,000</td>
                                    <td><span class="badge bg-success-subtle text-success">Success</span></td>
                                    <td>
                                        <span class="badge badge-label text-bg-light">Seasonal</span>
                                        <span class="badge badge-label text-bg-light">SMS</span>
                                    </td>
                                    <td>05 Dec, 2024 <small class="text-muted">11:00 AM</small></td>
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
                                            class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td>Product Launch Webinar</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Derek Kim" class="avatar-xs rounded-circle"
                                                src="/images/users/user-4.jpg" />
                                            <a class="link-reset" href="#!">Derek Kim</a>
                                        </div>
                                    </td>
                                    <td>$10,000</td>
                                    <td>$65,000</td>
                                    <td><span class="badge bg-info-subtle text-info">Scheduled</span></td>
                                    <td>
                                        <span class="badge badge-label text-bg-light">Webinar</span>
                                        <span class="badge badge-label text-bg-light">Leads</span>
                                    </td>
                                    <td>01 Sep, 2025 <small class="text-muted">9:15 AM</small></td>
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
                                            class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td>Back-to-School Promo</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Ava Nguyen" class="avatar-xs rounded-circle"
                                                src="/images/users/user-8.jpg" />
                                            <a class="link-reset" href="#!">Ava Nguyen</a>
                                        </div>
                                    </td>
                                    <td>$4,800</td>
                                    <td>$25,000</td>
                                    <td><span class="badge bg-danger-subtle text-danger">Failed</span></td>
                                    <td>
                                        <span class="badge badge-label text-bg-light">Email</span>
                                        <span class="badge badge-label text-bg-light">Discount</span>
                                    </td>
                                    <td>15 Jul, 2025 <small class="text-muted">4:30 PM</small></td>
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
                                            class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td>Spring Email Blast</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Ryan Patel" class="avatar-xs rounded-circle"
                                                src="/images/users/user-3.jpg" />
                                            <a class="link-reset" href="#!">Ryan Patel</a>
                                        </div>
                                    </td>
                                    <td>$7,200</td>
                                    <td>$40,000</td>
                                    <td><span class="badge bg-success-subtle text-success">Success</span></td>
                                    <td>
                                        <span class="badge badge-label text-bg-light">Newsletter</span>
                                        <span class="badge badge-label text-bg-light">Organic</span>
                                    </td>
                                    <td>18 Mar, 2025 <small class="text-muted">1:00 PM</small></td>
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
                                            class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td>Customer Loyalty Program</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Lily Chen" class="avatar-xs rounded-circle"
                                                src="/images/users/user-2.jpg" />
                                            <a class="link-reset" href="#!">Lily Chen</a>
                                        </div>
                                    </td>
                                    <td>$9,500</td>
                                    <td>$70,000</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Ongoing</span></td>
                                    <td>
                                        <span class="badge badge-label text-bg-light">Rewards</span>
                                        <span class="badge badge-label text-bg-light">Customer Retention</span>
                                    </td>
                                    <td>28 Aug, 2025 <small class="text-muted">10:00 AM</small></td>
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
                                            class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td>Referral Boost Campaign</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Noah Brooks" class="avatar-xs rounded-circle"
                                                src="/images/users/user-9.jpg" />
                                            <a class="link-reset" href="#!">Noah Brooks</a>
                                        </div>
                                    </td>
                                    <td>$5,000</td>
                                    <td>$20,000</td>
                                    <td><span class="badge bg-success-subtle text-success">Success</span></td>
                                    <td>
                                        <span class="badge badge-label text-bg-light">Referral</span>
                                        <span class="badge badge-label text-bg-light">Growth</span>
                                    </td>
                                    <td>04 Jun, 2025 <small class="text-muted">9:00 AM</small></td>
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
                                            class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td>App Download Drive</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Sophia Lee" class="avatar-xs rounded-circle"
                                                src="/images/users/user-10.jpg" />
                                            <a class="link-reset" href="#!">Sophia Lee</a>
                                        </div>
                                    </td>
                                    <td>$3,200</td>
                                    <td>$15,000</td>
                                    <td><span class="badge bg-warning-subtle text-warning">In Progress</span></td>
                                    <td>
                                        <span class="badge badge-label text-bg-light">Mobile</span>
                                        <span class="badge badge-label text-bg-light">Ads</span>
                                    </td>
                                    <td>12 Aug, 2025 <small class="text-muted">3:15 PM</small></td>
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
                                            class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td>Abandoned Cart Recovery</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Lucas Green" class="avatar-xs rounded-circle"
                                                src="/images/users/user-1.jpg" />
                                            <a class="link-reset" href="#!">Lucas Green</a>
                                        </div>
                                    </td>
                                    <td>$2,000</td>
                                    <td>$12,000</td>
                                    <td><span class="badge bg-danger-subtle text-danger">Failed</span></td>
                                    <td>
                                        <span class="badge badge-label text-bg-light">Email</span>
                                        <span class="badge badge-label text-bg-light">Recovery</span>
                                    </td>
                                    <td>29 Jul, 2025 <small class="text-muted">5:50 PM</small></td>
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
                                            class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td>Local Awareness Campaign</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Isabella Ray" class="avatar-xs rounded-circle"
                                                src="/images/users/user-2.jpg" />
                                            <a class="link-reset" href="#!">Isabella Ray</a>
                                        </div>
                                    </td>
                                    <td>$4,700</td>
                                    <td>$28,000</td>
                                    <td><span class="badge bg-info-subtle text-info">Scheduled</span></td>
                                    <td>
                                        <span class="badge badge-label text-bg-light">Geo Targeting</span>
                                        <span class="badge badge-label text-bg-light">Brand</span>
                                    </td>
                                    <td>02 Sep, 2025 <small class="text-muted">8:10 AM</small></td>
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
                                            class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                            type="checkbox" value="option" />
                                    </td>
                                    <td>Video Ad Campaign</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img alt="Leo White" class="avatar-xs rounded-circle"
                                                src="/images/users/user-3.jpg" />
                                            <a class="link-reset" href="#!">Leo White</a>
                                        </div>
                                    </td>
                                    <td>$9,900</td>
                                    <td>$55,000</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Ongoing</span></td>
                                    <td>
                                        <span class="badge badge-label text-bg-light">YouTube</span>
                                        <span class="badge badge-label text-bg-light">Video</span>
                                    </td>
                                    <td>14 Aug, 2025 <small class="text-muted">12:00 PM</small></td>
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
                        <div data-table-pagination-info="Campaigns"></div>
                        <div data-table-pagination=""></div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
    <!-- Create Campaign Modal -->
    <div aria-hidden="true" aria-labelledby="createCampaignModalLabel" class="modal fade" id="createCampaignModal"
        tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCampaignModalLabel">Create New Campaign</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <form id="createCampaignForm">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="campaignName">Campaign Name</label>
                                <input class="form-control" id="campaignName" placeholder="Enter campaign name"
                                    required="" type="text" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="CreatorName">Creator</label>
                                <input class="form-control" id="CreatorName" placeholder="Enter campaign creator"
                                    required="" type="text" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="budget">Budget (USD)</label>
                                <input class="form-control" id="budget" placeholder="e.g. 7500" required=""
                                    type="number" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="goal">Goal (USD)</label>
                                <input class="form-control" id="goal" placeholder="e.g. 50000" required=""
                                    type="number" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="Campstatus">Status</label>
                                <select class="form-select" id="Campstatus" required="">
                                    <option value="">Select status</option>
                                    <option value="Success">Success</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Scheduled">Scheduled</option>
                                    <option value="Failed">Failed</option>
                                    <option value="Ongoing">Ongoing</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tags">Tags</label>
                                <input class="form-control" id="tags" placeholder="e.g. Email, Webinar, Retargeting"
                                    required="" type="text" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="launchDate">Launch Date</label>
                                <input class="form-control" data-date-format="d M, Y" data-provider="flatpickr"
                                    id="launchDate" required="" type="date" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="launchTime">Launch Time</label>
                                <input class="form-control" data-provider="timepickr" data-time-basic="true"
                                    id="launchTime" required="" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save Campaign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/custom-table.js'])
@endsection
