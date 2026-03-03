<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Reeni is a modern personal portfolio template for designers, developers, content writer, cleaner, programmer, fashion designer, model, Influencer and freelancers. Fully responsive, SEO-friendly, Bootstrap and easy to customize.">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('visitor/reeni/images/favicon.svg') }}">
    <title>@yield('title', 'Porichoy')</title>
    <!-- Bootstrap min css -->
    <link rel="stylesheet" href="{{ asset('visitor/reeni/css/vendor/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/reeni/css/plugins/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/reeni/css/plugins/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/reeni/css/vendor/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/reeni/css/vendor/bootstrap.min.css') }}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('visitor/reeni/css/style.css') }}">
</head>

<body class="color-primary-3rd">

    @include('visitor.reeni.include.header')

    @yield('content')

    @include('visitor.reeni.include.footer')


    <!-- ready chatting option via email -->
    <div class="ready-chatting-option tmp-ready-chat">
        <input type="checkbox" id="click">
        <label for="click">
            <i class="fab fa-facebook-messenger"></i>
            <i class="fas fa-times"></i>
        </label>
        <div class="wrapper">
            <div class="head-text">
                Let's chat with me? - Online
            </div>
            <div class="chat-box">
                <div class="desc-text">
                    Please fill out the form below to start chatting with me directly.
                </div>
                <form class="tmp-dynamic-form" action="#">
                    <div class="field">
                        <input class="input-field" name="name" placeholder="Your Name" type="text" required>
                    </div>
                    <div class="field">
                        <input class="input-field" name="email" placeholder="Your Email" type="email" required>
                    </div>
                    <div class="field textarea">
                        <textarea class="input-field" placeholder="Your Message" name="message" required></textarea>
                    </div>
                    <div class="field">
                        <button name="submit" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ready chatting option via email end -->
    <!-- progress area start -->
    <div class="scrollToTop" style="display: block;">
        <div class="arrowUp">
            <i class="fa-light fa-arrow-up"></i>
        </div>
        <div class="water" style="transform: translate(0px, 87%);">
            <svg viewBox="0 0 560 20" class="water_wave water_wave_back">
                <use xlink:href="#wave"></use>
            </svg>
            <svg viewBox="0 0 560 20" class="water_wave water_wave_front">
                <use xlink:href="#wave"></use>
            </svg>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 560 20" style="display: none;">
                <symbol id="wave">
                    <path
                        d="M420,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C514,6.5,518,4.7,528.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H420z"
                        fill="#"></path>
                    <path
                        d="M420,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C326,6.5,322,4.7,311.5,2.7C304.3,1.4,293.6-0.1,280,0c0,0,0,0,0,0v20H420z"
                        fill="#"></path>
                    <path
                        d="M140,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C234,6.5,238,4.7,248.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H140z"
                        fill="#"></path>
                    <path
                        d="M140,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C46,6.5,42,4.7,31.5,2.7C24.3,1.4,13.6-0.1,0,0c0,0,0,0,0,0l0,20H140z"
                        fill="#"></path>
                </symbol>
            </svg>

        </div>
    </div>
    <!-- progress area end -->
    <!-- <div class="tmp-right-demo">
    <button class="demo-button">
        <p class="mb--0">48</p>
        <span class="text">Demos</span>
    </button>
</div> -->

    <script src="{{ asset('visitor/reeni/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('visitor/reeni/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('visitor/reeni/js/vendor/waypoints.min.js') }}"></script>

    <script src="{{ asset('visitor/reeni/js/plugins/odometer.js') }}"></script>
    <script src="{{ asset('visitor/reeni/js/vendor/appear.js') }}"></script>


    <script src="{{ asset('visitor/reeni/js/vendor/jquery-one-page-nav.js') }}"></script>
    <script src="{{ asset('visitor/reeni/js/plugins/swiper.js') }}"></script>

    <script src="{{ asset('visitor/reeni/js/plugins/gsap.js') }}"></script>
    <script src="{{ asset('visitor/reeni/js/plugins/splittext.js') }}"></script>
    <script src="{{ asset('visitor/reeni/js/plugins/scrolltigger.js') }}"></script>
    <script src="{{ asset('visitor/reeni/js/plugins/scrolltoplugins.js') }}"></script>
    <script src="{{ asset('visitor/reeni/js/plugins/smoothscroll.js') }}"></script>
    <!-- bootstrap Js-->
    <script src="{{ asset('visitor/reeni/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('visitor/reeni/js/vendor/waw.js') }}"></script>
    <script src="{{ asset('visitor/reeni/js/plugins/isotop.js') }}"></script>
    <script src="{{ asset('visitor/reeni/js/plugins/animation.js') }}"></script>
    <script src="{{ asset('visitor/reeni/js/plugins/contact.form.js') }}"></script>
    <script src="{{ asset('visitor/reeni/js/vendor/backtop.js') }}"></script>
    <script src="{{ asset('visitor/reeni/js/plugins/text-type.js') }}"></script>
    <!-- custom Js -->
    <script src="{{ asset('visitor/reeni/js/main.js') }}"></script>


</body>

</html>
