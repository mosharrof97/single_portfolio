<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pd_id',
        'category_id',
        'title',
        'desc',
        'image',
        'slug',
        'is_active',
        'status'
    ];

    protected $casts = [
        'title'=> 'string',
        'desc'=> 'string',
        'image' => 'string',
        'slug' => 'string',
        'is_active' => 'boolean', 
        'status' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         if (! $model->isDirty('created_by')) {
    //             $model->created_by = getLogInAdminUser()->id;
    //         }
    //         if (! $model->isDirty('updated_by')) {
    //             $model->updated_by = getLogInAdminUser()->id;
    //         }
    //     });

    //     static::updating(function ($model) {
    //         if (! $model->isDirty('updated_by') && Auth::check()) {
    //             $model->updated_by = getLogInAdminUser()->id;
    //         }
    //     });
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(UserBlogCategory::class,'category_id');
    }
}
