<!-- Sidenav Menu Start -->
<div class="sidenav-menu">
    <!-- Brand Logo -->
    <a class="logo" href="{{ route('second', ['dashboard', 'index']) }}">
        <span class="logo logo-light">
            <span class="logo-lg"><img alt="logo" src="/images/logo.png" /></span>
            <span class="logo-sm"><img alt="small logo" src="/images/logo-sm.png" /></span>
        </span>
        <span class="logo logo-dark">
            <span class="logo-lg"><img alt="dark logo" src="/images/logo-black.png" /></span>
            <span class="logo-sm"><img alt="small logo" src="/images/logo-sm.png" /></span>
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
                        <a class="dropdown-item" href="{{ route('second', ['users', 'profile'])}}">
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
                <a aria-controls="sidebarDashboards" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarDashboards">
                    <span class="menu-icon"><i data-lucide="circle-gauge"></i></span>
                    <span class="menu-text" data-lang="dashboards">Dashboards</span>
                    <span class="badge bg-success">02</span>
                </a>
                <div class="collapse" id="sidebarDashboards">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['dashboard', 'index']) }}">
                                <span class="menu-text" data-lang="dashboard-one">Dashboard 1</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['dashboard', 'index-2']) }}">
                                <span class="menu-text" data-lang="dashboard-two">Dashboard 2</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('any', 'landing') }}" target="_blank">
                    <span class="menu-icon"><i data-lucide="earth"></i></span>
                    <span class="menu-text" data-lang="landing-page">Landing Page</span>
                </a>
            </li>
            <li class="side-nav-title" data-lang="apps-title">Apps</li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('second', ['apps', 'chat']) }}">
                    <span class="menu-icon"><i data-lucide="message-square-dot"></i></span>
                    <span class="menu-text" data-lang="chat"> Chat </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('second', ['apps', 'calendar']) }}">
                    <span class="menu-icon"><i data-lucide="calendar"></i></span>
                    <span class="menu-text" data-lang="calendar"> Calendar </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('second', ['apps', 'file-manager']) }}">
                    <span class="menu-icon"><i data-lucide="folder-open-dot"></i></span>
                    <span class="menu-text" data-lang="file-manager"> File Manager </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarEcommerce" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarEcommerce">
                    <span class="menu-icon"><i data-lucide="shopping-bag"></i></span>
                    <span class="menu-text" data-lang="ecommerce">Ecommerce</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a aria-controls="sidebarProducts" aria-expanded="false" class="side-nav-link"
                                data-bs-toggle="collapse" href="#sidebarProducts">
                                <span class="menu-text" data-lang="eco-products">Products</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarProducts">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['ecommerce', 'products']) }}">
                                            <span class="menu-text" data-lang="eco-pro-listing">Listing</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['ecommerce', 'products-grid']) }}">
                                            <span class="menu-text" data-lang="eco-pro-grid">Products Grid</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['ecommerce', 'product-details']) }}">
                                            <span class="menu-text" data-lang="eco-pro-details">Product Details</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['ecommerce', 'add-product']) }}">
                                            <span class="menu-text" data-lang="eco-pro-add">Add Product</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ecommerce', 'categories']) }}">
                                <span class="menu-text" data-lang="eco-categories">Categories</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a aria-controls="sidebarOrders" aria-expanded="false" class="side-nav-link"
                                data-bs-toggle="collapse" href="#sidebarOrders">
                                <span class="menu-text" data-lang="eco-orders">Orders</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarOrders">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['ecommerce', 'orders']) }}">
                                            <span class="menu-text" data-lang="eco-orders-list">Orders</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['ecommerce', 'order-details']) }}">
                                            <span class="menu-text" data-lang="eco-order-details">Order Details</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ecommerce', 'customers']) }}">
                                <span class="menu-text" data-lang="eco-customers">Customers</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a aria-controls="sidebarSellers" aria-expanded="false" class="side-nav-link"
                                data-bs-toggle="collapse" href="#sidebarSellers">
                                <span class="menu-text" data-lang="eco-sellers"> Sellers </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSellers">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['ecommerce', 'sellers']) }}">
                                            <span class="menu-text" data-lang="eco-sellers-list">Sellers</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['ecommerce', 'seller-details']) }}">
                                            <span class="menu-text" data-lang="eco-sellers-details">Sellers
                                                Details</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ecommerce', 'reviews']) }}">
                                <span class="menu-text" data-lang="eco-reviews">Reviews</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarEmail" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarEmail">
                    <span class="menu-icon"><i data-lucide="inbox"></i></span>
                    <span class="menu-text" data-lang="email">Email</span>
                    <span class="badge text-bg-danger">New</span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['email', 'email']) }}">
                                <span class="menu-text" data-lang="email-inbox">Inbox</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['email', 'details']) }}">
                                <span class="menu-text" data-lang="email-details">Details</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['email', 'compose']) }}">
                                <span class="menu-text" data-lang="email-compose">Compose</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['email', 'templates']) }}">
                                <span class="menu-text" data-lang="email-templates">Email Templates</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarCRM" aria-expanded="false" class="side-nav-link" data-bs-toggle="collapse"
                    href="#sidebarCRM">
                    <span class="menu-icon"><i data-lucide="handshake"></i></span>
                    <span class="menu-text" data-lang="crm"> CRM </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCRM">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['crm', 'contacts']) }}">
                                <span class="menu-text" data-lang="crm-contacts">Contacts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['crm', 'opportunities']) }}">
                                <span class="menu-text" data-lang="crm-opportunities">Opportunities</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['crm', 'deals']) }}">
                                <span class="menu-text" data-lang="crm-deals">Deals</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['crm', 'leads']) }}">
                                <span class="menu-text" data-lang="crm-leads">Leads</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['crm', 'pipeline']) }}">
                                <span class="menu-text" data-lang="crm-pipeline">Pipeline</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['crm', 'campaign']) }}">
                                <span class="menu-text" data-lang="crm-campaign">Campaign</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['crm', 'proposals']) }}">
                                <span class="menu-text" data-lang="crm-proposals">Proposals</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['crm', 'estimations']) }}">
                                <span class="menu-text" data-lang="crm-estimations">Estimations</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['crm', 'customers']) }}">
                                <span class="menu-text" data-lang="crm-customers">Customers</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['crm', 'activities']) }}">
                                <span class="menu-text" data-lang="crm-activities">Activities</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarUsers" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarUsers">
                    <span class="menu-icon"><i data-lucide="users"></i></span>
                    <span class="menu-text" data-lang="users"> Users </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarUsers">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['users', 'contacts']) }}">
                                <span class="menu-text" data-lang="contacts">Contacts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['users', 'profile']) }}">
                                <span class="menu-text" data-lang="profile">Profile</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['users', 'roles']) }}">
                                <span class="menu-text" data-lang="roles">Roles</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['users', 'role-details']) }}">
                                <span class="menu-text" data-lang="role-details">Role Details</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['users', 'permissions']) }}">
                                <span class="menu-text" data-lang="permissions">Permissions</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarInvoice" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarInvoice">
                    <span class="menu-icon"><i data-lucide="receipt-text"></i></span>
                    <span class="menu-text" data-lang="invoice"> Invoice</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarInvoice">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['invoice', 'invoices']) }}">
                                <span class="menu-text" data-lang="invoices">Invoices</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['invoice', 'details']) }}">
                                <span class="menu-text" data-lang="invoice-details">Single Invoice</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['invoice', 'create']) }}">
                                <span class="menu-text" data-lang="invoice-create">New Invoice</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('second', ['apps', 'social-feed']) }}">
                    <span class="menu-icon"><i data-lucide="rss"></i></span>
                    <span class="menu-text" data-lang="social"> Social Feed </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarTickets" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarTickets">
                    <span class="menu-icon"><i data-lucide="life-buoy"></i></span>
                    <span class="menu-text" data-lang="support"> Support Center</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTickets">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ticket', 'list']) }}">
                                <span class="menu-text" data-lang="tickets">Tickets List</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ticket', 'details']) }}">
                                <span class="menu-text" data-lang="ticket-details">Ticket Details</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ticket', 'create']) }}">
                                <span class="menu-text" data-lang="ticket-create">New Ticket</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('second', ['apps', 'api-keys']) }}">
                    <span class="menu-icon"><i data-lucide="key"></i></span>
                    <span class="menu-text" data-lang="api-keys"> API Keys </span>
                </a>
            </li>
            <li class="side-nav-title mt-2" data-lang="pages-title">Custom Pages</li>
            <li class="side-nav-item">
                <a aria-controls="sidebarPages" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarPages">
                    <span class="menu-icon"><i data-lucide="notebook-text"></i></span>
                    <span class="menu-text" data-lang="pages"> Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['pages', 'faq']) }}">
                                <span class="menu-text" data-lang="pages-faq">FAQ</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['pages', 'pricing']) }}">
                                <span class="menu-text" data-lang="pages-pricing">Pricing</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['pages', 'empty']) }}">
                                <span class="menu-text" data-lang="pages-empty">Empty Page</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['pages', 'timeline']) }}">
                                <span class="menu-text" data-lang="pages-timeline">Timeline</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['pages', 'sitemap']) }}">
                                <span class="menu-text" data-lang="pages-sitemap">Sitemap</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['pages', 'search-results']) }}">
                                <span class="menu-text" data-lang="pages-search-results">Search Results</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['pages', 'coming-soon']) }}">
                                <span class="menu-text" data-lang="pages-coming-soon">Coming Soon</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['pages', 'terms-conditions']) }}">
                                <span class="menu-text" data-lang="pages-terms-conditions">Terms &amp;
                                    Conditions</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarPagesAuth" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarPagesAuth">
                    <span class="menu-icon"><i data-lucide="fingerprint"></i></span>
                    <span class="menu-text" data-lang="authentication"> Authentication </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPagesAuth">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a aria-controls="sidebarOneAuth" aria-expanded="false" class="side-nav-link"
                                data-bs-toggle="collapse" href="#sidebarOneAuth">
                                <span class="menu-text" data-lang="basic-auth"> Basic </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarOneAuth">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a class="side-nav-link" href="{{ route('second', ['auth', 'sign-in']) }}">
                                            <span class="menu-text" data-lang="auth-sign-in">Sign In</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link" href="{{ route('second', ['auth', 'sign-up']) }}">
                                            <span class="menu-text" data-lang="auth-sign-up">Sign Up</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['auth', 'reset-pass']) }}">
                                            <span class="menu-text" data-lang="auth-reset-pass">Reset Password</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link" href="{{ route('second', ['auth', 'new-pass']) }}">
                                            <span class="menu-text" data-lang="auth-new-pass">New Password</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['auth', 'two-factor']) }}">
                                            <span class="menu-text" data-lang="auth-two-factor">Two Factor</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['auth', 'lock-screen']) }}">
                                            <span class="menu-text" data-lang="auth-lock-screen">Lock Screen</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['auth', 'success-mail']) }}">
                                            <span class="menu-text" data-lang="auth-success-mail">Success Mail</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link" href="{{ route('second', ['auth', 'login-pin']) }}">
                                            <span class="menu-text" data-lang="auth-login-pin">Login with PIN</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['auth', 'delete-account']) }}">
                                            <span class="menu-text" data-lang="auth-delete-account">Delete
                                                Account</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a aria-controls="sidebarTwoAuth" aria-expanded="false" class="side-nav-link"
                                data-bs-toggle="collapse" href="#sidebarTwoAuth">
                                <span class="menu-text" data-lang="cover-auth"> Cover </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTwoAuth">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a class="side-nav-link" href="{{ route('second', ['auth', '2-sign-in']) }}">
                                            <span class="menu-text" data-lang="auth-2-sign-in">Sign In</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link" href="{{ route('second', ['auth', '2-sign-up']) }}">
                                            <span class="menu-text" data-lang="auth-2-sign-up">Sign Up</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['auth', '2-reset-pass']) }}">
                                            <span class="menu-text" data-lang="auth-2-reset-pass">Reset
                                                Password</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['auth', '2-new-pass']) }}">
                                            <span class="menu-text" data-lang="auth-2-new-pass">New Password</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['auth', '2-two-factor']) }}">
                                            <span class="menu-text" data-lang="auth-2-two-factor">Two Factor</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['auth', '2-lock-screen']) }}">
                                            <span class="menu-text" data-lang="auth-2-lock-screen">Lock Screen</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['auth', '2-success-mail']) }}">
                                            <span class="menu-text" data-lang="auth-2-success-mail">Success
                                                Mail</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['auth', '2-login-pin']) }}">
                                            <span class="menu-text" data-lang="auth-2-login-pin">Login with PIN</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['auth', '2-delete-account']) }}">
                                            <span class="menu-text" data-lang="auth-2-delete-account">Delete
                                                Account</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarPagesError" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarPagesError">
                    <span class="menu-icon"><i data-lucide="shield-alert"></i></span>
                    <span class="menu-text" data-lang="error-pages"> Error Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPagesError">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['error', '400']) }}">
                                <span class="menu-text" data-lang="error-400">400 Bad Request</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['error', '401']) }}">
                                <span class="menu-text" data-lang="error-401">401 Unauthorized</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['error', '403']) }}">
                                <span class="menu-text" data-lang="error-403">403 Forbidden</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['error', '404']) }}">
                                <span class="menu-text" data-lang="error-404">404 Not Found</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['error', '408']) }}">
                                <span class="menu-text" data-lang="error-408">408 Request Timeout</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['error', '500']) }}">
                                <span class="menu-text" data-lang="error-500">500 Internal Server</span>
                            </a>
                        </li>
                        <li class="side-nav-item">  
                            <a class="side-nav-link" href="{{ route('second', ['error', 'maintenance']) }}">
                                <span class="menu-text" data-lang="maintenance">Maintenance</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-title mt-2" data-lang="layouts-title">Layouts</li>
            <li class="side-nav-item">
                <a aria-controls="sidebarLayouts" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarLayouts">
                    <span class="menu-icon"><i data-lucide="proportions"></i></span>
                    <span class="menu-text" data-lang="layout-options"> Layout Options </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['layouts-eg', 'scrollable']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="layouts-scrollable">Scrollable</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['layouts-eg', 'compact']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="layouts-compact">Compact</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['layouts-eg', 'boxed']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="layouts-boxed">Boxed</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['layouts-eg', 'horizontal']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="layouts-horizontal">Horizontal</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['layouts-eg', 'preloader']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="layouts-preloader">Preloader</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarSidebars" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarSidebars">
                    <span class="menu-icon"><i data-lucide="panel-right-close"></i></span>
                    <span class="menu-text" data-lang="sidebars"> Sidebars </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSidebars">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['sidebar', 'dark']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="sidebar-dark">Dark Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['sidebar', 'gradient']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="sidebar-gradient">Gradient Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['sidebar', 'gray']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="sidebar-gray">Gray Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['sidebar', 'image']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="sidebar-image">Image Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['sidebar', 'compact']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="sidebar-compact">Compact Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['sidebar', 'icon-view']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="sidebar-icon-view">Icon View Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['sidebar', 'on-hover']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="sidebar-on-hover">On Hover Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['sidebar', 'on-hover-active']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="sidebar-on-hover-active">On Hover Active</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['sidebar', 'offcanvas']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="sidebar-offcanvas">Offcanvas Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['sidebar', 'no-icons']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="sidebar-no-icons">No Icons with Lines</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['sidebar', 'with-lines']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="sidebar-with-lines">Sidebar with Lines</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarTopbars" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarTopbars">
                    <span class="menu-icon"><i data-lucide="panel-top"></i></span>
                    <span class="menu-text" data-lang="topbar"> Topbar </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTopbars">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['topbar', 'light']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="topbar-light">Light Topbar</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['topbar', 'gray']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="topbar-gray">Gray Topbar</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['topbar', 'gradient']) }}"
                                target="_blank">
                                <span class="menu-text" data-lang="topbar-gradient">Gradient Topbar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-title mt-2" data-lang="components-title">Components</li>
            <li class="side-nav-item">
                <a aria-controls="sidebarBaseUI" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarBaseUI">
                    <span class="menu-icon"><i data-lucide="pencil-ruler"></i></span>
                    <span class="menu-text" data-lang="base-ui"> Base UI </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBaseUI">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'buttons']) }}">
                                <span class="menu-text" data-lang="ui-buttons">Buttons</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'images']) }}">
                                <span class="menu-text" data-lang="ui-images">Images</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'accordions']) }}">
                                <span class="menu-text" data-lang="ui-accordions">Accordions</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'alerts']) }}">
                                <span class="menu-text" data-lang="ui-alerts">Alerts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'badges']) }}">
                                <span class="menu-text" data-lang="ui-badges">Badges</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'breadcrumb']) }}">
                                <span class="menu-text" data-lang="ui-breadcrumb">Breadcrumb</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'cards']) }}">
                                <span class="menu-text" data-lang="ui-cards">Cards</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'carousel']) }}">
                                <span class="menu-text" data-lang="ui-carousel">Carousel</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'collapse']) }}">
                                <span class="menu-text" data-lang="ui-collapse">Collapse</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'colors']) }}">
                                <span class="menu-text" data-lang="ui-colors">Colors</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'dropdowns']) }}">
                                <span class="menu-text" data-lang="ui-dropdowns">Dropdowns</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'videos']) }}">
                                <span class="menu-text" data-lang="ui-videos">Videos</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'grid']) }}">
                                <span class="menu-text" data-lang="ui-grid">Grid Options</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'links']) }}">
                                <span class="menu-text" data-lang="ui-links">Links</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'list-group']) }}">
                                <span class="menu-text" data-lang="ui-list-group">List Group</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'modals']) }}">
                                <span class="menu-text" data-lang="ui-modals">Modals</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'notifications']) }}">
                                <span class="menu-text" data-lang="ui-notifications">Notifications</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'offcanvas']) }}">
                                <span class="menu-text" data-lang="ui-offcanvas">Offcanvas</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'placeholders']) }}">
                                <span class="menu-text" data-lang="ui-placeholders">Placeholders</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'pagination']) }}">
                                <span class="menu-text" data-lang="ui-pagination">Pagination</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'popovers']) }}">
                                <span class="menu-text" data-lang="ui-popovers">Popovers</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'progress']) }}">
                                <span class="menu-text" data-lang="ui-progress">Progress</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'scrollspy']) }}">
                                <span class="menu-text" data-lang="ui-scrollspy">Scrollspy</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'spinners']) }}">
                                <span class="menu-text" data-lang="ui-spinners">Spinners</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'tabs']) }}">
                                <span class="menu-text" data-lang="ui-tabs">Tabs</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'tooltips']) }}">
                                <span class="menu-text" data-lang="ui-tooltips">Tooltips</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'typography']) }}">
                                <span class="menu-text" data-lang="ui-typography">Typography</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['ui', 'utilities']) }}">
                                <span class="menu-text" data-lang="ui-utilities">Utilities</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarMiscellaneous" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarMiscellaneous">
                    <span class="menu-icon"><i data-lucide="house-plug"></i></span>
                    <span class="menu-text" data-lang="miscellaneous"> Miscellaneous </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMiscellaneous">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['misc', 'sortable']) }}">
                                <span class="menu-text" data-lang="misc-sortable">Sortable List</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['misc', 'pdf-viewer']) }}">
                                <span class="menu-text" data-lang="misc-pdf-viewer">PDF Viewer</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['misc', 'i18']) }}">
                                <span class="menu-text" data-lang="misc-i18">i18 Support</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['misc', 'sweet-alerts']) }}">
                                <span class="menu-text" data-lang="misc-sweet-alerts">Sweet Alerts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['misc', 'pass-meter']) }}">
                                <span class="menu-text" data-lang="misc-pass-meter">Password Meter</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['misc', 'clipboard']) }}">
                                <span class="menu-text" data-lang="misc-clipboard">Clipboard</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['misc', 'tree-view']) }}">
                                <span class="menu-text" data-lang="misc-tree-view">Tree View</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['misc', 'tour']) }}">
                                <span class="menu-text" data-lang="misc-tour">Tour</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('any', 'widgets') }}">
                    <span class="menu-icon"><i data-lucide="dessert"></i></span>
                    <span class="menu-text" data-lang="widgets"> Widgets </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarCharts" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarCharts">
                    <span class="menu-icon"><i data-lucide="chart-no-axes-combined"></i></span>
                    <span class="menu-text" data-lang="charts"> Charts </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCharts">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a aria-controls="sidebarApexCharts" aria-expanded="false" class="side-nav-link"
                                data-bs-toggle="collapse" href="#sidebarApexCharts">
                                <span class="menu-text" data-lang="apex-charts"> Apex Charts </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarApexCharts">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-area']) }}">
                                            <span class="menu-text" data-lang="charts-apex-area">Area</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-bar']) }}">
                                            <span class="menu-text" data-lang="charts-apex-bar">Bar</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-bubble']) }}">
                                            <span class="menu-text" data-lang="charts-apex-bubble">Bubble</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-candlestick']) }}">
                                            <span class="menu-text"
                                                data-lang="charts-apex-candlestick">Candlestick</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-column']) }}">
                                            <span class="menu-text" data-lang="charts-apex-column">Column</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-heatmap']) }}">
                                            <span class="menu-text" data-lang="charts-apex-heatmap">Heatmap</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-line']) }}">
                                            <span class="menu-text" data-lang="charts-apex-line">Line</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-mixed']) }}">
                                            <span class="menu-text" data-lang="charts-apex-mixed">Mixed</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-timeline']) }}">
                                            <span class="menu-text" data-lang="charts-apex-timeline">Timeline</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-boxplot']) }}">
                                            <span class="menu-text" data-lang="charts-apex-boxplot">Boxplot</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-treemap']) }}">
                                            <span class="menu-text" data-lang="charts-apex-treemap">Treemap</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-pie']) }}">
                                            <span class="menu-text" data-lang="charts-apex-pie">Pie</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-radar']) }}">
                                            <span class="menu-text" data-lang="charts-apex-radar">Radar</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-radialbar']) }}">
                                            <span class="menu-text"
                                                data-lang="charts-apex-radialbar">RadialBar</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-scatter']) }}">
                                            <span class="menu-text" data-lang="charts-apex-scatter">Scatter</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-polar-area']) }}">
                                            <span class="menu-text" data-lang="charts-apex-polar-area">Polar
                                                Area</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-sparklines']) }}">
                                            <span class="menu-text"
                                                data-lang="charts-apex-sparklines">Sparklines</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-range']) }}">
                                            <span class="menu-text" data-lang="charts-apex-range">Range</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-funnel']) }}">
                                            <span class="menu-text" data-lang="charts-apex-funnel">Funnel</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['charts', 'apex-slope']) }}">
                                            <span class="menu-text" data-lang="charts-apex-slope">Slope</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a aria-controls="sidebarChartJs" aria-expanded="false" class="side-nav-link"
                                data-bs-toggle="collapse" href="#sidebarChartJs">
                                <span class="menu-text" data-lang="chartjs"> Chart Js </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarChartJs">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('third', ['charts', 'chartjs', 'area']) }}">
                                            <span class="menu-text" data-lang="chartjs-area">Area</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link" href="{{ route('third', ['charts', 'chartjs', 'bar']) }}">
                                            <span class="menu-text" data-lang="chartjs-bar">Bar</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('third', ['charts', 'chartjs', 'line']) }}">
                                            <span class="menu-text" data-lang="chartjs-line">Line</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('third', ['charts', 'chartjs', 'other']) }}">
                                            <span class="menu-text" data-lang="chartjs-other">Other</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['charts', 'apextree']) }}">
                                <span class="menu-text" data-lang="charts-apextree">Apex Tree</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['charts', 'apexsankey']) }}">
                                <span class="menu-text" data-lang="charts-apexsankey">Apex Sankey</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarForms" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarForms">
                    <span class="menu-icon"><i data-lucide="file-input"></i></span>
                    <span class="menu-text" data-lang="forms">Forms</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarForms">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['form', 'elements']) }}">
                                <span class="menu-text" data-lang="form-elements">Basic Elements</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['form', 'pickers']) }}">
                                <span class="menu-text" data-lang="form-pickers">Pickers</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['form', 'select']) }}">
                                <span class="menu-text" data-lang="form-select">Select</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['form', 'validation']) }}">
                                <span class="menu-text" data-lang="form-validation">Validation</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['form', 'wizard']) }}">
                                <span class="menu-text" data-lang="form-wizard">Wizard</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['form', 'fileuploads']) }}">
                                <span class="menu-text" data-lang="form-fileuploads">File Uploads</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['form', 'text-editors']) }}">
                                <span class="menu-text" data-lang="form-text-editors">Text Editors</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['form', 'range-slider']) }}">
                                <span class="menu-text" data-lang="form-range-slider">Range Slider</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['form', 'layouts']) }}">
                                <span class="menu-text" data-lang="form-layouts">Layouts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['form', 'other-plugins']) }}">
                                <span class="menu-text" data-lang="form-other-plugins">Other Plugins</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarTables" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarTables">
                    <span class="menu-icon"><i data-lucide="table"></i></span>
                    <span class="menu-text" data-lang="tables">Tables</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTables">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['tables', 'static']) }}">
                                <span class="menu-text" data-lang="tables-static">Static Tables</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['tables', 'custom']) }}">
                                <span class="menu-text" data-lang="tables-custom">Custom Tables</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a aria-controls="sidebarDataTables" aria-expanded="false" class="side-nav-link"
                                data-bs-toggle="collapse" href="#sidebarDataTables">
                                <span class="menu-text" data-lang="datatables">DataTables</span>
                                <span class="badge bg-success">13</span>
                            </a>
                            <div class="collapse" id="sidebarDataTables">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-basic']) }}">
                                            <span class="menu-text" data-lang="tables-datatables-basic">Basic</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-export-data']) }}">
                                            <span class="menu-text" data-lang="tables-datatables-export-data">Export
                                                Data</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-select']) }}">
                                            <span class="menu-text"
                                                data-lang="tables-datatables-select">Select</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-ajax']) }}">
                                            <span class="menu-text" data-lang="tables-datatables-ajax">Ajax</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-javascript']) }}">
                                            <span class="menu-text"
                                                data-lang="tables-datatables-javascript">Javascript Source</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-rendering']) }}">
                                            <span class="menu-text" data-lang="tables-datatables-rendering">Data
                                                Rendering</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-scroll']) }}">
                                            <span class="menu-text"
                                                data-lang="tables-datatables-scroll">Scroll</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-fixed-columns']) }}">
                                            <span class="menu-text"
                                                data-lang="tables-datatables-fixed-columns">Fixed Columns</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-columns']) }}">
                                            <span class="menu-text" data-lang="tables-datatables-columns">Show &amp;
                                                Hide Column</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-child-rows']) }}">
                                            <span class="menu-text" data-lang="tables-datatables-child-rows">Child
                                                Rows</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-column-searching']) }}">
                                            <span class="menu-text"
                                                data-lang="tables-datatables-column-searching">Column Searching</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-range-search']) }}">
                                            <span class="menu-text" data-lang="tables-datatables-range-search">Range
                                                Search</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-fixed-header']) }}">
                                            <span class="menu-text" data-lang="tables-datatables-fixed-header">Fixed
                                                Header</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-add-rows']) }}">
                                            <span class="menu-text" data-lang="tables-datatables-add-rows">Add
                                                Rows</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link"
                                            href="{{ route('second', ['tables', 'datatables-checkbox-select']) }}">
                                            <span class="menu-text"
                                                data-lang="tables-datatables-checkbox-select">Checkbox Select</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarIcons" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarIcons">
                    <span class="menu-icon"><i data-lucide="sparkles"></i></span>
                    <span class="menu-text" data-lang="icons">Icons</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarIcons">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['icons', 'tabler']) }}">
                                <span class="menu-text" data-lang="icons-tabler">Tabler</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['icons', 'lucide']) }}">
                                <span class="menu-text" data-lang="icons-lucide">Lucide</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['icons', 'flags']) }}">
                                <span class="menu-text" data-lang="icons-flags">Flags</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a aria-controls="sidebarMaps" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarMaps">
                    <span class="menu-icon"><i data-lucide="map-pinned"></i></span>
                    <span class="menu-text" data-lang="maps">Maps</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMaps">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['maps', 'vector']) }}">
                                <span class="menu-text" data-lang="maps-vector">Vector Maps</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link" href="{{ route('second', ['maps', 'leaflet']) }}">
                                <span class="menu-text" data-lang="maps-leaflet">Leaflet Maps</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-title mt-2" data-lang="items-title">Menu Items</li>
            <li class="side-nav-item">
                <a aria-controls="sidebarMenuLevels" aria-expanded="false" class="side-nav-link"
                    data-bs-toggle="collapse" href="#sidebarMenuLevels">
                    <span class="menu-icon"><i data-lucide="list-tree"></i></span>
                    <span class="menu-text" data-lang="menu-levels"> Menu Levels </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMenuLevels">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a aria-controls="sidebarSecondLevel" aria-expanded="false" class="side-nav-link"
                                data-bs-toggle="collapse" href="#sidebarSecondLevel">
                                <span class="menu-text" data-lang="second-level"> Second Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a class="side-nav-link" href="javascript: void(0);">
                                            <span class="menu-text">Item 2.1</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a class="side-nav-link" href="javascript: void(0);">
                                            <span class="menu-text">Item 2.2</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a aria-controls="sidebarThirdLevel" aria-expanded="false" class="side-nav-link"
                                data-bs-toggle="collapse" href="#sidebarThirdLevel">
                                <span class="menu-text" data-lang="third-level"> Third Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarThirdLevel">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a class="side-nav-link" href="javascript: void(0);">Item 1</a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a aria-controls="sidebarFourthLevel" aria-expanded="false"
                                            class="side-nav-link" data-bs-toggle="collapse"
                                            href="#sidebarFourthLevel">
                                            <span class="menu-text"> Item 2 </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarFourthLevel">
                                            <ul class="sub-menu">
                                                <li class="side-nav-item">
                                                    <a class="side-nav-link" href="javascript: void(0);">
                                                        <span class="menu-text">Item 3.1</span>
                                                    </a>
                                                </li>
                                                <li class="side-nav-item">
                                                    <a class="side-nav-link" href="javascript: void(0);">
                                                        <span class="menu-text">Item 3.2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a class="side-nav-link disabled" href="#!">
                    <span class="menu-icon"><i data-lucide="eye-off"></i></span>
                    <span class="menu-text" data-lang="disabled-menu"> Disabled Menu </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Sidenav Menu End -->
