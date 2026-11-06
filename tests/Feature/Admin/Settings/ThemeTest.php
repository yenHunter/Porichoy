<?php

namespace Tests\Feature\Admin\Settings;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThemeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * The theme switch rewrites APP_THEME in the real .env file, so the file is
     * restored byte-for-byte afterwards.
     */
    public function test_theme_switch_persists_app_theme(): void
    {
        $envPath = base_path('.env');
        $original = file_get_contents($envPath);

        try {
            $this->actingAs($this->adminUser())
                ->post(route('configuration.update', 'dorbesh'))
                ->assertRedirect();

            $this->assertStringContainsString('APP_THEME=dorbesh', file_get_contents($envPath));
        } finally {
            file_put_contents($envPath, $original);
        }

        $this->assertSame($original, file_get_contents($envPath), 'the .env file must be restored');
    }
}
