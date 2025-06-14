<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'phone'];

    protected $hidden = ['password'];

    public function groupes()
    {
        return $this->belongsToMany(
            Groupe::class,
            'groupe_tutor',
            'tutor_id',
            'groupe_id'
        );
    }

    public function lessonTimetables()
    {
        return $this->hasMany(LessonTimetable::class);
    }
}