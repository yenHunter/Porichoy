<?php

namespace App\Http\Controllers\Visitor;

use Illuminate\View\View;
use App\Services\Visitor\VisitorService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Visitor\StoreContactRequest;

class VisitorController extends Controller
{
    public function __construct(
        private readonly VisitorService $visitor_service
    ) {
    }

    /**
     * Display the storefront home page.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('pages.index', $this->visitor_service->homeData());
    }

    /**
     * Display the storefront about page.
     *
     * @return \Illuminate\View\View
     */
    public function about(): View
    {
        return view('pages.about', $this->visitor_service->aboutData());
    }

    /**
     * Display the storefront services listing.
     *
     * @return \Illuminate\View\View
     */
    public function services(): View
    {
        return view('pages.services', $this->visitor_service->servicesData());
    }

    /**
     * Display a single service page.
     *
     * @param  string $service Service slug
     * @return \Illuminate\View\View
     */
    public function service_details(string $service): View
    {
        return view('pages.service-details', $this->visitor_service->serviceDetailsData($service));
    }

    /**
     * Display the storefront projects listing.
     *
     * @return \Illuminate\View\View
     */
    public function projects(): View
    {
        return view('pages.projects', $this->visitor_service->projectsData());
    }

    /**
     * Display a single project page.
     *
     * @param  string $project Project slug
     * @return \Illuminate\View\View
     */
    public function project_details(string $project): View
    {
        return view('pages.project-details', $this->visitor_service->projectDetailsData($project));
    }

    /**
     * Display the storefront blog listing.
     *
     * @return \Illuminate\View\View
     */
    public function blogs(): View
    {
        return view('pages.blogs', $this->visitor_service->blogsData());
    }

    /**
     * Display a single blog page.
     *
     * @param  string $blog Blog slug
     * @return \Illuminate\View\View
     */
    public function blog_details(string $blog): View
    {
        return view('pages.blog-details', $this->visitor_service->blogDetailsData($blog));
    }

    /**
     * Display the storefront contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact(): View
    {
        return view('pages.contact');
    }

    /**
     * Handle the public contact form submission.
     *
     * @param  StoreContactRequest  $request Validated payload
     * @return RedirectResponse
     */
    public function contactStore(StoreContactRequest $request): RedirectResponse
    {
        $this->visitor_service->storeContact($request);

        return back()->with('success', 'Thank you for reaching out. Your message has been received.');
    }
}
