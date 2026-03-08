<!doctype html>
<html class="no-js" lang="zxx" dir="ltr" rs-theme="rs-theme-dark">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Let Them Know">
    <meta name="keywords" content="personal, portfolio new, html, one page, bootstrap, new html template, design, creative, onepage, clean, modern">

    <!-- ========== Page Title ========== -->
    <title>@yield('title', 'Porichoy')</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('visitor/flixta/images/favicon.png') }}">

    <!-- ========== Start Stylesheet ========== -->
    <link rel="stylesheet" href="{{ asset('visitor/flixta/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/flixta/css/vendor/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/flixta/css/plugins/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/flixta/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/flixta/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/flixta/css/vendor/fontawesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/flixta/css/vendor/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/flixta/css/vendor/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/flixta/css/main.css') }}">
    <!-- ========== End Stylesheet ========== -->
</head>

<body class="rs-smoother-yes rtl">

    <!-- preloader start -->
    <div id="pre-load">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="{{ asset('visitor/flixta/images/favicon.png') }}" alt=""></div>
            </div>
        </div>
    </div>
    <!-- preloader end -->

    @include('visitor.flixta.include.header')

    @yield('content')

    @include('visitor.flixta.include.footer')

    <!-- Backtotop start -->
    <div class="backtotop-wrap cursor-pointer">
        <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Backtotop end -->

    <!-- JS here -->
    <script src="{{ asset('visitor/flixta/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/waypoints.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/meanmenu.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/swiper.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/vendor/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/nice-select.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/jarallax.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/vendor/ajax-form.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/easypie.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/headding-title.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/lenis.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/gsap.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/rs-anim-int.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/rs-scroll-trigger.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/rs-splitText.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/jquery.lettering.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/plugins/parallax-effect.min.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/vendor/purecounter.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/vendor/dark-light.js') }}"></script>
    <script src="{{ asset('visitor/flixta/js/main.js') }}"></script>
</body>

</html>
