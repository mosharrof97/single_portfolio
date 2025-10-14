<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;

class EmploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experience = Experience::orderBy('id','asc')->get();
        return view('backend.page.employment_history.index', compact('experience'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string',],
            'company' => ['nullable', 'string'],
            'business' => ['nullable', 'string'],
            'position' => ['nullable', 'string'],
            'department' => ['nullable', 'string'],
            'from_date' => ['required','date'],
            'to_date' => ['nullable','date'],
            'is_continue' => ['nullable'],
            'exp_area' => ['required','string'],
            'exp_area_year' => ['required','numeric'],
            'location' => ['nullable','string'],
            'responsibilities' => ['nullable','string'],
        ]);

        $is_continue = $request->has('is_continue') ? (bool) $request->input('is_continue') : 0;
        $data = [
            'title' => $request->title,
            'company' => $request->company,
            'business' => $request->business,
            'position' => $request->position,
            'department' => $request->department,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'is_continue' => $is_continue,
            'exp_area' => $request->exp_area,
            'exp_area_year' => $request->exp_area_year,
            'location' => $request->location,
            'responsibilities' => $request->responsibilities,
            'slug' => generateUniqueSlug(Experience::class, $request->title),
        ];

        Experience::create($data);

        return redirect()->route('employment')->with('success', 'Create successful!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => ['required', 'string',],
            'company' => ['nullable', 'string'],
            'business' => ['nullable', 'string'],
            'position' => ['nullable', 'string'],
            'department' => ['nullable', 'string'],
            'from_date' => ['required','date'],
            'to_date' => ['nullable','date'],
            'is_continue' => ['nullable'],
            'exp_area' => ['required','string'],
            'exp_area_year' => ['required','numeric'],
            'location' => ['nullable','string'],
            'responsibilities' => ['nullable','string'],
        ]);
        
        $is_continue = $request->has('is_continue') ? (bool) $request->input('is_continue') : 0;
        $data = [
            'title' => $request->title,
            'company' => $request->company,
            'business' => $request->business,
            'position' => $request->position,
            'department' => $request->department,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'is_continue' => $is_continue,
            'exp_area' => $request->exp_area,
            'exp_area_year' => $request->exp_area_year,
            'location' => $request->location,
            'responsibilities' => $request->responsibilities,
        ];
        $experience = Experience::where('slug', $slug)->first();
        $experience->update($data);

        return redirect()->route('employment')->with('success', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $experience = Experience::where('slug', $slug)->first();
        
        if(!$experience){
            return redirect()->route('employment')->with('error','Delete Failed!');  
        }

        $experience->delete();
        return redirect()->route('employment')->with('success','Delete successful!');
    }
}
