<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parentesco extends Model
{
    protected $table = 'parentescos';
    use SoftDeletes; 

    public function representantes(){
        return $this->hasMany(Representante::class);
    }
}
