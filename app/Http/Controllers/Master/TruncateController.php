<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\{TblUploadTelpon, TblUploadScLsTlp, TblConvertSCLS};

class TruncateController extends Controller
{
    /**
     * Start Delete Import & Filter data V1.0
     */
    
    public function removeDataV1_0()
    {
        $data = array(
            'SCPRImport'          => count(TblUploadScLsTlp::where('kode','SCPR')->get()),
            'SCPRFilter'          => count(TblConvertSCLS::where('jenis_kode','SCPR')->get()),
            'LSPRImport'          => count(TblUploadScLsTlp::where('kode','LSPR')->get()),
            'LSPRFilter'          => count(TblConvertSCLS::where('jenis_kode','LSPR')->get()),
            'SCMMImport'          => count(TblUploadScLsTlp::where('kode','SCMM')->get()),
            'SCMMFilter'          => count(TblConvertSCLS::where('jenis_kode','SCMM')->get()),
            'LSMMImport'          => count(TblUploadScLsTlp::where('kode','LSMM')->get()),
            'LSMMFilter'          => count(TblConvertSCLS::where('jenis_kode','LSMM')->get()),
            'SCSTImport'          => count(TblUploadScLsTlp::where('kode','SCST')->get()),
            'SCSTFilter'          => count(TblConvertSCLS::where('jenis_kode','SCST')->get()),
            'LSSTImport'          => count(TblUploadScLsTlp::where('kode','LSST')->get()),
            'LSSTFilter'          => count(TblConvertSCLS::where('jenis_kode','LSST')->get()),
            'TPMIImport'          => count(TblUploadScLsTlp::where('kode','TPMI')->get()),            
            'totalDataImport'     => count(TblUploadScLsTlp::all()),
            'totalDataFilter'     => count(TblConvertSCLS::all()),
        );
        return view('services.admin.TruncateTables_V10',$data);
    }

    //Start Delete Data Upload
    public function delUpldSCPR()
    {
        $data = DB::table('tbl_upload_sc_ls_tlps')->where('kode','=','SCPR')->delete();
        return redirect()->back()->with('success','Data upload SCPR sudah dihapus!!!');
    }

    public function delUpldLSPR()
    {
        $data = DB::table('tbl_upload_sc_ls_tlps')->where('kode','=','LSPR')->delete();
        return redirect()->back()->with('success','Data upload LSPR sudah dihapus!!!');
    }

    public function delUpldSCMM()
    {
        $data = DB::table('tbl_upload_sc_ls_tlps')->where('kode','=','SCMM')->delete();
        return redirect()->back()->with('success','Data upload SCMM sudah dihapus!!!');
    }

    public function delUpldLSMM()
    {
        $data = DB::table('tbl_upload_sc_ls_tlps')->where('kode','=','LSMM')->delete();
        return redirect()->back()->with('success','Data upload LSMM sudah dihapus!!!');
    }

    public function delUpldSCST()
    {
        $data = DB::table('tbl_upload_sc_ls_tlps')->where('kode','=','SCST')->delete();
        return redirect()->back()->with('success','Data upload SCST sudah dihapus!!!');
    }

    public function delUpldLSST()
    {
        $data = DB::table('tbl_upload_sc_ls_tlps')->where('kode','=','LSST')->delete();
        return redirect()->back()->with('success','Data upload LSST sudah dihapus!!!');
    }

    public function delUpldTPMI()
    {
        $data = DB::table('tbl_upload_sc_ls_tlps')->where('kode','=','TPMI')->delete();
        return redirect()->back()->with('success','Data upload TPMI sudah dihapus!!!');
    }

    //End Delete Upload Here

    //Start Truncate data Upload & Convert here
    private function truncTblUpld()
    {
        DB::table('tbl_upload_sc_ls_tlps')->truncate();
    }

    private function truncTblCvrt()
    {
        DB::table('tbl_convert_sc_ls')->truncate();
    }

    public function truncAllUpldCvrt()
    {
        $this->truncTblUpld();
        $this->truncTblCvrt();

        return redirect()->back()->with('success','Data upload dan filter sudah dihapus!!');
    }    

    //End truncate data upload & convert here

    //Start delete data filter here
    public function delCvrtSCPR()
    {
        DB::table('tbl_convert_sc_ls')->where('jenis_kode','=','SCPR')->delete();
        return redirect()->back()->with('success','Data filter SCPR sudah dihapus!');
    }

    public function delCvrtLSPR()
    {
        DB::table('tbl_convert_sc_ls')->where('jenis_kode','=','LSPR')->delete();
        return redirect()->back()->with('success','Data filter LSPR sudah dihapus!');
    }

    public function delCvrtSCMM()
    {
        DB::table('tbl_convert_sc_ls')->where('jenis_kode','=','SCMM')->delete();
        return redirect()->back()->with('success','Data filter SCMM sudah dihapus!');
    }

    public function delCvrtLSMM()
    {
        DB::table('tbl_convert_sc_ls')->where('jenis_kode','=','LSMM')->delete();
        return redirect()->back()->with('success','Data filter LSMM sudah dihapus!');
    }

    public function delCvrtSCST()
    {
        DB::table('tbl_convert_sc_ls')->where('jenis_kode','=','SCST')->delete();
        return redirect()->back()->with('success','Data filter SCST sudah dihapus!');
    }

