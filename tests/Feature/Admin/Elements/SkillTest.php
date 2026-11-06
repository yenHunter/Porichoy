<?php

namespace Tests\Feature\Admin\Elements;

use App\Models\SkillInfo;
use Illuminate\Http\UploadedFile;
use Tests\Support\AdminModuleContract;
use Tests\TestCase;

class SkillTest extends TestCase
{
    use AdminModuleContract;

    protected function modulePrefix(): string
    {
        return 'element.skill';
    }

    protected function moduleIdField(): string
    {
        return 'skill_id';
    }

    protected function moduleModel(): string
    {
        return SkillInfo::class;
    }

    protected function moduleTitleField(): string
    {
        return 'skill_title';
    }

    protected function moduleSequenceColumn(): string
    {
        return 'skill_sequence';
    }

    protected function modulePayload(): array
    {
        return [
            'skill_title' => 'Laravel',
            'skill_score' => 90,
        ];
    }

    protected function moduleRequiredFields(): array
    {
        return ['skill_title'];
    }

    protected function moduleUpdatedTitle(): string
    {
        return 'Laravel 12';
    }

    public function test_the_score_must_be_numeric(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('element.skill.store'), array_merge($this->modulePayload(), [
            'skill_score' => 'expert',
        ]))->assertSessionHasErrors(['skill_score']);
    }

    public function test_a_non_image_skill_logo_is_rejected(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('element.skill.store'), array_merge($this->modulePayload(), [
            'skill_logo' => UploadedFile::fake()->create('laravel.pdf', 20, 'application/pdf'),
        ]))->assertSessionHasErrors(['skill_logo']);
    }
}
