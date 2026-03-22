@extends('layouts.vertical', ['title' => 'Dropdowns'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Dropdowns'])

    <div class="row">
        <!-- Single Button Dropdowns -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Single Button Dropdowns</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Any single <code>.btn</code> can be turned into a dropdown
                        toggle with some markup changes. Here’s how you can put them to work
                        with either <code>&lt;button&gt;</code> elements:
                    </p>
                    <div class="row">
                        <div class="col-auto">
                            <!-- Choose Option -->
                            <div class="dropdown">
                                <button aria-expanded="false" aria-haspopup="true" class="btn btn-light dropdown-toggle"
                                    data-bs-toggle="dropdown" id="dropdownMenuButton" type="button">
                                    Choose Option
                                </button>
                                <div aria-labelledby="dropdownMenuButton" class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Profile Settings</a>
                                    <a class="dropdown-item" href="#">Notifications</a>
                                    <a class="dropdown-item" href="#">Logout</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- Quick Actions -->
                            <div class="dropdown">
                                <a aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle"
                                    data-bs-toggle="dropdown" href="#" id="dropdownMenuLink" role="button">
                                    Quick Actions
                                </a>
                                <div aria-labelledby="dropdownMenuLink" class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Create New</a>
                                    <a class="dropdown-item" href="#">Upload File</a>
                                    <a class="dropdown-item" href="#">View Reports</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu Alignment -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Menu Alignment</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Add <code>.dropdown-menu-end</code> to a <code>.dropdown-menu</code> to right
                        align the dropdown menu.
                    </p>
                    <div class="dropdown">
                        <button aria-expanded="false" aria-haspopup="true" class="btn btn-light dropdown-toggle"
                            data-bs-toggle="dropdown" type="button">
                            Right-aligned menu
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Custom Dropdown Arrow -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Custom Dropdown Arrow</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Any single <code>.btn</code> can be turned into a dropdown
                        toggle with some markup changes. Here’s how you can put them to work
                        with either <code>&lt;button&gt;</code> elements:
                    </p>
                    <div class="row">
                        <div class="col-auto">
                            <!-- Without Arrow -->
                            <div class="dropdown">
                                <button aria-expanded="false" aria-haspopup="true"
                                    class="btn btn-primary dropdown-toggle drop-arrow-none" data-bs-toggle="dropdown"
                                    id="dropdownMenuButton1" type="button">
                                    Without Arrow
                                </button>
                                <div aria-labelledby="dropdownMenuButton1" class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Download Report</a>
                                    <a class="dropdown-item" href="#">View Analytics</a>
                                    <a class="dropdown-item" href="#">Export Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- Tabler Icon  -->
                            <div class="dropdown">
                                <button aria-expanded="false" aria-haspopup="true"
                                    class="btn btn-outline-primary dropdown-toggle drop-arrow-none"
                                    data-bs-toggle="dropdown" id="dropdownMenuButton2" type="button">
                                    Tabler Icon <i class="ti ti-chevron-down align-middle ms-1"></i>
                                </button>
                                <div aria-labelledby="dropdownMenuButton2" class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Edit Profile</a>
                                    <a class="dropdown-item" href="#">Account Settings</a>
                                    <a class="dropdown-item" href="#">Sign Out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- Lucide Icon  -->
                            <div class="dropdown">
                                <button aria-expanded="false" aria-haspopup="true"
                                    class="btn btn-primary dropdown-toggle drop-arrow-none" data-bs-toggle="dropdown"
                                    id="dropdownMenuButton3" type="button">
                                    Lucide Icon <i class="avatar-xxs ms-2" data-lucide="square-chevron-down"></i>
                                </button>
                                <div aria-labelledby="dropdownMenuButton3" class="dropdown-menu">
                                    <a class="dropdown-item" href="#">New Project</a>
                                    <a class="dropdown-item" href="#">Manage Team</a>
                                    <a class="dropdown-item" href="#">Billing Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Split Button Dropdowns -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Split Button Dropdowns</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Similarly, create split button dropdowns with virtually the same markup as single
                        button dropdowns, but with the addition of <code>.dropdown-toggle-split</code> for
                        proper spacing around the dropdown caret.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <div class="btn-group">
                            <!-- Primary -->
                            <button class="btn btn-primary" type="button">Primary</button>
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn btn-primary dropdown-toggle dropdown-toggle-split drop-arrow-none"
                                data-bs-toggle="dropdown" type="button">
                                <i class="ti ti-chevron-down align-middle"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div><!-- /btn-group -->
                        <div class="btn-group">
                            <!-- Success -->
                            <button class="btn btn-soft-success" type="button">Success</button>
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn btn-soft-success dropdown-toggle dropdown-toggle-split drop-arrow-none"
                                data-bs-toggle="dropdown" type="button">
                                <i class="ti ti-chevron-down align-middle"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div><!-- /btn-group -->
                        <div class="btn-group">
                            <!-- Info -->
                            <button class="btn btn-info" type="button">Info</button>
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                                type="button">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div><!-- /btn-group -->
                        <div class="btn-group">
                            <!-- Danger -->
                            <button class="btn btn-danger" type="button">Danger</button>
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                                type="button">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div><!-- /btn-group -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Variant -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Variant</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">The best part is you can do this with any button variant, too:</p>
                    <div class="d-flex flex-wrap gap-2">
                        <div class="btn-group">
                            <!-- Primary -->
                            <button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle"
                                data-bs-toggle="dropdown" type="button">Primary</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Create New</a>
                                <a class="dropdown-item" href="#">Save Changes</a>
                                <a class="dropdown-item" href="#">Publish Now</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">View Drafts</a>
                            </div>
                        </div><!-- /btn-group -->
                        <div class="btn-group">
                            <!-- Secondary -->
                            <button aria-expanded="false" aria-haspopup="true" class="btn btn-light dropdown-toggle"
                                data-bs-toggle="dropdown" type="button">Secondary</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Preferences</a>
                                <a class="dropdown-item" href="#">Account Info</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Logout</a>
                            </div>
                        </div><!-- /btn-group -->
                        <div class="btn-group">
                            <!-- Success -->
                            <button aria-expanded="false" aria-haspopup="true" class="btn btn-success dropdown-toggle"
                                data-bs-toggle="dropdown" type="button">Success</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Mark as Complete</a>
                                <a class="dropdown-item" href="#">Download Report</a>
                                <a class="dropdown-item" href="#">Submit Review</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Archive Task</a>
                            </div>
                        </div><!-- /btn-group -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sizing -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Sizing</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Button dropdowns work with buttons of all sizes, including default
                        and split dropdown buttons.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Large button groups (default and split) -->
                        <div class="btn-group">
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn btn-light btn-lg dropdown-toggle" data-bs-toggle="dropdown" type="button">
                                Large button
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-light btn-lg" type="button">
                                Large button
                            </button>
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn btn-lg btn-light dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown" type="button">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                        <!-- Small button groups (default and split) -->
                        <div class="btn-group">
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown" type="button">
                                Small button
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-light btn-sm" type="button">
                                Small button
                            </button>
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn btn-sm btn-light dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown" type="button">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dropup Variation -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Dropup Variation</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Trigger dropdown menus above elements
                        by adding <code>.dropup</code> to the parent element.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Default dropup button -->
                        <div class="btn-group dropup">
                            <button aria-expanded="false" aria-haspopup="true" class="btn btn-light dropdown-toggle"
                                data-bs-toggle="dropdown" type="button">Dropup</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Upload File</a>
                                <a class="dropdown-item" href="#">Sync Data</a>
                                <a class="dropdown-item" href="#">Import from CSV</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Advanced Settings</a>
                            </div>
                        </div>
                        <!-- Split dropup button -->
                        <div class="btn-group dropup">
                            <button class="btn btn-light" type="button">
                                Split dropup
                            </button>
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                                type="button">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">New Task</a>
                                <a class="dropdown-item" href="#">Assign User</a>
                                <a class="dropdown-item" href="#">Set Deadline</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Project Settings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dropstart Variation -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Dropstart Variation</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Trigger dropdown menus to the left of the elements by adding
                        <code>.dropstart</code> to the parent element.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Default dropstart button -->
                        <div class="btn-group dropstart">
                            <button aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle"
                                data-bs-toggle="dropdown" type="button">
                                Dropstart
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                        <!-- Split dropstart button -->
                        <div class="btn-group">
                            <div class="btn-group dropstart" role="group">
                                <button aria-expanded="false" aria-haspopup="true"
                                    class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown" type="button">
                                    <span class="visually-hidden">Toggle Dropstart</span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                            <button class="btn btn-secondary" type="button">
                                Split dropstart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dropend Variation -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Dropend Variation</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Trigger dropdown menus to the right of the elements by adding
                        <code>.dropend</code> to the parent element.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Default dropend button -->
                        <div class="btn-group dropend">
                            <button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle"
                                data-bs-toggle="dropdown" type="button">
                                Dropend
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">View Profile</a>
                                <a class="dropdown-item" href="#">Message User</a>
                                <a class="dropdown-item" href="#">Report Issue</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Block User</a>
                            </div>
                        </div>
                        <!-- Split dropend button -->
                        <div class="btn-group dropend">
                            <button class="btn btn-primary" type="button">
                                Split Dropend
                            </button>
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn btn-primary dropdown-toggle-split dropdown-toggle" data-bs-toggle="dropdown"
                                type="button">
                                <span class="visually-hidden">Toggle Dropright</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">New Invoice</a>
                                <a class="dropdown-item" href="#">Send Reminder</a>
                                <a class="dropdown-item" href="#">Duplicate</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Delete Invoice</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Active Item -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Active Item</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add <code>.active</code> to item in the dropdown to <strong>style
                            them as active</strong>.</p>
                    <!-- Active Item -->
                    <div class="btn-group">
                        <button aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle"
                            data-bs-toggle="dropdown" type="button">
                            Active Item
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Regular link</a>
                            <a class="dropdown-item active" href="#">Active link</a>
                            <a class="dropdown-item" href="#">Another link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Disabled Item -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Disabled Item</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add <code>.disabled</code> to items in the dropdown to
                        <strong>style them as disabled</strong>.
                    </p>
                    <!-- Disabled -->
                    <div class="btn-group">
                        <button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle"
                            data-bs-toggle="dropdown" type="button">
                            Disabled
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Regular link</a>
                            <a class="dropdown-item disabled" href="#" tabindex="-1">Disabled link</a>
                            <a class="dropdown-item" href="#">Another link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Headers -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Headers</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add a header to label sections of actions in any dropdown menu.
                    </p>
                    <!-- Header Item -->
                    <div class="btn-group">
                        <button aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle"
                            data-bs-toggle="dropdown" type="button">
                            Header
                        </button>
                        <div class="dropdown-menu">
                            <h6 class="dropdown-header">Dropdown header</h6>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dark Dropdowns -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Dark Dropdowns</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Opt into darker dropdowns to match a dark navbar or custom style
                        by adding <code>.dropdown-menu-dark</code> onto an existing <code>.dropdown-menu</code>.
                        No changes are required to the dropdown items.
                    </p>
                    <div class="dropdown">
                        <button aria-expanded="false" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                            type="button">
                            Dark Dropdown
                        </button>
                        <ul class="dropdown-menu" data-bs-theme="dark">
                            <li><a class="dropdown-item active" href="#">Dashboard</a></li>
                            <li><a class="dropdown-item" href="#">My Orders</a></li>
                            <li><a class="dropdown-item" href="#">Billing Settings</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Centered Dropdowns -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Centered Dropdowns</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Make the dropdown menu centered below the toggle with
                        <code>.dropdown-center</code> on the parent element.
                    </p>
                    <div class="hstack gap-2">
                        <div class="dropdown-center">
                            <button aria-expanded="false" class="btn btn-secondary dropdown-toggle"
                                data-bs-toggle="dropdown" type="button">
                                Centered dropdown
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Action two</a></li>
                                <li><a class="dropdown-item" href="#">Action three</a></li>
                            </ul>
                        </div>
                        <div class="dropup-center dropup">
                            <button aria-expanded="false" class="btn btn-secondary dropdown-toggle"
                                data-bs-toggle="dropdown" type="button">
                                Centered dropup
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Action two</a></li>
                                <li><a class="dropdown-item" href="#">Action three</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dropdown Options -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Dropdown Options</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use <code>data-bs-offset</code> or <code>data-bs-reference</code>
                        to change the location of the dropdown.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <div class="dropdown">
                            <button aria-expanded="false" class="btn btn-secondary dropdown-toggle"
                                data-bs-offset="10,20" data-bs-toggle="dropdown" type="button">
                                Offset
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Profile Settings</a></li>
                                <li><a class="dropdown-item" href="#">Privacy Settings</a></li>
                                <li><a class="dropdown-item" href="#">Notification Preferences</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-secondary" type="button">Reference</button>
                            <button aria-expanded="false" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-bs-reference="parent" data-bs-toggle="dropdown" type="button">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Manage Subscription</a></li>
                                <li><a class="dropdown-item" href="#">Account Preferences</a></li>
                                <li><a class="dropdown-item" href="#">Help &amp; Support</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="#">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Auto Close Behavior -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Auto Close Behavior</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">By default, the dropdown menu is closed when clicking inside or
                        outside the dropdown menu. You can use the <code>autoClose</code> option to change
                        this behavior of the dropdown.</p>
                    <div class="hstack gap-2">
                        <div class="btn-group">
                            <button aria-expanded="false" class="btn btn-secondary dropdown-toggle"
                                data-bs-auto-close="true" data-bs-toggle="dropdown" type="button">
                                Default dropdown
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button aria-expanded="false" class="btn btn-secondary dropdown-toggle"
                                data-bs-auto-close="inside" data-bs-toggle="dropdown" type="button">
                                Clickable inside
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button aria-expanded="false" class="btn btn-secondary dropdown-toggle"
                                data-bs-auto-close="outside" data-bs-toggle="dropdown" type="button">
                                Clickable outside
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button aria-expanded="false" class="btn btn-secondary dropdown-toggle"
                                data-bs-auto-close="false" data-bs-toggle="dropdown" type="button">
                                Manual close
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Text -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Text</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Place any freeform text within a dropdown menu with text and use
                        spacing utilities. Note that you’ll likely need additional sizing styles to
                        constrain the menu width.</p>
                    <!-- Text Example -->
                    <div class="btn-group">
                        <button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle"
                            data-bs-toggle="dropdown" type="button">
                            Text Dropdown
                        </button>
                        <div class="dropdown-menu p-3 text-muted" style="max-width: 200px;">
                            <p>
                                Some example text that's free-flowing within the dropdown menu.
                            </p>
                            <p class="mb-0">
                                And this is more example text.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Forms -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Forms</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Put a form within a dropdown menu, or make it into a dropdown
                        menu, and use margin or padding utilities to give it the negative space you require.
                    </p>
                    <!-- Forms -->
                    <div class="dropdown">
                        <button aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle"
                            data-bs-toggle="dropdown" type="button">
                            Form
                        </button>
                        <div class="dropdown-menu">
                            <form class="px-4 py-3">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleDropdownFormEmail1">Email
                                        address</label>
                                    <input class="form-control" id="exampleDropdownFormEmail1"
                                        placeholder="email@example.com" type="email" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleDropdownFormPassword1">Password</label>
                                    <input class="form-control" id="exampleDropdownFormPassword1" placeholder="Password"
                                        type="password" />
                                </div>
                                <div class="mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" id="dropdownCheck" type="checkbox" />
                                        <label class="form-check-label" for="dropdownCheck">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Sign in</button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">New around here? Sign up</a>
                            <a class="dropdown-item" href="#">Forgot password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
