<?php

namespace App\Imports;

use App\Tag;
use Maatwebsite\Excel\Concerns\ToModel;

class TagsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tag([
            'name' => $row[0],
            'name_ar' => $row[1],
        ]);
    }
}
