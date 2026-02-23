@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Porichoy')

@section('content')
    <!-- Start Breadcrumb -->
    <div class="breadcrumb-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <h1>No Code Development Website Builder</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ route('visitor.index') }}"><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="active">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog -->
    <div class="blog-area full-blog default-padding-bottom">
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <div class="blog-content col-xl-8 col-lg-7 col-md-12 pr-35 pr-md-15 pl-md-15 pr-xs-15 pl-xs-15">
                        <div class="blog-item-box">
                            <!-- Single Item -->
                            <div class="blog-style-one item">
                                <div class="thumb">
                                    <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">
                                        <img src="{{ asset('visitor/antux/img/blog/v1.jpg') }}" alt="Image Not Found">
                                    </a>
                                </div>
                                <div class="info">
                                    <div class="meta">
                                        <ul>
                                            <li>
                                                <a href="#">Md Sohag</a>
                                            </li>
                                            <li>
                                                25 April, 2023
                                            </li>
                                        </ul>
                                    </div>
                                    <h2>
                                        <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">Miscovery
                                            incommode earnestly commanded temparing task.</a>
                                    </h2>
                                    <p>
                                        Bndulgence diminution so discovered mr apartments. Are off under folly death wrote
                                        cause her way spite. Plan upon yet way get cold spot its week. Almost do am or
                                        limits hearts. Resolve parties but why she shewing. She sang know now
                                    </p>
                                    <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}"
                                        class="button-regular">
                                        Continue Reading <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item -->
                            <div class="blog-style-one item">
                                <div class="thumb">
                                    <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">
                                        <img src="{{ asset('visitor/antux/img/blog/v2.jpg') }}" alt="Thumb">
                                    </a>
                                </div>
                                <div class="info">
                                    <div class="meta">
                                        <ul>
                                            <li>
                                                <a href="#">Md Sohag</a>
                                            </li>
                                            <li>
                                                25 April, 2023
                                            </li>
                                        </ul>
                                    </div>
                                    <h2>
                                        <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">Minuter
                                            him own clothes but observe country to beloved another.</a>
                                    </h2>
                                    <p>
                                        Bndulgence diminution so discovered mr apartments. Are off under folly death wrote
                                        cause her way spite. Plan upon yet way get cold spot its week. Almost do am or
                                        limits hearts. Resolve parties but why she shewing. She sang know now
                                    </p>
                                    <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}"
                                        class="button-regular">
                                        Continue Reading <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item -->
                            <div class="blog-style-one item">
                                <div class="thumb">
                                    <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">
                                        <img src="{{ asset('visitor/antux/img/blog/v1.jpg') }}" alt="Thumb">
                                    </a>
                                </div>
                                <div class="info">
                                    <div class="meta">
                                        <ul>
                                            <li>
                                                <a href="#">Md Sohag</a>
                                            </li>
                                            <li>
                                                25 April, 2023
                                            </li>
                                        </ul>
                                    </div>
                                    <h2>
                                        <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">Overcame
                                            breeding point concerns has terminate actual is monitoring.</a>
                                    </h2>
                                    <p>
                                        Bndulgence diminution so discovered mr apartments. Are off under folly death wrote
                                        cause her way spite. Plan upon yet way get cold spot its week. Almost do am or
                                        limits hearts. Resolve parties but why she shewing. She sang know now
                                    </p>
                                    <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}"
                                        class="button-regular">
                                        Continue Reading <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Single Item -->
                        </div>

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-12 pagi-area text-center">
                                <nav aria-label="navigation">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="{{ route('visitor.blog.index') }}">
                                                <i class="fas fa-angle-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="{{ route('visitor.blog.index') }}">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="{{ route('visitor.blog.index') }}">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="{{ route('visitor.blog.index') }}">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="{{ route('visitor.blog.index') }}">
                                                <i class="fas fa-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>


                    <!-- Start Sidebar -->
                    <div class="sidebar col-xl-4 col-lg-5 col-md-12 mt-md-50 mt-xs-50">
                        <aside>
                            <div class="sidebar-item search">
                                <div class="sidebar-info">
                                    <form>
                                        <input type="text" placeholder="Enter Keyword" name="text"
                                            class="form-control">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-item recent-post">
                                <h4 class="title">Recent Post</h4>
                                <ul>
                                    <li>
                                        <div class="thumb">
                                            <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">
                                                <img src="{{ asset('visitor/antux/img/gallery/1.jpg') }}" alt="Thumb">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <div class="meta-title">
                                                <span class="post-date">12 Feb, 2020</span>
                                            </div>
                                            <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">Commanded
                                                household smallness delivered.</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="thumb">
                                            <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">
                                                <img src="{{ asset('visitor/antux/img/gallery/2.jpg') }}" alt="Thumb">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <div class="meta-title">
                                                <span class="post-date">05 Jul, 2022</span>
                                            </div>
                                            <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">Future
                                                Plan &amp; Strategy for Consutruction </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="thumb">
                                            <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">
                                                <img src="{{ asset('visitor/antux/img/gallery/3.jpg') }}" alt="Thumb">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <div class="meta-title">
                                                <span class="post-date">29 Aug, 2020</span>
                                            </div>
                                            <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">Melancholy
                                                particular devonshire alteration</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="sidebar-item category">
                                <h4 class="title">category list</h4>
                                <div class="sidebar-info">
                                    <ul>
                                        <li>
                                            <a href="{{ route('visitor.blog.index') }}">national
                                                <span>69</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('visitor.blog.index') }}">national
                                                <span>25</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('visitor.blog.index') }}">sports
                                                <span>18</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('visitor.blog.index') }}">megazine
                                                <span>37</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('visitor.blog.index') }}">health
                                                <span>12</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-item gallery">
                                <h4 class="title">Gallery</h4>
                                <div class="sidebar-info">
                                    <ul>
                                        <li>
                                            <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">
                                                <img src="{{ asset('visitor/antux/img/gallery/6.jpg') }}" alt="thumb">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">
                                                <img src="{{ asset('visitor/antux/img/gallery/5.jpg') }}" alt="thumb">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">
                                                <img src="{{ asset('visitor/antux/img/gallery/4.jpg') }}" alt="thumb">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">
                                                <img src="{{ asset('visitor/antux/img/gallery/3.jpg') }}" alt="thumb">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">
                                                <img src="{{ asset('visitor/antux/img/gallery/2.jpg') }}" alt="thumb">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('visitor.blog.details', ['blog' => 'design']) }}">
                                                <img src="{{ asset('visitor/antux/img/gallery/1.jpg') }}" alt="thumb">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-item archives">
                                <h4 class="title">Archives</h4>
                                <div class="sidebar-info">
                                    <ul>
                                        <li>
                                            <a href="{{ route('visitor.blog.index') }}">Aug 2020</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('visitor.blog.index') }}">Sept 2020</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('visitor.blog.index') }}">Nov 2020</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('visitor.blog.index') }}">Dec 2020</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-item social-sidebar">
                                <h4 class="title">follow us</h4>
                                <div class="sidebar-info">
                                    <ul>
                                        <li class="facebook">
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="#">
                                                <img src="{{ asset('visitor/antux/img/icon/twitter.png') }}"
                                                    alt="Image Not Found">
                                            </a>
                                        </li>
                                        <li class="pinterest">
                                            <a href="#">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>
                                        <li class="linkedin">
                                            <a href="#">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-item tags">
                                <h4 class="title">tags</h4>
                                <div class="sidebar-info">
                                    <ul>
                                        <li><a href="{{ route('visitor.blog.index') }}">Fashion</a>
                                        </li>
                                        <li><a href="{{ route('visitor.blog.index') }}">Education</a>
                                        </li>
                                        <li><a href="{{ route('visitor.blog.index') }}">nation</a>
                                        </li>
                                        <li><a href="{{ route('visitor.blog.index') }}">study</a>
                                        </li>
                                        <li><a href="{{ route('visitor.blog.index') }}">health</a>
                                        </li>
                                        <li><a href="{{ route('visitor.blog.index') }}">food</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <!-- End Start Sidebar -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
@endsection
