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
                            <li>
                                <a href="{{ route('visitor.index') }}"><i class="fas fa-home"></i> Home</a>
                            </li>
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
                        <img src="{{ asset('visitor/antux/img/icon/1.png') }}" alt="Image Not Found">
                        <img src="{{ asset('visitor/antux/img/icon/8.png') }}" alt="Image Not Found">
                        <h4>
                            <a href="{{ route('visitor.service.details', ['service' => 'branding-design']) }}">Branding
                                Design</a>
                        </h4>
                        <p>
                            Continue indulged speaking the was horrible for domestic position. Seeing get rather.
                        </p>
                        <a href="{{ route('visitor.service.details', ['service' => 'branding-design']) }}"
                            class="btn-style-four">
                            <div class="icon">
                                <img src="{{ asset('visitor/antux/img/icon/arrow.png') }}" alt="Image Not Found">
                            </div> Read More
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-xl-3 col-md-6 mb-30 active wow fadeInUp" data-wow-delay="200ms"
                    style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
                    <div class="service-style-one-item">
                        <img src="{{ asset('visitor/antux/img/icon/2.png') }}" alt="Image Not Found">
                        <img src="{{ asset('visitor/antux/img/icon/8.png') }}" alt="Image Not Found">
                        <h4>
                            <a href="{{ route('visitor.service.details', ['service' => 'app-development']) }}">App
                                Development</a>
                        </h4>
                        <p>
                            Continue indulged speaking the was horrible for domestic position. Seeing get rather.
                        </p>
                        <a href="{{ route('visitor.service.details', ['service' => 'app-development']) }}"
                            class="btn-style-four">
                            <div class="icon">
                                <img src="{{ asset('visitor/antux/img/icon/arrow.png') }}" alt="Image Not Found">
                            </div> Read More
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-xl-3 col-md-6 mb-30 wow fadeInUp" data-wow-delay="400ms"
                    style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
                    <div class="service-style-one-item active">
                        <img src="{{ asset('visitor/antux/img/icon/3.png') }}" alt="Image Not Found">
                        <img src="{{ asset('visitor/antux/img/icon/8.png') }}" alt="Image Not Found">
                        <h4>
                            <a href="{{ route('visitor.service.details', ['service' => 'uiux-design']) }}">UI/UX
                                Design</a>
                        </h4>
                        <p>
                            Continue indulged speaking the was horrible for domestic position. Seeing get rather.
                        </p>
                        <a href="{{ route('visitor.service.details', ['service' => 'uiux-design']) }}"
                            class="btn-style-four">
                            <div class="icon">
                                <img src="{{ asset('visitor/antux/img/icon/arrow.png') }}" alt="Image Not Found">
                            </div> Read More
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-xl-3 col-md-6 mb-30 wow fadeInUp" data-wow-delay="600ms"
                    style="visibility: visible; animation-delay: 600ms; animation-name: fadeInUp;">
                    <div class="service-style-one-item">
                        <img src="{{ asset('visitor/antux/img/icon/4.png') }}" alt="Image Not Found">
                        <img src="{{ asset('visitor/antux/img/icon/8.png') }}" alt="Image Not Found">
                        <h4>
                            <a href="{{ route('visitor.service.details', ['service' => 'web-design']) }}">Web
                                Design</a>
                        </h4>
                        <p>
                            Continue indulged speaking the was horrible for domestic position. Seeing get rather.
                        </p>
                        <a href="{{ route('visitor.service.details', ['service' => 'web-design']) }}"
                            class="btn-style-four">
                            <div class="icon">
                                <img src="{{ asset('visitor/antux/img/icon/arrow.png') }}" alt="Image Not Found">
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
