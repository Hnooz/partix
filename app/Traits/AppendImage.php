<?php

namespace App\Traits;

trait AppendImage
{
    public function getUrlAttribute()
    {
        $urls = [];

        $mediaItem = $this->getMedia('images');

        for ($i = 0; $i < sizeOf($mediaItem); $i++) {
            $urls[$i] = $mediaItem[$i]->getUrl();
        }

        return $urls;
    }
}
