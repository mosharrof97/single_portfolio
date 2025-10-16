<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $fillable =[
        'pd_id',
        'title',
        'company',
        'business',
        'position',
        'department',
        'from_date',
        'to_date',
        'is_continue',
        'exp_area',
        'exp_area_year',
        'location',
        'responsibilities',
        'slug',
        'is_active',
    ];

    protected $casts = [
        'from_date' => 'date',
        'to_date' => 'date',
    ];

    public function pd(): BelongsTo
    {
        return $this->belongsTo(PersonalDetails::class);
    }
}
