<?php

namespace App\Exports\V20;

use App\Models\TblFilterScLs;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportsLSST implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TblFilterScLs::all();
    }
}
