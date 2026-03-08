<!-- footer area start -->
<footer class="rs-footer-area rs-footer-one primary-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="rs-footer-widget footer-1-col-1">
                    <div class="rs-footer-widget-logo text-center">
                        <a class="logo-black" href="{{ route('visitor.index') }}"><img src="{{ asset('visitor/flixta/images/logo/logo-black.png') }}"
                                alt="logo"></a>
                        <a class="logo-white" href="{{ route('visitor.index') }}"><img src="{{ asset('visitor/flixta/images/logo/logo-white.png') }}"
                                alt="logo"></a>
                    </div>
                    <div class="rs-footer-widget-content">
                        <div class="rs-footer-list-wrapper">
                            <ul class="rs-footer-list">
                                <li><a href="{{ route('visitor.index') }}">Home</a></li>
                                <li><a href="{{ route('visitor.about') }}">About</a></li>
                                <li><a href="{{ route('visitor.service.index') }}">Services</a></li>
                                <li><a href="{{ route('visitor.project.index') }}">Portfolio</a></li>
                                <li><a href="{{ route('visitor.blog.index') }}">Blog</a></li>
                                <li><a href="{{ route('visitor.contact.index') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rs-footer-copyright-area rs-copyright-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="rs-footer-copyright text-center">
                        <p>© <span id="year"></span> Flixta. Designed by <a href="https://rstheme.com">RSTheme</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->
