<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonalDetails extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $fillable = [
        'pd_id',
        'image',
        'first_name',
        'last_name',
        'f_name',
        'm_name',
        'date_of_birth',
        'gender',
        'religion',
        'married_status',
        'nationality',
        'national_id',
        'passport_no',
        'issue_date',
        'country_code',
        'mobile',
        'mobile_home',
        'mobile_office',
        'email',
        'extra_email',
        'blood_group',
        'height',
        'weight',
        'slug',
        'is_active',
    ];

    protected $casts = [
        'date_of_birth'=>'date',
        'issue_date'=>'date',
    ];

    
    /*========== One To One Relation ==========*/

    public function address(): HasOne 
    {
        return $this->hasOne(AddressDetails::class, 'pd_id');
    }


    /*========== One To Many Relation ==========*/
    public function education(): HasMany
    {
        return $this->hasMany(AcademicEducation::class, 'pd_id');
    }


    public function Banner(): HasOne
    {
        return $this->hasOne(UserBanner::class, 'pd_id');
    }

    public function activities(): HasMany
    {
        return $this->hasMany(Activities::class, 'pd_id');
    }

    public function achievement(): HasMany
    {
        return $this->hasMany(Achievement::class, 'pd_id');
    }

    public function service(): HasMany 
    {
        return $this->hasMany(Service::class, 'pd_id');
    }

    public function blog(): HasMany 
    {
        return $this->hasMany(Blog::class, 'pd_id');
    }

    public function setting(): HasMany 
    {
        return $this->hasMany(Setting::class, 'pd_id');
    }

    public function slider(): HasMany 
    {
        return $this->hasMany(Slider::class, 'pd_id');
    }

    public function socialMedia(): HasMany 
    {
        return $this->hasMany(SocialMedia::class, 'pd_id');
    }

    public function training(): HasMany 
    {
        return $this->hasMany(Training::class, 'pd_id');
    }

    public function skillDescription(): HasMany 
    {
        return $this->hasMany(SkillDescription::class, 'pd_id');
    }

    public function skill(): HasMany 
    {
        return $this->hasMany(Skill::class, 'pd_id');
    }

    public function references(): HasMany 
    {
        return $this->hasMany(References::class, 'pd_id');
    }

    public function publication(): HasMany 
    {
        return $this->hasMany(Publication::class, 'pd_id');
    }

    public function project(): HasMany 
    {
        return $this->hasMany(Project::class, 'pd_id');
    }

    public function certification(): HasMany 
    {
        return $this->hasMany(ProfessionalCertification::class, 'pd_id');
    }

    public function otherInfo(): HasMany 
    {
        return $this->hasMany(OtherRelevantInformation::class, 'pd_id');
    }

    public function language(): HasMany 
    {
        return $this->hasMany(Language::class, 'pd_id');
    }

    public function experience(): HasMany 
    {
        return $this->hasMany(Experience::class, 'pd_id');
    }

    public function career(): HasMany 
    {
        return $this->hasMany(CareerApplication::class, 'pd_id');
    }

    public function award(): HasMany 
    {
        return $this->hasMany(Award::class, 'pd_id');
    }
    /*========== One To Many Relation ==========*/    

}
