<?php

namespace Tests\Feature;

use App\Models\BlogInfo;
use App\Models\EducationInfo;
use App\Models\ProfileInfo;
use App\Models\SkillInfo;
use App\Models\User;
use Database\Seeders\ProfileInfoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ModelBehaviourTest extends TestCase
{
    use RefreshDatabase;

    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    */

    public function test_user_status_defaults_to_active_and_names_are_composed(): void
    {
        $user = new User;
        $user->first_name = 'Ada';
        $user->last_name = 'Lovelace';
        $user->email = 'ada@example.test';
        $user->password = Hash::make('password');
        $user->save();

        $this->assertTrue((bool) $user->user_status, 'a manually created user is active by default');
        $this->assertSame('Ada Lovelace', $user->full_name);
    }

    public function test_the_active_scope_excludes_deactivated_users(): void
    {
        $active = $this->adminUser();
        $inactive = User::factory()->inactive()->create();

        $ids = User::active()->pluck('id');

        $this->assertTrue($ids->contains($active->getKey()));
        $this->assertFalse($ids->contains($inactive->getKey()));
    }

    /*
    |--------------------------------------------------------------------------
    | Blog
    |--------------------------------------------------------------------------
    */

    public function test_blog_slugs_are_generated_from_the_title_and_kept_unique(): void
    {
        $first = new BlogInfo;
        $first->blog_title = 'Hello World';
        $first->save();

        $second = new BlogInfo;
        $second->blog_title = 'Hello World';
        $second->save();

        $this->assertSame('hello-world', $first->blog_slug);
        $this->assertSame('hello-world-1', $second->blog_slug);
    }

    public function test_blog_defaults_are_filled_in_on_creation(): void
    {
        $blog = new BlogInfo;
        $blog->blog_title = 'Defaults';
        $blog->save();

        $this->assertTrue((bool) $blog->blog_status);
        $this->assertSame(0, (int) $blog->view_count);
        $this->assertGreaterThanOrEqual(1, (int) $blog->blog_sequence);
    }

    /*
    |--------------------------------------------------------------------------
    | Scoped listings
    |--------------------------------------------------------------------------
    */

    public function test_active_and_sorted_scopes_filter_and_order(): void
    {
        $later = new EducationInfo;
        $later->education_degree = 'MSc';
        $later->education_institute = 'Test University';
        $later->start_date = '2020-01-01';
        $later->education_sequence = 5;
        $later->education_status = true;
        $later->save();

        $earlier = new EducationInfo;
        $earlier->education_degree = 'BSc';
        $earlier->education_institute = 'Test University';
        $earlier->start_date = '2016-01-01';
        $earlier->education_sequence = 2;
        $earlier->education_status = false; // hidden rows are filtered by active()
        $earlier->save();

        $visible = EducationInfo::active()->sorted()->get();

        $this->assertSame([$later->getKey()], $visible->pluck('id')->all());
    }

    public function test_skills_are_listed_active_first_by_sequence(): void
    {
        $one = new SkillInfo;
        $one->skill_title = 'First';
        $one->skill_sequence = 3;
        $one->save();

        $two = new SkillInfo;
        $two->skill_title = 'Second';
        $two->skill_sequence = 1;
        $two->save();

        $this->assertSame(
            [$two->getKey(), $one->getKey()],
            SkillInfo::active()->sorted()->pluck('id')->all()
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    public function test_profile_scopes_group_the_seeded_rows_by_section(): void
    {
        $this->seed(ProfileInfoSeeder::class);

        $basic = ProfileInfo::basicInfo()->active()->get()->keyBy('column_name');

        $this->assertTrue($basic->has('first_name'));
        $this->assertTrue($basic->has('country_flag'));
        $this->assertSame('basic', $basic->first()->use_for);
        $this->assertGreaterThan(0, ProfileInfo::socialInfo()->active()->count());
    }
}
