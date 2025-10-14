<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisabilityInformation extends Model
{
    use HasFactory, Notifiable;
    
    protected $fillable =[
        'pd_id',
        'isdisability',
        'disability_id',
        'document',
        'cbo_disability_problem',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
