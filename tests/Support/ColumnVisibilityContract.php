<?php

namespace Tests\Support;

use App\Models\ColumnSettings;

/**
 * The column-visibility panel shared by the `module.*` route groups.
 *
 * Used together with {@see AdminModuleContract}, which supplies modulePrefix().
 */
trait ColumnVisibilityContract
{
    /**
     * Value stored in `column_settings.module`, e.g. `education`.
     */
    abstract protected function columnSettingsModule(): string;

    /**
     * Column the panel toggles, e.g. `education_degree`.
     */
    abstract protected function columnSettingsColumn(): string;

    public function test_column_visibility_can_be_toggled(): void
    {
        $this->actingAs($this->adminUser());

        $setting               = new ColumnSettings();
        $setting->module       = $this->columnSettingsModule();
        $setting->column_title = 'Test column';
        $setting->column_name  = $this->columnSettingsColumn();
        $setting->visibility   = false;
        $setting->save();

        // A checked column becomes visible.
        $this->put(route($this->modulePrefix() . '.settings.update'), [
            $this->columnSettingsColumn() => 1,
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertTrue((bool) $setting->refresh()->visibility);

        // An omitted column is hidden again.
        $this->put(route($this->modulePrefix() . '.settings.update'), [])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertFalse((bool) $setting->refresh()->visibility);
    }
}
