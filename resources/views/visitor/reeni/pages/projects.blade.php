@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Blog | Porichoy')

@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">Project</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">Project</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Tpm Our Latest Portfolio  Area Start -->
    <section class="tmp-latest-portfolio tmp-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="latest-portfolio-card v5 tmp-hover-link">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a href="project-details.html">
                                    <img class="img-primary hidden-on-mobile"
                                        src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-4.png') }}" alt="Blog Thumbnail">
                                    <img class="img-secondary" src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-4.png') }}"
                                        alt="BLog Thumbnail">
                                </a>
                            </div>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a class="link" href="project-details.html">Digital
                                        Transformation Advisors</a>
                                </h3>
                                <p class="portfoli-card-para"> Development Coaches</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="latest-portfolio-card v5 tmp-hover-link">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a href="project-details.html">
                                    <img class="img-primary hidden-on-mobile"
                                        src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-5.png') }}" alt="Blog Thumbnail">
                                    <img class="img-secondary" src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-5.png') }}"
                                        alt="BLog Thumbnail">
                                </a>
                            </div>
                            <a href="project-details.html" class="img-link-icon"><i
                                    class="fa-solid fa-arrow-up-long"></i></a>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a class="link" href="project-details.html">Digital
                                        Transformation Advisors</a>
                                </h3>
                                <p class="portfoli-card-para"> Development Coaches</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="latest-portfolio-card v5 tmp-hover-link">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a href="project-details.html">
                                    <img class="img-primary hidden-on-mobile"
                                        src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-6.png') }}" alt="Blog Thumbnail">
                                    <img class="img-secondary" src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-6.png') }}"
                                        alt="BLog Thumbnail">
                                </a>
                            </div>
                            <a href="project-details.html" class="img-link-icon"><i
                                    class="fa-solid fa-arrow-up-long"></i></a>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a class="link" href="project-details.html">Digital
                                        Transformation Advisors</a>
                                </h3>
                                <p class="portfoli-card-para"> Development Coaches</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="latest-portfolio-card v5 tmp-hover-link">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a href="project-details.html">
                                    <img class="img-primary hidden-on-mobile"
                                        src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-7.png') }}" alt="Blog Thumbnail">
                                    <img class="img-secondary" src="{{ asset('visitor/reeni/images/latest-portfolio/tab-image-7.png') }}"
                                        alt="BLog Thumbnail">
                                </a>
                            </div>
                            <a href="project-details.html" class="img-link-icon"><i
                                    class="fa-solid fa-arrow-up-long"></i></a>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a class="link" href="project-details.html">Digital
                                        Transformation Advisors</a>
                                </h3>
                                <p class="portfoli-card-para"> Development Coaches</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Tpm Our Latest Portfolio  Area End -->
@endsection
