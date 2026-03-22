@extends('layouts.vertical', ['title' => 'CRM Customers'])

@section('css')
@vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'CRM', 'title' => 'Customers'])

    <div class="row">
        <div class="col-12">
            <div class="card" data-table="" data-table-rows-per-page="8">
                <div class="card-header border-light justify-content-between">
                    <div class="d-flex gap-2">
                        <div class="app-search">
                            <input class="form-control" data-table-search="" placeholder="Search clients..." type="text" />
                            <i class="app-search-icon text-muted" data-lucide="search"></i>
                        </div>
                        <button class="btn btn-primary" data-bs-target="#addCustomerModal" data-bs-toggle="modal">
                            <i class="ti ti-plus me-1"></i> New Customer
                        </button>
                        <button class="btn btn-danger d-none" data-table-delete-selected="">Delete</button>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="me-2 fw-semibold">Filter By:</span>
                        <!-- Country Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="country">
                                <option value="All">Country</option>
                                <option value="US">United States</option>
                                <option value="UK">United Kingdom</option>
                                <option value="BR">Brazil</option>
                                <option value="DE">Germany</option>
                                <option value="JP">Japan</option>
                                <option value="FR">France</option>
                                <option value="IN">India</option>
                                <option value="EG">Egypt</option>
                                <option value="CA">Canada</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="globe"></i>
                        </div>
                        <!-- Status Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="status">
                                <option value="">Account Status</option>
                                <option value="Active">Active</option>
                                <option value="Verification Pending">Verification Pending</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Blocked">Blocked</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="shuffle"></i>
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
                        <thead class="bg-light bg-opacity-25 thead-sm">
                            <tr class="text-uppercase fs-xxs">
                                <th scope="col" style="width: 1%;">
                                    <input class="form-check-input form-check-input-light fs-14 mt-0"
                                        data-table-select-all="" id="checkAll" type="checkbox" value="option" />
                                </th>
                                <th data-table-sort="name">Customer Name</th>
                                <th data-table-sort="">Phone</th>
                                <th data-column="country" data-table-sort="">Country</th>
                                <th data-table-sort="">Joined</th>
                                <th data-table-sort="">Type</th>
                                <th data-table-sort="">Company</th>
                                <th data-column="status" data-table-sort="">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm"><img alt="" class="img-fluid rounded-circle"
                                                src="/images/users/user-2.jpg" /></div>
                                        <div>
                                            <h5 class="mb-0 lh-base fs-base"><a class="link-reset"
                                                    href="{{ route('second', ['users', 'profile']) }}">Michael Thompson</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">michael@breezetech.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>+44 7911 123456</td>
                                <td><span class="badge p-1 text-bg-light fs-sm"><img class="rounded-circle me-1"
                                            height="12" src="/images/flags/gb.svg" /> UK</span></td>
                                <td>Jan 15, 2024</td>
                                <td>Lead</td>
                                <td>BreezeTech Ltd.</td>
                                <td><span class="badge bg-warning-subtle text-warning badge-label">Verification
                                        Pending</span></td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm"><img alt=""
                                                class="img-fluid rounded-circle" src="/images/users/user-3.jpg" /></div>
                                        <div>
                                            <h5 class="mb-0 lh-base fs-base"><a class="link-reset"
                                                    href="{{ route('second', ['users', 'profile']) }}">Sara Mitchell</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">sara@novasoft.io</p>
                                        </div>
                                    </div>
                                </td>
                                <td>+1 (646) 555-7788</td>
                                <td><span class="badge p-1 text-bg-light fs-sm"><img class="rounded-circle me-1"
                                            height="12" src="/images/flags/us.svg" /> US</span></td>
                                <td>Feb 1, 2024</td>
                                <td>Prospect</td>
                                <td>NovaSoft</td>
                                <td><span class="badge bg-success-subtle text-success badge-label">Active</span></td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm"><img alt=""
                                                class="img-fluid rounded-circle" src="/images/users/user-4.jpg" /></div>
                                        <div>
                                            <h5 class="mb-0 lh-base fs-base"><a class="link-reset"
                                                    href="{{ route('second', ['users', 'profile']) }}">Ravi Deshmukh</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">ravi@infraview.in</p>
                                        </div>
                                    </div>
                                </td>
                                <td>+91 98765 43210</td>
                                <td><span class="badge p-1 text-bg-light fs-sm"><img class="rounded-circle me-1"
                                            height="12" src="/images/flags/in.svg" /> IN</span></td>
                                <td>Mar 10, 2024</td>
                                <td>Client</td>
                                <td>InfraView Pvt. Ltd.</td>
                                <td><span class="badge bg-secondary-subtle text-secondary badge-label">Inactive</span></td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm"><img alt=""
                                                class="img-fluid rounded-circle" src="/images/users/user-5.jpg" /></div>
                                        <div>
                                            <h5 class="mb-0 lh-base fs-base"><a class="link-reset"
                                                    href="{{ route('second', ['users', 'profile']) }}">Laura Kim</a></h5>
                                            <p class="text-muted fs-xs mb-0">laura.kim@pixelhive.co</p>
                                        </div>
                                    </div>
                                </td>
                                <td>+82 10-1234-5678</td>
                                <td><span class="badge p-1 text-bg-light fs-sm"><img class="rounded-circle me-1"
                                            height="12" src="/images/flags/kr.svg" /> KR</span></td>
                                <td>Dec 20, 2023</td>
                                <td>Client</td>
                                <td>PixelHive Co.</td>
                                <td><span class="badge bg-danger-subtle text-danger badge-label">Blocked</span></td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm"><img alt=""
                                                class="img-fluid rounded-circle" src="/images/users/user-6.jpg" /></div>
                                        <div>
                                            <h5 class="mb-0 lh-base fs-base"><a class="link-reset"
                                                    href="{{ route('second', ['users', 'profile']) }}">Jean Dupont</a></h5>
                                            <p class="text-muted fs-xs mb-0">jean@parispro.fr</p>
                                        </div>
                                    </div>
                                </td>
                                <td>+33 6 12 34 56 78</td>
                                <td><span class="badge p-1 text-bg-light fs-sm"><img class="rounded-circle me-1"
                                            height="12" src="/images/flags/fr.svg" /> FR</span></td>
                                <td>Apr 5, 2024</td>
                                <td>Prospect</td>
                                <td>ParisPro SARL</td>
                                <td><span class="badge bg-warning-subtle text-warning badge-label">Verification
                                        Pending</span></td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm"><img alt=""
                                                class="img-fluid rounded-circle" src="/images/users/user-7.jpg" /></div>
                                        <div>
                                            <h5 class="mb-0 lh-base fs-base"><a class="link-reset"
                                                    href="{{ route('second', ['users', 'profile']) }}">Amanda Rivera</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">amanda@brightlabs.io</p>
                                        </div>
                                    </div>
                                </td>
                                <td>+1 (213) 555-0192</td>
                                <td><span class="badge p-1 text-bg-light fs-sm"><img class="rounded-circle me-1"
                                            height="12" src="/images/flags/us.svg" /> US</span></td>
                                <td>Mar 25, 2024</td>
                                <td>Client</td>
                                <td>BrightLabs Inc.</td>
                                <td><span class="badge bg-success-subtle text-success badge-label">Active</span></td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm"><img alt=""
                                                class="img-fluid rounded-circle" src="/images/users/user-8.jpg" /></div>
                                        <div>
                                            <h5 class="mb-0 lh-base fs-base"><a class="link-reset"
                                                    href="{{ route('second', ['users', 'profile']) }}">Carlos Mendes</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">carlos@globalreach.br</p>
                                        </div>
                                    </div>
                                </td>
                                <td>+55 11 91234-5678</td>
                                <td><span class="badge p-1 text-bg-light fs-sm"><img class="rounded-circle me-1"
                                            height="12" src="/images/flags/br.svg" /> BR</span></td>
                                <td>Feb 18, 2024</td>
                                <td>Prospect</td>
                                <td>GlobalReach Ltd.</td>
                                <td><span class="badge bg-warning-subtle text-warning badge-label">Verification
                                        Pending</span></td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm"><img alt=""
                                                class="img-fluid rounded-circle" src="/images/users/user-9.jpg" /></div>
                                        <div>
                                            <h5 class="mb-0 lh-base fs-base"><a class="link-reset"
                                                    href="{{ route('second', ['users', 'profile']) }}">Lena Hoffmann</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">lena@webnord.de</p>
                                        </div>
                                    </div>
                                </td>
                                <td>+49 176 12345678</td>
                                <td><span class="badge p-1 text-bg-light fs-sm"><img class="rounded-circle me-1"
                                            height="12" src="/images/flags/de.svg" /> DE</span></td>
                                <td>Apr 3, 2024</td>
                                <td>Lead</td>
                                <td>WebNord GmbH</td>
                                <td><span class="badge bg-secondary-subtle text-secondary badge-label">Inactive</span></td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm"><img alt=""
                                                class="img-fluid rounded-circle" src="/images/users/user-10.jpg" /></div>
                                        <div>
                                            <h5 class="mb-0 lh-base fs-base"><a class="link-reset"
                                                    href="{{ route('second', ['users', 'profile']) }}">Akira Sato</a></h5>
                                            <p class="text-muted fs-xs mb-0">akira@nippontech.jp</p>
                                        </div>
                                    </div>
                                </td>
                                <td>+81 90-1234-5678</td>
                                <td><span class="badge p-1 text-bg-light fs-sm"><img class="rounded-circle me-1"
                                            height="12" src="/images/flags/jp.svg" /> JP</span></td>
                                <td>Feb 12, 2024</td>
                                <td>Client</td>
                                <td>NipponTech</td>
                                <td><span class="badge bg-danger-subtle text-danger badge-label">Blocked</span></td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm"><img alt=""
                                                class="img-fluid rounded-circle" src="/images/users/user-5.jpg" /></div>
                                        <div>
                                            <h5 class="mb-0 lh-base fs-base"><a class="link-reset"
                                                    href="{{ route('second', ['users', 'profile']) }}">Sophie Dubois</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">sophie@créatis.fr</p>
                                        </div>
                                    </div>
                                </td>
                                <td>+33 7 89 01 23 45</td>
                                <td><span class="badge p-1 text-bg-light fs-sm"><img class="rounded-circle me-1"
                                            height="12" src="/images/flags/fr.svg" /> FR</span></td>
                                <td>Feb 9, 2024</td>
                                <td>Client</td>
                                <td>Créatis SARL</td>
                                <td><span class="badge bg-success-subtle text-success badge-label">Active</span></td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm"><img alt=""
                                                class="img-fluid rounded-circle" src="/images/users/user-1.jpg" /></div>
                                        <div>
                                            <h5 class="mb-0 lh-base fs-base"><a class="link-reset"
                                                    href="{{ route('second', ['users', 'profile']) }}">Omar Farouk</a>
                                            </h5>
                                            <p class="text-muted fs-xs mb-0">omar@cairoconnect.eg</p>
                                        </div>
                                    </div>
                                </td>
                                <td>+20 100 123 4567</td>
                                <td><span class="badge p-1 text-bg-light fs-sm"><img class="rounded-circle me-1"
                                            height="12" src="/images/flags/eg.svg" /> EG</span></td>
                                <td>Apr 12, 2024</td>
                                <td>Prospect</td>
                                <td>CairoConnect</td>
                                <td><span class="badge bg-warning-subtle text-warning badge-label">Verification
                                        Pending</span></td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" />
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm"><img alt=""
                                                class="img-fluid rounded-circle" src="/images/users/user-2.jpg" /></div>
                                        <div>
                                            <h5 class="mb-0 lh-base fs-base"><a class="link-reset"
                                                    href="{{ route('second', ['users', 'profile']) }}">John Smith</a></h5>
                                            <p class="text-muted fs-xs mb-0">john@futuredevs.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>+1 (416) 555-3210</td>
                                <td><span class="badge p-1 text-bg-light fs-sm"><img class="rounded-circle me-1"
                                            height="12" src="/images/flags/ca.svg" /> CA</span></td>
                                <td>Feb 5, 2024</td>
                                <td>Lead</td>
                                <td>FutureDevs</td>
                                <td><span class="badge bg-success-subtle text-success badge-label">Active</span></td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-eye fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" href="#"><i
                                                class="ti ti-edit fs-lg"></i></a>
                                        <a class="btn btn-default btn-icon btn-sm rounded" data-table-delete-row=""
                                            href="#"><i class="ti ti-trash fs-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table><!-- end table -->
                </div>
                <div class="card-footer border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div data-table-pagination-info="clients"></div>
                        <div data-table-pagination=""></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <!-- Add Customer Modal -->
    <div aria-hidden="true" aria-labelledby="addCustomerModalLabel" class="modal fade" id="addCustomerModal"
        tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Add New Customer</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <form id="addCustomerForm">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="customerName">Customer Name</label>
                                <input class="form-control" id="customerName" placeholder="Enter full name"
                                    required="" type="text" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="email">Email Address</label>
                                <input class="form-control" id="email" placeholder="Enter email" required=""
                                    type="email" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input class="form-control" id="phone" placeholder="e.g. +1 234 567 8900"
                                    required="" type="text" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="company">Company</label>
                                <input class="form-control" id="company" placeholder="Company name" type="text" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="country">Country</label>
                                <select class="form-select" id="country" required="">
                                    <option value="">Select country</option>
                                    <option value="US">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="IN">India</option>
                                    <option value="CA">Canada</option>
                                    <option value="DE">Germany</option>
                                    <option value="FR">France</option>
                                    <option value="JP">Japan</option>
                                    <option value="BR">Brazil</option>
                                    <option value="EG">Egypt</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="customerType">Customer Type</label>
                                <select class="form-select" id="customerType" required="">
                                    <option value="">Select type</option>
                                    <option value="Lead">Lead</option>
                                    <option value="Prospect">Prospect</option>
                                    <option value="Client">Client</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="Accostatus">Account Status</label>
                                <select class="form-select" id="Accostatus" required="">
                                    <option value="">Select status</option>
                                    <option value="Active">Active</option>
                                    <option value="Verification Pending">Verification Pending</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Blocked">Blocked</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="joinedDate">Joined Date</label>
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
