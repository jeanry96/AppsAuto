<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use DB;
use View;
use Auth;
use App\Models\{TblUploadScLsTlp, TblUploadTelpon, TblConvertSCLS, TblAccount, TblKios, User, TblImportScLsTlp, TblFiltercLsTlp};

class ControllController extends Controller
{
    public function index()
    {
        return view('services.home');
    }
    public function welcome()
    {   
        $data = array(
            'nasabah'           => count(TblAccount::all()),
            'autodebet'         => count(DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('id_sc_ls_tlp','nama_nasabah','account_nas','sc','ls','telpon')->orderBy('id_sc_ls_tlp','ASC')->get()),
            'importScLsTlp'     => count(TblImportScLsTlp::all()) + TblUploadTelpon::where('kode','TPMI')->count(),
            'exportScLsTlp'     => count(DB::table('tbl_filter_sc_ls')->join('tbl_sc_ls_tlp','tbl_filter_sc_ls.referensi','=','tbl_sc_ls_tlp.sc')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('kode','account','nominal','sign',DB::RAW("CONCAT(sc,'-',LEFT(nama_nasabah,6))"))->distinct('sc')->whereIn('kode',['SCMM','SCPR','SCST'])->orderBy('kode')->get()) + count(DB::table('tbl_filter_sc_ls')->join('tbl_sc_ls_tlp','tbl_filter_sc_ls.referensi','=','tbl_sc_ls_tlp.ls')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('kode','account','nominal','sign',DB::RAW("CONCAT(ls,'-',LEFT(nama_nasabah,6))"))->whereIn('kode',['LSMM','LSPR','LSST'])->distinct('ls')->get()) + count(DB::table('tbl_upload_sc_ls_tlps')->join('tbl_sc_ls_tlp','tbl_upload_sc_ls_tlps.pstn','=','tbl_sc_ls_tlp.telpon')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('kode','account','tagihan','sign',DB::RAW("CONCAT(telpon,'/',LEFT(nama_nasabah,5))"))->distinct()->where('kode','TPMI')->orderBy('telpon')->get()),
        );
        return view('services.small_box', $data);
    }

    public function newPopulate()
    {
        return view('services.admin.MstrNsbhIsrt');
    }

    public function MstrNsbhEdt()
    {
        return view('services.admin.MstrNsbhUpdt');
    }

    public function store(Request $request)
    {
       
        $this->validate($request,[
            'account_member'    => 'required|min:10,max:10',
            'member_name'       => 'required|string',
        ]);

        TblAccount::create(
            [
                'account_nas'   => $request->input('account_member'),
                'nama_nasabah'  => $request->input('member_name'),
                'telp_a'        => $request->input('hp_wa'),
                'telp_b'        => $request->input('telp'),
            ]);

        return redirect('add/account/autodebet')->with('success', 'Data Sudah berhasil ditambahkan');
    }

    public function searchNasabah(Request $request)
    {
        $req = $request->searching;
        
        $cari = TblAccount::where('id','LIKE',"%".$req."%")->orWhere('account_nas','LIKE',"%".$req."%")->orWhere('nama_nasabah','LIKE',"%".$req."%")->get();
        return View('services.admin.MstrScLsTlpSearch')->with('cari',$cari);
    }

    //Dipslay Data upload
    public function displayDataUploadSCLS_V1_0()
    {
        $counts = TblUploadScLsTlp::select('kode')->whereIn('kode',['SCPR','LSPR','SCMM','LSMM','SCST','LSST'])->get();
        $data = array(
            'count'     => count($counts),
            'data'      => DB::table('tbl_upload_sc_ls_tlps')->select('kode','sign','lantai','kios','tagihan')->whereIn('kode',['SCPR','LSPR','SCMM','LSMM','SCST','LSST'])->orderBy('id')->get(),
        );
        return view('services.admin.ViewSCLS_V1', $data);
    }

