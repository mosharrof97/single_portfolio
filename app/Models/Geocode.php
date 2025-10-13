<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geocode extends Model
{
    use HasFactory;
    protected $fillable = [
        'district',
        'thana',
        'postoffice',
        'postcode',
    ];
}
