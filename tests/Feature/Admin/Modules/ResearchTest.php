<?php

namespace Tests\Feature\Admin\Modules;

use App\Models\ResearchInfo;
use App\Models\SelectType;
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

    public function test_the_role_is_limited_to_eight_characters(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.research.store'), array_merge($this->modulePayload(), [
            'research_role' => 'First author',
        ]))->assertSessionHasErrors(['research_role']);
    }
}
