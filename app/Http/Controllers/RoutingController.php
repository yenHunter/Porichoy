<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RoutingController extends Controller
{
    /**
     * Segments may only contain lowercase letters, numbers and dashes.
     * This prevents "..", dots and slashes from ever reaching the view finder.
     */
    private const SEGMENT_PATTERN = '/^[a-z0-9][a-z0-9-]{0,63}$/';

    private function isValidSegment(?string $segment): bool
    {
        return is_string($segment) && preg_match(self::SEGMENT_PATTERN, $segment) === 1;
    }

    /**
     * Render an admin view composed from URL segments, guarded:
     *  - user must be authenticated,
     *  - every segment must be sanitized,
     *  - the composed view name must exist (404 otherwise).
     */
    private function renderAdminView(array $segments)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        foreach ($segments as $segment) {
            if (!$this->isValidSegment($segment)) {
                abort(404);
            }
        }

        $view = 'admin.' . implode('.', $segments);

        if (!view()->exists($view)) {
            abort(404);
        }

        return view($view);
    }

    public function index(Request $request)
    {
        return $this->renderAdminView(['dashboard', 'index']);
    }

    public function root(Request $request, $first)
    {
        return $this->renderAdminView([$first]);
    }

    public function secondLevel(Request $request, $first, $second)
    {
        return $this->renderAdminView([$first, $second]);
    }

    public function thirdLevel(Request $request, $first, $second, $third)
    {
        return $this->renderAdminView([$first, $second, $third]);
    }
}
