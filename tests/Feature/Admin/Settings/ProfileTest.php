<?php

namespace Tests\Feature\Admin\Settings;

use App\Models\ProfileInfo;
use Database\Seeders\ProfileInfoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

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
}
