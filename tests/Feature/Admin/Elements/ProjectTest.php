<?php

namespace Tests\Feature\Admin\Elements;

use App\Models\ProjectInfo;
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
            'start_date'    => '2024-01-01',
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
            'cover_image'   => UploadedFile::fake()->image('cover.jpg', 1000, 1000),
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
            'cover_image'   => UploadedFile::fake()->image('cover.jpg', 1000, 1000),
        ]))->assertSessionHasNoErrors();

        $project     = ProjectInfo::query()->firstOrFail();
        $oldProfile  = (string) $project->profile_image;
        $cover       = (string) $project->cover_image;

        // A new upload replaces the profile image and keeps the cover.
        $this->put(route('element.project.update'), array_merge($this->modulePayload(), [
            'project_id'    => $project->getKey(),
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
}
