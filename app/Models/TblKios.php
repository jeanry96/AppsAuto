<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TblAccount, TblConvertSCLS;

class TblKios extends Model
{
    protected $table = 'tbl_sc_ls_tlp';
    protected $fillable = ['account','sc','ls','telpon'];
    protected $sortable=[
        'account','sc','ls','tlp'
    ];

    public $timestamps = false;

    public function Account()
    {
        return $this->belongsTo(App\TblAccount::class);
    }

    public function Convert()
    {
        return $this->hasMany(App\TblConvertSCLS::class);
    }

}
