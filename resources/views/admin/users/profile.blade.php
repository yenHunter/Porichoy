@extends('layouts.vertical', ['title' => 'Profile'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Users', 'title' => 'Profile'])

    <div class="row">
        <div class="col-12">
            <article class="card overflow-hidden mb-0">
                <div class="position-relative card-side-img overflow-hidden"
                    style="min-height: 300px; background-image: url(/images/profile-bg.jpg);">
                    <div
                        class="p-4 card-img-overlay rounded-start-0 auth-overlay d-flex align-items-center flex-column justify-content-center">
                        <h3 class="text-white mb-1 fst-italic">"Crafting innovation through clean design"</h3>
                        <p class="text-white mb-4">– MyStatus</p>
                    </div>
                </div>
            </article>
        </div> <!-- end col-->
    </div> <!-- end row-->
    <div class="px-3 mt-n4">
        <div class="row">
            <div class="col-xl-4">
                <div class="card card-top-sticky">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="me-3 position-relative">
                                <img alt="avatar" class="rounded-circle" height="72" src="/images/users/user-3.jpg"
                                    width="72" />
                            </div>
                            <div>
                                <h5 class="mb-0 d-flex align-items-center">
                                    <a class="link-reset" href="#!">Geneva Lee</a>
                                    <img alt="US" class="ms-2 rounded-circle" height="16"
                                        src="/images/flags/us.svg" />
                                </h5>
                                <p class="text-muted mb-2">Senior Developer</p>
                                <span class="badge text-bg-light badge-label">Team Lead</span>
                            </div>
                            <div class="ms-auto">
                                <div class="dropdown">
                                    <a class="btn btn-icon btn-ghost-light text-muted" data-bs-toggle="dropdown"
                                        href="#">
                                        <i class="ti ti-dots-vertical fs-xl"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                        <li><a class="dropdown-item text-danger" href="#">Report</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div
                                    class="avatar-sm text-bg-light bg-opacity-75 d-flex align-items-center justify-content-center rounded-circle">
                                    <i class="ti ti-briefcase fs-xl"></i>
                                </div>
                                <p class="mb-0 fs-sm">UI/UX Designer &amp; Full-Stack Developer</p>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div
                                    class="avatar-sm text-bg-light bg-opacity-75 d-flex align-items-center justify-content-center rounded-circle">
                                    <i class="ti ti-school fs-xl"></i>
                                </div>
                                <p class="mb-0 fs-sm">Studied at <span class="text-dark fw-semibold">Stanford
                                        University</span>
                                </p>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div
                                    class="avatar-sm text-bg-light bg-opacity-75 d-flex align-items-center justify-content-center rounded-circle">
                                    <i class="ti ti-map-pin fs-xl"></i>
                                </div>
                                <p class="mb-0 fs-sm">Lives in <span class="text-dark fw-semibold">San Francisco, CA</span>
                                </p>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div
                                    class="avatar-sm text-bg-light bg-opacity-75 d-flex align-items-center justify-content-center rounded-circle">
                                    <i class="ti ti-users fs-xl"></i>
                                </div>
                                <p class="mb-0 fs-sm">Followed by <span class="text-dark fw-semibold">25.3k People</span>
                                </p>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div
                                    class="avatar-sm text-bg-light bg-opacity-75 d-flex align-items-center justify-content-center rounded-circle">
                                    <i class="ti ti-mail fs-xl"></i>
                                </div>
                                <p class="mb-0 fs-sm">Email <a class="text-primary fw-semibold"
                                        href="mailto:hello@example.com">hello@example.com</a>
                                </p>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div
                                    class="avatar-sm text-bg-light bg-opacity-75 d-flex align-items-center justify-content-center rounded-circle">
                                    <i class="ti ti-link fs-xl"></i>
                                </div>
                                <p class="mb-0 fs-sm">Website <a class="text-primary fw-semibold"
                                        href="https://www.example.dev">www.example.dev</a>
                                </p>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div
                                    class="avatar-sm text-bg-light bg-opacity-75 d-flex align-items-center justify-content-center rounded-circle">
                                    <i class="ti ti-world fs-xl"></i>
                                </div>
                                <p class="mb-0 fs-sm">Languages <span class="text-dark fw-semibold">English, Hindi,
                                        Japanese</span>
                                </p>
                            </div>
                            <div class="d-flex justify-content-center gap-2 mt-4 mb-2">
                                <a class="btn btn-icon rounded-circle btn-primary" href="#!" title="Facebook">
                                    <i class="fs-xl" data-lucide="facebook"></i>
                                </a>
                                <a class="btn btn-icon rounded-circle btn-info" href="#!" title="Twitter-x">
                                    <i class="ti ti-brand-x fs-xl"></i>
                                </a>
                                <a class="btn btn-icon rounded-circle btn-danger" href="#!" title="Instagram">
                                    <i class="fs-xl" data-lucide="instagram"></i>
                                </a>
                                <a class="btn btn-icon rounded-circle btn-success" href="#!" title="WhatsApp">
                                    <i class="fs-xl" data-lucide="dribbble"></i>
                                </a>
                                <a class="btn btn-icon rounded-circle btn-secondary" href="#!" title="LinkedIn">
                                    <i class="fs-xl" data-lucide="linkedin"></i>
                                </a>
                                <a class="btn btn-icon rounded-circle btn-danger" href="#!" title="YouTube">
                                    <i class="fs-xl" data-lucide="youtube"></i>
                                </a>
                            </div>
                        </div> <!-- -->
                        <h4 class="card-title mb-3 mt-4">Skills</h4>
                        <div class="d-flex flex-wrap gap-1">
                            <a class="btn btn-light btn-sm" href="#">Product Design</a>
                            <a class="btn btn-light btn-sm" href="#">UI/UX</a>
                            <a class="btn btn-light btn-sm" href="#">Tailwind CSS</a>
                            <a class="btn btn-light btn-sm" href="#">Bootstrap</a>
                            <a class="btn btn-light btn-sm" href="#">React.js</a>
                            <a class="btn btn-light btn-sm" href="#">Next.js</a>
                            <a class="btn btn-light btn-sm" href="#">Vue.js</a>
                            <a class="btn btn-light btn-sm" href="#">Figma</a>
                            <a class="btn btn-light btn-sm" href="#">Design Systems</a>
                            <a class="btn btn-light btn-sm" href="#">Template Authoring</a>
                            <a class="btn btn-light btn-sm" href="#">Responsive Design</a>
                            <a class="btn btn-light btn-sm" href="#">Component Libraries</a>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header card-tabs d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="card-title">My Account</h4>
                        </div>
                        <ul class="nav nav-tabs card-header-tabs nav-bordered">
                            <li class="nav-item">
                                <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#about-me">
                                    <i class="ti ti-home d-md-none d-block"></i>
                                    <span class="d-none d-md-block fw-bold">About Me</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a aria-expanded="true" class="nav-link active" data-bs-toggle="tab" href="#timeline">
                                    <i class="ti ti-user-circle d-md-none d-block"></i>
                                    <span class="d-none d-md-block fw-bold">Timeline</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a aria-expanded="false" class="nav-link" data-bs-toggle="tab" href="#settings">
                                    <i class="ti ti-settings d-md-none d-block"></i>
                                    <span class="d-none d-md-block fw-bold">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane" id="about-me">
                                <p>I'm an Admin Template Author dedicated to building clean, efficient, and highly
                                    customizable dashboards for developers and businesses. My goal is to create UI solutions
                                    that are modern, scalable, and easy to integrate.</p>
                                <p>I specialize in crafting developer-friendly admin panels and UI kits using frameworks
                                    like Bootstrap, Tailwind CSS, React, Vue, Angular, Laravel, and Next.js. My templates
                                    are designed to accelerate development and provide a strong foundation for web apps,
                                    SaaS platforms, and enterprise tools.</p>
                                <p class="mb-0">I focus on delivering well-structured, pixel-perfect layouts with a
                                    user-centric approach—ensuring responsive design, clean code, and seamless user
                                    experiences. Whether you're building a CRM, analytics dashboard, or backend system, my
                                    templates are made to help you build faster and smarter.</p>
                                <h4 class="card-title my-3 text-uppercase fs-sm"><i class="ti ti-briefcase"></i>
                                    Professional Experience:</h4>
                                <div class="timeline">
                                    <!-- Experience 1 -->
                                    <div class="timeline-item d-flex align-items-stretch">
                                        <div class="timeline-time pe-3 text-muted">2023 – Present</div>
                                        <div class="timeline-dot bg-primary"></div>
                                        <div class="timeline-content ps-3 pb-4">
                                            <h5 class="mb-1">Lead UI Developer</h5>
                                            <p class="mb-1 text-muted">Developing scalable and reusable UI components for
                                                SaaS dashboards using React, Tailwind CSS, and TypeScript.</p>
                                            <span class="text-muted fw-semibold">at CraftCode Studio</span>
                                        </div>
                                    </div>
                                    <!-- Experience 2 -->
                                    <div class="timeline-item d-flex align-items-stretch">
                                        <div class="timeline-time pe-3 text-muted">2021 – 2023</div>
                                        <div class="timeline-dot bg-success"></div>
                                        <div class="timeline-content ps-3 pb-4">
                                            <h5 class="mb-1">Frontend Engineer</h5>
                                            <p class="mb-1 text-muted">Built modern, responsive admin templates and UI kits
                                                using Vue, Bootstrap 5, and Laravel Blade.</p>
                                            <span class="text-muted fw-semibold">at CodeNova</span>
                                        </div>
                                    </div>
                                    <!-- Experience 3 -->
                                    <div class="timeline-item d-flex align-items-stretch">
                                        <div class="timeline-time pe-3 text-muted">2019 – 2021</div>
                                        <div class="timeline-dot bg-warning"></div>
                                        <div class="timeline-content ps-3 pb-4">
                                            <h5 class="mb-1">UI/UX Designer &amp; Developer</h5>
                                            <p class="mb-1 text-muted">Designed and developed dashboard layouts and admin
                                                panel concepts, focusing on accessibility and performance.</p>
                                            <span class="text-muted fw-semibold">as Freelancer</span>
                                        </div>
                                    </div>
                                    <!-- Experience 4 -->
                                    <div class="timeline-item d-flex align-items-stretch">
                                        <div class="timeline-time pe-3 text-muted">2017 – 2019</div>
                                        <div class="timeline-dot bg-info"></div>
                                        <div class="timeline-content ps-3 pb-4">
                                            <h5 class="mb-1">Web Designer</h5>
                                            <p class="mb-1 text-muted">Created responsive HTML/CSS templates and themes for
                                                clients in eCommerce and portfolio niches.</p>
                                            <span class="text-muted fw-semibold">at PixelFrame Agency</span>
                                        </div>
                                    </div>
                                    <!-- Experience 5 -->
                                    <div class="timeline-item d-flex align-items-stretch">
                                        <div class="timeline-time pe-3 text-muted">2015 – 2017</div>
                                        <div class="timeline-dot bg-secondary"></div>
                                        <div class="timeline-content ps-3">
                                            <h5 class="mb-1">Junior Frontend Developer</h5>
                                            <p class="mb-1 text-muted">Maintained and updated legacy UI projects, gaining
                                                hands-on experience in HTML, CSS, jQuery, and Bootstrap 3.</p>
                                            <span class="text-muted fw-semibold">at DevLaunch</span>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title my-3 text-uppercase fs-sm"><i class="ti ti-checklist"></i> Tasks
                                    Overview:</h4>
                                <div class="table-responsive">
                                    <table
                                        class="table table-centered table-custom table-sm table-nowrap table-hover mb-0">
                                        <thead class="bg-light bg-opacity-25 thead-sm">
                                            <tr class="text-uppercase fs-xxs">
                                                <th data-table-sort="task">Task</th>
                                                <th data-table-sort="">Status</th>
                                                <th data-table-sort="name">Assigned By</th>
                                                <th data-table-sort="">Start Date</th>
                                                <th data-table-sort="">Priority</th>
                                                <th data-table-sort="">Progress</th>
                                                <th data-table-sort="">Total Time Spent</th>
                                                <th style="width: 30px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h5 class="fs-sm my-1"><a class="text-body" href="#">Blazor
                                                            Admin Theme – Final QA</a></h5>
                                                    <span class="text-muted fs-xs">Due in 3 days</span>
                                                </td>
                                                <td><span class="badge badge-soft-warning">In-progress</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="avatar avatar-sm">
                                                            <img alt="avatar" class="img-fluid rounded-circle"
                                                                src="/images/users/user-7.jpg" />
                                                        </div>
                                                        <div>
                                                            <h5 class="text-nowrap fs-sm mb-0">Jordan Walsh</h5>
                                                            <p class="text-muted fs-xs mb-0">jordan@uxlabs.io</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Jul 20, 2025</td>
                                                <td><span class="badge badge-soft-danger">High</span></td>
                                                <td>60%</td>
                                                <td>9h 10min</td>
                                                <td><a class="text-muted fs-xxl" href="#"><i
                                                            class="ti ti-pencil"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="fs-sm my-1"><a class="text-body" href="#">Vue 3 UI
                                                            Kit Refactor</a></h5>
                                                    <span class="text-muted fs-xs">Due in 8 days</span>
                                                </td>
                                                <td><span class="badge badge-soft-success">Completed</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="avatar avatar-sm">
                                                            <img alt="avatar" class="img-fluid rounded-circle"
                                                                src="/images/users/user-8.jpg" />
                                                        </div>
                                                        <div>
                                                            <h5 class="text-nowrap fs-sm mb-0">Emily Foster</h5>
                                                            <p class="text-muted fs-xs mb-0">emily@devspark.pro</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Jul 10, 2025</td>
                                                <td><span class="badge badge-soft-success">Low</span></td>
                                                <td>100%</td>
                                                <td>27h 20min</td>
                                                <td><a class="text-muted fs-xxl" href="#"><i
                                                            class="ti ti-pencil"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="fs-sm my-1"><a class="text-body" href="#">HTML Email
                                                            Templates Pack</a></h5>
                                                    <span class="text-muted fs-xs">Due in 1 day</span>
                                                </td>
                                                <td><span class="badge badge-soft-warning">In-progress</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="avatar avatar-sm">
                                                            <img alt="avatar" class="img-fluid rounded-circle"
                                                                src="/images/users/user-9.jpg" />
                                                        </div>
                                                        <div>
                                                            <h5 class="text-nowrap fs-sm mb-0">Ella Newman</h5>
                                                            <p class="text-muted fs-xs mb-0">ella@mailgenius.app</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Jul 18, 2025</td>
                                                <td><span class="badge badge-soft-primary">Medium</span></td>
                                                <td>55%</td>
                                                <td>5h 40min</td>
                                                <td><a class="text-muted fs-xxl" href="#"><i
                                                            class="ti ti-pencil"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="fs-sm my-1"><a class="text-body" href="#">Bootstrap
                                                            5 Theme Migration</a></h5>
                                                    <span class="text-muted fs-xs">Due in 6 days</span>
                                                </td>
                                                <td><span class="badge badge-soft-dark">On Hold</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="avatar avatar-sm">
                                                            <img alt="avatar" class="img-fluid rounded-circle"
                                                                src="/images/users/user-10.jpg" />
                                                        </div>
                                                        <div>
                                                            <h5 class="text-nowrap fs-sm mb-0">Daniel Rhodes</h5>
                                                            <p class="text-muted fs-xs mb-0">daniel@uideck.net</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Jul 16, 2025</td>
                                                <td><span class="badge badge-soft-secondary">Low</span></td>
                                                <td>25%</td>
                                                <td>4h 15min</td>
                                                <td><a class="text-muted fs-xxl" href="#"><i
                                                            class="ti ti-pencil"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="fs-sm my-1"><a class="text-body" href="#">SaaS
                                                            Dashboard: UX Testing</a></h5>
                                                    <span class="text-muted fs-xs">Due in 9 days</span>
                                                </td>
                                                <td><span class="badge badge-soft-danger">Outdated</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="avatar avatar-sm">
                                                            <img alt="avatar" class="img-fluid rounded-circle"
                                                                src="/images/users/user-2.jpg" />
                                                        </div>
                                                        <div>
                                                            <h5 class="text-nowrap fs-sm mb-0">Leo Patterson</h5>
                                                            <p class="text-muted fs-xs mb-0">leo@uxcore.studio</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Jul 05, 2025</td>
                                                <td><span class="badge badge-soft-danger">High</span></td>
                                                <td>20%</td>
                                                <td>12h 30min</td>
                                                <td><a class="text-muted fs-xxl" href="#"><i
                                                            class="ti ti-pencil"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end About Me data-->
                            <div class="tab-pane show active" id="timeline">
                                <!-- comment box -->
                                <form action="#" class="mb-3">
                                    <textarea class="form-control" placeholder="Write something..." rows="3"></textarea>
                                    <div class="d-flex py-2 justify-content-between">
                                        <div>
                                            <a class="btn btn-sm btn-icon btn-light" href="#"><i
                                                    class="ti ti-user fs-md"></i></a>
                                            <a class="btn btn-sm btn-icon btn-light" href="#"><i
                                                    class="ti ti-map-pin fs-md"></i></a>
                                            <a class="btn btn-sm btn-icon btn-light" href="#"><i
                                                    class="ti ti-camera fs-md"></i></a>
                                            <a class="btn btn-sm btn-icon btn-light" href="#"><i
                                                    class="ti ti-mood-smile fs-md"></i></a>
                                        </div>
                                        <button class="btn btn-sm btn-dark" type="submit">Post</button>
                                    </div>
                                </form>
                                <!-- end comment box -->
                                <!-- Story Box-->
                                <div class="border border-light border-dashed rounded p-2 mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <img alt="Generic placeholder image" class="me-2 avatar-md rounded-circle"
                                            src="/images/users/user-3.jpg" />
                                        <div class="w-100">
                                            <h5 class="m-0">Jeremy Tomlinson</h5>
                                            <p class="text-muted mb-0"><small>about 2 minutes ago</small></p>
                                        </div>
                                    </div>
                                    <p>Story based around the idea of time lapse, animation to post soon!</p>
                                    <img alt="post-img" class="rounded me-1" height="60"
                                        src="/images/stock/small-1.jpg">
                                    <img alt="post-img" class="rounded me-1" height="60"
                                        src="/images/stock/small-2.jpg">
                                    <img alt="post-img" class="rounded" height="60" src="/images/stock/small-3.jpg">
                                    <div class="mt-2">
                                        <a class="btn btn-sm btn-link text-muted" href="javascript: void(0);"><i
                                                class="ti ti-arrow-back-up fs-sm me-1"></i> Reply</a>
                                        <a class="btn btn-sm btn-link text-muted" href="javascript: void(0);"><i
                                                class="ti ti-heart fs-sm me-1"></i> Like</a>
                                        <a class="btn btn-sm btn-link text-muted" href="javascript: void(0);"><i
                                                class="ti ti-share-3 fs-sm me-1"></i> Share</a>
                                    </div>
                                    </img></img></img>
                                </div>
                                <!-- Story Box-->
                                <div class="border border-light border-dashed rounded p-2 mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <img alt="Generic placeholder image" class="me-2 avatar-sm rounded-circle"
                                            src="/images/users/user-4.jpg" />
                                        <div class="w-100">
                                            <h5 class="m-0">Sophia Martinez</h5>
                                            <p class="text-muted mb-0"><small>about 30 minutes ago</small></p>
                                        </div>
                                    </div>
                                    <div class="fs-16 text-center mt-3 mb-4 fst-italic">
                                        <i class="ti ti-quote fs-20"></i>
                                        Just finished a weekend project! Built a small weather app using React and
                                        OpenWeather API.
                                        Feeling excited to share the results with everyone soon. 🚀
                                    </div>
                                    <div class="bg-light-subtle m-n2 p-2 border-top border-bottom border-dashed">
                                        <div class="d-flex align-items-start">
                                            <img alt="Generic placeholder image" class="me-2 avatar-sm rounded-circle"
                                                src="/images/users/user-1.jpg" />
                                            <div class="w-100">
                                                <h5 class="mt-0 mb-1">
                                                    Liam Johnson <small class="text-muted">10 minutes ago</small>
                                                </h5>
                                                That sounds awesome! Can't wait to see how you designed the UI.
                                                <br />
                                                <a class="text-muted font-13 d-inline-block mt-2"
                                                    href="javascript:void(0);">
                                                    <i class="ti ti-arrow-back-up"></i> Reply
                                                </a>
                                                <div class="d-flex align-items-start mt-3">
                                                    <a class="pe-2" href="#">
                                                        <img alt="Generic placeholder image"
                                                            class="avatar-sm rounded-circle"
                                                            src="/images/users/user-2.jpg" />
                                                    </a>
                                                    <div class="w-100">
                                                        <h5 class="mt-0 mb-1">
                                                            Olivia Carter <small class="text-muted">15 minutes ago</small>
                                                        </h5>
                                                        I recently built something similar with Vue. Let's collaborate
                                                        sometime!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start mt-2">
                                            <a class="pe-2" href="#">
                                                <img alt="Generic placeholder image" class="rounded-circle"
                                                    height="31" src="/images/users/user-3.jpg" />
                                            </a>
                                            <div class="w-100">
                                                <input class="form-control form-control-sm" id="simpleinput"
                                                    placeholder="Add a comment..." type="text" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a class="btn btn-sm btn-link text-danger" href="javascript:void(0);">
                                            <i class="ti ti-heart me-1 fs-sm"></i> Like (45)
                                        </a>
                                        <a class="btn btn-sm btn-link text-muted" href="javascript:void(0);">
                                            <i class="ti ti-share-3 me-1 fs-sm"></i> Share
                                        </a>
                                    </div>
                                </div>
                                <!-- Story Box -->
                                <div class="border border-light border-dashed rounded p-2 mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <img alt="Profile photo of Anika Roy" class="me-2 avatar-sm rounded-circle"
                                            src="/images/users/user-2.jpg" />
                                        <div class="w-100">
                                            <h5 class="m-0">Anika Roy</h5>
                                            <p class="text-muted mb-0"><small>2 hours ago</small></p>
                                        </div>
                                    </div>
                                    <p>Sharing a couple of timelapses from my recent Iceland trip. Let me know which one you
                                        like most!</p>
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <div class="ratio ratio-16x9 rounded overflow-hidden">
                                                <iframe allowfullscreen=""
                                                    src="https://player.vimeo.com/video/1084537"></iframe>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ratio ratio-16x9 rounded overflow-hidden">
                                                <iframe allowfullscreen=""
                                                    src="https://player.vimeo.com/video/76979871"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center gap-2 p-3">
                                    <strong>Loading...</strong>
                                    <div aria-hidden="true" class="spinner-border spinner-border-sm text-danger"
                                        role="status"></div>
                                </div>
                            </div>
                            <!-- end timeline tabs data-->
                            <div class="tab-pane" id="settings">
                                <form>
                                    <!-- Personal Info -->
                                    <h5
                                        class="mb-3 text-uppercase bg-light-subtle p-1 border-dashed border rounded border-light text-center">
                                        <i class="ti ti-user-circle me-1"></i> Personal Info</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="firstname">First Name</label>
                                                <input class="form-control" id="firstname" placeholder="Enter first name"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="lastname">Last Name</label>
                                                <input class="form-control" id="lastname" placeholder="Enter last name"
                                                    type="text" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="jobtitle">Job Title</label>
                                                <input class="form-control" id="jobtitle"
                                                    placeholder="e.g. UI Developer, Designer" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="phone">Phone Number</label>
                                                <input class="form-control" id="phone" placeholder="+1 234 567 8901"
                                                    type="text" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="userbio">Bio</label>
                                        <textarea class="form-control" id="userbio" placeholder="Write something about yourself..." rows="4"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="useremail">Email Address</label>
                                                <input class="form-control" id="useremail" placeholder="Enter email"
                                                    type="email" />
                                                <span class="form-text fs-xs fst-italic text-muted"><a class="link-reset"
                                                        href="#">Click here to change your email</a></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <input class="form-control" id="userpassword"
                                                    placeholder="Enter new password" type="password" />
                                                <span class="form-text fs-xs fst-italic text-muted"><a class="link-reset"
                                                        href="#">Click here to change your password</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="profilephoto">Profile Photo</label>
                                        <input class="form-control" id="profilephoto" type="file" />
                                    </div>
                                    <!-- Address Info -->
                                    <h5
                                        class="mb-3 text-uppercase bg-light-subtle p-1 border-dashed border rounded border-light text-center">
                                        <i class="ti ti-map-pin me-1"></i> Address Info
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="address-line1">Address Line 1</label>
                                                <input class="form-control" id="address-line1"
                                                    placeholder="Street, Apartment, Unit, etc." type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="address-line2">Address Line 2</label>
                                                <input class="form-control" id="address-line2" placeholder="Optional"
                                                    type="text" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="city">City</label>
                                                <input class="form-control" id="city" placeholder="City"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="state">State / Province</label>
                                                <input class="form-control" id="state"
                                                    placeholder="State or Province" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="zipcode">Postal / ZIP Code</label>
                                                <input class="form-control" id="zipcode" placeholder="Postal Code"
                                                    type="text" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="country">Country</label>
                                                <input class="form-control" id="country" placeholder="Country"
                                                    type="text" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Company Info -->
                                    <h5
                                        class="mb-3 text-uppercase bg-light-subtle p-1 border-dashed border rounded border-light text-center">
                                        <i class="ti ti-building-skyscraper me-1"></i> Company Info</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="companyname">Company Name</label>
                                                <input class="form-control" id="companyname"
                                                    placeholder="Enter company name" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="cwebsite">Website</label>
                                                <input class="form-control" id="cwebsite"
                                                    placeholder="https://yourcompany.com" type="text" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Social -->
                                    <h5
                                        class="mb-3 text-uppercase bg-light-subtle p-1 border-dashed border rounded border-light text-center">
                                        <i class="ti ti-world me-1"></i> Social</h5>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="social-fb">Facebook</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="ti ti-brand-facebook"></i></span>
                                                <input class="form-control" id="social-fb" placeholder="Facebook URL"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="social-tw">Twitter X</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="ti ti-brand-x"></i></span>
                                                <input class="form-control" id="social-tw" placeholder="@username"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="social-insta">Instagram</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="ti ti-brand-instagram"></i></span>
                                                <input class="form-control" id="social-insta" placeholder="Instagram URL"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="social-lin">LinkedIn</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="ti ti-brand-linkedin"></i></span>
                                                <input class="form-control" id="social-lin"
                                                    placeholder="LinkedIn Profile" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="social-gh">GitHub</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="ti ti-brand-github"></i></span>
                                                <input class="form-control" id="social-gh" placeholder="GitHub Username"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="social-sky">Skype</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="ti ti-brand-skype"></i></span>
                                                <input class="form-control" id="social-sky" placeholder="@username"
                                                    type="text" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Submit -->
                                    <div class="text-end mt-4">
                                        <button class="btn btn-success" type="submit"><i
                                                class="ti ti-device-floppy me-1"></i> Save Changes</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end settings Data-->
                        </div> <!-- end tab content-->
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row-->
    </div>
@endsection

@section('scripts')
@endsection
