<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $with = ['status', 'coupon', 'orderDetails'];
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

    public function storeOrderWhenPriceZero($request)
    {
        $mutable = Carbon::now(); //CUREENT DATE
        $data = $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_address' => 'required',
        ]);

        $coupon = CouponCode::where('name', $request->coupon)->get(); //COUPON FROM REQUEST

        if (isset($coupon[0]->name) != $request->coupon) { // check coupon expiration TIME
            session()->flash('toast', [
                'type' => 'error',
                'message' => 'invalid coupon code name',
            ]);

            return redirect()->back();
        }

        if (isset($coupon[0])) {
            $expiration = Carbon::createFromFormat('Y-m-d', $coupon[0]->expiration_at)->toDateTimeString();
                
            if ($coupon[0]->quantity < 1 || $expiration <= $mutable) { // check coupon expiration TIME
                session()->flash('toast', [
                    'type' => 'error',
                    'message' => 'invalid coupon code | quantity = 0 or it\'s expired s',
                ]);

                return redirect()->back();
            }

            $order = Order::create([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'order_status_id' => 1,
                'coupon_id' => $coupon[0]->id,
            ]);

            $coupon[0]->quantity = $coupon[0]->quantity - 1;
            if ($coupon[0]->quantity == 0) {
                $coupon[0]->used = '0';
            }
            $coupon[0]->save();
        } else {
            $order = Order::create([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'order_status_id' => 1,
            ]);
        }
        $part_type = PartType::find($request->part_type_id);
        $details = OrderDetails::create([
            'order_id' => $order->id,
            'part_id' => $request->id,
            'part_type' => $part_type->name,
            'quantity' => 1,
            'price' => 0,
        ]);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'orders done',
        ]);
    }
}
