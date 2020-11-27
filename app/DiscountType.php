<?php

namespace App;

use App\CouponCode;
use Illuminate\Database\Eloquent\Model;

class DiscountType extends Model
{
    protected $guarded = [];

    public function coupons()
    {
        return $this->hasMany(CouponCode::class);
    }
}
