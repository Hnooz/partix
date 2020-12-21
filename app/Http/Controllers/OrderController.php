<?php

namespace App\Http\Controllers;

use Cart;
use App\Order;
use Carbon\Carbon;
use App\CouponCode;
use App\OrderStatus;
use App\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
        if (request()->has('1')) {
            $orders = Order::where('order_status_id', 1)->get();

            return inertia()->render('Dashboard/orders/index', ['orders' => $orders]);
        } elseif (request()->has('2')) {
            $orders = Order::where('order_status_id', 2)->get();

            return inertia()->render('Dashboard/orders/index', ['orders' => $orders]);
        } elseif (request()->has('3')) {
            $orders = Order::where('order_status_id', 3)->get();

            return inertia()->render('Dashboard/orders/index', ['orders' => $orders]);
        } elseif (request()->has('4')) {
            $orders = Order::where('order_status_id', 4)->get();

            return inertia()->render('Dashboard/orders/index', ['orders' => $orders]);
        } else {
            $orders = Order::latest()->get();

            return inertia()->render('Dashboard/orders/index', ['orders' => $orders]);
        }
    }

    public function show(Order $order)
    {
        $order_details = OrderDetails::where('order_id', $order->id)->get();

        return inertia()->render('Dashboard/orders/show', ['order_details' => $order_details]);
    }
    public function store(Request $request)
    {
        $mutable = Carbon::now();
        // dd($request);
        $data = $request->validate([
            'customer_phone' => 'required',
            'address' => 'required',
        ]);
        $coupon = CouponCode::where('name', $request->coupon)->get();
        
        if (Cart::isEmpty()) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => "you can't pruchase an empty order",
            ]);

            return redirect()->back();
        }

        if ($coupon[0]) {
            $today = Carbon::createFromFormat('Y-m-d', $coupon[0]->expiration_at)->toDateTimeString();

            if ($coupon[0]->quantity < 1 || $today <= $mutable) { // check coupon expiration
                session()->flash('toast', [
                    'type' => 'error',
                    'message' => 'invalid coupon code',
                ]);

                return redirect()->back();
            }
    
            $cartTotalPrice = Cart::getTotal();
        
            if (sizeOf($coupon) == 0) {
                $order = Order::create([
                    'customer_phone' => $request->customer_phone,
                    'address' => $request->address,
                    'order_status_id' => 1,
                ]);
            } else {
                $order = Order::create([
                    'customer_phone' => $request->customer_phone,
                    'address' => $request->address,
                    'order_status_id' => 1,
                    'coupon_id' => $coupon[0]->id,
                ]);

                $coupon[0]->quantity = $coupon[0]->quantity - 1;

                $coupon[0]->save();
            }
        
            $cartCollection = Cart::getContent();

            foreach ($cartCollection as $cart) {
                $details = OrderDetails::create([
                    'order_id' => $order->id,
                    'part_id' => $cart->id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->price,
                ]);
            };

            \Cart::clear();
        
            session()->flash('toast', [
                'type' => 'success',
                'message' => 'you have successfully',
            ]);

            return redirect()->route('store.index');
        }
    }

    public function edit(Order $order)
    {
        $order_status = OrderStatus::all();

        return inertia()->render('Dashboard/orders/edit', ['order' => $order, 'order_status' => $order_status]);
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

    public function getTotalPrice(Request $request)
    {
        $details = OrderDetails::where('order_id', $request->id)->get();
        $total = 0;
        foreach ($details as $detail) {
            $total = $total + $detail->price * $detail->quantity;
        }

        return response()->json($total);
    }
}
