<?php
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Setting;
use App\Models\PersonalDetails;

/**Auth ID**/ 
function userAuthId(){
    $authId = Auth::guard('user')->user()->id;

    return $authId;
}
/**Create Unique Slug**/ 
function generateUniqueSlug($model, $name)
{
    $name = Str::slug($name);
    $random = Str::random(10);
    $time = time();
    $slug = $name.'-'.$time.$random;
    $originalSlug = $slug;    
    $count = 1;

    while ($model::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $count;
        $count++;
    }

    return $slug;
}

function userService($service){
    $service = Service::where('service_no', $service)->first();

    return $service;
}

function userSetting($type)
{
    $setting = Setting::where('type',$type)->first();
    return $setting;
}

/**============ User Frontend ==============**/ 
function user(){
    $user = PersonalDetails::first();

    return $user;
}

function userFrontendService($service){
    $service = Service::where('service_no', $service)->first();

    return $service;
}

function userFrontendSetting($type)
{
    $setting = Setting::where('type',$type)->first();

    return $setting;
}