<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

     protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'project',
        'order_date',
        'delivery_date',
        'logo',
        'slug',
        'is_active',
    ];
}
