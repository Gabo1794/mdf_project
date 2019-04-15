<?php

namespace mdf;

use Illuminate\Database\Eloquent\Model;

class SalidaProducto extends Model
{
    protected $table = 'id_salida';
    protected $primaryKey = 'id_prov';

    protected $fillable = [
        'id_mrm', 'id_prod', 'cantidad_salida', 
    ];      
}
