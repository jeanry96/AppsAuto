<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\{UploadTelpon, UploadScLsTlp, UploadScLs};
use Excel;

class ImportController extends Controller
{
    public function newTask()
    {
        return view('services.admin.TaskImport');
    }

    public function newTelpon()
    {
        return view('services.admin.NewTelpon');
    }
    public function importTelpon(Request $request)
    {
        $this->validate($request,[
            'file-upload'       => 'required|mimes:xls,xlsx',
        ]);

        if($request->hasFile('file-upload'))
        {
            $file = $request->file('file-upload')->store('import');
            Excel::import(new UploadTelpon, $file);
            return redirect()->back()->with('success','Conragulation, You has been success import data of excel!!!');
        }

        return redirect()->back()->with('error', 'You must be choose file excel to import!!!');
    }

    public function newSC()
    {
        return view('services.admin.NewSC');
    }

    public function importSC(Request $request)
    {
        $this->validate($request,[
            'file-upload'       => 'required|mimes:xlsx,xls'
        ]);

        if($request->hasFile('file-upload'))
        {
            $file = $request->file('file-upload')->store('import');
            $import = Excel::import(new UploadScLsTlp, $file);
            //$import->failures();
            return redirect()->back()->with('success','You has been success upload data from excel');
        }
        return redirect()->back()->with('error','You must choose data upload with format Excel (xls, xlsx');
    }

    public function newImportSCLS_V2_0()
    {
        return view('services.admin.Import.ImportScLs_V2');
    }

    public function ImportSCLS_V2_0(Request $request)
    {
        $this->validate($request,[
            'file-upload'       => 'required|mimes:xlsx,xls'
        ]);

        if($request->hasFile('file-upload'))
        {
            $file = $request->file('file-upload')->store('import');
            $import = Excel::import(new \App\Imports\ImportScLs, $file);
            return redirect()->back()->with('success','You has been success upload data from excel');
        }
        return redirect()->back()->with('error','You must choose data upload with format Excel (xls, xlsx');
    }

}
