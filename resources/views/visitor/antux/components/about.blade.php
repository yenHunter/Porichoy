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
