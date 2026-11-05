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
            'client_name'       => 'Acme Ltd',
            'client_email'      => 'acme@example.test',
            'organization_logo' => UploadedFile::fake()->image('logo.png', 300, 300),
        ];
    }

    protected function moduleRequiredFields(): array
    {
        return ['client_name', 'client_email', 'organization_logo'];
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
        $old    = (string) $client->organization_logo;

        $this->assertStringStartsWith('uploads/client/organization/', $old);
        $this->assertStringEndsWith('.webp', $old);
        Storage::disk('public')->assertExists($old);

        $this->put(route('element.client.update'), array_merge($this->modulePayload(), [
            'client_id'         => $client->getKey(),
            'organization_logo' => UploadedFile::fake()->image('new-logo.png', 300, 300),
        ]))
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $client->refresh();

        $this->assertNotSame($old, $client->organization_logo);
        Storage::disk('public')->assertMissing($old);
        Storage::disk('public')->assertExists($client->organization_logo);
    }
}
