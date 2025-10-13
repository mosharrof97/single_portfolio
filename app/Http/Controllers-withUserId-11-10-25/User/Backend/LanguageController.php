<?php

namespace App\Http\Controllers\User\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::where('user_id',userAuthId())->where('is_active', true)->orderBy('id','asc')->get();
        return view('backend.page.other_information.language_proficiency.index', compact('languages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'language' => ['required', 'string',],
            'reading' => ['required', 'string',],
            'writing' => ['required', 'string',],
            'speaking' => ['required', 'string',],
           
        ]);

        $data = [
            'user_id' => userAuthId(),
            'language' => $request->language,
            'reading' => $request->reading,
            'writing' => $request->writing,
            'speaking' => $request->speaking,
            'slug' => generateUniqueSlug(Language::class, $request->language),
        ];

        Language::create($data);

        return redirect()->route('language')->with('success', 'Create successful!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'language' => ['required', 'string',],
            'reading' => ['required', 'string',],
            'writing' => ['required', 'string',],
            'speaking' => ['required', 'string',],
           
        ]);

        $data = [
            'language' => $request->language,
            'reading' => $request->reading,
            'writing' => $request->writing,
            'speaking' => $request->speaking,
        ];
        $language = Language::where('user_id', userAuthId())->where('slug', $slug)->first();
        $language->update($data);

        return redirect()->route('language')->with('success', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $language = Language::where('user_id', userAuthId())->where('slug', $slug)->first();
        
        if(!$language){
            return redirect()->route('language')->with('error','Delete Failed!');  
        }

        $language->delete();
        return redirect()->route('language')->with('success','Delete successful!');
    }
}
