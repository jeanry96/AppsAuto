<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblImportScLsTlp extends Model
{
    protected $table='tbl_import_sc_ls_tlps';
    protected $fillable=['id','kode','sign','floor','block','kios','tagihan'];
    public $timestamps=false;
}
