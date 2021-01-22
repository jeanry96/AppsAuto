<?php

namespace App\Exports;

use App\Models\{TblAccount, TblKios};
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, WithEvents, ShouldAutoSize};
use Maatwebsite\Excel\Events\AfterSheet;
use DB;

class ExportMSTRAutoDBT implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('tbl_sc_ls_tlp')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('account','nama_nasabah','sc','ls','telpon')->get();
    }

    public function headings(): array
    {

        return [
            'REKENING','NAMA NASABAH','SERVICE CHARGE','LISTRIK','TELPON'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class=>function(AfterSheet $event){
                $event->sheet->getStyle('A1:E1')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                    ]
                ],
            );
            }
        ];
    }
}
