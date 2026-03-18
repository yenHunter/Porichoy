@extends('layouts.vertical', ['title' => 'Offcanvas'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Offcanvas'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Offcanvas</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted fs-base">You can trigger an offcanvas using a link with <code>href</code> or a
                        button with <code>data-bs-target</code>, but both must include
                        <code>data-bs-toggle="offcanvas"</code>.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <a aria-controls="offcanvasExample" class="btn btn-primary" data-bs-toggle="offcanvas"
                            href="#offcanvasExample" role="button">
                            Link with href
                        </a>
                        <button aria-controls="offcanvasExample" class="btn btn-primary" data-bs-target="#offcanvasExample"
                            data-bs-toggle="offcanvas" type="button">
                            Button with data-bs-target
                        </button>
                    </div> <!-- end d-flex flex-wrap gap-2-->
                    <div aria-labelledby="offcanvasExampleLabel" class="offcanvas offcanvas-start" id="offcanvasExample"
                        tabindex="-1">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                            <button aria-label="Close" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                type="button"></button>
                        </div> <!-- end offcanvas-header-->
                        <div class="offcanvas-body">
                            <div>
                                Some text as placeholder. In real life you can have the elements you have chosen. Like,
                                text,
                                images, lists, etc.
                            </div>
                            <h5 class="mt-3">List</h5>
                            <ul class="ps-3">
                                <li class="">Nemo enim ipsam voluptatem quia aspernatur</li>
                                <li class="">Neque porro quisquam est, qui dolorem</li>
                                <li class="">Quis autem vel eum iure qui in ea</li>
                            </ul>
                            <ul class="ps-3">
                                <li class="">At vero eos et accusamus et iusto odio dignissimos</li>
                                <li class="">Et harum quidem rerum facilis</li>
                                <li class="">Temporibus autem quibusdam et aut officiis</li>
                            </ul>
                        </div> <!-- end offcanvas-body-->
                    </div> <!-- end offcanvas-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Offcanvas Backdrop</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted fs-base">When an offcanvas and its backdrop are visible, <code>&lt;body&gt;</code>
                        scrolling is disabled. Use <code>data-bs-scroll</code> to enable scrolling and
                        <code>data-bs-backdrop</code> to control the backdrop visibility.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Enable body scrolling -->
                        <button aria-controls="offcanvasScrolling" class="btn btn-primary"
                            data-bs-target="#offcanvasScrolling" data-bs-toggle="offcanvas" type="button">Enable body
                            scrolling</button>
                        <!-- Enable backdrop (default) -->
                        <button aria-controls="offcanvasWithBackdrop" class="btn btn-primary"
                            data-bs-target="#offcanvasWithBackdrop" data-bs-toggle="offcanvas" type="button">Enable
                            backdrop (default)</button>
                        <!-- Enable both scrolling & backdrop -->
                        <button aria-controls="offcanvasWithBothOptions" class="btn btn-primary"
                            data-bs-target="#offcanvasWithBothOptions" data-bs-toggle="offcanvas" type="button">Enable both
                            scrolling &amp; backdrop</button>
                    </div> <!-- end d-flex flex-wrap gap-2-->
                    <div aria-labelledby="offcanvasScrollingLabel" class="offcanvas offcanvas-start"
                        data-bs-backdrop="false" data-bs-scroll="true" id="offcanvasScrolling" tabindex="-1">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Colored with scrolling</h5>
                            <button aria-label="Close" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                type="button"></button>
                        </div> <!-- end offcanvas-header-->
                        <div class="offcanvas-body">
                            <div>
                                Some text as placeholder. In real life you can have the elements you have chosen. Like,
                                text,
                                images, lists, etc.
                            </div>
                            <h5 class="mt-3">List</h5>
                            <ul class="ps-3">
                                <li class="">Nemo enim ipsam voluptatem quia aspernatur</li>
                                <li class="">Neque porro quisquam est, qui dolorem</li>
                                <li class="">Quis autem vel eum iure qui in ea</li>
                            </ul>
                            <ul class="ps-3">
                                <li class="">At vero eos et accusamus et iusto odio dignissimos</li>
                                <li class="">Et harum quidem rerum facilis</li>
                                <li class="">Temporibus autem quibusdam et aut officiis</li>
                            </ul>
                        </div> <!-- end offcanvas-body-->
                    </div> <!-- end offcanvas-->
                    <div aria-labelledby="offcanvasWithBackdropLabel" class="offcanvas offcanvas-start"
                        id="offcanvasWithBackdrop" tabindex="-1">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">Offcanvas with backdrop</h5>
                            <button aria-label="Close" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                type="button"></button>
                        </div> <!-- end offcanvas-header-->
                        <div class="offcanvas-body">
                            <div>
                                Some text as placeholder. In real life you can have the elements you have chosen. Like,
                                text,
                                images, lists, etc.
                            </div>
                            <h5 class="mt-3">List</h5>
                            <ul class="ps-3">
                                <li class="">Nemo enim ipsam voluptatem quia aspernatur</li>
                                <li class="">Neque porro quisquam est, qui dolorem</li>
                                <li class="">Quis autem vel eum iure qui in ea</li>
                            </ul>
                            <ul class="ps-3">
                                <li class="">At vero eos et accusamus et iusto odio dignissimos</li>
                                <li class="">Et harum quidem rerum facilis</li>
                                <li class="">Temporibus autem quibusdam et aut officiis</li>
                            </ul>
                        </div> <!-- end offcanvas-body-->
                    </div> <!-- end offcanvas-->
                    <div aria-labelledby="offcanvasWithBothOptionsLabel" class="offcanvas offcanvas-start"
                        data-bs-scroll="true" id="offcanvasWithBothOptions" tabindex="-1">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdroped with scrolling</h5>
                            <button aria-label="Close" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                type="button"></button>
                        </div> <!-- end offcanvas-header-->
                        <div class="offcanvas-body">
                            <div>
                                Some text as placeholder. In real life you can have the elements you have chosen. Like,
                                text,
                                images, lists, etc.
                            </div>
                            <h5 class="mt-3">List</h5>
                            <ul class="ps-3">
                                <li class="">Nemo enim ipsam voluptatem quia aspernatur</li>
                                <li class="">Neque porro quisquam est, qui dolorem</li>
                                <li class="">Quis autem vel eum iure qui in ea</li>
                            </ul>
                            <ul class="ps-3">
                                <li class="">At vero eos et accusamus et iusto odio dignissimos</li>
                                <li class="">Et harum quidem rerum facilis</li>
                                <li class="">Temporibus autem quibusdam et aut officiis</li>
                            </ul>
                        </div> <!-- end offcanvas-body-->
                    </div> <!-- end offcanvas-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Offcanvas Placement</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted fs-sm">
                        <code>.offcanvas-start</code> positions the offcanvas on the left, <code>.offcanvas-end</code> on
                        the right, <code>.offcanvas-top</code> displays it from the top, and <code>.offcanvas-bottom</code>
                        displays it from the bottom of the viewport.
                    </p>
                    <div>
                        <div class="d-flex flex-wrap gap-2">
                            <!-- Toggle Top offcanvas -->
                            <button aria-controls="offcanvasTop" class="btn btn-primary" data-bs-target="#offcanvasTop"
                                data-bs-toggle="offcanvas" type="button">Toggle Top offcanvas</button>
                            <!-- Toggle right offcanvas -->
                            <button aria-controls="offcanvasRight" class="btn btn-primary"
                                data-bs-target="#offcanvasRight" data-bs-toggle="offcanvas" type="button">Toggle right
                                offcanvas</button>
                            <!-- Toggle bottom offcanvas -->
                            <button aria-controls="offcanvasBottom" class="btn btn-primary"
                                data-bs-target="#offcanvasBottom" data-bs-toggle="offcanvas" type="button">Toggle bottom
                                offcanvas</button>
                            <!-- Toggle Left offcanvas -->
                            <button aria-controls="offcanvasLeft" class="btn btn-primary mt-2 mt-lg-0"
                                data-bs-target="#offcanvasLeft" data-bs-toggle="offcanvas" type="button">Toggle Left
                                offcanvas</button>
                        </div> <!-- end d-flex flex-wrap gap-2-->
                        <div aria-labelledby="offcanvasTopLabel" class="offcanvas offcanvas-top" id="offcanvasTop"
                            tabindex="-1">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasTopLabel">Offcanvas Top</h5>
                                <button aria-label="Close" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    type="button"></button>
                            </div> <!-- end offcanvas-header-->
                            <div class="offcanvas-body">
                                <div>
                                    Some text as placeholder. In real life you can have the elements you have chosen. Like,
                                    text,
                                    images, lists, etc.
                                </div>
                                <h5 class="mt-3">List</h5>
                                <ul class="ps-3">
                                    <li class="">Nemo enim ipsam voluptatem quia aspernatur</li>
                                    <li class="">Neque porro quisquam est, qui dolorem</li>
                                    <li class="">Quis autem vel eum iure qui in ea</li>
                                </ul>
                            </div> <!-- end offcanvas-body-->
                        </div> <!-- end offcanvas-->
                        <div aria-labelledby="offcanvasRightLabel" class="offcanvas offcanvas-end" id="offcanvasRight"
                            tabindex="-1">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasRightLabel">Offcanvas right</h5>
                                <button aria-label="Close" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    type="button"></button>
                            </div> <!-- end offcanvas-header-->
                            <div class="offcanvas-body">
                                <div>
                                    Some text as placeholder. In real life you can have the elements you have chosen. Like,
                                    text,
                                    images, lists, etc.
                                </div>
                                <h5 class="mt-3">List</h5>
                                <ul class="ps-3">
                                    <li class="">Nemo enim ipsam voluptatem quia aspernatur</li>
                                    <li class="">Neque porro quisquam est, qui dolorem</li>
                                    <li class="">Quis autem vel eum iure qui in ea</li>
                                </ul>
                            </div> <!-- end offcanvas-body-->
                        </div> <!-- end offcanvas-->
                        <div aria-labelledby="offcanvasBottomLabel" class="offcanvas offcanvas-bottom"
                            id="offcanvasBottom" tabindex="-1">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasBottomLabel">Offcanvas bottom</h5>
                                <button aria-label="Close" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    type="button"></button>
                            </div> <!-- end offcanvas-header-->
                            <div class="offcanvas-body">
                                <div>
                                    Some text as placeholder. In real life you can have the elements you have chosen. Like,
                                    text,
                                    images, lists, etc.
                                </div>
                                <h5 class="mt-3">List</h5>
                                <ul class="ps-3">
                                    <li class="">Nemo enim ipsam voluptatem quia aspernatur</li>
                                    <li class="">Neque porro quisquam est, qui dolorem</li>
                                    <li class="">Quis autem vel eum iure qui in ea</li>
                                </ul>
                            </div> <!-- end offcanvas-body-->
                        </div> <!-- end offcanvas-->
                        <div aria-labelledby="offcanvasLeftLabel" class="offcanvas offcanvas-start" id="offcanvasLeft"
                            tabindex="-1">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasLeftLabel">Offcanvas Left</h5>
                                <button aria-label="Close" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    type="button"></button>
                            </div> <!-- end offcanvas-header-->
                            <div class="offcanvas-body">
                                <div>
                                    Some text as placeholder. In real life you can have the elements you have chosen. Like,
                                    text,
                                    images, lists, etc.
                                </div>
                                <h5 class="mt-3">List</h5>
                                <ul class="ps-3">
                                    <li class="">Nemo enim ipsam voluptatem quia aspernatur</li>
                                    <li class="">Neque porro quisquam est, qui dolorem</li>
                                    <li class="">Quis autem vel eum iure qui in ea</li>
                                </ul>
                            </div> <!-- end offcanvas-body-->
                        </div> <!-- end offcanvas-->
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Dark Offcanvas</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted fs-sm">Customize the look of offcanvases using utility classes to suit different
                        themes, such as dark navbars. Add <code>.text-bg-dark</code> to <code>.offcanvas</code> and
                        <code>.btn-close-white</code> to <code>.btn-close</code> for dark styling.</p>
                    <button aria-controls="offcanvasDark" class="btn btn-primary" data-bs-target="#offcanvasDark"
                        data-bs-toggle="offcanvas" type="button">Dark offcanvas</button>
                    <div aria-labelledby="offcanvasDarkLabel" class="offcanvas offcanvas-start text-bg-dark"
                        id="offcanvasDark" tabindex="-1">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasDarkLabel">Dark Offcanvas</h5>
                            <button aria-label="Close" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                type="button"></button>
                        </div> <!-- end offcanvas-header-->
                        <div class="offcanvas-body">
                            <div>
                                Some text as placeholder. In real life you can have the elements you have chosen. Like,
                                text,
                                images, lists, etc.
                            </div>
                            <h5 class="mt-3">List</h5>
                            <ul class="ps-3">
                                <li class="">Nemo enim ipsam voluptatem quia aspernatur</li>
                                <li class="">Neque porro quisquam est, qui dolorem</li>
                                <li class="">Quis autem vel eum iure qui in ea</li>
                            </ul>
                        </div> <!-- end offcanvas-body-->
                    </div> <!-- end offcanvas-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
