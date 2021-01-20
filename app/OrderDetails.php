<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $guarded = [];
    protected $with = ['part'];

    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
