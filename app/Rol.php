<?php

namespace mdf;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
	use SoftDeletes;
    protected $table = 'rol';

    protected $primaryKey = 'id_rol';

    protected $fillable = ['rol'];

    protected $dates = ['deleted_at'];
}
