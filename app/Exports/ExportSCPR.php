<?php

namespace App\Exports;

use App\Models\{TblConvertSCLS, TblKios, TblAccount, TblLantai};
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, ShouldAutoSize, WithEvents};
use Maatwebsite\Excel\Events\AfterSheet;
use DB;

class ExportSCPR implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        // $export = DB::table('tbl_sc_listrik')->join('tbl_upload_data','tbl_sc_listrik.lantai','=','tbl_upload_data.floor')->select('kode','account','total_tagihan','sign',DB::RAW("CONCAT(lantai,kios,sign)"))->distinct()->get();
        $export = DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->join('tbl_convert_sc_ls','tbl_sc_ls_tlp.sc','=','tbl_convert_sc_ls.references')->select('jenis_kode','account_nas','nominal','signs',DB::RAW("CONCAT(sc,signs,LEFT(nama_nasabah,7))"))->distinct(['references'])->where('jenis_kode','SCPR')->orderBy('sc')->get();
        return $export;
    }

    public function headings(): array
    {
        return [
            'KODE','REKENING','NOMINAL','SIGN','REFERENSI'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event)
            {
                $event->sheet->getStyle('A1:E1')->applyFromArray(
                    [
                        'font'  =>
                        [
                            'bold'  => true,
                        ],
                    ],
                );
            }
        ];
    }
}
