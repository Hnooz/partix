<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponCode extends Model
{
    protected $guarded = [];
    protected $with = ['descountType'];

    public function descountType()
    {
        return $this->belongsTo(DiscountType::class, 'descount_type_id');
    }
}
