@extends('layouts.vertical', ['title' => 'Tabs'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Tabs'])

    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Default Tabs</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Simple widget of tabbable panes of local content.</p>
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#overview">
                                Overview
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="true" class="nav-link active" data-bs-toggle="tab" href="#activity">
                                Activity
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#settings">
                                Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link disabled" data-bs-toggle="tab" href="#">
                                Disabled
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="overview">
                            <p class="mb-0">
                                This dashboard provides a quick overview of your recent activity, performance metrics, and
                                system status.
                                You can easily monitor key indicators, recent logins, pending tasks, and overall user
                                engagement.
                            </p>
                        </div>
                        <div class="tab-pane show active" id="activity">
                            <p class="mb-0">
                                View your latest interactions and actions taken across the platform. This includes recent
                                file uploads,
                                comments, status updates, and notification history to keep you up to date with ongoing
                                changes.
                            </p>
                        </div>
                        <div class="tab-pane" id="settings">
                            <p class="mb-0">
                                Customize your account preferences including theme options, notification settings, and
                                privacy controls.
                                Adjust layout configurations to suit your workflow and manage integration with third-party
                                services.
                            </p>
                        </div>
                    </div>
                </div> <!--end card body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Tabs Justified</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Using class <code>.nav-justified</code>, you can force your <code>tab menu
                            items</code> to use the full available width.</p>
                    <ul class="nav nav-justified nav-tabs mb-3">
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#overview1">
                                Overview
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="true" class="nav-link active" data-bs-toggle="tab" href="#profile1">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#settings1">
                                Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#projects1">
                                Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#support1">
                                Support
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="overview1">
                            <p class="mb-0">
                                Get a high-level summary of recent activity, key performance indicators, and important
                                announcements.
                                Stay informed and make quick decisions based on real-time insights.
                            </p>
                        </div>
                        <div class="tab-pane show active" id="profile1">
                            <p class="mb-0">
                                Customize your profile, update personal information, and manage security settings like
                                passwords and 2FA.
                                Keep your account secure and up to date with your latest details.
                            </p>
                        </div>
                        <div class="tab-pane" id="settings1">
                            <p class="mb-0">
                                Configure system preferences, theme options, and notification settings. Easily adapt the
                                platform to fit
                                your workflow and preferences.
                            </p>
                        </div>
                        <div class="tab-pane" id="projects1">
                            <p class="mb-0">
                                View and manage all ongoing projects, tasks, and milestones. Collaborate with your team and
                                track progress
                                in real-time.
                            </p>
                        </div>
                        <div class="tab-pane" id="support1">
                            <p class="mb-0">
                                Need help? Reach out to our support team or browse the help center for common questions,
                                guides, and documentation.
                            </p>
                        </div>
                    </div>
                </div> <!-- end card body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Tabs Vertical Left</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        You can stack your navigation by changing the flex item direction with the <code>.flex-column</code>
                        utility.
                    </p>
                    <div class="row">
                        <div class="col-sm-3 mb-2 mb-sm-0">
                            <div aria-orientation="vertical" class="nav flex-column nav-pills" id="v-pills-tab1"
                                role="tablist">
                                <a aria-controls="v-pills-home" aria-selected="true"
                                    class="nav-link fw-semibold active show" data-bs-toggle="pill" href="#v-pills-home"
                                    id="v-pills-home-tab" role="tab">
                                    Overview
                                </a>
                                <a aria-controls="v-pills-profile" aria-selected="false" class="nav-link fw-semibold"
                                    data-bs-toggle="pill" href="#v-pills-profile" id="v-pills-profile-tab"
                                    role="tab">
                                    Profile
                                </a>
                                <a aria-controls="v-pills-settings" aria-selected="false" class="nav-link fw-semibold"
                                    data-bs-toggle="pill" href="#v-pills-settings" id="v-pills-settings-tab"
                                    role="tab">
                                    Settings
                                </a>
                                <a aria-controls="v-pills-projects" aria-selected="false" class="nav-link fw-semibold"
                                    data-bs-toggle="pill" href="#v-pills-projects" id="v-pills-projects-tab"
                                    role="tab">
                                    Projects
                                </a>
                                <a aria-controls="v-pills-support" aria-selected="false" class="nav-link fw-semibold"
                                    data-bs-toggle="pill" href="#v-pills-support" id="v-pills-support-tab"
                                    role="tab">
                                    Support
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <!-- Overview Tab -->
                                <div aria-labelledby="v-pills-home-tab" class="tab-pane fade active show"
                                    id="v-pills-home" role="tabpanel">
                                    <p class="mb-2">Welcome to your dashboard. Get an at-a-glance view of your recent
                                        activity, top stats, and personalized suggestions to enhance productivity and stay
                                        on track.</p>
                                    <ul>
                                        <li>View total project status</li>
                                        <li>Quick links to recent files</li>
                                        <li>Weekly performance charts</li>
                                    </ul>
                                    <p class="mb-0">Your dashboard is tailored to your activity and roles. Stay informed
                                        and always one step ahead.</p>
                                </div>
                                <!-- Profile Tab -->
                                <div aria-labelledby="v-pills-profile-tab" class="tab-pane fade" id="v-pills-profile"
                                    role="tabpanel">
                                    <p class="mb-2">Manage your personal details, change your profile photo, and update
                                        your contact information.</p>
                                    <ul>
                                        <li>Name, Email, Phone</li>
                                        <li>Change Password</li>
                                        <li>Activity logs and preferences</li>
                                    </ul>
                                    <p class="mb-0">Keeping your profile up to date ensures a better and more secure
                                        experience.</p>
                                </div>
                                <!-- Settings Tab -->
                                <div aria-labelledby="v-pills-settings-tab" class="tab-pane fade" id="v-pills-settings"
                                    role="tabpanel">
                                    <p class="mb-2">Customize your preferences, notification options, and privacy
                                        settings.</p>
                                    <ul>
                                        <li>Theme selection: Light / Dark mode</li>
                                        <li>Email &amp; push notification toggles</li>
                                        <li>Linked accounts and integrations</li>
                                    </ul>
                                    <p class="mb-0">Settings help personalize your interface and improve your workflow
                                        efficiency.</p>
                                </div>
                                <!-- Projects Tab -->
                                <div aria-labelledby="v-pills-projects-tab" class="tab-pane fade" id="v-pills-projects"
                                    role="tabpanel">
                                    <p class="mb-2">Track all your active, completed, and upcoming projects in one place.
                                    </p>
                                    <ul>
                                        <li>Kanban board and Gantt charts</li>
                                        <li>Task assignments and deadlines</li>
                                        <li>Progress indicators and timelines</li>
                                    </ul>
                                    <p class="mb-0">Use collaboration tools, upload documents, and manage deliverables
                                        directly from here.</p>
                                </div>
                                <!-- Support Tab -->
                                <div aria-labelledby="v-pills-support-tab" class="tab-pane fade" id="v-pills-support"
                                    role="tabpanel">
                                    <p class="mb-2">Need assistance? Access our help center or contact our support team
                                        directly.</p>
                                    <ul>
                                        <li>Browse FAQs and tutorials</li>
                                        <li>Submit a support ticket</li>
                                        <li>Live chat with support agents</li>
                                    </ul>
                                    <p class="mb-0">We’re here 24/7 to assist you with anything you need—technical or
                                        account-related.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row-->
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Tabs with Colored Navs</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        You can add the <code>.nav-pills-*</code> class to the <code>.nav</code> element to apply colored
                        pill styles.
                    </p>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="tab-content" id="v-pills-tabContent1">
                                <!-- Overview Tab -->
                                <div aria-labelledby="v-pills-home-tab" class="tab-pane fade active show"
                                    id="v-pills-home-right" role="tabpanel">
                                    <p class="mb-2">Welcome to your dashboard. Get an at-a-glance view of your recent
                                        activity, top stats, and personalized suggestions to enhance productivity and stay
                                        on track.</p>
                                    <ul>
                                        <li>View total project status</li>
                                        <li>Quick links to recent files</li>
                                        <li>Weekly performance charts</li>
                                    </ul>
                                    <p class="mb-0">Your dashboard is tailored to your activity and roles. Stay informed
                                        and always one step ahead.</p>
                                </div>
                                <!-- Profile Tab -->
                                <div aria-labelledby="v-pills-profile-tab" class="tab-pane fade"
                                    id="v-pills-profile-right" role="tabpanel">
                                    <p class="mb-2">Manage your personal details, change your profile photo, and update
                                        your contact information.</p>
                                    <ul>
                                        <li>Name, Email, Phone</li>
                                        <li>Change Password</li>
                                        <li>Activity logs and preferences</li>
                                    </ul>
                                    <p class="mb-0">Keeping your profile up to date ensures a better and more secure
                                        experience.</p>
                                </div>
                                <!-- Settings Tab -->
                                <div aria-labelledby="v-pills-settings-tab" class="tab-pane fade"
                                    id="v-pills-settings-right" role="tabpanel">
                                    <p class="mb-2">Customize your preferences, notification options, and privacy
                                        settings.</p>
                                    <ul>
                                        <li>Theme selection: Light / Dark mode</li>
                                        <li>Email &amp; push notification toggles</li>
                                        <li>Linked accounts and integrations</li>
                                    </ul>
                                    <p class="mb-0">Settings help personalize your interface and improve your workflow
                                        efficiency.</p>
                                </div>
                                <!-- Projects Tab -->
                                <div aria-labelledby="v-pills-projects-tab" class="tab-pane fade"
                                    id="v-pills-projects-right" role="tabpanel">
                                    <p class="mb-2">Track all your active, completed, and upcoming projects in one place.
                                    </p>
                                    <ul>
                                        <li>Kanban board and Gantt charts</li>
                                        <li>Task assignments and deadlines</li>
                                        <li>Progress indicators and timelines</li>
                                    </ul>
                                    <p class="mb-0">Use collaboration tools, upload documents, and manage deliverables
                                        directly from here.</p>
                                </div>
                                <!-- Support Tab -->
                                <div aria-labelledby="v-pills-support-tab" class="tab-pane fade"
                                    id="v-pills-support-right" role="tabpanel">
                                    <p class="mb-2">Need assistance? Access our help center or contact our support team
                                        directly.</p>
                                    <ul>
                                        <li>Browse FAQs and tutorials</li>
                                        <li>Submit a support ticket</li>
                                        <li>Live chat with support agents</li>
                                    </ul>
                                    <p class="mb-0">We’re here 24/7 to assist you with anything you need—technical or
                                        account-related.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 mt-2 mt-sm-0">
                            <div aria-orientation="vertical" class="nav flex-column nav-pills nav-pills-secondary"
                                id="v-pills-tab" role="tablist">
                                <a aria-controls="v-pills-home" aria-selected="true"
                                    class="nav-link fw-semibold active show" data-bs-toggle="pill"
                                    href="#v-pills-home-right" id="v-pills-home-tab-right" role="tab">
                                    Overview
                                </a>
                                <a aria-controls="v-pills-profile" aria-selected="false" class="nav-link fw-semibold"
                                    data-bs-toggle="pill" href="#v-pills-profile-right" id="v-pills-profile-tab-right"
                                    role="tab">
                                    Profile
                                </a>
                                <a aria-controls="v-pills-settings" aria-selected="false" class="nav-link fw-semibold"
                                    data-bs-toggle="pill" href="#v-pills-settings-right" id="v-pills-settings-tab-right"
                                    role="tab">
                                    Settings
                                </a>
                                <a aria-controls="v-pills-projects" aria-selected="false" class="nav-link fw-semibold"
                                    data-bs-toggle="pill" href="#v-pills-projects-right" id="v-pills-projects-tab-right"
                                    role="tab">
                                    Projects
                                </a>
                                <a aria-controls="v-pills-support" aria-selected="false" class="nav-link fw-semibold"
                                    data-bs-toggle="pill" href="#v-pills-support-right" id="v-pills-support-tab-right"
                                    role="tab">
                                    Support
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end row-->
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Tabs Bordered</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        The navigation item can have a simple bottom border as well. Just specify the class
                        <code>.nav-bordered</code>.
                    </p>
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#home-b1">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="true" class="nav-link active" data-bs-toggle="tab" href="#profile-b1">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#settings-b1">
                                Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#about-b1">
                                About
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="home-b1">
                            <p class="mb-0">Welcome to our online platform! Here, we strive to offer the best products
                                and services tailored to your lifestyle. Whether you're redecorating your home or looking
                                for expert advice on the latest trends, we've got you covered.</p>
                        </div>
                        <div class="tab-pane show active" id="profile-b1">
                            <p class="mb-0">Hi! I am an avid explorer, constantly seeking new adventures and insights. My
                                passions include technology, literature, travel, fitness, and self-development. I enjoy
                                learning new skills and sharing knowledge with others to foster personal growth.</p>
                        </div>
                        <div class="tab-pane" id="settings-b1">
                            <p class="mb-0">Nestled in the heart of the city, a charming cafe offers a peaceful retreat
                                from the urban hustle. Its inviting ambiance, with its cozy decor and warm lighting,
                                provides the perfect setting for relaxation or a productive meeting.</p>
                        </div>
                        <div class="tab-pane" id="about-b1">
                            <p class="mb-0">Our company is dedicated to offering high-quality services and products
                                designed to enrich your life. With a focus on sustainability and innovation, we aim to
                                create lasting value for our customers. Join us on our journey to make everyday living
                                better!</p>
                        </div>
                    </div>
                </div> <!--  card body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Bordered Tabs with Colored Border</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        You can add the <code>.nav-bordered-*</code> class to the <code>.nav</code> element to apply colored
                        border styles.
                    </p>
                    <ul class="nav nav-tabs nav-justified nav-bordered nav-bordered-danger mb-3">
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#home-b2">
                                <i class="ti ti-home fs-lg me-md-1 align-middle"></i>
                                <span class="d-none d-md-inline-block align-middle">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="true" class="nav-link active" data-bs-toggle="tab" href="#profile-b2">
                                <i class="ti ti-user-circle fs-lg me-md-1 align-middle"></i>
                                <span class="d-none d-md-inline-block align-middle">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#settings-b2">
                                <i class="ti ti-settings fs-lg me-md-1 align-middle"></i>
                                <span class="d-none d-md-inline-block align-middle">Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#about-b2">
                                <i class="ti ti-info-circle fs-lg me-md-1 align-middle"></i>
                                <span class="d-none d-md-inline-block align-middle">About</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="home-b2">
                            <p class="mb-0">Welcome to our online platform! Our goal is to offer a wide variety of
                                products and services that meet the needs of modern living. From cutting-edge technology to
                                home decor solutions, we ensure that every product enhances your lifestyle and makes your
                                life easier.</p>
                        </div>
                        <div class="tab-pane show active" id="profile-b2">
                            <p class="mb-0">Hi there! I'm an avid explorer with a passion for technology, fitness, and
                                continuous learning. I enjoy meeting like-minded individuals and believe in expanding my
                                knowledge on diverse subjects, from the latest gadgets to personal development.</p>
                        </div>
                        <div class="tab-pane" id="settings-b2">
                            <p class="mb-0">In the center of the city stands a quiet, charming bookstore that offers a
                                peaceful retreat. Surrounded by vibrant streets, it provides a calm, inviting atmosphere for
                                readers to lose themselves in books while enjoying a cup of coffee in the cozy corner.</p>
                        </div>
                        <div class="tab-pane" id="about-b2">
                            <p class="mb-0">We are a forward-thinking company focused on creating innovative solutions
                                that empower our customers. Our team is driven by creativity and a passion for delivering
                                exceptional experiences through high-quality products and services that cater to a variety
                                of needs.</p>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Icons Tabs</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        The navigation item can have a simple bottom border as well. Just specify the class
                        <code>.nav-bordered</code>.
                    </p>
                    <ul class="nav nav-tabs nav-bordered nav-bordered-success mb-3">
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#home-i1">
                                <i class="ti ti-home fs-22 align-middle"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="true" class="nav-link active" data-bs-toggle="tab" href="#profile-i1">
                                <i class="ti ti-user fs-22 align-middle"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#settings-i1">
                                <i class="ti ti-settings fs-22 align-middle"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#about-i1">
                                <i class="ti ti-info-circle fs-22 align-middle"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#projects-i1">
                                <i class="ti ti-briefcase fs-22 align-middle"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#contact-i1">
                                <i class="ti ti-mail fs-22 align-middle"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="home-i1">
                            <p class="mb-0">Discover our platform designed to make your daily life easier. From modern
                                interiors to smart home gadgets, our curated selection is tailored for comfort,
                                functionality, and style.</p>
                        </div>
                        <div class="tab-pane show active" id="profile-i1">
                            <p class="mb-0">Hello! I’m a creative thinker who thrives on innovation and meaningful
                                connections. I enjoy exploring tech trends, reading insightful books, and traveling to
                                experience new cultures and cuisines.</p>
                        </div>
                        <div class="tab-pane" id="settings-i1">
                            <p class="mb-0">A peaceful workspace can make all the difference. That’s why we offer
                                customizable setups, soundproofing tips, and productivity tools to help you stay focused and
                                inspired every day.</p>
                        </div>
                        <div class="tab-pane" id="about-i1">
                            <p class="mb-0">We’re a team of innovators passionate about creating seamless experiences.
                                Our mission is to deliver solutions that merge design, functionality, and purpose in every
                                project we undertake.</p>
                        </div>
                        <div class="tab-pane" id="projects-i1">
                            <p class="mb-0">Our recent projects range from mobile app development to full-scale branding
                                initiatives. We believe in data-driven strategies paired with creative storytelling to drive
                                results.</p>
                        </div>
                        <div class="tab-pane" id="contact-i1">
                            <p class="mb-0">Have questions or ideas? We'd love to hear from you! Reach out through our
                                contact form, social media, or drop by our office for a chat over coffee.</p>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header card-tabs d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Card with Tabs</h4>
                    </div>
                    <ul class="nav nav-tabs nav-justified card-header-tabs nav-bordered">
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#home-ct">
                                <i class="ti ti-home d-md-none d-block"></i>
                                <span class="d-none d-md-block">Summary</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="true" class="nav-link active" data-bs-toggle="tab" href="#profile-ct">
                                <i class="ti ti-user-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">Accounts</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#settings-ct">
                                <i class="ti ti-settings d-md-none d-block"></i>
                                <span class="d-none d-md-block">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane" id="home-ct">
                            <p class="mb-0">
                                Welcome to your financial dashboard. Here, you can monitor real-time updates on your income,
                                expenses, savings, and investments. Our tools are designed to help you make informed
                                decisions and achieve your financial goals faster.
                            </p>
                        </div>
                        <div class="tab-pane show active" id="profile-ct">
                            <p class="mb-0">
                                View and manage all your bank accounts, credit cards, and loan details in one place. Link
                                your financial institutions securely and keep track of balances, transactions, and payment
                                schedules with ease.
                            </p>
                        </div>
                        <div class="tab-pane" id="settings-ct">
                            <p class="mb-0">
                                Customize your preferences including budgeting alerts, currency format, report frequency,
                                and security settings. Enable multi-factor authentication and choose how you'd like to
                                receive account activity notifications.
                            </p>
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
