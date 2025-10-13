<?php

namespace App\Http\Controllers\User\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User\Award;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $awards = Award::where('user_id',userAuthId())->where('is_active', true)->orderBy('id','asc')->get();
        return view('backend.page.accomplishment.award.index', compact('awards'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', Rule::unique('awards')->where(fn ($query) => $query->where('user_id', userAuthId()))],
            'date' => ['nullable', 'date'],
            'url' => [
                'nullable',
                'url',
                'regex:/^((https?|ftp):\/\/)?([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})(\/\S*)?$/',
                Rule::unique('awards')->where(fn ($query) => $query->where('user_id', userAuthId()))
            ],
            'desc' => ['required', 'string'],
        ], [
            'url.regex' => 'The URL format is invalid. Please enter a valid web address.',
            'url.unique' => 'You have already added this URL.',
        ]);

        $data = [
            'user_id' => userAuthId(),
            'title' => $request->title,
            'date' => $request->date,
            'url' => $request->url,
            'desc' => $request->desc,
            'slug' => generateUniqueSlug(Award::class, $request->title),
        ];

        // dd( $data);
        Award::create($data);

        return redirect()->route('award')->with('success', 'Create successful!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $award = Award::where('slug', $slug)->where('user_id', userAuthId())->firstOrFail();
        $request->validate([
            'title' => ['required', 'string', Rule::unique('awards')->where(fn ($query) => $query->where('user_id', userAuthId()))->ignore($award->id)],
            'date' => ['nullable', 'date'],
            'url' => [
                'nullable',
                'url',
                'regex:/^((https?|ftp):\/\/)?([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})(\/\S*)?$/',
                Rule::unique('awards')->where(fn ($query) => $query->where('user_id', userAuthId()))->ignore($award->id)
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
        // $award = award::where('user_id', userAuthId())->where('slug', $slug)->first();
        $award->update($data);

        return redirect()->route('award')->with('success', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $award = Award::where('user_id', userAuthId())->where('slug', $slug)->first();
        
        if(!$award){
            return redirect()->route('award')->with('error','Delete Failed!');  
        }

        $award->delete();
        return redirect()->route('award')->with('success','Delete successful!');
    }
}
