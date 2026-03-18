@extends('layouts.vertical', ['title' => 'Product Details'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Ecommerce', 'title' => 'Product Details'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card card-top-sticky border-0">
                                <div class="card-body p-0">
                                    <!-- Crossfade -->
                                    <div class="carousel slide carousel-fade" data-bs-ride="carousel"
                                        id="carouselExampleFade">
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img alt="" class="d-block w-100" src="/images/products/7.png" />
                                            </div>
                                            <div class="carousel-item">
                                                <img alt="" class="d-block w-100" src="/images/products/11.png" />
                                            </div>
                                            <div class="carousel-item">
                                                <img alt="" class="d-block w-100" src="/images/products/12.png" />
                                            </div>
                                        </div>
                                        <div
                                            class="carousel-indicators m-0 mt-3 d-lg-flex d-none position-static h-100 rounded gap-2">
                                            <button aria-current="true" aria-label="Slide 1"
                                                class="h-auto rounded bg-light-subtle border active" data-bs-slide-to="0"
                                                data-bs-target="#carouselExampleFade" style="width: auto !important;"
                                                type="button">
                                                <img alt="indicator-img" class="d-block avatar-xl"
                                                    src="/images/products/7.png" />
                                            </button>
                                            <button aria-label="Slide 2" class="h-auto rounded bg-light-subtle border"
                                                data-bs-slide-to="1" data-bs-target="#carouselExampleFade"
                                                style="width: auto !important;" type="button">
                                                <img alt="indicator-img" class="d-block avatar-xl"
                                                    src="/images/products/11.png" />
                                            </button>
                                            <button aria-label="Slide 3" class="h-auto rounded bg-light-subtle border"
                                                data-bs-slide-to="2" data-bs-target="#carouselExampleFade"
                                                style="width: auto !important;" type="button">
                                                <img alt="indicator-img" class="d-block avatar-xl"
                                                    src="/images/products/12.png" />
                                            </button>
                                        </div>
                                    </div> <!-- end carousel-->
                                    <div class="text-center my-3">
                                        <a class="btn btn-light me-1" href="{{ route('second', ['ecommerce', 'add-product']) }}"><i
                                                class="ti ti-pencil fs-lg me-1"></i> Edit</a>
                                        <a class="btn btn-danger" href="{{ route('second', ['ecommerce', 'add-product']) }}"><i
                                                class="ti ti-circle-dashed-x fs-lg me-1"></i> Delisting</a>
                                    </div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                        <div class="col-xl-8">
                            <div class="p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="badge bg-success-subtle text-success px-2 py-1 fs-base rounded-pill">In
                                            Stock</span>
                                    </div>
                                    <div class="flex-grow-1 d-inline-flex align-items-center justify-content-end fs-lg">
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ms-1 fs-base"><a class="link-reset fw-medium"
                                                href="{{ route('second', ['ecommerce', 'reviews']) }}">(859 Reviews)</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-3 mb-4">
                                    <h4 class="fs-xl">Apple iMac 24” M3 Chip – 4.5K Retina Display</h4>
                                </div>
                                <div class="row mb-4">
                                    <!-- Updated product details -->
                                    <div class="col-md-4 col-xl-3">
                                        <h6 class="mb-1 text-muted text-uppercase">SKU:</h6>
                                        <p class="fw-medium mb-0">IMAC-M3-24</p>
                                    </div>
                                    <div class="col-md-4 col-xl-3">
                                        <h6 class="mb-1 text-muted text-uppercase">Category:</h6>
                                        <p class="fw-medium mb-0">Computers</p>
                                    </div>
                                    <div class="col-md-4 col-xl-3">
                                        <h6 class="mb-1 text-muted text-uppercase">Stock:</h6>
                                        <p class="fw-medium mb-0">67</p>
                                    </div>
                                    <div class="col-md-4 col-xl-3">
                                        <h6 class="mb-1 text-muted text-uppercase">Published:</h6>
                                        <p class="fw-medium mb-0">12 Jul, 2025 <small class="text-muted">09:00 AM</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <!-- Orders and revenue -->
                                    <div class="col-md-4 col-xl-3">
                                        <h6 class="mb-1 text-muted text-uppercase">Orders:</h6>
                                        <p class="fw-medium mb-0">1,428</p>
                                    </div>
                                    <div class="col-md-4 col-xl-3">
                                        <h6 class="mb-1 text-muted text-uppercase">Revenue:</h6>
                                        <p class="fw-medium mb-0">$2,350,120.00</p>
                                    </div>
                                </div>
                                <h3 class="text-muted d-flex align-items-center gap-2 mb-4">
                                    <small class="text-decoration-line-through">$1,499.00</small>
                                    <span class="fw-bold text-danger">$1,299.00</span>
                                    <small>(13%)</small>
                                </h3>
                                <h5 class="text-uppercase text-muted fs-xs mb-2">Product Info:</h5>
                                <p>The Apple iMac 24” with the M3 chip redefines performance and design. Featuring a
                                    stunning 4.5K Retina display, ultra-fast processing, and a sleek aluminum chassis in
                                    multiple colors, it’s perfect for creatives and professionals alike.</p>
                                <p>Enjoy seamless performance with macOS, optimized apps, and powerful memory — all in an
                                    all-in-one setup that fits any workspace.</p>
                                <h6 class="mt-3 fs-base">Details :</h6>
                                <ul class="d-flex flex-column gap-1 mb-3">
                                    <li>24” 4.5K Retina Display with True Tone.</li>
                                    <li>Apple M3 chip with 8-core CPU and 10-core GPU.</li>
                                    <li>8GB unified memory (configurable to 24GB).</li>
                                    <li>512GB SSD storage (configurable up to 2TB).</li>
                                    <li>Color-matched Magic Keyboard and Mouse.</li>
                                </ul>
                                <a class="link-primary fw-semibold" href="#!">Read More...</a>
                                <div class="card mt-5 shadow-none border border-dashed" data-table=""
                                    data-table-rows-per-page="5">
                                    <div class="card-header border-light">
                                        <h4 class="card-title">Manage Reviews</h4>
                                    </div>
                                    <div class="card-header p-0 d-block">
                                        <div class="row align-items-center g-0">
                                            <div class="col-xl-7">
                                                <div class="d-flex align-items-center gap-4 p-4">
                                                    <img alt="Product" height="80" src="/images/ratings.svg" />
                                                    <div>
                                                        <h3
                                                            class="text-primary d-flex align-items-center gap-2 mb-2 fw-bold">
                                                            4.92 <i class="ti ti-star-filled"></i>
                                                        </h3>
                                                        <p class="mb-2">Based on 245 verified reviews</p>
                                                        <p class="pe-2 h6 text-muted mb-2 lh-base">Feedback
                                                            collected from real customers who purchased our
                                                            templates</p>
                                                        <span class="badge badge-label text-bg-success">+12 new this
                                                            week</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-5">
                                                <div class="p-3">
                                                    <!-- 5 Star -->
                                                    <div class="d-flex align-items-center gap-2 mb-2">
                                                        <div class="flex-shrink-0" style="width: 50px;">5 Star
                                                        </div>
                                                        <div class="progress w-100 bg-label-primary" style="height:8px;">
                                                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="85"
                                                                class="progress-bar bg-primary" role="progressbar"
                                                                style="width: 85%;"></div>
                                                        </div>
                                                        <div class="flex-shrink-0 text-end" style="width: 30px;"><span
                                                                class="badge text-bg-light">128</span></div>
                                                    </div>
                                                    <!-- 4 Star -->
                                                    <div class="d-flex align-items-center gap-2 mb-2">
                                                        <div class="flex-shrink-0" style="width: 50px;">4 Star
                                                        </div>
                                                        <div class="progress w-100 bg-label-primary" style="height:8px;">
                                                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                                                class="progress-bar bg-primary" role="progressbar"
                                                                style="width: 10%;"></div>
                                                        </div>
                                                        <div class="flex-shrink-0 text-end" style="width: 30px;"><span
                                                                class="badge text-bg-light">37</span></div>
                                                    </div>
                                                    <!-- 3 Star -->
                                                    <div class="d-flex align-items-center gap-2 mb-2">
                                                        <div class="flex-shrink-0" style="width: 50px;">3 Star
                                                        </div>
                                                        <div class="progress w-100 bg-label-primary" style="height:8px;">
                                                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="3"
                                                                class="progress-bar bg-primary" role="progressbar"
                                                                style="width: 3%;"></div>
                                                        </div>
                                                        <div class="flex-shrink-0 text-end" style="width: 30px;"><span
                                                                class="badge text-bg-light">15</span></div>
                                                    </div>
                                                    <!-- 2 Star -->
                                                    <div class="d-flex align-items-center gap-2 mb-2">
                                                        <div class="flex-shrink-0" style="width: 50px;">2 Star
                                                        </div>
                                                        <div class="progress w-100 bg-label-primary" style="height:8px;">
                                                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="1"
                                                                class="progress-bar bg-primary" role="progressbar"
                                                                style="width: 1%;"></div>
                                                        </div>
                                                        <div class="flex-shrink-0 text-end" style="width: 30px;"><span
                                                                class="badge text-bg-light">7</span></div>
                                                    </div>
                                                    <!-- 1 Star -->
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="flex-shrink-0" style="width: 50px;">1 Star
                                                        </div>
                                                        <div class="progress w-100 bg-label-primary" style="height:8px;">
                                                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="1"
                                                                class="progress-bar bg-primary" role="progressbar"
                                                                style="width: 1%;"></div>
                                                        </div>
                                                        <div class="flex-shrink-0 text-end" style="width: 30px;"><span
                                                                class="badge text-bg-light">2</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table
                                            class="table table-custom table-centered table-select table-hover w-100 mb-0">
                                            <thead class="bg-light align-middle bg-opacity-25">
                                                <tr class="text-uppercase fs-xxs">
                                                    <th>Reviewer</th>
                                                    <th style="width: 18rem;">Review</th>
                                                    <th data-table-sort="">Date</th>
                                                    <th data-table-sort="">Status</th>
                                                    <th class="text-center" style="width: 1%;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex justify-content-start align-items-center gap-2">
                                                            <div class="avatar avatar-sm">
                                                                <img alt="avatar-8" class="img-fluid rounded-circle"
                                                                    src="/images/users/user-8.jpg" />
                                                            </div>
                                                            <div>
                                                                <h5 class="text-nowrap fs-sm mb-0 lh-base">Sophia
                                                                    Lee</h5>
                                                                <p class="text-muted fs-xs mb-0">
                                                                    sophia.lee@digitalshop.com</p>
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
                                                        <p class="text-muted fst-italic mb-0">"These earbuds are
                                                            amazing, the sound quality is top-notch. Totally worth
                                                            the price!"</p>
                                                    </td>
                                                    <td>22 Aug, 2025 <small class="text-muted">04:10 PM</small></td>
                                                    <td><span class="badge badge-soft-success fs-xxs">Published</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-1">
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
                                                                href="#"><i class="ti ti-eye fs-lg"></i></a>
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
                                                                href="#"><i class="ti ti-edit fs-lg"></i></a>
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
                                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex justify-content-start align-items-center gap-2">
                                                            <div class="avatar avatar-sm">
                                                                <img alt="avatar-6" class="img-fluid rounded-circle"
                                                                    src="/images/users/user-6.jpg" />
                                                            </div>
                                                            <div>
                                                                <h5 class="text-nowrap fs-sm mb-0 lh-base">David
                                                                    Smith</h5>
                                                                <p class="text-muted fs-xs mb-0">
                                                                    david.smith@healthstore.com</p>
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
                                                        <p class="text-muted fst-italic mb-0">"It does the job, but
                                                            I feel like it's a little expensive for what it
                                                            offers."</p>
                                                    </td>
                                                    <td>23 Aug, 2025 <small class="text-muted">02:20 PM</small></td>
                                                    <td><span class="badge badge-soft-warning fs-xxs">Pending</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-1">
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
                                                                href="#"><i class="ti ti-eye fs-lg"></i></a>
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
                                                                href="#"><i class="ti ti-edit fs-lg"></i></a>
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
                                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex justify-content-start align-items-center gap-2">
                                                            <div class="avatar avatar-sm">
                                                                <img alt="avatar-3" class="img-fluid rounded-circle"
                                                                    src="/images/users/user-3.jpg" />
                                                            </div>
                                                            <div>
                                                                <h5 class="text-nowrap fs-sm mb-0 lh-base">Alice
                                                                    Johnson</h5>
                                                                <p class="text-muted fs-xs mb-0">
                                                                    alice.johnson@homesupplies.com</p>
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
                                                        <p class="text-muted fst-italic mb-0">"The TV has incredible
                                                            picture quality. Totally worth the investment!"</p>
                                                    </td>
                                                    <td>24 Aug, 2025 <small class="text-muted">09:15 AM</small></td>
                                                    <td><span class="badge badge-soft-success fs-xxs">Published</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-1">
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
                                                                href="#"><i class="ti ti-eye fs-lg"></i></a>
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
                                                                href="#"><i class="ti ti-edit fs-lg"></i></a>
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
                                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex justify-content-start align-items-center gap-2">
                                                            <div class="avatar avatar-sm">
                                                                <img alt="avatar-2" class="img-fluid rounded-circle"
                                                                    src="/images/users/user-2.jpg" />
                                                            </div>
                                                            <div>
                                                                <h5 class="text-nowrap fs-sm mb-0 lh-base">Michael
                                                                    Green</h5>
                                                                <p class="text-muted fs-xs mb-0">
                                                                    michael.green@mobileshop.com</p>
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
                                                        <p class="text-muted fst-italic mb-0">"The camera is amazing
                                                            and the performance is smooth. Definitely the best
                                                            smartphone I have used!"</p>
                                                    </td>
                                                    <td>25 Aug, 2025 <small class="text-muted">11:30 AM</small></td>
                                                    <td><span class="badge badge-soft-success fs-xxs">Published</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-1">
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
                                                                href="#"><i class="ti ti-eye fs-lg"></i></a>
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
                                                                href="#"><i class="ti ti-edit fs-lg"></i></a>
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
                                                                href="#"><i class="ti ti-trash fs-lg"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex justify-content-start align-items-center gap-2">
                                                            <div class="avatar avatar-sm">
                                                                <img alt="avatar-4" class="img-fluid rounded-circle"
                                                                    src="/images/users/user-4.jpg" />
                                                            </div>
                                                            <div>
                                                                <h5 class="text-nowrap fs-sm mb-0 lh-base">Chris
                                                                    Evans</h5>
                                                                <p class="text-muted fs-xs mb-0">
                                                                    chris.evans@gamestore.com</p>
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
                                                        <p class="text-muted fst-italic mb-0">"The performance is
                                                            amazing, but it's a bit too heavy to carry around all
                                                            day."</p>
                                                    </td>
                                                    <td>26 Aug, 2025 <small class="text-muted">10:00 AM</small></td>
                                                    <td><span class="badge badge-soft-warning fs-xxs">Pending</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-1">
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
                                                                href="#"><i class="ti ti-eye fs-lg"></i></a>
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
                                                                href="#"><i class="ti ti-edit fs-lg"></i></a>
                                                            <a class="btn btn-light btn-icon btn-sm rounded-circle"
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
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')
    @vite(['resources/js/pages/custom-table.js'])
@endsection
