<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblAccount extends Model
{
    public $table='tbl_nasabah';
    protected $fillable = [
        'account_nas','nama_nasabah','telp_a','telp_b'
    ];
    
    public $timestamps = false;

}
