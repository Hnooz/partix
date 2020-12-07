<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return inertia()->render('Dashboard/orders/index');
    }
}
