<?php

namespace Tests\Support;

use App\Models\ClientInfo;
use App\Models\SelectType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

/**
 * The CRUD contract every admin module shares.
 *
 * Each module test class supplies its route prefix, model, payload and the
 * fields it requires; the tests below then walk the lifecycle every module has
 * to support. Module-specific behaviour (image pipelines, foreign keys, date
 * rules) lives in the class that owns it, not here.
 */
trait AdminModuleContract
{
    use RefreshDatabase;

    /**
     * Route name prefix, e.g. `module.education`.
     */
    abstract protected function modulePrefix(): string;

    /**
     * Request field holding the record id, e.g. `education_id`.
     */
    abstract protected function moduleIdField(): string;

    /**
     * @return class-string<Model>
     */
    abstract protected function moduleModel(): string;

    /**
     * Column whose value proves a store/update ran.
     */
    abstract protected function moduleTitleField(): string;

    /**
     * Sequence column updated by the drag-sort endpoint.
     */
    abstract protected function moduleSequenceColumn(): string;

    /**
     * A valid store payload.
     *
     * @return array<string, mixed>
     */
    abstract protected function modulePayload(): array;

    /**
     * Fields the store endpoint must reject when missing.
     *
     * @return list<string>
     */
    abstract protected function moduleRequiredFields(): array;

    /**
     * Title written by the update test.
     */
    protected function moduleUpdatedTitle(): string
    {
        return 'Updated title';
    }

    public function test_the_module_listing_renders(): void
    {
        $this->actingAs($this->adminUser())
            ->get(route($this->modulePrefix().'.view'))
            ->assertOk();
    }

    public function test_the_module_requires_its_required_fields(): void
    {
        $this->actingAs($this->adminUser())
            ->post(route($this->modulePrefix().'.store'), [])
            ->assertSessionHasErrors($this->moduleRequiredFields());
    }

    public function test_a_record_can_be_created(): void
    {
        $record = $this->createModuleRecord();
        $payload = $this->modulePayload();

        $this->assertSame(
            $payload[$this->moduleTitleField()],
            $record->{$this->moduleTitleField()},
            'the stored title does not match the submitted value'
        );
    }

    public function test_the_edit_endpoint_returns_the_record(): void
    {
        $record = $this->createModuleRecord();
        $payload = $this->modulePayload();

        $this->get(route($this->modulePrefix().'.edit', $record->getKey()))
            ->assertOk()
            ->assertJsonPath($this->moduleTitleField(), $payload[$this->moduleTitleField()]);
    }

    public function test_a_record_can_be_updated(): void
    {
        $record = $this->createModuleRecord();
        $title = $this->moduleUpdatedTitle();

        $this->put(route($this->modulePrefix().'.update'), array_merge(
            $this->modulePayload(),
            [
                $this->moduleIdField() => $record->getKey(),
                $this->moduleTitleField() => $title,
            ]
        ))
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertSame($title, $record->refresh()->{$this->moduleTitleField()});
    }

    public function test_a_record_can_be_reordered(): void
    {
        $record = $this->createModuleRecord();

        $this->post(route($this->modulePrefix().'.sequence'), [
            'order' => [['id' => $record->getKey(), 'sequence' => 7]],
        ])
            ->assertOk()
            ->assertJson(['status' => 'success']);

        $this->assertSame(7, (int) $record->refresh()->{$this->moduleSequenceColumn()});
    }

    public function test_a_record_can_be_deleted(): void
    {
        $record = $this->createModuleRecord();

        $this->get(route($this->modulePrefix().'.delete', $record->getKey()))
            ->assertRedirect();

        $this->assertDatabaseMissing($record->getTable(), ['id' => $record->getKey()]);
    }

    /*
    |--------------------------------------------------------------------------
    | Fixtures
    |--------------------------------------------------------------------------
    */

    /**
     * Create a record through the store endpoint and return it.
     *
     * @param  array<string, mixed>  $overrides
     */
    protected function createModuleRecord(array $overrides = []): Model
    {
        Storage::fake('public');
        $this->actingAs($this->adminUser());

        $this->post(
            route($this->modulePrefix().'.store'),
            array_merge($this->modulePayload(), $overrides)
        )
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        return $this->moduleModel()::query()->firstOrFail();
    }

    /**
     * A lookup value in `select_types`, returning its id.
     */
    protected function selectType(string $useFor, string $value = 'Test value'): int
    {
        $select = new SelectType;
        $select->use_for = $useFor;
        $select->value = $value;
        $select->save();

        return (int) $select->getKey();
    }

    /**
     * A client row, used by modules that hang off one (projects, testimonials).
     */
    protected function clientRecord(string $name = 'Acme Ltd'): ClientInfo
    {
        $client = new ClientInfo;
        $client->client_name = $name;
        $client->client_email = 'acme@example.test';
        $client->organization_logo = 'uploads/client/organization/logo.webp';
        $client->save();

        return $client;
    }
}
