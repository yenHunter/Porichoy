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
                                <h1 class="rs-breadcrumb-title">Services Details</h1>
                            </div>
                            <div class="rs-breadcrumb-menu text-center">
                                <nav>
                                    <ul>
                                        <li><span><a href="index.html">Home</a></span></li>
                                        <li><span>Services</span></li>
                                        <li><span>Services Details</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- services area start -->
        <section class="rs-services-area section-space-top primary-bg rs-services-one">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-12">
                        <div class="rs-services-details-thumb">
                            <img src="{{ asset('visitor/flixta/images/services/services-details-thumb.jpg') }}" alt="image">
                        </div>
                    </div>
                </div>
                <div class="row g-5 section-space-medium">
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-services-details-feature-section wow fadeInLeft" data-wow-delay=".3s"
                            data-wow-duration="1s">
                            <h3 class="rs-section-details-title rs-split-text-enable split-in-fade mb-20">Transforming Your
                                Brand Design Excellence</h3>
                            <p class="description">Hello there, My name is Marshall. I'm a freelancer, I'm winner of the
                                world's most prestigious
                                web design awards in the fields of UI/UX, and innovation. With a diverse background in art
                                direction, design leadership.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-services-details-feature-wrapper wow fadeInRight" data-wow-delay=".3s"
                            data-wow-duration="1s">
                            <p>Hello there, My name is Marshall. I'm a freelancer, I'm winner of the world's most
                                prestigious
                                web design awards in the fields of UI/UX, and innovation. With a diverse background in art
                                direction, design leadership, website and app UI/UX design, 3D design, and branding, I bring
                                a
                                well-rounded skill set to every project I take on.</p>
                            <div class="rs-services-details-feature-list">
                                <ul>
                                    <li>Will you provide website layout about design</li>
                                    <li>Branding With Business Agency</li>
                                    <li>Why should I work with an agency over a freelancer</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- services area end -->

        <!-- working step area start -->
        <section class="rs-working-step-area section-space-bottom rs-work-step-one primary-bg">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-section-title-wrapper section-title-space">
                            <h2 class="rs-section-title rs-split-text-enable split-in-fade">My Work Process</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5 process-counts">
                    <div class="col-xl-12">
                        <div class="rs-work-step-wrapper">
                            <div class="rs-work-step-item wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="rs-work-step-shape">
                                    <img class="has-white" src="{{ asset('visitor/flixta/images/shape/services-line-shape.png') }}" alt="image">
                                    <img class="has-black" src="{{ asset('visitor/flixta/images/shape/services-line-shape-dark.png') }}"
                                        alt="image">
                                </div>
                                <span class="rs-work-step-number">
                                    01
                                </span>
                                <h5 class="rs-work-step-title">
                                    Production
                                </h5>
                                <p class="rs-work-step-description">Conduct thorough market of the research fast target</p>
                            </div>
                            <div class="rs-work-step-item wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                                <div class="rs-work-step-shape">
                                    <img class="has-white" src="{{ asset('visitor/flixta/images/shape/services-line-shape.png') }}" alt="image">
                                    <img class="has-black" src="{{ asset('visitor/flixta/images/shape/services-line-shape-dark.png') }}"
                                        alt="image">
                                </div>
                                <span class="rs-work-step-number">
                                    02
                                </span>
                                <h5 class="rs-work-step-title">
                                    Quality Assurance
                                </h5>
                                <p class="rs-work-step-description">Conduct thorough market of the research fast target</p>
                            </div>
                            <div class="rs-work-step-item wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                                <div class="rs-work-step-shape">
                                    <img class="has-white" src="{{ asset('visitor/flixta/images/shape/services-line-shape.png') }}" alt="image">
                                    <img class="has-black" src="{{ asset('visitor/flixta/images/shape/services-line-shape-dark.png') }}"
                                        alt="image">
                                </div>
                                <span class="rs-work-step-number">
                                    03
                                </span>
                                <h5 class="rs-work-step-title">
                                    Quality Assurance
                                </h5>
                                <p class="rs-work-step-description">Conduct thorough market of the research fast target</p>
                            </div>
                            <div class="rs-work-step-item wow fadeInUp" data-wow-delay=".9s" data-wow-duration="1s">
                                <div class="rs-work-step-shape">
                                    <img class="has-white" src="{{ asset('visitor/flixta/images/shape/services-line-shape.png') }}" alt="image">
                                    <img class="has-black" src="{{ asset('visitor/flixta/images/shape/services-line-shape-dark.png') }}"
                                        alt="image">
                                </div>
                                <span class="rs-work-step-number">
                                    04
                                </span>
                                <h5 class="rs-work-step-title">
                                    Production
                                </h5>
                                <p class="rs-work-step-description">Conduct thorough market of the research fast target</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- working step area end -->

        <!-- about area start -->
        <section class="rs-about-area section-space-bottom primary-bg rs-about-fifteen">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-about-thumb wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="1s">
                            <img src="{{ asset('visitor/flixta/images/about/about-thumb-11.jpg') }}" alt="image">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 order-1 order-lg-0">
                        <div class="rs-about-content wow fadeInRight" data-wow-delay=".3s" data-wow-duration="1s">
                            <div class="rs-section-title-wrapper">
                                <h2 class="rs-section-title mb-30 rs-split-text-enable split-in-fade">Transforming Your
                                    Brand Design Excellence</h2>
                                <p class="rs-section-paragraph">We denounce with righteous indignation and dislike men who
                                    are
                                    so beguiled and demor alized by the charms of pleas ure of the moment, so blinded by
                                    desire.Neque qui is dolor emr ipsum quia dolor eque porro quisquam est.
                                </p>
                            </div>
                            <div class="rs-about-feature-list">
                                <ul>
                                    <li>Will you provide website layout about design</li>
                                    <li>Branding With Business Agency</li>
                                    <li>Why should I work with an agency over a freelancer</li>
                                </ul>
                            </div>
                            <div class="rs-about-counter-wrapper">
                                <div class="counter-text">
                                    <h2 class="counter-text-title"><span data-purecounter-duration="1"
                                            data-purecounter-end="1650" class="purecounter">0</span>+
                                    </h2>
                                    <p>Complete Project</p>
                                </div>
                                <div class="counter-text">
                                    <h2 class="counter-text-title"><span data-purecounter-duration="1"
                                            data-purecounter-end="2000" class="purecounter">0</span>+
                                    </h2>
                                    <p>
                                        Satisfied Customer
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end -->

        <!-- faq area start -->
        <section class="primary-bg section-space-bottom">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-faq-wrapper rs-faq-three wow fadeInLeft" data-wow-delay=".3s"
                            data-wow-duration="1s">
                            <div class="rs-section-title-wrapper section-title-space">
                                <span class="rs-section-subtitle justify-content-start">
                                    <img src="{{ asset('visitor/flixta/images/shape/small-arrow.png') }}" alt="image">Faq
                                </span>
                                <h2 class="rs-section-title rs-split-text-enable split-in-fade">Let's Talk Any Question
                                </h2>
                            </div>
                            <div class="rs-faq-content accordion-style-two">
                                <div class="accordion-wrapper">
                                    <div class="accordion" id="accordionExampleOne">
                                        <div class="accordion-item">
                                            <h4 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseNine" aria-expanded="true"
                                                    aria-controls="collapseNine">
                                                    How do I get a quotation for my project?
                                                    <span class="accordion-btn"></span>
                                                </button>
                                            </h4>
                                            <div id="collapseNine" class="accordion-collapse collapse show"
                                                data-bs-parent="#accordionExampleOne">
                                                <div class="accordion-body"> 10+ years later and I’ve learned that in order
                                                    to
                                                    succeed in this business, I need to be your business partner and problem
                                                    solver. Which is the same as saying through shrinking from toil and pain
                                                    these
                                                    cases.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h6 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTen"
                                                    aria-expanded="false" aria-controls="collapseTen">
                                                    How many landing pages I can work with your product?
                                                    <span class="accordion-btn"></span>
                                                </button>
                                            </h6>
                                            <div id="collapseTen" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExampleOne">
                                                <div class="accordion-body">10+ years later and I’ve learned that in order
                                                    to
                                                    succeed in this business, I need to be your business partner and problem
                                                    solver. Which is the same as saying through shrinking from toil and pain
                                                    these
                                                    cases.</div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h6 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseEleven"
                                                    aria-expanded="false" aria-controls="collapseEleven">
                                                    What are good questions to ask a doctor?
                                                    <span class="accordion-btn"></span>
                                                </button>
                                            </h6>
                                            <div id="collapseEleven" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExampleOne">
                                                <div class="accordion-body">10+ years later and I’ve learned that in order
                                                    to
                                                    succeed in this business, I need to be your business partner and problem
                                                    solver. Which is the same as saying through shrinking from toil and pain
                                                    these
                                                    cases.</div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h6 class="accordion-header" id="headingFour">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTwelve"
                                                    aria-expanded="false" aria-controls="collapseTwelve">
                                                    What Do I Need to Tell the Doctor?
                                                    <span class="accordion-btn"></span>
                                                </button>
                                            </h6>
                                            <div id="collapseTwelve" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExampleOne">
                                                <div class="accordion-body">10+ years later and I’ve learned that in order
                                                    to
                                                    succeed in this business, I need to be your business partner and problem
                                                    solver. Which is the same as saying through shrinking from toil and pain
                                                    these
                                                    cases.</div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h6 class="accordion-header" id="headingFive">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseThirteen"
                                                    aria-expanded="false" aria-controls="collapseThirteen">
                                                    How to interview a doctor?
                                                    <span class="accordion-btn"></span>
                                                </button>
                                            </h6>
                                            <div id="collapseThirteen" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExampleOne">
                                                <div class="accordion-body">10+ years later and I’ve learned that in order
                                                    to
                                                    succeed in this business, I need to be your business partner and problem
                                                    solver. Which is the same as saying through shrinking from toil and pain
                                                    these
                                                    cases.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 wow fadeInRight" data-wow-delay=".3s" data-wow-duration="1s">
                        <div class="rs-contact-form rs-contact-three has-white">
                            <form id="contact-form" action="{{ asset('visitor/flixta/mailer.php') }}" method="POST">
                                <div class="row g-5">
                                    <div class="col-md-6">
                                        <div class="rs-contact-input">
                                            <input id="name" name="name" type="text" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="rs-contact-input">
                                            <input id="email" name="email" type="email"
                                                placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="rs-contact-input">
                                            <input id="date" name="name" type="text"
                                                placeholder="dd/mm/yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="rs-contact-input">
                                            <input id="time" name="name" type="text" placeholder="Time">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="rs-contact-input">
                                            <input id="phone" name="phone" type="text"
                                                placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="rs-contact-input">
                                            <div class="rs-contact-input">
                                                <select id="subject" name="subject">
                                                    <option>Choose Service</option>
                                                    <option value="one">Web Development</option>
                                                    <option value="two">Digital Marketing</option>
                                                    <option value="three">Brand Strategy</option>
                                                    <option value="four">App Development</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="rs-contact-input">
                                            <textarea id="message" name="message" placeholder="Write Your Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="rs-contact-btn">
                                            <button type="submit" class="rs-btn has-color has-radius w-100">Send
                                                Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div id="form-messages"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq area end -->

        <!-- testimonial area start -->
        <section class="rs-testimonial-area rs-testimonial-one p-relative primary-bg has-bg-dark">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-section-title-wrapper section-title-space text-center">
                            <span class="rs-section-subtitle">
                                <img src="{{ asset('visitor/flixta/images/shape/small-arrow.png') }}" alt="image">TESTIMONIAL
                            </span>
                            <h2 class="rs-section-title rs-split-text-enable split-in-fade">What My Clients Say</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="swiper testimonial_active_one wow fadeInUp" data-wow-delay=".3s">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="rs-testimonial-wrapper">
                                        <div class="rs-testimonial-item">
                                            <div class="rs-testimonial-content">
                                                <div class="rs-testimonial-top">
                                                    <h5 class="rs-testimonial-title">Great Advice</h5>
                                                    <div class="rs-rating">
                                                        <span><i class="ri-star-fill"></i></span>
                                                        <span><i class="ri-star-fill"></i></span>
                                                        <span><i class="ri-star-fill"></i></span>
                                                        <span><i class="ri-star-fill"></i></span>
                                                        <span><i class="ri-star-fill"></i></span>
                                                    </div>
                                                </div>
                                                <div class="rs-testimonial-description">
                                                    <p> The standard chunk of lorem Ipsum used since the some music
                                                        reproduced below
                                                        for
                                                        those interested.</p>
                                                </div>
                                            </div>
                                            <div class="rs-testimonial-bottom">
                                                <div class="rs-testimonial-avater-info">
                                                    <h6 class="rs-testimonial-avater-title">Mel Gibson</h6>
                                                    <span class="rs-testimonial-avater-designation">Clients</span>
                                                </div>
                                                <div class="rs-testimonial-icon">
                                                    <img src="{{ asset('visitor/flixta/images/shape/quote-shape.png') }}" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rs-testimonial-wrapper">
                                        <div class="rs-testimonial-item">
                                            <div class="rs-testimonial-content">
                                                <div class="rs-testimonial-top">
                                                    <h5 class="rs-testimonial-title">Design Quality</h5>
                                                    <div class="rs-rating">
                                                        <span><i class="ri-star-fill"></i></span>
                                                        <span><i class="ri-star-fill"></i></span>
                                                        <span><i class="ri-star-fill"></i></span>
                                                        <span><i class="ri-star-fill"></i></span>
                                                        <span><i class="ri-star-fill"></i></span>
                                                    </div>
                                                </div>
                                                <div class="rs-testimonial-description">
                                                    <p> The standard chunk of lorem Ipsum used since the some music
                                                        reproduced below
                                                        for
                                                        those interested.</p>
                                                </div>
                                            </div>
                                            <div class="rs-testimonial-bottom">
                                                <div class="rs-testimonial-avater-info">
                                                    <h6 class="rs-testimonial-avater-title">Tom Hanks</h6>
                                                    <span class="rs-testimonial-avater-designation">Jackson S.</span>
                                                </div>
                                                <div class="rs-testimonial-icon">
                                                    <img src="{{ asset('visitor/flixta/images/shape/quote-shape.png') }}" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rs-testimonial-wrapper">
                                        <div class="rs-testimonial-item">
                                            <div class="rs-testimonial-content">
                                                <div class="rs-testimonial-top">
                                                    <h5 class="rs-testimonial-title">Great Solution</h5>
                                                    <div class="rs-rating">
                                                        <span><i class="ri-star-fill"></i></span>
                                                        <span><i class="ri-star-fill"></i></span>
                                                        <span><i class="ri-star-fill"></i></span>
                                                        <span><i class="ri-star-fill"></i></span>
                                                        <span><i class="ri-star-fill"></i></span>
                                                    </div>
                                                </div>
                                                <div class="rs-testimonial-description">
                                                    <p> The standard chunk of lorem Ipsum used since the some music
                                                        reproduced below
                                                        for
                                                        those interested.</p>
                                                </div>
                                            </div>
                                            <div class="rs-testimonial-bottom">
                                                <div class="rs-testimonial-avater-info">
                                                    <h6 class="rs-testimonial-avater-title">Johnny Depp</h6>
                                                    <span class="rs-testimonial-avater-designation">Ceo</span>
                                                </div>
                                                <div class="rs-testimonial-icon">
                                                    <img src="{{ asset('visitor/flixta/images/shape/quote-shape.png') }}" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rs-pagination justify-content-center mt-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial area end -->

        <!-- cta area start -->
        <section class="rs-cta-area section-space rs-cta-four p-relative primary-bg">
            <div class="rs-cta-bg" data-background="{{ asset('visitor/flixta/images/bg/cta-bg-01.png') }}">
            </div>
            <div class="container">
                <div class="row align-items-center justify-content-center g-5">
                    <div class="col-xl-8 col-lg-8">
                        <div class="rs-cta-content">
                            <div class="rs-cta-large-text  gsap-move right-60 start-81">
                                <h2 class="rs-cta-large-title">Hello</h2>
                            </div>
                            <div class="rs-cta-shape">
                                <img src="{{ asset('visitor/flixta/images/shape/hand-shape.png') }}" alt="image">
                            </div>
                            <h2 class="rs-cta-title rs-split-text-enable split-in-fade">If you have any project in mind?
                            </h2>
                            <h3 class="rs-cta-meta">
                                DM now!
                                <a href="mailto:contact@flixta.com">contact@flixta.com</a>
                            </h3>
                            <div class="rs-cta-btn">
                                <div class="rs-btn-group">
                                    <a class="rs-btn rs-btn-circle" href="contact.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                            <path d="M31,0H15V2H28.59L.29,30.29l1.41,1.41L30,3.41V16h2V1A1,1,0,0,0,31,0Z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="rs-btn rs-btn-primary" href="contact.html">Hire Me Now</a>
                                    <a class="rs-btn rs-btn-circle" href="contact.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                            <path d="M31,0H15V2H28.59L.29,30.29l1.41,1.41L30,3.41V16h2V1A1,1,0,0,0,31,0Z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta area end -->

    </main>
    <!-- Body main wrapper end -->
@endsection
