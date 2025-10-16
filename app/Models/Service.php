<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'pd_id',        
        'icon',
        'name',
        'desc',
        'service_no',
        'slug',
        'is_active',
        'status',
    ];

    protected $casts = [];

    public function pd(): BelongsTo
    {
        return $this->belongsTo(PersonalDetails::class);
    }

}
