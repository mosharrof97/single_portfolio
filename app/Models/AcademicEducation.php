<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcademicEducation extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'edu_level',
        'exam_title',
        'major_group',
        'exam_board',
        'institute_name',
        'is_foreign_inst',
        'foreign_country',
        'result',
        'marks',
        'CGPA',
        'scale',
        'passing_year',
        'edu_duration',
        'achievement',
        'slug',
        'is_active',
    ];

    // /**
    //  * Get all of the comments for the AcademicEducation
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function user(): HasMany
    // {
    //     return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    // }


}
