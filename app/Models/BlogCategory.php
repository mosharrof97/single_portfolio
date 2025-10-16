<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BlogCategory extends Model
{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'pd_id',
        'category',
        'slug',
        'is_active',
    ];

    public function pd(): BelongsTo
    {
        return $this->belongsTo(PersonalDetails::class);
    }

    public function blog(){
        return $this->HasMany(UserBlog::class, 'category_id');
    }
}

