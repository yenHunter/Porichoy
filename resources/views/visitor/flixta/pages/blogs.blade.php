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
                                <h1 class="rs-breadcrumb-title">Blog</h1>
                            </div>
                            <div class="rs-breadcrumb-menu text-center">
                                <nav>
                                    <ul>
                                        <li><span><a href="index.html">Home</a></span></li>
                                        <li><span>Blog</span></li>
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
                        <div class="rs-postbox-wrapper">
                            <article class="rs-postbox-item">
                                <div class="rs-postbox-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{asset('visitor/flixta/images/blog/post/blog-post-01.jpg')}}" alt="image">
                                    </a>
                                    <div class="rs-postbox-tag">
                                        <a href="blog-details.html">Business</a>
                                    </div>
                                </div>
                                <div class="rs-postbox-content">
                                    <div class="rs-postbox-meta-list">
                                        <div class="rs-postbox-meta-item has-separator">
                                            <span class="rs-meta-text">By<a class="meta-author" href="blog-details.html">
                                                    Flixta</a></span>
                                        </div>
                                        <div class="rs-postbox-meta-item">
                                            <span class="rs-postbox-meta-text"><a href="blog-details.html">June 12,
                                                    2023</a></span>
                                        </div>
                                    </div>
                                    <h3 class="rs-postbox-title">
                                        <a href="blog-details.html">What is the hardest thing about a lawyer? </a>
                                    </h3>
                                    <div class="rs-postbox-text">
                                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and
                                            demo
                                            realized by the charms of pleasure of the moment, so blinded by desire, that
                                            they
                                            cannot foresee the pain.</p>
                                    </div>
                                    <div class="rs-postbox-btn">
                                        <a class="rs-btn has-color has-icon has-radius" href="blog-details.html">Continue
                                            Reading
                                            <span class="icon-box">
                                                <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                                <svg class="icon-second" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <article class="rs-postbox-item">
                                <div class="rs-postbox-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{asset('visitor/flixta/images/blog/post/blog-post-02.jpg')}}" alt="image">
                                    </a>
                                    <div class="rs-postbox-tag">
                                        <a href="blog-details.html">Business</a>
                                    </div>
                                </div>
                                <div class="rs-postbox-content">
                                    <div class="rs-postbox-meta-list">
                                        <div class="rs-postbox-meta-item has-separator">
                                            <span class="rs-meta-text">By<a class="meta-author" href="blog-details.html">
                                                    Flixta</a></span>
                                        </div>
                                        <div class="rs-postbox-meta-item">
                                            <span class="rs-postbox-meta-text"><a href="blog-details.html">June 12,
                                                    2023</a></span>
                                        </div>
                                    </div>
                                    <h3 class="rs-postbox-title">
                                        <a href="blog-details.html"> What’s your opinion of the probate process? </a>
                                    </h3>
                                    <div class="rs-postbox-text">
                                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and
                                            demo
                                            realized by the charms of pleasure of the moment, so blinded by desire, that
                                            they
                                            cannot foresee the pain.</p>
                                    </div>
                                    <div class="rs-postbox-btn">
                                        <a class="rs-btn has-color has-icon has-radius" href="blog-details.html">Continue
                                            Reading
                                            <span class="icon-box">
                                                <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                                <svg class="icon-second" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <article class="rs-postbox-item">
                                <div class="rs-postbox-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{asset('visitor/flixta/images/blog/post/blog-post-03.jpg')}}" alt="image">
                                    </a>
                                    <div class="rs-postbox-tag">
                                        <a href="blog-details.html">Business</a>
                                    </div>
                                </div>
                                <div class="rs-postbox-content">
                                    <div class="rs-postbox-meta-list">
                                        <div class="rs-postbox-meta-item has-separator">
                                            <span class="rs-meta-text">By<a class="meta-author" href="blog-details.html">
                                                    Flixta</a></span>
                                        </div>
                                        <div class="rs-postbox-meta-item">
                                            <span class="rs-postbox-meta-text"><a href="blog-details.html">June 12,
                                                    2023</a></span>
                                        </div>
                                    </div>
                                    <h3 class="rs-postbox-title">
                                        <a href="blog-details.html">Under what conditions do you recommend </a>
                                    </h3>
                                    <div class="rs-postbox-text">
                                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and
                                            demo
                                            realized by the charms of pleasure of the moment, so blinded by desire, that
                                            they
                                            cannot foresee the pain.</p>
                                    </div>
                                    <div class="rs-postbox-btn">
                                        <a class="rs-btn has-color has-icon has-radius" href="blog-details.html">Continue
                                            Reading
                                            <span class="icon-box">
                                                <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                                <svg class="icon-second" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <article class="rs-postbox-item">
                                <div class="rs-postbox-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{asset('visitor/flixta/images/blog/post/blog-post-04.jpg')}}" alt="image">
                                    </a>
                                    <div class="rs-postbox-tag">
                                        <a href="blog-details.html">Business</a>
                                    </div>
                                </div>
                                <div class="rs-postbox-content">
                                    <div class="rs-postbox-meta-list">
                                        <div class="rs-postbox-meta-item has-separator">
                                            <span class="rs-meta-text">By<a class="meta-author" href="blog-details.html">
                                                    Flixta</a></span>
                                        </div>
                                        <div class="rs-postbox-meta-item">
                                            <span class="rs-postbox-meta-text"><a href="blog-details.html">June 12,
                                                    2023</a></span>
                                        </div>
                                    </div>
                                    <h3 class="rs-postbox-title">
                                        <a href="blog-details.html">How do I protect my children from abusive relatives
                                        </a>
                                    </h3>
                                    <div class="rs-postbox-text">
                                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and
                                            demo
                                            realized by the charms of pleasure of the moment, so blinded by desire, that
                                            they
                                            cannot foresee the pain.</p>
                                    </div>
                                    <div class="rs-postbox-btn">
                                        <a class="rs-btn has-color has-icon has-radius" href="blog-details.html">Continue
                                            Reading
                                            <span class="icon-box">
                                                <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                                <svg class="icon-second" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <article class="rs-postbox-item">
                                <div class="rs-postbox-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{asset('visitor/flixta/images/blog/post/blog-post-05.jpg')}}" alt="image">
                                    </a>
                                    <div class="rs-postbox-tag">
                                        <a href="blog-details.html">Business</a>
                                    </div>
                                </div>
                                <div class="rs-postbox-content">
                                    <div class="rs-postbox-meta-list">
                                        <div class="rs-postbox-meta-item has-separator">
                                            <span class="rs-meta-text">By<a class="meta-author" href="blog-details.html">
                                                    Flixta</a></span>
                                        </div>
                                        <div class="rs-postbox-meta-item">
                                            <span class="rs-postbox-meta-text"><a href="blog-details.html">June 12,
                                                    2023</a></span>
                                        </div>
                                    </div>
                                    <h3 class="rs-postbox-title">
                                        <a href="blog-details.html">Can I keep my kids from controlling their entire </a>
                                    </h3>
                                    <div class="rs-postbox-text">
                                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and
                                            demo
                                            realized by the charms of pleasure of the moment, so blinded by desire, that
                                            they
                                            cannot foresee the pain.</p>
                                    </div>
                                    <div class="rs-postbox-btn">
                                        <a class="rs-btn has-color has-icon has-radius" href="blog-details.html">Continue
                                            Reading
                                            <span class="icon-box">
                                                <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                                <svg class="icon-second" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <article class="rs-postbox-item">
                                <div class="rs-postbox-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{asset('visitor/flixta/images/blog/post/blog-post-06.jpg')}}" alt="image">
                                    </a>
                                    <div class="rs-postbox-tag">
                                        <a href="blog-details.html">Yoga</a>
                                    </div>
                                </div>
                                <div class="rs-postbox-content">
                                    <div class="rs-postbox-meta-list">
                                        <div class="rs-postbox-meta-item has-separator">
                                            <span class="rs-meta-text">By<a class="meta-author" href="blog-details.html">
                                                    Flixta</a></span>
                                        </div>
                                        <div class="rs-postbox-meta-item">
                                            <span class="rs-postbox-meta-text"><a href="blog-details.html">June 12,
                                                    2023</a></span>
                                        </div>
                                    </div>
                                    <h3 class="rs-postbox-title">
                                        <a href="blog-details.html">What are the three important things in yoga? </a>
                                    </h3>
                                    <div class="rs-postbox-text">
                                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and
                                            demo
                                            realized by the charms of pleasure of the moment, so blinded by desire, that
                                            they
                                            cannot foresee the pain.</p>
                                    </div>
                                    <div class="rs-postbox-btn">
                                        <a class="rs-btn has-color has-icon has-radius" href="blog-details.html">Continue
                                            Reading
                                            <span class="icon-box">
                                                <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                                <svg class="icon-second" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <article class="rs-postbox-item">
                                <div class="rs-postbox-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{asset('visitor/flixta/images/blog/post/blog-post-07.jpg')}}" alt="image">
                                    </a>
                                    <div class="rs-postbox-tag">
                                        <a href="blog-details.html">Yoga</a>
                                    </div>
                                </div>
                                <div class="rs-postbox-content">
                                    <div class="rs-postbox-meta-list">
                                        <div class="rs-postbox-meta-item has-separator">
                                            <span class="rs-meta-text">By<a class="meta-author" href="blog-details.html">
                                                    Flixta</a></span>
                                        </div>
                                        <div class="rs-postbox-meta-item">
                                            <span class="rs-postbox-meta-text"><a href="blog-details.html">June 12,
                                                    2023</a></span>
                                        </div>
                                    </div>
                                    <h3 class="rs-postbox-title">
                                        <a href="blog-details.html">How is yoga different from meditation? </a>
                                    </h3>
                                    <div class="rs-postbox-text">
                                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and
                                            demo
                                            realized by the charms of pleasure of the moment, so blinded by desire, that
                                            they
                                            cannot foresee the pain.</p>
                                    </div>
                                    <div class="rs-postbox-btn">
                                        <a class="rs-btn has-color has-icon has-radius" href="blog-details.html">Continue
                                            Reading
                                            <span class="icon-box">
                                                <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                                <svg class="icon-second" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <article class="rs-postbox-item">
                                <div class="rs-postbox-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{asset('visitor/flixta/images/blog/post/blog-post-08.jpg')}}" alt="image">
                                    </a>
                                    <div class="rs-postbox-tag">
                                        <a href="blog-details.html">Yoga</a>
                                    </div>
                                </div>
                                <div class="rs-postbox-content">
                                    <div class="rs-postbox-meta-list">
                                        <div class="rs-postbox-meta-item has-separator">
                                            <span class="rs-meta-text">By<a class="meta-author" href="blog-details.html">
                                                    Flixta</a></span>
                                        </div>
                                        <div class="rs-postbox-meta-item">
                                            <span class="rs-postbox-meta-text"><a href="blog-details.html">June 12,
                                                    2023</a></span>
                                        </div>
                                    </div>
                                    <h3 class="rs-postbox-title">
                                        <a href="blog-details.html"> How frequently should i practice yoga </a>
                                    </h3>
                                    <div class="rs-postbox-text">
                                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and
                                            demo
                                            realized by the charms of pleasure of the moment, so blinded by desire, that
                                            they
                                            cannot foresee the pain.</p>
                                    </div>
                                    <div class="rs-postbox-btn">
                                        <a class="rs-btn has-color has-icon has-radius" href="blog-details.html">Continue
                                            Reading
                                            <span class="icon-box">
                                                <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                                <svg class="icon-second" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <article class="rs-postbox-item">
                                <div class="rs-postbox-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{asset('visitor/flixta/images/blog/post/blog-post-09.jpg')}}" alt="image">
                                    </a>
                                    <div class="rs-postbox-tag">
                                        <a href="blog-details.html">Yoga</a>
                                    </div>
                                </div>
                                <div class="rs-postbox-content">
                                    <div class="rs-postbox-meta-list">
                                        <div class="rs-postbox-meta-item has-separator">
                                            <span class="rs-meta-text">By<a class="meta-author" href="blog-details.html">
                                                    Flixta</a></span>
                                        </div>
                                        <div class="rs-postbox-meta-item">
                                            <span class="rs-postbox-meta-text"><a href="blog-details.html">June 12,
                                                    2023</a></span>
                                        </div>
                                    </div>
                                    <h3 class="rs-postbox-title">
                                        <a href="blog-details.html">Do I need to be flexible and strong class? </a>
                                    </h3>
                                    <div class="rs-postbox-text">
                                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and
                                            demo
                                            realized by the charms of pleasure of the moment, so blinded by desire, that
                                            they
                                            cannot foresee the pain.</p>
                                    </div>
                                    <div class="rs-postbox-btn">
                                        <a class="rs-btn has-color has-icon has-radius" href="blog-details.html">Continue
                                            Reading
                                            <span class="icon-box">
                                                <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                                <svg class="icon-second" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <article class="rs-postbox-item">
                                <div class="rs-postbox-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{asset('visitor/flixta/images/blog/post/blog-post-10.jpg')}}" alt="image">
                                    </a>
                                    <div class="rs-postbox-tag">
                                        <a href="blog-details.html">Yoga</a>
                                    </div>
                                </div>
                                <div class="rs-postbox-content">
                                    <div class="rs-postbox-meta-list">
                                        <div class="rs-postbox-meta-item has-separator">
                                            <span class="rs-meta-text">By<a class="meta-author" href="blog-details.html">
                                                    Flixta</a></span>
                                        </div>
                                        <div class="rs-postbox-meta-item">
                                            <span class="rs-postbox-meta-text"><a href="blog-details.html">June 12,
                                                    2023</a></span>
                                        </div>
                                    </div>
                                    <h3 class="rs-postbox-title">
                                        <a href="blog-details.html">What about eating or drinking before class? </a>
                                    </h3>
                                    <div class="rs-postbox-text">
                                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and
                                            demo
                                            realized by the charms of pleasure of the moment, so blinded by desire, that
                                            they
                                            cannot foresee the pain.</p>
                                    </div>
                                    <div class="rs-postbox-btn">
                                        <a class="rs-btn has-color has-icon has-radius" href="blog-details.html">Continue
                                            Reading
                                            <span class="icon-box">
                                                <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                                <svg class="icon-second" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 32 32">
                                                    <path
                                                        d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </article>
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
                <div class="row">
                    <div class="col-xl-6">
                        <div class="pagination-wrapper mt-40">
                            <div class="rs-basic-pagination  has-border-none">
                                <nav>
                                    <ul>
                                        <li>
                                            <span><a href="#">Next</a></span>
                                        </li>
                                        <li>
                                            <a href="#">1</a>
                                        </li>
                                        <li>
                                            <span class="current">2</span>
                                        </li>
                                        <li>
                                            <a href="#">3</a>
                                        </li>
                                        <li>
                                            <span><a href="#">Prev</a></span>
                                        </li>
                                    </ul>
                                </nav>
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
