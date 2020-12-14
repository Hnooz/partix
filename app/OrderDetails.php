<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $guarded = [];
    protected $with = ['part', 'orders'];

    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id');
    }

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
