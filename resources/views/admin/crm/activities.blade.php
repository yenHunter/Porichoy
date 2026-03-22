@extends('layouts.vertical', ['title' => 'CRM Activities'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'CRM', 'title' => 'Activities'])

    <div class="row justify-content-center">
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-body">
                    <div class="timeline timeline-icon-bordered">
                        <!-- 01 Aug, 2025 -->
                        <div class="mb-3">
                            <h6 class="text-muted fw-bold mb-3">01 Aug, 2025</h6>
                            <!-- New Lead -->
                            <div class="timeline-item d-flex align-items-start">
                                <div class="timeline-time pe-3 text-muted">09:30 AM</div>
                                <div class="timeline-dot">
                                    <i class="ti ti-user-plus fs-xl text-success"></i>
                                </div>
                                <div class="timeline-content ps-3 pb-4">
                                    <p class="mb-1"><strong>New lead:</strong> <a href="#">John Carter</a> added to
                                        the "Enterprise" pipeline by <span class="fw-semibold text-primary">Sarah
                                            Lee</span>.</p>
                                    <div class="d-flex align-items-start gap-2 mt-2">
                                        <button class="btn btn-sm btn-outline-secondary">Follow Up</button>
                                        <button class="btn btn-sm btn-outline-info">Log Note</button>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mt-2">
                                        <span class="badge bg-light border text-muted">Cold Lead</span>
                                        <small class="text-muted">01 Aug, 2025, 09:30 AM</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Deal Created -->
                            <div class="timeline-item d-flex align-items-start">
                                <div class="timeline-time pe-3 text-muted">10:15 AM</div>
                                <div class="timeline-dot">
                                    <i class="ti ti-briefcase fs-xl text-info"></i>
                                </div>
                                <div class="timeline-content ps-3 pb-4">
                                    <p class="mb-1"><strong>Deal created:</strong> <a href="#">Q3 Licensing</a> for
                                        John Carter added by <span class="fw-semibold text-primary">Sarah Lee</span> with
                                        value $15,000.</p>
                                    <div class="d-flex align-items-start gap-2 mt-2">
                                        <button class="btn btn-sm btn-outline-primary">View Deal</button>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mt-2">
                                        <span class="badge bg-info-subtle text-info">High Priority</span>
                                        <small class="text-muted">01 Aug, 2025, 10:15 AM</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Note Logged -->
                            <div class="timeline-item d-flex align-items-start">
                                <div class="timeline-time pe-3 text-muted">11:45 AM</div>
                                <div class="timeline-dot">
                                    <i class="ti ti-pencil fs-xl text-muted"></i>
                                </div>
                                <div class="timeline-content ps-3 pb-4">
                                    <p class="mb-1"><strong>Note added:</strong> Client requested a 15-day extension on
                                        proposal deadline. Logged by <span class="fw-semibold text-primary">Sarah
                                            Lee</span>.</p>
                                    <div class="d-flex align-items-start gap-2 mt-2">
                                        <button class="btn btn-sm btn-outline-info">Edit Note</button>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mt-2">
                                        <span class="badge bg-warning-subtle text-warning">Client Requested</span>
                                        <small class="text-muted">01 Aug, 2025, 11:45 AM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 31 Jul, 2025 -->
                        <div class="mb-3">
                            <h6 class="text-muted fw-bold mb-3">31 Jul, 2025</h6>
                            <!-- Call Logged -->
                            <div class="timeline-item d-flex align-items-start">
                                <div class="timeline-time pe-3 text-muted">03:30 PM</div>
                                <div class="timeline-dot">
                                    <i class="ti ti-phone-call fs-xl text-secondary"></i>
                                </div>
                                <div class="timeline-content ps-3 pb-4">
                                    <p class="mb-1"><strong>Call completed:</strong> Follow-up call with <strong>Emily
                                            Watson</strong> to discuss contract renewal.</p>
                                    <div class="d-flex align-items-start gap-2 mt-2">
                                        <button class="btn btn-sm btn-outline-success">Call Again</button>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mt-2">
                                        <span class="badge bg-warning-subtle text-warning">Follow Up Needed</span>
                                        <small class="text-muted">31 Jul, 2025, 03:30 PM</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Email Sent -->
                            <div class="timeline-item d-flex align-items-start">
                                <div class="timeline-time pe-3 text-muted">01:00 PM</div>
                                <div class="timeline-dot">
                                    <i class="ti ti-mail fs-xl text-danger"></i>
                                </div>
                                <div class="timeline-content ps-3 pb-4">
                                    <p class="mb-1"><strong>Email:</strong> Welcome email with demo link sent to <span
                                            class="fw-semibold text-primary">Michael Barnes</span>.</p>
                                    <div class="d-flex align-items-start gap-2 mt-2">
                                        <button class="btn btn-sm btn-outline-dark">Resend</button>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mt-2">
                                        <span class="badge bg-light border text-muted">Automated</span>
                                        <small class="text-muted">31 Jul, 2025, 01:00 PM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 30 Jul, 2025 -->
                        <div class="mb-3">
                            <h6 class="text-muted fw-bold mb-3">30 Jul, 2025</h6>
                            <!-- Demo Scheduled -->
                            <div class="timeline-item d-flex align-items-start">
                                <div class="timeline-time pe-3 text-muted">02:45 PM</div>
                                <div class="timeline-dot">
                                    <i class="ti ti-calendar-event fs-xl text-primary"></i>
                                </div>
                                <div class="timeline-content ps-3 pb-4">
                                    <p class="mb-1"><strong>Demo scheduled:</strong> A demo was booked with <strong>Linda
                                            Rowe</strong> for 02 Aug at 4:00 PM. Invite sent with Google Meet link.</p>
                                    <div class="d-flex align-items-start gap-2 mt-2">
                                        <button class="btn btn-sm btn-outline-success">Send Reminder</button>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mt-2">
                                        <span class="badge bg-light border text-muted">Scheduled</span>
                                        <small class="text-muted">30 Jul, 2025, 02:45 PM</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Lead Reassigned -->
                            <div class="timeline-item d-flex align-items-start">
                                <div class="timeline-time pe-3 text-muted">10:00 AM</div>
                                <div class="timeline-dot">
                                    <i class="ti ti-user-circle fs-xl text-secondary"></i>
                                </div>
                                <div class="timeline-content ps-3 pb-4">
                                    <p class="mb-1"><strong>Lead reassigned:</strong> Lead <strong>Alice Monroe</strong>
                                        was reassigned from <em>James Parker</em> to <strong>Lisa Turner</strong> for better
                                        regional alignment.</p>
                                    <div class="d-flex align-items-center gap-2 mt-2">
                                        <span class="badge bg-light border text-muted">Internal</span>
                                        <small class="text-muted">30 Jul, 2025, 10:00 AM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 29 Jul, 2025 -->
                        <div class="mb-3">
                            <h6 class="text-muted fw-bold mb-3">29 Jul, 2025</h6>
                            <!-- Lead Converted -->
                            <div class="timeline-item d-flex align-items-start">
                                <div class="timeline-time pe-3 text-muted">05:30 PM</div>
                                <div class="timeline-dot">
                                    <i class="ti ti-star fs-xl text-success"></i>
                                </div>
                                <div class="timeline-content ps-3 pb-4">
                                    <p class="mb-1"><strong>Lead converted:</strong> <strong>Jacob Wells</strong>
                                        converted into customer after final proposal approval. Contract sent for signing.
                                    </p>
                                    <div class="d-flex align-items-start gap-2 mt-2">
                                        <button class="btn btn-sm btn-outline-primary">View Client</button>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mt-2">
                                        <span class="badge bg-success-subtle text-success">Won</span>
                                        <small class="text-muted">29 Jul, 2025, 05:30 PM</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Internal Note -->
                            <div class="timeline-item d-flex align-items-start">
                                <div class="timeline-time pe-3 text-muted">11:15 AM</div>
                                <div class="timeline-dot">
                                    <i class="ti ti-message fs-xl text-muted"></i>
                                </div>
                                <div class="timeline-content ps-3 pb-4">
                                    <p class="mb-1"><strong>Note added:</strong> Added post-call notes for <strong>Emily
                                            Watson</strong>. Follow-up set for next week to review proposal edits.</p>
                                    <div class="d-flex align-items-center gap-2 mt-2">
                                        <span class="badge bg-light border text-muted">Internal Note</span>
                                        <small class="text-muted">29 Jul, 2025, 11:15 AM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 27 Jul, 2025 -->
                        <div class="mb-3">
                            <h6 class="text-muted fw-bold mb-3">27 Jul, 2025</h6>
                            <!-- Deal Lost -->
                            <div class="timeline-item d-flex align-items-start">
                                <div class="timeline-time pe-3 text-muted">03:00 PM</div>
                                <div class="timeline-dot">
                                    <i class="ti ti-x fs-xl text-danger"></i>
                                </div>
                                <div class="timeline-content ps-3 pb-4">
                                    <p class="mb-1"><strong>Deal lost:</strong> Deal <strong>IT Revamp -
                                            BetaSoft</strong> marked as lost due to pricing mismatch. Feedback recorded.</p>
                                    <div class="d-flex align-items-start gap-2 mt-2">
                                        <button class="btn btn-sm btn-outline-dark">Review Notes</button>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mt-2">
                                        <span class="badge bg-danger-subtle text-danger">Lost</span>
                                        <small class="text-muted">27 Jul, 2025, 03:00 PM</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Contact Info Updated -->
                            <div class="timeline-item d-flex align-items-start">
                                <div class="timeline-time pe-3 text-muted">09:20 AM</div>
                                <div class="timeline-dot">
                                    <i class="ti ti-edit fs-xl text-primary"></i>
                                </div>
                                <div class="timeline-content ps-3 pb-4">
                                    <p class="mb-1"><strong>Contact info updated:</strong> Phone and email updated for
                                        <strong>Jessica Tran</strong>. New contact details logged.</p>
                                    <div class="d-flex align-items-center gap-2 mt-2">
                                        <span class="badge bg-light border text-muted">Updated</span>
                                        <small class="text-muted">27 Jul, 2025, 09:20 AM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end .timeline-->
                    <div class="d-flex align-items-center justify-content-center gap-2 p-3">
                        <strong>Loading...</strong>
                        <div aria-hidden="true" class="spinner-border spinner-border-sm text-danger" role="status">
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
@endsection

@section('scripts')
    @vite(['resources/js/pages/custom-table.js'])
@endsection
