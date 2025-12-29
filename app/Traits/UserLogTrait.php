<?php

namespace App\Traits;

use App\Models\UserLog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

trait UserLogTrait
{
    /**
     * Log user activity.
     *
     * @param string $model
     * @param string $action
     * @return void
     */
    public function logUserActivity(
        string $model,
        string $action
    ) {
        try {
            UserLog::create([
                'module_id' => $model,
                'action'    => $action,
                'user_id'   => Auth::id(),
                'user_ip'   => Request::ip(),
            ]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
}
