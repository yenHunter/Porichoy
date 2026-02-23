<!-- Footer Area Start -->
<footer class="default-padding bg-cover" style="background-image: url({{ asset('visitor/antux/img/shape/1.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="footer-items text-center">
                    <a href="#" class="footer-logot"><img src="{{ asset('visitor/antux/img/logo.png') }}"
                            alt="Image Not Found"></a>
                    <ul class="foter-menu">
                        <li><a href="{{ route('visitor.index') }}">Home</a></li>
                        <li><a href="{{ route('visitor.service.index') }}">Services</a></li>
                        <li><a href="{{ route('visitor.project.index') }}">Portfolio</a></li>
                        <li><a href="{{ route('visitor.blog.index') }}">Blog</a></li>
                        <li><a href="{{ route('visitor.contact.index') }}">Contact</a></li>
                    </ul>
                    <p>Copyright &copy; {{ now()->year }} Antux. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->
