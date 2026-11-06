<?php

namespace Tests\Feature\Admin\Elements;

use App\Models\ServiceInfo;
use Illuminate\Http\UploadedFile;
use Tests\Support\AdminModuleContract;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use AdminModuleContract;

    protected function modulePrefix(): string
    {
        return 'element.service';
    }

    protected function moduleIdField(): string
    {
        return 'service_id';
    }

    protected function moduleModel(): string
    {
        return ServiceInfo::class;
    }

    protected function moduleTitleField(): string
    {
        return 'service_title';
    }

    protected function moduleSequenceColumn(): string
    {
        return 'service_sequence';
    }

    protected function modulePayload(): array
    {
        return [
            'service_title' => 'Branding',
        ];
    }

    protected function moduleRequiredFields(): array
    {
        return ['service_title'];
    }

    protected function moduleUpdatedTitle(): string
    {
        return 'Branding & Identity';
    }

    public function test_a_non_image_service_icon_is_rejected(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('element.service.store'), array_merge($this->modulePayload(), [
            'service_icon' => UploadedFile::fake()->create('icon.pdf', 20, 'application/pdf'),
        ]))->assertSessionHasErrors(['service_icon']);
    }

    public function test_the_service_skills_must_be_a_list(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('element.service.store'), array_merge($this->modulePayload(), [
            'service_skills' => 'not-a-list',
        ]))->assertSessionHasErrors(['service_skills']);
    }
}
