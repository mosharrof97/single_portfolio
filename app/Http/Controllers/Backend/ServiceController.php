<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\UserService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = UserService::get();
        return view('backend.page.setting.service.list', compact('services'));
    }

    public function create()
    {
        return view('backend.page.setting.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>['required','string','max:100'],
            'desc'=>['required','string','max:250'],
            'icon' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp', 'max:200']
        ]);

        if($request->hasFile('icon')){
            $icon = $request->file('icon');
            $iconName = 'Service-'.time().'-'.rand(1000000,100000000).'.'.$icon->extension();
            $path = 'assets/img/service/';
            $iconPath = $path.$iconName;
            $icon->move(public_path($path),$iconName);
                        
        }

        $data = [
            'name' => $request->name,
            'desc' => $request->desc,
            'status' => $request->status,
            'icon' => $iconPath,
            'slug'=> generateUniqueSlug(UserService::class, $request->name),
        ];

        
        // UserService::updateOrCreate(
        //     ['slug' => $request->slug, 'user_id'=>userAuthId()],
        //     $data
        // );

        UserService::create( $data );

        return redirect()->route('service')->with('success', 'create successful!');
    }


    public function edit($slug)
    {
        $service = UserService::where('slug', $slug)->first();
        return view('backend.page.setting.service.edit', compact('service'));
    }

    public function update(Request $request, $slug)
    {
        $validate = [
            'name'=>['required','string','max:100'],
            'desc'=>['required','string','max:250'],
        ];
        
        if($request->hasFile('icon')){
            $validate['icon'] = ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp', 'max:200'];            
        }
        
        $request->validate($validate);

        $service = UserService::where('slug', $slug)->first();
        $iconPath = $service->icon;
        if($request->hasFile('icon')){
            $icon = $request->file('icon');
            $iconName = 'Service-'.time().'-'.rand(1000000,100000000).'.'.$icon->extension();
            $path = 'assets/img/service/';
            $iconPath = $path.$iconName;
            $icon->move(public_path($path),$iconName);   
            
            if ($service->icon && file_exists(public_path($service->icon))) {
                unlink(public_path($service->icon));
            }
        }

        $data = [
            'name' => $request->name,
            'desc' => $request->desc,
            'status' => $request->status,
            'icon' => $iconPath,
        ];

        
        // UserService::updateOrCreate(
        //     ['slug' => $request->slug, 'user_id'=>userAuthId()],
        //     $data
        // );

        $service->update( $data );

        return redirect()->route('service')->with('success', 'Update successful!');
    }

    public function delete($slug)
    {
        $service = UserService::where('slug', $slug)->first();
        $service->delete();
        return view('backend.page.setting.service.edit', compact('service'));
    }
   
}