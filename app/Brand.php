<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];
    
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
