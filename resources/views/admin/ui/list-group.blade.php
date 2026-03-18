@extends('layouts.vertical', ['title' => 'List Group'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'List Group'])

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Basic Example</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">The most basic list group is an unordered list with
                        list items and the proper classes.
                        Build upon it with the options that follow, or with your own CSS as needed.
                    </p>
                    <ul class="list-group">
                        <li class="list-group-item"><i class="ti ti-cloud me-1 align-middle fs-xl"></i> Dropbox Cloud
                            Storage</li>
                        <li class="list-group-item"><i class="ti ti-brand-slack me-1 align-middle fs-xl"></i> Slack Team
                            Collaboration</li>
                        <li class="list-group-item"><i class="ti ti-brand-windows me-1 align-middle fs-xl"></i> Microsoft
                            Windows OS</li>
                        <li class="list-group-item"><i class="ti ti-device-desktop-analytics me-1 align-middle fs-xl"></i>
                            Zendesk Customer Support</li>
                        <li class="list-group-item"><i class="ti ti-brand-stripe me-1 align-middle fs-xl"></i> Stripe
                            Payment Integration</li>
                    </ul>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Active Items</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add <code>.active</code> to a
                        <code>.list-group-item</code> to indicate the current active selection.
                    </p>
                    <ul class="list-group">
                        <li class="list-group-item active"><i class="ti ti-brand-github me-1 align-middle fs-xl"></i> GitHub
                            Repository</li>
                        <li class="list-group-item"><i class="ti ti-brand-figma me-1 align-middle fs-xl"></i> Figma Design
                            Tool</li>
                        <li class="list-group-item"><i class="ti ti-brand-notion me-1 align-middle fs-xl"></i> Notion
                            Workspace</li>
                        <li class="list-group-item"><i class="ti ti-brand-trello me-1 align-middle fs-xl"></i> Trello Task
                            Manager</li>
                        <li class="list-group-item"><i class="ti ti-cloud me-1 align-middle fs-xl"></i> DigitalOcean Cloud
                        </li>
                    </ul>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Disabled Items</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p>Add <code>.disabled</code> to a <code>.list-group-item</code> to make it
                        <em>appear</em> disabled.
                    </p>
                    <ul class="list-group">
                        <li aria-disabled="true" class="list-group-item disabled"><i
                                class="ti ti-cloud me-1 align-middle fs-xl"></i> Dropbox Cloud Storage</li>
                        <li class="list-group-item"><i class="ti ti-brand-slack me-1 align-middle fs-xl"></i> Slack Team
                            Collaboration</li>
                        <li class="list-group-item"><i class="ti ti-brand-windows me-1 align-middle fs-xl"></i> Microsoft
                            Windows OS</li>
                        <li class="list-group-item"><i class="ti ti-device-desktop-analytics me-1 align-middle fs-xl"></i>
                            Zendesk Customer Support</li>
                        <li class="list-group-item"><i class="ti ti-brand-stripe me-1 align-middle fs-xl"></i> Stripe
                            Payment Integration</li>
                    </ul>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Links and Buttons</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use <code>&lt;a&gt;</code>s or
                        <code>&lt;button&gt;</code>s to create <em>actionable</em> list group items with
                        hover, disabled, and active states by adding
                        <code>.list-group-item-action</code>.
                    </p>
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action active" href="#">
                            Stripe Payment Integration
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">Dropbox Cloud Service</a>
                        <button class="list-group-item list-group-item-action" type="button">Slack Communication</button>
                        <button class="list-group-item list-group-item-action" type="button">Notion Productivity
                            App</button>
                        <a class="list-group-item list-group-item-action disabled" href="#" tabindex="-1">Zendesk
                            Support Tool</a>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Flush</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add <code>.list-group-flush</code> to remove some
                        borders and rounded corners to render list group items edge-to-edge in a parent
                        container (e.g., cards).</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Slack Collaboration Tool</li>
                        <li class="list-group-item">Dropbox Cloud Storage</li>
                        <li class="list-group-item">Notion Workspace Organizer</li>
                        <li class="list-group-item">Zendesk Customer Support</li>
                        <li class="list-group-item">Stripe Payment Processor</li>
                    </ul>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Horizontal</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add <code>.list-group-horizontal</code> to change the
                        layout of list group items from vertical to horizontal across all breakpoints.
                        Alternatively, choose a responsive variant
                        <code>.list-group-horizontal-{sm|md|lg|xl}</code> to make a list group
                        horizontal starting at that breakpoint’s <code>min-width</code>.
                    </p>
                    <ul class="list-group list-group-horizontal mb-3">
                        <li class="list-group-item">Slack</li>
                        <li class="list-group-item">Notion</li>
                        <li class="list-group-item">Dropbox</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-sm mb-3">
                        <li class="list-group-item">Figma</li>
                        <li class="list-group-item">Stripe</li>
                        <li class="list-group-item">Zendesk</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item">Trello</li>
                        <li class="list-group-item">Asana</li>
                        <li class="list-group-item">ClickUp</li>
                    </ul>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Contextual Classes</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use contextual classes to style list items with a
                        stateful background and color.</p>
                    <ul class="list-group">
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item list-group-item-primary">A simple primary
                            list group item</li>
                        <li class="list-group-item list-group-item-secondary">A simple secondary
                            list group item</li>
                        <li class="list-group-item list-group-item-success">A simple success
                            list group item</li>
                        <li class="list-group-item list-group-item-danger">A simple danger list
                            group item</li>
                        <li class="list-group-item list-group-item-warning">A simple warning
                            list group item</li>
                        <li class="list-group-item list-group-item-info">A simple info list
                            group item</li>
                        <li class="list-group-item list-group-item-light">A simple light list
                            group item</li>
                        <li class="list-group-item list-group-item-dark">A simple dark list
                            group item</li>
                    </ul>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Contextual Classes with Link</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use contextual classes to style list items with a
                        stateful background and color.</p>
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action" href="#">Darius ac facilities in</a>
                        <a class="list-group-item list-group-item-action list-group-item-primary" href="#">A simple
                            primary list group item</a>
                        <a class="list-group-item list-group-item-action list-group-item-secondary" href="#">A
                            simple secondary list group item</a>
                        <a class="list-group-item list-group-item-action list-group-item-success" href="#">A simple
                            success list group item</a>
                        <a class="list-group-item list-group-item-action list-group-item-danger" href="#">A simple
                            danger list group item</a>
                        <a class="list-group-item list-group-item-action list-group-item-warning" href="#">A simple
                            warning list group item</a>
                        <a class="list-group-item list-group-item-action list-group-item-info" href="#">A simple
                            info list group item</a>
                        <a class="list-group-item list-group-item-action list-group-item-light" href="#">A simple
                            light list group item</a>
                        <a class="list-group-item list-group-item-action list-group-item-dark" href="#">A simple
                            dark list group item</a>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Custom Content</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add nearly any HTML within, even for linked list
                        groups like the one below, with the help of flexbox utilities.</p>
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action active" href="#">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-2">List group item heading</h5>
                                <small>3 days ago</small>
                            </div>
                            <p class="mb-1">Donec id elit non mi porta gravida at eget metus.
                                Maecenas sed diam eget risus varius blandit.</p>
                            <small>Donec id elit non mi porta.</small>
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-2">List group item heading</h5>
                                <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-1">Donec id elit non mi porta gravida at eget metus.
                                Maecenas sed diam eget risus varius blandit.</p>
                            <small class="text-muted">Donec id elit non mi porta.</small>
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-2">List group item heading</h5>
                                <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-1">Donec id elit non mi porta gravida at eget metus.
                                Maecenas sed diam eget risus varius blandit.</p>
                            <small class="text-muted">Donec id elit non mi porta.</small>
                        </a>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">With Badges</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add badges to any list group item to show unread
                        counts, activity, and more with the help of some utilities.</p>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Gmail Notifications
                            <span class="badge bg-primary rounded-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Unprocessed Orders
                            <span class="badge bg-success rounded-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Urgent Tickets
                            <span class="badge bg-danger rounded-pill">99+</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Completed Transactions
                            <span class="badge bg-success rounded-pill">20+</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Invoices Awaiting Approval
                            <span class="badge bg-warning rounded-pill">12</span>
                        </li>
                    </ul>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Checkboxes and Radios</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Place Bootstrap’s checkboxes and radios within list
                        group items and customize as needed. You can use them without
                        <code>&lt;label&gt;</code>s, but please remember to include an
                        <code>aria-label</code> attribute and value for accessibility.
                    </p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <input class="form-check-input me-1" id="newsletterCheckbox" type="checkbox"
                                value="" />
                            <label class="form-check-label" for="newsletterCheckbox">Subscribe to newsletter</label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" id="termsCheckbox" type="checkbox" value="" />
                            <label class="form-check-label" for="termsCheckbox">Accept terms and conditions</label>
                        </li>
                    </ul>
                    <ul class="list-group mt-2">
                        <li class="list-group-item">
                            <input checked="" class="form-check-input me-1" id="emailRadio"
                                name="notificationOptions" type="radio" value="" />
                            <label class="form-check-label" for="emailRadio">Notify by Email</label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" id="smsRadio" name="notificationOptions"
                                type="radio" value="" />
                            <label class="form-check-label" for="smsRadio">Notify by SMS</label>
                        </li>
                    </ul>
                </div> <!-- end card body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Numbered</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Numbers are generated by <code>counter-reset</code> on
                        the <code>&lt;ol&gt;</code>, and then styled and placed with a
                        <code>::before</code> psuedo-element on the <code>&lt;li&gt;</code> with
                        <code>counter-increment</code> and <code>content</code>.
                    </p>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Admin Dashboard Pro</div>
                                A premium admin dashboard with modern UI components.
                            </div>
                            <span class="badge bg-primary rounded-pill">865</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Vue Admin Lite</div>
                                Clean and minimal admin panel built with Vue.js.
                            </div>
                            <span class="badge bg-primary rounded-pill">140</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Angular Admin Panel</div>
                                Lightweight and powerful Angular-based admin template.
                            </div>
                            <span class="badge bg-primary rounded-pill">85</span>
                        </li>
                    </ol>
                </div> <!-- end card body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
