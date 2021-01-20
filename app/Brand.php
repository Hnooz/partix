<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];
    protected $with = ['cars'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
