@extends('layouts.vertical', ['title' => 'User Permissions'])

@section('css')
    @vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Users', 'title' => 'Permissions'])

    <div class="row">
        <div class="col-12">
            <div class="card" data-table="" data-table-rows-per-page="8">
                <div class="card-header border-light justify-content-between">
                    <div class="d-flex gap-2">
                        <div class="app-search">
                            <input class="form-control" data-table-search="" placeholder="Search permissions..."
                                type="search" />
                            <i class="app-search-icon text-muted" data-lucide="search"></i>
                        </div>
                        <button class="btn btn-danger d-none" data-table-delete-selected="">Delete</button>
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
                <div class="table-responsive">
                    <table class="table table-custom table-centered table-select table-hover w-100 mb-0">
                        <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                            <tr class="text-uppercase fs-xxs">
                                <th data-table-sort="">Name</th>
                                <th>Assign To</th>
                                <th data-table-sort="">Created Date</th>
                                <th data-table-sort="">Users</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>User Management</td>
                                <td><span
                                        class="badge bg-primary-subtle text-primary badge-label fs-xxs fw-semibold">Administrator</span>
                                </td>
                                <td>24 Jun 2025, <span class="text-muted">6:43 am</span></td>
                                <td>12</td>
                                <td class="text-center">
                                    <a class="btn btn-default btn-icon btn-sm" data-bs-target="#editPermissionModal"
                                        data-bs-toggle="modal" href="#"><i class="ti ti-eye fs-lg"></i></a>
                                    <a class="btn btn-default btn-icon btn-sm" data-table-delete-row="" href="#"><i
                                            class="ti ti-trash fs-lg"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Content Management</td>
                                <td>
                                    <span
                                        class="badge bg-primary-subtle text-primary badge-label fs-xxs fw-semibold">Administrator</span>
                                    <span
                                        class="badge bg-danger-subtle text-danger badge-label fs-xxs fw-semibold">Developer</span>
                                    <span
                                        class="badge bg-info-subtle text-info badge-label fs-xxs fw-semibold">Analyst</span>
                                    <span
                                        class="badge bg-secondary-subtle text-secondary badge-label fs-xxs fw-semibold">Support</span>
                                    <span
                                        class="badge bg-warning-subtle text-warning badge-label fs-xxs fw-semibold">Trial</span>
                                </td>
                                <td>21 Feb 2025, <span class="text-muted">11:05 am</span></td>
                                <td>5</td>
                                <td class="text-center">
                                    <a class="btn btn-default btn-icon btn-sm" data-bs-target="#editPermissionModal"
                                        data-bs-toggle="modal" href="#"><i class="ti ti-eye fs-lg"></i></a>
                                    <a class="btn btn-default btn-icon btn-sm" data-table-delete-row="" href="#"><i
                                            class="ti ti-trash fs-lg"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Financial Management</td>
                                <td>
                                    <span
                                        class="badge bg-primary-subtle text-primary badge-label fs-xxs fw-semibold">Administrator</span>
                                    <span
                                        class="badge bg-info-subtle text-info badge-label fs-xxs fw-semibold">Analyst</span>
                                </td>
                                <td>24 Jun 2025, <span class="text-muted">5:30 pm</span></td>
                                <td>8</td>
                                <td class="text-center">
                                    <a class="btn btn-default btn-icon btn-sm" data-bs-target="#editPermissionModal"
                                        data-bs-toggle="modal" href="#"><i class="ti ti-eye fs-lg"></i></a>
                                    <a class="btn btn-default btn-icon btn-sm" data-table-delete-row="" href="#"><i
                                            class="ti ti-trash fs-lg"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Reporting</td>
                                <td>
                                    <span
                                        class="badge bg-primary-subtle text-primary badge-label fs-xxs fw-semibold">Administrator</span>
                                    <span
                                        class="badge bg-info-subtle text-info badge-label fs-xxs fw-semibold">Analyst</span>
                                </td>
                                <td>21 Feb 2025, <span class="text-muted">5:20 pm</span></td>
                                <td>6</td>
                                <td class="text-center">
                                    <a class="btn btn-default btn-icon btn-sm" data-bs-target="#editPermissionModal"
                                        data-bs-toggle="modal" href="#"><i class="ti ti-eye fs-lg"></i></a>
                                    <a class="btn btn-default btn-icon btn-sm" data-table-delete-row="" href="#"><i
                                            class="ti ti-trash fs-lg"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Payroll</td>
                                <td>
                                    <span
                                        class="badge bg-primary-subtle text-primary badge-label fs-xxs fw-semibold">Administrator</span>
                                    <span
                                        class="badge bg-info-subtle text-info badge-label fs-xxs fw-semibold">Analyst</span>
                                </td>
                                <td>20 Jun 2025, <span class="text-muted">6:05 pm</span></td>
                                <td>4</td>
                                <td class="text-center">
                                    <a class="btn btn-default btn-icon btn-sm" data-bs-target="#editPermissionModal"
                                        data-bs-toggle="modal" href="#"><i class="ti ti-eye fs-lg"></i></a>
                                    <a class="btn btn-default btn-icon btn-sm" data-table-delete-row="" href="#"><i
                                            class="ti ti-trash fs-lg"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Disputes Management</td>
                                <td>
                                    <span
                                        class="badge bg-primary-subtle text-primary badge-label fs-xxs fw-semibold">Administrator</span>
                                    <span
                                        class="badge bg-danger-subtle text-danger badge-label fs-xxs fw-semibold">Developer</span>
                                    <span
                                        class="badge bg-secondary-subtle text-secondary badge-label fs-xxs fw-semibold">Support</span>
                                </td>
                                <td>24 Jun 2025, <span class="text-muted">5:20 pm</span></td>
                                <td>7</td>
                                <td class="text-center">
                                    <a class="btn btn-default btn-icon btn-sm" data-bs-target="#editPermissionModal"
                                        data-bs-toggle="modal" href="#"><i class="ti ti-eye fs-lg"></i></a>
                                    <a class="btn btn-default btn-icon btn-sm" data-table-delete-row="" href="#"><i
                                            class="ti ti-trash fs-lg"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Audit Logs</td>
                                <td><span
                                        class="badge bg-primary-subtle text-primary badge-label fs-xxs fw-semibold">Administrator</span>
                                </td>
                                <td>23 Jun 2025, <span class="text-muted">4:00 pm</span></td>
                                <td>9</td>
                                <td class="text-center">
                                    <a class="btn btn-default btn-icon btn-sm" data-bs-target="#editPermissionModal"
                                        data-bs-toggle="modal" href="#"><i class="ti ti-eye fs-lg"></i></a>
                                    <a class="btn btn-default btn-icon btn-sm" data-table-delete-row="" href="#"><i
                                            class="ti ti-trash fs-lg"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>API Access</td>
                                <td>
                                    <span
                                        class="badge bg-primary-subtle text-primary badge-label fs-xxs fw-semibold">Administrator</span>
                                    <span
                                        class="badge bg-warning-subtle text-warning badge-label fs-xxs fw-semibold">Trial</span>
                                    <span
                                        class="badge bg-info-subtle text-info badge-label fs-xxs fw-semibold">DevOps</span>
                                </td>
                                <td>22 Jun 2025, <span class="text-muted">2:35 pm</span></td>
                                <td>3</td>
                                <td class="text-center">
                                    <a class="btn btn-default btn-icon btn-sm" data-bs-target="#editPermissionModal"
                                        data-bs-toggle="modal" href="#"><i class="ti ti-eye fs-lg"></i></a>
                                    <a class="btn btn-default btn-icon btn-sm" data-table-delete-row="" href="#"><i
                                            class="ti ti-trash fs-lg"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Notification Center</td>
                                <td>
                                    <span
                                        class="badge bg-primary-subtle text-primary badge-label fs-xxs fw-semibold">Administrator</span>
                                    <span
                                        class="badge bg-info-subtle text-info badge-label fs-xxs fw-semibold">Support</span>
                                </td>
                                <td>22 Jun 2025, <span class="text-muted">8:45 am</span></td>
                                <td>2</td>
                                <td class="text-center">
                                    <a class="btn btn-default btn-icon btn-sm" data-bs-target="#editPermissionModal"
                                        data-bs-toggle="modal" href="#"><i class="ti ti-eye fs-lg"></i></a>
                                    <a class="btn btn-default btn-icon btn-sm" data-table-delete-row="" href="#"><i
                                            class="ti ti-trash fs-lg"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Access Logs</td>
                                <td>
                                    <span
                                        class="badge bg-primary-subtle text-primary badge-label fs-xxs fw-semibold">Administrator</span>
                                    <span
                                        class="badge bg-secondary-subtle text-secondary badge-label fs-xxs fw-semibold">Support</span>
                                </td>
                                <td>19 Jun 2025, <span class="text-muted">6:10 pm</span></td>
                                <td>5</td>
                                <td class="text-center">
                                    <a class="btn btn-default btn-icon btn-sm" data-bs-target="#editPermissionModal"
                                        data-bs-toggle="modal" href="#"><i class="ti ti-eye fs-lg"></i></a>
                                    <a class="btn btn-default btn-icon btn-sm" data-table-delete-row="" href="#"><i
                                            class="ti ti-trash fs-lg"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div data-table-pagination-info="permissions"></div>
                        <div data-table-pagination=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row-->
    <!-- Edit Permission Modal -->
    <div aria-hidden="true" aria-labelledby="editPermissionModalLabel" class="modal fade" id="editPermissionModal"
        tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPermissionModalLabel">Edit Permission</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <form id="editPermissionForm">
                    <div class="modal-body">
                        <div class="row g-3">
                            <!-- Permission Name -->
                            <div class="col-md-6">
                                <label class="form-label" for="editPermissionName">Permission Name</label>
                                <input class="form-control" id="editPermissionName" required="" type="text"
                                    value="User Management" />
                            </div>
                            <!-- Assigned Roles -->
                            <div class="col-md-6">
                                <label class="form-label" for="editAssignedRoles">Assigned To</label>
                                <select class="form-select" id="editAssignedRoles" multiple="" required="">
                                    <option selected="" value="Administrator">Administrator</option>
                                    <option value="Developer">Developer</option>
                                    <option value="Analyst">Analyst</option>
                                    <option value="Support">Support</option>
                                    <option value="Trial">Trial</option>
                                </select>
                                <small class="text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple roles</small>
                            </div>
                            <!-- Created Date -->
                            <div class="col-md-6">
                                <label class="form-label" for="editCreatedDate">Created Date</label>
                                <input class="form-control" data-date-format="d M, Y" data-enable-time=""
                                    data-provider="flatpickr" id="editCreatedDate" required="" type="text"
                                    value="2025-06-24T06:43" />
                            </div>
                            <!-- Number of Users -->
                            <div class="col-md-6">
                                <label class="form-label" for="editUserCount">Users</label>
                                <input class="form-control" disabled="" id="editUserCount" readonly=""
                                    type="number" value="12" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/custom-table.js'])
@endsection
