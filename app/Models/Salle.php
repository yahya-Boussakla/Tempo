<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'capacity', 'location'];

    public function lessonTimetables()
    {
        return $this->hasMany(LessonTimetable::class);
    }
}