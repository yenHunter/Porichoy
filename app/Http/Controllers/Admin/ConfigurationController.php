<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Configuration\ConfigurationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConfigurationController extends Controller
{
    public function __construct(
        private readonly ConfigurationService $configuration_service
    ) {}

    /**
     * Display the configuration index view.
     */
    public function view(): View
    {
        return view('admin.pages.configuration.index');
    }

    /**
     * Display the configuration theme view.
     */
    public function theme_view(): View
    {
        return view('admin.pages.configuration.themes.index');
    }

    /**
     * Update the active theme (persists APP_THEME and APP_COLOR in .env).
     *
     * @param  string  $theme  Theme machine-name
     */
    public function theme_update(string $theme, Request $request): RedirectResponse
    {
        $available = config('themes.available', []);

        if (! array_key_exists($theme, $available)) {
            return back()->with('error', "Invalid theme: {$theme}");
        }

        $this->configuration_service->setTheme($theme);

        $color = $request->query('color', config('themes.default_color'));
        $themeColors = $available[$theme]['colors'] ?? [];

        if ($color && in_array($color, $themeColors, true)) {
            $this->configuration_service->setColor($color);
        }

        return back()->with('success', "Theme updated to {$theme}");
    }

    /**
     * Update the active color (persists APP_COLOR in .env).
     *
     * @param  string  $color  Color mode (light/dark)
     */
    public function color_update(string $color): RedirectResponse
    {
        $availableColors = ['light', 'dark'];

        if (! in_array($color, $availableColors, true)) {
            return back()->with('error', "Invalid color: {$color}");
        }

        $this->configuration_service->setColor($color);

        return back()->with('success', "Color updated to {$color}");
    }
}
