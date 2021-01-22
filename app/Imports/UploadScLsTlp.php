<?php

namespace App\Imports;

use App\Models\TblUploadScLsTlp;
use Maatwebsite\Excel\Concerns\{
    ToModel,
    Importable,
    WithHeadingRow,
    WithValidation,
    WithBatchInserts,
    WithChunkReading,
    SkipsErrors, 
    SkipsOnError,
};
use Throwable;

class UploadScLsTlp implements ToModel, WithHeadingRow, SkipsOnError, WithBatchInserts, WithChunkReading
{
    use Importable, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TblUploadScLsTlp([
            'kode'      => $row['kode'],
            'sign'      => $row['sign'],
            'lantai'    => $row['lantai'],
            'kios'      => $row['kios'],
            'tagihan'   => $row['tagihan'],
        ]);
    }

    // public function headingRow(): int
    // {
    //     return 5;
    // }

    public function onError(Throwable $error)
    {
 
    }

    public function batchSize(): int
    {
        return 100000;
    }

    public function chunkSize(): int
    {
        return 100000;
    }
}
