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
