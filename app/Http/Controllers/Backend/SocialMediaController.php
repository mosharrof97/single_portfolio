<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialmedias = SocialMedia::where('is_active', true)->orderBy('id','asc')->get();
        return view('backend.page.other_information.link_accounts.index', compact('socialmedias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string',Rule::unique('social_media')],
            'url' => [
                'required',
                'url',
                'regex:/^((https?|ftp):\/\/)?([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})(\/\S*)?$/',
                Rule::unique('social_media')
            ],
        ], [
            'url.regex' => 'The URL format is invalid. Please enter a valid web address.',
            'url.unique' => 'You have already added this URL.',
        ]);

        $data = [
            'name' => $request->name,
            'url' => $request->url,
            'slug' => generateUniqueSlug(SocialMedia::class, $request->name),
        ];

        SocialMedia::create($data);

        return redirect()->route('socialmedia')->with('success', 'Create successful!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => ['required', 'string', Rule::unique('social_media')],
            'url' => [
                'required',
                'url',
                'regex:/^((https?|ftp):\/\/)?([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})(\/\S*)?$/',
                Rule::unique('social_media')
            ],
        ], [
            'url.regex' => 'The URL format is invalid. Please enter a valid web address.',
            'url.unique' => 'You have already added this URL.',
        ]);

        $data = [
            'name' => $request->name,
            'url' => $request->url,
        ];
        $socialmedia = SocialMedia::where('slug', $slug)->first();
        $socialmedia->update($data);

        return redirect()->route('socialmedia')->with('success', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $socialmedia = SocialMedia::where('slug', $slug)->first();
        
        if(!$socialmedia){
            return redirect()->route('socialmedia')->with('error','Delete Failed!');  
        }

        $socialmedia->delete();
        return redirect()->route('socialmedia')->with('success','Delete successful!');
    }
}

