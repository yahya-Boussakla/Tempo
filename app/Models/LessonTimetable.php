<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonTimetable extends Model
{
    use HasFactory;

    // protected $table = 'lesson_timetable'; // Specify the correct table name

    protected $fillable = [
        'lesson_id', 'timetable_id', 'tutor_id', 'module_id',
        'salle_id', 'time_start', 'time_end', 'week_day'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function timetable()
    {
        return $this->belongsTo(Timetable::class);
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }
}