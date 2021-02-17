<?php

namespace App;

use App\Traits\AppendImage;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class Part extends Model implements HasMedia
{
    use Notifiable,AppendImage, InteractsWithMedia, SoftDeletes;

    protected $guarded = [];
    protected $appends = ['url'];
    protected $with = ['category','type','cars','tags'];
    protected $dates = ['deleted_at'];

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
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_part');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
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
