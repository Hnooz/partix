<?php

namespace App\Http\Controllers;

use App\Order;

class ErrorAndMessageController extends Controller
{
    public function message(Order $order)
    {
        return inertia()->render('Store/message', ['order' => $order]);
    }
}
