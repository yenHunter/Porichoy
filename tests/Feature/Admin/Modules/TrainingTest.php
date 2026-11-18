<?php

namespace Tests\Feature\Admin\Modules;

use App\Models\SelectType;
use App\Models\TrainingInfo;
use App\Services\Training\TrainingService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\Support\AdminModuleContract;
use Tests\Support\ColumnVisibilityContract;
use Tests\TestCase;

class TrainingTest extends TestCase
{
    use AdminModuleContract;
    use ColumnVisibilityContract;

    protected function modulePrefix(): string
    {
        return 'module.training';
    }

    protected function moduleIdField(): string
    {
        return 'training_id';
    }

    protected function moduleModel(): string
    {
        return TrainingInfo::class;
    }

    protected function moduleTitleField(): string
    {
        return 'training_title';
    }

    protected function moduleSequenceColumn(): string
    {
        return 'training_sequence';
    }

    protected function modulePayload(): array
    {
        return [
            'training_title' => 'Laravel Bootcamp',
            'training_category' => $this->selectType('training_category'),
            'training_institute' => 'Test Institute',
        ];
    }

    protected function moduleRequiredFields(): array
    {
        return ['training_title', 'training_category', 'training_institute'];
    }

    protected function moduleUpdatedTitle(): string
    {
        return 'Laravel Bootcamp 2';
    }

    protected function columnSettingsModule(): string
    {
        return 'training';
    }

    protected function columnSettingsColumn(): string
    {
        return 'training_title';
    }

