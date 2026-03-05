@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Porichoy')

@section('content')
    <!-- tmp banner area start -->
    <div id="home-area" class="rpp-banner-four-area">
        <div class="container">
            <div class="banner-four-main-wrapper">
                <div class="bg-benner-img-four">
                    <img class="tmp-scroll-trigger tmp-zoom-in animation-order-1"
                        src="{{ asset('visitor/reeni/images/banner/banner-user-image-four.png') }}" alt="banner-img-3">
                </div>
                <div class="banner-four-right-bg-img">
                    <img src="{{ asset('visitor/reeni/images/banner/banner-four-right-bg-img.png') }}" alt="banner-img-3">
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="inner">
                            <span class="sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">Web
                                Developer</span>
                            <h1 class="title tmp-scroll-trigger tmp-fade-in animation-order-2">Jackson Clark</h1>
                            <p class="description tmp-scroll-trigger tmp-fade-in animation-order-3"> Outsourcing can
                                provide corporate businesses with several
                                advantages, incl b usinesses Outsourcing can provide usinesses Outsourcing can provide
                            </p>
                            <div class="button-area-banner-three tmp-scroll-trigger tmp-fade-in animation-order-4">
                                <a class="tmp-btn hover-icon-reverse radius-round" href="#">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">View Portfolio</span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="banner-right-content tmp-scroll-trigger tmp-fade-in animation-order-5">
                            <div class="year-expariance-wrap">
                                <!-- <h3 class="title "><span class="counter">25</span></h3> -->
                                <h3 class="counter title"><span class="odometer" data-count="25">00</span>
                                </h3>
                                <p class="para">Years Of <br>experience </p>
                            </div>
                            <div class="find-me-on">
                                <h2 class="find-me-on-title">Find me on</h2>
                                <div class="social-link banner">
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-four-left-bg-img">
            <img src="{{ asset('visitor/reeni/images/banner/banner-four-left-bg-img.png') }}" alt="banner-img-3">
        </div>
    </div>
    <!-- tmp banner area end -->

    <!-- tmp text para start -->
    <div class="container tmp-section-gap">
        <div class="text-para-doc-wrap">
            <h2 class="text-para-documents tmp-scroll-trigger tmp-fade-in animation-order-1 inv-title-animation-wrap">A
                personal <span>portfolio</span> is a collection of your work, that is aa
                go achievements, and skills that highlights <span>web design</span> in your is abilities and
                professional growth. It serves as A personal to a portfolio in <span>since 2009</span> a collection of
                your work</h2>
            <div class="right-bg-text-para">
                <img src="{{ asset('visitor/reeni/images/banner/right-bg-text-para-doc.png') }}" alt="">
            </div>
            <div class="left-bg-text-para">
                <img src="{{ asset('visitor/reeni/images/banner/left-bg-text-para-doc.png') }}" alt="">
            </div>
        </div>
    </div>
    <!-- tmp text para end -->

    <!-- tmp About Me Start -->
    <section class="about-us-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-us-left-content-wrap bg-vactor-one">
                        <div class="years-of-experience-card tmp-scroll-trigger tmp-fade-in animation-order-1">
                            <h2 class="counter card-title"><span class="odometer" data-count="10">00</span>+
                            </h2>
                            <p class="card-para">years of experience</p>
                        </div>
                        <div class="design-card tmp-scroll-trigger tmp-fade-in animation-order-2">
                            <div class="design-card-img">
                                <div class="icon"><i class="fa-sharp fa-thin fa-lock"></i></div>
                            </div>
                            <div class="card-info">
                                <h3 class="card-title">Ui/Ux Design</h3>
                                <p class="card-para">241 Projects</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-us-right-content-wrap">
                        <div class="section-head text-align-left mb--50">
                            <div class="section-sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                                <span class="subtitle">About Me</span>
                            </div>
                            <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Boost
                                Business Strategic <br> Solutions with Us</h2>
                            <p class="description tmp-scroll-trigger tmp-fade-in animation-order-3">Business consulting
                                consultants provide expert advice and guida
                                businesses to help them improve their performance, efficiency, and organizational</p>
                        </div>
                        <div class="about-us-section-card row g-5">

                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="about-us-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-4">
                                    <div class="card-head">
                                        <div class="logo-img">
                                            <img src="{{ asset('visitor/reeni/images/about/logo-1.svg') }}" alt="logo">
                                        </div>
                                        <h3 class="card-title">Business Solutions</h3>
                                    </div>
                                    <p class="card-para">Each one showcases my approach and dedication to detail,
                                        creativity
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="about-us-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-5">
                                    <div class="card-head">
                                        <div class="logo-img">
                                            <img src="{{ asset('visitor/reeni/images/about/logo-2.svg') }}" alt="logo">
                                        </div>
                                        <h3 class="card-title">Profit Partners</h3>
                                    </div>
                                    <p class="card-para">Business consulting consul us to a provide expert advice
                                        businesses
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="about-btn mt--40 tmp-scroll-trigger tmp-fade-in animation-order-6">
                            <a class="tmp-btn hover-icon-reverse radius-round" href="{{ route('visitor.about') }}">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Read More About Me</span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tmp About Me end -->

    <!-- tmp Latest Portfolio Start -->
    <section id="services-area" class="tmp-portfolio-area tmp-section-gap">
        <div class="container">
            <div class="section-head mb--60">
                <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <span class="subtitle">Latest Portfolio</span>
                </div>
                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2"> Transforming Ideas into
                    Exceptional </h2>
                <p class="description section-sm tmp-scroll-trigger tmp-fade-in animation-order-3">Business consulting
                    consultants provide expert advice and guida
                    businesses to help them improve their performance, efficiency, and organizational</p>
            </div>
            <div class="latest-portfolio-tabs-area">
                <nav>
                    <ul class="nav nav-tabs tmp-scroll-trigger tmp-fade-in animation-order-4" id="nav-tab"
                        role="tablist">
                        <li>
                            <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all"
                                aria-selected="true">All</button>
                        </li>
                        <li>
                            <button class="nav-link" id="nav-branding-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-branding" type="button" role="tab"
                                aria-controls="nav-branding" aria-selected="false">Branding</button>
                        </li>
                        <li>
                            <button class="nav-link" id="nav-design-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-design" type="button" role="tab" aria-controls="nav-design"
                                aria-selected="false">Design</button>
                        </li>
                        <li>
                            <button class="nav-link" id="nav-content-writing-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-content-writing" type="button" role="tab"
                                aria-controls="nav-content-writing" aria-selected="false">Content writing</button>
                        </li>
                        <li>
                            <button class="nav-link" id="nav-marketing-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-marketing" type="button" role="tab"
                                aria-controls="nav-marketing" aria-selected="false">Marketing</button>
                        </li>
                    </ul>
                </nav>
                <div class="tab-content bg-blur-style-three" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab"
                        tabindex="0">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-1.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">My
                                                    Portfolio of Innovation</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-2.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">A
                                                    Showcase of My Projects</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-3.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">Professional Showcase</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-4.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">My
                                                    Journey as a Creator</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-5.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">A
                                                    Journey Through My Work</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-6.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">A
                                                    Portfolio of Art & Dedication</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="over_link"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-branding" role="tabpanel" aria-labelledby="nav-branding-tab"
                        tabindex="0">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-7.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">A
                                                    Journey Through My Work</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-6.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">A
                                                    Showcase of My Projects</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-5.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">My
                                                    Journey as a Creator</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-4.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">My
                                                    Professional Portfolio</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-3.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">Transforming Ideas into
                                                    Reality</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-2.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">Unveiling Potential</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="over_link"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-design" role="tabpanel" aria-labelledby="nav-design-tab"
                        tabindex="0">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-1.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">My
                                                    Portfolio of Innovation</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-2.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">A
                                                    Showcase of My Projects</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-3.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">Professional Showcase</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-4.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">My
                                                    Journey as a Creator</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-5.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">A
                                                    Journey Through My Work</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-6.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">A
                                                    Portfolio of Art & Dedication</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="over_link"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-content-writing" role="tabpanel"
                        aria-labelledby="nav-content-writing-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-7.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-writing']) }}">A
                                                    Journey Through My Work</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-writing']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-writing']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-6.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">A
                                                    Showcase of My Projects</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-5.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">My
                                                    Journey as a Creator</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-4.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-development']) }}">My
                                                    Professional Portfolio</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-development']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-development']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-3.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">Transforming Ideas into
                                                    Reality</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-2.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">Unveiling Potential</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="over_link"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-marketing" role="tabpanel" aria-labelledby="nav-marketing-tab"
                        tabindex="0">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-7.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-development']) }}">A
                                                    Journey Through My Work</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-development']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-development']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-6.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">A
                                                    Showcase of My Projects</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-5.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">My
                                                    Journey as a Creator</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-4.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-development']) }}">My
                                                    Professional Portfolio</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-development']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-development']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-3.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">Transforming Ideas into
                                                    Reality</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}" class="over_link"></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="tmp-portfolio tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <img src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-2.png') }}" alt="tab-image">
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <p class="portfoli-card-para">Development</p>
                                            <h3 class="portfolio-card-title animated fadeIn"><a
                                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">Unveiling Potential</a></h3>
                                        </div>
                                        <div class="portfolio-btn">
                                            <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="tmp-arrow-icon-btn">
                                                <div class="btn-inner">
                                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}" class="over_link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tmp Latest Portfolio end -->

    <!-- Tpm My Expertise Area start -->
    <section class="my-expertise-area tpm-custom-box-bg">
        <div class="container">
            <div class="header-top-inner">
                <div class="section-head text-align-left">
                    <div class="section-sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <span class="subtitle">My Expertise</span>
                    </div>
                    <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Elevated Designs
                        Personalized <br> the best Experiences</h2>
                </div>
                <div class="discription-area tmp-scroll-trigger tmp-fade-in animation-order-3">
                    <p class="description"> Business consulting consultants provide expert advice and
                        guida businesses to help them improve their performance, efficiency, and organizational
                    </p>
                </div>
            </div>
            <div class="services-widget v4">
                <div class="service-item current tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <div class="my-expertise-card-wrap">
                        <div class="expertise-card-left">
                            <div class="expertise-card-logo">
                                <img src="{{ asset('visitor/reeni/images/my-expertise/logo-4.svg') }}" alt="logo">
                            </div>
                            <h3 class="title">Ui/visual Design</h3>
                        </div>
                        <div class="single-progress-circle sal-animate" data-sal-delay="300" data-sal="slide-up"
                            data-sal-duration="1000">
                            <svg class="radial-progress" data-countervalue="90" viewBox="0 0 80 80">
                                <circle class="bar-static" cx="40" cy="40" r="35"></circle>
                                <circle class="bar--animated" cx="40" cy="40" r="35"
                                    style="stroke-dashoffset: 131.947px;"></circle>
                                <text class="countervalue" x="50%" y="55%"
                                    transform="matrix(0, 1, -1, 0, 80, 0)">90%</text>
                            </svg>
                        </div>
                        <p class="para">A personal portfolio is a curated collection of an individual's professional
                            work, showcasing their skills</p>
                    </div>
                    <button class="service-link modal-popup"></button>
                </div>
                <div class="service-item tmp-scroll-trigger tmp-fade-in animation-order-2">
                    <div class="my-expertise-card-wrap">
                        <div class="expertise-card-left">
                            <div class="expertise-card-logo">
                                <img src="{{ asset('visitor/reeni/images/my-expertise/logo-5.svg') }}" alt="logo">
                            </div>
                            <h3 class="title">Branding Design</h3>
                        </div>
                        <div class="single-progress-circle sal-animate" data-sal-delay="300" data-sal="slide-up"
                            data-sal-duration="1000">
                            <svg class="radial-progress" data-countervalue="40" viewBox="0 0 80 80">
                                <circle class="bar-static" cx="40" cy="40" r="35"></circle>
                                <circle class="bar--animated" cx="40" cy="40" r="35"
                                    style="stroke-dashoffset: 131.947px;"></circle>
                                <text class="countervalue" x="50%" y="55%"
                                    transform="matrix(0, 1, -1, 0, 80, 0)">75%</text>
                            </svg>
                        </div>
                        <p class="para">A personal portfolio is a curated collection of an individual's professional
                            work, showcasing their skills</p>
                    </div>
                    <button class="service-link modal-popup"></button>
                </div>
                <div class="service-item tmp-scroll-trigger tmp-fade-in animation-order-3">
                    <div class="my-expertise-card-wrap">
                        <div class="expertise-card-left">
                            <div class="expertise-card-logo">
                                <img src="{{ asset('visitor/reeni/images/my-expertise/logo-6.svg') }}" alt="logo">
                            </div>
                            <h3 class="title">Motion Design</h3>
                        </div>
                        <div class="single-progress-circle sal-animate" data-sal-delay="300" data-sal="slide-up"
                            data-sal-duration="1000">
                            <svg class="radial-progress" data-countervalue="40" viewBox="0 0 80 80">
                                <circle class="bar-static" cx="40" cy="40" r="35"></circle>
                                <circle class="bar--animated" cx="40" cy="40" r="35"
                                    style="stroke-dashoffset: 131.947px;"></circle>
                                <text class="countervalue" x="50%" y="55%"
                                    transform="matrix(0, 1, -1, 0, 80, 0)">80%</text>
                            </svg>
                        </div>
                        <p class="para">A personal portfolio is a curated collection of an individual's professional
                            work, showcasing their skills</p>
                    </div>
                    <button class="service-link modal-popup"></button>
                </div>
                <div class="active-bg v2 wow fadeInUp mleave"></div>
            </div>
        </div>
    </section>
    <!-- Tpm My Expertise Area End -->

    <!-- tmp Clients Testimonial Start -->
    <section class="clients-testimonial-area tmp-section-gapTop">
        <div class="section-head mb--50">
            <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                <span class="subtitle">Clients Testimonial</span>
            </div>
            <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Bringing Dreams to Life
                through</h2>
            <p class="description section-sm tmp-scroll-trigger tmp-fade-in animation-order-3">Business consulting
                consultants provide expert advice and guida businesses
                to <br> help them improve their performance, efficiency, and organizational</p>
        </div>
        <div class="client-testimonial-swiper position-relative">
            <div class="swiper testimonial-swiper-v2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide ">
                        <div class="client-testimonial-card-wrap">
                            <div class="client-card-head">
                                <div class="client-info">
                                    <div class="client-img">
                                        <img src="{{ asset('visitor/reeni/images/testimonial/client-img-1.jpg') }}" alt="">

                                    </div>
                                    <div class="client-details">
                                        <h3 class="client-title">Theresa Webb</h3>
                                        <p class="client-para">Ui/Ux Designer</p>
                                    </div>
                                </div>
                                <div class="tmp-star">
                                    <ul>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="client-para">Their expertise is apparent in every step of the project. I’m
                                thrilled with the outcome and would definitely work with them again! definitely work
                                with them again</p>
                            <div class="quat-logo">
                                <img src="{{ asset('visitor/reeni/images/testimonial/quat-logo.svg') }}" alt="quat-logo">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client-testimonial-card-wrap">
                            <div class="client-card-head">
                                <div class="client-info">
                                    <div class="client-img">
                                        <img src="{{ asset('visitor/reeni/images/testimonial/client-img-1.jpg') }}" alt="">

                                    </div>
                                    <div class="client-details">
                                        <h3 class="client-title">Theresa Webb</h3>
                                        <p class="client-para">Ui/Ux Designer</p>
                                    </div>
                                </div>
                                <div class="tmp-star">
                                    <ul>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="client-para"> They were communicative, attentive, and exceeded all project goals.
                                The quality and attention to detail were top-notch. Five stars aren’t enough! Five stars
                                aren’t enough.</p>
                            <div class="quat-logo">
                                <img src="{{ asset('visitor/reeni/images/testimonial/quat-logo.svg') }}" alt="quat-logo">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client-testimonial-card-wrap">
                            <div class="client-card-head">
                                <div class="client-info">
                                    <div class="client-img">
                                        <img src="{{ asset('visitor/reeni/images/testimonial/client-img-1.jpg') }}" alt="">

                                    </div>
                                    <div class="client-details">
                                        <h3 class="client-title">Theresa Webb</h3>
                                        <p class="client-para">Ui/Ux Designer</p>
                                    </div>
                                </div>
                                <div class="tmp-star">
                                    <ul>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="client-para">Financial planners help people knowledge about to how toio invest and
                                save the money the most of us efficient way ever. Many people all across in the of
                                country use them help peopl and save </p>
                            <div class="quat-logo">
                                <img src="{{ asset('visitor/reeni/images/testimonial/quat-logo.svg') }}" alt="quat-logo">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client-testimonial-card-wrap">
                            <div class="client-card-head">
                                <div class="client-info">
                                    <div class="client-img">
                                        <img src="{{ asset('visitor/reeni/images/testimonial/client-img-1.jpg') }}" alt="">

                                    </div>
                                    <div class="client-details">
                                        <h3 class="client-title">Theresa Webb</h3>
                                        <p class="client-para">Ui/Ux Designer</p>
                                    </div>
                                </div>
                                <div class="tmp-star">
                                    <ul>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="client-para">They understood my vision immediately and brought it to life even
                                better than I’d imagined. Professional, creative, and always on time – I couldn’t be
                                happier with the results! </p>
                            <div class="quat-logo">
                                <img src="{{ asset('visitor/reeni/images/testimonial/quat-logo.svg') }}" alt="quat-logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tmp-swiper-pagination tmp-swiper-pagination-01"></div>
        </div>
    </section>
    <!-- tmp Clients Testimonial End -->

    <!-- Tpm My Skill Area Start -->
    <section id="resume-area" class="my-skill-area-style-two plr--120 plr_lg--30 plr_md--30 plr_sm--30 plr_mobile--15 mt--70">
        <div class="tpm-custom-box-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-lg-12 col-md-12">
                        <div class="my-skill-area-left-content-wrap">
                            <div class="section-head text-align-left">
                                <div class="section-sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <span class="subtitle">My Skill</span>
                                </div>
                                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">My
                                    Experts
                                    Areas Where I <br> Gained Skill</h2>
                                <p class="description tmp-scroll-trigger tmp-fade-in animation-order-3">Business
                                    consulting
                                    consultants provide expert advice and guida busi
                                    nesses to help them improve their performance, efficiency, and organ izational
                                    Business
                                    consulting consultants provide</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-12 col-md-12">
                        <div class="my-skill-card-style-two row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="my-skill-card tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <div class="card-icon">
                                        <img src="{{ asset('visitor/reeni/images/icons/icon-01.png') }}" alt="my-skill-icon">
                                    </div>
                                    <h3 class="card-title">Framer</h3>
                                    <p class="card-para">The personal portfol category includes websites or physic Your
                                        Journey Your Story</p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="my-skill-card tmp-scroll-trigger tmp-fade-in animation-order-2">
                                    <div class="card-icon">
                                        <img src="{{ asset('visitor/reeni/images/icons/icon-02.png') }}" alt="my-skill-icon">
                                    </div>
                                    <h3 class="card-title">Webflow</h3>
                                    <p class="card-para">The personal portfol category includes websites or physic Your
                                        Journey Your Story</p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="my-skill-card tmp-scroll-trigger tmp-fade-in animation-order-3">
                                    <div class="card-icon">
                                        <img src="{{ asset('visitor/reeni/images/icons/icon-03.png') }}" alt="my-skill-icon">
                                    </div>
                                    <h3 class="card-title">Figma</h3>
                                    <p class="card-para">The personal portfol category includes websites or physic Your
                                        Journey Your Story</p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="my-skill-card tmp-scroll-trigger tmp-fade-in animation-order-4">
                                    <div class="card-icon">
                                        <img src="{{ asset('visitor/reeni/images/icons/icon-04.png') }}" alt="my-skill-icon">
                                    </div>
                                    <h3 class="card-title">Wordpress</h3>
                                    <p class="card-para">The personal portfol category includes websites or physic Your
                                        Journey Your Story</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm My Skill Area End -->

    <!-- Tpm Latest Portfolio Start -->
    <section id="portfolio-area" class="tmp-latest-portfolio tmp-section-gapTop">
        <div class="container">
            <div class="header-top-inner">
                <div class="section-head text-align-left">
                    <div class="section-sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <span class="subtitle">Recent Portfolio</span>
                    </div>
                    <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Transforming Ideas
                        <br> into Exceptional
                    </h2>
                </div>
                <div class="discription-area tmp-scroll-trigger tmp-fade-in animation-order-3">
                    <p class="description"> Business consulting consultants provide expert advice and
                        guida
                        <span>businesses</span> to help them improve their performance, efficiency, and organizational
                    </p>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 col-md-6 col-12">
                    <div
                        class="latest-portfolio-card-style-two tmponhover tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a href="{{ route('visitor.project.details', ['project' => 'web-development']) }}">
                                    <img class="img-primary hidden-on-mobile"
                                        src="{{ asset('visitor/reeni/images/latest-portfolio/portfoli-img-5.jpg') }}" alt="Blog Thumbnail">
                                    <img class="img-secondary" src="{{ asset('visitor/reeni/images/latest-portfolio/portfoli-img-5.jpg') }}"
                                        alt="BLog Thumbnail">
                                </a>
                            </div>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a href="{{ route('visitor.project.details', ['project' => 'web-development']) }}">SAAS website
                                        design</a>
                                </h3>
                                <div class="tag-items">
                                    <ul>
                                        <li>
                                            <a href="#" class="tag-item">Figma</a>
                                        </li>
                                        <li>
                                            <a href="#" class="tag-item">Framer</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tmp-button-here">
                                <a class="tmp-btn hover-icon-reverse radius-round btn-border btn-md"
                                    href="{{ route('visitor.project.details', ['project' => 'web-development']) }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">View Design</span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div
                        class="latest-portfolio-card-style-two tmponhover tmp-scroll-trigger tmp-fade-in animation-order-2">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">
                                    <img class="img-primary hidden-on-mobile"
                                        src="{{ asset('visitor/reeni/images/latest-portfolio/portfoli-img-6.jpg') }}" alt="Blog Thumbnail">
                                    <img class="img-secondary" src="{{ asset('visitor/reeni/images/latest-portfolio/portfoli-img-6.jpg') }}"
                                        alt="BLog Thumbnail">
                                </a>
                            </div>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">Workout App
                                        design</a>
                                </h3>
                                <div class="tag-items">
                                    <ul>
                                        <li>
                                            <a href="#" class="tag-item">Adobe</a>
                                        </li>
                                        <li>
                                            <a href="#" class="tag-item">Webflow</a>
                                        </li>
                                        <li>
                                            <a href="#" class="tag-item">Ai</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tmp-button-here">
                                <a class="tmp-btn hover-icon-reverse radius-round btn-border btn-md"
                                    href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">View Design</span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div
                        class="latest-portfolio-card-style-two tmponhover tmp-scroll-trigger tmp-fade-in animation-order-3">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">
                                    <img class="img-primary hidden-on-mobile"
                                        src="{{ asset('visitor/reeni/images/latest-portfolio/portfoli-img-7.jpg') }}" alt="Blog Thumbnail">
                                    <img class="img-secondary" src="{{ asset('visitor/reeni/images/latest-portfolio/portfoli-img-7.jpg') }}"
                                        alt="BLog Thumbnail">
                                </a>
                            </div>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">e-Commerce
                                        design</a>
                                </h3>
                                <div class="tag-items">
                                    <ul>
                                        <li>
                                            <a href="#" class="tag-item">Figma</a>
                                        </li>
                                        <li>
                                            <a href="#" class="tag-item">Framer</a>
                                        </li>
                                        <li>
                                            <a href="#" class="tag-item">Wordpress</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tmp-button-here">
                                <a class="tmp-btn hover-icon-reverse radius-round btn-border btn-md"
                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">View Design</span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div
                        class="latest-portfolio-card-style-two tmponhover tmp-scroll-trigger tmp-fade-in animation-order-4">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">
                                    <img class="img-primary hidden-on-mobile"
                                        src="{{ asset('visitor/reeni/images/latest-portfolio/portfoli-img-8.jpg') }}" alt="Blog Thumbnail">
                                    <img class="img-secondary col-md-6"
                                        src="{{ asset('visitor/reeni/images/latest-portfolio/portfoli-img-8.jpg') }}" alt="BLog Thumbnail">
                                </a>
                            </div>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">Dashboard
                                        design</a>
                                </h3>
                                <div class="tag-items">
                                    <ul>
                                        <li>
                                            <a href="#" class="tag-item">Adobe</a>
                                        </li>
                                        <li>
                                            <a href="#" class="tag-item">Webflow</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tmp-button-here">
                                <a class="tmp-btn hover-icon-reverse radius-round btn-border btn-md"
                                    href="{{ route('visitor.project.details', ['project' => 'web-design']) }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">View Design</span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="see-all-btn-wrap text-center mt--60">
                <a class="tmp-btn hover-icon-reverse radius-round" href="#">
                    <span class="icon-reverse-wrapper">
                        <span class="btn-text">View All Portfolio</span>
                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                    </span>
                </a>
            </div>
        </div>
    </section>
    <!-- Tpm Latest Portfolio End -->

    <!-- Tpm My Price plan Start -->
    <section id="pricing-area" class="our-price-plan-area tmp-section-gapTop">
        <div class="container">
            <div class="section-head mb--60">
                <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <span class="subtitle">My Price plan</span>
                </div>
                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Enhancing Collaboration
                    <br> between Remote
                </h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div
                        class="price-plan-card v2 tmponhover blur-style-three tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <div class="price-plan-card-icon">
                            <img src="{{ asset('visitor/reeni/images/pricing/pricing-logo-1.svg') }}" alt="pricing-logo">
                        </div>
                        <span class="price-sub-title">Starter</span>
                        <div class="check-box">
                            <ul>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">5 Social Media Account</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">Free Platform Access</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">Free Platform Access</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">24/7 Customer Support</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="main-price">$ 5.00</h3>
                        <p class="per-month">Per Month</p>
                        <div class="tmp-button-here">
                            <a class="tmp-btn hover-icon-reverse btn-border btn-md radius-round" href="#">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Get Started</span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="price-plan-card v2 tmponhover blur-style-three active tmp-scroll-trigger tmp-fade-in animation-order-2">
                        <div class="price-plan-card-icon">
                            <img src="{{ asset('visitor/reeni/images/pricing/pricing-logo-2.svg') }}" alt="pricing-logo">
                        </div>
                        <span class="price-sub-title">Premium</span>
                        <div class="check-box">
                            <ul>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">5 Social Media Account</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">Free Platform Access</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">24/7 Customer Support</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">24/7 Customer Support</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="main-price">$ 230.00</h3>
                        <p class="per-month">Per Month</p>
                        <div class="tmp-button-here">
                            <a class="tmp-btn hover-icon-reverse btn-md radius-round" href="#">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Get Started</span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="price-plan-card v2 tmponhover blur-style-three tmp-scroll-trigger tmp-fade-in animation-order-3">
                        <div class="price-plan-card-icon">
                            <img src="{{ asset('visitor/reeni/images/pricing/pricing-logo-3.svg') }}" alt="pricing-logo">
                        </div>
                        <span class="price-sub-title">Basic</span>
                        <div class="check-box">
                            <ul>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">5 Social Media Account</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">Free Platform Access</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">Digital Marketing</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">24/7 Customer Support</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="main-price">$ 45.00</h3>
                        <p class="per-month">Per Month</p>
                        <div class="tmp-button-here">
                            <a class="tmp-btn hover-icon-reverse btn-border btn-md radius-round" href="#">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Get Started</span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm My Price plan End -->

    <!-- Tpm Get In touch start -->
    <section id="contact-area" class="get-in-touch-area tmp-section-gapTop">
        <div class="container">
            <div class="get-in-touch-wrapper tmponhover">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5">
                        <div class="contact-inner">
                            <div
                                class="section-head section-head-one-side text-align-left tmp-scroll-trigger tmp-fade-in animation-order-1">
                                <span class="title-left">Get Ready To Create Great</span>
                            </div>
                            <ul class="ft-link v2">
                                <li class="tmp-scroll-trigger tmp-fade-in animation-order-1 tmp-link-animation">
                                    <span class="ft-icon"><i class="fa-solid fa-envelope"></i></span>
                                    <div class="ft-link-wrap">
                                        <h4 class="link-title">E-mail:</h4>
                                        <a href="#">nafiz125@gmail.com</a>
                                    </div>
                                </li>
                                <li class="tmp-scroll-trigger tmp-fade-in animation-order-2">
                                    <span class="ft-icon"><i class="fa-solid fa-location-dot"></i></span>
                                    <div class="ft-link-wrap">
                                        <h4 class="link-title">Location:</h4>
                                        <div>3891 Ranchview Dr. Richardson</div>
                                    </div>
                                </li>
                                <li class="tmp-scroll-trigger tmp-fade-in animation-order-3 tmp-link-animation">
                                    <span class="ft-icon"><i class="fa-solid fa-location-dot"></i></span>
                                    <div class="ft-link-wrap">
                                        <h4 class="link-title">Contact:</h4>
                                        <a href="#">01245789321</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="contact-inner">
                            <div
                                class="section-head section-head-one-side text-align-left tmp-scroll-trigger tmp-fade-in animation-order-1">
                                <span class="title">GET IN TOUCH</span>
                            </div>
                            <div class="contact-form">
                                <div id="form-messages" class="error"></div>
                                <form class="tmp-dynamic-form" id="contact-form" method="POST" action="mailer.php">
                                    <div class="contact-form-wrapper row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="input-field" name="name" id="contact-name"
                                                    placeholder="Your Name" type="text" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="input-field" name="phone" id="contact-phone"
                                                    placeholder="Phone Number" type="tel" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="input-field" id="contact-email" name="email"
                                                    placeholder="Your Email" type="email" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="input-field" type="text" id="subject"
                                                    name="subject" placeholder="Subject">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea class="input-field" placeholder="Your Message" name="message" id="contact-message" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="tmp-button-here">
                                                <button class="tmp-btn hover-icon-reverse radius-round w-100"
                                                    name="submit" type="submit" id="submit">
                                                    <span class="icon-reverse-wrapper">
                                                        <span class="btn-text">Appointment Now</span>
                                                        <span class="btn-icon"><i
                                                                class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                                        <span class="btn-icon"><i
                                                                class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm Get In touch End -->

    <!-- Tpm Blog and news Area Start -->
    <section id="blog-area" class="blog-and-news-are tmp-section-gap">
        <div class="container">
            <div class="section-head mb--60">
                <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <span class="subtitle">Latest Blog</span>
                </div>
                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Transforming Ideas into
                    Exceptional <br> the man can Creations</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-card-style-two tmponhover tmp-scroll-trigger tmp-fade-in animation-order-1">

                        <div class="blog-card-img">
                            <div class="img-box">
                                <a href="{{ route('visitor.blog.details', ['blog' => 'blog-7']) }}">
                                    <img class="img-primary hidden-on-mobile" src="{{ asset('visitor/reeni/images/blog/blog-img-7.jpg') }}"
                                        alt="Blog Thumbnail">
                                    <img class="img-secondary" src="{{ asset('visitor/reeni/images/blog/blog-img-7.jpg') }}"
                                        alt="BLog Thumbnail">
                                </a>
                            </div>
                            <span>12 Feb</span>
                        </div>
                        <div class="blog-content-wrap">
                            <div class="blog-tags">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa-regular fa-user"></i>Mesbah</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-regular fa-comments"></i>Comments (05)</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('visitor.blog.details', ['blog' => 'blog-7']) }}">Inspiring the World, One Project at a
                                    Time for the
                                    man</a></h3>


                            <div class="read-more-btn">
                                <a class="tmp-btn hover-icon-reverse radius-round btn-border btn-md"
                                    href="{{ route('visitor.blog.details', ['blog' => 'blog-7']) }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Read More</span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-card-style-two tmponhover tmp-scroll-trigger tmp-fade-in animation-order-2">
                        <div class="blog-card-img">
                            <div class="img-box">
                                <a href="{{ route('visitor.blog.details', ['blog' => 'blog-8']) }}">
                                    <img class="img-primary hidden-on-mobile" src="{{ asset('visitor/reeni/images/blog/blog-img-8.jpg') }}"
                                        alt="Blog Thumbnail">
                                    <img class="img-secondary" src="{{ asset('visitor/reeni/images/blog/blog-img-8.jpg') }}"
                                        alt="BLog Thumbnail">
                                </a>
                            </div>
                            <span>12 Feb</span>
                        </div>
                        <div class="blog-content-wrap">
                            <div class="blog-tags">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa-regular fa-user"></i>Mesbah</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-regular fa-comments"></i>Comments (05)</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('visitor.blog.details', ['blog' => 'blog-8']) }}">Let’s bring your ideas to life! Contact
                                    me, and let’s</a>
                            </h3>
                            <div class="read-more-btn">
                                <a class="tmp-btn hover-icon-reverse radius-round btn-border btn-md"
                                    href="{{ route('visitor.blog.details', ['blog' => 'blog-8']) }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Read More</span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-card-style-two tmponhover tmp-scroll-trigger tmp-fade-in animation-order-3">
                        <div class="blog-card-img">
                            <div class="img-box">
                                <a href="{{ route('visitor.blog.details', ['blog' => 'blog-9']) }}">
                                    <img class="img-primary hidden-on-mobile" src="{{ asset('visitor/reeni/images/blog/blog-img-9.jpg') }}"
                                        alt="Blog Thumbnail">
                                    <img class="img-secondary" src="{{ asset('visitor/reeni/images/blog/blog-img-9.jpg') }}"
                                        alt="BLog Thumbnail">
                                </a>
                            </div>
                            <span>12 Feb</span>
                        </div>
                        <div class="blog-content-wrap">
                            <div class="blog-tags">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa-regular fa-user"></i>Mesbah</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-regular fa-comments"></i>Comments (05)</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('visitor.blog.details', ['blog' => 'blog-9']) }}">Each one showcases my approach and
                                    dedication man</a>
                            </h3>
                            <div class="read-more-btn">
                                <a class="tmp-btn hover-icon-reverse radius-round btn-border btn-md"
                                    href="{{ route('visitor.blog.details', ['blog' => 'blog-9']) }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Read More</span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm Blog and news Area End -->
@endsection
