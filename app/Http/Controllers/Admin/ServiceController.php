<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\ServiceInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ServiceController extends Controller
{
    use UserLogTrait;

    public function view(): View
    {
        try {
            return view(
                'admin.pages.element.service',
                [
                    'service_list' => ServiceInfo::sorted()->get()
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return view('admin.error.404');
        }
    }
}
