<?php

namespace Tests\Feature\Admin\Settings;

use Illuminate\Http\UploadedFile;
use Tests\Support\LookupListContract;
use Tests\TestCase;

class ResearchSourceTest extends TestCase
{
    use LookupListContract;

    protected function lookupPrefix(): string
    {
        return 'settings.research_source';
    }

    protected function lookupUseFor(): string
    {
        return 'research_source';
    }

    protected function lookupIdField(): string
    {
        return 'research_source_id';
    }

    protected function lookupCreatePayload(): array
    {
        return ['title' => 'Scopus', 'status' => 1];
    }

    protected function lookupUpdatePayload(string $id): array
    {
        return [
            'research_source_id' => $id,
            'title' => 'Web of Science',
            'status' => 1,
        ];
    }

    public function test_a_non_image_thumbnail_is_rejected(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('settings.research_source.store'), array_merge(
            $this->lookupCreatePayload(),
            ['thumbnail' => UploadedFile::fake()->create('source.pdf', 20, 'application/pdf')]
        ))->assertSessionHasErrors(['thumbnail']);
    }
}
