@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'About | Porichoy')

@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">About Me</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">About Me</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Tpm Service Area Start -->
    <section class="service-area tmp-section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="service-card-v1 tmp-scroll-trigger tmp-fade-in animation-order-1 tmp-link-animation">
                        <div class="service-card-icon">
                            <i class="fa-light fa-pen-ruler"></i>
                        </div>
                        <h4 class="service-title"><a href="service-details.html">Web Design</a></h4>
                        <p class="service-para">120 Projects</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="service-card-v1 tmp-scroll-trigger tmp-fade-in animation-order-2 tmp-link-animation">
                        <div class="service-card-icon">
                            <i class="fa-light fa-bezier-curve"></i>
                        </div>
                        <h4 class="service-title"><a href="service-details.html">Ui/Ux Design</a></h4>
                        <p class="service-para">241 Projects</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="service-card-v1 tmp-scroll-trigger tmp-fade-in animation-order-3 tmp-link-animation">
                        <div class="service-card-icon">
                            <i class="fa-light fa-lightbulb"></i>
                        </div>
                        <h4 class="service-title"><a href="service-details.html">Web Research</a></h4>
                        <p class="service-para">240 Projects</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="service-card-v1 tmp-scroll-trigger tmp-fade-in animation-order-4 tmp-link-animation">
                        <div class="service-card-icon">
                            <i class="fa-light fa-envelope"></i>
                        </div>
                        <h4 class="service-title"><a href="service-details.html">Marketing</a></h4>
                        <p class="service-para">331 Prodect</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm Service Area End -->

    <!-- tmp skill area start -->
    <div class="tmp-skill-area tmp-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="progress-wrapper">
                                <div class="content">
                                    <h2 class="custom-title mb--30 tmp-scroll-trigger tmp-fade-in animation-order-1">
                                        Design Skill <span><img
                                                src="{{ asset('visitor/reeni/images/custom-line/custom-line.png') }}"
                                                alt="custom-line"></span>
                                    </h2>
                                    <!-- Start Single Progress Charts -->
                                    <div class="progress-charts">
                                        <h6 class="heading heading-h6">
                                            PHOTOSHOT</h6>
                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s"
                                                data-wow-delay=".3s" role="progressbar"
                                                style="width: 100%; visibility: visible; animation-duration: 0.5s; animation-delay: 0.3s; animation-name: fadeInLeft;"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                <span class="percent-label">100%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Progress Charts -->

                                    <!-- Start Single Progress Charts -->
                                    <div class="progress-charts">
                                        <h6 class="heading heading-h6">
                                            FIGMA</h6>
                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.6s"
                                                data-wow-delay=".4s" role="progressbar"
                                                style="width: 95%; visibility: visible; animation-duration: 0.6s; animation-delay: 0.4s; animation-name: fadeInLeft;"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                <span class="percent-label">95%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Progress Charts -->

                                    <!-- Start Single Progress Charts -->
                                    <div class="progress-charts">
                                        <h6 class="heading heading-h6">
                                            ADOBE XD</h6>
                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.7s"
                                                data-wow-delay=".5s" role="progressbar"
                                                style="width: 60%; visibility: visible; animation-duration: 0.7s; animation-delay: 0.5s; animation-name: fadeInLeft;"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                <span class="percent-label">60%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Progress Charts -->

                                    <!-- Start Single Progress Charts -->
                                    <div class="progress-charts">
                                        <h6 class="heading heading-h6">
                                            ADOBE ILLUSTRATOR</h6>
                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
                                                data-wow-delay=".6s" role="progressbar"
                                                style="width: 70%; visibility: visible; animation-duration: 0.8s; animation-delay: 0.6s; animation-name: fadeInLeft;"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                <span class="percent-label">70%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Progress Charts -->

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="progress-wrapper">
                                <div class="content">
                                    <h2 class="custom-title mb--30 tmp-scroll-trigger tmp-fade-in animation-order-1">
                                        Development Skill <span><img
                                                src="{{ asset('visitor/reeni/images/custom-line/custom-line.png') }}"
                                                alt="custom-line"></span>
                                    </h2>
                                    <!-- Start Single Progress Charts -->
                                    <div class="progress-charts">
                                        <h6 class="heading heading-h6">
                                            PHOTOSHOT</h6>
                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s"
                                                data-wow-delay=".3s" role="progressbar"
                                                style="width: 100%; visibility: visible; animation-duration: 0.5s; animation-delay: 0.3s; animation-name: fadeInLeft;"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                <span class="percent-label">100%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Progress Charts -->

                                    <!-- Start Single Progress Charts -->
                                    <div class="progress-charts">
                                        <h6 class="heading heading-h6">
                                            FIGMA</h6>
                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.6s"
                                                data-wow-delay=".4s" role="progressbar"
                                                style="width: 95%; visibility: visible; animation-duration: 0.6s; animation-delay: 0.4s; animation-name: fadeInLeft;"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                <span class="percent-label">95%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Progress Charts -->

                                    <!-- Start Single Progress Charts -->
                                    <div class="progress-charts">
                                        <h6 class="heading heading-h6">
                                            ADOBE XD</h6>
                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.7s"
                                                data-wow-delay=".5s" role="progressbar"
                                                style="width: 60%; visibility: visible; animation-duration: 0.7s; animation-delay: 0.5s; animation-name: fadeInLeft;"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                <span class="percent-label">60%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Progress Charts -->

                                    <!-- Start Single Progress Charts -->
                                    <div class="progress-charts">
                                        <h6 class="heading heading-h6">
                                            ADOBE ILLUSTRATOR</h6>
                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
                                                data-wow-delay=".6s" role="progressbar"
                                                style="width: 70%; visibility: visible; animation-duration: 0.8s; animation-delay: 0.6s; animation-name: fadeInLeft;"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                <span class="percent-label">70%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Progress Charts -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tmp skill area end -->

    <!-- Tpm Counter Area Start -->
    <section class="counter-area tmp-section-gapBottom">
        <div class="container">
            <div class="row g-5">
                <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                    <div
                        class="year-of-expariance-wrapper bg-blur-style-one tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <div class="year-expariance-wrap">
                            <!-- <h2 class="year-number"><span class="counter">25 </span> </h2> -->
                            <h2 class="counter year-number"><span class="odometer" data-count="25">00</span>
                            </h2>
                            <h3 class="year-title">Years Of <br> experience</h3>
                        </div>
                        <p class="year-para">Business consulting consultants provide expert advice and guida the a
                            businesses to help theme their performance efficiency</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="counter-area-right-content">
                        <div class="row g-5">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="counter-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <h3 class="counter counter-title"><span class="odometer" data-count="20">00</span>k+
                                    </h3>
                                    <p class="counter-para">Our Project Complete</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="counter-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-2">
                                    <h3 class="counter counter-title"><span class="odometer" data-count="10">00</span>k+
                                    </h3>
                                    <p class="counter-para">Our Natural Products</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="counter-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-3">
                                    <h3 class="counter counter-title"><span class="odometer" data-count="200">00</span>+
                                    </h3>
                                    <p class="counter-para">Clients Reviews</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="counter-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-4">
                                    <h3 class="counter counter-title"><span class="odometer" data-count="1000">00</span>+
                                    </h3>
                                    <p class="counter-para">our Satisfied Clientd</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm Counter Area End -->

    <!-- Tpm Education Experience Area Start -->
    <section class="education-experience tmp-section-gapBottom">
        <div class="container">
            <h2 class="custom-title mb-32 tmp-scroll-trigger tmp-fade-in animation-order-1">Education <span><img
                        src="{{ asset('visitor/reeni/images/custom-line/custom-line.png') }}" alt="custom-line"></span>
            </h2>
            <div class="row g-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="education-experience-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <h4 class="edu-sub-title">Trainer Marketing</h4>
                        <h2 class="edu-title">2005-2009</h2>
                        <p class="edu-para">A personal portfolio is a curated collection of an individual's professional
                            work, showcasing their skills, experience A personal portfolio.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="education-experience-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-2">
                        <h4 class="edu-sub-title">Assistant Director</h4>
                        <h2 class="edu-title">2010-2014</h2>
                        <p class="edu-para">Each project here showcases my commitment to excellence and adaptability,
                            tailored to meet each client’s unique needs.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="education-experience-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-3">
                        <h4 class="edu-sub-title">Design Assistant</h4>
                        <h2 class="edu-title">2008-2012</h2>
                        <p class="edu-para">I’ve had the privilege of working with various clients, from startups to
                            established companies, helping bring their visions to life.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="education-experience-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-4">
                        <h4 class="edu-sub-title">Design Assistant</h4>
                        <h2 class="edu-title">2008-2012</h2>
                        <p class="edu-para">Each project here showcases my commitment to excellence and adaptability,
                            tailored to meet each client’s unique needs a personal.</p>
                    </div>
                </div>
            </div>
            <div class="experiences-wrapper v2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="experiences-wrap-right-content">
                            <img class="tmp-scroll-trigger tmp-zoom-in animation-order-1"
                                src="{{ asset('visitor/reeni/images/experiences/expert-img-two.jpg') }}" alt="expert-img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="experiences-wrap-left-content">

                            <h2 class="custom-title mb-32 tmp-scroll-trigger tmp-fade-in animation-order-1">Experiences
                                <span><img src="{{ asset('visitor/reeni/images/custom-line/custom-line.png') }}"
                                        alt="custom-line"></span>
                            </h2>
                            <div class="experience-content tmp-scroll-trigger tmp-fade-in animation-order-1">
                                <p class="ex-subtitle">experience</p>
                                <h2 class="ex-name">Fatima Asrafy</h2>
                                <h3 class="ex-title">UI/UX Designer</h3>
                                <p class="ex-para">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                    desi dolore eu fugiat nulla pariatu Duis aute irure</p>
                            </div>

                            <div class="experience-content tmp-scroll-trigger tmp-fade-in animation-order-2">
                                <p class="ex-subtitle">experience</p>
                                <h2 class="ex-name">Fatima Asrafy</h2>
                                <h3 class="ex-title">UI/UX Designer</h3>
                                <p class="ex-para">Interested in working together? Let’s bring your ideas to life! Contact
                                    me, and let’s start building something.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm Education Experience Area End -->

    <!-- Tpm My Price plan Start -->
    <section class="our-price-plan-area tmp-section-gapBottom">
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
                        class="price-plan-card tmponhover blur-style-two tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <span class="price-sub-title">Starter</span>
                        <h3 class="main-price">$ 5.00</h3>
                        <p class="per-month">Per Month</p>
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
                            </ul>
                        </div>
                        <div class="tmp-button-here">
                            <a class="tmp-btn hover-icon-reverse btn-border btn-md radius-round" href="contact.html">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Get Started</span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 tmp-scroll-trigger tmp-fade-in animation-order-2">
                    <div class="price-plan-card tmponhover blur-style-two active">
                        <span class="price-sub-title">Basic</span>
                        <h3 class="main-price">$ 230.00</h3>
                        <p class="per-month">Per Month</p>
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
                                        <p class="box-para">Marketing Platform</p>
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
                                        <p class="box-para">Life time support</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tmp-button-here">
                            <a class="tmp-btn hover-icon-reverse btn-md radius-round" href="contact.html">
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
                        class="price-plan-card tmponhover blur-style-two tmp-scroll-trigger tmp-fade-in animation-order-3">
                        <span class="price-sub-title">Premium</span>
                        <h3 class="main-price">$ 45.00</h3>
                        <p class="per-month">Per Month</p>
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
                            </ul>
                        </div>
                        <div class="tmp-button-here">
                            <a class="tmp-btn hover-icon-reverse btn-border btn-md radius-round" href="contact.html">
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
    <section class="get-in-touch-area tmp-section-gapBottom">
        <div class="container">
            <div class="contact-get-in-touch-wrap">
                <div class="get-in-touch-wrapper tmponhover">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-5">
                            <div class="section-head text-align-left">
                                <div class="section-sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <span class="subtitle">GET IN TOUCH</span>
                                </div>
                                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Elevate
                                    your brand with Me </h2>
                                <p class="description tmp-scroll-trigger tmp-fade-in animation-order-3">ished fact that a
                                    reader will be
                                    distrol acted bioiiy desig
                                    ished fact that a reader will acted ished fact that a reader will be distrol
                                    acted </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-inner">
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
                                                    <input class="input-field" id="contact-phone"
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
        </div>
    </section>
    <!-- Tpm Get In touch End -->
@endsection
