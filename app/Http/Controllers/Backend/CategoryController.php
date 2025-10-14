<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = BlogCategory::orderBy('id','asc')->get();
        return view('backend.page.setting.category.index', compact('categorys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required', 'string'],
        ]);

        $data = [
            'category' => $request->category,
            'slug' => generateUniqueSlug(BlogCategory::class, $request->category),
        ];

        BlogCategory::create($data);

        return redirect()->route('category')->with('success', 'Create successful!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        
        $request->validate([
            'category' => ['required', 'string'],
        ]);

        // dd($request->all());
        $data = [
            'category' => $request->category,
        ];
        // dd($data);
        $category = BlogCategory::where('slug', $slug)->first();
        $category->update($data);

        return redirect()->route('category')->with('success', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $category = BlogCategory::where('slug', $slug)->first();
        
        if(!$category){
            return redirect()->route('category')->with('error','Delete Failed!');  
        }

        $category->delete();
        return redirect()->route('category')->with('success','Delete successful!');
    }
}