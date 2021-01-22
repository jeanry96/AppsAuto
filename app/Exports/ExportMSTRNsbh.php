<?php

namespace App\Exports;

use App\Models\TblAccount;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, WithEvents, ShouldAutoSize};
use DB;

class ExportMSTRNsbh implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TblAccount::select('id', 'account_nas','nama_nasabah','telp_a','telp_b')->get();
    }

    public function headings(): array
    {
        return [
            'NO','REKENING','NAMA NASABAH','KONTAK 1','KONTAK 2'
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
