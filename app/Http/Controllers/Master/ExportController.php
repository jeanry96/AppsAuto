<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Excel;
use Storage;
use File;
use App\Exports\{ExportTPMI,ExportSCPR,ExportSCMM,ExportSCST,ExportLSPR,ExportLSMM,ExportLSST};
use App\Models\{TblPengelola, TblAccount,TblFilterScLs, TblKios};

class ExportController extends Controller
{
    public function index()
    {
        $count=TblPengelola::all();
        $dataTPMI = DB::table('tbl_upload_sc_ls_tlps')->join('tbl_sc_ls_tlp','tbl_upload_sc_ls_tlps.pstn','tbl_sc_ls_tlp.telpon')->join('tbl_nasabah','tbl_sc_ls_tlp.account','tbl_nasabah.account_nas')->distinct(['telpon','nama_nasabah'])->count();
        $dataSCPR = DB::table('tbl_convert_sc_ls')->join('tbl_sc_ls_tlp','tbl_convert_sc_ls.references','tbl_sc_ls_tlp.sc')->join('tbl_nasabah','tbl_sc_ls_tlp.account','tbl_nasabah.account_nas')->where('jenis_kode','SCPR')->distinct(['references','nama_nasabah'])->count();
        $dataLSPR = DB::table('tbl_convert_sc_ls')->join('tbl_sc_ls_tlp','tbl_convert_sc_ls.references','tbl_sc_ls_tlp.ls')->join('tbl_nasabah','tbl_sc_ls_tlp.account','tbl_nasabah.account_nas')->where('jenis_kode','LSPR')->distinct('ls')->get();
        $dataSCST = DB::table('tbl_convert_sc_ls')->join('tbl_sc_ls_tlp','tbl_convert_sc_ls.references','tbl_sc_ls_tlp.sc')->join('tbl_nasabah','tbl_sc_ls_tlp.account','tbl_nasabah.account_nas')->where('jenis_kode','SCST')->distinct('sc')->get();
        $dataLSST = DB::table('tbl_convert_sc_ls')->join('tbl_sc_ls_tlp','tbl_convert_sc_ls.references','tbl_sc_ls_tlp.ls')->join('tbl_nasabah','tbl_sc_ls_tlp.account','tbl_nasabah.account_nas')->where('jenis_kode','LSST')->distinct('ls')->get();
        $dataSCMM = DB::table('tbl_convert_sc_ls')->join('tbl_sc_ls_tlp','tbl_convert_sc_ls.references','tbl_sc_ls_tlp.sc')->join('tbl_nasabah','tbl_sc_ls_tlp.account','tbl_nasabah.account_nas')->where('jenis_kode','SCMM')->distinct('sc')->get();
        $dataLSMM = DB::table('tbl_convert_sc_ls')->join('tbl_sc_ls_tlp','tbl_convert_sc_ls.references','tbl_sc_ls_tlp.ls')->join('tbl_nasabah','tbl_sc_ls_tlp.account','tbl_nasabah.account_nas')->where('jenis_kode','LSMM')->distinct('ls')->get();
        $total = $dataTPMI + $dataSCPR + count($dataLSPR) + count($dataSCST) + count($dataLSST) + count($dataSCMM) + count($dataLSMM);
        $data = array(
            'scpr'   =>DB::table('tbl_pengelola')->join('tbl_nasabah','tbl_pengelola.account','=','tbl_nasabah.account_nas')->where('id_p',1)->get(),
            'lspr'   =>DB::table('tbl_pengelola')->join('tbl_nasabah','tbl_pengelola.account','=','tbl_nasabah.account_nas')->where('id_p',2)->get(),
            'scst'   =>DB::table('tbl_pengelola')->join('tbl_nasabah','tbl_pengelola.account','=','tbl_nasabah.account_nas')->where('id_p',3)->get(),
            'lsst'   =>DB::table('tbl_pengelola')->join('tbl_nasabah','tbl_pengelola.account','=','tbl_nasabah.account_nas')->where('id_p',4)->get(),
            'scmm'   =>DB::table('tbl_pengelola')->join('tbl_nasabah','tbl_pengelola.account','=','tbl_nasabah.account_nas')->where('id_p',5)->get(),
            'lsmm'   =>DB::table('tbl_pengelola')->join('tbl_nasabah','tbl_pengelola.account','=','tbl_nasabah.account_nas')->where('id_p',6)->get(),
            'tpmi'   =>DB::table('tbl_pengelola')->join('tbl_nasabah','tbl_pengelola.account','=','tbl_nasabah.account_nas')->where('id_p',7)->get(),
            'count'  =>count($count),
            'countTPMI' => $dataTPMI,
            'countSCPR' => $dataSCPR,
            'countLSPR' => count($dataLSPR),
            'countSCST' => count($dataSCST),
            'countLSST' => count($dataLSST),
            'countSCMM' => count($dataSCMM),
            'countLSMM' => count($dataLSMM),
            'SUM'       => $total,
        );
        return view('services.admin.ExportStartV10', $data);
    }

    public function exportTPMI()
    {
        $year   = 'Y'.date('y');
        $month  = 'M'.date('m');
        $day    = 'D'.date('d');
        $ymdhms =date('ymdhis');
        return Excel::download(new ExportTPMI,'TPMI_'.$year.$month.$day.'_'.$ymdhms.'.xls');
    }

