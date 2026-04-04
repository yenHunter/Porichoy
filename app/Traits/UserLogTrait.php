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
    public function logUserActivity($model, $action)
    {
        try {
            UserLog::create([
                'module'        => $model,
                'action'        => $action,
                'user_id'       => Auth::id(),
                'user_ip'       => Request::ip(),
                'user_agent'    => Request::userAgent()
            ]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
}
