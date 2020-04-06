<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visual extends Model
{
    protected $table = 'visuals';
    use SoftDeletes; 

    public function alumnos(){
        return $this->belongsToMany(Alumno::class,"alumno_social","visual_id","alumno_id");
    }

    public function lente(){
        return $this->belongsTo(Boolean::class,"lente_id");
    }

    public function derecho(){
        return $this->belongsTo(Vision::class,"derecho_id");
    }

    public function izquierdo(){
        return $this->belongsTo(Vision::class,"izquierdo_id");
    }

    public function estrabismo(){
        return $this->belongsTo(Boolean::class,"estrabismo_id");
    }

    public function seguimiento(){
        return $this->belongsTo(Boolean::class,"seguimiento_id");
    }
}
