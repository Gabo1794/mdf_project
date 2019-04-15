<?php

namespace mdf;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = 'proveedores';
    
    protected $primaryKey = 'id_prov';

    protected $fillable = [
        'proveedor', 'id_tipo_pago',
    ];      
}
