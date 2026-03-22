@extends('layouts.vertical', ['title' => 'File Uploads'])

@section('css')    
    @vite(['node_modules/dropzone/dist/dropzone.css', 'node_modules/filepond/dist/filepond.min.css', 'node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Forms', 'title' => 'File Uploads'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-block">
                    <h4 class="card-title mb-1">Dropzone</h4>
                    <p class="text-muted mb-0">
                        DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews.
                    </p>
                </div>
                <div class="card-body">
                    <form action="/" class="dropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                        data-upload-preview-template="#uploadPreviewTemplate" id="myAwesomeDropzone" method="post">
                        <div class="fallback">
                            <input name="file" type="file" />
                        </div>
                        <div class="dz-message needsclick">
                            <div class="avatar-lg mx-auto mb-3">
                                <span class="avatar-title bg-success-subtle text-success rounded-circle">
                                    <i class="fs-24 ti ti-cloud-upload"></i>
                                </span>
                            </div>
                            <h4 class="mb-2">Drop files here or click to upload.</h4>
                            <p class="text-muted fst-italic mb-3">You can drag images here, or browse files via the button
                                below.</p>
                            <button class="btn btn-sm shadow btn-default" type="button">Browse Images</button>
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
                                        <img alt="" class="avatar-sm rounded bg-light" data-dz-thumbnail=""
                                            src="#" />
                                    </div>
                                    <div class="col ps-0">
                                        <a class="fw-semibold" data-dz-name="" href="javascript:void(0);"></a>
                                        <p class="mb-0 text-muted" data-dz-size=""></p>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <a class="btn btn-link btn-lg text-danger" data-dz-remove="" href="">
                                            <i class="ti ti-x"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end file preview template -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header d-block">
                    <h4 class="card-title mb-1">Filepond</h4>
                    <p class="text-muted mb-0">
                        A JavaScript library that can upload anything you throw at it, optimizes images for faster uploads,
                        and offers a great, accessible, silky smooth user experience.
                    </p>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h5 class="mb-3">Basic Example</h5>
                        <div class="filepond-uploader">
                            <input class="filepond filepond-input-multiple" data-allow-reorder="true"
                                data-max-file-size="3MB" data-max-files="5" multiple="" name="filepond" type="file" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5 class="mb-3">Two Grid Example</h5>
                        <div class="filepond-uploader two-grid">
                            <input class="filepond filepond-input-multiple" data-allow-reorder="true"
                                data-max-file-size="3MB" data-max-files="5" multiple="" name="filepond" type="file" />
                        </div>
                    </div>
                    <div>
                        <h5 class="mb-3">Three Grid Example</h5>
                        <div class="filepond-uploader three-grid">
                            <input class="filepond filepond-input-multiple" data-allow-reorder="true"
                                data-max-file-size="3MB" data-max-files="5" multiple="" name="filepond" type="file" />
                        </div>
                    </div>
                </div> <!-- end card body -->
                <div class="border-top border-dashed"></div>
                <div class="card-body">
                    <h4 class="card-title mb-2">Profile Picture</h4>
                    <p class="text-muted">FilePond is a JavaScript library with profile picture-shaped file upload
                        variation.</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="avatar-xxl">
                                <input accept="image/png, image/jpeg, image/gif" class="filepond filepond-input-circle"
                                    name="filepond" type="file" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="avatar-xxl">
                                <input accept="image/png, image/jpeg, image/gif"
                                    class="filepond filepond-input-circle rounded" name="filepond" type="file" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')    
    @vite(['resources/js/pages/form-fileupload.js'])
@endsection
