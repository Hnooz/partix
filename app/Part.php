<?php

namespace App;

use App\Traits\AppendImage;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;

class Part extends Model implements HasMedia
{
    use Notifiable,AppendImage, InteractsWithMedia;

    protected $guarded = [];
    protected $appends = ['url'];
    protected $with = ['category','type'];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($part) {
            $part->update(['slug' => $part->name]);
        });
    }
    
    public function cars()
    {
        return $this->belongsToMany(Car::class);
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

    public function setSlugAttribute($value)
    {
        $slug = Str::slug($value);

        while (static::whereSlug($slug)->exists()) {
            $slug = "{$slug}-" . $this->id;
        }

        $this->attributes['slug'] = $slug;
    }
}
