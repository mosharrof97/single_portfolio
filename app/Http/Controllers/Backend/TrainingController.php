<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Training;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $training = Training::orderBy('id','asc')->get();
        return view('backend.page.education.training.index', compact('training'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'country' => ['required', 'string'],
            'topic' => ['nullable', 'string'],
            'year' => ['required'],
            'institute' => ['required', 'string'],
            'duration' => ['required'],
            'location' => ['nullable', 'string'],
        ]);

        $data = [
            'title' => $request->title,
            'country' => $request->country,
            'topic' => $request->topic,
            'year' => $request->year,
            'institute' => $request->institute,
            'duration' => $request->duration,
            'location' => $request->location,
            'slug' => generateUniqueSlug(Training::class, $request->title),
        ];

        Training::create($data);

        return redirect()->route('training')->with('success', 'Create successful!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'country' => ['required', 'string'],
            'topic' => ['nullable', 'string'],
            'year' => ['required'],
            'institute' => ['required', 'string'],
            'duration' => ['required'],
            'location' => ['nullable', 'string'],
        ]);

        $data = [
            'title' => $request->title,
            'country' => $request->country,
            'topic' => $request->topic,
            'year' => $request->year,
            'institute' => $request->institute,
            'duration' => $request->duration,
            'location' => $request->location,
        ];
        $training = Training::where('slug', $slug)->first();
        $training->update($data);

        return redirect()->route('training')->with('success', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $training = Training::where('slug', $slug)->first();
        
        if(!$training){
            return redirect()->route('training')->with('error','Delete Failed!');  
        }

        $training->delete();
        return redirect()->route('training')->with('success','Delete successful!');
    }
}
