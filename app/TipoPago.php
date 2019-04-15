<?php

namespace mdf;

use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    protected $table = 'tipo_pago';
    protected $primaryKey = 'id_tipo_pago';

    protected $fillable = [
        'tipo_pago',
    ];      
}
