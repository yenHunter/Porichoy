<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserLog;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class SystemController extends Controller
{
    public function userLog(): View
    {
        return view(
            'admin.pages.management.user-log',
            [
                'log_list' => UserLog::with('user')->sorted()->get()
            ]
        );
    }

    public function applicationLog(Request $request): View
    {
        $logPath = storage_path('logs');
        $files = array_reverse(glob($logPath . '/*.log'));
        $files = array_map('basename', $files);

        // Only allow requested filenames that actually exist in the logs directory
        // (prevents path traversal like ?file=../../.env)
        $requested = $request->query('file');
        $currentFile = ($requested && in_array($requested, $files, true))
            ? $requested
            : ($files[0] ?? null);

        $logFilePath = $currentFile ? $logPath . DIRECTORY_SEPARATOR . basename($currentFile) : null;

        $logs = [];
        if ($logFilePath && is_file($logFilePath)) {
            try {
                $content = file_get_contents($logFilePath);
                $pattern = '/^\[(?<date>.*)\]\s(?<env>\w+)\.(?<level>\w+):(?<message>.*)/m';
                preg_match_all($pattern, $content, $matches, PREG_SET_ORDER, 0);
                $logs = array_reverse($matches);
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }
        }
        return view('admin.pages.management.system-log', compact('files', 'currentFile', 'logs'));
    }
}
