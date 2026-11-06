<?php

namespace Tests\Feature\Visitor;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Support\SeedsStorefront;
use Tests\TestCase;

class ThemeRenderingTest extends TestCase
{
    use RefreshDatabase;
    use SeedsStorefront;

    /**
     * The flixta blog and portfolio pages display the seeded records.
     */
    public function test_flixta_pages_render_the_seeded_content(): void
    {
        [, $project, $blog] = $this->seedStorefrontRecords();

        $this->withSession(['visitor_theme' => 'flixta'])->get('/blogs')
            ->assertOk()
            ->assertSee($blog->blog_title);

        $this->withSession(['visitor_theme' => 'flixta'])->get('/blog/first-post')
            ->assertOk();

        $this->withSession(['visitor_theme' => 'flixta'])->get('/projects')
            ->assertOk()
            ->assertSee($project->project_title);

        $this->withSession(['visitor_theme' => 'flixta'])->get('/project/acme-revamp')
            ->assertOk()
            ->assertSee($project->project_title);
    }

    /**
     * The antux pages display the seeded records (title, slug links, categories).
     */
    public function test_antux_pages_render_the_seeded_content(): void
    {
        [$service, $project, $blog] = $this->seedStorefrontRecords();

        $this->withSession(['visitor_theme' => 'antux'])->get('/')
            ->assertOk()
            ->assertSee($service->service_title)
            ->assertSee($project->project_title);

        $this->withSession(['visitor_theme' => 'antux'])->get('/services')
            ->assertOk()
            ->assertSee($service->service_title);

        $this->withSession(['visitor_theme' => 'antux'])->get('/service/branding-design')
            ->assertOk()
            ->assertSee($service->service_title)
            ->assertSee('Laravel');

        $this->withSession(['visitor_theme' => 'antux'])->get('/blogs')
            ->assertOk()
            ->assertSee($blog->blog_title);

        $this->withSession(['visitor_theme' => 'antux'])->get('/blog/first-post')
            ->assertOk();

        $this->withSession(['visitor_theme' => 'antux'])->get('/projects')
            ->assertOk()
            ->assertSee($project->project_title);

        $this->withSession(['visitor_theme' => 'antux'])->get('/project/acme-revamp')
            ->assertOk()
            ->assertSee($project->project_title);
    }

    /**
     * The complete themes serve the whole storefront, not just the active one.
     */
    public function test_antux_theme_renders_the_storefront(): void
    {
        $this->assertThemeRenders('antux');
    }

    public function test_flixta_theme_renders_the_storefront(): void
    {
        $this->assertThemeRenders('flixta');
    }

    public function test_reeni_theme_renders_the_storefront(): void
    {
        $this->assertThemeRenders('reeni');
    }

    /**
     * Dorbesh only ships a home page, so that is all it can serve.
     */
    public function test_dorbesh_theme_renders_the_home_page(): void
    {
        $this->withSession(['visitor_theme' => 'dorbesh'])->get('/')->assertOk();
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Visit every storefront page with the given theme in the session.
     */
    private function assertThemeRenders(string $theme): void
    {
        $this->seedStorefrontRecords();

        $uris = [
            '/',
            '/about',
            '/services',
            '/service/branding-design',
            '/projects',
            '/project/acme-revamp',
            '/blogs',
            '/blog/first-post',
            '/contact',
        ];

        foreach ($uris as $uri) {
            $this->withSession(['visitor_theme' => $theme])->get($uri)->assertOk();
        }
    }
}
