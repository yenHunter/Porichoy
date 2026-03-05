@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Blog-details | Porichoy')

@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">Blog Details</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">Blog Details</li>
                        </ul>
                        <!-- <div class="circle-1"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Blog-details Area Start -->
    <div class="blog-classic-area-wrapper tmp-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-left-area">
                        <div class="thumbnail-top">
                            <img src="{{ asset('visitor/reeni/images/blog/details/01.png') }}" alt="Corporate_business">
                        </div>
                        <div class="blog-details-discription">
                            <div class="blog-classic-tag">
                                <h4 class="title">By Stanio lainto</h4>
                                <ul>
                                    <li>
                                        <div class="tag-wrap">
                                            <i class="fa-solid fa-tag"></i>
                                            <h4 class="tag-title">Web design</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tag-wrap">
                                            <i class="fa-solid fa-calendar-day"></i>
                                            <h4 class="tag-title">Comments (05)</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title split-collab">Elevate Your Brand With A The Stunning Portfolio</h3>
                            <p class="disc">
                                Aliquam eros justo, posuere loborti viverra laoreet matti ullamcorper posuere viverra
                                .Aliquam eros justo, posuere lobortis, viverra laoreet augue mattis fermentum
                                ullamcorper viverra laoreet Aliquam
                            </p>
                            <p class="disc">
                                Aliquam eros justo, posuere loborti viverra laoreet matti ullamcorper posuere viverra
                                .Aliquam eros justoposuere lobortis non, viverra laoreet augue mattis fermentum
                                ullamcorper viverra laore Aliquam eros justo posuere desig loborti viverra laoreet matti
                                ullamcorper posuere viverra
                            </p>
                        </div>
                        <div class="quote-area-blog-details">
                            <p class="disc">
                                Aliquam eros justo, posuere loborti viverra laoreet matti ullamcorper posuere viverra
                                .Aliquam eros justo, posuere lobortis, viverra laoreet augue mattis fermentum
                                ullamcorper viverra laoreet.
                            </p>
                            <h3 class="author">Mark wood</h3>
                            <span><i class="fa-solid fa-quote-right"></i></span>
                        </div>
                        <div class="blog-details-discription">
                            <h3 class="title split-collab">Showcase your talent with our portfolio</h3>
                            <p class="disc">
                                Aliquam eros justo, posuere loborti viverra laoreet matti ullamcorper posuere viverra
                                .Aliquam eros justo, posuere lobortis, viverra laoreet augue mattis fermentum
                                ullamcorper viverra laoreet Aliquam eros
                            </p>
                            <div class="our-portfolio-swiper">
                                <div class="blog-details-swiper">
                                    <div class="our-portfoli-swiper-card">
                                        <div class="card-left-content">
                                            <p class="disc">
                                                Ished fact that a reader will be distrol acted bioii the.ished
                                                fact th
                                                reader will besi distrol ac laoreet Aliquam fact that a reader
                                                will be
                                                distrol acted Aliquam posuere loborti viverra laoreet
                                            </p>
                                            <p class="disc">
                                                Aliquam eros justo, posuere loborti viverra laoreet matt design
                                                the
                                                ullamcorper posuere viverra .Aliquam eros justo posuere inni
                                                lobortis non,
                                                viverra laoreet augue mattis
                                            </p>
                                            <p class="disc">
                                                Aliquam eros justo, posuere loborti viverra laoreet matti design
                                                an the
                                                ullamcorper posuere viverra .Aliquam eros
                                            </p>
                                        </div>
                                        <div class="card-right-content">
                                            <img src="{{ asset('visitor/reeni/images/blog/blog-details-swiper-img.jpg') }}" alt="blog-swip-img">
                                        </div>
                                    </div>
                                </div>
                                <div class="our-portfolio-swiper-btn-wrap">
                                    <a href="#" class="prev-btn">
                                        <div class="tmp-arrow-btn">
                                            <i class="fa-solid fa-arrow-left"></i>
                                        </div>
                                        <div class="btn-content">
                                            <span class="para">Previous post</span>
                                            <h4 class="title">Insure your peace of mind</h4>
                                        </div>
                                    </a>
                                    <a href="#" class="next-btn">
                                        <div class="btn-content">
                                            <span class="para">Next post</span>
                                            <h4 class="title">Coverage you can count on</h4>
                                        </div>
                                        <div class="tmp-arrow-btn">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>


                            </div>

                            <div class="blog-details-navigation">
                                <div class="navigation-tags">
                                    <h3 class="tag-title">Keyword:</h3>
                                    <ul>
                                        <li>
                                            <p class="tag"><a href="#">Interiour</a></p>
                                        </li>
                                        <li>
                                            <p class="tag"><a href="#">Ux design</a></p>
                                        </li>
                                        <li>
                                            <p class="tag"><a href="#">Graphics</a></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="social-link footer">
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                </div>
                            </div>
                            <!-- Comment Area Main Wrapper Start -->
                            <div class="comment-area-main-wrapper mt--30">
                                <h3 class="title">Comments (3)</h3>
                                <div class="single-comment-audience">
                                    <div class="author-image">
                                        <img src="{{ asset('visitor/reeni/images/blog/comments-img-1.png') }}" alt="Corporate_business">
                                    </div>
                                    <div class="right-area-commnet">
                                        <div class="top-area-comment">
                                            <div class="left">
                                                <h6 class="title">Stanio lainto</h6>
                                                <span>September 16, 2023</span>
                                            </div>
                                            <div class="social-link-inner">
                                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <p class="disc">
                                            Ished fact that a reader will be distrol acted bioii the.ished fact that a
                                            reader will be distrol acted laoreet Aliquam fact that a reader will be
                                            distrol acted Aliquam eros justo.
                                        </p>
                                        <a href="#" class="reply-btn">reply</a>
                                    </div>
                                </div>
                                <div class="single-comment-audience pl--100">
                                    <div class="author-image">
                                        <img src="{{ asset('visitor/reeni/images/blog/comments-img-2.png') }}" alt="Corporate_business">
                                    </div>
                                    <div class="right-area-commnet">
                                        <div class="top-area-comment">
                                            <div class="left">
                                                <h6 class="title">Court Henry</h6>
                                                <span>September 16, 2023</span>
                                            </div>
                                            <div class="social-link-inner">
                                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <p class="disc">
                                            Ished fact that a reader will be distrol acted bioii the.ished fact that a
                                            reader will be distrol acted laoreet Aliquam fact that a reader will be
                                            distrol acted Aliquam eros justo.
                                        </p>
                                        <a href="#" class="reply-btn">reply</a>
                                    </div>
                                </div>
                                <div class="single-comment-audience">
                                    <div class="author-image">
                                        <img src="{{ asset('visitor/reeni/images/blog/comments-img-2.png') }}" alt="Corporate_business">
                                    </div>
                                    <div class="right-area-commnet">
                                        <div class="top-area-comment">
                                            <div class="left">
                                                <h6 class="title">Court Henry</h6>
                                                <span>September 16, 2023</span>
                                            </div>
                                            <div class="social-link-inner">
                                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <p class="disc">
                                            Ished fact that a reader will be distrol acted bioii the.ished fact that a
                                            reader will be distrol acted laoreet Aliquam fact that a reader will be
                                            distrol acted Aliquam eros justo.
                                        </p>
                                        <a href="#" class="reply-btn">reply</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Area Main Wrapper End -->

                            <!-- Blog Details Form Wrapper Start -->
                            <div class="blog-details-form-wrapper tmponhover">
                                <h4 class="title">Leave a comment</h4>
                                <span class="subtitle">By using form u agree with the message sorage, you can contact us
                                    directly
                                    now</span>
                                <form action="#" class="blog-details-form">
                                    <div class="single-input">
                                        <label>Your Name</label>
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div class="single-input">
                                        <label>Your Email</label>
                                        <input type="text" placeholder="Email">
                                    </div>
                                    <label>Message</label>
                                    <textarea placeholder="Message here.."></textarea>

                                    <div class="blog-submit-btn mt--40">
                                        <div class="tmp-button-here">
                                            <a class="tmp-btn hover-icon-reverse radius-round w-100"
                                                href="#">
                                                <span class="icon-reverse-wrapper">
                                                    <span class="btn-text">Submit Now</span>
                                                    <span class="btn-icon"><i
                                                            class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                                    <span class="btn-icon"><i
                                                            class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- Blog Details Form Wrapper End -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tmp-sidebar">
                        <div class="signle-side-bar search-area tmponhover">
                            <div class="body">
                                <div class="search-area">
                                    <input type="text" placeholder="Type here" required>
                                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="signle-side-bar recent-post-area tmponhover">
                            <div class="header">
                                <h3 class="title">Recent Post</h3>
                            </div>
                            <div class="body">
                                <a href="#" class="single-post">
                                    <span class="single-post-left">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        <span class="post-title">Business Solution</span>
                                    </span>
                                    <span class="post-num">(01)</span>
                                </a>
                                <a href="#" class="single-post">
                                    <span class="single-post-left">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        <span class="post-title">Web Development Wizardry</span>
                                    </span>
                                    <span class="post-num">(08)</span>
                                </a>
                                <a href="#" class="single-post">
                                    <span class="single-post-left">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        <span class="post-title">Content Creation and Strategy</span>
                                    </span>
                                    <span class="post-num">(05)</span>
                                </a>
                                <a href="#" class="single-post">
                                    <span class="single-post-left">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        <span class="post-title">UI/UX Design Innovation</span>
                                    </span>
                                    <span class="post-num">(05)</span>
                                </a>
                            </div>
                        </div>
                        <div class="signle-side-bar recent-post-area tmponhover">
                            <div class="header">
                                <h3 class="title">Recent Post</h3>
                            </div>
                            <div class="body">
                                <div class="single-post-card tmp-hover-link">
                                    <div class="single-post-card-img">
                                        <img src="{{ asset('visitor/reeni/images/blog/single-post-card-img-1.png') }}" alt="">
                                    </div>
                                    <div class="single-post-right">
                                        <div class="single-post-top">
                                            <i class="fa-regular fa-folder-open"></i>
                                            <p class="post-title">Category</p>
                                        </div>
                                        <h3 class="post-title"><a class="link" href="#">Sustainable Solutions:
                                                Designing for Tomorrow</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="single-post-card tmp-hover-link">
                                    <div class="single-post-card-img">
                                        <img src="{{ asset('visitor/reeni/images/blog/single-post-card-img-2.png') }}" alt="">
                                    </div>
                                    <div class="single-post-right">
                                        <div class="single-post-top">
                                            <i class="fa-regular fa-folder-open"></i>
                                            <p class="post-title">Category</p>
                                        </div>
                                        <h3 class="post-title"><a class="link" href="#">Technological
                                                Innovations: Shaping the Future</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="single-post-card tmp-hover-link">
                                    <div class="single-post-card-img">
                                        <img src="{{ asset('visitor/reeni/images/blog/single-post-card-img-3.png') }}" alt="">
                                    </div>
                                    <div class="single-post-right">
                                        <div class="single-post-top">
                                            <i class="fa-regular fa-folder-open"></i>
                                            <p class="post-title">Category</p>
                                        </div>
                                        <h3 class="post-title"><a class="link" href="#">Adventure Awaits
                                                Exploring the Great Outdoors</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="signle-side-bar tmponhover">
                            <div class="header">
                                <h3 class="title">About Me</h3>
                            </div>
                            <div class="body">
                                <div class="about-me-details">
                                    <div class="about-me-details-head">
                                        <div class="about-me-img">
                                            <img src="{{ asset('visitor/reeni/images/blog/about-me-user-img.png') }}" alt="about-me-user-img">
                                        </div>
                                        <div class="about-me-right-content">
                                            <h3 class="title">Fatima Afrafy</h3>
                                            <p class="para">UI/UX Designer </p>
                                            <div class="social-link">
                                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="about-me-para">Aliquam eros justo, posuere loborti viverra ullamcorper
                                        posuere
                                        viverra .Aliquam eros justo, posuere justo, posuere.</p>
                                </div>
                            </div>
                        </div>
                        <div class="signle-side-bar tmponhover">
                            <div class="header">
                                <h3 class="title">Tags</h3>
                            </div>
                            <div class="body">
                                <div class="tags-wrapper">
                                    <a href="#" class="tag-link">All Project</a>
                                    <a href="#" class="tag-link">Resume</a>
                                    <a href="#" class="tag-link">Graphics</a>
                                    <a href="#" class="tag-link">Web Design</a>
                                    <a href="#" class="tag-link">CV</a>
                                    <a href="#" class="tag-link">Starts</a>
                                    <a href="#" class="tag-link">Creative Portfolio</a>
                                    <a href="#" class="tag-link">Portfolio</a>
                                    <a href="#" class="tag-link">CV Card</a>
                                    <a href="#" class="tag-link">Start shape</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog-details Area End -->
@endsection
