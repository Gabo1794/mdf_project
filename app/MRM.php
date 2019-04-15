<?php

namespace mdf;

use Illuminate\Database\Eloquent\Model;

class MRM extends Model
{
    protected $table = 'miembro_hasrol_hasministerio';

    protected $primaryKey = 'id_mrm';

    protected $fillable = ['id_miembro', 'id_rol', 'id_ministerio', 'activo'];
}
