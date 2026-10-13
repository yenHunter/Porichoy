<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Configuration\ConfigurationService;

class ConfigurationController extends Controller
{
    public function __construct(
        private readonly ConfigurationService $configuration_service
    ) {
    }

    /**
     * Display the configuration index view.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        return view('admin.pages.configuration.index');
    }

    /**
     * Display the configuration theme view.
     *
     * @return \Illuminate\View\View
     */
    public function theme_view(): View
    {
        return view('admin.pages.configuration.themes.index');
    }

    /**
     * Update the active theme (persists APP_THEME in .env).
     *
     * @param  string $theme Theme machine-name
     * @return RedirectResponse
     */
    public function theme_update(string $theme): RedirectResponse
    {
        $this->configuration_service->setTheme($theme);

        return back()->with('success', "Theme updated to {$theme}");
    }
}
