@extends('layouts.vertical', ['title' => 'Tabler Icons'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Icons', 'title' => 'Tabler'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-block">
                    <h4 class="card-title mb-1">Overview</h4>
                    <p class="mb-0 text-muted">Free and open source icons designed to make your website or app attractive,
                        visually consistent and simply beautiful.</p>
                </div> <!-- end card-header-->
                <div class="card-body">
                    <h4 class="mt-0 fs-base mb-1">Usage</h4>
                    <code>&lt;i class="ti ti-xxxx"&gt;&lt;/i&gt;</code>
                    <div class="d-flex align-items-center gap-2 mt-3">
                        <i class="ti ti-phone fs-2"></i>
                        <i class="ti ti-ad-2 fs-2"></i>
                        <i class="ti ti-device-desktop fs-2"></i>
                        <i class="ti ti-device-tablet fs-2"></i>
                        <i class="ti ti-device-gamepad fs-2"></i>
                        <i class="ti ti-device-watch fs-2"></i>
                    </div>
                </div> <!-- end card-body-->
                <div class="card-body border-top border-dashed">
                    <h4 class="mt-0 fs-base mb-1">Colors</h4>
                    <code>&lt;i class="ti ti-xxxx text-xxxx"&gt;&lt;/i&gt;</code>
                    <div class="d-flex align-items-center gap-2 mt-3">
                        <i class="ti ti-camera fs-2 text-primary"></i>
                        <i class="ti ti-chart-pie-2 fs-2 text-secondary"></i>
                        <i class="ti ti-bell fs-2 text-success"></i>
                        <i class="ti ti-credit-card fs-2 text-info"></i>
                        <i class="ti ti-cloud fs-2 text-warning"></i>
                        <i class="ti ti-mail fs-2 text-danger"></i>
                        <i class="ti ti-lock fs-2 text-dark"></i>
                        <i class="ti ti-user fs-2 text-purple"></i>
                        <i class="ti ti-star fs-2 text-light"></i>
                    </div>
                </div>
                <div class="card-body border-top border-dashed">
                    <h4 class="mt-0 fs-base mb-1">Sizes</h4>
                    <code>&lt;i class="ti ti-xxxx fs-xx"&gt;&lt;/i&gt;</code>
                    <div class="d-flex align-items-center gap-2 mt-3">
                        <i class="ti ti-phone fs-1"></i>
                        <i class="ti ti-ad-2 fs-2"></i>
                        <i class="ti ti-device-desktop fs-3"></i>
                        <i class="ti ti-device-tablet fs-4"></i>
                        <i class="ti ti-device-gamepad fs-5"></i>
                        <i class="ti ti-device-watch fs-6"></i>
                    </div>
                    <div class="d-flex align-items-center gap-2 mt-3">
                        <i class="ti ti-device-watch"></i>
                        <i class="ti ti-device-watch fs-sm"></i>
                        <i class="ti ti-device-watch fs-lg"></i>
                        <i class="ti ti-device-watch fs-xl"></i>
                        <i class="ti ti-device-watch fs-xxl"></i>
                        <i class="ti ti-device-watch fs-24"></i>
                        <i class="ti ti-device-watch fs-32"></i>
                        <i class="ti ti-device-watch fs-36"></i>
                        <i class="ti ti-device-watch fs-42"></i>
                        <i class="ti ti-device-watch fs-60"></i>
                    </div>
                </div> <!-- end card-body-->
                <div class="card-body border-top border-dashed">
                    <h4 class="mt-0 mb-3">Icons</h4>
                    <div class="d-flex flex-wrap align-items-center text-center gap-2">
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-phone fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Phone</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-ad-2 fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Ad 2</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-headphones fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Headphones</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-camera fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Camera</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-device-watch fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Watch</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-microphone fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Microphone</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-headset fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Headset</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-device-tablet fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Tablet</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-device-gamepad fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Gamepad</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-printer fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Printer</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-device-speaker fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Speaker</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-database fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Database</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-cloud fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Cloud</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-wifi fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Wi-Fi</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-bluetooth fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Bluetooth</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-usb fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">USB</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-folder fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Folder</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-lock fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Lock</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-key fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Key</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-shield fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Shield</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-paperclip fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Paperclip</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-bell fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Bell</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-search fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Search</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-briefcase fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Briefcase</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-shopping-cart fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Cart</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-file fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">File</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-book fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Book</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-mail fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Mail</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-user fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">User</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-user-circle fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">User Circle</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-phone-call fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Phone Call</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-music fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Music</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-movie fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Movie</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-file-upload fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Upload</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-cloud-upload fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Cloud Upload</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-share fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Share</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-arrow-right fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Arrow Right</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-arrow-left fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Arrow Left</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-arrow-up fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Arrow Up</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-arrow-down fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Arrow Down</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-search fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Search</span>
                            </span>
                        </div>
                        <div class="avatar-xxl">
                            <span
                                class="avatar-title flex-column gap-1 border border-dashed rounded-3 overflow-hidden text-truncate text-center p-1">
                                <i class="ti ti-refresh fs-24"></i>
                                <span class="fw-semibold d-block w-100 text-truncate">Refresh</span>
                            </span>
                        </div>
                    </div> <!-- end display-->
                    <div class="text-center mt-3">
                        <a class="btn btn-danger" href="https://tabler.io/icons" target="_blank">View All Icons</a>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')
@endsection
