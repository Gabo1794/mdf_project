<?php

namespace mdf;

use Illuminate\Database\Eloquent\Model;

class Consejeria extends Model
{
    protected $table = 'consejeria';
    protected $primaryKey = 'id_consejeria';

    protected $fillable = [
        'id_observacion', 'id_mrm', 'id_miembro',
    ];    
}
