<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function parts()
    {
        return $this->belongsToMany(Part::class, 'tag_part');
    }
}
