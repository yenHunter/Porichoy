<!-- Sidenav Menu Start -->
<div class="sidenav-menu">
    <!-- Brand Logo -->
    <a class="logo" href="{{ route('home') }}">
        <span class="logo logo-light">
            <span class="logo-lg"><img alt="logo" src="{{ asset('static/Porichoy.png') }}" /></span>
            <span class="logo-sm"><img alt="small logo" src="{{ asset('static/porichoy-main.png') }}" /></span>
        </span>
        <span class="logo logo-dark">
            <span class="logo-lg"><img alt="dark logo" src="{{ asset('static/Porichoy.png') }}" /></span>
            <span class="logo-sm"><img alt="small logo" src="{{ asset('static/porichoy-main.png') }}" /></span>
        </span>
    </a>
    <!-- Sidebar Hover Menu Toggle Button -->
    <button class="button-on-hover">
        <i class="ti ti-menu-4 fs-22 align-middle"></i>
    </button>
    <!-- Full Sidebar Menu Close Button -->
    <button class="button-close-offcanvas">
        <i class="ti ti-x align-middle"></i>
    </button>
    <div class="scrollbar" data-simplebar="">
        <!-- User -->
        <div class="sidenav-user">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">
                        <img alt="user-image" class="rounded-circle mb-2 avatar-md" src="/images/users/user-3.jpg" />
                        <span class="sidenav-user-name fw-bold">Geneva K.</span>
                        <span class="fs-12 fw-semibold" data-lang="user-role">Art Director</span>
                    </a>
                </div>
                <div>
                    <a aria-expanded="false" aria-haspopup="false"
                        class="dropdown-toggle drop-arrow-none link-reset sidenav-user-set-icon" data-bs-offset="0,12"
                        data-bs-toggle="dropdown" href="#!">
                        <i class="ti ti-settings fs-24 align-middle ms-1"></i>
                    </a>
                    <div class="dropdown-menu">
                        <!-- Header -->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome back!</h6>
                        </div>
                        <!-- My Profile -->
                        <a class="dropdown-item" href="{{ route('second', ['users', 'profile']) }}">
                            <i class="ti ti-user-circle me-2 fs-17 align-middle"></i>
                            <span class="align-middle">Profile</span>
                        </a>
                        <!-- Notifications -->
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i class="ti ti-bell-ringing me-2 fs-17 align-middle"></i>
                            <span class="align-middle">Notifications</span>
                        </a>
                        <!-- Settings -->
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i class="ti ti-settings-2 me-2 fs-17 align-middle"></i>
                            <span class="align-middle">Account Settings</span>
                        </a>
                        <!-- Support -->
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i class="ti ti-headset me-2 fs-17 align-middle"></i>
                            <span class="align-middle">Support Center</span>
                        </a>
                        <!-- Divider -->
                        <div class="dropdown-divider"></div>
                        <!-- Lock -->
                        <a class="dropdown-item" href="{{ route('second', ['auth', 'lock-screen']) }}">
                            <i class="ti ti-lock me-2 fs-17 align-middle"></i>
                            <span class="align-middle">Lock Screen</span>
                        </a>
                        <!-- Logout -->
                        <a class="dropdown-item fw-semibold" href="javascript:void(0);">
                            <i class="ti ti-logout-2 me-2 fs-17 align-middle"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--- Sidenav Menu -->
        <ul class="side-nav">
            <li class="side-nav-title mt-2" data-lang="menu-title">Navigation</li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('home') }}">
                    <span class="menu-icon"><i data-lucide="circle-gauge"></i></span>
                    <span class="menu-text" data-lang="dashboard">Dashboard</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('visitor.index') }}" target="_blank">
                    <span class="menu-icon"><i data-lucide="earth"></i></span>
                    <span class="menu-text" data-lang="website">Website</span>
                </a>
            </li>
            <li class="side-nav-title" data-lang="modules">Modules</li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('module.education.view') }}">
                    <span class="menu-icon"><i data-lucide="graduation-cap"></i></span>
                    <span class="menu-text" data-lang="education"> Education </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('module.experience.view') }}">
                    <span class="menu-icon"><i data-lucide="briefcase"></i></span>
                    <span class="menu-text" data-lang="experience"> Experience </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('module.research.view') }}">
                    <span class="menu-icon"><i data-lucide="book"></i></span>
                    <span class="menu-text" data-lang="research"> Research </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('module.training.view') }}">
                    <span class="menu-icon"><i class="ti ti-certificate"></i></span>
                    <span class="menu-text" data-lang="training"> Training </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('module.blog.view') }}">
                    <span class="menu-icon"><i data-lucide="rss"></i></span>
                    <span class="menu-text" data-lang="blog"> Blog </span>
                </a>
            </li>
            <li class="side-nav-title mt-2" data-lang="elements">Elements</li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('element.skill.view') }}">
                    <span class="menu-icon"><i data-lucide="crown"></i></span>
                    <span class="menu-text" data-lang="skills"> Skills </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('element.service.view') }}">
                    <span class="menu-icon"><i data-lucide="wrench"></i></span>
                    <span class="menu-text" data-lang="services"> Services </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('element.client.view') }}">
                    <span class="menu-icon"><i data-lucide="chart-pie"></i></span>
                    <span class="menu-text" data-lang="clients"> Clients </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('element.project.view') }}">
                    <span class="menu-icon"><i data-lucide="chart-pie"></i></span>
                    <span class="menu-text" data-lang="projects"> Projects </span>
                </a>
            </li>
            <li class="side-nav-title mt-2" data-lang="management">Management</li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="#">
                    <span class="menu-icon"><i data-lucide="user-cog"></i></span>
                    <span class="menu-text" data-lang="sidebar-management-user">User</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="#">
                    <span class="menu-icon"><i data-lucide="mail-question-mark"></i></span>
                    <span class="menu-text" data-lang="sidebar-management-contact-request">Contact Request</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a aria-controls="settings" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#settings">
                    <span class="menu-icon"><i data-lucide="settings"></i></span>
                    <span class="menu-text" data-lang="sidebar-title-settings">Settings</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="settings">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="#">
                                <span class="menu-text" data-lang="sidebar-settings-company">Personal Information</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="#">
                                <span class="menu-text" data-lang="sidebar-settings-userlog">User Log</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="#">
                                <span class="menu-text" data-lang="sidebar-settings-systemlog">System Log</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="#">
                                <span class="menu-text" data-lang="sidebar-settings-backup-db">Backup Database</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a aria-controls="configuration" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#configuration">
                    <span class="menu-icon"><i data-lucide="columns-3-cog"></i></span>
                    <span class="menu-text" data-lang="sidebar-title-settings">Configuration</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="configuration">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="#">
                                <span class="menu-text" data-lang="sidebar-settings-company">Theme</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="#">
                                <span class="menu-text" data-lang="sidebar-settings-userlog">Research Source</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="#">
                                <span class="menu-text" data-lang="sidebar-settings-systemlog">Location Type</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="#">
                                <span class="menu-text" data-lang="sidebar-settings-backup-db">Employment Type</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- Sidenav Menu End -->
