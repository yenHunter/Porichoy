<?php

namespace App\Services\System;

use App\Models\UserLog;

class SystemLogService
{
    /**
     * List user-activity logs with their relations.
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, UserLog>
     */
    public function userLogs(): \Illuminate\Database\Eloquent\Collection
    {
        return UserLog::with('user')->sorted()->get();
    }

    /**
     * List available laravel application log files.
     *
     * @return array<int, string> Basenames, newest first
     */
    public function logFiles(): array
    {
        $log_files = glob(storage_path('logs') . '/*.log');
        $log_files = array_reverse(is_array($log_files) ? $log_files : []);
        $log_files = array_map('basename', $log_files);

        return $log_files;
    }

    /**
     * Parse a named log file into [date, env, level, message] entries.
     *
     * Only filenames that actually exist in storage/logs may be read —
     * any other value (including path-traversal attempts) falls back to
     * the newest log file.
     *
     * @param  string|null $requested Basename from ?file=
     * @return array{
     *   currentFile: string|null,
     *   logs:        array<int, array<string, string>>
     * }
     */
    public function applicationLogs(?string $requested): array
    {
        $files       = $this->logFiles();
        $currentFile = ($requested && in_array($requested, $files, true))
            ? $requested
            : ($files[0] ?? null);

        $logFilePath = $currentFile
            ? storage_path('logs') . DIRECTORY_SEPARATOR . basename($currentFile)
            : null;

        $logs = [];
        if ($logFilePath && is_file($logFilePath)) {
            $content = file_get_contents($logFilePath);

            preg_match_all(
                '/^\[(?<date>.*)\]\s(?<env>\w+)\.(?<level>\w+):(?<message>.*)/m',
                (string) $content,
                $matches,
                PREG_SET_ORDER,
                0
            );

            $logs = array_reverse($matches);
        }

        return [
            'currentFile' => $currentFile,
            'logs'        => $logs,
        ];
    }
}
