<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'hourly_volume', 'description',];

    public function specializations()
    {
        return $this->belongsToMany(
            Specialization::class,
            'module_specialization',
            'module_id',
            'specialization_id'
        );
    }



    public function lessonTimetables()
    {
        return $this->hasMany(LessonTimetable::class);
    }
}

