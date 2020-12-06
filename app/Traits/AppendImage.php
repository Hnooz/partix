<?php

namespace App\Traits;

trait AppendImage
{
    public function getUrlAttribute()
    {
        return $this->getFirstMediaUrl('images');
    }
}
