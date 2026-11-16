<?php

namespace Tests\Feature\Admin\Settings;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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

    /**
     * The thumbnail is stored in `details`, survives an update that uploads
     * nothing, is replaced (with the old file removed) by a new upload, and is
     * deleted with the row.
     */
    public function test_the_thumbnail_is_stored_replaced_and_removed(): void
    {
        Storage::fake('public');
        $this->actingAs($this->adminUser());

        $this->post(route('settings.research_source.store'), array_merge(
            $this->lookupCreatePayload(),
            ['thumbnail' => UploadedFile::fake()->image('source.jpg', 200, 200)]
        ))->assertSessionHasNoErrors();

        $record = $this->lookupRecord();
        $first = (string) $record->details;

        $this->assertStringStartsWith('uploads/settings/research-source/', $first);
        Storage::disk('public')->assertExists($first);

        // An update without a file keeps the stored thumbnail.
        $this->put(route('settings.research_source.update'), $this->lookupUpdatePayload((string) $record->getKey()))
            ->assertSessionHasNoErrors();

        $this->assertSame($first, $record->refresh()->details);
        Storage::disk('public')->assertExists($first);

        // A new upload replaces the stored file.
        $this->put(route('settings.research_source.update'), array_merge(
            $this->lookupUpdatePayload((string) $record->getKey()),
            ['thumbnail' => UploadedFile::fake()->image('new.jpg', 200, 200)]
        ))->assertSessionHasNoErrors();

        $second = (string) $record->refresh()->details;

        $this->assertNotSame($first, $second);
        Storage::disk('public')->assertMissing($first);
        Storage::disk('public')->assertExists($second);

        // Deleting the row removes the file too.
        $this->get(route('settings.research_source.delete', $record->getKey()))->assertRedirect();
        Storage::disk('public')->assertMissing($second);
    }
}