    public function displayDataUploadSCLS_V2_0()
    {
        
        $data =  array(
            'count'     => DB::table('tbl_import_sc_ls_tlps')->select('kode','sign','floor','block','kios', 'tagihan')->wherein('kode',['SCPR','LSPR','SCMM','LSMM','SCST','LSST'])->count(),
            'selects'   => DB::table('tbl_import_sc_ls_tlps')->select('id','kode','sign','floor','block','kios', 'tagihan')->wherein('kode',['SCPR','LSPR','SCMM','LSMM','SCST','LSST'])->orderBy('id')->get(),
        );
        return view('services.admin.ViewSCLS_V2',$data);
    }

    public function EditDataImportV2($id)
    {
        $data = TblImportScLsTlp::where('id',$id)->get();
        return view('services.Update.UpdateImportV2', compact('data'));
    }

    public function UpdateDataImportV2(Request $request)
    {
        TblImportScLsTlp::where('id',$request->id)->update([
            'kode'      =>$request->kode,
            'sign'      =>$request->sign,
            'floor'     =>$request->lantai,
            'block'     =>$request->block,
            'kios'      =>$request->kios,
            'tagihan'   =>$request->nominal,
        ]);
        return redirect('display/data/import/scls')->with('success','Data berhasil diubah');
    }

    public function displayDataUploadTelpon()
    {
        $counts = TblUploadTelpon::all()->where('kode','TPMI')->where('sign','-');

        $data = array(
            'count' => count($counts),
            'data'  => DB::table('tbl_upload_sc_ls_tlps')->where('kode','TPMI')->where('sign','-')->get(),
        );
        return view('services.admin.viewTelpon',$data);
    }

    /**
     * Filtering Data Upload SCLS
     */
    public function displyDataFilters_V1_0()
    {
        $count = DB::table('tbl_convert_sc_ls')->join('tbl_sc_ls_tlp','tbl_convert_sc_ls.references','tbl_sc_ls_tlp.sc')->join('tbl_nasabah','tbl_sc_ls_tlp.account','tbl_nasabah.account_nas')->select('jenis_kode','account','nominal','signs',DB::RAW("CONCAT(references,'-',LEFt(nama_nasabah,5)) AS Referensi"))->distinct()->select('tbl_sc_ls_tlp.*','tbl_nasabah.*','tbl_convert_sc_ls.*')->get();
        $data = array(
            'count'     => count($count),
            'data1'      => DB::table('tbl_convert_sc_ls')->join('tbl_sc_ls_tlp','tbl_convert_sc_ls.references','tbl_sc_ls_tlp.sc')->join('tbl_nasabah','tbl_sc_ls_tlp.account','tbl_nasabah.account_nas')->select('jenis_kode','account','nominal','signs',DB::RAW("CONCAT(references,'-',LEFt(nama_nasabah,5)) AS Referensi"))->orderBy('sc')->distinct()->select('tbl_sc_ls_tlp.*','tbl_nasabah.*','tbl_convert_sc_ls.*')->get(),
        );

        return view('services.admin.ViewDataFilter_V1_0', $data);
    }

    public function filterDataSCLS_V1_0()
    {
        $this->SCMM_V1_0();
        $this->SCPR_V1_0();
        $this->SCST_V1_0();
        $this->LSMM_V1_0();
        $this->LSPR_V1_0();
        $this->LSST_V1_0();

        return redirect('display-data-filter-v1-0')->with('success','Data Has been success filtering.');
    }
    
    private function SCMM_V1_0()
    {
        $scmm = DB::table('tbl_upload_sc_ls_tlps')->select('kode','sign','tagihan',DB::RAW("CONCAT(lantai,kios) AS Referensi"))->where('kode','SCMM')->where('sign','-')->get();
        foreach($scmm as $ubah)
        {
    
            DB::table('tbl_convert_sc_ls')->insert([
                'jenis_kode'    => $ubah->kode,
                'signs'         => $ubah->sign,
                'nominal'       => $ubah->tagihan,
                'references'    => $ubah->Referensi,
            ]);
        }
    }

    private function SCPR_V1_0()
    {
        $scpr = DB::table('tbl_upload_sc_ls_tlps')->select('kode','sign','tagihan',DB::RAW("CONCAT(lantai,kios) AS Referensi"))->where('kode','SCPR')->where('sign','-')->get();
        foreach($scpr as $ubah){
            DB::table('tbl_convert_sc_ls')->insert([
                'jenis_kode'    => $ubah->kode,
                'signs'         => $ubah->sign,
                'nominal'       => $ubah->tagihan,
                'references'    => $ubah->Referensi,
            ]);
        }
    }

