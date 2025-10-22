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
            $configPath = config_path('themes.php');
            // Get current config file content
            $configContent = File::get($configPath);
            // Replace the default_theme value with new theme
            $updatedContent = preg_replace(
                "/('default_theme'\s*=>\s*)'[^']*'/",
                "'default_theme' => '{$theme}'",
                $configContent
            );
            // Write back to file
            File::put($configPath, $updatedContent);
            // Optionally clear config cache if used
            Artisan::call('config:clear');

            return back()->with('success', "Theme updated to {$theme}");
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }
}
