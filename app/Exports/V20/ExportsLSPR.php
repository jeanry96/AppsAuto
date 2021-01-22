<?php

namespace App\Exports\V20;

use App\Models\{TblFilterScLs, TblAccount, TblKios};
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportsLSPR implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TblFilterScLs::all();
    }
}
