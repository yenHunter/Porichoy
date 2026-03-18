@extends('layouts.vertical', ['title' => 'Reviews'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Ecommerce', 'title' => 'Reviews'])

    <div class="row">
        <div class="col-12">
            <div class="card" data-table="" data-table-rows-per-page="5">
                <div class="card-header p-0 d-block">
                    <div class="row g-0 align-items-center">
                        <div class="col-xl-6 border-end border-dashed">
                            <div class="row align-items-center g-0">
                                <div class="col-xl-7">
                                    <div class="d-flex align-items-center gap-4 p-4">
                                        <img alt="Product" height="80" src="/images/ratings.svg" />
                                        <div>
                                            <h3 class="d-flex align-items-center gap-2 mb-2 fw-bold">
                                                4.92 <i class="ti ti-star-filled text-warning"></i>
                                            </h3>
                                            <p class="mb-2">Based on 245 verified reviews</p>
                                            <p class="pe-2 h6 text-muted mb-2 lh-base">Feedback collected from real
                                                customers who purchased our templates</p>
                                            <span class="badge badge-soft-success">+12 new this week</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="p-3">
                                        <!-- 5 Star -->
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <div class="flex-shrink-0" style="width: 50px;">5 Star</div>
                                            <div class="progress w-100 bg-label-primary" style="height:8px;">
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="91"
                                                    class="progress-bar bg-primary" role="progressbar" style="width: 91%;">
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 text-end" style="width: 30px;"><span
                                                    class="badge text-bg-light">910</span></div>
                                        </div>
                                        <!-- 4 Star -->
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <div class="flex-shrink-0" style="width: 50px;">4 Star</div>
                                            <div class="progress w-100 bg-label-primary" style="height:8px;">
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="5.5"
                                                    class="progress-bar bg-primary" role="progressbar" style="width: 5.5%;">
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 text-end" style="width: 30px;"><span
                                                    class="badge text-bg-light">55</span></div>
                                        </div>
                                        <!-- 3 Star -->
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <div class="flex-shrink-0" style="width: 50px;">3 Star</div>
                                            <div class="progress w-100 bg-label-primary" style="height:8px;">
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="2"
                                                    class="progress-bar bg-primary" role="progressbar" style="width: 2%;">
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 text-end" style="width: 30px;"><span
                                                    class="badge text-bg-light">20</span></div>
                                        </div>
                                        <!-- 2 Star -->
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <div class="flex-shrink-0" style="width: 50px;">2 Star</div>
                                            <div class="progress w-100 bg-label-primary" style="height:8px;">
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="1"
                                                    class="progress-bar bg-primary" role="progressbar" style="width: 1%;">
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 text-end" style="width: 30px;"><span
                                                    class="badge text-bg-light">10</span></div>
                                        </div>
                                        <!-- 1 Star -->
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="flex-shrink-0" style="width: 50px;">1 Star</div>
                                            <div class="progress w-100 bg-label-primary" style="height:8px;">
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="0.5"
                                                    class="progress-bar bg-primary" role="progressbar" style="width: 0.5%;">
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 text-end" style="width: 30px;"><span
                                                    class="badge text-bg-light">5</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-xl-6">
                            <div class="pe-3 ps-1">
                                <div id="reviews-30days-chart"></div>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
                <div class="card-header border-light d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div class="d-flex gap-2">
                        <div class="app-search">
                            <input class="form-control" data-table-search="" placeholder="Search reviews..."
                                type="search" />
                            <i class="app-search-icon text-muted" data-lucide="search"></i>
                        </div>
                        <button class="btn btn-danger d-none" data-table-delete-selected="">Delete</button>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <!-- Records Per Page -->
                        <div>
                            <select class="form-select form-control my-1 my-md-0" data-table-set-rows-per-page="">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <!-- Export Dropdown -->
                        <div class="dropdown">
                            <button aria-expanded="false" class="btn btn-default dropdown-toggle drop-arrow-none"
                                data-bs-toggle="dropdown" type="button">
                                <i class="me-1" data-lucide="download"></i> Export <i
                                    class="ti ti-chevron-down align-middle ms-1"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Export as PDF</a></li>
                                <li><a class="dropdown-item" href="#">Export as CSV</a></li>
                                <li><a class="dropdown-item" href="#">Export as Excel</a></li>
                            </ul>
                        </div>
                        <!-- View All Dropdown -->
                        <div class="dropdown">
                            <button aria-expanded="false" class="btn btn-default dropdown-toggle drop-arrow-none"
                                data-bs-toggle="dropdown" type="button">
                                View All <i class="ti ti-chevron-down align-middle ms-1"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">All</a></li>
                                <li><a class="dropdown-item" href="#">Pending</a></li>
                                <li><a class="dropdown-item" href="#">Approved</a></li>
                                <li><a class="dropdown-item" href="#">Disabled</a></li>
                            </ul>
                        </div>
                        <!-- Add New Review Button -->
                        <!-- <a href="#!" class="btn btn-danger btn-icon">
                                            <i data-lucide="plus" class="fs-sm"></i>
                                        </a> -->
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-custom table-centered table-select table-hover w-100 mb-0">
                        <thead class="bg-light align-middle bg-opacity-25">
                            <tr class="text-uppercase fs-xxs">
                                <th class="ps-3" style="width: 1%;">
                                    <input class="form-check-input form-check-input-light fs-14 mt-0"
                                        data-table-select-all="" id="select-all-products" type="checkbox"
                                        value="option" />
                                </th>
                                <th data-table-sort="product">Product</th>
                                <th data-table-sort="reviewer">Reviewer</th>
                                <th style="width: 18rem;">Review</th>
                                <th data-table-sort="">Date</th>
                                <th data-table-sort="">Status</th>
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
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-lg me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/2.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Wireless
                                                    Earbuds</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-8" class="img-fluid rounded-circle"
                                                src="/images/users/user-8.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-sm mb-0 lh-base" data-sort="reviewer">Sophia Lee
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">sophia.lee@digitalshop.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-warning fs-lg">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                    </span>
                                    <h5 class="mt-2">Great product, would buy again!</h5>
                                    <p class="text-muted fst-italic mb-0">"These earbuds are amazing, the sound quality is
                                        top-notch. Totally worth the price!"</p>
                                </td>
                                <td>22 Apr, 2025 <small class="text-muted">04:10 PM</small></td>
                                <td><span class="badge badge-soft-success fs-xxs">Published</span></td>
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
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-lg me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/3.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Smart
                                                    Watch</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-6" class="img-fluid rounded-circle"
                                                src="/images/users/user-6.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-sm mb-0 lh-base" data-sort="reviewer">David Smith
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">david.smith@healthstore.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-warning fs-lg">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-half-filled"></span>
                                    </span>
                                    <h5 class="mt-2">Decent, but overpriced</h5>
                                    <p class="text-muted fst-italic mb-0">"It does the job, but I feel like it's a little
                                        expensive for what it offers."</p>
                                </td>
                                <td>23 Apr, 2025 <small class="text-muted">02:20 PM</small></td>
                                <td><span class="badge badge-soft-warning fs-xxs">Pending</span></td>
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
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-lg me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/4.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">4K Ultra
                                                    HD TV</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-3" class="img-fluid rounded-circle"
                                                src="/images/users/user-3.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-sm mb-0 lh-base" data-sort="reviewer">Alice Johnson
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">alice.johnson@homesupplies.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-warning fs-lg">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                    </span>
                                    <h5 class="mt-2">Amazing quality!</h5>
                                    <p class="text-muted fst-italic mb-0">"The TV has incredible picture quality. Totally
                                        worth the investment!"</p>
                                </td>
                                <td>24 Apr, 2025 <small class="text-muted">09:15 AM</small></td>
                                <td><span class="badge badge-soft-success fs-xxs">Published</span></td>
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
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-lg me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/5.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Smartphone
                                                    X</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-2" class="img-fluid rounded-circle"
                                                src="/images/users/user-2.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-sm mb-0 lh-base" data-sort="reviewer">Michael Green
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">michael.green@mobileshop.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-warning fs-lg">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                    </span>
                                    <h5 class="mt-2">Perfect phone, highly recommended!</h5>
                                    <p class="text-muted fst-italic mb-0">"The camera is amazing and the performance is
                                        smooth. Definitely the best smartphone I have used!"</p>
                                </td>
                                <td>25 Apr, 2025 <small class="text-muted">11:30 AM</small></td>
                                <td><span class="badge badge-soft-success fs-xxs">Published</span></td>
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
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-lg me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/6.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Gaming
                                                    Laptop</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-4" class="img-fluid rounded-circle"
                                                src="/images/users/user-4.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fs-sm mb-0 lh-base" data-sort="reviewer">Chris Evans
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">chris.evans@gamestore.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-warning fs-lg">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-half-filled"></span>
                                    </span>
                                    <h5 class="mt-2">Great for gaming but heavy</h5>
                                    <p class="text-muted fst-italic mb-0">"The performance is amazing, but it's a bit too
                                        heavy to carry around all day."</p>
                                </td>
                                <td>26 Apr, 2025 <small class="text-muted">10:00 AM</small></td>
                                <td><span class="badge badge-soft-warning fs-xxs">Pending</span></td>
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
                        <div data-table-pagination-info="reviews"></div>
                        <div data-table-pagination=""></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
@endsection

@section('scripts')
    @vite(['resources/js/pages/custom-table.js'])
    @vite(['resources/js/pages/ecommerce-reviews.js'])
@endsection
