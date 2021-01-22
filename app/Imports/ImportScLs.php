<?php

namespace App\Imports;

use App\Models\TblImportScLsTlp;
use Maatwebsite\Excel\Concerns\{
    ToModel, Importable, WithHeadingRow, SkipsOnFailure, SkipsFailures,SkipsOnError, SkipsErrors
};
use Illuminate\Support\Str;
use Throwable;

class ImportScLs implements ToModel, WithHeadingRow, SkipsOnFailure, SkipsOnError
{
        use Importable, SkipsFailures, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TblImportScLsTlp([
            'kode'      => $row['kode'],
            'sign'      => $row['sign'],
            'floor'     => Str::of($row['floor'])->trim(),
            'block'     => Str::of($row['block'])->trim(),
            'kios'      => $row['kios'],
            'tagihan'   => $row['tagihan'],
        ]);
    }

    public function onError(\Throwable $e)
    {
        
    }

    public function rules(): array
    {
        return[
            'kode'  => Rule::in(['SCMM.nl','SCPR.nl','SCST.nl','LSMM.nl','LSPR.nl','LSST.nl']),   
            'sign'  => Rule::in(['-.nl']),
        ];
    }

    public function customValidationAttributes()
    {
        return [
            'kode'     => 'kode',
            'sign'     => 'sign'
        ];
    }

    public function customValidationMessages()
    {
        return [
            'kode.in'  => 'Kode harus berupa kode: SCMM, SCPR, SCST, LSMM, LSPR, LSST.',
            'sign.in'  => 'Sign harus bertanda "-".',
        ];
    }
}
