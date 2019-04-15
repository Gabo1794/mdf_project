<?php

namespace mdf;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
  protected $table = 'tipo_producto';  

    protected $primaryKey = 'id_tipo_prod';

    protected $fillable = [
        'tipo_prod'
    ];        
}
