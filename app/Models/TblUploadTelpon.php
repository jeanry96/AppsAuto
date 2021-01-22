<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblUploadTelpon extends Model
{
    public $timestamps = false;
    protected $table='tbl_upload_sc_ls_tlps';
    protected $fillable = [
        'kode','sign','pstn','tagihan',
    ];
}
