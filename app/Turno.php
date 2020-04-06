<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turno extends Model
{
    protected $table = 'turnos';
    use SoftDeletes;

    public function alumnos(){
        return $this->belongsToMany(Alumno::class,"alumno_turno","turno_id","alumno_id");
    }
}
