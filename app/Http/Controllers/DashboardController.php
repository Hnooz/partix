<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Order;
use App\OrderDetails;
use Carbon\CarbonImmutable;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $en = CarbonImmutable::now()->locale('en_US');
        $startOfWeek = $en->startOfWeek()->format('Y-m-d H:i');
        $endOfWeek = $en->endOfWeek()->format('Y-m-d H:i');

        // cars
        $brands = Brand::all()->count();
        $newCars = Brand::whereBetween('created_at', [$startOfWeek,$endOfWeek])->count();
        $limitBrands = Brand::latest()->limit(6)->get();

        //    order status
        $pending_order = Order::where('order_status_id', 1)->count();
        $delivered_order = Order::where('order_status_id', 2)->count();
        $awaiting_order = Order::where('order_status_id', 3)->count();
        $rejected_order = Order::where('order_status_id', 4)->count();

        // orders
        $orders = Order::all();
        $allorders = Order::all()->count();
        $newOrders = Order::whereBetween('created_at', [$startOfWeek,$endOfWeek])->count();

        if ($allorders == 0.0) {
            $thisWeekOrders = 0;
        } else {
            $thisWeekOrders = ($newOrders / $allorders) * 100;
        }
        
        // customers depend on address
        $customerAddress = Order::orderBy('address')->count();
        $newCustomers = Order::whereBetween('created_at', [$startOfWeek,$endOfWeek])->count();
        //    dd($customerAddress);
        $total = 0;
        foreach ($orders as $order) {
            $order_details = OrderDetails::where('order_id', $order->id)->get();
            foreach ($order_details as $details) {
                $total = $total + $details->price * $details->quantity;
            }
        }

        //    dd($cars);
        return inertia()->render('Dashboard/Index', [
            'brands' => $brands,
            'pending_order' => $pending_order,
            'delivered_order' => $delivered_order,
            'awaiting_order' => $awaiting_order,
            'rejected_order' => $rejected_order,
            'total' => $total,
            'limitBrands' => $limitBrands,
            'newCars' => $newCars,
            'thisWeekOrders' => $thisWeekOrders,
            'customerAddress' => $customerAddress,
            'newCustomers' => $newCustomers,

        ]);
    }

    public function ui()
    {
        return inertia()->render('Dashboard/UI');
    }
}
