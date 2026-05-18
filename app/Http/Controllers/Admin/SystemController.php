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

    
}
