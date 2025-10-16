<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CareerApplication extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    
    protected $fillable = [
        'pd_id',
        'objective',
        'present_salary',
        'expected_salary',
        'opt_level',
        'opt_avail',
        'slug',
    ];

    public function pd(): BelongsTo
    {
        return $this->belongsTo(PersonalDetails::class);
    }
}
