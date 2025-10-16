<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'pd_id',
        'type',
        'bg_title',
        'title',
        'desc',
        'is_active',
        'status',
    ];

    protected $casts = [];

    public function pd(): BelongsTo
    {
        return $this->belongsTo(PersonalDetails::class);
    }

}

