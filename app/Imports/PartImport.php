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
            'slug' => $row[4],
            'price' => $row[5],
            'car_id' => $row[6],
            'supplier_id' => $row[7],
            'created_at' => $row[8],
            'updated_at' => $row[9],
            'second_price' => $row[10],
            'category_id' => $row[11],
            'part_type_id' => $row[12],
            'sale' => $row[13],
            // 'brand_id' => $row[14],
        ]);
    }
}
