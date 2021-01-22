<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblUploadScLs extends Model
{
    protected $table='tbl_upload_sc_ls_tlps';
    protected $fillable=['kode','sign','floors','blocks','kios', 'tagihan'];
    public $timestamps = false;
}
