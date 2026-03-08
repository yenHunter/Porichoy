@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Porichoy')

@section('content')
    <!-- Body main wrapper start -->
    <main>

        <!-- breadcrumb area start -->
        <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
            <div class="rs-breadcrumb-bg bg-white"
                data-background="{{ asset('visitor/flixta/images/bg/breadcrumb-bg-01.png') }}"></div>
            <div class="rs-breadcrumb-bg bg-black"
                data-background="{{ asset('visitor/flixta/images/bg/breadcrumb-bg-dark-01.png') }}"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-8 col-lg-8">
                        <div class="rs-breadcrumb-content-wrapper">
                            <div class="rs-breadcrumb-title-wrapper text-center">
                                <h1 class="rs-breadcrumb-title">Portfolio</h1>
                            </div>
                            <div class="rs-breadcrumb-menu text-center">
                                <nav>
                                    <ul>
                                        <li><span><a href="index.html">Home</a></span></li>
                                        <li><span>Portfolio</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- portfolio area start -->
        <section class="rs-portfolio-area rs-portfolio-one primary-bg section-space">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-6 cl-lg-6">
                        <div class="rs-portfolio-wrapper">
                            <div class="rs-portfolio-inner portfolio-grid glass-effect-yes">
                                <div class="rs-portfolio-item content-overlay ">
                                    <div class="rs-portfolio-thumb">
                                        <a href="portfolio-details.html">
                                            <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-thumb-01.png') }}"
                                                alt="image">
                                        </a>
                                    </div>
                                    <div class="rs-portfolio-content">
                                        <h5 class="rs-portfolio-title">
                                            <a href="portfolio-details.html">Document Manager Application</a>
                                        </h5>
                                        <span class="rs-portfolio-tag">Web Development</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 cl-lg-6">
                        <div class="rs-portfolio-wrapper">
                            <div class="rs-portfolio-inner portfolio-grid glass-effect-yes">
                                <div class="rs-portfolio-item content-overlay ">
                                    <div class="rs-portfolio-thumb">
                                        <a href="portfolio-details.html">
                                            <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-thumb-02.png') }}"
                                                alt="image">
                                        </a>
                                    </div>
                                    <div class="rs-portfolio-content">
                                        <h5 class="rs-portfolio-title">
                                            <a href="portfolio-details.html">Digital Marketing</a>
                                        </h5>
                                        <span class="rs-portfolio-tag">Web Development</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 cl-lg-6">
                        <div class="rs-portfolio-wrapper">
                            <div class="rs-portfolio-inner portfolio-grid glass-effect-yes">
                                <div class="rs-portfolio-item content-overlay ">
                                    <div class="rs-portfolio-thumb">
                                        <a href="portfolio-details.html">
                                            <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-thumb-03.png') }}"
                                                alt="image">
                                        </a>
                                    </div>
                                    <div class="rs-portfolio-content">
                                        <h5 class="rs-portfolio-title">
                                            <a href="portfolio-details.html">Creative Portfolio</a>
                                        </h5>
                                        <span class="rs-portfolio-tag">Web Development</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 cl-lg-6">
                        <div class="rs-portfolio-wrapper">
                            <div class="rs-portfolio-inner portfolio-grid glass-effect-yes">
                                <div class="rs-portfolio-item content-overlay ">
                                    <div class="rs-portfolio-thumb">
                                        <a href="portfolio-details.html">
                                            <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-thumb-01.png') }}"
                                                alt="image">
                                        </a>
                                    </div>
                                    <div class="rs-portfolio-content">
                                        <h5 class="rs-portfolio-title">
                                            <a href="portfolio-details.html">Mobile App Development</a>
                                        </h5>
                                        <span class="rs-portfolio-tag">Web Development</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio area end -->

    </main>
    <!-- Body main wrapper end -->
@endsection
