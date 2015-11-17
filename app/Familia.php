<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    function materiales(){
        return $this->hasMany('App\Material');
    }
}
