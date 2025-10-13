<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\PersonalDetailsRequest;
use App\Http\Requests\User\PersonalDetailsUpdateRequest;
use App\Models\User\PersonalDetails;

class PersonalDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personalDetails = PersonalDetails::where('is_active',true)->first();
        return view('backend.page.personal.personal-info.index', compact('personalDetails'));
    }

    public function store(PersonalDetailsRequest $request)
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'f_name' => $request->f_name,
            'm_name' => $request->m_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'married_status'=> $request->married_status,
            'nationality' => $request->nationality,
            'national_id' => $request->national_id,
            'passport_no' => $request->passport_no,
            'issue_date' => $request->issue_date,
            'mobile' => $request->mobile,
            'mobile_home' => $request->mobile_home,
            'mobile_office' => $request->mobile_office,
            'email' => $request->email,
            'extra_email' => $request->extra_email,
            'blood_group' => $request->blood_group,
            'height' => $request->height,
            'weight' => $request->weight,
            'slug' => generateUniqueSlug(PersonalDetails::class, $request->first_name.'-'.$request->last_name),            
        ];
        
        PersonalDetails::create($data);
        return redirect()->route('personal.details')->with('success','Create Succreeful!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonalDetailsUpdateRequest $request)
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'f_name' => $request->f_name,
            'm_name' => $request->m_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'married_status'=> $request->married_status,
            'nationality' => $request->nationality,
            'national_id' => $request->national_id,
            'passport_no' => $request->passport_no,
            'issue_date' => $request->issue_date,
            // 'mobile' => $request->mobile,
            'mobile_home' => $request->mobile_home,
            'mobile_office' => $request->mobile_office,
            // 'email' => $request->email,
            'extra_email' => $request->extra_email,
            'blood_group' => $request->blood_group,
            'height' => $request->height,
            'weight' => $request->weight,
        ];
        
        $personalDetails = PersonalDetails::where('is_active',true)->first();
        $personalDetails->update($data);
        return redirect()->route('personal.details')->with('success','Update Succreeful!');
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg|max:2048',
        ]);

        $personalDetails = PersonalDetails::where('is_active', true)->first();

        if (!$personalDetails) {
            return redirect()->back()->withErrors('Personal details not found.');
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = 'personal_' . time() . '-' . rand(100000, 1000000000) . '.' . $file->extension();
            $path = $file->move(public_path('assets/img/personal'), $imageName);

            if ($personalDetails->image && file_exists(public_path('assets/img/personal/'.$personalDetails->image))) {
                unlink(public_path('assets/img/personal/'.$personalDetails->image));
            }

            $personalDetails->update([
                'image' => $imageName,
            ]);
        }

        return redirect()->route('personal.details')->with('success', 'Update Successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $personalDetails = PersonalDetails::where('is_active', true)->first();

        if (!$personalDetails) {
            return redirect()->back()->withErrors('Personal details not found.');
        }

        if ($personalDetails->image && file_exists(public_path('assets/img/personal/'.$personalDetails->image))) {
            
            unlink(public_path('assets/img/personal/'.$personalDetails->image));
        }

        $personalDetails->update([
            'image' => null,
        ]);

        return redirect()->route('personal.details')->with('success', 'Image Delete Successful!');
    }
}
