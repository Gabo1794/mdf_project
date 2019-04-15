<?php

namespace mdf;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Ministerios extends Model
{
	use SoftDeletes;
    protected $table = 'ministerios';

    protected $primaryKey = 'id_ministerio';

    protected $fillable = ['ministerio'];

    protected $dates = ['deleted_at'];
}
