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
                                <h1 class="rs-breadcrumb-title">Services</h1>
                            </div>
                            <div class="rs-breadcrumb-menu text-center">
                                <nav>
                                    <ul>
                                        <li><span><a href="{{ route('visitor.index') }}">Home</a></span></li>
                                        <li><span>Services</span></li>
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
        <section class="rs-services-area section-space primary-bg rs-services-one">
            <div class="container">
                <div class="row g-5 process-counts">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <div class="rs-services-wrapper">
                            <div class="rs-services-item">
                                <h5 class="rs-services-title">
                                    <a href="{{ route('visitor.service.details', ['service' => 'web-development']) }}">Web
                                        <br> Development</a>
                                </h5>
                                <div class="rs-services-icon">
                                    <img src="{{ asset('visitor/flixta/images/icon/service-icon-01.png') }}" alt="image">
                                </div>
                                <div class="rs-services-description">
                                    <p> We are helping client to create UI websites.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1s">
                        <div class="rs-services-wrapper">
                            <div class="rs-services-item">
                                <h5 class="rs-services-title"> <a href="{{ route('visitor.service.details', ['service' => 'digital-marketing']) }}">Digital <br> Marketing</a>
                                </h5>
                                <div class="rs-services-icon">
                                    <img src="{{ asset('visitor/flixta/images/icon/service-icon-02.png') }}" alt="image">
                                </div>
                                <div class="rs-services-description">
                                    <p> We are helping client to create UI websites.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                        <div class="rs-services-wrapper">
                            <div class="rs-services-item">
                                <h5 class="rs-services-title"> <a href="{{ route('visitor.service.details', ['service' => 'brand-strategy']) }}">Brand <br> Strategy</a></h5>
                                <div class="rs-services-icon">
                                    <img src="{{ asset('visitor/flixta/images/icon/service-icon-03.png') }}" alt="image">
                                </div>
                                <div class="rs-services-description">
                                    <p> We are helping client to create UI websites.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1s">
                        <div class="rs-services-wrapper">
                            <div class="rs-services-item">
                                <h5 class="rs-services-title"> <a href="{{ route('visitor.service.details', ['service' => 'app-development']) }}">App <br> Development</a></h5>
                                <div class="rs-services-icon">
                                    <img src="{{ asset('visitor/flixta/images/icon/service-icon-04.png') }}" alt="image">
                                </div>
                                <div class="rs-services-description">
                                    <p> We are helping client to create UI websites.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="rs-services-wrapper">
                            <div class="rs-services-item">
                                <h5 class="rs-services-title"> <a href="{{ route('visitor.service.details', ['service' => 'ui-ux-design']) }}">UI/UX<br>Product Design</a>
                                </h5>
                                <div class="rs-services-icon">
                                    <img src="{{ asset('visitor/flixta/images/icon/service-icon-05.png') }}" alt="image">
                                </div>
                                <div class="rs-services-description">
                                    <p> We are helping client to create UI websites.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s" data-wow-duration="1s">
                        <div class="rs-services-wrapper">
                            <div class="rs-services-item">
                                <h5 class="rs-services-title"> <a href="{{ route('visitor.service.details', ['service' => 'e-commerce-business-solutions']) }}">E-commerce<br>Business
                                        Solutions</a></h5>
                                <div class="rs-services-icon">
                                    <img src="{{ asset('visitor/flixta/images/icon/service-icon-06.png') }}" alt="image">
                                </div>
                                <div class="rs-services-description">
                                    <p> We are helping client to create UI websites.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".9s" data-wow-duration="1s">
                        <div class="rs-services-wrapper">
                            <div class="rs-services-item">
                                <h5 class="rs-services-title"> <a href="{{ route('visitor.service.details', ['service' => 'digital-strategy-consulting']) }}">Digital<br>Strategy
                                        Consulting</a></h5>
                                <div class="rs-services-icon">
                                    <img src="{{ asset('visitor/flixta/images/icon/service-icon-07.png') }}"
                                        alt="image">
                                </div>
                                <div class="rs-services-description">
                                    <p> We are helping client to create UI websites.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1s" data-wow-duration="1s">
                        <div class="rs-services-wrapper">
                            <div class="rs-services-item">
                                <h5 class="rs-services-title"> <a href="{{ route('visitor.service.details', ['service' => 'creative-brand-identity']) }}">Creative<br>Brand
                                        Identity</a></h5>
                                <div class="rs-services-icon">
                                    <img src="{{ asset('visitor/flixta/images/icon/service-icon-08.png') }}"
                                        alt="image">
                                </div>
                                <div class="rs-services-description">
                                    <p> We are helping client to create UI websites.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- services area end -->

        <!-- pricing area start -->
        <section class="rs-pricing-area section-space rs-pricing-two">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-section-title-wrapper section-title-space text-center">
                            <span class="rs-section-subtitle">
                                <img src="{{ asset('visitor/flixta/images/shape/small-arrow.png') }}"
                                    alt="image">Pricing Plan
                            </span>
                            <h2 class="rs-section-title rs-split-text-enable split-in-fade">Pricing My Work</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <div class="rs-pricing-wrapper">
                            <div class="rs-pricing-item">
                                <div class="rs-pricing-content">
                                    <div class="rs-pricing-top">
                                        <h5 class="rs-pricing-title">Basic Plan</h5>
                                        <p class="description">What you will get in this plan !!</p>
                                    </div>
                                    <h2 class="rs-pricing-amount">
                                        $29.00
                                        <span class="duration">monthly</span>
                                    </h2>
                                </div>
                                <div class="rs-pricing-btn">
                                    <a class="rs-btn w-100 has-white has-radius height-50" href="{{ route('visitor.contact.index') }}">Get Start
                                        Now
                                    </a>
                                </div>
                                <div class="rs-pricing-feature">
                                    <span class="rs-pricing-feature-title">Lite includes:</span>
                                    <ul>
                                        <li>Prepare Documentation</li>
                                        <li>Brand Consistency</li>
                                        <li class="close">Quality Control System</li>
                                        <li class="close">International Business</li>
                                        <li class="close">Professional Support</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                        <div class="rs-pricing-wrapper">
                            <div class="rs-pricing-item item-active">
                                <div class="rs-pricing-content">
                                    <div class="rs-pricing-top">
                                        <h5 class="rs-pricing-title">Pro Plan</h5>
                                        <p class="description">Everything in pro, plus:</p>
                                    </div>
                                    <h2 class="rs-pricing-amount">
                                        $39.00
                                        <span class="duration">monthly</span>
                                    </h2>
                                </div>
                                <div class="rs-pricing-btn">
                                    <a class="rs-btn w-100 has-white has-radius height-50" href="{{ route('visitor.contact.index') }}">Get Start
                                        Now
                                    </a>
                                </div>
                                <div class="rs-pricing-feature">
                                    <span class="rs-pricing-feature-title">Everything in lite, plus:</span>
                                    <ul>
                                        <li>Prepare Documentation</li>
                                        <li>Brand Consistency</li>
                                        <li class="close">Quality Control System</li>
                                        <li class="close">International Business</li>
                                        <li class="close">Professional Support</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="rs-pricing-wrapper">
                            <div class="rs-pricing-item">
                                <div class="rs-pricing-content">
                                    <div class="rs-pricing-top">
                                        <h5 class="rs-pricing-title">Ultimate Plan</h5>
                                        <p class="description">Perfect choice for hard players</p>
                                    </div>
                                    <h2 class="rs-pricing-amount">
                                        $49.00
                                        <span class="duration">monthly</span>
                                    </h2>
                                </div>
                                <div class="rs-pricing-btn">
                                    <a class="rs-btn w-100 has-white has-radius height-50" href="{{ route('visitor.contact.index') }}">Get Start
                                        Now
                                    </a>
                                </div>
                                <div class="rs-pricing-feature">
                                    <span class="rs-pricing-feature-title">Everything in pro, plus:</span>
                                    <ul>
                                        <li>Prepare Documentation</li>
                                        <li>Brand Consistency</li>
                                        <li class="close">Quality Control System</li>
                                        <li class="close">International Business</li>
                                        <li class="close">Professional Support</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- pricing area end -->

        <!-- faq area start -->
        <section class="primary-bg section-space">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-faq-wrapper rs-faq-three wow fadeInLeft" data-wow-delay=".3s"
                            data-wow-duration="1s">
                            <div class="rs-section-title-wrapper section-title-space">
                                <span class="rs-section-subtitle justify-content-start">
                                    <img src="{{ asset('visitor/flixta/images/shape/small-arrow.png') }}"
                                        alt="image">Faq
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
                                            <input id="dame" name="name" type="text"
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

    </main>
    <!-- Body main wrapper end -->
@endsection
