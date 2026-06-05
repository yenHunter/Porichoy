<!-- tpm-header-area start -->
<header class="tmp-header-area-start header-one header--sticky header--transparent">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-content">
                    <div class="logo">
                        <a href="{{ route('visitor.index') }}">
                            <img class="logo-dark" src="{{ asset('visitor/reeni/images/logo/reeni-white-logo.png') }}"
                                alt="dark-logo">
                            <img class="logo-white" src="{{ asset('visitor/reeni/images/logo/reeni-dark-logo.png') }}"
                                alt="white-logo">
                        </a>
                    </div>
                    <div class="tmp-mainmenu-nav d-none d-xl-block">
                        <nav class="navbar-example2 onepagenav">
                            <ul class="tmp-mainmenu nav nav-pills">
                                <li class="nav-item">
                                    <a class="smoth-animation" href="{{ route('visitor.index') }}#home-area">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="smoth-animation"
                                        href="{{ route('visitor.index') }}#services-area">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="smoth-animation"
                                        href="{{ route('visitor.index') }}#resume-area">Resume</a>
                                </li>
                                <li class="nav-item">
                                    <a class="smoth-animation"
                                        href="{{ route('visitor.index') }}#portfolio-area">Portfolio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="smoth-animation"
                                        href="{{ route('visitor.index') }}#pricing-area">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="smoth-animation"
                                        href="{{ route('visitor.index') }}#contact-area">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="smoth-animation" href="{{ route('visitor.index') }}#blog-area">Blog</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="tmp-header-right">
                        <div class="social-share-wrapper d-none d-md-block">
                            <div class="social-link">
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            </div>
                        </div>
                        <div class="actions-area">
                            <div class="tmp-side-collups-area d-block d-xl-none">
                                <button class="tmp-menu-bars humberger_menu_active"><i
                                        class="fa-regular fa-bars-staggered"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="d-block d-xl-none">
    <div class="tmp-popup-mobile-menu">
        <div class="inner">
            <div class="header-top">
                <div class="logo">
                    <a href="{{ route('visitor.index') }}" class="logo-area">
                        <img class="logo-dark" src="{{ asset('visitor/reeni/images/logo/reeni-white-logo.png') }}"
                            alt="dark-logo">
                        <img class="logo-white" src="{{ asset('visitor/reeni/images/logo/reeni-dark-logo.png') }}"
                            alt="white-logo">
                    </a>

                </div>
                <div class="close-menu">
                    <button class="close-button tmp-round-action-btn">
                        <i class="fa-sharp fa-light fa-xmark"></i>
                    </button>
                </div>
            </div>
            <ul class="tmp-mainmenu">
                <li>
                    <a href="{{ route('visitor.about') }}">About</a>
                </li>
                <li>
                    <a href="{{ route('visitor.service.index') }}">Service</a>
                </li>
                <li>
                    <a href="{{ route('visitor.project.index') }}">Portfolio</a>
                </li>
                <li>
                    <a href="{{ route('visitor.blog.index') }}">Blog</a>
                </li>
                <li>
                    <a href="{{ route('visitor.contact.index') }}">Contact</a>
                </li>
            </ul>

            <!-- social area start -->
            <div class="social-wrapper mt--40">
                <span class="subtitle">find with me</span>
                <div class="social-link">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
            </div>
            <!-- social area end -->
        </div>
    </div>
</div>
