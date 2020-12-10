<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperCategory extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
