@extends('layouts.vertical', ['title' => 'CRM Opportunities'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Apps', 'title' => 'Opportunities'])

    <div class="row">
        <div class="col-12">
            <div class="card" data-table="" data-table-rows-per-page="8">
                <div class="card-header border-light justify-content-between">
                    <div class="d-flex gap-2">
                        <div class="app-search">
                            <input class="form-control" data-table-search="" placeholder="Search opportunity..."
                                type="search" />
                            <i class="app-search-icon text-muted" data-lucide="search"></i>
                        </div>
                        <button class="btn btn-danger d-none" data-table-delete-selected="">Delete</button>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="me-2 fw-semibold">Filter By:</span>
                        <!-- Stage Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="stage">
                                <option value="">Stage</option>
                                <option value="Qualification">Qualification</option>
                                <option value="Proposal Sent">Proposal Sent</option>
                                <option value="Negotiation">Negotiation</option>
                                <option value="Won">Won</option>
                                <option value="Lost">Lost</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="shuffle"></i>
                        </div>
                        <!-- Status Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="status">
                                <option value="">Status</option>
                                <option value="Open">Open</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Closed">Closed</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="check-circle"></i>
                        </div>
                        <!-- Priority Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0" data-table-filter="priority">
                                <option value="">Priority</option>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="alert-circle"></i>
                        </div>
                        <!-- Records Per Page -->
                        <div>
                            <select class="form-select form-control my-1 my-md-0" data-table-set-rows-per-page="">
                                <option value="5">5</option>
                                <option selected="" value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-custom table-centered table-select table-hover w-100 mb-0">
                            <thead class="bg-light align-middle bg-opacity-25 thead-sm text-nowrap">
                                <tr class="text-uppercase fs-xxs">
                                    <th data-table-sort="">ID</th>
                                    <th>Opportunity</th>
                                    <th>Contact Person</th>
                                    <th data-column="stage" data-table-sort="">Stage</th>
                                    <th data-table-sort="">Value (USD)</th>
                                    <th data-table-sort="">Close Date</th>
                                    <th data-table-sort="">Lead Source</th>
                                    <th>Owner</th>
                                    <th data-column="status" data-table-sort="">Status</th>
                                    <th data-column="priority" data-table-sort="">Priority</th>
                                </tr>
                            </thead>
                            <tbody class="text-nowrap">
                                <tr>
                                    <td>#OP007501</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm border flex-shrink-0 border-dashed rounded me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Product" height="20" src="/images/logos/google.svg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium">
                                                    <a class="link-reset" data-sort="product" href="#!">Website
                                                        Redesign Deal</a>
                                                </p>
                                                <p class="text-muted mb-0 small">By: Google Inc.</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <img alt="Product" class="img-fluid rounded-circle"
                                                    src="/images/users/user-1.jpg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium">
                                                    <a class="link-reset" data-sort="product" href="#!">John Carter</a>
                                                </p>
                                                <p class="text-muted mb-0 small">john@acme.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Proposal Sent</td>
                                    <td>$12,500</td>
                                    <td>15 Aug, 2025</td>
                                    <td>Referral</td>
                                    <td>Sarah Johnson</td>
                                    <td><span class="badge badge-label badge-soft-success fs-xs">Open</span></td>
                                    <td><span class="badge text-bg-danger fs-xs">High</span></td>
                                </tr>
                                <tr>
                                    <td>#OP007502</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm flex-shrink-0 border border-dashed rounded me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Product" height="20" src="/images/logos/microsoft.svg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium">
                                                    <a class="link-reset" data-sort="product" href="#!">Enterprise
                                                        SaaS Suite</a>
                                                </p>
                                                <p class="text-muted mb-0 small">By: Microsoft Corp.</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <img alt="Product" class="img-fluid rounded-circle"
                                                    src="/images/users/user-2.jpg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium">
                                                    <a class="link-reset" data-sort="product" href="#!">Priya
                                                        Mehta</a>
                                                </p>
                                                <p class="text-muted mb-0 small">priya@globex.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Qualification</td>
                                    <td>$50,000</td>
                                    <td>10 Sep, 2025</td>
                                    <td>LinkedIn</td>
                                    <td>Michael Chen</td>
                                    <td><span class="badge badge-label badge-soft-warning fs-xs">In Progress</span></td>
                                    <td><span class="badge text-bg-warning fs-xs">Medium</span></td>
                                </tr>
                                <tr>
                                    <td>#OP009123</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm flex-shrink-0 border border-dashed rounded me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Product" height="20" src="/images/logos/google.svg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium">
                                                    <a class="link-reset" data-sort="product" href="#!">Cloud
                                                        Analytics Pro</a>
                                                </p>
                                                <p class="text-muted mb-0 small">By: Google LLC</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <img alt="Product" class="img-fluid rounded-circle"
                                                    src="/images/users/user-5.jpg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium">
                                                    <a class="link-reset" data-sort="product" href="#!">Aarav
                                                        Patel</a>
                                                </p>
                                                <p class="text-muted mb-0 small">aarav@nextgen.io</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Negotiation</td>
                                    <td>$75,000</td>
                                    <td>18 Oct, 2025</td>
                                    <td>Website</td>
                                    <td>Sophia Lee</td>
                                    <td><span class="badge badge-label badge-soft-danger fs-xs">Closed</span></td>
                                    <td><span class="badge text-bg-success fs-xs">Low</span></td>
                                </tr>
                                <tr>
                                    <td>#OP009201</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm flex-shrink-0 border border-dashed rounded me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Product" height="20" src="/images/logos/amazon.svg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium"><a class="link-reset" href="#!">Retail
                                                        Insights Pro</a></p>
                                                <p class="text-muted mb-0 small">By: Amazon Inc.</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <img alt="User" class="img-fluid rounded-circle"
                                                    src="/images/users/user-3.jpg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium"><a class="link-reset" href="#!">Meena
                                                        Roy</a></p>
                                                <p class="text-muted mb-0 small">meena@retailhub.io</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Won</td>
                                    <td>$92,000</td>
                                    <td>02 Nov, 2025</td>
                                    <td>Email</td>
                                    <td>Daniel Kim</td>
                                    <td><span class="badge badge-label badge-soft-danger fs-xs">Closed</span></td>
                                    <td><span class="badge text-bg-danger fs-xs">High</span></td>
                                </tr>
                                <tr>
                                    <td>#OP009202</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm flex-shrink-0 border border-dashed rounded me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Product" height="20" src="/images/logos/apple.svg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium"><a class="link-reset" href="#!">AI Compute
                                                        Suite</a></p>
                                                <p class="text-muted mb-0 small">By: Apple Inc.</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <img alt="User" class="img-fluid rounded-circle"
                                                    src="/images/users/user-7.jpg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium"><a class="link-reset" href="#!">Kabir
                                                        Shah</a></p>
                                                <p class="text-muted mb-0 small">kabir@aicore.ai</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Qualification</td>
                                    <td>$64,500</td>
                                    <td>15 Oct, 2025</td>
                                    <td>Referral</td>
                                    <td>Emily Davis</td>
                                    <td><span class="badge badge-label badge-soft-success fs-xs">Open</span></td>
                                    <td><span class="badge text-bg-danger fs-xs">High</span></td>
                                </tr>
                                <tr>
                                    <td>#OP009203</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm flex-shrink-0 border border-dashed rounded me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Product" height="20" src="/images/logos/dropbox.svg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium"><a class="link-reset" href="#!">Ad Manager
                                                        Pro</a></p>
                                                <p class="text-muted mb-0 small">By: Dropbox</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <img alt="User" class="img-fluid rounded-circle"
                                                    src="/images/users/user-4.jpg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium"><a class="link-reset" href="#!">Sana
                                                        Iqbal</a></p>
                                                <p class="text-muted mb-0 small">sana@adstack.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Won</td>
                                    <td>$120,000</td>
                                    <td>09 Dec, 2025</td>
                                    <td>LinkedIn</td>
                                    <td>John Carter</td>
                                    <td><span class="badge badge-label badge-soft-danger fs-xs">Closed</span></td>
                                    <td><span class="badge text-bg-success fs-xs">Low</span></td>
                                </tr>
                                <tr>
                                    <td>#OP009204</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm flex-shrink-0 border border-dashed rounded me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Product" height="20" src="/images/logos/slack.svg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium"><a class="link-reset" href="#!">TeamCollab
                                                        Enterprise</a></p>
                                                <p class="text-muted mb-0 small">By: Slack Technologies</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <img alt="User" class="img-fluid rounded-circle"
                                                    src="/images/users/user-6.jpg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium"><a class="link-reset" href="#!">Jatin
                                                        Desai</a></p>
                                                <p class="text-muted mb-0 small">jatin@collabzone.net</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Proposal Sent</td>
                                    <td>$48,000</td>
                                    <td>30 Sep, 2025</td>
                                    <td>Webinar</td>
                                    <td>Ashley Moore</td>
                                    <td><span class="badge badge-label badge-soft-warning fs-xs">In Progress</span></td>
                                    <td><span class="badge text-bg-success fs-xs">Low</span></td>
                                </tr>
                                <tr>
                                    <td>#OP009205</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm flex-shrink-0 border border-dashed rounded me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Product" height="20" src="/images/logos/spotify.svg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium"><a class="link-reset" href="#!">Virtual
                                                        Events Suite</a></p>
                                                <p class="text-muted mb-0 small">By: Spotify Inc.</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <img alt="User" class="img-fluid rounded-circle"
                                                    src="/images/users/user-8.jpg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium"><a class="link-reset" href="#!">Lina
                                                        George</a></p>
                                                <p class="text-muted mb-0 small">lina@meetpro.io</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Lost</td>
                                    <td>$33,000</td>
                                    <td>22 Oct, 2025</td>
                                    <td>Cold Call</td>
                                    <td>Mark Evans</td>
                                    <td><span class="badge badge-label badge-soft-danger fs-xs">Closed</span></td>
                                    <td><span class="badge text-bg-warning fs-xs">Medium</span></td>
                                </tr>
                                <tr>
                                    <td>#OP009312</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm flex-shrink-0 border border-dashed rounded me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Product" height="20" src="/images/logos/starbucks.svg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium"><a class="link-reset"
                                                        href="#!">Streamlytics Dashboard</a></p>
                                                <p class="text-muted mb-0 small">By: Starbucks Inc.</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <img alt="User" class="img-fluid rounded-circle"
                                                    src="/images/users/user-10.jpg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium"><a class="link-reset" href="#!">Ravi
                                                        Khanna</a></p>
                                                <p class="text-muted mb-0 small">ravi@streamlytics.co</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Qualification</td>
                                    <td>$58,900</td>
                                    <td>05 Nov, 2025</td>
                                    <td>Trade Show</td>
                                    <td>Jessica Moore</td>
                                    <td><span class="badge badge-label badge-soft-warning fs-xs">In Progress</span></td>
                                    <td><span class="badge text-bg-danger fs-xs">High</span></td>
                                </tr>
                                <tr>
                                    <td>#OP009313</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm flex-shrink-0 border border-dashed rounded me-2 justify-content-center d-flex align-items-center">
                                                <img alt="Product" height="20" src="/images/logos/airbnb.svg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium"><a class="link-reset"
                                                        href="#!">Hospitality CRM Suite</a></p>
                                                <p class="text-muted mb-0 small">By: Airbnb Inc.</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <img alt="User" class="img-fluid rounded-circle"
                                                    src="/images/users/user-9.jpg" />
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-medium"><a class="link-reset" href="#!">Isabella
                                                        Wang</a></p>
                                                <p class="text-muted mb-0 small">isabella@aircrm.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Proposal Sent</td>
                                    <td>$41,200</td>
                                    <td>12 Nov, 2025</td>
                                    <td>Inbound</td>
                                    <td>Thomas Blake</td>
                                    <td><span class="badge badge-label badge-soft-success fs-xs">Open</span></td>
                                    <td><span class="badge text-bg-warning fs-xs">Medium</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table-respo.-->
                </div> <!-- end card-body-->
                <div class="card-footer border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div data-table-pagination-info="Opportunities"></div>
                        <div data-table-pagination=""></div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')
    @vite(['resources/js/pages/custom-table.js'])
@endsection
