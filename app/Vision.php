<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vision extends Model
{
    protected $table = 'visions';
    use SoftDeletes; 

    public function visions(){
        return $this->hasMany(Vision::class);
    }
}
