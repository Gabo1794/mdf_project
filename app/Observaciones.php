<?php

namespace mdf;

use Illuminate\Database\Eloquent\Model;

class Observaciones extends Model
{
    protected $table = 'observaciones';
    protected $primaryKey = 'id_observaciones';

    protected $fillable = ['observacion',];
}
