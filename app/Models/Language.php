<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Language extends Model
{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'pd_id',
        'language',
        'reading',
        'writing',
        'speaking',
        'slug',
        'is_active',
    ];

    protected $casts=[];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
