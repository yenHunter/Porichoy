@extends('layouts.vertical', ['title' => 'Pagination'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Pagination'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Default Pagination</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted fs-sm">Use <code>.pagination</code> inside <code>&lt;nav&gt;</code> for accessible,
                        easy-to-click page links.</p>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination mb-0">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Alignment</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted fs-sm">Align pagination using flexbox utilities, such as
                        <code>.justify-content-center</code> to center it.</p>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript: void(0);" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);">Next</a>
                            </li>
                        </ul>
                    </nav>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript: void(0);" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div> <!-- end card body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Custom Color Pagination</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted fs-sm">Add classes like <code>.pagination-primary</code>,
                        <code>.pagination-info</code>, or <code>.pagination-secondary</code> to customize pagination color.
                    </p>
                    <nav>
                        <ul class="pagination pagination-boxed pagination-info">
                            <li class="page-item">
                                <a aria-label="Previous" class="page-link" href="javascript: void(0);">
                                    <i class="ti ti-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a aria-label="Next" class="page-link" href="javascript: void(0);">
                                    <i class="ti ti-chevron-right align-middle"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <nav>
                        <ul class="pagination pagination-boxed pagination-secondary mb-0">
                            <li class="page-item">
                                <a aria-label="Previous" class="page-link" href="javascript: void(0);">
                                    <i data-lucide="arrow-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a aria-label="Next" class="page-link" href="javascript: void(0);">
                                    <i data-lucide="arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> <!-- end card body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Disabled and active states</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted fs-sm">Add <code>.disabled</code> and <code>tabindex="-1"</code> to
                        <code>.page-item</code> to make it non-interactive.</p>
                    <nav aria-label="...">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li aria-current="page" class="page-item active">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div> <!-- end card body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Custom Icon Pagination</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted fs-sm">Add icons like <code>&lt;i class="ti ti-chevron-**"&gt;&lt;/i&gt;</code>
                        or SVGs inside <code>.page-link</code> for custom pagination arrows.</p>
                    <nav>
                        <ul class="pagination pagination-boxed">
                            <li class="page-item">
                                <a aria-label="Previous" class="page-link" href="javascript: void(0);">
                                    <i class="ti ti-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a aria-label="Next" class="page-link" href="javascript: void(0);">
                                    <i class="ti ti-chevron-right align-middle"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <nav>
                        <ul class="pagination pagination-boxed mb-0">
                            <li class="page-item">
                                <a aria-label="Previous" class="page-link" href="javascript: void(0);">
                                    <i data-lucide="arrow-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a aria-label="Next" class="page-link" href="javascript: void(0);">
                                    <i data-lucide="arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Sizing</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted fs-sm">Use <code>.pagination-lg</code> or <code>.pagination-sm</code> to change
                        pagination size.</p>
                    <nav>
                        <ul class="pagination pagination-lg">
                            <li class="page-item">
                                <a aria-label="Previous" class="page-link" href="javascript: void(0);">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item">
                                <a aria-label="Next" class="page-link" href="javascript: void(0);">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item">
                                <a aria-label="Previous" class="page-link" href="javascript: void(0);">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item">
                                <a aria-label="Next" class="page-link" href="javascript: void(0);">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> <!-- end card body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Boxed Pagination</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted fs-sm">Use <code>.pagination-boxed</code> with <code>.pagination</code> to give
                        pagination items a boxed appearance.</p>
                    <nav>
                        <ul class="pagination pagination-boxed">
                            <li class="page-item">
                                <a aria-label="Previous" class="page-link" href="javascript: void(0);">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a aria-label="Next" class="page-link" href="javascript: void(0);">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="pagination pagination-lg pagination-boxed">
                            <li class="page-item">
                                <a aria-label="Previous" class="page-link" href="javascript: void(0);">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a aria-label="Next" class="page-link" href="javascript: void(0);">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="pagination pagination-sm pagination-boxed mb-0">
                            <li class="page-item">
                                <a aria-label="Previous" class="page-link" href="javascript: void(0);">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a aria-label="Next" class="page-link" href="javascript: void(0);">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> <!-- end preview code -->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Rounded Pagination</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted fs-sm">Use <code>.pagination-rounded</code> with <code>.pagination</code> to
                        create rounded pagination links.</p>
                    <nav>
                        <ul class="pagination pagination-rounded pagination-boxed mb-0">
                            <li class="page-item">
                                <a aria-label="Previous" class="page-link" href="javascript: void(0);">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a aria-label="Next" class="page-link" href="javascript: void(0);">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> <!-- end card body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Soft Pagination</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted fs-sm">Use <code>.pagination-soft-**</code> with <code>.pagination</code> for a
                        soft-colored pagination style.</p>
                    <nav>
                        <ul class="pagination pagination-soft-danger pagination-boxed mb-0">
                            <li class="page-item">
                                <a aria-label="Previous" class="page-link" href="javascript: void(0);">
                                    <i class="ti ti-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a aria-label="Next" class="page-link" href="javascript: void(0);">
                                    <i class="ti ti-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> <!-- end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
