<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function familia() {
        return $this->belongsTo('App\Familia');
    }

    public function marca() {
        return $this->belongsTo('App\Marca');
    }

    public function unidad() {
        //Como no se usa las convenciones de laravel en este caso se procede a indicar el id de la tabla
        return $this->belongsTo('App\UnidadEntrega','unidad_entrega_id');
    }
}
