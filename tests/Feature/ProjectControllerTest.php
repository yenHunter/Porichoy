<?php

namespace Tests\Feature;

use App\Models\ProjectInfo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        // `password` is not mass-assignable on User, so assign it directly.
        $user               = new User();
        $user->first_name   = 'Admin';
        $user->last_name    = 'Test';
        $user->email        = 'admin@example.test';
        $user->password     = Hash::make('password');
        $user->user_status  = true;
        $user->save();

        return $user;
    }

    public function test_project_flow_via_http(): void
    {
        Storage::fake('public');

        $this->actingAs($this->admin());

        // view
        $this->get(route('element.project.view'))->assertStatus(200);

        // store (with both images -> exercises the Intervention/webp path)
        $store = $this->post(route('element.project.store'), [
            'project_title'   => 'Verify Project',
            'project_details' => 'details',
            'start_date'      => '2025-01-01',
            'profile_image'   => UploadedFile::fake()->image('p.jpg', 1000, 1000),
            'cover_image'     => UploadedFile::fake()->image('c.jpg', 1000, 1000),
        ]);

        $store->assertSessionHasNoErrors();
        $store->assertRedirect();

        $project = ProjectInfo::first();
        $this->assertNotNull($project, 'project row was not created');
        $this->assertSame('Verify Project', $project->project_title);
        $this->assertSame('verify-project', $project->project_slug);
        $this->assertTrue((bool) $project->project_status);
        $this->assertNotNull($project->profile_image);
        $this->assertNotNull($project->cover_image);
        Storage::disk('public')->assertExists($project->profile_image);
        Storage::disk('public')->assertExists($project->cover_image);
        $oldProfile = $project->profile_image;

        // edit (json)
        $this->get(route('element.project.edit', $project->id))
            ->assertStatus(200)
            ->assertJsonPath('project_title', 'Verify Project');

        // update (replaces profile image, keeps cover)
        $update = $this->put(route('element.project.update'), [
            'project_id'    => $project->id,
            'project_title' => 'Verify Project Renamed',
            'start_date'    => '2025-01-01',
            'profile_image' => UploadedFile::fake()->image('p2.jpg', 1000, 1000),
        ]);

        $update->assertSessionHasNoErrors();
        $update->assertRedirect();

        $project->refresh();
        $this->assertSame('Verify Project Renamed', $project->project_title);
        $this->assertNotSame($oldProfile, $project->profile_image);
        Storage::disk('public')->assertMissing($oldProfile);

        // sequence
        $this->post(route('element.project.sequence'), [
            'order' => [['id' => $project->id, 'sequence' => 7]],
        ])->assertStatus(200)->assertJson(['status' => 'success']);

        $this->assertSame(7, (int) $project->refresh()->project_sequence);

        // delete (removes rows + images)
        $profile = $project->profile_image;
        $cover   = $project->cover_image;

        $this->get(route('element.project.delete', $project->id))->assertRedirect();

        $this->assertDatabaseMissing('project_infos', ['id' => $project->id]);
        Storage::disk('public')->assertMissing($profile);
        Storage::disk('public')->assertMissing($cover);
    }

    public function test_project_store_requires_title_and_start_date(): void
    {
        $this->actingAs($this->admin());

        $this->post(route('element.project.store'), [])
            ->assertSessionHasErrors(['project_title', 'start_date']);
    }

    public function test_project_routes_require_auth(): void
    {
        $this->get(route('element.project.view'))->assertRedirect(route('login'));
    }
}
