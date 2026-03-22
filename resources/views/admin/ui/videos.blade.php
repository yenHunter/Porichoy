@extends('layouts.vertical', ['title' => 'Embed Videos'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Videos'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Responsive embed video 21:9</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- 21:9 aspect ratio -->
                    <div class="ratio ratio-21x9">
                        <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Responsive embed video 1:1</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- 21:9 aspect ratio -->
                    <div class="ratio ratio-1x1">
                        <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Responsive embed video 16:9</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- 21:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Responsive embed video 4:3</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- 21:9 aspect ratio -->
                    <div class="ratio ratio-4x3">
                        <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
