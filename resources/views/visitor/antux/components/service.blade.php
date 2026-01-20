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
                            <h4><a href="services-details.html">Branding Design</a></h4>
                            <a href="services-details.html" class="btn-style-four">
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
                            <h4><a href="services-details.html">App Development</a></h4>
                            <a href="services-details.html" class="btn-style-four">
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
                            <h4><a href="services-details.html">UI/UX Design</a></h4>
                            <a href="services-details.html" class="btn-style-four">
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
                            <h4><a href="services-details.html">Web Design</a></h4>
                            <a href="services-details.html" class="btn-style-four">
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