    private function SCST_V1_0()
    {
        $scst = DB::table('tbl_upload_sc_ls_tlps')->select('kode','sign','tagihan',DB::RAW("CONCAT(lantai,kios) AS Referensi"))->where('kode','SCST')->where('sign','-')->get();
        foreach($scst as $ubah){
            DB::table('tbl_convert_sc_ls')->insert([
                'jenis_kode'    => $ubah->kode,
                'signs'         => $ubah->sign,
                'nominal'       => $ubah->tagihan,
                'references'    => $ubah->Referensi,
            ]);
        }
    }

    private function LSMM_V1_0()
    {
        $lsmm = DB::table('tbl_upload_sc_ls_tlps')->select('kode','sign','tagihan',DB::RAW("CONCAT(lantai,kios) AS Referensi"))->where('kode','LSMM')->where('sign','-')->get();
        foreach($lsmm as $ubah){
            DB::table('tbl_convert_sc_ls')->insert([
                'jenis_kode'    => $ubah->kode,
                'signs'         => $ubah->sign,
                'nominal'       => $ubah->tagihan,
                'references'    => $ubah->Referensi,
            ]);
        }
    }

    private function LSPR_V1_0()
    {
        $lspr = DB::table('tbl_upload_sc_ls_tlps')->select('kode','sign','tagihan',DB::RAW("CONCAT(lantai,kios) AS Referensi"))->where('kode','LSPR')->where('sign','-')->get();
        foreach($lspr as $ubah){
            DB::table('tbl_convert_sc_ls')->insert([
                'jenis_kode'    => $ubah->kode,
                'signs'         => $ubah->sign,
                'nominal'       => $ubah->tagihan,
                'references'    => $ubah->Referensi,
            ]);
        }
    }

    private function LSST_V1_0()
    {
        $lsst = DB::table('tbl_upload_sc_ls_tlps')->select('kode', 'sign', 'tagihan',DB::RAW("CONCAT(lantai,kios) AS Referensi"))->where('kode','LSST')->where('sign','-')->get();
        foreach($lsst as $ubah){
            DB::table('tbl_convert_sc_ls')->insert([
                'jenis_kode'    => $ubah->kode,
                'signs'         => $ubah->sign,
                'nominal'       => $ubah->tagihan,
                'references'    => $ubah->Referensi,
            ]);
        }
    }


    public function filterDataSCLS_V2_0()
    {
        $this->SCMM_V2_0();
        $this->SCPR_V2_0();
        $this->SCST_V2_0();
        $this->LSMM_V2_0();
        $this->LSPR_V2_0();
        $this->LSST_V2_0();
        return redirect('display/data/filter')->with('success','Data Has been success filtering.');
    }

    public function displyDataFilters_V2_0( \Illuminate\Http\Request $request)
    {
        $search = $request->search;
        $count = \App\Models\TblFilterScLs::join('tbl_sc_ls_tlp','tbl_filter_sc_ls.referensi','tbl_sc_ls_tlp.sc')->join('tbl_nasabah','tbl_sc_ls_tlp.account','tbl_nasabah.account_nas')->select('kode','account','nominal','sign',DB::RAW("CONCAT(referensi,'-',LEFt(nama_nasabah,5)) AS Referensi"))->select('tbl_sc_ls_tlp.*','tbl_nasabah.*','tbl_filter_sc_ls.*')->count();
        $data = array(
            'count'     => $count,
            'data'      => \App\Models\TblFilterScLs::join('tbl_sc_ls_tlp','tbl_filter_sc_ls.referensi','=','tbl_sc_ls_tlp.sc')->join('tbl_nasabah','tbl_sc_ls_tlp.account','tbl_nasabah.account_nas')->select('kode','account','nominal','sign',DB::RAW("CONCAT(referensi,'-',LEFt(nama_nasabah,5)) AS Referensi"))->where('kode','LIKE',"%".$search."%")->orWhere('account_nas','LIKE',"%".$search."%")->orWhere('account','LIKE',"%".$search."%")->orWhere('nama_nasabah','LIKE',"%".$search."%")->orWhere('sc','LIKE',"%".$search."%")->orWhere('ls','LIKE',"%".$search."%")->orWhere('telpon','LIKE',"%".$search."%")->orderBy('sc')->select('tbl_sc_ls_tlp.*','tbl_nasabah.*','tbl_filter_sc_ls.*')->get(),
        );
        return view('services.admin.viewDataFilter_V2_0',$data);
    }

