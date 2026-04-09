<?php

namespace App\Http\Controllers\Visitor;

use App\Models\SkillInfo;
use App\Models\ClientInfo;
use App\Models\ProfileInfo;
use App\Models\ProjectInfo;
use App\Models\ServiceInfo;
use Illuminate\Http\Request;
use App\Models\EducationInfo;
use App\Models\ExperienceInfo;
use App\Http\Controllers\Controller;

class VisitorController extends Controller
{
    public function index()
    {
        $client_list = ClientInfo::sorted()->active()->get();
        if ($client_list->count() > 0) {
            if ($client_list->count() <= 5) {
                $rows = [$client_list];
            } else {
                $firstRowCount = (int) ceil($client_list->count() / 2);
                $rows = [
                    $client_list->take($firstRowCount),
                    $client_list->skip($firstRowCount),
                ];
            }
        } else {
            $rows = $client_list;
        }
        return view(
            'pages.index',
            [
                'profile_info'          => ProfileInfo::pluck('column_value', 'column_name')->toArray(),
                'service_list'          => ServiceInfo::sorted()->active()->limit(4)->get(),
                'project_list'          => ProjectInfo::sorted()->active()->limit(6)->get(),
                'skill_list'            => SkillInfo::active()->sorted()->limit(8)->get(),
                'education_list'        => EducationInfo::sorted()->active()->get(),
                'experience_list'       => ExperienceInfo::sorted()->active()->get(),
                'client_list'           => $rows,
            ]
        );
    }

    public function about()
    {
        return view(
            'pages.about',
            [
                'profile_info'          => ProfileInfo::pluck('column_value', 'column_name')->toArray(),
                'education_list'        => EducationInfo::sorted()->active()->get(),
                'experience_list'       => ExperienceInfo::sorted()->active()->get(),
            ]
        );
    }

    public function services()
    {
        return view('pages.services');
    }

    public function service_details($service)
    {
        return view('pages.service-details', compact('service'));
    }

    public function projects()
    {
        return view('pages.projects');
    }

    public function project_details($project)
    {
        return view('pages.project-details', compact('project'));
    }

    public function blogs()
    {
        return view('pages.blogs');
    }

    public function blog_details($blog)
    {
        return view('pages.blog-details', compact('blog'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
