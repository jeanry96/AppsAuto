<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblUploadScLsTlp extends Model
{
    protected $table='tbl_upload_sc_ls_tlps';
    protected $fillable=['kode','sign','lantai','kios','tagihan'];
    public $timestamps = false;
}
