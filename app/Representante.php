<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Representante extends Model
{
    protected $table = 'representantes';
    use SoftDeletes;

    public function socials(){
        return $this->belongsToMany(Social::class,"representante_social","representante_id","social_id");
    }

    public function alumnos(){
        return $this->belongsToMany(Alumno::class,"alumno_social","representante_id","alumno_id");
    }

    public function sexo(){
        return $this->belongsTo(Sexo::class,"sexo_id");
    }

    public function trabajo(){
        return $this->belongsTo(Trabajo::class,"trabajo_id");
    }

    public function parentesco(){
        return $this->belongsTo(Parentesco::class,"parentesco_id");
    }
}
