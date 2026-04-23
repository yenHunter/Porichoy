@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Porichoy')

@section('content')
    <!-- Body main wrapper start -->
    <main>
        <!-- banner area start -->
        <section id="home" class="rs-banner-area rs-banner-one p-relative">
            <div class="rs-banner-bg bg-white" data-background="{{ asset('visitor/flixta/images/bg/banner-bg-01.png') }}">
            </div>
            <div class="rs-banner-bg bg-black"
                data-background="{{ asset('visitor/flixta/images/bg/banner-bg-dark-01.png') }}">
            </div>
            <div class="rs-banner-shape-three prallax-parent">
                <img data-depth="1.3" src="{{ asset('visitor/flixta/images/shape/ring-shape.png') }}" alt="image">
            </div>
            <div class="container">
                <div class="row align-items-center  g-5">
                    <div class="col-xl-10">
                        <div class="rs-banner-content">
                            <h1 class="rs-banner-title wow fadeInUp" data-wow-delay=".3s" data-wow-duration=".7s">I'm
                                <span class="cd-headline slide rs-title-slide">
                                    <span class="cd-words-wrapper">
                                        <b class="is-hidden">{{ $profile_info['first_name'] ?? 'Marshall' }}</b>
                                        <b class="is-visible">{{ $profile_info['first_name'] ?? 'Marshall' }}</b>
                                        <b class="is-hidden">{{ $profile_info['first_name'] ?? 'Marshall' }}</b>
                                    </span>
                                </span>
                                <br>
                                welcome to my portfolio
                            </h1>
                            <p class="rs-banner-description wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s">
                                {{ $profile_info['headline'] ?? 'Freelance Designer & Developer' }}</p>
                            <div class="rs-banner-btn">
                                <div class="rs-btn-group wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1.1s">
                                    <a class="rs-btn rs-btn-circle" href="{{ route('visitor.contact.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                            <path d="M31,0H15V2H28.59L.29,30.29l1.41,1.41L30,3.41V16h2V1A1,1,0,0,0,31,0Z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="rs-btn rs-btn-primary" href="{{ route('visitor.contact.index') }}">Hire Me
                                        Now</a>
                                    <a class="rs-btn rs-btn-circle" href="{{ route('visitor.contact.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                            <path d="M31,0H15V2H28.59L.29,30.29l1.41,1.41L30,3.41V16h2V1A1,1,0,0,0,31,0Z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="rs-banner-shape">
                                <img src="{{ asset('visitor/flixta/images/shape/triangle-shape.png') }}" alt="image">
                            </div>
                            <div class="rs-banner-shape-two">
                                <img src="{{ asset('visitor/flixta/images/shape/arow.png') }}" alt="image">
                            </div>
                            <div class="rs-theme-social wow fadeInUp" data-wow-delay=".9s" data-wow-duration="1.3s">
                                @if ($profile_info['twitter'] ?? null)
                                    <a href="{{ $profile_info['twitter'] }}" target="_blank" title="Twitter"><i class="ri-twitter-x-line"></i></a>
                                @endif
                                @if ($profile_info['facebook'] ?? null)
                                    <a href="{{ $profile_info['facebook'] }}" target="_blank" title="Facebook"><i class="ri-facebook-fill"></i></a>
                                @endif
                                @if ($profile_info['linkedin'] ?? null)
                                    <a href="{{ $profile_info['linkedin'] }}" target="_blank" title="LinkedIn"><i class="ri-linkedin-fill"></i></a>
                                @endif
                                @if ($profile_info['instagram'] ?? null)
                                    <a href="{{ $profile_info['instagram'] }}" target="_blank" title="Instagram"><i class="ri-instagram-line"></i></a>
                                @endif
                                @if ($profile_info['github'] ?? null)
                                    <a href="{{ $profile_info['github'] }}" target="_blank" title="GitHub"><i class="ri-github-fill"></i></a>
                                @endif
                                @if ($profile_info['youtube'] ?? null)
                                    <a href="{{ $profile_info['youtube'] }}" target="_blank" title="YouTube"><i class="ri-youtube-fill"></i></a>
                                @endif
                                @if ($profile_info['researchgate'] ?? null)
                                    <a href="{{ $profile_info['researchgate'] }}" target="_blank" title="ResearchGate"><i class="ri-book-fill"></i></a>
                                @endif
                                @if ($profile_info['whatsapp'] ?? null)
                                    <a href="{{ $profile_info['whatsapp'] }}" target="_blank" title="WhatsApp"><i class="ri-whatsapp-fill"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="rs-banner-thumb-wrapper position-relative wow fadeInUp" data-wow-delay="1s"
                            data-wow-duration="1.5s">
                            <div class="rs-banner-thumb">
                                @php
                                    $profilePicPath = $profile_info['profile_picture'] ?? 'visitor/flixta/images/banner/banner-thumb-01.png';
                                    // Check if it's a storage path
                                    if (str_starts_with($profilePicPath, 'uploads/profile/')) {
                                        $imgSrc = \Illuminate\Support\Facades\Storage::url($profilePicPath);
                                    } else {
                                        $imgSrc = asset($profilePicPath);
                                    }
                                @endphp
                                <img src="{{ $imgSrc }}" alt="profile">
                                <div class="rs-banner-exp gsap-move up-100 start-70">
                                    <h3 class="rs-banner-exp-title"><span data-purecounter-duration="1"
                                            data-purecounter-end="30" class="purecounter">30</span>+</h3>
                                    <p>Years of Experience</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner area end -->

        <!-- counter area start -->
        <section class="rs-counter-area has-bg rs-counter-one">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-4 col-lg-4">
                        <div class="counter-content-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <div class="counter-content-inner">
                                <h3 class="counter-text-title"><span data-purecounter-duration="1" data-purecounter-end="10"
                                        class="purecounter">10.</span>
                                    <span class="prefix"> .5k </span>
                                    <span class="prefix-two"> + </span>
                                </h3>
                                <span class="counter-title">Successfully Project</span>
                                <p>I have had the opportunity to work on several projects that have allowed me to develop my
                                    skills showcase.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="counter-content-wrapper wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                            <div class="counter-content-inner">
                                <h3 class="counter-text-title"><span data-purecounter-duration="1" data-purecounter-end="1"
                                        class="purecounter">1.</span>
                                    <span class="prefix"> .2k </span>
                                    <span class="prefix-two"> + </span>
                                </h3>
                                <span class="counter-title">Satisfied Clients</span>
                                <p>I have had the opportunity to work on several projects that have allowed me to develop my
                                    skills showcase.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- counter area start -->

        <!-- about area start -->
        <section id="about" class="rs-about-area section-space-top rs-about-one secondary-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-section-title-wrapper mb-30 text-center">
                            <span class="rs-section-subtitle">
                                <img src="{{ asset('visitor/flixta/images/shape/small-arrow.png') }}" alt="image">
                                About Me
                            </span>
                            <h2 class="rs-section-title rs-split-text-enable split-in-fade">My Soft Skills</h2>
                        </div>
                    </div>
                    <div class="col-xl-10">
                        <div class="rs-about-description wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <p>{{ $profile_info['bio'] ?? "Hello there, My name is Marshall. I'm a freelancer, I'm winner of the world's most prestigious web design awards in the fields of UI, UX, and innovation. With a diverse background in art direction, design leadership, website and app UI/UX design, 3D design, and branding, I bring a well-rounded skill set to every project I take on." }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end -->

        <!-- skill area start -->
        <section class="rs-skill-area rs-skill-one section-space-bottom secondary-bg">
            <div class="container">
                <div class="row g-5">
                    @forelse ($skill_list as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="rs-skill-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="rs-skill-item">
                                    <div class="rs-skill-top">
                                        <div class="rs-skill-icon">
                                            <img src="{{ asset($item->skill_logo_url) }}" alt="image">
                                        </div>
                                        <h5 class="rs-skill-title">{{ $item->skill_title }}</h5>
                                    </div>
                                    <div class="rs-skill-bottom">
                                        <div class="rs-skill-description">
                                            {!! $item->skill_details !!}
                                        </div>
                                        <div class="rs-skill-progress">
                                            <div class="single-progress">
                                                <div class="progress">
                                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
                                                        data-wow-delay=".3s" role="progressbar"
                                                        style="width: {{ $item->skill_score }}%"
                                                        aria-valuenow="{{ $item->skill_score }}" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                    </div>
                                                    <span class="progress-number">{{ $item->skill_score }}%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="rs-skill-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="rs-skill-item">
                                    <div class="rs-skill-top">
                                        <div class="rs-skill-icon">
                                            <img src="{{ asset('visitor/flixta/images/icon/figma.png') }}"
                                                alt="image">
                                        </div>
                                        <h5 class="rs-skill-title">Figma</h5>
                                    </div>
                                    <div class="rs-skill-bottom">
                                        <div class="rs-skill-description">
                                            <p> I have had the opportunity to work on several projects.</p>
                                        </div>
                                        <div class="rs-skill-progress">
                                            <div class="single-progress">
                                                <div class="progress">
                                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
                                                        data-wow-delay=".3s" role="progressbar" style="width: 90%"
                                                        aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                    <span class="progress-number">90%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="rs-skill-wrapper wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                                <div class="rs-skill-item">
                                    <div class="rs-skill-top">
                                        <div class="rs-skill-icon">
                                            <img src="{{ asset('visitor/flixta/images/icon/wordpress.png') }}"
                                                alt="image">
                                        </div>
                                        <h5 class="rs-skill-title">WordPress</h5>
                                    </div>
                                    <div class="rs-skill-bottom">
                                        <div class="rs-skill-description">
                                            <p> We are helping client to create UI websites.</p>
                                        </div>
                                        <div class="rs-skill-progress">
                                            <div class="single-progress">
                                                <div class="progress">
                                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
                                                        data-wow-delay=".3s" role="progressbar" style="width: 95%"
                                                        aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                    <span class="progress-number">95%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="rs-skill-wrapper wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                                <div class="rs-skill-item">
                                    <div class="rs-skill-top">
                                        <div class="rs-skill-icon">
                                            <img src="{{ asset('visitor/flixta/images/icon/react.png') }}"
                                                alt="image">
                                        </div>
                                        <h5 class="rs-skill-title">React</h5>
                                    </div>
                                    <div class="rs-skill-bottom">
                                        <div class="rs-skill-description">
                                            <p> Contrary the popular belief Lorem Ipsum not simply.</p>
                                        </div>
                                        <div class="rs-skill-progress">
                                            <div class="single-progress">
                                                <div class="progress">
                                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
                                                        data-wow-delay=".3s" role="progressbar" style="width: 80%"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                    <span class="progress-number">80%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="rs-skill-wrapper wow fadeInUp" data-wow-delay=".9s" data-wow-duration="1s">
                                <div class="rs-skill-item">
                                    <div class="rs-skill-top">
                                        <div class="rs-skill-icon">
                                            <img src="{{ asset('visitor/flixta/images/icon/html.png') }}" alt="image">
                                        </div>
                                        <h5 class="rs-skill-title">HTML</h5>
                                    </div>
                                    <div class="rs-skill-bottom">
                                        <div class="rs-skill-description">
                                            <p> Excepteur sint occaecat sunt in culpa qui officia.</p>
                                        </div>
                                        <div class="rs-skill-progress">
                                            <div class="single-progress">
                                                <div class="progress">
                                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
                                                        data-wow-delay=".3s" role="progressbar" style="width: 85%"
                                                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                    <span class="progress-number">85%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- skill area start -->

        <!-- services area start -->
        <section id="services" class="rs-services-area section-space primary-bg rs-services-one">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-section-title-wrapper section-title-space text-center">
                            <span class="rs-section-subtitle">
                                <img src="{{ asset('visitor/flixta/images/shape/small-arrow.png') }}" alt="image">
                                MY SERVICES
                            </span>
                            <h2 class="rs-section-title rs-split-text-enable split-in-fade">I'm Specialized In</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5 process-counts">
                    @forelse ($service_list as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="rs-services-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="rs-services-item">
                                    <h5 class="rs-services-title">
                                        <a
                                            href="{{ route('visitor.service.details', ['service' => $item->service_slug]) }}">
                                            {{ $item->service_title }}
                                        </a>
                                    </h5>
                                    <div class="rs-services-icon">
                                        <img src="{{ asset($item->service_icon_url) }}" alt="image">
                                    </div>
                                    <div class="rs-services-description">
                                        <p>{{ $item->service_subtitle }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="rs-services-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="rs-services-item">
                                    <h5 class="rs-services-title">
                                        <a
                                            href="{{ route('visitor.service.details', ['service' => 'web-development']) }}">
                                            Web <br> Development
                                        </a>
                                    </h5>
                                    <div class="rs-services-icon">
                                        <img src="{{ asset('visitor/flixta/images/icon/service-icon-01.png') }}"
                                            alt="image">
                                    </div>
                                    <div class="rs-services-description">
                                        <p> We are helping client to create UI websites.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="rs-services-wrapper wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                                <div class="rs-services-item">
                                    <h5 class="rs-services-title"> <a
                                            href="{{ route('visitor.service.details', ['service' => 'digital-marketing']) }}">Digital
                                            <br> Marketing</a>
                                    </h5>
                                    <div class="rs-services-icon">
                                        <img src="{{ asset('visitor/flixta/images/icon/service-icon-02.png') }}"
                                            alt="image">
                                    </div>
                                    <div class="rs-services-description">
                                        <p> We are helping client to create UI websites.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="rs-services-wrapper wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                                <div class="rs-services-item">
                                    <h5 class="rs-services-title"> <a
                                            href="{{ route('visitor.service.details', ['service' => 'brand-strategy']) }}">Brand
                                            <br> Strategy</a>
                                    </h5>
                                    <div class="rs-services-icon">
                                        <img src="{{ asset('visitor/flixta/images/icon/service-icon-03.png') }}"
                                            alt="image">
                                    </div>
                                    <div class="rs-services-description">
                                        <p> We are helping client to create UI websites.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="rs-services-wrapper wow fadeInUp" data-wow-delay=".9s" data-wow-duration="1s">
                                <div class="rs-services-item">
                                    <h5 class="rs-services-title"> <a
                                            href="{{ route('visitor.service.details', ['service' => 'app-development']) }}">App
                                            <br> Development</a>
                                    </h5>
                                    <div class="rs-services-icon">
                                        <img src="{{ asset('visitor/flixta/images/icon/service-icon-04.png') }}"
                                            alt="image">
                                    </div>
                                    <div class="rs-services-description">
                                        <p> We are helping client to create UI websites.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-10">
                        <div class="rs-services-text wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                            <p>Development your website, a comprehensive guide to designing a website that converts visitors
                                into customers in <span class="rs-text-primary">Flixta.</span></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="rs-services-btn wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                            <div class="rs-btn-group">
                                <a class="rs-btn rs-btn-circle" href="{{ route('visitor.service.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                        <path d="M31,0H15V2H28.59L.29,30.29l1.41,1.41L30,3.41V16h2V1A1,1,0,0,0,31,0Z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="rs-btn rs-btn-primary" href="{{ route('visitor.service.index') }}">View All
                                    Services</a>
                                <a class="rs-btn rs-btn-circle" href="{{ route('visitor.service.index') }}">
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
        </section>
        <!-- services area end -->

        <!-- experience area start -->
        <section class="rs-experience-area section-space rs-experience-one secondary-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-section-title-wrapper section-title-space text-center">
                            <span class="rs-section-subtitle">
                                <img src="{{ asset('visitor/flixta/images/shape/small-arrow.png') }}"
                                    alt="image">RESUME
                            </span>
                            <h2 class="rs-section-title rs-split-text-enable split-in-fade">My Work Experience</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    @forelse ($experience_list as $item)
                        <div class="col-xl-6 col-lg-6">
                            <div class="rs-experience-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="rs-experience-item">
                                    <div class="rs-experience-top">
                                        <div class="rs-experience-designation-wrapper">
                                            <span class="rs-circle-shape"></span>
                                            <h5 class="rs-experience-designation">{{ $item->employment_position }}</h5>
                                        </div>
                                        <span class="rs-experience-meta">
                                            {{ $item->date_range }}
                                        </span>
                                    </div>
                                    <div class="rs-experience-bottom">
                                        <div class="rs-experience-brand-thumb">
                                            <img class="has-white" src="{{ $item->organization_logo_url }}"
                                                alt="image">
                                            <img class="has-black" src="{{ $item->organization_logo_url }}"
                                                alt="image">
                                        </div>
                                        <div class="rs-experience-content">
                                            <h6 class="rs-experience-place">{{ $item->employment_organization }}</h6>
                                            <div class="rs-experience-description">
                                                {!! $item->employment_details !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-xl-6 col-lg-6">
                            <div class="rs-experience-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="rs-experience-item">
                                    <div class="rs-experience-top">
                                        <div class="rs-experience-designation-wrapper">
                                            <span class="rs-circle-shape"></span>
                                            <h5 class="rs-experience-designation">Web Developer</h5>
                                        </div>
                                        <span class="rs-experience-meta">
                                            2022 - 24 (Present)
                                        </span>
                                    </div>
                                    <div class="rs-experience-bottom">
                                        <div class="rs-experience-brand-thumb">
                                            <img class="has-white"
                                                src="{{ asset('visitor/flixta/images/brand/brand-thumb-01.png') }}"
                                                alt="image">
                                            <img class="has-black"
                                                src="{{ asset('visitor/flixta/images/brand/brand-thumb-dark-01.png') }}"
                                                alt="image">
                                        </div>
                                        <div class="rs-experience-content">
                                            <h6 class="rs-experience-place">Chase Intercom </h6>
                                            <div class="rs-experience-description">
                                                <p>I'm winner of the world's most prestigious web designthat has
                                                    more-or-less
                                                    normal
                                                    awards in the fields.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="rs-experience-wrapper wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                                <div class="rs-experience-item">
                                    <div class="rs-experience-top">
                                        <div class="rs-experience-designation-wrapper">
                                            <span class="rs-circle-shape"></span>
                                            <h5 class="rs-experience-designation">UI/UX Designer</h5>
                                        </div>
                                        <span class="rs-experience-meta">
                                            2017 - 2018
                                        </span>
                                    </div>
                                    <div class="rs-experience-bottom">
                                        <div class="rs-experience-brand-thumb">
                                            <img class="has-white"
                                                src="{{ asset('visitor/flixta/images/brand/brand-thumb-02.png') }}"
                                                alt="image">
                                            <img class="has-black"
                                                src="{{ asset('visitor/flixta/images/brand/brand-thumb-dark-02.png') }}"
                                                alt="image">
                                        </div>
                                        <div class="rs-experience-content">
                                            <h6 class="rs-experience-place">Allianz Technology </h6>
                                            <div class="rs-experience-description">
                                                <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined
                                                    chunks as
                                                    necessary.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="rs-experience-wrapper wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                                <div class="rs-experience-item">
                                    <div class="rs-experience-top">
                                        <div class="rs-experience-designation-wrapper">
                                            <span class="rs-circle-shape"></span>
                                            <h5 class="rs-experience-designation">Sr. Developer</h5>
                                        </div>
                                        <span class="rs-experience-meta">
                                            2019 - 2021
                                        </span>
                                    </div>
                                    <div class="rs-experience-bottom">
                                        <div class="rs-experience-brand-thumb">
                                            <img class="has-white"
                                                src="{{ asset('visitor/flixta/images/brand/brand-thumb-03.png') }}"
                                                alt="image">
                                            <img class="has-black"
                                                src="{{ asset('visitor/flixta/images/brand/brand-thumb-dark-03.png') }}"
                                                alt="image">
                                        </div>
                                        <div class="rs-experience-content">
                                            <h6 class="rs-experience-place">Spectrum Marketing </h6>
                                            <div class="rs-experience-description">
                                                <p>If you are going to use a passage of Lorem Ipsum, you need to be sure
                                                    there
                                                    isn't
                                                    anything.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="rs-experience-wrapper wow fadeInUp" data-wow-delay=".9s" data-wow-duration="1s">
                                <div class="rs-experience-item">
                                    <div class="rs-experience-top">
                                        <div class="rs-experience-designation-wrapper">
                                            <span class="rs-circle-shape"></span>
                                            <h5 class="rs-experience-designation">Product Designer</h5>
                                        </div>
                                        <span class="rs-experience-meta">
                                            2014 - 2016
                                        </span>
                                    </div>
                                    <div class="rs-experience-bottom">
                                        <div class="rs-experience-brand-thumb">
                                            <img class="has-white"
                                                src="{{ asset('visitor/flixta/images/brand/brand-thumb-04.png') }}"
                                                alt="image">
                                            <img class="has-black"
                                                src="{{ asset('visitor/flixta/images/brand/brand-thumb-dark-04.png') }}"
                                                alt="image">
                                        </div>
                                        <div class="rs-experience-content">
                                            <h6 class="rs-experience-place">Toyota International </h6>
                                            <div class="rs-experience-description">
                                                <p>Making this the first true generator on the Internet. It uses a
                                                    dictionary of
                                                    over
                                                    200 Latin words.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- experience area end -->

        <!-- text slide area start -->
        <div class="rs-text-slide-area rs-text-slide-one has-section-space primary-bg">
            <div class="container-fluid">
                <div class="rs-text-slide-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                    <div class="gsap-marquee right speed-20 move-to-1000 text-gradient-no">
                        <span class="rs-text-slide-item"> . Selected work . Selected work . Selected work . Selected work .
                            Selected
                            work . Selected work . Selected work . Selected work . </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- text slide area end -->

        <!-- portfolio area start -->
        <section id="portfolio" class="rs-portfolio-area rs-portfolio-one primary-bg section-space-bottom">
            <div class="container">
                <div class="row g-5">
                    @forelse ($project_list as $item)
                        <div class="col-xl-6 cl-lg-6">
                            <div class="rs-portfolio-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="rs-portfolio-inner portfolio-grid glass-effect-yes">
                                    <div class="rs-portfolio-item content-overlay ">
                                        <div class="rs-portfolio-thumb">
                                            <a
                                                href="{{ route('visitor.project.details', ['project' => $item->project_slug]) }}">
                                                <img src="{{ asset($item->project_profile_image_url) }}" alt="image">
                                            </a>
                                        </div>
                                        <div class="rs-portfolio-content">
                                            <h5 class="rs-portfolio-title">
                                                <a
                                                    href="{{ route('visitor.project.details', ['project' => $item->project_slug]) }}">
                                                    {{ $item->project_title }}</a>
                                            </h5>
                                            <span class="rs-portfolio-tag">{{ $item->service?->service_title }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-xl-6 cl-lg-6">
                            <div class="rs-portfolio-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="rs-portfolio-inner portfolio-grid glass-effect-yes">
                                    <div class="rs-portfolio-item content-overlay ">
                                        <div class="rs-portfolio-thumb">
                                            <a
                                                href="{{ route('visitor.project.details', ['project' => 'document-manager-application']) }}">
                                                <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-thumb-01.png') }}"
                                                    alt="image">
                                            </a>
                                        </div>
                                        <div class="rs-portfolio-content">
                                            <h5 class="rs-portfolio-title">
                                                <a
                                                    href="{{ route('visitor.project.details', ['project' => 'document-manager-application']) }}">Document
                                                    Manager Application</a>
                                            </h5>
                                            <span class="rs-portfolio-tag">Web Development</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 cl-lg-6">
                            <div class="rs-portfolio-wrapper wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                                <div class="rs-portfolio-inner portfolio-grid glass-effect-yes">
                                    <div class="rs-portfolio-item content-overlay ">
                                        <div class="rs-portfolio-thumb">
                                            <a
                                                href="{{ route('visitor.project.details', ['project' => 'digital-marketing']) }}">
                                                <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-thumb-02.png') }}"
                                                    alt="image">
                                            </a>
                                        </div>
                                        <div class="rs-portfolio-content">
                                            <h5 class="rs-portfolio-title">
                                                <a
                                                    href="{{ route('visitor.project.details', ['project' => 'digital-marketing']) }}">Digital
                                                    Marketing</a>
                                            </h5>
                                            <span class="rs-portfolio-tag">Web Development</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 cl-lg-6">
                            <div class="rs-portfolio-wrapper wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                                <div class="rs-portfolio-inner portfolio-grid glass-effect-yes">
                                    <div class="rs-portfolio-item content-overlay ">
                                        <div class="rs-portfolio-thumb">
                                            <a
                                                href="{{ route('visitor.project.details', ['project' => 'creative-portfolio']) }}">
                                                <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-thumb-03.png') }}"
                                                    alt="image">
                                            </a>
                                        </div>
                                        <div class="rs-portfolio-content">
                                            <h5 class="rs-portfolio-title">
                                                <a
                                                    href="{{ route('visitor.project.details', ['project' => 'creative-portfolio']) }}">Creative
                                                    Portfolio</a>
                                            </h5>
                                            <span class="rs-portfolio-tag">Web Development</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 cl-lg-6">
                            <div class="rs-portfolio-wrapper wow fadeInUp" data-wow-delay=".9s" data-wow-duration="1s">
                                <div class="rs-portfolio-inner portfolio-grid glass-effect-yes">
                                    <div class="rs-portfolio-item content-overlay ">
                                        <div class="rs-portfolio-thumb">
                                            <a
                                                href="{{ route('visitor.project.details', ['project' => 'mobile-app-development']) }}">
                                                <img src="{{ asset('visitor/flixta/images/portfolio/portfolio-thumb-01.png') }}"
                                                    alt="image">
                                            </a>
                                        </div>
                                        <div class="rs-portfolio-content">
                                            <h5 class="rs-portfolio-title">
                                                <a
                                                    href="{{ route('visitor.project.details', ['project' => 'mobile-app-development']) }}">Mobile
                                                    App Development</a>
                                            </h5>
                                            <span class="rs-portfolio-tag">Web Development</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- portfolio area end -->

        <!-- testimonial area start -->
        <section class="rs-testimonial-area rs-testimonial-one section-space p-relative secondary-bg">
            <div class="rs-testimonial-bg"
                data-background="{{ asset('visitor/flixta/images/bg/testimonial-bg-01.png') }}">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-section-title-wrapper section-title-space text-center">
                            <span class="rs-section-subtitle">
                                <img src="{{ asset('visitor/flixta/images/shape/small-arrow.png') }}"
                                    alt="image">TESTIMONIAL
                            </span>
                            <h2 class="rs-section-title rs-split-text-enable split-in-fade">What My Clients Say</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="swiper testimonial_active_one wow fadeInUp" data-wow-delay=".3s"
                            data-wow-duration="1s">
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
                                                    <img src="{{ asset('visitor/flixta/images/shape/quote-shape.png') }}"
                                                        alt="image">
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
                                                    <img src="{{ asset('visitor/flixta/images/shape/quote-shape.png') }}"
                                                        alt="image">
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
                                                    <img src="{{ asset('visitor/flixta/images/shape/quote-shape.png') }}"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- If we need pagination -->
                            <div class="rs-pagination justify-content-center mt-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial area end -->

        <!-- brand area start -->
        <div class="rs-brand-area rs-brand-one secondary-bg section-space-bottom fix">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="swiper brand_active_one wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <div class="swiper-wrapper">
                                @forelse ($client_list as $item)
                                    <div class="swiper-slide">
                                        <div class="rs-brand-wrapper">
                                            <div class="rs-brand-item text-center">
                                                <div class="rs-brand-thumb">
                                                    <a href="#">
                                                        <img class="has-white"
                                                            src="{{ asset($item->client_org_logo_url) }}"
                                                            alt="image">
                                                        <img class="has-black"
                                                            src="{{ asset($item->client_org_logo_url) }}"
                                                            alt="image">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="swiper-slide">
                                        <div class="rs-brand-wrapper">
                                            <div class="rs-brand-item text-center">
                                                <div class="rs-brand-thumb">
                                                    <a href="#">
                                                        <img class="has-white"
                                                            src="{{ asset('visitor/flixta/images/brand/brand-thumb-01.png') }}"
                                                            alt="image">
                                                        <img class="has-black"
                                                            src="{{ asset('visitor/flixta/images/brand/brand-thumb-dark-01.png') }}"
                                                            alt="image">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="rs-brand-wrapper">
                                            <div class="rs-brand-item text-center">
                                                <div class="rs-brand-thumb">
                                                    <a href="#">
                                                        <img class="has-white"
                                                            src="{{ asset('visitor/flixta/images/brand/brand-thumb-02.png') }}"
                                                            alt="image">
                                                        <img class="has-black"
                                                            src="{{ asset('visitor/flixta/images/brand/brand-thumb-dark-02.png') }}"
                                                            alt="image">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="rs-brand-wrapper">
                                            <div class="rs-brand-item text-center">
                                                <div class="rs-brand-thumb">
                                                    <a href="#">
                                                        <img class="has-white"
                                                            src="{{ asset('visitor/flixta/images/brand/brand-thumb-03.png') }}"
                                                            alt="image">
                                                        <img class="has-black"
                                                            src="{{ asset('visitor/flixta/images/brand/brand-thumb-dark-03.png') }}"
                                                            alt="image">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="rs-brand-wrapper">
                                            <div class="rs-brand-item text-center">
                                                <div class="rs-brand-thumb">
                                                    <a href="#">
                                                        <img class="has-white"
                                                            src="{{ asset('visitor/flixta/images/brand/brand-thumb-04.png') }}"
                                                            alt="image">
                                                        <img class="has-black"
                                                            src="{{ asset('visitor/flixta/images/brand/brand-thumb-dark-04.png') }}"
                                                            alt="image">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="rs-brand-wrapper">
                                            <div class="rs-brand-item text-center">
                                                <div class="rs-brand-thumb">
                                                    <a href="#">
                                                        <img class="has-white"
                                                            src="{{ asset('visitor/flixta/images/brand/brand-thumb-03.png') }}"
                                                            alt="image">
                                                        <img class="has-black"
                                                            src="{{ asset('visitor/flixta/images/brand/brand-thumb-dark-05.png') }}"
                                                            alt="image">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand area end -->

        <!-- cta area start -->
        <section class="rs-cta-area section-space rs-cta-one p-relative primary-bg">
            <div class="rs-cta-bg" data-background="{{ asset('visitor/flixta/images/bg/cta-bg-01.png') }}">
            </div>
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-xl-4 col-lg-4">
                        <div class="rs-cta-thumb wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="1s">
                            <img src="{{ asset('visitor/flixta/images/cta/cta-thumb-01.png') }}" alt="image">
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="rs-cta-content wow fadeInRight" data-wow-delay=".5s" data-wow-duration="1s">
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
                                    <a class="rs-btn rs-btn-circle" href="{{ route('visitor.contact.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                            <path d="M31,0H15V2H28.59L.29,30.29l1.41,1.41L30,3.41V16h2V1A1,1,0,0,0,31,0Z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="rs-btn rs-btn-primary" href="{{ route('visitor.contact.index') }}">Hire Me
                                        Now</a>
                                    <a class="rs-btn rs-btn-circle" href="{{ route('visitor.contact.index') }}">
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

        <!-- blog area start -->
        <section id="blog" class="rs-blog-area rs-blog-one section-space secondary-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-section-title-wrapper section-title-space text-center">
                            <span class="rs-section-subtitle">
                                <img src="{{ asset('visitor/flixta/images/shape/small-arrow.png') }}"
                                    alt="image">UPDATE
                            </span>
                            <h2 class="rs-section-title rs-split-text-enable split-in-fade">Latest News & Blogs</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="swiper blog_active_one wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="rs-blog-wrapper">
                                        <div class="rs-blog-item">
                                            <div class="rs-blog-thumb">
                                                <a
                                                    href="{{ route('visitor.blog.details', ['blog' => 'app-development']) }}">
                                                    <img src="{{ asset('visitor/flixta/images/blog/blog-thumb-01.png') }}"
                                                        alt="image"></a>
                                                <div class="rs-blog-tag">
                                                    <a
                                                        href="{{ route('visitor.blog.details', ['blog' => 'app-development']) }}">
                                                        App Development</a>
                                                </div>
                                            </div>
                                            <div class="rs-blog-content">
                                                <h5 class="rs-blog-title"><a
                                                        href="{{ route('visitor.blog.details', ['blog' => 'app-development']) }}">Do
                                                        you want to
                                                        become a
                                                        professional</a></h5>
                                                <div class="rs-blog-meta-list">
                                                    <div class="rs-blog-meta-item has-separator">
                                                        <span class="rs-meta-text"><a class="meta-author"
                                                                href="{{ route('visitor.blog.details', ['blog' => 'app-development']) }}">By
                                                                flixta</a></span>
                                                    </div>
                                                    <div class="rs-blog-meta-item">
                                                        <span class="rs-meta-text"><a
                                                                href="{{ route('visitor.blog.details', ['blog' => 'app-development']) }}">January
                                                                12,
                                                                2024</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rs-blog-wrapper">
                                        <div class="rs-blog-item">
                                            <div class="rs-blog-thumb">
                                                <a
                                                    href="{{ route('visitor.blog.details', ['blog' => 'creative-branding']) }}">
                                                    <img src="{{ asset('visitor/flixta/images/blog/blog-thumb-02.png') }}"
                                                        alt="image"></a>
                                                <div class="rs-blog-tag">
                                                    <a
                                                        href="{{ route('visitor.blog.details', ['blog' => 'creative-branding']) }}">
                                                        Creative Branding</a>
                                                </div>
                                            </div>
                                            <div class="rs-blog-content">
                                                <h5 class="rs-blog-title"><a
                                                        href="{{ route('visitor.blog.details', ['blog' => 'creative-branding']) }}">Do
                                                        you want to
                                                        become a
                                                        professional</a></h5>
                                                <div class="rs-blog-meta-list">
                                                    <div class="rs-blog-meta-item has-separator">
                                                        <span class="rs-meta-text"><a class="meta-author"
                                                                href="{{ route('visitor.blog.details', ['blog' => 'creative-branding']) }}">By
                                                                flixta</a></span>
                                                    </div>
                                                    <div class="rs-blog-meta-item">
                                                        <span class="rs-meta-text"><a
                                                                href="{{ route('visitor.blog.details', ['blog' => 'creative-branding']) }}">January
                                                                12,
                                                                2024</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rs-blog-wrapper">
                                        <div class="rs-blog-item">
                                            <div class="rs-blog-thumb">
                                                <a
                                                    href="{{ route('visitor.blog.details', ['blog' => 'product-design']) }}">
                                                    <img src="{{ asset('visitor/flixta/images/blog/blog-thumb-03.png') }}"
                                                        alt="image"></a>
                                                <div class="rs-blog-tag">
                                                    <a
                                                        href="{{ route('visitor.blog.details', ['blog' => 'product-design']) }}">
                                                        Product Design</a>
                                                </div>
                                            </div>
                                            <div class="rs-blog-content">
                                                <h5 class="rs-blog-title"><a
                                                        href="{{ route('visitor.blog.details', ['blog' => 'product-design']) }}">Strengthen
                                                        the
                                                        foundations to
                                                        scale your business</a></h5>
                                                <div class="rs-blog-meta-list">
                                                    <div class="rs-blog-meta-item has-separator">
                                                        <span class="rs-meta-text"><a class="meta-author"
                                                                href="{{ route('visitor.blog.details', ['blog' => 'product-design']) }}">By
                                                                flixta</a></span>
                                                    </div>
                                                    <div class="rs-blog-meta-item">
                                                        <span class="rs-meta-text"><a
                                                                href="{{ route('visitor.blog.details', ['blog' => 'product-design']) }}">May
                                                                25,
                                                                2024</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rs-blog-wrapper">
                                        <div class="rs-blog-item">
                                            <div class="rs-blog-thumb">
                                                <a
                                                    href="{{ route('visitor.blog.details', ['blog' => 'product-design']) }}">
                                                    <img src="{{ asset('visitor/flixta/images/blog/blog-thumb-04.png') }}"
                                                        alt="image"></a>
                                                <div class="rs-blog-tag">
                                                    <a
                                                        href="{{ route('visitor.blog.details', ['blog' => 'product-design']) }}">
                                                        Product Design</a>
                                                </div>
                                            </div>
                                            <div class="rs-blog-content">
                                                <h5 class="rs-blog-title"><a
                                                        href="{{ route('visitor.blog.details', ['blog' => 'product-design']) }}">If
                                                        you are new here
                                                        then these
                                                        will work</a></h5>
                                                <div class="rs-blog-meta-list">
                                                    <div class="rs-blog-meta-item has-separator">
                                                        <span class="rs-meta-text"><a class="meta-author"
                                                                href="{{ route('visitor.blog.details', ['blog' => 'product-design']) }}">By
                                                                flixta</a></span>
                                                    </div>
                                                    <div class="rs-blog-meta-item">
                                                        <span class="rs-meta-text"><a
                                                                href="{{ route('visitor.blog.details', ['blog' => 'product-design']) }}">June
                                                                12,
                                                                2023</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rs-blog-wrapper">
                                        <div class="rs-blog-item">
                                            <div class="rs-blog-thumb">
                                                <a
                                                    href="{{ route('visitor.blog.details', ['blog' => 'app-development']) }}">
                                                    <img src="{{ asset('visitor/flixta/images/blog/blog-thumb-05.png') }}"
                                                        alt="image"></a>
                                                <div class="rs-blog-tag">
                                                    <a
                                                        href="{{ route('visitor.blog.details', ['blog' => 'app-development']) }}">
                                                        App Development</a>
                                                </div>
                                            </div>
                                            <div class="rs-blog-content">
                                                <h5 class="rs-blog-title"><a
                                                        href="{{ route('visitor.blog.details', ['blog' => 'app-development']) }}">If
                                                        you are new here
                                                        then these
                                                        will work</a></h5>
                                                <div class="rs-blog-meta-list">
                                                    <div class="rs-blog-meta-item has-separator">
                                                        <span class="rs-meta-text"><a class="meta-author"
                                                                href="{{ route('visitor.blog.details', ['blog' => 'app-development']) }}">By
                                                                flixta</a></span>
                                                    </div>
                                                    <div class="rs-blog-meta-item">
                                                        <span class="rs-meta-text"><a
                                                                href="{{ route('visitor.blog.details', ['blog' => 'app-development']) }}">June
                                                                12,
                                                                2023</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rs-blog-wrapper">
                                        <div class="rs-blog-item">
                                            <div class="rs-blog-thumb">
                                                <a
                                                    href="{{ route('visitor.blog.details', ['blog' => 'web-development']) }}">
                                                    <img src="{{ asset('visitor/flixta/images/blog/blog-thumb-06.png') }}"
                                                        alt="image"></a>
                                                <div class="rs-blog-tag">
                                                    <a
                                                        href="{{ route('visitor.blog.details', ['blog' => 'web-development']) }}">
                                                        Web Development</a>
                                                </div>
                                            </div>
                                            <div class="rs-blog-content">
                                                <h5 class="rs-blog-title"><a
                                                        href="{{ route('visitor.blog.details', ['blog' => 'web-development']) }}">Do
                                                        you want to
                                                        become a
                                                        professional</a></h5>
                                                <div class="rs-blog-meta-list">
                                                    <div class="rs-blog-meta-item has-separator">
                                                        <span class="rs-meta-text"><a class="meta-author"
                                                                href="{{ route('visitor.blog.details', ['blog' => 'web-development']) }}">By
                                                                flixta</a></span>
                                                    </div>
                                                    <div class="rs-blog-meta-item">
                                                        <span class="rs-meta-text"><a
                                                                href="{{ route('visitor.blog.details', ['blog' => 'web-development']) }}">June
                                                                12,
                                                                2023</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="rs-blog-btn mt-50 d-flex justify-content-center wow fadeInUp" data-wow-delay=".5s"
                            data-wow-duration="1s">
                            <div class="rs-btn-group">
                                <a class="rs-btn rs-btn-circle" href="{{ route('visitor.blog.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                        <path d="M31,0H15V2H28.59L.29,30.29l1.41,1.41L30,3.41V16h2V1A1,1,0,0,0,31,0Z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="rs-btn rs-btn-primary" href="{{ route('visitor.blog.index') }}">View All
                                    Post</a>
                                <a class="rs-btn rs-btn-circle" href="{{ route('visitor.blog.index') }}">
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
        </section>
        <!-- blog area end -->

        <!-- contact area start -->
        <section id="contact" class="rs-contact-area rs-contact-one section-space primary-bg p-relative">
            <div class="rs-contact-bg" data-background="{{ asset('visitor/flixta/images/bg/contact-bg-01.png') }}">
            </div>
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-xl-5 col-lg-5">
                        <div class="rs-contact-wrapper wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="1s">
                            <div class="rs-section-title-wrapper section-title-space">
                                <span class="rs-section-subtitle justify-content-start">
                                    <img src="{{ asset('visitor/flixta/images/shape/small-arrow.png') }}"
                                        alt="image">STAY CONNECTED
                                </span>
                                <h2 class="rs-section-title rs-split-text-enable split-in-fade">Let's Work Together!</h2>
                            </div>
                            <div class="rs-contact-list">
                                <div class="rs-contact-list-item">
                                    <div class="rs-contact-icon">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M3.65387 1.32849C3.40343 1.00649 2.92745 0.976861 2.639 1.26531L1.60508 2.29923C1.1216 2.78271 0.94387 3.46766 1.1551 4.06847C2.00338 6.48124 3.39215 8.74671 5.32272 10.6773C7.25329 12.6078 9.51876 13.9966 11.9315 14.8449C12.5323 15.0561 13.2173 14.8784 13.7008 14.3949L14.7347 13.361C15.0231 13.0726 14.9935 12.5966 14.6715 12.3461L12.3653 10.5524C12.2008 10.4245 11.9866 10.3793 11.7845 10.4298L9.59541 10.9771C9.00082 11.1257 8.37183 10.9515 7.93845 10.5181L5.48187 8.06155C5.04849 7.62817 4.87427 6.99919 5.02292 6.40459L5.57019 4.21553C5.62073 4.01336 5.57552 3.79918 5.44758 3.63468L3.65387 1.32849ZM1.88477 0.511076C2.62689 -0.231039 3.8515 -0.154797 4.49583 0.673634L6.28954 2.97983C6.6187 3.40304 6.73502 3.95409 6.60498 4.47423L6.05772 6.66329C5.99994 6.8944 6.06766 7.13888 6.2361 7.30732L8.69268 9.7639C8.86113 9.93235 9.1056 10.0001 9.33671 9.94229L11.5258 9.39502C12.0459 9.26499 12.597 9.3813 13.0202 9.71047L15.3264 11.5042C16.1548 12.1485 16.231 13.3731 15.4889 14.1152L14.455 15.1492C13.7153 15.8889 12.6089 16.2137 11.5778 15.8512C9.01754 14.9511 6.61438 13.4774 4.56849 11.4315C2.5226 9.38562 1.04895 6.98246 0.148838 4.42225C-0.213682 3.39112 0.11113 2.28472 0.85085 1.545L1.88477 0.511076Z"
                                                    fill="#6D6D6D"></path>
                                                <path
                                                    d="M11 0.5C11 0.223858 11.2239 0 11.5 0H15.5C15.7761 0 16 0.223858 16 0.5V4.5C16 4.77614 15.7761 5 15.5 5C15.2239 5 15 4.77614 15 4.5V1.70711L10.8536 5.85355C10.6583 6.04882 10.3417 6.04882 10.1464 5.85355C9.95118 5.65829 9.95118 5.34171 10.1464 5.14645L14.2929 1H11.5C11.2239 1 11 0.776142 11 0.5Z"
                                                    fill="#6D6D6D"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rs-contact-list-content">
                                        <span>Phone</span>
                                        <h6><a href="tel:{{ $profile_info['phone'] ?? '+123-4669-1234' }}"> {{ $profile_info['phone'] ?? '+123-4669-1234' }} </a></h6>
                                    </div>
                                </div>
                                <div class="rs-contact-list-item">
                                    <div class="rs-contact-icon">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M2 2C0.895431 2 0 2.89543 0 4V12L2.58386e-05 12.0103C0.00555998 13.1101 0.898859 14 2 14H7.5C7.77614 14 8 13.7761 8 13.5C8 13.2239 7.77614 13 7.5 13H2C1.53715 13 1.14774 12.6855 1.03376 12.2586L6.67417 8.7876L8 9.5831L15 5.3831V8.5C15 8.77614 15.2239 9 15.5 9C15.7761 9 16 8.77614 16 8.5V4C16 2.89543 15.1046 2 14 2H2ZM5.70808 8.20794L1 11.1052V5.3831L5.70808 8.20794ZM1 4.2169V4C1 3.44772 1.44772 3 2 3H14C14.5523 3 15 3.44772 15 4V4.2169L8 8.4169L1 4.2169Z"
                                                    fill="#6D6D6D"></path>
                                                <path
                                                    d="M14.2467 14.2686C15.2567 14.2686 15.8339 13.4116 15.8339 12.2442V12.0344C15.8339 10.4297 14.6402 9 12.5197 9H12.4847C10.421 9 9 10.3598 9 12.4322V12.6465C9 14.8195 10.4385 16 12.3579 16H12.4016C12.9963 16 13.4204 15.9257 13.639 15.8251V15.0949C13.3941 15.2042 12.9656 15.2742 12.4585 15.2742H12.4147C11.0812 15.2742 9.84385 14.4872 9.84385 12.6202V12.4628C9.84385 10.8057 10.9019 9.73891 12.4847 9.73891H12.524C14.0587 9.73891 15.0075 10.7883 15.0075 12.065V12.183C15.0075 13.158 14.6839 13.5734 14.3691 13.5734C14.1374 13.5734 13.9582 13.4247 13.9582 13.1537V10.9631H13.0531V11.5315H13.0225C12.9394 11.2342 12.6552 10.9019 12.0693 10.9019C11.2911 10.9019 10.8101 11.4572 10.8101 12.3011V12.8301C10.8101 13.722 11.2998 14.2642 12.0693 14.2642C12.5415 14.2642 12.9656 14.0369 13.0837 13.6215H13.1274C13.2455 14.0412 13.7439 14.2686 14.2467 14.2686ZM11.7939 12.6814V12.4541C11.7939 11.9076 12.0212 11.6627 12.3666 11.6627C12.664 11.6627 12.9394 11.8551 12.9394 12.371V12.7383C12.9394 13.3111 12.6858 13.4816 12.3754 13.4816C12.0212 13.4816 11.7939 13.2673 11.7939 12.6814Z"
                                                    fill="#6D6D6D"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rs-contact-list-content">
                                        <span>Email</span>
                                        <h6><a href="mailto:{{ $profile_info['email'] ?? 'hello@flixta.com' }}">{{ $profile_info['email'] ?? 'hello@flixta.com' }}</a></h6>
                                    </div>
                                </div>
                                <div class="rs-contact-list-item">
                                    <div class="rs-contact-icon">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="18"
                                                viewBox="0 0 14 18" fill="none">
                                                <path
                                                    d="M11.8768 9.68475C11.3059 10.835 10.5331 11.9818 9.74128 13.0109C8.95198 14.0368 8.15999 14.9249 7.5643 15.5572C7.48514 15.6412 7.40956 15.7206 7.33802 15.7951C7.26648 15.7206 7.1909 15.6412 7.11174 15.5572C6.51605 14.9249 5.72406 14.0368 4.93476 13.0109C4.14299 11.9818 3.37019 10.835 2.79925 9.68475C2.22242 8.52266 1.89032 7.43373 1.89032 6.5C1.89032 3.50846 4.32934 1.08333 7.33802 1.08333C10.3467 1.08333 12.7857 3.50846 12.7857 6.5C12.7857 7.43373 12.4536 8.52266 11.8768 9.68475ZM7.33802 17.3333C7.33802 17.3333 13.8753 11.1732 13.8753 6.5C13.8753 2.91015 10.9484 0 7.33802 0C3.7276 0 0.800781 2.91015 0.800781 6.5C0.800781 11.1732 7.33802 17.3333 7.33802 17.3333Z"
                                                    fill="#6D6D6D"></path>
                                                <path
                                                    d="M7.33802 8.66667C6.13455 8.66667 5.15894 7.69662 5.15894 6.5C5.15894 5.30338 6.13455 4.33333 7.33802 4.33333C8.54149 4.33333 9.5171 5.30338 9.5171 6.5C9.5171 7.69662 8.54149 8.66667 7.33802 8.66667ZM7.33802 9.75C9.14323 9.75 10.6066 8.29492 10.6066 6.5C10.6066 4.70507 9.14323 3.25 7.33802 3.25C5.53281 3.25 4.0694 4.70507 4.0694 6.5C4.0694 8.29492 5.53281 9.75 7.33802 9.75Z"
                                                    fill="#6D6D6D"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rs-contact-list-content">
                                        <span>Address</span>
                                        <h6><a href="#">
                                                {{ $profile_info['street_address'] ?? '2096 New Market, New Road' }} <br>
                                                {{ $profile_info['city'] ?? 'North Carolina' }}, {{ $profile_info['country'] ?? 'USA' }}
                                            </a></h6>
                                    </div>
                                </div>
                                <div class="rs-contact-list-item">
                                    <div class="rs-contact-icon">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                                <line x1="15" y1="9" x2="15.01" y2="9"></line>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rs-contact-list-content">
                                        <span>Follow Us</span>
                                        <div style="display: flex; gap: 12px; margin-top: 8px; flex-wrap: wrap;">
                                            @if ($profile_info['twitter'] ?? null)
                                                <a href="{{ $profile_info['twitter'] }}" target="_blank" title="Twitter" style="color: #6D6D6D; font-size: 18px; transition: color 0.3s;"><i class="ri-twitter-x-line"></i></a>
                                            @endif
                                            @if ($profile_info['facebook'] ?? null)
                                                <a href="{{ $profile_info['facebook'] }}" target="_blank" title="Facebook" style="color: #6D6D6D; font-size: 18px; transition: color 0.3s;"><i class="ri-facebook-fill"></i></a>
                                            @endif
                                            @if ($profile_info['linkedin'] ?? null)
                                                <a href="{{ $profile_info['linkedin'] }}" target="_blank" title="LinkedIn" style="color: #6D6D6D; font-size: 18px; transition: color 0.3s;"><i class="ri-linkedin-fill"></i></a>
                                            @endif
                                            @if ($profile_info['instagram'] ?? null)
                                                <a href="{{ $profile_info['instagram'] }}" target="_blank" title="Instagram" style="color: #6D6D6D; font-size: 18px; transition: color 0.3s;"><i class="ri-instagram-line"></i></a>
                                            @endif
                                            @if ($profile_info['github'] ?? null)
                                                <a href="{{ $profile_info['github'] }}" target="_blank" title="GitHub" style="color: #6D6D6D; font-size: 18px; transition: color 0.3s;"><i class="ri-github-fill"></i></a>
                                            @endif
                                            @if ($profile_info['youtube'] ?? null)
                                                <a href="{{ $profile_info['youtube'] }}" target="_blank" title="YouTube" style="color: #6D6D6D; font-size: 18px; transition: color 0.3s;"><i class="ri-youtube-fill"></i></a>
                                            @endif
                                            @if ($profile_info['researchgate'] ?? null)
                                                <a href="{{ $profile_info['researchgate'] }}" target="_blank" title="ResearchGate" style="color: #6D6D6D; font-size: 18px; transition: color 0.3s;"><i class="ri-book-fill"></i></a>
                                            @endif
                                            @if ($profile_info['whatsapp'] ?? null)
                                                <a href="{{ $profile_info['whatsapp'] }}" target="_blank" title="WhatsApp" style="color: #6D6D6D; font-size: 18px; transition: color 0.3s;"><i class="ri-whatsapp-fill"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7">
                        <div class="rs-contact-form wow fadeInRight" data-wow-delay=".3s" data-wow-duration="1s">
                            <form id="contact-form" action="{{ asset('visitor/flixta/assets/mailer.php') }}"
                                method="POST">
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
                                            <button type="submit" class="rs-btn has-color">Send Message</button>
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
        <!-- contact area end -->

    </main>
    <!-- Body main wrapper end -->

@endsection
