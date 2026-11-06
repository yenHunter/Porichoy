<?php

namespace Tests\Support;

use App\Models\BlogInfo;
use App\Models\ProjectInfo;
use App\Models\ServiceInfo;
use App\Models\SkillInfo;

/**
 * Storefront records the visitor tests browse.
 */
trait SeedsStorefront
{
    /**
     * One service (with a skill), project and blog post to browse.
     *
     * @return array{0: ServiceInfo, 1: ProjectInfo, 2: BlogInfo, 3: SkillInfo}
     */
    protected function seedStorefrontRecords(): array
    {
        $service = new ServiceInfo;
        $service->service_slug = 'branding-design';
        $service->service_title = 'Branding & Design';
        $service->save();

        $skill = new SkillInfo;
        $skill->skill_title = 'Laravel';
        $skill->save();

        $service->skills()->attach($skill);

        $project = new ProjectInfo;
        $project->project_slug = 'acme-revamp';
        $project->project_title = 'Acme Revamp';
        $project->start_date = now();
        // The antux theme links each project to its service.
        $project->service_id = $service->getKey();
        $project->save();

        $blog = new BlogInfo;
        $blog->blog_slug = 'first-post';
        $blog->blog_title = 'First Post';
        $blog->save();

        return [$service, $project, $blog, $skill];
    }
}
