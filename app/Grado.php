<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grado extends Model
{
    protected $table = 'grados';
    use SoftDeletes;

    public function alumnos(){
        return $this->belongsToMany(Alumno::class,"alumno_grado","grado_id","alumno_id");
    }
}
