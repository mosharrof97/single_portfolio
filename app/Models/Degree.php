<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Degree extends Model
{
    protected $fillable = [        
        'name',
        'bn_name',
        'level',
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
     * Get all of the comments for the Degree
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function section(): HasMany
    {
        return $this->hasMany(Section::class);
    }

    public function subject(): HasMany
    {
        return $this->hasMany(Subject::class);
    }

    public function jobPost(): HasMany
    {
        return $this->hasMany(JobPost::class, 'degree_ids');
    }
}