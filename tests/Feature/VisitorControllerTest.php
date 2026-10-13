<?php

namespace Tests\Feature;

use App\Models\BlogInfo;
use App\Models\ProfileInfo;
use App\Models\ProjectInfo;
use App\Models\ServiceInfo;
use App\Models\SkillInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class VisitorControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Every public page renders and receives the data the themes expect.
     */
    public function test_storefront_pages_render_with_their_data(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertViewHas([
                'profile_info',
                'service_list',
                'project_list',
                'skill_list',
                'education_list',
                'experience_list',
                'client_list',
                'testimonial_list',
            ]);

        $this->get('/about')
            ->assertOk()
            ->assertViewHas([
                'profile_info',
                'education_list',
                'experience_list',
                'skill_list',
                'testimonial_list',
            ]);

        $this->get('/services')->assertOk()->assertViewHas('service_list');
        $this->get('/projects')->assertOk()->assertViewHas('project_list');
        $this->get('/blogs')->assertOk()->assertViewHas('blog_list');
        $this->get('/contact')->assertOk();
    }

    /**
     * The profile column/value pairs reach the page.
     */
    public function test_pages_receive_the_profile_values(): void
    {
        $profile               = new ProfileInfo();
        $profile->use_for      = 'about';
        $profile->column_title = 'First Name';
        $profile->column_name  = 'first_name';
        $profile->column_value = 'Jane';
        $profile->save();

        $this->get('/about')
            ->assertOk()
            ->assertViewHas('profile_info', fn ($value) => ($value['first_name'] ?? null) === 'Jane');
    }

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
            ->assertViewHas('blog', 'first-post');
    }

    /**
     * The complete themes serve the whole storefront, not just the active one.
     */
    public function test_antux_theme_renders_the_storefront(): void
    {
        $this->assertThemeRenders('antux');
    }

    /**
     * The complete themes serve the whole storefront, not just the active one.
     */
    public function test_flixta_theme_renders_the_storefront(): void
    {
        $this->assertThemeRenders('flixta');
    }

    /**
     * The complete themes serve the whole storefront, not just the active one.
     */
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

    /**
     * A valid submission is logged and flashed back.
     */
    public function test_contact_form_logs_a_valid_message(): void
    {
        Http::fake([
            'www.google.com/recaptcha/*' => Http::response(['success' => true], 200),
        ]);

        Log::shouldReceive('channel')->once()->with('contact')->andReturnSelf();
        Log::shouldReceive('info')->once()->withArgs(function (string $message, array $context) {
            return $message === 'New contact message received'
                && $context['name'] === 'Test Visitor'
                && $context['email'] === 'visitor@example.com'
                && $context['phone'] === '555-0100'
                && $context['message'] === 'I would like to discuss a new project.';
        });

        $this->post('/contact', [
            'name'                 => 'Test Visitor',
            'email'                => 'visitor@example.com',
            'phone'                => '555-0100',
            'comments'             => 'I would like to discuss a new project.',
            'g-recaptcha-response' => 'test-token',
        ])
            ->assertRedirect()
            ->assertSessionHas('success')
            ->assertSessionDoesntHaveErrors();
    }

    /**
     * Validation failures come back as field errors, not as one generic error.
     */
    public function test_contact_form_returns_field_errors(): void
    {
        $this->post('/contact', [])
            ->assertRedirect()
            ->assertSessionHasErrors(['name', 'email', 'comments', 'g-recaptcha-response'])
            ->assertSessionDoesntHaveErrors(['error']);
    }

    /**
     * An invalid reCAPTCHA token is rejected.
     */
    public function test_contact_form_rejects_an_invalid_captcha(): void
    {
        Http::fake([
            'www.google.com/recaptcha/*' => Http::response(['success' => false], 200),
        ]);

        $this->post('/contact', [
            'name'                 => 'Test Visitor',
            'email'                => 'visitor@example.com',
            'comments'             => 'I would like to discuss a new project.',
            'g-recaptcha-response' => 'bad-token',
        ])
            ->assertRedirect()
            ->assertSessionHasErrors(['g-recaptcha-response']);
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

    /**
     * One service (with a skill), project and blog post to browse.
     *
     * @return array{0: ServiceInfo, 1: ProjectInfo, 2: BlogInfo, 3: SkillInfo}
     */
    private function seedStorefrontRecords(): array
    {
        $service                = new ServiceInfo();
        $service->service_slug  = 'branding-design';
        $service->service_title = 'Branding & Design';
        $service->save();

        $skill              = new SkillInfo();
        $skill->skill_title = 'Laravel';
        $skill->save();

        $service->skills()->attach($skill);

        $project                = new ProjectInfo();
        $project->project_slug  = 'acme-revamp';
        $project->project_title = 'Acme Revamp';
        $project->start_date    = now();
        // The antux theme links each project to its service.
        $project->service_id    = $service->getKey();
        $project->save();

        $blog             = new BlogInfo();
        $blog->blog_slug  = 'first-post';
        $blog->blog_title = 'First Post';
        $blog->save();

        return [$service, $project, $blog, $skill];
    }
}
