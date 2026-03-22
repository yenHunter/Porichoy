@extends('layouts.vertical', ['title' => 'Progress'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Progress'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Examples</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">A progress bar can be used to show a user how far along he/she is in a process.
                    </p>
                    <div class="progress mb-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" class="progress-bar"
                            role="progressbar"></div>
                    </div>
                    <div class="progress mb-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar"
                            role="progressbar" style="width: 25%"></div>
                    </div>
                    <div class="progress mb-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar"
                            role="progressbar" style="width: 50%"></div>
                    </div>
                    <div class="progress mb-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" class="progress-bar"
                            role="progressbar" style="width: 75%"></div>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" class="progress-bar"
                            role="progressbar" style="width: 100%"></div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Height</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">We only set a <code>height</code> value on the <code>.progress</code>, so if you
                        change that value the inner <code>.progress-bar</code> will automatically resize accordingly.
                        Use
                        <code>.progress-sm</code>,<code>.progress-md</code>,<code>.progress-lg</code>,<code>.progress-xl</code>
                        classes.</p>
                    <div class="progress mb-2" style="height: 1px;">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar bg-danger"
                            role="progressbar" style="width: 25%;"></div>
                    </div>
                    <div class="progress mb-2" style="height: 3px;">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar"
                            role="progressbar" style="width: 25%; height: 20px;"></div>
                    </div>
                    <div class="progress mb-2 progress-sm">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar bg-success"
                            role="progressbar" style="width: 25%"></div>
                    </div>
                    <div class="progress mb-2 progress-md">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar bg-info"
                            role="progressbar" style="width: 50%"></div>
                    </div>
                    <div class="progress progress-lg mb-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" class="progress-bar bg-warning"
                            role="progressbar" style="width: 75%"></div>
                    </div>
                    <div class="progress progress-xl">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="38" class="progress-bar bg-success"
                            role="progressbar" style="width: 38%"></div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Multiple Bars</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Include multiple progress bars in a progress component if you need.</p>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="15" class="progress-bar"
                            role="progressbar" style="width: 15%"></div>
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="30" class="progress-bar bg-success"
                            role="progressbar" style="width: 30%"></div>
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" class="progress-bar bg-info"
                            role="progressbar" style="width: 20%"></div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Animated Stripes</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">The striped gradient can also be animated. Add
                        <code>.progress-bar-animated</code> to <code>.progress-bar</code> to animate the stripes right to
                        left via CSS3 animations.</p>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="75"
                            class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                            style="width: 75%"></div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Labels</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add labels to your progress bars by placing text within the
                        <code>.progress-bar</code>.</p>
                    <div class="progress mb-3">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar"
                            role="progressbar" style="width: 25%;">25%</div>
                    </div>
                    <div aria-label="Example with label" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                        class="progress" role="progressbar">
                        <div class="progress-bar overflow-visible text-dark" style="width: 10%">Long label text for the
                            progress bar, set to a dark color</div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Backgrounds</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use background utility classes to change the appearance of individual progress
                        bars.</p>
                    <div class="progress mb-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar bg-success"
                            role="progressbar" style="width: 25%"></div>
                    </div>
                    <div class="progress mb-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar bg-info"
                            role="progressbar" style="width: 50%"></div>
                    </div>
                    <div class="progress mb-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" class="progress-bar bg-warning"
                            role="progressbar" style="width: 75%"></div>
                    </div>
                    <div class="progress mb-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" class="progress-bar bg-danger"
                            role="progressbar" style="width: 100%"></div>
                    </div>
                    <div class="progress mb-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" class="progress-bar bg-dark"
                            role="progressbar" style="width: 65%"></div>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar bg-secondary"
                            role="progressbar" style="width: 50%"></div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Striped</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add <code>.progress-bar-striped</code> to any <code>.progress-bar</code> to apply
                        a stripe via CSS gradient over the progress bar’s background color.</p>
                    <div class="progress mb-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                            class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%"></div>
                    </div>
                    <div class="progress mb-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25"
                            class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%">
                        </div>
                    </div>
                    <div class="progress mb-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50"
                            class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%">
                        </div>
                    </div>
                    <div class="progress mb-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="75"
                            class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%">
                        </div>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="100"
                            class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%">
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Steps</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="position-relative m-4">
                        <div class="progress" style="height: 2px;">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar"
                                role="progressbar" style="width: 50%;"></div>
                        </div>
                        <button
                            class="position-absolute top-0 start-0 translate-middle btn btn-icon btn-primary rounded-pill"
                            type="button">1</button>
                        <button
                            class="position-absolute top-0 start-50 translate-middle btn btn-icon btn-primary rounded-pill"
                            type="button">2</button>
                        <button
                            class="position-absolute top-0 start-100 translate-middle btn btn-icon btn-light rounded-pill"
                            type="button">3</button>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
