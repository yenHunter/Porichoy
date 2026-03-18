@extends('layouts.vertical', ['title' => 'Order Details'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Ecommerce', 'title' => 'Order Details'])

    <div class="row">
        <div class="col-xxl-12">
            <div class="row">
                <!-- Project Main Details -->
                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-header align-items-start p-4">
                            <div>
                                <h3 class="mb-1 d-flex fs-xl align-items-center">Order #WB20100</h3>
                                <p class="text-muted mb-3"><i class="ti ti-calendar"></i> 24 Apr, 2025 <small
                                        class="text-muted">10:10 AM</small></p>
                                <span class="badge badge-soft-success fs-xxs badge-label"><i
                                        class="ti ti-point-filled align-middle fs-sm"></i> Paid</span>
                                <span class="badge badge-soft-info fs-xxs badge-label"><i
                                        class="ti ti-truck align-middle fs-sm"></i> Shipped</span>
                            </div>
                            <div class="ms-auto">
                                <a class="btn btn-light" href="javascript: void(0);"><i class="ti ti-pencil me-1"></i>
                                    Modify</a>
                                <a class="btn btn-danger" href="javascript: void(0);"><i class="ti ti-trash me-1"></i>
                                    Delete</a>
                            </div>
                        </div>
                        <div class="card-body px-4">
                            <h4 class="fs-sm mb-3">Order Summary</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-custom table-nowrap align-middle mb-1">
                                    <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                                        <tr class="text-uppercase fs-xxs">
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>QTY</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Product 1 -->
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="avatar-md me-3">
                                                        <img alt="Wireless Earbuds" class="img-fluid rounded"
                                                            src="/images/products/1.png" />
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-0">
                                                            <a class="link-reset"
                                                                href="{{ route('second', ['ecommerce', 'product-details']) }}">Wireless
                                                                Earbuds</a>
                                                        </h5>
                                                        <p class="text-muted mb-0 fs-xs">by: My Furniture</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$79.99</td>
                                            <td>2</td>
                                            <td class="text-end">$159.98</td>
                                        </tr>
                                        <!-- Product 2 -->
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="avatar-md me-3">
                                                        <img alt="Smart Watch" class="img-fluid rounded"
                                                            src="/images/products/2.png" />
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-0">
                                                            <a class="link-reset"
                                                                href="{{ route('second', ['ecommerce', 'product-details']) }}">Smart
                                                                Watch</a>
                                                        </h5>
                                                        <p class="text-muted mb-0 fs-xs">by: Tech World</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$199.00</td>
                                            <td>1</td>
                                            <td class="text-end">$199.00</td>
                                        </tr>
                                        <!-- Product 3 -->
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="avatar-md me-3">
                                                        <img alt="Gaming Mouse" class="img-fluid rounded"
                                                            src="/images/products/3.png" />
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-0">
                                                            <a class="link-reset"
                                                                href="{{ route('second', ['ecommerce', 'product-details']) }}">Gaming
                                                                Funkey Shoes</a>
                                                        </h5>
                                                        <p class="text-muted mb-0 fs-xs">by: Pro Gamerz</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$49.50</td>
                                            <td>3</td>
                                            <td class="text-end">$148.50</td>
                                        </tr>
                                        <!-- Subtotal -->
                                        <tr class="border-top">
                                            <td class="text-end fw-semibold" colspan="3">Subtotal</td>
                                            <td class="text-end">$507.48</td>
                                        </tr>
                                        <!-- Tax -->
                                        <tr>
                                            <td class="text-end fw-semibold" colspan="3">Tax (10%)</td>
                                            <td class="text-end">$50.75</td>
                                        </tr>
                                        <!-- Discount -->
                                        <tr>
                                            <td class="text-end fw-semibold" colspan="3">Discount (5%)</td>
                                            <td class="text-end text-danger fw-semibold">-$25.37</td>
                                        </tr>
                                        <!-- Shipping -->
                                        <tr>
                                            <td class="text-end fw-semibold" colspan="3">Shipping fee</td>
                                            <td class="text-end">$10.00</td>
                                        </tr>
                                        <!-- Grand Total -->
                                        <tr class="border-top">
                                            <td class="text-end fw-bold text-uppercase" colspan="3">Grand Total</td>
                                            <td class="fw-bold text-end table-active">$543.86</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Shipping Activity</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="timeline">
                                <!-- Event 1 -->
                                <div class="timeline-item d-flex align-items-stretch">
                                    <div class="timeline-time pe-3 text-muted"></div>
                                    <div class="timeline-dot bg-light"></div>
                                    <div class="timeline-content ps-3 pb-5">
                                        <h5 class="mb-1">Pending Delivery</h5>
                                        <p class="mb-1 text-muted">The package is out for delivery and will reach you
                                            shortly.</p>
                                        <p class="mb-1 text-muted fs-xxs">Tracking No: <a
                                                class="link-primary fw-semibold text-decoration-underline"
                                                href="#!">TRK123456789</a></p>
                                        <span class="fw-semibold fs-xxs">By Delivery Agent</span>
                                    </div>
                                </div>
                                <!-- Event 2 -->
                                <div class="timeline-item d-flex align-items-stretch">
                                    <div class="timeline-time pe-3 text-muted">Today, 9:00 AM</div>
                                    <div class="timeline-dot bg-success"></div>
                                    <div class="timeline-content ps-3 pb-5">
                                        <h5 class="mb-1">Out for Delivery</h5>
                                        <p class="mb-1 text-muted">Courier picked up the package for final delivery.</p>
                                        <p class="mb-1 text-muted fs-xxs">Tracking No: <a
                                                class="link-primary fw-semibold text-decoration-underline"
                                                href="#!">TRK123456789</a></p>
                                        <span class="fs-xxs fw-semibold">By Local Courier</span>
                                    </div>
                                </div>
                                <!-- Event 3 -->
                                <div class="timeline-item d-flex align-items-stretch">
                                    <div class="timeline-time pe-3 text-muted">Yesterday, 3:15 PM</div>
                                    <div class="timeline-dot bg-success"></div>
                                    <div class="timeline-content ps-3 pb-5">
                                        <h5 class="mb-1">Arrived at Local Hub</h5>
                                        <p class="mb-1 text-muted">Shipment arrived at the nearest delivery center.</p>
                                        <p class="mb-1 text-muted fs-xxs">Tracking No: <a
                                                class="link-primary fw-semibold text-decoration-underline"
                                                href="#!">TRK123456789</a></p>
                                        <span class="fs-xxs fw-semibold">By Sorting Facility</span>
                                    </div>
                                </div>
                                <!-- Event 4 -->
                                <div class="timeline-item d-flex align-items-stretch">
                                    <div class="timeline-time pe-3 text-muted">Monday, 6:00 PM</div>
                                    <div class="timeline-dot bg-success"></div>
                                    <div class="timeline-content ps-3 pb-5">
                                        <h5 class="mb-1">Departed Transit Facility</h5>
                                        <p class="mb-1 text-muted">Package left the main transit facility and is en route
                                            to the local hub.</p>
                                        <p class="mb-1 text-muted fs-xxs">Tracking No: <a
                                                class="link-primary fw-semibold text-decoration-underline"
                                                href="#!">TRK123456789</a></p>
                                        <span class="fs-xxs fw-semibold">By Central Logistics</span>
                                    </div>
                                </div>
                                <!-- Event 5 -->
                                <div class="timeline-item d-flex align-items-stretch">
                                    <div class="timeline-time pe-3 text-muted">Monday, 8:00 AM</div>
                                    <div class="timeline-dot bg-success"></div>
                                    <div class="timeline-content ps-3 pb-5">
                                        <h5 class="mb-1">Arrived at Transit Facility</h5>
                                        <p class="mb-1 text-muted">Package arrived at the central distribution hub for
                                            processing.</p>
                                        <p class="mb-1 text-muted fs-xxs">Tracking No: <a
                                                class="link-primary fw-semibold text-decoration-underline"
                                                href="#!">TRK123456789</a></p>
                                        <span class="fs-xxs fw-semibold">By Transit Center</span>
                                    </div>
                                </div>
                                <!-- Event 6 -->
                                <div class="timeline-item d-flex align-items-stretch">
                                    <div class="timeline-time pe-3 text-muted">Last Saturday, 2:00 PM</div>
                                    <div class="timeline-dot bg-success"></div>
                                    <div class="timeline-content ps-3 pb-5">
                                        <h5 class="mb-1">Dispatched from Warehouse</h5>
                                        <p class="mb-1 text-muted">Package was picked up and dispatched by carrier from
                                            warehouse.</p>
                                        <p class="mb-1 text-muted fs-xxs">Tracking No: <a
                                                class="link-primary fw-semibold text-decoration-underline"
                                                href="#!">TRK123456789</a></p>
                                        <span class="fs-xxs fw-semibold">By Fulfillment Center</span>
                                    </div>
                                </div>
                                <!-- Event 7 -->
                                <div class="timeline-item d-flex align-items-stretch">
                                    <div class="timeline-time pe-3 text-muted">Last Friday, 5:00 PM</div>
                                    <div class="timeline-dot bg-success"></div>
                                    <div class="timeline-content ps-3">
                                        <h5 class="mb-1">Order Confirmed</h5>
                                        <p class="mb-1 text-muted">The order was successfully placed and is now being
                                            processed.</p>
                                        <p class="mb-1 text-muted fs-xxs">Tracking No: <a
                                                class="link-primary fw-semibold text-decoration-underline"
                                                href="#!">TRK123456789</a></p>
                                        <span class="fs-xxs fw-semibold">By Order System</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-xl-9 -->
                <!-- Sidebar -->
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-header justify-content-between border-dashed">
                            <h4 class="card-title">Customer Details</h4>
                            <a class="btn btn-default btn-sm btn-icon rounded-circle" href="#!"><i
                                    class="ti ti-pencil fs-lg"></i></a>
                        </div> <!-- end card-header-->
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-2">
                                    <img alt="avatar" class="rounded-circle avatar-lg"
                                        src="/images/users/user-5.jpg" />
                                </div>
                                <div>
                                    <h5 class="mb-1 d-flex align-items-center">
                                        <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Sophia Carter</a>
                                        <img alt="UK" class="ms-2 rounded-circle" height="16"
                                            src="/images/flags/gb.svg" />
                                    </h5>
                                    <p class="text-muted mb-0">Since 2020</p>
                                </div>
                                <div class="ms-auto">
                                    <div class="dropdown">
                                        <a class="btn btn-icon btn-ghost-light text-muted" data-bs-toggle="dropdown"
                                            href="#">
                                            <i class="ti ti-dots-vertical fs-xl"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i
                                                        class="ti ti-share me-2"></i>Share</a></li>
                                            <li><a class="dropdown-item" href="#"><i
                                                        class="ti ti-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i
                                                        class="ti ti-ban me-2"></i>Block</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i
                                                        class="ti ti-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-unstyled text-muted mb-0">
                                <li class="mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-xs avatar-img-size fs-24">
                                            <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                                <i class="ti ti-mail"></i>
                                            </span>
                                        </div>
                                        <h5 class="fs-base mb-0 fw-medium"><a class="link-reset"
                                                href="#">sophia@designhub.com</a></h5>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-xs avatar-img-size fs-24">
                                            <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                                <i class="ti ti-phone"></i>
                                            </span>
                                        </div>
                                        <h5 class="fs-base mb-0 fw-medium"><a class="link-reset" href="#">+44 7911
                                                123456</a></h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-xs avatar-img-size fs-24">
                                            <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                                <i class="ti ti-map-pin"></i>
                                            </span>
                                        </div>
                                        <h5 class="fs-base mb-0 fw-medium">London, UK</h5>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                    <div class="card">
                        <div class="card-header justify-content-between border-dashed">
                            <h4 class="card-title">Shipping Address</h4>
                            <a class="btn btn-default btn-sm btn-icon rounded-circle" href="#!"><i
                                    class="ti ti-pencil fs-lg"></i></a>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <iframe
                                src="https://www.google.com/maps/embed/v1/place?q=New+York+University&amp;key=AIzaSyBSFRN6WWGYwmFi498qXXsD2UwkbmD74v4"
                                style="width: 100%; height: 180px; overflow:hidden; border:0;"></iframe>
                            <div class="d-flex align-items-start my-3">
                                <div class="flex-grow-1">
                                    <h5 class="mb-2">John Doe</h5>
                                    <p class="text-muted mb-1">
                                        1234 Elm Street,<br />
                                        Apt 567,<br />
                                        Springfield, IL 62704,<br />
                                        United States
                                    </p>
                                    <p class="mb-0 text-muted">
                                        <strong>Phone:</strong> (123) 456-7890<br />
                                        <strong>Email:</strong> john.doe@example.com
                                    </p>
                                </div>
                                <div class="ms-auto">
                                    <span class="badge bg-success-subtle text-success">Primary Address</span>
                                </div>
                            </div>
                            <div class="alert alert-warning mb-0">
                                <h6 class="mb-2">Delivery Instructions:</h6>
                                <p class="fst-italic mb-0">Please leave the package at the front door if no one is home.
                                    Call upon arrival.</p>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                    <div class="card">
                        <div class="card-header justify-content-between border-dashed">
                            <h4 class="card-title">Billing Details</h4>
                            <a class="btn btn-default btn-sm btn-icon rounded-circle" href="#!"><i
                                    class="ti ti-pencil fs-lg"></i></a>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <!-- Billing Address -->
                            <div class="d-flex align-items-start mb-0">
                                <div class="flex-grow-1">
                                    <h5 class="mb-2">John Doe</h5>
                                    <p class="text-muted mb-0">
                                        5678 Oak Avenue,<br />
                                        Suite 101,<br />
                                        Chicago, IL 60611,<br />
                                        United States
                                    </p>
                                </div>
                                <div class="ms-auto">
                                    <span class="badge bg-primary-subtle text-primary">Billing Address</span>
                                </div>
                            </div>
                            <hr />
                            <!-- Card Details -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm me-2">
                                    <img alt="Mastercard" class="img-fluid rounded" src="/images/cards/mastercard.svg" />
                                </div>
                                <div>
                                    <h5 class="fs-xs mb-1">Mastercard Ending in 4242</h5>
                                    <p class="text-muted mb-0 fs-xs">Expiry: 08/26</p>
                                </div>
                                <div class="ms-auto">
                                    <span class="badge bg-success-subtle text-success">Paid</span>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col-xl-3 -->
            </div> <!-- end row -->
        </div> <!-- end col-xxl-10 -->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
