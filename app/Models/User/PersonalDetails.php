<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonalDetails extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $fillable = [
        'user_id',
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
