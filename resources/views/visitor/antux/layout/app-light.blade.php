<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Antux - Personal Portfolio Template">

    <!-- ========== Page Title ========== -->
    <title>@yield('title', 'Porichoy')</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ asset('visitor/antux/img/favicon.png') }}" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('visitor/antux/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@7.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('visitor/antux/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('visitor/antux/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('visitor/antux/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('visitor/antux/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('visitor/antux/css/validnavs.css') }}" rel="stylesheet">
    <link href="{{ asset('visitor/antux/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('visitor/antux/css/unit-test.css') }}" rel="stylesheet">
    <link href="{{ asset('visitor/antux/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('visitor/antux/style.css') }}" rel="stylesheet">
    <!-- ========== End Stylesheet ========== -->

    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

</head>

<body>

    @include('visitor.antux.include.preloader')

    @include('visitor.antux.include.header')

    @yield('content')

    @include('visitor.antux.include.footer')

    <!-- jQuery Frameworks -->
    <script src="{{ asset('visitor/antux/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/progress-bar.min.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/wow.min.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/count-to.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/YTPlayer.min.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/validnavs.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/gsap.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/jquery.circleType.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/typed.js') }}"></script>
    <script src="{{ asset('visitor/antux/js/main.js') }}"></script>

</body>

</html>
