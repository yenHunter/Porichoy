@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Porichoy')

@section('content')

    <!-- Start Breadcrumb
        ============================================= -->
    <div class="breadcrumb-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <h1>Professional service websites design</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="https://validthemes.net/site-template/antux/services-details.html#"><i
                                        class="fas fa-home"></i> Home</a></li>
                            <li class="active">Services</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Star Services Details Area
        ============================================= -->
    <div class="services-details-area default-padding-bottom">
        <div class="container">
            <div class="services-details-items">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="service-single-thumb">
                            <img src="{{ asset('visitor/antux/img/banner/3.jpg') }}" alt="Thumb">
                        </div>
                    </div>
                </div>

                <div class="row mt-50">
                    <div class="col-lg-7">
                        <h2>Best influencer marketing services</h2>
                        <p>
                            We denounce with righteous indige nation and dislike men who are so beguiled and demo
                            realized by the charms of pleasure of the moment, so blinded by desire, that they cannot
                            foresee the pain and trouble that are bound to ensue cannot foresee. These cases are
                            perfectly simple and easy to distinguish. In a free hour, when our power of choice is
                            untrammelled data structures manages data in technology. Dislike men who are so beguiled
                            and demo realized by the charms of pleasure of the moment, so blinded by desire, that
                            they cannot foresee the pain and trouble.
                        </p>
                    </div>
                    <div class="col-lg-5 pl-60 pl-md-15 pl-xs-15">
                        <p>
                            New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly
                            so do instantly pretended. See general few civilly amiable pleased account carried.
                            These cases are perfectly simple and easy to distinguish. In a free hour, when our power
                            of choice is untrammelled data.
                        </p>
                        <ul class="list-style-one">
                            <li>Social media marketing</li>
                            <li>Search engine optimization (seo)</li>
                            <li>Public Relations</li>
                        </ul>
                    </div>

                    <div class="mt-50 mt-xs-40">
                        <h2>My work process</h2>
                        <div class="process-style-one">
                            <div class="process-style-one-item">
                                <span>01</span>
                                <h4>Research</h4>
                                <p>
                                    Excuse Deal say over contain performance from comparison new melancholy
                                    themselves.
                                </p>
                            </div>
                            <div class="process-style-one-item">
                                <span>02</span>
                                <h4>Concept</h4>
                                <p>
                                    Excuse Deal say over contain performance from comparison new melancholy
                                    themselves.
                                </p>
                            </div>
                            <div class="process-style-one-item">
                                <span>03</span>
                                <h4>Implement</h4>
                                <p>
                                    Excuse Deal say over contain performance from comparison new melancholy
                                    themselves.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services Details Area -->

    <!-- Star Services Details Area
        ============================================= -->
    <div class="services-details-area default-padding bg-gray">
        <div class="container">
            <div class="services-details-items">
                <div class="d-grid colums-2">
                    <div class="thumb-style-two">
                        <img src="{{ asset('visitor/antux/img/about/1.jpg') }}" alt="Image Not Found">
                    </div>

                    <div class="item">
                        <h2>Any questions find here.</h2>
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item accordion-style-one">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        May i see your work samples?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            New had happen unable uneasy. Drawings can followed improved out
                                            sociable not. Earnestly so do instantly pretended. See general few
                                            civilly amiable pleased account carried. Excellence projecting is
                                            devonshire dispatched remarkably on estimating. Side in so life past.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item accordion-style-one">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        What are your rates?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            New had happen unable uneasy. Drawings can followed improved out
                                            sociable not. Earnestly so do instantly pretended. See general few
                                            civilly amiable pleased account carried. Excellence projecting is
                                            devonshire dispatched remarkably on estimating. Side in so life past.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item accordion-style-one">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        How do you prefer to communicate?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            New had happen unable uneasy. Drawings can followed improved out
                                            sociable not. Earnestly so do instantly pretended. See general few
                                            civilly amiable pleased account carried. Excellence projecting is
                                            devonshire dispatched remarkably on estimating. Side in so life past.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item accordion-style-one">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        How to create an custom order?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            New had happen unable uneasy. Drawings can followed improved out
                                            sociable not. Earnestly so do instantly pretended. See general few
                                            civilly amiable pleased account carried. Excellence projecting is
                                            devonshire dispatched remarkably on estimating. Side in so life past.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services Details Area -->

    <!-- Start Testimonial
        ============================================= -->
    <div class="testimonial-style-one-area default-padding">
        <div class="shape-left-top">
            <img src="{{ asset('visitor/antux/img/banner/3.jpg') }}" alt="Image Not Found">
        </div>
        <div class="container">
            <div class="heading-left">
                <div class="row">
                    <div class="col-xl-6">
                        <h4 class="sub-title">Testimonials</h4>
                        <h2 class="title">Clients Testimonials</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-style-one-items">
                        <div
                            class="testimonial-style-one-carousel swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper" id="swiper-wrapper-9f11225385396ae4" aria-live="off"
                                style="transform: translate3d(-2592px, 0px, 0px); transition-duration: 0ms;">
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
                                    data-swiper-slide-index="2" role="group" aria-label="3 / 3"
                                    style="width: 1296px;">
                                    <div class="testimonial-style-one">
                                        <div class="item">
                                            <div class="thumb">
                                                <div class="inner">
                                                    <img src="{{ asset('visitor/antux/img/illustration/1.png') }}"
                                                        alt="Image Not Found">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="tm-review">
                                                    <div class="top">
                                                        <h5>Reviews On</h5>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="bottom">
                                                        <img src="{{ asset('visitor/antux/img/partner/9.png') }}"
                                                            alt="Image Not Found">
                                                        <p>4.9/ 60 Reviews</p>
                                                    </div>
                                                </div>
                                                <p>
                                                    "Thanks to your web agency team for their professional work. The
                                                    website they created for my business exceeded my expectations,
                                                    and my clients have given positive feedback about its design and
                                                    user-friendliness."
                                                </p>
                                                <div class="tm-footer">
                                                    <div class="provider">
                                                        <h4>Brooklyn Simmons</h4>
                                                        <span>UI/UX DESIGNER</span>
                                                    </div>
                                                    <span>03</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single item -->
                                <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="0" role="group"
                                    aria-label="1 / 3" style="width: 1296px;">
                                    <div class="testimonial-style-one">
                                        <div class="item">
                                            <div class="thumb">
                                                <div class="inner">
                                                    <img src="{{ asset('visitor/antux/img/illustration/2.png') }}"
                                                        alt="Image Not Found">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="tm-review">
                                                    <div class="top">
                                                        <h5>Reviews On</h5>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="bottom">
                                                        <img src="{{ asset('visitor/antux/img/partner/9.png') }}"
                                                            alt="Image Not Found">
                                                        <p>4.9/ 60 Reviews</p>
                                                    </div>
                                                </div>
                                                <p>
                                                    "Thanks to your web agency team for their professional work. The
                                                    website they created for my business exceeded my expectations,
                                                    and my clients have given positive feedback about its design and
                                                    user-friendliness."
                                                </p>
                                                <div class="tm-footer">
                                                    <div class="provider">
                                                        <h4>Brooklyn Simmons</h4>
                                                        <span>UI/UX DESIGNER</span>
                                                    </div>
                                                    <span>01</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single item -->
                                <!-- Single item -->
                                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="1" role="group"
                                    aria-label="2 / 3" style="width: 1296px;">
                                    <div class="testimonial-style-one">
                                        <div class="item">
                                            <div class="thumb">
                                                <div class="inner">
                                                    <img src="{{ asset('visitor/antux/img/illustration/3.png') }}"
                                                        alt="Image Not Found">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="tm-review">
                                                    <div class="top">
                                                        <h5>Reviews On</h5>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="bottom">
                                                        <img src="{{ asset('visitor/antux/img/partner/9.png') }}"
                                                            alt="Image Not Found">
                                                        <p>4.9/ 60 Reviews</p>
                                                    </div>
                                                </div>
                                                <p>
                                                    "Thanks to your web agency team for their professional work. The
                                                    website they created for my business exceeded my expectations,
                                                    and my clients have given positive feedback about its design and
                                                    user-friendliness."
                                                </p>
                                                <div class="tm-footer">
                                                    <div class="provider">
                                                        <h4>Brooklyn Simmons</h4>
                                                        <span>UI/UX DESIGNER</span>
                                                    </div>
                                                    <span>02</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single item -->
                                <!-- Single item -->
                                <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="2" role="group"
                                    aria-label="3 / 3" style="width: 1296px;">
                                    <div class="testimonial-style-one">
                                        <div class="item">
                                            <div class="thumb">
                                                <div class="inner">
                                                    <img src="{{ asset('visitor/antux/img/illustration/4.png') }}"
                                                        alt="Image Not Found">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="tm-review">
                                                    <div class="top">
                                                        <h5>Reviews On</h5>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="bottom">
                                                        <img src="{{ asset('visitor/antux/img/partner/9.png') }}"
                                                            alt="Image Not Found">
                                                        <p>4.9/ 60 Reviews</p>
                                                    </div>
                                                </div>
                                                <p>
                                                    "Thanks to your web agency team for their professional work. The
                                                    website they created for my business exceeded my expectations,
                                                    and my clients have given positive feedback about its design and
                                                    user-friendliness."
                                                </p>
                                                <div class="tm-footer">
                                                    <div class="provider">
                                                        <h4>Brooklyn Simmons</h4>
                                                        <span>UI/UX DESIGNER</span>
                                                    </div>
                                                    <span>03</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single item -->
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev"
                                    data-swiper-slide-index="0" role="group" aria-label="1 / 3"
                                    style="width: 1296px;">
                                    <div class="testimonial-style-one">
                                        <div class="item">
                                            <div class="thumb">
                                                <div class="inner">
                                                    <img src="{{ asset('visitor/antux/img/illustration/5.png') }}"
                                                        alt="Image Not Found">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="tm-review">
                                                    <div class="top">
                                                        <h5>Reviews On</h5>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="bottom">
                                                        <img src="{{ asset('visitor/antux/img/partner/9.png') }}"
                                                            alt="Image Not Found">
                                                        <p>4.9/ 60 Reviews</p>
                                                    </div>
                                                </div>
                                                <p>
                                                    "Thanks to your web agency team for their professional work. The
                                                    website they created for my business exceeded my expectations,
                                                    and my clients have given positive feedback about its design and
                                                    user-friendliness."
                                                </p>
                                                <div class="tm-footer">
                                                    <div class="provider">
                                                        <h4>Brooklyn Simmons</h4>
                                                        <span>UI/UX DESIGNER</span>
                                                    </div>
                                                    <span>01</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <!-- Navigation -->
                        <div class="testimonial-pagination">
                            <div
                                class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                                <span class="swiper-pagination-bullet" tabindex="0" role="button"
                                    aria-label="Go to slide 1"></span><span
                                    class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0"
                                    role="button" aria-label="Go to slide 2" aria-current="true"></span><span
                                    class="swiper-pagination-bullet" tabindex="0" role="button"
                                    aria-label="Go to slide 3"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial -->

    <!-- Start Promo box
        ============================================= -->
    <div class="promot-box-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="promo-box-items text-center">
                        <h2>Hello👋i'm available for freelance work</h2>
                        <h4>For quick response: <a href="skype:example123?chat"><i class="fab fa-skype"></i> Chat
                                now</a></h4>
                        <div class="button mt-40">
                            <a class="btn-style-regular"
                                href="https://validthemes.net/site-template/antux/services-details.html#"><span>Hire
                                    Me Now </span> <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Promo box -->
@endsection
