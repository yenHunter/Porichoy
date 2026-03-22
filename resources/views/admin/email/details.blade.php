@extends('layouts.vertical', ['title' => 'Design Reviews & Feedback'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Apps', 'title' => 'Email'])

    <div class="outlook-box gap-1 email-app">
        <div class="offcanvas-lg offcanvas-start outlook-left-menu outlook-left-menu-sm" id="emailSidebaroffcanvas"
            tabindex="-1">
            <div class="card h-100 mb-0 rounded-end-0" data-simplebar="">
                <div class="card-body">
                    <a class="btn btn-danger fw-medium w-100" href="{{ route('second', ['email', 'compose']) }}">Compose</a>
                    <div class="list-group list-group-flush list-custom mt-3">
                        <a class="list-group-item list-group-item-action active" href="{{ route('any', 'email') }}">
                            <i class="ti ti-inbox me-1 opacity-75 fs-lg align-middle"></i>
                            <span class="align-middle">Inbox</span>
                            <span class="badge align-middle bg-danger-subtle fs-xxs text-danger float-end">21</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-send align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Sent</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-star align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Starred</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-clock align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Scheduled</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-pencil align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Drafts</span>
                            <span class="badge align-middle bg-secondary-subtle text-secondary fs-xxs float-end">9</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-alert-circle align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Important</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-ban me-1 align-middle opacity-75 fs-lg"></i>
                            <span class="align-middle">Spam</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-trash me-1 align-middle opacity-75 fs-lg"></i>
                            <span class="align-middle">Trash</span>
                        </a>
                        <div class="list-group-item mt-2">
                            <span class="align-middle">Labels</span>
                        </div>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-chart-donut-filled me-1 align-middle fs-sm text-primary"></i>
                            <span class="align-middle">Business</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-chart-donut-filled me-1 align-middle fs-sm text-secondary"></i>
                            <span class="align-middle">Personal</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-chart-donut-filled me-1 align-middle fs-sm text-info"></i>
                            <span class="align-middle">Friends</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="javascript: void(0);">
                            <i class="ti ti-chart-donut-filled me-1 align-middle fs-sm text-warning"></i>
                            <span class="align-middle">Family</span>
                        </a>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="card h-100 mb-0 rounded-start-0 flex-grow-1 border-start-0">
            <div class="card-header d-lg-none d-flex gap-2">
                <button aria-controls="emailSidebaroffcanvas" class="btn btn-default btn-icon"
                    data-bs-target="#emailSidebaroffcanvas" data-bs-toggle="offcanvas" type="button">
                    <i class="ti ti-menu-2 fs-lg"></i>
                </button>
                <div class="app-search">
                    <input class="form-control" placeholder="Search mails..." type="text" />
                    <i class="app-search-icon text-muted" data-lucide="search"></i>
                </div>
            </div>
            <div class="card-header card-bg justify-content-between">
                <div class="d-flex flex-wrap align-items-center gap-1">
                    <!-- Back to Inbox -->
                    <a class="btn btn-default btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        href="{{ route('any', 'email') }}" title="Back to Inbox">
                        <i class="ti ti-arrow-left-dashed fs-lg"></i>
                    </a>
                    <!-- Delete -->
                    <button class="btn btn-default btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        title="Delete" type="button">
                        <i class="ti ti-trash fs-lg"></i>
                    </button>
                    <!-- Mark as Read -->
                    <button class="btn btn-default btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        title="Mark as Read" type="button">
                        <i class="ti ti-mail-opened fs-lg"></i>
                    </button>
                    <!-- Archive -->
                    <button class="btn btn-default btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        title="Archive" type="button">
                        <i class="ti ti-archive fs-lg"></i>
                    </button>
                    <!-- Move to Folder -->
                    <button class="btn btn-default btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        title="Move to Folder" type="button">
                        <i class="ti ti-folder fs-lg"></i>
                    </button>
                </div>
                <div class="d-flex align-items-center gap-1">
                    <button class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle" type="button">
                        <i class="ti ti-share-3 fs-xl"></i>
                    </button>
                    <button class="btn btn-icon btn-sm btn-ghost-dark rounded-circle" type="button">
                        <i class="ti ti-dots-vertical fs-xl"></i>
                    </button>
                </div>
            </div>
            <div class="card-body pt-0 pb-5" data-simplebar="" data-simplebar-md="" style="height: calc(100% - 100px);">
                <h4 class="py-3 mb-0 sticky-top bg-body-secondary">Design Reviews &amp; Feedback</h4>
                <!-- Email One -->
                <div class="pb-3">
                    <div class="d-flex align-items-center">
                        <a aria-controls="EmailOne" aria-expanded="false"
                            class="d-flex align-items-center flex-grow-1 text-reset" data-bs-toggle="collapse"
                            href="#EmailOne" role="button">
                            <img alt="User Avatar" class="avatar-md rounded-circle" src="/images/users/user-3.jpg" />
                            <div class="ms-2 overflow-hidden">
                                <h5 class="fs-sm mb-0 text-truncate">John Maxwell</h5>
                                <p class="text-muted mb-0 text-truncate">john.maxwell@uxstudio.com</p>
                            </div>
                        </a>
                        <div class="ms-auto d-flex align-items-center gap-1">
                            <button class="btn btn-icon btn-sm btn-ghost-light rounded-circle"><i
                                    class="ti ti-star-filled text-warning fs-lg"></i></button>
                            <button class="btn btn-icon btn-sm btn-ghost-light text-dark rounded-circle"><i
                                    class="ti ti-mail-forward fs-lg"></i></button>
                            <button class="btn btn-icon btn-sm btn-ghost-light text-dark rounded-circle"><i
                                    class="ti ti-mail-opened fs-lg"></i></button>
                            <span class="text-muted fs-xs mb-0 ms-2">Apr 11, 07:47 AM</span>
                        </div>
                    </div>
                    <div class="collapse" id="EmailOne">
                        <div class="mt-3">
                            <p>Hey team,</p>
                            <p>I reviewed the new dashboard layout and overall it's looking solid. The spacing and
                                typography are much better than the previous version.</p>
                            <p>A couple of suggestions:</p>
                            <ul>
                                <li>Make the chart legends slightly smaller and lighter in color.</li>
                                <li>Try a softer drop shadow for the card components – they feel a bit harsh right now.</li>
                            </ul>
                            <p>Let me know if you need a quick call to discuss.</p>
                            <p class="mt-3 mb-0">Cheers,</p>
                            <p class="fw-medium mb-0">John</p>
                        </div>
                    </div>
                </div>
                <!-- Email Two -->
                <div class="py-3 border-top border-dashed">
                    <div class="d-flex align-items-center">
                        <a aria-controls="EmailThree" aria-expanded="false"
                            class="d-flex align-items-center flex-grow-1 text-reset" data-bs-toggle="collapse"
                            href="#EmailThree" role="button">
                            <img alt="User Avatar" class="avatar-md rounded-circle" src="/images/users/user-6.jpg" />
                            <div class="ms-2 overflow-hidden">
                                <h5 class="fs-sm mb-0 text-truncate">Anika Patel</h5>
                                <p class="text-muted mb-0 text-truncate">anika@creativemix.net</p>
                            </div>
                        </a>
                        <div class="ms-auto d-flex align-items-center gap-1">
                            <button class="btn btn-icon btn-sm btn-ghost-light rounded-circle">
                                <i class="ti ti-star-filled text-warning fs-lg"></i>
                            </button>
                            <button class="btn btn-icon btn-sm btn-ghost-light text-dark rounded-circle">
                                <i class="ti ti-mail-forward fs-lg"></i>
                            </button>
                            <button class="btn btn-icon btn-sm btn-ghost-light text-dark rounded-circle">
                                <i class="ti ti-mail-opened fs-lg"></i>
                            </button>
                            <span class="text-muted fs-xs mb-0 ms-2">Apr 11, 09:05 AM</span>
                        </div>
                    </div>
                    <div class="collapse" id="EmailThree">
                        <div class="mt-3">
                            <p>Hello team,</p>
                            <p>I did a final check on the landing page animations. Everything works smoothly except the
                                testimonial slider – there's a tiny jitter on loop transition.</p>
                            <p>Maybe easing timing or delay tweaks can help fix it. Otherwise, great job!</p>
                            <p>Let me know once it's deployed to staging so I can do one last run-through.</p>
                            <p class="mt-3 mb-0">Thanks,</p>
                            <p class="fw-medium mb-0">Anika</p>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex justify-content-between mt-3">
                                <h4 class="fs-sm text-muted">1 Attachment</h4>
                            </div>
                            <div class="mt-2 d-flex flex-wrap gap-2">
                                <div
                                    class="d-flex p-2 gap-2 align-items-center text-start position-relative border border-dashed rounded">
                                    <i class="ti ti-video fs-24 text-primary"></i>
                                    <div>
                                        <h4 class="fs-sm mb-1"><a class="link-reset stretched-link"
                                                href="#!">testimonial-glitch.mp4</a></h4>
                                        <p class="fs-xs mb-0">4.7 MB</p>
                                    </div>
                                    <i class="ti ti-download fs-xxl text-muted"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Email Three -->
                <div class="py-3 border-top border-dashed">
                    <div class="d-flex align-items-center">
                        <a aria-controls="EmailTwo" aria-expanded="false"
                            class="d-flex align-items-center flex-grow-1 text-reset" data-bs-toggle="collapse"
                            href="#EmailTwo" role="button">
                            <img alt="User Avatar" class="avatar-md rounded-circle" src="/images/users/user-5.jpg" />
                            <div class="ms-2 overflow-hidden">
                                <h5 class="fs-sm mb-0 text-truncate">Laura Chen</h5>
                                <p class="text-muted mb-0 text-truncate">laura.chen@designteam.co</p>
                            </div>
                        </a>
                        <div class="ms-auto d-flex align-items-center gap-1">
                            <button class="btn btn-icon btn-sm btn-ghost-light rounded-circle">
                                <i class="ti ti-star-filled text-warning fs-lg"></i>
                            </button>
                            <button class="btn btn-icon btn-sm btn-ghost-light text-dark rounded-circle">
                                <i class="ti ti-mail-forward fs-lg"></i>
                            </button>
                            <button class="btn btn-icon btn-sm btn-ghost-light text-dark rounded-circle">
                                <i class="ti ti-mail-opened fs-lg"></i>
                            </button>
                            <span class="text-muted fs-xs mb-0 ms-2">Apr 12, 11:42 AM</span>
                        </div>
                    </div>
                    <div class="collapse show" id="EmailTwo">
                        <div class="mt-lg-4 mt-3">
                            <p>Hi folks,</p>
                            <p>Thanks for sharing the prototype. The color scheme and layout look clean, but I think we can
                                still refine the mobile responsiveness on the pricing page.</p>
                            <p>Also, the button contrast on the footer needs more WCAG-friendly contrast – it's currently a
                                bit hard to read.</p>
                            <p>I’ve attached some screenshots with markup for clarity.</p>
                            <p class="mt-3 mb-0">Regards,</p>
                            <p class="fw-medium">Laura</p>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex justify-content-between mt-3">
                                <h4 class="fs-sm text-muted">2 Attachments</h4>
                            </div>
                            <div class="mt-2 d-flex flex-wrap gap-2">
                                <div
                                    class="d-flex p-2 gap-2 align-items-center text-start position-relative border border-dashed rounded">
                                    <i class="ti ti-file-text fs-24 text-danger"></i>
                                    <div>
                                        <h4 class="fs-sm mb-1"><a class="link-reset stretched-link"
                                                href="#!">footer-contrast-notes.pdf</a></h4>
                                        <p class="fs-xs mb-0">1.2 MB</p>
                                    </div>
                                    <i class="ti ti-download fs-xxl text-muted"></i>
                                </div>
                                <div
                                    class="d-flex p-2 gap-2 align-items-center text-start position-relative border border-dashed rounded">
                                    <i class="ti ti-photo fs-24 text-secondary"></i>
                                    <div>
                                        <h4 class="fs-sm mb-1"><a class="link-reset stretched-link"
                                                href="#!">responsive-issues.png</a></h4>
                                        <p class="fs-xs mb-0">850 KB</p>
                                    </div>
                                    <i class="ti ti-download fs-xxl text-muted"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Reply Box -->
                <div class="position-sticky bottom-0 z-1">
                    <div class="collapse" id="EmailReply">
                        <div class="mt-2 pb-5">
                            <textarea class="form-control rounded-top rounded-0" id="exampleFormControlTextarea1" placeholder="Enter message"
                                rows="6"></textarea>
                            <div class="bg-light-subtle p-2 rounded-bottom border border-top-0">
                                <div class="d-flex gap-1 align-items-center">
                                    <button class="btn btn-sm btn-icon btn-light" data-bs-placement="top"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" title="Bold" type="button">
                                        <i class="ti ti-bold"></i>
                                    </button>
                                    <button class="btn btn-sm btn-icon btn-light" data-bs-placement="top"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" title="Italic" type="button">
                                        <i class="ti ti-italic"></i>
                                    </button>
                                    <button class="btn btn-sm btn-icon btn-light" data-bs-placement="top"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" title="Attach files"
                                        type="button">
                                        <i class="ti ti-paperclip"></i>
                                    </button>
                                    <button class="btn btn-sm btn-icon btn-light" data-bs-placement="top"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" title="Insert link"
                                        type="button">
                                        <i class="ti ti-link"></i>
                                    </button>
                                    <button class="btn btn-sm btn-icon btn-light" data-bs-placement="top"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" title="Insert photo"
                                        type="button">
                                        <i class="ti ti-photo-up"></i>
                                    </button>
                                    <button class="btn btn-sm btn-light ms-auto" data-bs-target="#EmailReply"
                                        data-bs-toggle="collapse" type="button">
                                        <i class="ti ti-x me-1"></i> Cancel
                                    </button>
                                    <button class="btn btn-sm btn-success" type="button">
                                        <i class="ti ti-send me-1"></i> Send
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-body -->
            <div
                class="card-header bg-body-secondary border-top border-dashed border-bottom-0 position-absolute bottom-0 w-100">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <button aria-controls="EmailReply" aria-expanded="false" class="btn btn-sm btn-default"
                            data-bs-target="#EmailReply" data-bs-toggle="collapse" type="button">
                            <i class="ti ti-share-3 fs-lg"></i>
                            <span class="fw-medium ms-1">Reply</span>
                        </button>
                        <button class="btn btn-sm btn-default" type="button">
                            <i class="ti ti-arrow-big-left fs-lg"></i>
                            <span class="fw-medium ms-1">Forward</span>
                        </button>
                        <button class="btn btn-sm btn-default" type="button">
                            <i class="ti ti-printer fs-lg"></i>
                            <span class="fw-medium ms-1">Print</span>
                        </button>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div> <!-- end row-->
@endsection

@section('scripts')
@endsection
