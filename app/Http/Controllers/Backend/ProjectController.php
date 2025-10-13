<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('is_active', true)->orderBy('id','asc')->get();
        return view('backend.page.accomplishment.project.index', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', Rule::unique('projects')],
            'date' => ['nullable', 'date'],
            'url' => [
                'nullable',
                'url',
                'regex:/^((https?|ftp):\/\/)?([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})(\/\S*)?$/',
                Rule::unique('projects')
            ],
            // 'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:ratio=1/1'],
            'desc' => ['required', 'string'],
        ], [
            'url.regex' => 'The URL format is invalid. Please enter a valid web address.',
            'url.unique' => 'You have already added this URL.',
        ]);

        $imageName='';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $imageName = 'project_'.time().'-'.rand(100000, 1000000000).'.'.$file->extension();
            $file->move(public_path('assets/img/project'),$imageName);

        }

        $data = [
            'title' => $request->title,
            'date' => $request->date,
            'url' => $request->url,
            'desc' => $request->desc,
            'image' => $imageName,
            'slug' => generateUniqueSlug(Project::class, $request->title),
        ];

        // dd( $data);
        Project::create($data);

        return redirect()->route('project')->with('success', 'Create successful!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $request->validate([
            'title' => ['required', 'string', Rule::unique('projects')->ignore($project->id)],
            'date' => ['nullable', 'date'],
            'url' => [
                'nullable',
                'url',
                'regex:/^((https?|ftp):\/\/)?([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})(\/\S*)?$/',
                Rule::unique('projects')->ignore($project->id)
            ],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:ratio=1/1'],
            'desc' => ['required', 'string'],
        ], [
            'url.regex' => 'The URL format is invalid. Please enter a valid web address.',
            'url.unique' => 'You have already added this URL.',
        ]);

        $imageName='';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $imageName = 'project_'.time().'-'.rand(100000, 1000000000).'.'.$file->extension();
            $oldImage = public_path('assets/img/project/'.$request->old_image);
            if($request->old_image && file_exists($oldImage)){
                unlink($oldImage);
            };

            $file->move(public_path('assets/img/project'),$imageName);

        }else{
            $imageName = $request->old_image;
        }

        $data = [
            'title' => $request->title,
            'date' => $request->date,
            'url' => $request->url,
            'desc' => $request->desc,
            'image' =>$imageName,
        ];
        // $project = project::where('slug', $slug)->first();
        $project->update($data);

        return redirect()->route('project')->with('success', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $project = Project::where('slug', $slug)->first();
        
        if(!$project){
            return redirect()->route('project')->with('error','Delete Failed!');  
        }

        $oldImage = public_path('assets/img/project/'.$project->image);
        if($project->image && file_exists($oldImage)){
            unlink($oldImage);
        };
        

        $project->delete();
        return redirect()->route('project')->with('success','Delete successful!');
    }
}

