<?php

namespace Tests\Feature\Admin\Elements;

use App\Models\ClientInfo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\Support\AdminModuleContract;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use AdminModuleContract;

    protected function modulePrefix(): string
    {
        return 'element.client';
    }

    protected function moduleIdField(): string
    {
        return 'client_id';
    }

    protected function moduleModel(): string
    {
        return ClientInfo::class;
    }

    protected function moduleTitleField(): string
    {
        return 'client_name';
    }

    protected function moduleSequenceColumn(): string
    {
        return 'client_sequence';
    }

    protected function modulePayload(): array
    {
        return [
            'client_name' => 'Acme Ltd',
            'client_email' => 'acme@example.test',
            'organization_logo' => UploadedFile::fake()->image('logo.png', 300, 300),
        ];
    }

    protected function moduleRequiredFields(): array
    {
        // Both images are optional: the element offers Remove/Undo and the
        // model falls back to a placeholder, so a create needs neither.
        return ['client_name', 'client_email'];
    }

    protected function moduleUpdatedTitle(): string
    {
        return 'Acme Limited';
    }

    public function test_the_email_must_be_valid(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('element.client.store'), array_merge($this->modulePayload(), [
            'client_email' => 'not-an-email',
        ]))->assertSessionHasErrors(['client_email']);
    }

    public function test_a_non_image_logo_is_rejected(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('element.client.store'), array_merge($this->modulePayload(), [
            'organization_logo' => UploadedFile::fake()->create('logo.pdf', 20, 'application/pdf'),
        ]))->assertSessionHasErrors(['organization_logo']);
    }

    public function test_the_logo_is_stored_as_webp_and_replacing_it_deletes_the_old_file(): void
    {
        Storage::fake('public');
        $this->actingAs($this->adminUser());

        $this->post(route('element.client.store'), $this->modulePayload())
            ->assertSessionHasNoErrors();

        $client = ClientInfo::query()->firstOrFail();
        $old = (string) $client->organization_logo;

        $this->assertStringStartsWith('uploads/client/organization/', $old);
        $this->assertStringEndsWith('.webp', $old);
        Storage::disk('public')->assertExists($old);

        $this->put(route('element.client.update'), array_merge($this->modulePayload(), [
            'client_id' => $client->getKey(),
            'organization_logo' => UploadedFile::fake()->image('new-logo.png', 300, 300),
        ]))
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $client->refresh();

        $this->assertNotSame($old, $client->organization_logo);
        Storage::disk('public')->assertMissing($old);
        Storage::disk('public')->assertExists($client->organization_logo);
    }

    public function test_the_edit_payload_exposes_both_image_urls(): void
    {
        $record = $this->createModuleRecord([
            'client_picture' => UploadedFile::fake()->image('picture.png', 300, 300),
        ]);

        $this->get(route('element.client.edit', $record->getKey()))
            ->assertOk()
            ->assertJsonPath('client_picture_url', asset('storage/'.$record->client_picture))
            ->assertJsonPath('organization_logo_url', asset('storage/'.$record->organization_logo));
    }

    /**
     * Saving an edit without touching an image must not clear it: the file
     * inputs send nothing and no removal is queued.
     */
    public function test_an_update_without_a_new_image_keeps_the_stored_ones(): void
    {
        $record = $this->createModuleRecord([
            'client_picture' => UploadedFile::fake()->image('picture.png', 300, 300),
        ]);

        $picture = (string) $record->client_picture;
        $logo = (string) $record->organization_logo;

        $payload = $this->modulePayload();
        unset($payload['organization_logo']);

        $this->put(route('element.client.update'), array_merge($payload, [
            'client_id' => $record->getKey(),
        ]))->assertSessionHasNoErrors();

        $record->refresh();

        $this->assertSame($picture, $record->client_picture);
        $this->assertSame($logo, $record->organization_logo);
        Storage::disk('public')->assertExists($picture);
        Storage::disk('public')->assertExists($logo);
    }

    public function test_the_stored_picture_can_be_removed(): void
    {
        $record = $this->createModuleRecord([
            'client_picture' => UploadedFile::fake()->image('picture.png', 300, 300),
        ]);

        $picture = (string) $record->client_picture;

        $payload = $this->modulePayload();
        unset($payload['organization_logo']);

        $this->put(route('element.client.update'), array_merge($payload, [
            'client_id' => $record->getKey(),
            'remove_client_picture' => '1',
        ]))->assertSessionHasNoErrors();

        $record->refresh();

        $this->assertNull($record->client_picture);
        Storage::disk('public')->assertMissing($picture);
        $this->assertSame(asset('static/module/client.png'), $record->client_picture_url);
    }

    public function test_the_stored_logo_can_be_removed(): void
    {
        $record = $this->createModuleRecord();

        $logo = (string) $record->organization_logo;

        $payload = $this->modulePayload();
        unset($payload['organization_logo']);

        $this->put(route('element.client.update'), array_merge($payload, [
            'client_id' => $record->getKey(),
            'remove_organization_logo' => '1',
        ]))->assertSessionHasNoErrors();

        $record->refresh();

        $this->assertNull($record->organization_logo);
        Storage::disk('public')->assertMissing($logo);
        $this->assertSame(asset('static/module/organization.png'), $record->client_org_logo_url);
    }

    /**
     * A picked file wins over a removal request in the same payload.
     */
    public function test_a_picked_image_wins_over_a_removal_request(): void
    {
        $record = $this->createModuleRecord([
            'client_picture' => UploadedFile::fake()->image('picture.png', 300, 300),
        ]);

        $old = (string) $record->client_picture;

        $this->put(route('element.client.update'), array_merge($this->modulePayload(), [
            'client_id' => $record->getKey(),
            'remove_client_picture' => '1',
            'client_picture' => UploadedFile::fake()->image('new-picture.png', 300, 300),
        ]))->assertSessionHasNoErrors();

        $record->refresh();

        $this->assertNotSame($old, $record->client_picture);
        $this->assertNotNull($record->client_picture);
        Storage::disk('public')->assertMissing($old);
        Storage::disk('public')->assertExists($record->client_picture);
    }

    public function test_a_json_store_flashes_and_returns_the_message(): void
    {
        $this->actingAs($this->adminUser());
        Storage::fake('public');

        $this->postJson(route('element.client.store'), [
            'client_name' => 'Acme Ltd',
            'client_email' => 'acme@example.test',
        ])
            ->assertOk()
            ->assertJson(['message' => 'Client added successfully.']);

        $this->assertSame('Client added successfully.', session('success'));
        $this->assertDatabaseCount('client_infos', 1);
    }

    public function test_a_json_validation_failure_returns_422_with_the_field(): void
    {
        $this->actingAs($this->adminUser());

        $this->postJson(route('element.client.store'), [
            'client_email' => 'acme@example.test',
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['client_name']);
    }

    public function test_the_image_errors_read_as_field_names(): void
    {
        $this->actingAs($this->adminUser());

        $this->postJson(route('element.client.store'), [
            'client_name' => 'Acme Ltd',
            'client_email' => 'acme@example.test',
            'organization_logo' => UploadedFile::fake()->create('logo.pdf', 20, 'application/pdf'),
        ])
            ->assertStatus(422)
            ->assertJsonPath(
                'errors.organization_logo.0',
                'The organization logo field must be an image.'
            );
    }
}
