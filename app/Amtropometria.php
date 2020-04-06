<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Amtropometria extends Model
{
    protected $table = 'amtropometrias';
    use SoftDeletes;

    public function alumnos(){
        return $this->belongsToMany(Alumno::class,"alumno_social","amtropometria_id","alumno_id");
    }
}
