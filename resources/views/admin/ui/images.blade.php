@extends('layouts.vertical', ['title' => 'Images & Avatars'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Images'])

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Shapes</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Avatars with different sizes and shapes.
                    </p>
                    <div class="row">
                        <div class="col-sm-2 text-center">
                            <!-- img-fluid -->
                            <img alt="image" class="img-fluid" src="/images/stock/small-1.jpg" />
                            <p class="mb-0 mt-2">
                                <code>.img-fluid</code>
                            </p>
                        </div>
                        <div class="col-sm-2 text-center">
                            <!-- .rounded -->
                            <img alt="image" class="img-fluid rounded" src="/images/stock/small-2.jpg" />
                            <p class="mb-0 mt-2">
                                <code>.rounded</code>
                            </p>
                        </div>
                        <div class="col-sm-2 text-center">
                            <!-- .rounded -->
                            <img alt="image" class="img-fluid rounded" src="/images/users/user-2.jpg" width="120" />
                            <p class="mb-0 mt-2">
                                <code>.rounded</code>
                            </p>
                        </div>
                        <div class="col-sm-2 text-center">
                            <!-- .rounded-circle -->
                            <img alt="image" class="img-fluid rounded-circle" src="/images/users/user-5.jpg"
                                width="120" />
                            <p class="mb-0 mt-2">
                                <code>.rounded-circle</code>
                            </p>
                        </div>
                        <div class="col-sm-2 text-center">
                            <!-- .img-thumbnail -->
                            <img alt="image" class="img-fluid img-thumbnail" src="/images/stock/small-5.jpg" />
                            <p class="mb-0 mt-2">
                                <code>.img-thumbnail</code>
                            </p>
                        </div>
                        <div class="col-sm-2 text-center">
                            <!-- .rounded-circle .img-thumbnail -->
                            <img alt="image" class="img-fluid rounded-circle img-thumbnail"
                                src="/images/users/user-8.jpg" width="120" />
                            <p class="mb-0 mt-2">
                                <code>.rounded-circle .img-thumbnail</code>
                            </p>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card body-->
            </div>
        </div> <!-- end col -->
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Avatar Sizes</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col">
                            <!-- .avatar-xs -->
                            <img alt="image" class="img-fluid avatar-xs rounded" src="/images/users/user-2.jpg" />
                            <p class="mt-2">
                                <code>.avatar-xs</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-xs -->
                            <div class="avatar-xs mx-auto">
                                <span class="avatar-title text-bg-primary rounded">
                                    xs
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-xs</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-xs -->
                            <div class="avatar-xs mx-auto">
                                <span class="avatar-title bg-primary-subtle text-primary rounded">
                                    xs
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-xs</code>
                            </p>
                        </div>
                    </div> <!-- end row-->
                    <div class="row text-center mt-3">
                        <div class="col">
                            <!-- .avatar-sm -->
                            <img alt="image" class="img-fluid avatar-sm rounded" src="/images/users/user-3.jpg" />
                            <p class="mt-2">
                                <code>.avatar-sm</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-sm -->
                            <div class="avatar-sm mx-auto">
                                <span class="avatar-title text-bg-primary rounded">
                                    sm
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-sm</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-sm -->
                            <div class="avatar-sm mx-auto">
                                <span class="avatar-title bg-primary-subtle text-primary rounded">
                                    sm
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-sm</code>
                            </p>
                        </div>
                    </div> <!-- end row-->
                    <div class="row text-center mt-3">
                        <div class="col">
                            <!-- .avatar-md -->
                            <img alt="image" class="img-fluid avatar-md rounded" src="/images/users/user-4.jpg" />
                            <p class="mt-2">
                                <code>.avatar-md</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-md -->
                            <div class="avatar-md mx-auto">
                                <span class="avatar-title text-bg-primary rounded">
                                    md
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-md</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-md -->
                            <div class="avatar-md mx-auto">
                                <span class="avatar-title bg-primary-subtle text-primary rounded">
                                    md
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-md</code>
                            </p>
                        </div>
                    </div> <!-- end row-->
                    <div class="row text-center mt-3">
                        <div class="col">
                            <!-- .avatar-lg -->
                            <img alt="image" class="img-fluid avatar-lg rounded" src="/images/users/user-5.jpg" />
                            <p class="mt-2">
                                <code>.avatar-lg</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-lg -->
                            <div class="avatar-lg mx-auto">
                                <span class="avatar-title text-bg-primary rounded">
                                    LG
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-lg</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-lg -->
                            <div class="avatar-lg mx-auto">
                                <span class="avatar-title bg-primary-subtle text-primary rounded">
                                    LG
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-lg</code>
                            </p>
                        </div>
                    </div> <!-- end row-->
                    <div class="row text-center mt-3">
                        <div class="col">
                            <!-- .avatar-xl -->
                            <img alt="image" class="img-fluid avatar-xl rounded" src="/images/users/user-6.jpg" />
                            <p class="mt-2">
                                <code>.avatar-xl</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-xl -->
                            <div class="avatar-xl mx-auto">
                                <span class="avatar-title text-bg-primary rounded">
                                    XL
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-xl</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-xl -->
                            <div class="avatar-xl mx-auto">
                                <span class="avatar-title bg-primary-subtle text-primary rounded">
                                    XL
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-xl</code>
                            </p>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card body-->
            </div>
        </div> <!-- end col -->
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Avatar Sizes with Rounded</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col">
                            <!-- .avatar-xs -->
                            <img alt="image" class="img-fluid avatar-xs rounded-circle"
                                src="/images/users/user-7.jpg" />
                            <p class="mt-2">
                                <code>.avatar-xs</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-xs -->
                            <div class="avatar-xs mx-auto">
                                <span class="avatar-title text-bg-info rounded-circle">
                                    xs
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-xs</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-xs -->
                            <div class="avatar-xs mx-auto">
                                <span class="avatar-title bg-info-subtle text-info rounded-circle">
                                    xs
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-xs</code>
                            </p>
                        </div>
                    </div> <!-- end row-->
                    <div class="row text-center mt-3">
                        <div class="col">
                            <!-- .avatar-sm -->
                            <img alt="image" class="img-fluid avatar-sm rounded-circle"
                                src="/images/users/user-8.jpg" />
                            <p class="mt-2">
                                <code>.avatar-sm</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-sm -->
                            <div class="avatar-sm mx-auto">
                                <span class="avatar-title text-bg-info rounded-circle">
                                    sm
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-sm</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-sm -->
                            <div class="avatar-sm mx-auto">
                                <span class="avatar-title bg-info-subtle text-info rounded-circle">
                                    sm
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-sm</code>
                            </p>
                        </div>
                    </div> <!-- end row-->
                    <div class="row text-center mt-3">
                        <div class="col">
                            <!-- .avatar-md -->
                            <img alt="image" class="img-fluid avatar-md rounded-circle"
                                src="/images/users/user-9.jpg" />
                            <p class="mt-2">
                                <code>.avatar-md</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-md -->
                            <div class="avatar-md mx-auto">
                                <span class="avatar-title text-bg-info rounded-circle">
                                    md
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-md</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-md -->
                            <div class="avatar-md mx-auto">
                                <span class="avatar-title bg-info-subtle text-info rounded-circle">
                                    md
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-md</code>
                            </p>
                        </div>
                    </div> <!-- end row-->
                    <div class="row text-center mt-3">
                        <div class="col">
                            <!-- .avatar-lg -->
                            <img alt="image" class="img-fluid avatar-lg rounded-circle"
                                src="/images/users/user-10.jpg" />
                            <p class="mt-2">
                                <code>.avatar-lg</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-lg -->
                            <div class="avatar-lg mx-auto">
                                <span class="avatar-title text-bg-info rounded-circle">
                                    LG
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-lg</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-lg -->
                            <div class="avatar-lg mx-auto">
                                <span class="avatar-title bg-info-subtle text-info rounded-circle">
                                    LG
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-lg</code>
                            </p>
                        </div>
                    </div> <!-- end row-->
                    <div class="row text-center mt-3">
                        <div class="col">
                            <!-- .avatar-xl -->
                            <img alt="image" class="img-fluid avatar-xl rounded-circle"
                                src="/images/users/user-1.jpg" />
                            <p class="mt-2">
                                <code>.avatar-xl</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-xl -->
                            <div class="avatar-xl mx-auto">
                                <span class="avatar-title text-bg-info rounded-circle">
                                    XL
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-xl</code>
                            </p>
                        </div>
                        <div class="col">
                            <!-- .avatar-xl -->
                            <div class="avatar-xl mx-auto">
                                <span class="avatar-title bg-info-subtle text-info rounded-circle">
                                    XL
                                </span>
                            </div>
                            <p class="mt-2">
                                <code>.avatar-xl</code>
                            </p>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card body-->
            </div>
        </div> <!-- end col -->
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Avatar Groups</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3">
                            <!-- Default Group -->
                            <div class="avatar-group">
                                <div class="avatar">
                                    <img alt="" class="rounded-circle avatar-sm"
                                        src="/images/users/user-4.jpg" />
                                </div>
                                <div class="avatar">
                                    <img alt="" class="rounded-circle avatar-sm"
                                        src="/images/users/user-5.jpg" />
                                </div>
                                <div class="avatar">
                                    <img alt="" class="rounded-circle avatar-sm"
                                        src="/images/users/user-3.jpg" />
                                </div>
                                <div class="avatar">
                                    <img alt="" class="rounded-circle avatar-sm"
                                        src="/images/users/user-8.jpg" />
                                </div>
                                <div class="avatar">
                                    <img alt="" class="rounded-circle avatar-sm"
                                        src="/images/users/user-2.jpg" />
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-xl-3">
                            <!-- Default Group (Soft) -->
                            <div class="avatar-group">
                                <div class="avatar avatar-md">
                                    <span class="avatar-title text-bg-danger rounded-circle fw-bold">
                                        D
                                    </span>
                                </div>
                                <div class="avatar avatar-md">
                                    <span class="avatar-title text-bg-primary rounded-circle fw-bold">
                                        K
                                    </span>
                                </div>
                                <div class="avatar avatar-md">
                                    <span class="avatar-title text-bg-secondary rounded-circle fw-bold">
                                        H
                                    </span>
                                </div>
                                <div class="avatar avatar-md">
                                    <span class="avatar-title text-bg-warning rounded-circle fw-bold">
                                        L
                                    </span>
                                </div>
                                <div class="avatar avatar-md">
                                    <span class="avatar-title text-bg-info rounded-circle fw-bold">
                                        G
                                    </span>
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-xl-3">
                            <!-- Default Group (Soft) -->
                            <div class="avatar-group">
                                <div class="avatar avatar-lg">
                                    <span class="avatar-title bg-danger-subtle text-danger rounded-circle fw-bold shadow">
                                        D
                                    </span>
                                </div>
                                <div class="avatar avatar-lg">
                                    <span
                                        class="avatar-title bg-primary-subtle text-primary rounded-circle fw-bold shadow">
                                        K
                                    </span>
                                </div>
                                <div class="avatar avatar-lg">
                                    <span
                                        class="avatar-title bg-secondary-subtle text-secondary rounded-circle fw-bold shadow">
                                        H
                                    </span>
                                </div>
                                <div class="avatar avatar-lg">
                                    <span
                                        class="avatar-title bg-warning-subtle text-warning rounded-circle fw-bold shadow">
                                        L
                                    </span>
                                </div>
                                <div class="avatar avatar-lg">
                                    <span class="avatar-title bg-info-subtle text-info rounded-circle fw-bold shadow">
                                        G
                                    </span>
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-xl-3">
                            <!-- Default Group (Soft) -->
                            <div class="avatar-group">
                                <div class="avatar">
                                    <img alt="" class="rounded-circle avatar-xl"
                                        src="/images/users/user-10.jpg" />
                                </div>
                                <div class="avatar avatar-xl">
                                    <span class="avatar-title text-bg-info rounded-circle fs-xl fw-bold">
                                        D
                                    </span>
                                </div>
                                <div class="avatar">
                                    <img alt="" class="rounded-circle avatar-xl"
                                        src="/images/users/user-7.jpg" />
                                </div>
                                <div class="avatar">
                                    <img alt="" class="rounded-circle avatar-xl"
                                        src="/images/users/user-1.jpg" />
                                </div>
                                <div class="avatar avatar-xl">
                                    <span class="avatar-title fs-xl text-bg-danger rounded-circle fw-bold">
                                        9+
                                    </span>
                                </div>
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                </div> <!-- end card body-->
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