    public function delCvrtLSST()
    {
        DB::table('tbl_convert_sc_ls')->where('jenis_kode','=','LSST')->delete();
        return redirect()->back()->with('success','Data filter LSST sudah dihapus!');
    }

    //End here delete data filter V1.0

    /**
     *Start Count Import Filter V2.0
     */

     public function removeDataV2_0()
     {
         $data = array(
            'SCPRImport'          => count(\App\Models\TblImportScLsTlp::where('kode','SCPR')->get()),
            'SCPRFilter'          => count(\App\Models\TblFilterScLs::where('kode','SCPR')->get()),
            'LSPRImport'          => count(\App\Models\TblImportScLsTlp::where('kode','LSPR')->get()),
            'LSPRFilter'          => count(\App\Models\TblFilterScLs::where('kode','LSPR')->get()),
            'SCMMImport'          => count(\App\Models\TblImportScLsTlp::where('kode','SCMM')->get()),
            'SCMMFilter'          => count(\App\Models\TblFilterScLs::where('kode','SCMM')->get()),
            'LSMMImport'          => count(\App\Models\TblImportScLsTlp::where('kode','LSMM')->get()),
            'LSMMFilter'          => count(\App\Models\TblFilterScLs::where('kode','LSMM')->get()),
            'SCSTImport'          => count(\App\Models\TblImportScLsTlp::where('kode','SCST')->get()),
            'SCSTFilter'          => count(\App\Models\TblFilterScLs::where('kode','SCST')->get()),
            'LSSTImport'          => count(\App\Models\TblImportScLsTlp::where('kode','LSST')->get()),
            'LSSTFilter'          => count(\App\Models\TblFilterScLs::where('kode','LSST')->get()),
            'TPMIImport'          => count(\App\Models\TblUploadScLsTlp::where('kode','TPMI')->get()),            
            'totalDataImport'     => count(\App\Models\TblImportScLsTlp::all()) + count(\App\Models\TblUploadScLsTlp::where('kode','TPMI')->get()),
            'totalDataFilter'     => count(\App\Models\TblFilterScLs::all()),
         );
        return view('services.admin.TruncateTables_V20', $data);
     }

     /**
      * Start Import here
      */
    public function delImportSCPRV20()
    {
        \App\Models\TblImportScLsTlp::where('kode','=','SCPR')->delete();
        return redirect()->back()->with('success','Data upload SCPR sudah dihapus!!!');
    }

    public function delImportLSPRV20()
    {
        \App\Models\TblImportScLsTlp::where('kode','=','LSPR')->delete();
        return redirect()->back()->with('success','Data upload LSPR sudah dihapus!!!');
    }

    public function delImportSCMMV20()
    {
        \App\Models\TblImportScLsTlp::where('kode','=','SCMM')->delete();
        return redirect()->back()->with('success','Data upload SCMM sudah dihapus!!!');
    }

    public function delImportLSMMV20()
    {
        \App\Models\TblImportScLsTlp::where('kode','=','LSMM')->delete();
        return redirect()->back()->with('success','Data upload LSMM sudah dihapus!!!');
    }

    public function delImportSCSTV20()
    {
        \App\Models\TblImportScLsTlp::where('kode','=','SCST')->delete();
        return redirect()->back()->with('success','Data upload SCST sudah dihapus!!!');
    }

    public function delImportLSSTV20()
    {
        \App\Models\TblImportScLsTlp::where('kode','=','LSST')->delete();
        return redirect()->back()->with('success','Data upload LSST sudah dihapus!!!');
    }

    public function delImportTPMIV20()
    {
        \App\Models\TblImportScLsTlp::where('kode','=','TPMI')->delete();
        return redirect()->back()->with('success','Data upload TPMI sudah dihapus!!!');
    }

    /**
     * End Import here
     */

     private function truncateImportV20()
     {
         \App\Models\TblImportScLsTlp::truncate();
     }

     private function truncateFilterV20()
     {
         \App\Models\TblFilterScLs::truncate();
     }

     public function deleteAllImportFilterV20()
     {
         $this->truncateImportV20();
         $this->truncateFilterV20();
         $this->delUpldTPMI();
         return redirect()->back()->with('success','Data Sudah dibersihkan!!!');
     }

    public function delFilterSCPRV20()
    {
        \App\Models\TblFilterScLs::where('kode','=','SCPR')->delete();
        return redirect()->back()->with('success','Data filter SCPR sudah dihapus!');
    }

    public function delFilterLSPR20()
    {
        \App\Models\TblFilterScLs::where('kode','=','LSPR')->delete();
        return redirect()->back()->with('success','Data filter LSPR sudah dihapus!');
    }

    public function delFilterSCMM20()
    {
        \App\Models\TblFilterScLs::where('kode','=','SCMM')->delete();
        return redirect()->back()->with('success','Data filter SCMM sudah dihapus!');
    }

    public function delFilterSMM20()
    {
        \App\Models\TblFilterScLs::where('kode','=','LSMM')->delete();
        return redirect()->back()->with('success','Data filter LSMM sudah dihapus!');
    }

    public function delFilterSCST20()
    {
        \App\Models\TblFilterScLs::where('kode','=','SCST')->delete();
        return redirect()->back()->with('success','Data filter SCST sudah dihapus!');
    }

    public function delFilterLSST20()
    {
        \App\Models\TblFilterScLs::where('kode','=','LSST')->delete();
        return redirect()->back()->with('success','Data filter LSST sudah dihapus!');
    }
}