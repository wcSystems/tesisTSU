<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model
{
    protected $table = 'socials';
    use SoftDeletes; 

    public function alumnos(){
        return $this->belongsToMany(Alumno::class,"alumno_social","social_id","alumno_id");
    }

    public function representantes(){
        return $this->belongsToMany(Representante::class,"representante_social","social_id","representante_id");
    }
}
