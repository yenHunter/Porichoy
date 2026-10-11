<?php

namespace App\Http\Controllers\Visitor;

use App\Models\BlogInfo;
use App\Models\SkillInfo;
use App\Models\ClientInfo;
use App\Rules\ReCaptcha;
use App\Models\ProfileInfo;
use App\Models\ProjectInfo;
use App\Models\ServiceInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\EducationInfo;
use App\Models\ExperienceInfo;
use App\Models\TestimonialInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

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
                'service_list'          => ServiceInfo::sorted()->active()->get(),
                'project_list'          => ProjectInfo::sorted()->active()->get(),
                'skill_list'            => SkillInfo::active()->sorted()->get(),
                'education_list'        => EducationInfo::sorted()->active()->get(),
                'experience_list'       => ExperienceInfo::sorted()->active()->get(),
                'client_list'           => ClientInfo::sorted()->active()->get(),
                'testimonial_list'      => TestimonialInfo::sorted()->active()->get(),
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
                'skill_list'            => SkillInfo::active()->sorted()->get(),
                'testimonial_list'      => TestimonialInfo::sorted()->active()->get(),
            ]
        );
    }

    public function services()
    {
        return view(
            'pages.services',
            [
                'service_list'          => ServiceInfo::sorted()->active()->get(),
            ]
        );
    }

    public function service_details($service)
    {
        return view(
            'pages.service-details',
            [
                'profile_info'          => ProfileInfo::pluck('column_value', 'column_name')->toArray(),
                'service_details'       => ServiceInfo::with('skills')->where('service_slug', $service)->first(),
                'testimonial_list'      => TestimonialInfo::sorted()->active()->get(),
            ]
        );
    }

    public function projects()
    {
        return view(
            'pages.projects',
            [
                'project_list'          => ProjectInfo::sorted()->active()->get(),
            ]
        );
    }

    public function project_details($project)
    {
        return view(
            'pages.project-details',
            [
                'project' => ProjectInfo::where('project_slug', $project)->first(),
            ]
        );
    }

    public function blogs()
    {
        return view(
            'pages.blogs',
            [
                'blog_list'          => BlogInfo::sorted()->active()->get(),
            ]
        );
    }

    public function blog_details($blog)
    {
        return view('pages.blog-details', compact('blog'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Handle the public contact form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contactStore(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'name'                  => ['required', 'string', 'min:2', 'max:60'],
                'email'                 => ['required', 'email', 'max:255'],
                'phone'                 => ['nullable', 'string', 'max:30'],
                'comments'              => ['required', 'string', 'min:10', 'max:1000'],
                'g-recaptcha-response'  => [new ReCaptcha()], // Validate reCAPTCHA
            ]);

            Log::channel('contact')->info('New contact message received', [
                'name'    => $request->input('name'),
                'email'   => $request->input('email'),
                'phone'   => $request->input('phone'),
                'message' => $request->input('comments'),
            ]);

            return back()->with('success', 'Thank you for reaching out. Your message has been received.');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }
}
