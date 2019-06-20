<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Modulos extends Model
{
    public $timestamps = false;
    protected $table = 'permisos.modulos';
    protected $primaryKey= 'id_mod';
}
