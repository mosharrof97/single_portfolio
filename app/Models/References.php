<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class References extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'designation',
        'organization',
        'email',
        'relation',
        'mobile',
        'mobile_home',
        'mobile_office',
        'address',
        'slug',
    ];
}