    /**
     * Start here export excel V2.0
     */
    public function indexV20()
    {
        $dataAllLS = DB::table('tbl_filter_sc_ls')->join('tbl_sc_ls_tlp','tbl_filter_sc_ls.referensi','=','tbl_sc_ls_tlp.ls')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('kode','account','nominal','sign',DB::RAW("CONCAT(ls,'-',LEFT(nama_nasabah,7))"))->whereIn('kode',['LSMM','LSPR','LSST'])->distinct('ls')->get();
        $dataAllSC = DB::table('tbl_filter_sc_ls')->join('tbl_sc_ls_tlp','tbl_filter_sc_ls.referensi','=','tbl_sc_ls_tlp.sc')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('kode','account','nominal','sign',DB::RAW("CONCAT(sc,'-',LEFT(nama_nasabah,7))"))->whereIn('kode',['SCMM','SCPR','SCST'])->distinct('sc')->get();
        $dataAllTPMI= DB::table('tbl_upload_sc_ls_tlps')->join('tbl_sc_ls_tlp','tbl_upload_sc_ls_tlps.pstn','=','tbl_sc_ls_tlp.telpon')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('kode','account_nas','tagihan','sign','telpon','nama_nasabah',DB::RAW("CONCAT(telpon,'/',LEFT(nama_nasabah,5))"))->distinct()->where('kode','TPMI')->orderBy('telpon')->get();
        $total = count($dataAllSC) + count($dataAllLS) + count($dataAllTPMI);
        $data = array(
            'countAllSC'    => count($dataAllSC),
            'countAllLS'    => count($dataAllLS),
            'countAllTPMI'  => count($dataAllTPMI),
            'SUM'           => $total,
        );
        return view('services.admin.ExportStartV20', $data);
    }

    public function exportsAllExcel_V20()
    {
        $this->exportSCPR_V20();
        $this->exportSCST_V20();
        $this->exportLSPR_V20();
        $this->exportLSST_V20();
    }

    private function exportSCPR_V20()
    {
        $year   = 'Y'.date('yy');
        $month  = 'M'.date('m');
        $day    = 'D'.date('d');
        $ymdhms = date('yymdhis');
        return Excel::download(new \App\Exports\V20\ExportsSCPR,'SCPR_'.$year.$month.$day.'_'.$ymdhms.'.xls');
    }

    private function exportSCMM_V20()
    {
        $year   = 'Y'.date('yy');
        $month  = 'M'.date('m');
        $day    = 'D'.date('d');
        $ymdhms = date('yymdhis');
        return Excel::download(new \App\Exports\V20\ExportsSCMM,'SCMM_'.$year.$month.$day.'_'.$ymdhms.'.xls');
    }

    private function exportSCST_V20()
    {
        $year   = 'Y'.date('yy');
        $month  = 'M'.date('m');
        $day    = 'D'.date('d');
        $ymdhms =date('yymdhis');
        return Excel::download(new \App\Exports\V20\ExportsSCST,'SCST_'.$year.$month.$day.'_'.$ymdhms.'.xls');
    }

    private function exportLSPR_V20()
    {
        $year   = 'Y'.date('yy');
        $month  = 'M'.date('m');
        $day    = 'D'.date('d');
        $ymdhms =date('yymdhis');
        return Excel::download(new \App\Exports\V20\ExportsLSPR,'LSPR_'.$year.$month.$day.'_'.$ymdhms.'.xls');
    }

    private function exportLSMM_V20()
    {
        $year   = 'Y'.date('yy');
        $month  = 'M'.date('m');
        $day    = 'D'.date('d');
        $ymdhms = date('yymdhis');
        return Excel::download(new \App\Exports\V20\ExportsLSMM,'LSMM_'.$year.$month.$day.'_'.$ymdhms.'.xls');
    }

    private function exportLSST_V20()
    {
        $year   = 'Y'.date('yy');
        $month  = 'M'.date('m');
        $day    = 'D'.date('dd');
        $ymdhms = date('yymd_h:m:s');
        return Excel::download(new \App\Exports\V20\ExportsLSST,'LSST_'.$year.$month.$day.'_'.$ymdhms.'.xls');
    }

    public function exportExcelScV20()
    {
        $year   = 'Y'.date('y');
        $month  = 'M'.date('m');
        $day    = 'D'.date('d');
        $ymdhms = date('ymd').'_'.now().time();
        return Excel::download(new \App\Exports\V20\ExportsAllSc,'SCMM_SCPR_SCST_'.$year.$month.$day.'_'.$ymdhms.'.xls');
    }

    public function exportExcelLsV20()
    {
        $year   = 'Y'.date('y');
        $month  = 'M'.date('m');
        $day    = 'D'.date('d');
        $ymdhms = date('ymd').'_'.now().time();
        return Excel::download(new \App\Exports\V20\ExportsAllLs,'LSMM_LSPR_LSST_'.$year.$month.$day.'_'.$ymdhms.'.xls');
    }

    public function MstrAutoDbtExcel()
    {
        $year   = 'Y'.date('y');
        $month  = 'M'.date('m');
        $day    = 'D'.date('d');
        $ymdhms = date('ymdh:i:s');
        return Excel::download(new \App\Exports\ExportMSTRAutoDBT,'MSTR_AUTO_DBT_'.$year.$month.$day.'_'.$ymdhms.'.xls');
    }

    public function MstrDataNsbh()
    {
        $year   = 'Y'.date('yy');
        $month  = 'M'.date('m');
        $day    = 'D'.date('d');
        $ymdhms = date('ymdh:i:s');
        return Excel::download(new \App\Exports\ExportMSTRNsbh,'MSTR_DATA_NASABAH_'.$year.$month.$day.'_'.$ymdhms.'.xls');
    }
}
