<?php

namespace Tests\Feature\Admin\Modules;

use App\Models\TrainingInfo;
use Tests\Support\AdminModuleContract;
use Tests\Support\ColumnVisibilityContract;
use Tests\TestCase;

class TrainingTest extends TestCase
{
    use AdminModuleContract;
    use ColumnVisibilityContract;

    protected function modulePrefix(): string
    {
        return 'module.training';
    }

    protected function moduleIdField(): string
    {
        return 'training_id';
    }

    protected function moduleModel(): string
    {
        return TrainingInfo::class;
    }

    protected function moduleTitleField(): string
    {
        return 'training_title';
    }

    protected function moduleSequenceColumn(): string
    {
        return 'training_sequence';
    }

    protected function modulePayload(): array
    {
        return [
            'training_title' => 'Laravel Bootcamp',
            'training_category' => $this->selectType('training_category'),
            'training_institute' => 'Test Institute',
        ];
    }

    protected function moduleRequiredFields(): array
    {
        return ['training_title', 'training_category', 'training_institute'];
    }

    protected function moduleUpdatedTitle(): string
    {
        return 'Laravel Bootcamp 2';
    }

    protected function columnSettingsModule(): string
    {
        return 'training';
    }

    protected function columnSettingsColumn(): string
    {
        return 'training_title';
    }

    public function test_the_training_category_must_exist(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.training.store'), array_merge($this->modulePayload(), [
            'training_category' => 99999,
        ]))->assertSessionHasErrors(['training_category']);
    }

    public function test_the_start_date_cannot_be_in_the_future(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.training.store'), array_merge($this->modulePayload(), [
            'start_date' => now()->addMonth()->toDateString(),
        ]))->assertSessionHasErrors(['start_date']);
    }

    public function test_the_end_date_cannot_precede_the_start_date(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.training.store'), array_merge($this->modulePayload(), [
            'start_date' => '2020-01-01',
            'end_date' => '2019-12-31',
        ]))->assertSessionHasErrors(['end_date']);
    }
}
