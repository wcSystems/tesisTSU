<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seccion extends Model
{
    protected $table = 'seccions';
    use SoftDeletes;

    public function alumnos(){
        return $this->belongsToMany(Alumno::class,"alumno_seccion","seccion_id","alumno_id");
    }
}
