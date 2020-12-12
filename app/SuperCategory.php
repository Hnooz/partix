<?php

namespace App;

use App\Traits\AppendImage;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;

class SuperCategory extends Model implements HasMedia
{
    use Notifiable, AppendImage, InteractsWithMedia;

    protected $guarded = [];
    protected $appends = ['url'];

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
