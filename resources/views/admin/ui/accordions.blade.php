@extends('layouts.vertical', ['title' => 'Accordions'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Accordions'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Default Accordions</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button aria-controls="collapseOne" aria-expanded="true" class="accordion-button"
                                    data-bs-target="#collapseOne" data-bs-toggle="collapse" type="button">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div aria-labelledby="headingOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample" id="collapseOne">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the overall
                                    appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                    this with
                                    custom CSS or overriding our default variables. It's also worth noting that just about
                                    any HTML can go
                                    within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button aria-controls="collapseTwo" aria-expanded="false" class="accordion-button collapsed"
                                    data-bs-target="#collapseTwo" data-bs-toggle="collapse" type="button">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div aria-labelledby="headingTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample" id="collapseTwo">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the overall
                                    appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                    this with
                                    custom CSS or overriding our default variables. It's also worth noting that just about
                                    any HTML can go
                                    within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button aria-controls="collapseThree" aria-expanded="false"
                                    class="accordion-button collapsed" data-bs-target="#collapseThree"
                                    data-bs-toggle="collapse" type="button">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div aria-labelledby="headingThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample" id="collapseThree">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the overall
                                    appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                    this with
                                    custom CSS or overriding our default variables. It's also worth noting that just about
                                    any HTML can go
                                    within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Flush Accordions</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button aria-controls="flush-collapseOne" aria-expanded="false" class="accordion-button"
                                    data-bs-target="#flush-collapseOne" data-bs-toggle="collapse" type="button">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div aria-labelledby="flush-headingOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionFlushExample" id="flush-collapseOne">
                                <div class="accordion-body">
                                    <p class="m-0">Placeholder content for this accordion, which is intended to
                                        demonstrate the
                                        <code>.accordion-flush</code> class. This is the first item's accordion body.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button aria-controls="flush-collapseTwo" aria-expanded="false"
                                    class="accordion-button collapsed" data-bs-target="#flush-collapseTwo"
                                    data-bs-toggle="collapse" type="button">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div aria-labelledby="flush-headingTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample" id="flush-collapseTwo">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                    demonstrate the
                                    <code>.accordion-flush</code> class. This is the second item's accordion body. Let's
                                    imagine this being
                                    filled with some actual content.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button aria-controls="flush-collapseThree" aria-expanded="false"
                                    class="accordion-button collapsed" data-bs-target="#flush-collapseThree"
                                    data-bs-toggle="collapse" type="button">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div aria-labelledby="flush-headingThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample" id="flush-collapseThree">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                    demonstrate the
                                    <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing
                                    more exciting
                                    happening here in terms of content, but just filling up the space to make it look, at
                                    least at first
                                    glance, a bit more representative of how this would look in a real-world application.
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Always Open Accordions</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button aria-controls="panelsStayOpen-collapseOne" aria-expanded="true"
                                    class="accordion-button" data-bs-target="#panelsStayOpen-collapseOne"
                                    data-bs-toggle="collapse" type="button">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div aria-labelledby="panelsStayOpen-headingOne" class="accordion-collapse collapse show"
                                id="panelsStayOpen-collapseOne">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the
                                    overall appearance, as well as the showing and hiding via CSS transitions. You can
                                    modify any of
                                    this with custom CSS or overriding our default variables. It's also worth noting that
                                    just about any
                                    HTML can go within the <code>.accordion-body</code>, though the transition does limit
                                    overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button aria-controls="panelsStayOpen-collapseTwo" aria-expanded="false"
                                    class="accordion-button collapsed" data-bs-target="#panelsStayOpen-collapseTwo"
                                    data-bs-toggle="collapse" type="button">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div aria-labelledby="panelsStayOpen-headingTwo" class="accordion-collapse collapse"
                                id="panelsStayOpen-collapseTwo">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until the
                                    collapse plugin adds the appropriate classes that we use to style each element. These
                                    classes
                                    control the overall appearance, as well as the showing and hiding via CSS transitions.
                                    You can
                                    modify any of this with custom CSS or overriding our default variables. It's also worth
                                    noting that
                                    just about any HTML can go within the <code>.accordion-body</code>, though the
                                    transition does limit
                                    overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button aria-controls="panelsStayOpen-collapseThree" aria-expanded="false"
                                    class="accordion-button collapsed" data-bs-target="#panelsStayOpen-collapseThree"
                                    data-bs-toggle="collapse" type="button">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div aria-labelledby="panelsStayOpen-headingThree" class="accordion-collapse collapse"
                                id="panelsStayOpen-collapseThree">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                    the
                                    collapse plugin adds the appropriate classes that we use to style each element. These
                                    classes
                                    control the overall appearance, as well as the showing and hiding via CSS transitions.
                                    You can
                                    modify any of this with custom CSS or overriding our default variables. It's also worth
                                    noting that
                                    just about any HTML can go within the <code>.accordion-body</code>, though the
                                    transition does limit
                                    overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Accordion Without Arrow </h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="accordion accordion-arrow-none" id="withoutarrowaccordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="withoutarrowheadingOne">
                                <button aria-controls="withoutarrowcollapseOne" aria-expanded="true"
                                    class="accordion-button" data-bs-target="#withoutarrowcollapseOne"
                                    data-bs-toggle="collapse" type="button">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div aria-labelledby="withoutarrowheadingOne" class="accordion-collapse collapse show"
                                data-bs-parent="#withoutarrowaccordionExample" id="withoutarrowcollapseOne">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the overall
                                    appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                    this with
                                    custom CSS or overriding our default variables. It's also worth noting that just about
                                    any HTML can go
                                    within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="withoutarrowheadingTwo">
                                <button aria-controls="withoutarrowcollapseTwo" aria-expanded="false"
                                    class="accordion-button collapsed" data-bs-target="#withoutarrowcollapseTwo"
                                    data-bs-toggle="collapse" type="button">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div aria-labelledby="withoutarrowheadingTwo" class="accordion-collapse collapse"
                                data-bs-parent="#withoutarrowaccordionExample" id="withoutarrowcollapseTwo">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the overall
                                    appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                    this with
                                    custom CSS or overriding our default variables. It's also worth noting that just about
                                    any HTML can go
                                    within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="withoutarrowheadingThree">
                                <button aria-controls="withoutarrowcollapseThree" aria-expanded="false"
                                    class="accordion-button collapsed" data-bs-target="#withoutarrowcollapseThree"
                                    data-bs-toggle="collapse" type="button">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div aria-labelledby="withoutarrowheadingThree" class="accordion-collapse collapse"
                                data-bs-parent="#withoutarrowaccordionExample" id="withoutarrowcollapseThree">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the overall
                                    appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                    this with
                                    custom CSS or overriding our default variables. It's also worth noting that just about
                                    any HTML can go
                                    within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Bordered Accordions</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="accordion accordion-bordered" id="BorderedaccordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="BorderedheadingOne">
                                <button aria-controls="BorderedcollapseOne" aria-expanded="true" class="accordion-button"
                                    data-bs-target="#BorderedcollapseOne" data-bs-toggle="collapse" type="button">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div aria-labelledby="BorderedheadingOne" class="accordion-collapse collapse show"
                                data-bs-parent="#BorderedaccordionExample" id="BorderedcollapseOne">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the overall
                                    appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                    this with
                                    custom CSS or overriding our default variables. It's also worth noting that just about
                                    any HTML can go
                                    within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="BorderedheadingTwo">
                                <button aria-controls="BorderedcollapseTwo" aria-expanded="false"
                                    class="accordion-button collapsed" data-bs-target="#BorderedcollapseTwo"
                                    data-bs-toggle="collapse" type="button">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div aria-labelledby="BorderedheadingTwo" class="accordion-collapse collapse"
                                data-bs-parent="#BorderedaccordionExample" id="BorderedcollapseTwo">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the overall
                                    appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                    this with
                                    custom CSS or overriding our default variables. It's also worth noting that just about
                                    any HTML can go
                                    within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="BorderedheadingThree">
                                <button aria-controls="BorderedcollapseThree" aria-expanded="false"
                                    class="accordion-button collapsed" data-bs-target="#BorderedcollapseThree"
                                    data-bs-toggle="collapse" type="button">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div aria-labelledby="BorderedheadingThree" class="accordion-collapse collapse"
                                data-bs-parent="#BorderedaccordionExample" id="BorderedcollapseThree">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the overall
                                    appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                    this with
                                    custom CSS or overriding our default variables. It's also worth noting that just about
                                    any HTML can go
                                    within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Custom Icon Accordion</h4>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="accordion accordion-custom-icon accordion-arrow-none" id="CustomIconaccordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="CustomIconheadingOne">
                                <button aria-controls="CustomIconcollapseOne" aria-expanded="true"
                                    class="accordion-button" data-bs-target="#CustomIconcollapseOne"
                                    data-bs-toggle="collapse" type="button">
                                    Accordion item with tabler icons
                                    <i class="ti ti-plus accordion-icon accordion-icon-on"></i>
                                    <i class="ti ti-minus accordion-icon accordion-icon-off"></i>
                                </button>
                            </h2>
                            <div aria-labelledby="CustomIconheadingOne" class="accordion-collapse collapse show"
                                data-bs-parent="#CustomIconaccordionExample" id="CustomIconcollapseOne">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the overall
                                    appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                    this with
                                    custom CSS or overriding our default variables. It's also worth noting that just about
                                    any HTML can go
                                    within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="CustomIconheadingTwo">
                                <button aria-controls="CustomIconcollapseTwo" aria-expanded="false"
                                    class="accordion-button collapsed" data-bs-target="#CustomIconcollapseTwo"
                                    data-bs-toggle="collapse" type="button">
                                    Accordion item with lucid icons
                                    <i class="accordion-icon accordion-icon-on avatar-xxs me-n1"
                                        data-lucide="plus-circle"></i>
                                    <i class="accordion-icon accordion-icon-off avatar-xxs me-n1"
                                        data-lucide="minus-circle"></i>
                                </button>
                            </h2>
                            <div aria-labelledby="CustomIconheadingTwo" class="accordion-collapse collapse"
                                data-bs-parent="#CustomIconaccordionExample" id="CustomIconcollapseTwo">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the overall
                                    appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                    this with
                                    custom CSS or overriding our default variables. It's also worth noting that just about
                                    any HTML can go
                                    within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="CustomIconheadingThree">
                                <button aria-controls="CustomIconcollapseThree" aria-expanded="false"
                                    class="accordion-button collapsed" data-bs-target="#CustomIconcollapseThree"
                                    data-bs-toggle="collapse" type="button">
                                    Accordion item with tabler icons
                                    <i class="ti ti-arrow-down accordion-icon accordion-icon-on"></i>
                                    <i class="ti ti-arrow-up accordion-icon accordion-icon-off"></i>
                                </button>
                            </h2>
                            <div aria-labelledby="CustomIconheadingThree" class="accordion-collapse collapse"
                                data-bs-parent="#CustomIconaccordionExample" id="CustomIconcollapseThree">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the overall
                                    appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                    this with
                                    custom CSS or overriding our default variables. It's also worth noting that just about
                                    any HTML can go
                                    within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
@endsection

@section('scripts')
@endsection
