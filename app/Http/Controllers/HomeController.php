<?php

namespace App\Http\Controllers;

use App\Models\SkillInfo;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use UserLogTrait;

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
                'skill_list' => SkillInfo::orderBy('sequence', 'asc')->get()
            ]
        );
    }

    public function skill_store(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'title'             => 'required|string|max:255',
                'logo'              => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'score'             => 'nullable|numeric',
                'details'           => 'nullable|string',
                'status'            => 'nullable|integer',
            ]);

            // Store file in storage
            $path = null;
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads/skill', $filename); // stored in storage/app/public/uploads
                $path = 'uploads/skill/' . $filename;
            }

            // Save skill info in DB
            $skill = new SkillInfo();
            $skill->title = $request->title;
            $skill->logo = $path;
            $skill->score = $request->score ?? 100;
            $skill->details = $request->details;
            $skill->status = $request->status ?? 1;
            $skill->updated_by = Auth::id();
            $skill->sequence = SkillInfo::max('sequence') + 1;
            $skill->save();

            $this->log_user_activity('Skill', 'Created a new Skill info');
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
                SkillInfo::where('id', $item['id'])->update(['sequence' => $item['sequence']]);
            }
            return response()->json(['status' => 'success']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['status' => 'error']);
        }
    }

    public function service_view()
    {
        return view(
            'admin.pages.element.service',
            [
                'skill_list' => SkillInfo::get()
            ]
        );
    }
}
