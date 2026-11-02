<?php

namespace Tests\Feature\Admin;

use Database\Seeders\ProfileInfoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class AdminAreaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Routes that are public by design (login, registration, password reset).
     */
    private const PUBLIC_ROUTES = [
        'login',
        'login.attempt',
        'register.view',
        'register.attempt',
        'forgot.password.view',
        'forgot.password.attempt',
        'password.reset',
        'reset.password.attempt',
    ];

    /**
     * The admin view routing controller guards itself with Auth::check().
     */
    private const SELF_GUARDED_ROUTES = [
        'root',
        'any',
        'second',
        'third',
    ];

    /**
     * Every page an authenticated admin can open.
     *
     * @return array<string, array{0: string}>
     */
    public static function adminPageProvider(): array
    {
        $names = [
            'home',
            'module.education.view',
            'module.experience.view',
            'module.research.view',
            'module.training.view',
            'module.blog.view',
            'element.service.view',
            'element.project.view',
            'element.skill.view',
            'element.client.view',
            'element.testimonial.view',
            'management.user.view',
            'management.settings.profile.view',
            'management.system.user-log',
            'management.system.application-log',
            'settings.theme',
            'settings.research_source.view',
            'settings.location_type.view',
            'settings.employment_type.view',
            'configuration.view',
            'configuration.theme',
        ];

        return array_combine($names, array_map(fn ($name) => [$name], $names));
    }

    /**
     * Nothing in the admin area (or its write endpoints) is reachable anonymously.
     */
    public function test_every_admin_route_is_behind_auth(): void
    {
        $adminPrefixes = ['module.', 'element.', 'management.', 'settings.', 'configuration.'];
        $adminNames    = ['home', 'logout', 'lock.screen', 'unlock.screen'];
        $checked       = 0;

        foreach (Route::getRoutes() as $route) {
            $name = $route->getName();

            if (!$name) {
                continue;
            }

            $isAdminRoute = in_array($name, $adminNames, true)
                || count(array_filter($adminPrefixes, fn ($prefix) => str_starts_with($name, $prefix))) > 0;

            if (!$isAdminRoute || in_array($name, self::PUBLIC_ROUTES, true) || in_array($name, self::SELF_GUARDED_ROUTES, true)) {
                continue;
            }

            $checked++;

            $this->assertContains(
                'auth',
                $route->gatherMiddleware(),
                "Route [{$name}] is not protected by the auth middleware"
            );
        }

        $this->assertGreaterThan(50, $checked, 'the admin route scan found suspiciously few routes');
    }

    public function test_the_admin_view_router_redirects_guests(): void
    {
        // RoutingController renders admin views from URL segments and guards
        // itself with Auth::check() rather than the auth middleware.
        $this->get(route('root'))->assertRedirect(route('login'));
        $this->get(route('second', ['dashboard', 'index']))->assertRedirect(route('login'));
    }

    public function test_admin_write_endpoints_reject_guests(): void
    {
        $this->post(route('module.education.store'), [])->assertRedirect(route('login'));
        $this->put(route('module.education.update'), [])->assertRedirect(route('login'));
        $this->post(route('module.blog.sequence'), [])->assertRedirect(route('login'));
        $this->get(route('module.research.delete', 'education-id'))->assertRedirect(route('login'));
        $this->post(route('management.user.store'), [])->assertRedirect(route('login'));
        $this->post(route('configuration.update', 'antux'))->assertRedirect(route('login'));
    }

    #[DataProvider('adminPageProvider')]
    public function test_admin_page_renders(string $name): void
    {
        // The profile screen is driven by the seeded profile_infos rows.
        if ($name === 'management.settings.profile.view') {
            $this->seed(ProfileInfoSeeder::class);
        }

        $this->actingAs($this->adminUser())
            ->get(route($name))
            ->assertOk();
    }

    /**
     * The imported template demo pages must resolve their layout and partials
     * through the admin prefix.
     *
     * Regression guard: misc/pdf-viewer asked for `layouts.vertical` and
     * `layouts.partials.page-title`, which do not exist, so the page answered
     * 500 long before the PDF viewer script could run.
     */
    public function test_the_pdf_viewer_page_renders(): void
    {
        $this->actingAs($this->adminUser())
            ->get(route('second', ['misc', 'pdf-viewer']))
            ->assertOk()
            ->assertSee('the-canvas', false);
    }
}
