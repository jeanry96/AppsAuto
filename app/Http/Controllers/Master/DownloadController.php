<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Excel;
use App\Models\{TblPengelola, TblCIF, TblAccount,TblUploadTelpon, TblKios, TblUploadSCPR};
use App\Exports\{ExportTelpon, ExportSCPR};

class DownloadController extends Controller
{


    public function index()
    {
       $viewTelpons = DB::table('tbl_pengelola')->join('tbl_upload_telpons','tbl_pengelolas.id','=','tbl_upload_telpons.id_pengelola')->join('tbl_telpons','tbl_upload_telpons.telpon','=','tbl_telpons.no_telpon')->join('tbl_cifs','tbl_telpons.cif','=','tbl_cifs.cif')->join('tbl_accounts','tbl_cifs.cif','=','tbl_accounts.cif')->get();
        //$viewTelpons = DB::table('tbl_pengelolas')->join('tbl_upload_telpons', function($join){$join->on('tbl_pengelolas.id','=','tbl_upload_telpons.id_pengelola'); $join->on('tbl_upload_telpons.telpon','=','tbl_telpons.no_telpon');})->get();
       return view('services.admin.ViewTelpon')->with(['viewTelpons'   => $viewTelpons]);
    }


    public function pageExport()
    {
        $count=TblPengelola::all();
        $data = array(
            'scpr'   =>DB::table('tblpengelola')->join('tblnasabah','tblpengelola.account','=','tblnasabah.account_nas')->where('id',1)->get(),
            'lspr'   =>DB::table('tblpengelola')->join('tblnasabah','tblpengelola.account','=','tblnasabah.account_nas')->where('id',2)->get(),
            'scst'   =>DB::table('tblpengelola')->join('tblnasabah','tblpengelola.account','=','tblnasabah.account_nas')->where('id',3)->get(),
            'lsst'   =>DB::table('tblpengelola')->join('tblnasabah','tblpengelola.account','=','tblnasabah.account_nas')->where('id',4)->get(),
            'scmm'   =>DB::table('tblpengelola')->join('tblnasabah','tblpengelola.account','=','tblnasabah.account_nas')->where('id',5)->get(),
            'lsmm'   =>DB::table('tblpengelola')->join('tblnasabah','tblpengelola.account','=','tblnasabah.account_nas')->where('id',6)->get(),
            'tpmi'   =>DB::table('tblpengelola')->join('tblnasabah','tblpengelola.account','=','tblnasabah.account_nas')->where('id',7)->get(),
            'count'  =>count($count),
        );
        return view('services.admin.ExportStart',$data);
    }


    public function downloadTelpon()
    {

        $joinData = DB::table('tbl_upload_data')->join('tbltelpon','tbl_upload_data.pstn','=','tbltelpon.telpon')->join('tblnasabah','tbltelpon.account','=','tblnasabah.account_nas')->where('kode_pengelola','=','TPMI')->orderBy('pstn')->get();
        $export = array(
            'count'     => count($joinData),
            'data'      => $joinData,
        );

        return view('services.admin.DownloadTelpon',$export);
        //return Excel::download(new ExportTelpon, 'TPMI.xlsx');
    }

    public function exportTelpon()
    {
        $year   = 'Y'.date('yy');
        $month  = 'M'.date('m');
        $day    = 'D'.date('d');
        $ymdhms =date('yymd H:i:s');
        return Excel::download(new ExportTelpon,'TPMI_'.$year.$month.$day.'_'.$ymdhms.'.xlsx');
    }

    public function viewSCPR()
    {
        $dataJoin = DB::table('tblsclistrik')->join('tbl_upload_data','tblsclistrik.lantai','=','tbl_upload_data.floor')->join('tblnasabah','tblsclistrik.account','=','tblnasabah.account_nas')->where('kode_pengelola','=','SCPR')->get();
        $data = array(
            'count'         => count($dataJoin),
            'scpr'          => $dataJoin
        );

        return view('services.admin.ExportSCPR', $data);
    }
    public function exportSCPR()
    {
        $year   = 'Y'.date('yy');
        $month  = 'M'.date('m');
        $day    = 'D'.date('d');
        $ymdhms =date('yymd H:i:s');
        return Excel::download(new ExportSCPR,'SCPR_'.$year.$month.$day.'_'.$ymdhms.'.xls');
    }
}
