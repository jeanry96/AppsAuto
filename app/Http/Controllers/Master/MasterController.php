<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;
use Validate;
use DataTables;
use App\Models\{TblTelpon,TblAccount, TblKios, TblPengelola, User};

class MasterController extends Controller
{

    public function formMstrScLsTlpIsrt($id)
    {
        $data  = TblAccount::where('id',$id)->get();
        return view('services.admin.MstrScLsTlpFormIsrt',compact('data'));
    }

    public function createAutodebet(Request $request)
    {
        $this->validate($request,[
            'account_member'   => 'required|max: 10,min:10',
        ]);

        TblKios::create([
            'account'       => $request->input('account_member'),
            'sc'            => $request->input('kode_sc'),
            'ls'            => $request->input('kode_ls'),
            'telpon'        => $request->input('kode_tlp'),
        ]);

        return redirect('master/scls/telp')->with('success','Data berhasil ditambahkan');
    }

    public function MstrScLsTelpon(Request $request)
    {
        $search = $request->search;
        $MstrScLsTlp = DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('id_sc_ls_tlp','nama_nasabah','account_nas','sc','ls','telpon')->orderBy('id_sc_ls_tlp','ASC')->get();
        $data = array(
            'count'     => count($MstrScLsTlp),
            'mstrsclstlp'    => DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('id_sc_ls_tlp','nama_nasabah','account_nas','sc','ls','telpon')->orderBy('id_sc_ls_tlp','ASC')->select('tbl_nasabah.*','tbl_sc_ls_tlp.*')->where('account','LIKE',"%".$search."%")->orWhere('account_nas','LIKE',"%".$search."%")->orWhere('nama_nasabah','LIKE',"%".$search."%")->orWhere('sc','LIKE',"%".$search."%")->orWhere('ls','LIKE',"%".$search."%")->orWhere('telpon','LIKE',"%".$search."%")->get(),
        );
        return view('services.admin.MstrScLsTlp',$data);
    }

    public function customerAutodebet()
    {
        $MstrScLsTlp = DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('id_sc_ls_tlp','nama_nasabah','account_nas','sc','ls','telpon')->orderBy('id_sc_ls_tlp','ASC')->get();
        $data = array(
            'count'     => count($MstrScLsTlp),
            'data'    => DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('id_sc_ls_tlp','nama_nasabah','account_nas','sc','ls','telpon')->orderBy('id_sc_ls_tlp','ASC')->get(),
        );
        return view('services.admin.Customers.CustomerAutodebet',$data);
    }

    public function MstrScLsTlpPdf()
    {
        $selectData = User::all(); 
        view()->share('test',$selectData);
        
        //DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('id_sc_ls_tlp','nama_nasabah','account_nas','sc','ls','telpon')->orderBy('id_sc_ls_tlp','ASC')->select('tbl_nasabah.*','tbl_sc_ls_tlp.*')->get();
            $pdf = PDF::loadView('services.admin.pdf.MstrScLsTlpPdf',$selectData);
        return $pdf->download('Report-Autodebet.pdf');
    }

    public function printMstrScLsTlp(Request $request)
    {
        $retrieve = DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select(['id_sc_ls_tlp','nama_nasabah','account_nas','sc','ls','telpon'])->orderBy('nama_nasabah','ASC')->select('tbl_nasabah.*','tbl_sc_ls_tlp.*')->get();
        $data = array(
            'count'     => count($retrieve),
            'data'      => $retrieve,
        );
        return view('services.admin.Print.MstrScLsTlpPrint', $data);
    }

    public function MstrDbtEdit($id)
    {
        $data = DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','tbl_nasabah.account_nas')->where('id_sc_ls_tlp',$id)->get();
        return view('services.Update.UpdateMstrScLsTlp', compact('data'));
    }

    public function MstrtDbtUpdate(Request $request)
    {
        TblKios::where('id_sc_ls_tlp',$request->id)->update(
            [
                'sc'        => $request->kodeSC,
                'ls'        => $request->kodeLS,
                'telpon'    => $request->pstn,
            ]
        );

        return redirect('/mstr-sc-ls-tlp')->with('success','Data Autodebet Berhasil di Update');
    }

