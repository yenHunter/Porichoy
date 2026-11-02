<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoutingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_admin_root_renders_the_dashboard(): void
    {
        $this->actingAs($this->adminUser())->get('/admin')->assertOk();
    }

    public function test_segments_compose_existing_admin_views(): void
    {
        $this->actingAs($this->adminUser())->get('/admin/dashboard/index-2')->assertOk();
    }

    public function test_a_segment_that_is_not_a_slug_is_rejected(): void
    {
        $this->actingAs($this->adminUser())->get('/admin/INVALID Segment')->assertNotFound();
        $this->actingAs($this->adminUser())->get('/admin/..%2F..%2F.env')->assertNotFound();
    }

    public function test_a_segment_without_a_view_is_a_404(): void
    {
        $this->actingAs($this->adminUser())->get('/admin/dashboard/does-not-exist')->assertNotFound();
    }

    public function test_guests_are_sent_to_the_login_screen(): void
    {
        $this->get('/admin')->assertRedirect(route('login'));
        $this->get('/admin/dashboard/index')->assertRedirect(route('login'));
    }
}
