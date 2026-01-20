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
