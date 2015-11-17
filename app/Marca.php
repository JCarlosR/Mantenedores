<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    function materiales(){
        return $this->hasMany('App\Material');
    }
}
