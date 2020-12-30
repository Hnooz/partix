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
        // $part = Part::where('id', $row[0])->get();
        // dd($part);
        return new Part([
            'name' => $row[1],
            'name_ar' => $row[2],
            'description' => $row[3],
            'description_ar' => $row[4],
            'number' => $row[5],
            'price' => $row[6],
            'second_price' => $row[7],
            'sale' => $row[8],
            
            'supplier_id' => $row[9],
            'part_type_id' => $row[10],
            'category_id' => $row[11],
            'created_at' => $row[12],
            'updated_at' => $row[13],
            // 'cars' => $row[14],
            // 'brand_id' => $row[14],
        ]);
    }
}
