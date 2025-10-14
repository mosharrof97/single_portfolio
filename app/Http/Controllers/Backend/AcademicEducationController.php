<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AcademicEducationRequest;
use App\Models\AcademicEducation;

class AcademicEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = AcademicEducation::orderBy('id','asc')->get();
        // dd($education );
        return view('backend.page.education.academic-summary.index', compact('educations'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AcademicEducationRequest $request)
    {
        $isForeignInst = $request->has('is_foreign_inst') ? (bool) $request->input('is_foreign_inst') : 0;
        $data = [
            'edu_level' => $request->edu_level,
            'exam_title' => $request->exam_title,
            'major_group' => $request->major_group,
            'exam_board' => $request->exam_board,
            'institute_name' => $request->institute_name,
            'is_foreign_inst' => $isForeignInst,
            'foreign_country' => $request->foreign_country,
            'result' => $request->result,
            'marks' => $request->marks,
            'CGPA' => $request->CGPA,
            'scale' => $request->scale,
            'passing_year' => $request->passing_year,
            'edu_duration' => $request->edu_duration,
            'achievement' => $request->achievement,
            'slug' => generateUniqueSlug(AcademicEducation::class, 'academic-education'),
        ];

    //   dd($data);
      AcademicEducation::create($data);

      return redirect()->route('education')->with('success','Create successful!');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AcademicEducationRequest $request, $slug)
    {
        $isForeignInst = $request->has('is_foreign_inst') ? (bool) $request->input('is_foreign_inst') : 0;
        $data = [
            'edu_level' => $request->edu_level,
            'exam_title' => $request->exam_title,
            'major_group' => $request->major_group,
            'exam_board' => $request->exam_board,
            'institute_name' => $request->institute_name,
            'is_foreign_inst' => $isForeignInst,
            'foreign_country' => $request->foreign_country,
            'result' => $request->result,
            'marks' => $request->marks,
            'CGPA' => $request->CGPA,
            'scale' => $request->scale,
            'passing_year' => $request->passing_year,
            'edu_duration' => $request->edu_duration,
            'achievement' => $request->achievement,
        ];
        

        $education = AcademicEducation::where('slug', $slug)->first();
        // dd($education);
        if(!$education){
            return redirect()->route('education')->with('error','Update Failed!');  
        }

        $education->update($data);
        return redirect()->route('education')->with('success','Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        // dd($slug);
        $education = AcademicEducation::where('slug', $slug)->first();
        
        if(!$education){
            return redirect()->route('education')->with('error','Delete Failed!');  
        }

        $education->delete();
        return redirect()->route('education')->with('success','Delete successful!');
    }
}
