<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadEntrega extends Model
{
    protected $table = 'unidades_entrega';

    function materiales(){
        return $this->hasMany('App\Material');
    }
}
