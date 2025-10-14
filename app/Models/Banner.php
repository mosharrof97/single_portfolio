<?php

namespace App\Models\User;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

