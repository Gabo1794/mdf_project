<?php

namespace mdf;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Miembros extends Model
{
	use SoftDeletes;
	
    protected $table = 'miembros';
    protected $primaryKey = 'id_miembro';

    protected $fillable = [
        'nombre', 'ap_pat', 'ap_mat', 'edad', 'fecha_nac', 'direccion', 'tel_fijo','tel_cel','nac_espiritual',
        'consolidacion','peniel','bautismo_agua', 'bautismo_es', 'sanidad_total', 'curso1', 'curso2', 
        'curso3','curso4', 'curso5', 'curso6', 'curso7', 'email', 'd07', 'oracion_familias','observaciones'
    ];

    protected $dates = ['deleted_at'];
}
