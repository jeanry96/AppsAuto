<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\{TblAccount, TblKios, TblFilterScLs, TblConvertSCLS};
use DB;
use Illuminate\Http\Request;

class SCLSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TblAccount  $tblAccount
     * @return \Illuminate\Http\Response
     */
    public function show(TblAccount $tblAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TblAccount  $tblAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(TblAccount $tblAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TblAccount  $tblAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TblAccount $tblAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TblAccount  $tblAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(TblAccount $tblAccount)
    {
        //
    }

    public function viewDataSCMMToExport()
    {
        $export = DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->join('tbl_convert_sc_ls','tbl_sc_ls_tlp.sc','=','tbl_convert_sc_ls.references')->select('jenis_kode','account_nas','nominal','signs','references','nama_nasabah',DB::RAW("CONCAT(sc,signs,LEFT(nama_nasabah,6))"))->distinct()->where('jenis_kode','SCMM')->orderBy('sc')->get();
        $data = array(
            'count' => count($export),
            'data'  => $export,
        );
        return view('services.admin.ViewDataSCMMToExport', $data);
    }

    public function viewDataSCPRToExport()
    {

    }

    public function viewDataSCSTToExport()
    {

    }

    public function viewDataLSMMToExport()
    {
        $retrieve = DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->join('tbl_convert_sc_ls','tbl_sc_ls_tlp.ls','=','tbl_convert_sc_ls.references')->select('jenis_kode','account_nas','nominal','signs','ls','nama_nasabah',DB::RAW("CONCAT(ls,'|',LEFT(nama_nasabah,6))"))->distinct()->where('jenis_kode','LSMM')->orderBy('ls')->get();
        $data = array(
            'count' => count($retrieve),
            'data'  => $retrieve,
        );

        return view('services.admin.ViewDataLSMMToExport', $data);


    }

    public function viewDataLSPRTotExort()
    {

    }

    public function viewDataLSSTTotExort()
    {

    }

    public function viewDataSCMM_SCPR_SCST_To_Export()
    {
        $retrieve = DB::table('tbl_filter_sc_ls')->join('tbl_sc_ls_tlp','tbl_filter_sc_ls.referensi','=','tbl_sc_ls_tlp.sc')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('kode','account','nominal','sign','sc','nama_nasabah',DB::RAW("CONCAT(sc,'-',LEFT(nama_nasabah,6))"))->distinct('sc')->whereIn('kode',['SCMM','SCPR','SCST'])->orderBy('kode')->get();
        $data = array(
            'count' => count($retrieve),
            'data'  => $retrieve
        );

        return view('services.admin.ViewDataSCMM_SCPR_SCST_To_Export', $data);

    }

    public function viewDataLSMM_LSPR_LSST_To_Export()
    {
        $retrieve = DB::table('tbl_filter_sc_ls')->join('tbl_sc_ls_tlp','tbl_filter_sc_ls.referensi','=','tbl_sc_ls_tlp.ls')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('kode','account','nominal','sign','ls','nama_nasabah',DB::RAW("CONCAT(ls,'-',LEFT(nama_nasabah,6))"))->whereIn('kode',['LSMM','LSPR','LSST'])->distinct('ls')->get();
        $data = array(
            'count' => count($retrieve),
            'data'  => $retrieve,
        );
        return view('services.admin.ViewDataLSMM_LSPR_LSSt_To_Export', $data);
    }
}
