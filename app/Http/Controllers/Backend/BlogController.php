<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('id','asc')->get();
        return view('backend.page.setting.blog.list',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = BlogCategory::where('is_active',true)->orderBy('id','asc')->get();
        return view('backend.page.setting.blog.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       
        // dd($request->all());
            $request->validate([
                'category_id'=>['required'],
                'title'=>['required','string'],
                'desc'=>['required','string'],
                'status'=>['required'],
                'image' => ['required', 'image', 'max:512', 'mimes:jpg,jpeg,png']
            ]);
            // dd($request->all());
    
            if($request->hasFile('image')){
                $file = $request->file('image');
                $imageName = 'blog_'.time().'-'.rand(10000,10000000).'.'.$file->extension();
                $file->move(public_path('assets/img/blog'), $imageName);
                $imageNamePath = 'assets/img/blog/'.$imageName;
            }
    
            $data = [
                'category_id' => $request->category_id,
                'title'=>$request->title,
                'desc'=>$request->desc,
                'status'=>$request->status,
                'image'=>$imageNamePath,
                'slug' => generateUniqueSlug(Blog::class, $request->title),
            ];
    
            Blog::create($data);
            
            // return redirect()->back()->withErrors($validator)->withInput();
            return redirect()->route('blog')->with('success', 'Blog Create Successful!');
        
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
    public function edit(string $slug)
    {
        $categorys = BlogCategory::where('is_active',true)->orderBy('id','asc')->get();
        $blog = Blog::where('slug',$slug)->orderBy('id','asc')->first();
        
        return view('backend.page.setting.blog.edit',compact('blog','categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
            $validate = [
                'category_id' => ['required'],
                'title'=>['required','string'],
                'desc'=>['required','string'],
                'status'=>['required'],
            ];
            if($request->old_image){
                $validate['image'] = ['nullable', 'image', 'max:512', 'mimes:jpg,jpeg,png'];
            }else{
                $validate['image'] = ['required', 'image', 'max:512', 'mimes:jpg,jpeg,png'];
            }
            $request->validate($validate);
    
            $blog = Blog::where('slug', $slug)->first();
            if(!$blog){
                return redirect()->route('blog')->with('error', 'Something is Wrong!');
            }
            
            $imageNamePath ='';
            if($request->hasFile('image')){
                if (!empty($blog->image) && file_exists($blog->image)) {
                    unlink($blog->image);
                }

                $file = $request->file('image');
                $imageName = 'blog_'.time().'-'.rand(10000,10000000).'.'.$file->extension();
                
                $file->move(public_path('assets/img/blog'), $imageName);
                $imageNamePath = 'assets/img/blog/'.$imageName;

            }else{
                $imageNamePath = $request->old_image;
            }
    
            $data = [
                'category_id' => $request->category_id,
                'title'=>$request->title,
                'desc'=>$request->desc,
                'status'=>$request->status,
                'image'=>$imageNamePath,
            ];    
    
            $blog->update($data);
            
            return redirect()->route('blog')->with('success', 'Update Successful!');
       
    }

    public function updateStatus(Request $request, $slug)
    {
        // $request->validate([
        //     'status' => ['required'],
        // ]);
    
        $blog = Blog::where('slug', $slug)->first();
    
        if (!$blog) {
            return response()->json(['error' => 'Blog not found'], 404); 
        }
    
        if($request->status !== null){
            $blog->update(['status' => $request->status]);
            return response()->json(['success' => 'Status updated successfully']);
        }
        if($request->is_active !== null ){
            $blog->update(['is_active' => $request->is_active]);
            return response()->json(['success' => 'Active status updated successfully']);
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)    
    {
        $blog = Blog::where('slug', $slug)->first();
        if(!$blog){
            return redirect()->route('blog')->with('error', 'Something is Wrong!');
        }

        if (!empty($blog->image) && file_exists($blog->image)) {
            unlink($blog->image);
        }
        
        $blog->delete();
        return redirect()->route('blog')->with('success', 'Delete Successful!');
    }
    
}
