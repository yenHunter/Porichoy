@extends('layouts.vertical', ['title' => 'Lucide Icons'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Icons', 'title' => 'Lucide'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-block">
                    <h4 class="card-title mb-1 d-flex align-items-center gap-2">
                        <i class="fs-xl" data-lucide="layout-dashboard"></i> Overview
                    </h4>
                    <p class="mb-0 text-muted">Lucide is an open-source library of clean, scalable SVG icons for web and app
                        development, offering easy integration and customization.</p>
                </div>
                <div class="card-body">
                    <h4 class="mt-0 fs-base mb-1">Usage</h4>
                    <code>&lt;i data-lucide="xxx"&gt;&lt;/i&gt;</code>
                    <div class="d-flex align-items-center gap-2 mt-3">
                        <i class="fs-3" data-lucide="camera"></i>
                        <i class="fs-3" data-lucide="heart"></i>
                        <i class="fs-3" data-lucide="star"></i>
                        <i class="fs-3" data-lucide="check"></i>
                        <i class="fs-3" data-lucide="bell"></i>
                        <i class="fs-3" data-lucide="cloud"></i>
                        <i class="fs-3" data-lucide="user"></i>
                    </div>
                </div> <!-- end card-body-->
                <div class="card-body border-top border-dashed">
                    <h4 class="mt-0 fs-base mb-1">Colors</h4>
                    <code>&lt;i data-lucide="xxx" class="text-xx"&gt;&lt;/i&gt;</code>
                    <div class="d-flex align-items-center gap-2 mt-3">
                        <i class="fs-3 text-primary" data-lucide="home"></i>
                        <i class="fs-3 text-secondary" data-lucide="settings"></i>
                        <i class="fs-3 text-success" data-lucide="calendar"></i>
                        <i class="fs-3 text-info" data-lucide="message-circle"></i>
                        <i class="fs-3 text-warning" data-lucide="flag"></i>
                        <i class="fs-3 text-danger" data-lucide="folder"></i>
                        <i class="fs-3 text-light" data-lucide="globe"></i>
                        <i class="fs-3 text-dark" data-lucide="key"></i>
                        <i class="fs-3 text-purple" data-lucide="layers"></i>
                    </div>
                </div>
                <div class="card-body border-top border-dashed">
                    <h4 class="mt-0 fs-base mb-1">Fill Colors</h4>
                    <code>&lt;i data-lucide="xxx" class="text-xx fill-xx"&gt;&lt;/i&gt;</code>
                    <div class="d-flex align-items-center gap-2 mt-3">
                        <i class="fs-3 text-primary fill-primary" data-lucide="star"></i>
                        <i class="fs-3 text-secondary fill-secondary" data-lucide="user"></i>
                        <i class="fs-3 text-success fill-success" data-lucide="check-circle"></i>
                        <i class="fs-3 text-info fill-info" data-lucide="bell"></i>
                        <i class="fs-3 text-warning fill-warning" data-lucide="alert-triangle"></i>
                        <i class="fs-3 text-danger fill-danger" data-lucide="file-text"></i>
                        <i class="fs-3 text-light fill-light" data-lucide="airplay"></i>
                        <i class="fs-3 text-dark fill-dark" data-lucide="lock"></i>
                        <i class="fs-3 text-purple fill-purple" data-lucide="database"></i>
                    </div>
                </div>
                <div class="card-body border-top border-dashed">
                    <h4 class="mt-0 fs-base mb-1">Sizes</h4>
                    <code>&lt;i class="ti ti-xxxx fs-xx"&gt;&lt;/i&gt;</code>
                    <div class="d-flex align-items-center gap-2 mt-3">
                        <i class="fs-1" data-lucide="phone"></i>
                        <i class="fs-2" data-lucide="badge-dollar-sign"></i>
                        <i class="fs-3" data-lucide="monitor"></i>
                        <i class="fs-4" data-lucide="tablet"></i>
                        <i class="fs-5" data-lucide="gamepad-2"></i>
                        <i class="fs-6" data-lucide="watch"></i>
                    </div>
                    <div class="d-flex align-items-center gap-2 mt-3">
                        <i data-lucide="watch"></i>
                        <i class="fs-sm" data-lucide="watch"></i>
                        <i class="fs-lg" data-lucide="watch"></i>
                        <i class="fs-xl" data-lucide="watch"></i>
                        <i class="fs-xxl" data-lucide="watch"></i>
                        <i class="fs-24" data-lucide="watch"></i>
                        <i class="fs-32" data-lucide="watch"></i>
                        <i class="fs-36" data-lucide="watch"></i>
                        <i class="fs-42" data-lucide="watch"></i>
                        <i class="fs-60" data-lucide="watch"></i>
                    </div>
                </div> <!-- end card-body-->
                <div class="card-body border-top border-dashed">
                    <h4 class="mt-0 mb-3">Icons</h4>
                    <div class="d-flex flex-wrap align-items-center text-center gap-2">
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="phone"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Phone</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="badge-percent"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Ad 2</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="headphones"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Headphones</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="camera"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Camera</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="watch"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Watch</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="mic"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Microphone</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="headset"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Headset</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="tablet"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Tablet</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="gamepad-2"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Gamepad</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="printer"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Printer</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="speaker"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Speaker</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="database"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Database</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="cloud"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Cloud</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="wifi"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Wi-Fi</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="bluetooth"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Bluetooth</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="usb"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">USB</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="folder"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Folder</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="lock"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Lock</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="key"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Key</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="shield"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Shield</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="paperclip"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Paperclip</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="bell"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Bell</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="search"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Search</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="briefcase"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Briefcase</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="shopping-cart"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Cart</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="file"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">File</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="book"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Book</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="mail"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Mail</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="user"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">User</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="user-circle"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">User Circle</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="phone"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Phone Call</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="music"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Music</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="film"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Movie</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="upload"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Upload</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="cloud-upload"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Cloud Upload</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="share"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Share</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="arrow-right"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Arrow Right</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="arrow-left"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Arrow Left</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="arrow-up"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Arrow Up</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="arrow-down"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Arrow Down</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="search"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Search</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="fs-xxl" data-lucide="refresh-ccw"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Refresh</span>
                            </span>
                        </div>
                    </div> <!-- end display-->
                    <div class="text-center mt-3">
                        <a class="btn btn-danger" href="https://lucide.dev/icons/" target="_blank">View All Icons</a>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')
@endsection
