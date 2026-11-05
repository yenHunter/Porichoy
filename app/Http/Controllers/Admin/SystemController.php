<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\System\SystemLogService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SystemController extends Controller
{
    public function __construct(
        private readonly SystemLogService $system_log_service
    ) {}

    /**
     * Display the user activity log listing.
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
     * @param  Request  $request  Optional ?file= (validated against a allowlist)
     */
    public function applicationLog(Request $request): View
    {
        return view(
            'admin.pages.management.system-log',
            $this->system_log_service->applicationLogs($request->query('file'))
        );
    }
}
