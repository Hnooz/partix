<?php

namespace App\Http\Controllers;

use Cart;
use App\Car;
use App\Part;

class StoreController extends Controller
{
    public function index()
    {
        $parts = Part::with('category')->get();
        
        $cars = Car::all();
        $cartQuantity = Cart::getTotalQuantity();
        $cartCollection = Cart::getContent();
        // \dd($cartCollection);
        return inertia()->render(
            'Store/Index',
            [
                'parts' => $parts,
                'cars' => $cars,
                'cartQuantity' => $cartQuantity,
                'cartCollection' => $cartCollection, ]
        );
    }

    public function items()
    {
        $parts = Part::with('category')->get();
        $cars = Car::all();
        $cartQuantity = Cart::getTotalQuantity();
        $cartCollection = Cart::getContent();

        return inertia()->render(
            'Store/Items',
            [
                'parts' => $parts,
                'cars' => $cars,
                'cartQuantity' => $cartQuantity,
                'cartCollection' => $cartCollection, ]
        );
    }

    public function details(Part $part)
    {
        $cars = Car::all();
        $cartQuantity = Cart::getTotalQuantity();
        $cartCollection = Cart::getContent();
        $cartItem = Cart::get($part->id);
        // dd($cartItem);
        return inertia()->render('Store/ItemDetails', ['part' => $part,
            'cars' => $cars,
            'cartQuantity' => $cartQuantity,
            'cartCollection' => $cartCollection,
            'cartItem' => $cartItem,
        ]);
    }
}
