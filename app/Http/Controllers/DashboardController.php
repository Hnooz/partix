<?php

namespace App\Http\Controllers;

use App\Car;
use App\Order;
use App\OrderDetails;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $brands = Car::all()->count();
        $pending_order = Order::where('order_status_id', 1)->count();
        $delivered_order = Order::where('order_status_id', 2)->count();
        $awaiting_order = Order::where('order_status_id', 3)->count();
        $rejected_order = Order::where('order_status_id', 4)->count();

        $orders = Order::all();
        $total = 0;
        foreach ($orders as $order) {
            $order_details = OrderDetails::where('order_id', $order->id)->get();
            foreach ($order_details as $details) {
                $total = $total + $details->price * $details->quantity;
            }
        }

        // dd($total);
        return inertia()->render('Dashboard/Index', [
            'brands' => $brands,
            'pending_order' => $pending_order,
            'delivered_order' => $delivered_order,
            'awaiting_order' => $awaiting_order,
            'rejected_order' => $rejected_order,
            'total' => $total,
        ]);
    }

    public function ui()
    {
        return inertia()->render('Dashboard/UI');
    }
}
