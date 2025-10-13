<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Slider;
use App\Models\User\Banner;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::where('is_active', true)->get();
        $banner = Banner::where('is_active', true)->first();
        return view('backend.page.setting.create_slider_banner', compact('sliders','banner'));
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
        $request->validate([
            'title'=>['required'],
            'sub_title'=>['required'],
            'desc'=>['required'],
            'image' => ['required', 'image', 'max:1048', 'mimes:png,jpg,jpeg'], //'dimensions:width=1000,height=780'
        ]);

        $imageName = "";
        if($request->hasFile('image')){

            $file = $request->file('image');
            $imageName = 'Slider_'.time().'-'.rand(100000, 10000000).'.'.$file->extension();
            $file->move(public_path('assets/img/slider/'),$imageName);
        }

        
        $data = [
            'title'=>$request->title,
            'sub_title' => $request->sub_title,
            'desc'=>$request->desc,
            'image'=>$imageName,
        ];

        Slider::create($data);

        return redirect()->route('slider')->with('success', 'create successful!');
    }

    public function update(Request $request)
    {
        $validcheck = [
            'slider_id'=>['required','integer'],
            'title'=>['required','string'],
            'sub_title'=>['required','string'],
            'desc'=>['required','string'],            
        ];

        if($request->hasFile('image')){
            $validcheck['image'] = ['required', 'image', 'max:1048', 'mimes:png,jpg,jpeg' ];//'dimensions:width=1920,height=500'
        }

        $request->validate($validcheck);

        $slider = Slider::where('id', $request->slider_id)->first();
        if(!$slider){
            return redirect()->route('slider')->with('error', 'Something wrong!'); 
        }
        $imageName = "";
        if($request->hasFile('image')){
            $file = $request->file('image');
            $imageName = 'Slider_'.time().'-'.rand(100000, 10000000).'.'.$file->extension();

            $imagePath = public_path('assets/img/slider/') . $request->old_image;

            if (!empty($request->old_image) && file_exists($imagePath)) {
                unlink($imagePath);
            }
            
            $file->move(public_path('assets/img/slider/'),$imageName);

        }else{
            $imageName = $request->old_image;
        }

        
        $data = [
            'title'=>$request->title,
            'sub_title' => $request->sub_title,
            'desc'=>$request->desc,
            'image'=>$imageName,
        ];

        
        $slider->update( $data);

        return redirect()->route('slider')->with('success', 'Update successful!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::where('id', $id)->first();

        if(!$slider){
            return redirect()->route('slider')->with('error', 'Something wrong!'); 
        }

        $imagePath = public_path('assets/img/slider/') . $slider->image;

        if (!empty($slider->image) && file_exists($imagePath)) {
            unlink($imagePath);
        }
        $slider->delete();

        return redirect()->route('slider')->with('success', 'Delete successful!'); 
    }
}
