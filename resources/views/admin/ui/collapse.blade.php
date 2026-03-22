@extends('layouts.vertical', ['title' => 'Collapse'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Collapse'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Collapse</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p>
                        <a aria-controls="collapseExample" aria-expanded="false" class="btn btn-primary"
                            data-bs-toggle="collapse" href="#collapseExample">
                            Link with href
                        </a>
                        <button aria-controls="collapseExample" aria-expanded="false" class="btn btn-primary ms-1"
                            data-bs-target="#collapseExample" data-bs-toggle="collapse" type="button">
                            Button with data-bs-target
                        </button>
                    </p>
                    <div class="collapse show" id="collapseExample">
                        <div class="card border border-dashed border-light card-body mb-0">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                            accusamus terry
                            richardson ad squid. Nihil anim keffiyeh helvetica, craft beer
                            labore wes
                            anderson cred nesciunt sapiente ea proident.
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Multiple Targets</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <a aria-controls="multiCollapseExample1" aria-expanded="false" class="btn btn-primary"
                            data-bs-toggle="collapse" href="#multiCollapseExample1" role="button">Toggle first element</a>
                        <button aria-controls="multiCollapseExample2" aria-expanded="false" class="btn btn-primary"
                            data-bs-target="#multiCollapseExample2" data-bs-toggle="collapse" type="button">Toggle second
                            element</button>
                        <button aria-controls="multiCollapseExample1 multiCollapseExample2" aria-expanded="false"
                            class="btn btn-primary" data-bs-target=".multi-collapse" data-bs-toggle="collapse"
                            type="button">Toggle both elements</button>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card border border-dashed border-light card-body mb-0">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                    squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident.
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapseExample2">
                                <div class="card border border-dashed border-light card-body mb-0">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                    squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident.
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Collapse Horizontal</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p>
                        <button aria-controls="collapseWidthExample" aria-expanded="false" class="btn btn-primary"
                            data-bs-target="#collapseWidthExample" data-bs-toggle="collapse" type="button">
                            Toggle width collapse
                        </button>
                    </p>
                    <div style="height: 100px;">
                        <div class="collapse collapse-horizontal" id="collapseWidthExample">
                            <div class="card border border-dashed border-light card-body mb-0" style="width: 300px;">
                                This is some placeholder content for a horizontal collapse. It's hidden by default and shown
                                when triggered.
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')
@endsection
