<?php

namespace Tests\Feature\Admin\Modules;

use App\Models\ResearchInfo;
use App\Models\SelectType;
use App\Services\Research\ResearchService;
use Tests\Support\AdminModuleContract;
use Tests\Support\ColumnVisibilityContract;
use Tests\TestCase;

class ResearchTest extends TestCase
{
    use AdminModuleContract;
    use ColumnVisibilityContract;

    protected function modulePrefix(): string
    {
        return 'module.research';
    }

    protected function moduleIdField(): string
    {
        return 'research_id';
    }

    protected function moduleModel(): string
    {
        return ResearchInfo::class;
    }

    protected function moduleTitleField(): string
    {
        return 'research_title';
    }

    protected function moduleSequenceColumn(): string
    {
        return 'research_sequence';
    }

    protected function modulePayload(): array
    {
        return [
            'research_source' => $this->selectType('research_source'),
            'research_category' => 'Computer Science',
            'research_title' => 'A Test Paper',
        ];
    }

    protected function moduleRequiredFields(): array
    {
        return ['research_source', 'research_category', 'research_title'];
    }

    protected function moduleUpdatedTitle(): string
    {
        return 'A Revised Paper';
    }

    protected function columnSettingsModule(): string
    {
        return 'research';
    }

    protected function columnSettingsColumn(): string
    {
        return 'research_title';
    }

    public function test_the_research_source_must_exist(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.research.store'), array_merge($this->modulePayload(), [
            'research_source' => 99999,
        ]))->assertSessionHasErrors(['research_source']);
    }

    /**
     * The source must belong to the research list: an id from another
     * select-type list (here a blog category) is rejected.
     */
    public function test_the_research_source_cannot_come_from_another_list(): void
    {
        $this->actingAs($this->adminUser());

        $blogCategory = $this->selectType(SelectType::BLOG_CATEGORY, 'Blog category');

        $this->post(route('module.research.store'), array_merge($this->modulePayload(), [
            'research_source' => $blogCategory,
        ]))->assertSessionHasErrors(['research_source']);

        $this->assertDatabaseMissing('research_infos', ['research_title' => 'A Test Paper']);
    }

    public function test_the_role_is_limited_to_twenty_characters(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.research.store'), array_merge($this->modulePayload(), [
            'research_role' => 'Corresponding author role',
        ]))->assertSessionHasErrors(['research_role']);
    }

    /**
     * The form's own "Co-author" is nine characters; an eight-character cap
     * rejected the only non-author option the select offers.
     */
    public function test_the_co_author_role_is_accepted(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.research.store'), array_merge($this->modulePayload(), [
            'research_role' => 'Co-author',
        ]))->assertSessionHasNoErrors();

        $this->assertSame('Co-author', ResearchInfo::query()->firstOrFail()->research_role);
    }

    public function test_the_edit_payload_exposes_the_local_published_date(): void
    {
        $record = $this->createModuleRecord(['published_date' => '2024-06-30']);

        $this->get(route('module.research.edit', $record->getKey()))
            ->assertOk()
            ->assertJsonPath('published_date_input', '2024-06-30');
    }

    /**
     * The date input reads the service's `Y-m-d` string, never the serialised
     * date attribute: in a timezone ahead of UTC that attribute is the previous
     * day. CI runs in UTC, so the negative assertion is the proof here.
     */
    public function test_the_edit_payload_does_not_prefill_the_utc_date(): void
    {
        config(['app.timezone' => 'Europe/Paris']);
        date_default_timezone_set('Europe/Paris');

        $record = $this->createModuleRecord(['published_date' => '2024-06-30']);

        $payload = app(ResearchService::class)->findForEdit($record->getKey());

        $this->assertSame('2024-06-30', $payload['published_date_input']);
        $this->assertNotSame('2024-06-30', substr((string) $payload['published_date'], 0, 10));
    }

    /**
     * An uploaded source image is stored on the public disk, so the listing
     * needs the `storage/` prefix; a bare `asset($details)` 404s.
     */
    public function test_the_listing_links_an_uploaded_source_image_through_storage(): void
    {
        $this->actingAs($this->adminUser());

        $source = new SelectType;
        $source->use_for = SelectType::RESEARCH_SOURCE;
        $source->value = 'Uploaded source';
        $source->details = 'uploads/settings/research-source/source.png';
        $source->save();

        $this->post(route('module.research.store'), array_merge($this->modulePayload(), [
            'research_source' => $source->getKey(),
        ]))->assertSessionHasNoErrors();

        $this->get(route('module.research.view'))
            ->assertOk()
            ->assertSee(asset('storage/uploads/settings/research-source/source.png'), false);
    }

    public function test_a_json_store_flashes_and_returns_the_message(): void
    {
        $this->actingAs($this->adminUser());

        $this->postJson(route('module.research.store'), $this->modulePayload())
            ->assertOk()
            ->assertJson(['message' => 'Research info created']);

        $this->assertSame('Research info created', session('success'));
        $this->assertDatabaseCount('research_infos', 1);
    }

    public function test_a_json_update_flashes_and_returns_the_message(): void
    {
        $record = $this->createModuleRecord();

        $this->putJson(route('module.research.update'), array_merge($this->modulePayload(), [
            'research_id' => $record->getKey(),
            'research_title' => 'A Revised Paper',
        ]))
            ->assertOk()
            ->assertJson(['message' => 'Research info updated']);

        $this->assertSame('Research info updated', session('success'));
        $this->assertSame('A Revised Paper', $record->refresh()->research_title);
    }

    public function test_a_json_validation_failure_returns_422_with_the_field(): void
    {
        $this->actingAs($this->adminUser());

        $payload = $this->modulePayload();
        unset($payload['research_title']);

        $this->postJson(route('module.research.store'), $payload)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['research_title']);
    }
}
