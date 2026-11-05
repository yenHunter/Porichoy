<?php

namespace Tests\Feature\Admin\Modules;

use App\Models\ExperienceInfo;
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
            'employment_position'     => 'Developer',
            'employment_type'         => $this->selectType('employment_type'),
            'employment_organization' => 'Test Organisation',
            'start_date'              => '2020-01-01',
        ];
    }

    protected function moduleRequiredFields(): array
    {
        return ['employment_position', 'employment_type', 'employment_organization', 'start_date'];
    }

    protected function moduleUpdatedTitle(): string
    {
        return 'Senior Developer';
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

    public function test_the_end_date_must_be_after_the_start_date(): void
    {
        $this->actingAs($this->adminUser());

        // This module uses `after:` rather than `after_or_equal:`.
        $this->post(route('module.experience.store'), array_merge($this->modulePayload(), [
            'start_date' => '2020-01-01',
            'end_date'   => '2020-01-01',
        ]))->assertSessionHasErrors(['end_date']);
    }
}
