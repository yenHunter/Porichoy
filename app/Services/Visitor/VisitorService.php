<?php

namespace App\Services\Visitor;

use App\Http\Requests\Visitor\StoreContactRequest;
use App\Models\BlogInfo;
use App\Models\ClientInfo;
use App\Models\ContactMessage;
use App\Models\EducationInfo;
use App\Models\ExperienceInfo;
use App\Models\ProfileInfo;
use App\Models\ProjectInfo;
use App\Models\SelectType;
use App\Models\ServiceInfo;
use App\Models\SkillInfo;
use App\Models\TestimonialInfo;
use Illuminate\Support\Str;
use RuntimeException;

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
            'profile_info' => $this->profile(),
            'service_list' => ServiceInfo::sorted()->active()->get(),
            'project_list' => ProjectInfo::sorted()->active()->with('service')->get(),
            'skill_list' => SkillInfo::active()->sorted()->get(),
            'education_list' => EducationInfo::sorted()->active()->get(),
            'experience_list' => ExperienceInfo::sorted()->active()->get(),
            'client_list' => ClientInfo::sorted()->active()->get(),
            'testimonial_list' => TestimonialInfo::sorted()->active()->with('client')->get(),
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
            'profile_info' => $this->profile(),
            'education_list' => EducationInfo::sorted()->active()->get(),
            'experience_list' => ExperienceInfo::sorted()->active()->get(),
            'skill_list' => SkillInfo::active()->sorted()->get(),
            'testimonial_list' => TestimonialInfo::sorted()->active()->with('client')->get(),
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
     * @return array<string, mixed>
     */
    public function serviceDetailsData(string $slug): array
    {
        return [
            'profile_info' => $this->profile(),
            'service_details' => ServiceInfo::with(['skills', 'processes'])->where('service_slug', $slug)->first(),
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
            'project_list' => ProjectInfo::sorted()->active()->with('service')->get(),
        ];
    }

    /**
     * Data for a single project page.
     *
     * @return array<string, mixed>
     */
    public function projectDetailsData(string $slug): array
    {
        return [
            'project' => ProjectInfo::with(['client', 'service'])->where('project_slug', $slug)->first(),
            // Shared so the details page can link to its neighbouring projects.
            'project_list' => ProjectInfo::sorted()->active()->get(),
        ];
    }

    /**
     * Data for the storefront blog listing.
     *
     * @return array<string, mixed>
     */
    public function blogsData(): array
    {
        return $this->blogListing();
    }

    /**
     * Data for a single blog page.
     *
     * @return array<string, mixed>
     */
    public function blogDetailsData(string $slug): array
    {
        return [
            'blog' => BlogInfo::with('category')->where('blog_slug', $slug)->first(),
        ] + $this->blogListing();
    }

    /**
     * Data for the storefront contact page.
     *
     * @return array<string, mixed>
     */
    public function contactData(): array
    {
        return [
            'profile_info' => $this->profile(),
            'service_list' => ServiceInfo::sorted()->active()->get(),
        ];
    }

    /**
     * Persist an incoming contact-form message.
     *
     * The database row is the only record of the submission; the admin
     * Contact Request inbox reads from it.
     *
     * @param  StoreContactRequest  $request  Validated payload
     */
    public function storeContact(StoreContactRequest $request): void
    {
        ContactMessage::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('comments'),
            'ip' => $request->ip(),
            'user_agent' => Str::limit((string) $request->userAgent(), 255, ''),
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
     * The map is keyed by column name alone, so two rows sharing a name
     * leave only the first value on the site. That is reported and logged as
     * an error rather than thrown: a duplicate comes from a seeded or
     * hand-written row, and a data mistake must not take the public site
     * down for its visitors.
     *
     * @return array<string, string|null>
     */
    private function profile(): array
    {
        $profile = [];
        $duplicates = [];

        // Only rows the admin form treats as visible; a deactivated row
        // disappears from the public site too.
        foreach (ProfileInfo::active()->orderBy('id')->get(['column_name', 'column_value']) as $row) {
            if (array_key_exists($row->column_name, $profile)) {
                $duplicates[$row->column_name] = $row->column_name;

                continue;
            }

            $profile[$row->column_name] = $row->column_value;
        }

        if ($duplicates !== []) {
            // Reported (and logged at error level) rather than thrown: a data
            // mistake must not take the public site down for its visitors.
            report(new RuntimeException(
                'Duplicate profile column names: '.implode(', ', $duplicates)
            ));
        }

        return $profile;
    }

    /**
     * The blog data shared by the listing and its details page (sidebar).
     *
     * @return array<string, mixed>
     */
    private function blogListing(): array
    {
        return [
            'blog_list' => BlogInfo::sorted()->active()->with('category', 'updatedBy')->get(),
            'category_list' => SelectType::where('use_for', SelectType::BLOG_CATEGORY)->sorted()->active()->withCount('blogs')->get(),
            'recent_blogs' => BlogInfo::active()->latestPublished()->limit(3)->get(),
        ];
    }
}
