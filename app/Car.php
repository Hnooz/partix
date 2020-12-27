<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];
    
    public function parts()
    {
        return $this->belongsToMany(Part::class);
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
