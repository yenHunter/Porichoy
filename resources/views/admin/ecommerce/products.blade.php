@extends('layouts.vertical', ['title' => 'Products'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Ecommerce', 'title' => 'Products'])

    <div class="row">
        <div class="col-12">
            <div class="card" data-table="" data-table-rows-per-page="8">
                <div class="card-header border-light justify-content-between">
                    <div class="d-flex gap-2">
                        <div class="app-search">
                            <input class="form-control" data-table-search="" placeholder="Search product name..."
                                type="search" />
                            <i class="app-search-icon text-muted" data-lucide="search"></i>
                        </div>
                        <button class="btn btn-danger d-none" data-table-delete-selected="">Delete</button>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="me-2 fw-semibold">Filter By:</span>
                        <!-- Category Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="category">
                                <option value="All">Category</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Home">Home</option>
                                <option value="Sports">Sports</option>
                                <option value="Beauty">Beauty</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="tag"></i>
                        </div>
                        <!-- Stock Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="status">
                                <option value="">Status</option>
                                <option value="Published">Published</option>
                                <option value="Pending">Pending</option>
                                <option value="Out of Stock">Out of Stock</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="box"></i>
                        </div>
                        <!-- Price Range Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-range-filter="price">
                                <option value="">Price Range</option>
                                <option value="0-50">$0 - $50</option>
                                <option value="51-150">$51 - $150</option>
                                <option value="151-500">$151 - $500</option>
                                <option value="500+">$500+</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="dollar-sign"></i>
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
                        <a class="btn btn-soft-primary btn-icon"
                            href="{{ route('second', ['ecommerce', 'products-grid']) }}">
                            <i class="fs-lg" data-lucide="layout-grid"></i>
                        </a>
                        <a class="btn btn-primary btn-icon" href="{{ route('second', ['ecommerce', 'products']) }}">
                            <i class="fs-lg" data-lucide="list"></i>
                        </a>
                        <a class="btn btn-danger ms-1" href="{{ route('second', ['ecommerce', 'add-product']) }}">
                            <i class="fs-sm me-2" data-lucide="plus"></i> Add Product
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-custom table-centered table-select table-hover w-100 mb-0">
                        <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                            <tr class="text-uppercase fs-xxs">
                                <th class="ps-3" style="width: 1%;">
                                    <input class="form-check-input form-check-input-light fs-14 mt-0"
                                        data-table-select-all="" id="select-all-products" type="checkbox" value="option" />
                                </th>
                                <th data-table-sort="product">Product</th>
                                <th>SKU</th>
                                <th data-column="category" data-table-sort="">Category</th>
                                <th data-table-sort="">Stock</th>
                                <th data-column="price" data-table-sort="">Price</th>
                                <th data-table-sort="">Orders</th>
                                <th data-table-sort="rating">Rating</th>
                                <th data-column="status" data-table-sort="">Status</th>
                                <th data-table-sort="">Published</th>
                                <th class="text-center" style="width: 1%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Product Row -->
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/1.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Wireless
                                                    Earbuds</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xs">by: My Furniture</p>
                                        </div>
                                    </div>
                                </td>
                                <td>WB-10245</td>
                                <td>Electronics</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">56</h5>
                                </td>
                                <td>$59.99</td>
                                <td>124</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(87)</a></span>
                                </td>
                                <td><span class="badge badge-soft-success fs-xxs">Published</span></td>
                                <td>18 Apr, 2025 <small class="text-muted">12:24 PM</small></td>
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
                                    <div class="d-flex">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/2.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Smart
                                                    LED Desk Lamp</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xs">by: BrightLite</p>
                                        </div>
                                    </div>
                                </td>
                                <td>SL-89012</td>
                                <td>Home &amp; Office</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">32</h5>
                                </td>
                                <td>$39.49</td>
                                <td>78</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star"></span>
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(54)</a></span>
                                </td>
                                <td><span class="badge badge-soft-warning fs-xxs">Pending</span></td>
                                <td>22 Apr, 2025 <small class="text-muted">09:45 AM</small></td>
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
                                    <div class="d-flex">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/3.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Men's
                                                    Running Shoes</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xs">by: ActiveWear Co.</p>
                                        </div>
                                    </div>
                                </td>
                                <td>RS-20450</td>
                                <td>Fashion</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">120</h5>
                                </td>
                                <td>$89.00</td>
                                <td>231</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(142)</a></span>
                                </td>
                                <td><span class="badge badge-soft-success fs-xxs">Published</span></td>
                                <td>24 Apr, 2025 <small class="text-muted">03:10 PM</small></td>
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
                                    <div class="d-flex">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/4.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Fitness
                                                    Tracker Watch</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xs">by: FitPulse</p>
                                        </div>
                                    </div>
                                </td>
                                <td>FT-67123</td>
                                <td>Fitness</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">78</h5>
                                </td>
                                <td>$49.95</td>
                                <td>198</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star"></span>
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(89)</a></span>
                                </td>
                                <td><span class="badge badge-soft-success fs-xxs">Published</span></td>
                                <td>23 Apr, 2025 <small class="text-muted">10:12 AM</small></td>
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
                                    <div class="d-flex">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/5.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Gaming
                                                    Mouse RGB</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xs">by: HyperClick</p>
                                        </div>
                                    </div>
                                </td>
                                <td>GM-72109</td>
                                <td>Gaming</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">120</h5>
                                </td>
                                <td>$29.99</td>
                                <td>243</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star"></span>
                                        <span class="ti ti-star"></span>
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(102)</a></span>
                                </td>
                                <td><span class="badge badge-soft-success fs-xxs">Published</span></td>
                                <td>19 Apr, 2025 <small class="text-muted">05:56 PM</small></td>
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
                                    <div class="d-flex">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/6.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Modern
                                                    Lounge Chair</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xs">by: UrbanLiving</p>
                                        </div>
                                    </div>
                                </td>
                                <td>FC-31220</td>
                                <td>Furniture</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">24</h5>
                                </td>
                                <td>$199.00</td>
                                <td>38</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(27)</a></span>
                                </td>
                                <td><span class="badge badge-soft-danger fs-xxs">Out of Stock</span></td>
                                <td>18 Apr, 2025 <small class="text-muted">11:30 AM</small></td>
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
                                    <div class="d-flex">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/7.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Plush
                                                    Toy Bear</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xs">by: Softies</p>
                                        </div>
                                    </div>
                                </td>
                                <td>TY-00788</td>
                                <td>Toys</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">150</h5>
                                </td>
                                <td>$15.99</td>
                                <td>305</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star"></span>
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(120)</a></span>
                                </td>
                                <td><span class="badge badge-soft-success fs-xxs">Published</span></td>
                                <td>17 Apr, 2025 <small class="text-muted">04:21 PM</small></td>
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
                                    <div class="d-flex">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/8.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">55"
                                                    Ultra HD Smart TV</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xs">by: ViewMaster</p>
                                        </div>
                                    </div>
                                </td>
                                <td>TV-5588</td>
                                <td>Electronics</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">64</h5>
                                </td>
                                <td>$499.00</td>
                                <td>142</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star"></span>
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(88)</a></span>
                                </td>
                                <td><span class="badge badge-soft-success fs-xxs">Published</span></td>
                                <td>25 Apr, 2025 <small class="text-muted">10:10 AM</small></td>
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
                                    <div class="d-flex">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/9.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Apple
                                                    iMac 24" M3</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xs">by: Apple</p>
                                        </div>
                                    </div>
                                </td>
                                <td>IMAC-M3-24</td>
                                <td>Computers</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">18</h5>
                                </td>
                                <td>$1,399.00</td>
                                <td>29</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(16)</a></span>
                                </td>
                                <td><span class="badge badge-soft-warning fs-xxs">Pending</span></td>
                                <td>24 Apr, 2025 <small class="text-muted">02:14 PM</small></td>
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
                                    <div class="d-flex">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded"
                                                src="/images/products/10.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Smart
                                                    Watch Pro X2</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xs">by: FitTech</p>
                                        </div>
                                    </div>
                                </td>
                                <td>SWPX2-GL</td>
                                <td>Wearables</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">85</h5>
                                </td>
                                <td>$149.50</td>
                                <td>197</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star"></span>
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(65)</a></span>
                                </td>
                                <td><span class="badge badge-soft-success fs-xxs">Published</span></td>
                                <td>23 Apr, 2025 <small class="text-muted">08:00 AM</small></td>
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
                        <div data-table-pagination-info="products"></div>
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
