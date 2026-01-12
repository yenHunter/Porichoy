<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Let Them Know">
    <meta name="keywords"
        content="personal, portfolio new, html, one page, bootstrap, new html template, design, creative, onepage, clean, modern">
    <meta name="author" content="Themesvila">
    <!-- PAGE TITLE -->
    <title>@yield('title', 'Porichoy')</title>
    <!-- FAV ICON -->
    <link rel="apple-touch-icon" href="{{ asset('visitor/dorbesh/images/favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('visitor/dorbesh/images/favicon.png') }}">
    <!-- ALL GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="{{ asset('visitor/dorbesh/css/bootstrap.min.css') }}" />
    <!-- FONT AWESOME CSS -->
    <link rel="stylesheet" href="{{ asset('visitor/dorbesh/fonts/remixicon.css') }}" />
    <!-- MAGNIFIC CSS -->
    <link rel="stylesheet" href="{{ asset('visitor/dorbesh/css/magnific-popup.css') }}">
    <!-- NICE SELECT CSS -->
    <link rel="stylesheet" href="{{ asset('visitor/dorbesh/css/nice-select.min.css') }}" />
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="{{ asset('visitor/dorbesh/css/animate.min.css') }}" />
    <!-- SLICK CSS -->
    <link rel="stylesheet" href="{{ asset('visitor/dorbesh/css/slick.min.css') }}" />
    <!-- SPACING CSS -->
    <link rel="stylesheet" href="{{ asset('visitor/dorbesh/css/spacing.css') }}" />
    <!-- MAIN STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('visitor/dorbesh/css/style.css') }}" />
    <!-- RESPONSIVE CSS -->
    <link rel="stylesheet" href="{{ asset('visitor/dorbesh/css/responsive.css') }}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    @include('visitor.dorbesh.include.preloader')

    @include('visitor.dorbesh.include.header')

    @yield('content')

    @include('visitor.dorbesh.include.footer')

    <!-- START SCROOL UP DESIGN AREA -->
    <div class="progress-wrap cursor-pointer">
        <i class="ri-arrow-up-double-line"></i>
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- / END SCROOL UP DESIGN AREA -->

    <!-- JQUERY JS -->
    <script src="{{ asset('visitor/dorbesh/js/jquery-3.7.1.min.js') }}"></script>
    <!-- BOOTSTRAP JS-->
    <script src="{{ asset('visitor/dorbesh/js/bootstrap.min.js') }}"></script>
    <!-- APPEAR JS -->
    <script src="{{ asset('visitor/dorbesh/js/appear.min.js') }}"></script>
    <!-- jquery smooth-scroll JS -->
    <script src="{{ asset('visitor/dorbesh/js/smooth-scroll.js') }}"></script>
    <!-- GSAP JS -->
    <script src="{{ asset('visitor/dorbesh/js/gsap.min.js') }}"></script>
    <!-- MAGNIFICANT JS -->
    <script src="{{ asset('visitor/dorbesh/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- SLICK JS-->
    <script src="{{ asset('visitor/dorbesh/js/slick.min.js') }}"></script>
    <!-- NICE SELECT JS-->
    <script src="{{ asset('visitor/dorbesh/js/jquery.nice-select.min.js') }}"></script>
    <!-- IMAGE LOADER JS-->
    <script src="{{ asset('visitor/dorbesh/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- ISOTOPE JS-->
    <script src="{{ asset('visitor/dorbesh/js/isotope.pkgd.min.js') }}"></script>
    <!--  WOW ANIMATION JS-->
    <script src="{{ asset('visitor/dorbesh/js/wow.min.js') }}"></script>
    <!-- SCRIPT JS-->
    <script src="{{ asset('visitor/dorbesh/js/script.js') }}"></script>
</body>

</html>
