<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'description'];

    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }

    public function modules()
    {
        return $this->belongsToMany(
            Module::class,
            'module_specialization',
            'specialization_id',
            'module_id'
        );
    }
}