    public function DltMstrScLsTlp($id)
    {
        $dlt = DB::table('tbl_sc_ls_tlp')->where('id_sc_ls_tlp', $id);
        if(!empty($dlt))
        {
            $dlt->delete();
            $msg=[
                'success'       =>'Data sudah berhasil dihapus!!!',
            ];
            return redirect('master/scls/telp')->with($msg);
        }

        else
        {
            $msg = [
                'error'       => 'Data Gagal dihapus, mungkin terjadi kesalahan!!!',
            ];
            return redirect('master/scls/telp')->with($msg);
        }
    }


    public function nasabah(\Illuminate\Http\Request $request)
    {
        $searchData = $request->search;
        $nasabah=array(
            'count'     =>  TblAccount::count(),
            'account'   =>  TblAccount::all(),//select('id','account_nas','nama_nasabah','telp_a','telp_b')->where('id','LIKE',"%".$searchData."%")->orWhere('account_nas','LIKE',"%".$searchData."%")->orWhere('nama_nasabah','LIKE',"%".$searchData."%")->orWhere('telp_a','LIKE',"%".$searchData."%")->orWhere('telp_b','LIKE',"%".$searchData."%")->orderBy('id')->paginate(4),
            //'account'   =>  TblAccount::select('id','account_nas','nama_nasabah','telp_a','telp_b')->where('id','LIKE',"%".$searchData."%")->orWhere('account_nas','LIKE',"%".$searchData."%")->orWhere('nama_nasabah','LIKE',"%".$searchData."%")->orWhere('telp_a','LIKE',"%".$searchData."%")->orWhere('telp_b','LIKE',"%".$searchData."%")->orderBy('id')->paginate(4),
        );
        return view('services.admin.MasterNasabah', $nasabah);
    }

    public function Customer()
    {
        $data = array(
            'count'     => TblAccount::count(),
            'customer'  => TblAccount::all(),
        );

        return view('services.admin.Customers.Customer',$data);
    }

    public function MstrNsbhEdt($id)
    {
        $data = TblAccount::where('id', $id)->get();
        return view('services.Update.UpdateMstrNasabah', ['data' => $data]);
    }

    public function MstrAccUpdt(Request $request)
    {
        $this->validate($request,
        [
            'name'          => 'required|min:3, max 30',
            'contact1'      => 'min:11, max:13',
            'contact2'      => 'min:8, max:10'
        ]);
        TblAccount::where('id',$request->id)->update([
            'nama_nasabah'  => $request->name,
            'telp_a'        => $request->contact1,
            'telp_b'        => $request->contact2
        ]);
        return redirect('/master/account')->with('success','Data Nasabah berhasil di ubah!');
    }

    public function destroy($id)
    {
        $data = TblAccount::where('id', $id)->first()->delete();
        return redirect('/master/account')->with('success','Data sudah dihapus');
    }


    public function infoDetailNasabah($id)
    {
        $data = TblAccount::where('id',$id)->get();
        return view('services.Detail.MstrInfoDetailNsbh', compact('data'));
    }

    public function pengelola()
    {
        $pengelola = DB::table('tbl_pengelola')->join('tbl_nasabah','tbl_pengelola.account','=','tbl_nasabah.account_nas')->select('id_p','account','kode_pengelola','nama_nasabah','keterangan')->orderBy('id_p')->get();
        $data=array(
            'count'     => count($pengelola),
            'pengelola' =>$pengelola,
        );
        //$pengelola=DB::table('tblpengelola')->get();
        return view('services.admin.MasterPengelola',$data);
    }

    public function users()
    {
        $user = User::get();
        $data = array(
            'count'        => count($user),
            'data'         => User::get(),
        );

        return view('services.admin.MasterUsers',$data);
    }

    public function profileUser($id)
    {
        $user = User::where('id',$id)->get();
        return view('services.admin.ProfileUser', ['data'   => $user]);
    }

    public function usersStatus(Request $request)
    {
        \Log::info($request->all());
        $data = User::find($request->user_id);
        $data->role = $request->role;
        $data->save();

        return response()->json(['success'=>'Has been active now!']);
    }
}
