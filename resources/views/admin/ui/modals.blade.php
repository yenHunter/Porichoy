@extends('layouts.vertical', ['title' => 'Modals'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Modals'])

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Bootstrap Modals</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        A rendered modal with header, body, and set of actions in the footer.
                    </p>
                    <!-- Standard modal content -->
                    <div aria-hidden="true" aria-labelledby="standard-modalLabel" class="modal fade" id="standard-modal"
                        role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="standard-modalLabel">Modal Heading</h4>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    <h5>Text in a modal</h5>
                                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                                    <hr />
                                    <h5>Overflowing text to show scroll behavior</h5>
                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                        facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac,
                                        vestibulum at eros.</p>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                                        lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                    <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus
                                        magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper
                                        nulla non metus auctor fringilla.</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
                                    <button class="btn btn-primary" type="button">Save changes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!--  Modal content for the Large example -->
                    <div aria-hidden="true" aria-labelledby="myLargeModalLabel" class="modal fade" id="bs-example-modal-lg"
                        role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <div aria-hidden="true" aria-labelledby="mySmallModalLabel" class="modal fade" id="bs-example-modal-sm"
                        role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="mySmallModalLabel">Small modal</h4>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- Full width modal content -->
                    <div aria-hidden="true" aria-labelledby="fullWidthModalLabel" class="modal fade" id="full-width-modal"
                        role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-full-width">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="fullWidthModalLabel">Modal Heading</h4>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    <h5>Text in a modal</h5>
                                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                                    <hr />
                                    <h5>Overflowing text to show scroll behavior</h5>
                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                        facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac,
                                        vestibulum at eros.</p>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                                        lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                    <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus
                                        magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper
                                        nulla non metus auctor fringilla.</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
                                    <button class="btn btn-primary" type="button">Save changes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- Long Content Scroll Modal -->
                    <div aria-hidden="true" aria-labelledby="scrollableModalTitle" class="modal fade" id="scrollable-modal"
                        role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                        facilisis in, egestas
                                        eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                                        lacus vel augue
                                        laoreet rutrum faucibus dolor auctor.</p>
                                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                                        scelerisque nisl
                                        consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor
                                        fringilla.</p>
                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                        facilisis in, egestas
                                        eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                                        lacus vel augue
                                        laoreet rutrum faucibus dolor auctor.</p>
                                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                                        scelerisque nisl
                                        consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor
                                        fringilla.</p>
                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                        facilisis in, egestas
                                        eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                                        lacus vel augue
                                        laoreet rutrum faucibus dolor auctor.</p>
                                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                                        scelerisque nisl
                                        consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor
                                        fringilla.</p>
                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                        facilisis in, egestas
                                        eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                                        lacus vel augue
                                        laoreet rutrum faucibus dolor auctor.</p>
                                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                                        scelerisque nisl
                                        consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor
                                        fringilla.</p>
                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                        facilisis in, egestas
                                        eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                                        lacus vel augue
                                        laoreet rutrum faucibus dolor auctor.</p>
                                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                                        scelerisque nisl
                                        consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor
                                        fringilla.</p>
                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                        facilisis in, egestas
                                        eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                                        lacus vel augue
                                        laoreet rutrum faucibus dolor auctor.</p>
                                    <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur. Praesent commodo
                                        cursus magna, vel scelerisque nisl
                                        consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor
                                        fringilla.</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal"
                                        type="button">Close</button>
                                    <button class="btn btn-primary" type="button">Save changes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Standard  modal -->
                        <button class="btn btn-primary" data-bs-target="#standard-modal" data-bs-toggle="modal"
                            type="button">Standard Modal</button>
                        <!-- Large modal -->
                        <button class="btn btn-info" data-bs-target="#bs-example-modal-lg" data-bs-toggle="modal"
                            type="button">Large Modal</button>
                        <!-- Small modal -->
                        <button class="btn btn-success" data-bs-target="#bs-example-modal-sm" data-bs-toggle="modal"
                            type="button">Small Modal</button>
                        <!-- Full width modal -->
                        <button class="btn btn-primary" data-bs-target="#full-width-modal" data-bs-toggle="modal"
                            type="button">Full Width Modal</button>
                        <!-- Scrollable modal -->
                        <button class="btn btn-secondary" data-bs-target="#scrollable-modal" data-bs-toggle="modal"
                            type="button">Scrollable Modal</button>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Modal Position</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Specify the position for the modal. You can display modal at top, bottom, or
                        center of page by specifying
                        classes <code>modal-top</code>, <code>modal-bottom</code>and <code>modal-dialog-centered</code>
                        respectively.</p>
                    <!-- Top modal content -->
                    <div aria-hidden="true" class="modal fade" id="top-modal" role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-top">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="topModalLabel">Modal Heading</h4>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="mt-0">Text in a modal</h5>
                                    <p class="mb-0">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
                                    <button class="btn btn-primary" type="button">Save changes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- Bottom modal content -->
                    <div aria-hidden="true" class="modal fade" id="bottom-modal" role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-bottom">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="bottomModalLabel">Modal Heading</h4>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="mt-0">Text in a modal</h5>
                                    <p class="mb-0">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
                                    <button class="btn btn-primary" type="button">Save changes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- Center modal content -->
                    <div aria-hidden="true" class="modal fade" id="centermodal" role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myCenterModalLabel">Center modal</h4>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="mt-0">Overflowing text to show scroll behavior</h5>
                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                        facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac,
                                        vestibulum at eros.</p>
                                    <p class="mb-0">Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                                        Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Top modal -->
                        <button class="btn btn-secondary" data-bs-target="#top-modal" data-bs-toggle="modal"
                            type="button">Top Modal</button>
                        <!-- Bottom modal -->
                        <button class="btn btn-secondary" data-bs-target="#bottom-modal" data-bs-toggle="modal"
                            type="button">Bottom Modal</button>
                        <!-- Center modal -->
                        <button class="btn btn-secondary" data-bs-target="#centermodal" data-bs-toggle="modal"
                            type="button">Center modal</button>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Multiple Modal</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Display a series of modals one by one to guide your users on multiple aspects or
                        take step wise input.</p>
                    <!-- Modal Heading -->
                    <div aria-hidden="true" aria-labelledby="multiple-oneModalLabel" class="modal fade"
                        id="multiple-one" role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="multiple-oneModalLabel">Modal Heading</h4>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="mt-0">Text in a modal</h5>
                                    <p class="mb-0">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-bs-dismiss="modal"
                                        data-bs-target="#multiple-two" data-bs-toggle="modal"
                                        type="button">Next</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- Modal Heading -->
                    <div aria-hidden="true" aria-labelledby="multiple-twoModalLabel" class="modal fade"
                        id="multiple-two" role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="multiple-twoModalLabel">Modal Heading</h4>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="mt-0">Text in a modal</h5>
                                    <p class="mb-0">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-bs-dismiss="modal" type="button">Close</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Multiple modal -->
                        <button class="btn btn-primary" data-bs-target="#multiple-one" data-bs-toggle="modal"
                            type="button">Multiple Modal</button>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Toggle Between Modals</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Toggle between multiple modals with some clever placement of the
                        <code>data-bs-target</code> and <code>data-bs-toggle</code> attributes.</p>
                    <!-- Modal 1-->
                    <div aria-hidden="true" aria-labelledby="exampleModalToggleLabel" class="modal fade"
                        id="exampleModalToggle" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    Show a second modal and hide this one with the button below.
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-bs-dismiss="modal"
                                        data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second
                                        modal</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- Modal 2-->
                    <div aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" class="modal fade"
                        id="exampleModalToggle2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    Hide this modal and show the first with the button below.
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-bs-dismiss="modal"
                                        data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <a class="btn btn-secondary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open
                        first modal</a>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Fullscreen Modal</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Another override is the option to pop up a modal that covers the user viewport,
                        available via modifier classes that are placed on a <code>.modal-dialog</code></p>
                    <div class="hstack gap-2 flex-wrap">
                        <!-- Fullscreen Modal -->
                        <button class="btn btn-primary" data-bs-target="#fullscreeexampleModal" data-bs-toggle="modal"
                            type="button"> Fullscreen Modal</button>
                        <!-- Full Screen Below sm -->
                        <button class="btn btn-primary" data-bs-target="#exampleModalFullscreenSm" data-bs-toggle="modal"
                            type="button">Full Screen Below sm</button>
                        <!-- Full Screen Below md -->
                        <button class="btn btn-primary" data-bs-target="#exampleModalFullscreenMd" data-bs-toggle="modal"
                            type="button">Full Screen Below md</button>
                        <!-- Full Screen Below lg -->
                        <button class="btn btn-primary" data-bs-target="#exampleModalFullscreenLg" data-bs-toggle="modal"
                            type="button">Full Screen Below lg</button>
                        <!-- Full Screen Below xl -->
                        <button class="btn btn-primary" data-bs-target="#exampleModalFullscreenXl" data-bs-toggle="modal"
                            type="button">Full Screen Below xl</button>
                        <!-- Full Screen Below xxl -->
                        <button class="btn btn-primary" data-bs-target="#exampleModalFullscreenXxl"
                            data-bs-toggle="modal" type="button">Full Screen Below xxl</button>
                    </div>
                    <!-- Full Screen Modal -->
                    <div aria-hidden="true" aria-labelledby="fullscreeexampleModalLabel" class="modal fade"
                        id="fullscreeexampleModal" tabindex="-1">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="fullscreeexampleModalLabel">Full Screen Modal</h5>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-light" data-bs-dismiss="modal" href="javascript:void(0);">Close</a>
                                    <button class="btn btn-primary" type="button">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Full screen below sm -->
                    <div aria-hidden="true" aria-labelledby="exampleModalFullscreenSmLabel" class="modal fade"
                        id="exampleModalFullscreenSm" tabindex="-1">
                        <div class="modal-dialog modal-fullscreen-sm-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalFullscreenSmLabel">Full screen below sm</h5>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-light" data-bs-dismiss="modal" href="javascript:void(0);">Close</a>
                                    <button class="btn btn-primary" type="button">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Full screen below md -->
                    <div aria-hidden="true" aria-labelledby="exampleModalFullscreenMdLabel" class="modal fade"
                        id="exampleModalFullscreenMd" tabindex="-1">
                        <div class="modal-dialog modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalFullscreenMdLabel">Full screen below md</h5>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-light" data-bs-dismiss="modal" href="javascript:void(0);">Close</a>
                                    <button class="btn btn-primary" type="button">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Full screen below lg -->
                    <div aria-hidden="true" aria-labelledby="exampleModalFullscreenLgLabel" class="modal fade"
                        id="exampleModalFullscreenLg" tabindex="-1">
                        <div class="modal-dialog modal-fullscreen-lg-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalFullscreenLgLabel">Full screen below lg</h5>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-light" data-bs-dismiss="modal" href="javascript:void(0);">Close</a>
                                    <button class="btn btn-primary" type="button">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Full screen below xl -->
                    <div aria-hidden="true" aria-labelledby="exampleModalFullscreenXlLabel" class="modal fade"
                        id="exampleModalFullscreenXl" tabindex="-1">
                        <div class="modal-dialog modal-fullscreen-sm-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalFullscreenXlLabel">Full screen below xl</h5>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-light" data-bs-dismiss="modal" href="javascript:void(0);">Close</a>
                                    <button class="btn btn-primary" type="button">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Full screen below xxl -->
                    <div aria-hidden="true" aria-labelledby="exampleModalFullscreenXxlLabel" class="modal fade"
                        id="exampleModalFullscreenXxl" tabindex="-1">
                        <div class="modal-dialog modal-fullscreen-xxl-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalFullscreenXxlLabel">Full screen below xxl</h5>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-light" data-bs-dismiss="modal" href="javascript:void(0);">Close</a>
                                    <button class="btn btn-primary" type="button">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Static Backdrop</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">When backdrop is set to static, the modal will not close when clicking outside
                        it. Click the button below to try it.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Static Backdrop modal -->
                        <button class="btn btn-info" data-bs-target="#staticBackdrop" data-bs-toggle="modal"
                            type="button">
                            Static Backdrop
                        </button>
                    </div> <!-- btn list -->
                    <!-- Modal -->
                    <div aria-hidden="true" aria-labelledby="staticBackdropLabel" class="modal fade"
                        data-bs-backdrop="static" data-bs-keyboard="false" id="staticBackdrop" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div> <!-- end modal header -->
                                <div class="modal-body">
                                    <p class="m-0">I will not close if you click outside me. Don't even try to press
                                        escape key.</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal"
                                        type="button">Close</button>
                                    <button class="btn btn-primary" type="button">Understood</button>
                                </div> <!-- end modal footer -->
                            </div> <!-- end modal content-->
                        </div> <!-- end modal dialog-->
                    </div> <!-- end modal-->
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Varying Modal Content</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Have a bunch of buttons that all trigger the same modal with slightly different
                        contents? Use
                        <code>event.relatedTarget</code> and <a
                            href="https://developer.mozilla.org/en-US/docs/Learn/HTML/Howto/Use_data_attributes"
                            target="_blank">HTML <code>data-bs-*</code>
                            attributes</a> to vary the contents of the modal depending on which button was clicked.
                    </p>
                    <div class="hstack gap-2 flex-wrap">
                        <button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal"
                            data-bs-whatever="@mdo" type="button">Open modal for @mdo</button>
                        <button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal"
                            data-bs-whatever="@fat" type="button">Open modal for @fat</button>
                        <button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal"
                            data-bs-whatever="@getbootstrap" type="button">Open modal for @getbootstrap</button>
                    </div>
                    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal"
                        tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                        type="button"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Recipient:</label>
                                            <input class="form-control" id="recipient-name" type="text" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label" for="message-text">Message:</label>
                                            <textarea class="form-control" id="message-text"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal"
                                        type="button">Close</button>
                                    <button class="btn btn-primary" type="button">Send message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
