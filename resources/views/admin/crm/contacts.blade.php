@extends('layouts.vertical', ['title' => 'CRM Contacts'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'CRM', 'title' => 'Contacts'])

    <div class="row">
        <div class="col-md-6 col-xxl-4">
            <div class="card">
                <div class="card-body d-flex align-items-start">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle me-3" height="64" src="/images/users/user-10.jpg"
                        width="64" />
                    <div class="flex-grow-1">
                        <!-- Name & Role -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Emily Ross</a>
                            </h5>
                            <span class="badge badge-label bg-success">Prospect</span>
                        </div>
                        <p class="mb-3 text-muted fs-xs">Marketing Director at GreenTech</p>
                        <!-- Contact Info -->
                        <div class="mb-2">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium"><a class="link-reset"
                                        href="#">emily.ross@greentech.com</a></h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium"><a class="link-reset" href="#">+44 7911 112233</a>
                                </h5>
                            </div>
                        </div>
                        <!-- Tags -->
                        <div>
                            <span class="badge badge-soft-info me-1">Eco</span>
                            <span class="badge text-bg-light me-1">Newsletter</span>
                            <span class="badge badge-soft-secondary">Follow-up</span>
                        </div>
                    </div>
                </div>
                <!-- Footer with deal info -->
                <div
                    class="card-footer bg-light-subtle d-flex justify-content-between text-center border-top border-dashed">
                    <div>
                        <h5 class="mb-0">98</h5><span class="text-muted">Posts</span>
                    </div>
                    <div>
                        <h5 class="mb-0">12.5k</h5><span class="text-muted">Followers</span>
                    </div>
                    <div>
                        <h5 class="mb-0">860</h5><span class="text-muted">Followings</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col-->
        <div class="col-md-6 col-xxl-4">
            <div class="card">
                <div class="card-body d-flex align-items-start">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle me-3" height="64" src="/images/users/user-9.jpg"
                        width="64" />
                    <div class="flex-grow-1">
                        <!-- Name & Role -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Ava Mitchell</a>
                            </h5>
                            <span class="badge badge-label bg-info">Cold Lead</span>
                        </div>
                        <p class="mb-3 text-muted fs-xs">Product Strategist at NovaX Labs</p>
                        <!-- Contact Info -->
                        <div class="mb-2">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium"><a class="link-reset"
                                        href="#">ava.mitchell@novaxlabs.com</a></h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium"><a class="link-reset" href="#">+1 347 445 8890</a>
                                </h5>
                            </div>
                        </div>
                        <!-- Tags -->
                        <div>
                            <span class="badge badge-soft-primary me-1">Technology</span>
                            <span class="badge text-bg-light me-1">Outbound</span>
                            <span class="badge badge-soft-danger">Low Engagement</span>
                        </div>
                    </div>
                </div>
                <!-- Footer with CRM metrics -->
                <div
                    class="card-footer bg-light-subtle d-flex justify-content-between text-center border-top border-dashed">
                    <div>
                        <h5 class="mb-0">$4.2k</h5><span class="text-muted">Total Value</span>
                    </div>
                    <div>
                        <h5 class="mb-0">1</h5><span class="text-muted">Open Deal</span>
                    </div>
                    <div>
                        <h5 class="mb-0">0</h5><span class="text-muted">Meetings</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-4">
            <div class="card">
                <div class="card-body d-flex align-items-start">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle me-3" height="64" src="/images/users/user-8.jpg"
                        width="64" />
                    <div class="flex-grow-1">
                        <!-- Name & Role -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Lucas Grant</a>
                            </h5>
                            <span class="badge badge-label bg-success">Qualified</span>
                        </div>
                        <p class="mb-3 text-muted fs-xs">VP of Sales at MetricOne</p>
                        <!-- Contact Info -->
                        <div class="mb-2">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium"><a class="link-reset"
                                        href="#">lucas.grant@metricone.com</a></h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium"><a class="link-reset" href="#">+1 646 901
                                        2200</a></h5>
                            </div>
                        </div>
                        <!-- Tags -->
                        <div>
                            <span class="badge badge-soft-success me-1">B2B</span>
                            <span class="badge text-bg-light me-1">Referral</span>
                            <span class="badge badge-soft-info">High Potential</span>
                        </div>
                    </div>
                </div>
                <!-- Footer with CRM metrics -->
                <div
                    class="card-footer bg-light-subtle d-flex justify-content-between text-center border-top border-dashed">
                    <div>
                        <h5 class="mb-0">$19.6k</h5><span class="text-muted">Total Value</span>
                    </div>
                    <div>
                        <h5 class="mb-0">3</h5><span class="text-muted">Open Deals</span>
                    </div>
                    <div>
                        <h5 class="mb-0">2</h5><span class="text-muted">Meetings</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-4">
            <div class="card">
                <div class="card-body d-flex align-items-start">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle me-3" height="64" src="/images/users/user-7.jpg"
                        width="64" />
                    <div class="flex-grow-1">
                        <!-- Name & Role -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Sophie Nguyen</a>
                            </h5>
                            <span class="badge badge-label bg-warning">Negotiation</span>
                        </div>
                        <p class="mb-3 text-muted fs-xs">Head of Growth at ElevateX</p>
                        <!-- Contact Info -->
                        <div class="mb-2">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">sophie.nguyen@elevatex.com</a>
                                </h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">+1 213 778 0923</a>
                                </h5>
                            </div>
                        </div>
                        <!-- Tags -->
                        <div>
                            <span class="badge badge-soft-info me-1">SaaS</span>
                            <span class="badge text-bg-light me-1">Demo Scheduled</span>
                            <span class="badge badge-soft-primary">Strategic</span>
                        </div>
                    </div>
                </div>
                <!-- Footer with CRM metrics -->
                <div
                    class="card-footer bg-light-subtle d-flex justify-content-between text-center border-top border-dashed">
                    <div>
                        <h5 class="mb-0">$32.1k</h5><span class="text-muted">Total Value</span>
                    </div>
                    <div>
                        <h5 class="mb-0">4</h5><span class="text-muted">Open Deals</span>
                    </div>
                    <div>
                        <h5 class="mb-0">3</h5><span class="text-muted">Meetings</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-4">
            <div class="card">
                <div class="card-body d-flex align-items-start">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle me-3" height="64" src="/images/users/user-6.jpg"
                        width="64" />
                    <div class="flex-grow-1">
                        <!-- Name & Role -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Rajiv Mehra</a>
                            </h5>
                            <span class="badge badge-label bg-info">Cold Lead</span>
                        </div>
                        <p class="mb-3 text-muted fs-xs">CTO at Cloudbyte</p>
                        <!-- Contact Info -->
                        <div class="mb-2">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">rajiv.mehra@cloudbyte.io</a>
                                </h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">+91 98100 11223</a>
                                </h5>
                            </div>
                        </div>
                        <!-- Tags -->
                        <div>
                            <span class="badge badge-soft-warning me-1">Cloud</span>
                            <span class="badge text-bg-light me-1">India</span>
                            <span class="badge badge-soft-danger">Low Engagement</span>
                        </div>
                    </div>
                </div>
                <!-- Footer with CRM metrics -->
                <div
                    class="card-footer bg-light-subtle d-flex justify-content-between text-center border-top border-dashed">
                    <div>
                        <h5 class="mb-0">$8.7k</h5><span class="text-muted">Total Value</span>
                    </div>
                    <div>
                        <h5 class="mb-0">1</h5><span class="text-muted">Open Deal</span>
                    </div>
                    <div>
                        <h5 class="mb-0">0</h5><span class="text-muted">Meetings</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-4">
            <div class="card">
                <div class="card-body d-flex align-items-start">
                    <!-- Avatar -->
                    <div class="avatar rounded-circle me-3 flex-shrink-0" style="height: 64px; width: 64px;">
                        <span class="avatar-title text-bg-secondary fw-semibold rounded-circle fs-22">
                            IS
                        </span>
                    </div>
                    <div class="flex-grow-1">
                        <!-- Name & Role -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Isabella
                                    Stone</a>
                            </h5>
                            <span class="badge badge-label bg-primary">Prospect</span>
                        </div>
                        <p class="mb-3 text-muted fs-xs">Digital Strategy Lead at Marvia</p>
                        <!-- Contact Info -->
                        <div class="mb-2">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">isabella.stone@marvia.com</a>
                                </h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">+44 7910 556677</a>
                                </h5>
                            </div>
                        </div>
                        <!-- Tags -->
                        <div>
                            <span class="badge badge-soft-info me-1">Marketing</span>
                            <span class="badge text-bg-light me-1">EU</span>
                            <span class="badge badge-soft-secondary">Newsletter</span>
                        </div>
                    </div>
                </div>
                <!-- Footer with CRM metrics -->
                <div
                    class="card-footer bg-light-subtle d-flex justify-content-between text-center border-top border-dashed">
                    <div>
                        <h5 class="mb-0">$15.4k</h5><span class="text-muted">Total Value</span>
                    </div>
                    <div>
                        <h5 class="mb-0">2</h5><span class="text-muted">Open Deals</span>
                    </div>
                    <div>
                        <h5 class="mb-0">1</h5><span class="text-muted">Meetings</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-4">
            <div class="card">
                <div class="card-body d-flex align-items-start">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle me-3" height="64" src="/images/users/user-5.jpg"
                        width="64" />
                    <div class="flex-grow-1">
                        <!-- Name & Role -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Carlos
                                    Jiménez</a>
                            </h5>
                            <span class="badge badge-label bg-success">Closed - Won</span>
                        </div>
                        <p class="mb-3 text-muted fs-xs">Enterprise Sales at Nexora</p>
                        <!-- Contact Info -->
                        <div class="mb-2">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">carlos.jimenez@nexora.com</a>
                                </h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">+34 612 345 678</a>
                                </h5>
                            </div>
                        </div>
                        <!-- Tags -->
                        <div>
                            <span class="badge badge-soft-dark me-1">Enterprise</span>
                            <span class="badge text-bg-light me-1">Spain</span>
                            <span class="badge badge-soft-success">Repeat Client</span>
                        </div>
                    </div>
                </div>
                <!-- Footer with CRM metrics -->
                <div
                    class="card-footer bg-light-subtle d-flex justify-content-between text-center border-top border-dashed">
                    <div>
                        <h5 class="mb-0">$45.9k</h5><span class="text-muted">Total Value</span>
                    </div>
                    <div>
                        <h5 class="mb-0">5</h5><span class="text-muted">Open Deals</span>
                    </div>
                    <div>
                        <h5 class="mb-0">4</h5><span class="text-muted">Meetings</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-4">
            <div class="card">
                <div class="card-body d-flex align-items-start">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle me-3" height="64" src="/images/users/user-4.jpg"
                        width="64" />
                    <div class="flex-grow-1">
                        <!-- Name & Role -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Nina Patel</a>
                            </h5>
                            <span class="badge badge-label bg-secondary">In Progress</span>
                        </div>
                        <p class="mb-3 text-muted fs-xs">Partnership Manager at ZentroHub</p>
                        <!-- Contact Info -->
                        <div class="mb-2">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">nina.patel@zentrohub.com</a>
                                </h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">+61 480 123 456</a>
                                </h5>
                            </div>
                        </div>
                        <!-- Tags -->
                        <div>
                            <span class="badge badge-soft-secondary me-1">Partnership</span>
                            <span class="badge text-bg-light me-1">APAC</span>
                            <span class="badge badge-soft-warning">Mid Priority</span>
                        </div>
                    </div>
                </div>
                <!-- Footer with CRM metrics -->
                <div
                    class="card-footer bg-light-subtle d-flex justify-content-between text-center border-top border-dashed">
                    <div>
                        <h5 class="mb-0">$21.3k</h5><span class="text-muted">Total Value</span>
                    </div>
                    <div>
                        <h5 class="mb-0">2</h5><span class="text-muted">Open Deals</span>
                    </div>
                    <div>
                        <h5 class="mb-0">1</h5><span class="text-muted">Meetings</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-4">
            <div class="card">
                <div class="card-body d-flex align-items-start">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle me-3" height="64" src="/images/users/user-3.jpg"
                        width="64" />
                    <div class="flex-grow-1">
                        <!-- Name & Role -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Elena Moretti</a>
                            </h5>
                            <span class="badge badge-label bg-danger">Churn Risk</span>
                        </div>
                        <p class="mb-3 text-muted fs-xs">Customer Success Manager at LumiPay</p>
                        <!-- Contact Info -->
                        <div class="mb-2">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">elena.moretti@lumipay.io</a>
                                </h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">+39 06 9456 2345</a>
                                </h5>
                            </div>
                        </div>
                        <!-- Tags -->
                        <div>
                            <span class="badge badge-soft-danger me-1">High Churn Risk</span>
                            <span class="badge text-bg-light me-1">Renewal Due</span>
                            <span class="badge badge-soft-info">EMEA</span>
                        </div>
                    </div>
                </div>
                <!-- Footer with CRM metrics -->
                <div
                    class="card-footer bg-light-subtle d-flex justify-content-between text-center border-top border-dashed">
                    <div>
                        <h5 class="mb-0">$5.2k</h5><span class="text-muted">Total Value</span>
                    </div>
                    <div>
                        <h5 class="mb-0">1</h5><span class="text-muted">Open Deal</span>
                    </div>
                    <div>
                        <h5 class="mb-0">0</h5><span class="text-muted">Meetings</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-4">
            <div class="card">
                <div class="card-body d-flex align-items-start">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle me-3" height="64" src="/images/users/user-2.jpg"
                        width="64" />
                    <div class="flex-grow-1">
                        <!-- Name & Role -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Jason Lee</a>
                            </h5>
                            <span class="badge badge-label bg-primary">Follow-Up</span>
                        </div>
                        <p class="mb-3 text-muted fs-xs">Account Executive at BrightCore</p>
                        <!-- Contact Info -->
                        <div class="mb-2">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">jason.lee@brightcore.com</a>
                                </h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">+1 310 555 7890</a>
                                </h5>
                            </div>
                        </div>
                        <!-- Tags -->
                        <div>
                            <span class="badge badge-soft-primary me-1">US Market</span>
                            <span class="badge text-bg-light me-1">Email Outreach</span>
                            <span class="badge badge-soft-success">Warm Lead</span>
                        </div>
                    </div>
                </div>
                <!-- Footer with CRM metrics -->
                <div
                    class="card-footer bg-light-subtle d-flex justify-content-between text-center border-top border-dashed">
                    <div>
                        <h5 class="mb-0">$11.9k</h5><span class="text-muted">Total Value</span>
                    </div>
                    <div>
                        <h5 class="mb-0">2</h5><span class="text-muted">Open Deals</span>
                    </div>
                    <div>
                        <h5 class="mb-0">1</h5><span class="text-muted">Meetings</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-4">
            <div class="card">
                <div class="card-body d-flex align-items-start">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle me-3" height="64" src="/images/users/user-1.jpg"
                        width="64" />
                    <div class="flex-grow-1">
                        <!-- Name & Role -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Fatima
                                    Al-Mansoori</a>
                            </h5>
                            <span class="badge badge-label bg-warning">Pending Review</span>
                        </div>
                        <p class="mb-3 text-muted fs-xs">Regional Director at GulfNext</p>
                        <!-- Contact Info -->
                        <div class="mb-2">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">fatima.m@gulfnxt.com</a>
                                </h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">+971 55 667 3412</a>
                                </h5>
                            </div>
                        </div>
                        <!-- Tags -->
                        <div>
                            <span class="badge badge-soft-warning me-1">Middle East</span>
                            <span class="badge text-bg-light me-1">Partner Channel</span>
                            <span class="badge badge-soft-secondary">Pending Docs</span>
                        </div>
                    </div>
                </div>
                <!-- Footer with CRM metrics -->
                <div
                    class="card-footer bg-light-subtle d-flex justify-content-between text-center border-top border-dashed">
                    <div>
                        <h5 class="mb-0">$26.8k</h5><span class="text-muted">Total Value</span>
                    </div>
                    <div>
                        <h5 class="mb-0">2</h5><span class="text-muted">Open Deals</span>
                    </div>
                    <div>
                        <h5 class="mb-0">2</h5><span class="text-muted">Meetings</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-4">
            <div class="card">
                <div class="card-body d-flex align-items-start">
                    <!-- Avatar -->
                    <div class="avatar rounded-circle me-3 flex-shrink-0" style="height: 64px; width: 64px;">
                        <span class="avatar-title text-bg-primary fw-semibold rounded-circle fs-22">
                            MH
                        </span>
                    </div>
                    <div class="flex-grow-1">
                        <!-- Name & Role -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Markus
                                    Hoffmann</a>
                            </h5>
                            <span class="badge badge-label bg-success">Active Client</span>
                        </div>
                        <p class="mb-3 text-muted fs-xs">Operations Manager at Nordexa AG</p>
                        <!-- Contact Info -->
                        <div class="mb-2">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">markus.h@nordexa.de</a>
                                </h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-xs avatar-img-size fs-24">
                                    <span class="avatar-title text-bg-light fs-sm rounded-circle">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                </div>
                                <h5 class="fs-base mb-0 fw-medium">
                                    <a class="link-reset" href="#">+49 160 445 7788</a>
                                </h5>
                            </div>
                        </div>
                        <!-- Tags -->
                        <div>
                            <span class="badge badge-soft-primary me-1">Logistics</span>
                            <span class="badge text-bg-light me-1">DACH</span>
                            <span class="badge badge-soft-success">Long-Term</span>
                        </div>
                    </div>
                </div>
                <!-- Footer with CRM metrics -->
                <div
                    class="card-footer bg-light-subtle d-flex justify-content-between text-center border-top border-dashed">
                    <div>
                        <h5 class="mb-0">$39.2k</h5><span class="text-muted">Total Value</span>
                    </div>
                    <div>
                        <h5 class="mb-0">3</h5><span class="text-muted">Open Deals</span>
                    </div>
                    <div>
                        <h5 class="mb-0">2</h5><span class="text-muted">Meetings</span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end row-->
    <ul class="pagination pagination-rounded pagination-boxed justify-content-center">
        <li class="page-item">
            <a aria-label="Previous" class="page-link" href="javascript: void(0);">
                <span aria-hidden="true">«</span>
            </a>
        </li>
        <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
        <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
        <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
        <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
        <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
        <li class="page-item">
            <a aria-label="Next" class="page-link" href="javascript: void(0);">
                <span aria-hidden="true">»</span>
            </a>
        </li>
    </ul>
@endsection

@section('scripts')
@endsection
