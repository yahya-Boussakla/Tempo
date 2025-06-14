<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = ['validation_status'];

    public function lessonTimetables()
    {
        return $this->hasMany(LessonTimetable::class);
    }
}