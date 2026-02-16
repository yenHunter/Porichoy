<!-- Header Area Start -->
<header>
    <!-- Start Navigation -->
    <nav class="navbar mobile-sidenav navbar-box navbar-default validnavs navbar-sticky">

        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container-xl">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->


        <div class="container nav-box d-flex justify-content-between align-items-center">

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ route('visitor.index') }}">
                    @if (config('themes.default_color') === 'light')
                        <img src="{{ asset('visitor/antux/img/logo.png') }}" class="logo" alt="Logo">
                    @else
                        <img src="{{ asset('visitor/antux/img/logo-light-2.png') }}" class="logo" alt="Logo">
                    @endif
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">

                @if (config('themes.default_color') === 'light')
                    <img src="{{ asset('visitor/antux/img/logo.png') }}" class="logo" alt="Logo">
                @else
                    <img src="{{ asset('visitor/antux/img/logo-light-2.png') }}" class="logo" alt="Logo">
                @endif
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-times"></i>
                </button>

                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li>
                        <a class="smooth-menu active" href="{{ route('visitor.index') }}">Home</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="{{ route('visitor.index') }}#services">Services</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#resume">Resume</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#pricing">Pricing</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#contact">contact</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->

            <div class="nav-right">
                <div class="attr-right">
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav attr-box">
                        <ul>
                            <li class="button">
                                <a class="smooth-menu" href="#contact">Let's Talk <i class="fas fa-comment-alt"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Atribute Navigation -->
                </div>
            </div>
        </div>

        <!-- Overlay screen for menu -->
        <div class="overlay-screen"></div>
        <!-- End Overlay screen for menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- Header Area End -->
