@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Porichoy')

@section('content')
    <!-- Start Breadcrumb -->
    <div class="breadcrumb-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <h1>Professional service websites design</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="https://validthemes.net/site-template/antux/service.html#"><i
                                        class="fas fa-home"></i> Home</a></li>
                            <li class="active">Services</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Services -->
    <div id="services" class="services-style-one-area default-padding-bottom bottom-less">
        <div class="container">
            <div class="row">
                <!-- Single Item -->
                <div class="col-xl-3 col-md-6 mb-30 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="service-style-one-item">
                        <img src="./Antux - Services_files/1.png" alt="Image Not Found">
                        <h4><a href="https://validthemes.net/site-template/antux/services-details.html">Digital
                                Marketing</a></h4>
                        <p>
                            Continue indulged speaking the was horrible for domestic position. Seeing get rather.
                        </p>
                        <a href="https://validthemes.net/site-template/antux/services-details.html" class="btn-style-four">
                            <div class="icon"><img src="./Antux - Services_files/arrow.png" alt="Image Not Found">
                            </div> Read More
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-xl-3 col-md-6 mb-30 active wow fadeInUp" data-wow-delay="200ms"
                    style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
                    <div class="service-style-one-item">
                        <img src="./Antux - Services_files/2.png" alt="Image Not Found">
                        <h4><a href="https://validthemes.net/site-template/antux/services-details.html">App
                                Development</a></h4>
                        <p>
                            Continue indulged speaking the was horrible for domestic position. Seeing get rather.
                        </p>
                        <a href="https://validthemes.net/site-template/antux/services-details.html" class="btn-style-four">
                            <div class="icon"><img src="./Antux - Services_files/arrow.png" alt="Image Not Found">
                            </div> Read More
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-xl-3 col-md-6 mb-30 wow fadeInUp" data-wow-delay="400ms"
                    style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
                    <div class="service-style-one-item active">
                        <img src="./Antux - Services_files/3.png" alt="Image Not Found">
                        <h4><a href="https://validthemes.net/site-template/antux/services-details.html">UI/UX
                                Design</a></h4>
                        <p>
                            Continue indulged speaking the was horrible for domestic position. Seeing get rather.
                        </p>
                        <a href="https://validthemes.net/site-template/antux/services-details.html" class="btn-style-four">
                            <div class="icon"><img src="./Antux - Services_files/arrow.png" alt="Image Not Found">
                            </div> Read More
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-xl-3 col-md-6 mb-30 wow fadeInUp" data-wow-delay="600ms"
                    style="visibility: visible; animation-delay: 600ms; animation-name: fadeInUp;">
                    <div class="service-style-one-item">
                        <img src="./Antux - Services_files/4.png" alt="Image Not Found">
                        <h4><a href="https://validthemes.net/site-template/antux/services-details.html">Web
                                Design</a></h4>
                        <p>
                            Continue indulged speaking the was horrible for domestic position. Seeing get rather.
                        </p>
                        <a href="https://validthemes.net/site-template/antux/services-details.html" class="btn-style-four">
                            <div class="icon"><img src="./Antux - Services_files/arrow.png" alt="Image Not Found">
                            </div> Read More
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </div>
    <!-- End Services -->
@endsection
