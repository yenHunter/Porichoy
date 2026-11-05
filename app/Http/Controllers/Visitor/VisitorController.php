<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Visitor\StoreContactRequest;
use App\Services\Visitor\VisitorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VisitorController extends Controller
{
    public function __construct(
        private readonly VisitorService $visitor_service
    ) {}

    /**
     * Display the storefront home page.
     */
    public function index(): View
    {
        return view('pages.index', $this->visitor_service->homeData());
    }

    /**
     * Display the storefront about page.
     */
    public function about(): View
    {
        return view('pages.about', $this->visitor_service->aboutData());
    }

    /**
     * Display the storefront services listing.
     */
    public function services(): View
    {
        return view('pages.services', $this->visitor_service->servicesData());
    }

    /**
     * Display a single service page.
     *
     * @param  string  $service  Service slug
     */
    public function service_details(string $service): View
    {
        return view('pages.service-details', $this->visitor_service->serviceDetailsData($service));
    }

    /**
     * Display the storefront projects listing.
     */
    public function projects(): View
    {
        return view('pages.projects', $this->visitor_service->projectsData());
    }

    /**
     * Display a single project page.
     *
     * @param  string  $project  Project slug
     */
    public function project_details(string $project): View
    {
        return view('pages.project-details', $this->visitor_service->projectDetailsData($project));
    }

    /**
     * Display the storefront blog listing.
     */
    public function blogs(): View
    {
        return view('pages.blogs', $this->visitor_service->blogsData());
    }

    /**
     * Display a single blog page.
     *
     * @param  string  $blog  Blog slug
     */
    public function blog_details(string $blog): View
    {
        return view('pages.blog-details', $this->visitor_service->blogDetailsData($blog));
    }

    /**
     * Display the storefront contact page.
     */
    public function contact(): View
    {
        return view('pages.contact', $this->visitor_service->contactData());
    }

    /**
     * Handle the public contact form submission.
     *
     * @param  StoreContactRequest  $request  Validated payload
     */
    public function contactStore(StoreContactRequest $request): RedirectResponse
    {
        $this->visitor_service->storeContact($request);

        return back()->with('success', 'Thank you for reaching out. Your message has been received.');
    }
}
