<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Setting;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
       return view('backend.page.setting.page_title_desc');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'=>['required','string'],
            'bg_title'=>['required','string'],
            'title'=>['required','string'],
            'desc'=>['required','string'],
        ]);

        $data = [
            'type'=>$request->type,
            'bg_title'=>$request->bg_title,
            'title'=>$request->title,
            'desc'=>$request->desc,
        ];
        Setting::UpdateOrCreate(['type'=>$request->type,], $data);

        return redirect()->route('page_title_desc')->with('success','Successful!');
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