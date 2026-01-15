<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class ConfigurationController extends Controller
{
    public function view()
    {
        return view(
            'admin.pages.configuration.index',
            []
        );
    }

    public function theme_view()
    {
        return view(
            'admin.pages.configuration.themes.index',
            []
        );
    }

    public function theme_update($theme)
    {
        try {
            // Update the .env file
            $envFile = base_path('.env');
            if (file_exists($envFile)) {
                $envContent = file_get_contents($envFile);
                $updatedEnvContent = preg_replace(
                    "/(APP_THEME=)[^]*/",
                    "${1}{$theme}",
                    $envContent
                );
                file_put_contents($envFile, $updatedEnvContent);
            }

            // Optionally clear config cache if used
            Artisan::call('config:clear');

            return back()->with('success', "Theme updated to {$theme}");
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }
}
