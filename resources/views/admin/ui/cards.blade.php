@extends('layouts.vertical', ['title' => 'Cards'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Cards'])

    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <!-- Simple card -->
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make
                        up the bulk of the card's content. Some quick example text to build on the card
                        title and make up.</p>
                    <a class="btn btn-sm btn-primary" href="javascript: void(0);">Button</a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div><!-- end col -->
        <div class="col-sm-6 col-lg-3">
            <!-- Simple card -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-2">Basic Card with Title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make
                        up the bulk of the card's content. Some quick example text to build on the card
                        title and make up.</p>
                    <a class="btn btn-sm btn-primary" href="javascript: void(0);">Button</a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div><!-- end col -->
        <div class="col-sm-6 col-lg-3">
            <!-- Simple card -->
            <div class="card text-bg-primary border-0">
                <div class="card-body">
                    <h5 class="card-title mb-2">Card with Background Color</h5>
                    <p class="card-text">Some quick example text to build on the card title and make
                        up the bulk of the card's content. Some quick example text to build on the card
                        title and make up.</p>
                    <a class="btn btn-sm btn-light" href="javascript: void(0);">Button</a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div><!-- end col -->
        <div class="col-sm-6 col-lg-3">
            <!-- Simple card -->
            <div class="card text-bg-success bg-gradient">
                <div class="card-body">
                    <h5 class="card-title mb-2">Card with Background Gradient</h5>
                    <p class="card-text">Some quick example text to build on the card title and make
                        up the bulk of the card's content. Some quick example text to build on the card
                        title and make up.</p>
                    <a class="btn btn-sm btn-light" href="javascript: void(0);">Button</a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div><!-- end col -->
    </div> <!-- end row -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">Card with Header</h5>
                <div class="card-body">
                    <h5 class="card-title mb-2">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to
                        additional content.</p>
                    <a class="btn btn-sm btn-primary" href="javascript: void(0);">Go somewhere</a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-block">
                    <h5 class="card-title mb-1">Card with Sub Header</h5>
                    <h6 class="card-subtitle text-body-secondary">Card subtitle</h6>
                </div>
                <div class="card-body">
                    <blockquote class="card-bodyquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                            erat a ante.</p>
                        <footer class="mb-0">Someone famous in <cite title="Source Title">Source Title</cite>
                        </footer>
                    </blockquote>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-light-subtle">
                    Featured Card Title
                </div>
                <div class="card-body">
                    <a class="btn btn-sm btn-primary" href="javascript: void(0);">Go somewhere</a>
                </div>
                <div class="card-footer border-top border-light text-muted">
                    2 days ago
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row -->
    <div class="row">
        <div class="col-12">
            <h4 class="mb-4 mt-3">Advanced Card</h4>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Card with Action Tools</h5>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                        <a class="card-action-item" data-action="card-refresh" href="#!"><i
                                class="ti ti-refresh"></i></a>
                        <a class="card-action-item" data-action="card-close" href="#!"><i class="ti ti-x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">With supporting text below as a natural lead-in to
                        additional content.</p>
                    <a class="btn btn-sm btn-primary" href="javascript: void(0);">Go somewhere</a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-md-4">
            <div class="card text-bg-dark border-0">
                <div class="card-header border-light border-opacity-25">
                    <h5 class="card-title">Card with Action Tools &amp; Background Colors</h5>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                        <a class="card-action-item" data-action="card-refresh" href="#!"><i
                                class="ti ti-refresh"></i></a>
                        <a class="card-action-item" data-action="card-close" href="#!"><i class="ti ti-x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">With supporting text below as a natural lead-in to
                        additional content.</p>
                    <a class="btn btn-sm btn-light" href="javascript: void(0);">Go somewhere</a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-md-4">
            <div class="card card-filled">
                <div class="card-header">
                    <h5 class="card-title">Card with Action Tools</h5>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                        <a class="card-action-item" data-action="code-collapse" href="#!"><i
                                class="ti ti-code"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">With supporting text below as a natural lead-in to
                        additional content.</p>
                    <a class="btn btn-sm btn-primary" href="javascript: void(0);">Go somewhere</a>
                </div> <!-- end card-body-->
                <div class="code-body">
                    <pre>
                                    <code class="language-markup">
                                        &lt;nav aria-label="breadcrumb"&gt;
                                            &lt;ol class="breadcrumb bg-light bg-opacity-50 p-2 mb-2"&gt;
                                                &lt;li class="breadcrumb-item active" aria-current="page"&gt;&lt;i class="ti ti-smart-home me-1"&gt;&lt;/i&gt;Home&lt;/li&gt;
                                            &lt;/ol&gt;
                                        &lt;/nav&gt;
                                    </code>

                                    <code class="language-markup">
                                        &lt;nav aria-label="breadcrumb"&gt;
                                            &lt;ol class="breadcrumb bg-light bg-opacity-50 p-2 mb-2"&gt;
                                                &lt;li class="breadcrumb-item"&gt;&lt;a href="#"&gt;&lt;i class="ti ti-smart-home"&gt;&lt;/i&gt; Home&lt;/a&gt;&lt;/li&gt;
                                                &lt;li class="breadcrumb-item active" aria-current="page"&gt;Library&lt;/li&gt;
                                            &lt;/ol&gt;
                                        &lt;/nav&gt;
                                    </code>

                                    <code class="language-markup">
                                        &lt;nav aria-label="breadcrumb"&gt;
                                            &lt;ol class="breadcrumb bg-light bg-opacity-50 p-2 mb-0"&gt;
                                                &lt;li class="breadcrumb-item"&gt;&lt;a href="#"&gt;&lt;i class="ti ti-smart-home"&gt;&lt;/i&gt; Home&lt;/a&gt;&lt;/li&gt;
                                                &lt;li class="breadcrumb-item"&gt;&lt;a href="#"&gt;Library&lt;/a&gt;&lt;/li&gt;
                                                &lt;li class="breadcrumb-item active" aria-current="page"&gt;Data&lt;/li&gt;
                                            &lt;/ol&gt;
                                        &lt;/nav&gt;
                                    </code>
                                </pre> <!-- end highlight-->
                </div> <!-- end preview code-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <div class="row">
        <div class="col-12">
            <h4 class="mb-4 mt-3">Bordered Card</h4>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="row">
        <div class="col-md-4">
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title mb-2">Card with Colored Border</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to
                        additional content.</p>
                    <a class="btn btn-primary btn-sm" href="javascript: void(0);">Button</a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-md-4">
            <div class="card border-primary border border-dashed">
                <div class="card-body">
                    <h5 class="card-title mb-2 text-primary">Card with Simple Border</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to
                        additional content.</p>
                    <a class="btn btn-primary btn-sm" href="javascript: void(0);">Button</a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-md-4">
            <div class="card border-primary border-2">
                <div class="card-body">
                    <h5 class="card-title mb-2 text-primary">Card with Double Border</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to
                        additional content.</p>
                    <a class="btn btn-primary btn-sm" href="javascript: void(0);">Button</a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row -->
    <div class="row">
        <div class="col-md-4">
            <div class="card card-bordered">
                <div class="card-body">
                    <h5 class="card-title mb-2">Card with Start Border</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to
                        additional content.</p>
                    <a class="btn btn-dark btn-sm" href="javascript: void(0);">Button</a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-md-4">
            <div class="card border-primary card-bordered">
                <div class="card-body">
                    <h5 class="card-title mb-2 text-primary">Card with Colored Border</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to
                        additional content.</p>
                    <a class="btn btn-primary btn-sm" href="javascript: void(0);">Button</a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-md-4">
            <div class="card border-info card-bordered">
                <div class="card-body">
                    <h5 class="card-title mb-2">Card with Colored Border</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to
                        additional content.</p>
                    <a class="btn btn-info btn-sm" href="javascript: void(0);">Button</a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row -->
    <div class="row">
        <div class="col-12">
            <h4 class="mb-4 mt-3">Horizontal Card</h4>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4">
                        <img alt="..." class="img-fluid rounded-start" src="/images/stock/small-1.jpg" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title mb-2">Card with Horizontal Mode</h5>
                            <p class="card-text">This is a wider card with supporting text below as a
                                natural lead-in to additional content. This content is a little bit longer.
                            </p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end col -->
                </div> <!-- end row-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-lg-6">
            <div class="card">
                <div class="row g-0 align-items-center">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title mb-2">Card with Horizontal Mode</h5>
                            <p class="card-text">This is a wider card with supporting text below as a
                                natural lead-in to additional content. This content is a little bit longer.
                            </p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div> <!-- end card-body -->
                    </div> <!-- end col -->
                    <div class="col-md-4">
                        <img alt="..." class="img-fluid rounded-end" src="/images/stock/small-2.jpg" />
                    </div> <!-- end col -->
                </div> <!-- end row-->
            </div> <!-- end card -->
        </div> <!-- end col-->
    </div> <!-- end row -->
    <div class="row">
        <div class="col-12">
            <h4 class="mb-4 mt-3">Stretched Link</h4>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <img alt="..." class="card-img-top" src="/images/stock/small-3.jpg" />
                <div class="card-body">
                    <h5 class="card-title mb-2">Card with stretched link</h5>
                    <a class="btn btn-primary mt-2 stretched-link" href="#">Go somewhere</a>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col-->
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <img alt="..." class="card-img-top" src="/images/stock/small-4.jpg" />
                <div class="card-body">
                    <h5 class="card-title mb-2"><a class="text-primary stretched-link" href="#">Card with
                            stretched link</a></h5>
                    <p class="card-text">
                        Some quick example text to build on the card up the bulk of the card's content.
                    </p>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col-->
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <img alt="..." class="card-img-top" src="/images/stock/small-5.jpg" />
                <div class="card-body">
                    <h5 class="card-title mb-2">Card with stretched link</h5>
                    <a class="btn btn-primary mt-2 stretched-link" href="#">Go somewhere</a>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col-->
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <img alt="..." class="card-img-top" src="/images/stock/small-6.jpg" />
                <div class="card-body">
                    <h5 class="card-title mb-2"><a class="text-primary stretched-link" href="#">Card with stretched
                            link</a>
                    </h5>
                    <p class="card-text">
                        Some quick example text to build on the card up the bulk of the card's content.
                    </p>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col-->
    </div> <!-- end row -->
    <div class="row">
        <div class="col-12">
            <h4 class="mb-4 mt-3">Card Group</h4>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="row">
        <div class="col-12">
            <div class="card-group mb-3">
                <div class="card d-block">
                    <img alt="Card image cap" class="card-img-top" src="/images/stock/small-8.jpg" />
                    <div class="card-body">
                        <h5 class="card-title mb-2">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content is a little bit
                            longer.</p>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div>
                <div class="card d-block">
                    <img alt="Card image cap" class="card-img-top" src="/images/stock/small-9.jpg" />
                    <div class="card-body">
                        <h5 class="card-title mb-2">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural
                            lead-in to additional content.</p>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div>
                <div class="card d-block">
                    <img alt="Card image cap" class="card-img-top" src="/images/stock/small-10.jpg" />
                    <div class="card-body">
                        <h5 class="card-title mb-2">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a
                            natural lead-in to additional content. This card has even longer content
                            than the first to show that equal height action.</p>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div>
            </div> <!-- end card-group-->
        </div> <!-- end col-->
    </div> <!-- end row -->
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-2">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                    content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
                <small class="text-body-secondary">Last updated 3 mins ago</small>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-2">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class="card-footer">
                <small class="text-body-secondary">Last updated 3 mins ago</small>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-2">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                    content. This card has even longer content than the first to show that equal height action.</p>
            </div>
            <div class="card-footer">
                <small class="text-body-secondary">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4 class="my-4">Navigation with Card</h4>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a aria-current="true" class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a aria-disabled="true" class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-2">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a class="btn btn-primary" href="#">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a aria-disabled="true" class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-2">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a class="btn btn-primary" href="#">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
