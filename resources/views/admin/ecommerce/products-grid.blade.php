@extends('layouts.vertical', ['title' => 'Products Grid'])

@section('css')
    @vite(['node_modules/nouislider/dist/nouislider.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Ecommerce', 'title' => 'Products Grid'])

    <div class="row mb-2">
        <div class="col-lg-12">
            <form class="bg-light-subtle rounded border p-3">
                <div class="d-flex flex-wrap justify align-items-center gap-3">
                    <div class="d-lg-none d-flex gap-2">
                        <button aria-controls="productFillterOffcanvas" class="btn btn-default btn-icon"
                            data-bs-target="#productFillterOffcanvas" data-bs-toggle="offcanvas" type="button">
                            <i class="ti ti-menu-2 fs-lg"></i>
                        </button>
                    </div>
                    <h3 class="mb-0 fs-xl flex-grow-1">1025 Products</h3>
                    <div class="d-flex gap-1">
                        <a class="btn btn-primary btn-icon" href="{{ route('second', ['ecommerce', 'products-grid']) }}">
                            <i class="fs-lg" data-lucide="layout-grid"></i>
                        </a>
                        <a class="btn btn-soft-primary btn-icon" href="{{ route('second', ['ecommerce', 'products']) }}">
                            <i class="fs-lg" data-lucide="list"></i>
                        </a>
                        <a class="btn btn-danger ms-1" href="{{ route('second', ['ecommerce', 'add-product']) }}">
                            <i class="fs-sm me-2" data-lucide="plus"></i> Add Product
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row g-2">
        <div class="col-xl-3">
            <div class="offcanvas-lg offcanvas-start" id="productFillterOffcanvas" tabindex="-1">
                <div class="card h-100" data-simplebar="">
                    <div class="card-body p-0">
                        <div class="p-3 border-bottom border-dashed">
                            <div class="app-search">
                                <input class="form-control" placeholder="Search product name..." type="search" />
                                <i class="app-search-icon text-muted" data-lucide="search"></i>
                            </div>
                        </div>
                        <div class="p-3 border-bottom border-dashed">
                            <div class="d-flex mb-2 justify-content-between align-items-center">
                                <h5 class="mb-0">Category:</h5>
                                <a class="btn btn-link btn-sm px-0 fw-semibold" href="javascript: void(0);">View All</a>
                            </div>
                            <!-- Category List -->
                            <div class="d-flex align-items-center gap-2 text-muted py-1">
                                <div class="form-check flex-grow-1">
                                    <input class="form-check-input" id="cat-electronics" type="checkbox" />
                                    <label class="form-check-label mb-0" for="cat-electronics">Electronics</label>
                                </div>
                                <div class="flex-shrink-0"><span class="badge text-bg-light">8</span></div>
                            </div>
                            <div class="d-flex align-items-center gap-2 text-muted py-1">
                                <div class="form-check flex-grow-1">
                                    <input class="form-check-input" id="cat-computers" type="checkbox" />
                                    <label class="form-check-label mb-0" for="cat-computers">Computers</label>
                                </div>
                                <div class="flex-shrink-0"><span class="badge text-bg-light">5</span></div>
                            </div>
                            <div class="d-flex align-items-center gap-2 text-muted py-1">
                                <div class="form-check flex-grow-1">
                                    <input class="form-check-input" id="cat-home-office" type="checkbox" />
                                    <label class="form-check-label mb-0" for="cat-home-office">Home &amp; Office</label>
                                </div>
                                <div class="flex-shrink-0"><span class="badge text-bg-light">6</span></div>
                            </div>
                            <div class="d-flex align-items-center gap-2 text-muted py-1">
                                <div class="form-check flex-grow-1">
                                    <input class="form-check-input" id="cat-accessories" type="checkbox" />
                                    <label class="form-check-label mb-0" for="cat-accessories">Accessories</label>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 text-muted py-1">
                                <div class="form-check flex-grow-1">
                                    <input class="form-check-input" id="cat-gaming" type="checkbox" />
                                    <label class="form-check-label mb-0" for="cat-gaming">Gaming</label>
                                </div>
                                <div class="flex-shrink-0"><span class="badge text-bg-light">9</span></div>
                            </div>
                            <div class="d-flex align-items-center gap-2 text-muted py-1">
                                <div class="form-check flex-grow-1">
                                    <input class="form-check-input" id="cat-mobile" type="checkbox" />
                                    <label class="form-check-label mb-0" for="cat-mobile">Mobile Phones</label>
                                </div>
                                <div class="flex-shrink-0"><span class="badge text-bg-light">12</span></div>
                            </div>
                            <div class="d-flex align-items-center gap-2 text-muted py-1">
                                <div class="form-check flex-grow-1">
                                    <input class="form-check-input" id="cat-appliances" type="checkbox" />
                                    <label class="form-check-label mb-0" for="cat-appliances">Appliances</label>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 border-bottom border-dashed">
                            <div class="d-flex mb-2 justify-content-between align-items-center">
                                <h5 class="mb-0">Brands:</h5>
                                <a class="btn btn-link btn-sm px-0 fw-semibold" href="javascript: void(0);">View All</a>
                            </div>
                            <!-- Brands List -->
                            <div class="d-flex align-items-center gap-2 text-muted py-1">
                                <div class="form-check flex-grow-1">
                                    <input class="form-check-input" id="brand-apple" type="checkbox" />
                                    <label class="form-check-label mb-0" for="brand-apple">Apple</label>
                                </div>
                                <div class="flex-shrink-0"><span class="badge text-bg-light">14</span></div>
                            </div>
                            <div class="d-flex align-items-center gap-2 text-muted py-1">
                                <div class="form-check flex-grow-1">
                                    <input class="form-check-input" id="brand-samsung" type="checkbox" />
                                    <label class="form-check-label mb-0" for="brand-samsung">Samsung</label>
                                </div>
                                <div class="flex-shrink-0"><span class="badge text-bg-light">20</span></div>
                            </div>
                            <div class="d-flex align-items-center gap-2 text-muted py-1">
                                <div class="form-check flex-grow-1">
                                    <input class="form-check-input" id="brand-sony" type="checkbox" />
                                    <label class="form-check-label mb-0" for="brand-sony">Sony</label>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 text-muted py-1">
                                <div class="form-check flex-grow-1">
                                    <input class="form-check-input" id="brand-dell" type="checkbox" />
                                    <label class="form-check-label mb-0" for="brand-dell">Dell</label>
                                </div>
                                <div class="flex-shrink-0"><span class="badge text-bg-light">7</span></div>
                            </div>
                            <div class="d-flex align-items-center gap-2 text-muted py-1">
                                <div class="form-check flex-grow-1">
                                    <input class="form-check-input" id="brand-hp" type="checkbox" />
                                    <label class="form-check-label mb-0" for="brand-hp">HP</label>
                                </div>
                            </div>
                        </div> <!-- end brands-->
                        <div class="p-3 border-bottom border-dashed">
                            <h5 class="mb-3">Price:</h5>
                            <div data-slider-size="sm" id="price-filter"></div>
                            <div class="d-flex gap-2 align-items-center mt-3">
                                <div class="form-control form-control-sm text-center" id="price-filter-low"></div>
                                <span class="fw-semibold text-muted">to</span>
                                <div class="form-control form-control-sm text-center" id="price-filter-high"></div>
                            </div>
                        </div>
                        <div class="p-3">
                            <div class="d-flex mb-3 justify-content-between align-items-center">
                                <h5 class="mb-0">Ratings:</h5>
                            </div>
                            <div class="form-check py-1">
                                <input class="form-check-input" id="5-star-rating" type="checkbox" />
                                <label class="form-check-label d-block" for="5-star-rating">
                                    <span class="d-flex align-items-center">
                                        <span class="flex-grow-1 d-inline-flex align-items-center">
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="text-muted ms-1">5 Stars &amp; Up</span>
                                        </span>
                                        <span class="flex-shrink-0"><span class="badge text-bg-light">120</span></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check py-1">
                                <input class="form-check-input" id="4-star-rating" type="checkbox" />
                                <label class="form-check-label d-block" for="4-star-rating">
                                    <span class="d-flex align-items-center">
                                        <span class="flex-grow-1 d-inline-flex align-items-center">
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-muted"></span>
                                            <span class="text-muted ms-1">4 Stars &amp; Up</span>
                                        </span>
                                        <span class="flex-shrink-0"><span class="badge text-bg-light">210</span></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check py-1">
                                <input class="form-check-input" id="3-star-rating" type="checkbox" />
                                <label class="form-check-label d-block" for="3-star-rating">
                                    <span class="d-flex align-items-center">
                                        <span class="flex-grow-1 d-inline-flex align-items-center">
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-muted"></span>
                                            <span class="ti ti-star-filled text-muted"></span>
                                            <span class="text-muted ms-1">3 Stars &amp; Up</span>
                                        </span>
                                        <span class="flex-shrink-0"><span class="badge text-bg-light">325</span></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check py-1">
                                <input class="form-check-input" id="2-star-rating" type="checkbox" />
                                <label class="form-check-label d-block" for="2-star-rating">
                                    <span class="d-flex align-items-center">
                                        <span class="flex-grow-1 d-inline-flex align-items-center">
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-muted"></span>
                                            <span class="ti ti-star-filled text-muted"></span>
                                            <span class="ti ti-star-filled text-muted"></span>
                                            <span class="text-muted ms-1">2 Stars &amp; Up</span>
                                        </span>
                                        <span class="flex-shrink-0"><span class="badge text-bg-light">145</span></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check pt-1">
                                <input class="form-check-input" id="1-star-rating" type="checkbox" />
                                <label class="form-check-label d-block" for="1-star-rating">
                                    <span class="d-flex align-items-center">
                                        <span class="flex-grow-1 d-inline-flex align-items-center">
                                            <span class="ti ti-star-filled text-warning"></span>
                                            <span class="ti ti-star-filled text-muted"></span>
                                            <span class="ti ti-star-filled text-muted"></span>
                                            <span class="ti ti-star-filled text-muted"></span>
                                            <span class="ti ti-star-filled text-muted"></span>
                                            <span class="text-muted ms-1">1 Star &amp; Up</span>
                                        </span>
                                        <span class="flex-shrink-0"><span class="badge text-bg-light">58</span></span>
                                    </span>
                                </label>
                            </div>
                        </div> <!-- end rating-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="row row-cols-xxl-4 row-cols-lg-3 row-cols-sm-2 row-col-1 g-2">
                <div class="col">
                    <article class="card h-100 mb-2">
                        <!-- Badge -->
                        <div class="badge text-bg-success badge-label fs-base rounded position-absolute top-0 start-0 m-3">
                            15% OFF</div>
                        <!-- Card Body -->
                        <div class="card-body pb-0">
                            <div class="p-3">
                                <img alt="modern-sofa" class="img-fluid" src="/images/products/1.png" />
                            </div>
                            <!-- Title -->
                            <h6 class="card-title fs-sm lh-base mb-2">
                                <a class="link-reset"
                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Modern Minimalist Fabric
                                    Sofa Single Seater</a>
                            </h6>
                            <div>
                                <span class="text-warning">
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-half-filled"></span>
                                    <span class="ti ti-star"></span>
                                </span>
                                <span class="ms-1"><a class="link-reset fw-semibold"
                                        href="{{ route('second', ['ecommerce', 'reviews']) }}">(45)</a></span>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                <h5 class="text-success d-flex align-items-center gap-2 mb-0">
                                    <span class="text-muted text-decoration-line-through">$899.00</span> $764.15
                                </h5>
                            </div>
                            <a class="btn btn-sm btn-icon btn-primary" href="#!"><i
                                    class="ti ti-basket fs-lg"></i></a>
                        </div>
                    </article>
                </div> <!-- end col -->
                <div class="col">
                    <article class="card h-100 mb-2">
                        <!-- Card Body -->
                        <div class="card-body pb-0">
                            <div class="p-3">
                                <img alt="funky-shoes" class="img-fluid" src="/images/products/2.png" />
                            </div>
                            <!-- Title -->
                            <h6 class="card-title fs-sm lh-base mb-2">
                                <a class="link-reset" href="{{ route('second', ['ecommerce', 'product-details']) }}">Funky
                                    Streetwear Sneakers - Neon Splash</a>
                            </h6>
                            <div>
                                <span class="text-warning">
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star"></span>
                                    <span class="ti ti-star"></span>
                                </span>
                                <span class="ms-1"><a class="link-reset fw-semibold"
                                        href="{{ route('second', ['ecommerce', 'reviews']) }}">(32)</a></span>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                <h5 class="text-danger d-flex align-items-center gap-2 mb-0">
                                    <span class="text-muted text-decoration-line-through">$59.99</span> $44.99
                                </h5>
                            </div>
                            <a class="btn btn-sm btn-icon btn-primary" href="#!"><i
                                    class="ti ti-basket fs-lg"></i></a>
                        </div>
                    </article>
                </div> <!-- end col -->
                <div class="col">
                    <article class="card h-100 mb-2">
                        <!-- Badge -->
                        <div class="badge text-bg-danger badge-label fs-base rounded position-absolute top-0 start-0 m-3">
                            15% OFF</div>
                        <!-- Card Body -->
                        <div class="card-body pb-0">
                            <div class="p-3">
                                <img alt="earbuds" class="img-fluid" src="/images/products/3.png" />
                            </div>
                            <!-- Title -->
                            <h6 class="card-title fs-sm lh-base mb-2">
                                <a class="link-reset" href="{{ route('second', ['ecommerce', 'product-details']) }}">Noise
                                    Canceling Wireless Earbuds - Black Edition</a>
                            </h6>
                            <div>
                                <span class="text-warning">
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star"></span>
                                    <span class="ti ti-star"></span>
                                </span>
                                <span class="ms-1"><a class="link-reset fw-semibold"
                                        href="{{ route('second', ['ecommerce', 'reviews']) }}">(58)</a></span>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                <h5 class="text-danger d-flex align-items-center gap-2 mb-0">
                                    <span class="text-muted text-decoration-line-through">$49.99</span> $42.49
                                </h5>
                            </div>
                            <a class="btn btn-sm btn-icon btn-primary" href="#!"><i
                                    class="ti ti-basket fs-lg"></i></a>
                        </div>
                    </article>
                </div> <!-- end col -->
                <div class="col">
                    <article class="card h-100 mb-2">
                        <!-- Badge -->
                        <div class="badge text-bg-danger badge-label fs-base rounded position-absolute top-0 start-0 m-3">
                            20% OFF</div>
                        <!-- Card Body -->
                        <div class="card-body pb-0">
                            <div class="p-3">
                                <img alt="wooden-chair" class="img-fluid" src="/images/products/4.png" />
                            </div>
                            <!-- Title -->
                            <h6 class="card-title fs-sm lh-base mb-2">
                                <a class="link-reset"
                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Minimalist Solid Wood
                                    Dining Chair</a>
                            </h6>
                            <div>
                                <span class="text-warning">
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-half-filled"></span>
                                    <span class="ti ti-star"></span>
                                </span>
                                <span class="ms-1"><a class="link-reset fw-semibold"
                                        href="{{ route('second', ['ecommerce', 'reviews']) }}">(46)</a></span>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                <h5 class="text-danger d-flex align-items-center gap-2 mb-0">
                                    <span class="text-muted text-decoration-line-through">$120.00</span> $96.00
                                </h5>
                            </div>
                            <a class="btn btn-sm btn-icon btn-primary" href="#!"><i
                                    class="ti ti-basket fs-lg"></i></a>
                        </div>
                    </article>
                </div> <!-- end col -->
                <div class="col">
                    <article class="card h-100 mb-2">
                        <!-- Card Body -->
                        <div class="card-body pb-0">
                            <div class="p-3">
                                <img alt="black-wall-watch" class="img-fluid" src="/images/products/5.png" />
                            </div>
                            <!-- Title -->
                            <h6 class="card-title fs-sm lh-base mb-2">
                                <a class="link-reset"
                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Modern Black Minimalist
                                    Wall Clock</a>
                            </h6>
                            <div>
                                <span class="text-warning">
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star"></span>
                                </span>
                                <span class="ms-1"><a class="link-reset fw-semibold"
                                        href="{{ route('second', ['ecommerce', 'reviews']) }}">(62)</a></span>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                <h5 class="text-danger d-flex align-items-center gap-2 mb-0">
                                    <span class="text-muted text-decoration-line-through">$49.99</span> $39.99
                                </h5>
                            </div>
                            <a class="btn btn-sm btn-icon btn-primary" href="#!"><i
                                    class="ti ti-basket fs-lg"></i></a>
                        </div>
                    </article>
                </div> <!-- end col -->
                <div class="col">
                    <article class="card h-100 mb-2">
                        <!-- Badge -->
                        <div class="badge text-bg-danger badge-label fs-base rounded position-absolute top-0 start-0 m-3">
                            20% OFF</div>
                        <!-- Card Body -->
                        <div class="card-body pb-0">
                            <div class="p-3">
                                <img alt="brown-chair" class="img-fluid" src="/images/products/6.png" />
                            </div>
                            <!-- Title -->
                            <h6 class="card-title fs-sm lh-base mb-2">
                                <a class="link-reset"
                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Elegant Brown Wooden
                                    Chair</a>
                            </h6>
                            <div>
                                <span class="text-warning">
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star"></span>
                                </span>
                                <span class="ms-1"><a class="link-reset fw-semibold"
                                        href="{{ route('second', ['ecommerce', 'reviews']) }}">(48)</a></span>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                <h5 class="text-danger d-flex align-items-center gap-2 mb-0">
                                    <span class="text-muted text-decoration-line-through">$120.00</span> $96.00
                                </h5>
                            </div>
                            <a class="btn btn-sm btn-icon btn-primary" href="#!"><i
                                    class="ti ti-basket fs-lg"></i></a>
                        </div>
                    </article>
                </div> <!-- end col -->
                <div class="col">
                    <article class="card h-100 mb-2">
                        <!-- Card Body -->
                        <div class="card-body pb-0">
                            <div class="p-3">
                                <img alt="imac" class="img-fluid" src="/images/products/7.png" />
                            </div>
                            <!-- Title -->
                            <h6 class="card-title fs-sm lh-base mb-2">
                                <a class="link-reset"
                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Apple iMac 24" Retina
                                    4.5K Display</a>
                            </h6>
                            <div>
                                <span class="text-warning">
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-half"></span>
                                </span>
                                <span class="ms-1"><a class="link-reset fw-semibold"
                                        href="{{ route('second', ['ecommerce', 'reviews']) }}">(65)</a></span>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                <h5 class="text-danger d-flex align-items-center gap-2 mb-0">
                                    <span class="text-muted text-decoration-line-through">$1,299.00</span> $1,039.20
                                </h5>
                            </div>
                            <a class="btn btn-sm btn-icon btn-primary" href="#!"><i
                                    class="ti ti-basket fs-lg"></i></a>
                        </div>
                    </article>
                </div> <!-- end col -->
                <div class="col">
                    <article class="card h-100 mb-2">
                        <!-- Card Body -->
                        <div class="card-body pb-0">
                            <div class="p-3">
                                <img alt="coolest-chair" class="img-fluid" src="/images/products/8.png" />
                            </div>
                            <!-- Title -->
                            <h6 class="card-title fs-sm lh-base mb-2">
                                <a class="link-reset"
                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Coolest Ergonomic
                                    Lounge Chair</a>
                            </h6>
                            <div>
                                <span class="text-warning">
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star"></span>
                                </span>
                                <span class="ms-1"><a class="link-reset fw-semibold"
                                        href="{{ route('second', ['ecommerce', 'reviews']) }}">(52)</a></span>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                <h5 class="text-danger d-flex align-items-center gap-2 mb-0">
                                    <span class="text-muted text-decoration-line-through">$320.00</span> $256.00
                                </h5>
                            </div>
                            <a class="btn btn-sm btn-icon btn-primary" href="#!"><i
                                    class="ti ti-basket fs-lg"></i></a>
                        </div>
                    </article>
                </div> <!-- end col -->
                <div class="col">
                    <article class="card h-100 mb-2">
                        <!-- Card Body -->
                        <div class="card-body pb-0">
                            <div class="p-3">
                                <img alt="ipad" class="img-fluid" src="/images/products/9.png" />
                            </div>
                            <!-- Title -->
                            <h6 class="card-title fs-sm lh-base mb-2">
                                <a class="link-reset"
                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Apple iPad 10.9" Wi-Fi
                                    64GB - Silver</a>
                            </h6>
                            <div>
                                <span class="text-warning">
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star"></span>
                                </span>
                                <span class="ms-1"><a class="link-reset fw-semibold"
                                        href="{{ route('second', ['ecommerce', 'reviews']) }}">(142)</a></span>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                <h4 class="text-danger d-flex align-items-center gap-2 mb-0">
                                    <span class="text-muted text-decoration-line-through">$449.00</span> $359.20
                                </h4>
                            </div>
                            <a class="btn btn-sm btn-icon btn-primary" href="#!"><i
                                    class="ti ti-basket fs-lg"></i></a>
                        </div>
                    </article>
                </div> <!-- end col -->
                <div class="col">
                    <article class="card h-100 mb-2">
                        <!-- Card Body -->
                        <div class="card-body pb-0">
                            <div class="p-3">
                                <img alt="ipad" class="img-fluid" src="/images/products/10.png" />
                            </div>
                            <!-- Title -->
                            <h6 class="card-title fs-sm lh-base mb-2">
                                <a class="link-reset"
                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Branded Bagpack -
                                    Multicolor</a>
                            </h6>
                            <div>
                                <span class="text-warning">
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                </span>
                                <span class="ms-1"><a class="link-reset fw-semibold"
                                        href="{{ route('second', ['ecommerce', 'reviews']) }}">(23)</a></span>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                <h4 class="text-danger d-flex align-items-center gap-2 mb-0">
                                    <span class="text-muted text-decoration-line-through">$149.00</span> $99.20
                                </h4>
                            </div>
                            <a class="btn btn-sm btn-icon btn-primary" href="#!"><i
                                    class="ti ti-basket fs-lg"></i></a>
                        </div>
                    </article>
                </div> <!-- end col -->
                <div class="col">
                    <article class="card h-100 mb-2">
                        <!-- Card Body -->
                        <div class="card-body pb-0">
                            <div class="p-3">
                                <img alt="funky-shoes" class="img-fluid" src="/images/products/2.png" />
                            </div>
                            <!-- Title -->
                            <h6 class="card-title fs-sm lh-base mb-2">
                                <a class="link-reset"
                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Funky Streetwear
                                    Sneakers - Neon Splash</a>
                            </h6>
                            <div>
                                <span class="text-warning">
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star"></span>
                                    <span class="ti ti-star"></span>
                                </span>
                                <span class="ms-1"><a class="link-reset fw-semibold"
                                        href="{{ route('second', ['ecommerce', 'reviews']) }}">(32)</a></span>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                <h5 class="text-danger d-flex align-items-center gap-2 mb-0">
                                    <span class="text-muted text-decoration-line-through">$59.99</span> $44.99
                                </h5>
                            </div>
                            <a class="btn btn-sm btn-icon btn-primary" href="#!"><i
                                    class="ti ti-basket fs-lg"></i></a>
                        </div>
                    </article>
                </div> <!-- end col -->
                <div class="col">
                    <article class="card h-100 mb-2">
                        <!-- Badge -->
                        <div class="badge text-bg-danger badge-label fs-base rounded position-absolute top-0 start-0 m-3">
                            15% OFF</div>
                        <!-- Card Body -->
                        <div class="card-body pb-0">
                            <div class="p-3">
                                <img alt="earbuds" class="img-fluid" src="/images/products/3.png" />
                            </div>
                            <!-- Title -->
                            <h6 class="card-title fs-sm lh-base mb-2">
                                <a class="link-reset"
                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Noise Canceling
                                    Wireless Earbuds - Black Edition</a>
                            </h6>
                            <div>
                                <span class="text-warning">
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star-filled"></span>
                                    <span class="ti ti-star"></span>
                                    <span class="ti ti-star"></span>
                                </span>
                                <span class="ms-1"><a class="link-reset fw-semibold"
                                        href="{{ route('second', ['ecommerce', 'reviews']) }}">(58)</a></span>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                <h5 class="text-danger d-flex align-items-center gap-2 mb-0">
                                    <span class="text-muted text-decoration-line-through">$49.99</span> $42.49
                                </h5>
                            </div>
                            <a class="btn btn-sm btn-icon btn-primary" href="#!"><i
                                    class="ti ti-basket fs-lg"></i></a>
                        </div>
                    </article>
                </div> <!-- end col -->
            </div> <!-- end row-->
            <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
                <span class="text-muted fst-italic">Last modification: <i class="ti ti-clock"></i> 4:55 pm -
                    22.04.2025</span>
                <ul class="pagination pagination-boxed mb-0 justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#"><i
                                class="ti ti-chevrons-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="ti ti-chevrons-right"></i></a>
                    </li>
                </ul>
            </div>
        </div> <!-- end col-9-->
    </div> <!-- end row-->
@endsection

@section('scripts')
    @vite(['resources/js/pages/ecommerce-products.js'])
@endsection
