@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Porichoy')

@section('content')
    <!-- Body main wrapper start -->
    <main>

        <!-- breadcrumb area start -->
        <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
            <div class="rs-breadcrumb-bg bg-white" data-background="{{ asset('visitor/flixta/images/bg/breadcrumb-bg-01.png') }}"></div>
            <div class="rs-breadcrumb-bg bg-black" data-background="{{ asset('visitor/flixta/images/bg/breadcrumb-bg-dark-01.png') }}"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-8 col-lg-8">
                        <div class="rs-breadcrumb-content-wrapper">
                            <div class="rs-breadcrumb-title-wrapper text-center">
                                <h1 class="rs-breadcrumb-title">Portfolio Details</h1>
                            </div>
                            <div class="rs-breadcrumb-menu text-center">
                                <nav>
                                    <ul>
                                        <li><span><a href="index.html">Home</a></span></li>
                                        <li><span>Portfolio</span></li>
                                        <li><span>Portfolio Details</span></li>
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
        <section class="rs-portfolio-area section-space-top primary-bg">
            <div class="container">
                <div class="row g-5 mb-60">
                    <div class="col-xl-8 col-lg-8">
                        <div class="rs-portfolio-details-wrapper">
                            <div class="rs-portfolio-details-slider">
                                <div class="swiper portfolio_details_active_one">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="rs-portfolio-details-item">
                                                <div class="rs-portfolio-details-thumb">
                                                    <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-details-01.jpg') }}"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="rs-portfolio-details-item">
                                                <div class="rs-portfolio-details-thumb">
                                                    <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-details-02.jpg') }}"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="rs-portfolio-details-item">
                                                <div class="rs-portfolio-details-thumb">
                                                    <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-details-03.jpg') }}"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="rs-portfolio-details-item">
                                                <div class="rs-portfolio-details-thumb">
                                                    <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-details-04.jpg') }}"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="rs-portfolio-details-item">
                                                <div class="rs-portfolio-details-thumb">
                                                    <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-details-05.jpg') }}"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="rs-common-navigation d-none d-sm-block">
                                        <button class="rs-slider-button-prev"><i
                                                class="fa-regular fa-arrow-left"></i></button>
                                        <button class="rs-slider-button-next"><i
                                                class="fa-regular fa-arrow-right"></i></button>
                                    </div>
                                    <!-- If we need pagination -->
                                    <div class="d-block d-sm-none rs-portfolio-details-pagination">
                                        <div class="rs-pagination justify-content-center mt-50"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rs-portfolio-details-content wow fadeInUp" data-wow-delay=".3s"
                                data-wow-duration="1s">
                                <h3 class="rs-portfolio-details-title">Personal Portfolio</h3>
                                <p class="description">Hello there, My name is Marshall. I'm a freelancer, I'm winner of the
                                    world's most
                                    prestigious web design awards in the fields of UI/UX, and innovation. With a diverse
                                    background in art direction, design leadership, website and app UI/UX design, 3D design,
                                    and
                                    branding, I bring a well-rounded skill set to every project I take on. The wise man
                                    therefore
                                    always holds in these matters to this principlesimilique.</p>
                                <div class="rs-portfolio-details-feature-list mb-25">
                                    <ul>
                                        <li>Understand the purpose of the dashboard and what data or functionalities</li>
                                        <li>Sketch out a rough layout of the dashboard components placements.</li>
                                        <li>Utilize SASS variables for colors, fonts, spacing, ensuring consistency</li>
                                    </ul>
                                </div>
                                <p class="description">Hello there, My name is Marshall. I'm a freelancer, I'm winner of the
                                    world's most prestigious web design awards in the fields of UI/UX, and innovation. With
                                    a
                                    diverse background in art direction, design leadership, website and app UI/UX design, 3D
                                    design, and branding.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="rs-portfolio-details-sidebar p-relative">
                            <div class="rs-portfolio-details-sidebar-thumb">
                                <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-details-06.jpg') }}" alt="">
                            </div>
                            <div class="rs-portfolio-details-case-information">
                                <h4 class="rs-portfolio-details-case-title">Case Information</h4>
                                <div class="rs-portfolio-details-case-info-wrapper">
                                    <ul>
                                        <li>Clients <span>:</span> <strong>Maverick Harrison</strong></li>
                                        <li>Date <span>:</span> <strong>12 January, 2023</strong></li>
                                        <li>Category <span>:</span> <strong>Personal, Consulting</strong></li>
                                        <li>Address <span>:</span> <strong>19 Golden Street. New York</strong></li>
                                        <li>Budget <span>:</span> <strong>$ 5000</strong></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-portfolio-details-thumb wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="1s">
                            <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-details-07.jpg') }}" alt="image">
                            <h3 class="mt-40">Transformative Branding and Creative Enhancement</h3>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-portfolio-details-content-wrapper wow fadeInRight" data-wow-delay=".3s"
                            data-wow-duration="1s">
                            <div class="rs-portfolio-details-thumb">
                                <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-details-08.jpg') }}" alt="iamge">
                            </div>
                            <div class="rs-portfolio-details-feature-wrapper">
                                <p class="mt-40">We denounce with righteous indignation and dislike men who are so beguiled
                                    and
                                    demor alized
                                    by the charms of pleas ure of the moment, so blinded by desire.Neque qui is dolor emr
                                    ipsum
                                    quia dolor eque porro quisquam est.Tortor montes platea iacu lis posuere per mauris.</p>
                                <div class="rs-portfolio-details-feature-list">
                                    <ul>
                                        <li>Understand the purpose of the dashboard and what data or functionalities</li>
                                        <li>Sketch out a rough layout of the dashboard components placements.</li>
                                        <li>Utilize SASS variables for colors, fonts, spacing, ensuring consistency</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio area end -->

        <!-- portfolio navigation area start -->
        <section class="rs-portfolio-navigation-area primary-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="rs-postbox-more-navigation wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <div class="rs-postbox-more-left">
                                <div class="rs-postbox-more-icon">
                                    <a class="rs-circle-btn" href="blog-details.html">
                                        <i class="fa-regular fa-arrow-left-long"></i>
                                    </a>
                                </div>
                                <div class="rs-postbox-more-content">
                                    <p>Previous Post</p>
                                    <h6>
                                        <a href="blog-details.html">Document Manager Application</a>
                                    </h6>
                                </div>
                            </div>
                            <div class="rs-postbox-more-menu">
                                <a href="#">
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.6673 4.66662C12.9559 4.66662 14.0006 3.62196 14.0006 2.33331C14.0006 1.04466 12.9559 0 11.6673 0C10.3786 0 9.33398 1.04466 9.33398 2.33331C9.33398 3.62196 10.3786 4.66662 11.6673 4.66662Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M2.33331 4.66662C3.62196 4.66662 4.66662 3.62196 4.66662 2.33331C4.66662 1.04466 3.62196 0 2.33331 0C1.04466 0 0 1.04466 0 2.33331C0 3.62196 1.04466 4.66662 2.33331 4.66662Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M11.6673 13.9996C12.9559 13.9996 14.0006 12.955 14.0006 11.6663C14.0006 10.3777 12.9559 9.33301 11.6673 9.33301C10.3786 9.33301 9.33398 10.3777 9.33398 11.6663C9.33398 12.955 10.3786 13.9996 11.6673 13.9996Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M2.33331 13.9996C3.62196 13.9996 4.66662 12.955 4.66662 11.6663C4.66662 10.3777 3.62196 9.33301 2.33331 9.33301C1.04466 9.33301 0 10.3777 0 11.6663C0 12.955 1.04466 13.9996 2.33331 13.9996Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="rs-postbox-more-right">
                                <div class="rs-postbox-more-content">
                                    <p>Next Post</p>
                                    <h6>
                                        <a href="blog-details.html">Creative Website</a>
                                    </h6>
                                </div>
                                <div class="rs-postbox-more-icon">
                                    <a class="rs-circle-btn" href="blog-details.html">
                                        <i class="fa-regular fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio navigation area end -->

    </main>
    <!-- Body main wrapper end -->
@endsection
