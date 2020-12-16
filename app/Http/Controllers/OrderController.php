<?php

namespace App\Http\Controllers;

use Cart;
use App\Order;
use App\OrderStatus;
use App\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $orders = Order::all();

        return inertia()->render('Dashboard/orders/index', ['orders' => $orders]);
    }

    public function show(Order $order)
    {
        $order_details = OrderDetails::where('order_id', $order->id)->get();

        return inertia()->render('Dashboard/orders/show', ['order_details' => $order_details]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_phone' => 'required',
            'address' => 'required',

        ]);

        $order = Order::create([
            'customer_phone' => $request->customer_phone,
            'address' => $request->address,
            'order_status_id' => 1,
        ]);

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
        dd($details);
        foreach ($details as $detail) {
            $total = $total + $detail->price * $detail->quantity;
        }

        return response()->json($total);
    }
}
