@extends('layouts.vertical', ['title' => 'Social Feed'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Apps', 'title' => 'Social Feed'])

    <div class="row">
        <div class="col-xl-3 col-lg-6 order-lg-1 order-xl-1">
            <div class="card card-top-sticky">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-2 position-relative">
                            <img alt="avatar" class="rounded" height="42" src="/images/users/user-3.jpg" width="42" />
                        </div>
                        <div>
                            <h5 class="mb-0 d-flex align-items-center">
                                <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Geneva Lee</a>
                                <img alt="US" class="ms-2 rounded-circle" height="16" src="/images/flags/us.svg" />
                            </h5>
                            <p class="text-muted mb-0">Content Creator</p>
                        </div>
                        <div class="ms-auto">
                            <div class="dropdown">
                                <a class="btn btn-icon btn-ghost-light text-muted" data-bs-toggle="dropdown" href="#">
                                    <i class="ti ti-dots-vertical fs-xl"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">View Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Send Message</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Profile Link</a></li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                    <li><a class="dropdown-item text-danger" href="#">Block User</a></li>
                                    <li><a class="dropdown-item text-danger" href="#">Report User</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="list-group list-group-flush list-custom mt-3">
                        <a class="list-group-item list-group-item-action active" href="feed">
                            <i class="ti ti-home me-1 opacity-75 fs-lg align-middle"></i>
                            <span class="align-middle">News Feed</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="messages">
                            <i class="ti ti-message-circle align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Messages</span>
                            <span class="badge align-middle bg-danger-subtle fs-xxs text-danger float-end">5</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="friends">
                            <i class="ti ti-users align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Friends</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="notifications">
                            <i class="ti ti-bell align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Notifications</span>
                            <span class="badge align-middle bg-warning-subtle text-warning fs-xxs float-end">12</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="groups">
                            <i class="ti ti-layout-grid align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Groups</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="pages">
                            <i class="ti ti-book align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Pages</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="events">
                            <i class="ti ti-calendar-event align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Events</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="settings">
                            <i class="ti ti-settings align-middle me-1 opacity-75 fs-lg"></i>
                            <span class="align-middle">Settings</span>
                        </a>
                        <div class="list-group-item mt-2">
                            <span class="align-middle">Categories</span>
                        </div>
                        <a class="list-group-item list-group-item-action" href="#">
                            <i class="ti ti-tag me-1 align-middle fs-sm text-primary"></i>
                            <span class="align-middle">Technology</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <i class="ti ti-tag me-1 align-middle fs-sm text-success"></i>
                            <span class="align-middle">Travel</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <i class="ti ti-tag me-1 align-middle fs-sm text-danger"></i>
                            <span class="align-middle">Lifestyle</span>
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <i class="ti ti-tag me-1 align-middle fs-sm text-info"></i>
                            <span class="align-middle">Photography</span>
                        </a>
                    </div>
                </div>
            </div> <!-- end card-->
        </div>
        <!-- end col-->
        <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-2">What's on your mind?</h5>
                    <!-- Post Form -->
                    <form action="#">
                        <textarea class="form-control" placeholder="Share your thoughts..." rows="3"></textarea>
                        <div class="d-flex pt-2 justify-content-between align-items-center">
                            <div class="d-flex gap-1">
                                <a class="btn btn-sm btn-icon btn-light" href="#" title="Tag People"><i
                                        class="ti ti-user fs-md"></i></a>
                                <a class="btn btn-sm btn-icon btn-light" href="#" title="Add Location"><i
                                        class="ti ti-map-pin fs-md"></i></a>
                                <a class="btn btn-sm btn-icon btn-light" href="#" title="Upload Photo"><i
                                        class="ti ti-camera fs-md"></i></a>
                                <a class="btn btn-sm btn-icon btn-light" href="#" title="Add Emoji"><i
                                        class="ti ti-mood-smile fs-md"></i></a>
                            </div>
                            <button class="btn btn-dark btn-sm" type="submit">Post</button>
                        </div>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-body pb-2">
                    <div class="d-flex align-items-center mb-2">
                        <img alt="Generic placeholder image" class="me-2 avatar-md rounded-circle"
                            src="/images/users/user-10.jpg" />
                        <div class="w-100">
                            <h5 class="m-0"><a class="link-reset"
                                    href="{{ route('second', ['users', 'profile']) }}">Jeremy Tomlinson</a></h5>
                            <p class="text-muted mb-0"><small>about 2 minutes ago</small></p>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle text-muted drop-arrow-none card-drop p-0" data-bs-toggle="dropdown"
                                href="#">
                                <i class="ti ti-dots-vertical fs-lg"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-edit me-2"></i>Edit Post
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-trash me-2"></i>Delete Post
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-share me-2"></i>Share
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-pin me-2"></i>Pin to Top
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-flag me-2"></i>Report Post
                                </a>
                            </div>
                        </div>
                    </div>
                    <p>Story based around the idea of time lapse, animation to post soon!</p>
                    <div class="row g-1">
                        <!-- Left tall image -->
                        <div class="col-md-6">
                            <img alt="Tall Image" class="img-fluid w-100 h-100 rounded" src="/images/stock/gallery-1.jpg"
                                style="aspect-ratio: 3/4; object-fit: cover;" />
                        </div>
                        <!-- Right column with two stacked images -->
                        <div class="col-md-6 d-flex flex-column gap-1">
                            <img alt="Top Right" class="img-fluid w-100 rounded" src="/images/stock/gallery-2.jpg"
                                style="aspect-ratio: 4/3; object-fit: cover;" />
                            <img alt="Bottom Right" class="img-fluid w-100 rounded" src="/images/stock/gallery-3.jpg"
                                style="aspect-ratio: 4/3; object-fit: cover;" />
                        </div>
                    </div>
                    <div class="mt-2">
                        <a class="btn btn-sm fs-sm btn-link text-muted" href="javascript: void(0);"><i
                                class="ti ti-arrow-back-up me-1"></i> Reply</a>
                        <span class="btn btn-sm fs-sm btn-link text-muted" data-toggler="on">
                            <span class="align-middle" data-toggler-on=""><i class="ti ti-heart-filled text-danger"></i>
                                Liked!</span>
                            <span class="d-none align-middle" data-toggler-off=""><i class="ti ti-heart text-muted"></i>
                                Like</span>
                        </span>
                        <a class="btn btn-sm fs-sm btn-link text-muted" href="javascript: void(0);"><i
                                class="ti ti-share-3 me-1"></i> Share</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body pb-2">
                    <div class="d-flex align-items-center mb-2">
                        <img alt="Generic placeholder image" class="me-2 avatar-sm rounded-circle"
                            src="/images/users/user-4.jpg" />
                        <div class="w-100">
                            <h5 class="m-0"><a class="link-reset"
                                    href="{{ route('second', ['users', 'profile']) }}">Sophia Martinez</a></h5>
                            <p class="text-muted mb-0"><small>about 30 minutes ago</small></p>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle text-muted drop-arrow-none card-drop p-0" data-bs-toggle="dropdown"
                                href="#">
                                <i class="ti ti-dots-vertical fs-lg"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-edit me-2"></i>Edit Post
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-trash me-2"></i>Delete Post
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-share me-2"></i>Share
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-pin me-2"></i>Pin to Top
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-flag me-2"></i>Report Post
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="fs-16 text-center mt-3 mb-4 fst-italic">
                        <i class="ti ti-quote fs-20"></i>
                        Just finished a weekend project! Built a small weather app using React and OpenWeather API.
                        Feeling excited to share the results with everyone soon. 🚀
                    </div>
                    <div class="bg-light-subtle mx-n3 p-3 border-top border-bottom border-dashed">
                        <div class="d-flex align-items-start">
                            <img alt="Generic placeholder image" class="me-2 avatar-sm rounded-circle"
                                src="/images/users/user-1.jpg" />
                            <div class="w-100">
                                <h5 class="mt-0 mb-1">
                                    <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Liam
                                        Johnson</a> <small class="text-muted fw-normal float-end">10 minutes ago</small>
                                </h5>
                                That sounds awesome! Can't wait to see how you designed the UI.
                                <br />
                                <a class="text-muted font-13 d-inline-block mt-2" href="javascript:void(0);">
                                    <i class="ti ti-arrow-back-up"></i> Reply
                                </a>
                                <div class="d-flex align-items-start mt-3">
                                    <a class="pe-2" href="#">
                                        <img alt="Generic placeholder image" class="avatar-sm rounded-circle"
                                            src="/images/users/user-2.jpg" />
                                    </a>
                                    <div class="w-100">
                                        <h5 class="mt-0 mb-1">
                                            <a class="link-reset"
                                                href="{{ route('second', ['users', 'profile']) }}">Olivia Carter</a> <small
                                                class="text-muted fw-normal float-end">5 minutes ago</small>
                                        </h5>
                                        I recently built something similar with Vue. Let's collaborate sometime!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-3">
                            <a class="pe-2" href="#">
                                <img alt="Generic placeholder image" class="rounded-circle" height="31"
                                    src="/images/users/user-3.jpg" />
                            </a>
                            <div class="w-100">
                                <input class="form-control form-control-sm" id="simpleinput"
                                    placeholder="Add a comment..." type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a class="btn btn-sm fs-sm btn-link text-muted" href="javascript: void(0);"><i
                                class="ti ti-arrow-back-up me-1"></i> Reply</a>
                        <span class="btn btn-sm fs-sm btn-link text-muted" data-toggler="off">
                            <span class="d-none align-middle" data-toggler-on=""><i
                                    class="ti ti-heart-filled text-danger"></i> Liked!</span>
                            <span class="align-middle" data-toggler-off=""><i class="ti ti-heart text-muted"></i> Likes
                                (45)</span>
                        </span>
                        <a class="btn btn-sm fs-sm btn-link text-muted" href="javascript: void(0);"><i
                                class="ti ti-share-3 me-1"></i> Share</a>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-body pb-2">
                    <div class="d-flex align-items-center mb-2">
                        <img alt="Profile photo of Anika Roy" class="me-2 avatar-sm rounded-circle"
                            src="/images/users/user-2.jpg" />
                        <div class="w-100">
                            <h5 class="m-0"><a class="link-reset"
                                    href="{{ route('second', ['users', 'profile']) }}">Anika Roy</a></h5>
                            <p class="text-muted mb-0"><small>2 hours ago</small></p>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle text-muted drop-arrow-none card-drop p-0" data-bs-toggle="dropdown"
                                href="#">
                                <i class="ti ti-dots-vertical fs-lg"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-edit me-2"></i>Edit Post
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-trash me-2"></i>Delete Post
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-share me-2"></i>Share
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-pin me-2"></i>Pin to Top
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-flag me-2"></i>Report Post
                                </a>
                            </div>
                        </div>
                    </div>
                    <p>Sharing a couple of timelapses from my recent Iceland trip. Let me know which one you like most!</p>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="ratio ratio-16x9 rounded overflow-hidden">
                                <iframe allowfullscreen="" src="https://player.vimeo.com/video/1084537"></iframe>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ratio ratio-16x9 rounded overflow-hidden">
                                <iframe allowfullscreen="" src="https://player.vimeo.com/video/76979871"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a class="btn btn-sm fs-sm btn-link text-muted" href="javascript: void(0);"><i
                                class="ti ti-arrow-back-up me-1"></i> Reply</a>
                        <span class="btn btn-sm fs-sm btn-link text-muted" data-toggler="on">
                            <span class="align-middle" data-toggler-on=""><i class="ti ti-heart-filled text-danger"></i>
                                Liked!</span>
                            <span class="d-none align-middle" data-toggler-off=""><i class="ti ti-heart text-muted"></i>
                                Like</span>
                        </span>
                        <a class="btn btn-sm fs-sm btn-link text-muted" href="javascript: void(0);"><i
                                class="ti ti-share-3 me-1"></i> Share</a>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-body">
                    <!-- User Info -->
                    <div class="d-flex align-items-center mb-2">
                        <img alt="Profile photo of David Kim" class="me-2 avatar-sm rounded-circle"
                            src="/images/users/user-6.jpg" />
                        <div class="w-100">
                            <h5 class="m-0"><a class="link-reset"
                                    href="{{ route('second', ['users', 'profile']) }}">David Kim</a></h5>
                            <p class="text-muted mb-0"><small>Posted 1 hour ago</small></p>
                        </div>
                        <!-- Dropdown Menu -->
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle text-muted drop-arrow-none card-drop p-0" data-bs-toggle="dropdown"
                                href="#">
                                <i class="ti ti-dots-vertical fs-lg"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-edit me-2"></i>Edit Poll
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-trash me-2"></i>Delete Poll
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-bar-chart me-2"></i>View Results
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-share me-2"></i>Share Poll
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-flag me-2"></i>Report Content
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Poll Content -->
                    <h5 class="mb-3">🔥 Quick Poll: What’s your go-to front-end framework in 2025?</h5>
                    <p class="text-muted">We’re gathering developer preferences for our next project. Cast your vote below!
                        💻</p>
                    <!-- Poll Form -->
                    <form>
                        <div class="form-check mb-1">
                            <input class="form-check-input" id="optionReact" name="framework_poll" type="radio" />
                            <label class="form-check-label" for="optionReact">React (Meta)</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" id="optionVue" name="framework_poll" type="radio" />
                            <label class="form-check-label" for="optionVue">Vue.js (Evan You)</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" id="optionAngular" name="framework_poll" type="radio" />
                            <label class="form-check-label" for="optionAngular">Angular (Google)</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="optionSvelte" name="framework_poll" type="radio" />
                            <label class="form-check-label" for="optionSvelte">Svelte (Emerging Favorite)</label>
                        </div>
                        <button class="btn btn-sm btn-primary" type="submit">Submit Vote</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- User Info -->
                    <div class="d-flex align-items-center mb-3">
                        <img alt="Profile photo of Anika Roy" class="me-2 avatar-sm rounded-circle"
                            src="/images/users/user-2.jpg" />
                        <div class="w-100">
                            <h5 class="m-0"><a class="link-reset"
                                    href="{{ route('second', ['users', 'profile']) }}">Anika Roy</a></h5>
                            <p class="text-muted mb-0"><small>Posted 2 hours ago</small></p>
                        </div>
                        <!-- Dropdown Menu -->
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle text-muted drop-arrow-none card-drop p-0" data-bs-toggle="dropdown"
                                href="#">
                                <i class="ti ti-dots-vertical fs-lg"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-edit me-2"></i>Edit Event
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-trash me-2"></i>Cancel Event
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-calendar-event me-2"></i>Add to Calendar
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-share me-2"></i>Share Event
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-flag me-2"></i>Report Post
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Event Details -->
                    <h5 class="mb-2">📢 You're Invited: <strong>Dev Meetup 2025 – Build with AI</strong></h5>
                    <p class="text-muted mb-2">
                        Join developers and tech enthusiasts for an inspiring evening of AI-driven development talks, live
                        demos, and networking opportunities.
                    </p>
                    <ul class="list-unstyled mb-3">
                        <li class="pb-2"><strong>Date:</strong> Friday, 25th July 2025</li>
                        <li class="pb-2"><strong>Time:</strong> 6:00 PM IST</li>
                        <li><strong>Location:</strong> Online (Zoom – link to be shared)</li>
                    </ul>
                    <!-- Call to Action -->
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="ti ti-bell-plus me-1"></i> Interested
                        </button>
                        <button class="btn btn-sm btn-primary">
                            <i class="ti ti-login me-1"></i> Join Now
                        </button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <!-- Icon and Title -->
                    <h1 class="mb-2">🏆</h1>
                    <h4 class="mb-1 fw-semibold">Congratulations, Anika! 🎉</h4>
                    <!-- Achievement Message -->
                    <p class="text-muted fst-italic mb-3">
                        You’ve hit <strong>1,000 followers</strong>! Your content is making waves in the community!
                    </p>
                    <!-- Stats (optional) -->
                    <div class="d-flex justify-content-center mb-3">
                        <div class="me-4 text-center">
                            <h6 class="mb-0">Posts</h6>
                            <span class="fw-bold">135</span>
                        </div>
                        <div class="me-4 text-center">
                            <h6 class="mb-0">Likes</h6>
                            <span class="fw-bold">8,400</span>
                        </div>
                        <div class="text-center">
                            <h6 class="mb-0">Followers</h6>
                            <span class="fw-bold">1,000</span>
                        </div>
                    </div>
                    <!-- Call to Action -->
                    <button class="btn btn-sm btn-outline-success me-2">
                        <i class="ti ti-share me-1"></i> Share Achievement
                    </button>
                    <a class="btn btn-sm btn-primary" href="{{ route('second', ['users', 'profile']) }}">
                        <i class="ti ti-trophy me-1"></i> View Profile
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center gap-2 p-3 mb-3">
                <strong>Loading...</strong>
                <div aria-hidden="true" class="spinner-border spinner-border-sm text-danger" role="status"></div>
            </div>
        </div>
        <!-- end col-->
        <div class="col-xl-3 col-lg-6 order-lg-1 order-xl-2">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Activity</h5>
                        <a class="link-reset fs-sm" href="#">See all</a>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted text-uppercase">Stories About You</small>
                        <div class="d-flex align-items-center mt-2">
                            <img alt="mention" class="rounded-circle me-2" height="32"
                                src="/images/users/user-7.jpg" width="32" />
                            <div>
                                <strong>Mentions</strong><br />
                                <span class="text-muted fs-xs">3 stories mention you</span>
                            </div>
                        </div>
                    </div>
                    <span class="text-muted fs-xs fw-bold text-uppercase">New</span>
                    <ul class="list-unstyled mt-2 mb-0">
                        <li class="d-flex align-items-center py-1">
                            <img alt="jenny.w" class="rounded-circle me-2" height="36"
                                src="/images/users/user-8.jpg" width="36" />
                            <div class="flex-grow-1">
                                <strong>jenny.w</strong> started following you<br />
                                <span class="text-muted fs-xs">2m ago</span>
                            </div>
                            <div class="text-primary"><i class="ti ti-user-plus fs-lg"></i></div>
                        </li>
                        <li class="d-flex align-items-center py-1">
                            <img alt="daniel92" class="rounded-circle me-2" height="36"
                                src="/images/users/user-9.jpg" width="36" />
                            <div class="flex-grow-1">
                                <strong>daniel92</strong> commented on your post<br />
                                <span class="text-muted fs-xs">3m ago</span>
                            </div>
                            <div><img alt="commented" class="rounded" height="32" src="/images/stock/gallery-2.jpg"
                                    width="32" /></div>
                        </li>
                        <li class="d-flex align-items-center py-1">
                            <img alt="amelie.design" class="rounded-circle me-2" height="36"
                                src="/images/users/user-10.jpg" width="36" />
                            <div class="flex-grow-1">
                                <strong>amelie.design</strong> liked your story<br />
                                <span class="text-muted fs-xs">4m ago</span>
                            </div>
                            <div><img alt="liked" class="rounded" height="32" src="/images/stock/gallery-3.jpg"
                                    width="32" /></div>
                        </li>
                        <li class="d-flex align-items-center py-1">
                            <img alt="johnny_dev" class="rounded-circle me-2" height="36"
                                src="/images/users/user-5.jpg" width="36" />
                            <div class="flex-grow-1">
                                <strong>johnny_dev</strong> started following you<br />
                                <span class="text-muted fs-xs">6m ago</span>
                            </div>
                            <div class="text-primary"><i class="ti ti-user-plus fs-lg"></i></div>
                        </li>
                        <li class="d-flex align-items-center py-1">
                            <img alt="art.gal" class="rounded-circle me-2" height="36"
                                src="/images/users/user-6.jpg" width="36" />
                            <div class="flex-grow-1">
                                <strong>art.gal</strong> liked your post<br />
                                <span class="text-muted fs-xs">8m ago</span>
                            </div>
                            <div><img alt="liked" class="rounded" height="32" src="/images/stock/gallery-2.jpg"
                                    width="32" /></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header justify-content-between align-items-center border-dashed">
                    <h4 class="card-title mb-0">Trending</h4>
                    <div class="dropdown">
                        <a class="dropdown-toggle text-muted drop-arrow-none card-drop p-0" data-bs-toggle="dropdown"
                            href="#">
                            <i class="ti ti-dots-vertical fs-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">
                                <i class="ti ti-refresh me-2"></i>Refresh Feed
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="ti ti-settings me-2"></i>Manage Topics
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="ti ti-alert-circle me-2"></i>Report Issue
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Trending Items -->
                    <div class="d-flex mb-3">
                        <i class="ti ti-trending-up text-primary me-2 mt-1"></i>
                        <a class="link-reset text-decoration-none" href="#!">
                            <strong>Golden Globes:</strong> The 27 Best moments from the Golden Globe Awards
                        </a>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="ti ti-trending-up text-primary me-2 mt-1"></i>
                        <a class="link-reset text-decoration-none" href="#!">
                            <strong>World Cricket:</strong> India has won ICC T20 World Cup Yesterday
                        </a>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="ti ti-trending-up text-primary me-2 mt-1"></i>
                        <a class="link-reset text-decoration-none" href="#!">
                            <strong>Antarctica:</strong> Melting of Totten Glacier could cause high risk to areas near by
                            sea
                        </a>
                    </div>
                    <div class="d-flex">
                        <i class="ti ti-trending-up text-primary me-2 mt-1"></i>
                        <a class="link-reset text-decoration-none" href="#!">
                            <strong>Global Tournament:</strong> America has won Football match Yesterday
                        </a>
                    </div>
                </div>
            </div>
            <!-- end card-->
            <div class="card">
                <!-- Card Header -->
                <div class="card-header justify-content-between align-items-center border-dashed">
                    <h4 class="card-title mb-0">Requests</h4>
                    <div class="dropdown">
                        <a class="dropdown-toggle text-muted drop-arrow-none card-drop p-0" data-bs-toggle="dropdown"
                            href="#">
                            <i class="ti ti-dots-vertical fs-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">
                                <i class="ti ti-check me-2"></i>Mark All as Read
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="ti ti-trash me-2"></i>Clear All
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Request 1: Collaboration -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-start">
                            <img alt="Emily Zhang" class="avatar-xs rounded-circle me-2"
                                src="/images/users/user-3.jpg" />
                            <div>
                                <p class="mb-1">
                                    <strong>Emily Zhang</strong> requested to collaborate on your design project.
                                    <span class="badge bg-primary ms-1">New</span>
                                </p>
                                <small class="text-muted">2 minutes ago</small>
                            </div>
                        </div>
                        <button class="btn btn-sm py-0 px-1 btn-default">Accept</button>
                    </div>
                    <!-- Request 2: Feature Suggestion -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-start gap-2">
                            <div class="avatar-xs flex-shrink-0">
                                <span class="avatar-title text-bg-info rounded-circle">
                                    <i class="ti ti-rocket"></i>
                                </span>
                            </div>
                            <div>
                                <p class="mb-1">
                                    <strong>New Feature:</strong> Suggestion for dark mode support.
                                    <span class="badge bg-warning text-dark ms-1">Pending</span>
                                </p>
                                <small class="text-muted">10 minutes ago</small>
                            </div>
                        </div>
                        <button class="btn btn-sm py-0 px-1 btn-default">Review</button>
                    </div>
                    <!-- Request 3: Feedback -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-start">
                            <img alt="John Doe" class="avatar-xs rounded-circle me-2" src="/images/users/user-6.jpg" />
                            <div>
                                <p class="mb-1">
                                    <strong>Client Feedback:</strong> John Doe left a review on your dashboard.
                                    <span class="badge bg-secondary ms-1">Feedback</span>
                                </p>
                                <small class="text-muted">30 minutes ago</small>
                            </div>
                        </div>
                        <button class="btn btn-sm py-0 px-1 btn-default">Respond</button>
                    </div>
                    <!-- Request 4: Bug Report -->
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-start gap-2">
                            <div class="avatar-xs flex-shrink-0">
                                <span class="avatar-title text-bg-primary rounded-circle">
                                    <i class="ti ti-bug"></i>
                                </span>
                            </div>
                            <div>
                                <p class="mb-1">
                                    <strong>Bug Report:</strong> Login form issue on Safari mobile.
                                    <span class="badge bg-danger ms-1">Urgent</span>
                                </p>
                                <small class="text-muted">1 hour ago</small>
                            </div>
                        </div>
                        <button class="btn btn-sm py-0 px-1 btn-default">View</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header justify-content-between align-items-center border-dashed">
                    <h4 class="card-title mb-0">Featured Video For You</h4>
                    <div class="dropdown">
                        <a class="dropdown-toggle text-muted drop-arrow-none card-drop p-0" data-bs-toggle="dropdown"
                            href="#">
                            <i class="ti ti-dots-vertical fs-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Watch Later</a>
                            <a class="dropdown-item" href="#">Report Video</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="ratio ratio-16x9 rounded overflow-hidden">
                        <iframe allowfullscreen="" src="https://player.vimeo.com/video/357274789"></iframe>
                    </div>
                </div> <!-- end card-body-->
            </div>
            <!-- end card-->
        </div>
        <!-- end col-->
    </div>
    <!-- end-->
@endsection

@section('scripts')
@endsection
