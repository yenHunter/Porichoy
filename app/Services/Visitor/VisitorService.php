<?php

namespace App\Services\Visitor;

use App\Models\BlogInfo;
use App\Models\SkillInfo;
use App\Models\ClientInfo;
use App\Models\ProfileInfo;
use App\Models\ProjectInfo;
use App\Models\ServiceInfo;
use Illuminate\Support\Facades\Log;
use App\Models\EducationInfo;
use App\Models\ExperienceInfo;
use App\Models\TestimonialInfo;
use App\Http\Requests\Visitor\StoreContactRequest;

class VisitorService
{
    /**
     * Data for the storefront home page.
     *
     * @return array<string, mixed>
     */
    public function homeData(): array
    {
        return [
            'profile_info'     => $this->profile(),
            'service_list'     => ServiceInfo::sorted()->active()->get(),
            'project_list'     => ProjectInfo::sorted()->active()->get(),
            'skill_list'       => SkillInfo::active()->sorted()->get(),
            'education_list'   => EducationInfo::sorted()->active()->get(),
            'experience_list'  => ExperienceInfo::sorted()->active()->get(),
            'client_list'      => ClientInfo::sorted()->active()->get(),
            'testimonial_list' => TestimonialInfo::sorted()->active()->get(),
        ];
    }

    /**
     * Data for the storefront about page.
     *
     * @return array<string, mixed>
     */
    public function aboutData(): array
    {
        return [
            'profile_info'     => $this->profile(),
            'education_list'   => EducationInfo::sorted()->active()->get(),
            'experience_list'  => ExperienceInfo::sorted()->active()->get(),
            'skill_list'       => SkillInfo::active()->sorted()->get(),
            'testimonial_list' => TestimonialInfo::sorted()->active()->get(),
        ];
    }

    /**
     * Data for the storefront services listing.
     *
     * @return array<string, mixed>
     */
    public function servicesData(): array
    {
        return [
            'service_list' => ServiceInfo::sorted()->active()->get(),
        ];
    }

    /**
     * Data for a single service page.
     *
     * @param  string $slug
     * @return array<string, mixed>
     */
    public function serviceDetailsData(string $slug): array
    {
        return [
            'profile_info'     => $this->profile(),
            'service_details'  => ServiceInfo::with('skills')->where('service_slug', $slug)->first(),
            'testimonial_list' => TestimonialInfo::sorted()->active()->get(),
        ];
    }

    /**
     * Data for the storefront projects listing.
     *
     * @return array<string, mixed>
     */
    public function projectsData(): array
    {
        return [
            'project_list' => ProjectInfo::sorted()->active()->get(),
        ];
    }

    /**
     * Data for a single project page.
     *
     * @param  string $slug
     * @return array<string, mixed>
     */
    public function projectDetailsData(string $slug): array
    {
        return [
            'project' => ProjectInfo::where('project_slug', $slug)->first(),
        ];
    }

    /**
     * Data for the storefront blog listing.
     *
     * @return array<string, mixed>
     */
    public function blogsData(): array
    {
        return [
            'blog_list' => BlogInfo::sorted()->active()->get(),
        ];
    }

    /**
     * Data for a single blog page.
     *
     * @param  string $slug
     * @return array<string, mixed>
     */
    public function blogDetailsData(string $slug): array
    {
        return [
            'blog' => $slug,
        ];
    }

    /**
     * Record an incoming contact-form message.
     *
     * @param  StoreContactRequest $request Validated payload
     * @return void
     */
    public function storeContact(StoreContactRequest $request): void
    {
        Log::channel('contact')->info('New contact message received', [
            'name'    => $request->input('name'),
            'email'   => $request->input('email'),
            'phone'   => $request->input('phone'),
            'message' => $request->input('comments'),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Internals
    |--------------------------------------------------------------------------
    */

    /**
     * The profile column/value pairs shared by several visitor pages.
     *
     * @return array<string, string|null>
     */
    private function profile(): array
    {
        return ProfileInfo::pluck('column_value', 'column_name')->toArray();
    }
}
