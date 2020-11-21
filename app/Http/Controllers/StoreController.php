<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return inertia()->render('Store/Index');
    }

    public function items()
    {
        return inertia()->render('Store/Items');
    }

    public function details()
    {
        return inertia()->render('Store/ItemDetails');
    }
}
