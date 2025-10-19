<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;
use App\Models\PersonalDetails;
use App\Models\AcademicEducation;
use App\Models\Achievement;
use App\Models\Activities;
use App\Models\AddressDetails;
use App\Models\Award;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Board;
use App\Models\CareerApplication;
use App\Models\Client;
use App\Models\Country;
use App\Models\DisabilityInformation;
use App\Models\Experience;
use App\Models\OtherRelevantInformation;
use App\Models\ProfessionalCertification;
use App\Models\Project;
use App\Models\Publication;
use App\Models\References;
use App\Models\Result;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\SkillDescription;
use App\Models\SocialMedia;
use App\Models\Training;
use App\Models\Year;
use App\Models\Language;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::first();
        $slider = Slider::where('is_active', true)->get();
        $personal = PersonalDetails::first();
        $address = AddressDetails::first();
        $language = Language::where('is_active', true)->get();
        $project = Project::where('is_active', true)->get();
        $skill = Skill::where('is_active', true)->get();
        $blog = Blog::where('is_active', true)->latest()->take(6)->get();

        return view('frontend.page.index', compact(['user','personal','address','language','project','blog']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
