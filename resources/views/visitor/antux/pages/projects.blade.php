@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Porichoy')

@section('content')
    <!-- Start Breadcrumb -->
    <div class="breadcrumb-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <h1>Digital marketing and analytical solution</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="#"><i
                                        class="fas fa-home"></i> Home</a></li>
                            <li class="active">Projects</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Portfolio -->
    <div id="portfolio" class="portfolio-style-one-area default-padding-bottom">
        <div class="shape-top-left">
            <img src="{{ asset('visitor/antux/img/shape/9.png') }}" alt="Image Not Found">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 gallery-content">
                    <div class="magnific-mix-gallery gallery-masonary">
                        <div id="gallery-masonary" class="gallery-items colums-3"
                            style="position: relative; height: 1150.17px;">
                            <!-- Single Item -->
                            <div class="gallery-item" style="position: absolute; left: 0%; top: 0px;">
                                <div class="gallery-style-one">
                                    <img src="{{ asset('visitor/antux/img/projects/1.jpg') }}" alt="Thumb">
                                    <div class="info">
                                        <div class="overlay">
                                            <div class="content">
                                                <ul class="pf-tags">
                                                    <li>
                                                        <a
                                                            href="#">Web</a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="#">Coding</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="icon">
                                                <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}"><i
                                                        class="fas fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <h4><a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">Document
                                                manager application</a></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="gallery-item" style="position: absolute; left: 33.2461%; top: 0px;">
                                <div class="gallery-style-one">
                                    <img src="{{ asset('visitor/antux/img/projects/2.jpg') }}" alt="Thumb">
                                    <div class="info">
                                        <div class="overlay">
                                            <div class="content">
                                                <ul class="pf-tags">
                                                    <li>
                                                        <a
                                                            href="#">Software</a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="#">Mobile</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="icon">
                                                <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}"><i
                                                        class="fas fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <h4><a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">Dynamic
                                                mobile app development</a></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="gallery-item" style="position: absolute; left: 66.5794%; top: 0px;">
                                <div class="gallery-style-one">
                                    <img src="{{ asset('visitor/antux/img/projects/3.jpg') }}" alt="Thumb">
                                    <div class="info">
                                        <div class="overlay">
                                            <div class="content">
                                                <ul class="pf-tags">
                                                    <li>
                                                        <a
                                                            href="#">Brochure</a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="#">Design</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="icon">
                                                <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}"><i
                                                        class="fas fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <h4><a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">Printable
                                                professional brochure templates</a></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="gallery-item" style="position: absolute; left: 0%; top: 494px;">
                                <div class="gallery-style-one">
                                    <img src="{{ asset('visitor/antux/img/projects/4.jpg') }}" alt="Thumb">
                                    <div class="info">
                                        <div class="overlay">
                                            <div class="content">
                                                <ul class="pf-tags">
                                                    <li>
                                                        <a
                                                            href="#">Brand</a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="#">Mockup</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="icon">
                                                <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}"><i
                                                        class="fas fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <h4><a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">Create
                                                stunning product flexible mockups</a></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="gallery-item" style="position: absolute; left: 66.5794%; top: 527px;">
                                <div class="gallery-style-one">
                                    <img src="{{ asset('visitor/antux/img/projects/5.jpg') }}" alt="Thumb">
                                    <div class="info">
                                        <div class="overlay">
                                            <div class="content">
                                                <ul class="pf-tags">
                                                    <li>
                                                        <a
                                                            href="#">Design</a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="#">Art</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="icon">
                                                <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}"><i
                                                        class="fas fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <h4><a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">Decor
                                                design vectors illustrations</a></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="gallery-item" style="position: absolute; left: 33.2461%; top: 619px;">
                                <div class="gallery-style-one">
                                    <img src="{{ asset('visitor/antux/img/projects/6.jpg') }}" alt="Thumb">
                                    <div class="info">
                                        <div class="overlay">
                                            <div class="content">
                                                <ul class="pf-tags">
                                                    <li>
                                                        <a
                                                            href="#">Music</a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="#">Video</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="icon">
                                                <a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}"><i
                                                        class="fas fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <h4><a href="{{ route('visitor.project.details', ['project' => 'web-coding']) }}">Making
                                                smart software smartphones</a></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Portfolio -->
@endsection
