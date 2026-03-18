@extends('layouts.vertical', ['title' => 'Search Results'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Pages', 'title' => 'Search Results'])

    <div class="row">
        <div class="col-12">
            <div class="text-center w-md-75 w-xl-50 mx-auto py-3">
                <div class="app-search app-search-pill input-group mb-3 rounded-pill">
                    <input class="form-control py-2 fw-semibold" placeholder="Search AI platforms..." type="text"
                        value="AI Content Tools" />
                    <i class="app-search-icon text-muted" data-lucide="search"></i>
                    <button class="btn btn-secondary" type="button">Discover</button>
                </div>
                <div class="d-flex justify-content-center align-items-center gap-1">
                    <h5 class="text-muted mb-0">Popular Searches :</h5>
                    <a class="badge bg-primary-subtle text-primary rounded-pill px-2 py-1 fs-6" href="#!">Text
                        Generation</a>
                    <a class="badge bg-primary-subtle text-primary rounded-pill px-2 py-1 fs-6" href="#!">Image AI</a>
                    <a class="badge bg-primary-subtle text-primary rounded-pill px-2 py-1 fs-6" href="#!">Speech</a>
                    <a class="badge bg-primary-subtle text-primary rounded-pill px-2 py-1 fs-6" href="#!">Coding</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-light justify-content-between">
                    <h4 class="fst-italic text-muted mb-0">
                        Found <span class="fw-bold badge badge-soft-danger">89</span> results for <span
                            class="text-dark">"AI Content Tools"</span>
                    </h4>
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <span class="fw-semibold">Filter By:</span>
                        <!-- AI Category Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0">
                                <option selected="">Tool Type</option>
                                <option value="text">Text Generator</option>
                                <option value="image">Image Analysis</option>
                                <option value="speech">Voice &amp; Speech</option>
                                <option value="dev">Code Assistant</option>
                                <option value="edu">Education AI</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="layers"></i>
                        </div>
                        <!-- Pricing Filter -->
                        <div class="app-search">
                            <select class="form-select form-control my-1 my-md-0">
                                <option selected="">Pricing</option>
                                <option value="free">Free</option>
                                <option value="premium">Premium</option>
                                <option value="enterprise">Enterprise</option>
                            </select>
                            <i class="app-search-icon text-muted" data-lucide="circle-dollar-sign"></i>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="border-bottom border-dashed px-4 py-3">
                        <h4 class="fs-md mb-1">
                            <a class="text-reset" href="#!">
                                NovaMind - AI Content Generator
                            </a>
                        </h4>
                        <p class="text-success mb-2">
                            https://aiplatform.tools/novamind
                        </p>
                        <p class="text-muted mb-2">
                            NovaMind helps you generate high-quality blog posts, emails, and landing copy using cutting-edge
                            large language models. Ideal for content teams and marketing agencies.
                        </p>
                        <p class="d-flex flex-wrap gap-3 text-muted mb-1 align-items-center fs-base">
                            <span class="d-flex align-items-center gap-1">
                                <img alt="avatar-4" class="img-fluid avatar-xs rounded-circle"
                                    src="/images/users/user-4.jpg" />
                                <a class="link-reset fw-semibold" href="#!">NeuralNest Labs</a>
                            </span>
                            <span><i class="ti ti-calendar"></i> Launched: Mar 12, 2025</span>
                            <span><i class="ti ti-users"></i> Users: 14,530</span>
                            <span><i class="ti ti-message-circle"></i> <a class="link-reset" href="#!">Reviews:
                                    126</a></span>
                            <span><i class="ti ti-thumb-up"></i> Likes: 1,235</span>
                        </p>
                    </div>
                    <div class="border-bottom border-dashed px-4 py-3">
                        <h4 class="fs-md mb-1">
                            <a class="text-reset" href="#!">
                                NovaMind - AI Content Generator
                            </a>
                        </h4>
                        <p class="text-success mb-2">https://aiplatform.tools/novamind</p>
                        <p class="text-muted mb-2">
                            NovaMind helps teams generate SEO-optimized articles, landing pages, and ad copy using large
                            language models and adaptive tone control.
                        </p>
                        <p class="d-flex flex-wrap gap-3 text-muted mb-1 align-items-center fs-base">
                            <span class="d-flex align-items-center gap-1">
                                <img alt="avatar" class="img-fluid avatar-xs rounded-circle"
                                    src="/images/users/user-1.jpg" />
                                <a class="link-reset fw-semibold" href="#!">NeuralNest Labs</a>
                            </span>
                            <span><i class="ti ti-calendar"></i> Launched: Mar 12, 2025</span>
                            <span><i class="ti ti-users"></i> Users: 14,530</span>
                            <span><i class="ti ti-message-circle"></i> <a class="link-reset" href="#!">Reviews:
                                    126</a></span>
                            <span><i class="ti ti-thumb-up"></i> Likes: 1,235</span>
                        </p>
                    </div>
                    <div class="border-bottom border-dashed px-4 py-3">
                        <h4 class="fs-md mb-1">
                            <a class="text-reset" href="#!">
                                VisionIQ - AI Image Analyzer
                            </a>
                        </h4>
                        <p class="text-success mb-2">https://aiplatform.tools/visioniq</p>
                        <p class="text-muted mb-2">
                            VisionIQ scans, labels, and categorizes your image data using advanced computer vision APIs.
                            Ideal for medical, security, and retail apps.
                        </p>
                        <p class="d-flex flex-wrap gap-3 text-muted mb-1 align-items-center fs-base">
                            <span class="d-flex align-items-center gap-1">
                                <img alt="avatar" class="img-fluid avatar-xs rounded-circle"
                                    src="/images/users/user-2.jpg" />
                                <a class="link-reset fw-semibold" href="#!">PixelSense AI</a>
                            </span>
                            <span><i class="ti ti-calendar"></i> Launched: Jan 25, 2025</span>
                            <span><i class="ti ti-users"></i> Users: 8,945</span>
                            <span><i class="ti ti-message-circle"></i> <a class="link-reset" href="#!">Reviews:
                                    98</a></span>
                            <span><i class="ti ti-thumb-up"></i> Likes: 932</span>
                        </p>
                    </div>
                    <div class="border-bottom border-dashed px-4 py-3">
                        <h4 class="fs-md mb-1">
                            <a class="text-reset" href="#!">
                                Synthora - Voice &amp; Speech AI
                            </a>
                        </h4>
                        <p class="text-success mb-2">https://aiplatform.tools/synthora</p>
                        <p class="text-muted mb-2">
                            Synthora offers ultra-realistic AI voice generation and speech recognition tailored for
                            podcasting, IVRs, and accessibility tools.
                        </p>
                        <p class="d-flex flex-wrap gap-3 text-muted mb-1 align-items-center fs-base">
                            <span class="d-flex align-items-center gap-1">
                                <img alt="avatar" class="img-fluid avatar-xs rounded-circle"
                                    src="/images/users/user-3.jpg" />
                                <a class="link-reset fw-semibold" href="#!">VocalForge Systems</a>
                            </span>
                            <span><i class="ti ti-calendar"></i> Launched: Nov 10, 2024</span>
                            <span><i class="ti ti-users"></i> Users: 6,700</span>
                            <span><i class="ti ti-message-circle"></i> <a class="link-reset" href="#!">Reviews:
                                    74</a></span>
                            <span><i class="ti ti-thumb-up"></i> Likes: 821</span>
                        </p>
                    </div>
                    <div class="border-bottom border-dashed px-4 py-3">
                        <h4 class="fs-md mb-3">
                            Found some users:
                        </h4>
                        <div class="d-flex gap-2">
                            <div class="avatar">
                                <img alt="" class="rounded avatar-xl" src="/images/users/user-4.jpg" />
                            </div>
                            <div class="avatar">
                                <img alt="" class="rounded avatar-xl" src="/images/users/user-5.jpg" />
                            </div>
                            <div class="avatar">
                                <img alt="" class="rounded avatar-xl" src="/images/users/user-3.jpg" />
                            </div>
                            <div class="avatar">
                                <img alt="" class="rounded avatar-xl" src="/images/users/user-8.jpg" />
                            </div>
                            <div class="avatar">
                                <img alt="" class="rounded avatar-xl" src="/images/users/user-2.jpg" />
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom border-dashed px-4 py-3">
                        <h4 class="fs-md mb-1">
                            <a class="text-reset" href="#!">
                                CodePilot - AI Developer Assistant
                            </a>
                        </h4>
                        <p class="text-success mb-2">https://aiplatform.tools/codepilot</p>
                        <p class="text-muted mb-2">
                            CodePilot enhances developer workflows by offering code suggestions, real-time bug detection,
                            and multi-language support via AI models.
                        </p>
                        <p class="d-flex flex-wrap gap-3 text-muted mb-1 align-items-center fs-base">
                            <span class="d-flex align-items-center gap-1">
                                <img alt="avatar" class="img-fluid avatar-xs rounded-circle"
                                    src="/images/users/user-4.jpg" />
                                <a class="link-reset fw-semibold" href="#!">DevAI Systems</a>
                            </span>
                            <span><i class="ti ti-calendar"></i> Launched: Aug 5, 2024</span>
                            <span><i class="ti ti-users"></i> Users: 18,230</span>
                            <span><i class="ti ti-message-circle"></i> <a class="link-reset" href="#!">Reviews:
                                    132</a></span>
                            <span><i class="ti ti-thumb-up"></i> Likes: 1,540</span>
                        </p>
                    </div>
                    <div class="border-bottom border-dashed px-4 py-3">
                        <h4 class="fs-md mb-1">
                            <a class="text-reset" href="#!">
                                Brainix - AI for Education
                            </a>
                        </h4>
                        <p class="text-success mb-2">https://aiplatform.tools/brainix</p>
                        <p class="text-muted mb-2">
                            Brainix personalizes eLearning journeys using adaptive AI, real-time analytics, and student
                            behavior insights across multiple platforms.
                        </p>
                        <p class="d-flex flex-wrap gap-3 text-muted mb-1 align-items-center fs-base">
                            <span class="d-flex align-items-center gap-1">
                                <img alt="avatar" class="img-fluid avatar-xs rounded-circle"
                                    src="/images/users/user-5.jpg" />
                                <a class="link-reset fw-semibold" href="#!">Edvanta Labs</a>
                            </span>
                            <span><i class="ti ti-calendar"></i> Launched: Feb 8, 2025</span>
                            <span><i class="ti ti-users"></i> Users: 10,870</span>
                            <span><i class="ti ti-message-circle"></i> <a class="link-reset" href="#!">Reviews:
                                    88</a></span>
                            <span><i class="ti ti-thumb-up"></i> Likes: 989</span>
                        </p>
                    </div>
                    <div class="border-bottom border-dashed px-4 py-3">
                        <h4 class="fs-md mb-3">
                            People also search for:
                        </h4>
                        <div class="d-flex gap-2 flex-wrap">
                            <div class="px-3 py-2 bg-light bg-opacity-50 rounded">
                                <a class="text-reset fs-md fw-semibold" href="#!">AI Chatbot Builders <i
                                        class="ti ti-search ms-2"></i></a>
                            </div>
                            <div class="px-3 py-2 bg-light bg-opacity-50 rounded">
                                <a class="text-reset fs-md fw-semibold" href="#!">Voice Cloning Tools <i
                                        class="ti ti-search ms-2"></i></a>
                            </div>
                            <div class="px-3 py-2 bg-light bg-opacity-50 rounded">
                                <a class="text-reset fs-md fw-semibold" href="#!">AI Image Enhancers <i
                                        class="ti ti-search ms-2"></i></a>
                            </div>
                            <div class="px-3 py-2 bg-light bg-opacity-50 rounded">
                                <a class="text-reset fs-md fw-semibold" href="#!">Code Generation Platforms <i
                                        class="ti ti-search ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="pagination pagination-rounded pagination-boxed justify-content-center mb-0 py-3">
                        <li class="page-item previous disabled"><a class="page-link" href="#"><i
                                    class="ti ti-chevron-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item next"><a class="page-link" href="#"><i
                                    class="ti ti-chevron-right"></i></a></li>
                    </ul>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')
@endsection
