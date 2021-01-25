<?php

namespace App\Imports;

use App\Car;
use Maatwebsite\Excel\Concerns\ToModel;

class CarsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Car([
            'brand' => $row[0],
            'brand_ar' => $row[1],
            'model' => $row[2],
            'model_ar' => $row[3],
            'engine' => $row[4],
            'engine_ar' => $row[5],
            'year' => $row[6],
            'brand_id' => $row[7],
            'created_at' => $row[8],
        ]);
    }
}
