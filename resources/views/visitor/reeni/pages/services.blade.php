@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Services | Porichoy')

@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">Service</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">Service</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Latest Service Area Start -->
    <section class="latest-service-area tmp-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <a href="service-details.html"
                        class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <h2 class="service-card-num"><span>01.</span>Success Architects</h2>
                        <p class="service-para">Business consulting consultants provide expert advice and guida the a
                            businesses to help theme their performance efficiency</p>
                    </a>
                    <a href="service-details.html"
                        class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-2">
                        <h2 class="service-card-num"><span>02.</span>Success Architects</h2>
                        <p class="service-para">App consulting consultants provide expert advice and guida the a
                            businesses to help theme their performance efficiency</p>
                    </a>
                    <a href="service-details.html"
                        class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-3">
                        <h2 class="service-card-num"><span>03.</span>Success Architects</h2>
                        <p class="service-para">I specialize in creating solutions that are not only visually engaging but
                            also align with business goals. From [list services, e.g., branding,</p>
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <a href="service-details.html"
                        class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-4">
                        <h2 class="service-card-num"><span>04.</span>Ui/visual Design</h2>
                        <p class="service-para">I’m proud of what I’ve accomplished and excited to share my journey with
                            you. I’m proud of what I’ve accomplished and excited to.</p>
                    </a>
                    <a href="service-details.html"
                        class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-5">
                        <h2 class="service-card-num"><span>05.</span>Branding Design</h2>
                        <p class="service-para">Interested in working together? Let’s bring your ideas to life! Contact me,
                            and let’s start building something amazing.</p>
                    </a>
                    <a href="service-details.html"
                        class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-6">
                        <h2 class="service-card-num"><span>06.</span>Motion Design</h2>
                        <p class="service-para">Feel free to browse through my recent projects. Each one showcases my
                            approach and dedication to detail, creativity, and.</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Service Area End -->

    <!-- Tpm My Price plan Start -->
    <section class="our-price-plan-area tmp-section-gapBottom">
        <div class="container">
            <div class="section-head mb--60">
                <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <span class="subtitle">My Price plan</span>
                </div>
                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Enhancing Collaboration <br>
                    between Remote</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="price-plan-card tmponhover blur-style-two tmp-scroll-trigger tmp-fade-in animation-order-1">
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
