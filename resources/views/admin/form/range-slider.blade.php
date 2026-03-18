@extends('layouts.vertical', ['title' => 'Range Slider'])

@section('css')
    @vite(['node_modules/nouislider/dist/nouislider.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Forms', 'title' => 'Range Slider'])


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-block">
                    <h4 class="card-title mb-1">Examples</h4>
                    <p class="text-muted mb-0">
                        noUiSlider is a lightweight, ARIA-accessible JavaScript range slider with multi-touch and keyboard
                        support. It is fully GPU animated: no reflows, so it is fast; even on older devices. It also fits
                        wonderfully in responsive designs and has no dependencies
                    </p>
                </div>
                <div class="card-body">
                    <!-- Basic Range Slider -->
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <h5 class="mb-1">Basic Range Slider</h5>
                            <p class="text-muted mb-0">A simple single-value slider.</p>
                        </div>
                        <div class="col-lg-8">
                            <div data-slider="default" data-value="150"></div>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Sizes Range Slider -->
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <h5 class="mb-1">Sizes</h5>
                            <p class="text-muted mb-0">Adjust element size using different slider sizes.</p>
                        </div>
                        <div class="col-lg-8">
                            <div data-slider="default" data-slider-size="sm" data-value="180"></div>
                            <div class="mt-4" data-slider="default" data-slider-size="lg" data-value="90"></div>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Style Range Slider -->
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <h5 class="mb-1">Line Style</h5>
                            <p class="text-muted mb-0">Customize line handle style using sliders.</p>
                        </div>
                        <div class="col-lg-8">
                            <div data-slider="default" data-slider-style="line"></div>
                            <div class="mt-3" data-slider="default" data-slider-size="sm" data-slider-style="line"
                                data-value="180"></div>
                            <div class="mt-4" data-slider="default" data-slider-size="lg" data-slider-style="line"
                                data-value="90"></div>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Color Scheme Sliders -->
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <h5 class="mb-1">Color Scheme Sliders</h5>
                            <p class="text-muted mb-0">Sliders styled with theme colors.</p>
                        </div>
                        <div class="col-lg-8">
                            <div class="mb-4" data-slider="default" data-slider-color="primary" data-value="240"></div>
                            <div class="mb-4" data-slider="default" data-slider-color="secondary" data-value="185"></div>
                            <div class="mb-4" data-slider="default" data-slider-color="success" data-value="90"></div>
                            <div class="mb-4" data-slider="default" data-slider-color="info" data-slider-style="line"
                                data-value="125"></div>
                            <div class="mb-4" data-slider="default" data-slider-color="warning" data-value="155"></div>
                            <div class="mb-4" data-slider="default" data-slider-color="danger" data-value="70"></div>
                            <div class="mb-4" data-slider="default" data-slider-color="purple" data-value="180"></div>
                            <div data-slider="default" data-slider-color="dark" data-value="77"></div>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Multi Elements Range -->
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <h5 class="mb-1">Multi Elements Range</h5>
                            <p class="text-muted mb-0">Dual-handle slider for selecting a range.</p>
                        </div>
                        <div class="col-lg-8">
                            <div id="rangeslider_multielement"></div>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Value Range Slider -->
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <h5 class="mb-1">Value Range Slider (nonlinear)</h5>
                            <p class="text-muted mb-0">Shows selected value range below the slider.</p>
                        </div>
                        <div class="col-lg-8">
                            <div id="nonlinear"></div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="py-1 fw-semibold" id="lower-value"></div>
                                <div class="py-1 fw-semibold" id="upper-value"></div>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Locking Sliders Together -->
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <h5 class="mb-1">Locking Sliders Together</h5>
                            <p class="text-muted mb-0">Synchronize two sliders with a toggle lock.</p>
                        </div>
                        <div class="col-lg-8">
                            <div class="slider mb-2" id="slider1"></div>
                            <span class="example-val d-block mb-2" id="slider1-span"></span>
                            <div class="slider mb-2" id="slider2"></div>
                            <span class="example-val d-block mb-2" id="slider2-span"></span>
                            <button class="btn btn-sm btn-primary" id="lockbutton"><i class="ti ti-lock me-1"></i>
                                Lock</button>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Tooltip Slider -->
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <h5 class="mb-1">Tooltip Slider</h5>
                            <p class="text-muted mb-0">Displays tooltips with merged slider values.</p>
                        </div>
                        <div class="col-lg-8">
                            <div class="slider mt-4" id="slider-merging-tooltips"></div>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Soft Limits Slider -->
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <h5 class="mb-1">Soft Limits Slider</h5>
                            <p class="text-muted mb-0">Allows overflow beyond defined min/max.</p>
                        </div>
                        <div class="col-lg-8">
                            <div class="slider mb-4" id="soft"></div>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Vertical Sliders -->
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <h5 class="mb-1">Vertical Sliders</h5>
                            <p class="text-muted mb-0">Sliders arranged vertically.</p>
                        </div>
                        <div class="col-lg-8">
                            <div class="d-flex gap-5 overflow-hidden p-3">
                                <div id="slider-vertical"></div>
                                <div class="me-3" data-slider-color="warning" id="slider-connect-upper"></div>
                                <div id="slider-vertical-tooltip"></div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end crad body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')
    @vite(['resources/js/pages/form-range-slider.js'])
@endsection
