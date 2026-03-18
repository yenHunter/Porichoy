@extends('layouts.vertical', ['title' => 'Pricing'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Pages', 'title' => 'Pricing'])


    <div class="row mb-4">
        <!-- Starter Plan -->
        <div class="col-xl-3 col-md-6">
            <div class="card h-100 my-4 my-lg-0">
                <div class="card-body p-lg-4 pb-0 text-center">
                    <h3 class="fw-bold mb-1">Starter Plan</h3>
                    <p class="text-muted mb-0">Best for freelancers and personal use</p>
                    <div class="my-4">
                        <h1 class="display-6 fw-bold mb-0">$9</h1>
                        <small class="d-block text-muted fs-base">Billed monthly</small>
                        <small class="d-block text-muted">1 project included</small>
                    </div>
                    <ul class="list-unstyled text-start fs-sm mb-0">
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> 1 active project</li>
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Access to all components</li>
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Email support</li>
                        <li class="mb-2"><i class="ti ti-x text-danger me-2"></i> No team collaboration</li>
                        <li class="mb-2"><i class="ti ti-x text-danger me-2"></i> No SaaS rights</li>
                    </ul>
                </div>
                <div class="card-footer bg-transparent px-5 pb-4">
                    <a class="btn btn-outline-primary w-100 py-2 fw-semibold rounded-pill" href="#!">Choose Starter</a>
                </div>
            </div>
        </div>
        <!-- Professional Plan -->
        <div class="col-xl-3 col-md-6">
            <div class="card text-bg-primary h-100 my-4 my-lg-0">
                <div class="card-body p-lg-4 pb-0 text-center">
                    <h3 class="fw-bold mb-1">Professional</h3>
                    <p class="text-white-50 mb-0">Ideal for small teams and startups</p>
                    <div class="my-4">
                        <h1 class="display-6 fw-bold mb-0">$29</h1>
                        <small class="d-block text-white-50 fs-base">Billed monthly</small>
                        <small class="d-block text-white-50">Up to 5 projects</small>
                    </div>
                    <ul class="list-unstyled text-start fs-sm mb-0">
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> 5 active projects</li>
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Component + plugin access</li>
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Team collaboration</li>
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Priority email support</li>
                        <li class="mb-2"><i class="ti ti-x text-danger me-2"></i> No resale rights</li>
                    </ul>
                </div>
                <div class="card-footer bg-transparent px-5 pb-4">
                    <a class="btn btn-light w-100 py-2 fw-semibold rounded-pill" href="#!">Choose Professional</a>
                </div>
            </div>
        </div>
        <!-- Business Plan -->
        <div class="col-xl-3 col-md-6">
            <div class="card h-100 my-4 my-lg-0">
                <div class="card-body p-lg-4 pb-0 text-center">
                    <h3 class="fw-bold mb-1">Business</h3>
                    <p class="text-muted mb-0">For agencies and large teams</p>
                    <div class="my-4">
                        <h1 class="display-6 fw-bold mb-0">$79</h1>
                        <small class="d-block text-muted fs-base">Billed monthly</small>
                        <small class="d-block text-muted">Unlimited projects</small>
                    </div>
                    <ul class="list-unstyled text-start fs-sm mb-0">
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Unlimited projects</li>
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> SaaS &amp; client projects allowed
                        </li>
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> All premium components</li>
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Priority support</li>
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Team management tools</li>
                    </ul>
                </div>
                <div class="card-footer bg-transparent px-5 pb-4">
                    <a class="btn btn-dark w-100 py-2 fw-semibold rounded-pill" href="#!">Choose Business</a>
                </div>
            </div>
        </div>
        <!-- Enterprise Plan -->
        <div class="col-xl-3 col-md-6">
            <div class="card h-100 my-4 my-lg-0">
                <div class="card-body p-lg-4 pb-0 text-center">
                    <h3 class="fw-bold mb-1">Enterprise</h3>
                    <p class="text-muted mb-0">Custom plan for enterprises &amp; high-scale use</p>
                    <div class="my-4">
                        <h1 class="display-6 fw-bold mb-0">Contact Us</h1>
                        <small class="d-block text-muted fs-base">Custom monthly billing</small>
                        <small class="d-block text-muted">Based on usage &amp; team size</small>
                    </div>
                    <ul class="list-unstyled text-start fs-sm mb-0">
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Unlimited users &amp; usage</li>
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> White-label license</li>
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Custom integrations</li>
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> SLA + NDA agreements</li>
                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Dedicated manager &amp; support
                        </li>
                    </ul>
                </div>
                <div class="card-footer bg-transparent px-5 pb-4">
                    <a class="btn btn-outline-dark w-100 py-2 fw-semibold rounded-pill"
                        href="mailto:sales@example.com">Contact Sales</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
