@extends('layouts.vertical', ['title' => 'Calendar'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Apps', 'title' => 'Calendar'])

    <div class="d-flex mb-3 gap-1">
        <div class="card h-100 mb-0 d-none d-lg-flex rounded-end-0">
            <div class="card-body">
                <button class="btn btn-primary w-100 btn-new-event">
                    <i class="ti ti-plus me-2 align-middle"></i>
                    Create New Event
                </button>
                <div id="external-events">
                    <p class="text-muted mt-2 fst-italic fs-xs mb-3">Drag and drop your event or click in the calendar</p>
                    <div class="external-event fc-event bg-primary-subtle text-primary fw-semibold"
                        data-class="bg-primary-subtle text-primary border-primary">
                        <i class="ti ti-circle-filled me-2"></i>Design Review
                    </div>
                    <div class="external-event fc-event bg-secondary-subtle text-secondary fw-semibold"
                        data-class="bg-secondary-subtle text-secondary border-secondary">
                        <i class="ti ti-circle-filled me-2"></i>Marketing Strategy
                    </div>
                    <div class="external-event fc-event bg-success-subtle text-success fw-semibold"
                        data-class="bg-success-subtle text-success border-success">
                        <i class="ti ti-circle-filled me-2"></i>Sales Demo
                    </div>
                    <div class="external-event fc-event bg-danger-subtle text-danger fw-semibold"
                        data-class="bg-danger-subtle text-danger border-danger">
                        <i class="ti ti-circle-filled me-2"></i>Deadline Submission
                    </div>
                    <div class="external-event fc-event bg-info-subtle text-info fw-semibold"
                        data-class="bg-info-subtle text-info border-info">
                        <i class="ti ti-circle-filled me-2"></i>Training Session
                    </div>
                    <div class="external-event fc-event bg-warning-subtle text-warning fw-semibold"
                        data-class="bg-warning-subtle text-warning border-warning">
                        <i class="ti ti-circle-filled me-2"></i>Budget Review
                    </div>
                    <div class="external-event fc-event bg-dark-subtle text-dark fw-semibold"
                        data-class="bg-dark-subtle text-dark border-dark">
                        <i class="ti ti-circle-filled me-2"></i>Board Meeting
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
        <div class="card h-100 mb-0 rounded-start-0 flex-grow-1 border-start-0">
            <div class="d-lg-none d-inline-flex card-header">
                <button class="btn btn-primary btn-new-event">
                    <i class="ti ti-plus me-2 align-middle"></i>
                    Create New Event
                </button>
            </div>
            <div class="card-body" data-simplebar="" data-simplebar-md="" style="height: calc(100% - 350px);">
                <div id="calendar"></div>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end row-->
    <!-- Modal Add/Edit -->
    <div class="modal fade" id="event-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="needs-validation" id="forms-event" name="event-form" novalidate="">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title">
                            Create Event
                        </h4>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="control-label form-label" for="event-title">Event Name</label>
                                    <input class="form-control" id="event-title" name="title"
                                        placeholder="Insert Event Name" required="" type="text" />
                                    <div class="invalid-feedback">Please provide a valid event name</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="control-label form-label" for="event-category">Category</label>
                                    <select class="form-select" id="event-category" name="category" required="">
                                        <option disabled="" value="">Select a category</option>
                                        <option selected="" value="bg-primary-subtle text-primary">Primary</option>
                                        <option value="bg-secondary-subtle text-secondary">Secondary</option>
                                        <option value="bg-success-subtle text-success">Success</option>
                                        <option value="bg-info-subtle text-info">Info</option>
                                        <option value="bg-warning-subtle text-warning">Warning</option>
                                        <option value="bg-danger-subtle text-danger">Danger</option>
                                        <option value="bg-dark-subtle text-dark">Dark</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a valid event category</div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <button class="btn btn-danger" id="btn-delete-event" type="button">
                                Delete
                            </button>
                            <button class="btn btn-light ms-auto" data-bs-dismiss="modal" type="button">
                                Close
                            </button>
                            <button class="btn btn-primary" id="btn-save-event" type="submit">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end modal-content-->
        </div>
        <!-- end modal dialog-->
    </div>
    <!-- end modal-->
@endsection

@section('scripts')
    @vite(['resources/js/pages/apps-calendar.js'])
@endsection
