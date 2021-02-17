<?php

namespace App\Http\Controllers;

use Cart;
use App\Order;
use App\PartType;
use Carbon\Carbon;
use App\CouponCode;
use App\OrderStatus;
use App\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        if (request()->has('1')) {
            $orders = Order::where('order_status_id', 1)->paginate(15);

            return inertia()->render('Dashboard/orders/index', ['orders' => $orders]);
        }
        if (request()->has('2')) {
            $orders = Order::where('order_status_id', 2)->paginate(15);

            return inertia()->render('Dashboard/orders/index', ['orders' => $orders]);
        }
        if (request()->has('3')) {
            $orders = Order::where('order_status_id', 3)->paginate(15);

            return inertia()->render('Dashboard/orders/index', ['orders' => $orders]);
        }
        if (request()->has('4')) {
            $orders = Order::where('order_status_id', 4)->paginate(15);

            return inertia()->render('Dashboard/orders/index', ['orders' => $orders]);
        }

        $orders = Order::latest()->paginate(15);

        return inertia()->render('Dashboard/orders/index', ['orders' => $orders]);
    }

    public function show(Order $order)
    {
        return inertia()->render('Dashboard/orders/show', ['order' => $order]);
    }

    public function store(Request $request)
    {
        $cartCollection = Cart::getContent();

        $mutable = Carbon::now(); //CUREENT DATE

        $data = $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required|min:8|max:8',
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

        if (Cart::isEmpty()) { // CHECK IF CART IS EMPTY
            session()->flash('toast', [
                'type' => 'error',
                'message' => "you can't pruchase an empty order",
            ]);

            return redirect()->back();
        }

        if (isset($coupon[0])) {
            $expiration = Carbon::createFromFormat('Y-m-d', $coupon[0]->expiration_at)->toDateTimeString();
                
            if ($coupon[0]->quantity < 1 || $expiration <= $mutable) { // check coupon expiration TIME
                session()->flash('toast', [
                    'type' => 'error',
                    'message' => 'coupon expired',
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
        
        $cartCollection = Cart::getContent();

        foreach ($cartCollection as $cart) {
            $part_type = PartType::find($cart->attributes->part_type_id);
            $details = OrderDetails::create([
                'order_id' => $order->id,
                'part_id' => $cart->attributes->partId,
                'part_type' => $part_type->name,
                'quantity' => $cart->quantity,
                'price' => round($cart->price),
            ]);
        };

        Cart::clear();
        
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'you have ordered successfully',
        ]);

        return redirect()->route('store.message', [$order->id]);
    }

    public function edit(Order $order)
    {
        $order_status = OrderStatus::all();

        return inertia()->render('Dashboard/orders/edit', ['order' => $order, 'order_status' => OrderStatus::all()]);
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate(['order_status_id' => 'required']);

        $order->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'order updated successfully',
        ]);

        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        $order->orderDetails()->delete();
        $order->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'order was deleted successfully',
        ]);

        return redirect()->back();
    }

    public function storeZeroPriceOrder(Request $request, Order $order)
    {
        $order->storeOrderWhenPriceZero($request);

        return inertia()->render('Store/message');
    }
}
