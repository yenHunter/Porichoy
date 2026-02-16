@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Porichoy')

@section('content')
    <!-- Start Banner -->
    <div class="banner-style-one-area bg-gray" style="background-image: url({{ asset('visitor/antux/img/shape/4.png') }});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner-style-one-items">
                        <div class="info">
                            <h1>I am {{ $profile_info['first_name'] ?? 'Dalton' }} </h1>
                            <h2>
                                <span class="header-caption" id="page-top">
                                    <!-- type headline start-->
                                    <span class="cd-headline clip is-full-width">
                                        <!-- ROTATING TEXT -->
                                        <span class="cd-words-wrapper">
                                            <b class="is-visible">{{ $profile_info['skill_1'] ?? 'Web Developer' }}</b>
                                            <b class="is-hidden">{{ $profile_info['skill_2'] ?? 'Professional Coder' }}</b>
                                            <b class="is-hidden">{{ $profile_info['skill_3'] ?? 'UI/UX Designer' }}</b>
                                        </span>
                                    </span>
                                    <!-- type headline end -->
                                </span>
                            </h2>
                            <div class="d-grid">
                                <div class="circle-text-card">
                                    <div class="circle-text style-two">
                                        <!-- curved-circle start-->
                                        <div class="circle-text-item"
                                            data-circle-text-options='{"radius": 75, "forceWidth": true, "forceHeight": true }'>
                                            * See My Resume * My Experience
                                        </div>
                                    </div>
                                    <a href="{{ isset($profile_info['resume']) ? asset($profile_info['resume']) : '#' }}">
                                        <i class="fas fa-long-arrow-right"></i>
                                    </a>
                                </div>
                                <p>
                                    {{ $profile_info['about_me'] ??
                                        "Hi, my name is Dalton Grant and I began using WordPress when it first began. I’ve spent
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        most of my waking hours for the last ten years designing, programming and operating
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        WordPress sites." }}
                                </p>
                            </div>
                            <div class="flex-social mt-40">
                                <div class="button">
                                    <a class="btn-style-regular"
                                        href="#contact"><span>{{ $profile_info['hire_btn_text'] ?? 'Hire Me Now' }}</span>
                                        <i class="fas fa-arrow-right"></i></a>
                                </div>
                                <ul class="social-info">
                                    @if (!empty($profile_info))
                                        @if (isset($profile_info['facebook']))
                                            <li>
                                                <a href="{{ asset($profile_info['facebook']) }}"><i
                                                        class="fab fa-facebook"></i></a>
                                            </li>
                                        @endif
                                        @if (isset($profile_info['linkedin']))
                                            <li>
                                                <a href="{{ asset($profile_info['linkedin']) }}"><i
                                                        class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        @endif
                                        @if (isset($profile_info['github']))
                                            <li>
                                                <a href="#"><i class="fa-brands fa-github"></i></a>
                                            </li>
                                        @endif
                                    @else
                                        <li>
                                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-brands fa-github"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-researchgate"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-brands fa-google-scholar"></i></a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="thumb">
                            @if (isset($profile_info['profile_picture_bg']))
                                <img src="{{ asset($profile_info['profile_picture_bg']) }}" alt="Image Not Found">
                            @else
                                <img src="{{ asset('visitor/antux/img/illustration/1.png') }}" alt="Image Not Found">
                            @endif
                            <img src="{{ asset('visitor/antux/img/shape/1.png') }}" alt="Image Not Found">
                            <img src="{{ asset('visitor/antux/img/shape/3.png') }}" alt="Image Not Found">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start About -->
    <div id="about" class="about-style-one-area bg-gray default-padding">
        <div class="shape-style-one">
            <img src="{{ asset('visitor/antux/img/shape/3.png') }}" alt="Image Not Found">
            <img class="upDownScrol" src="{{ asset('visitor/antux/img/shape/8.png') }}" alt="Image Not Found">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="fun-fact-style-one-items">
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="12" data-speed="1000">12</div>
                                <div class="operator">+</div>
                            </div>
                            <span class="medium">Years of Experience</span>
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="138" data-speed="1000">138</div>
                                <div class="operator">+</div>
                            </div>
                            <span class="medium">Projects completed on 30 countries</span>
                        </div>
                    </div>
                    <div class="clieents-list mt-40">
                        <div class="d-flex">
                            <div class="thumb">
                                <img src="{{ asset('visitor/antux/img/team/14.jpg') }}" alt="Image Not Found">
                                <img src="{{ asset('visitor/antux/img/team/15.jpg') }}" alt="Image Not Found">
                                <img src="{{ asset('visitor/antux/img/team/16.jpg') }}" alt="Image Not Found">
                                <img src="{{ asset('visitor/antux/img/team/17.jpg') }}" alt="Image Not Found">
                            </div>
                            <div class="info">
                                <h5>20K+ Clients</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 pl-80 pl-md-15 pl-xs-15">
                    <div class="about-style-one-info">
                        <p>
                            @if (isset($profile_info['summary']))
                                {{ $profile_info['summary'] }}
                            @else
                                As a skilled web developer, I specialize in creating responsive, user-friendly websites with
                                a focus on modern design and efficient code. I excel in front-end development, with a deep
                                understanding of HTML, CSS, JavaScript, and various frameworks. My passion is turning ideas
                                into functional and aesthetically pleasing digital experiences.
                            @endif
                        </p>
                        <a class="btn-style-regular btn-border" href="#"><span>Learn More</span> <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="about-style-one-bottom-info mt-50">
                <div class="row">
                    <div class="col-lg-8 pr-60 pr-md-15 pr-xs-15">
                        <div class="img-container">
                            @if (isset($profile_info['video_cover']))
                                <img src="{{ asset($profile_info['video_cover']) }}" alt="Image Not Found">
                            @else
                                <img src="{{ asset('visitor/antux/img/about/1.jpg') }}" alt="Image Not Found">
                            @endif
                            @if (isset($profile_info['video_link']))
                                @if ($profile_info['video_link'] != '#')
                                    <a href="{{ $profile_info['video_link'] }}" class="popup-youtube video-play-button">
                                        <i class="fas fa-play"></i>
                                        <div class="effect"></div>
                                    </a>
                                @endif
                            @else
                                <a href="https://www.youtube.com/watch?v=aTC_RNYtEb0"
                                    class="popup-youtube video-play-button">
                                    <i class="fas fa-play"></i>
                                    <div class="effect"></div>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @if (isset($profile_info['profile_picture']))
                            <img src="{{ asset($profile_info['profile_picture']) }}" alt="Image Not Found">
                        @else
                            <img src="{{ asset('visitor/antux/img/about/2.jpg') }}" alt="Image Not Found">
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End About -->

    <!-- Start Services -->
    <div id="services" class="services-style-one-area default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">{{ $profile_info['service_title'] ?? 'Services' }}</h4>
                        <h2 class="title">{{ $profile_info['service_sub_title'] ?? 'My Quality Services' }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @forelse ($service_list as $item)
                    <!-- Single Item -->
                    <div class="col-xl-3 col-md-6 mb-30 wow fadeInUp">
                        <div class="service-style-one-item">
                            <img src="{{ asset($item->icon) }}" alt="Image Not Found">
                            <img src="{{ asset('visitor/antux/img/icon/8.png') }}" alt="Image Not Found">
                            <h4><a href="{{ route('visitor.service.details', $item) }}">{{ $item->title }}</a></h4>
                            <a href="{{ route('visitor.service.details', $item) }}" class="btn-style-four">
                                <div class="icon">
                                    <img src="{{ asset('visitor/antux/img/icon/arrow.png') }}" alt="Image Not Found">
                                </div>
                                Read More
                            </a>
                            <p>
                                {{ $item->sub_title }}
                            </p>
                            <span>{{ $item->projects }} Projects</span>
                        </div>
                    </div>
                    <!-- End Single Item -->
                @empty
                    <!-- Single Item -->
                    <div class="col-xl-3 col-md-6 mb-30 wow fadeInUp">
                        <div class="service-style-one-item">
                            <img src="{{ asset('visitor/antux/img/icon/4.png') }}" alt="Image Not Found">
                            <img src="{{ asset('visitor/antux/img/icon/8.png') }}" alt="Image Not Found">
                            <h4>
                                <a href="{{ route('visitor.service.details', ['service' => 'branding-design']) }}">Branding
                                    Design</a>
                            </h4>
                            <a href="{{ route('visitor.service.details', ['service' => 'branding-design']) }}" class="btn-style-four">
                                <div class="icon"><img src="{{ asset('visitor/antux/img/icon/arrow.png') }}"
                                        alt="Image Not Found"></div> Read
                                More
                            </a>
                            <p>
                                Continue indulged speaking the was horrible for domestic position. Seeing get rather.
                            </p>
                            <span>568 Projects</span>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-xl-3 col-md-6 mb-30 active wow fadeInUp" data-wow-delay="200ms">
                        <div class="service-style-one-item active">
                            <img src="{{ asset('visitor/antux/img/icon/5.png') }}" alt="Image Not Found">
                            <img src="{{ asset('visitor/antux/img/icon/8.png') }}" alt="Image Not Found">
                            <h4><a href="{{ route('visitor.service.details', ['service' => 'app-development']) }}">App Development</a></h4>
                            <a href="{{ route('visitor.service.details', ['service' => 'app-development']) }}" class="btn-style-four">
                                <div class="icon"><img src="{{ asset('visitor/antux/img/icon/arrow.png') }}"
                                        alt="Image Not Found"></div> Read
                                More
                            </a>
                            <p>
                                Continue indulged speaking the was horrible for domestic position. Seeing get rather.
                            </p>
                            <span>548 Projects</span>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-xl-3 col-md-6 mb-30 wow fadeInUp" data-wow-delay="400ms">
                        <div class="service-style-one-item">
                            <img src="{{ asset('visitor/antux/img/icon/6.png') }}" alt="Image Not Found">
                            <img src="{{ asset('visitor/antux/img/icon/8.png') }}" alt="Image Not Found">
                            <h4><a href="{{ route('visitor.service.details', ['service' => 'ui-ux-design']) }}">UI/UX Design</a></h4>
                            <a href="{{ route('visitor.service.details', ['service' => 'ui-ux-design']) }}" class="btn-style-four">
                                <div class="icon"><img src="{{ asset('visitor/antux/img/icon/arrow.png') }}"
                                        alt="Image Not Found"></div> Read
                                More
                            </a>
                            <p>
                                Continue indulged speaking the was horrible for domestic position. Seeing get rather.
                            </p>
                            <span>650 Projects</span>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-xl-3 col-md-6 mb-30 wow fadeInUp" data-wow-delay="600ms">
                        <div class="service-style-one-item">
                            <img src="{{ asset('visitor/antux/img/icon/7.png') }}" alt="Image Not Found">
                            <img src="{{ asset('visitor/antux/img/icon/8.png') }}" alt="Image Not Found">
                            <h4><a href="{{ route('visitor.service.details', ['service' => 'web-design']) }}">Web Design</a></h4>
                            <a href="{{ route('visitor.service.details', ['service' => 'web-design']) }}" class="btn-style-four">
                                <div class="icon"><img src="{{ asset('visitor/antux/img/icon/arrow.png') }}"
                                        alt="Image Not Found"></div> Read
                                More
                            </a>
                            <p>
                                Continue indulged speaking the was horrible for domestic position. Seeing get rather.
                            </p>
                            <span>1200 Projects</span>
                        </div>
                    </div>
                    <!-- End Single Item -->
                @endforelse
            </div>
        </div>
    </div>
    <!-- End Services -->

    <!-- Start Portfolio -->
    <div id="portfolio" class="portfolio-style-one-area default-padding bg-gray">
        <div class="shape-top-left">
            <img src="{{ asset('visitor/antux/img/shape/9.png') }}" alt="Image Not Found">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Portfolio</h4>
                        <h2 class="title">My Recent Work</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 gallery-content">
                    <div class="magnific-mix-gallery gallery-masonary">
                        <div id="gallery-masonary" class="gallery-items colums-3">
                            @forelse ($project_list as $item)
                                <!-- Single Item -->
                                <div class="gallery-item">
                                    <div class="gallery-style-one">
                                        <img src="{{ asset($item->profile_image) }}" alt="Thumb">
                                        <div class="info">
                                            <div class="overlay">
                                                <div class="content">
                                                    <ul class="pf-tags">
                                                        <li>
                                                            <a
                                                                href="{{ route('visitor.service.details', $item->service) }}">{{ $item->service->title }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="icon">
                                                    <a href="{{ route('visitor.project.details', $item) }}">
                                                        <i class="fas fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                            <h4><a
                                                    href="{{ route('visitor.project.details', $item) }}">{{ $item->title }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            @empty
                                <!-- Single Item -->
                                <div class="gallery-item">
                                    <div class="gallery-style-one">
                                        <img src="{{ asset('visitor/antux/img/projects/1.jpg') }}" alt="Thumb">
                                        <div class="info">
                                            <div class="overlay">
                                                <div class="content">
                                                    <ul class="pf-tags">
                                                        <li>
                                                            <a href="#">Web</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Coding</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="icon">
                                                    <a href="project-details.html"><i
                                                            class="fas fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                            <h4><a href="project-details.html">Document manager application</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="gallery-item">
                                    <div class="gallery-style-one">
                                        <img src="{{ asset('visitor/antux/img/projects/2.jpg') }}" alt="Thumb">
                                        <div class="info">
                                            <div class="overlay">
                                                <div class="content">
                                                    <ul class="pf-tags">
                                                        <li>
                                                            <a href="#">Software</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Mobile</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="icon">
                                                    <a href="project-details.html"><i
                                                            class="fas fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                            <h4><a href="project-details.html">Dynamic mobile app development</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="gallery-item">
                                    <div class="gallery-style-one">
                                        <img src="{{ asset('visitor/antux/img/projects/3.jpg') }}" alt="Thumb">
                                        <div class="info">
                                            <div class="overlay">
                                                <div class="content">
                                                    <ul class="pf-tags">
                                                        <li>
                                                            <a href="#">Brochure</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Design</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="icon">
                                                    <a href="project-details.html"><i
                                                            class="fas fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                            <h4><a href="project-details.html">Printable professional brochure
                                                    templates</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="gallery-item">
                                    <div class="gallery-style-one">
                                        <img src="{{ asset('visitor/antux/img/projects/6.jpg') }}" alt="Thumb">
                                        <div class="info">
                                            <div class="overlay">
                                                <div class="content">
                                                    <ul class="pf-tags">
                                                        <li>
                                                            <a href="#">Brand</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Mockup</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="icon">
                                                    <a href="project-details.html"><i
                                                            class="fas fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                            <h4><a href="project-details.html">Create stunning product flexible mockups</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="gallery-item">
                                    <div class="gallery-style-one">
                                        <img src="{{ asset('visitor/antux/img/projects/5.jpg') }}" alt="Thumb">
                                        <div class="info">
                                            <div class="overlay">
                                                <div class="content">
                                                    <ul class="pf-tags">
                                                        <li>
                                                            <a href="#">Design</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Art</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="icon">
                                                    <a href="project-details.html"><i
                                                            class="fas fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                            <h4><a href="project-details.html">Decor design vectors illustrations</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="gallery-item">
                                    <div class="gallery-style-one">
                                        <img src="{{ asset('visitor/antux/img/projects/4.jpg') }}" alt="Thumb">
                                        <div class="info">
                                            <div class="overlay">
                                                <div class="content">
                                                    <ul class="pf-tags">
                                                        <li>
                                                            <a href="#">Music</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Video</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="icon">
                                                    <a href="project-details.html"><i
                                                            class="fas fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                            <h4><a href="project-details.html">Making smart software smartphones</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            @endforelse
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="load-more-info text-center mt-60 mt-xs-30">
                                <p>
                                    Are you interested to show more portfolios? <a href="#">Load More</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Portfolio -->

    <!-- Start Fun Fact -->
    <div class="fun-factor-area default-padding overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Top Skills</h4>
                        <h2 class="title">See my expertise</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="fun-fact-style-two-items text-center">
                @forelse ($skill_list as $item)
                    <!-- Single item -->
                    <div class="funfact-style-two-item wow fadeInUp" data-wow-delay="{{ $loop->index * 100 }}ms">
                        <div class="icon">
                            <img src="{{ asset('storage/' . $item->logo) }}" alt="Image Not Found">
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="{{ $item->score }}" data-speed="2000">
                                    {{ $item->score }}
                                </div>
                                <div class="operator">%</div>
                            </div>
                            <span class="medium">{{ $item->title }}</span>
                        </div>
                    </div>
                    <!-- End Single item -->
                @empty
                    <!-- Single item -->
                    <div class="funfact-style-two-item wow fadeInUp">
                        <div class="icon">
                            <img src="{{ asset('visitor/antux/img/icon/xd.png') }}" alt="Image Not Found">
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="80" data-speed="2000">80</div>
                                <div class="operator">%</div>
                            </div>
                            <span class="medium">Adobe XD</span>
                        </div>
                    </div>
                    <!-- End Single item -->
                    <!-- Single item -->
                    <div class="funfact-style-two-item wow fadeInUp" data-wow-delay="100ms">
                        <div class="icon">
                            <img src="{{ asset('visitor/antux/img/icon/figma.png') }}" alt="Image Not Found">
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="90" data-speed="2000">90</div>
                                <div class="operator">%</div>
                            </div>
                            <span class="medium">Figma</span>
                        </div>
                    </div>
                    <!-- End Single item -->
                    <!-- Single item -->
                    <div class="funfact-style-two-item wow fadeInUp" data-wow-delay="200ms">
                        <div class="icon">
                            <img src="{{ asset('visitor/antux/img/icon/wordpress.png') }}" alt="Image Not Found">
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="70" data-speed="2000">70</div>
                                <div class="operator">%</div>
                            </div>
                            <span class="medium">WordPress</span>
                        </div>
                    </div>
                    <!-- End Single item -->
                    <!-- Single item -->
                    <div class="funfact-style-two-item wow fadeInUp" data-wow-delay="300ms">
                        <div class="icon">
                            <img src="{{ asset('visitor/antux/img/icon/photoshop.png') }}" alt="Image Not Found">
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="80" data-speed="2000">80</div>
                                <div class="operator">%</div>
                            </div>
                            <span class="medium">Photoshop</span>
                        </div>
                    </div>
                    <!-- End Single item -->
                    <!-- Single item -->
                    <div class="funfact-style-two-item wow fadeInUp" data-wow-delay="400ms">
                        <div class="icon">
                            <img src="{{ asset('visitor/antux/img/icon/diamon.png') }}" alt="Image Not Found">
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="60" data-speed="2000">60</div>
                                <div class="operator">%</div>
                            </div>
                            <span class="medium">Sketch</span>
                        </div>
                    </div>
                    <!-- End Single item -->
                    <!-- Single item -->
                    <div class="funfact-style-two-item wow fadeInUp" data-wow-delay="500ms">
                        <div class="icon">
                            <img src="{{ asset('visitor/antux/img/icon/ai.png') }}" alt="Image Not Found">
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="90" data-speed="2000">90</div>
                                <div class="operator">%</div>
                            </div>
                            <span class="medium">Illustrator</span>
                        </div>
                    </div>
                    <!-- End Single item -->
                @endforelse
            </div>
        </div>
    </div>
    <!-- End Fun Factor -->

    <!-- Start Timeline -->
    <div id="resume" class="timeline-area default-padding bg-gray">
        <div class="container">
            <div class="time-line-style-one-box">
                <div class="row guttex-xl">

                    <div class="col-lg-6">
                        <h2>My Expertise</h2>
                        <div class="time-style-one-items">
                            @forelse ($experience_list as $item)
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="col">
                                            <h4>{{ $item->position }}</h4>
                                            <p>
                                                {{ $item->organization }}
                                            </p>
                                        </div>
                                        <div class="col-md-auto">
                                            <span>
                                                @if ($item->end_date === null)
                                                    {{ $item->start_date?->format('m/Y') }} - Present
                                                @else
                                                    {{ $item->start_date?->format('m/Y') . ' - ' . $item->end_date?->format('m/Y') }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            {!! $item->details !!}
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            @empty
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="left">
                                            <h4>Lead Developer</h4>
                                            <p>
                                                Blockdots, London
                                            </p>
                                        </div>
                                        <div class="right">
                                            <span>2022 - Present</span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            The education should be very interactual. Ut tincidunt est ac dolor aliquam
                                            sodales.
                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.
                                            sectors of the economy or areas of culture sed mauris hendrerit, laoreet smart
                                            software.
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="left">
                                            <h4>Full Stack Web Developer</h4>
                                            <p>
                                                Parsons, The New School
                                            </p>
                                        </div>
                                        <div class="right">
                                            <span>2021 - 2022</span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            The education should be very interactual. Ut tincidunt est ac dolor aliquam
                                            sodales.
                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.
                                            sectors of the economy or areas of culture sed mauris hendrerit, laoreet smart
                                            software.
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="left">
                                            <h4>UI Designer</h4>
                                            <p>
                                                House of Life, Leeds
                                            </p>
                                        </div>
                                        <div class="right">
                                            <span>2018 - 2023</span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            The education should be very interactual. Ut tincidunt est ac dolor aliquam
                                            sodales.
                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.
                                            sectors of the economy or areas of culture sed mauris hendrerit, laoreet smart
                                            software.
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            @endforelse
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h2>Education Background</h2>
                        <div class="time-style-one-items">
                            @forelse ($education_list as $item)
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="col">
                                            <h4>{{ $item->degree }}</h4>
                                            <p>
                                                {{ $item->institute }}
                                            </p>
                                        </div>
                                        <div class="col-md-auto">
                                            <span>
                                                @if ($item->end_date === null)
                                                    {{ $item->start_date?->format('m/Y') }} - Present
                                                @else
                                                    {{ $item->start_date?->format('m/Y') . ' - ' . $item->end_date?->format('m/Y') }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            {!! $item->details !!}
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            @empty
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="left">
                                            <h4>Programming Course</h4>
                                            <p>
                                                Harverd University
                                            </p>
                                        </div>
                                        <div class="right">
                                            <span>2006 - 2014</span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            The education should be very interactual. Ut tincidunt est ac dolor aliquam
                                            sodales.
                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.
                                            sectors of the economy or areas of culture sed mauris hendrerit, laoreet smart
                                            software.
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="left">
                                            <h4>Graphic Design Course</h4>
                                            <p>
                                                Blockdots, London
                                            </p>
                                        </div>
                                        <div class="right">
                                            <span>2016 - 2020</span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            The education should be very interactual. Ut tincidunt est ac dolor aliquam
                                            sodales.
                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.
                                            sectors of the economy or areas of culture sed mauris hendrerit, laoreet smart
                                            software.
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="left">
                                            <h4>Web design course</h4>
                                            <p>
                                                University of California
                                            </p>
                                        </div>
                                        <div class="right">
                                            <span>2012 - 2015</span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            The education should be very interactual. Ut tincidunt est ac dolor aliquam
                                            sodales.
                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.
                                            sectors of the economy or areas of culture sed mauris hendrerit, laoreet smart
                                            software.
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Timeline -->

    <!-- Start Partner -->
    <div class="partner-style-one-area text-center default-padding bottom-less overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Partner</h4>
                        <h2 class="title">With The World Premier 80+ Brands</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-full">
            <div class="row">
                <div class="col-lg-12">
                    @forelse ($client_list as $row)
                        <div class="partner-style-one-items">
                            @foreach ($row as $client)
                                <!-- Single Item -->
                                <div class="partner-style-one-item wow fadeInLeft">
                                    <img src="{{ asset('visitor/antux/img/partner/1.png') }}" alt="Image Not Found">
                                </div>
                                <!-- End Single Item -->
                            @endforeach
                        </div>
                    @empty
                        <div class="partner-style-one-items">
                            <!-- Single Item -->
                            <div class="partner-style-one-item wow fadeInLeft">
                                <img src="{{ asset('visitor/antux/img/partner/1.png') }}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="partner-style-one-item wow fadeInLeft">
                                <img src="{{ asset('visitor/antux/img/partner/2.png') }}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="partner-style-one-item wow fadeInLeft">
                                <img src="{{ asset('visitor/antux/img/partner/3.png') }}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="partner-style-one-item wow fadeInLeft">
                                <img src="{{ asset('visitor/antux/img/partner/4.png') }}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="partner-style-one-item wow fadeInLeft">
                                <img src="{{ asset('visitor/antux/img/partner/4.png') }}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                        </div>
                        <div class="partner-style-one-items">
                            <!-- Single Item -->
                            <div class="partner-style-one-item wow fadeInRight">
                                <img src="{{ asset('visitor/antux/img/partner/5.png') }}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="partner-style-one-item wow fadeInRight">
                                <img src="{{ asset('visitor/antux/img/partner/6.png') }}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="partner-style-one-item wow fadeInRight">
                                <img src="{{ asset('visitor/antux/img/partner/7.png') }}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="partner-style-one-item wow fadeInRight">
                                <img src="{{ asset('visitor/antux/img/partner/7.png') }}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- End Partner -->

    <!-- Start Testimonial -->
    <div class="testimonial-style-one-area default-padding bg-gray">
        <div class="shape-left-top">
            <img src="{{ asset('visitor/antux/img/shape/10.png') }}" alt="Image Not Found">
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
                        <div class="testimonial-style-one-carousel swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Single item -->
                                <div class="swiper-slide">
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
                                                    "Thanks to your web agency team for their professional work. The website
                                                    they created for my business exceeded my expectations, and my clients
                                                    have given positive feedback about its design and user-friendliness."
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
                                <div class="swiper-slide">
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
                                                    "Thanks to your web agency team for their professional work. The website
                                                    they created for my business exceeded my expectations, and my clients
                                                    have given positive feedback about its design and user-friendliness."
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
                                <div class="swiper-slide">
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
                                                    "Thanks to your web agency team for their professional work. The website
                                                    they created for my business exceeded my expectations, and my clients
                                                    have given positive feedback about its design and user-friendliness."
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
                            </div>

                        </div>
                        <!-- Navigation -->
                        <div class="testimonial-pagination">
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial -->

    <!-- Start Pricing -->
    <div id="pricing" class="pricing-style-one-area default-padding bg-light">
        <div class="shape-right-top">
            <img src="{{ asset('visitor/antux/img/shape/15.png') }}" alt="Image Not Found">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Pricing</h4>
                        <h2 class="title">The best pricing plans to get your best</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Single Item -->
                <div class="col-lg-6 pricing-one-single">
                    <div class="pricing-style-one wow fadeInUp">
                        <div class="pricing-top">
                            <div class="right">
                                <i class="fab fa-wordpress"></i>
                            </div>
                            <div class="left">
                                <h4>WordPress Development</h4>
                                <p>
                                    Simple and flexible per - user pricing
                                </p>
                            </div>
                        </div>
                        <div class="content">
                            <div class="price">
                                <h2><sup>$</sup>48</h2>
                            </div>
                            <ul>
                                <li>1 Page with Elementor</li>
                                <li>Design Customization</li>
                                <li>Responsive Design</li>
                                <li>1 Page with Elementor</li>
                                <li>Design Customization</li>
                                <li>Responsive Design</li>
                            </ul>
                            <div class="button mt-30">
                                <a class="btn-style-regular" href="#contact"><span>Order Now</span> <i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-lg-6 pricing-one-single">
                    <div class="pricing-style-one wow fadeInUp" data-wow-delay="200ms">
                        <div class="pricing-top">
                            <div class="right">
                                <i class="fab fa-bootstrap"></i>
                            </div>
                            <div class="left">
                                <h4>Static frontend design</h4>
                                <p>
                                    Simple and flexible per - user pricing
                                </p>
                            </div>
                        </div>
                        <div class="content">
                            <div class="price">
                                <h2><sup>$</sup>28</h2>
                            </div>
                            <ul>
                                <li>2 Page with Bootstrap5</li>
                                <li>Design implement</li>
                                <li>Responsive Design</li>
                                <li>2 Page with Bootstrap5</li>
                                <li>Design implement</li>
                                <li>Responsive Design</li>
                            </ul>
                            <div class="button mt-30">
                                <a class="btn-style-regular btn-border" href="#contact"><span>Order Now</span> <i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </div>
    <!-- End Pricing -->

    <!-- Start Faq -->
    <div class="faq-style-one-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="thumb-style-one">
                        <img src="{{ asset('visitor/antux/img/about/3.jpg') }}" alt="Image Not Found">
                        <div class="chat-card">
                            <p>Can't find what your are loking for you?</p>
                            <h5>I would like to chat with you</h5>
                            <a href="#"><i class="fab fa-facebook-messenger"></i></a>
                            <img src="{{ asset('visitor/antux/img/shape/12.png') }}" alt="Image Not Found">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="faq-style-one-items">
                        <h4 class="sub-title">Faq</h4>
                        <h2>Frequently Asked Questions</h2>
                        <div class="accordion mt-30" id="faqAccordion">
                            <div class="accordion-item accordion-style-one">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        May i see your work samples?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            New had happen unable uneasy. Drawings can followed improved out sociable not.
                                            Earnestly so do instantly pretended. See general few civilly amiable pleased
                                            account carried. Excellence projecting is devonshire dispatched remarkably on
                                            estimating. Side in so life past.
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
                                            New had happen unable uneasy. Drawings can followed improved out sociable not.
                                            Earnestly so do instantly pretended. See general few civilly amiable pleased
                                            account carried. Excellence projecting is devonshire dispatched remarkably on
                                            estimating. Side in so life past.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item accordion-style-one">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        How do you prefer to communicate?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            New had happen unable uneasy. Drawings can followed improved out sociable not.
                                            Earnestly so do instantly pretended. See general few civilly amiable pleased
                                            account carried. Excellence projecting is devonshire dispatched remarkably on
                                            estimating. Side in so life past.
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
    <!-- End Faq -->

    <!-- Start Contact -->
    <div id="contact" class="contact-style-one-area default-padding bg-gray">
        <div class="container">
            <div class="contact-style-one-items">

                <h1 class="fixed-text">Contact Me</h1>
                <div class="row">
                    <div class="col-lg-6">
                        <form action="visitor/antux/mail/contact.php" method="POST" class="contact-form contact-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Name"
                                            type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email*"
                                            type="email">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone" placeholder="Phone"
                                            type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="comments" name="comments" placeholder="Tell Us About Project *"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="btn-style-regular" type="submit" name="submit" id="submit">
                                        <span>Get in Touch</span> <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Alert Message -->
                            <div class="col-lg-12 alert-notification">
                                <div id="message" class="alert-msg"></div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="contact-illustration">
                    <img src="{{ asset('visitor/antux/img/illustration/5.png') }}" alt="Image Not Found">
                    <img src="{{ asset('visitor/antux/img/shape/13.png') }}" alt="Image Not Found">
                </div>

            </div>
        </div>
    </div>
    <!-- End Contact -->

    <!-- Start Blog -->
    <div id="blog" class="blog-area home-blog default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Blog Insight</h4>
                        <h2 class="title">Valuable insights to change your startup idea</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Single Item -->
                <div class="col-xl-4 col-md-6 col-lg-6 mb-30">
                    <div class="home-blog-style-one-item wow fadeInUp">
                        <div class="home-blog-thumb">
                            <img src="{{ asset('visitor/antux/img/blog/1.jpg') }}" alt="Image not Found">
                        </div>
                        <div class="content">
                            <ul class="home-blog-meta">
                                <li>
                                    <a href="#">Design</a>
                                </li>
                                <li>July 24, 2024</li>
                            </ul>
                            <div class="info">
                                <h4 class="blog-title">
                                    <a href="blog-single-with-sidebar.html">Picked up brussels burger signications with ham
                                        efforts.</a>
                                </h4>
                                <a href="blog-single-with-sidebar.html" class="btn-read-more">Read More <i
                                        class="fas fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-xl-4 col-md-6 col-lg-6 mb-30">
                    <div class="home-blog-style-one-item wow fadeInUp">
                        <div class="home-blog-thumb" data-wow-delay="200ms">
                            <img src="{{ asset('visitor/antux/img/blog/2.jpg') }}" alt="Image not Found">
                        </div>
                        <div class="content">
                            <ul class="home-blog-meta">
                                <li>
                                    <a href="#">Mockup</a>
                                </li>
                                <li>October 18, 2024</li>
                            </ul>
                            <div class="info">
                                <h4 class="blog-title">
                                    <a href="blog-single-with-sidebar.html">This prefabrice passive house is highly
                                        sustainable with intent</a>
                                </h4>
                                <a href="blog-single-with-sidebar.html" class="btn-read-more">Read More <i
                                        class="fas fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-xl-4 col-md-6 col-lg-6 mb-30">
                    <div class="home-blog-style-one-item wow fadeInUp" data-wow-delay="400ms">
                        <div class="home-blog-thumb">
                            <img src="{{ asset('visitor/antux/img/blog/3.jpg') }}" alt="Image not Found">
                        </div>
                        <div class="content">
                            <ul class="home-blog-meta">
                                <li>
                                    <a href="#">Discuss</a>
                                </li>
                                <li>August 26, 2024</li>
                            </ul>
                            <div class="info">
                                <h4 class="blog-title">
                                    <a href="blog-single-with-sidebar.html">Announcing if attachment resolution sentim
                                        commercial.</a>
                                </h4>
                                <a href="blog-single-with-sidebar.html" class="btn-read-more">Read More <i
                                        class="fas fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </div>
    <!-- End Blog -->

    <!-- Start Promo box -->
    <div class="promot-box-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="promo-box-items text-center">
                        <h2>Hello👋i'm available for freelance work</h2>
                        <h4>For quick response: <a href="skype:example123?chat"><i class="fab fa-skype"></i> Chat now</a>
                        </h4>
                        <div class="button mt-40">
                            <a class="btn-style-regular" href="#contact"><span>Hire Me Now </span> <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Promo box -->
@endsection
