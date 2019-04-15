<?php

namespace mdf;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_prod';

    protected $fillable = [
        'nombre', 'cantidad_comprada', 'cantidad_total', 'precio_compra', 'precio_venta', 'id_prov', 'id_tipo_prod', 
        'tipo_entrada', 
    ];  

}
