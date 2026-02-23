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
                            <li>
                                <a href="{{ route('visitor.index') }}">
                                    <i class="fas fa-home"></i> Home
                                </a>
                            </li>
                            <li class="active">Project</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Background Move -->
    <div class="banner-animation-zoom overflow-hidden">
        <div class="container">
            <div class="image-move-bg">
                <div class="animation-zoom-banner" id="js-hero" style="width: 261.111%;">
                    <img src="{{ asset('visitor/antux/img/banner/1.jpg') }}" alt="Image Not Found">
                </div>
            </div>
        </div>
    </div>
    <!-- End Background Move -->

    <!-- Star Project Details Area -->
    <div class="project-details-items default-padding">
        <div class="container">
            <div class="top-info">
                <div class="row">

                    <div class="col-xl-4 col-lg-5 left-info mb-xs-40 mb-md-50">
                        <div class="project-single-info">
                            <ul>
                                <li>
                                    Client <span>themeforest.validthemes.com</span>
                                </li>
                                <li>
                                    Date <span>25 February, 2022</span>
                                </li>
                                <li>
                                    Service <span>Web Development</span>
                                </li>
                                <li>
                                    Address <span>1401, 21st Street STE R4569, California</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="right-info col-xl-8 col-lg-7 pl-50 pl-md-15 pl-xs-15 mt-md-10">
                        <h2>Description</h2>
                        <p>
                            Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum
                            vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula
                            pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit
                            parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien
                            varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum
                            netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos.
                        </p>
                        <p>
                            Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by
                            garret. Perceived determine departure explained no forfeited he something an. Contrasted
                            dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do
                            existence northward as difficult preserved daughters. Continued at up to zealously necessary
                            breakfast. Surrounded sir motionless she end literature. convallis praesent est sollicitudin
                            donec nulla venenatis, cursus fermentum.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="project-details-items default-padding-bottom">
        <div class="container">
            <div class="project-thumb mt-md--25 mt-xs--25">
                <div class="row">
                    <div class="col-md-7">
                        <img src="{{ asset('visitor/antux/img/projects/9.jpg') }}" alt="Image Not Found">
                    </div>
                    <div class="col-md-5">
                        <img src="{{ asset('visitor/antux/img/projects/4.jpg') }}" alt="Image Not Found">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="project-details-items default-padding bg-gray">
        <div class="container">
            <div class="item-grid-container">
                <div class="single-grid">
                    <div class="item-grid-colum">
                        <div class="left-info">
                            <h2>Background</h2>
                        </div>
                        <div class="right-info">
                            <p>
                                Contained explained my education. Vulgar as hearts by garret. Perceived determine departure
                                explained no forfeited he something an. Contrasted dissimilar get joy you instrument out
                                reasonably. Again keeps at no meant stuff. To perpetual do existence
                            </p>
                            <p>
                                New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so
                                do instantly pretended. See general few civilly amiable pleased account carried. Excellence
                                projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue
                                indulged speaking the was out horrible for domestic position. Seeing rather her you not
                                esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy
                                son themselves.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="single-grid">
                    <div class="item-grid-colum">
                        <div class="left-info">
                            <h2>The Challenges</h2>
                        </div>
                        <div class="right-info">
                            <p>
                                Contained explained my education. Vulgar as hearts by garret. Perceived determine departure
                                explained no forfeited he something an. Contrasted dissimilar get joy you instrument out
                                reasonably. Again keeps at no meant stuff. To perpetual do existence
                            </p>
                            <p>
                                New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so
                                do instantly pretended. See general few civilly amiable pleased account carried. Excellence
                                projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue
                                indulged speaking the was out horrible for domestic position. Seeing rather her you not
                                esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy
                                son themselves.
                            </p>
                            <h3>Continue indulged speaking the horrible for domestic.</h3>
                            <ul class="list-style-one">
                                <li>Social media marketing</li>
                                <li>Search engine optimization (seo)</li>
                                <li>Public Relations</li>
                            </ul>
                            <img src="{{ asset('visitor/antux/img/banner/2.jpg') }}" alt="Image Not Found">
                        </div>
                    </div>
                </div>

                <div class="single-grid">
                    <div class="item-grid-colum">
                        <div class="left-info">
                            <h2>The Solution</h2>
                        </div>
                        <div class="right-info">
                            <p>
                                Contained explained my education. Vulgar as hearts by garret. Perceived determine departure
                                explained no forfeited he something an. Contrasted dissimilar get joy you instrument out
                                reasonably. Again keeps at no meant stuff. To perpetual do existence
                            </p>
                            <p>
                                New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so
                                do instantly pretended. See general few civilly amiable pleased account carried. Excellence
                                projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue
                                indulged speaking the was out horrible for domestic position. Seeing rather her you not
                                esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy
                                son themselves.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="project-pagination default-padding-bottom bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-paginvation-items mt-xs--25 mt-md--25">
                        <div class="project-previous">
                            <a href="#">
                                <div class="icon"><i class="fas fa-angle-double-left"></i></div>
                                <div class="nav-title"> Previus Post <h5>Discovery incommode</h5>
                                </div>
                            </a>
                        </div>
                        <div class="project-all">
                            <a href="{{ route('visitor.project.index') }}"><i class="fas fa-th-large"></i></a>
                        </div>
                        <div class="project-next">
                            <a href="#">
                                <div class="nav-title">Next Post <h5>Discovery incommode</h5>
                                </div>
                                <div class="icon"><i class="fas fa-angle-double-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Project Details Area -->

    <!-- Start Promo box -->
    <div class="promot-box-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="promo-box-items text-center">
                        <h2>Hello👋i'm available for freelance work</h2>
                        <h4>For quick response: <a href="skype:example123?chat"><i class="fab fa-skype"></i> Chat now</a>
                        </h4>
                        <div class="button mt-40">
                            <a class="btn-style-regular" href="#"><span>Hire Me Now
                                </span> <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Promo box -->
@endsection
