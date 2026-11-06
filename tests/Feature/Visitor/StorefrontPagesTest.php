<?php

namespace Tests\Feature\Visitor;

use App\Models\ProfileInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StorefrontPagesTest extends TestCase
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
        $this->get('/blogs')->assertOk()->assertViewHas([
            'blog_list',
            'category_list',
            'recent_blogs',
        ]);
        $this->get('/contact')->assertOk()->assertViewHas([
            'profile_info',
            'service_list',
        ]);
    }

    /**
     * The profile column/value pairs reach the page.
     */
    public function test_pages_receive_the_profile_values(): void
    {
        $profile = new ProfileInfo;
        $profile->use_for = 'about';
        $profile->column_title = 'First Name';
        $profile->column_name = 'first_name';
        $profile->column_value = 'Jane';
        $profile->save();

        $this->get('/about')
            ->assertOk()
            ->assertViewHas('profile_info', fn ($value) => ($value['first_name'] ?? null) === 'Jane');
    }
}
