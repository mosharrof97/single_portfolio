<?php
use Illuminate\Support\Str;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;
use App\Models\User\UserService;
use App\Models\User\UserSetting;

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
    $service = UserService::Where('user_id',userAuthId())->where('service_no', $service)->first();

    return $service;
}

function userSetting($type)
{
    $setting = UserSetting::Where('user_id',userAuthId())->where('type',$type)->first();
    return $setting;
}

/**============ User Frontend ==============**/ 
function user($username){
    $user = User::where('username', $username)->first();

    return $user;
}

function userFrontendService($service, $username){
    $user = user($username);
    $service = UserService::Where('user_id',$user->id)->where('service_no', $service)->first();

    return $service;
}

function userFrontendSetting($type, $username)
{
    $user = user($username);
    $setting = UserSetting::Where('user_id',$user->id)->where('type',$type)->first();
    return $setting;
}