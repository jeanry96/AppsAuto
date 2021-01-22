<?php

namespace App\Exports;

use App\Models\{TblConvertSCLS,TblKios,TblAccount};
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, ShouldAutoSize, WithEvents};
use Maatwebsite\Excel\Events\AfterSheet;
use DB;

class ExportLSPR implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pipe = '|';
        $export = DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->join('tbl_convert_sc_ls','tbl_sc_ls_tlp.ls','=','tbl_convert_sc_ls.references')->select('jenis_kode','account_nas','nominal','signs',DB::RAW("CONCAT(ls,'$pipe',LEFT(nama_nasabah,7))"))->distinct('references')->where('jenis_kode','LSPR')->orderBy('ls')->get();
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
                        'font'  => [
                            'bold'      => true,
                            // 'undeline'  => true,
                            // 'italic'    => true,
                        ],
                    ],
                );
            }
        ];
    }
}
