<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\System\SystemLogService;

class SystemController extends Controller
{
    public function __construct(
        private readonly SystemLogService $system_log_service
    ) {
    }

    /**
     * Display the user activity log listing.
     *
     * @return \Illuminate\View\View
     */
    public function userLog(): View
    {
        return view(
            'admin.pages.management.user-log',
            [
                'log_list' => $this->system_log_service->userLogs(),
            ]
        );
    }

    /**
     * Display the laravel application log viewer.
     *
     * @param  Request $request  Optional ?file= (validated against a allowlist)
     * @return \Illuminate\View\View
     */
    public function applicationLog(Request $request): View
    {
        return view(
            'admin.pages.management.system-log',
            $this->system_log_service->applicationLogs($request->query('file'))
        );
    }
}
