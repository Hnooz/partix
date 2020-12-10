<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartType extends Model
{
    public function part()
    {
        return $this->hasMany(Part::class);
    }
}
