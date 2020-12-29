<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $with = ['status', 'coupon'];
    protected $appends = ['price'];

    public function getPriceAttribute()
    {
        $totals = OrderDetails::where('order_id', $this->id)->get();
        $coupon = CouponCode::where(['id' => $this->coupon_id,'used' => '1'])->get();
        $totalPrice = 0;
        foreach ($totals as $total) {
            $totalPrice = $totalPrice + $total->price * $total->quantity;
        }
        if (sizeof($coupon) >= 1) {
            if ($coupon[0]->descountType->name == 'fixed') {
                if ($totalPrice - $coupon[0]->value < 0) {
                    return $totalPrice - $coupon[0]->value + $coupon[0]->value;
                }

                return $totalPrice - $coupon[0]->value;
            } else {
                return $totalPrice - (($coupon[0]->value / 100) * $totalPrice);
            }
        } else {
            return $totalPrice;
        }
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }
    public function coupon()
    {
        return $this->belongsTo(CouponCode::class, 'coupon_id');
    }
}
