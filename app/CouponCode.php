<?php

namespace App;

use App\DiscountType;
use Illuminate\Database\Eloquent\Model;

class CouponCode extends Model
{
    protected $guarded = [];

    public function descountType()
    {
        return $this->belongs(DiscountType::class);
    }
}
