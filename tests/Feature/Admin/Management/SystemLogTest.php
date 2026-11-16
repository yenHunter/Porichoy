<?php

namespace Tests\Feature\Admin\Management;

use App\Models\User;
use App\Models\UserLog;
use App\Services\System\SystemLogService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Tests\TestCase;

class SystemLogTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Temporary log directory used instead of storage/logs.
     */
    private ?string $logDirectory = null;

    protected function tearDown(): void
    {
        if ($this->logDirectory !== null) {
            File::deleteDirectory($this->logDirectory);
        }

        parent::tearDown();
    }

    /*
    |--------------------------------------------------------------------------
    | User log
    |--------------------------------------------------------------------------
    */

    public function test_user_log_lists_activity_with_its_author(): void
    {
        $admin = $this->adminUser();

        $this->activity($admin, 'Updated Education info');

        $this->actingAs($admin)
            ->get(route('management.system.user-log'))
            ->assertOk()
            ->assertViewHas('log_list', function ($logs) use ($admin) {
                return $logs->count() === 1
                    && $logs->first()->user?->is($admin);
            });
    }

    /**
     * Activity rows are append-only, so the listing follows `created_at`. A row
     * whose `updated_at` moved later must not jump above a newer entry.
     */
    public function test_user_log_shows_the_newest_activity_first(): void
    {
        $admin = $this->adminUser();

        $touched = $this->activity($admin, 'Touched later');
        $newest = $this->activity($admin, 'Created last');

        DB::table('user_logs')->where('id', $touched->id)->update([
            'created_at' => now()->subHour(),
            'updated_at' => now()->addHour(),
        ]);
        DB::table('user_logs')->where('id', $newest->id)->update([
            'created_at' => now()->subMinutes(5),
            'updated_at' => now()->subMinutes(5),
        ]);

        $this->actingAs($admin)
            ->get(route('management.system.user-log'))
            ->assertOk()
            ->assertViewHas('log_list', fn ($logs) => $logs->first()?->action === 'Created last');
    }

    /**
     * Deleting an account releases the reference instead of removing the row,
     * so the listing has to survive an author that no longer exists.
     */
    public function test_user_log_marks_a_released_author_as_deleted(): void
    {
        $admin = $this->adminUser();

        $this->activity(null, 'Updated Education info');

        $this->actingAs($admin)
            ->get(route('management.system.user-log'))
            ->assertOk()
            ->assertSee('Deleted user')
            ->assertSee('Updated Education info');
    }

    public function test_the_user_log_listing_is_capped(): void
    {
        $admin = $this->adminUser();

        $rows = [];
        for ($i = 0; $i < SystemLogService::USER_LOG_LIMIT + 5; $i++) {
            $rows[] = [
                'module' => 'Education',
                'action' => 'Action '.$i,
                'user_id' => $admin->getKey(),
                'user_ip' => '127.0.0.1',
                'user_agent' => 'phpunit',
                'created_at' => now()->subMinutes($i),
                'updated_at' => now()->subMinutes($i),
            ];
        }

        DB::table('user_logs')->insert($rows);

        $this->actingAs($admin)
            ->get(route('management.system.user-log'))
            ->assertOk()
            ->assertViewHas('log_list', fn ($logs) => $logs->count() === SystemLogService::USER_LOG_LIMIT);
    }

    /*
    |--------------------------------------------------------------------------
    | Application log
    |--------------------------------------------------------------------------
    */

    public function test_application_log_lists_the_log_files(): void
    {
        $this->writeLogFile('laravel-2026-11-15.log', $this->entry('2026-11-15 10:00:00', 'INFO', 'old'));
        $this->writeLogFile('laravel-2026-11-16.log', $this->entry('2026-11-16 10:00:00', 'INFO', 'new'));

        $this->actingAs($this->adminUser())
            ->get(route('management.system.application-log'))
            ->assertOk()
            ->assertViewHas('files', fn ($files) => array_column($files, 'name') === [
                'laravel-2026-11-16.log',
                'laravel-2026-11-15.log',
            ]);
    }

    public function test_application_log_ignores_a_path_traversal_file_name(): void
    {
        $this->writeLogFile('laravel.log', $this->entry('2026-11-16 10:00:00', 'INFO', 'only file'));

        $this->actingAs($this->adminUser())
            ->get(route('management.system.application-log', ['file' => '../../.env']))
            ->assertOk()
            ->assertViewHas('currentFile', fn ($file) => $file !== '../../.env' && $file === 'laravel.log');
    }

    /**
     * Files are ordered by modification time, not by name: a dated file and an
     * undated `laravel.log` must not be ordered alphabetically.
     */
    public function test_application_log_orders_files_by_modification_time(): void
    {
        $directory = $this->logDirectory();

        File::put($directory.'/laravel-old.log', '');
        File::put($directory.'/laravel.log', '');

        touch($directory.'/laravel-old.log', time() - 3600);
        touch($directory.'/laravel.log', time());

        $service = new SystemLogService($directory);

        $this->assertSame(
            ['laravel.log', 'laravel-old.log'],
            array_column($service->logFiles(), 'name')
        );
    }

    /**
     * The header line alone does not say which file threw; the trace must be
     * kept with the entry rather than discarded by the parser.
     */
    public function test_application_log_keeps_the_stack_trace_of_an_entry(): void
    {
        $this->writeLogFile('laravel.log', implode("\n", [
            $this->entry('2026-11-16 10:00:00', 'ERROR', 'Undefined array key "slug"', false),
            '[stacktrace]',
            '#0 /app/Http/Controllers/BlogController.php(42): handle()',
            '#1 {main}',
            '',
            $this->entry('2026-11-16 10:01:00', 'INFO', 'Recovered'),
        ]));

        $logs = (new SystemLogService($this->logDirectory))->applicationLogs(null)['logs'];

        $this->assertSame('Recovered', $logs[0]['message']);
        $this->assertSame('Undefined array key "slug"', $logs[1]['message']);
        $this->assertStringContainsString('#0 /app/Http/Controllers/BlogController.php(42)', $logs[1]['detail']);

        $this->actingAs($this->adminUser())
            ->get(route('management.system.application-log'))
            ->assertOk()
            ->assertSee('Stack trace')
            ->assertSee('BlogController.php(42)');
    }

    public function test_application_log_filters_entries_by_level(): void
    {
        $this->writeLogFile('laravel.log', implode("\n", [
            $this->entry('2026-11-16 10:00:00', 'ERROR', 'Failure'),
            $this->entry('2026-11-16 10:01:00', 'INFO', 'Chatter'),
        ]));

        $this->actingAs($this->adminUser())
            ->get(route('management.system.application-log', ['level' => 'error']))
            ->assertOk()
            ->assertViewHas('logs', fn ($logs) => count($logs) === 1 && $logs[0]['message'] === 'Failure')
            ->assertDontSee('Chatter');

        $this->actingAs($this->adminUser())
            ->get(route('management.system.application-log', ['level' => 'nonsense']))
            ->assertOk()
            ->assertViewHas('level', fn ($level) => $level === null);
    }

    /**
     * A single-channel log grows without bound; only the tail is read, so an
     * ancient entry cannot dominate a request.
     */
    public function test_application_log_reads_only_the_tail_of_a_large_file(): void
    {
        $padding = str_repeat($this->entry('2026-11-02 00:00:00', 'INFO', str_repeat('filler ', 8)), 15000);

        $this->writeLogFile('laravel.log', implode("\n", [
            $this->entry('2026-11-01 00:00:00', 'ERROR', 'Ancient entry'),
            $padding,
            $this->entry('2026-11-16 00:00:00', 'ERROR', 'Fresh entry'),
        ]));

        $this->assertGreaterThan(
            SystemLogService::TAIL_BYTES,
            (int) filesize($this->logDirectory.'/laravel.log')
        );

        $logs = (new SystemLogService($this->logDirectory))->applicationLogs(null)['logs'];

        $messages = array_column($logs, 'message');

        $this->assertNotContains('Ancient entry', $messages);
        $this->assertContains('Fresh entry', $messages);
        $this->assertLessThanOrEqual(SystemLogService::ENTRY_LIMIT, count($logs));
    }

    public function test_application_log_page_handles_an_empty_log_directory(): void
    {
        $this->logDirectory();

        $this->actingAs($this->adminUser())
            ->get(route('management.system.application-log'))
            ->assertOk()
            ->assertSee('No log files have been written yet.')
            ->assertViewHas('currentFile', fn ($file) => $file === null);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    private function activity(?User $user, string $action): UserLog
    {
        $log = new UserLog;
        $log->module = 'Education';
        $log->action = $action;
        $log->user_id = $user?->getKey();
        $log->user_ip = '127.0.0.1';
        $log->user_agent = 'phpunit';
        $log->save();

        return $log;
    }

    /**
     * A temporary log directory, bound into the container for the controller.
     */
    private function logDirectory(): string
    {
        if ($this->logDirectory === null) {
            $this->logDirectory = storage_path('framework/testing/logs-'.Str::random(8));

            File::ensureDirectoryExists($this->logDirectory);

            $this->app->instance(SystemLogService::class, new SystemLogService($this->logDirectory));
        }

        return $this->logDirectory;
    }

    private function writeLogFile(string $name, string $contents): void
    {
        File::put($this->logDirectory().'/'.$name, $contents);
    }

    /**
     * A log entry in Laravel's format.
     */
    private function entry(string $date, string $level, string $message, bool $newline = true): string
    {
        return "[{$date}] local.{$level}: {$message}".($newline ? "\n" : '');
    }
}
