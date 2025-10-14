<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Publication;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::where('is_active', true)->orderBy('id','asc')->get();
        return view('backend.page.accomplishment.publication.index', compact('publications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', Rule::unique('publications')],
            'date' => ['nullable', 'date'],
            'url' => [
                'nullable',
                'url',
                'regex:/^((https?|ftp):\/\/)?([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})(\/\S*)?$/',
                Rule::unique('publications')
            ],
            'desc' => ['required', 'string'],
        ], [
            'url.regex' => 'The URL format is invalid. Please enter a valid web address.',
            'url.unique' => 'You have already added this URL.',
        ]);

        $data = [
            'title' => $request->title,
            'date' => $request->date,
            'url' => $request->url,
            'desc' => $request->desc,
            'slug' => generateUniqueSlug(Publication::class, $request->title),
        ];

        // dd( $data);
        Publication::create($data);

        return redirect()->route('publication')->with('success', 'Create successful!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $publication = Publication::where('slug', $slug)->firstOrFail();
        $request->validate([
            'title' => ['required', 'string', Rule::unique('publications')->ignore($publication->id)],
            'date' => ['nullable', 'date'],
            'url' => [
                'nullable',
                'url',
                'regex:/^((https?|ftp):\/\/)?([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})(\/\S*)?$/',
                Rule::unique('publications')->ignore($publication->id)
            ],
            'desc' => ['required', 'string'],
        ], [
            'url.regex' => 'The URL format is invalid. Please enter a valid web address.',
            'url.unique' => 'You have already added this URL.',
        ]);

        $data = [
            'title' => $request->title,
            'date' => $request->date,
            'url' => $request->url,
            'desc' => $request->desc,
        ];
        // $publication = publication::where('slug', $slug)->first();
        $publication->update($data);

        return redirect()->route('publication')->with('success', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $publication = Publication::where('slug', $slug)->first();
        
        if(!$publication){
            return redirect()->route('publication')->with('error','Delete Failed!');  
        }

        $publication->delete();
        return redirect()->route('publication')->with('success','Delete successful!');
    }
}
