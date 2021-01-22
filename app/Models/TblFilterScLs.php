<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblFilterScLs extends Model
{
    protected $table='tbl_filter_sc_ls';
    protected $fillable = ['kode','sign','referensi','nominal'];
    public $timestamps = false;
}
