<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boolean extends Model
{
    protected $table = 'booleans';
    use SoftDeletes;  
    
    public function visuals(){
        return $this->hasMany(Visual::class);
    }
}
