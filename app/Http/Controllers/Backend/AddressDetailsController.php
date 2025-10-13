<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\AddressDetails;
use App\Models\Geocode;

class AddressDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = Geocode::select('district')->groupBy('district')->get();
        $thanas = Geocode::select('thana')->groupBy('thana')->get();
        $addressDetails = AddressDetails::where('is_active',true)->first();
        return view('backend.page.personal.address-details.index',compact(['addressDetails','districts','thanas']));
    }

    /**
     * Display the specified resource.
     */
    public function thana(Request $request)
    {
        $thanas = Geocode::where('district',$request->district)->select('thana')->groupBy('thana')->get();
        
        return response()->json([
            'status'=>true,
            'thana'=>$thanas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'present_district'=>['required','string'],
            'present_thana'=>['required','string'],
            'present_office'=>['nullable','string'],
            'present_village'=>['required','string'],

            'permanent_district'=>['required','string'],
            'permanent_thana'=>['required','string'],
            'permanent_office'=>['nullable','string'],
            'permanent_village'=>['required','string'],
        ]);

        $data = [
            'present_district' => $request->present_district,
            'present_thana' => $request->present_thana,
            'present_office' => $request->present_office,
            'present_village' => $request->present_village,
            'permanent_district' => $request->permanent_district,
            'permanent_thana' => $request->permanent_thana,
            'permanent_office' => $request->permanent_office,
            'permanent_village' => $request->permanent_village,
            'slug' => generateUniqueSlug(AddressDetails::class,'address-details'),            
        ];

        AddressDetails::create($data);

        return redirect()->route('address.details')->with('success', 'Create Successful!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request)
    {
        $request->validate([
            'present_district'=>['required','string'],
            'present_thana'=>['required','string'],
            'present_office'=>['nullable','string'],
            'present_village'=>['required','string'],

            'permanent_district'=>['required','string'],
            'permanent_thana'=>['required','string'],
            'permanent_office'=>['nullable','string'],
            'permanent_village'=>['required','string'],
        ]);

        $data = [
            'present_district' => $request->present_district,
            'present_thana' => $request->present_thana,
            'present_office' => $request->present_office,
            'present_village' => $request->present_village,
            'permanent_district' => $request->permanent_district,
            'permanent_thana' => $request->permanent_thana,
            'permanent_office' => $request->permanent_office,
            'permanent_village' => $request->permanent_village,            
        ];

        $address = AddressDetails::where('is_active',true)->first();
        $address->update($data);

        return redirect()->route('address.details')->with('success', 'Update Successful!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
