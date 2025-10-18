<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AddressDetails extends Model
{
    use HasFactory, Notifiable,SoftDeletes;
    protected $fillable =[
        'present_location',
        'present_village',
        'present_office',
        'present_thana',
        'present_district',
        'present_country',
        
        'permanent_location',
        'permanent_village',
        'permanent_office',
        'permanent_thana',
        'permanent_district',
        'permanent_country',
        'slug',
        'is_active',
    ];

}
