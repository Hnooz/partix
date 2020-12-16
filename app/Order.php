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

        $totalPrice = 0;
        foreach ($totals as $total) {
            $totalPrice = $totalPrice + $total->price * $total->quantity;
        }

        return $totalPrice;
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, );
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }
}
