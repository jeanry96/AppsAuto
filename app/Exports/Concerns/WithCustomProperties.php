<?php

namespace App\Exports\Concerns;

use Maatwebsite\Excel\Concerns\FromCollection;

class WithCustomProperties implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }
}
