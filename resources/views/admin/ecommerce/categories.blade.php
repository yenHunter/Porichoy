@extends('layouts.vertical', ['title' => 'Categories'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Ecommerce', 'title' => 'Categories'])

    <div class="row">
        <div class="col-12">
            <div class="card" data-table="" data-table-rows-per-page="8">
                <div class="card-header border-light justify-content-between">
                    <div class="d-flex gap-2">
                        <div class="app-search">
                            <input class="form-control" data-table-search="" placeholder="Search category..."
                                type="search" />
                            <i class="app-search-icon text-muted" data-lucide="search"></i>
                        </div>
                        <button class="btn btn-danger d-none" data-table-delete-selected="">Delete</button>
                    </div>
                    <div class="d-flex align-items-center gap-1">
                        <!-- Records Per Page -->
                        <div>
                            <select class="form-select form-control my-1 my-md-0" data-table-set-rows-per-page="">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <!-- Status Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="status">
                                <option value="">All</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="circle"></i>
                        </div>
                        <a class="btn btn-primary ms-1" data-bs-target="#addCategoryModal" data-bs-toggle="modal"
                            href="#!">
                            <i class="fs-sm me-2" data-lucide="plus"></i> Add Category
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
                                <th data-table-sort="product">Category Name</th>
                                <th data-table-sort="">Slug</th>
                                <th data-table-sort="">Products</th>
                                <th data-table-sort="">Orders</th>
                                <th data-table-sort="">Earnings</th>
                                <th data-table-sort="">Last Modify</th>
                                <th data-column="status" data-table-sort="">Status</th>
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
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/1.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Furnitures</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>furniture</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">5248</h5>
                                </td>
                                <td>95.6k</td>
                                <td>$40.5M</td>
                                <td>18 Apr, 2025 <small class="text-muted">12:24 PM</small></td>
                                <td><span class="badge badge-soft-success fs-xxs">Active</span></td>
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
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/2.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Electronics</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>electronics</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">9854</h5>
                                </td>
                                <td>112.3k</td>
                                <td>$30.4M</td>
                                <td>20 Apr, 2025 <small class="text-muted">09:10 AM</small></td>
                                <td><span class="badge badge-soft-success fs-xxs">Active</span></td>
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
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/3.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Smartphones</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>electronics-smartphones</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">1324</h5>
                                </td>
                                <td>50.1k</td>
                                <td>$22.3M</td>
                                <td>22 Apr, 2025 <small class="text-muted">11:45 AM</small></td>
                                <td><span class="badge badge-soft-danger fs-xxs">Inactive</span></td>
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
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/4.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Headphones</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>accessories</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">5123</h5>
                                </td>
                                <td>70.8k</td>
                                <td>$5.7M</td>
                                <td>25 Apr, 2025 <small class="text-muted">08:20 AM</small></td>
                                <td><span class="badge badge-soft-success fs-xxs">Active</span></td>
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
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/5.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Table
                                                    Lamps</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>furniture-tables</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">7589</h5>
                                </td>
                                <td>88.7k</td>
                                <td>$13.2M</td>
                                <td>27 Apr, 2025 <small class="text-muted">03:15 PM</small></td>
                                <td><span class="badge badge-soft-danger fs-xxs">Inactive</span></td>
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
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/6.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Kitchen
                                                    Appliances</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>appliances</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">3021</h5>
                                </td>
                                <td>110.4k</td>
                                <td>$12.1M</td>
                                <td>30 Apr, 2025 <small class="text-muted">06:00 PM</small></td>
                                <td><span class="badge badge-soft-success fs-xxs">Active</span></td>
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
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/7.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Smart
                                                    Watches</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>wearables</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">6245</h5>
                                </td>
                                <td>95.3k</td>
                                <td>$8.9M</td>
                                <td>28 Apr, 2025 <small class="text-muted">10:45 AM</small></td>
                                <td><span class="badge badge-soft-success fs-xxs">Active</span></td>
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
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/8.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Laptops</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>electronics</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">4890</h5>
                                </td>
                                <td>67.2k</td>
                                <td>$15.4M</td>
                                <td>29 Apr, 2025 <small class="text-muted">02:30 PM</small></td>
                                <td><span class="badge badge-soft-danger fs-xxs">Inactive</span></td>
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
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded" src="/images/products/9.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Gaming
                                                    Consoles</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>gaming</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">3756</h5>
                                </td>
                                <td>82.1k</td>
                                <td>$10.7M</td>
                                <td>27 Apr, 2025 <small class="text-muted">09:10 AM</small></td>
                                <td><span class="badge badge-soft-success fs-xxs">Active</span></td>
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
                                        <div class="avatar-md me-3">
                                            <img alt="Product" class="img-fluid rounded"
                                                src="/images/products/10.png" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="product"
                                                    href="{{ route('second', ['ecommerce', 'product-details']) }}">Bluetooth
                                                    Speakers</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>audio</td>
                                <td>
                                    <h5 class="fs-base mb-0 fw-medium">5432</h5>
                                </td>
                                <td>78.9k</td>
                                <td>$6.3M</td>
                                <td>26 Apr, 2025 <small class="text-muted">04:20 PM</small></td>
                                <td><span class="badge badge-soft-success fs-xxs">Active</span></td>
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
                        <div data-table-pagination-info="categories"></div>
                        <div data-table-pagination=""></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <!-- Add New Category Modal -->
    <div aria-hidden="true" aria-labelledby="addCategoryModalLabel" class="modal fade" id="addCategoryModal"
        tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <form id="addCategoryForm">
                    <div class="modal-body">
                        <div class="row g-3">
                            <!-- Category Name -->
                            <div class="col-md-6">
                                <label class="form-label" for="categoryName">Category Name</label>
                                <input class="form-control" id="categoryName" placeholder="e.g. Electronics"
                                    required="" type="text" />
                            </div>
                            <!-- Slug -->
                            <div class="col-md-6">
                                <label class="form-label" for="categorySlug">Slug</label>
                                <input class="form-control" id="categorySlug" placeholder="e.g. electronics"
                                    required="" type="text" />
                            </div>
                            <!-- Image Upload -->
                            <div class="col-md-12">
                                <label class="form-label" for="categoryImage">Category Image</label>
                                <input accept="image/*" class="form-control" id="categoryImage" type="file" />
                            </div>
                            <!-- Status -->
                            <div class="col-md-6">
                                <label class="form-label" for="categoryStatus">Status</label>
                                <select class="form-select" id="categoryStatus" required="">
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <!-- Optional: Description -->
                            <div class="col-md-12">
                                <label class="form-label" for="categoryDescription">Description (Optional)</label>
                                <textarea class="form-control" id="categoryDescription" placeholder="Brief description of the category..."
                                    rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button>
                        <button class="btn btn-primary" type="submit">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/custom-table.js'])
@endsection
