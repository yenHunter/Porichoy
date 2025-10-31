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
     * @param int $moduleId
     * @param string $action
     * @return void
     */
    public function log_user_activity($model, $action)
    {
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
