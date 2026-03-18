@extends('layouts.vertical', ['title' => 'Create New Products'])

@section('css')
@vite(['node_modules/dropzone/dist/dropzone.css', 'node_modules/quill/dist/quill.core.css', 'node_modules/quill/dist/quill.snow.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Ecommerce', 'title' => 'Add Product'])

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-xxl-8">
                    <div class="card">
                        <div class="card-header d-block p-3">
                            <h4 class="card-title mb-1">Product Information</h4>
                            <p class="text-muted mb-0">To add a new product, please provide the necessary
                                details in the fields below.</p>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="productName">Product Name <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" id="productName" placeholder="Enter product name"
                                            required="" type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="skuId">SKU <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" id="skuId" placeholder="SOFA-10058" required=""
                                            type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="stockNumber">Stock <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" id="stockNumber" placeholder="250" type="number" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div>
                                        <label class="form-label">Product Description <span
                                                class="text-muted">(Optional)</span></label>
                                        <div id="snow-editor">
                                            <p>Introducing the <strong><em>Azure Comfort Single
                                                        Sofa</em></strong>, a perfect blend of modern design and
                                                luxurious comfort.</p>
                                            <p>This premium blue single sofa is designed to elevate any living
                                                space with its sleek profile and rich, durable fabric. It’s the
                                                perfect seating option for your living room, lounge area, or
                                                cozy reading nook.</p>
                                            <ul>
                                                <li>Crafted with a solid mahogany frame for enhanced
                                                    durability.
                                                </li>
                                                <li>Upholstered in a high-quality blue fabric that offers both
                                                    style and comfort.
                                                </li>
                                            </ul>
                                        </div><!-- end Snow-editor -->
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                    <div class="card">
                        <div class="card-header d-block p-3">
                            <h4 class="card-title mb-1">Product Image</h4>
                            <p class="text-muted mb-0">To upload a product image, please use the option below to
                                select and upload the relevant file.</p>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="/" class="dropzone" data-plugin="dropzone"
                                        data-previews-container="#file-previews"
                                        data-upload-preview-template="#uploadPreviewTemplate" id="myAwesomeDropzone"
                                        method="post">
                                        <div class="fallback">
                                            <input name="file" type="file" />
                                        </div>
                                        <div class="dz-message needsclick">
                                            <div class="avatar-lg mx-auto mb-3">
                                                <span class="avatar-title bg-info-subtle text-info rounded-circle">
                                                    <i class="fs-24 ti ti-cloud-upload"></i>
                                                </span>
                                            </div>
                                            <h4 class="mb-2">Drop files here or click to upload.</h4>
                                            <p class="text-muted fst-italic mb-3">You can drag images here, or
                                                browse files via the button below.</p>
                                            <button class="btn btn-sm shadow btn-default" type="button">Browse
                                                Images
                                            </button>
                                        </div>
                                    </form>
                                    <!-- Preview -->
                                    <div class="dropzone-previews mt-3" id="file-previews"></div>
                                    <!-- file preview template -->
                                    <div class="d-none" id="uploadPreviewTemplate">
                                        <div class="card mt-1 mb-0 border-dashed border">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <img alt="" class="avatar-sm rounded bg-light"
                                                            data-dz-thumbnail="" src="#" />
                                                    </div>
                                                    <div class="col ps-0">
                                                        <a class="fw-semibold" data-dz-name=""
                                                            href="javascript:void(0);"></a>
                                                        <p class="mb-0 text-muted" data-dz-size=""></p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <!-- Button -->
                                                        <a class="btn btn-link btn-lg text-danger" data-dz-remove=""
                                                            href="">
                                                            <i class="ti ti-x"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end file preview template -->
                                </div>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-xxl-4">
                    <div class="card">
                        <div class="card-header d-block p-3">
                            <h4 class="card-title mb-1">Pricing</h4>
                            <p class="text-muted mb-0">Set the base price and applicable discount for the
                                product using the options below.</p>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="basePrice">Base Price <span
                                        class="text-danger">*</span></label>
                                <div class="app-search">
                                    <input class="form-control" id="basePrice"
                                        placeholder="Enter base price (e.g., 199.99)" type="number" />
                                    <i class="app-search-icon text-muted" data-lucide="dollar-sign"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="discount">Discount Type <span
                                        class="text-muted">(Optional)</span></label>
                                <div class="app-search">
                                    <select class="form-select form-control my-1 my-md-0" id="discount">
                                        <option selected="">Choose Discount</option>
                                        <option value="No Discount">No Discount</option>
                                        <option value="Flat Discount">Flat Discount</option>
                                        <option value="Percentage Discount">Percentage Discount</option>
                                    </select>
                                    <i class="app-search-icon text-muted" data-lucide="percent"></i>
                                </div>
                            </div>
                            <div class="mb-0">
                                <label class="form-label" for="discountValue">Discount Value <span
                                        class="text-muted">(Optional)</span></label>
                                <div class="app-search">
                                    <input class="form-control" id="discountValue"
                                        placeholder="Enter discount amount or percentage" type="number" />
                                    <i class="app-search-icon text-muted" data-lucide="tag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header d-block p-3">
                            <h4 class="card-title mb-1">Organize</h4>
                            <p class="text-muted mb-0">Organize your product by selecting the appropriate brand,
                                category, sub-category, status, and tags.</p>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="brand">Brand</label>
                                <div class="app-search">
                                    <input class="form-control" id="brand" placeholder="Enter brand name"
                                        type="text" />
                                    <i class="app-search-icon text-muted" data-lucide="layers"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="category">Category <span
                                        class="text-danger">*</span></label>
                                <div class="app-search">
                                    <select class="form-select form-control my-1 my-md-0" id="category">
                                        <option selected="">Choose Category</option>
                                        <option value="Furniture">Furniture</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Fashion">Fashion</option>
                                    </select>
                                    <i class="app-search-icon text-muted" data-lucide="grid"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="subCategory">Sub Category <span
                                        class="text-danger">*</span></label>
                                <div class="app-search">
                                    <select class="form-select form-control my-1 my-md-0" id="subCategory">
                                        <option selected="">Choose Sub Category</option>
                                        <option value="Chairs">Chairs</option>
                                        <option value="Sofas">Sofas</option>
                                        <option value="Tables">Tables</option>
                                    </select>
                                    <i class="app-search-icon text-muted" data-lucide="list"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="statusOne">Status <span
                                        class="text-danger">*</span></label>
                                <div class="app-search">
                                    <select class="form-select form-control my-1 my-md-0" id="statusOne">
                                        <option selected="">Choose Status</option>
                                        <option value="Published">Published</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="Schedule">Schedule</option>
                                        <option value="Draft">Draft</option>
                                    </select>
                                    <i class="app-search-icon text-muted" data-lucide="toggle-left"></i>
                                </div>
                            </div>
                            <div class="mb-0">
                                <label class="form-label" for="tags">Tags</label>
                                <div class="app-search">
                                    <input class="form-control" id="tags"
                                        placeholder="Enter tags separated by commas" type="text" />
                                    <i class="app-search-icon text-muted" data-lucide="tag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row-->
            <div class="mt-2 mb-4 d-flex gap-2 justify-content-center">
                <a class="btn btn-link text-danger fw-semibold" href="#!">
                    <i class="fs-sm me-2" data-lucide="clipboard-x"></i> Discard
                </a>
                <a class="btn btn-soft-secondary" href="#!">
                    <i class="fs-sm me-2" data-lucide="save"></i> Save as Draft
                </a>
                <a class="btn btn-success" href="#!">
                    <i class="fs-sm me-2" data-lucide="plus"></i> Publish
                </a>
            </div>
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')    
    @vite(['resources/js/pages/ecommerce-add-product.js'])
@endsection
