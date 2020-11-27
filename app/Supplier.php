<?php

namespace App;

use App\Part;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [];

    public function part()
    {
        return $this->hasMany(Part::class);
    }
}
