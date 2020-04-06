<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trabajo extends Model
{
    protected $table = 'trabajos';
    use SoftDeletes; 

    public function representantes(){
        return $this->hasMany(Representante::class);
    }
}
