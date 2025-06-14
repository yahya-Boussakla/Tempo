<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;
    protected $fillable = ['group_id', 'date_start', 'date_end'];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function lessonTimetables()
    {
        return $this->hasMany(LessonTimetable::class);
    }
}
