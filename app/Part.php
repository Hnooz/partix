<?php

namespace App;

use App\Traits\AppendImage;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;

class Part extends Model implements HasMedia
{
    use Notifiable,AppendImage, InteractsWithMedia;

    protected $guarded = [];
    protected $appends = ['url'];
    
    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsToMany(Supplier::class, 'supplier_id');
    }
}
