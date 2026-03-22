@extends('layouts.vertical', ['title' => 'Invoice Details'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Invoices', 'title' => 'Invoice Details'])

    <div class="row justify-content-center">
        <div class="col-xxl-12">
            <div class="row">
                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-body px-4">
                            <!-- Invoice Header -->
                            <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
                                <div class="auth-brand mb-0">
                                    <a class="logo-dark" href="{{ route('second', ['dashboard', 'index']) }}">
                                        <img alt="dark logo" height="24" src="/images/logo-black.png" />
                                    </a>
                                    <a class="logo-light" href="{{ route('second', ['dashboard', 'index']) }}">
                                        <img alt="logo" height="24" src="/images/logo.png" />
                                    </a>
                                </div>
                                <div class="text-end">
                                    <span class="badge bg-info-subtle text-info mb-2 fs-xs px-2 py-1">Unpaid</span>
                                    <h4 class="fw-bold text-dark m-0">Invoice #INV-20250805</h4>
                                </div>
                            </div>
                            <!-- Invoice Info -->
                            <div class="row">
                                <!-- From -->
                                <div class="col-4">
                                    <h6 class="text-uppercase text-muted mb-2">From</h6>
                                    <p class="mb-1 fw-semibold">Harper &amp; Co.</p>
                                    <p class="text-muted mb-1">412 Pine Street,<br />Seattle, WA - 98101</p>
                                    <p class="text-muted mb-0">Phone: 206-555-2190</p>
                                    <div class="mt-4">
                                        <h6 class="text-uppercase text-muted">Invoice Date</h6>
                                        <p class="mb-0 fw-medium">05 Aug 2025</p>
                                    </div>
                                </div>
                                <!-- To -->
                                <div class="col-4">
                                    <h6 class="text-uppercase text-muted mb-2">To</h6>
                                    <p class="mb-1 fw-semibold">Olivia Richards</p>
                                    <p class="text-muted mb-1">2310 Ocean View Rd,<br />San Diego, CA - 92109</p>
                                    <p class="text-muted mb-0">Phone: 858-321-5544</p>
                                    <div class="mt-4">
                                        <h6 class="text-uppercase text-muted">Due Date</h6>
                                        <p class="mb-0 fw-medium">20 Aug 2025</p>
                                    </div>
                                </div>
                                <!-- Barcode -->
                                <div class="col-4 text-end">
                                    <img alt="Barcode" class="img-fluid" src="/images/qr.png" style="max-height: 80px;" />
                                </div>
                            </div>
                            <!-- Product Table -->
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered table-nowrap text-center align-middle">
                                    <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                                        <tr class="text-uppercase fs-xxs">
                                            <th style="width: 50px;">#</th>
                                            <th class="text-start">Product Details</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td class="text-start">
                                                <strong>UI/UX Wireframing</strong>
                                                <div class="text-muted small">(Mobile App Design)</div>
                                            </td>
                                            <td>1</td>
                                            <td>$400.00</td>
                                            <td class="text-end">$400.00</td>
                                        </tr>
                                        <tr>
                                            <td>02</td>
                                            <td class="text-start">
                                                <strong>React Dashboard Development</strong>
                                                <div class="text-muted small">(Admin Panel Setup)</div>
                                            </td>
                                            <td>1</td>
                                            <td>$650.00</td>
                                            <td class="text-end">$650.00</td>
                                        </tr>
                                        <tr>
                                            <td>03</td>
                                            <td class="text-start">
                                                <strong>Stripe Integration</strong>
                                                <div class="text-muted small">(Payments &amp; Webhooks)</div>
                                            </td>
                                            <td>1</td>
                                            <td>$150.00</td>
                                            <td class="text-end">$150.00</td>
                                        </tr>
                                        <tr>
                                            <td>04</td>
                                            <td class="text-start">
                                                <strong>SEO Optimization</strong>
                                                <div class="text-muted small">(On-page &amp; Performance)</div>
                                            </td>
                                            <td>1</td>
                                            <td>$200.00</td>
                                            <td class="text-end">$200.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Summary Table -->
                            <div class="d-flex justify-content-end">
                                <table class="table w-auto table-borderless text-end">
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium">Subtotal</td>
                                            <td>$1,400.00</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Shipping</td>
                                            <td>$25.00</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Discount (10%)</td>
                                            <td class="text-danger">- $140.00</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Tax (8%)</td>
                                            <td>$104.00</td>
                                        </tr>
                                        <tr class="border-top pt-2 fs-5 fw-bold">
                                            <td>Total</td>
                                            <td>$1,389.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Note -->
                            <div class="mt-lg-4 mt-2 bg-light bg-opacity-50 rounded px-3 py-2">
                                <p class="mb-0 text-muted">
                                    <strong>Note:</strong> Payment is due within 15 days. For any queries, contact
                                    <a class="fw-medium"
                                        href="mailto:accounts@harperandco.com">accounts@harperandco.com</a>.
                                </p>
                            </div>
                            <!-- Footer -->
                            <div class="mt-4">
                                <p class="fw-semibold mb-3">We appreciate your business!</p>
                                <img alt="Company Signature" height="30" src="/images/sign.png" />
                                <p class="text-muted fs-xxs fst-italic">Authorized Signature</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-9-->
                <div class="col-xl-3 d-print-none">
                    <div class="card card-top-sticky">
                        <div class="card-body">
                            <div class="justify-content-center d-flex flex-column gap-2">
                                <a class="btn btn-light" href="javascript: void(0);"><i class="ti ti-pencil me-1"></i>
                                    Edit</a>
                                <a class="btn btn-primary" href="javascript:window.print()"><i
                                        class="ti ti-printer me-1"></i> Print</a>
                                <a class="btn btn-info" href="javascript: void(0);"><i class="ti ti-download me-1"></i>
                                    Download</a>
                                <a class="btn btn-danger btn-lg" href="javascript: void(0);"><i class="ti ti-send me-1"></i>
                                    Send</a>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-9-->
            </div> <!-- end row-->
        </div> <!-- end col-10-->
    </div> <!-- end row-->
@endsection

@section('scripts')
@endsection
