<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deporte extends Model
{
    protected $table = 'deportes';
    use SoftDeletes; 

    public function alumnos(){
        return $this->belongsToMany(Alumno::class,"alumno_social","deporte_id","alumno_id");
    }
}
