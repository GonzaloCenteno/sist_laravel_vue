<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TblMenu extends Model
{
    public $timestamps = false;
    protected $table = 'principal.tblmenu_men';
    protected $primaryKey= 'men_id';
}
