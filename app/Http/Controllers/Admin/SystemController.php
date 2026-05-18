<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserLog;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $currentFile = $request->query('file', $files[0] ?? null);
        $logs = [];
        if ($currentFile && file_exists($logPath . '/' . $currentFile)) {
            $content = file_get_contents($logPath . '/' . $currentFile);
            $pattern = '/^\[(?<date>.*)\]\s(?<env>\w+)\.(?<level>\w+):(?<message>.*)/m';
            preg_match_all($pattern, $content, $matches, PREG_SET_ORDER, 0);
            $logs = array_reverse($matches);
        }
        return view('admin.pages.management.system-log', compact('files', 'currentFile', 'logs'));
    }
}
