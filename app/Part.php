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

    protected $table = 'parts';
    protected $guarded = [];
    protected $appends = ['url'];
    protected $with = ['category','type','brands'];
    
    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function supplier()
    {
        return $this->belongsToMany(Supplier::class);
    }

    public function type()
    {
        return $this->belongsTo(PartType::class, 'part_type_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
