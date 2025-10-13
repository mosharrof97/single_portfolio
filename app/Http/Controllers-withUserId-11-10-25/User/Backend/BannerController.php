<?php

namespace App\Http\Controllers\User\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\UserBanner;


class BannerController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|file|image|max:2048',
        ]);

        $banner = UserBanner::where('user_id', userAuthId())->where('id', $request->banner_id)
                    ->first();

        if (!$banner && $request->banner_id) {
            return redirect()->back()->with('error', 'You attempted to edit HTML!');
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = 'banner_' . time() . '_' . rand(10000, 1000000) . '.' . $file->extension();
            
            $oldImagePath = public_path('assets/img/banner/' . $banner->image);
            // if ($banner && $banner->image) {
                
            //     if (File::exists($oldImagePath)) {
            //         File::delete($oldImagePath);
            //     }
            // }
            if ($banner && $banner->image && file_exists($oldImagePath)) {
                unlink($imagePath);
            }
            $file->move(public_path('assets/img/banner'), $imageName);
        }

        $validatedData = [
            'user_id' => userAuthId(),
            'image'=>$imageName,
        ];
        UserBanner::updateOrCreate(
            ['id' => $request->banner_id, 'user_id'=>userAuthId()],
            $validatedData
        );

        return redirect()->route('slider')->with('success', 'create successful!');
    }

}
