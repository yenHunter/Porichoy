@extends('layouts.vertical', ['title' => 'Carousel'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Carousel'])

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Slides Only</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleSlidesOnly">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <!-- First slide -->
                                <img alt="First slide" class="d-block img-fluid" src="/images/stock/small-1.jpg" />
                            </div>
                            <div class="carousel-item">
                                <!-- Second slide -->
                                <img alt="Second slide" class="d-block img-fluid" src="/images/stock/small-2.jpg" />
                            </div>
                            <div class="carousel-item">
                                <!-- Third slide -->
                                <img alt="Third slide" class="d-block img-fluid" src="/images/stock/small-3.jpg" />
                            </div>
                        </div>
                    </div>
                </div> <!-- end card body -->
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">With Controls</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- START carousel-->
                    <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleControls">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <!-- First slide -->
                                <img alt="First slide" class="d-block img-fluid" src="/images/stock/small-4.jpg" />
                            </div>
                            <div class="carousel-item">
                                <!-- Second slide -->
                                <img alt="Second slide" class="d-block img-fluid" src="/images/stock/small-1.jpg" />
                            </div>
                            <div class="carousel-item">
                                <!-- Third slide -->
                                <img alt="Third slide" class="d-block img-fluid" src="/images/stock/small-2.jpg" />
                            </div>
                        </div>
                        <a class="carousel-control-prev" data-bs-slide="prev" href="#carouselExampleControls"
                            role="button">
                            <span aria-hidden="true" class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" data-bs-slide="next" href="#carouselExampleControls"
                            role="button">
                            <span aria-hidden="true" class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div> <!-- end card body -->
            </div>
            <!-- END carousel-->
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">With Indicators</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
                        <div class="carousel-indicators">
                            <button aria-current="true" aria-label="Slide 1" class="active" data-bs-slide-to="0"
                                data-bs-target="#carouselExampleIndicators" type="button"></button>
                            <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators"
                                type="button"></button>
                            <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators"
                                type="button"></button>
                        </div>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <!-- First slide -->
                                <img alt="First slide" class="d-block img-fluid" src="/images/stock/small-3.jpg" />
                            </div>
                            <div class="carousel-item">
                                <!-- Second slide -->
                                <img alt="Second slide" class="d-block img-fluid" src="/images/stock/small-2.jpg" />
                            </div>
                            <div class="carousel-item">
                                <!-- Third slide -->
                                <img alt="Third slide" class="d-block img-fluid" src="/images/stock/small-1.jpg" />
                            </div>
                        </div>
                        <a class="carousel-control-prev" data-bs-slide="prev" href="#carouselExampleIndicators"
                            role="button">
                            <span aria-hidden="true" class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" data-bs-slide="next" href="#carouselExampleIndicators"
                            role="button">
                            <span aria-hidden="true" class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div> <!-- end card body -->
            </div>
        </div> <!-- end col -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">With Captions</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleCaption">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <!-- first slide  -->
                                <img alt="..." class="d-block img-fluid" src="/images/stock/small-1.jpg" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">First slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <!-- secound slide  -->
                                <img alt="..." class="d-block img-fluid" src="/images/stock/small-3.jpg" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">Second slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <!-- third slide  -->
                                <img alt="..." class="d-block img-fluid" src="/images/stock/small-2.jpg" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">Third slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" data-bs-slide="prev" href="#carouselExampleCaption"
                            role="button">
                            <span aria-hidden="true" class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" data-bs-slide="next" href="#carouselExampleCaption"
                            role="button">
                            <span aria-hidden="true" class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div> <!-- end card body -->
            </div>
        </div> <!-- end col -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Crossfade</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="carousel slide carousel-fade" data-bs-ride="carousel" id="carouselExampleFade">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <!-- First slide -->
                                <img alt="First slide" class="d-block img-fluid" src="/images/stock/small-1.jpg" />
                            </div>
                            <div class="carousel-item">
                                <!-- Second slide -->
                                <img alt="Second slide" class="d-block img-fluid" src="/images/stock/small-2.jpg" />
                            </div>
                            <div class="carousel-item">
                                <!-- Third slide -->
                                <img alt="Third slide" class="d-block img-fluid" src="/images/stock/small-3.jpg" />
                            </div>
                        </div>
                        <a class="carousel-control-prev" data-bs-slide="prev" href="#carouselExampleFade"
                            role="button">
                            <span aria-hidden="true" class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" data-bs-slide="next" href="#carouselExampleFade"
                            role="button">
                            <span aria-hidden="true" class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div> <!-- end card body -->
            </div>
        </div> <!-- end col -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Individual Interval</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleInterval">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="1000">
                                <!-- First slide -->
                                <img alt="First slide" class="img-fluid d-block w-100" src="/images/stock/small-4.jpg" />
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <!-- Second slide -->
                                <img alt="Second slide" class="img-fluid d-block w-100"
                                    src="/images/stock/small-2.jpg" />
                            </div>
                            <div class="carousel-item">
                                <!-- Third slide -->
                                <img alt="Third slide" class="img-fluid d-block w-100" src="/images/stock/small-1.jpg" />
                            </div>
                        </div>
                        <a class="carousel-control-prev" data-bs-slide="prev" href="#carouselExampleInterval"
                            role="button">
                            <span aria-hidden="true" class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" data-bs-slide="next" href="#carouselExampleInterval"
                            role="button">
                            <span aria-hidden="true" class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div> <!-- end card body -->
            </div>
        </div> <!-- end col -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Dark Variant</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="carousel carousel-dark slide" id="carouselExampleDark">
                        <div class="carousel-indicators">
                            <button aria-current="true" aria-label="Slide 1" class="active" data-bs-slide-to="0"
                                data-bs-target="#carouselExampleDark" type="button"></button>
                            <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleDark"
                                type="button"></button>
                            <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleDark"
                                type="button"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <!-- first slide  -->
                                <img alt="Images" class="img-fluid" src="/images/stock/small-8.jpg" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h4 class="fw-bold">First slide label</h4>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <!-- secound slide  -->
                                <img alt="Images" class="img-fluid" src="/images/stock/small-9.jpg" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h4 class="fw-bold">Second slide label</h4>
                                    <p>Some representative placeholder content for the second slide.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <!-- third slide  -->
                                <img alt="Images" class="img-fluid" src="/images/stock/small-10.jpg" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h4 class="fw-bold">Third slide label</h4>
                                    <p>Some representative placeholder content for the third slide.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleDark"
                            type="button">
                            <span aria-hidden="true" class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleDark"
                            type="button">
                            <span aria-hidden="true" class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div> <!-- end card body -->
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
