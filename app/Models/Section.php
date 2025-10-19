<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Section extends Model
{
     protected $fillable = [
        'degree_id',
        'name',
        'bn_name',
        'is_active',
        'slug',
        'created_by',
        'updated_by',
    ];

    protected static function boot(){
        parent::boot();

        static::creating( function ($model){
            if(! $model->isDirty('created_by')){
                $model->created_by = Auth::guard('web')->user()->id;
            }

            if(!$model->isDirty('updated_by')){
                $model->updated_by = Auth::guard('web')->user()->id;
            }
        });

        static::updating( function($model){
            if(!$model->isDirty('updated_by') && Auth::check()){
                $model->updated_by = Auth::guard('web')->user()->id;
            }
        });
    }

    /**
     * Get the user that owns the Subject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function degree(): BelongsTo
    {
        return $this->belongsTo(Degree::class);
    }

    /**
     * Get all of the comments for the Section
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subject(): HasMany
    {
        return $this->hasMany(Subject::class);
    }


    public function academic(): HasMany
    {
        return $this->hasMany(Academic::class);
    }
}