<?php

namespace App\Services\Configuration;

use Illuminate\Support\Facades\Artisan;

class ConfigurationService
{
    /**
     * Environment keys managed by the configuration screen.
     */
    private const ENV_FILE = '.env';

    /**
     * Rewrite the APP_THEME= line in .env and clear the cached config.
     *
     * Only a allowlisted theme name (no line breaks, no "=") is ever written.
     *
     * @param  string $theme Sanitized theme machine-name (single slug)
     * @return void
     */
    public function setTheme(string $theme): void
    {
        $envFile = base_path(self::ENV_FILE);
        if (!is_file($envFile)) {
            return;
        }

        // Defensive: strip anything that could inject other env lines.
        $theme = str_replace(["\r", "\n"], '', $theme);

        $updated = preg_replace(
            '/^(APP_THEME\s*=\s*).*$/m',
            '${1}' . $theme,
            file_get_contents($envFile)
        );

        if ($updated !== null) {
            file_put_contents($envFile, $updated);
        }

        Artisan::call('config:clear');
    }
}
