<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RoutingController extends Controller
{

    public function index(Request $request)
    {
        return view('admin.dashboard.index');
    }

    public function root(Request $request, $first)
    {
        return view('admin.' . $first);
    }

    public function secondLevel(Request $request, $first, $second)
    {
        return view('admin.' . $first . '.' . $second);
    }

    public function thirdLevel(Request $request, $first, $second, $third)
    {
        return view('admin.' . $first . '.' . $second . '.' . $third);
    }
}
