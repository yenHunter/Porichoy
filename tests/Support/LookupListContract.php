<?php

namespace Tests\Support;

use App\Models\SelectType;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * The CRUD contract every `select_types` lookup list shares.
 *
 * Research sources, location types, employment types and training categories
 * are all one table filtered by `use_for`, so their screens are one behaviour
 * with different labels.
 */
trait LookupListContract
{
    use RefreshDatabase;

    /**
     * Route name prefix, e.g. `settings.research_source`.
     */
    abstract protected function lookupPrefix(): string;

    /**
     * Value stored in `select_types.use_for`, e.g. `research_source`.
     */
    abstract protected function lookupUseFor(): string;

    /**
     * Request field holding the record id, e.g. `research_source_id`.
     */
    abstract protected function lookupIdField(): string;

    /**
     * A valid create payload.
     *
     * @return array<string, mixed>
     */
    protected function lookupCreatePayload(): array
    {
        return ['title' => 'First value'];
    }

    /**
     * The update payload, including the record id.
     *
     * @return array<string, mixed>
     */
    protected function lookupUpdatePayload(string $id): array
    {
        return [
            $this->lookupIdField() => $id,
            'title'                => 'Second value',
        ];
    }

    public function test_the_lookup_listing_renders(): void
    {
        $this->actingAs($this->adminUser())
            ->get(route($this->lookupPrefix() . '.view'))
            ->assertOk();
    }

    public function test_the_lookup_requires_a_title(): void
    {
        $this->actingAs($this->adminUser())
            ->post(route($this->lookupPrefix() . '.store'), [])
            ->assertSessionHasErrors(['title']);
    }

    public function test_a_lookup_value_can_be_created(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route($this->lookupPrefix() . '.store'), $this->lookupCreatePayload())
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $record = $this->lookupRecord();

        $this->assertNotNull($record, 'the lookup value was not created');
        $this->assertSame(
            $this->lookupCreatePayload()['title'],
            $record->value
        );
    }

    public function test_the_lookup_edit_endpoint_returns_the_value(): void
    {
        $record = $this->createLookupRecord();

        $this->get(route($this->lookupPrefix() . '.edit', $record->getKey()))
            ->assertOk()
            ->assertJsonPath('value', $record->value);
    }

    public function test_a_lookup_value_can_be_updated(): void
    {
        $record = $this->createLookupRecord();

        $payload = $this->lookupUpdatePayload((string) $record->getKey());

        $this->put(route($this->lookupPrefix() . '.update'), $payload)
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertSame($payload['title'], $record->refresh()->value);
    }

    public function test_a_lookup_value_can_be_deleted(): void
    {
        $record = $this->createLookupRecord();

        $this->get(route($this->lookupPrefix() . '.delete', $record->getKey()))
            ->assertRedirect();

        $this->assertDatabaseMissing('select_types', ['id' => $record->getKey()]);
    }

    /*
    |--------------------------------------------------------------------------
    | Fixtures
    |--------------------------------------------------------------------------
    */

    protected function createLookupRecord(): SelectType
    {
        $this->actingAs($this->adminUser());

        $this->post(route($this->lookupPrefix() . '.store'), $this->lookupCreatePayload())
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        return $this->lookupRecord();
    }

    protected function lookupRecord(): SelectType
    {
        $record = SelectType::where('use_for', $this->lookupUseFor())->first();

        $this->assertNotNull($record, 'the lookup value was not created');

        return $record;
    }
}
