<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouponCodeController extends Controller
{
    public function index()
    {
        return inertia()->render('Dashboard/coupons/index');
    }
}