    public function test_the_training_category_must_exist(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.training.store'), array_merge($this->modulePayload(), [
            'training_category' => 99999,
        ]))->assertSessionHasErrors(['training_category']);
    }

    /**
     * The category must belong to the training list: an id from another
     * select-type list (here a blog category) is rejected.
     */
    public function test_the_training_category_cannot_come_from_another_list(): void
    {
        $this->actingAs($this->adminUser());

        $blogCategory = $this->selectType(SelectType::BLOG_CATEGORY, 'Blog category');

        $this->post(route('module.training.store'), array_merge($this->modulePayload(), [
            'training_category' => $blogCategory,
        ]))->assertSessionHasErrors(['training_category']);

        $this->assertDatabaseMissing('training_infos', ['training_title' => 'Laravel Bootcamp']);
    }

    public function test_the_start_date_cannot_be_in_the_future(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.training.store'), array_merge($this->modulePayload(), [
            'start_date' => now()->addMonth()->toDateString(),
        ]))->assertSessionHasErrors(['start_date']);
    }

    public function test_the_end_date_cannot_precede_the_start_date(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.training.store'), array_merge($this->modulePayload(), [
            'start_date' => '2020-01-01',
            'end_date' => '2019-12-31',
        ]))->assertSessionHasErrors(['end_date']);
    }

    public function test_a_certificate_file_is_stored(): void
    {
        $this->actingAs($this->adminUser());
        Storage::fake('public');

        $this->post(route('module.training.store'), array_merge($this->modulePayload(), [
            'training_certificate' => UploadedFile::fake()->create('certificate.pdf', 120, 'application/pdf'),
        ]))
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $record = TrainingInfo::query()->firstOrFail();

        $this->assertStringStartsWith('uploads/training/', (string) $record->training_certificate);
        $this->assertStringEndsWith('.pdf', (string) $record->training_certificate);
        Storage::disk('public')->assertExists($record->training_certificate);
    }

    public function test_a_certificate_of_the_wrong_type_is_rejected(): void
    {
        $this->actingAs($this->adminUser());
        Storage::fake('public');

        $this->post(route('module.training.store'), array_merge($this->modulePayload(), [
            'training_certificate' => UploadedFile::fake()->create('notes.txt', 10, 'text/plain'),
        ]))->assertSessionHasErrors(['training_certificate']);

        $this->assertDatabaseCount('training_infos', 0);
    }

    public function test_an_oversized_certificate_is_rejected(): void
    {
        $this->actingAs($this->adminUser());
        Storage::fake('public');

        // 11 MB, one over the 10 MB ceiling the picker also enforces.
        $this->post(route('module.training.store'), array_merge($this->modulePayload(), [
            'training_certificate' => UploadedFile::fake()->create('huge.pdf', 11 * 1024, 'application/pdf'),
        ]))->assertSessionHasErrors(['training_certificate']);

        $this->assertDatabaseCount('training_infos', 0);
    }

    public function test_a_certificate_can_be_a_link(): void
    {
        $this->actingAs($this->adminUser());
        Storage::fake('public');

        $this->post(route('module.training.store'), array_merge($this->modulePayload(), [
            'training_certificate' => 'https://example.test/certificate',
        ]))->assertSessionHasNoErrors();

        $this->assertSame(
            'https://example.test/certificate',
            TrainingInfo::query()->firstOrFail()->training_certificate
        );
    }

    /**
     * Editing a record whose certificate is a stored file must not clear it:
     * the file input sends nothing, and the link input is disabled in file mode.
     */
    public function test_an_update_without_a_certificate_keeps_the_stored_one(): void
    {
        // The contract helper fakes the disk itself, so the file goes in after.
        $record = $this->createModuleRecord();
        Storage::disk('public')->put('uploads/training/old.pdf', 'certificate');
        $record->forceFill(['training_certificate' => 'uploads/training/old.pdf'])->save();

        $this->put(route('module.training.update'), array_merge($this->modulePayload(), [
            'training_id' => $record->getKey(),
        ]))->assertSessionHasNoErrors();

        $this->assertSame('uploads/training/old.pdf', $record->refresh()->training_certificate);
        Storage::disk('public')->assertExists('uploads/training/old.pdf');
    }

    /**
     * Precedence is file, link, removal, stored value: a link typed while a
     * removal is queued replaces the certificate instead of removing it.
     */
    public function test_a_typed_link_wins_over_a_removal_request(): void
    {
        $record = $this->createModuleRecord();
        Storage::disk('public')->put('uploads/training/old.pdf', 'certificate');
        $record->forceFill(['training_certificate' => 'uploads/training/old.pdf'])->save();

        $this->put(route('module.training.update'), array_merge($this->modulePayload(), [
            'training_id' => $record->getKey(),
            'remove_training_certificate' => '1',
            'training_certificate' => 'https://example.test/new-certificate',
        ]))->assertSessionHasNoErrors();

        $this->assertSame(
            'https://example.test/new-certificate',
            $record->refresh()->training_certificate
        );
        Storage::disk('public')->assertMissing('uploads/training/old.pdf');
    }

    public function test_the_stored_certificate_can_be_removed(): void
    {
        $record = $this->createModuleRecord();
        Storage::disk('public')->put('uploads/training/old.pdf', 'certificate');
        $record->forceFill(['training_certificate' => 'uploads/training/old.pdf'])->save();

        $this->put(route('module.training.update'), array_merge($this->modulePayload(), [
            'training_id' => $record->getKey(),
            'remove_training_certificate' => '1',
        ]))->assertSessionHasNoErrors();

        $this->assertNull($record->refresh()->training_certificate);
        Storage::disk('public')->assertMissing('uploads/training/old.pdf');
    }

    public function test_a_picked_certificate_wins_over_a_removal_request(): void
    {
        $record = $this->createModuleRecord();
        Storage::disk('public')->put('uploads/training/old.pdf', 'certificate');
        $record->forceFill(['training_certificate' => 'uploads/training/old.pdf'])->save();

        $this->put(route('module.training.update'), array_merge($this->modulePayload(), [
            'training_id' => $record->getKey(),
            'remove_training_certificate' => '1',
            'training_certificate' => UploadedFile::fake()->create('new.pdf', 120, 'application/pdf'),
        ]))->assertSessionHasNoErrors();

        $record->refresh();

        $this->assertNotSame('uploads/training/old.pdf', $record->training_certificate);
        $this->assertStringEndsWith('.pdf', (string) $record->training_certificate);
        Storage::disk('public')->assertMissing('uploads/training/old.pdf');
        Storage::disk('public')->assertExists($record->training_certificate);
    }

    public function test_the_edit_payload_exposes_the_certificate_url_and_local_dates(): void
    {
        $record = $this->createModuleRecord([
            'start_date' => '2024-06-30',
            'end_date' => '2024-07-01',
        ]);
        Storage::disk('public')->put('uploads/training/cert.pdf', 'certificate');
        $record->forceFill(['training_certificate' => 'uploads/training/cert.pdf'])->save();

        $this->get(route('module.training.edit', $record->getKey()))
            ->assertOk()
            ->assertJsonPath('start_date_input', '2024-06-30')
            ->assertJsonPath('end_date_input', '2024-07-01')
            ->assertJsonPath('certificate_is_url', false)
            ->assertJsonPath('certificate_url', Storage::url('uploads/training/cert.pdf'));
    }

    /**
     * The date inputs read the service's `Y-m-d` strings, never the serialised
     * date attribute: in a timezone ahead of UTC that attribute is the previous
     * day. CI runs in UTC, so the negative assertion is the proof here.
     */
    public function test_the_edit_payload_does_not_prefill_the_utc_date(): void
    {
        config(['app.timezone' => 'Europe/Paris']);
        date_default_timezone_set('Europe/Paris');

        Storage::fake('public');

        $record = TrainingInfo::create([
            'training_title' => 'Timezone check',
            'training_category' => $this->selectType(SelectType::TRAINING_CATEGORY),
            'training_institute' => 'Test Institute',
            'start_date' => '2024-06-30',
        ]);

        $payload = app(TrainingService::class)->findForEdit($record->getKey());

        $this->assertSame('2024-06-30', $payload['start_date_input']);
        $this->assertNotSame('2024-06-30', substr((string) $payload['start_date'], 0, 10));
    }

    public function test_a_json_store_flashes_and_returns_the_message(): void
    {
        $this->actingAs($this->adminUser());
        Storage::fake('public');

        $this->postJson(route('module.training.store'), $this->modulePayload())
            ->assertOk()
            ->assertJson(['message' => 'Training info created']);

        $this->assertSame('Training info created', session('success'));
        $this->assertDatabaseCount('training_infos', 1);
    }

    public function test_a_json_validation_failure_returns_422_with_the_field(): void
    {
        $this->actingAs($this->adminUser());

        $payload = $this->modulePayload();
        unset($payload['training_title']);

        $this->postJson(route('module.training.store'), $payload)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['training_title']);
    }
}
