<?php

namespace Tests\Feature\Visitor;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Support\SeedsStorefront;
use Tests\TestCase;

class DetailPagesTest extends TestCase
{
    use RefreshDatabase;
    use SeedsStorefront;

    /**
     * Detail pages resolve the slug from the URL.
     */
    public function test_detail_pages_resolve_their_slug(): void
    {
        [$service, $project, $blog, $skill] = $this->seedStorefrontRecords();

        $this->get('/service/branding-design')
            ->assertOk()
            ->assertViewHas('service_details', fn ($value) => $value?->getKey() === $service->getKey()
                && $value->skills->contains($skill));

        $this->get('/project/acme-revamp')
            ->assertOk()
            ->assertViewHas('project', fn ($value) => $value?->getKey() === $project->getKey());

        $this->get('/blog/first-post')
            ->assertOk()
            ->assertViewHas('blog', fn ($value) => $value?->getKey() === $blog->getKey());
    }

    /**
     * Slugs without data still render the themed fallback content instead of erroring.
     */
    public function test_unknown_detail_slugs_still_render_the_fallbacks(): void
    {
        $this->seedStorefrontRecords();

        foreach (['/blog/missing-post', '/project/missing-project', '/service/missing-service'] as $uri) {
            $this->withSession(['visitor_theme' => 'flixta'])->get($uri)->assertOk();
            $this->withSession(['visitor_theme' => 'antux'])->get($uri)->assertOk();
            $this->withSession(['visitor_theme' => 'reeni'])->get($uri)->assertOk();
        }
    }
}
