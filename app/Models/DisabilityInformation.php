<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisabilityInformation extends Model
{
    use HasFactory, Notifiable;
    
    protected $fillable =[
        'isdisability',
        'disability_id',
        'document',
        'cbo_disability_problem',
    ];
}
