<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblConvertSCLS extends Model
{
    protected $table = 'tbl_convert_sc_ls';
    public $timestamps = false;
    protected $fillable = ['jenis_kode','signs','references','nominal'];

    public function Kios()
    {
        return $this->belongsTo(App\TblKios::class);
    }
}
