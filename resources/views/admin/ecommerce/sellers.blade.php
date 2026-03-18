@extends('layouts.vertical', ['title' => 'Sellers'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Ecommerce', 'title' => 'Sellers'])

    <div class="row">
        <div class="col-12">
            <div class="card" data-table="" data-table-rows-per-page="8">
                <div class="card-header border-light justify-content-between">
                    <div class="d-flex gap-2">
                        <div class="app-search">
                            <input class="form-control" data-table-search="" placeholder="Search seller..." type="search" />
                            <i class="app-search-icon text-muted" data-lucide="search"></i>
                        </div>
                        <button class="btn btn-danger d-none" data-table-delete-selected="">Delete</button>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="me-2 fw-semibold">Filter By:</span>
                        <!-- Orders Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-range-filter="orders">
                                <option value="All">Orders</option>
                                <option value="20000+">Top Orders</option>
                                <option value="0-20000">Low Orders</option>
                                <option value="0">No Orders</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="shopping-cart"></i>
                        </div>
                        <!-- Revenue Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-range-filter="revenue">
                                <option value="All">Revenue</option>
                                <option value="100k+">Top Revenue</option>
                                <option value="50k-100k">Low Revenue</option>
                                <option value="0">No Revenue</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="dollar-sign"></i>
                        </div>
                        <!-- Ratings Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-range-filter="rating">
                                <option value="All">Ratings</option>
                                <option value="4-5">Top Rated</option>
                                <option value="1-3">Low Rated</option>
                                <option value="0">No Ratings</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="star"></i>
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
                                        data-table-select-all="" id="select-all-products" type="checkbox" value="option" />
                                </th>
                                <th data-table-sort="seller">Seller</th>
                                <th data-table-sort="">Products</th>
                                <th data-column="orders" data-table-sort="">Orders</th>
                                <th data-column="rating" data-table-sort="rating">Rating</th>
                                <th data-table-sort="">Location</th>
                                <th data-column="revenue" data-table-sort="">Balance</th>
                                <th data-table-sort="">Rank</th>
                                <th style="width: 1%;">Report</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Seller Row 1 -->
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/sellers/3.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-1">
                                                <a class="link-reset" data-sort="seller"
                                                    href="{{ route('second', ['ecommerce', 'seller-details']) }}">GreenTech
                                                    Solutions</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xxs">Since 2005</p>
                                        </div>
                                    </div>
                                </td>
                                <td>1,456</td>
                                <td>18,120</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-half-filled"></span> <!-- half star -->
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(4.5)</a></span>
                                </td>
                                <td>
                                    <span class="badge p-1 text-bg-light fs-sm">
                                        <img alt="" class="rounded-circle me-1" height="12"
                                            src="/images/flags/ca.svg" /> CA
                                    </span>
                                </td>
                                <td>$92.5k</td>
                                <td>1st</td>
                                <td>
                                    <div data-chart="apex" data-chart-type="bar"></div>
                                </td>
                            </tr>
                            <!-- Seller Row 2 -->
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/sellers/4.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-1">
                                                <a class="link-reset" data-sort="seller"
                                                    href="{{ route('second', ['ecommerce', 'seller-details']) }}">TechTonic
                                                    Store</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xxs">Since 2010</p>
                                        </div>
                                    </div>
                                </td>
                                <td>2,378</td>
                                <td>25,892</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star"></span>
                                        <span class="ti ti-star"></span> <!-- two empty -->
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(3)</a></span>
                                </td>
                                <td>
                                    <span class="badge p-1 text-bg-light fs-sm">
                                        <img alt="" class="rounded-circle me-1" height="12"
                                            src="/images/flags/gb.svg" /> UK
                                    </span>
                                </td>
                                <td>$145.7k</td>
                                <td>2nd</td>
                                <td>
                                    <div data-chart="apex" data-chart-type="line"></div>
                                </td>
                            </tr>
                            <!-- Seller Row 3 -->
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/sellers/5.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-1">
                                                <a class="link-reset" data-sort="seller"
                                                    href="{{ route('second', ['ecommerce', 'seller-details']) }}">UrbanTech
                                                    Gadgets</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xxs">Since 2012</p>
                                        </div>
                                    </div>
                                </td>
                                <td>3,120</td>
                                <td>35,210</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-half-filled"></span>
                                        <span class="ti ti-star"></span> <!-- two half stars -->
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(3.5)</a></span>
                                </td>
                                <td>
                                    <span class="badge p-1 text-bg-light fs-sm">
                                        <img alt="" class="rounded-circle me-1" height="12"
                                            src="/images/flags/in.svg" /> IN
                                    </span>
                                </td>
                                <td>$300.4k</td>
                                <td>3rd</td>
                                <td>
                                    <div data-chart="apex" data-chart-type="line"></div>
                                </td>
                            </tr>
                            <!-- Seller Row 4 -->
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/sellers/6.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-1">
                                                <a class="link-reset" data-sort="seller"
                                                    href="{{ route('second', ['ecommerce', 'seller-details']) }}">NextGen
                                                    Electronics</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xxs">Since 2018</p>
                                        </div>
                                    </div>
                                </td>
                                <td>1,748</td>
                                <td>12,563</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star"></span>
                                        <span class="ti ti-star"></span>
                                        <span class="ti ti-star"></span> <!-- all empty -->
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(2)</a></span>
                                </td>
                                <td>
                                    <span class="badge p-1 text-bg-light fs-sm">
                                        <img alt="" class="rounded-circle me-1" height="12"
                                            src="/images/flags/fr.svg" /> FR
                                    </span>
                                </td>
                                <td>$78.9k</td>
                                <td>4th</td>
                                <td>
                                    <div data-chart="apex" data-chart-type="bar"></div>
                                </td>
                            </tr>
                            <!-- Seller Row 5 -->
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/sellers/7.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-1">
                                                <a class="link-reset" data-sort="seller"
                                                    href="{{ route('second', ['ecommerce', 'seller-details']) }}">SmartHome
                                                    Goods</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xxs">Since 2015</p>
                                        </div>
                                    </div>
                                </td>
                                <td>520</td>
                                <td>3,321</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star"></span>
                                        <span class="ti ti-star"></span>
                                        <span class="ti ti-star"></span> <!-- all empty -->
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(2)</a></span>
                                </td>
                                <td>
                                    <span class="badge p-1 text-bg-light fs-sm">
                                        <img alt="" class="rounded-circle me-1" height="12"
                                            src="/images/flags/de.svg" /> DE
                                    </span>
                                </td>
                                <td>$56.2k</td>
                                <td>5th</td>
                                <td>
                                    <div data-chart="apex" data-chart-type="line"></div>
                                </td>
                            </tr>
                            <!-- Seller Row 6 -->
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/sellers/8.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-1">
                                                <a class="link-reset" data-sort="seller"
                                                    href="{{ route('second', ['ecommerce', 'seller-details']) }}">TechMasters</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xxs">Since 2013</p>
                                        </div>
                                    </div>
                                </td>
                                <td>2,160</td>
                                <td>40,500</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span> <!-- full stars -->
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(5)</a></span>
                                </td>
                                <td>
                                    <span class="badge p-1 text-bg-light fs-sm">
                                        <img alt="" class="rounded-circle me-1" height="12"
                                            src="/images/flags/us.svg" /> US
                                    </span>
                                </td>
                                <td>$600k</td>
                                <td>6th</td>
                                <td>
                                    <div data-chart="apex" data-chart-type="line"></div>
                                </td>
                            </tr>
                            <!-- Seller Row 7 -->
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/sellers/9.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-1">
                                                <a class="link-reset" data-sort="seller"
                                                    href="{{ route('second', ['ecommerce', 'seller-details']) }}">FutureGizmos</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xxs">Since 2020</p>
                                        </div>
                                    </div>
                                </td>
                                <td>1,400</td>
                                <td>30,000</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star"></span>
                                        <span class="ti ti-star"></span>
                                        <span class="ti ti-star"></span> <!-- all empty -->
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(2)</a></span>
                                </td>
                                <td>
                                    <span class="badge p-1 text-bg-light fs-sm">
                                        <img alt="" class="rounded-circle me-1" height="12"
                                            src="/images/flags/it.svg" /> IT
                                    </span>
                                </td>
                                <td>$170.2k</td>
                                <td>7th</td>
                                <td>
                                    <div data-chart="apex" data-chart-type="line"></div>
                                </td>
                            </tr>
                            <!-- Seller Row 8 -->
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/sellers/10.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-1">
                                                <a class="link-reset" data-sort="seller"
                                                    href="{{ route('second', ['ecommerce', 'seller-details']) }}">GizmoX</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xxs">Since 2016</p>
                                        </div>
                                    </div>
                                </td>
                                <td>2,100</td>
                                <td>28,950</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star"></span>
                                        <span class="ti ti-star"></span>
                                        <span class="ti ti-star"></span> <!-- all empty -->
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(2)</a></span>
                                </td>
                                <td>
                                    <span class="badge p-1 text-bg-light fs-sm">
                                        <img alt="" class="rounded-circle me-1" height="12"
                                            src="/images/flags/au.svg" /> AU
                                    </span>
                                </td>
                                <td>$210.3k</td>
                                <td>8th</td>
                                <td>
                                    <div data-chart="apex" data-chart-type="bar"></div>
                                </td>
                            </tr>
                            <!-- Seller Row 9 -->
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/sellers/1.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-1">
                                                <a class="link-reset" data-sort="seller"
                                                    href="{{ route('second', ['ecommerce', 'seller-details']) }}">NextWave
                                                    Electronics</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xxs">Since 2017</p>
                                        </div>
                                    </div>
                                </td>
                                <td>1,900</td>
                                <td>22,510</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-half-filled"></span>
                                        <span class="ti ti-star"></span> <!-- one half star -->
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(3.5)</a></span>
                                </td>
                                <td>
                                    <span class="badge p-1 text-bg-light fs-sm">
                                        <img alt="" class="rounded-circle me-1" height="12"
                                            src="/images/flags/br.svg" /> BR
                                    </span>
                                </td>
                                <td>$125.4k</td>
                                <td>9th</td>
                                <td>
                                    <div data-chart="apex" data-chart-type="bar"></div>
                                </td>
                            </tr>
                            <!-- Seller Row 10 -->
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/sellers/2.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-1">
                                                <a class="link-reset" data-sort="seller"
                                                    href="{{ route('second', ['ecommerce', 'seller-details']) }}">FutureTech
                                                    Innovations</a>
                                            </h5>
                                            <p class="text-muted mb-0 fs-xxs">Since 2019</p>
                                        </div>
                                    </div>
                                </td>
                                <td>3,250</td>
                                <td>40,300</td>
                                <td>
                                    <span class="text-warning">
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star-filled"></span>
                                        <span class="ti ti-star"></span> <!-- one empty star -->
                                    </span>
                                    <span class="ms-1"><a class="link-reset fw-semibold" data-sort="rating"
                                            href="{{ route('second', ['ecommerce', 'reviews']) }}">(4)</a></span>
                                </td>
                                <td>
                                    <span class="badge p-1 text-bg-light fs-sm">
                                        <img alt="" class="rounded-circle me-1" height="12"
                                            src="/images/flags/jp.svg" /> JP
                                    </span>
                                </td>
                                <td>$340.7k</td>
                                <td>10th</td>
                                <td>
                                    <div data-chart="apex" data-chart-type="line"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div data-table-pagination-info="sellers"></div>
                        <div data-table-pagination=""></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
@endsection

@section('scripts')
    @vite(['resources/js/pages/custom-table.js'])
    @vite(['resources/js/pages/ecommerce-products.js'])
@endsection
