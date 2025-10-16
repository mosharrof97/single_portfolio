<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'phone',
        'email',
        'password',
        'slug',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         if (! $model->isDirty('created_by')) {
    //             $model->created_by = Auth::guard('company')->user()->id;
    //         }
    //         if (! $model->isDirty('updated_by')) {
    //             $model->updated_by = Auth::guard('company')->user()->id;
    //         }
    //     });

    //     static::updating(function ($model) {
    //         if (! $model->isDirty('updated_by')) {
    //             $model->updated_by = Auth::guard('company')->user()->id;
    //         }
    //     });
    // }


    
    // /*========== One To One Relation ==========*/
    // public function personal():  HasOne
    // {
    //     return $this->hasOne(PersonalDetails::class);
    // }

    // public function address(): HasOne 
    // {
    //     return $this->hasOne(AddressDetails::class);
    // }


    // /*========== One To Many Relation ==========*/
    // public function education(): HasMany
    // {
    //     return $this->hasMany(AcademicEducation::class);
    // }


    // public function Banner(): HasOne
    // {
    //     return $this->hasOne(UserBanner::class);
    // }

    // public function activities(): HasMany
    // {
    //     return $this->hasMany(Activities::class);
    // }

    // public function achievement(): HasMany
    // {
    //     return $this->hasMany(Achievement::class);
    // }

    // public function service(): HasMany 
    // {
    //     return $this->hasMany(UserService::class);
    // }

    // public function blog(): HasMany 
    // {
    //     return $this->hasMany(UserBlog::class);
    // }

    // public function setting(): HasMany 
    // {
    //     return $this->hasMany(UserSetting::class);
    // }

    // public function slider(): HasMany 
    // {
    //     return $this->hasMany(UserSlider::class);
    // }

    // public function socialMedia(): HasMany 
    // {
    //     return $this->hasMany(UserSocialMedia::class);
    // }

    // public function training(): HasMany 
    // {
    //     return $this->hasMany(Training::class);
    // }

    // public function skillDescription(): HasMany 
    // {
    //     return $this->hasMany(SkillDescription::class);
    // }

    // public function skill(): HasMany 
    // {
    //     return $this->hasMany(Skill::class);
    // }

    // public function references(): HasMany 
    // {
    //     return $this->hasMany(References::class);
    // }

    // public function publication(): HasMany 
    // {
    //     return $this->hasMany(Publication::class);
    // }

    // public function project(): HasMany 
    // {
    //     return $this->hasMany(Project::class);
    // }

    // public function certification(): HasMany 
    // {
    //     return $this->hasMany(ProfessionalCertification::class);
    // }

    // public function otherInfo(): HasMany 
    // {
    //     return $this->hasMany(OtherRelevantInformation::class);
    // }

    // public function language(): HasMany 
    // {
    //     return $this->hasMany(Language::class);
    // }

    // public function experience(): HasMany 
    // {
    //     return $this->hasMany(Experience::class);
    // }

    // public function career(): HasMany 
    // {
    //     return $this->hasMany(CareerApplication::class);
    // }

    // public function award(): HasMany 
    // {
    //     return $this->hasMany(Award::class);
    // }
    // /*========== One To Many Relation ==========*/    

}
