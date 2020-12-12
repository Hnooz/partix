<?php

namespace App;

use App\Traits\AppendImage;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use Notifiable, AppendImage, InteractsWithMedia;

    protected $guarded = [];
    protected $appends = ['url'];
    protected $with = ['superCategory'];

    public function superCategory()
    {
        return $this->belongsTo(SuperCategory::class, 'super_category_id');
    }

    public function parts()
    {
        return $this->hasMany(Part::class);
    }
}
