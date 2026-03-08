@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Porichoy')

@section('content')
    <!-- Body main wrapper start -->
    <main>

        <!-- breadcrumb area start -->
        <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
            <div class="rs-breadcrumb-bg bg-white" data-background="{{asset('visitor/flixta/images/bg/breadcrumb-bg-01.png')}}"></div>
            <div class="rs-breadcrumb-bg bg-black" data-background="{{asset('visitor/flixta/images/bg/breadcrumb-bg-dark-01.png')}}"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-8 col-lg-8">
                        <div class="rs-breadcrumb-content-wrapper">
                            <div class="rs-breadcrumb-title-wrapper text-center">
                                <h1 class="rs-breadcrumb-title">Blog Details</h1>
                            </div>
                            <div class="rs-breadcrumb-menu text-center">
                                <nav>
                                    <ul>
                                        <li><span><a href="index.html">Home</a></span></li>
                                        <li><span>Blog</span></li>
                                        <li><span>Blog Details</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- postbox area start -->
        <section class="rs-postbox-area section-space primary-bg">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-8 col-lg-8">
                        <div class="rs-postbox-details-wrapper">
                            <div class="rs-postbox-details-thumb mb-40">
                                <img src="{{asset('visitor/flixta/images/blog/blog-details-01.jpg')}}" alt="image">
                            </div>
                            <div class="rs-postbox-details-content">
                                <p>We denounce with righteous indige nation and dislike men who are so beguiled and demo
                                    realized by the charms of pleasure of the moment, so blinded by desire, that they cannot
                                    foresee the pain and trouble that are bound to ensue cannot foresee. These cases are
                                    perfectly simple and easy to distinguish. In a free hour, when our power of choice is
                                    untrammelled.</p>
                                <p>We denounce with righteous indige nation and dislike men who are so beguiled and demo
                                    realized by the charms of pleasure of the moment, so blinded by desire, that they cannot
                                    foresee the pain and trouble that are bound to ensue cannot foresee. These cases are
                                    perfectly simple and easy to distinguish. In a free hour, when our power of choice is
                                    untrammelled data struct.</p>
                                <div class="rs-postbox-quote">
                                    <blockquote>
                                        <p>“We can easily manage if we will only take, each day, the burden appointed to it.
                                            But
                                            the load will be too heavy for us if we carry yesterday’s burden over again
                                            today, and
                                            then add the burden of the morrow before we are required to bear it factorial
                                            non.”</p>
                                        <cite>Robert Calibo</cite>
                                    </blockquote>
                                </div>
                                <h3 class="rs-postbox-details-title mb-20">We denounce with righteous of indigent nation and
                                    dislike
                                    who working are so beguiled</h3>
                                <p>Epsum factorial non deposit quid pro quo hic escorol. Olypian quarrels et gorilla
                                    congolium
                                    sic ad nauseum. Souvlaki ignitus carborundum e pluribus unum. Defacto lingo est igpay
                                    atinlay. Marquee selectus non provisio incongruous feline nolo contendre. Gratuitous
                                    octopus
                                    niacin, sodium glutimate. Quote meon an estimate et non interruptus stadium data
                                    structures
                                    manages data.</p>
                                <div class="rs-postbox-details-feature">
                                    <ul>
                                        <li>How will digital activities impact traditional manufacturing.</li>
                                        <li>All these digital elements and projects aim to enhance </li>
                                        <li>I monitor my staff with software that takes screen.</li>
                                        <li>Laoreet dolore magna niacin sodium glutimate.</li>
                                        <li>Minim veniam quis niacin sodium nostrud exer.</li>
                                    </ul>
                                </div>
                                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id
                                    quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor
                                    repellendus.
                                    Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe
                                    eveniet ut
                                    et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic
                                    tenetur a
                                    sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut
                                    perferendis
                                    doloribus asperiore.</p>
                                <div class="rs-postbox-details-thumb mb-40">
                                    <img src="{{asset('visitor/flixta/images/blog/blog-details-02.jpg')}}" alt="image">
                                </div>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                    quisquam
                                    est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
                                    numquam
                                    eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut
                                    enim ad
                                    minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                                    aliquid.</p>
                                <div class="rs-postbox-comment-form">
                                    <div class="rs-postbox-comments-title mb-30">
                                        <h4 class="mb-15">Leave a Comment</h4>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                    </div>
                                    <form>
                                        <div class="row g-4">
                                            <div class="col-xl-6">
                                                <div class="input-box">
                                                    <input type="text" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="input-box">
                                                    <div class="input-box">
                                                        <input type="email" placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="input-box">
                                                    <textarea cols="30" rows="10" placeholder="Type Comment here"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="submit-btn">
                                                    <button class="rs-btn has-color" type="submit">Post Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="rs-sidebar-wrapper rs-sidebar-sticky">
                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-search">
                                    <form action="#">
                                        <div class="sidebar-search-input">
                                            <input type="text" placeholder="Searching...">
                                            <button type="submit">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.11111 15.2222C12.0385 15.2222 15.2222 12.0385 15.2222 8.11111C15.2222 4.18375 12.0385 1 8.11111 1C4.18375 1 1 4.18375 1 8.11111C1 12.0385 4.18375 15.2222 8.11111 15.2222Z"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M16.9995 17L13.1328 13.1333" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-widget widget-categories mb-30">
                                <h5 class="sidebar-widget-title">Categories</h5>
                                <div class="sidebar-widget-content">
                                    <div class="list">
                                        <ul>
                                            <li><a href="blog-details.html">App Development</a></li>
                                            <li><a href="blog-details.html">Business</a></li>
                                            <li><a href="blog-details.html">Creative Branding</a></li>
                                            <li><a href="blog-details.html">Digital Marketing</a></li>
                                            <li><a href="blog-details.html">Doctor</a></li>
                                            <li><a href="blog-details.html">Lawyer</a></li>
                                            <li><a href="blog-details.html">Product Design</a></li>
                                            <li><a href="blog-details.html">Web Development</a></li>
                                            <li><a href="blog-details.html">Yoga</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-widget mb-30">
                                <h5 class="sidebar-widget-title">Recent Posts</h5>
                                <div class="sidebar-widget-content">
                                    <div class="sidebar-blog-item-wrapper">
                                        <div class="sidebar-blog-item">
                                            <div class="sidebar-blog-thumb">
                                                <a href="blog-details.html">
                                                    <img src="{{asset('visitor/flixta/images/blog/sidebar/blog-sm-01.jpg')}}" alt="image">
                                                </a>
                                            </div>
                                            <div class="sidebar-blog-content">
                                                <h6 class="sidebar-blog-title">
                                                    <a href="blog-details.html">What is the hardest thing about a</a>
                                                </h6>
                                                <div class="sidebar-blog-meta">
                                                    <i class="ri-calendar-line"></i>
                                                    <span>May 20, 2024</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sidebar-blog-item">
                                            <div class="sidebar-blog-thumb">
                                                <a href="blog-details.html">
                                                    <img src="{{asset('visitor/flixta/images/blog/sidebar/blog-sm-02.jpg')}}" alt="image">
                                                </a>
                                            </div>
                                            <div class="sidebar-blog-content">
                                                <h6 class="sidebar-blog-title">
                                                    <a href="blog-details.html"> What’s your opinion of the probate
                                                        process? </a>
                                                </h6>
                                                <div class="sidebar-blog-meta">
                                                    <i class="ri-calendar-line"></i>
                                                    <span>May 20, 2024</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sidebar-blog-item">
                                            <div class="sidebar-blog-thumb">
                                                <a href="blog-details.html">
                                                    <img src="{{asset('visitor/flixta/images/blog/sidebar/blog-sm-03.jpg')}}" alt="image">
                                                </a>
                                            </div>
                                            <div class="sidebar-blog-content">
                                                <h6 class="sidebar-blog-title">
                                                    <a href="blog-details.html">Under what conditions do you recommend</a>
                                                </h6>
                                                <div class="sidebar-blog-meta">
                                                    <i class="ri-calendar-line"></i>
                                                    <span>May 20, 2024</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-widget">
                                <h5 class="sidebar-widget-title">Social</h5>
                                <div class="sidebar-social">
                                    <div class="rs-theme-social has-border">
                                        <a href="#"><i class="ri-twitter-x-line"></i></a>
                                        <a href="#"><i class="ri-facebook-fill"></i></a>
                                        <a href="#"><i class="ri-linkedin-fill"></i></a>
                                        <a href="#"><i class="ri-instagram-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- rs-postbox area end -->

    </main>
    <!-- Body main wrapper end -->
@endsection
