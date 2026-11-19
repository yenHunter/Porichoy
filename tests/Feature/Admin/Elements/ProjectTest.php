<?php

namespace Tests\Feature\Admin\Elements;

use App\Models\ProjectInfo;
use App\Services\Project\ProjectService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\Support\AdminModuleContract;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use AdminModuleContract;

    protected function modulePrefix(): string
    {
        return 'element.project';
    }

    protected function moduleIdField(): string
    {
        return 'project_id';
    }

    protected function moduleModel(): string
    {
        return ProjectInfo::class;
    }

    protected function moduleTitleField(): string
    {
        return 'project_title';
    }

    protected function moduleSequenceColumn(): string
    {
        return 'project_sequence';
    }

    protected function modulePayload(): array
    {
        return [
            'project_title' => 'Acme Revamp',
            'start_date' => '2024-01-01',
        ];
    }

    protected function moduleRequiredFields(): array
    {
        return ['project_title', 'start_date'];
    }

    protected function moduleUpdatedTitle(): string
    {
        return 'Acme Revamp 2';
    }

    public function test_a_project_is_created_with_a_slug_and_an_active_status(): void
    {
        $project = $this->createModuleRecord();

        $this->assertSame('acme-revamp', $project->project_slug);
        $this->assertTrue((bool) $project->project_status);
    }

    public function test_the_end_date_cannot_precede_the_start_date(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('element.project.store'), array_merge($this->modulePayload(), [
            'end_date' => '2023-12-31',
        ]))->assertSessionHasErrors(['end_date']);
    }

    public function test_both_images_are_stored_as_webp(): void
    {
        Storage::fake('public');
        $this->actingAs($this->adminUser());

        $this->post(route('element.project.store'), array_merge($this->modulePayload(), [
            'profile_image' => UploadedFile::fake()->image('profile.jpg', 1000, 1000),
            'cover_image' => UploadedFile::fake()->image('cover.jpg', 1000, 1000),
        ]))
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $project = ProjectInfo::query()->firstOrFail();

        $this->assertStringStartsWith('uploads/project/profile/', (string) $project->profile_image);
        $this->assertStringStartsWith('uploads/project/cover/', (string) $project->cover_image);
        $this->assertStringEndsWith('.webp', (string) $project->profile_image);
        $this->assertStringEndsWith('.webp', (string) $project->cover_image);
        Storage::disk('public')->assertExists($project->profile_image);
        Storage::disk('public')->assertExists($project->cover_image);
    }

    public function test_replacing_and_deleting_a_project_cleans_up_its_images(): void
    {
        Storage::fake('public');
        $this->actingAs($this->adminUser());

        $this->post(route('element.project.store'), array_merge($this->modulePayload(), [
            'profile_image' => UploadedFile::fake()->image('first.jpg', 1000, 1000),
            'cover_image' => UploadedFile::fake()->image('cover.jpg', 1000, 1000),
        ]))->assertSessionHasNoErrors();

        $project = ProjectInfo::query()->firstOrFail();
        $oldProfile = (string) $project->profile_image;
        $cover = (string) $project->cover_image;

        // A new upload replaces the profile image and keeps the cover.
        $this->put(route('element.project.update'), array_merge($this->modulePayload(), [
            'project_id' => $project->getKey(),
            'profile_image' => UploadedFile::fake()->image('second.jpg', 1000, 1000),
        ]))
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $project->refresh();

        $this->assertNotSame($oldProfile, $project->profile_image);
        Storage::disk('public')->assertMissing($oldProfile);
        $this->assertSame($cover, $project->cover_image);

        $profile = (string) $project->profile_image;

        $this->get(route('element.project.delete', $project->getKey()))->assertRedirect();

        $this->assertDatabaseMissing('project_infos', ['id' => $project->getKey()]);
        Storage::disk('public')->assertMissing($profile);
        Storage::disk('public')->assertMissing($cover);
    }

    /**
     * Both images are optional in the payload, so an edit that does not touch
     * them must leave the stored files alone.
     */
    public function test_an_update_without_images_keeps_the_stored_ones(): void
    {
        Storage::fake('public');
        $this->actingAs($this->adminUser());

        $this->post(route('element.project.store'), array_merge($this->modulePayload(), [
            'profile_image' => UploadedFile::fake()->image('profile.jpg', 1000, 1000),
            'cover_image' => UploadedFile::fake()->image('cover.jpg', 1000, 1000),
        ]))->assertSessionHasNoErrors();

        $project = ProjectInfo::query()->firstOrFail();
        $profile = (string) $project->profile_image;
        $cover = (string) $project->cover_image;

        $this->put(route('element.project.update'), array_merge($this->modulePayload(), [
            'project_id' => $project->getKey(),
            'project_title' => 'Renamed only',
        ]))->assertSessionHasNoErrors();

        $project->refresh();

        $this->assertSame('Renamed only', $project->project_title);
        $this->assertSame($profile, $project->profile_image);
        $this->assertSame($cover, $project->cover_image);
        Storage::disk('public')->assertExists($profile);
        Storage::disk('public')->assertExists($cover);
    }

    public function test_the_stored_profile_image_can_be_removed(): void
    {
        Storage::fake('public');
        $this->actingAs($this->adminUser());

        $this->post(route('element.project.store'), array_merge($this->modulePayload(), [
            'profile_image' => UploadedFile::fake()->image('profile.jpg', 1000, 1000),
            'cover_image' => UploadedFile::fake()->image('cover.jpg', 1000, 1000),
        ]))->assertSessionHasNoErrors();

        $project = ProjectInfo::query()->firstOrFail();
        $profile = (string) $project->profile_image;
        $cover = (string) $project->cover_image;

        $this->put(route('element.project.update'), array_merge($this->modulePayload(), [
            'project_id' => $project->getKey(),
            'remove_profile_image' => '1',
        ]))->assertSessionHasNoErrors();

        $project->refresh();

        $this->assertNull($project->profile_image);
        $this->assertSame($cover, $project->cover_image);
        Storage::disk('public')->assertMissing($profile);
        Storage::disk('public')->assertExists($cover);
    }

    public function test_a_picked_image_wins_over_a_removal_request(): void
    {
        Storage::fake('public');
        $this->actingAs($this->adminUser());

        $this->post(route('element.project.store'), array_merge($this->modulePayload(), [
            'cover_image' => UploadedFile::fake()->image('cover.jpg', 1000, 1000),
        ]))->assertSessionHasNoErrors();

        $project = ProjectInfo::query()->firstOrFail();
        $oldCover = (string) $project->cover_image;

        $this->put(route('element.project.update'), array_merge($this->modulePayload(), [
            'project_id' => $project->getKey(),
            'remove_cover_image' => '1',
            'cover_image' => UploadedFile::fake()->image('new-cover.jpg', 1000, 1000),
        ]))->assertSessionHasNoErrors();

        $project->refresh();

        $this->assertNotSame($oldCover, $project->cover_image);
        Storage::disk('public')->assertMissing($oldCover);
        Storage::disk('public')->assertExists($project->cover_image);
    }

    public function test_the_edit_payload_exposes_the_image_urls_and_local_dates(): void
    {
        Storage::fake('public');
        $this->actingAs($this->adminUser());

        $this->post(route('element.project.store'), array_merge($this->modulePayload(), [
            'start_date' => '2024-06-30',
            'end_date' => '2024-07-01',
            'profile_image' => UploadedFile::fake()->image('profile.jpg', 1000, 1000),
        ]))->assertSessionHasNoErrors();

        $project = ProjectInfo::query()->firstOrFail();

        $this->get(route('element.project.edit', $project->getKey()))
            ->assertOk()
            ->assertJsonPath('start_date_input', '2024-06-30')
            ->assertJsonPath('end_date_input', '2024-07-01')
            ->assertJsonPath('profile_image_url', asset('storage/'.$project->profile_image))
            // The cover falls back to the placeholder the themes show.
            ->assertJsonPath('cover_image_url', asset('static/module/project.png'));
    }

    /**
     * The date inputs read the service's `Y-m-d` strings, never the serialised
     * date attribute: in a timezone ahead of UTC that attribute is the previous
     * day. CI runs in UTC, so the negative assertion is the proof here.
     */
    public function test_the_edit_payload_does_not_prefill_the_utc_date(): void
    {
        config(['app.timezone' => 'Europe/Paris']);
        date_default_timezone_set('Europe/Paris');

        Storage::fake('public');

        $project = ProjectInfo::create([
            'project_title' => 'Timezone check',
            'start_date' => '2024-06-30',
        ]);

        $payload = app(ProjectService::class)->findForEdit($project->getKey());

        $this->assertSame('2024-06-30', $payload['start_date_input']);
        $this->assertNotSame('2024-06-30', substr((string) $payload['start_date'], 0, 10));
    }

    public function test_a_json_store_flashes_and_returns_the_message(): void
    {
        $this->actingAs($this->adminUser());
        Storage::fake('public');

        $this->postJson(route('element.project.store'), $this->modulePayload())
            ->assertOk()
            ->assertJson(['message' => 'Project info created']);

        $this->assertSame('Project info created', session('success'));
        $this->assertDatabaseCount('project_infos', 1);
    }

    public function test_a_json_validation_failure_returns_422_with_the_field(): void
    {
        $this->actingAs($this->adminUser());

        $payload = $this->modulePayload();
        unset($payload['project_title']);

        $this->postJson(route('element.project.store'), $payload)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['project_title']);
    }
}
