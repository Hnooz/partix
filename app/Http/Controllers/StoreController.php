<?php

namespace App\Http\Controllers;

use App\Part;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $parts = Part::all();
        return inertia()->render('Store/Index', ['parts' => $parts]);
    }

    public function items()
    {
        return inertia()->render('Store/Items');
    }

    public function details(Part $part)
    {

        return inertia()->render('Store/ItemDetails', ['part' => $part]);
    }
}
