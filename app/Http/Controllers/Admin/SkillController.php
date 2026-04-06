<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\SkillInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class SkillController extends Controller
{
    use UserLogTrait;

    public function skill_view()
    {
        try {
            return view(
                'admin.pages.element.skill',
                [
                    'skill_list' => SkillInfo::orderBy('sequence', 'asc')->get()
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return view('admin.error.404');
        }
    }

    public function skill_store(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'skill_title'             => 'required|string|max:255',
                'skill_logo'              => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'skill_score'             => 'nullable|numeric',
                'skill_details'           => 'nullable|string',
                'skill_status'            => 'nullable|integer',
            ]);

            // Store file in storage
            $path = null;
            if ($request->hasFile('skill_logo')) {
                $file = $request->file('skill_logo');
                $filename = Str::uuid() . '.webp';
                $path = 'uploads/skill/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($path, $img->toWebp(80));
            }

            // Save skill info in DB
            $skill = new SkillInfo();
            $skill->skill_title = $request->skill_title;
            $skill->skill_logo = $path;
            $skill->skill_score = $request->skill_score;
            $skill->skill_details = $request->skill_details;
            $skill->skill_status = $request->skill_status;
            $skill->save();
            $this->logUserActivity('Skill', 'New record created');
            return redirect()->route('element.skill.view')->with('success', 'Skill added successfully.');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function update_sequence(Request $request)
    {
        try {
            $order = $request->input('order');
            foreach ($order as $item) {
                SkillInfo::where('id', $item['id'])->update(['skill_sequence' => $item['sequence']]);
            }
            return response()->json(['status' => 'success']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['status' => 'error']);
        }
    }
}
