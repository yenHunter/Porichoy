@extends('layouts.vertical', ['title' => 'Static Tables'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Tables', 'title' => 'Static Tables'])

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Basic Table </h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add the base class <code>.table</code> to any <code>&lt;table&gt;</code>, then
                        extend with our optional modifier classes or custom styles.</p>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="fs-xs">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Wireless Headphones</td>
                                    <td>Electronics</td>
                                    <td>$99.00</td>
                                    <td>120</td>
                                    <td>4.5 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Running Shoes</td>
                                    <td>Footwear</td>
                                    <td>$59.99</td>
                                    <td>80</td>
                                    <td>4.2 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Smartwatch</td>
                                    <td>Wearables</td>
                                    <td>$129.00</td>
                                    <td>0</td>
                                    <td>4.0 ★</td>
                                    <td><span class="badge badge-label badge-soft-warning">Out of Stock</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gaming Mouse</td>
                                    <td>Accessories</td>
                                    <td>$39.50</td>
                                    <td>250</td>
                                    <td>4.7 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Office Chair</td>
                                    <td>Furniture</td>
                                    <td>$149.00</td>
                                    <td>35</td>
                                    <td>4.3 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Custom Table </h4>
                    <span class="badge badge-label badge-soft-success fs-xxs">Exclusive</span>
                </div>
                <div class="card-body p-0">
                    <div class="ps-3 pt-3">
                        <p class="text-muted">
                            Add the base classes <code>.table</code> and <code>.table-custom</code> to any
                            <code>&lt;table&gt;</code> element to apply custom styling, including spacing for the first and
                            last table cells.
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-custom align-middle mb-0">
                            <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                                <tr class="text-uppercase fs-xxs">
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th style="width: 1%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bluetooth Speaker</td>
                                    <td>Audio</td>
                                    <td>$49.00</td>
                                    <td>200</td>
                                    <td>4.6 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leather Wallet</td>
                                    <td>Accessories</td>
                                    <td>$29.99</td>
                                    <td>150</td>
                                    <td>4.3 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fitness Tracker</td>
                                    <td>Wearables</td>
                                    <td>$89.00</td>
                                    <td>60</td>
                                    <td>4.1 ★</td>
                                    <td><span class="badge badge-label badge-soft-warning">Limited Stock</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4K Monitor</td>
                                    <td>Electronics</td>
                                    <td>$349.00</td>
                                    <td>30</td>
                                    <td>4.8 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Standing Desk</td>
                                    <td>Furniture</td>
                                    <td>$499.00</td>
                                    <td>10</td>
                                    <td>4.4 ★</td>
                                    <td><span class="badge badge-label badge-soft-info">New</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Variants of Table </h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Use contextual classes to color tables, table rows or individual cells.
                    </p>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                                <tr class="text-uppercase fs-xxs">
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th style="width: 1%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-primary">
                                    <td>Bluetooth Speaker</td>
                                    <td>Audio</td>
                                    <td>$49.00</td>
                                    <td>200</td>
                                    <td>4.6 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-center">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leather Wallet</td>
                                    <td>Accessories</td>
                                    <td>$29.99</td>
                                    <td>150</td>
                                    <td class="table-warning">4.3 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-center">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fitness Tracker</td>
                                    <td>Wearables</td>
                                    <td class="table-info">$89.00</td>
                                    <td>60</td>
                                    <td>4.1 ★</td>
                                    <td><span class="badge badge-label badge-soft-warning">Limited Stock</span></td>
                                    <td class="text-center table-light">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4K Monitor</td>
                                    <td>Electronics</td>
                                    <td>$349.00</td>
                                    <td class="table-danger">30</td>
                                    <td>4.8 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-center">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-dark">Standing Desk</td>
                                    <td>Furniture</td>
                                    <td>$499.00</td>
                                    <td>10</td>
                                    <td>4.4 ★</td>
                                    <td><span class="badge badge-label badge-soft-info">New</span></td>
                                    <td class="text-center">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Striped Rows </h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Use <code>.table-striped</code> to add zebra-striping to any table row within the
                        <code>&lt;tbody&gt;</code>.
                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped align-middle mb-0">
                            <thead class="align-middle thead-sm">
                                <tr class="text-uppercase fs-xxs">
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th style="width: 1%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bluetooth Speaker</td>
                                    <td>Audio</td>
                                    <td>$49.00</td>
                                    <td>200</td>
                                    <td>4.6 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leather Wallet</td>
                                    <td>Accessories</td>
                                    <td>$29.99</td>
                                    <td>150</td>
                                    <td>4.3 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fitness Tracker</td>
                                    <td>Wearables</td>
                                    <td>$89.00</td>
                                    <td>60</td>
                                    <td>4.1 ★</td>
                                    <td><span class="badge badge-label badge-soft-warning">Limited Stock</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Striped Columns </h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Use <code>.table-striped-columns</code> to add zebra-striping to any table column.
                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped-columns align-middle mb-0">
                            <thead class="align-middle thead-sm">
                                <tr class="text-uppercase fs-xxs">
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th style="width: 1%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bluetooth Speaker</td>
                                    <td>Audio</td>
                                    <td>$49.00</td>
                                    <td>200</td>
                                    <td>4.6 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leather Wallet</td>
                                    <td>Accessories</td>
                                    <td>$29.99</td>
                                    <td>150</td>
                                    <td>4.3 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fitness Tracker</td>
                                    <td>Wearables</td>
                                    <td>$89.00</td>
                                    <td>60</td>
                                    <td>4.1 ★</td>
                                    <td><span class="badge badge-label badge-soft-warning">Limited Stock</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Hoverable Rows </h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Add <code>.table-hover</code> to enable a hover state on table rows within a
                        <code>&lt;tbody&gt;</code>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="align-middle thead-sm">
                                <tr class="text-uppercase fs-xxs">
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th style="width: 1%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bluetooth Speaker</td>
                                    <td>Audio</td>
                                    <td>$49.00</td>
                                    <td>200</td>
                                    <td>4.6 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leather Wallet</td>
                                    <td>Accessories</td>
                                    <td>$29.99</td>
                                    <td>150</td>
                                    <td>4.3 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fitness Tracker</td>
                                    <td>Wearables</td>
                                    <td>$89.00</td>
                                    <td>60</td>
                                    <td>4.1 ★</td>
                                    <td><span class="badge badge-label badge-soft-warning">Limited Stock</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Active Tables </h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">Highlight a table row or cell by adding a <code>.table-active</code> class.</p>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="align-middle thead-sm">
                                <tr class="text-uppercase fs-xxs">
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th style="width: 1%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-active">
                                    <td>Bluetooth Speaker</td>
                                    <td>Audio</td>
                                    <td>$49.00</td>
                                    <td>200</td>
                                    <td>4.6 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leather Wallet</td>
                                    <td>Accessories</td>
                                    <td>$29.99</td>
                                    <td>150</td>
                                    <td>4.3 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fitness Tracker</td>
                                    <td>Wearables</td>
                                    <td class="table-active">$89.00</td>
                                    <td>60</td>
                                    <td>4.1 ★</td>
                                    <td><span class="badge badge-label badge-soft-warning">Limited Stock</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Bordered Tables </h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Add <code>.table-bordered</code> for borders on all sides of the table and cells.
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="align-middle thead-sm">
                                <tr class="text-uppercase fs-xxs">
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th style="width: 1%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bluetooth Speaker</td>
                                    <td>Audio</td>
                                    <td>$49.00</td>
                                    <td>200</td>
                                    <td>4.6 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-center">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leather Wallet</td>
                                    <td>Accessories</td>
                                    <td>$29.99</td>
                                    <td>150</td>
                                    <td>4.3 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-center">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fitness Tracker</td>
                                    <td>Wearables</td>
                                    <td>$89.00</td>
                                    <td>60</td>
                                    <td>4.1 ★</td>
                                    <td><span class="badge badge-label badge-soft-warning">Limited Stock</span></td>
                                    <td class="text-center">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Tables without Borders </h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Add <code>.table-borderless</code> for a table without borders.
                    </p>
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <thead class="align-middle thead-sm">
                                <tr class="text-uppercase fs-xxs">
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th style="width: 1%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bluetooth Speaker</td>
                                    <td>Audio</td>
                                    <td>$49.00</td>
                                    <td>200</td>
                                    <td>4.6 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leather Wallet</td>
                                    <td>Accessories</td>
                                    <td>$29.99</td>
                                    <td>150</td>
                                    <td>4.3 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fitness Tracker</td>
                                    <td>Wearables</td>
                                    <td>$89.00</td>
                                    <td>60</td>
                                    <td>4.1 ★</td>
                                    <td><span class="badge badge-label badge-soft-warning">Limited Stock</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Small Tables </h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Add <code>.table-sm</code> to make any <code>.table</code> more compact by cutting all cell
                        <code>padding</code> in half.
                    </p>
                    <div class="table-responsive">
                        <table class="table table-sm align-middle mb-0">
                            <thead class="align-middle">
                                <tr class="text-uppercase fs-xxs">
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bluetooth Speaker</td>
                                    <td>Audio</td>
                                    <td>$49.00</td>
                                    <td>200</td>
                                    <td>4.6 ★</td>
                                </tr>
                                <tr>
                                    <td>Leather Wallet</td>
                                    <td>Accessories</td>
                                    <td>$29.99</td>
                                    <td>150</td>
                                    <td>4.3 ★</td>
                                </tr>
                                <tr>
                                    <td>Fitness Tracker</td>
                                    <td>Wearables</td>
                                    <td>$89.00</td>
                                    <td>60</td>
                                    <td>4.1 ★</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Table Group Dividers </h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Add a thicker border, darker between table groups—<code>&lt;thead&gt;</code>,
                        <code>&lt;tbody&gt;</code>, and <code>&lt;tfoot&gt;</code>—with <code>.table-group-divider</code>.
                        Customize the color by changing the <code>border-top-color</code> (which we don’t currently provide
                        a utility class for at this time).
                    </p>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="align-middle thead-sm">
                                <tr class="text-uppercase fs-xxs">
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th style="width: 1%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr>
                                    <td>Bluetooth Speaker</td>
                                    <td>Audio</td>
                                    <td>$49.00</td>
                                    <td>200</td>
                                    <td>4.6 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leather Wallet</td>
                                    <td>Accessories</td>
                                    <td>$29.99</td>
                                    <td>150</td>
                                    <td>4.3 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fitness Tracker</td>
                                    <td>Wearables</td>
                                    <td>$89.00</td>
                                    <td>60</td>
                                    <td>4.1 ★</td>
                                    <td><span class="badge badge-label badge-soft-warning">Limited Stock</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Nesting </h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Border styles, active styles, and table variants are not inherited by nested tables.
                    </p>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="align-middle thead-sm">
                                <tr class="text-uppercase fs-xxs">
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th style="width: 1%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Parent Row -->
                                <tr>
                                    <td>Bluetooth Speaker</td>
                                    <td>Audio</td>
                                    <td>$49.00</td>
                                    <td>200</td>
                                    <td>4.6 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#"><i class="ti ti-eye me-1"></i>
                                                    View</a>
                                                <a class="dropdown-item" href="#"><i class="ti ti-edit me-1"></i>
                                                    Edit</a>
                                                <a class="dropdown-item text-danger" href="#"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Nested Row -->
                                <tr>
                                    <td class="p-3" colspan="7">
                                        <table class="table table-sm mb-0">
                                            <thead class="align-middle thead-sm">
                                                <tr class="text-uppercase fs-xxs">
                                                    <th>Variant</th>
                                                    <th>Color</th>
                                                    <th>SKU</th>
                                                    <th>Stock</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Mini</td>
                                                    <td>Black</td>
                                                    <td>SPK-M-BLK</td>
                                                    <td>80</td>
                                                </tr>
                                                <tr>
                                                    <td>Standard</td>
                                                    <td>Blue</td>
                                                    <td>SPK-S-BLU</td>
                                                    <td>120</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <!-- Other parent rows -->
                                <tr>
                                    <td>Leather Wallet</td>
                                    <td>Accessories</td>
                                    <td>$29.99</td>
                                    <td>150</td>
                                    <td>4.3 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#"><i class="ti ti-eye me-1"></i>
                                                    View</a>
                                                <a class="dropdown-item" href="#"><i class="ti ti-edit me-1"></i>
                                                    Edit</a>
                                                <a class="dropdown-item text-danger" href="#"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fitness Tracker</td>
                                    <td>Wearables</td>
                                    <td>$89.00</td>
                                    <td>60</td>
                                    <td>4.1 ★</td>
                                    <td><span class="badge badge-label badge-soft-warning">Limited Stock</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#"><i class="ti ti-eye me-1"></i>
                                                    View</a>
                                                <a class="dropdown-item" href="#"><i class="ti ti-edit me-1"></i>
                                                    Edit</a>
                                                <a class="dropdown-item text-danger" href="#"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Table Head </h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Similar to tables and dark tables, use the modifier classes <code>.table-light</code> or
                        <code>.table-dark</code> to make <code>&lt;thead&gt;</code>s appear light or dark gray.
                    </p>
                    <div class="table-responsive">
                        <table class="table table-custom table-hover align-middle mb-0">
                            <thead class="align-middle table-dark">
                                <tr class="text-uppercase fs-xxs">
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th style="width: 1%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bluetooth Speaker</td>
                                    <td>Audio</td>
                                    <td>$49.00</td>
                                    <td>200</td>
                                    <td>4.6 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leather Wallet</td>
                                    <td>Accessories</td>
                                    <td>$29.99</td>
                                    <td>150</td>
                                    <td>4.3 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fitness Tracker</td>
                                    <td>Wearables</td>
                                    <td>$89.00</td>
                                    <td>60</td>
                                    <td>4.1 ★</td>
                                    <td><span class="badge badge-label badge-soft-warning">Limited Stock</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Captions </h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        A <code>&lt;caption&gt;</code> functions like a heading for a table. It helps users with screen
                        readers to find a table and understand what it’s about and decide if they want to read it.
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <caption>List of Ecommerce Products</caption>
                            <thead class="align-middle thead-sm">
                                <tr class="text-uppercase fs-xxs">
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th style="width: 1%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bluetooth Speaker</td>
                                    <td>Audio</td>
                                    <td>$49.00</td>
                                    <td>200</td>
                                    <td>4.6 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leather Wallet</td>
                                    <td>Accessories</td>
                                    <td>$29.99</td>
                                    <td>150</td>
                                    <td>4.3 ★</td>
                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fitness Tracker</td>
                                    <td>Wearables</td>
                                    <td>$89.00</td>
                                    <td>60</td>
                                    <td>4.1 ★</td>
                                    <td><span class="badge badge-label badge-soft-warning">Limited Stock</span></td>
                                    <td class="text-end">
                                        <div class="dropdown text-muted">
                                            <a aria-expanded="false"
                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                data-bs-toggle="dropdown" href="#">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-eye me-1"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ti ti-edit me-1"></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')
@endsection
