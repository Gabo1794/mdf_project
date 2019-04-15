<?php

namespace mdf;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipo_usuario';

    protected $primaryKey = 'idTipo';

    protected $fillable = [
        'tipoUser'
    ];
}
