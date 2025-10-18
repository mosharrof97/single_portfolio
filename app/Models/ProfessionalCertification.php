<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfessionalCertification extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    
    protected $fillable = [
        'certification',
        'institute',
        'desc',
        'location',
        'country',
        'start_date',
        'end_date',
        'slug',
        'is_active',
    ];

    protected $casts = [
        'start_date'=>'datetime',
        'end_date'=>'datetime',
    ];

}
