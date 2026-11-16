<?php

namespace App\Services\System;

use App\Models\UserLog;
use Illuminate\Database\Eloquent\Collection;

class SystemLogService
{
    /**
     * Activity rows the user log page may load at once.
     */
    public const USER_LOG_LIMIT = 500;

    /**
     * Bytes read from the end of a log file before parsing.
     *
     * The application log is not rotated in every environment, so a file can
     * grow to many megabytes; only its tail is read.
     */
    public const TAIL_BYTES = 1024 * 1024;

    /**
     * Entries handed to the view at once.
     */
    public const ENTRY_LIMIT = 500;

    /**
     * Levels the viewer can filter by, in Monolog's order of severity.
     */
    public const LEVELS = ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug'];

    /**
     * Header line of a Laravel log entry: [date] env.LEVEL: message.
     */
    private const ENTRY_PATTERN = '/^\[(?<date>[^\]]+)\]\s+(?<env>[^.]+)\.(?<level>[A-Z]+):\s?(?<message>.*)$/';

    /**
     * @param  string|null  $log_directory  Overridable so tests read a temporary directory
     */
    public function __construct(private readonly ?string $log_directory = null) {}

    /**
     * List the most recent user-activity logs with their authors.
     *
     * @return Collection<int, UserLog>
     */
    public function userLogs(): Collection
    {
        return UserLog::with('user')
            ->sorted()
            ->limit(self::USER_LOG_LIMIT)
            ->get();
    }

    /**
     * List available laravel application log files, newest first.
     *
     * @return array<int, array{name: string, size: int, modified: int}>
     */
    public function logFiles(): array
    {
        $paths = glob($this->directory().'/*.log') ?: [];

        $files = array_map(fn (string $path) => [
            'name' => basename($path),
            'size' => (int) @filesize($path),
            'modified' => (int) @filemtime($path),
        ], $paths);

        usort(
            $files,
            fn (array $a, array $b) => [$b['modified'], $b['name']] <=> [$a['modified'], $a['name']]
        );

        return $files;
    }

    /**
     * Parse a named log file into entries.
     *
     * Only filenames that actually exist in the log directory may be read —
     * any other value (including path-traversal attempts) falls back to the
     * newest log file.
     *
     * @param  string|null  $requested  Basename from ?file=
     * @param  string|null  $level  Level from ?level=, ignored when unknown
     * @return array{
     *   files:       array<int, array{name: string, size: int, modified: int}>,
     *   currentFile: string|null,
     *   logs:        array<int, array<string, string>>,
     *   total:       int,
     *   level:       string|null,
     *   levels:      array<int, string>,
     *   entryLimit:  int,
     *   truncated:   bool
     * }
     */
    public function applicationLogs(?string $requested, ?string $level = null): array
    {
        $files = $this->logFiles();
        $names = array_column($files, 'name');

        $currentFile = ($requested && in_array($requested, $names, true))
            ? $requested
            : ($names[0] ?? null);

        $level = in_array(strtolower((string) $level), self::LEVELS, true) ? strtolower((string) $level) : null;

        $entries = $currentFile ? $this->entries($currentFile) : [];

        if ($level !== null) {
            $entries = array_values(array_filter(
                $entries,
                fn (array $entry) => strtolower($entry['level']) === $level
            ));
        }

        $total = count($entries);

        return [
            'files' => $files,
            'currentFile' => $currentFile,
            'logs' => array_slice($entries, 0, self::ENTRY_LIMIT),
            'total' => $total,
            'level' => $level,
            'levels' => self::LEVELS,
            'entryLimit' => self::ENTRY_LIMIT,
            'truncated' => $total > self::ENTRY_LIMIT,
        ];
    }

    /**
     * Read the newest entries of a log file, newest first.
     *
     * Every entry is the header line plus the continuation lines that follow
     * it (file, trace), so a stack trace is never thrown away.
     *
     * @return array<int, array{date: string, env: string, level: string, message: string, detail: string}>
     */
    private function entries(string $file): array
    {
        $path = $this->directory().DIRECTORY_SEPARATOR.basename($file);

        if (! is_readable($path)) {
            return [];
        }

        $size = (int) filesize($path);
        $offset = max(0, $size - self::TAIL_BYTES);
        $content = (string) file_get_contents($path, false, null, $offset);

        // A tail read starts in the middle of an entry; drop the partial line.
        if ($offset > 0 && ($break = strpos($content, "\n")) !== false) {
            $content = substr($content, $break + 1);
        }

        $entries = [];
        $current = null;

        foreach (preg_split('/\R/', $content) ?: [] as $line) {
            if (preg_match(self::ENTRY_PATTERN, $line, $matches)) {
                if ($current !== null) {
                    $entries[] = $current;
                }

                $current = [
                    'date' => $matches['date'],
                    'env' => $matches['env'],
                    'level' => strtoupper($matches['level']),
                    'message' => $matches['message'],
                    'detail' => '',
                ];

                continue;
            }

            if ($current !== null && trim($line) !== '') {
                $current['detail'] .= ($current['detail'] === '' ? '' : "\n").$line;
            }
        }

        if ($current !== null) {
            $entries[] = $current;
        }

        return array_reverse($entries);
    }

    /**
     * The directory the viewer reads from.
     */
    private function directory(): string
    {
        return $this->log_directory ?? storage_path('logs');
    }
}
