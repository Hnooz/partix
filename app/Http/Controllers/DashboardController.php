<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Order;
use Carbon\Carbon;
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
        $mutable = Carbon::now()->toDateString(); // today date
        $en = CarbonImmutable::now()->locale('en_US');
        $startOfWeek = $en->startOfWeek()->format('Y-m-d H:i');
        $endOfWeek = $en->endOfWeek()->format('Y-m-d H:i');

        $brands = Brand::all()->count(); // all brands
        $newCars = Brand::whereBetween('created_at', [$startOfWeek,$endOfWeek])->count(); // new brands peer week
        $limitBrands = Brand::latest()->limit(6)->get(); // top 5 brands

        //    order status
        $pending_order = Order::where('order_status_id', 1)->count();
        $delivered_order = Order::where('order_status_id', 2)->count();
        $awaiting_order = Order::where('order_status_id', 3)->count();
        $rejected_order = Order::where('order_status_id', 4)->count();

        $orders = Order::all();             // orders data

        $todayOrders = Order::whereBetween('created_at', [$mutable.' 00:00:00',$mutable.' 23:59:59'])->get(); // today orders
        
        $newOrders = Order::whereBetween('created_at', [$startOfWeek,$endOfWeek])->count(); // new orders peer week
        
        if ($orders->count() == 0.0) { // check if orders are empty
            $thisWeekOrders = 0;
        } else {
            $thisWeekOrders = ($newOrders / $orders->count()) * 100;
        }
        
        $customerAddress = Order::orderBy('address')->count(); // customers depend on address
        $newCustomers = Order::whereBetween('created_at', [$startOfWeek,$endOfWeek])->count(); // customer peer week

        $total = 0; // sales total
        $oneOrderTotal = 0; // one order total price perr day
        $orderTotalPrice = []; // array of total order prices
        $orderIds = []; // array of order ids

        // total of sales
        foreach ($orders as $order) {
            $order_details = OrderDetails::where('order_id', $order->id)->get();
            foreach ($order_details as $details) {
                $total = $total + $details->price * $details->quantity;
            }
        }

        // deliverd orders sale data sent to sale chart peer day
        foreach ($todayOrders->where('order_status_id', 2) as $order) {
            $order_details = OrderDetails::where('order_id', $order->id)->get();
            $oneOrderTotal = 0;
            foreach ($order_details as $details) {
                $oneOrderTotal = $details->price * $details->quantity;
            }
            if ($order->coupon) {
                if ($order->coupon->descountType->name == 'fixed') {
                    if ($oneOrderTotal - $order->coupon->value < 0) {
                        $oneOrderTotal = $oneOrderTotal - $order->coupon->value + $order->coupon->value;
                    }
                    $oneOrderTotal = $oneOrderTotal - $order->coupon->value;
                } else {
                    $oneOrderTotal = $oneOrderTotal - (($order->coupon->value / 100) * $oneOrderTotal);
                }
            } else {
                $oneOrderTotal = $oneOrderTotal ;
            }
            array_push($orderTotalPrice, $oneOrderTotal);
            array_push($orderIds, $order->id);
        }

        // top 5 brands sales
        $delivered_orders = Order::where('order_status_id', 2)->get();
        $order_car_brands = [];
        foreach ($delivered_orders as $de_order) {
            $order_details = OrderDetails::where('order_id', $de_order->id)->get();
            foreach ($order_details as $order_detail) {
                foreach ($order_detail->part->cars as $car) {
                    array_push($order_car_brands, $car->brands->name);
                };
            };
        }
        // dd($thisWeekOrders);
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
            'orderTotalPrice' => $orderTotalPrice,
            'orderIds' => $orderIds,
            'newCustomers' => $newCustomers,

        ]);
    }
}
