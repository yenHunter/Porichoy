@extends('layouts.vertical', ['title' => 'API Keys'])

@section('css')
    @vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Apps', 'title' => 'API Keys'])

    <div class="row">
        <div class="col-12">
            <div class="card" data-table="" data-table-rows-per-page="8">
                <div class="card-header border-light justify-content-between">
                    <div class="d-flex gap-2">
                        <div class="app-search">
                            <input class="form-control" data-table-search="" placeholder="Search API clients..."
                                type="text" />
                            <i class="app-search-icon text-muted" data-lucide="search"></i>
                        </div>
                        <button class="btn btn-secondary btn-icon" data-bs-target="#addApiKeyModal" data-bs-toggle="modal"
                            type="button"><i class="ti ti-plus fs-lg"></i></button>
                        <button class="btn btn-danger d-none" data-table-delete-selected="">Delete</button>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="me-2 fw-semibold">Filter By:</span>
                        <!-- Status Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="status">
                                <option value="All">Status</option>
                                <option value="Active">Active</option>
                                <option value="Pending">Pending</option>
                                <option value="Revoked">Revoked</option>
                                <option value="Suspended">Suspended</option>
                                <option value="Expired">Expired</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="circle-check"></i>
                        </div>
                        <!-- Region Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="region">
                                <option value="All">Region</option>
                                <option value="US">USA</option>
                                <option value="UK">UK</option>
                                <option value="IN">India</option>
                                <option value="DE">Germany</option>
                                <option value="AU">Australia</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="globe"></i>
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
                    <table class="table text-nowrap table-custom table-centered table-hover w-100 mb-0">
                        <thead class="bg-light bg-opacity-25 thead-sm">
                            <tr class="text-uppercase fs-xxs">
                                <th scope="col" style="width: 1%;">
                                    <input class="form-check-input form-check-input-light fs-14 mt-0"
                                        data-table-select-all="" type="checkbox" value="option" />
                                </th>
                                <th data-table-sort="">Name</th>
                                <th data-table-sort="name">Created By</th>
                                <th>API Key</th>
                                <th data-column="status" data-table-sort="">Status</th>
                                <th>Usage</th>
                                <th data-table-sort="">Created</th>
                                <th data-table-sort="">Expires</th>
                                <th data-column="region" data-table-sort="">Region</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead><!-- end table-head -->
                        <tbody>
                            <tr>
                                <td>
                                    <input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox"
                                        value="option" />
                                </td>
                                <td class="fw-medium">APINexus</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-xs">
                                            <img alt="avatar-2" class="img-fluid rounded-circle"
                                                src="/images/users/user-2.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fw-medium fs-sm mb-0 lh-base" data-sort="name">Mark
                                                Reynolds</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-control form-control-sm" id="keyOne" readonly=""
                                            type="text" value="e4A7Fc98z120XYz776abc90MNZ" />
                                        <button class="btn btn-sm btn-icon btn-default" data-clipboard-target="#keyOne"
                                            type="button">
                                            <i class="ti ti-copy fs-lg"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-warning-subtle text-warning badge-label">Pending</span>
                                </td>
                                <td><span>245 / 1000</span></td>
                                <td>Jan 10, 2025</td>
                                <td>Nov 15, 2025</td>
                                <td>
                                    <span class="d-flex align-items-center fs-sm fw-bold">
                                        <img alt="" class="rounded-circle me-1" height="12"
                                            src="/images/flags/de.svg" /> DE
                                    </span>
                                </td>
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
                                <td>
                                    <input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox"
                                        value="option" />
                                </td>
                                <td class="fw-medium">DataPulse</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-xs">
                                            <img alt="avatar-4" class="img-fluid rounded-circle"
                                                src="/images/users/user-4.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fw-medium fs-sm mb-0 lh-base" data-sort="name">Sophia
                                                Turner</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-control form-control-sm" id="keyTwo" readonly=""
                                            type="text" value="9BcD456Xy78LmN0zPQR12sA3Z" />
                                        <button class="btn btn-sm btn-icon btn-default" data-clipboard-target="#keyTwo"
                                            type="button">
                                            <i class="ti ti-copy fs-lg"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-danger-subtle text-danger badge-label">Revoked</span>
                                </td>
                                <td><span>847 / 1000</span></td>
                                <td>Mar 5, 2025</td>
                                <td>Aug 20, 2025</td>
                                <td>
                                    <span class="d-flex align-items-center fs-sm fw-bold">
                                        <img alt="" class="rounded-circle me-1" height="12"
                                            src="/images/flags/gb.svg" /> UK
                                    </span>
                                </td>
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
                                <td>
                                    <input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox"
                                        value="option" />
                                </td>
                                <td class="fw-medium">AuthKit</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-xs">
                                            <img alt="avatar-5" class="img-fluid rounded-circle"
                                                src="/images/users/user-5.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fw-medium fs-sm mb-0 lh-base" data-sort="name">Liam
                                                Watson</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-control form-control-sm" id="keyThree" readonly=""
                                            type="text" value="ZZ99xC8K23Fm10TyPLqZa17d" />
                                        <button class="btn btn-sm btn-icon btn-default" data-clipboard-target="#keyThree"
                                            type="button">
                                            <i class="ti ti-copy fs-lg"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-success-subtle text-success badge-label">Active</span>
                                </td>
                                <td><span>105 / 700</span></td>
                                <td>Apr 22, 2025</td>
                                <td>Dec 31, 2025</td>
                                <td>
                                    <span class="d-flex align-items-center fs-sm fw-bold">
                                        <img alt="" class="rounded-circle me-1" height="12"
                                            src="/images/flags/in.svg" /> IN
                                    </span>
                                </td>
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
                                <td>
                                    <input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox"
                                        value="option" />
                                </td>
                                <td class="fw-medium">APIxEdge</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-xs">
                                            <img alt="avatar-2" class="img-fluid rounded-circle"
                                                src="/images/users/user-2.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fw-medium fs-sm mb-0 lh-base" data-sort="name">Ava
                                                Turner</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-control form-control-sm" id="keyFour" readonly=""
                                            type="text" value="XY91kLpB42Ga98WxRTzEe55n" />
                                        <button class="btn btn-sm btn-icon btn-default" data-clipboard-target="#keyFour"
                                            type="button">
                                            <i class="ti ti-copy fs-lg"></i>
                                        </button>
                                    </div>
                                </td>
                                <td><span class="badge bg-warning-subtle text-warning badge-label">Pending</span>
                                </td>
                                <td><span>0 / 500</span></td>
                                <td>Apr 10, 2025</td>
                                <td>Oct 10, 2025</td>
                                <td><span class="d-flex align-items-center fs-sm fw-bold"><img alt=""
                                            class="rounded-circle me-1" height="12" src="/images/flags/us.svg" />
                                        US</span></td>
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
                                <td>
                                    <input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox"
                                        value="option" />
                                </td>
                                <td class="fw-medium">DataLinker</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-xs">
                                            <img alt="avatar-7" class="img-fluid rounded-circle"
                                                src="/images/users/user-7.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fw-medium fs-sm mb-0 lh-base" data-sort="name">Noah
                                                Reed</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-control form-control-sm" id="keyFive" readonly=""
                                            type="text" value="BB22zWqT65Op90VxMLaRt18c" />
                                        <button class="btn btn-sm btn-icon btn-default" data-clipboard-target="#keyFive"
                                            type="button">
                                            <i class="ti ti-copy fs-lg"></i>
                                        </button>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger-subtle text-danger badge-label">Suspended</span>
                                </td>
                                <td><span>369 / 1000</span></td>
                                <td>Mar 15, 2025</td>
                                <td>Sep 15, 2025</td>
                                <td><span class="d-flex align-items-center fs-sm fw-bold"><img alt=""
                                            class="rounded-circle me-1" height="12" src="/images/flags/de.svg" />
                                        DE</span></td>
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
                                <td>
                                    <input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox"
                                        value="option" />
                                </td>
                                <td class="fw-medium">WebhookMate</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-xs">
                                            <img alt="avatar-3" class="img-fluid rounded-circle"
                                                src="/images/users/user-3.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fw-medium fs-sm mb-0 lh-base" data-sort="name">Sophia
                                                Lee</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-control form-control-sm" id="keySix" readonly=""
                                            type="text" value="RM19yUlP75Kl44YvNJdHg09s" />
                                        <button class="btn btn-sm btn-icon btn-default" data-clipboard-target="#keySix"
                                            type="button">
                                            <i class="ti ti-copy fs-lg"></i>
                                        </button>
                                    </div>
                                </td>
                                <td><span class="badge bg-success-subtle text-success badge-label">Active</span>
                                </td>
                                <td><span>459 / 600</span></td>
                                <td>Jan 01, 2025</td>
                                <td>Dec 31, 2025</td>
                                <td><span class="d-flex align-items-center fs-sm fw-bold"><img alt=""
                                            class="rounded-circle me-1" height="12" src="/images/flags/gb.svg" />
                                        UK</span></td>
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
                                <td>
                                    <input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox"
                                        value="option" />
                                </td>
                                <td class="fw-medium">DevPortal</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-xs">
                                            <img alt="avatar-4" class="img-fluid rounded-circle"
                                                src="/images/users/user-4.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fw-medium fs-sm mb-0 lh-base" data-sort="name">Mason
                                                Clark</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-control form-control-sm" id="keySeven" readonly=""
                                            type="text" value="AA47qBcJ61Tr77WpKKzTy39k" />
                                        <button class="btn btn-sm btn-icon btn-default" data-clipboard-target="#keySeven"
                                            type="button">
                                            <i class="ti ti-copy fs-lg"></i>
                                        </button>
                                    </div>
                                </td>
                                <td><span class="badge bg-info-subtle text-info badge-label">Trial</span></td>
                                <td><span>0 / 100</span></td>
                                <td>Feb 01, 2025</td>
                                <td>May 01, 2025</td>
                                <td><span class="d-flex align-items-center fs-sm fw-bold"><img alt=""
                                            class="rounded-circle me-1" height="12" src="/images/flags/au.svg" />
                                        AU</span></td>
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
                                <td>
                                    <input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox"
                                        value="option" />
                                </td>
                                <td class="fw-medium">NotifyX</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-xs">
                                            <img alt="avatar-6" class="img-fluid rounded-circle"
                                                src="/images/users/user-6.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fw-medium fs-sm mb-0 lh-base" data-sort="name">Ella
                                                James</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-control form-control-sm" id="keyEight" readonly=""
                                            type="text" value="ZP83mXcD28Uv11MtYYoXx03b" />
                                        <button class="btn btn-sm btn-icon btn-default" data-clipboard-target="#keyEight"
                                            type="button">
                                            <i class="ti ti-copy fs-lg"></i>
                                        </button>
                                    </div>
                                </td>
                                <td><span class="badge bg-success-subtle text-success badge-label">Active</span>
                                </td>
                                <td><span>3584 / 5000</span></td>
                                <td>Apr 01, 2025</td>
                                <td>Jan 01, 2026</td>
                                <td><span class="d-flex align-items-center fs-sm fw-bold"><img alt=""
                                            class="rounded-circle me-1" height="12" src="/images/flags/ca.svg" />
                                        CA</span></td>
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
                                <td>
                                    <input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox"
                                        value="option" />
                                </td>
                                <td class="fw-medium">TokenVault</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-xs">
                                            <img alt="avatar-8" class="img-fluid rounded-circle"
                                                src="/images/users/user-8.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fw-medium fs-sm mb-0 lh-base" data-sort="name">Lucas
                                                Hill</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-control form-control-sm" id="keyNine" readonly=""
                                            type="text" value="LK35yTrF82Lo99UiSSpPr47x" />
                                        <button class="btn btn-sm btn-icon btn-default" data-clipboard-target="#keyNine"
                                            type="button">
                                            <i class="ti ti-copy fs-lg"></i>
                                        </button>
                                    </div>
                                </td>
                                <td><span class="badge bg-secondary-subtle text-secondary badge-label">Expired</span>
                                </td>
                                <td><span>958 / 1000</span></td>
                                <td>Jul 15, 2024</td>
                                <td>Jan 15, 2025</td>
                                <td><span class="d-flex align-items-center fs-sm fw-bold"><img alt=""
                                            class="rounded-circle me-1" height="12" src="/images/flags/fr.svg" />
                                        FR</span></td>
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
                                <td>
                                    <input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox"
                                        value="option" />
                                </td>
                                <td class="fw-medium">StreamAPI</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <div class="avatar avatar-xs">
                                            <img alt="avatar-9" class="img-fluid rounded-circle"
                                                src="/images/users/user-9.jpg" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap fw-medium fs-sm mb-0 lh-base" data-sort="name">Mia
                                                Bennett</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-control form-control-sm" id="keyTen" readonly=""
                                            type="text" value="DW64aUvQ11Gh32PpDDjWw72t" />
                                        <button class="btn btn-sm btn-icon btn-default" data-clipboard-target="#keyTen"
                                            type="button">
                                            <i class="ti ti-copy fs-lg"></i>
                                        </button>
                                    </div>
                                </td>
                                <td><span class="badge bg-success-subtle text-success badge-label">Active</span>
                                </td>
                                <td><span>78 / 100</span></td>
                                <td>Mar 05, 2025</td>
                                <td>Dec 05, 2025</td>
                                <td><span class="d-flex align-items-center fs-sm fw-bold"><img alt=""
                                            class="rounded-circle me-1" height="12" src="/images/flags/in.svg" />
                                        IN</span></td>
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
                        </tbody><!-- end table-body -->
                    </table><!-- end table -->
                </div>
                <div class="card-footer border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div data-table-pagination-info="apis"></div>
                        <div data-table-pagination=""></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <!-- Add API Key Modal -->
    <div aria-hidden="true" aria-labelledby="addApiKeyModalLabel" class="modal fade" id="addApiKeyModal"
        tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addApiKeyModalLabel">Add New API Key</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Client Name</label>
                                <input class="form-control" placeholder="Enter client name" type="text" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Created By</label>
                                <select class="form-select">
                                    <option disabled="" selected="">Select user</option>
                                    <option>Mark Reynolds</option>
                                    <option>Sophia Turner</option>
                                    <option>Liam Watson</option>
                                    <option>Ava Turner</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">API Key</label>
                                <div class="input-group">
                                    <input class="form-control" id="apiKeyInput" placeholder="Enter or generate API key"
                                        type="text" />
                                    <button class="btn btn-secondary" onclick="generateApiKey()"
                                        type="button">Generate</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option value="Active">Active</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Revoked">Revoked</option>
                                    <option value="Suspended">Suspended</option>
                                    <option value="Trial">Trial</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Usage Limit</label>
                                <input class="form-control" placeholder="e.g. 1000" type="text" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Region</label>
                                <select class="form-select">
                                    <option value="DE">🇩🇪 Germany</option>
                                    <option value="UK">🇬🇧 UK</option>
                                    <option value="IN">🇮🇳 India</option>
                                    <option value="US">🇺🇸 USA</option>
                                    <option value="AU">🇦🇺 Australia</option>
                                    <option value="CA">🇨🇦 Canada</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Created On</label>
                                <input class="form-control" data-date-format="d M, Y" data-provider="flatpickr"
                                    type="date" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Expires On</label>
                                <input class="form-control" data-date-format="d M, Y" data-provider="flatpickr"
                                    type="date" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button>
                        <button class="btn btn-primary" type="submit">Add API Key</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/custom-table.js'])
    @vite(['resources/js/pages/api-keys.js'])
@endsection
