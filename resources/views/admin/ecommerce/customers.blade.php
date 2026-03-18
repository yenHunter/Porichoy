@extends('layouts.vertical', ['title' => 'Customers'])

@section('css')
@vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Ecommerce', 'title' => 'Customers'])

    <div class="row">
        <div class="col-xxl-12">
            <div class="card" data-table="" data-table-rows-per-page="8">
                <div class="card-header border-light d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div class="d-flex gap-2">
                        <div class="app-search">
                            <input class="form-control" data-table-search="" placeholder="Search customer..."
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
                        <!-- Add New Button -->
                        <a class="btn btn-primary" data-bs-target="#addCustomerModal" data-bs-toggle="modal" href="#!">
                            <i class="fs-sm me-1" data-lucide="plus"></i> Add Customer
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-custom table-centered table-select table-hover w-100 mb-0">
                        <thead class="bg-light bg-opacity-25 thead-sm">
                            <tr class="text-uppercase fs-xxs">
                                <th class="ps-3" style="width: 1%;">
                                    <input class="form-check-input form-check-input-light fs-14 mt-0"
                                        data-table-select-all="" id="select-all-products" type="checkbox" />
                                </th>
                                <th data-table-sort="customer">Clients Name</th>
                                <th data-table-sort="">Email</th>
                                <th data-table-sort="">Phone</th>
                                <th data-table-sort="">Country</th>
                                <th data-table-sort="">Joined</th>
                                <th data-table-sort="">Orders</th>
                                <th data-table-sort="">Total Spends</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead><!-- end table-head -->
                        <tbody>
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14" type="checkbox"
                                        value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-7" class="img-fluid rounded-circle"
                                                src="/images/users/user-7.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="customer" href="{{ route('second', ['users', 'profile']) }}">Carlos
                                                    Méndez</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    carlos@techlaunch.mx
                                </td>
                                <td>+1 (415) 992-3412</td>
                                <td>
                                    <img alt="" class="rounded-circle me-1" height="16"
                                        src="/images/flags/us.svg" /> United States
                                </td>
                                <td>2 Feb, 2024 <small class="text-muted">08:34 AM</small></td>
                                <td>58</td>
                                <td>$198.25</td>
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
                                    <input class="form-check-input form-check-input-light fs-14" type="checkbox"
                                        value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-2" class="img-fluid rounded-circle"
                                                src="/images/users/user-2.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="customer" href="{{ route('second', ['users', 'profile']) }}">Sophie
                                                    Laurent</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    sophie.laurent@eurotech.fr
                                </td>
                                <td>+33 6 12 34 56 78</td>
                                <td>
                                    <img alt="" class="rounded-circle me-1" height="16"
                                        src="/images/flags/fr.svg" /> France
                                </td>
                                <td>15 Mar, 2024 <small class="text-muted">10:22 AM</small></td>
                                <td>42</td>
                                <td>$245.80</td>
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
                                    <input class="form-check-input form-check-input-light fs-14" type="checkbox"
                                        value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-3" class="img-fluid rounded-circle"
                                                src="/images/users/user-3.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="customer" href="{{ route('second', ['users', 'profile']) }}">Akira
                                                    Tanaka</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    akira.tanaka@techjapan.co.jp
                                </td>
                                <td>+81 90-1234-5678</td>
                                <td>
                                    <img alt="" class="rounded-circle me-1" height="16"
                                        src="/images/flags/jp.svg" /> Japan
                                </td>
                                <td>28 Jan, 2024 <small class="text-muted">03:15 PM</small></td>
                                <td>75</td>
                                <td>$320.50</td>
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
                                    <input class="form-check-input form-check-input-light fs-14" type="checkbox"
                                        value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-4" class="img-fluid rounded-circle"
                                                src="/images/users/user-4.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="customer" href="{{ route('second', ['users', 'profile']) }}">Emma
                                                    Watson</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    emma.watson@britinnovate.uk
                                </td>
                                <td>+44 7700 900123</td>
                                <td>
                                    <img alt="" class="rounded-circle me-1" height="16"
                                        src="/images/flags/gb.svg" /> United Kingdom
                                </td>
                                <td>10 Apr, 2024 <small class="text-muted">09:47 AM</small></td>
                                <td>29</td>
                                <td>$175.30</td>
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
                                    <input class="form-check-input form-check-input-light fs-14" type="checkbox"
                                        value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-5" class="img-fluid rounded-circle"
                                                src="/images/users/user-5.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="customer" href="{{ route('second', ['users', 'profile']) }}">Lucas
                                                    Schmidt</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    lucas.schmidt@techdeutsch.de
                                </td>
                                <td>+49 151 23456789</td>
                                <td>
                                    <img alt="" class="rounded-circle me-1" height="16"
                                        src="/images/flags/de.svg" /> Germany
                                </td>
                                <td>20 Feb, 2024 <small class="text-muted">02:10 PM</small></td>
                                <td>63</td>
                                <td>$280.75</td>
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
                                    <input class="form-check-input form-check-input-light fs-14" type="checkbox"
                                        value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-6" class="img-fluid rounded-circle"
                                                src="/images/users/user-6.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="customer" href="{{ route('second', ['users', 'profile']) }}">Isabella
                                                    Rossi</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    isabella.rossi@italiatech.it
                                </td>
                                <td>+39 333 4567890</td>
                                <td>
                                    <img alt="" class="rounded-circle me-1" height="16"
                                        src="/images/flags/it.svg" /> Italy
                                </td>
                                <td>5 Mar, 2024 <small class="text-muted">11:25 AM</small></td>
                                <td>51</td>
                                <td>$210.40</td>
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
                                    <input class="form-check-input form-check-input-light fs-14" type="checkbox"
                                        value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-8" class="img-fluid rounded-circle"
                                                src="/images/users/user-8.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="customer" href="{{ route('second', ['users', 'profile']) }}">Mateo
                                                    Vargas</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    mateo.vargas@latamtech.ar
                                </td>
                                <td>+54 9 11 2345 6789</td>
                                <td>
                                    <img alt="" class="rounded-circle me-1" height="16"
                                        src="/images/flags/ar.svg" /> Argentina
                                </td>
                                <td>18 Apr, 2024 <small class="text-muted">04:50 PM</small></td>
                                <td>37</td>
                                <td>$190.20</td>
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
                                    <input class="form-check-input form-check-input-light fs-14" type="checkbox"
                                        value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-9" class="img-fluid rounded-circle"
                                                src="/images/users/user-9.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="customer" href="{{ route('second', ['users', 'profile']) }}">Priya
                                                    Sharma</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    priya.sharma@indotech.in
                                </td>
                                <td>+91 98765 43210</td>
                                <td>
                                    <img alt="" class="rounded-circle me-1" height="16"
                                        src="/images/flags/in.svg" /> India
                                </td>
                                <td>10 Jan, 2024 <small class="text-muted">06:30 AM</small></td>
                                <td>82</td>
                                <td>$350.90</td>
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
                                    <input class="form-check-input form-check-input-light fs-14" type="checkbox"
                                        value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-10" class="img-fluid rounded-circle"
                                                src="/images/users/user-10.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="customer" href="{{ route('second', ['users', 'profile']) }}">Liam
                                                    O’Connor</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    liam.oconnor@ausinnovate.au
                                </td>
                                <td>+61 400 123 456</td>
                                <td>
                                    <img alt="" class="rounded-circle me-1" height="16"
                                        src="/images/flags/au.svg" /> Australia
                                </td>
                                <td>25 Mar, 2024 <small class="text-muted">01:15 PM</small></td>
                                <td>45</td>
                                <td>$230.65</td>
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
                                    <input class="form-check-input form-check-input-light fs-14" type="checkbox"
                                        value="option" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <img alt="avatar-1" class="img-fluid rounded-circle"
                                                src="/images/users/user-1.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="mb-0">
                                                <a class="link-reset" data-sort="customer" href="{{ route('second', ['users', 'profile']) }}">Olga
                                                    Petrova</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    olga.petrova@rus-tech.ru
                                </td>
                                <td>+7 912 345 67 89</td>
                                <td>
                                    <img alt="" class="rounded-circle me-1" height="16"
                                        src="/images/flags/ru.svg" /> Russia
                                </td>
                                <td>8 Feb, 2024 <small class="text-muted">07:40 AM</small></td>
                                <td>68</td>
                                <td>$295.15</td>
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
                        </tbody><!-- end table-body -->
                    </table><!-- end table -->
                </div>
                <div class="card-footer border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div data-table-pagination-info="customers"></div>
                        <div data-table-pagination=""></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <!-- Add New Customer Modal -->
    <div aria-hidden="true" aria-labelledby="addCustomerModalLabel" class="modal fade" id="addCustomerModal"
        tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Add New Customer</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <form id="addCustomerForm">
                    <div class="modal-body">
                        <div class="row g-3">
                            <!-- Full Name -->
                            <div class="col-md-6">
                                <label class="form-label" for="customerName">Full Name</label>
                                <input class="form-control" id="customerName" placeholder="e.g. Carlos Méndez"
                                    required="" type="text" />
                            </div>
                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label" for="customerEmail">Email</label>
                                <input class="form-control" id="customerEmail" placeholder="e.g. carlos@domain.com"
                                    required="" type="email" />
                            </div>
                            <!-- Phone -->
                            <div class="col-md-6">
                                <label class="form-label" for="customerPhone">Phone</label>
                                <input class="form-control" id="customerPhone" placeholder="+1 (415) 992-3412"
                                    required="" type="tel" />
                            </div>
                            <!-- Country -->
                            <div class="col-md-6">
                                <label class="form-label" for="customerCountry">Country</label>
                                <select class="form-select" id="customerCountry" required="">
                                    <option value="">Select Country</option>
                                    <option value="United States">🇺🇸 United States</option>
                                    <option value="Canada">🇨🇦 Canada</option>
                                    <option value="United Kingdom">🇬🇧 United Kingdom</option>
                                    <option value="India">🇮🇳 India</option>
                                    <!-- Add more countries as needed -->
                                </select>
                            </div>
                            <!-- Avatar Upload -->
                            <div class="col-md-6">
                                <label class="form-label" for="customerAvatar">Avatar</label>
                                <input accept="image/*" class="form-control" id="customerAvatar" type="file" />
                            </div>
                            <!-- Joined Date -->
                            <div class="col-md-6">
                                <label class="form-label" for="joinedDate">Join Date</label>
                                <input class="form-control" data-date-format="d M, Y" data-provider="flatpickr"
                                    id="joinedDate" required="" type="date" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button>
                        <button class="btn btn-primary" type="submit">Add Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/custom-table.js'])
@endsection
