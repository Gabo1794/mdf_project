<?php

namespace mdf;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    protected $table = 'notas';
    protected $primaryKey = 'id_nota';

    protected $fillable = [
        'tutulo', 'nota', 'id_miembro',
    ];  
}
