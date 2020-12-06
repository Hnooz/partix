<?php

namespace App\Exports;

use App\Part;
use Maatwebsite\Excel\Concerns\FromCollection;

class PartsExport implements FromCollection
{
    public function collection()
    {
        return Part::all();
    }
}
