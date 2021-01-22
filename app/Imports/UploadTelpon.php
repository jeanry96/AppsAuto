<?php

namespace App\Imports;

use App\Models\TblUploadTelpon;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\{
    ToModel,
    Importable,
    WithHeadingRow,
    WithValidation,
    SkipsErrors, 
    SkipsOnError,
    WithMultipleSheets,
};
use Throwable;

use Carbon\Carbon;

class UploadTelpon implements ToModel, WithHeadingRow, SkipsOnError
{
    use Importable, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TblUploadTelpon([
            'kode'              => $row['kode'],
            'sign'              => $row['sign'],
            'pstn'              => $row['telpon'],
            'tagihan'           => $row['tagihan'],
        ]);
    }

    public function rules(): array
    {
        return [
            'kode'      =>Rule::in(['TPMI.nl']),
            'sign'      =>Rule::in(['-.nl']),
        ];
    }

    public function onError(\Throwable $error)
    {
    }
}
