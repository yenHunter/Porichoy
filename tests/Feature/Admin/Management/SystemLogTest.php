<?php

namespace Tests\Feature\Admin\Management;

use App\Models\UserLog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SystemLogTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_log_lists_activity_with_its_author(): void
    {
        $admin = $this->adminUser();

        $log             = new UserLog();
        $log->module     = 'Education';
        $log->action     = 'Updated Education info';
        $log->user_id    = $admin->getKey();
        $log->user_ip    = '127.0.0.1';
        $log->user_agent = 'phpunit';
        $log->save();

        $this->actingAs($admin)
            ->get(route('management.system.user-log'))
            ->assertOk()
            ->assertViewHas('log_list', function ($logs) use ($admin) {
                return $logs->count() === 1
                    && $logs->first()->user?->is($admin);
            });
    }

    public function test_application_log_lists_the_log_files(): void
    {
        $this->actingAs($this->adminUser())
            ->get(route('management.system.application-log'))
            ->assertOk()
            ->assertViewHas('files', fn ($files) => is_array($files));
    }

    public function test_application_log_ignores_a_path_traversal_file_name(): void
    {
        $this->actingAs($this->adminUser())
            ->get(route('management.system.application-log', ['file' => '../../.env']))
            ->assertOk()
            ->assertViewHas('currentFile', fn ($file) => $file !== '../../.env');
    }
}
