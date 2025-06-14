<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'specialization_id', 'year'];

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

     public function tutors()
    {
        return $this->belongsToMany(
            Tutor::class,
            'groupe_tutor',
            'groupe_id',
            'tutor_id'
        );
    }

    public function timetables()
    {
        return $this->hasMany(Timetable::class);
    }
}
