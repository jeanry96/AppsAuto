<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{TblUploadTelpon,TblUploadListrik, TblUploadServiceCharge,TblPengelola};
use DB;
use Excel;
use App\Imports\{UploadTelpon,UploadSCPR,UploadLSPR, UploadSCST, UploadLSST, UploadSCMM, UploadLSMM};

class UploadController extends Controller
{
    public function blankUpload()
    {
        return view('services.admin.UploadBlank');
    }

    public function taskUpload()
    {
        $count=TblPengelola::all();
        $data = array(
            'scpr'   =>DB::table('tbl_pengelola')->join('tblnasabah','tbl_pengelola.account','=','tblnasabah.account_nas')->where('id',1)->get(),
            'lspr'   =>DB::table('tbl_pengelola')->join('tblnasabah','tbl_pengelola.account','=','tblnasabah.account_nas')->where('id',2)->get(),
            'scst'   =>DB::table('tbl_pengelola')->join('tblnasabah','tbl_pengelola.account','=','tblnasabah.account_nas')->where('id',3)->get(),
            'lsst'   =>DB::table('tbl_pengelola')->join('tblnasabah','tbl_pengelola.account','=','tblnasabah.account_nas')->where('id',4)->get(),
            'scmm'   =>DB::table('tbl_pengelola')->join('tblnasabah','tbl_pengelola.account','=','tblnasabah.account_nas')->where('id',5)->get(),
            'lsmm'   =>DB::table('tbl_pengelola')->join('tblnasabah','tbl_pengelola.account','=','tblnasabah.account_nas')->where('id',6)->get(),
            'tpmi'   =>DB::table('tbl_pengelola')->join('tblnasabah','tbl_pengelola.account','=','tblnasabah.account_nas')->where('id',7)->get(),
            'count'  =>count($count),
        );
        return view('services.admin.ImportStart',$data);
    }

    public function pengelola()
    {
        $uploads = TblPengelola::select('id','kode_pengelola','keterangan')->where('id','=',7)->get();
        return view('services.admin.UploadTelpon',['uploads'   =>$uploads]);
    }

    public function uploadTelpon(Request $request)
    {
        $this->validate($request,
        [
            'file-upload'      => 'required|mimes:xls,xlsx'
            //'kodepengelola'    => 'required',
        ]);


        if($request->hasFile('file-upload'))
        {
            $file   = $request->file('file-upload'); //Menangkap fi[le
            Excel::import(new UploadTelpon, $file);//Mengimport file
            return redirect()->back()->with(['success'  => 'Sukses Upload Data Telpon Excel']);
        }

        return redirect()->back()->with(['error'    => 'Silahkan Pilih file terlebih dahulu']);

    }

    public function viewUploadListrik()
    {
        $uploads = DB::table('tbl_upload_listriks')->paginate(7);
        return view('services.admin.UploadListrik',['uploads'   => $uploads]);
    }

    public function viewUploadServiceCharge()
    {
        $uploads = DB::table('tbl_upload_service_charges')->paginate(7);
        return view('services.admin.UploadServiceCharge',['uploads' => $uploads]);
    }

    //Upload Service Charge
    public function SCPR()
    {
        return view('services.admin.UploadSCPPRS');
    }

    public function uploadSCPR(Request $request)
    {
        $this->validate($request,
        [
            'file-upload'      => 'required|mimes:xls,xlsx'
            //'kodepengelola'    => 'required',
        ]);


        if($request->hasFile('file-upload'))
        {
            $file   = $request->file('file-upload'); //Menangkap fi[le
            Excel::import(new UploadSCPR, $file);//Mengimport file
            return redirect()->back()->with(['success'  => 'Sukses Upload Data Service Charge Excel (PPRS)']);
        }

        return redirect()->back()->with(['error'    => 'Silahkan Pilih file terlebih dahulu']);

    }


    public function SCMM()
    {
        return view('services.admin.UploadSCSMM');
    }

    public function uploadSCMM(Request $request)
    {
        $this->validate($request,[
            'file-upload'   => 'required|mimes:xls,xlxs',
        ]);

        if($request->hasFile('file-upload'))
        {
            $file = $request->file('file-upload');
            Excel::import(new UploadSCMM, $file);
            return redirect()->back()->with('success','Berhasil Upload Data Excel (SCMM)');
        }

        return redirect()->back()->with(['error' => 'Silahkan pilih file terlebih!!!']);
    }

    public function SCST()
    {
        return view('services.admin.UploadSCSTAJ');
    }
    public function uploadSCST(Request $request)
    {
        $this->validate($request,
        [
            'file-upload'      => 'required|mimes:xls,xlsx'
            //'kodepengelola'    => 'required',
        ]);


        if($request->hasFile('file-upload'))
        {
            $file   = $request->file('file-upload'); //Menangkap fi[le
            Excel::import(new UploadSCST, $file);//Mengimport file
            return redirect()->back()->with(['success'  => 'Sukses Upload Data Service Charge Excel (STAJ)']);
        }

        return redirect()->back()->with(['error'    => 'Silahkan Pilih file terlebih dahulu']);

    }

    //Upload Data Listrik
    public function LSPR()
    {
        return view('services.admin.UploadLSPPRS');
    }

    public function uploadLSPR(Request $request)
    {
        $this->validate($request,
        [
            'file-upload'      => 'required|mimes:xls,xlsx'
            //'kodepengelola'    => 'required',
        ]);


        if($request->hasFile('file-upload'))
        {
            $file   = $request->file('file-upload'); //Menangkap fi[le
            Excel::import(new UploadLSPR, $file);//Mengimport file
            return redirect()->back()->with(['success'  => 'Sukses Upload Data Listrik Excel (PPRS)']);
        }

        return redirect()->back()->with(['error'    => 'Silahkan Pilih file terlebih dahulu']);

    }

    public function LSMM()
    {
        return view('services.admin.UploadLSSMM');
    }

    public function uploadLSMM(Request $request)
    {
        $this->validate($request,[
            'file-upload'   => 'required|mimes:xls,xlsx'
        ]);

        if($request->hasFile('file-upload'))
        {
            $file = $request->file('file-upload');
            Excel::import(new UploadLSMM, $file);
            return redirect()->back()->with('success','Berhasil Upload Data Excel (SCMM)');
        }

        return redirect()->back()->with('error','Silahkan pilih data excel terlebih dahulu untuk upload');
    }

    public function LSST()
    {
        return view('services.admin.UploadLSSTAJ');
    }

    public function uploadLSST(Request $request)
    {
        $this->validate($request,[
            'file-upload'   => 'required|mimes:xls,xlsx',
        ]);

        if($request->hasFile('file-upload'))
        {
            $file = $request->file('file-upload');
            Excel::import(new UploadLSST, $file);
            return redirect()->back()->with('success','Berhasil Mengupload Data Listrik Excel (STAJ)');
        }

        return redirect()->back()->with('error','Silahkan pilih file terlebih dahulu, Lalu di lanjutkan dengan "Start Upload"');
    }
}
