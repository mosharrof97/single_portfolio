<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CareerApplication;

class CareerApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careerApplication = CareerApplication::where('is_active',true)->first();
        return view('backend.page.personal.career-application.index', compact('careerApplication'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "objective" => ['nullable','string'],
            "present_salary" => ['nullable','numeric'],
            "expected_salary" => ['nullable','numeric'],
            "opt_level" => ['nullable','string'],
            "opt_avail" => ['nullable','string'],
        ]);

        $data = [
            'objective' => $request->objective,
            'present_salary' => $request->present_salary,
            'expected_salary' => $request->expected_salary,
            'opt_level' => $request->opt_level,
            'opt_avail' => $request->opt_avail,
            'slug' => generateUniqueSlug(CareerApplication::class,'career-application'), 
        ];
        
        CareerApplication::create($data);

        return redirect()->route('career.application')->with('success', 'Create Successful!');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            "objective" => ['nullable','string'],
            "present_salary" => ['nullable','numeric'],
            "expected_salary" => ['nullable','numeric'],
            "opt_level" => ['nullable','string'],
            "opt_avail" => ['nullable','string'],
        ]);

        $data = [
            'objective' => $request->objective,
            'present_salary' => $request->present_salary,
            'expected_salary' => $request->expected_salary,
            'opt_level' => $request->opt_level,
            'opt_avail' => $request->opt_avail,
        ];
        
        $careerApplication = CareerApplication::where('is_active',true)->first();
        $careerApplication->update($data);

        return redirect()->route('career.application')->with('success', 'Update Successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
