<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Achievement extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'pd_id',
        'acc_type',
        'title',
        'issue_date',
        'url',
        'desc',
        'slug',
    ];

    public function pd(): BelongsTo
    {
        return $this->belongsTo(PersonalDetails::class);
    }
}
