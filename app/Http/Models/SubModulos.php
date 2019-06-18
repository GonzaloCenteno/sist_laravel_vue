<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubModulos extends Model
{
    public $timestamps = false;
    protected $table = 'permisos.sub_modulos';
    protected $primaryKey= 'id_sub_mod';

    protected $guarded = [];

    public function modulos()
    {
        return $this->belongsTo(Modulos::class);
    }
}
