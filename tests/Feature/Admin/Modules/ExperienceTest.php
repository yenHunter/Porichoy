<?php

namespace Tests\Feature\Admin\Modules;

use App\Models\ExperienceInfo;
use App\Models\SelectType;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\Support\AdminModuleContract;
use Tests\Support\ColumnVisibilityContract;
use Tests\TestCase;

class ExperienceTest extends TestCase
{
    use AdminModuleContract;
    use ColumnVisibilityContract;

    protected function modulePrefix(): string
    {
        return 'module.experience';
    }

    protected function moduleIdField(): string
    {
        return 'experience_id';
    }

    protected function moduleModel(): string
    {
        return ExperienceInfo::class;
    }

    protected function moduleTitleField(): string
    {
        return 'employment_position';
    }

    protected function moduleSequenceColumn(): string
    {
        return 'employment_sequence';
    }

    protected function modulePayload(): array
    {
        return [
            'employment_position' => 'Engineer',
            'employment_type' => $this->selectType(SelectType::EMPLOYMENT_TYPE),
            'employment_organization' => 'Test Company',
            'start_date' => '2018-01-01',
        ];
    }

    protected function moduleRequiredFields(): array
    {
        return ['employment_position', 'employment_type', 'employment_organization', 'start_date'];
    }

    protected function moduleUpdatedTitle(): string
    {
        return 'Senior Engineer';
    }

    protected function columnSettingsModule(): string
    {
        return 'experience';
    }

    protected function columnSettingsColumn(): string
    {
        return 'employment_position';
    }

    public function test_the_employment_type_must_exist(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.experience.store'), array_merge($this->modulePayload(), [
            'employment_type' => 99999,
        ]))->assertSessionHasErrors(['employment_type']);
    }

    public function test_the_location_type_must_exist_when_given(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.experience.store'), array_merge($this->modulePayload(), [
            'location_type' => 99999,
        ]))->assertSessionHasErrors(['location_type']);
    }

    /**
     * Both lookups must come from their own list: a blog category id is
     * rejected for the employment type and for the location type.
     */
    public function test_the_experience_lookups_cannot_come_from_another_list(): void
    {
        $this->actingAs($this->adminUser());

        $blogCategory = $this->selectType(SelectType::BLOG_CATEGORY, 'Blog category');

        $this->post(route('module.experience.store'), array_merge($this->modulePayload(), [
            'employment_type' => $blogCategory,
        ]))->assertSessionHasErrors(['employment_type']);

        $this->post(route('module.experience.store'), array_merge($this->modulePayload(), [
            'location_type' => $blogCategory,
        ]))->assertSessionHasErrors(['location_type']);

        $this->assertDatabaseMissing('experience_infos', ['employment_position' => 'Engineer']);
    }

    /**
     * The edit payload carries the dates as the form shows them, not as UTC.
     *
     * The app timezone is ahead of UTC, so a raw ISO value would make the
     * date input show the previous day.
     */
    public function test_the_edit_payload_exposes_local_dates(): void
    {
        $record = $this->createModuleRecord(['end_date' => '2024-06-30']);

        $this->get(route('module.experience.edit', $record->getKey()))
            ->assertOk()
            ->assertJsonPath('start_date_input', '2018-01-01')
            ->assertJsonPath('end_date_input', '2024-06-30');
    }

    public function test_the_end_date_cannot_precede_the_start_date(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.experience.store'), array_merge($this->modulePayload(), [
            'start_date' => '2020-01-01',
            'end_date' => '2019-01-01',
        ]))->assertSessionHasErrors(['end_date']);
    }

    public function test_the_end_date_may_equal_the_start_date(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.experience.store'), array_merge($this->modulePayload(), [
            'start_date' => '2020-01-01',
            'end_date' => '2020-01-01',
        ]))->assertSessionHasNoErrors();
    }

    public function test_a_non_image_organization_logo_is_rejected(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.experience.store'), array_merge($this->modulePayload(), [
            'organization_logo' => UploadedFile::fake()->create('logo.pdf', 20, 'application/pdf'),
        ]))->assertSessionHasErrors(['organization_logo']);
    }

    public function test_the_stored_logo_can_be_removed_without_a_replacement(): void
    {
        $record = $this->createModuleRecord([
            'organization_logo' => UploadedFile::fake()->image('logo.png', 120, 120),
        ]);

        $stored = (string) $record->organization_logo;

        $this->put(route('module.experience.update'), array_merge($this->modulePayload(), [
            'experience_id' => $record->getKey(),
            'remove_organization_logo' => '1',
        ]))
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertNull($record->refresh()->organization_logo);
        Storage::disk('public')->assertMissing($stored);
    }

    public function test_a_picked_logo_wins_over_a_removal_request(): void
    {
        $record = $this->createModuleRecord([
            'organization_logo' => UploadedFile::fake()->image('first.png', 120, 120),
        ]);

        $old_logo = (string) $record->organization_logo;

        $this->put(route('module.experience.update'), array_merge($this->modulePayload(), [
            'experience_id' => $record->getKey(),
            'organization_logo' => UploadedFile::fake()->image('second.png', 120, 120),
            'remove_organization_logo' => '1',
        ]))->assertSessionHasNoErrors();

        $record->refresh();

        $this->assertNotNull($record->organization_logo);
        $this->assertNotSame($old_logo, $record->organization_logo);
        Storage::disk('public')->assertMissing($old_logo);
        Storage::disk('public')->assertExists($record->organization_logo);
    }

    public function test_the_scripted_save_answers_json_and_flashes_its_message(): void
    {
        $this->actingAs($this->adminUser());

        $this->postJson(route('module.experience.store'), $this->modulePayload())
            ->assertOk()
            ->assertJson(['message' => 'Experience info created'])
            ->assertSessionHas('success', 'Experience info created');
    }

    public function test_the_scripted_save_reports_field_errors_as_json(): void
    {
        $this->actingAs($this->adminUser());

        $this->postJson(route('module.experience.store'), [])
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'employment_position',
                'employment_type',
                'employment_organization',
                'start_date',
            ]);
    }

    public function test_the_edit_payload_exposes_the_stored_logo_url(): void
    {
        $record = $this->createModuleRecord([
            'organization_logo' => UploadedFile::fake()->image('logo.png', 120, 120),
        ]);

        $this->get(route('module.experience.edit', $record->getKey()))
            ->assertOk()
            ->assertJsonPath('organization_logo_url', asset('storage/'.$record->organization_logo));
    }

    public function test_the_organization_logo_is_stored_as_webp(): void
    {
        $record = $this->createModuleRecord([
            'organization_logo' => UploadedFile::fake()->image('logo.png', 600, 600),
        ]);

        $this->assertStringStartsWith('uploads/experience/', (string) $record->organization_logo);
        $this->assertStringEndsWith('.webp', (string) $record->organization_logo);
        Storage::disk('public')->assertExists($record->organization_logo);
    }
}
