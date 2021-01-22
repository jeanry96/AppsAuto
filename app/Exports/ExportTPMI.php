<?php

namespace App\Exports;

use App\Models\{TblUploadScLsTlp, TblAccount, TblTelpon};
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping, WithProperties};
use Maatwebsite\Excel\Events\AfterSheet;
use DB;

class ExportTPMI implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping, WithProperties
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $export = DB::table('tbl_upload_sc_ls_tlps')->join('tbl_sc_ls_tlp','tbl_upload_sc_ls_tlps.pstn','=','tbl_sc_ls_tlp.telpon')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('kode','account','tagihan','sign',DB::RAW("CONCAT(telpon,'/',LEFT(nama_nasabah,5)) AS Referensi"))->distinct()->where('kode','TPMI')->orderBy('telpon','asc')->get();
        return $export;
    }

    public function headings(): array
    {
        return [
            'KODE','REKENING','NOMINAL','SIGN','REFERENSI'
        ];
    }

    public function map($data):array
    {
        return array([
            $data->kode,
            $data->account,
            $data->tagihan,
            $data->sign,
            $data->Referensi,
        ]);
    }

    public function registerEvents(): array
    {
        return[
            AfterSheet::class => function(AfterSheet $event)
            {
                $event->sheet->getStyle('A1:E1')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                    ],
                ]);
            }
        ];
    }

    public function properties(): array
    {
        $lastPrinted = now();
        return [
            'creator'        => 'J M Mangngi',
            'lastModifiedBy' => 'PT. BPR Banksar Dana Loka',
            'title'          => 'Service Charge Export',
            'description'    => 'Latest Services Charge',
            'subject'        => 'Services Charge (Autodebet)',
            'keywords'       => 'service charge,export,spreadsheet',
            'category'       => 'SERVICES CHARGE (AUTODEBET)',
            'manager'        => 'FRANSISCUS HENDRA',
            'company'        => 'PT. BPR BANKSAR DANA LOKA',
            'lastPrinted'    => $lastPrinted,
            'digitalSigned'  => 'PT. BPR BDL',
        ];
    }

}
