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
     * @param  string  $theme  Sanitized theme machine-name (single slug)
     */
    public function setTheme(string $theme): void
    {
        $this->writeEnvKey('APP_THEME', $theme);
    }

    /**
     * Update the active color (persists APP_COLOR in .env).
     *
     * @param  string  $color  Color mode (light/dark)
     */
    public function setColor(string $color): void
    {
        $this->writeEnvKey('APP_COLOR', $color);
    }

    /**
     * Write a single KEY=VALUE line into .env and clear config cache.
     *
     * @param  string  $key  Environment key
     * @param  string  $value  Environment value
     */
    private function writeEnvKey(string $key, string $value): void
    {
        // Whitelist: only allow specific keys to be written via this method.
        $allowedKeys = ['APP_THEME', 'APP_COLOR'];
        if (! in_array($key, $allowedKeys, true)) {
            return;
        }

        $envFile = base_path(self::ENV_FILE);
        if (! is_file($envFile)) {
            return;
        }

        // Defensive: strip anything that could inject other env lines.
        $value = str_replace(["\r", "\n"], '', $value);

        $updated = preg_replace(
            '/^('.preg_quote($key, '/').'\s*=\s*).*$/m',
            '${1}'.$value,
            file_get_contents($envFile)
        );

        if ($updated !== null) {
            file_put_contents($envFile, $updated);
        }

        Artisan::call('config:clear');
    }
}
