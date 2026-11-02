<?php

namespace Tests\Feature\Admin;

use App\Models\ProfileInfo;
use App\Models\SelectType;
use Database\Seeders\ProfileInfoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use RefreshDatabase;

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    public function test_profile_update_writes_the_column_values(): void
    {
        $this->seed(ProfileInfoSeeder::class);
        $this->actingAs($this->adminUser());

        $row = ProfileInfo::where('column_name', 'first_name')->firstOrFail();

        $this->post(route('management.settings.profile.update'), [
            'basic' => [$row->getKey() => 'Renamed First'],
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertSame('Renamed First', $row->refresh()->column_value);
    }

    /*
    |--------------------------------------------------------------------------
    | Lookup lists
    |--------------------------------------------------------------------------
    */

    public function test_research_source_crud(): void
    {
        $this->actingAs($this->adminUser());

        $this->get(route('settings.research_source.view'))->assertOk();

        $this->post(route('settings.research_source.store'), [])
            ->assertSessionHasErrors(['title']);

        $this->post(route('settings.research_source.store'), ['title' => 'Scopus', 'status' => 1])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $source = SelectType::where('use_for', 'research_source')->first();
        $this->assertNotNull($source, 'the research source was not created');
        $this->assertSame('Scopus', $source->value);

        $this->get(route('settings.research_source.edit', $source->getKey()))
            ->assertOk()
            ->assertJsonPath('value', 'Scopus');

        $this->put(route('settings.research_source.update'), [
            'research_source_id' => $source->getKey(),
            'title'              => 'Web of Science',
            'status'             => 1,
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertSame('Web of Science', $source->refresh()->value);

        $this->get(route('settings.research_source.delete', $source->getKey()))->assertRedirect();

        $this->assertDatabaseMissing('select_types', ['id' => $source->getKey()]);
    }

    public function test_location_type_crud(): void
    {
        $this->actingAs($this->adminUser());

        $this->get(route('settings.location_type.view'))->assertOk();

        $this->post(route('settings.location_type.store'), ['title' => 'Remote', 'details' => 'Work from home'])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $type = SelectType::where('use_for', 'location_type')->first();
        $this->assertNotNull($type, 'the location type was not created');
        $this->assertSame('Remote', $type->value);

        $this->put(route('settings.location_type.update'), [
            'location_type_id' => $type->getKey(),
            'title'            => 'Hybrid',
            'details'          => 'Two days in office',
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $type->refresh();
        $this->assertSame('Hybrid', $type->value);
        $this->assertSame('Two days in office', $type->details);

        $this->get(route('settings.location_type.delete', $type->getKey()))->assertRedirect();

        $this->assertDatabaseMissing('select_types', ['id' => $type->getKey()]);
    }

    public function test_employment_type_crud(): void
    {
        $this->actingAs($this->adminUser());

        $this->get(route('settings.employment_type.view'))->assertOk();

        $this->post(route('settings.employment_type.store'), ['title' => 'Contract'])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $type = SelectType::where('use_for', 'employment_type')->first();
        $this->assertNotNull($type, 'the employment type was not created');

        $this->put(route('settings.employment_type.update'), [
            'employment_type_id' => $type->getKey(),
            'title'              => 'Fixed term',
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertSame('Fixed term', $type->refresh()->value);

        $this->get(route('settings.employment_type.delete', $type->getKey()))->assertRedirect();

        $this->assertDatabaseMissing('select_types', ['id' => $type->getKey()]);
    }

    /*
    |--------------------------------------------------------------------------
    | Theme
    |--------------------------------------------------------------------------
    */

    /**
     * The theme switch rewrites APP_THEME in the real .env file, so the file is
     * restored byte-for-byte afterwards.
     */
    public function test_theme_switch_persists_app_theme(): void
    {
        $envPath  = base_path('.env');
        $original = file_get_contents($envPath);

        try {
            $this->actingAs($this->adminUser())
                ->get(route('configuration.update', 'dorbesh'))
                ->assertRedirect();

            $this->assertStringContainsString('APP_THEME=dorbesh', file_get_contents($envPath));
        } finally {
            file_put_contents($envPath, $original);
        }

        $this->assertSame($original, file_get_contents($envPath), 'the .env file must be restored');
    }
}
