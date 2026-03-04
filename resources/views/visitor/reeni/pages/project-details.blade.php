@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Blog | Porichoy')

@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">Service Details</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">Service Details</li>
                        </ul>
                        <!-- <div class="circle-1"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Service-details Area Start -->
    <div class="service-details-area-wrapper tmp-section-gap">
        <div class="container">
            <div class="row row--40">
                <div class="col-lg-8">
                    <div class="service-thumnail-wrap">
                        <img src="{{ asset('visitor/reeni/images/services/service-detials-thumnail-wrap.png') }}" alt="thumnail-img">
                    </div>
                    <h2 class="title split-collab">Elevated Designs Personalized the best Experiences</h2>
                    <p class="doc-para">Web designing in a powerful way of just not an only professions, however, in a
                        passion for our Company. We have to a tendency to believe the idea that smart looking of any
                        websitet in on visitors.Web designing in a powerful way of just not an only profession Web
                        designing in a powerful way of just not an only </p>
                    <h2 class="title-mini split-collab">My Experts Areas where i gained skill</h2>
                    <p class="doc-para">Web designing in a powerful way of just not an only professions, however, in a
                        passion for our Company. We have to a tendency to believe the idea that smart looking of any
                        websitet in on visitors.Web designing in a powerful way of just not an only profession Web
                        designing in a powerful way of just not an only</p>
                    <p class="doc-para">Aliquam eros justo, posuere loborti viverra laoreet matti ullamcorper posuere
                        viverra .Aliquam eros justo, posuere lobortis, viverra laoreet augue mattis fermentum
                        ullamcorper viverra laoreet Aliquam eros </p>

                    <h2 class="title-mini split-collab">My Experts Areas where i gained skill</h2>
                    <p class="doc-para">Web designing in a powerful way of just not an only professions, however, in a
                        passion for our Company. We have to a tendency to believe the idea that smart looking of any
                        websitet in on visitors.Web designing in a powerful way of just not an only profession Web
                        designing in a powerful way of just not an only</p>
                    <p class="doc-para">Aliquam eros justo, posuere loborti viverra laoreet matti ullamcorper posuere
                        viverra .Aliquam eros justo, posuere lobortis, viverra laoreet augue mattis fermentum
                        ullamcorper viverra laoreet Aliquam eros </p>
                    <p class="doc-para">viverra laoreet matti ullamcorper posuere
                        viverra .Aliquam eros justo, posuere lobortis, viverra laoreet augue mattis fermentum
                        ullamcorper viverra laoreet Aliquam eros</p>

                </div>
                <div class="col-lg-4">
                    <div class="signle-side-bar service-list-area tmponhover">
                        <div class="header">
                            <h3 class="title">Service Category</h3>
                        </div>
                        <div class="body">
                            <a href="#" class="single-service">
                                <p class="service-title">TechPros</p>
                                <span class="service-icon"><i class="fa-solid fa-angle-right"></i></span>
                            </a>
                            <a href="#" class="single-service">
                                <p class="service-title"> NetWorks</p>
                                <span class="service-icon"><i class="fa-solid fa-angle-right"></i></span>
                            </a>
                            <a href="#" class="single-service">
                                <p class="service-title">DataMasters</p>
                                <span class="service-icon"><i class="fa-solid fa-angle-right"></i></span>
                            </a>
                            <a href="#" class="single-service">
                                <p class="service-title">Dibetics section</p>
                                <span class="service-icon"><i class="fa-solid fa-angle-right"></i></span>
                            </a>
                            <a href="#" class="single-service">
                                <p class="service-title">DigitalSolutions</p>
                                <span class="service-icon"><i class="fa-solid fa-angle-right"></i></span>
                            </a>
                            <a href="#" class="single-service">
                                <p class="service-title">CodeGenius</p>
                                <span class="service-icon"><i class="fa-solid fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service-details Area End -->
@endsection
