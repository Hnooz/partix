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
            'name' => $row[1],
            'description' => $row[2],
            'number' => $row[3],
            'price' => $row[4],
            'supplier_id' => $row[5],
            'created_at' => $row[6],
            'updated_at' => $row[7],
            'second_price' => $row[9],
            'category_id' => $row[10],
            'part_type_id' => $row[11],
            'sale' => $row[12],
            // 'brand_id' => $row[14],
        ]);
    }
}
