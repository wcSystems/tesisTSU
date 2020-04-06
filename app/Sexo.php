<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sexo extends Model
{
    protected $table = 'sexos';
    use SoftDeletes;

    public function alumnos(){
        return $this->hasMany(Alumno::class);
    }

    public function representantes(){
        return $this->hasMany(Representante::class);
    }
}
