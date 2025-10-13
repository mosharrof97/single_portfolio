<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Skill;
use App\Models\User\SkillDescription;
use App\Models\User\Activities;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::orderBy('id','asc')->get();
        $skillDesc = SkillDescription::first();
        $activities = Activities::first();
        return view('backend.page.other_information.skill.index', compact(['skills','skillDesc','activities']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'skill' => ['required', 'string'],
            'progress' => ['required', 'numeric'],
            'self' => ['nullable', 'string'],
            'service' => ['nullable', 'string'],
            'education' => ['nullable','string'],
            'training' => ['nullable', 'string'],
        ]);

        $data = [
            'skill' => $request->skill,
            'progress' =>$request->progress,
            'self' => $request->self,
            'service' => $request->service,
            'education' => $request->education,
            'training' => $request->training,
            'slug' => generateUniqueSlug(Skill::class, $request->skill),
        ];

        Skill::create($data);

        return redirect()->route('skill')->with('success', 'Create successful!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        
        $request->validate([
            'skill' => ['required', 'string'],
            'progress' => ['required','numeric'],
            'self' => ['nullable', 'string'],
            'service' => ['nullable', 'string'],
            'education' => ['nullable','string'],
            'training' => ['nullable', 'string'],
        ]);

        // dd($request->all());
        $data = [
            'skill' => $request->skill,
            'progress' =>$request->progress,
            'self' => $request->self,
            'service' => $request->service,
            'education' => $request->education,
            'training' => $request->training,
        ];
        // dd($data);
        $skill = Skill::where('slug', $slug)->first();
        $skill->update($data);

        return redirect()->route('skill')->with('success', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $skill = Skill::where('slug', $slug)->first();
        
        if(!$skill){
            return redirect()->route('skill')->with('error','Delete Failed!');  
        }

        $skill->delete();
        return redirect()->route('skill')->with('success','Delete successful!');
    }


    public function description(Request $request){
        $request->validate([
            'description' => ['required', 'string'],
            'descId' => ['nullable', 'exists:skill_descriptions,id'] 
        ]);
    
        $data = [
            'description' => $request->description,
            'slug' => generateUniqueSlug(SkillDescription::class, 'SkillDescription'),
        ];
        
        
        SkillDescription::updateOrCreate(
            ['id' => $request->descId], 
            $data
        );
        
        return redirect()->route('skill')->with('success','Create successful!');
    }


    public function activities(Request $request){
        $request->validate([
            'activities' => ['required', 'string'],
            'activitiesId' => ['nullable', 'exists:activities,id'] 
        ]);
    
        $data = [
            'activities' => $request->activities,
            'slug' => generateUniqueSlug(Activities::class, 'activities'),
        ];
        
        
        Activities::updateOrCreate(
                ['id' => $request->activitiesId], 
                $data
            );
        
        return redirect()->route('skill')->with('success','Create successful!');
    }
}
