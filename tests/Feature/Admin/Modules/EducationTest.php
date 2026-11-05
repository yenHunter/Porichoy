<?php

namespace Tests\Feature\Admin\Modules;

use App\Models\EducationInfo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\Support\AdminModuleContract;
use Tests\Support\ColumnVisibilityContract;
use Tests\TestCase;

class EducationTest extends TestCase
{
    use AdminModuleContract;
    use ColumnVisibilityContract;

    protected function modulePrefix(): string
    {
        return 'module.education';
    }

    protected function moduleIdField(): string
    {
        return 'education_id';
    }

    protected function moduleModel(): string
    {
        return EducationInfo::class;
    }

    protected function moduleTitleField(): string
    {
        return 'education_degree';
    }

    protected function moduleSequenceColumn(): string
    {
        return 'education_sequence';
    }

    protected function modulePayload(): array
    {
        return [
            'education_degree'    => 'BSc',
            'education_institute' => 'Test University',
            'start_date'          => '2018-01-01',
        ];
    }

    protected function moduleRequiredFields(): array
    {
        return ['education_degree', 'education_institute', 'start_date'];
    }

    protected function moduleUpdatedTitle(): string
    {
        return 'MSc';
    }

    protected function columnSettingsModule(): string
    {
        return 'education';
    }

    protected function columnSettingsColumn(): string
    {
        return 'education_degree';
    }

    /**
     * The edit payload carries the dates as the form shows them, not as UTC.
     *
     * The app timezone is ahead of UTC, so a raw ISO value would make the
     * date input show the previous day.
     */
    public function test_the_edit_payload_exposes_local_dates(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.education.store'), array_merge($this->modulePayload(), [
            'start_date' => '2020-01-01',
            'end_date'   => '2024-06-30',
        ]))->assertSessionHasNoErrors();

        $education = EducationInfo::query()->firstOrFail();

        $this->get(route('module.education.edit', $education->getKey()))
            ->assertOk()
            ->assertJsonPath('start_date_input', '2020-01-01')
            ->assertJsonPath('end_date_input', '2024-06-30');
    }

    public function test_the_end_date_cannot_precede_the_start_date(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.education.store'), array_merge($this->modulePayload(), [
            'start_date' => '2020-01-01',
            'end_date'   => '2019-01-01',
        ]))->assertSessionHasErrors(['end_date']);
    }

    public function test_the_end_date_may_equal_the_start_date(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.education.store'), array_merge($this->modulePayload(), [
            'start_date' => '2020-01-01',
            'end_date'   => '2020-01-01',
        ]))->assertSessionHasNoErrors();
    }

    public function test_a_non_image_institute_logo_is_rejected(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.education.store'), array_merge($this->modulePayload(), [
            'institute_logo' => UploadedFile::fake()->create('degree.pdf', 20, 'application/pdf'),
        ]))->assertSessionHasErrors(['institute_logo']);
    }

    public function test_the_institute_logo_is_stored_as_webp(): void
    {
        Storage::fake('public');
        $this->actingAs($this->adminUser());

        $this->post(route('module.education.store'), array_merge($this->modulePayload(), [
            'institute_logo' => UploadedFile::fake()->image('logo.png', 600, 600),
        ]))->assertSessionHasNoErrors();

        $education = EducationInfo::query()->firstOrFail();

        $this->assertStringStartsWith('uploads/education/', (string) $education->institute_logo);
        $this->assertStringEndsWith('.webp', (string) $education->institute_logo);
        Storage::disk('public')->assertExists($education->institute_logo);
    }
}
