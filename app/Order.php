<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $with = ['status'];
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
            if ($coupon[0]->descountType->name == 'fixied') {
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
}
