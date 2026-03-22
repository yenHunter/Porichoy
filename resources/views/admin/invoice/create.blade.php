@extends('layouts.vertical', ['title' => 'Create Invoice'])

@section('css')
    @vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Invoices', 'title' => 'Create Invoice'])

    <div class="row justify-content-center">
        <div class="col-xxl-12">
            <div class="row">
                <div class="col-xl-9">
                    <div class="card">
                        <form>
                            <div class="card-body p-4">
                                <!-- Invoice Header with Currency Selector -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <!-- Logo Upload -->
                                    <div class="border rounded position-relative d-flex text-center align-items-center justify-content-between px-2"
                                        style="height: 60px; width: 260px;">
                                        <label class="position-absolute top-0 start-0 end-0 bottom-0"
                                            for="invoiceLogo"></label>
                                        <input accept="image/*" class="d-none" id="invoiceLogo"
                                            onchange="previewImage(event)" type="file" />
                                        <img alt="Company Logo" height="28" id="preview"
                                            src="/images/logo-black.png" />
                                        <i class="ti ti-upload fs-xxl text-muted" role="button"></i>
                                    </div>
                                    <!-- Invoice Number + Currency -->
                                    <div class="text-end">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-auto">
                                                <label class="form-label fw-semibold" for="invoiceNumber">Invoice #</label>
                                                <input class="form-control" id="invoiceNumber" placeholder="e.g. INV-0001"
                                                    type="text" />
                                            </div>
                                            <div class="col-auto">
                                                <label class="form-label fw-semibold" for="currency">Currency</label>
                                                <select class="form-select" id="currency">
                                                    <option selected="" value="USD">USD ($)</option>
                                                    <option value="EUR">EUR (€)</option>
                                                    <option value="GBP">GBP (£)</option>
                                                    <option value="INR">INR (₹)</option>
                                                    <option value="JPY">JPY (¥)</option>
                                                    <option value="AUD">AUD (A$)</option>
                                                    <option value="CAD">CAD (C$)</option>
                                                    <option value="CNY">CNY (¥)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Dates & Payment -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label" for="invoiceDate">Invoice Date</label>
                                        <input class="form-control" data-date-format="d M, Y" data-provider="flatpickr"
                                            id="invoiceDate" placeholder="Select Date" type="text" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="dueDate">Due Date</label>
                                        <input class="form-control" data-date-format="d M, Y" data-provider="flatpickr"
                                            id="dueDate" placeholder="Select Date" type="text" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="paymentMethod">Payment Method</label>
                                        <select class="form-select" id="paymentMethod">
                                            <option value="">Select</option>
                                            <option>Credit / Debit Card</option>
                                            <option>Bank Transfer</option>
                                            <option>PayPal</option>
                                            <option>UPI (GPay)</option>
                                            <option>Cash</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Billing and Shipping -->
                                <div class="row mt-4">
                                    <!-- Billing -->
                                    <div class="col-md-6">
                                        <label class="form-label">Billing Address</label>
                                        <input class="form-control mb-2" placeholder="Name" type="text" />
                                        <textarea class="form-control mb-2" placeholder="Address" rows="3"></textarea>
                                        <div class="input-group">
                                            <select class="form-select" style="max-width: 120px;">
                                                <option value="+1">+1 (US)</option>
                                                <option selected="" value="+44">+44 (UK)</option>
                                                <option value="+91">+91 (IN)</option>
                                                <option value="+61">+61 (AU)</option>
                                                <option value="+971">+971 (UAE)</option>
                                                <!-- Add more as needed -->
                                            </select>
                                            <input class="form-control" placeholder="Phone Number" type="text" />
                                        </div>
                                    </div>
                                    <!-- Shipping -->
                                    <div class="col-md-6">
                                        <label class="form-label">Shipping Address</label>
                                        <input class="form-control mb-2" placeholder="Name" type="text" />
                                        <textarea class="form-control mb-2" placeholder="Address" rows="3"></textarea>
                                        <div class="input-group">
                                            <select class="form-select" style="max-width: 120px;">
                                                <option value="+1">+1 (US)</option>
                                                <option selected="" value="+44">+44 (UK)</option>
                                                <option value="+91">+91 (IN)</option>
                                                <option value="+61">+61 (AU)</option>
                                                <option value="+971">+971 (UAE)</option>
                                                <!-- Add more as needed -->
                                            </select>
                                            <input class="form-control" placeholder="Phone Number" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Table -->
                                <div class="table-responsive mt-4">
                                    <table class="table table-bordered table-nowrap text-center align-middle">
                                        <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                                            <tr class="text-uppercase fs-xxs">
                                                <th>#</th>
                                                <th class="text-start">Item Description</th>
                                                <th>Qty</th>
                                                <th>Unit Price</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="invoice-items">
                                            <tr>
                                                <td>1</td>
                                                <td><input class="form-control" placeholder="Description"
                                                        type="text" /></td>
                                                <td><input class="form-control" placeholder="1" type="number" /></td>
                                                <td><input class="form-control" placeholder="0.00" type="number" /></td>
                                                <td><input class="form-control" placeholder="0.00" type="number" /></td>
                                                <td><button class="btn btn-sm btn-danger" type="button">×</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-primary mt-2" type="button"><i class="ti ti-plus"></i> Add
                                        Item</button>
                                </div>
                                <!-- Totals -->
                                <div class="row justify-content-end mt-4">
                                    <div class="col-md-4">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td class="text-end">Subtotal</td>
                                                <td><input class="form-control" id="subtotal" placeholder="0.00"
                                                        type="number" /></td>
                                            </tr>
                                            <tr>
                                                <td class="text-end">Tax (%)</td>
                                                <td><input class="form-control" id="tax" placeholder="0.00"
                                                        type="number" /></td>
                                            </tr>
                                            <tr>
                                                <td class="text-end">Discount</td>
                                                <td><input class="form-control" id="discount" placeholder="0.00"
                                                        type="number" /></td>
                                            </tr>
                                            <tr class="fw-bold">
                                                <td class="text-end">Total</td>
                                                <td><input class="form-control" id="total" placeholder="0.00"
                                                        readonly="" type="number" /></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- Notes -->
                                <div class="mt-4">
                                    <label class="form-label" for="invoiceNote">Additional Notes</label>
                                    <textarea class="form-control" id="invoiceNote" placeholder="e.g. Thank you for your business!" rows="3"></textarea>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-->
                </div> <!-- end col-9-->
                <div class="col-xl-3 d-print-none">
                    <div class="card card-top-sticky">
                        <div class="card-body">
                            <div class="justify-content-center d-flex flex-column gap-2">
                                <a class="btn btn-light" href="javascript: void(0);"><i class="ti ti-eye me-1"></i>
                                    Preview</a>
                                <a class="btn btn-light" href="javascript: void(0);"><i class="ti ti-download me-1"></i>
                                    Download</a>
                                <a class="btn btn-danger btn-lg" href="javascript: void(0);"><i
                                        class="ti ti-send me-1"></i> Send</a>
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
