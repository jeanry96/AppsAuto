<?php

namespace App\Exports;

use App\Models\{TblConvertSCLS,TblKios,TblAccount};
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, ShouldAutoSize};
use DB;

class ExportSCST implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $export = DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->join('tbl_convert_sc_ls','tbl_sc_ls_tlp.sc','=','tbl_convert_sc_ls.references')->select('jenis_kode','account_nas','nominal','signs',DB::RAW("CONCAT(sc,signs,LEFT(nama_nasabah,6))"))->distinct()->where('jenis_kode','SCST')->orderBy('sc')->get();
        return $export;
    }

    public function headings(): array
    {
        return [
            'KODE','REKENING','NOMINAL','SIGN','REFERENSI'
        ];
    }
}
