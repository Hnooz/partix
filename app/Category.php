<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable;

    protected $guarded = [];

    public function superCategory()
    {
        return $this->belongsTo(SuperCategory::class, 'super_category_id');
    }

    public function parts()
    {
        return $this->hasMany(Part::class);
    }
}
