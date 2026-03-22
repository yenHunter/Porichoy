@extends('layouts.vertical', ['title' => 'Contacts'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Apps', 'title' => 'Contacts'])

    <div class="row">
        <div class="col-lg-12">
            <form class="card border p-3">
                <div class="row gap-3">
                    <!-- Search Input -->
                    <div class="col-lg-4">
                        <div class="app-search">
                            <input class="form-control" placeholder="Search contact name..." type="text" />
                            <i class="app-search-icon text-muted" data-lucide="search"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <span class="me-2 fw-semibold">Filter By:</span>
                            <!-- Designation Filter -->
                            <div class="app-search">
                                <select class="form-select form-control my-1 my-md-0">
                                    <option selected="">Designation</option>
                                    <option value="Backend Engineer">Backend Engineer</option>
                                    <option value="Content Strategist">Content Strategist</option>
                                    <option value="Full Stack Developer">Full Stack Developer</option>
                                    <option value="Data Scientist">Data Scientist</option>
                                </select>
                                <i class="app-search-icon text-muted" data-lucide="user-check"></i>
                            </div>
                            <!-- Location Filter -->
                            <div class="app-search">
                                <select class="form-select form-control my-1 my-md-0">
                                    <option selected="">Location</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Egypt">Egypt</option>
                                </select>
                                <i class="app-search-icon text-muted" data-lucide="map-pin"></i>
                            </div>
                            <!-- Department Filter -->
                            <div class="app-search">
                                <select class="form-select form-control my-1 my-md-0">
                                    <option selected="">Department</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Development">Development</option>
                                    <option value="Data">Data</option>
                                </select>
                                <i class="app-search-icon text-muted" data-lucide="layers"></i>
                            </div>
                            <!-- Submit Button -->
                            <button class="btn btn-secondary" type="submit">Apply</button>
                            <!-- Layout Toggle Buttons -->
                            <div aria-label="Layout toggle button group" class="ms-auto flex-shrink-0" role="group">
                                <input checked="" class="btn-check" id="btnradio1" name="btnradio" type="radio" />
                                <label class="btn btn-soft-primary btn-icon" for="btnradio1">
                                    <i class="fs-lg" data-lucide="layout-grid"></i>
                                </label>
                                <input class="btn-check" id="btnradio2" name="btnradio" type="radio" />
                                <label class="btn btn-soft-primary btn-icon" for="btnradio2">
                                    <i class="fs-lg" data-lucide="list"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <!-- Profile Card 1: Sophia Carter -->
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body text-center">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle" height="72" src="/images/users/user-1.jpg"
                        width="72" />
                    <!-- Name & Flag -->
                    <h5 class="mb-0 mt-2 d-flex align-items-center justify-content-center">
                        <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Sophia Carter</a>
                        <img alt="UK" class="ms-1 rounded" height="16" src="/images/flags/gb.svg" />
                    </h5>
                    <!-- Designation & Badge -->
                    <span class="text-muted fs-xs">Lead UI/UX Designer</span><br />
                    <span class="badge bg-secondary my-1">Admin</span><br />
                    <!-- Bio Line -->
                    <span class="text-muted">@Founder | <a class="text-decoration-none text-danger"
                            href="#">sophiacarter.com</a></span>
                    <!-- Buttons -->
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm me-1">Message</button>
                        <button class="btn btn-outline-secondary btn-sm">Follow</button>
                    </div>
                    <!-- Divider -->
                    <hr class="my-3 border-dashed" />
                    <!-- Stats -->
                    <div class="d-flex justify-content-between text-center">
                        <div>
                            <h5 class="mb-0">134</h5><span class="text-muted">Posts</span>
                        </div>
                        <div>
                            <h5 class="mb-0">29.8k</h5><span class="text-muted">Followers</span>
                        </div>
                        <div>
                            <h5 class="mb-0">1125</h5><span class="text-muted">Followings</span>
                        </div>
                    </div>
                    <!-- Footer -->
                    <hr class="mt-3 border-dashed" />
                    <div class="text-end text-muted fs-xs"><i class="ti ti-refresh me-1"></i> Updated 1 hour ago</div>
                </div>
            </div>
        </div>
        <!-- Profile Card 2: Daniel Lee -->
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body text-center">
                    <img alt="avatar" class="rounded-circle" height="72" src="/images/users/user-2.jpg"
                        width="72" />
                    <h5 class="mb-0 mt-2 d-flex align-items-center justify-content-center">
                        <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Daniel Lee</a>
                        <img alt="US" class="ms-1 rounded" height="16" src="/images/flags/us.svg" />
                    </h5>
                    <span class="text-muted fs-xs">Product Manager</span><br />
                    <span class="badge bg-success my-1">Verified</span><br />
                    <span class="text-muted">@danielpm | <a class="text-decoration-none text-danger"
                            href="#">daniellee.com</a></span>
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm me-1">Message</button>
                        <button class="btn btn-outline-secondary btn-sm">Follow</button>
                    </div>
                    <hr class="my-3 border-dashed" />
                    <div class="d-flex justify-content-between text-center">
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
                    <hr class="mt-3 border-dashed" />
                    <div class="text-end text-muted fs-xs"><i class="ti ti-refresh me-1"></i> Updated 2 hours ago</div>
                </div>
            </div>
        </div>
        <!-- Profile Card 3: Maria Rodriguez -->
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body text-center">
                    <img alt="avatar" class="rounded-circle" height="72" src="/images/users/user-3.jpg"
                        width="72" />
                    <h5 class="mb-0 mt-2 d-flex align-items-center justify-content-center">
                        <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Maria Rodriguez</a>
                        <img alt="Spain" class="ms-1 rounded" height="16" src="/images/flags/es.svg" />
                    </h5>
                    <span class="text-muted fs-xs">Marketing Head</span><br />
                    <span class="badge bg-info my-1">Team Lead</span><br />
                    <span class="text-muted">@maria | <a class="text-decoration-none text-danger"
                            href="#">mariaworks.es</a></span>
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm me-1">Message</button>
                        <button class="btn btn-outline-secondary btn-sm">Follow</button>
                    </div>
                    <hr class="my-3 border-dashed" />
                    <div class="d-flex justify-content-between text-center">
                        <div>
                            <h5 class="mb-0">205</h5><span class="text-muted">Posts</span>
                        </div>
                        <div>
                            <h5 class="mb-0">18.4k</h5><span class="text-muted">Followers</span>
                        </div>
                        <div>
                            <h5 class="mb-0">1432</h5><span class="text-muted">Followings</span>
                        </div>
                    </div>
                    <hr class="mt-3 border-dashed" />
                    <div class="text-end text-muted fs-xs"><i class="ti ti-refresh me-1"></i> Updated 3 hours ago</div>
                </div>
            </div>
        </div>
        <!-- Profile Card 4: Liam Zhang -->
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body text-center">
                    <img alt="avatar" class="rounded-circle" height="72" src="/images/users/user-4.jpg"
                        width="72" />
                    <h5 class="mb-0 mt-2 d-flex align-items-center justify-content-center">
                        <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Liam Zhang</a>
                        <img alt="China" class="ms-1 rounded" height="16" src="/images/flags/cn.svg" />
                    </h5>
                    <span class="text-muted fs-xs">Frontend Developer</span><br />
                    <span class="badge bg-warning my-1">Contributor</span><br />
                    <span class="text-muted">@liamdev | <a class="text-decoration-none text-danger"
                            href="#">liamzhang.cn</a></span>
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm me-1">Message</button>
                        <button class="btn btn-outline-secondary btn-sm">Follow</button>
                    </div>
                    <hr class="my-3 border-dashed" />
                    <div class="d-flex justify-content-between text-center">
                        <div>
                            <h5 class="mb-0">67</h5><span class="text-muted">Posts</span>
                        </div>
                        <div>
                            <h5 class="mb-0">9.3k</h5><span class="text-muted">Followers</span>
                        </div>
                        <div>
                            <h5 class="mb-0">540</h5><span class="text-muted">Followings</span>
                        </div>
                    </div>
                    <hr class="mt-3 border-dashed" />
                    <div class="text-end text-muted fs-xs"><i class="ti ti-refresh me-1"></i> Updated 10 mins ago</div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body text-center">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle" height="72" src="/images/users/user-7.jpg"
                        width="72" />
                    <!-- Name & Flag -->
                    <h5 class="mb-0 mt-2 d-flex align-items-center justify-content-center">
                        <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Ethan Wright</a>
                        <img alt="Canada" class="ms-1 rounded" height="16" src="/images/flags/ca.svg" />
                    </h5>
                    <!-- Designation & Badge -->
                    <span class="text-muted fs-xs">Senior Backend Engineer</span><br />
                    <span class="badge bg-primary my-1">Moderator</span><br />
                    <!-- Bio Line -->
                    <span class="text-muted">@DevOps | <a class="text-decoration-none text-danger"
                            href="#">ethanwright.dev</a></span>
                    <!-- Buttons -->
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm me-1">Message</button>
                        <button class="btn btn-outline-secondary btn-sm">Follow</button>
                    </div>
                    <!-- Divider -->
                    <hr class="my-3 border-dashed" />
                    <!-- Stats -->
                    <div class="d-flex justify-content-between text-center">
                        <div>
                            <h5 class="mb-0">89</h5><span class="text-muted">Posts</span>
                        </div>
                        <div>
                            <h5 class="mb-0">16.4k</h5><span class="text-muted">Followers</span>
                        </div>
                        <div>
                            <h5 class="mb-0">734</h5><span class="text-muted">Followings</span>
                        </div>
                    </div>
                    <!-- Footer -->
                    <hr class="mt-3 border-dashed" />
                    <div class="text-end text-muted fs-xs"><i class="ti ti-refresh me-1"></i> Updated 45 mins ago</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body text-center">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle" height="72" src="/images/users/user-8.jpg"
                        width="72" />
                    <!-- Name & Flag -->
                    <h5 class="mb-0 mt-2 d-flex align-items-center justify-content-center">
                        <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Isabella Moretti</a>
                        <img alt="Italy" class="ms-1 rounded" height="16" src="/images/flags/it.svg" />
                    </h5>
                    <!-- Designation & Badge -->
                    <span class="text-muted fs-xs">Content Strategist</span><br />
                    <span class="badge bg-danger my-1">Top Creator</span><br />
                    <!-- Bio Line -->
                    <span class="text-muted">@isamoretti | <a class="text-decoration-none text-danger"
                            href="#">moretti.io</a></span>
                    <!-- Buttons -->
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm me-1">Message</button>
                        <button class="btn btn-outline-secondary btn-sm">Follow</button>
                    </div>
                    <!-- Divider -->
                    <hr class="my-3 border-dashed" />
                    <!-- Stats -->
                    <div class="d-flex justify-content-between text-center">
                        <div>
                            <h5 class="mb-0">162</h5><span class="text-muted">Posts</span>
                        </div>
                        <div>
                            <h5 class="mb-0">24.7k</h5><span class="text-muted">Followers</span>
                        </div>
                        <div>
                            <h5 class="mb-0">921</h5><span class="text-muted">Followings</span>
                        </div>
                    </div>
                    <!-- Footer -->
                    <hr class="mt-3 border-dashed" />
                    <div class="text-end text-muted fs-xs"><i class="ti ti-refresh me-1"></i> Updated 2 hours ago</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body text-center">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle" height="72" src="/images/users/user-9.jpg"
                        width="72" />
                    <!-- Name & Flag -->
                    <h5 class="mb-0 mt-2 d-flex align-items-center justify-content-center">
                        <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Kenji Tanaka</a>
                        <img alt="Japan" class="ms-1 rounded" height="16" src="/images/flags/jp.svg" />
                    </h5>
                    <!-- Designation & Badge -->
                    <span class="text-muted fs-xs">Full Stack Developer</span><br />
                    <span class="badge bg-info my-1">Contributor</span><br />
                    <!-- Bio Line -->
                    <span class="text-muted">@kenjicode | <a class="text-decoration-none text-danger"
                            href="#">kenjitanaka.dev</a></span>
                    <!-- Buttons -->
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm me-1">Message</button>
                        <button class="btn btn-outline-secondary btn-sm">Follow</button>
                    </div>
                    <!-- Divider -->
                    <hr class="my-3 border-dashed" />
                    <!-- Stats -->
                    <div class="d-flex justify-content-between text-center">
                        <div>
                            <h5 class="mb-0">113</h5><span class="text-muted">Posts</span>
                        </div>
                        <div>
                            <h5 class="mb-0">13.9k</h5><span class="text-muted">Followers</span>
                        </div>
                        <div>
                            <h5 class="mb-0">678</h5><span class="text-muted">Followings</span>
                        </div>
                    </div>
                    <!-- Footer -->
                    <hr class="mt-3 border-dashed" />
                    <div class="text-end text-muted fs-xs"><i class="ti ti-refresh me-1"></i> Updated 30 mins ago</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body text-center">
                    <!-- Avatar -->
                    <img alt="avatar" class="rounded-circle" height="72" src="/images/users/user-10.jpg"
                        width="72" />
                    <!-- Name & Flag -->
                    <h5 class="mb-0 mt-2 d-flex align-items-center justify-content-center">
                        <a class="link-reset" href="{{ route('second', ['users', 'profile']) }}">Amira El-Sayed</a>
                        <img alt="Egypt" class="ms-1 rounded" height="16" src="/images/flags/eg.svg" />
                    </h5>
                    <!-- Designation & Badge -->
                    <span class="text-muted fs-xs">Data Scientist</span><br />
                    <span class="badge bg-warning my-1">Analyst</span><br />
                    <!-- Bio Line -->
                    <span class="text-muted">@amira.codes | <a class="text-decoration-none text-danger"
                            href="#">amira-ai.tech</a></span>
                    <!-- Buttons -->
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm me-1">Message</button>
                        <button class="btn btn-outline-secondary btn-sm">Follow</button>
                    </div>
                    <!-- Divider -->
                    <hr class="my-3 border-dashed" />
                    <!-- Stats -->
                    <div class="d-flex justify-content-between text-center">
                        <div>
                            <h5 class="mb-0">176</h5><span class="text-muted">Posts</span>
                        </div>
                        <div>
                            <h5 class="mb-0">21.1k</h5><span class="text-muted">Followers</span>
                        </div>
                        <div>
                            <h5 class="mb-0">998</h5><span class="text-muted">Followings</span>
                        </div>
                    </div>
                    <!-- Footer -->
                    <hr class="mt-3 border-dashed" />
                    <div class="text-end text-muted fs-xs"><i class="ti ti-refresh me-1"></i> Updated 20 mins ago</div>
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
