<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'skill',
        'progress',
        'self',
        'service',
        'education',
        'training',
        'slug',
        'is_active',
    ];

    protected $casts = [];

}
