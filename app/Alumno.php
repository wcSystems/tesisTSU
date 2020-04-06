<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    protected $table = 'alumnos';
    use SoftDeletes;

    public function grados(){
        return $this->belongsToMany(Grado::class,"alumno_grado","alumno_id","grado_id");
    }

    public function seccions(){
        return $this->belongsToMany(Seccion::class,"alumno_seccion","alumno_id","seccion_id");
    }

    public function turnos(){
        return $this->belongsToMany(Turno::class,"alumno_turno","alumno_id","turno_id");
    }

    public function deportes(){
        return $this->belongsToMany(Deporte::class,"alumno_deporte","alumno_id","deporte_id");
    }

    public function socials(){
        return $this->belongsToMany(Social::class,"alumno_social","alumno_id","social_id");
    }

    public function representantes(){
        return $this->belongsToMany(Representante::class,"alumno_representante","alumno_id","representante_id");
    }

    public function visuals(){
        return $this->belongsToMany(Visual::class,"alumno_visual","alumno_id","visual_id");
    }

    public function amtropometrias(){
        return $this->belongsToMany(Amtropometria::class,"alumno_amtropometria","alumno_id","amtropometria_id");
    }

    public function sexo(){
        return $this->belongsTo(Sexo::class,"sexo_id");
    }

}
