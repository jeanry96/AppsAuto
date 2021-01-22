<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\{TblUploadScLsTlp, TblUploadTelpon, TblConvertSCLS, TblAccount, TblKios, User, TblImportScLsTlp, TblFiltercLsTlp};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array(
            'nasabah'           => count(TblAccount::all()),
            'autodebet'         => count(DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('id_sc_ls_tlp','nama_nasabah','account_nas','sc','ls','telpon')->orderBy('id_sc_ls_tlp','ASC')->get()),
            'importScLsTlp'     => count(TblImportScLsTlp::all()) + TblUploadTelpon::where('kode','TPMI')->count(),
            'exportScLsTlp'     => count(DB::table('tbl_filter_sc_ls')->join('tbl_sc_ls_tlp','tbl_filter_sc_ls.referensi','=','tbl_sc_ls_tlp.sc')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('kode','account','nominal','sign',DB::RAW("CONCAT(sc,'-',LEFT(nama_nasabah,6))"))->distinct('sc')->whereIn('kode',['SCMM','SCPR','SCST'])->orderBy('kode')->get()) + count(DB::table('tbl_filter_sc_ls')->join('tbl_sc_ls_tlp','tbl_filter_sc_ls.referensi','=','tbl_sc_ls_tlp.ls')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('kode','account','nominal','sign',DB::RAW("CONCAT(ls,'-',LEFT(nama_nasabah,6))"))->whereIn('kode',['LSMM','LSPR','LSST'])->distinct('ls')->get()) + count(DB::table('tbl_upload_sc_ls_tlps')->join('tbl_sc_ls_tlp','tbl_upload_sc_ls_tlps.pstn','=','tbl_sc_ls_tlp.telpon')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('kode','account','tagihan','sign',DB::RAW("CONCAT(telpon,'/',LEFT(nama_nasabah,5))"))->distinct()->where('kode','TPMI')->orderBy('telpon')->get()),
        );
        return view('home',$data);
    }
}
