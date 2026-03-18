@extends('layouts.vertical', ['title' => 'Orders'])

@section('css')
@vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Ecommerce', 'title' => 'Orders'])

    <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 align-items-center g-1">
        <div class="col">
            <div class="card mb-1">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                        <h3 class="mb-0"><span data-target="93.7">0</span>k</h3>
                        <div class="avatar-md flex-shrink-0">
                            <span class="avatar-title text-bg-success rounded-circle fs-22">
                                <i class="ti ti-check"></i>
                            </span>
                        </div>
                    </div>
                    <p class="mb-0 text-uppercase fs-xs fw-bold">
                        Completed Orders
                        <span class="float-end badge badge-soft-success">+3.34%</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-1">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                        <h3 class="mb-0"><span data-target="557">0</span></h3>
                        <div class="avatar-md flex-shrink-0">
                            <span class="avatar-title text-bg-warning rounded-circle fs-22">
                                <i class="ti ti-hourglass"></i>
                            </span>
                        </div>
                    </div>
                    <p class="mb-0 text-uppercase fs-xs fw-bold">
                        Pending Orders
                        <span class="float-end badge badge-soft-danger">-1.12%</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-1">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                        <h3 class="mb-0"><span data-target="269">0</span></h3>
                        <div class="avatar-md flex-shrink-0">
                            <span class="avatar-title text-bg-danger rounded-circle fs-22">
                                <i class="ti ti-x"></i>
                            </span>
                        </div>
                    </div>
                    <p class="mb-0 text-uppercase fs-xs fw-bold">
                        Canceled Orders
                        <span class="float-end badge badge-soft-danger">-0.75%</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-1">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                        <h3 class="mb-0"><span data-target="9.3">0</span>k</h3>
                        <div class="avatar-md flex-shrink-0">
                            <span class="avatar-title text-bg-info rounded-circle fs-22">
                                <i class="ti ti-shopping-cart"></i>
                            </span>
                        </div>
                    </div>
                    <p class="mb-0 text-uppercase fs-xs fw-bold">
                        New Orders
                        <span class="float-end badge badge-soft-success">+4.22%</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-1">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                        <h3 class="mb-0"><span data-target="8,741">0</span></h3>
                        <div class="avatar-md flex-shrink-0">
                            <span class="avatar-title text-bg-primary rounded-circle fs-22">
                                <i class="ti ti-repeat"></i>
                            </span>
                        </div>
                    </div>
                    <p class="mb-0 text-uppercase fs-xs fw-bold">
                        Returned Orders
                        <span class="float-end badge badge-soft-success">+0.56%</span>
                    </p>
                </div>
            </div>
        </div>
    </div><!-- end row -->
    <div class="row">
        <div class="col-12">
            <div class="card" data-table="" data-table-rows-per-page="8">
                <div class="card-header border-light justify-content-between">
                    <div class="d-flex gap-2">
                        <div class="app-search">
                            <input class="form-control" data-table-search="" placeholder="Search order..." type="search" />
                            <i class="app-search-icon text-muted" data-lucide="search"></i>
                        </div>
                        <button class="btn btn-danger d-none" data-table-delete-selected="">Delete</button>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="me-2 fw-semibold">Filter By:</span>
                        <!-- Payment Status Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="payment-status">
                                <option value="All">Payment Status</option>
                                <option value="Paid">Paid</option>
                                <option value="Pending">Pending</option>
                                <option value="Failed">Failed</option>
                                <option value="Refunded">Refunded</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="credit-card"></i>
                        </div>
                        <!-- Delivery Status Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="order-status">
                                <option value="All">Delivery Status</option>
                                <option value="Processing">Processing</option>
                                <option value="Shipped">Shipped</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="truck"></i>
                        </div>
                        <!-- Date Range Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-range-filter="date">
                                <option value="All">Date Range</option>
                                <option value="Today">Today</option>
                                <option value="Last 7 Days">Last 7 Days</option>
                                <option value="Last 30 Days">Last 30 Days</option>
                                <option value="This Year">This Year</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="calendar"></i>
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
                    <div class="d-flex gap-1">
                        <a class="btn btn-danger ms-1" data-bs-target="#addOrderModal" data-bs-toggle="modal"
                            href="#!">
                            <i class="fs-sm me-2" data-lucide="plus"></i> Add Order
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-custom table-centered table-select table-hover w-100 mb-0">
                        <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                            <tr class="text-uppercase fs-xxs">
                                <th class="ps-3" style="width: 1%;">
                                    <input class="form-check-input form-check-input-light fs-14 mt-0"
                                        data-table-select-all="" type="checkbox" value="option" />
                                </th>
                                <th data-table-sort="">Order ID</th>
                                <th data-column="date" data-table-sort="">Date</th>
                                <th data-table-sort="customer">Customer</th>
                                <th data-table-sort="">Amount</th>
                                <th data-column="payment-status" data-table-sort="">Payment Status</th>
                                <th data-column="order-status" data-table-sort="">Order Status</th>
                                <th>Payment Method</th>
                                <th class="text-center" style="width: 1%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="fs-sm mb-0 fw-medium"><a class="link-reset"
                                            href="{{ route('second', ['ecommerce', 'order-details']) }}">#WB20100</a></h5>
                                </td>
                                <td>9 May, 2025 <small class="text-muted">10:10 AM</small></td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-2" class="img-fluid rounded-circle"
                                                src="/images/users/user-2.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base" data-sort="customer">Mason Carter
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">mason.carter@shopmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>$129.45</td>
                                <td class="text-success fw-semibold"><i class="ti ti-point-filled fs-sm"></i> Paid
                                </td>
                                <td><span class="badge badge-soft-success fs-xxs">Delivered</span></td>
                                <td>
                                    <img alt="" class="me-2" height="28" src="/images/cards/visa.svg" />
                                    xxxx
                                    7832
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="fs-sm mb-0 fw-medium"><a class="link-reset"
                                            href="{{ route('second', ['ecommerce', 'order-details']) }}">#WB20101</a></h5>
                                </td>
                                <td>7 May, 2025 <small class="text-muted">11:45 AM</small></td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-9" class="img-fluid rounded-circle"
                                                src="/images/users/user-9.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base" data-sort="customer">Ava Martin
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">ava.martin@marketplace.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>$87.00</td>
                                <td class="text-warning fw-semibold"><i class="ti ti-point-filled fs-sm"></i>
                                    Pending
                                </td>
                                <td><span class="badge badge-soft-warning fs-xxs">Processing</span></td>
                                <td>
                                    <img alt="" class="me-2" height="28"
                                        src="/images/cards/mastercard.svg" />
                                    xxxx 5487
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="fs-sm mb-0 fw-medium"><a class="link-reset"
                                            href="{{ route('second', ['ecommerce', 'order-details']) }}">#WB20102</a></h5>
                                </td>
                                <td>26 Apr, 2025 <small class="text-muted">1:20 PM</small></td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-1" class="img-fluid rounded-circle"
                                                src="/images/users/user-1.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base" data-sort="customer">Noah Wilson
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">noah.wilson@ecomsite.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>$59.90</td>
                                <td class="text-danger fw-semibold"><i class="ti ti-point-filled fs-sm"></i> Failed
                                </td>
                                <td><span class="badge badge-soft-danger fs-xxs">Cancelled</span></td>
                                <td>
                                    <img alt="" class="me-2" height="28" src="/images/cards/paypal.svg" />
                                    xxx@email.com
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="fs-sm mb-0 fw-medium"><a class="link-reset"
                                            href="{{ route('second', ['ecommerce', 'order-details']) }}">#WB20103</a></h5>
                                </td>
                                <td>27 Apr, 2025 <small class="text-muted">3:30 PM</small></td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-10" class="img-fluid rounded-circle"
                                                src="/images/users/user-10.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base" data-sort="customer">Isabella
                                                Moore</h5>
                                            <p class="text-muted fs-xs mb-0">isabella.moore@onlineshop.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>$215.20</td>
                                <td class="text-success fw-semibold"><i class="ti ti-point-filled fs-sm"></i> Paid
                                </td>
                                <td><span class="badge badge-soft-info fs-xxs">Shipped</span></td>
                                <td>
                                    <img alt="" class="me-2" height="28" src="/images/cards/stripe.svg" />
                                    xxxx
                                    9901
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="fs-sm mb-0 fw-medium"><a class="link-reset"
                                            href="{{ route('second', ['ecommerce', 'order-details']) }}">#WB20104</a></h5>
                                </td>
                                <td>28 Apr, 2025 <small class="text-muted">9:55 AM</small></td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-11" class="img-fluid rounded-circle"
                                                src="/images/users/user-5.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base" data-sort="customer">Lucas
                                                Bennett</h5>
                                            <p class="text-muted fs-xs mb-0">lucas.bennett@shopzone.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>$345.75</td>
                                <td class="text-success fw-semibold"><i class="ti ti-point-filled fs-sm"></i> Paid
                                </td>
                                <td><span class="badge badge-soft-success fs-xxs">Delivered</span></td>
                                <td>
                                    <img alt="" class="me-2" height="28"
                                        src="/images/cards/american-express.svg" /> xxxx 4678
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="fs-sm mb-0 fw-medium"><a class="link-reset"
                                            href="{{ route('second', ['ecommerce', 'order-details']) }}">#WB30100</a></h5>
                                </td>
                                <td>20 Apr, 2025 <small class="text-muted">2:30 PM</small></td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-3" class="img-fluid rounded-circle"
                                                src="/images/users/user-3.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base" data-sort="customer">Emma Johnson
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">emma.johnson@storemail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>$199.99</td>
                                <td class="text-success fw-semibold"><i class="ti ti-point-filled fs-sm"></i> Paid
                                </td>
                                <td><span class="badge badge-soft-success fs-xxs">Delivered</span></td>
                                <td>
                                    <img alt="" class="me-2" height="28"
                                        src="/images/cards/discover-card.svg" /> xxxx 1234
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="fs-sm mb-0 fw-medium"><a class="link-reset"
                                            href="{{ route('second', ['ecommerce', 'order-details']) }}">#WB30101</a></h5>
                                </td>
                                <td>21 Apr, 2025 <small class="text-muted">9:15 AM</small></td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-4" class="img-fluid rounded-circle"
                                                src="/images/users/user-4.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base" data-sort="customer">Liam
                                                Thompson</h5>
                                            <p class="text-muted fs-xs mb-0">liam.thompson@buynow.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>$75.50</td>
                                <td class="text-warning fw-semibold"><i class="ti ti-point-filled fs-sm"></i>
                                    Pending
                                </td>
                                <td><span class="badge badge-soft-warning fs-xxs">Processing</span></td>
                                <td>
                                    <img alt="" class="me-2" height="28"
                                        src="/images/cards/unionpay.svg" />
                                    xxxx 9876
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="fs-sm mb-0 fw-medium"><a class="link-reset"
                                            href="{{ route('second', ['ecommerce', 'order-details']) }}">#WB30102</a></h5>
                                </td>
                                <td>22 Apr, 2025 <small class="text-muted">4:45 PM</small></td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-5" class="img-fluid rounded-circle"
                                                src="/images/users/user-5.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base" data-sort="customer">Sophia Davis
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">sophia.davis@shopsite.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>$45.25</td>
                                <td class="text-danger fw-semibold"><i class="ti ti-point-filled fs-sm"></i> Failed
                                </td>
                                <td><span class="badge badge-soft-danger fs-xxs">Cancelled</span></td>
                                <td>
                                    <img alt="" class="me-2" height="28"
                                        src="/images/cards/payoneer.svg" />
                                    xxx@email.com
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="fs-sm mb-0 fw-medium"><a class="link-reset"
                                            href="{{ route('second', ['ecommerce', 'order-details']) }}">#WB30103</a></h5>
                                </td>
                                <td>10 May, 2025 <small class="text-muted">11:00 AM</small></td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-6" class="img-fluid rounded-circle"
                                                src="/images/users/user-6.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base" data-sort="customer">Oliver Brown
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">oliver.brown@webstore.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>$299.00</td>
                                <td class="text-success fw-semibold"><i class="ti ti-point-filled fs-sm"></i> Paid
                                </td>
                                <td><span class="badge badge-soft-info fs-xxs">Shipped</span></td>
                                <td>
                                    <img alt="" class="me-2" height="28"
                                        src="/images/cards/google-wallet.svg" /> xxx@google
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <h5 class="fs-sm mb-0 fw-medium"><a class="link-reset"
                                            href="{{ route('second', ['ecommerce', 'order-details']) }}">#WB30104</a></h5>
                                </td>
                                <td>24 Apr, 2025 <small class="text-muted">8:20 AM</small></td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-7" class="img-fluid rounded-circle"
                                                src="/images/users/user-7.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-base mb-0 lh-base" data-sort="customer">Charlotte
                                                Lee</h5>
                                            <p class="text-muted fs-xs mb-0">charlotte.lee@marketzone.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>$420.80</td>
                                <td class="text-success fw-semibold"><i class="ti ti-point-filled fs-sm"></i> Paid
                                </td>
                                <td><span class="badge badge-soft-success fs-xxs">Delivered</span></td>
                                <td>
                                    <img alt="" class="me-2" height="28" src="/images/cards/bhim.svg" />
                                    xxxx@upi
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded-circle" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div data-table-pagination-info="orders"></div>
                        <div data-table-pagination=""></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <!-- Add New Order Modal -->
    <div aria-hidden="true" aria-labelledby="addOrderModalLabel" class="modal fade" id="addOrderModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOrderModalLabel">Add New Order</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <form id="addOrderForm">
                    <div class="modal-body">
                        <div class="row g-3">
                            <!-- Order ID -->
                            <div class="col-md-6">
                                <label class="form-label" for="orderId">Order ID</label>
                                <input class="form-control" id="orderId" placeholder="#WB20101" required=""
                                    type="text" />
                            </div>
                            <!-- Order Date -->
                            <div class="col-md-6">
                                <label class="form-label" for="orderDate">Order Date &amp; Time</label>
                                <input class="form-control" data-date-format="d M, Y" data-enable-time=""
                                    data-provider="flatpickr" id="orderDate" required="" type="datetime-local" />
                            </div>
                            <!-- Customer Info -->
                            <div class="col-md-6">
                                <label class="form-label" for="customerName">Customer Name</label>
                                <input class="form-control" id="customerName" placeholder="e.g. Mason Carter"
                                    required="" type="text" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="customerEmail">Customer Email</label>
                                <input class="form-control" id="customerEmail" placeholder="e.g. mason@example.com"
                                    required="" type="email" />
                            </div>
                            <!-- Amount -->
                            <div class="col-md-6">
                                <label class="form-label" for="orderAmount">Amount</label>
                                <input class="form-control" id="orderAmount" placeholder="e.g. 129.45" required=""
                                    type="number" />
                            </div>
                            <!-- Payment Status -->
                            <div class="col-md-6">
                                <label class="form-label" for="paymentStatus">Payment Status</label>
                                <select class="form-select" id="paymentStatus" required="">
                                    <option value="">Select</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Failed">Failed</option>
                                </select>
                            </div>
                            <!-- Order Status -->
                            <div class="col-md-6">
                                <label class="form-label" for="orderStatus">Order Status</label>
                                <select class="form-select" id="orderStatus" required="">
                                    <option value="">Select</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Shipped">Shipped</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                            <!-- Payment Method -->
                            <div class="col-md-6">
                                <label class="form-label" for="paymentMethod">Payment Method</label>
                                <select class="form-select" id="paymentMethod" required="">
                                    <option value="">Select</option>
                                    <option value="Visa">Visa</option>
                                    <option value="Mastercard">Mastercard</option>
                                    <option value="PayPal">PayPal</option>
                                    <option value="Cash on Delivery">Cash on Delivery</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button>
                        <button class="btn btn-primary" type="submit">Add Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/custom-table.js'])
@endsection
