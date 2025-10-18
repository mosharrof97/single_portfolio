<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'title',
        'sub_title',
        'desc',
        'is_active',
    ];

    protected $casts = [
        'image' => 'string',
        'title' => 'string',
        'desc' => 'string',
        'is_active' => 'boolean', 
    ];

}
