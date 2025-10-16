<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'pd_id',
        'image',        
        'is_active',
    ];

    protected $casts = [
        'image' => 'string',
        'is_active' => 'boolean',  
    ];

    public function pd(): BelongsTo
    {
        return $this->belongsTo(PersonalDetails::class);
    }
}

