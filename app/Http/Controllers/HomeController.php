<?php

namespace App\Http\Controllers;

use App\Models\SkillInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view(
            'admin.pages.index'
        );
    }

    public function skill_view()
    {
        return view(
            'admin.pages.element.skill',
            [
                'skill_list' => SkillInfo::get()
            ]
        );
    }
}
