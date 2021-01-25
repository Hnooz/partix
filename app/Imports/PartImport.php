<?php

namespace App\Imports;

use App\Part;
use Maatwebsite\Excel\Concerns\ToModel;

class PartImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Part([
            'name' => $row[0],
            'name_ar' => $row[1],
            'description' => $row[2],
            'description_ar' => $row[3],
            'number' => $row[4],
            'oem_price' => $row[5],
            'aftermarket_price' => $row[6],
            'used_price' => $row[7],
            'sale' => $row[8],
            'supplier_id' => $row[9],
            'part_type_id' => $row[10],
            'category_id' => $row[11],
            'created_at' => $row[12],
        ]);
    }
}
