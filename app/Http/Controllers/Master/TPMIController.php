<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{TblUploadScLsTlp, TblAccount, TblTelpon};
use Illuminate\Support\Str;
use DB;

class TPMIController extends Controller
{
    public function viewTelponToExport()
    {
        $export = DB::table('tbl_upload_sc_ls_tlps')->join('tbl_sc_ls_tlp','tbl_upload_sc_ls_tlps.pstn','=','tbl_sc_ls_tlp.telpon')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('kode','account_nas','tagihan','sign','telpon','nama_nasabah',DB::RAW("CONCAT(telpon,'/',LEFT(nama_nasabah,5))"))->distinct()->where('kode','TPMI')->orderBy('telpon')->get();
        $data = array(
            'count'     => count($export),
            'data'      => $export
        );

        return view('services.admin.ViewDataTPMIToExport', $data);
    }
}
