<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'pd_id',
        'title',
        'date',
        'url',
        'desc',
        'image',
        'slug',
        'is_active',
    ];

    protected $casts = [
        'date'=> 'date',
    ];

    public function pd(): BelongsTo
    {
        return $this->belongsTo(PersonalDetails::class);
    }
}
