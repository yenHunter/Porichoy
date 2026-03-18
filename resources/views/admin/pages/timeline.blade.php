@extends('layouts.vertical', ['title' => 'Timeline'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Pages', 'title' => 'Timeline'])

    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Timeline</h4>
                </div> <!-- end card-header-->
                <div class="card-body">
                    <div class="timeline">
                        <!-- Event 1 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">Just Now</div>
                            <div class="timeline-dot bg-primary"></div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">Weekly Stand-Up Meeting</h5>
                                <p class="mb-1 text-muted">Team members shared updates, discussed blockers, and aligned on
                                    weekly goals.</p>
                                <span class="text-primary fw-semibold">By Olivia Rodriguez</span>
                            </div>
                        </div>
                        <!-- Event 2 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">10:00 AM, Tuesday</div>
                            <div class="timeline-dot bg-danger"></div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">Project Kickoff</h5>
                                <p class="mb-1 text-muted">Introduced project scope, goals, and assigned initial roles to
                                    team members.</p>
                                <span class="text-primary fw-semibold">By Isabella Cooper</span>
                            </div>
                        </div>
                        <!-- Event 3 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">Yesterday, 3:15 PM</div>
                            <div class="timeline-dot bg-warning"></div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">Design Review</h5>
                                <p class="mb-1 text-muted">Reviewed initial UI mockups and gathered feedback for the next
                                    design iteration.</p>
                                <span class="text-primary fw-semibold">By Ethan Murphy</span>
                            </div>
                        </div>
                        <!-- Event 4 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">Monday, 1:00 PM</div>
                            <div class="timeline-dot bg-info"></div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">Client Feedback Session</h5>
                                <p class="mb-1 text-muted">Discussed client feedback and agreed on key changes for the next
                                    sprint.</p>
                                <span class="text-primary fw-semibold">By Liam Chen</span>
                            </div>
                        </div>
                        <!-- Event 5 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">Last Friday, 4:30 PM</div>
                            <div class="timeline-dot bg-secondary"></div>
                            <div class="timeline-content ps-3">
                                <h5 class="mb-1">Code Deployment</h5>
                                <p class="mb-1 text-muted">Successfully deployed the latest build to the staging
                                    environment.</p>
                                <span class="text-primary fw-semibold">By Ava Thompson</span>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Timeline with Icons</h4>
                </div> <!-- end card-header-->
                <div class="card-body">
                    <div class="timeline timeline-icon-based">
                        <!-- Event 1 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">5 mins ago</div>
                            <div class="timeline-dot text-bg-primary">
                                <i class="ti ti-bug fs-xl"></i>
                            </div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">Bug Fix Deployed</h5>
                                <p class="mb-1 text-muted">Resolved a critical login issue affecting mobile users.</p>
                                <span class="text-primary fw-semibold">By Marcus Bell</span>
                            </div>
                        </div>
                        <!-- Event 2 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">Today, 9:00 AM</div>
                            <div class="timeline-dot bg-danger-subtle">
                                <i class="ti ti-phone-call fs-xl text-danger"></i>
                            </div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">Marketing Strategy Call</h5>
                                <p class="mb-1 text-muted">Outlined Q2 goals and content plan for the product launch
                                    campaign.</p>
                                <span class="text-primary fw-semibold">By Emily Davis</span>
                            </div>
                        </div>
                        <!-- Event 3 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">Yesterday, 4:45 PM</div>
                            <div class="timeline-dot text-bg-warning">
                                <i class="ti ti-layers-subtract fs-xl"></i>
                            </div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">Feature Planning Session</h5>
                                <p class="mb-1 text-muted">Prioritized new features for the upcoming release based on user
                                    feedback.</p>
                                <span class="text-primary fw-semibold">By Daniel Kim</span>
                            </div>
                        </div>
                        <!-- Event 4 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">Tuesday, 11:30 AM</div>
                            <div class="timeline-dot bg-info-subtle">
                                <i class="ti ti-layout-dashboard fs-xl text-info"></i>
                            </div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">UI Enhancements Pushed</h5>
                                <p class="mb-1 text-muted">Improved dashboard responsiveness and added dark mode support.
                                </p>
                                <span class="text-primary fw-semibold">By Sofia Martinez</span>
                            </div>
                        </div>
                        <!-- Event 5 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">Last Thursday, 2:20 PM</div>
                            <div class="timeline-dot text-bg-secondary">
                                <i class="ti ti-shield-lock fs-xl"></i>
                            </div>
                            <div class="timeline-content ps-3">
                                <h5 class="mb-1">Security Audit Completed</h5>
                                <p class="mb-1 text-muted">Reviewed backend API endpoints and applied new encryption
                                    standards.</p>
                                <span class="text-primary fw-semibold">By Jonathan Lee</span>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Timeline with Border</h4>
                </div> <!-- end card-header-->
                <div class="card-body">
                    <div class="timeline timeline-icon-bordered">
                        <!-- Event 1 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">10 mins ago</div>
                            <div class="timeline-dot">
                                <i class="ti ti-rocket fs-xl text-muted"></i>
                            </div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">New Feature Released</h5>
                                <p class="mb-1 text-muted">Launched the real-time chat feature across all user accounts.
                                </p>
                                <span class="text-primary fw-semibold">By Natalie Brooks</span>
                            </div>
                        </div>
                        <!-- Event 2 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">Today, 11:15 AM</div>
                            <div class="timeline-dot">
                                <i class="ti ti-calendar-event fs-xl text-muted"></i>
                            </div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">Team Sync-Up</h5>
                                <p class="mb-1 text-muted">Reviewed sprint progress and discussed remaining tasks.</p>
                                <span class="text-primary fw-semibold">By Oliver Grant</span>
                            </div>
                        </div>
                        <!-- Event 3 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">Yesterday, 2:40 PM</div>
                            <div class="timeline-dot">
                                <i class="ti ti-palette fs-xl text-muted"></i>
                            </div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">UI Design Review</h5>
                                <p class="mb-1 text-muted">Refined component spacing and color scheme for better
                                    accessibility.</p>
                                <span class="text-primary fw-semibold">By Clara Jensen</span>
                            </div>
                        </div>
                        <!-- Event 4 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">Tuesday, 3:30 PM</div>
                            <div class="timeline-dot">
                                <i class="ti ti-database fs-xl text-muted"></i>
                            </div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">Database Optimization</h5>
                                <p class="mb-1 text-muted">Refactored queries to reduce API response times by 35%.</p>
                                <span class="text-primary fw-semibold">By Leo Armstrong</span>
                            </div>
                        </div>
                        <!-- Event 5 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-time pe-3 text-muted">Last Thursday, 5:00 PM</div>
                            <div class="timeline-dot">
                                <i class="ti ti-lock-check fs-xl text-muted"></i>
                            </div>
                            <div class="timeline-content ps-3">
                                <h5 class="mb-1">Compliance Check Passed</h5>
                                <p class="mb-1 text-muted">Successfully passed GDPR compliance audit with zero violations.
                                </p>
                                <span class="text-primary fw-semibold">By Mia Thompson</span>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Timeline with Users</h4>
                </div> <!-- end card-header-->
                <div class="card-body">
                    <div class="timeline timeline-users">
                        <!-- Event 1 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-dot">
                                <img alt="avatar-1" class="img-fluid rounded-circle" src="/images/users/user-1.jpg" />
                            </div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">Dashboard Revamp Completed</h5>
                                <p class="mb-1 text-muted">The new layout and theme for the analytics dashboard have been
                                    deployed.</p>
                                <span class="text-primary fw-semibold">By Emma Carter</span>
                            </div>
                        </div>
                        <!-- Event 2 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-dot">
                                <img alt="avatar-2" class="img-fluid rounded-circle" src="/images/users/user-2.jpg" />
                            </div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">Onboarding Guide Published</h5>
                                <p class="mb-1 text-muted">Uploaded the latest documentation to help new users get started
                                    quickly.</p>
                                <span class="text-primary fw-semibold">By Noah Mitchell</span>
                            </div>
                        </div>
                        <!-- Event 3 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-dot">
                                <img alt="avatar-3" class="img-fluid rounded-circle" src="/images/users/user-3.jpg" />
                            </div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">Performance Improvements</h5>
                                <p class="mb-1 text-muted">Reduced page load time by optimizing image assets and scripts.
                                </p>
                                <span class="text-primary fw-semibold">By Ava Morgan</span>
                            </div>
                        </div>
                        <!-- Event 4 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-dot">
                                <img alt="avatar-4" class="img-fluid rounded-circle" src="/images/users/user-4.jpg" />
                            </div>
                            <div class="timeline-content ps-3 pb-4">
                                <h5 class="mb-1">Security Patch Released</h5>
                                <p class="mb-1 text-muted">Patched a vulnerability related to token expiration in the API.
                                </p>
                                <span class="text-primary fw-semibold">By James Parker</span>
                            </div>
                        </div>
                        <!-- Event 5 -->
                        <div class="timeline-item d-flex align-items-stretch">
                            <div class="timeline-dot">
                                <img alt="avatar-5" class="img-fluid rounded-circle" src="/images/users/user-5.jpg" />
                            </div>
                            <div class="timeline-content ps-3">
                                <h5 class="mb-1">Client Training Session</h5>
                                <p class="mb-1 text-muted">Hosted a live training session with 30+ clients on the new
                                    reporting tools.</p>
                                <span class="text-primary fw-semibold">By Sophia Bennett</span>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')
@endsection
