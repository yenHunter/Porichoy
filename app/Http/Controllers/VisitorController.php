<?php

namespace App\Http\Controllers;

use App\Models\ClientInfo;
use App\Models\EducationInfo;
use App\Models\ExperienceInfo;
use App\Models\ProfileInfo;
use App\Models\ProjectInfo;
use App\Models\ServiceInfo;
use App\Models\SkillInfo;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $client_list = ClientInfo::where('status', 1)->orderBy('sequence', 'asc')->get();
        if ($client_list->count() > 0) {
            if ($client_list->count() <= 5) {
                $rows = [$client_list]; // all in one row
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
                'profile_info' => ProfileInfo::pluck('column_value', 'column_name')->toArray(),
                'service_list' => ServiceInfo::where('status', 1)->orderBy('sequence', 'asc')->limit(4)->get(),
                'project_list' => ProjectInfo::where('status', 1)->orderBy('sequence', 'asc')->limit(6)->get(),
                'skill_list' => SkillInfo::where('status', 1)->orderBy('sequence', 'asc')->limit(8)->get(),
                'education_list' => EducationInfo::where('status', 1)->orderBy('sequence', 'asc')->get(),
                'experience_list' => ExperienceInfo::where('status', 1)->orderBy('sequence', 'asc')->get(),
                'client_list' => $rows,
            ]
        );
    }

    public function service_details(ServiceInfo $service)
    {
        return view('pages.service-details', compact('service'));
    }

    public function education()
    {
        return view(
            'pages.education',
            [
                'education_list' => EducationInfo::where('status', 1)->orderBy('sequence', 'asc')->get(),
            ]
        );
    }
}