    private function SCMM_V2_0()
    {
        $scmm  = DB::table('tbl_import_sc_ls_tlps')->select('kode','sign','tagihan',DB::RAW("CONCAT(floor,'/',block,kios) AS Referensi"))->where('kode','SCMM')->where('sign','-')->get();
        foreach($scmm as $filter)
        {
            \App\Models\TblFilterScLs::insert([
                'kode'          => $filter->kode,
                'sign'          => $filter->sign,
                'referensi'     => $filter->Referensi,
                'nominal'       => $filter->tagihan,
            ]);
        }
    }

    private function SCPR_V2_0()
    {
        $scpr = DB::table('tbl_import_sc_ls_tlps')->select('kode','sign','tagihan',DB::RAW("CONCAT(floor,'/',block,kios) AS Referensi"))->where('kode','SCPR')->where('sign','-')->get();
        foreach($scpr as $filter)
        {
            \App\Models\TblFilterScLs::insert([
                    'kode'          => $filter->kode,
                    'sign'          => $filter->sign,
                    'referensi'     => $filter->Referensi,
                    'nominal'       => $filter->tagihan,
            ]);
        }
    }
    
    private function SCST_V2_0()
    {
        $scst = DB::table('tbl_import_sc_ls_tlps')->select('kode','sign','tagihan',DB::RAW("CONCAT(floor,'/',block,kios) AS Referensi"))->where('kode','SCST')->where('sign','-')->get();
        foreach($scst as $filter)
        {
            \App\Models\TblFilterScLs::insert([
                    'kode'          => $filter->kode,
                    'sign'          => $filter->sign,
                    'referensi'     => $filter->Referensi,
                    'nominal'       => $filter->tagihan,
            ]);
        }
    }
    
    private function LSMM_V2_0()
    {
        $lsmm = DB::table('tbl_import_sc_ls_tlps')->select('kode','sign','tagihan',DB::RAW("CONCAT(floor,'/',block,kios) AS Referensi"))->where('kode','LSMM')->where('sign','-')->get();
        foreach($lsmm as $filter)
        {
            \App\Models\TblFilterScLs::insert([
                    'kode'          => $filter->kode,
                    'sign'          => $filter->sign,
                    'referensi'     => $filter->Referensi,
                    'nominal'       => $filter->tagihan,
            ]);
        }
    }
    
    private function LSPR_V2_0()
    {
        $lspr = DB::table('tbl_import_sc_ls_tlps')->select('kode','sign','tagihan',DB::RAW("CONCAT(floor,'/',block,kios) AS Referensi"))->where('kode','LSPR')->where('sign','-')->get();
        foreach($lspr as $filter)
        {
            \App\Models\TblFilterScLs::insert([
                    'kode'          => $filter->kode,
                    'sign'          => $filter->sign,
                    'referensi'     => $filter->Referensi,
                    'nominal'       => $filter->tagihan,
            ]);
        }
    }
    
    private function LSST_V2_0()
    {
        $lsst = DB::table('tbl_import_sc_ls_tlps')->select('kode','sign','tagihan',DB::RAW("CONCAT(floor,'/',block,kios) AS Referensi"))->where('kode','LSST')->where('sign','-')->get();
        foreach($lsst as $filter)
        {
            \App\Models\TblFilterScLs::insert([
                    'kode'          => $filter->kode,
                    'sign'          => $filter->sign,
                    'referensi'     => $filter->Referensi,
                    'nominal'       => $filter->tagihan,
            ]);
        }
    }
}
