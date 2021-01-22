<?php

namespace App\Exports\V20;

use App\Models\{TblAccount, TblFilterScLs, TblKios};
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, WithEvents, ShouldAutoSize, WithProperties, WithMapping};
use Maatwebsite\Excel\Events\AfterSheet;
use DB;

class ExportsAllLs implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize, WithProperties, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = DB::table('tbl_filter_sc_ls')->join('tbl_sc_ls_tlp','tbl_filter_sc_ls.referensi','=','tbl_sc_ls_tlp.ls')->join('tbl_nasabah','tbl_sc_ls_tlp.account','=','tbl_nasabah.account_nas')->select('kode','account','nominal','sign',DB::RAW("CONCAT(ls,'-',LEFT(nama_nasabah,6)) AS Referensi"))->distinct('ls')->whereIn('kode',['LSMM','LSPR','LSST'])->orderBy('kode','asc')->orderBy('account','asc')->get();
        
        return $data;
    }

    public function headings(): array
    {
        return ([
            'KODE','REKENING','NOMINAL','SIGN','REFERENSI'
        ]);
    }

    public function map($data): array
    {
        return [
            $data->kode,
            $data->account,
            $data->nominal,
            $data->sign,
            $data->Referensi,
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
                            'bold'          => true,
                            'family'        => 'tahoma',
                            'size'          => 12,
                            'color'         => [
                                'rgb'       => '040b7d'
                            ],
                        ],
                        'borders'   => [
                            'outline'   => [
                                'borderStyle'   => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color'         => ['argb'      => '282424'],
                            ],
                        ],
                    ],
                );
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
            'digitalSigned'  => 'PTBPRBDL',
        ];
    }
}
