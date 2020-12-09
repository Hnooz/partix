<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable;

    protected $guarded = [];

    public function parts()
    {
        return $this->hasMany(Part::class);
    }
}
