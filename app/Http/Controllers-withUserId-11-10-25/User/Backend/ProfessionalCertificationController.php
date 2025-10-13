<?php

namespace App\Http\Controllers\User\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\ProfessionalCertification;

class ProfessionalCertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certification = ProfessionalCertification::where('user_id',userAuthId())->orderBy('id','asc')->get();
        return view('backend.page.education.professional_certification_summary.index', compact('certification'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'certification' => ['required', 'string'],
            'institute' => ['required', 'string'],
            'desc' => ['nullable', 'string','max:500'],
            'location' => ['nullable', 'string'],
            'country' => ['required','string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required','date'],
        ]);

        $data = [
            'user_id' => userAuthId(),
            'certification' => $request->certification,
            'institute' => $request->institute,
            'desc' => $request->desc,
            'location' => $request->location,
            'country' => $request->country,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'slug' => generateUniqueSlug(ProfessionalCertification::class, $request->title),
        ];

        ProfessionalCertification::create($data);

        return redirect()->route('certification')->with('success', 'Create successful!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'certification' => ['required', 'string'],
            'institute' => ['required', 'string'],
            'location' => ['nullable', 'string'],
            'country' => ['required','string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required','date'],
        ]);

        $data = [
            'certification' => $request->certification,
            'institute' => $request->institute,
            'location' => $request->location,
            'country' => $request->country,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];
        $certification = ProfessionalCertification::where('user_id', userAuthId())->where('slug', $slug)->first();
        $certification->update($data);

        return redirect()->route('certification')->with('success', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $certification = ProfessionalCertification::where('user_id', userAuthId())->where('slug', $slug)->first();
        
        if(!$certification){
            return redirect()->route('certification')->with('error','Delete Failed!');  
        }

        $certification->delete();
        return redirect()->route('certification')->with('success','Delete successful!');
    }
}
